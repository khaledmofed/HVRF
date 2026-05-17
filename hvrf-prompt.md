# HVRF Website — Laravel + MySQL Full Build Prompt

## PROJECT LOCATION

Create the Laravel project inside this exact directory:

```
D:\khaledMofed\HVRF\
```

Run:

```bash
cd D:\khaledMofed\HVRF
composer create-project laravel/laravel .
```

The folder already contains logo image files — do NOT delete them. Keep them and copy the chosen logo to `public/images/logo.jpeg` (use `WhatsApp Image 2026-05-15 at 16.23.28.jpeg` as the brand logo).

---

## STACK & REQUIREMENTS

- **Framework**: Laravel (latest stable)
- **Database**: MySQL
- **Frontend**: Bootstrap 5 via CDN + vanilla JavaScript + Google Fonts via CDN
- **Admin Panel**: Bootstrap 5 via CDN — NO Filament, NO Nova, NO Voyager, NO any admin package. Pure Bootstrap + vanilla JS only.
- **NO Vite / NO npm build step** — use CDN links directly in all Blade files so no `npm run build` or `npm run dev` is needed. Remove Vite config entirely. All CSS/JS loaded via `<link>` and `<script>` tags from CDNs.
- **Authentication**: Laravel's built-in auth (manual, no Breeze/Jetstream) — admin login only

---

## BRAND & DESIGN SYSTEM

### Name

**HVRF — Human Value Reserve Foundation**

### Logo

File: `public/images/logo.jpeg`
Use `<img src="/images/logo.jpeg">` wherever the logo appears.

### Color Palette

```css
--hvrf-navy: #0d1b2a; /* Primary dark background */
--hvrf-teal: #4ecdc4; /* Primary accent — teal/mint */
--hvrf-teal-dark: #2aa39b; /* Hover state of teal */
--hvrf-gold: #c9a96e; /* Secondary accent — gold/bronze */
--hvrf-white: #ffffff;
--hvrf-light: #f4f7f9; /* Light background sections */
--hvrf-gray: #6c757d; /* Body text secondary */
--hvrf-dark-text: #1a2a3a; /* Dark text on light backgrounds */
```

### Fonts (Google Fonts CDN)

- **Headings**: `Playfair Display` (elegant serif — trust + authority)
- **Body**: `Inter` (clean sans-serif — readability)

```html
<link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap"
    rel="stylesheet"
/>
```

### Design Style

- Clean, modern, professional NGO/foundation feel
- Mix of dark navy sections and light white sections
- Teal accents for CTAs, highlights, borders
- Gold accents for stats, icons, special callouts
- Soft shadows, rounded cards, smooth hover transitions
- Human-centered imagery descriptions (use placeholder divs if no images available)

---

## DATABASE SCHEMA

### `admins`

| column                  | type                |
| ----------------------- | ------------------- |
| id                      | bigint PK           |
| name                    | varchar(100)        |
| email                   | varchar(150) unique |
| password                | varchar(255)        |
| remember_token          | varchar(100)        |
| created_at / updated_at | timestamps          |

### `site_settings`

| column     | type                                                     |
| ---------- | -------------------------------------------------------- |
| id         | bigint PK                                                |
| key        | varchar(100) unique                                      |
| value      | longtext nullable                                        |
| type       | enum('text','textarea','image','boolean') default 'text' |
| group      | varchar(50) default 'general'                            |
| updated_at | timestamp                                                |

### `hero_sections`

| column              | type                 |
| ------------------- | -------------------- |
| id                  | bigint PK            |
| quote_text          | text                 |
| headline            | varchar(500)         |
| subheadline         | text                 |
| cta_primary_label   | varchar(100)         |
| cta_primary_url     | varchar(255)         |
| cta_secondary_label | varchar(100)         |
| cta_secondary_url   | varchar(255)         |
| is_active           | boolean default true |
| updated_at          | timestamp            |

### `about_sections`

| column           | type         |
| ---------------- | ------------ |
| id               | bigint PK    |
| philosophy_title | varchar(255) |
| philosophy_body  | text         |
| vision_title     | varchar(255) |
| vision_body      | text         |
| mission_title    | varchar(255) |
| mission_body     | text         |
| updated_at       | timestamp    |

### `focus_areas`

| column        | type                                                     |
| ------------- | -------------------------------------------------------- |
| id            | bigint PK                                                |
| number        | tinyint                                                  |
| title         | varchar(200)                                             |
| description   | text                                                     |
| examples_json | json                                                     |
| icon_name     | varchar(50) (Bootstrap icon name, e.g. "bi-people-fill") |
| sort_order    | int default 0                                            |
| is_active     | boolean default true                                     |
| updated_at    | timestamp                                                |

### `programs` (the 3-year focus pillars: A and B)

| column            | type                                            |
| ----------------- | ----------------------------------------------- |
| id                | bigint PK                                       |
| pillar            | enum('connection','purpose')                    |
| title             | varchar(200)                                    |
| description       | text                                            |
| features_json     | json (array of {title, description, items: []}) |
| how_involved_json | json (array of strings)                         |
| sort_order        | int                                             |
| is_active         | boolean                                         |
| updated_at        | timestamp                                       |

### `roadmap_years`

| column        | type                         |
| ------------- | ---------------------------- |
| id            | bigint PK                    |
| pillar        | enum('connection','purpose') |
| year_number   | tinyint                      |
| year_label    | varchar(20)                  |
| goal          | varchar(255)                 |
| projects_json | json (array of strings)      |
| kpis_json     | json (array of strings)      |
| sort_order    | int                          |
| updated_at    | timestamp                    |

### `stats`

| column     | type         |
| ---------- | ------------ |
| id         | bigint PK    |
| value      | varchar(50)  |
| label      | varchar(150) |
| icon_name  | varchar(50)  |
| sort_order | int          |
| is_active  | boolean      |
| updated_at | timestamp    |

### `team_members`

| column       | type         |
| ------------ | ------------ |
| id           | bigint PK    |
| name         | varchar(150) |
| role         | varchar(150) |
| bio          | text         |
| photo_url    | varchar(500) |
| linkedin_url | varchar(500) |
| sort_order   | int          |
| is_active    | boolean      |
| updated_at   | timestamp    |

### `contact_messages`

| column     | type                  |
| ---------- | --------------------- |
| id         | bigint PK             |
| name       | varchar(150)          |
| email      | varchar(255)          |
| subject    | varchar(255)          |
| message    | text                  |
| is_read    | boolean default false |
| created_at | timestamp             |

### `newsletter_subscribers`

| column        | type                  |
| ------------- | --------------------- |
| id            | bigint PK             |
| email         | varchar(255) unique   |
| name          | varchar(150) nullable |
| subscribed_at | timestamp             |
| is_active     | boolean default true  |

---

## PUBLIC WEBSITE — ALL SECTIONS

### Layout (`resources/views/layouts/app.blade.php`)

- CDN links: Bootstrap 5, Bootstrap Icons, Google Fonts, AOS (animate on scroll via CDN)
- No Vite, no mix — plain `<link>` and `<script>` tags only
- `@yield('content')` for page content
- Include navbar and footer partials
- AOS.init() in footer script

---

### 1. Navbar (`partials/navbar.blade.php`)

- Fixed top
- Left: Logo image + text "HVRF"
- Right nav links: Home, About, What We Do, Programs, Roadmap, Team, Contact
- "Get Involved" button — teal background, white text
- On scroll: add `scrolled` class via JS → apply white background + shadow
- Mobile: Bootstrap navbar-toggler hamburger menu
- All links use `route()` helper

---

### 2. Hero Section

- **Full viewport** dark navy background (`--hvrf-navy`)
- **Background pattern**: subtle CSS geometric pattern or soft gradient overlay
- **Top quote pill**: italic text in teal border —
    > _"In an age where intelligence and labor become automated, humanity's greatest value will come from meaning, wisdom, creativity, ethics, connection, and stewardship."_
- **Headline**: `Human Value Reserve Foundation` — large Playfair Display, white
- **Subheadline**: "Ensuring humanity thrives with dignity, meaning, and shared prosperity in the age of autonomous intelligence."
- **Two CTA buttons**:
    - Primary: "Explore Our Mission" — teal bg, white text, hover darken
    - Secondary: "Join the Movement" — outline white, hover fill teal
- **Stats row** (below CTAs): 3 animated count-up stats:
    - "5,000+" / First Year Participants Target
    - "100,000+" / Users by Year 2 Goal
    - "3" / Focus Pillars
- **Logo large** displayed as subtle background watermark (low opacity)
- All content from DB (`hero_sections` + `stats`)

---

### 3. About Section (`#about`)

- Split layout: text left, logo/image right
- **Core Philosophy card** — dark navy bg, teal left border:
    > _"Human value transcends pure economic output."_
- Paragraph explaining AI will outperform humans in speed, memory, repetitive tasks, data analysis — but humans retain: **meaning, wisdom, creativity, ethics, connection, stewardship**
- 3 sub-cards in a row:
    - **Our Vision**: "To ensure humanity thrives with dignity, meaning, and shared prosperity in the age of autonomous intelligence."
    - **Our Mission**: "To invest in technologies, systems, and communities that amplify uniquely human strengths alongside the rise of AI."
    - **Why Now**: The urgency — automation is accelerating, the window to shape the future is narrow
- All content from DB (`about_sections`)

---

### 4. What We Do — 5 Focus Areas (`#focus-areas`)

- Section title: "What the Foundation Will Do"
- Section subtitle: "Five pillars to protect and amplify human value"
- **5 feature cards** in a CSS grid (3 top, 2 bottom centered):

| #   | Title                        | Icon              | Examples                                                                |
| --- | ---------------------------- | ----------------- | ----------------------------------------------------------------------- |
| 1   | Human Connection Systems     | `bi-people-fill`  | Community platforms, elder care, family support AI, mentorship networks |
| 2   | Human Purpose Infrastructure | `bi-bullseye`     | Mentor, teach, create, volunteer, solve local problems                  |
| 3   | Human Enhancement            | `bi-robot`        | AI copilots, AI education, AI healthcare, accessibility tools           |
| 4   | Human Creativity Economy     | `bi-palette-fill` | Creator ecosystems, artist grants, AI-human collab tools                |
| 5   | Ethics & Governance          | `bi-shield-check` | AI transparency, alignment, governance frameworks, accountability       |

- Each card: icon (teal), number badge (gold), title, short description, examples list
- Hover: card lifts with box-shadow + teal top border
- `data-aos="fade-up"` with stagger delay
- All content from DB (`focus_areas`)

---

### 5. First 3 Years — Programs (`#programs`)

- Section title: "Our First 3 Years of Focus"
- Two tabbed pillars (Bootstrap tabs):
    - **Tab A**: Human Connection Systems
    - **Tab B**: Human Purpose Infrastructure

**Tab A — Human Connection Systems:**
3 program cards:

1. **Elder Companion Systems** — AI-assisted but human-centered care networks. Includes: health monitoring, emotional companionship, family connection, local volunteers
2. **Community Restoration Platform** — Local missions: volunteering, mentorship, neighborhood collaboration. Gamified through contribution scoring + local reputation
3. **Family Strengthening Programs** — AI tools for parenting, emotional wellness, family communication, education support

**Tab B — Human Purpose Infrastructure:**
3 program cards:

1. **Contribution Network** — Platform where humans mentor, teach, create, volunteer, solve local problems. Contribution becomes socially visible and rewarded
2. **Human Legacy Platform** — Preserve stories, values, memories, life lessons, mentorship — an intergenerational wisdom system
3. **Human Stewardship Missions** — Organize missions around environment, elderly, education, local communities. AI coordinates, humans contribute

**How HVRF Gets Involved** (shared section below tabs):

- Fund local pilots
- Partner with governments & healthcare systems
- Subsidize access
- Create open social infrastructure
- Create recognition systems
- Build global networks

All content from DB (`programs`)

---

### 6. Roadmap (`#roadmap`)

- Section title: "3-Year Strategic Roadmap"
- Two columns side by side — Connection Roadmap | Purpose Roadmap
- Each column has 3 year cards:

**Human Connection Roadmap:**
| Year | Goal | Projects | KPIs |
|------|------|----------|------|
| Year 1 | Build Local Pilots | 3 elderly care pilots, volunteer platform, community AI tools | 5,000 participants, reduced isolation, volunteer network |
| Year 2 | Expand Social Infrastructure | City partnerships, family AI programs, intergenerational mentorship | 100,000 active users, mental wellness improvements |
| Year 3 | Human Connection Network | Global contribution network, AI-assisted civic participation, mentorship economy | Cross-country participation, recognized public impact |

**Human Purpose Roadmap:**
| Year | Goal | Projects | KPIs |
|------|------|----------|------|
| Year 1 | Define Contribution Framework | Contribution scoring, pilot volunteer missions, local stewardship | First contributor communities |
| Year 2 | Build Human Contribution Economy | Global mentorship network, contribution rewards, AI mission coordination | Active contributor growth, measurable community outcomes |
| Year 3 | Human Value Civilization Layer | Global contribution index, intergenerational wisdom archive, worldwide stewardship network | International participation, recognized societal impact |

- Year cards: vertical timeline style, left-border teal line, year badge in gold circle
- Active year: filled teal, others: outlined
- `data-aos="fade-left"` / `data-aos="fade-right"`
- All content from DB (`roadmap_years`)

---

### 7. Team Section (`#team`)

- Section title: "Our Team"
- Grid of team member cards (from DB — `team_members`)
- Each card: photo circle, name, role, short bio, LinkedIn icon link
- Empty state if no members seeded: show "Team coming soon" message
- All content from DB

---

### 8. Join / Get Involved CTA (`#join`)

- Full-width section with dark navy background + teal diagonal accent
- Headline: "Join the Movement to Preserve Human Value"
- Subtext: "Whether you're a researcher, philanthropist, technologist, or simply a human who cares — there's a place for you at HVRF."
- Two CTAs:
    - "Partner With Us" → `#contact`
    - "Subscribe to Updates" → opens email modal
- Newsletter modal: name + email fields → POST `/subscribe`

---

### 9. Contact Section (`#contact`)

- Split layout: left = contact info, right = form
- **Left**:
    - Foundation tagline
    - Email (from `site_settings`: `contact_email`)
    - Location (from `site_settings`: `contact_location`)
    - Social links (LinkedIn, Twitter/X, Facebook)
- **Right form**:
    - Name, Email, Subject, Message
    - Submit → POST `/contact` → store in `contact_messages` + success flash
    - CSRF protected, validated

---

### 10. Footer (`partials/footer.blade.php`)

- Dark navy background
- 3 columns:
    - **About HVRF**: logo + short description
    - **Quick Links**: Home, About, Programs, Roadmap, Contact
    - **Stay Connected**: newsletter inline form (email + button)
- Bottom bar: copyright `© {{ date('Y') }} HVRF — Human Value Reserve Foundation. All rights reserved.`
- All links from DB or hardcoded nav routes

---

## ADMIN PANEL

### Setup

- Route prefix: `/admin`
- Separate guard: `admins` table with its own auth guard (`config/auth.php`)
- Middleware: `auth:admin`
- No registration route — seed one admin user
- All admin views extend `layouts/admin.blade.php`

### Admin Layout (`resources/views/layouts/admin.blade.php`)

- Bootstrap 5 via CDN with `data-bs-theme="dark"`
- Fixed sidebar (left, 260px wide) — collapses on mobile
- Top navbar: hamburger toggle + admin name + logout button
- Main content area: `@yield('content')`
- Flash toast messages (success/error) using Bootstrap toast component
- Sidebar nav items with Bootstrap Icons

---

### Admin Sidebar Navigation

```
Dashboard
─────────────
Content
  Hero Section
  About Section
  Focus Areas
  Programs
  Roadmap
  Team Members
  Stats
─────────────
Inbox
  Contact Messages
  Subscribers
─────────────
Settings
  Site Settings
```

---

### Admin Pages

#### `/admin/dashboard`

- Welcome card with admin name
- Stats cards row:
    - Total Contact Messages | Unread Messages | Total Subscribers | Active Programs
- Recent unread messages table (last 5)
- Recent subscribers table (last 5)

#### `/admin/hero`

- Single record form (edit only, no create/delete)
- Fields: Quote Text (textarea), Headline (input), Subheadline (textarea), CTA Primary Label/URL, CTA Secondary Label/URL, Is Active (toggle)
- Save → redirect back with success toast

#### `/admin/about`

- Single record form
- Fields: Philosophy Title, Philosophy Body, Vision Title, Vision Body, Mission Title, Mission Body
- Rich text: use plain `<textarea>` (no editors needed)

#### `/admin/focus-areas`

- Index: table with columns: #, Title, Icon, Active, Actions (Edit/Delete)
- Drag-to-reorder using HTML5 drag events (no SortableJS needed — simple up/down arrow buttons)
- Create/Edit form: Number, Title, Description, Icon Name (input with hint: "Bootstrap icon class e.g. bi-people-fill"), Examples (textarea — one per line, saved as JSON), Is Active
- Delete: confirm modal

#### `/admin/programs`

- Index: table grouped by pillar (Connection / Purpose)
- Create/Edit form: Pillar (select), Title, Description, Features (dynamic JS repeater — add/remove rows with Title + Description + Items), How Involved (textarea — one per line), Sort Order, Is Active
- JS repeater: vanilla JS — "Add Feature" button appends a new row; each row has Title input + Description input + Items textarea (one per line)

#### `/admin/roadmap`

- Index: table with year, pillar, goal
- Create/Edit form: Pillar (select), Year Number (1/2/3), Year Label, Goal, Projects (textarea — one per line → JSON), KPIs (textarea — one per line → JSON), Sort Order

#### `/admin/stats`

- Index: table (Value, Label, Icon, Sort, Active)
- Create/Edit: Value, Label, Icon Name, Sort Order, Is Active

#### `/admin/team`

- Index: table (Photo, Name, Role, Active, Actions)
- Create/Edit: Name, Role, Bio, Photo URL, LinkedIn URL, Sort Order, Is Active

#### `/admin/messages`

- Index: table (Name, Email, Subject, Date, Read status)
- Click row → view full message → mark as read
- Delete message
- Unread count badge in sidebar nav

#### `/admin/subscribers`

- Index: paginated table (Name, Email, Date, Active)
- Toggle active/inactive per subscriber
- Delete subscriber
- Export CSV button → download all active subscribers as CSV

#### `/admin/settings`

- Grouped settings form:
    - **General**: Site Name, Tagline, Logo URL, Favicon URL
    - **Contact**: Contact Email, Phone, Location, Map Embed URL
    - **Social**: LinkedIn URL, Twitter URL, Facebook URL, YouTube URL
    - **SEO**: Meta Title, Meta Description, OG Image URL
- Save all at once → `SiteSetting::set(key, value)` for each field

---

## CONTROLLERS & ROUTES

### Public (`routes/web.php`)

```
GET  /                → HomeController@index
POST /contact         → ContactController@store
POST /subscribe       → NewsletterController@store
```

### Admin (`routes/web.php` — prefix admin, middleware auth:admin)

```
GET  /admin/login                           → AdminAuthController@showLogin
POST /admin/login                           → AdminAuthController@login
POST /admin/logout                          → AdminAuthController@logout

GET  /admin/dashboard                       → Admin\DashboardController@index

GET|POST /admin/hero                        → Admin\HeroController@edit / update
GET|POST /admin/about                       → Admin\AboutController@edit / update

GET      /admin/focus-areas                 → Admin\FocusAreaController@index
GET      /admin/focus-areas/create          → Admin\FocusAreaController@create
POST     /admin/focus-areas                 → Admin\FocusAreaController@store
GET      /admin/focus-areas/{id}/edit       → Admin\FocusAreaController@edit
PUT      /admin/focus-areas/{id}            → Admin\FocusAreaController@update
DELETE   /admin/focus-areas/{id}            → Admin\FocusAreaController@destroy

GET      /admin/programs                    → Admin\ProgramController@index
GET      /admin/programs/create             → Admin\ProgramController@create
POST     /admin/programs                    → Admin\ProgramController@store
GET      /admin/programs/{id}/edit          → Admin\ProgramController@edit
PUT      /admin/programs/{id}               → Admin\ProgramController@update
DELETE   /admin/programs/{id}               → Admin\ProgramController@destroy

GET      /admin/roadmap                     → Admin\RoadmapController@index
GET      /admin/roadmap/create              → Admin\RoadmapController@create
POST     /admin/roadmap                     → Admin\RoadmapController@store
GET      /admin/roadmap/{id}/edit           → Admin\RoadmapController@edit
PUT      /admin/roadmap/{id}               → Admin\RoadmapController@update
DELETE   /admin/roadmap/{id}               → Admin\RoadmapController@destroy

GET      /admin/stats                       → Admin\StatController@index
GET      /admin/stats/create                → Admin\StatController@create
POST     /admin/stats                       → Admin\StatController@store
GET      /admin/stats/{id}/edit             → Admin\StatController@edit
PUT      /admin/stats/{id}                  → Admin\StatController@update
DELETE   /admin/stats/{id}                  → Admin\StatController@destroy

GET      /admin/team                        → Admin\TeamController@index
GET      /admin/team/create                 → Admin\TeamController@create
POST     /admin/team                        → Admin\TeamController@store
GET      /admin/team/{id}/edit              → Admin\TeamController@edit
PUT      /admin/team/{id}                   → Admin\TeamController@update
DELETE   /admin/team/{id}                   → Admin\TeamController@destroy

GET      /admin/messages                    → Admin\MessageController@index
GET      /admin/messages/{id}               → Admin\MessageController@show
DELETE   /admin/messages/{id}               → Admin\MessageController@destroy

GET      /admin/subscribers                 → Admin\SubscriberController@index
PATCH    /admin/subscribers/{id}/toggle     → Admin\SubscriberController@toggle
DELETE   /admin/subscribers/{id}            → Admin\SubscriberController@destroy
GET      /admin/subscribers/export          → Admin\SubscriberController@export

GET|POST /admin/settings                    → Admin\SettingController@index / update
```

---

## MODELS & HELPERS

### `SiteSetting` Model

Add static helpers:

```php
public static function get(string $key, $default = null)
{
    return static::where('key', $key)->value('value') ?? $default;
}

public static function set(string $key, $value): void
{
    static::updateOrCreate(['key' => $key], ['value' => $value]);
}
```

### Auth Guard for Admins

In `config/auth.php`, add:

```php
'guards' => [
    'admin' => [
        'driver' => 'session',
        'provider' => 'admins',
    ],
],
'providers' => [
    'admins' => [
        'driver' => 'eloquent',
        'model' => App\Models\Admin::class,
    ],
],
```

`Admin` model: extends `Authenticatable`, table `admins`.

---

## SEEDERS

### AdminSeeder

```
name: HVRF Admin
email: admin@hvrf.org
password: Admin@12345
```

### SiteSettingsSeeder

```
site_name = "HVRF"
tagline = "Human Value Reserve Foundation"
contact_email = "info@hvrf.org"
contact_location = "Global — Remote First"
linkedin_url = "#"
twitter_url = "#"
facebook_url = "#"
meta_title = "HVRF — Human Value Reserve Foundation"
meta_description = "Ensuring humanity thrives with dignity, meaning, and shared prosperity in the age of autonomous intelligence."
```

### HeroSeeder

```
quote_text: "In an age where intelligence and labor become automated, humanity's greatest value will come from meaning, wisdom, creativity, ethics, connection, and stewardship."
headline: "Human Value Reserve Foundation"
subheadline: "Ensuring humanity thrives with dignity, meaning, and shared prosperity in the age of autonomous intelligence."
cta_primary_label: "Explore Our Mission"
cta_primary_url: "#about"
cta_secondary_label: "Join the Movement"
cta_secondary_url: "#join"
```

### AboutSeeder

Fill vision, mission, philosophy from the document content above.

### FocusAreasSeeder

All 5 focus areas with full examples from the document.

### ProgramsSeeder

Both pillars A (connection) and B (purpose) with all 3 programs each and their sub-features.

### RoadmapSeeder

All 6 roadmap year rows (3 for connection, 3 for purpose) with full projects and KPIs.

### StatsSeeder

```
5,000+ / First Year Participants Target / bi-people-fill
100,000+ / Users by Year 2 Goal / bi-graph-up-arrow
3 / Core Pillars of Focus / bi-columns
5 / Program Areas / bi-grid-fill
```

---

## FILE STRUCTURE

```
app/
  Http/
    Controllers/
      HomeController.php
      ContactController.php
      NewsletterController.php
      Admin/
        AdminAuthController.php
        DashboardController.php
        HeroController.php
        AboutController.php
        FocusAreaController.php
        ProgramController.php
        RoadmapController.php
        StatController.php
        TeamController.php
        MessageController.php
        SubscriberController.php
        SettingController.php
    Middleware/
      AdminAuthenticate.php
  Models/
    Admin.php
    SiteSetting.php
    HeroSection.php
    AboutSection.php
    FocusArea.php
    Program.php
    RoadmapYear.php
    Stat.php
    TeamMember.php
    ContactMessage.php
    NewsletterSubscriber.php

resources/
  views/
    layouts/
      app.blade.php         (public — CDN Bootstrap + fonts)
      admin.blade.php       (admin — Bootstrap dark + sidebar)
    partials/
      navbar.blade.php
      footer.blade.php
    home.blade.php          (all sections)
    admin/
      auth/
        login.blade.php
      dashboard.blade.php
      hero/edit.blade.php
      about/edit.blade.php
      focus-areas/
        index.blade.php
        form.blade.php
      programs/
        index.blade.php
        form.blade.php
      roadmap/
        index.blade.php
        form.blade.php
      stats/
        index.blade.php
        form.blade.php
      team/
        index.blade.php
        form.blade.php
      messages/
        index.blade.php
        show.blade.php
      subscribers/
        index.blade.php
      settings/
        index.blade.php

public/
  images/
    logo.jpeg              (copy from root HVRF folder)
```

---

## JAVASCRIPT BEHAVIOR (vanilla JS only)

1. **Navbar scroll**: `window.addEventListener('scroll', ...)` → toggle `scrolled` class at 50px → add white bg + shadow
2. **Mobile menu**: Bootstrap handles via `navbar-toggler` — no extra JS
3. **AOS animations**: `AOS.init({ duration: 800, once: true })` in footer — add `data-aos="fade-up"` to section headings and cards
4. **Stats counter**: IntersectionObserver → when stats row enters viewport, animate count-up from 0 to target value over 1.5s
5. **Programs tabs**: Bootstrap tabs handle automatically — no extra JS
6. **Contact form**: standard form submit with Laravel validation — show validation errors inline using `@error` directive
7. **Newsletter**: AJAX POST → show inline success/error message without page reload
8. **Admin repeater (programs form)**: vanilla JS "Add row" button → `appendChild` new input row; "Remove" button → `removeChild`

---

## IMPORTANT NOTES

1. **NO Vite** — delete `vite.config.js`, remove `@vite()` directive, load everything via CDN `<link>` and `<script>`
2. **NO npm build step** — no `package.json` scripts needed for frontend assets
3. All forms use `@csrf` and `@method('PUT')`/`@method('DELETE')` where needed
4. Use Form Request classes for validation on all admin forms
5. Admin login guard is `auth:admin` — NOT the default `auth` guard
6. Use `route()` helper everywhere — no hardcoded URLs in Blade
7. Use `cache()->remember()` for DB-heavy queries (nav, footer, settings) — clear with `cache()->forget()` on admin save
8. Add `<meta name="robots" content="noindex, nofollow">` to all `/admin/*` pages
9. Seed an admin: `admin@hvrf.org` / `Admin@12345`
10. JSON fields (`features_json`, `examples_json`, etc.) — cast to array in model: `protected $casts = ['features_json' => 'array']`
11. After copying the logo to `public/images/logo.jpeg`, reference it with `/images/logo.jpeg` — never a relative path

---

## DELIVERABLE

When complete:

```bash
php artisan migrate --seed
php artisan serve
```

- Public site: `http://localhost:8000` — full HVRF landing page with all sections
- Admin: `http://localhost:8000/admin/login` — login with `admin@hvrf.org` / `Admin@12345`
- Admin shows Bootstrap dark panel with full content control

Build order: migrations → models → seeders → public controllers → public views → admin auth → admin controllers → admin views.

Before starting to build the HVRF website project, set up the environment properly:

STEP 1 — INSTALL ANIMATION LIBRARY
Since this is a Laravel project (no React/Vite), install GSAP via CDN instead of Framer Motion.
Add this to the public layout <head>:

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

STEP 2 — ACTIVATE PREMIUM UI/UX MODE
From this point on, apply senior UI/UX design principles to every view you build:

- Strong visual hierarchy (clear H1 > H2 > body sizing)
- Generous whitespace and consistent spacing scale (8px grid)
- Premium color usage: navy #0D1B2A, teal #4ECDC4, gold #C9A96E
- Smooth GSAP entrance animations on scroll for every section
- Micro-interactions on buttons (scale + glow on hover via CSS transition)
- Glassmorphism cards where appropriate (backdrop-filter: blur)
- Section dividers using SVG wave or diagonal clip-path
- Mobile-first responsive layout at every breakpoint

STEP 3 — USE 21ST.DEV AS DESIGN REFERENCE
Before building each section, mentally reference 21st.dev component patterns:

- Hero: full-viewport with animated headline + floating badge + CTA buttons
- Feature cards: icon top + title + description + hover lift shadow
- Stats: large number + label with count-up animation on scroll
- Timeline: vertical line + year badge + content right
- Tabs: clean pill tabs + smooth fade between content panels
  Do NOT use React components from 21st.dev — adapt their visual style into Bootstrap 5 HTML + CSS.

STEP 4 — NOW BUILD THE PROJECT
[paste the full HVRF prompt content here]

After building each section, ask yourself:
"Would a senior UI/UX designer approve this?"
If not — improve the spacing, typography, color contrast, or animation before moving on.
