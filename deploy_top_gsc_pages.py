import ftplib
import os
import subprocess
import time

FTP_HOST = "185.243.77.60"
FTP_USER = "devsynx@rboaccounting.ae"
FTP_PASS = "Devsynx2026!#"
FTP_PORT = 21

print("🔌 Connecting to live FTP via direct IP:", FTP_HOST)
ftp = ftplib.FTP(timeout=40)
ftp.connect(FTP_HOST, FTP_PORT)
ftp.login(user=FTP_USER, passwd=FTP_PASS)
ftp.set_pasv(True)
print("✅ Logged in to live FTP.")

files = [
    ("upgrade-top-gsc-pages.php", "upgrade-top-gsc-pages.php"),
    (".htaccess", ".htaccess")
]

for local_f, remote_f in files:
    with open(local_f, "rb") as fp:
        ftp.storbinary(f"STOR {remote_f}", fp)
    print(f"✅ Uploaded {remote_f} ({os.path.getsize(local_f):,} bytes)")

try:
    ftp.quit()
except Exception:
    pass

print("\n🚀 Triggering live WordPress upgrade execution endpoint via curl.exe --resolve...")
trigger_cmd = [
    "curl.exe", "-s", "-k",
    "--resolve", "www.rboaccounting.ae:443:185.243.77.60",
    "https://www.rboaccounting.ae/upgrade-top-gsc-pages.php"
]
res = subprocess.run(trigger_cmd, capture_output=True, text=True, timeout=60)
print("Live Execution Output:")
for line in res.stdout.splitlines():
    if "✅" in line or "TOP GSC" in line or "Updated" in line or "Injected" in line or "Error" in line:
        print(" ", line.strip())
