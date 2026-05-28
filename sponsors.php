<?php $page = 'sponsors'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sponsors &mdash; Eventra</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
<?php require 'utils/header.php'; ?>

<section class="page-strip">
    <div class="container">
        <div class="crumbs"><a href="index.php">Home</a> &nbsp;/&nbsp; Sponsors</div>
        <h1>Partner with the next big college fest.</h1>
        <p class="text-white-50" style="max-width:680px;">2,500+ engaged students. Hands-on talent. Real reach across campus. Here's how brands can plug into Eventra.</p>
    </div>
</section>

<section class="section pt-0">
    <div class="container">

        <!-- Current sponsors -->
        <div class="text-center mb-5">
            <div class="section-eyebrow">Our community</div>
            <h2>Trusted by these crews</h2>
        </div>
        <div class="sponsor-row mb-5">
            <span class="sponsor-tile"><i class="bi bi-mortarboard-fill"></i> CampusOne</span>
            <span class="sponsor-tile"><i class="bi bi-cpu"></i> CodeWith Asur</span>
            <span class="sponsor-tile"><i class="bi bi-controller"></i> ArenaX</span>
            <span class="sponsor-tile"><i class="bi bi-mic-fill"></i> StageHQ</span>
            <span class="sponsor-tile"><i class="bi bi-palette"></i> CraftLab</span>
            <span class="sponsor-tile"><i class="bi bi-people-fill"></i> StudentVerse</span>
            <span class="sponsor-tile"><i class="bi bi-rocket-takeoff-fill"></i> LaunchPad</span>
            <span class="sponsor-tile"><i class="bi bi-camera-reels-fill"></i> ReelHub</span>
        </div>

        <!-- Tier cards -->
        <div class="text-center mb-4 mt-5">
            <div class="section-eyebrow">Tiers</div>
            <h2>Pick a sponsorship level</h2>
            <p class="section-sub">Three simple tiers. No hidden fees. Custom packages available on request.</p>
        </div>

        <div class="row g-4">
            <!-- Tier 1 -->
            <div class="col-md-4">
                <div class="surface-card h-100" style="padding:1.8rem;">
                    <div class="ico" style="width:48px;height:48px;border-radius:12px;background:rgba(124,58,237,.13);color:var(--brand);display:inline-flex;align-items:center;justify-content:center;margin-bottom:.8rem;"><i class="bi bi-stars fs-5"></i></div>
                    <div class="kicker">Bronze</div>
                    <h2 class="mb-1">₹5,000</h2>
                    <p class="text-muted-2 mb-3">One-event partnership</p>
                    <ul class="list-unstyled mb-3" style="color:var(--text);">
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Logo on event page</li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Social media mention</li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Booth space</li>
                    </ul>
                    <a href="contact.php?tier=bronze" class="btn btn-app-ghost w-100"><i class="bi bi-envelope"></i> Talk to us</a>
                </div>
            </div>
            <!-- Tier 2 (highlighted) -->
            <div class="col-md-4">
                <div class="surface-card h-100" style="padding:1.8rem;border:2px solid var(--brand);position:relative;box-shadow:var(--shadow-lg);">
                    <span class="position-absolute" style="top:-12px;right:18px;background:var(--coral);color:#fff;font-weight:800;padding:.25rem .7rem;border-radius:999px;font-size:.75rem;text-transform:uppercase;letter-spacing:.08em;">Most popular</span>
                    <div class="ico" style="width:48px;height:48px;border-radius:12px;background:rgba(249,115,22,.15);color:var(--coral);display:inline-flex;align-items:center;justify-content:center;margin-bottom:.8rem;"><i class="bi bi-award-fill fs-5"></i></div>
                    <div class="kicker">Silver</div>
                    <h2 class="mb-1">₹15,000</h2>
                    <p class="text-muted-2 mb-3">Category-wide partner</p>
                    <ul class="list-unstyled mb-3" style="color:var(--text);">
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Logo on every event in a category</li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Speaker / judge slot</li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Premium booth + banner</li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Email blast to participants</li>
                    </ul>
                    <a href="contact.php?tier=silver" class="btn btn-app w-100"><i class="bi bi-envelope"></i> Partner with us</a>
                </div>
            </div>
            <!-- Tier 3 -->
            <div class="col-md-4">
                <div class="surface-card h-100" style="padding:1.8rem;">
                    <div class="ico" style="width:48px;height:48px;border-radius:12px;background:rgba(16,185,129,.15);color:var(--emerald);display:inline-flex;align-items:center;justify-content:center;margin-bottom:.8rem;"><i class="bi bi-trophy-fill fs-5"></i></div>
                    <div class="kicker">Gold</div>
                    <h2 class="mb-1">₹40,000</h2>
                    <p class="text-muted-2 mb-3">Title sponsor</p>
                    <ul class="list-unstyled mb-3" style="color:var(--text);">
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Naming rights on the fest</li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Main-stage branding</li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Custom on-page hero block</li>
                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Hiring pipeline access</li>
                    </ul>
                    <a href="contact.php?tier=gold" class="btn btn-app-emerald w-100"><i class="bi bi-envelope"></i> Go all in</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require 'utils/footer.php'; ?>
</body>
</html>
