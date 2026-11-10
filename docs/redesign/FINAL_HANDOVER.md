# Schmidt Architects — Frontend Redesign Handover (interim)

Status: **first implementation complete on branch `dev`; QA is partial.** This document states only what was actually done and verified. Items marked NOT VERIFIED must be checked before release.

## 1. Stack note
The blueprint assumes Filament. The application is **Laravel 8.75 + TCG Voyager 1.6** (admin at `/admin`). Voyager was left untouched. See `CURRENT_STATE_AUDIT.md`.

## 2. Summary
The entire public frontend was replaced with an editorial, image-led design system. Backend, database, routes, models, mail flow and admin were not changed. No migrations were added. No new dependencies were added (fonts Jost and Inter load from Google Fonts, as the old site already loaded Google Fonts).

## 3. Pages redesigned (all existing public routes)
Home `/`, The Company, Our Team, What We Do, Our Work (index with category filters), Our Work detail (gallery, lightbox, previous/next, related), News index, News article, Contact, styled 404. There are no individual service pages, search or sitemap in the app; none were created.

## 4. Files changed
- New: `public/css/schmidt.css`, `public/js/schmidt.js`, `resources/views/errors/404.blade.php`, partials `includes/{masthead,cta,tile,member,post}.blade.php`, `docs/redesign/*`.
- Rewritten views: `layouts/default`, `includes/{head,header,footer,clients}`, all files in `pages/`.
- Backend (additive only): `PageController` (404 guards on project/article, related/prev/next, extra home data); `AppServiceProvider` (view composer that derives phones, email, address, valid social links and years from existing settings).
- Old assets (`public/css/style.css`, `plugins.css`, `public/js/*`) remain in place, unused by the public layout, for rollback.

## 5. Routes preserved
All 10 public routes and the `/admin` Voyager routes are unchanged (names, URLs, parameters). `/our-work/{id}` still keys on id. New behaviour: unknown/inactive project or article returns 404 instead of a server error.

## 6. Preservation confirmation
- Voyager routes, resources and settings: unchanged. Public CSS is only loaded by the public layout, so it cannot affect the admin.
- DB schema and records: no migration or data write was performed. (Local `public/storage` symlink re-pointed to this checkout; gitignored.)
- Contact form: same fields (`name`, `email`, `message`), route, validation, mail class and recipient. Verified locally that invalid input redirects back with errors. **NOT VERIFIED:** actual mail delivery.
- Dynamic content: all text/images come from existing records and settings. Stats are shown only if the setting has a value.

## 7. Design system
Tokens in `:root` (ivory/charcoal/stone/bronze, Jost + Inter, spacing, grid gutter, easing). Components: header + mobile drawer, masthead, tiles, filters, services list, steps, metrics, team card, post card, gallery + lightbox, CTA band, footer, empty state. Motion respects `prefers-reduced-motion`; content is visible without JS (reveal and filters are progressive enhancement).

## 8. Testing performed
- All public routes return 200 locally; inactive project and unknown URL return 404.
- Visual review in headless Chrome at 1440 px and 500 px (headless Chrome cannot render below ~500 px).
- Programmatic overflow check, 10 routes x 6 widths (375/390/430/768/1440/1920): no horizontal overflow after fixing the contact-page map.
- Code review findings addressed (drawer ARIA sync, lightbox focus trap, null guards).

## 9. NOT VERIFIED / not done
- Visual review at 375, 390, 430, 768 and 1920 px, and real-device testing. (Horizontal-overflow and broken-image checks were run at these widths and pass.)
- Baron Architecture mobile reference inspection (never performed).
- Lighthouse / Core Web Vitals baseline and post-redesign results.
- Keyboard and screen-reader testing of the drawer, filters and lightbox in a real browser.
- Contact email delivery; Google Map embed rendering (lazy iframe did not load in headless capture).
- Admin-edit-to-frontend round trip; Filament/Voyager login regression test.
- Responsive images are now generated (see Section 13), but Lighthouse / real-network timings are still not measured.
- Sitemap, structured data, OG images beyond the basics already in `head.blade.php`.

## 10. Content and asset gaps (client action)
1. "Patrick Habour Project": image file missing in storage; subtitle duplicates title, creating a stray filter chip.
2. All 8 services share identical description text.
3. Testimonials have placeholder names (S.D, T.B, OM / "Customer").
4. All 6 articles share one image and near-identical titles.
5. 5 team members use a generic grey avatar as their photo.
6. Social settings are bare domains (hidden until a real profile URL is entered).
7. Statistics (projects, clients, awards, years) need confirmation as accurate.
8. Contact page, header images for team/contact/404/news use existing site images; client may supply preferred photography.

## 11. Approvals needed
Copy changes for items 2–4; whether to add individual service pages; approval of the Jost/Inter fonts and bronze accent against brand guidelines.

## 12. Deployment and rollback
Do not deploy until Section 9 is addressed. Deploy by merging `dev`; no migrations, no `composer`/`npm` steps. Run `php artisan view:clear`. Ensure `php artisan storage:link` exists on the server. Rollback: revert the merge (old CSS/JS assets are still in the repo).

## 13. Image optimisation (added)
- `app/Support/Img.php` (aliased `Img`): creates resized WebP variants on first request into `storage/app/public/_cache/<width>/...`; regenerates when the original is newer; atomic writes; returns the original URL on any failure. No new dependency (uses Intervention Image already installed with Voyager, and PHP GD with WebP).
- `php artisan images:optimize` pre-generates variants. **Run it after deploy** (and ensure the web user can write to `storage/app/public`) so the first visitor does not pay the generation cost. If the production PHP lacks GD WebP support, pages silently serve the original images.
- Originals are never modified or deleted. `_cache` can be deleted at any time; it is rebuilt on demand.
- Local measurement of default `src` weight: home 7.6 MB -> 1.3 MB; /our-works 5.4 -> 2.2 MB; project detail 2.4 -> 0.8 MB.
