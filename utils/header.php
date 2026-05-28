<?php
// Public navigation header. $page can be set by including page for active-link highlighting.
$page = $page ?? '';
?>
<div class="topbar d-none d-md-block">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <span class="pill">Open Source</span>
            <i class="bi bi-envelope-fill me-1"></i>
            <a href="mailto:aashish@marketdoctorsonline.com">aashish@marketdoctorsonline.com</a>
            <span class="sep">|</span>
            <i class="bi bi-telephone-fill me-1"></i>
            <a href="tel:+919565263445">+91 95652 63445</a>
        </div>
        <div>
            <a href="https://github.com/aashishbharti04" target="_blank" rel="noopener" title="GitHub"><i class="bi bi-github"></i></a>
            <span class="sep">|</span>
            <a href="https://in.linkedin.com/in/aashana1012" target="_blank" rel="noopener" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
            <span class="sep">|</span>
            <a href="https://www.youtube.com/@CodeWithAsur" target="_blank" rel="noopener" title="YouTube"><i class="bi bi-youtube"></i></a>
            <span class="sep">|</span>
            <a href="https://www.instagram.com/asurwave1012?igsh=ZDBlY2NtczJ5cmMw" target="_blank" rel="noopener" title="Instagram"><i class="bi bi-instagram"></i></a>
        </div>
    </div>
</div>
<nav class="app-nav navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand app-brand" href="index.php">
            <span class="logo-mark">E</span>
            <span>Eventra
                <small>by Aashish</small>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-1">
                <li class="nav-item"><a class="nav-link <?php echo $page==='home'?'active':''; ?>" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link <?php echo $page==='events'?'active':''; ?>" href="index.php#events">Events</a></li>
                <li class="nav-item"><a class="nav-link <?php echo $page==='gallery'?'active':''; ?>" href="gallery.php">Gallery</a></li>
                <li class="nav-item"><a class="nav-link <?php echo $page==='faq'?'active':''; ?>" href="faq.php">FAQ</a></li>
                <li class="nav-item"><a class="nav-link <?php echo $page==='sponsors'?'active':''; ?>" href="sponsors.php">Sponsors</a></li>
                <li class="nav-item"><a class="nav-link <?php echo $page==='about'?'active':''; ?>" href="aboutus.php">About</a></li>
                <li class="nav-item"><a class="nav-link <?php echo $page==='contact'?'active':''; ?>" href="contact.php">Contact</a></li>
                <li class="nav-item ms-lg-2"><a class="btn btn-app" href="register.php"><i class="bi bi-rocket-takeoff"></i> Register</a></li>
                <li class="nav-item ms-lg-2">
                    <button class="theme-toggle" type="button" id="themeToggle" aria-label="Toggle dark mode">
                        <i class="bi bi-moon-stars-fill"></i>
                        <i class="bi bi-sun-fill"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
