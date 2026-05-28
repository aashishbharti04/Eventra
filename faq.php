<?php $page = 'faq'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FAQ &mdash; Eventra</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
<?php require 'utils/header.php'; ?>

<section class="page-strip">
    <div class="container">
        <div class="crumbs"><a href="index.php">Home</a> &nbsp;/&nbsp; FAQ</div>
        <h1>Frequently asked questions</h1>
        <p class="text-white-50" style="max-width:680px;">Everything students and organisers ask us &mdash; answered. Didn't find your question? <a href="contact.php">Ping us</a>.</p>
    </div>
</section>

<section class="section pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                <?php
                $faqs = [
                    ['Is Eventra really free for college projects?',
                     'Yes, 100%. Eventra is MIT-licensed, which means you can use it for your mini-project, major-project, fest, hackathon submission or even your college\'s official event portal — for free, forever. You can even modify and rebrand it.'],

                    ['What stack does Eventra run on?',
                     'PHP 8 + MySQL/MariaDB on the backend, Bootstrap 5 + a custom theme on the frontend. No build step, no Node.js dependency. If you can run XAMPP or WAMP, you can run Eventra.'],

                    ['How long does it take to deploy?',
                     'Less than 10 minutes on XAMPP / WAMP / Laragon: drop the folder into htdocs, import cems.sql via phpMyAdmin, open localhost. That\'s it.'],

                    ['Can I use Eventra for my college\'s actual fest?',
                     'Absolutely — that\'s exactly what it\'s built for. You\'ll want to change the default admin password, point it at your real database, and replace the demo Unsplash images with your own. Everything else just works.'],

                    ['Does it work on mobile?',
                     'Yes. The entire UI is built mobile-first with Bootstrap 5 — every page is fully responsive, including the admin dashboard and tables.'],

                    ['Is there a dark mode?',
                     'Yes. Tap the moon icon in the navbar — your choice is remembered across visits. It also respects your OS-level dark mode preference by default.'],

                    ['Can I submit a pull request?',
                     'Please do! Eventra is open source on GitHub. Bug fixes, new features, theme variants — all welcome.'],

                    ['Who owns and maintains Eventra?',
                     'Eventra is built and maintained by Aashish. You can reach me at aashish@marketdoctorsonline.com or +91 95652 63445 for anything — bug reports, feature requests, or just to say hi.'],

                    ['Can I rebrand and white-label Eventra?',
                     'Yes, MIT license allows it. Replace the logo mark, change the brand name in utils/header.php and utils/footer.php, swap the colours in css/app.css, and you have a college portal under your own brand.'],
                ];
                foreach ($faqs as $f): ?>
                    <details class="faq-item">
                        <summary><?php echo htmlspecialchars($f[0]); ?></summary>
                        <div class="answer"><?php echo htmlspecialchars($f[1]); ?></div>
                    </details>
                <?php endforeach; ?>

                <div class="newsletter mt-5">
                    <div class="row align-items-center">
                        <div class="col-lg-8 position-relative">
                            <h3 class="mb-1">Still have a question?</h3>
                            <p class="mb-0" style="color:#e9d5ff;">Reach out directly &mdash; I respond personally, usually within 24 hours.</p>
                        </div>
                        <div class="col-lg-4 text-lg-end mt-3 mt-lg-0 position-relative">
                            <a href="contact.php" class="btn btn-app-accent"><i class="bi bi-chat-dots"></i> Contact us</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php require 'utils/footer.php'; ?>
</body>
</html>
