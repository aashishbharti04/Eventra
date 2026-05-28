<?php $page = 'newevent'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Event &mdash; Eventra Admin</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
<?php require 'utils/adminHeader.php'; ?>

<section class="page-strip">
    <div class="container">
        <div class="crumbs"><a href="adminPage.php">Admin</a> &nbsp;/&nbsp; New event</div>
        <h1>Create a new event</h1>
        <p class="text-white-50">Fill in details for the event &mdash; it'll show up immediately on the public site.</p>
    </div>
</section>

<section class="section pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="form-shell">
                    <form method="POST" novalidate>
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label">Event ID</label>
                                <input type="number" name="event_id" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Event name</label>
                                <input type="text" name="event_title" class="form-control" required placeholder="e.g. Cryptohunt 2026">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Price (₹)</label>
                                <input type="number" name="event_price" class="form-control" required min="0">
                            </div>

                            <div class="col-md-8">
                                <label class="form-label">Image URL</label>
                                <input type="text" name="img_link" class="form-control" required placeholder="https://images.unsplash.com/...">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Category</label>
                                <select name="type_id" class="form-select" required>
                                    <option value="1">1 — Technical</option>
                                    <option value="2">2 — Gaming</option>
                                    <option value="3">3 — On-Stage</option>
                                    <option value="4">4 — Off-Stage</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Date</label>
                                <input type="date" name="Date" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Time</label>
                                <input type="text" name="time" class="form-control" required placeholder="e.g. 10:00 AM">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Location</label>
                                <input type="text" name="location" class="form-control" required placeholder="e.g. Auditorium">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Staff coordinator name</label>
                                <input type="text" name="sname" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Student coordinator name</label>
                                <input type="text" name="st_name" class="form-control" required>
                            </div>

                            <div class="col-12 d-flex gap-2 flex-wrap mt-2">
                                <button type="submit" name="update" class="btn btn-app"><i class="bi bi-send"></i> Create event</button>
                                <a href="adminPage.php" class="btn btn-app-ghost"><i class="bi bi-arrow-left"></i> Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require 'utils/footer.php'; ?>
</body>
</html>

<?php
if (isset($_POST["update"])) {
    $event_id    = $_POST["event_id"];
    $event_title = $_POST["event_title"];
    $event_price = $_POST["event_price"];
    $img_link    = $_POST["img_link"];
    $type_id     = $_POST["type_id"];
    $name        = $_POST["sname"];
    $st_name     = $_POST["st_name"];
    $Date        = $_POST["Date"];
    $time        = $_POST["time"];
    $location    = $_POST["location"];

    if (!empty($event_id) && !empty($event_title) && !empty($event_price) && !empty($img_link) && !empty($type_id)) {
        include 'classes/db1.php';
        if ($db_offline) {
            echo "<script>alert('Database not connected. Start MySQL and import cems.sql.'); window.location.href='createEventForm.php';</script>";
        } else {
            $INSERT  = "INSERT INTO events(event_id,event_title,event_price,img_link,type_id) VALUES($event_id,'$event_title', $event_price,'$img_link',$type_id);";
            $INSERT .= "INSERT INTO event_info (event_id,Date,time,location) Values ($event_id,'$Date','$time','$location');";
            $INSERT .= "INSERT into student_coordinator(sid,st_name,phone,event_id)  values($event_id,'$st_name',NULL,$event_id);";
            $INSERT .= "INSERT into staff_coordinator(stid,name,phone,event_id)  values($event_id,'$name',NULL,$event_id)";
            if ($conn->multi_query($INSERT) === True) {
                echo "<script>alert('Event created!'); window.location.href='adminPage.php';</script>";
            } else {
                echo "<script>alert('Event already exists!'); window.location.href='createEventForm.php';</script>";
            }
            $conn->close();
        }
    } else {
        echo "<script>alert('All fields are required'); window.location.href='createEventForm.php';</script>";
    }
}
?>
