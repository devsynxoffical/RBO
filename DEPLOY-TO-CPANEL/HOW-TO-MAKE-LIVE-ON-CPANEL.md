# Make RBO Website Live — Easy Steps (cPanel)

WordPress has **no build button** (not like React).  
You make it live by: **backup → upload files → import database → check website**.

Your ready folder is here:

`C:\Users\New Moon\Desktop\RBO\DEPLOY-TO-CPANEL\`

---

## Before you start

You need:
1. cPanel login for **rboaccounting.ae**
2. That `DEPLOY-TO-CPANEL` folder on your computer
3. About 20–30 minutes

---

## STEP 1 — Backup the live site (safety)

1. Open **cPanel**
2. Open the live website admin: `https://www.rboaccounting.ae/wp-admin`
3. Go to **WPvivid Backup** (left menu)
4. Click **Backup Now** / create a full backup
5. **Download** that backup to your computer

If something goes wrong, you can restore this backup.

---

## STEP 2 — Upload the new files

1. In cPanel, open **File Manager**
2. Open `public_html` (this is your live website folder)
3. Open `wp-content`

### 2A) Upload MU plugins
1. Open (or create) folder: `public_html/wp-content/mu-plugins`
2. Upload these 2 files from your PC:

From:  
`DEPLOY-TO-CPANEL\files-to-upload\wp-content\mu-plugins\`

- `rbo-seo-extras.php`
- `rbo-single-sidebar.php`

### 2B) Upload CSS
1. Go to `public_html/wp-content/uploads`
2. Upload:

`DEPLOY-TO-CPANEL\files-to-upload\wp-content\uploads\rbo-blog-responsive.css`

### 2C) Upload blog images
1. Go to `public_html/wp-content/uploads`
2. Create folders if needed: `2026` → then `09`
3. Open `2026/09`
4. Upload **all files** from:

`DEPLOY-TO-CPANEL\files-to-upload\wp-content\uploads\2026\09\`

**Easy tip:** You can also upload `1-UPLOAD-these-files.zip`, extract it in File Manager, then move the folders into `wp-content`.

### Do NOT upload
- `wp-config.php`
- `wp-config-local.php`
- the big `.sql` file into File Manager as a website file (SQL goes in phpMyAdmin only)

---

## STEP 3 — Import the database (this adds blogs + SEO)

1. In cPanel, open **phpMyAdmin**
2. In the left list, click your **WordPress database**  
   (same name as in live `wp-config.php`)
3. Click **Export** → download a backup of the current live DB (extra safety)
4. Click **Import**
5. Click **Choose File**
6. Select this file from your PC:

`DEPLOY-TO-CPANEL\database-FOR-LIVE-rboaccounting.sql`

7. Click **Go** / **Import**
8. Wait until it says success

This file is already set for `https://www.rboaccounting.ae` (not localhost).

**If import fails because file is too big:**  
Ask your host to raise upload limit, or tell me and we’ll use another method.

---

## STEP 4 — Refresh WordPress settings

1. Login to live admin: `https://www.rboaccounting.ae/wp-admin`
2. If login changed after import, try:
   - Username: `rbofounder`
   - Password: `RBOLocal2026!`
3. Go to **Settings → Permalinks**
4. Click **Save Changes** (don’t change anything, just save)
5. Go to **Elementor → Tools**
6. Click **Regenerate CSS & Data**
7. **Change your admin password** to a strong new one

---

## STEP 5 — Check the live website

Open these links and confirm they look correct:

1. https://www.rboaccounting.ae/blog/  
   → should show 2 blog posts
2. Open each blog post  
   → readable on phone too
3. https://www.rboaccounting.ae/areas-we-serve/dubai/  
   → local SEO section near bottom
4. https://www.rboaccounting.ae/our-services/vat-registration-filing/  
   → FAQ section visible
5. Header button should say **Free VAT Check**

Also search page source (Ctrl+U) and confirm there is **no** `localhost:8080`.

---

## STEP 6 — Send client report

After everything looks good, send:

`RBO-SEO-Client-Progress-Report-2026-09-05.md`

That report is written as if the work is already live.

---

## Quick checklist

- [ ] Live backup downloaded
- [ ] MU plugin files uploaded
- [ ] CSS uploaded
- [ ] Blog images uploaded
- [ ] Database imported
- [ ] Permalinks saved
- [ ] Elementor CSS regenerated
- [ ] Admin password changed
- [ ] Blog + Dubai + VAT pages checked
- [ ] Client report sent

---

## If you get stuck

| Problem | What to do |
|--------|------------|
| Can’t find `public_html` | In File Manager, look for `www` or ask host “WordPress root folder” |
| phpMyAdmin import too large | Tell me — we’ll split SQL or use WPvivid |
| Website white screen | Restore the backup from Step 1 |
| Still shows old content | Clear host cache / SpeedyCache / Cloudflare if used |

---

## After this is live

Next project: **Business Setup pages** (for more leads).
