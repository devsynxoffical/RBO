#!/usr/bin/env python3
"""
Verify live Arabic pages - check key pages for Arabic content
"""
import urllib.request
import time

SITE = 'https://www.rboaccounting.ae'

test_pages = [
    ('/ar/home-ar/', 'Arabic home'),
    ('/ar/end-of-service-benefits/', 'EOSB Arabic'),
    ('/ar/areas-we-serve-2/fujairah/', 'Fujairah Arabic'),
    ('/ar/our-services-2/', 'Services Arabic'),
    ('/ar/about-us-2/', 'About Us Arabic'),
    ('/ar/areas-we-serve-2/dubai/', 'Dubai Arabic'),
    ('/ar/areas-we-serve-2/ajman/', 'Ajman Arabic'),
    # English pages - should NOT have Arabic
    ('/', 'English Home'),
    ('/about-us/', 'About Us English'),
    ('/our-services/', 'Services English'),
]

print("Verifying live Arabic pages...\n")

for path, label in test_pages:
    url = SITE + path
    try:
        req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0 RBO-Verify/1.0'})
        with urllib.request.urlopen(req, timeout=20) as resp:
            html = resp.read().decode('utf-8', errors='replace')
        
        is_ar_page = '/ar/' in path
        
        # Count Arabic characters
        ar_chars = sum(1 for c in html if '\u0600' <= c <= '\u06FF')
        
        # Check for English-only indicators (bad on Arabic pages)
        has_en_heading = 'Nationwide Accounting' in html or 'Turnkey Financial' in html
        has_ar_text = ar_chars > 1000
        
        # PHP warnings
        has_warning = 'Warning:' in html[:500]
        
        status = "✓" if (has_ar_text if is_ar_page else not has_en_heading) else "✗"
        warn = " ⚠ PHP WARNINGS" if has_warning else ""
        
        print(f"{status} [{label}] {path}")
        print(f"   Arabic chars: {ar_chars:,} | EN heading bleed: {has_en_heading}{warn}")
        
    except Exception as e:
        print(f"✗ [{label}] ERROR: {e}")
    
    time.sleep(1)

print("\nDone!")
