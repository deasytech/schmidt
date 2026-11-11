# Running artisan tasks without SSH

1. In the server's `.env` add a long random value (20+ chars), e.g. `DEPLOY_TOKEN=Xk39...random...`. Without it the routes return 404.
2. Visit, in order (replace `TOKEN` and the domain):
   - `https://YOURDOMAIN/_deploy/migrate?token=TOKEN`
   - `https://YOURDOMAIN/_deploy/storage-link?token=TOKEN`
   - `https://YOURDOMAIN/_deploy/optimize-clear?token=TOKEN`
   - optional, after uploads exist: `https://YOURDOMAIN/_deploy/images?token=TOKEN` (pre-generates WebP variants; may be slow, rerun if it times out)
3. Each returns plain text with the command output.
4. **Delete the `DEPLOY_TOKEN` line from `.env` when done** (the routes then return 404 again).

Notes: `migrate` is the real `migrate --force` and changes the database: back it up first. `storage-link` needs PHP `symlink()`; if the host blocks it, create the link from the host panel. The token is in the URL, so it can appear in server logs: use a throwaway value.
