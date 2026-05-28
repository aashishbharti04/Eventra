<div align="center">

# 🎉 Eventra

### The student-first event platform for modern colleges.

A modern, **open-source** event management platform — discover events, register, coordinate, and run a world-class college fest without breaking a sweat.

[![License: MIT](https://img.shields.io/badge/License-MIT-22c55e.svg?style=for-the-badge)](LICENSE)
[![Free for College Projects](https://img.shields.io/badge/Free%20for-College%20Projects-7c3aed?style=for-the-badge)](#-free-for-college-projects)
[![PHP](https://img.shields.io/badge/Built%20with-PHP%208-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![Bootstrap 5](https://img.shields.io/badge/UI-Bootstrap%205-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
[![MySQL](https://img.shields.io/badge/DB-MySQL%20%2F%20MariaDB-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Dark Mode](https://img.shields.io/badge/Dark%20Mode-Yes-0b1120?style=for-the-badge)](#-features)
[![Made by Aashish](https://img.shields.io/badge/Made%20by-Aashish-f97316?style=for-the-badge)](#-owner--maintainer)

</div>

---

## 💜 Free for college projects

> **Eventra is 100% free and open source. Use it for your college mini-project, major-project, fest, hackathon submission, or even your college's official event portal — for free, forever. Fork it, deploy it, rebrand it, submit it. No strings attached.**

If Eventra helps you land an A+, **a ⭐ on this repo is the only thanks I'll ever ask for.** 🚀

---

## ✨ Features

- **Modern, polished UI** — purple + coral gradient theme, asymmetric hero, glassmorphism navbar
- **🌙 Dark mode** — built-in toggle, remembers your choice, respects OS preference
- **⏱️ Live countdown** to the next big event on the homepage
- **Featured event** strip on home
- **Gallery page** — masonry layout of past events
- **FAQ accordion** — answers the common student/organiser questions
- **Sponsors page** — three-tier sponsorship cards (Bronze / Silver / Gold)
- **Testimonials, stats strip, newsletter signup** — full marketing-site polish
- **Admin dashboard** — KPI tiles, full events table, quick actions
- **Role-aware flows** — student, student coordinator, staff coordinator, admin
- **My Events lookup** — students find their registered events by USN
- **DB-offline friendly** — preview the whole site even without MySQL connected
- **Mobile-first responsive** — every page works on phones, tablets, desktops
- **404 page** — branded, helpful, doesn't dead-end users
- **Mailto-fallback forms** — contact and newsletter work without a mail server

---

## 🛠️ Tech stack

| Layer        | Tech                                              |
| ------------ | ------------------------------------------------- |
| Backend      | PHP 8 (mysqli)                                    |
| Database     | MySQL / MariaDB (schema in `cems.sql`)            |
| Frontend     | Bootstrap 5.3 + Bootstrap Icons + custom CSS theme (`css/app.css`) |
| Fonts        | Plus Jakarta Sans (Google Fonts)                  |
| Imagery      | Unsplash CDN (free, hotlinkable)                  |
| Build        | **None.** No Node, no webpack, no bundler.        |

---

## 🚀 Quick start (10 minutes)

### Option A — Full stack (recommended)

1. Install **XAMPP / WAMP / Laragon** (any LAMP-style bundle).
2. Drop this project into your web root (e.g. `htdocs/`).
3. Open **phpMyAdmin** → create a database named `cems` → **Import** `cems.sql`.
4. Visit <http://localhost/Eventra/> (or whatever folder name you used).

### Option B — PHP only (preview without DB)

```bash
# from the project root
php -S localhost:8000
```

Open <http://localhost:8000>. Static pages render perfectly. Pages that need MySQL show a friendly "Database not connected" banner instead of a fatal error.

---

## 🔑 Default credentials

| Role  | Username | Password |
| ----- | -------- | -------- |
| Admin | `admin`  | `admin`  |

> **Important:** change these in `login_form.php` before deploying to a public server.

---

## 📁 Folder structure

```
.
├── index.php                 # Home (hero + countdown, stats, categories, featured, testimonials, newsletter)
├── aboutus.php               # About + owner card
├── contact.php               # Owner contact + message form
├── gallery.php               # Past-events masonry gallery
├── faq.php                   # FAQ accordion
├── sponsors.php              # Sponsorship tiers + partner crews
├── register.php              # Student registration
├── usn.php                   # "Find my events" lookup
├── RegisteredEvents.php      # Per-USN event list
├── login_form.php            # Admin login
├── adminPage.php             # Admin dashboard (KPI tiles + events table)
├── createEventForm.php       # Create event
├── deleteEvent.php           # Delete event
├── Stu_details.php           # All student registrations
├── Stu_cordinator.php        # Student coordinators table
├── Staff_cordinator.php      # Staff coordinators table
├── updateStudent.php         # Edit student coordinator
├── updateStaff.php           # Edit staff coordinator
├── viewEvent.php             # Browse events of a category
├── events.php                # Legacy event-row partial (kept for compat)
├── 404.php                   # Friendly not-found page
├── cems.sql                  # Database schema + seed data
├── classes/db1.php           # DB connection (non-fatal on failure)
├── utils/
│   ├── styles.php            # Shared <head> (Bootstrap + theme + dark-mode init)
│   ├── header.php            # Public navbar + topbar + theme toggle
│   ├── adminHeader.php       # Admin navbar
│   └── footer.php            # Global footer with social links + scripts
├── css/app.css               # Custom theme (the entire look lives here)
├── LICENSE                   # MIT
└── README.md
```

---

## 🎨 Make it your own

1. **Rename the brand** — change `Eventra` in `utils/header.php`, `utils/footer.php`, and the `<title>` of each page.
2. **Recolour** — edit the CSS variables at the top of `css/app.css` (look for `:root`).
3. **Swap the logo mark** — the inline SVG is in `utils/styles.php` (`<link rel="icon">`).
4. **Replace event images** — point `img_link` in `cems.sql` at your own URLs, or change the Unsplash URLs in `index.php`.

That's it. No build step, no compile — refresh the page and you're done.

---

## 👤 Owner & Maintainer

Built and maintained with care by **Aashish**.

| Channel    | Link                                                                 |
| ---------- | -------------------------------------------------------------------- |
| 📧 Email   | <aashish@marketdoctorsonline.com>                                    |
| 📱 Phone   | **+91 95652 63445**                                                  |
| 🐙 GitHub  | [@aashishbharti04](https://github.com/aashishbharti04)               |
| 💼 LinkedIn| [aashana1012](https://in.linkedin.com/in/aashana1012)                |
| ▶️ YouTube | [@CodeWithAsur](https://www.youtube.com/@CodeWithAsur)               |
| 📸 Instagram | [@asurwave1012](https://www.instagram.com/asurwave1012)            |

---

## 🤝 Contributing

PRs welcome. Bug reports, feature requests, theme variants, translations — all appreciated. Open an issue first if it's a big change so we can align.

---

## 📜 License

[MIT](LICENSE) © Aashish. Free to fork, deploy, rebrand and submit. Use it for your college project — that's literally what it's for.

<div align="center">

If Eventra helped you, drop a ⭐ — it costs nothing and means a lot. 💜

</div>
