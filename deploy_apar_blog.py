import ftplib
import os
import time
import urllib.request

FTP_HOST = "ftp.rboaccounting.ae"
FTP_USER = "devsynx@rboaccounting.ae"
FTP_PASS = "Devsynx2026!#"
FTP_PORT = 21

def get_ftp():
    ftp = ftplib.FTP(timeout=30)
    ftp.connect(FTP_HOST, FTP_PORT)
    ftp.login(user=FTP_USER, passwd=FTP_PASS)
    ftp.set_pasv(True)
    return ftp

def upload_file_with_retry(local_path, remote_dir, remote_fname, max_retries=3):
    for attempt in range(1, max_retries + 1):
        try:
            ftp = get_ftp()
            if remote_dir != "/" and remote_dir != "":
                ftp.cwd(remote_dir)
            with open(local_path, "rb") as fp:
                ftp.storbinary(f"STOR {remote_fname}", fp)
            try:
                ftp.quit()
            except Exception:
                pass
            print(f"  ✅ Uploaded {remote_fname} ({os.path.getsize(local_path):,} bytes)")
            return True
        except Exception as e:
            print(f"  ⚠️ Attempt {attempt} failed for {remote_fname}: {e}, retrying in 2s...")
            time.sleep(2)
    print(f"  ❌ FAILED to upload {remote_fname}")
    return False

files_to_upload = [
    ("publish-apar-blog.php", "/", "publish-apar-blog.php"),
    ("wp-content/uploads/2026/09/uae-apar-outsourcing-hero-2026.jpg", "/wp-content/uploads/2026/09", "uae-apar-outsourcing-hero-2026.jpg"),
    ("wp-content/uploads/2026/09/uae-apar-outsourcing-hero-2026-1024x576.jpg", "/wp-content/uploads/2026/09", "uae-apar-outsourcing-hero-2026-1024x576.jpg"),
    ("wp-content/uploads/2026/09/uae-apar-outsourcing-hero-2026-768x432.jpg", "/wp-content/uploads/2026/09", "uae-apar-outsourcing-hero-2026-768x432.jpg"),
    ("wp-content/uploads/2026/09/uae-apar-outsourcing-hero-2026-300x169.jpg", "/wp-content/uploads/2026/09", "uae-apar-outsourcing-hero-2026-300x169.jpg"),
    ("wp-content/uploads/2026/09/uae-apar-outsourcing-hero-2026-150x150.jpg", "/wp-content/uploads/2026/09", "uae-apar-outsourcing-hero-2026-150x150.jpg"),
    ("wp-content/uploads/2026/09/uae-procure-to-pay-3way-matching-workflow-2026.jpg", "/wp-content/uploads/2026/09", "uae-procure-to-pay-3way-matching-workflow-2026.jpg"),
    ("wp-content/uploads/2026/09/uae-procure-to-pay-3way-matching-workflow-2026-1024x576.jpg", "/wp-content/uploads/2026/09", "uae-procure-to-pay-3way-matching-workflow-2026-1024x576.jpg"),
    ("wp-content/uploads/2026/09/uae-procure-to-pay-3way-matching-workflow-2026-768x432.jpg", "/wp-content/uploads/2026/09", "uae-procure-to-pay-3way-matching-workflow-2026-768x432.jpg"),
    ("wp-content/uploads/2026/09/uae-procure-to-pay-3way-matching-workflow-2026-300x169.jpg", "/wp-content/uploads/2026/09", "uae-procure-to-pay-3way-matching-workflow-2026-300x169.jpg"),
    ("wp-content/uploads/2026/09/uae-procure-to-pay-3way-matching-workflow-2026-150x150.jpg", "/wp-content/uploads/2026/09", "uae-procure-to-pay-3way-matching-workflow-2026-150x150.jpg"),
]

base_dir = r"d:\Rboo"
print(f"🚀 Starting individual file upload via {FTP_HOST}...")

success_count = 0
for rel_path, remote_dir, remote_fname in files_to_upload:
    local_path = os.path.join(base_dir, rel_path)
    if os.path.exists(local_path):
        if upload_file_with_retry(local_path, remote_dir, remote_fname):
            success_count += 1
    else:
        print(f"❌ Missing: {local_path}")

print(f"\n🎉 Finished uploading: {success_count}/{len(files_to_upload)} files.")

# Trigger live execution
trigger_url = "https://www.rboaccounting.ae/publish-apar-blog.php"
print(f"\n🌐 Triggering endpoint: {trigger_url}")

req = urllib.request.Request(trigger_url, headers={"User-Agent": "Mozilla/5.0"})
try:
    with urllib.request.urlopen(req, timeout=30) as resp:
        print("Response:", resp.read().decode("utf-8"))
except Exception as e:
    print("Execution trigger note:", e)
