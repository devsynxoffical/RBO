import urllib.request
import ssl
import re

ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

hubs = [
    ("Dubai", "https://www.rboaccounting.ae/ar/areas-we-serve-2/dubai/"),
    ("Abu Dhabi", "https://www.rboaccounting.ae/ar/areas-we-serve-2/abu-dhabi/"),
    ("Sharjah", "https://www.rboaccounting.ae/ar/areas-we-serve-2/sharjah/"),
    ("Ajman", "https://www.rboaccounting.ae/ar/areas-we-serve-2/ajman/"),
    ("Ras Al Khaimah", "https://www.rboaccounting.ae/ar/areas-we-serve-2/ras-al-khaimah/"),
    ("Fujairah", "https://www.rboaccounting.ae/ar/areas-we-serve-2/fujairah/"),
    ("Umm Al Quwain", "https://www.rboaccounting.ae/ar/areas-we-serve-2/umm-al-quwain/")
]

print("==================================================")
print("AUDITING ALL 7 REGIONAL HUBS LIVE")
print("==================================================")

for name, u in hubs:
    req = urllib.request.Request(u, headers={"User-Agent": "Mozilla/5.0"})
    html = urllib.request.urlopen(req, context=ctx).read().decode('utf-8', errors='ignore')
    
    # Check for English fragments in hero
    has_landscape = 'business landscape looks quite' in html
    has_accounting_partner = 'Accounting Partner That' in html
    has_certified_pro = 'Certified Accounting Professionals' in html
    has_en_faq = 'Frequently Asked Questions' in html
    has_ar_h1 = ('شركة' in html or 'مكتب' in html or 'خدمات' in html)
    
    print(f"\n[{name}] -> {u}")
    print(f"  Hero in Arabic: {'PASS' if has_ar_h1 and not has_landscape and not has_accounting_partner else 'FAIL'}")
    print(f"  English Cert Removed: {'PASS' if not has_certified_pro else 'FAIL'}")
    print(f"  English FAQ Removed: {'PASS' if not has_en_faq else 'FAIL'}")
    print(f"  Arabic Menu & Footer: {'PASS' if 'الرئيسية' in html and 'خدماتنا' in html else 'FAIL'}")

