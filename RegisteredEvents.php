<?php
$page = 'myevents';
$usn  = $_POST['usn'] ?? '';

include_once 'classes/db1.php';

$rows = [];
if (!$db_offline && $usn !== '') {
    $usn_safe = mysqli_real_escape_string($conn, $usn);
    $result   = @mysqli_query(
        $conn,
        "SELECT * FROM registered r,staff_coordinator s ,event_info ef ,student_coordinator st,events e
         WHERE e.event_id = ef.event_id
           AND e.event_id = s.event_id
           AND e.event_id = st.event_id
           AND r.usn = '$usn_safe'
           AND r.event_id = e.event_id"
    );
    if ($result) { while ($r = mysqli_fetch_array($result)) { $rows[] = $r; } }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registered Events &mdash; Eventra</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
<?php require 'utils/header.php'; ?>

<section class="page-strip">
    <div class="container">
        <div class="crumbs"><a href="index.php">Home</a> &nbsp;/&nbsp; <a href="usn.php">My events</a> &nbsp;/&nbsp; Results</div>
        <h1>Your registered events</h1>
        <p class="text-white-50">Showing events for USN <code style="color:#ffb547;"><?php echo htmlspecialchars($usn); ?></code></p>
    </div>
</section>

<section class="section pt-0">
    <div class="container">
        <?php if ($db_offline): ?>
            <?php echo db_offline_banner($db_last_error); ?>
        <?php elseif (empty($rows)): ?>
            <div class="banner-info">
                <b>No events found for this USN.</b> Either the USN doesn't exist yet, or you haven't joined any event.
                <a href="register.php" class="ms-2"><b>Register now &rarr;</b></a>
            </div>
        <?php else: ?>
            <div class="app-table-wrap">
                <div class="p-3" style="border-bottom:1px solid var(--border);background:var(--surface-2);">
                    <h3 class="m-0" style="font-size:1.05rem;"><?php echo count($rows); ?> event(s) found</h3>
                </div>
                <div class="table-responsive">
                    <table class="app-table">
                        <thead><tr>
                            <th>Event</th><th>Student coord.</th><th>Staff coord.</th>
                            <th>Date</th><th>Time</th><th>Location</th>
                        </tr></thead>
                        <tbody>
                        <?php foreach ($rows as $row): ?>
                            <tr>
                                <td><b><?php echo htmlspecialchars($row['event_title']); ?></b></td>
                                <td><?php echo htmlspecialchars($row['st_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['Date']); ?></td>
                                <td><?php echo htmlspecialchars($row['time']); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>

        <div class="mt-4 d-flex gap-2 flex-wrap">
            <a href="usn.php" class="btn btn-app-ghost"><i class="bi bi-arrow-left"></i> Look up another USN</a>
            <a href="index.php#events" class="btn btn-app"><i class="bi bi-plus-circle"></i> Register for more events</a>
        </div>
    </div>
</section>

<?php require 'utils/footer.php'; ?>
</body>
</html>
