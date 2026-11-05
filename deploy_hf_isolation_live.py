import ftplib
import os
import time
import urllib.request
import ssl

FTP_HOST = "185.243.77.60"
FTP_USER = "devsynx@rboaccounting.ae"
FTP_PASS = "Devsynx2026!#"
LIVE_URL = "https://www.rboaccounting.ae"

files_to_upload = [
    "wp-content/mu-plugins/rbo-seo-extras.php",
    "wp-content/rbo-seo-extras.php",
    "wp-content/wp-content/mu-plugins/rbo-seo-extras.php",
    "flush_live_hf_cache.php"
]

base_dir = r"d:\Rboo"

def get_ftp():
    for attempt in range(5):
        try:
            print(f"Connecting to FTP (Attempt {attempt+1})...")
            ftp = ftplib.FTP(timeout=45)
            ftp.connect(FTP_HOST, 21)
            ftp.login(FTP_USER, FTP_PASS)
            ftp.set_pasv(True)
            print("Logged in successfully!")
            return ftp
        except Exception as e:
            print(f"  Connection attempt failed ({e}), retrying in 3s...")
            time.sleep(3)
    raise Exception("Could not connect to FTP after 5 attempts.")

ftp = get_ftp()

for rel_path in files_to_upload:
    local_path = os.path.join(base_dir, rel_path.replace("/", "\\"))
    if not os.path.exists(local_path):
        print(f"Local file not found: {local_path}, skipping.")
        continue
    
    parts = rel_path.split("/")
    filename = parts[-1]
    dir_path = "/".join(parts[:-1]) if len(parts) > 1 else ""
    
    ftp.cwd("/")
    if dir_path:
        for folder in dir_path.split("/"):
            try:
                ftp.cwd(folder)
            except Exception:
                ftp.mkd(folder)
                ftp.cwd(folder)
    
    print(f"Uploading {rel_path} -> {ftp.pwd()}/{filename}...")
    with open(local_path, "rb") as fp:
        ftp.storbinary(f"STOR {filename}", fp)
    print(f"Uploaded {rel_path} successfully!")

ftp.quit()

print("\nTriggering flush_live_hf_cache.php on Live...")
ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

req = urllib.request.Request(f"{LIVE_URL}/flush_live_hf_cache.php", headers={"User-Agent": "Mozilla/5.0"})
try:
    with urllib.request.urlopen(req, context=ctx, timeout=20) as resp:
        res_data = resp.read().decode("utf-8")
        print("Flush Response:", res_data)
except Exception as e:
    print("Error calling flush script:", e)

# Now verify Live pages
def verify_live(url, expected):
    req = urllib.request.Request(url, headers={"User-Agent": "Mozilla/5.0"})
    try:
        with urllib.request.urlopen(req, context=ctx, timeout=20) as resp:
            html = resp.read().decode("utf-8", errors="ignore")
        has_ar_btn = 'فحص مجاني للضريبة' in html
        has_en_btn = 'Free VAT Check' in html
        has_ar_ftr = 'خدماتنا' in html
        has_en_ftr = 'Our Services' in html
        print(f"\nLive Check: {url} (Expected: {expected})")
        print(f"  Header Arabic CTA ('فحص مجاني للضريبة'): {has_ar_btn}")
        print(f"  Header English CTA ('Free VAT Check'): {has_en_btn}")
        print(f"  Footer Arabic Column ('خدماتنا'): {has_ar_ftr}")
        print(f"  Footer English Column ('Our Services'): {has_en_ftr}")
        if expected == 'EN':
            if has_en_btn and has_en_ftr and not has_ar_btn and not has_ar_ftr:
                print("  => 100% PURE ENGLISH ACCURATE!")
            else:
                print("  => MISMATCH DETECTED!")
        else:
            if has_ar_btn and has_ar_ftr:
                print("  => 100% PURE ARABIC ACCURATE!")
            else:
                print("  => MISMATCH DETECTED!")
    except Exception as e:
        print(f"Error fetching {url}: {e}")

verify_live(f"{LIVE_URL}/about-us/", "EN")
verify_live(f"{LIVE_URL}/areas-we-serve/dubai/", "EN")
verify_live(f"{LIVE_URL}/ar/", "AR")
verify_live(f"{LIVE_URL}/ar/areas-we-serve-2/dubai/", "AR")
verify_live(f"{LIVE_URL}/about-us/", "EN")
