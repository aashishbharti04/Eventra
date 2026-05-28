<?php
$page = 'home';
// Countdown target = 21 days from page render (so the timer always feels live).
$next_event_ts = strtotime('+21 days');
$next_event_iso = date('c', $next_event_ts);
$next_event_human = date('D, d M Y · 10:00 AM', $next_event_ts);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eventra &mdash; Modern college event platform | by Aashish</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
<?php require 'utils/header.php'; ?>

<!-- HERO -->
<section class="hero-v2">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="eyebrow"><span class="dot"></span> Live · 2026 fest season is open</span>
                <h1>The student-first <span class="grad">event platform</span> for modern colleges.</h1>
                <p class="lead-2 mt-3">Eventra brings discovery, registration, coordination and analytics into one beautifully simple system &mdash; so every college can run a world-class fest without breaking a sweat.</p>
                <div class="hero-actions">
                    <a href="#events" class="btn btn-app"><i class="bi bi-calendar-event"></i> Browse events</a>
                    <a href="register.php" class="btn btn-app-ghost"><i class="bi bi-person-plus"></i> Register free</a>
                </div>
                <div class="trust-line">
                    <span class="avatars">
                        <span>A</span><span>P</span><span>R</span><span>K</span>
                    </span>
                    <span><b>2,500+ students</b> already on Eventra · <i class="bi bi-star-fill" style="color:var(--coral);"></i> 4.9 average rating</span>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="countdown-card">
                    <span class="kicker">Next big event</span>
                    <h3>Crypto Hunt &mdash; Season 6</h3>
                    <div class="meta-row mb-2"><i class="bi bi-geo-alt-fill"></i> Main Auditorium, Block A</div>
                    <div class="meta-row mb-3"><i class="bi bi-calendar3"></i> <?php echo $next_event_human; ?></div>

                    <div class="countdown-grid" id="countdownGrid" data-target="<?php echo $next_event_iso; ?>">
                        <div class="unit"><div class="num">00</div><div class="lbl">Days</div></div>
                        <div class="unit"><div class="num">00</div><div class="lbl">Hours</div></div>
                        <div class="unit"><div class="num">00</div><div class="lbl">Min</div></div>
                        <div class="unit"><div class="num">00</div><div class="lbl">Sec</div></div>
                    </div>

                    <div class="d-flex gap-2 mt-3">
                        <a href="register.php" class="btn btn-app-accent flex-fill"><i class="bi bi-bookmark-plus"></i> Reserve seat</a>
                        <a href="viewEvent.php?id=1" class="btn btn-app-ghost"><i class="bi bi-info-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- STATS -->
<section class="section pt-0 bg-soft">
    <div class="container">
        <div class="row g-3" style="margin-top:-3rem;">
            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="ico"><i class="bi bi-calendar-week-fill"></i></div>
                    <div class="num">14+</div>
                    <div class="label">Active events</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="ico" style="background:rgba(244,63,94,.13);color:var(--rose);"><i class="bi bi-collection-fill"></i></div>
                    <div class="num">4</div>
                    <div class="label">Categories</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="ico" style="background:rgba(249,115,22,.15);color:var(--coral);"><i class="bi bi-people-fill"></i></div>
                    <div class="num">2,500+</div>
                    <div class="label">Students</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stat-card">
                    <div class="ico" style="background:rgba(16,185,129,.15);color:var(--emerald);"><i class="bi bi-trophy-fill"></i></div>
                    <div class="num">₹50K</div>
                    <div class="label">Prize pool</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CATEGORIES -->
<section class="section" id="events">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-eyebrow">What's on</div>
            <h2 class="section-title">Pick your category, find your stage</h2>
            <p class="section-sub">Four categories. Dozens of events. One platform that makes it ridiculously easy to discover, register and show up.</p>
        </div>

        <div class="cat-grid">
            <a href="viewEvent.php?id=1" class="cat-tile cat-tech">
                <div class="ico-wrap"><i class="bi bi-cpu-fill"></i></div>
                <h3>Technical</h3>
                <p>Hackathons, cryptohunts, competitive coding and tech quizzes — sharpen your engineering edge.</p>
                <div class="row-foot"><span>4 events</span><span class="arrow"><i class="bi bi-arrow-right"></i></span></div>
            </a>
            <a href="viewEvent.php?id=2" class="cat-tile cat-game">
                <div class="ico-wrap"><i class="bi bi-controller"></i></div>
                <h3>Gaming Arena</h3>
                <p>PUBG, Counter-Strike, FIFA leagues and console showdowns — bring your squad, bring your A-game.</p>
                <div class="row-foot"><span>2 events</span><span class="arrow"><i class="bi bi-arrow-right"></i></span></div>
            </a>
            <a href="viewEvent.php?id=3" class="cat-tile cat-stage">
                <div class="ico-wrap"><i class="bi bi-music-note-beamed"></i></div>
                <h3>On-Stage</h3>
                <p>Dance battles, singing, fashion show, Idol contests — own the spotlight and steal the night.</p>
                <div class="row-foot"><span>4 events</span><span class="arrow"><i class="bi bi-arrow-right"></i></span></div>
            </a>
            <a href="viewEvent.php?id=4" class="cat-tile cat-off">
                <div class="ico-wrap"><i class="bi bi-palette-fill"></i></div>
                <h3>Off-Stage Talent</h3>
                <p>Cooking without fire, mehandi, rangoli, short films — craft, taste and tell a story.</p>
                <div class="row-foot"><span>4 events</span><span class="arrow"><i class="bi bi-arrow-right"></i></span></div>
            </a>
        </div>
    </div>
</section>

<!-- FEATURED EVENT STRIP -->
<section class="section pt-0">
    <div class="container">
        <div class="feature-strip">
            <div class="row align-items-center">
                <div class="col-lg-8 position-relative">
                    <span class="pill"><i class="bi bi-stars me-1"></i> Featured this week</span>
                    <h2 class="mb-2">Tech Quiz Marathon &mdash; 24-hour edition</h2>
                    <p class="mb-0" style="color:#e9d5ff;max-width:560px;">A non-stop quiz battle across CS, electronics and AI. Solo or team-of-3, top three teams take home cash prizes and internship leads from our partner companies.</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0 position-relative">
                    <a href="register.php" class="btn btn-app-accent"><i class="bi bi-bookmark-plus"></i> Reserve my seat</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- WHY EVENTRA -->
<section class="section bg-soft">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-eyebrow">Why Eventra</div>
            <h2 class="section-title">Built for students. Loved by organisers.</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="surface-card h-100">
                    <div class="ico" style="width:48px;height:48px;border-radius:12px;background:rgba(124,58,237,.13);color:var(--brand);display:inline-flex;align-items:center;justify-content:center;margin-bottom:.8rem;"><i class="bi bi-lightning-charge-fill fs-5"></i></div>
                    <h3>Lightning fast</h3>
                    <p>Server-rendered PHP, zero build steps. Deploy on any LAMP / WAMP / XAMPP stack in minutes.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="surface-card h-100">
                    <div class="ico" style="width:48px;height:48px;border-radius:12px;background:rgba(249,115,22,.13);color:var(--coral);display:inline-flex;align-items:center;justify-content:center;margin-bottom:.8rem;"><i class="bi bi-shield-lock-fill fs-5"></i></div>
                    <h3>Role-aware</h3>
                    <p>Separate flows for students, student / staff coordinators and the admin dashboard.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="surface-card h-100">
                    <div class="ico" style="width:48px;height:48px;border-radius:12px;background:rgba(16,185,129,.13);color:var(--emerald);display:inline-flex;align-items:center;justify-content:center;margin-bottom:.8rem;"><i class="bi bi-unlock-fill fs-5"></i></div>
                    <h3>Open source</h3>
                    <p>MIT licensed. Use Eventra free, forever — for your college project, fest, hackathon or class assignment.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="section">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-eyebrow">Loved by students</div>
            <h2 class="section-title">What people say</h2>
        </div>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="testimonial">
                    <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                    <p class="quote">&ldquo;We pulled off our entire two-day fest on Eventra. Registration, attendance, coordinator handoffs &mdash; everything in one place.&rdquo;</p>
                    <div class="person">
                        <span class="ava">P</span>
                        <div><div class="who">Priya S.</div><div class="role">Student Council, CSE</div></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial">
                    <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                    <p class="quote">&ldquo;Forked the repo, deployed on XAMPP in 15 minutes, and it became our internal college event portal. Insanely well-built.&rdquo;</p>
                    <div class="person">
                        <span class="ava">R</span>
                        <div><div class="who">Rahul V.</div><div class="role">Final-year ISE</div></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial">
                    <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                    <p class="quote">&ldquo;Beautiful UI, dark mode, and the admin dashboard is exactly what we needed. Submitted as our mini-project &mdash; got an A+.&rdquo;</p>
                    <div class="person">
                        <span class="ava">K</span>
                        <div><div class="who">Kavya M.</div><div class="role">3rd-year ECE</div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TRUSTED BY / SPONSORS LITE -->
<section class="section pt-0">
    <div class="container">
        <div class="text-center mb-4">
            <div class="section-eyebrow">Trusted by communities</div>
        </div>
        <div class="sponsor-row">
            <span class="sponsor-tile"><i class="bi bi-mortarboard-fill"></i> CampusOne</span>
            <span class="sponsor-tile"><i class="bi bi-cpu"></i> CodeWith Asur</span>
            <span class="sponsor-tile"><i class="bi bi-controller"></i> ArenaX</span>
            <span class="sponsor-tile"><i class="bi bi-mic-fill"></i> StageHQ</span>
            <span class="sponsor-tile"><i class="bi bi-palette"></i> CraftLab</span>
            <span class="sponsor-tile"><i class="bi bi-people-fill"></i> StudentVerse</span>
        </div>
    </div>
</section>

<!-- NEWSLETTER -->
<section class="section pt-0">
    <div class="container">
        <div class="newsletter position-relative">
            <div class="row align-items-center">
                <div class="col-lg-7 position-relative">
                    <h3 class="mb-2">Never miss an event drop.</h3>
                    <p class="mb-0" style="color:#e9d5ff;">Get a 1-line email when registrations open for the next big event. No spam — ever.</p>
                </div>
                <div class="col-lg-5 position-relative mt-3 mt-lg-0">
                    <form action="mailto:aashish@marketdoctorsonline.com" method="get" enctype="text/plain" class="d-flex gap-2">
                        <input type="email" class="form-control" name="subject" placeholder="you@college.edu" required>
                        <button class="btn btn-app-accent" type="submit"><i class="bi bi-send"></i> Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require 'utils/footer.php'; ?>
</body>
</html>
