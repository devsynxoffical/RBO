import ftplib
import os

FTP_HOST = "185.243.77.60"
FTP_USER = "devsynx@rboaccounting.ae"
FTP_PASS = "Devsynx2026!#"

ftp = ftplib.FTP(FTP_HOST)
ftp.login(FTP_USER, FTP_PASS)
ftp.set_pasv(True)

files_to_upload = [
    (r"d:\Rboo\wp-content\mu-plugins\rbo-seo-extras.php", "wp-content/mu-plugins/rbo-seo-extras.php"),
    (r"d:\Rboo\.htaccess", ".htaccess")
]

for local_path, remote_path in files_to_upload:
    print(f"Uploading {local_path} -> {remote_path}...")
    with open(local_path, "rb") as f:
        ftp.storbinary(f"STOR {remote_path}", f)
    size = ftp.size(remote_path)
    print(f"Uploaded successfully! Remote size: {size} bytes")

ftp.quit()
print("All files deployed to live server successfully!")
