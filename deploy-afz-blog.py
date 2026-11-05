import os
import ftplib
import urllib.request
import ssl
import time

FTP_HOST = "185.243.77.60"
FTP_USER = "devsynx@rboaccounting.ae"
FTP_PASS = "Devsynx2026!#"
LIVE_URL = "https://www.rboaccounting.ae"

files_to_upload = [
    "publish-afz-lighter-package-blog.php",
    "wp-content/uploads/2026/09/afz-lighter-package-2026-hero-ajman-freezone.jpg",
    "wp-content/uploads/2026/09/afz-lighter-package-2026-hero-ajman-freezone-1024x576.jpg",
    "wp-content/uploads/2026/09/afz-lighter-package-2026-hero-ajman-freezone-768x432.jpg",
    "wp-content/uploads/2026/09/afz-lighter-package-2026-hero-ajman-freezone-300x169.jpg",
    "wp-content/uploads/2026/09/afz-lighter-package-2026-hero-ajman-freezone-150x150.jpg",
    "wp-content/uploads/2026/09/afz-11000-package-infographic-breakdown-2026.jpg",
    "wp-content/uploads/2026/09/afz-11000-package-infographic-breakdown-2026-1024x576.jpg",
    "wp-content/uploads/2026/09/afz-11000-package-infographic-breakdown-2026-768x432.jpg",
    "wp-content/uploads/2026/09/afz-11000-package-infographic-breakdown-2026-300x169.jpg",
    "wp-content/uploads/2026/09/afz-11000-package-infographic-breakdown-2026-150x150.jpg",
]

base_dir = r"d:\Rboo"

print("🔌 Connecting to FTP:", FTP_HOST)
try:
    ftp = ftplib.FTP(timeout=30)
    ftp.connect(FTP_HOST, 21)
    ftp.login(FTP_USER, FTP_PASS)
    ftp.set_pasv(True)
    print("✅ Logged in successfully!")

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
            print(f"❌ Missing local file: {local_path}")
            continue
            
        ensure_remote_dir(remote_dir)
        ftp.cwd(remote_dir)
        
        with open(local_path, "rb") as f:
            ftp.storbinary(f"STOR {filename}", f)
        print(f"  -> Uploaded: {remote_path}")

    ftp.cwd("/")
    ftp.quit()
    print("✅ All files uploaded via FTP!")

    # Now trigger live publisher script
    print("\n🚀 Triggering live publication endpoint...")
    ctx = ssl.create_default_context()
    ctx.check_hostname = False
    ctx.verify_mode = ssl.CERT_NONE

    endpoint = f"{LIVE_URL}/publish-afz-lighter-package-blog.php"
    req = urllib.request.Request(endpoint, headers={"User-Agent": "Mozilla/5.0"})
    resp = urllib.request.urlopen(req, context=ctx, timeout=30)
    output = resp.read().decode('utf-8', errors='ignore')
    print("Live Script Output:\n", output)

    # Clean up publisher script on remote
    ftp = ftplib.FTP(timeout=30)
    ftp.connect(FTP_HOST, 21)
    ftp.login(FTP_USER, FTP_PASS)
    try:
        ftp.delete("/publish-afz-lighter-package-blog.php")
        print("🧹 Cleaned up /publish-afz-lighter-package-blog.php from live server.")
    except Exception as e:
        print("Note on cleanup:", e)
    ftp.quit()

    # Final live verification
    print("\n🔍 Verifying live post URL...")
    time.sleep(2)
    live_post_url = f"{LIVE_URL}/afz-new-lighter-package-2026-ajman-free-zone-setup/"
    req_post = urllib.request.Request(live_post_url, headers={"User-Agent": "Mozilla/5.0"})
    resp_post = urllib.request.urlopen(req_post, context=ctx, timeout=30)
    html = resp_post.read().decode('utf-8', errors='ignore')
    print(f"✅ Status: {resp_post.getcode()} OK")
    print("Title in Live HTML:", "AFZ New Lighter Package" in html)
    print("Featured Image in Live HTML:", "afz-lighter-package-2026-hero-ajman-freezone" in html)
    print("Schema FAQPage in Live HTML:", "FAQPage" in html)

except Exception as e:
    print("❌ Deployment error:", e)

