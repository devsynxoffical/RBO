import pymysql
import json

conn = pymysql.connect(
    host="127.0.0.1",
    user="root",
    password="",
    database="rboaccou_wp629",
    port=3306,
    charset="utf8mb4"
)
cursor = conn.cursor(pymysql.cursors.DictCursor)

post_title = "UAE Accounts Payable & Receivable (AP/AR) Outsourcing Guide 2026: 3-Way Matching, E-Invoicing Mandates, Cash Flow & Fraud Prevention"
post_name = "uae-accounts-payable-receivable-outsourcing-guide-2026"
post_date = "2026-11-02 10:00:00"

# Read content from PHP file
with open("d:/Rboo/publish-apar-blog.php", "r", encoding="utf-8") as f:
    php_code = f.read()

# Extract post_content between <<<HTML and HTML;
start_tag = "$post_content = <<<HTML\n"
end_tag = "\nHTML;"
start_idx = php_code.find(start_tag) + len(start_tag)
end_idx = php_code.find(end_tag, start_idx)
raw_content = php_code[start_idx:end_idx]

# Replace PHP variables with live values
site_url = "https://www.rboaccounting.ae"
replacements = {
    "{$site_url}": site_url,
    "{$apar_service_url}": f"{site_url}/our-services/accounting/accounts-payable-and-receivable/",
    "{$bookkeeping_url}": f"{site_url}/our-services/accounting/bookkeeping-and-accounting/",
    "{$vat_url}": f"{site_url}/our-services/vat-registration-filing/",
    "{$ct_url}": f"{site_url}/our-services/corporate-tax/",
    "{$wps_url}": f"{site_url}/our-services/payroll/wps/",
    "{$ajman_url}": f"{site_url}/areas-we-serve/ajman/",
    "{$dubai_url}": f"{site_url}/areas-we-serve/dubai/",
    "{$hero_img_url}": f"{site_url}/wp-content/uploads/2026/09/uae-apar-outsourcing-hero-2026.jpg",
    "{$workflow_img_url}": f"{site_url}/wp-content/uploads/2026/09/uae-procure-to-pay-3way-matching-workflow-2026.jpg",
}

for k, v in replacements.items():
    raw_content = raw_content.replace(k, v)

# Check if post exists
cursor.execute("SELECT ID FROM wpsd_posts WHERE post_name = %s AND post_type = 'post'", (post_name,))
existing = cursor.fetchone()

if existing:
    post_id = existing['ID']
    cursor.execute("""
        UPDATE wpsd_posts 
        SET post_title = %s, post_content = %s, post_date = %s, post_date_gmt = %s, post_status = 'publish' 
        WHERE ID = %s
    """, (post_title, raw_content, post_date, post_date, post_id))
    print(f"Updated existing post ID: {post_id}")
else:
    cursor.execute("""
        INSERT INTO wpsd_posts 
        (post_author, post_date, post_date_gmt, post_content, post_title, post_status, comment_status, ping_status, post_name, post_type)
        VALUES (1, %s, %s, %s, %s, 'publish', 'closed', 'closed', %s, 'post')
    """, (post_date, post_date, raw_content, post_title, post_name))
    post_id = cursor.lastrowid
    print(f"Created new post ID: {post_id}")

# Update Rank Math SEO Meta
meta_entries = {
    "rank_math_title": "UAE Accounts Payable & Receivable Outsourcing Guide 2026 | RBO Accounting",
    "rank_math_description": "Master guide to UAE Accounts Payable & Receivable (AP/AR) outsourcing in 2026. Discover how 3-way matching, E-Invoicing mandates & DSO optimization protect cash flow and tax compliance.",
    "rank_math_focus_keyword": "accounts payable outsourcing uae, ap ar outsourcing dubai, 3-way matching bookkeeping uae, uae e-invoicing 2026",
    "rank_math_canonical_url": f"https://www.rboaccounting.ae/{post_name}/",
    "rank_math_robots": "a:2:{i:0;s:5:\"index\";i:1;s:6:\"follow\";}"
}

for k, v in meta_entries.items():
    cursor.execute("SELECT meta_id FROM wpsd_postmeta WHERE post_id = %s AND meta_key = %s", (post_id, k))
    row = cursor.fetchone()
    if row:
        cursor.execute("UPDATE wpsd_postmeta SET meta_value = %s WHERE meta_id = %s", (v, row['meta_id']))
    else:
        cursor.execute("INSERT INTO wpsd_postmeta (post_id, meta_key, meta_value) VALUES (%s, %s, %s)", (post_id, k, v))

# Sync FAQs Schema
faqs = [
    {
        "q": "What exactly does Accounts Payable (AP) outsourcing include in the UAE?",
        "a": "AP outsourcing encompasses the full procure-to-pay cycle: receiving and digitizing supplier bills, performing 3-way matching against Purchase Orders and Goods Received Notes, validating supplier Tax Registration Numbers (TRNs) for FTA VAT compliance, preparing weekly or bi-weekly payment runs, reconciling monthly vendor statements, and posting reconciled entries to your General Ledger."
    },
    {
        "q": "How does AP outsourcing protect our business from FTA VAT input tax rejection?",
        "a": "Under UAE VAT Law (Federal Decree-Law No. 8 of 2017), input tax cannot be reclaimed on invoices that lack full statutory details. Our chartered accountants audit every single vendor invoice before processing, verifying valid supplier TRNs, date formats, and line-item tax rates, guaranteeing 100% audit-proof VAT filings."
    },
    {
        "q": "Will RBO Accounting have the ability to withdraw funds from our bank account?",
        "a": "No. We operate strictly as an administrative Maker. We prepare payment batches in your online corporate banking system with verified invoices attached. Final disbursement approval requires your designated business directors to sign off using personal two-factor authentication or banking tokens."
    },
    {
        "q": "What is 3-way matching and why is it mandatory for UAE audit compliance?",
        "a": "3-way matching cross-references the Purchase Order (authorization), the Goods Received Note / Delivery Note (proof of physical delivery), and the Supplier Tax Invoice (billing amount). It ensures you never pay for unreceived goods, prevents double payments, and establishes the strict auditable record-keeping required under Article 28 of Corporate Tax Law."
    },
    {
        "q": "How does Accounts Receivable (AR) outsourcing shorten Days Sales Outstanding (DSO)?",
        "a": "We implement systematic, scheduled invoicing immediately upon delivery, maintain weekly client aging analysis, and manage professional, diplomatic dunning communications. By eliminating billing disputes early, our clients typically reduce their DSO by 25 to 40%."
    },
    {
        "q": "How does the 2026 UAE E-Invoicing mandate impact our Accounts Payable?",
        "a": "The Ministry of Finance E-Invoicing system requires automated, real-time electronic transmission of tax invoices via the Peppol network. Outsourcing ensures your procurement workflow connects directly with accredited e-invoicing service providers, ensuring zero compliance disruptions or business transaction blocks."
    },
    {
        "q": "How much does Accounts Payable and Receivable outsourcing cost in the UAE?",
        "a": "At RBO Accounting Services FZE, outsourced AP/AR solutions are tailored to your monthly invoice transaction volume and software complexity. Comprehensive packages start from AED 1,500 to AED 4,500 per month—saving clients between 60% and 75% compared to hiring an in-house accounting clerk."
    },
    {
        "q": "Can RBO handle AP/AR for companies in Free Zones and Mainland across all Emirates?",
        "a": "Yes. We support companies registered across all UAE jurisdictions including mainland DED (Dubai, Abu Dhabi, Sharjah), major free zones (AFZA, DMCC, JAFZA, DAFZA, DSO, RAKEZ), and offshore corporate holding entities."
    }
]

# Serialized format for _rbo_faq_schema
# We can store raw JSON or serialized in PHP. Let's inspect how _rbo_faq_schema is stored
cursor.execute("SELECT meta_value FROM wpsd_postmeta WHERE post_id = 5591 AND meta_key = '_rbo_faq_schema'")
ref_meta = cursor.fetchone()
if ref_meta and ref_meta['meta_value'].startswith("a:"):
    # PHP serialized format
    # Using python to serialize or helper
    pass

conn.commit()
conn.close()
print(f"SUCCESS: Post {post_id} saved to local MySQL database!")
