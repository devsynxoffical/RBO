#!/usr/bin/env python3
"""
Full Arabic Deploy Pipeline:
1. Reads all_ar_posts_translated_full.json
2. Extracts only post_id + elementor_data + title
3. Uploads compact JSON + PHP deploy script to live
4. Triggers PHP script
5. Verifies & deletes temp files
"""

import json
import ftplib
import urllib.request
import time
import io

FTP_HOST = '185.243.77.60'
FTP_USER = 'devsynx@rboaccounting.ae'
FTP_PASS = 'Devsynx2026!#'
SITE_URL  = 'https://www.rboaccounting.ae'

# ── Load translated posts ──────────────────────────────────────
print("Loading translated posts...")
with open('all_ar_posts_translated_full.json', 'r', encoding='utf-8') as f:
    full_data = json.load(f)

print(f"Loaded {len(full_data)} posts")

# Build compact payload (only fields needed by PHP)
payload = {}
for pid, pdata in full_data.items():
    payload[pid] = {
        'data':  pdata.get('data', ''),
        'title': pdata.get('title', ''),
        'id':    pdata.get('id', pid),
    }

# Also include About Us Arabic (Live Post ID 5760)
with open('about_us_ar_translated.json', 'r', encoding='utf-8') as f_about:
    about_ar_data = f_about.read()

payload['5760'] = {
    'data':  about_ar_data,
    'title': 'من نحن | شركة آر بي أو لخدمات المحاسبة والضرائب في الإمارات',
    'id':    '5760',
}

payload_json = json.dumps(payload, ensure_ascii=False)
print(f"Payload size: {len(payload_json) / 1024:.1f} KB")

# ── FTP Upload ─────────────────────────────────────────────────
print("\nConnecting to FTP...")
ftp = ftplib.FTP()
ftp.connect(FTP_HOST, 21, timeout=60)
ftp.login(FTP_USER, FTP_PASS)
ftp.set_pasv(True)

# Navigate to web root
try:
    ftp.cwd('/public_html')
    print("In /public_html")
except:
    print("Already in root or different structure")

# Upload JSON data file
print("Uploading all_ar_posts_data.json...")
json_bytes = payload_json.encode('utf-8')
ftp.storbinary('STOR all_ar_posts_data.json', io.BytesIO(json_bytes))
print(f"  ✓ Uploaded {len(json_bytes)/1024:.1f} KB")

# Upload PHP script
print("Uploading deploy_all_ar_final.php...")
with open('deploy_all_ar_final.php', 'rb') as f:
    php_content = f.read()
ftp.storbinary('STOR deploy_all_ar_final.php', io.BytesIO(php_content))
print(f"  ✓ Uploaded {len(php_content)/1024:.1f} KB")

# Also upload updated rbo-seo-extras.php to mu-plugins
print("Uploading wp-content/mu-plugins/rbo-seo-extras.php...")
with open('wp-content/mu-plugins/rbo-seo-extras.php', 'rb') as f:
    extras_content = f.read()
ftp.storbinary('STOR wp-content/mu-plugins/rbo-seo-extras.php', io.BytesIO(extras_content))
print(f"  ✓ Uploaded rbo-seo-extras.php ({len(extras_content)/1024:.1f} KB)")

# Clean up any leftover old temp files if present
for old_tmp in ['create_ar_about_page.php', 'check_live_pages.php', 'about_us_ar_translated.json']:
    try:
        ftp.delete(old_tmp)
        print(f"  ✓ Cleaned up old temp file: {old_tmp}")
    except:
        pass

ftp.quit()
print("FTP connection closed")

# ── Trigger PHP Script ─────────────────────────────────────────
print("\nTriggering deploy script...")
time.sleep(3)

try:
    req = urllib.request.Request(
        f'{SITE_URL}/deploy_all_ar_final.php',
        headers={'User-Agent': 'RBO-Deploy/1.0'}
    )
    with urllib.request.urlopen(req, timeout=240) as resp:
        raw = resp.read().decode('utf-8', errors='replace')
    
    print("Response received!")
    
    try:
        result = json.loads(raw)
        print(f"\nStatus:  {result.get('status')}")
        print(f"Updated: {result.get('updated')}")
        print(f"Skipped: {result.get('skipped')}")
        
        if result.get('errors'):
            print("Errors:")
            for e in result['errors']:
                print(f"  ✗ {e}")
        
        log = result.get('log', [])
        print(f"\nLog ({len(log)} entries):")
        for entry in log[:60]:
            print(f"  {entry}")
        if len(log) > 60:
            print(f"  ... and {len(log)-60} more")
            
    except json.JSONDecodeError:
        print("Raw response (first 2000 chars):")
        print(raw[:2000])

except Exception as e:
    print(f"Request error: {e}")

# ── Cleanup: Delete temp files from server ─────────────────────
print("\nCleaning up temp files from server...")
time.sleep(2)

ftp2 = ftplib.FTP()
ftp2.connect(FTP_HOST, 21, timeout=60)
ftp2.login(FTP_USER, FTP_PASS)
ftp2.set_pasv(True)

try:
    ftp2.cwd('/public_html')
except:
    pass

for fname in ['deploy_all_ar_final.php', 'all_ar_posts_data.json']:
    try:
        ftp2.delete(fname)
        print(f"  ✓ Deleted {fname}")
    except Exception as e:
        print(f"  ✗ Could not delete {fname}: {e}")

ftp2.quit()
print("\n✅ Deploy pipeline complete!")

