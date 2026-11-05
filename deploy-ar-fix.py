import ftplib
import os
import ssl
import time
import urllib.request
import re

FTP_HOST = "185.243.77.60"
FTP_USER = "devsynx@rboaccounting.ae"
FTP_PASS = "Devsynx2026!#"
LIVE_URL = "https://www.rboaccounting.ae"

files_to_upload = [
    "upgrade-ar-live-fix.php",
    "wp-content/mu-plugins/rbo-seo-extras.php",
    "wp-content/rbo-seo-extras.php",
    "wp-content/wp-content/mu-plugins/rbo-seo-extras.php",
]

base_dir = r"d:\Rboo"

def get_ftp():
    for attempt in range(5):
        try:
            print(f"🔌 Connecting to FTP (Attempt {attempt+1})...")
            ftp = ftplib.FTP(timeout=45)
            ftp.connect(FTP_HOST, 21)
            ftp.login(FTP_USER, FTP_PASS)
            ftp.set_pasv(True)
            print("✅ Logged in successfully!")
            return ftp
        except Exception as e:
            print(f"  Connection attempt failed ({e}), retrying in 3s...")
            time.sleep(3)
    raise Exception("Could not connect to FTP after 5 attempts.")

ftp = get_ftp()

def ensure_remote_dir(remote_dir):
    parts = [p for p in remote_dir.split('/') if p]
    current = ""
    for part in parts:
        current += "/" + part
        try:
            ftp.cwd(current)
        except ftplib.error_perm:
            try:
                ftp.mkd(current)
            except Exception:
                pass
    ftp.cwd("/")

for rel_path in files_to_upload:
    local_path = os.path.join(base_dir, rel_path)
    remote_path = "/" + rel_path.replace("\\", "/").lstrip("/")
    remote_dir = os.path.dirname(remote_path)
    filename = os.path.basename(remote_path)
    
    if not os.path.exists(local_path):
        print(f"⚠️ Missing local file: {local_path}")
        continue
        
    ensure_remote_dir(remote_dir)
    ftp.cwd(remote_dir)
    
    with open(local_path, "rb") as f:
        ftp.storbinary(f"STOR {filename}", f)
    print(f"  -> Uploaded: {remote_path}")

ftp.cwd("/")
ftp.quit()
print("✅ All files uploaded via FTP!")

# Trigger live upgrade fix
print("\n🚀 Triggering live server fix script...")
ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

endpoint = f"{LIVE_URL}/upgrade-ar-live-fix.php"
req = urllib.request.Request(endpoint, headers={"User-Agent": "Mozilla/5.0"})
resp = urllib.request.urlopen(req, context=ctx, timeout=60)
output = resp.read().decode('utf-8', errors='ignore')
print("Server Output:\n", output)

# Clean up remote script
try:
    ftp = get_ftp()
    ftp.delete("/upgrade-ar-live-fix.php")
    print("🧹 Cleaned up /upgrade-ar-live-fix.php from live server.")
    ftp.quit()
except Exception as e:
    print("Note on cleanup:", e)

# Final Live Verification
print("\n🔍 Verifying Live Arabic URL: https://www.rboaccounting.ae/ar/refund/ ...")
time.sleep(2)
live_post_url = f"{LIVE_URL}/ar/refund/"
req_post = urllib.request.Request(live_post_url, headers={"User-Agent": "Mozilla/5.0"})
resp_post = urllib.request.urlopen(req_post, context=ctx, timeout=30)
html = resp_post.read().decode('utf-8', errors='ignore')

print(f"✅ Status: {resp_post.getcode()} OK")
print("HTML Length:", len(html))
print("Has hidden entry-title CSS:", ".entry-title" in html and "display: none !important" in html)
print("Has elementor-page class:", "elementor-page" in html)
print("Has rbo-services-subpage class:", "rbo-services-subpage" in html)
print("Has document.cookie in toggle:", "document.cookie" in html)
print("Has Cairo font:", "family=Cairo" in html)
print("Has Arabic Hero Title:", "خدمات استرداد ضريبة القيمة المضافة" in html)
print("Has Arabic Consult Card:", "احجز استشارة ضريبية مجانية" in html or "طلب استشارة" in html)
