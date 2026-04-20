# KareVault Internship Portal

![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=flat&logo=laravel&logoColor=white)
![Blade](https://img.shields.io/badge/Blade-Templates-FF2D20?style=flat)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-06B6D4?style=flat&logo=tailwindcss&logoColor=white)
![License](https://img.shields.io/badge/License-Proprietary-gray?style=flat)

A full-stack web application for managing KareVault's internship programme — allowing applicants to register, track their application status, and enabling admins to review, approve, or reject candidates.

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

The KareVault Internship Portal is a Laravel/Blade application that powers the end-to-end internship application process for KareVault — Nigeria's leading digital health and insurtech company. Applicants can apply for one of 8 available roles, track their application in real time, and receive decisions from the admin team.

---

## Features

### Applicant-Facing
- Public landing page with programme details, benefits, roles, and application process
- Registration and login with profile submission (school, CGPA, department, state, role)
- Personal dashboard showing live application status (Pending / Approved / Rejected)
- Visual progress timeline reflecting application stage
- Submitted profile summary view

### Admin-Facing
- Secure admin dashboard with application statistics (total, pending, approved, rejected)
- Filterable applicant table by status
- Paginated applicant list with name, email, school, state, role, and status
- Individual applicant profile view with full details
- Status update form (Pending → Approved / Rejected) with internal admin notes
- Contextual flash messages (green for approved, red for rejected, amber for pending)

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
        └── profile.blade.php      # Individual applicant detail & status update

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
- Node.js 18+ & npm
- MySQL or PostgreSQL

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

The app uses two user roles:

| Role | Access |
|---|---|
| Applicant | Register, login, view own dashboard and application status |
| Admin | Access `/admin/dashboard`, view all applicants, update statuses |

Admin access is controlled via middleware. Ensure your admin user is seeded or manually flagged in the database (e.g. `is_admin = true`).

---

## Pages & Routes

| Method | Route | Description |
|---|---|---|
| GET | `/` | Public landing page |
| GET | `/register` | Applicant registration |
| POST | `/register` | Submit application |
| GET | `/login` | Applicant login |
| POST | `/logout` | Log out |
| GET | `/dashboard` | Applicant application status dashboard |
| GET | `/admin/dashboard` | Admin — all applicants (filterable by status) |
| GET | `/admin/interns/{id}` | Admin — individual applicant profile |
| POST | `/admin/interns/{id}/status` | Admin — update applicant status |

---

## Application Status Flow

```
[Submitted] → [Under Review / Pending] → [Approved] or [Not Selected / Rejected]
```

- Every new application starts with `status = pending`
- Admins update status from the profile page
- The applicant dashboard reflects status changes in real time
- Flash messages on the admin profile page are colour-coded:
  - **Green** — Approved
  - **Amber** — Reset to Pending
  - **Red** — Rejected

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

This is an internal KareVault project. For bugs or feature requests, open an issue on the internal repository or contact the engineering team directly.

---

> Built with ❤️ by the KareVault Engineering Team · [karevault.com](https://karevault.com)
