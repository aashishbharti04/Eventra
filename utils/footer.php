<?php // Global footer. All owner / contact info lives here. ?>
<footer class="app-footer">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <div class="brand-block">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="logo-mark">E</span>
                        <div>
                            <h5 class="mb-0" style="letter-spacing:0; font-size:1.2rem; text-transform:none; color:#fff;">Eventra</h5>
                            <small style="color:#94a3b8;">by Aashish · Open Source</small>
                        </div>
                    </div>
                    <p style="color:#cbd5e1;">A modern, open-source event platform for colleges. Use it for any student or college project &mdash; free, forever. Built end-to-end by <b style="color:#fff;">Aashish</b>.</p>
                    <div class="socials">
                        <a href="https://github.com/aashishbharti04" target="_blank" rel="noopener" aria-label="GitHub"><i class="bi bi-github"></i></a>
                        <a href="https://in.linkedin.com/in/aashana1012" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                        <a href="https://www.youtube.com/@CodeWithAsur" target="_blank" rel="noopener" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                        <a href="https://www.instagram.com/asurwave1012?igsh=ZDBlY2NtczJ5cmMw" target="_blank" rel="noopener" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-6">
                <h5>Product</h5>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#events">Events</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                    <li><a href="sponsors.php">Sponsors</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-6 col-6">
                <h5>Account</h5>
                <ul>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="usn.php">My Events</a></li>
                    <li><a href="login_form.php">Admin</a></li>
                    <li><a href="aboutus.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6">
                <h5>Get in touch</h5>
                <div class="contact-row">
                    <span class="ico"><i class="bi bi-envelope-fill"></i></span>
                    <a href="mailto:aashish@marketdoctorsonline.com">aashish@marketdoctorsonline.com</a>
                </div>
                <div class="contact-row">
                    <span class="ico"><i class="bi bi-telephone-fill"></i></span>
                    <a href="tel:+919565263445">+91 95652 63445</a>
                </div>
                <div class="contact-row">
                    <span class="ico"><i class="bi bi-person-badge-fill"></i></span>
                    <span>Owner &amp; Maintainer &mdash; <b style="color:#fff;">Aashish</b></span>
                </div>
                <div class="contact-row">
                    <span class="ico"><i class="bi bi-geo-alt-fill"></i></span>
                    <span>India &mdash; available worldwide (remote)</span>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            &copy; <?php echo date('Y'); ?> <b style="color:#fff;">Eventra</b>.
            Designed &amp; developed with <span class="heart">&hearts;</span> by
            <a href="mailto:aashish@marketdoctorsonline.com" style="color:#f97316; font-weight:700;">Aashish</a>.
            <span class="opensource-badge"><i class="bi bi-unlock-fill"></i> MIT &middot; Free for college projects</span>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Theme toggle
    (function () {
        var btn = document.getElementById('themeToggle');
        if (!btn) return;
        btn.addEventListener('click', function () {
            var cur = document.documentElement.getAttribute('data-theme') === 'dark' ? 'dark' : 'light';
            var next = cur === 'dark' ? 'light' : 'dark';
            if (next === 'dark') document.documentElement.setAttribute('data-theme', 'dark');
            else document.documentElement.removeAttribute('data-theme');
            try { localStorage.setItem('eventra-theme', next); } catch (e) {}
        });
    })();

    // Countdown (only fires if a target element is present)
    (function () {
        var el = document.getElementById('countdownGrid');
        if (!el) return;
        var target = new Date(el.getAttribute('data-target')).getTime();
        function tick() {
            var diff = target - Date.now();
            if (diff < 0) diff = 0;
            var d = Math.floor(diff / 86400000);
            var h = Math.floor((diff % 86400000) / 3600000);
            var m = Math.floor((diff % 3600000) / 60000);
            var s = Math.floor((diff % 60000) / 1000);
            var nums = el.querySelectorAll('.num');
            nums[0].textContent = String(d).padStart(2, '0');
            nums[1].textContent = String(h).padStart(2, '0');
            nums[2].textContent = String(m).padStart(2, '0');
            nums[3].textContent = String(s).padStart(2, '0');
        }
        tick(); setInterval(tick, 1000);
    })();
</script>
