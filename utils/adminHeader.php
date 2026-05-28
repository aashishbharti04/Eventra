<?php
// Admin navigation header.
$page = $page ?? '';
?>
<div class="topbar">
    <div class="container d-flex justify-content-between align-items-center">
        <div><span class="pill">Admin</span> <i class="bi bi-shield-check me-1"></i> Eventra console</div>
        <div>Logged in as <b>admin</b> &middot; <a href="index.php"><i class="bi bi-box-arrow-right me-1"></i>Exit to site</a></div>
    </div>
</div>
<nav class="app-nav navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand app-brand" href="adminPage.php">
            <span class="logo-mark">E</span>
            <span>Eventra Admin
                <small>by Aashish</small>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="adminNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-1">
                <li class="nav-item"><a class="nav-link <?php echo $page==='dash'?'active':''; ?>" href="adminPage.php"><i class="bi bi-speedometer2 me-1"></i>Dashboard</a></li>
                <li class="nav-item"><a class="nav-link <?php echo $page==='students'?'active':''; ?>" href="Stu_details.php"><i class="bi bi-people me-1"></i>Students</a></li>
                <li class="nav-item"><a class="nav-link <?php echo $page==='scoord'?'active':''; ?>" href="Stu_cordinator.php"><i class="bi bi-person-badge me-1"></i>Student Coord.</a></li>
                <li class="nav-item"><a class="nav-link <?php echo $page==='stcoord'?'active':''; ?>" href="Staff_cordinator.php"><i class="bi bi-person-vcard me-1"></i>Staff Coord.</a></li>
                <li class="nav-item"><a class="nav-link" href="createEventForm.php"><i class="bi bi-plus-circle me-1"></i>New Event</a></li>
                <li class="nav-item ms-lg-2"><a class="btn btn-app-ghost" href="index.php"><i class="bi bi-box-arrow-right"></i>Logout</a></li>
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
