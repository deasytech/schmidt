# Page & Feature Preservation Checklist

Legend: [x] verified locally · [ ] not yet verified

## Routes
- [x] `/` `/the-company` `/our-team` `/what-we-do` `/our-works` `/our-work/{id}` `/news` `/news/{slug}` `/contact-us` return 200
- [x] Unknown URL and inactive project return 404
- [x] `/admin/login` loads, `/admin` redirects to it · [ ] Voyager BREAD screens
- [x] Mail builds/escapes via log driver · [ ] real SMTP send

## Data / content
- [x] No migrations or data writes introduced
- [x] Content sourced from existing models/settings
- [x] Data edits (project, team, settings) appear on frontend immediately — verified on a DB copy via SQL · [ ] via the Voyager UI

## Quality
- [x] Desktop (1440) and 500 px visual review
- [x] No horizontal overflow at 375/390/430/768/1440/1920 · [x] Lighthouse (local) · [x] scripted menu/filter/lightbox tests · [ ] human keyboard/screen-reader · [x] console-error audit · [x] visual review at 375/390/430 (key pages) · [ ] 768/1920 by eye
