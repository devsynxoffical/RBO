#!/usr/bin/env python3
"""
RBO Accounting — Automated FTP Live Deployment Script
Uploads all new blogs, scripts, and featured images directly to public_html/ via FTP.

Usage:
  python3 ftp-deploy.py <FTP_HOST> <FTP_USER> <FTP_PASS> [REMOTE_DIR]

Example:
  python3 ftp-deploy.py ftp.rboaccounting.ae myuser mysecretpass /public_html
"""

import os
import sys
import ftplib
import urllib.request

def ensure_remote_dir(ftp, remote_dir):
    """Recursively ensure remote directory exists."""
    dirs = [d for d in remote_dir.split('/') if d]
    current = ""
    for d in dirs:
        current += "/" + d
        try:
            ftp.cwd(current)
        except ftplib.error_perm:
            try:
                ftp.mkd(current)
                ftp.cwd(current)
            except Exception as e:
                pass

def upload_file(ftp, local_path, remote_path):
    """Upload a single file in binary mode."""
    remote_dir = os.path.dirname(remote_path)
    if remote_dir:
        ensure_remote_dir(ftp, remote_dir)
        ftp.cwd(remote_dir)
    filename = os.path.basename(remote_path)
    with open(local_path, 'rb') as f:
        ftp.storbinary(f'STOR {filename}', f)
    print(f" ✅ Uploaded: {remote_path}")

def main():
    if len(sys.argv) < 4:
        print("\n" + "="*60)
        print(" RBO Accounting — Automated FTP Deployment")
        print("="*60)
        print("Usage:")
        print("  python3 ftp-deploy.py <FTP_HOST> <FTP_USER> <FTP_PASS> [REMOTE_DIR]")
        print("\nParameters:")
        print("  FTP_HOST   : e.g. ftp.rboaccounting.ae or server IP")
        print("  FTP_USER   : Your FTP username (e.g. hassan@rboaccounting.ae or cPanel user)")
        print("  FTP_PASS   : Your FTP password")
        print("  REMOTE_DIR : Default is '/public_html' (or '/' depending on FTP account root)")
        print("="*60 + "\n")
        sys.exit(1)

    host = sys.argv[1]
    user = sys.argv[2]
    password = sys.argv[3]
    remote_base = sys.argv[4] if len(sys.argv) > 4 else "/public_html"

    print(f"\n🔌 Connecting to FTP: {host} as {user}...")
    try:
        ftp = ftplib.FTP(host, timeout=30)
        ftp.login(user=user, passwd=password)
        ftp.set_pasv(True)
        print("✅ FTP Login Successful!\n")
    except Exception as e:
        print(f"❌ FTP Connection Failed: {e}")
        sys.exit(1)

    # Test cwd to remote_base; if not found, test if root is already public_html
    try:
        ftp.cwd(remote_base)
        print(f"📂 Working directory set to: {remote_base}")
    except ftplib.error_perm:
        print(f"⚠️ Remote dir '{remote_base}' not found, trying root '/'...")
        ftp.cwd('/')
        remote_base = ""

    base_dir = os.path.dirname(os.path.abspath(__file__))

    # Files to deploy
    files_to_deploy = [
        # 1. New & Updated Publisher Scripts
        ('publish-ct-returns-blog.php', f"{remote_base}/publish-ct-returns-blog.php"),
        ('publish-tax-reconsideration-blog.php', f"{remote_base}/publish-tax-reconsideration-blog.php"),
        ('update-top-gsc-pages.php', f"{remote_base}/update-top-gsc-pages.php"),
        ('rbo-seo-master.php', f"{remote_base}/rbo-seo-master.php"),
        # 2. Featured Images
        ('wp-content/uploads/2026/09/corporate-tax-reconsideration-penalty-waiver-uae.jpg', 
         f"{remote_base}/wp-content/uploads/2026/09/corporate-tax-reconsideration-penalty-waiver-uae.jpg"),
        ('wp-content/uploads/2026/09/uae-corporate-tax-returns-ct-registration-guide-2026.jpg', 
         f"{remote_base}/wp-content/uploads/2026/09/uae-corporate-tax-returns-ct-registration-guide-2026.jpg"),
    ]

    print("\n🚀 Starting File Uploads via FTP...")
    for local_rel, remote_rel in files_to_deploy:
        local_full = os.path.join(base_dir, local_rel)
        if os.path.exists(local_full):
            upload_file(ftp, local_full, remote_rel)
        else:
            print(f"⚠️ Local file missing: {local_rel}")

    ftp.quit()
    print("\n🎉 All Files Successfully Uploaded to Live Server!\n")

    # Step 3: Trigger Live Web Execution
    endpoints = [
        "https://www.rboaccounting.ae/publish-ct-returns-blog.php",
        "https://www.rboaccounting.ae/update-top-gsc-pages.php"
    ]
    print("⚡ Triggering Live WordPress Execution Endpoints...")
    for ep in endpoints:
        try:
            req = urllib.request.Request(ep, headers={'User-Agent': 'Mozilla/5.0'})
            res = urllib.request.urlopen(req, timeout=15)
            print(f" ✅ Triggered ({res.getcode()}): {ep}")
        except Exception as ex:
            print(f" ⚠️ Notice triggering {ep}: {ex}")

    print("\n" + "="*60)
    print(" 🚀 LIVE DEPLOYMENT COMPLETE!")
    print(" - Previous Blog (Oct 5): https://www.rboaccounting.ae/corporate-tax-reconsideration-penalty-waiver-uae/")
    print(" - New Trending Blog (Oct 7): https://www.rboaccounting.ae/uae-corporate-tax-returns-ct-registration-guide-2026/")
    print(" - Upgraded Abu Dhabi Hub: https://www.rboaccounting.ae/areas-we-serve/abu-dhabi/")
    print(" - Upgraded Penalty Reconsideration Hub: https://www.rboaccounting.ae/our-services/vat-registration-filing/penalty-reconsideration/")
    print(" - Upgraded AP/AR Outsourcing Hub: https://www.rboaccounting.ae/our-services/accounting/accounts-payable-and-receivable/")
    print("="*60 + "\n")

if __name__ == '__main__':
    main()
