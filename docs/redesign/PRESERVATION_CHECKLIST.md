# Page & Feature Preservation Checklist

Legend: [x] verified locally · [ ] not yet verified

## Routes
- [x] `/` `/the-company` `/our-team` `/what-we-do` `/our-works` `/our-work/{id}` `/news` `/news/{slug}` `/contact-us` return 200
- [x] Unknown URL and inactive project return 404
- [ ] `/admin` login and Voyager BREAD screens
- [ ] `POST /contact` sends mail

## Data / content
- [x] No migrations or data writes introduced
- [x] Content sourced from existing models/settings
- [ ] Edit in Voyager appears on frontend (round trip)

## Quality
- [x] Desktop (1440) and 500 px visual review
- [ ] 375/390/430/768/1920 · Lighthouse · keyboard/screen-reader · console errors · broken-image audit
