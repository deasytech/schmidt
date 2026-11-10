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
