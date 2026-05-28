<?php $page = 'about'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About &mdash; Eventra | by Aashish</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
<?php require 'utils/header.php'; ?>

<section class="page-strip">
    <div class="container">
        <div class="crumbs"><a href="index.php">Home</a> &nbsp;/&nbsp; About</div>
        <h1>About Eventra</h1>
        <p class="text-white-50" style="max-width:680px;">A modern open-source event platform &mdash; built by a student, for students.</p>
    </div>
</section>

<section class="section pt-0">
    <div class="container">
        <div class="row g-4 align-items-stretch">
            <!-- Owner card -->
            <div class="col-lg-5">
                <div class="owner-card h-100">
                    <div class="owner-avatar">A</div>
                    <h2 class="mb-1">Aashish</h2>
                    <div class="kicker mb-3">Founder · Developer · Maintainer</div>
                    <p>I'm Aashish &mdash; a full-stack developer behind Eventra. I designed and built every line of this platform end-to-end: the database schema, the PHP backend, the responsive UI, the admin console, dark mode, gallery, FAQ &mdash; all of it.</p>
                    <p>Eventra is my contribution to the open-source community. If you're a student looking for a polished project to deploy, learn from, or extend &mdash; this is yours. Free, forever.</p>
                    <hr class="divider">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="https://github.com/aashishbharti04" target="_blank" rel="noopener" class="btn btn-app-ghost"><i class="bi bi-github"></i> GitHub</a>
                        <a href="https://in.linkedin.com/in/aashana1012" target="_blank" rel="noopener" class="btn btn-app-ghost"><i class="bi bi-linkedin"></i> LinkedIn</a>
                        <a href="https://www.youtube.com/@CodeWithAsur" target="_blank" rel="noopener" class="btn btn-app-ghost"><i class="bi bi-youtube"></i> YouTube</a>
                        <a href="https://www.instagram.com/asurwave1012?igsh=ZDBlY2NtczJ5cmMw" target="_blank" rel="noopener" class="btn btn-app-ghost"><i class="bi bi-instagram"></i> Instagram</a>
                    </div>
                </div>
            </div>

            <!-- Mission / story -->
            <div class="col-lg-7">
                <div class="form-shell h-100">
                    <div class="kicker">Our mission</div>
                    <h2 class="mb-3">Make running a college fest as easy as booking a movie ticket.</h2>
                    <p>Eventra exists to give every college, every student-council, every hackathon organiser the same polished tooling that real SaaS products use &mdash; without the SaaS bill. Discovery, registration, coordination, analytics &mdash; all built in, all open source.</p>

                    <div class="row g-3 mt-3">
                        <div class="col-md-6">
                            <div class="surface-card" style="padding:1.2rem;background:var(--surface-2);">
                                <div class="kicker"><i class="bi bi-lightning-charge-fill" style="color:var(--coral);"></i> Built for speed</div>
                                <p class="mb-0 small">PHP + MySQL backend that runs on any classic LAMP / WAMP / XAMPP stack &mdash; deploy in minutes.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="surface-card" style="padding:1.2rem;background:var(--surface-2);">
                                <div class="kicker"><i class="bi bi-shield-check" style="color:var(--emerald);"></i> Role-aware</div>
                                <p class="mb-0 small">Separate flows for students, student / staff coordinators and the admin console.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="surface-card" style="padding:1.2rem;background:var(--surface-2);">
                                <div class="kicker"><i class="bi bi-palette-fill" style="color:var(--brand);"></i> Modern UI + dark mode</div>
                                <p class="mb-0 small">Fully responsive Bootstrap 5 design system with a built-in dark mode toggle.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="surface-card" style="padding:1.2rem;background:var(--surface-2);">
                                <div class="kicker"><i class="bi bi-unlock-fill" style="color:var(--coral);"></i> 100% open source</div>
                                <p class="mb-0 small">MIT licensed. Use it for your project, fork it, deploy it &mdash; make it your college's own.</p>
                            </div>
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
