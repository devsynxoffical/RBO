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
    "upgrade-vat-refund-live.php",
    "wp-content/mu-plugins/rbo-seo-extras.php",
    "wp-content/rbo-seo-extras.php",
    "wp-content/wp-content/mu-plugins/rbo-seo-extras.php",
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
            print(f"⚠️ Missing local file (skipping): {local_path}")
            continue
            
        ensure_remote_dir(remote_dir)
        ftp.cwd(remote_dir)
        
        with open(local_path, "rb") as f:
            ftp.storbinary(f"STOR {filename}", f)
        print(f"  -> Uploaded: {remote_path}")

    ftp.cwd("/")
    ftp.quit()
    print("✅ All files uploaded via FTP!")

    # Now trigger live upgrade script
    print("\n🚀 Triggering live database upgrade endpoint...")
    ctx = ssl.create_default_context()
    ctx.check_hostname = False
    ctx.verify_mode = ssl.CERT_NONE

    endpoint = f"{LIVE_URL}/upgrade-vat-refund-live.php"
    req = urllib.request.Request(endpoint, headers={"User-Agent": "Mozilla/5.0"})
    resp = urllib.request.urlopen(req, context=ctx, timeout=30)
    output = resp.read().decode('utf-8', errors='ignore')
    print("Live Script Output:\n", output)

    # Clean up upgrade script on remote
    ftp = ftplib.FTP(timeout=30)
    ftp.connect(FTP_HOST, 21)
    ftp.login(FTP_USER, FTP_PASS)
    try:
        ftp.delete("/upgrade-vat-refund-live.php")
        print("🧹 Cleaned up /upgrade-vat-refund-live.php from live server.")
    except Exception as e:
        print("Note on cleanup:", e)
    ftp.quit()

    # Final live verification
    print("\n🔍 Verifying live target URL: https://www.rboaccounting.ae/our-services/vat-registration-filing/refund/ ...")
    time.sleep(2)
    live_post_url = f"{LIVE_URL}/our-services/vat-registration-filing/refund/"
    req_post = urllib.request.Request(live_post_url, headers={"User-Agent": "Mozilla/5.0"})
    resp_post = urllib.request.urlopen(req_post, context=ctx, timeout=30)
    html = resp_post.read().decode('utf-8', errors='ignore')
    
    print(f"✅ Status: {resp_post.getcode()} OK")
    print("HTML Length:", len(html))
    print("Contains Commercial Landlords:", "Commercial Landlords & Developers" in html)
    print("Contains Engineering Consultants:", "Engineering & Architectural Consultants" in html)
    print("Contains Civil & MEP Contractors:", "Civil, MEP & Fit-Out Contractors" in html)
    print("Contains CAS 10-Yr Table:", "Article 57 Capital Assets Scheme" in html)
    print("Contains FAQ Section:", "Frequently Asked Questions: UAE VAT Refunds" in html)
    print("Contains FAQPage Schema:", "FAQPage" in html)
    print("Contains Service Schema:", "VAT Refund Claim Services for Landlords" in html)
    
    title_match = re.search(r"<title>(.*?)</title>", html)
    if title_match:
        print(f"Live Meta Title: {title_match.group(1)}")
        
    desc_match = re.search(r'<meta name="description" content="(.*?)"', html)
    if desc_match:
        print(f"Live Meta Description: {desc_match.group(1)}")

except Exception as e:
    print("❌ Deployment error:", e)

