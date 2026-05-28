<?php
// Shared <head> partial. Pulls Bootstrap 5 + Bootstrap Icons from CDN, then our app theme.
?>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="theme-color" content="#5b21b6">
<meta name="description" content="Eventra — modern open-source event management platform for colleges. Free to use for any student/college project. Built by Aashish.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="css/app.css">
<link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Cdefs%3E%3ClinearGradient id='g' x1='0' y1='0' x2='1' y2='1'%3E%3Cstop offset='0' stop-color='%236d28d9'/%3E%3Cstop offset='1' stop-color='%23f97316'/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect width='64' height='64' rx='16' fill='url(%23g)'/%3E%3Ctext x='50%25' y='62%25' text-anchor='middle' fill='white' font-family='Arial' font-weight='900' font-size='34'%3EE%3C/text%3E%3C/svg%3E">
<script>
    // Apply theme before paint to avoid a flash.
    (function () {
        try {
            // ?theme=dark|light overrides everything (useful for shareable links/screenshots)
            var qs = new URLSearchParams(window.location.search);
            var override = qs.get('theme');
            if (override === 'dark' || override === 'light') {
                if (override === 'dark') document.documentElement.setAttribute('data-theme', 'dark');
                try { localStorage.setItem('eventra-theme', override); } catch (e) {}
                return;
            }
            var saved = localStorage.getItem('eventra-theme');
            if (saved === 'dark' || (!saved && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.setAttribute('data-theme', 'dark');
            }
        } catch (e) {}
    })();
</script>
