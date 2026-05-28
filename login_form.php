<?php $page = 'login'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login &mdash; Eventra</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
<?php require 'utils/header.php'; ?>

<section class="page-strip">
    <div class="container">
        <div class="crumbs"><a href="index.php">Home</a> &nbsp;/&nbsp; Admin Login</div>
        <h1><i class="bi bi-shield-lock"></i> Admin Login</h1>
        <p class="text-white-50">Restricted area &mdash; for the Eventra Admin console.</p>
    </div>
</section>

<section class="section pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="form-shell">
                    <h2 class="mb-1">Welcome back</h2>
                    <p class="lead">Sign in to manage events, coordinators and registrations.</p>

                    <form method="POST" novalidate>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="name" class="form-control" required autocomplete="username" placeholder="admin">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required autocomplete="current-password" placeholder="••••••••">
                        </div>
                        <button type="submit" name="update" class="btn btn-app w-100"><i class="bi bi-box-arrow-in-right"></i> Sign in</button>
                    </form>

                    <div class="banner-info mt-3 mb-0">
                        <b>Demo credentials:</b> <code>admin</code> / <code>admin</code>
                    </div>
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
    $myusername = $_POST['name'] ?? '';
    $mypassword = $_POST['password'] ?? '';

    if ($mypassword == 'admin' && $myusername == 'admin') {
        echo "<script>alert('Login Successful'); window.location.href='adminPage.php';</script>";
    } else {
        echo "<script>alert('Invalid credentials'); window.location.href='login_form.php';</script>";
    }
}
?>
