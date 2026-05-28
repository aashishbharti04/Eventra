<?php
$page = 'dash';
include_once 'classes/db1.php';

$counts = ['events' => 0, 'participants' => 0, 'staff' => 0, 'students' => 0];
$rows   = [];

if (!$db_offline) {
    $r1 = @mysqli_query($conn, "SELECT COUNT(*) AS c FROM events");
    $r2 = @mysqli_query($conn, "SELECT COUNT(*) AS c FROM participent");
    $r3 = @mysqli_query($conn, "SELECT COUNT(*) AS c FROM staff_coordinator");
    $r4 = @mysqli_query($conn, "SELECT COUNT(*) AS c FROM student_coordinator");
    if ($r1) $counts['events']       = (int)mysqli_fetch_assoc($r1)['c'];
    if ($r2) $counts['participants'] = (int)mysqli_fetch_assoc($r2)['c'];
    if ($r3) $counts['staff']        = (int)mysqli_fetch_assoc($r3)['c'];
    if ($r4) $counts['students']     = (int)mysqli_fetch_assoc($r4)['c'];

    $result = @mysqli_query(
        $conn,
        "SELECT * FROM staff_coordinator s ,event_info ef ,student_coordinator st,events e
         WHERE e.event_id = ef.event_id
           AND e.event_id = s.event_id
           AND e.event_id = st.event_id"
    );
    if ($result) {
        while ($r = mysqli_fetch_array($result)) { $rows[] = $r; }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard &mdash; Eventra</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
<?php require 'utils/adminHeader.php'; ?>

<section class="page-strip">
    <div class="container">
        <div class="crumbs"><a href="index.php">Site</a> &nbsp;/&nbsp; Admin &nbsp;/&nbsp; Dashboard</div>
        <h1>Welcome back, Admin</h1>
        <p class="text-white-50">Manage events, coordinators and student registrations from one place.</p>
    </div>
</section>

<section class="section pt-0">
    <div class="container">

        <?php if ($db_offline) echo db_offline_banner($db_last_error); ?>

        <!-- Stat cards -->
        <div class="row g-3 mb-4">
            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="ico"><i class="bi bi-calendar-week-fill"></i></div>
                    <div class="num"><?php echo $counts['events']; ?></div>
                    <div class="label">Total events</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="ico" style="background:rgba(56,217,169,.15);color:#047857;"><i class="bi bi-people-fill"></i></div>
                    <div class="num"><?php echo $counts['participants']; ?></div>
                    <div class="label">Registered participants</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="ico" style="background:rgba(245,158,11,.15);color:#b45309;"><i class="bi bi-person-vcard"></i></div>
                    <div class="num"><?php echo $counts['staff']; ?></div>
                    <div class="label">Staff coordinators</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="ico" style="background:rgba(99,102,241,.15);color:#4338ca;"><i class="bi bi-person-badge"></i></div>
                    <div class="num"><?php echo $counts['students']; ?></div>
                    <div class="label">Student coordinators</div>
                </div>
            </div>
        </div>

        <!-- Actions row -->
        <div class="d-flex flex-wrap gap-2 mb-4">
            <a href="createEventForm.php" class="btn btn-app"><i class="bi bi-plus-circle"></i> Create new event</a>
            <a href="Stu_details.php" class="btn btn-app-ghost"><i class="bi bi-people"></i> View students</a>
            <a href="Stu_cordinator.php" class="btn btn-app-ghost"><i class="bi bi-person-badge"></i> Student coordinators</a>
            <a href="Staff_cordinator.php" class="btn btn-app-ghost"><i class="bi bi-person-vcard"></i> Staff coordinators</a>
        </div>

        <!-- Events table -->
        <div class="app-table-wrap">
            <div class="d-flex justify-content-between align-items-center p-3" style="border-bottom:1px solid var(--border);background:var(--surface-2);">
                <div>
                    <h3 class="m-0" style="font-size:1.05rem;">All events</h3>
                    <small class="text-muted-2">Full list with date, time, venue and coordinators.</small>
                </div>
                <a href="createEventForm.php" class="btn btn-app-accent btn-sm"><i class="bi bi-plus"></i> Add event</a>
            </div>

            <?php if (!empty($rows)): ?>
            <div class="table-responsive">
                <table class="app-table">
                    <thead>
                        <tr>
                            <th>Event</th>
                            <th>Participants</th>
                            <th>Price</th>
                            <th>Student coord.</th>
                            <th>Staff coord.</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Location</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <td><b><?php echo htmlspecialchars($row['event_title']); ?></b></td>
                            <td><?php echo (int)$row['participents']; ?></td>
                            <td>₹<?php echo (int)$row['event_price']; ?></td>
                            <td><?php echo htmlspecialchars($row['st_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['Date']); ?></td>
                            <td><?php echo htmlspecialchars($row['time']); ?></td>
                            <td><?php echo htmlspecialchars($row['location']); ?></td>
                            <td><a class="btn-danger-soft" href="deleteEvent.php?id=<?php echo (int)$row['event_id']; ?>" onclick="return confirm('Delete this event?');"><i class="bi bi-trash3"></i> Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
                <div class="p-4 text-center text-muted-2">
                    <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                    No events to show <?php echo $db_offline ? '(database not connected)' : '— click "Add event" to create your first one.'; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require 'utils/footer.php'; ?>
</body>
</html>
