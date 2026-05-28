<?php $page = 'register'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register &mdash; Eventra</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
<?php require 'utils/header.php'; ?>

<section class="page-strip">
    <div class="container">
        <div class="crumbs"><a href="index.php">Home</a> &nbsp;/&nbsp; Register</div>
        <h1>Register as a participant</h1>
        <p class="text-white-50" style="max-width:680px;">Already a participant? <a href="usn.php"><b>View your registered events</b></a>.</p>
    </div>
</section>

<section class="section pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="form-shell">
                    <h2 class="mb-1">Student Registration</h2>
                    <p class="lead">Fill in your details &mdash; we use this to issue your event pass and notify you of schedule changes.</p>

                    <form method="POST" novalidate>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Student USN <span class="text-danger">*</span></label>
                                <input type="text" name="usn" class="form-control" required placeholder="e.g. 1XX21CS001">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Full name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" required placeholder="Your name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Branch <span class="text-danger">*</span></label>
                                <input type="text" name="branch" class="form-control" required placeholder="CSE / ISE / ECE …">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Semester <span class="text-danger">*</span></label>
                                <input type="number" name="sem" min="1" max="8" class="form-control" required placeholder="1 - 8">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" required placeholder="you@college.edu">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone <span class="text-danger">*</span></label>
                                <input type="tel" name="phone" class="form-control" required placeholder="10-digit mobile">
                            </div>
                            <div class="col-12">
                                <label class="form-label">College <span class="text-danger">*</span></label>
                                <input type="text" name="college" class="form-control" required placeholder="Your college name">
                            </div>
                            <div class="col-12 d-flex gap-2 flex-wrap mt-2">
                                <button type="submit" name="update" class="btn btn-app"><i class="bi bi-check2-circle"></i> Submit registration</button>
                                <a href="usn.php" class="btn btn-app-ghost"><i class="bi bi-search"></i> Already registered?</a>
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
    $usn     = $_POST["usn"];
    $name    = $_POST["name"];
    $branch  = $_POST["branch"];
    $sem     = $_POST["sem"];
    $email   = $_POST["email"];
    $phone   = $_POST["phone"];
    $college = $_POST["college"];

    if (!empty($usn) && !empty($name) && !empty($branch) && !empty($sem) && !empty($email) && !empty($phone) && !empty($college)) {
        include 'classes/db1.php';
        if ($db_offline) {
            echo "<script>alert('Database not connected. Start MySQL and import cems.sql.'); window.location.href='register.php';</script>";
        } else {
            $INSERT = "INSERT INTO participent (usn,name,branch,sem,email,phone,college) VALUES('$usn','$name','$branch',$sem,'$email','$phone','$college')";
            if ($conn->query($INSERT) === True) {
                echo "<script>alert('Registered Successfully!'); window.location.href='usn.php';</script>";
            } else {
                echo "<script>alert('Already registered with this USN'); window.location.href='usn.php';</script>";
            }
            $conn->close();
        }
    } else {
        echo "<script>alert('All fields are required'); window.location.href='register.php';</script>";
    }
}
?>
