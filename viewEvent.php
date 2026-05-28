<?php
$page = 'events';
require 'classes/db1.php';
require_once 'classes/EventStore.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$cat_names = [
    1 => ['name' => 'Technical Events',      'sub' => 'Hackathons, quizzes and coding battles.'],
    2 => ['name' => 'Gaming Arena',          'sub' => 'Console showdowns and esports tournaments.'],
    3 => ['name' => 'On-Stage Performances', 'sub' => 'Dance, music, fashion and Idol contests.'],
    4 => ['name' => 'Off-Stage Talent',      'sub' => 'Cooking, mehandi, rangoli, short films.'],
];
$cat = $cat_names[$id] ?? ['name' => 'Events', 'sub' => 'Browse our active events.'];

$rows = EventStore::eventsByCategory($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($cat['name']); ?> &mdash; Eventra</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
<?php require 'utils/header.php'; ?>

<section class="page-strip">
    <div class="container">
        <div class="crumbs"><a href="index.php">Home</a> &nbsp;/&nbsp; <a href="index.php#events">Events</a> &nbsp;/&nbsp; <?php echo htmlspecialchars($cat['name']); ?></div>
        <h1><?php echo htmlspecialchars($cat['name']); ?></h1>
        <p class="text-white-50" style="max-width:680px;"><?php echo htmlspecialchars($cat['sub']); ?></p>
    </div>
</section>

<section class="section pt-0">
    <div class="container">

        <?php if ($db_offline): ?>
            <?php echo db_offline_banner($db_last_error); ?>

            <div class="banner-info">
                <b>Preview tip:</b> Even without a live database, the rest of the site (Home, About, Contact, login, register form) renders perfectly. Import <code>cems.sql</code> into MySQL, or paste <code>supabase_schema.sql</code> into Supabase and enable it on the <a href="settings.php">Settings page</a>.
            </div>
        <?php elseif (empty($rows)): ?>
            <div class="banner-info"><b>Nothing here yet.</b> No events found for this category. Check back soon!</div>
        <?php else: ?>
            <div class="row g-4">
                <?php foreach ($rows as $row) {
                    $img    = trim($row['img_link']);
                    $title  = htmlspecialchars($row['event_title']);
                    $price  = (int)$row['event_price'];
                    $date   = htmlspecialchars($row['Date']);
                    $time   = htmlspecialchars($row['time']);
                    $loc    = htmlspecialchars($row['location']);
                    $stuC   = htmlspecialchars($row['st_name']);
                    $staffC = htmlspecialchars($row['name']);
                ?>
                <div class="col-md-6 col-lg-4">
                    <article class="event-card">
                        <div class="e-img" style="background-image:url('<?php echo htmlspecialchars($img); ?>');"></div>
                        <div class="e-body">
                            <span class="price"><i class="bi bi-cash-coin me-1"></i>₹<?php echo $price; ?></span>
                            <h4><?php echo $title; ?></h4>
                            <div class="e-meta">
                                <div><i class="bi bi-calendar3"></i> <?php echo $date; ?></div>
                                <div><i class="bi bi-clock"></i> <?php echo $time; ?></div>
                                <div><i class="bi bi-geo-alt"></i> <?php echo $loc; ?></div>
                                <div><i class="bi bi-person"></i> Student lead: <?php echo $stuC; ?></div>
                                <div><i class="bi bi-person-badge"></i> Staff lead: <?php echo $staffC; ?></div>
                            </div>
                            <div class="actions">
                                <a href="register.php" class="btn btn-app"><i class="bi bi-bookmark-plus"></i> Register</a>
                                <a href="index.php#events" class="btn btn-app-ghost"><i class="bi bi-arrow-left"></i> Back</a>
                            </div>
                        </div>
                    </article>
                </div>
                <?php } ?>
            </div>
        <?php endif; ?>

        <div class="mt-4">
            <a href="index.php" class="btn btn-app-ghost"><i class="bi bi-arrow-left"></i> All categories</a>
        </div>
    </div>
</section>

<?php require 'utils/footer.php'; ?>
</body>
</html>
