# Current State Audit (Phase 0)

## Stack (differs from blueprint)
- Laravel 8.75, PHP ^7.3|^8.0 (local PHP 8.3), **TCG Voyager 1.6 admin at `/admin`** — NOT Filament.
- Frontend: Blade + Bootstrap 4 + jQuery + Swiper/WOW/Splitting plugin bundle (`public/css/plugins.css`, `public/css/style.css`, `public/js/*`). No Livewire. Mix is present but public assets are static.
- DB: MySQL `schmidt`. Public images via Voyager disk `public` -> `public/storage` symlink (was dangling to an old MAMP path; re-linked locally, untracked/gitignored).

## Route map (routes/web.php)
| URL | Name | Controller@method | Data |
|---|---|---|---|
| `/` | home | PageController@index | Slide, Page(who-we-are, what-we-do, how-we-do-it), PageModule, Project(featured=1), Post(featured=1), settings |
| `/the-company` | the-company | theCompany | Page(the-company), PageModule, Page(testimonials)+modules |
| `/our-team` | our-team | ourTeam | Team |
| `/our-works` | our-works | ourWorks | Project(status=1), Client |
| `/our-work/{id}` | our-work | ourWork | Project(id,status=1) (`images` JSON gallery), Client |
| `/news` | latest-news | latestNews | Voyager Post |
| `/news/{slug}` | latest-post | latestPost | Post |
| `/what-we-do` | what-we-do | whatWeDo | Page(what-we-do)+modules (sorted by sub_title) |
| `/contact-us` | contact-us | contactUs | settings |
| `POST /contact` | contact.store | storeContact | validates name,email,message; mails `ContactFormSubmitted` to `MAIL_FROM_ADDRESS`; not stored in DB; no spam protection |
| `/admin/*` | voyager | Voyager::routes() | untouched |
No individual service pages, no search route, no sitemap, robots.txt allows all. Custom 404 view: none.

## Data map
- `slides`: image,title,sub_title,description (hero; 8 rows, 5 generic + LUX DEI / PATMOS HARBOUR / MAYTAG)
- `pages` + `page_modules`: who-we-are(1), the-company(5: Vision, Mission), what-we-do(8: 8 services, sub_title = "01".."08"), testimonials(9), how-we-do-it(10: 4 steps)
- `projects`: title, sub_title (=category: Architecture / Interior Design / Construction), slug, group (inconsistent legacy filter values — unreliable), image, image_full, images(JSON), body, status, featured. Public: 10 live; ids 17,18,19,20 are status=0 (test/blank).
- `teams` (12), `clients` (23 logos), `posts` (6, all use the same image; featured on 3), `categories` (1), `settings` (site.*).
- Settings used: site.title/description/logo/mobile_logo/email/phone(HTML)/footer_about/footer_contact/facebook/twitter/instagram (social values are bare `https://facebook.com/` placeholders)/since_year/experience/projects_completed/satisfied_clients/awards_won.

## Reusable pieces
Controllers/routes/models/mail are kept as-is. Views are rewritten. Existing `Voyager::image()` used for all media.

## Risks / findings
1. Blueprint assumes Filament; the app uses Voyager. Preserved Voyager untouched.
2. Social settings are placeholder root URLs -> hide unless a path exists.
3. `projects.group` filter values do not match categories -> filter by `sub_title` (real categories).
4. Controllers use `->first()` w/o null guards; `/our-work/{id}` for missing/inactive project would 500; new views/controller guard with 404 (additive).
5. Contact form: no DB persistence, no honeypot; `MAIL_FROM_ADDRESS` used as recipient. Preserved; honeypot added client-side-only field (additive, optional).
6. Duplicate articles (same title/image) — content gap, not altered.
7. Testimonial modules have placeholder titles (S.D, T.B, OM, "Customer") — hidden from the redesign until client confirms.
8. `site.experience` is HTML and `since_year` too; the Company page hardcodes "7 years" — replaced by setting.
9. Google Maps API key is embedded in footer; moved out of the render path (iframe embed retained, no API key needed).
10. Original images are unknown dimensions; no responsive variants exist (no media pipeline) -> `loading=lazy`, `decoding=async`, aspect ratios only.

## Decisions
- Keep all URLs. Add nothing that removes a route. Project slugs exist but URLs use id; keep `/our-work/{id}`.
- New standalone design-system CSS `public/css/schmidt.css` + `public/js/schmidt.js` for the public layout only; Voyager admin is unaffected (separate layout).
