<?php
$page = 'stcoord';
include_once 'classes/db1.php';
require_once 'classes/EventStore.php';
$rows = EventStore::staffCoordinators();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Coordinators &mdash; Eventra Admin</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
<?php require 'utils/adminHeader.php'; ?>

<section class="page-strip">
    <div class="container">
        <div class="crumbs"><a href="adminPage.php">Admin</a> &nbsp;/&nbsp; Staff coordinators</div>
        <h1>Staff coordinators</h1>
        <p class="text-white-50">Faculty mentoring each event &mdash; their contact and the event they oversee.</p>
    </div>
</section>

<section class="section pt-0">
    <div class="container">
        <?php if ($db_offline) echo db_offline_banner($db_last_error); ?>

        <div class="app-table-wrap">
            <div class="p-3" style="border-bottom:1px solid var(--border);background:var(--surface-2);">
                <h3 class="m-0" style="font-size:1.05rem;">Staff coordinators &mdash; <?php echo count($rows); ?> records</h3>
            </div>
            <?php if (!empty($rows)): ?>
            <div class="table-responsive">
                <table class="app-table">
                    <thead><tr><th>Name</th><th>Phone</th><th>Event</th><th></th></tr></thead>
                    <tbody>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <td><b><?php echo htmlspecialchars($row['name']); ?></b></td>
                            <td><?php echo htmlspecialchars($row['phone'] ?? '—'); ?></td>
                            <td><?php echo htmlspecialchars($row['event_title']); ?></td>
                            <td><a class="btn btn-app-ghost btn-sm" href="updateStaff.php?id=<?php echo (int)$row['event_id']; ?>"><i class="bi bi-pencil"></i> Update</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
                <div class="p-4 text-center text-muted-2"><i class="bi bi-inbox fs-1 d-block mb-2"></i>No coordinators yet.</div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require 'utils/footer.php'; ?>
</body>
</html>
