# Progress Log
- Phase 0: audit complete (branch `dev`). Doc: CURRENT_STATE_AUDIT.md.
- Phases 1–5 (first pass): new design system (`public/css/schmidt.css`, `public/js/schmidt.js`), layout/header/drawer/footer, homepage, projects index (category chips from `sub_title`) + detail (gallery, lightbox, prev/next, related), company, team, services, news index/detail, contact, styled 404. Controllers: additive only (404 guards, related/prev/next, team + more projects on home). Routes, models, Voyager admin, mail flow unchanged.
- Verified: all public routes return 200 locally; inactive project/unknown URL -> 404; contact validation redirects. Visual check via headless Chrome at 1440 and 500 px widths (headless Chrome cannot go below ~500 px, so 375/390/430 were NOT verified).
- NOT done: Lighthouse/baselines, tablet/1920 checks, real mail-send test, Baron mobile reference inspection, browser keyboard/focus test of drawer & lightbox, sitemap.xml.

## Content / asset gaps (for client)
- Project "Patrick Habour Project" image file missing from storage; its sub_title duplicates its title.
- All 8 service descriptions are identical copy; the 3 "Customer" testimonials have placeholder names (S.D, T.B, OM).
- All 6 articles share one image and near-identical titles.
- Social settings are bare domains (hidden until real profile URLs are added).
- Stats (projects/clients/awards) come from settings; client should confirm they are verified.
- No individual service pages exist (none created); `projects.group` values are inconsistent (unused).
- Polish pass: header images on every inner page (team/contact/404 use existing `public/img` assets; works uses the featured project; news uses `the-company.jpg`), transparent header over images, display font switched to Jost (light, architectural) with Inter body, tidier 2-column works grid with full-width lead tile, `.prose` normalises inconsistent admin-HTML font sizes, sticky section headings, higher-contrast labels over photos.
- Content gap: 5 team members use a generic grey avatar as their uploaded photo.
- Responsive sweep (iframe-width method, real viewport widths): 10 routes x 375/390/430/768/1440/1920. Found and fixed horizontal overflow on /contact-us at <=768 px (map aspect-ratio + min-height). After the fix no horizontal overflow on any tested route/width (contact re-tested at 375-1024). Only layout width and image-load failures were checked; this is not a visual review at those widths.
- Image optimisation: `App\Support\Img` (alias `Img`) lazily creates resized WebP variants (480/800/1200/1800 px) in `storage/app/public/_cache/` (git-ignored; originals never modified; falls back to the original if GD/WebP is unavailable or on error). Templates use `src` + `srcset` + `sizes`; static header photos use the `public:` prefix. `php artisan images:optimize` pre-generates all variants (484 locally, ~40 s). Measured default-`src` weight: home 7.6 MB -> 1.3 MB, /our-works 5.4 MB -> 2.2 MB, project 9 detail 2.4 MB -> 0.8 MB. Not measured: Lighthouse / real-network timings.
