<?php $page = '404'; http_response_code(404); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page not found &mdash; Eventra</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
<?php require 'utils/header.php'; ?>

<section class="section">
    <div class="container text-center">
        <div style="font-size:7rem;font-weight:800;line-height:1;background:linear-gradient(135deg,var(--violet-700),var(--coral));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">404</div>
        <h2 class="mt-2">We couldn't find that page</h2>
        <p class="lead text-muted-2">The link may be broken or the page may have moved. Let's get you back on track.</p>
        <div class="mt-3 d-flex gap-2 justify-content-center flex-wrap">
            <a href="index.php" class="btn btn-app"><i class="bi bi-house-door"></i> Go home</a>
            <a href="index.php#events" class="btn btn-app-ghost"><i class="bi bi-calendar-event"></i> Browse events</a>
            <a href="contact.php" class="btn btn-app-ghost"><i class="bi bi-chat-dots"></i> Contact us</a>
        </div>
    </div>
</section>

<?php require 'utils/footer.php'; ?>
</body>
</html>
