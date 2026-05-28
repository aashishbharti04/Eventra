<?php
$page = 'settings';
require_once 'classes/Settings.php';
require_once 'classes/SupabaseClient.php';

$message = null;
$message_type = 'info';
$ping_message = null;
$ping_ok = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'save') {
        $patch = [
            'use_supabase'     => isset($_POST['use_supabase']) ? true : false,
            'supabase_url'     => trim($_POST['supabase_url']     ?? ''),
            'supabase_anon'    => trim($_POST['supabase_anon']    ?? ''),
            'supabase_service' => trim($_POST['supabase_service'] ?? ''),
            'mysql_host'       => trim($_POST['mysql_host']       ?? 'localhost'),
            'mysql_user'       => trim($_POST['mysql_user']       ?? 'root'),
            'mysql_pass'       => $_POST['mysql_pass']            ?? '',
            'mysql_db'         => trim($_POST['mysql_db']         ?? 'cems'),
        ];
        // Don't blank out keys when the form submits the masked placeholder.
        foreach (['supabase_anon', 'supabase_service'] as $k) {
            if ($patch[$k] === '' || strpos($patch[$k], '••') !== false) {
                unset($patch[$k]);
            }
        }
        list($ok, $info) = Settings::save($patch);
        $message      = $ok ? "Settings saved to <code>" . htmlspecialchars($info) . "</code>" : $info;
        $message_type = $ok ? 'success' : 'error';
    } elseif ($action === 'test') {
        $url     = trim($_POST['supabase_url']     ?? Settings::get('supabase_url'));
        $service = trim($_POST['supabase_service'] ?? Settings::get('supabase_service'));
        $anon    = trim($_POST['supabase_anon']    ?? Settings::get('supabase_anon'));
        // Use whichever value is non-mask
        if (strpos($service, '••') !== false) $service = Settings::get('supabase_service');
        if (strpos($anon, '••')    !== false) $anon    = Settings::get('supabase_anon');
        $key = $service ?: $anon;
        if (!$url || !$key) {
            $ping_ok = false;
            $ping_message = "Provide both a project URL and at least one key.";
        } else {
            $sb = new SupabaseClient($url, $key);
            list($ok, $msg) = $sb->ping();
            $ping_ok = $ok;
            $ping_message = $msg;
        }
    }
}

$cur = Settings::all();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Settings — Eventra Admin</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
<?php require 'utils/adminHeader.php'; ?>

<section class="page-strip">
    <div class="container">
        <div class="crumbs"><a href="adminPage.php">Admin</a> &nbsp;/&nbsp; Settings</div>
        <h1>Database & Supabase settings</h1>
        <p class="text-white-50" style="max-width:680px;">Choose where Eventra reads and writes data — local MySQL or a Supabase project. Keys are stored in <code style="color:#fed7aa;">config/settings.local.php</code> (gitignored).</p>
    </div>
</section>

<section class="section pt-0">
    <div class="container">
        <?php if ($message): ?>
            <div class="<?php echo $message_type === 'success' ? 'banner-info' : 'banner-warn'; ?>">
                <?php if ($message_type === 'success'): ?><i class="bi bi-check-circle-fill me-2"></i><?php else: ?><i class="bi bi-exclamation-triangle-fill me-2"></i><?php endif; ?>
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <?php if ($ping_message): ?>
            <div class="<?php echo $ping_ok ? 'banner-info' : 'banner-warn'; ?>">
                <i class="bi <?php echo $ping_ok ? 'bi-wifi' : 'bi-wifi-off'; ?> me-2 fs-5"></i>
                <b><?php echo $ping_ok ? 'Supabase reachable.' : 'Could not reach Supabase.'; ?></b>
                <?php echo htmlspecialchars($ping_message); ?>
            </div>
        <?php endif; ?>

        <div class="banner-warn">
            <i class="bi bi-shield-exclamation fs-4"></i>
            <div>
                <b>Security note:</b> the <b>service-role key</b> bypasses Supabase's Row-Level Security. It's fine to paste here for local development and college-project demos, but for a real production deploy you should serve it from environment variables instead.
                The keys you paste are saved to <code>config/settings.local.php</code> which is gitignored — it will never be committed.
            </div>
        </div>

        <form method="POST" novalidate>
            <input type="hidden" name="action" value="save">

            <div class="row g-4">
                <!-- Supabase block -->
                <div class="col-lg-7">
                    <div class="form-shell h-100">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="kicker"><i class="bi bi-lightning-charge-fill" style="color:var(--coral);"></i> Backend</div>
                                <h2 class="mb-1">Supabase</h2>
                                <p class="lead">Managed Postgres + REST API. Paste your project URL and keys.</p>
                            </div>
                            <div class="form-check form-switch" style="transform:scale(1.4);transform-origin:right top;">
                                <input class="form-check-input" type="checkbox" id="use_supabase" name="use_supabase" <?php echo !empty($cur['use_supabase']) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="use_supabase"></label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Project URL</label>
                            <input type="url" name="supabase_url" class="form-control"
                                   placeholder="https://abcdefghij.supabase.co"
                                   value="<?php echo htmlspecialchars($cur['supabase_url'] ?? ''); ?>">
                            <small class="text-muted-2">Supabase &rarr; Project Settings &rarr; API &rarr; Project URL</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Anon key <span class="text-muted-2">(public)</span></label>
                            <input type="text" name="supabase_anon" class="form-control" autocomplete="off"
                                   placeholder="eyJhbGciOi..."
                                   value="<?php echo htmlspecialchars(Settings::maskKey($cur['supabase_anon'] ?? '')); ?>">
                            <small class="text-muted-2">Safe to share — respects Row-Level Security.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Service-role key <span class="text-muted-2">(secret)</span></label>
                            <input type="text" name="supabase_service" class="form-control" autocomplete="off"
                                   placeholder="eyJhbGciOi..."
                                   value="<?php echo htmlspecialchars(Settings::maskKey($cur['supabase_service'] ?? '')); ?>">
                            <small class="text-muted-2">Bypasses RLS. Required for admin writes (inserts, updates, deletes).</small>
                        </div>

                        <div class="d-flex gap-2 flex-wrap">
                            <button type="submit" class="btn btn-app"><i class="bi bi-save"></i> Save settings</button>
                            <button type="submit" name="action" value="test" class="btn btn-app-ghost"><i class="bi bi-wifi"></i> Test connection</button>
                        </div>
                    </div>
                </div>

                <!-- MySQL block + status -->
                <div class="col-lg-5">
                    <div class="form-shell h-100">
                        <div class="kicker"><i class="bi bi-database-fill" style="color:var(--brand);"></i> Fallback</div>
                        <h2 class="mb-1">Local MySQL</h2>
                        <p class="lead">Used when Supabase is off.</p>

                        <div class="mb-2">
                            <label class="form-label">Host</label>
                            <input type="text" name="mysql_host" class="form-control" value="<?php echo htmlspecialchars($cur['mysql_host'] ?? 'localhost'); ?>">
                        </div>
                        <div class="row g-2">
                            <div class="col-6">
                                <label class="form-label">User</label>
                                <input type="text" name="mysql_user" class="form-control" value="<?php echo htmlspecialchars($cur['mysql_user'] ?? 'root'); ?>">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Password</label>
                                <input type="password" name="mysql_pass" class="form-control" value="<?php echo htmlspecialchars($cur['mysql_pass'] ?? ''); ?>">
                            </div>
                        </div>
                        <div class="mb-3 mt-2">
                            <label class="form-label">Database</label>
                            <input type="text" name="mysql_db" class="form-control" value="<?php echo htmlspecialchars($cur['mysql_db'] ?? 'cems'); ?>">
                        </div>

                        <hr class="divider">
                        <div class="kicker mb-2">Current status</div>
                        <ul class="list-unstyled mb-0" style="font-size:.92rem;">
                            <li class="mb-1">
                                <i class="bi <?php echo !empty($cur['use_supabase']) ? 'bi-check-circle-fill text-success' : 'bi-circle text-muted-2'; ?> me-2"></i>
                                Supabase enabled: <b><?php echo !empty($cur['use_supabase']) ? 'Yes' : 'No'; ?></b>
                            </li>
                            <li class="mb-1">
                                <i class="bi <?php echo Settings::isSupabaseReady() ? 'bi-check-circle-fill text-success' : 'bi-dash-circle text-muted-2'; ?> me-2"></i>
                                Keys configured: <b><?php echo Settings::isSupabaseReady() ? 'Yes' : 'No'; ?></b>
                            </li>
                            <li class="mb-1">
                                <i class="bi <?php echo function_exists('curl_init') ? 'bi-check-circle-fill text-success' : 'bi-x-circle-fill text-danger'; ?> me-2"></i>
                                PHP curl ext: <b><?php echo function_exists('curl_init') ? 'available' : 'missing'; ?></b>
                            </li>
                            <li>
                                <i class="bi <?php echo class_exists('mysqli') ? 'bi-check-circle-fill text-success' : 'bi-x-circle-fill text-danger'; ?> me-2"></i>
                                PHP mysqli ext: <b><?php echo class_exists('mysqli') ? 'available' : 'missing'; ?></b>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>

        <!-- Schema bootstrap helper -->
        <div class="mt-4 form-shell">
            <div class="kicker"><i class="bi bi-cloud-arrow-up-fill" style="color:var(--emerald);"></i> First-time setup</div>
            <h2 class="mb-1">Bootstrap your Supabase schema</h2>
            <p class="lead">Brand new project? Copy the SQL from <code>supabase_schema.sql</code> (Postgres flavour) and paste it into <b>Supabase &rarr; SQL Editor &rarr; New query &rarr; Run</b>. That creates all the tables (events, event_info, participent, student_coordinator, staff_coordinator, registered) and inserts the seed events.</p>
            <a href="supabase_schema.sql" class="btn btn-app-ghost" target="_blank"><i class="bi bi-file-earmark-code"></i> Open supabase_schema.sql</a>
        </div>
    </div>
</section>

<?php require 'utils/footer.php'; ?>
</body>
</html>
