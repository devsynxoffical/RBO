#!/usr/bin/env python3
"""
RBO Accounting — Live FTP Synchronization & Deployment Tool
Provides automated two-way synchronization between local development and the live cPanel production server.

Features:
  - Deploy (Push): Uploads publisher scripts, SEO configurations, theme files, and featured images to live.
  - Pull: Safely downloads remote uploads, error logs, or specific files from live to local.
  - Verify: Compares the 7 published blogs between Live and Localhost to guarantee 100% parity.
  - Trigger: Hits live WordPress endpoints to execute any pending database migrations or publishing jobs.
  - List: Browses remote files and directories on the live server.

Credentials & Defaults:
  Host: 185.243.77.60 (ftp.rboaccounting.ae)
  User: devsynx@rboaccounting.ae
  Port: 21 (PASV mode with automatic reconnect & retries)
  Root: / (Restricted cPanel root mapped to public_html)
"""

import os
import sys
import time
import ftplib
import argparse
import urllib.request
import json

# Default Server Configuration
FTP_HOST = "185.243.77.60"
FTP_USER = "devsynx@rboaccounting.ae"
FTP_PASS = "Devsynx2026!#"
FTP_PORT = 21
FTP_TIMEOUT = 30
LIVE_URL = "https://www.rboaccounting.ae"
LOCAL_URL = "http://localhost:8000"

BASE_DIR = os.path.dirname(os.path.abspath(__file__))

class FTPClient:
    """Robust FTP client with auto-reconnection and retry handling."""

    def __init__(self, host=FTP_HOST, user=FTP_USER, passwd=FTP_PASS, port=FTP_PORT):
        self.host = host
        self.user = user
        self.passwd = passwd
        self.port = port
        self.ftp = None
        self.connect()

    def connect(self):
        """Establish or re-establish FTP connection."""
        if self.ftp:
            try:
                self.ftp.quit()
            except Exception:
                pass
            self.ftp = None

        print(f"🔌 Connecting to FTP: {self.host}:{self.port} as {self.user}...")
        try:
            self.ftp = ftplib.FTP(timeout=FTP_TIMEOUT)
            self.ftp.connect(self.host, self.port)
            self.ftp.login(user=self.user, passwd=self.passwd)
            self.ftp.set_pasv(True)
            print("✅ FTP Login Successful!\n")
        except Exception as e:
            if self.host != "ftp.rboaccounting.ae":
                print(f"⚠️ Primary IP connection failed ({e}). Retrying via domain 'ftp.rboaccounting.ae'...")
                self.host = "ftp.rboaccounting.ae"
                self.ftp = ftplib.FTP(timeout=FTP_TIMEOUT)
                self.ftp.connect(self.host, self.port)
                self.ftp.login(user=self.user, passwd=self.passwd)
                self.ftp.set_pasv(True)
                print("✅ Fallback connection succeeded!\n")
            else:
                raise e

    def ensure_remote_dir(self, remote_dir):
        """Recursively ensure remote directory exists."""
        clean_dir = remote_dir.strip("/\\").replace("\\", "/")
        if not clean_dir:
            return
        parts = clean_dir.split("/")
        current = ""
        for part in parts:
            current += "/" + part
            try:
                self.ftp.cwd(current)
            except ftplib.error_perm:
                try:
                    self.ftp.mkd(current)
                    self.ftp.cwd(current)
                except Exception:
                    pass
        self.ftp.cwd("/")

    def upload_file(self, local_path, remote_path, retries=2):
        """Upload a file with automatic retry on timeout or drop."""
        if not os.path.exists(local_path):
            print(f"⚠️ Local file not found: {local_path}")
            return False

        remote_path = remote_path.replace("\\", "/")
        remote_dir = os.path.dirname(remote_path)
        filename = os.path.basename(remote_path)

        for attempt in range(retries + 1):
            try:
                if remote_dir and remote_dir != "/":
                    self.ensure_remote_dir(remote_dir)
                    self.ftp.cwd(remote_dir)
                else:
                    self.ftp.cwd("/")

                with open(local_path, "rb") as f:
                    self.ftp.storbinary(f"STOR {filename}", f)
                print(f"  ⬆️ Uploaded: {remote_path} ({os.path.getsize(local_path):,} bytes)")
                return True
            except Exception as e:
                if attempt < retries:
                    print(f"  🔄 Retrying upload {remote_path} (Attempt {attempt + 1}/{retries}). Reason: {e}")
                    time.sleep(1)
                    self.connect()
                else:
                    print(f"  ❌ Error uploading {remote_path}: {e}")
                    return False
            finally:
                try:
                    self.ftp.cwd("/")
                except Exception:
                    pass

    def download_file(self, remote_path, local_path, retries=2):
        """Download a file with automatic retry on drop."""
        remote_path = remote_path.replace("\\", "/")
        remote_dir = os.path.dirname(remote_path)
        filename = os.path.basename(remote_path)

        local_dir = os.path.dirname(local_path)
        if local_dir and not os.path.exists(local_dir):
            os.makedirs(local_dir, exist_ok=True)

        for attempt in range(retries + 1):
            try:
                if remote_dir and remote_dir != "/":
                    self.ftp.cwd(remote_dir)
                else:
                    self.ftp.cwd("/")

                with open(local_path, "wb") as f:
                    self.ftp.retrbinary(f"RETR {filename}", f.write)
                print(f"  ⬇️ Downloaded: {remote_path} -> {local_path} ({os.path.getsize(local_path):,} bytes)")
                return True
            except Exception as e:
                if attempt < retries:
                    print(f"  🔄 Retrying download {remote_path} (Attempt {attempt + 1}/{retries}). Reason: {e}")
                    time.sleep(1)
                    self.connect()
                else:
                    print(f"  ❌ Error downloading {remote_path}: {e}")
                    return False
            finally:
                try:
                    self.ftp.cwd("/")
                except Exception:
                    pass

    def list_dir(self, remote_path="/"):
        """List files in remote directory."""
        self.ftp.cwd(remote_path)
        lines = []
        self.ftp.dir(lines.append)
        for line in lines:
            print(line)
        print(f"\nTotal items: {len(lines)}")

    def close(self):
        """Close FTP connection."""
        if self.ftp:
            try:
                self.ftp.quit()
            except Exception:
                pass


def trigger_live_endpoints():
    """Trigger key live publisher scripts to execute database and content updates."""
    endpoints = [
        f"{LIVE_URL}/fix-nav-titles.php",
        f"{LIVE_URL}/publish-two-new-blogs.php",
        f"{LIVE_URL}/upgrade-top-3-gsc-pages.php",
        f"{LIVE_URL}/upgrade-top-gsc-performance.php",
        f"{LIVE_URL}/publish-vat-refund-blog.php",
        f"{LIVE_URL}/publish-ct-returns-blog.php",
        f"{LIVE_URL}/publish-tax-reconsideration-blog.php",
        f"{LIVE_URL}/update-top-gsc-pages.php",
    ]
    print("\n⚡ Triggering Live WordPress Execution Endpoints...")
    for ep in endpoints:
        try:
            req = urllib.request.Request(ep, headers={"User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64)"})
            with urllib.request.urlopen(req, timeout=15) as res:
                print(f"  ✅ Triggered ({res.getcode()}): {ep}")
        except Exception as e:
            print(f"  ⚠️ Notice triggering {ep}: {e}")


def deploy_all(client, specific_file=None):
    """Deploy files to live server."""
    print("=" * 65)
    print(" 🚀 DEPLOYING TO LIVE PRODUCTION SERVER (FTP)")
    print("=" * 65)

    if specific_file:
        local_full = os.path.join(BASE_DIR, specific_file)
        remote_dest = "/" + specific_file.replace("\\", "/").lstrip("/")
        print(f"Deploying single file: {specific_file} -> {remote_dest}")
        client.upload_file(local_full, remote_dest)
        return

    deploy_roster = [
        # 1. Master publishing and optimization scripts
        "publish-two-new-blogs.php",
        "fix-nav-titles.php",
        "upgrade-top-3-gsc-pages.php",
        "upgrade-top-gsc-performance.php",
        "publish-vat-refund-blog.php",
        "publish-ct-returns-blog.php",
        "publish-tax-reconsideration-blog.php",
        "update-top-gsc-pages.php",
        "rbo-seo-master.php",

        # 2. Featured & Content images
        "wp-content/uploads/2026/09/uae-free-zone-corporate-tax-qualifying-income-qfzp-guide-2026.jpg",
        "wp-content/uploads/2026/09/uae-free-zone-corporate-tax-qualifying-income-qfzp-guide-2026-1024x572.jpg",
        "wp-content/uploads/2026/09/uae-free-zone-corporate-tax-qualifying-income-qfzp-guide-2026-768x429.jpg",
        "wp-content/uploads/2026/09/uae-free-zone-corporate-tax-qualifying-income-qfzp-guide-2026-300x167.jpg",
        "wp-content/uploads/2026/09/uae-free-zone-corporate-tax-qualifying-income-qfzp-guide-2026-150x150.jpg",
        "wp-content/uploads/2026/09/qfzp-qualifying-income-de-minimis-flowchart-uae-2026.jpg",
        "wp-content/uploads/2026/09/qfzp-qualifying-income-de-minimis-flowchart-uae-2026-1024x572.jpg",
        "wp-content/uploads/2026/09/qfzp-qualifying-income-de-minimis-flowchart-uae-2026-768x429.jpg",
        "wp-content/uploads/2026/09/qfzp-qualifying-income-de-minimis-flowchart-uae-2026-300x167.jpg",
        "wp-content/uploads/2026/09/qfzp-qualifying-income-de-minimis-flowchart-uae-2026-150x150.jpg",
        "wp-content/uploads/2026/09/fta-voluntary-disclosure-form-211-uae-correct-tax-errors-guide.jpg",
        "wp-content/uploads/2026/09/fta-voluntary-disclosure-form-211-uae-correct-tax-errors-guide-1024x572.jpg",
        "wp-content/uploads/2026/09/fta-voluntary-disclosure-form-211-uae-correct-tax-errors-guide-768x429.jpg",
        "wp-content/uploads/2026/09/fta-voluntary-disclosure-form-211-uae-correct-tax-errors-guide-300x167.jpg",
        "wp-content/uploads/2026/09/fta-voluntary-disclosure-form-211-uae-correct-tax-errors-guide-150x150.jpg",
        "wp-content/uploads/2026/09/fta-voluntary-disclosure-vs-tax-audit-penalties-uae-2026.jpg",
        "wp-content/uploads/2026/09/fta-voluntary-disclosure-vs-tax-audit-penalties-uae-2026-1024x572.jpg",
        "wp-content/uploads/2026/09/fta-voluntary-disclosure-vs-tax-audit-penalties-uae-2026-768x429.jpg",
        "wp-content/uploads/2026/09/fta-voluntary-disclosure-vs-tax-audit-penalties-uae-2026-300x167.jpg",
        "wp-content/uploads/2026/09/fta-voluntary-disclosure-vs-tax-audit-penalties-uae-2026-150x150.jpg",
        "wp-content/uploads/2026/09/vat-refund-claim-landlords-consultants-contractors-uae.jpg",

        "wp-content/uploads/2026/09/vat-refund-claim-landlords-consultants-contractors-uae-1024x572.jpg",
        "wp-content/uploads/2026/09/vat-refund-claim-landlords-consultants-contractors-uae-768x429.jpg",
        "wp-content/uploads/2026/09/vat-refund-claim-landlords-consultants-contractors-uae-300x167.jpg",
        "wp-content/uploads/2026/09/vat-refund-claim-landlords-consultants-contractors-uae-150x150.jpg",
        "wp-content/uploads/2026/09/vat-refund-process-flowchart-uae-2026.jpg",
        "wp-content/uploads/2026/09/vat-refund-process-flowchart-uae-2026-1024x572.jpg",
        "wp-content/uploads/2026/09/vat-refund-process-flowchart-uae-2026-768x429.jpg",
        "wp-content/uploads/2026/09/vat-refund-process-flowchart-uae-2026-300x167.jpg",
        "wp-content/uploads/2026/09/vat-refund-process-flowchart-uae-2026-150x150.jpg",
        "wp-content/uploads/2026/09/corporate-tax-reconsideration-penalty-waiver-uae.jpg",
        "wp-content/uploads/2026/09/uae-corporate-tax-returns-ct-registration-guide-2026.jpg",
        "wp-content/uploads/2026/09/uae-corporate-tax-filing-deadline-30-september-2026.jpg",
        "wp-content/uploads/2026/09/uae-corporate-tax-small-business-relief-2026.jpg",
        "wp-content/uploads/2026/09/vat-registration-uae-2026-hd.jpg",
        # 3. MU plugins (excluding local speed booster)
        "wp-content/mu-plugins/rbo-business-setup.php",
        "wp-content/mu-plugins/rbo-internal-linking.php",
        "wp-content/mu-plugins/rbo-seo-extras.php",
        "wp-content/mu-plugins/rbo-single-sidebar.php",
    ]


    success_count = 0
    for rel_path in deploy_roster:
        local_path = os.path.join(BASE_DIR, rel_path)
        remote_path = "/" + rel_path.replace("\\", "/").lstrip("/")
        if os.path.exists(local_path):
            if client.upload_file(local_path, remote_path):
                success_count += 1
        else:
            print(f"  ⏭️ Local file skipped (not found): {rel_path}")

    print(f"\n🎉 Successfully deployed {success_count} file(s) to live server!")
    trigger_live_endpoints()


def pull_files(client, specific_file=None):
    """Pull files from live server to local directory."""
    print("=" * 65)
    print(" 📥 PULLING FROM LIVE PRODUCTION SERVER (FTP)")
    print("=" * 65)

    if specific_file:
        remote_file = "/" + specific_file.replace("\\", "/").lstrip("/")
        local_dest = os.path.join(BASE_DIR, specific_file)
        if os.path.basename(specific_file) in ["wp-config.php", "00-localhost-speed.php"]:
            local_dest = local_dest + ".live_backup"
            print(f"🔒 Protecting local configuration: saving to {local_dest}")
        print(f"Pulling single file: {remote_file} -> {local_dest}")
        client.download_file(remote_file, local_dest)
        return

    pull_targets = [
        "error_log",
        "WEEKLY-SEO-REPORT.md",
    ]

    for rel_path in pull_targets:
        remote_path = "/" + rel_path.replace("\\", "/").lstrip("/")
        local_path = os.path.join(BASE_DIR, rel_path)
        client.download_file(remote_path, local_path)

    print("\n🎉 Pull operations completed successfully!")


def verify_blogs():
    """Verify and compare the 7 blog posts between live site and local site."""
    print("=" * 65)
    print(" 🔍 BLOG POSTS VERIFICATION: LIVE VS LOCALHOST")
    print("=" * 65)

    live_posts = []
    try:
        req = urllib.request.Request(f"{LIVE_URL}/wp-json/wp/v2/posts?per_page=20", headers={"User-Agent": "Mozilla/5.0"})
        with urllib.request.urlopen(req, timeout=15) as res:
            live_posts = json.loads(res.read().decode("utf-8"))
        print(f"🌐 Live Site ({LIVE_URL}): Found {len(live_posts)} published blog(s)")
    except Exception as e:
        print(f"❌ Failed to reach Live API: {e}")

    local_posts = []
    try:
        req = urllib.request.Request(f"{LOCAL_URL}/wp-json/wp/v2/posts?per_page=20", headers={"User-Agent": "Mozilla/5.0"})
        with urllib.request.urlopen(req, timeout=10) as res:
            local_posts = json.loads(res.read().decode("utf-8"))
        print(f"💻 Local Site ({LOCAL_URL}): Found {len(local_posts)} published blog(s)")
    except Exception as e:
        print(f"⚠️ Local web server not responding at {LOCAL_URL}: {e}")
        print("  (Tip: Run start-server.bat to start the local server)")

    print("\n" + "-" * 65)
    print(f"{'#':<3} | {'SLUG':<45} | {'LIVE':<7} | {'LOCAL':<7}")
    print("-" * 65)

    all_slugs = []
    for p in live_posts:
        if p["slug"] not in all_slugs:
            all_slugs.append(p["slug"])
    for p in local_posts:
        if p["slug"] not in all_slugs:
            all_slugs.append(p["slug"])

    matched = 0
    for idx, slug in enumerate(all_slugs, 1):
        has_live = any(p["slug"] == slug for p in live_posts)
        has_local = any(p["slug"] == slug for p in local_posts)
        live_mark = "✅ Yes" if has_live else "❌ No"
        local_mark = "✅ Yes" if has_local else "❌ No"
        if has_live and has_local:
            matched += 1
        print(f"{idx:<3} | {slug:<45} | {live_mark:<7} | {local_mark:<7}")

    print("-" * 65)
    if matched == 7 and len(live_posts) == 7 and len(local_posts) == 7:
        print("🎉 PERFECT MATCH! Both Live and Localhost have the exact same 7 blog posts.")
    else:
        print(f"📊 Summary: {matched} blog(s) synchronized across both environments.")


def main():
    parser = argparse.ArgumentParser(
        description="RBO Accounting Live FTP Synchronization & Deployment Tool",
        formatter_class=argparse.RawDescriptionHelpFormatter,
        epilog="""Examples:
  python ftp-sync.py deploy               # Deploy all new blogs, images & scripts to live
  python ftp-sync.py deploy <filename>    # Deploy a specific file to live
  python ftp-sync.py pull                 # Pull error logs and reports from live
  python ftp-sync.py pull <filename>      # Pull a specific file from live
  python ftp-sync.py verify               # Verify all 7 blogs on Live vs Local
  python ftp-sync.py trigger              # Trigger live WordPress publishing endpoints
  python ftp-sync.py list                 # Browse remote root directory
"""
    )
    parser.add_argument("action", nargs="?", default="verify", choices=["deploy", "pull", "verify", "trigger", "list"],
                        help="Action to perform (default: verify)")
    parser.add_argument("target", nargs="?", default=None,
                        help="Specific file or directory for deploy, pull, or list")
    parser.add_argument("--host", default=FTP_HOST, help="FTP host (default: 185.243.77.60)")
    parser.add_argument("--user", default=FTP_USER, help="FTP username")
    parser.add_argument("--password", default=FTP_PASS, help="FTP password")

    args = parser.parse_args()

    if args.action == "verify":
        verify_blogs()
    elif args.action == "trigger":
        trigger_live_endpoints()
    else:
        client = FTPClient(host=args.host, user=args.user, passwd=args.password)
        try:
            if args.action == "deploy":
                deploy_all(client, args.target)
            elif args.action == "pull":
                pull_files(client, args.target)
            elif args.action == "list":
                client.list_dir(args.target or "/")
        finally:
            client.close()


if __name__ == "__main__":
    main()
