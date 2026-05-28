<?php
include 'classes/db1.php';
$id = $_GET['id'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Staff Coordinator &mdash; Eventra Admin</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
<?php require 'utils/adminHeader.php'; ?>

<section class="page-strip">
    <div class="container">
        <div class="crumbs"><a href="adminPage.php">Admin</a> &nbsp;/&nbsp; <a href="Staff_cordinator.php">Staff coordinators</a> &nbsp;/&nbsp; Update</div>
        <h1>Update staff coordinator</h1>
    </div>
</section>

<section class="section pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="form-shell">
                    <?php if ($db_offline) echo db_offline_banner($db_last_error); ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Staff coordinator name</label>
                            <input type="text" name="st_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="tel" name="phone" class="form-control" required>
                        </div>
                        <button type="submit" name="update" class="btn btn-app"><i class="bi bi-save"></i> Save changes</button>
                        <a href="Staff_cordinator.php" class="btn btn-app-ghost"><i class="bi bi-arrow-left"></i> Back</a>
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
if (isset($_POST["update"]) && !$db_offline) {
    $name  = $_POST["st_name"];
    $phone = $_POST["phone"];
    $sql   = "UPDATE staff_coordinator set phone='$phone',name='$name' where stid='$id'";
    if ($conn->query($sql) === true) {
        echo "<script>alert('Updated Successfully'); window.location.href='Staff_cordinator.php';</script>";
    } else {
        echo "<script>alert('Update failed'); window.location.href='Staff_cordinator.php';</script>";
    }
}
?>
