import pymysql
import json
import re

conn = pymysql.connect(
    host='127.0.0.1',
    user='root',
    password='',
    database='rboaccou_wp629',
    port=3306,
    charset='utf8mb4'
)
cursor = conn.cursor(pymysql.cursors.DictCursor)

site_url = "https://www.rboaccounting.ae"

# ==============================================================================
# UPGRADE PAGE 1: Corporate Tax Planning UAE (Page ID: 3034)
# ==============================================================================
p1_id = 3034
p1_seo_title = "Corporate Tax Planning UAE 2026: 0% Free Zone, SBR & Tax Groups | RBO"
p1_seo_desc  = "Maximize tax efficiency under UAE Corporate Tax Law. Strategic tax planning for 0% Free Zone QFZP status, Small Business Relief (AED 3M), Tax Grouping & Transfer Pricing."
p1_focus_kw  = "corporate tax planning uae, uae corporate tax planning, corporate tax planning services dubai, free zone 0 percent tax planning uae, small business relief tax planning uae, corporate tax group uae, transfer pricing planning uae, corporate tax optimization uae"

# 10 High-Intent FAQs for Page 3034
p1_faqs = [
    {
        "q": "What is Corporate Tax Planning in the UAE and how is it different from tax filing?",
        "a": "Tax filing (compliance) is retroactive—it simply reports historical financial transactions to the Federal Tax Authority (FTA) on Form CT201 after the tax period has closed. Corporate tax planning is proactive—it shapes operational, structural, and contractual decisions throughout the year to legally optimize taxable net income, protect preferential 0% tax rates for Free Zone entities (QFZPs), utilize Small Business Relief (SBR), and ensure full compliance before financial books are finalized."
    },
    {
        "q": "How can UAE Free Zone companies preserve their 0% Corporate Tax rate through tax planning?",
        "a": "Under Cabinet Decision No. 139 of 2023 and Ministerial Decision No. 265 of 2023, a Qualifying Free Zone Person (QFZP) must meet strict statutory tests: 1) Maintain adequate substance in the Free Zone; 2) Derive Qualifying Income from specified qualifying activities; 3) Keep non-qualifying revenue within the De Minimis threshold (lower of 5% of total revenue or AED 5,000,000); 4) Comply with Transfer Pricing rules; and 5) Maintain audited financial statements under IFRS. Corporate tax planning monitors your income streams monthly to prevent accidental De Minimis breaches that would forfeit 0% status for 5 consecutive years."
    },
    {
        "q": "How does Small Business Relief (Article 21) work in UAE Corporate Tax planning?",
        "a": "Under Article 21 of Federal Decree-Law No. 47 of 2022 and Ministerial Decision No. 73 of 2023, resident taxable persons with gross revenue not exceeding AED 3,000,000 in any relevant tax period ending on or before December 31, 2026, can elect for Small Business Relief (SBR). When elected, the entity is treated as having no taxable income (0% effective tax) and is exempted from transfer pricing local files and complex calculations. Strategic tax planning evaluates whether revenue will approach or cross the AED 3M threshold and structures contracts to maintain legitimate eligibility without triggering anti-abuse artificial disaggregation rules."
    },
    {
        "q": "What are the benefits of forming a Corporate Tax Group (Tax Consolidation) under Article 40?",
        "a": "Under Article 40 of the UAE Corporate Tax Law, two or more resident juridical persons can apply to form a single Tax Group if a parent company directly or indirectly holds at least 95% of the share capital, voting rights, and profits of each subsidiary. The primary advantages include: 1) Offsetting tax losses of one entity against the taxable profits of another; 2) Eliminating intra-group transactions from corporate tax calculations; and 3) Submitting a single consolidated Corporate Tax return, significantly reducing recurring administrative and audit overhead."
    },
    {
        "q": "What is the Arm's Length Principle for Related Parties and Connected Persons under Articles 34 and 35?",
        "a": "Transactions between related entities (companies under common ownership) or payments to Connected Persons (shareholders, directors, officers, or their first-degree relatives) must reflect commercial terms that would occur between independent third parties. For example, excessive shareholder salaries, non-market management fees, or interest-free intercompany loans will be adjusted by the FTA during audits. Tax planning provides market benchmarking and transfer pricing agreements to substantiate deductibility."
    },
    {
        "q": "How does the 30% EBITDA Interest Deduction Limitation Rule (Article 30) impact UAE businesses?",
        "a": "Under Article 30 of the Corporate Tax Law and Ministerial Decision No. 126 of 2023, a taxable person's Net Interest Expenditure is capped at the greater of: 1) 30% of adjusted EBITDA; or 2) A de minimis safe harbor threshold of AED 12,000,000 per tax period. Any net interest exceeding this limit cannot be deducted in the current tax year. Tax planning helps leveraged businesses optimize debt-to-equity structures and carry forward disallowed interest for up to ten (10) consecutive tax years."
    },
    {
        "q": "Can businesses carry forward tax losses to reduce future UAE Corporate Tax liabilities?",
        "a": "Yes. Under Article 37 of the Corporate Tax Law, tax losses incurred from the effective date of corporate tax can be carried forward indefinitely and applied to offset up to 75% of taxable income in subsequent tax periods, provided there is continuous 50% common ownership or continuity of the same or similar business activity. Strategic tax planning ensures losses are properly documented on Form CT201 to maximize future cash flow savings."
    },
    {
        "q": "Are entertainment and hospitality expenses fully deductible under UAE Corporate Tax Law?",
        "a": "No. Under Article 32 of the Corporate Tax Law, taxable persons can only deduct 50% of expenses incurred for customer entertainment, hospitality, dining, transport, accommodation, and gifts. The remaining 50% is non-deductible. Conversely, staff entertainment expenses (such as an annual staff dinner or regular team refreshments) are generally 100% deductible if wholly for employee welfare. Tax planning structures chart-of-accounts expense mapping to prevent disallowed deductions."
    },
    {
        "q": "When is the optimal time for a UAE company to initiate corporate tax planning?",
        "a": "Corporate tax planning should begin at the beginning or middle of your financial year, never in the weeks immediately preceding the filing deadline. Key decisions—such as electing Small Business Relief, structuring intra-group pricing, maintaining Free Zone De Minimis logs, and timing capital asset acquisitions—must be executed before the fiscal year-end closes. Restructuring after year-end is legally ineffective and risks anti-avoidance scrutiny under Article 50."
    },
    {
        "q": "How does RBO Accounting combine corporate tax planning with bookkeeping and audit services?",
        "a": "Effective tax planning cannot exist on theoretical advice alone; it requires seamless execution in your general ledger. As accredited FTA Tax Agents and approved statutory auditors, RBO combines proactive tax planning with monthly IFRS bookkeeping, VAT reconciliations, and annual statutory audits. This unified approach guarantees that your tax planning strategy aligns 100% with your accounting records and passes FTA scrutiny without discrepancies."
    }
]

# Fetch existing content of Page 3034
cursor.execute("SELECT post_content FROM wpsd_posts WHERE ID = %s", (p1_id,))
p1_row = cursor.fetchone()
p1_content = p1_row['post_content']

# Clean any existing upgrade block if present
p1_content_clean = re.sub(r'<!-- RBO Master SEO Upgrade: 2026 Corporate Tax Planning Architecture -->.*?<!-- /RBO Master SEO Upgrade: 2026 Corporate Tax Planning Architecture -->', '', p1_content, flags=re.DOTALL)
p1_content_clean = re.sub(r'<script type="application/ld\+json">.*?FAQPage.*?</script>', '', p1_content_clean, flags=re.DOTALL)

# Build Master Upgrade Block for Page 3034
p1_upgrade_html = f"""
<!-- RBO Master SEO Upgrade: 2026 Corporate Tax Planning Architecture -->
<div class="rbo-tax-planning-upgrade-block" style="max-width: 1140px; margin: 45px auto; padding: 0 15px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">

	<!-- Authority Header Badge -->
	<div style="background: linear-gradient(135deg, #09203b 0%, #102a4d 100%); color: #ffffff; padding: 34px 28px; border-radius: 12px; border-left: 6px solid #e8b84b; margin-bottom: 35px; box-shadow: 0 8px 24px rgba(9,32,59,0.12);">
		<span style="display: inline-block; background: rgba(232, 184, 75, 0.2); color: #f5d070; font-size: 11.5px; font-weight: 700; text-transform: uppercase; padding: 4px 12px; border-radius: 9999px; letter-spacing: 0.8px; margin-bottom: 10px;">
			🏛️ Strategic UAE Corporate Tax Advisory | Licensed FTA Tax Agents
		</span>
		<h2 style="color: #ffffff !important; font-size: 26px; font-weight: 700; margin: 0 0 12px 0; line-height: 1.3;">
			UAE Corporate Tax Planning &amp; Structural Optimization Hub (2026 Compliance Standards)
		</h2>
		<p style="color: #cbd5e1; font-size: 15.5px; line-height: 1.7; margin: 0 0 20px 0;">
			Corporate Tax compliance under <strong>Federal Decree-Law No. 47 of 2022</strong> is not merely an annual filing ritual—it is determined by the strategic decisions you make throughout the financial year. From safeguarding <strong>0% Free Zone Qualifying Income (QFZP)</strong> and evaluating <strong>Small Business Relief (Article 21)</strong> to structuring <strong>Tax Groups (Article 40)</strong> and defending <strong>Transfer Pricing</strong> at arm's length, RBO Accounting Services FZE provides enterprise-grade tax advisory designed to minimize tax leakage while keeping your enterprise 100% audit-proof.
		</p>
		<div style="display: flex; gap: 12px; flex-wrap: wrap;">
			<a href="https://api.whatsapp.com/send?phone=971508051857&text=Hello%20RBO,%20I%20would%20like%20to%20schedule%20a%20Corporate%20Tax%20Planning%20consultation." 
			   target="_blank" 
			   style="background: #25d366; color: #ffffff; font-weight: 700; font-size: 13.5px; padding: 11px 22px; border-radius: 6px; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; box-shadow: 0 4px 12px rgba(37,211,102,0.3);">
				<span>💬</span> Instant WhatsApp Tax Consultation (+971 50 805 1857)
			</a>
			<a href="{site_url}/contact-us/" 
			   style="background: #e8b84b; color: #09203b; font-weight: 700; font-size: 13.5px; padding: 11px 22px; border-radius: 6px; text-decoration: none;">
				Book Free Tax Planning Review &rarr;
			</a>
		</div>
	</div>

	<!-- 6 Core Pillars of UAE Tax Planning Grid -->
	<h3 style="color: #09203b; font-size: 22px; font-weight: 700; margin: 0 0 8px 0;">
		The 6 Core Pillars of UAE Corporate Tax Optimization in 2026
	</h3>
	<p style="color: #64748b; font-size: 14.5px; margin: 0 0 22px 0;">
		Our senior tax consultants evaluate every dimension of your corporate operations under the latest Ministry of Finance ministerial decisions:
	</p>
	<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; margin-bottom: 40px;">
		<div style="background: #ffffff; border: 1px solid #e2e8f0; border-top: 4px solid #09203b; border-radius: 8px; padding: 22px; box-shadow: 0 3px 10px rgba(0,0,0,0.04);">
			<strong style="color: #09203b; font-size: 16.5px; display: block; margin-bottom: 8px;">1. Free Zone 0% QFZP Structuring</strong>
			<p style="color: #475569; font-size: 14px; line-height: 1.6; margin: 0 0 10px 0;">Safeguarding 0% preferential corporate tax rates under Cabinet Decision No. 139 of 2023. Real-time De Minimis threshold tracking (5% or AED 5M) and qualifying activity segregation to protect eligibility.</p>
			<span style="font-size: 12px; font-weight: 700; color: #166534; background: #dcfce7; padding: 3px 8px; border-radius: 4px;">0% Tax Protection</span>
		</div>
		<div style="background: #ffffff; border: 1px solid #e2e8f0; border-top: 4px solid #e8b84b; border-radius: 8px; padding: 22px; box-shadow: 0 3px 10px rgba(0,0,0,0.04);">
			<strong style="color: #09203b; font-size: 16.5px; display: block; margin-bottom: 8px;">2. Small Business Relief (Article 21)</strong>
			<p style="color: #475569; font-size: 14px; line-height: 1.6; margin: 0 0 10px 0;">Evaluating whether your revenue qualifies for the AED 3,000,000 threshold (0% tax treatment) through tax years ending Dec 2026, while safeguarding against artificial business separation penalties.</p>
			<span style="font-size: 12px; font-weight: 700; color: #b45309; background: #fef3c7; padding: 3px 8px; border-radius: 4px;">AED 3M Revenue Cap</span>
		</div>
		<div style="background: #ffffff; border: 1px solid #e2e8f0; border-top: 4px solid #09203b; border-radius: 8px; padding: 22px; box-shadow: 0 3px 10px rgba(0,0,0,0.04);">
			<strong style="color: #09203b; font-size: 16.5px; display: block; margin-bottom: 8px;">3. Corporate Tax Grouping (Article 40)</strong>
			<p style="color: #475569; font-size: 14px; line-height: 1.6; margin: 0 0 10px 0;">Evaluating 95% shareholding ownership structures to consolidate parent-subsidiary entities into a single tax group, enabling tax loss offsetting and zero tax on intra-group asset transfers.</p>
			<span style="font-size: 12px; font-weight: 700; color: #1e40af; background: #dbeafe; padding: 3px 8px; border-radius: 4px;">Consolidated Filing</span>
		</div>
		<div style="background: #ffffff; border: 1px solid #e2e8f0; border-top: 4px solid #e8b84b; border-radius: 8px; padding: 22px; box-shadow: 0 3px 10px rgba(0,0,0,0.04);">
			<strong style="color: #09203b; font-size: 16.5px; display: block; margin-bottom: 8px;">4. Transfer Pricing &amp; Connected Persons</strong>
			<p style="color: #475569; font-size: 14px; line-height: 1.6; margin: 0 0 10px 0;">Benchmarking shareholder remuneration, director salaries, and intercompany service fees to ensure compliance with the Arm's Length Principle under Articles 34 and 35.</p>
			<span style="font-size: 12px; font-weight: 700; color: #166534; background: #dcfce7; padding: 3px 8px; border-radius: 4px;">Arm's Length Compliance</span>
		</div>
		<div style="background: #ffffff; border: 1px solid #e2e8f0; border-top: 4px solid #09203b; border-radius: 8px; padding: 22px; box-shadow: 0 3px 10px rgba(0,0,0,0.04);">
			<strong style="color: #09203b; font-size: 16.5px; display: block; margin-bottom: 8px;">5. 30% EBITDA Interest Deduction Cap</strong>
			<p style="color: #475569; font-size: 14px; line-height: 1.6; margin: 0 0 10px 0;">Managing the General Interest Deduction Limitation Rule under Article 30 for debt-financed companies, utilizing the AED 12M safe-harbor ceiling and 10-year interest carry-forward rules.</p>
			<span style="font-size: 12px; font-weight: 700; color: #1e40af; background: #dbeafe; padding: 3px 8px; border-radius: 4px;">Article 30 Capping</span>
		</div>
		<div style="background: #ffffff; border: 1px solid #e2e8f0; border-top: 4px solid #e8b84b; border-radius: 8px; padding: 22px; box-shadow: 0 3px 10px rgba(0,0,0,0.04);">
			<strong style="color: #09203b; font-size: 16.5px; display: block; margin-bottom: 8px;">6. Tax Loss Relief Strategy (Article 37)</strong>
			<p style="color: #475569; font-size: 14px; line-height: 1.6; margin: 0 0 10px 0;">Carrying forward historical and startup tax losses indefinitely to offset up to 75% of future taxable net profit, preserving liquidity and driving measurable multi-year tax savings.</p>
			<span style="font-size: 12px; font-weight: 700; color: #166534; background: #dcfce7; padding: 3px 8px; border-radius: 4px;">Indefinite Carry-Forward</span>
		</div>
	</div>

	<!-- Comparison Table: Proactive vs Reactive -->
	<h3 style="color: #09203b; font-size: 21px; font-weight: 700; margin: 0 0 14px 0;">
		Proactive Tax Planning vs. Reactive Year-End Filing: Key Differences
	</h3>
	<div style="overflow-x: auto; margin-bottom: 40px;">
		<table style="width: 100%; border-collapse: collapse; font-size: 14px; text-align: left; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
			<thead>
				<tr style="background: #09203b; color: #ffffff;">
					<th style="padding: 14px 16px; border: 1px solid #1e3a5f;">Strategic Dimension</th>
					<th style="padding: 14px 16px; border: 1px solid #1e3a5f;">Proactive Tax Planning (RBO Model)</th>
					<th style="padding: 14px 16px; border: 1px solid #1e3a5f;">Reactive Year-End Filing (Common Mistake)</th>
				</tr>
			</thead>
			<tbody>
				<tr style="background: #ffffff; border-bottom: 1px solid #e2e8f0;">
					<td style="padding: 13px 16px; font-weight: 600; color: #09203b;">Free Zone QFZP Status</td>
					<td style="padding: 13px 16px; color: #166534; font-weight: 600;">Monitored monthly; contracts vetted to protect 0% Qualifying Income.</td>
					<td style="padding: 13px 16px; color: #991b1b;">De Minimis breached unnoticed; 9% tax imposed retroactively for 5 years.</td>
				</tr>
				<tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
					<td style="padding: 13px 16px; font-weight: 600; color: #09203b;">Related Party Transactions</td>
					<td style="padding: 13px 16px; color: #166534; font-weight: 600;">Documented with transfer pricing agreements &amp; market benchmarking.</td>
					<td style="padding: 13px 16px; color: #991b1b;">Arbitrary pricing; shareholder drawdowns disallowed by the FTA.</td>
				</tr>
				<tr style="background: #ffffff; border-bottom: 1px solid #e2e8f0;">
					<td style="padding: 13px 16px; font-weight: 600; color: #09203b;">Small Business Relief (SBR)</td>
					<td style="padding: 13px 16px; color: #166534; font-weight: 600;">Revenue trajectory modeled to claim relief safely without disaggregation risk.</td>
					<td style="padding: 13px 16px; color: #991b1b;">Revenue surpasses AED 3M without planning, triggering unforeseen tax bill.</td>
				</tr>
				<tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
					<td style="padding: 13px 16px; font-weight: 600; color: #09203b;">Multi-Entity Group Structures</td>
					<td style="padding: 13px 16px; color: #166534; font-weight: 600;">Tax groups formed under Article 40 to offset profitable &amp; loss-making sister units.</td>
					<td style="padding: 13px 16px; color: #991b1b;">Entities file separately; losses in Company A cannot offset profits in Company B.</td>
				</tr>
				<tr style="background: #ffffff;">
					<td style="padding: 13px 16px; font-weight: 600; color: #09203b;">Audit Defense &amp; Penalties</td>
					<td style="padding: 13px 16px; color: #166534; font-weight: 600;">Full 7-year audit trail maintained; 0% exposure to administrative fines.</td>
					<td style="padding: 13px 16px; color: #991b1b;">Missing proof during FTA audit leads to AED 10,000–50,000 penalties.</td>
				</tr>
			</tbody>
		</table>
	</div>

	<!-- Interlinking & Related Services Hub -->
	<div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 24px; margin-bottom: 40px;">
		<h4 style="color: #09203b; margin: 0 0 12px 0; font-size: 16.5px; font-weight: 700;">
			Seamless End-to-End Corporate Tax Compliance Ecosystem:
		</h4>
		<p style="color: #475569; font-size: 14px; line-height: 1.65; margin: 0 0 16px 0;">
			Corporate tax planning operates in direct harmony with RBO's core tax and accounting services:
		</p>
		<div style="display: flex; gap: 10px; flex-wrap: wrap;">
			<a href="{site_url}/our-services/corporate-tax/registration/" style="background: #ffffff; border: 1px solid #cbd5e1; color: #09203b; padding: 8px 14px; border-radius: 6px; text-decoration: none; font-size: 13px; font-weight: 600;">
				Corporate Tax Registration (TRN) &rarr;
			</a>
			<a href="{site_url}/our-services/corporate-tax/return-filing/" style="background: #ffffff; border: 1px solid #cbd5e1; color: #09203b; padding: 8px 14px; border-radius: 6px; text-decoration: none; font-size: 13px; font-weight: 600;">
				Corporate Tax Return Filing (CT201) &rarr;
			</a>
			<a href="{site_url}/our-services/corporate-tax/transfer-pricing/" style="background: #ffffff; border: 1px solid #cbd5e1; color: #09203b; padding: 8px 14px; border-radius: 6px; text-decoration: none; font-size: 13px; font-weight: 600;">
				Transfer Pricing Documentation &rarr;
			</a>
			<a href="{site_url}/our-services/accounting/bookkeeping-and-accounting/" style="background: #ffffff; border: 1px solid #cbd5e1; color: #09203b; padding: 8px 14px; border-radius: 6px; text-decoration: none; font-size: 13px; font-weight: 600;">
				IFRS Bookkeeping &amp; Accounting &rarr;
			</a>
			<a href="{site_url}/uae-free-zone-corporate-tax-qualifying-income-qfzp-guide-2026/" style="background: #ffffff; border: 1px solid #cbd5e1; color: #09203b; padding: 8px 14px; border-radius: 6px; text-decoration: none; font-size: 13px; font-weight: 600;">
				2026 Free Zone 0% Guide &rarr;
			</a>
		</div>
	</div>

</div>
<!-- /RBO Master SEO Upgrade: 2026 Corporate Tax Planning Architecture -->
"""

# Append upgrade block and FAQ schema to Page 3034
p1_schema = {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": f["q"],
            "acceptedAnswer": {
                "@type": "Answer",
                "text": f["a"]
            }
        } for f in p1_faqs
    ]
}
p1_schema_script = f'<script type="application/ld+json">{json.dumps(p1_schema, ensure_ascii=False)}</script>'

p1_new_content = p1_content_clean.rstrip() + "\n\n" + p1_upgrade_html.strip() + "\n\n" + p1_schema_script

cursor.execute("UPDATE wpsd_posts SET post_content = %s WHERE ID = %s", (p1_new_content, p1_id))
conn.commit()
print("✅ Page 3034 post_content updated!")

# Update Page 3034 Postmeta (Rank Math)
p1_metas = {
    "rank_math_title": p1_seo_title,
    "rank_math_description": p1_seo_desc,
    "rank_math_focus_keyword": p1_focus_kw,
    "rank_math_robots": 'a:1:{i:0;s:5:"index";}'
}
for k, v in p1_metas.items():
    cursor.execute("SELECT meta_id FROM wpsd_postmeta WHERE post_id = %s AND meta_key = %s", (p1_id, k))
    row = cursor.fetchone()
    if row:
        cursor.execute("UPDATE wpsd_postmeta SET meta_value = %s WHERE meta_id = %s", (v, row['meta_id']))
    else:
        cursor.execute("INSERT INTO wpsd_postmeta (post_id, meta_key, meta_value) VALUES (%s, %s, %s)", (p1_id, k, v))
conn.commit()
print("✅ Page 3034 metadata updated!")


# ==============================================================================
# UPGRADE PAGE 2: Corporate Tax Registration UAE (Page ID: 2567)
# ==============================================================================
p2_id = 2567
p2_seo_title = "Corporate Tax Registration UAE 2026: EmaraTax TRN, Deadlines & Penalty Guide | RBO"
p2_seo_desc  = "Official UAE Corporate Tax registration services by licensed FTA tax agents. Avoid the AED 10,000 late registration penalty. Fast EmaraTax TRN processing, document review & Free Zone compliance."
p2_focus_kw  = "corporate tax registration uae, corporate tax registration deadline uae, emaratax corporate tax registration, aed 10000 corporate tax penalty, corporate tax trn uae, corporate tax registration free zone, late registration penalty waiver uae, fta corporate tax agent dubai"

# Fetch existing content of Page 2567
cursor.execute("SELECT post_content FROM wpsd_posts WHERE ID = %s", (p2_id,))
p2_row = cursor.fetchone()
p2_content = p2_row['post_content']

# Fix any localhost links on Page 2567
p2_content = p2_content.replace("http://localhost:8000/", f"{site_url}/")

# Also add the 2026 Late Registration Penalty Amnesty & FTA Reconsideration Box into Page 2567 if not present
if "Cabinet Decision No. 105 of 2021" not in p2_content:
    penalty_amnesty_html = f"""
	<!-- 2026 Late Registration Penalty Mitigation Callout -->
	<div style="background: #fef2f2; border: 1px solid #fecaca; border-left: 5px solid #dc2626; border-radius: 8px; padding: 22px 24px; margin: 30px 0;">
		<h3 style="color: #991b1b; font-size: 18px; font-weight: 700; margin: 0 0 8px 0; display: flex; align-items: center; gap: 8px;">
			<span>🚨</span> Received an AED 10,000 Penalty Notice? How to Submit an FTA Reconsideration
		</h3>
		<p style="color: #7f1d1d; font-size: 14.5px; line-height: 1.65; margin: 0 0 12px 0;">
			If your enterprise was hit with an automated <strong>AED 10,000 late registration fine</strong> on EmaraTax, you have a statutory right under Article 27 of <strong>Federal Decree-Law No. 28 of 2022 on Tax Procedures</strong> and <strong>Cabinet Decision No. 105 of 2021</strong> to submit a formal Request for Reconsideration within <strong>forty (40) business days</strong> of notification. RBO's registered tax agents prepare comprehensive legal dossiers in Arabic to dispute unfair penalties and request administrative waivers.
		</p>
		<a href="{site_url}/penalty-reconsideration/" style="color: #b91c1c; font-weight: 700; text-decoration: underline; font-size: 14px;">
			Explore Our FTA Penalty Reconsideration &amp; Waiver Services &rarr;
		</a>
	</div>
    """
    # Insert right before the 4 Entity Classification Cards
    p2_content = p2_content.replace('<h3 style="color: #09203b; font-size: 22px; font-weight: 700; margin: 0 0 20px 0;">', penalty_amnesty_html + '\n\t<h3 style="color: #09203b; font-size: 22px; font-weight: 700; margin: 0 0 20px 0;">')

cursor.execute("UPDATE wpsd_posts SET post_content = %s WHERE ID = %s", (p2_content, p2_id))
conn.commit()
print("✅ Page 2567 post_content updated & links fixed!")

# Update Page 2567 Postmeta (Rank Math)
p2_metas = {
    "rank_math_title": p2_seo_title,
    "rank_math_description": p2_seo_desc,
    "rank_math_focus_keyword": p2_focus_kw,
    "rank_math_robots": 'a:1:{i:0;s:5:"index";}'
}
for k, v in p2_metas.items():
    cursor.execute("SELECT meta_id FROM wpsd_postmeta WHERE post_id = %s AND meta_key = %s", (p2_id, k))
    row = cursor.fetchone()
    if row:
        cursor.execute("UPDATE wpsd_postmeta SET meta_value = %s WHERE meta_id = %s", (v, row['meta_id']))
    else:
        cursor.execute("INSERT INTO wpsd_postmeta (post_id, meta_key, meta_value) VALUES (%s, %s, %s)", (p2_id, k, v))
conn.commit()
print("✅ Page 2567 metadata updated!")

conn.close()
print("\n🎉 Both top Corporate Tax pages successfully upgraded in local database!")
