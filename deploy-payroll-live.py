import os
import ftplib
import urllib.request
import ssl

FTP_HOST = "185.243.77.60"
FTP_USER = "devsynx@rboaccounting.ae"
FTP_PASS = "Devsynx2026!#"
LIVE_URL = "https://www.rboaccounting.ae"

files_to_upload = [
    "publish-payroll-wps-blog.php",
    "wp-content/uploads/2026/09/uae-payroll-wps-compliance-guide-2026-mohre.jpg",
    "wp-content/uploads/2026/09/uae-payroll-wps-compliance-guide-2026-mohre-1024x576.jpg",
    "wp-content/uploads/2026/09/uae-payroll-wps-compliance-guide-2026-mohre-768x432.jpg",
    "wp-content/uploads/2026/09/uae-payroll-wps-compliance-guide-2026-mohre-300x169.jpg",
    "wp-content/uploads/2026/09/uae-payroll-wps-compliance-guide-2026-mohre-150x150.jpg",
    "wp-content/uploads/2026/09/uae-wps-compliance-dashboard-sif-workflow-2026.jpg",
    "wp-content/uploads/2026/09/uae-wps-compliance-dashboard-sif-workflow-2026-1024x576.jpg",
    "wp-content/uploads/2026/09/uae-wps-compliance-dashboard-sif-workflow-2026-768x432.jpg",
    "wp-content/uploads/2026/09/uae-wps-compliance-dashboard-sif-workflow-2026-300x169.jpg",
    "wp-content/uploads/2026/09/uae-wps-compliance-dashboard-sif-workflow-2026-150x150.jpg",
]

base_dir = r"d:\Rboo"

print("🔌 Connecting to FTP:", FTP_HOST)
ftp = ftplib.FTP(timeout=30)
ftp.connect(FTP_HOST, 21)
ftp.login(FTP_USER, FTP_PASS)
ftp.set_pasv(True)

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
    print(f"✅ Uploaded: {remote_path} ({os.path.getsize(local_path)} bytes)")
    ftp.cwd("/")

ftp.quit()
print("\n🎉 All files uploaded to live server!")

# Trigger live execution
trigger_url = f"{LIVE_URL}/publish-payroll-wps-blog.php"
print(f"\n🚀 Triggering live endpoint: {trigger_url}")

ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

req = urllib.request.Request(
    trigger_url,
    headers={"User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36"}
)

try:
    with urllib.request.urlopen(req, context=ctx, timeout=30) as response:
        html = response.read().decode('utf-8', errors='ignore')
        print(f"✅ Live response status: {response.status}")
        if "MASTER PAYROLL & WPS BLOG PUBLISHING COMPLETED" in html or "Successfully Published" in html:
            print("🌟 Live WordPress blog published successfully!")
        else:
            print("Preview of live response:\n", html[:500])
except Exception as e:
    print(f"⚠️ Error triggering live endpoint: {e}")
