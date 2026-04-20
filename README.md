# KareVault Internship Portal

![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=flat&logo=laravel&logoColor=white)
![Blade](https://img.shields.io/badge/Blade-Templates-FF2D20?style=flat)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-06B6D4?style=flat&logo=tailwindcss&logoColor=white)
![License](https://img.shields.io/badge/License-Proprietary-gray?style=flat)

A full-stack web application for managing KareVault's internship programme. Applicants can register, submit their profile, and track their application status, while the admin team can review and manage all submissions from a dedicated dashboard.


## Screenshots

![App Screenshot](public/images/intern-screenshot.png)

---

## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Project Structure](#project-structure)
- [Getting Started](#getting-started)
- [Authentication & Roles](#authentication--roles)
- [Pages & Routes](#pages--routes)
- [Application Status Flow](#application-status-flow)
- [Contributing](#contributing)

---

## Overview

The KareVault Internship Portal handles the full internship application cycle for KareVault, a Nigerian digital health and insurtech company. Candidates apply for one of 8 open roles, monitor their progress in real time, and get notified of decisions through their personal dashboard.

---

## Features

### Applicant-Facing
- Public landing page covering programme details, benefits, available roles, and how to apply
- Registration and login with profile submission (school, CGPA, department, state, preferred role)
- Personal dashboard with live application status (Pending, Approved, or Rejected)
- Visual progress timeline showing which stage the application is at
- Read-only summary of the submitted profile

### Admin-Facing
- Secure admin dashboard with a summary of application counts (total, pending, approved, rejected)
- Applicant table filterable by status with pagination
- Per-applicant profile page showing full submission details
- Status update form with support for internal admin notes
- Colour-coded flash messages depending on the action taken (green for approved, red for rejected, amber for pending)

---

## Tech Stack

| Layer | Technology |
|---|---|
| Framework | Laravel 11.x |
| Templating | Blade (with component layout system) |
| Styling | Tailwind CSS 3.x (custom utility classes) |
| Auth | Laravel built-in auth (`auth()->user()`) |
| Database | MySQL / PostgreSQL (via Eloquent ORM) |
| Sessions & Flash | Laravel session flash messages |

---

## Project Structure

```
resources/
└── views/
    ├── components/
    │   ├── layout.blade.php       # Base layout wrapper
    │   ├── nav.blade.php          # Public navigation
    │   └── footer.blade.php       # Site footer
    ├── home.blade.php             # Public landing page
    ├── dashboard.blade.php        # Applicant dashboard (auth)
    └── admin/
        ├── dashboard.blade.php    # Admin applicant management table
        └── profile.blade.php      # Individual applicant detail and status update

app/
└── Models/
    ├── User.php                   # Fields: name, email, age, school, department, cgpa, state
    └── Application.php            # Fields: role_applied_for, status, admin_notes, reviewed_at
```

---

## Getting Started

### Prerequisites

- PHP 8.2+
- Composer
- Node.js 18+ and npm
- MySQL or SQLite

### Installation

```bash
# 1. Clone the repository
git clone https://github.com/your-org/karevault-internship.git
cd karevault-internship

# 2. Install PHP dependencies
composer install

# 3. Install frontend dependencies
npm install && npm run build

# 4. Copy environment file
cp .env.example .env

# 5. Generate app key
php artisan key:generate

# 6. Run migrations
php artisan migrate

# 7. Start local server
php artisan serve
```

The app will be available at `http://localhost:8000`.

---

## Authentication & Roles

There are two user roles in the system:

| Role | Access |
|---|---|
| Applicant | Register, log in, view their own dashboard and application status |
| Admin | Access `/admin/dashboard`, view all applicants, and update statuses |

Admin access is gated via middleware. Make sure your admin user is seeded or flagged in the database (e.g. `is_admin = true`).

---

## Pages & Routes

| Method | Route | Description |
|---|---|---|
| GET | `/` | Public landing page |
| GET | `/register` | Applicant registration form |
| POST | `/register` | Submit application |
| GET | `/login` | Applicant login |
| POST | `/logout` | Log out |
| GET | `/dashboard` | Applicant application status dashboard |
| GET | `/admin/dashboard` | Admin view of all applicants, filterable by status |
| GET | `/admin/interns/{id}` | Admin view of an individual applicant profile |
| POST | `/admin/interns/{id}/status` | Admin action to update applicant status |

---

## Application Status Flow

```
Submitted -> Under Review (Pending) -> Approved or Not Selected (Rejected)
```

- All new applications start with `status = pending`
- Admins update the status from the applicant profile page
- The applicant dashboard reflects changes in real time
- Flash messages on the admin profile page are colour-coded:
  - **Green** for Approved
  - **Amber** for reset to Pending
  - **Red** for Rejected

---

## Available Internship Roles

The following roles are open each cycle:

- Frontend Development
- Backend Development
- UI/UX Design
- Data Science & AI
- DevOps & Cloud
- Product Management
- QA & Testing
- Technical Writing

---

## Contributing

This is an internal KareVault project. For bugs or feature requests, open an issue on the internal repository or reach out to the engineering team directly.

---

> Built with love by the KareVault Engineering Team · [karevault.com](https://karevault.com)
