<?php $page = 'gallery'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gallery &mdash; Eventra</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
<?php require 'utils/header.php'; ?>

<section class="page-strip">
    <div class="container">
        <div class="crumbs"><a href="index.php">Home</a> &nbsp;/&nbsp; Gallery</div>
        <h1>Past events, captured.</h1>
        <p class="text-white-50" style="max-width:680px;">A walk through some of our most loved moments &mdash; from coding battles at 3 AM to centre-stage choreography under the lights.</p>
    </div>
</section>

<section class="section pt-0">
    <div class="container">
        <?php
        $shots = [
            ['https://images.unsplash.com/photo-1505373877841-8d25f7d46678?auto=format&fit=crop&w=700&q=80', 'Coding marathon · 2024'],
            ['https://images.unsplash.com/photo-1540317580384-e5d43616b9aa?auto=format&fit=crop&w=700&q=80', 'On-stage finals'],
            ['https://images.unsplash.com/photo-1571266028243-d220bc562a52?auto=format&fit=crop&w=700&q=80', 'Esports tournament'],
            ['https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&w=700&q=80', 'Hackathon kickoff'],
            ['https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&w=700&q=80', 'Crowd at the closing night'],
            ['https://images.unsplash.com/photo-1485846234645-a62644f84728?auto=format&fit=crop&w=700&q=80', 'Short-film screening'],
            ['https://images.unsplash.com/photo-1496337589254-7e19d01cec44?auto=format&fit=crop&w=700&q=80', 'Quiz finals'],
            ['https://images.unsplash.com/photo-1531058020387-3be344556be6?auto=format&fit=crop&w=700&q=80', 'Open mic'],
            ['https://images.unsplash.com/photo-1559223607-a43c990c692c?auto=format&fit=crop&w=700&q=80', 'Workshop floor'],
            ['https://images.unsplash.com/photo-1604079628040-94301bb21b91?auto=format&fit=crop&w=700&q=80', 'Award ceremony'],
            ['https://images.unsplash.com/photo-1574391884720-bbc049ec09ad?auto=format&fit=crop&w=700&q=80', 'Cultural night'],
            ['https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&w=700&q=80', 'Food fest after-party'],
        ];
        ?>
        <div class="gallery-grid">
            <?php foreach ($shots as $s): ?>
                <div class="g-item">
                    <img src="<?php echo htmlspecialchars($s[0]); ?>" alt="<?php echo htmlspecialchars($s[1]); ?>" loading="lazy">
                    <div class="caption"><?php echo htmlspecialchars($s[1]); ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-5">
            <p class="text-muted-2 mb-3">Want your event featured here?</p>
            <a href="contact.php" class="btn btn-app"><i class="bi bi-camera"></i> Submit photos</a>
        </div>
    </div>
</section>

<?php require 'utils/footer.php'; ?>
</body>
</html>
