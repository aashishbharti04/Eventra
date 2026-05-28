<?php $page = 'contact'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact &mdash; Eventra | by Aashish</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
<?php require 'utils/header.php'; ?>

<section class="page-strip">
    <div class="container">
        <div class="crumbs"><a href="index.php">Home</a> &nbsp;/&nbsp; Contact</div>
        <h1>Get in touch</h1>
        <p class="text-white-50" style="max-width:680px;">Questions about an event, partnerships, or want to deploy Eventra at your college? Reach out directly &mdash; I respond personally.</p>
    </div>
</section>

<section class="section pt-0">
    <div class="container">
        <div class="row g-4">
            <!-- Owner contact card -->
            <div class="col-lg-5">
                <div class="owner-card h-100">
                    <div class="owner-avatar">A</div>
                    <h2 class="mb-1">Aashish</h2>
                    <div class="kicker mb-3">Owner · Developer · Support</div>

                    <div class="surface-card" style="padding:.85rem 1rem;margin:.5rem 0;display:flex;align-items:center;gap:.7rem;background:var(--surface-2);">
                        <span style="width:36px;height:36px;border-radius:10px;background:rgba(124,58,237,.13);color:var(--brand);display:inline-flex;align-items:center;justify-content:center;flex:0 0 36px;"><i class="bi bi-envelope-fill"></i></span>
                        <div>
                            <div class="kicker" style="margin:0;font-size:.7rem;">Email</div>
                            <a href="mailto:aashish@marketdoctorsonline.com"><b>aashish@marketdoctorsonline.com</b></a>
                        </div>
                    </div>

                    <div class="surface-card" style="padding:.85rem 1rem;margin:.5rem 0;display:flex;align-items:center;gap:.7rem;background:var(--surface-2);">
                        <span style="width:36px;height:36px;border-radius:10px;background:rgba(249,115,22,.15);color:var(--coral);display:inline-flex;align-items:center;justify-content:center;flex:0 0 36px;"><i class="bi bi-telephone-fill"></i></span>
                        <div>
                            <div class="kicker" style="margin:0;font-size:.7rem;">Phone · WhatsApp</div>
                            <a href="tel:+919565263445"><b>+91 95652 63445</b></a>
                        </div>
                    </div>

                    <div class="surface-card" style="padding:.85rem 1rem;margin:.5rem 0;display:flex;align-items:center;gap:.7rem;background:var(--surface-2);">
                        <span style="width:36px;height:36px;border-radius:10px;background:rgba(16,185,129,.15);color:var(--emerald);display:inline-flex;align-items:center;justify-content:center;flex:0 0 36px;"><i class="bi bi-geo-alt-fill"></i></span>
                        <div>
                            <div class="kicker" style="margin:0;font-size:.7rem;">Based in</div>
                            <b>India &mdash; available remotely worldwide</b>
                        </div>
                    </div>

                    <hr class="divider">
                    <div class="kicker mb-2">Find me on</div>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="https://github.com/aashishbharti04" target="_blank" rel="noopener" class="btn btn-app-ghost"><i class="bi bi-github"></i> GitHub</a>
                        <a href="https://in.linkedin.com/in/aashana1012" target="_blank" rel="noopener" class="btn btn-app-ghost"><i class="bi bi-linkedin"></i> LinkedIn</a>
                        <a href="https://www.youtube.com/@CodeWithAsur" target="_blank" rel="noopener" class="btn btn-app-ghost"><i class="bi bi-youtube"></i> YouTube</a>
                        <a href="https://www.instagram.com/asurwave1012?igsh=ZDBlY2NtczJ5cmMw" target="_blank" rel="noopener" class="btn btn-app-ghost"><i class="bi bi-instagram"></i> Instagram</a>
                    </div>
                </div>
            </div>

            <!-- Message form (mailto fallback) -->
            <div class="col-lg-7">
                <div class="form-shell h-100">
                    <h2>Drop a message</h2>
                    <p class="lead">Fill the form below &mdash; it'll open your mail client addressed to me with everything pre-filled.</p>
                    <form action="mailto:aashish@marketdoctorsonline.com" method="get" enctype="text/plain">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Your name</label>
                                <input type="text" name="name" class="form-control" required placeholder="e.g. Priya Sharma">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Your email</label>
                                <input type="email" name="from" class="form-control" required placeholder="you@example.com">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Subject</label>
                                <input type="text" name="subject" class="form-control" required placeholder="What's this about?">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Message</label>
                                <textarea name="body" rows="6" class="form-control" required placeholder="Tell me a bit more..."></textarea>
                            </div>
                            <div class="col-12 d-flex gap-2 flex-wrap">
                                <button type="submit" class="btn btn-app"><i class="bi bi-send"></i> Send message</button>
                                <a href="tel:+919565263445" class="btn btn-app-ghost"><i class="bi bi-telephone"></i> Call instead</a>
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
