<?php $page = 'myevents'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Events &mdash; Eventra</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
<?php require 'utils/header.php'; ?>

<section class="page-strip">
    <div class="container">
        <div class="crumbs"><a href="index.php">Home</a> &nbsp;/&nbsp; My Events</div>
        <h1>My registered events</h1>
        <p class="text-white-50">Enter your USN to view everything you've signed up for.</p>
    </div>
</section>

<section class="section pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="form-shell">
                    <h2 class="mb-1">Find my events</h2>
                    <p class="lead">Quick lookup &mdash; we'll list every event you've registered for.</p>
                    <form action="RegisteredEvents.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Student USN</label>
                            <input type="text" id="usn" name="usn" class="form-control" required placeholder="e.g. 1XX21CS001">
                        </div>
                        <button type="submit" class="btn btn-app w-100"><i class="bi bi-search"></i> Show my events</button>
                    </form>
                    <p class="mt-3 mb-0 text-muted-2 small">Not registered yet? <a href="register.php"><b>Create your participant profile</b></a>.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require 'utils/footer.php'; ?>
</body>
</html>
