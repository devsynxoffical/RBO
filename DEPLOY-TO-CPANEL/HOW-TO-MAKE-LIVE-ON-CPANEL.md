# How to Make RBO Website Live (cPanel) — No “Build” Needed

WordPress is **not** like React/Vue. There is **no** `npm run build` zip.

You go live by uploading **files** + importing the **database** (or using WPvivid).

A ready package is on your PC:

`C:\Users\New Moon\Desktop\RBO\DEPLOY-TO-CPANEL\`

---

## Important warnings (read first)

1. **Backup live first** in cPanel (or WPvivid on live) before changing anything.
2. Importing `database-FOR-LIVE-rboaccounting.sql` **replaces** the live database content with your local SEO work. Any edits made only on live after the last backup will be lost.
3. **Do NOT upload** local `wp-config.php` or `wp-config-local.php` (those have localhost DB passwords).
4. After import, live admin login may be the local one:  
   - User: `rbofounder`  
   - Password: `RBOLocal2026!`  
   Change it immediately on live after deploy.

---

## Method A — Recommended (simple, full update)

### Step 1 — Backup live site
1. Log in to **cPanel** for rboaccounting.ae  
2. Open **WPvivid** in live WP Admin **or** use cPanel → Backup  
3. Download a full backup to your computer

### Step 2 — Upload new files (File Manager or FTP)
Go to your WordPress root (usually `public_html/`).

Upload / merge these folders from:

`DEPLOY-TO-CPANEL\files-to-upload\`

Into the live site so you end up with:

```
public_html/wp-content/mu-plugins/rbo-seo-extras.php
public_html/wp-content/mu-plugins/rbo-single-sidebar.php
public_html/wp-content/uploads/rbo-blog-responsive.css
public_html/wp-content/uploads/2026/09/   (all blog images)
```

Optional (plugin updates):

Copy folders from `DEPLOY-TO-CPANEL\plugins-updated\` over:

```
public_html/wp-content/plugins/seo-by-rank-math/
public_html/wp-content/plugins/wp-reviews-plugin-for-google/
public_html/wp-content/plugins/wpvivid-backuprestore/
```

### Step 3 — Import the database
1. cPanel → **phpMyAdmin**  
2. Select the **live WordPress database** (same one named in live `wp-config.php`)  
3. **Export** a backup of live DB first (safety)  
4. Click **Import**  
5. Choose: `DEPLOY-TO-CPANEL\database-FOR-LIVE-rboaccounting.sql`  
6. Run import  

This SQL already uses `https://www.rboaccounting.ae` (not localhost).

### Step 4 — Final checks in live WP Admin
1. Settings → Permalinks → **Save** (flush links)  
2. Elementor → Tools → **Regenerate CSS & Data**  
3. Rank Math → sitemap OK  
4. Visit:
   - https://www.rboaccounting.ae/blog/
   - a VAT / Corporate Tax blog post
   - https://www.rboaccounting.ae/areas-we-serve/dubai/
5. Change admin password  
6. Send the client report

---

## Method B — WPvivid only (if you prefer one restore)

1. On **localhost** WP Admin → WPvivid → create **Database + Content** backup  
2. Download the backup zip  
3. On **live** WP Admin → WPvivid → Upload → Restore  
4. When asked, set site URL to `https://www.rboaccounting.ae`

(If local WPvivid UI is hard to use, Method A is clearer.)

---

## What you should NOT do

- Do not look for a “build” folder like a React app  
- Do not upload the whole Desktop `RBO` folder blindly (includes local config, MariaDB junk, etc.)  
- Do not upload `wp-config-local.php`

---

## Quick checklist after go-live

- [ ] Blog shows 2 posts  
- [ ] Mobile header shows “Free VAT Check”  
- [ ] Dubai/Ajman pages show local SEO block  
- [ ] VAT / Corporate Tax / Bookkeeping pages show FAQ section  
- [ ] No `localhost:8080` links in page source  
- [ ] Admin password changed  
- [ ] Client report sent  

---

## Need help?

If phpMyAdmin import fails (file too large), use cPanel **Terminal** / SSH:

```bash
mysql -u DB_USER -p DB_NAME < database-FOR-LIVE-rboaccounting.sql
```

Or split/import via WPvivid.

After this is live, next project = **Business Setup pages**.
