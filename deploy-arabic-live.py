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
    "setup-arabic-live.php",
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
            print(f"  Connection attempt failed ({e}), retrying in 4s...")
            time.sleep(4)
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

# Trigger live script
print("\n🚀 Executing live Arabic deployment on server...")
ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

endpoint = f"{LIVE_URL}/setup-arabic-live.php"
req = urllib.request.Request(endpoint, headers={"User-Agent": "Mozilla/5.0"})
resp = urllib.request.urlopen(req, context=ctx, timeout=90)
output = resp.read().decode('utf-8', errors='ignore')
print("Server Output:\n", output)

# Clean up script on remote
try:
    ftp = get_ftp()
    ftp.delete("/setup-arabic-live.php")
    print("🧹 Cleaned up /setup-arabic-live.php from live server.")
    ftp.quit()
except Exception as e:
    print("Note on cleanup:", e)

# Verify Live URLs
print("\n🔍 Verifying Live URLs...")
time.sleep(3)

test_urls = [
    f"{LIVE_URL}/our-services/vat-registration-filing/refund/",
    f"{LIVE_URL}/ar/refund/",
    f"{LIVE_URL}/afz-new-lighter-package-2026-ajman-free-zone-setup/",
    f"{LIVE_URL}/ar/afz-lighter-package-2026-ajman-free-zone/"
]

for u in test_urls:
    try:
        req_test = urllib.request.Request(u, headers={"User-Agent": "Mozilla/5.0"})
        resp_test = urllib.request.urlopen(req_test, context=ctx, timeout=25)
        html = resp_test.read().decode('utf-8', errors='ignore')
        
        title_match = re.search(r"<title>(.*?)</title>", html)
        title = title_match.group(1) if title_match else "N/A"
        
        has_toggle = "rbo-global-lang-toggle" in html
        has_rtl = "dir=\"rtl\"" in html or "direction: rtl" in html
        
        print(f"[{resp_test.getcode()} OK] {u}")
        print(f"  Title: {title[:75]}...")
        print(f"  Has Toggle: {has_toggle} | Has RTL: {has_rtl} | Bytes: {len(html)}")
    except Exception as err:
        print(f"❌ Error testing {u}: {err}")
