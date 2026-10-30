import pymysql
import json
import ftplib
import urllib.request
import base64

conn = pymysql.connect(host='127.0.0.1', user='root', database='rboaccou_wp629', charset='utf8mb4')
cursor = conn.cursor(pymysql.cursors.DictCursor)

cursor.execute("SELECT post_id, meta_value FROM wpsd_postmeta WHERE meta_key = '_rbo_faq_schema'")
all_faq_meta = cursor.fetchall()
print(f"Total existing FAQ entries in local DB: {len(all_faq_meta)}")

# We pass raw serialized string directly since it is already serialized in local DB
faq_dict = {str(r['post_id']): r['meta_value'] for r in all_faq_meta}

# Also add raw Q&A for Sharjah (2225) and Dubai (1756) to be serialized by PHP
sharjah_faqs = [
    {
        "q": "Is Corporate Tax registration mandatory for Sharjah mainland and Free Zone businesses?",
        "a": "Yes. Under UAE Federal Decree-Law No. 47 of 2022, all businesses holding a trade licence in Sharjah—whether issued by Sharjah Economic Development Department (SEDD), SAIF Zone, Shams, or Hamriyah Free Zone Authority (HFZA)—must register for Corporate Tax with the FTA and obtain a Tax Registration Number (TRN)."
    },
    {
        "q": "What are the statutory audit requirements for Sharjah licence renewal?",
        "a": "HFZA and SAIF Zone entities require an annual statutory audit submitted by a Ministry-accredited registered audit firm to renew their company trade licence and maintain qualifying free zone status. Mainland Sharjah LLCs must also maintain audited or IFRS-compliant books for corporate tax compliance."
    },
    {
        "q": "How does RBO Accounting support Sharjah businesses with VAT and Corporate Tax?",
        "a": "RBO Accounting provides FTA-approved tax agent representation, on-time quarterly VAT return filing, corporate tax registration, 0% Qualifying Free Zone Person (QFZP) determinations, and complete IFRS-compliant monthly bookkeeping."
    },
    {
        "q": "What is the penalty for late Corporate Tax registration in Sharjah?",
        "a": "Under Cabinet Decision No. 75 of 2023 and Cabinet Decision No. 10 of 2024, failure to submit a Corporate Tax registration application within the FTA deadlines results in an automatic administrative penalty of AED 10,000 per entity."
    },
    {
        "q": "Can RBO Accounting handle MOHRE WPS payroll processing for Sharjah employers?",
        "a": "Yes. We generate compliant SIF (Salary Information File) payroll files, process employee disbursements through authorized UAE exchange houses and banks, and maintain end-of-service benefit (EOSB) accruals in full compliance with UAE Labour Law."
    }
]

dubai_faqs = [
    {
        "q": "Which Dubai free zones require mandatory audited financial statements?",
        "a": "Major Dubai free zones including DMCC, Dubai Silicon Oasis (DSO), DAFZA, JAFZA, and Dubai South require annual audited financial statements from approved auditors for annual licence renewals and Qualifying Free Zone Person (QFZP) 0% corporate tax eligibility."
    },
    {
        "q": "What are the Corporate Tax deadlines for Dubai mainland companies?",
        "a": "Under Federal Decree-Law No. 47 of 2022, Corporate Tax returns (Form CT201) and tax payments must be filed within 9 months following the close of your financial year (e.g., September 30 for financial years ending December 31)."
    },
    {
        "q": "How can Dubai SMEs qualify for Small Business Relief (SBR)?",
        "a": "Dubai resident taxable persons with gross revenue equal to or below AED 3,000,000 in the relevant tax period and all previous tax periods can elect for Small Business Relief under Article 21, treating their taxable income as zero percent (0%)."
    },
    {
        "q": "What outsourced bookkeeping services does RBO Accounting offer in Dubai?",
        "a": "We provide end-to-end accounting on Zoho Books, QuickBooks, and Xero, monthly bank reconciliations, accounts payable and receivable (AP/AR) tracking, monthly MIS management reports, and complete FTA tax audit readiness."
    },
    {
        "q": "How does RBO Accounting resolve FTA penalties for Dubai firms?",
        "a": "As registered FTA tax agents, we prepare and file formal Penalty Reconsiderations, EmaraTax Voluntary Disclosures (Form 211), and submit official appeal petitions under Cabinet Decision No. 105 of 2021 to secure waivers or reductions of administrative fines."
    }
]

extra_faqs = {
    "2225": sharjah_faqs,
    "1756": dubai_faqs
}

conn.close()

payload = {
    "existing": faq_dict,
    "extra": extra_faqs
}

payload_b64 = base64.b64encode(json.dumps(payload).encode('utf-8')).decode('utf-8')

php_sync = f"""<?php
@ini_set('display_errors', 1);
@ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/wp-load.php';
global $wpdb;

$data = json_decode(base64_decode('{payload_b64}'), true);

$synced = 0;
// 1. Sync existing serialized FAQs
foreach ($data['existing'] as $pid => $serialized_val) {{
    $post_id = (int)$pid;
    $exists = $wpdb->get_var($wpdb->prepare("SELECT meta_id FROM {{$wpdb->postmeta}} WHERE post_id = %d AND meta_key = '_rbo_faq_schema'", $post_id));
    if ($exists) {{
        $wpdb->update($wpdb->postmeta, ['meta_value' => $serialized_val], ['post_id' => $post_id, 'meta_key' => '_rbo_faq_schema']);
    }} else {{
        $wpdb->insert($wpdb->postmeta, ['post_id' => $post_id, 'meta_key' => '_rbo_faq_schema', 'meta_value' => $serialized_val]);
    }}
    $synced++;
}}

// 2. Serialize and save extra FAQs (Sharjah & Dubai)
foreach ($data['extra'] as $pid => $faq_array) {{
    $post_id = (int)$pid;
    $serialized_val = serialize($faq_array);
    $exists = $wpdb->get_var($wpdb->prepare("SELECT meta_id FROM {{$wpdb->postmeta}} WHERE post_id = %d AND meta_key = '_rbo_faq_schema'", $post_id));
    if ($exists) {{
        $wpdb->update($wpdb->postmeta, ['meta_value' => $serialized_val], ['post_id' => $post_id, 'meta_key' => '_rbo_faq_schema']);
    }} else {{
        $wpdb->insert($wpdb->postmeta, ['post_id' => $post_id, 'meta_key' => '_rbo_faq_schema', 'meta_value' => $serialized_val]);
    }}
    $synced++;
}}

if (function_exists('wp_cache_flush')) {{
    wp_cache_flush();
}}

echo "SUCCESS: Synced {{$synced}} FAQ schemas to database.";
@unlink(__FILE__);
"""

runner_file = "d:/Rboo/run_faq_sync.php"
with open(runner_file, "w", encoding="utf-8") as f:
    f.write(php_sync)

# Upload via FTP
ftp = ftplib.FTP(timeout=30)
ftp.connect('185.243.77.60', 21)
ftp.login('devsynx@rboaccounting.ae', 'Devsynx2026!#')
ftp.set_pasv(True)

with open(runner_file, 'rb') as f:
    ftp.storbinary('STOR /run_faq_sync.php', f)
print('Uploaded run_faq_sync.php to live.')
ftp.quit()

# Execute via HTTP
req = urllib.request.Request('https://www.rboaccounting.ae/run_faq_sync.php', headers={'User-Agent': 'Mozilla/5.0'})
try:
    with urllib.request.urlopen(req) as resp:
        print('Live response:', resp.read().decode('utf-8'))
except urllib.error.HTTPError as e:
    print('HTTP Error:', e.code, e.read().decode('utf-8', errors='ignore'))
