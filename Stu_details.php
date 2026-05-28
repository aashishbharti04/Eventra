<?php
$page = 'students';
include_once 'classes/db1.php';
$rows = [];
if (!$db_offline) {
    $result = @mysqli_query($conn, "SELECT * FROM events,registered r ,participent p WHERE events.event_id=r.event_id and r.usn = p.usn order by event_title");
    if ($result) { while ($r = mysqli_fetch_array($result)) { $rows[] = $r; } }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registrations &mdash; Eventra Admin</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
<?php require 'utils/adminHeader.php'; ?>

<section class="page-strip">
    <div class="container">
        <div class="crumbs"><a href="adminPage.php">Admin</a> &nbsp;/&nbsp; Students</div>
        <h1>Student registrations</h1>
        <p class="text-white-50">Every participant signed up across all events.</p>
    </div>
</section>

<section class="section pt-0">
    <div class="container">
        <?php if ($db_offline) echo db_offline_banner($db_last_error); ?>

        <div class="app-table-wrap">
            <div class="p-3" style="border-bottom:1px solid var(--border);background:var(--surface-2);">
                <h3 class="m-0" style="font-size:1.05rem;">All registered students &mdash; <?php echo count($rows); ?> records</h3>
            </div>
            <?php if (!empty($rows)): ?>
            <div class="table-responsive">
                <table class="app-table">
                    <thead><tr>
                        <th>USN</th><th>Name</th><th>Branch</th><th>Sem</th>
                        <th>Email</th><th>Phone</th><th>College</th><th>Event</th>
                    </tr></thead>
                    <tbody>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <td><code><?php echo htmlspecialchars($row['usn']); ?></code></td>
                            <td><b><?php echo htmlspecialchars($row['name']); ?></b></td>
                            <td><?php echo htmlspecialchars($row['branch']); ?></td>
                            <td><?php echo htmlspecialchars($row['sem']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td><?php echo htmlspecialchars($row['college']); ?></td>
                            <td><?php echo htmlspecialchars($row['event_title']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
                <div class="p-4 text-center text-muted-2"><i class="bi bi-inbox fs-1 d-block mb-2"></i>No registrations yet.</div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require 'utils/footer.php'; ?>
</body>
</html>
