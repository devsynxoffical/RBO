<?php
/**
 * RBO Accounting — Master GSC Impression Boost & SEO Overhaul Script
 * Target Pages:
 * 1. Homepage (ID: 172) — 1,035+ Impressions (Root + GBP UTM)
 * 2. Sharjah Regional Hub (ID: 2225) — /areas-we-serve/sharjah/
 * 
 * Execution:
 * - Localhost: php upgrade-top-gsc-pages.php
 * - Live: Uploaded via FTP and executed
 */

@ini_set( 'display_errors', 1 );
@ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

if ( ! file_exists( __DIR__ . '/wp-load.php' ) ) {
	die( 'Error: Place this script in WordPress root.' );
}

require_once __DIR__ . '/wp-load.php';

$admin_user = get_user_by( 'role', 'administrator' );
if ( $admin_user ) {
	wp_set_current_user( $admin_user->ID );
} else {
	wp_set_current_user( 1 );
}

if ( function_exists( 'kses_remove_filters' ) ) {
	kses_remove_filters();
}

$site_url = home_url();
$results = array();

// =========================================================================
// 1. PAGE: MASTER HOMEPAGE (Post ID: 172)
// =========================================================================
$home_id = 172;
$home_seo_title = 'Accounting & Auditing Firm in UAE & Dubai | FTA Tax Agents | RBO Accounting';
$home_seo_desc = 'Top FTA-approved chartered accounting & auditing firm in Dubai & UAE. Certified corporate tax CT201 filing, VAT returns, approved statutory audits, bookkeeping & WPS payroll.';
$home_focus_kw = 'accounting firm in uae, accounting firm in dubai, auditing companies in uae, corporate tax consultant uae, vat tax agents uae, uae e-invoicing 2026';

// 10 Rich, High-Search-Volume FAQs for Homepage
$home_faqs = array(
	array(
		'q' => 'What makes RBO Accounting one of the premier accounting and audit firms in the UAE?',
		'a' => 'RBO Accounting Services FZE combines licensed FTA registered tax agents, qualified chartered accountants (ACA, ACCA, CPA), and ministry-approved statutory auditors under one roof. We deliver audit-proof corporate tax returns (Form CT201), quarterly VAT filings (Form VAT201), WPS payroll processing, and IFRS-compliant bookkeeping across Dubai, Abu Dhabi, Sharjah, Ajman, and all Free Zones.',
	),
	array(
		'q' => 'What comprehensive accounting, tax, and auditing services do you provide across Dubai and the UAE?',
		'a' => 'Our integrated corporate services include: (1) Corporate Tax registration, quarterly tax planning, and annual Form CT201 filing; (2) FTA VAT registration, return filing, and penalty reconsideration appeals; (3) Approved statutory financial audits and due diligence reports; (4) Outsourced monthly bookkeeping on cloud ERPs (Zoho Books, QuickBooks, Xero); (5) Accounts Payable & Receivable (AP/AR) 3-way matching; and (6) WPS-compliant payroll processing under Ministerial Resolution 340.',
	),
	array(
		'q' => 'How much do outsourced accounting and bookkeeping services cost in the UAE?',
		'a' => 'Our professional accounting packages are structured transparently based on monthly transaction volumes. Monthly bookkeeping packages start from AED 850 to AED 2,500 per month for small-to-mid enterprises. Statutory audit sign-offs typically range from AED 2,500 to AED 5,000—delivering over 60% cost savings compared to maintaining an in-house finance department.',
	),
	array(
		'q' => 'Why is it critical for UAE businesses to hire an FTA-registered tax agency?',
		'a' => 'Under Federal Decree-Law No. 28 of 2022 on Tax Procedures, only licensed FTA Tax Agents possess official legal standing to represent your company before the Federal Tax Authority, defend tax positions, handle formal tax audits on EmaraTax, and submit penalty reconsideration appeals (Cabinet Decision 105) to eliminate heavy non-compliance fines.',
	),
	array(
		'q' => 'How will the 2026 UAE E-Invoicing (E-Billing) mandate impact our corporate accounting?',
		'a' => 'The Ministry of Finance E-Invoicing system mandates automated electronic B2B and B2G invoice reporting through the Peppol network. Businesses must transition from PDFs and paper invoices to structured XML/UBL e-invoices verified via Accredited Service Providers (ASPs). RBO ensures your ERP software and procure-to-pay workflows are 100% compliant ahead of enforcement dates.',
	),
	array(
		'q' => 'When is an annual statutory financial audit mandatory for UAE mainland and Free Zone companies?',
		'a' => 'Under the UAE Commercial Companies Law (Federal Decree-Law No. 32 of 2021) and Ministerial Decision No. 82 of 2023, statutory audits are mandatory for all Mainland LLCs and entities with taxable revenue exceeding AED 50,000,000. Furthermore, Free Zone authorities (DMCC, JAFZA, DAFZA, HFZA, SAIF Zone, AFZA) mandate audited financial statements as a prerequisite for annual trade licence renewal.',
	),
	array(
		'q' => 'How does RBO assist companies with Corporate Tax registration and Form CT201 annual filing?',
		'a' => 'We manage the end-to-end corporate tax cycle: registering your entity on EmaraTax, calculating taxable net income, preparing mandatory tax balance sheets, applying allowable deductions under Article 28, testing de minimis thresholds for Free Zone persons, and submitting the official Form CT201 within the statutory 9-month filing deadline.',
	),
	array(
		'q' => 'What are the requirements to qualify for 0% Free Zone Corporate Tax (QFZP status)?',
		'a' => 'To benefit from the 0% corporate tax rate as a Qualifying Free Zone Person (QFZP) under Cabinet Decision No. 55 of 2023, a company must: (1) maintain adequate economic substance in the Free Zone; (2) derive qualifying income from approved transactions; (3) not elect to be subject to normal 9% tax; (4) comply with arm’s-length transfer pricing rules; and (5) prepare audited financial statements.',
	),
	array(
		'q' => 'How does RBO ensure compliance with WPS payroll regulations (Ministerial Resolution 340)?',
		'a' => 'We calculate monthly salaries, calculate statutory gratuity under Federal Decree-Law No. 33 of 2021, generate Ministry-compliant Salary Information Files (.SIF), and coordinate electronic disbursements through authorized UAE banks and exchange houses, guaranteeing your establishment card remains 100% active and fine-free.',
	),
	array(
		'q' => 'How can our business switch accounting firms to RBO without financial downtime or lost records?',
		'a' => 'Our onboarding protocol requires zero operational downtime. We coordinate directly with your outgoing accountants to obtain historical General Ledgers, closing trial balances, prior VAT returns, and fixed asset schedules. Our team audits opening balances and assumes full management of your financial books within 5 business days.',
	),
);

// Rich Injected HTML Section for Homepage: 2026 Corporate Governance & Compliance Framework
$home_compliance_framework_html = <<<HTML
<div class="rbo-homepage-compliance-framework" style="max-width: 1140px; margin: 45px auto; padding: 0 20px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #1e293b;">
  <section style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 38px 30px; box-shadow: 0 10px 35px rgba(9, 32, 59, 0.06);">
    <div style="text-align: center; max-width: 820px; margin: 0 auto 32px;">
      <span style="background: rgba(201, 162, 39, 0.15); color: #9a731c; border: 1px solid rgba(201, 162, 39, 0.4); padding: 5px 16px; border-radius: 9999px; font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.6px;">UAE 2026 Regulatory Compliance Mandates</span>
      <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 32px; color: #09203b; margin: 14px 0 10px; font-weight: 700; line-height: 1.3;">Turnkey Financial Compliance, Statutory Audits &amp; Tax Governance</h2>
      <p style="color: #64748b; font-size: 16px; line-height: 1.6; margin: 0;">Comprehensive statutory compliance aligned with Federal Tax Authority (FTA) regulations, Ministry of Finance mandates, and UAE Commercial Companies Law.</p>
    </div>

    <!-- 4-Pillar Grid -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px; margin-bottom: 35px;">
      <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; transition: transform 0.2s ease;">
        <div style="width: 44px; height: 44px; background: #09203b; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #e8b84b; font-size: 20px; font-weight: 700; margin-bottom: 16px;">CT</div>
        <h3 style="font-size: 18px; color: #09203b; margin: 0 0 10px; font-weight: 700;">Corporate Tax Form CT201</h3>
        <p style="color: #475569; font-size: 14px; line-height: 1.6; margin: 0 0 12px;">Full compliance under Federal Decree-Law No. 47 of 2022. Small Business Relief (SBR) up to AED 3M, 0% QFZP Free Zone audits, and allowable expense substantiation.</p>
        <a href="{$site_url}/our-services/corporate-tax/" style="color: #0b3a6e; font-size: 13.5px; font-weight: 700; text-decoration: none;">Corporate Tax Services &rarr;</a>
      </div>

      <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px;">
        <div style="width: 44px; height: 44px; background: #09203b; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #e8b84b; font-size: 20px; font-weight: 700; margin-bottom: 16px;">EI</div>
        <h3 style="font-size: 18px; color: #09203b; margin: 0 0 10px; font-weight: 700;">2026 E-Invoicing (Peppol)</h3>
        <p style="color: #475569; font-size: 14px; line-height: 1.6; margin: 0 0 12px;">Preparation for the Ministry of Finance automated electronic invoice transmission mandate. ERP integration, XML/UBL formatting, and accredited provider onboarding.</p>
        <a href="{$site_url}/uae-accounts-payable-receivable-outsourcing-guide-2026/" style="color: #0b3a6e; font-size: 13.5px; font-weight: 700; text-decoration: none;">E-Invoicing Readiness &rarr;</a>
      </div>

      <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px;">
        <div style="width: 44px; height: 44px; background: #09203b; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #e8b84b; font-size: 20px; font-weight: 700; margin-bottom: 16px;">AU</div>
        <h3 style="font-size: 18px; color: #09203b; margin: 0 0 10px; font-weight: 700;">Approved Statutory Audits</h3>
        <p style="color: #475569; font-size: 14px; line-height: 1.6; margin: 0 0 12px;">Official financial statement certification compliant with IFRS standards and Ministry thresholds (AED 50M). Mandatory for Free Zone annual trade licence renewals.</p>
        <a href="{$site_url}/our-services/audit-assurance/statutory-audit/" style="color: #0b3a6e; font-size: 13.5px; font-weight: 700; text-decoration: none;">Statutory Audit Services &rarr;</a>
      </div>

      <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px;">
        <div style="width: 44px; height: 44px; background: #09203b; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #e8b84b; font-size: 20px; font-weight: 700; margin-bottom: 16px;">VT</div>
        <h3 style="font-size: 18px; color: #09203b; margin: 0 0 10px; font-weight: 700;">VAT Audits &amp; Penalty Waivers</h3>
        <p style="color: #475569; font-size: 14px; line-height: 1.6; margin: 0 0 12px;">Official FTA Tax Agency representation. Quarterly Form VAT201 filing, input tax verification (Article 55), and penalty reconsideration appeals under Cabinet Decision 105.</p>
        <a href="{$site_url}/our-services/vat-registration-filing/" style="color: #0b3a6e; font-size: 13.5px; font-weight: 700; text-decoration: none;">VAT &amp; Penalty Defense &rarr;</a>
      </div>
    </div>

    <!-- Quick Consultation Banner -->
    <div style="background: linear-gradient(135deg, #09203b 0%, #0d2e54 100%); border-radius: 12px; padding: 24px 30px; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 20px;">
      <div>
        <h4 style="color: #ffffff; font-size: 18px; margin: 0 0 6px; font-weight: 700;">Speak With an FTA Licensed Tax Agent in Dubai &amp; UAE</h4>
        <p style="color: #cbd5e1; font-size: 14px; margin: 0;">Confidential review of your Corporate Tax liability, Free Zone 0% qualification, or pending audit notices.</p>
      </div>
      <a href="{$site_url}/contact/" style="background: #c59b27; color: #09203b; padding: 12px 26px; border-radius: 8px; font-weight: 700; font-size: 14.5px; text-decoration: none; display: inline-block; white-space: nowrap;">Request Free Compliance Consultation &rarr;</a>
    </div>
  </section>
</div>
HTML;


// Execute Homepage Elementor & Metadata Updates
$home_raw = get_post_meta( $home_id, '_elementor_data', true );
$home_data = json_decode( $home_raw, true );

if ( ! empty( $home_data ) && is_array( $home_data ) ) {
	// 1. Update Accordion in Container 11
	if ( isset( $home_data[11]['elements'][0]['elements'][1]['widgetType'] ) && 
	     $home_data[11]['elements'][0]['elements'][1]['widgetType'] === 'accordion' ) {
		
		$tabs = array();
		foreach ( $home_faqs as $faq ) {
			$tabs[] = array(
				'_id'          => substr( md5( $faq['q'] ), 0, 7 ),
				'tab_title'    => $faq['q'],
				'tab_content'  => $faq['a'],
			);
		}
		$home_data[11]['elements'][0]['elements'][1]['settings']['tabs'] = $tabs;
		$results[] = "Updated Homepage Elementor Accordion with 10 comprehensive 2026 FAQs.";
	}

	// 2. Remove existing compliance framework section if present to prevent duplicates
	foreach ( $home_data as $k => $c ) {
		if ( isset( $c['id'] ) && $c['id'] === 'rbo_home_compliance_framework_section' ) {
			unset( $home_data[$k] );
		}
	}
	$home_data = array_values( $home_data );

	// 3. Inject Compliance Framework Section right before Container 11 (the FAQ container)
	$home_framework_section = array(
		'id'       => 'rbo_home_compliance_framework_section',
		'elType'   => 'container',
		'isInner'  => false,
		'settings' => array(
			'content_width' => 'full',
			'padding'       => array(
				'unit'     => 'px',
				'top'      => '10',
				'right'    => '0',
				'bottom'   => '25',
				'left'     => '0',
				'isLinked' => false,
			),
		),
		'elements' => array(
			array(
				'id'         => 'rbo_home_compliance_widget',
				'elType'     => 'widget',
				'widgetType' => 'html',
				'settings'   => array(
					'html' => $home_compliance_framework_html,
				),
				'elements'   => array(),
			),
		),
	);

	// Insert before container 11
	array_splice( $home_data, 11, 0, array( $home_framework_section ) );

	update_post_meta( $home_id, '_elementor_data', wp_slash( json_encode( $home_data ) ) );
	$results[] = "Injected 2026 Compliance Framework into Homepage Elementor structure.";
}

// Update Homepage Rank Math & FAQ Schema
update_post_meta( $home_id, 'rank_math_title', $home_seo_title );
update_post_meta( $home_id, 'rank_math_description', $home_seo_desc );
update_post_meta( $home_id, 'rank_math_focus_keyword', $home_focus_kw );
update_post_meta( $home_id, 'rank_math_canonical_url', 'https://www.rboaccounting.ae/' );
update_post_meta( $home_id, 'rank_math_robots', array( 'index', 'follow' ) );
update_post_meta( $home_id, '_rbo_faq_schema', $home_faqs );
$results[] = "Updated Homepage Rank Math Meta Title, Description, Canonical & 10 Schema.org FAQs.";


// =========================================================================
// 2. PAGE: SHARJAH REGIONAL HUB (Post ID: 2225)
// =========================================================================
$sharjah_id = 2225;
$sharjah_seo_title = 'Accounting & Audit Firm in Sharjah | HFZA & SAIF Zone Auditors | RBO';
$sharjah_seo_desc = 'Premier chartered accounting, statutory audit & tax firm in Sharjah. Approved auditors for Hamriyah Free Zone (HFZA), SAIF Zone & Sharjah Industrial Areas. FTA tax agents.';
$sharjah_focus_kw = 'accounting firm in sharjah, auditing companies in sharjah, hamriyah free zone approved auditors, saif zone auditors, corporate tax consultant sharjah, vat return filing sharjah';

// 10 In-Depth Sharjah Specific FAQs
$sharjah_faqs = array(
	array(
		'q' => 'Is an annual financial audit mandatory for Hamriyah Free Zone (HFZA) licence renewal?',
		'a' => 'Yes. Under Hamriyah Free Zone Authority (HFZA) regulations and UAE Federal Corporate Tax Law (Federal Decree-Law No. 47 of 2022), all companies registered in HFZA must submit audited financial statements prepared by an accredited registered auditor to renew their trade licence and maintain 0% Qualifying Free Zone Person (QFZP) tax status.',
	),
	array(
		'q' => 'What are the statutory audit report deadlines and requirements for SAIF Zone companies?',
		'a' => 'Companies registered in Sharjah Airport International Free Zone (SAIF Zone) must prepare annual accounts in accordance with International Financial Reporting Standards (IFRS) and submit an official auditor\'s report within 3 months following their financial year-end. Failure to submit can result in licence renewal suspension and FTA non-compliance penalties.',
	),
	array(
		'q' => 'Are Sharjah mainland LLCs required to register and file UAE Corporate Tax?',
		'a' => 'Yes. Under Federal Decree-Law No. 47 of 2022, all commercial entities registered with the Sharjah Economic Development Department (SEDD) must register on EmaraTax and submit an annual Form CT201 corporate tax return. Companies with revenue up to AED 3,000,000 can elect for Small Business Relief (SBR) under Ministerial Decision No. 73 of 2023.',
	),
	array(
		'q' => 'What is the VAT registration threshold for Sharjah manufacturing and commercial trading firms?',
		'a' => 'Under Federal Decree-Law No. 8 of 2017, VAT registration is mandatory for any business in Sharjah whose taxable turnover and imports exceed AED 375,000 over the past 12 months. Voluntary registration is permitted once taxable revenue exceeds AED 187,500. Designated Zone rules apply specifically for designated fenced areas within Hamriyah Free Zone.',
	),
	array(
		'q' => 'How does RBO Accounting support industrial and manufacturing businesses in Sharjah Industrial Areas 1 to 18?',
		'a' => 'Sharjah Industrial Areas 1 to 18 represent the industrial backbone of the Northern Emirates. RBO provides customized manufacturing accounting, raw materials inventory valuation (FIFO/Weighted Average), bill of materials (BOM) cost accounting, job order costing, and automated supplier 3-way matching compliant with FTA audit standards.',
	),
	array(
		'q' => 'Can Free Zone entities in Sharjah benefit from the 0% Qualifying Free Zone Person (QFZP) tax rate?',
		'a' => 'Yes. Entities in HFZA, SAIF Zone, and Sharjah Publishing City (SPC) can qualify for 0% corporate tax on Qualifying Income derived from qualifying activities (such as manufacturing, processing, fund management, and headquarters services). RBO performs the de minimis threshold test (non-qualifying revenue must not exceed 5% of total revenue or AED 5,000,000) to secure your 0% rate.',
	),
	array(
		'q' => 'What accounting records must Sharjah businesses retain under UAE Federal Tax laws?',
		'a' => 'Under Article 78 of the UAE VAT Law and Article 56 of the Corporate Tax Law, Sharjah businesses must maintain commercial accounting books, audited annual financial statements, general ledgers, sales and purchase invoices, delivery notes, and bank statements for a statutory minimum of 7 years (15 years for real estate records).',
	),
	array(
		'q' => 'How does RBO assist Sharjah companies with Wages Protection System (WPS) payroll compliance?',
		'a' => 'We handle end-to-end payroll management for Sharjah commercial and industrial employers: calculating monthly overtime, leave pay, and end-of-service gratuity provisions under Federal Decree-Law No. 33 of 2021, generating valid Salary Information Files (.SIF), and routing payments through WPS to prevent Ministry of Human Resources (MoHRE) work permit blocks.',
	),
	array(
		'q' => 'What is the procedure for appealing FTA tax fines and penalties in Sharjah?',
		'a' => 'If your Sharjah company has received an administrative penalty from the FTA, RBO’s registered tax agents can file an official Penalty Reconsideration application via EmaraTax within 40 business days. Under Cabinet Decision No. 105 of 2021, we submit legal substantiation to waive or reduce late registration and late filing fines.',
	),
	array(
		'q' => 'How much do outsourced bookkeeping and auditing services cost in Sharjah?',
		'a' => 'RBO provides cost-effective monthly bookkeeping packages for Sharjah businesses starting from AED 850 per month. Statutory audit reports for SAIF Zone, HFZA, and SEDD licence renewal typically range between AED 2,500 and AED 4,500 depending on total turnover and transaction volume.',
	),
);

// Rich Injected HTML Section for Sharjah: Comparison Table, Turnkey Roadmap & Protected CTA Box
$sharjah_rich_html = <<<HTML
<div class="rbo-seo-upgrade-container" style="max-width: 1140px; margin: 40px auto; padding: 0 20px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #1e293b;">

  <!-- REGULATORY COMPARISON MATRIX -->
  <section style="background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; padding: 36px 30px; margin-bottom: 50px; box-shadow: 0 8px 30px rgba(9, 32, 59, 0.05);">
    <div style="text-align: center; max-width: 800px; margin: 0 auto 30px;">
      <span style="background: rgba(232, 184, 75, 0.15); color: #9a731c; border: 1px solid rgba(232, 184, 75, 0.4); padding: 5px 14px; border-radius: 9999px; font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">Sharjah Jurisdictional Compliance Guide</span>
      <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 30px; color: #09203b; margin: 12px 0 10px; font-weight: 700;">Sharjah Free Zones (HFZA / SAIF) vs. Sharjah SEDD Mainland Regulatory Matrix</h2>
      <p style="color: #64748b; font-size: 15.5px; line-height: 1.6; margin: 0;">Compare statutory audit mandates, Corporate Tax rates, and trade licence renewal requirements across Sharjah jurisdictions.</p>
    </div>

    <div style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
      <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14.5px;">
        <thead>
          <tr style="background: #09203b; color: #ffffff;">
            <th style="padding: 16px 18px; border-top-left-radius: 8px; font-weight: 600;">Compliance Aspect</th>
            <th style="padding: 16px 18px; font-weight: 600; color: #e8b84b;">Hamriyah Free Zone &amp; SAIF Zone</th>
            <th style="padding: 16px 18px; font-weight: 600;">Sharjah SEDD Mainland</th>
            <th style="padding: 16px 18px; border-top-right-radius: 8px; font-weight: 600;">RBO Deliverable &amp; Support</th>
          </tr>
        </thead>
        <tbody>
          <tr style="border-bottom: 1px solid #e2e8f0; background: #ffffff;">
            <td style="padding: 16px 18px; font-weight: 700; color: #09203b;">Statutory Audit Mandate</td>
            <td style="padding: 16px 18px; color: #334155;"><span style="color: #dc2626; font-weight: 700;">Mandatory</span> for annual trade licence renewal and banking facilities.</td>
            <td style="padding: 16px 18px; color: #334155;">Required for LLCs under Commercial Companies Law &amp; Corporate Tax audit trails.</td>
            <td style="padding: 16px 18px; color: #0b3a6e; font-weight: 600;">Approved Registered Auditor sign-off &amp; IFRS reports.</td>
          </tr>
          <tr style="border-bottom: 1px solid #e2e8f0; background: #f8fafc;">
            <td style="padding: 16px 18px; font-weight: 700; color: #09203b;">Corporate Tax Rate</td>
            <td style="padding: 16px 18px; color: #334155;"><strong style="color: #166534;">0% Qualifying Free Zone Person (QFZP)</strong> if conditions are met; 9% on non-qualifying income.</td>
            <td style="padding: 16px 18px; color: #334155;">0% on taxable income up to AED 375,000; <strong>9% on profits above AED 375,000</strong>.</td>
            <td style="padding: 16px 18px; color: #0b3a6e; font-weight: 600;">Form CT201 computation, QFZP de minimis test &amp; SBR election.</td>
          </tr>
          <tr style="border-bottom: 1px solid #e2e8f0; background: #ffffff;">
            <td style="padding: 16px 18px; font-weight: 700; color: #09203b;">VAT Return Filing</td>
            <td style="padding: 16px 18px; color: #334155;">Quarterly VAT201 filing if taxable revenue exceeds AED 375K; Designated Zone rules apply in HFZA.</td>
            <td style="padding: 16px 18px; color: #334155;">Quarterly VAT201 return filing on standard mainland local supplies (5% VAT).</td>
            <td style="padding: 16px 18px; color: #0b3a6e; font-weight: 600;">FTA Tax Agency filing, Input Tax verification &amp; VAT reconciliation.</td>
          </tr>
          <tr style="background: #f8fafc;">
            <td style="padding: 16px 18px; border-bottom-left-radius: 8px; font-weight: 700; color: #09203b;">WPS Payroll &amp; SIF</td>
            <td style="padding: 16px 18px; color: #334155;">Mandatory for entities employing staff with Free Zone visas.</td>
            <td style="padding: 16px 18px; color: #334155;">Mandatory under MoHRE Resolution 340 for all mainland trade licences.</td>
            <td style="padding: 16px 18px; border-bottom-right-radius: 8px; color: #0b3a6e; font-weight: 600;">Automated SIF generation, gratuity calculation &amp; MoHRE compliance.</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- 3-PHASE TURNKEY ROADMAP -->
  <section style="background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; padding: 36px 30px; margin-bottom: 50px; box-shadow: 0 8px 30px rgba(9, 32, 59, 0.05);">
    <div style="text-align: center; max-width: 800px; margin: 0 auto 35px;">
      <span style="background: rgba(9, 32, 59, 0.08); color: #09203b; padding: 5px 14px; border-radius: 9999px; font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">Sharjah Onboarding Workflow</span>
      <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 30px; color: #09203b; margin: 12px 0 10px; font-weight: 700;">3-Phase Financial Onboarding for Sharjah Companies</h2>
      <p style="color: #64748b; font-size: 15.5px; line-height: 1.6; margin: 0;">How RBO Accounting transitions your Sharjah business into 100% compliant, audit-ready operations.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px;">
      <div style="background: #f8fafc; border-top: 4px solid #09203b; border-radius: 8px; padding: 24px; box-shadow: 0 2px 10px rgba(0,0,0,0.03);">
        <div style="font-size: 28px; font-weight: 800; color: #09203b; margin-bottom: 8px;">01</div>
        <h3 style="font-size: 18px; color: #09203b; margin: 0 0 10px; font-weight: 700;">Financial Diagnostic &amp; Cloud Setup</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin: 0;">We review existing books, audit opening balances, verify supplier TRNs, and configure your chart of accounts on Zoho Books, QuickBooks, or Xero with zero business downtime.</p>
      </div>

      <div style="background: #f8fafc; border-top: 4px solid #e8b84b; border-radius: 8px; padding: 24px; box-shadow: 0 2px 10px rgba(0,0,0,0.03);">
        <div style="font-size: 28px; font-weight: 800; color: #e8b84b; margin-bottom: 8px;">02</div>
        <h3 style="font-size: 18px; color: #09203b; margin: 0 0 10px; font-weight: 700;">Monthly Bookkeeping &amp; VAT Filing</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin: 0;">Our chartered accountants manage monthly bank reconciliations, 3-way invoice matching, WPS payroll, and submit error-free quarterly VAT201 returns to the FTA.</p>
      </div>

      <div style="background: #f8fafc; border-top: 4px solid #166534; border-radius: 8px; padding: 24px; box-shadow: 0 2px 10px rgba(0,0,0,0.03);">
        <div style="font-size: 28px; font-weight: 800; color: #166534; margin-bottom: 8px;">03</div>
        <h3 style="font-size: 18px; color: #09203b; margin: 0 0 10px; font-weight: 700;">Statutory Audit &amp; CT201 Filing</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin: 0;">We prepare your annual IFRS financial statements, coordinate registered statutory audit sign-off for HFZA / SAIF licence renewal, and submit Form CT201 on EmaraTax.</p>
      </div>
    </div>
  </section>

  <!-- PROTECTED DARK CTA BOX -->
  <section style="background: #09203b; border-radius: 14px; padding: 40px 30px; text-align: center; box-shadow: 0 10px 30px rgba(9, 32, 59, 0.2);">
    <span style="background: rgba(232, 184, 75, 0.2); color: #e8b84b; padding: 5px 14px; border-radius: 9999px; font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">Sharjah Consultation</span>
    <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 30px; color: #ffffff !important; margin: 15px 0 12px; font-weight: 700;">Speak With Our Sharjah Chartered Accountants &amp; Tax Agents</h2>
    <p style="color: #cbd5e1; font-size: 16px; max-width: 650px; margin: 0 auto 25px; line-height: 1.6;">Schedule an on-site or digital consultation to review your Free Zone audit requirements, Corporate Tax liability, or monthly bookkeeping in Sharjah.</p>
    <div>
      <a href="{$site_url}/contact/" style="background: #e8b84b; color: #09203b; font-weight: 700; padding: 14px 28px; border-radius: 6px; text-decoration: none; display: inline-block; font-size: 15px; margin-right: 12px;">Request Consultation &rarr;</a>
      <a href="tel:+971566675000" style="background: transparent; color: #ffffff; border: 1px solid rgba(255,255,255,0.3); font-weight: 600; padding: 13px 24px; border-radius: 6px; text-decoration: none; display: inline-block; font-size: 15px;">Call +971 56 667 5000</a>
    </div>
  </section>

</div>
HTML;


// Execute Sharjah Elementor & Metadata Updates
$sharjah_raw = get_post_meta( $sharjah_id, '_elementor_data', true );
$sharjah_data = json_decode( $sharjah_raw, true );

if ( ! empty( $sharjah_data ) && is_array( $sharjah_data ) ) {
	// Remove existing custom section if present
	foreach ( $sharjah_data as $k => $c ) {
		if ( isset( $c['id'] ) && $c['id'] === 'rbo_sharjah_seo_matrix_section' ) {
			unset( $sharjah_data[$k] );
		}
	}
	$sharjah_data = array_values( $sharjah_data );

	$sharjah_seo_section = array(
		'id'       => 'rbo_sharjah_seo_matrix_section',
		'elType'   => 'container',
		'isInner'  => false,
		'settings' => array(
			'content_width' => 'full',
			'padding'       => array(
				'unit'     => 'px',
				'top'      => '20',
				'right'    => '0',
				'bottom'   => '20',
				'left'     => '0',
				'isLinked' => false,
			),
		),
		'elements' => array(
			array(
				'id'         => 'rbo_sharjah_seo_matrix_widget',
				'elType'     => 'widget',
				'widgetType' => 'html',
				'settings'   => array(
					'html' => $sharjah_rich_html,
				),
				'elements'   => array(),
			),
		),
	);

	// Insert before index 16 (where FAQ section starts)
	$insert_idx = min( 16, count( $sharjah_data ) );
	array_splice( $sharjah_data, $insert_idx, 0, array( $sharjah_seo_section ) );

	update_post_meta( $sharjah_id, '_elementor_data', wp_slash( json_encode( $sharjah_data ) ) );
	$results[] = "Injected Sharjah Regulatory Matrix & Turnkey Roadmap into Elementor structure (ID: {$sharjah_id}).";
}

// Update Sharjah Rank Math Meta & Schema
update_post_meta( $sharjah_id, 'rank_math_title', $sharjah_seo_title );
update_post_meta( $sharjah_id, 'rank_math_description', $sharjah_seo_desc );
update_post_meta( $sharjah_id, 'rank_math_focus_keyword', $sharjah_focus_kw );
update_post_meta( $sharjah_id, 'rank_math_canonical_url', 'https://www.rboaccounting.ae/areas-we-serve/sharjah/' );
update_post_meta( $sharjah_id, 'rank_math_robots', array( 'index', 'follow' ) );
update_post_meta( $sharjah_id, '_rbo_faq_schema', $sharjah_faqs );
update_post_meta( $sharjah_id, '_rbo_local_seo_html', $sharjah_rich_html );
$results[] = "Updated Sharjah Rank Math Meta Title, Description, Canonical & 10 Schema.org FAQs.";


// =========================================================================
// 3. FLUSH CACHES & REWRITE RULES
// =========================================================================
if ( class_exists( '\Elementor\Plugin' ) ) {
	\Elementor\Plugin::$instance->posts_css_manager->clear_cache();
}
wp_cache_delete( $home_id, 'post_meta' );
wp_cache_delete( $sharjah_id, 'post_meta' );
clean_post_cache( $home_id );
clean_post_cache( $sharjah_id );
flush_rewrite_rules( false );
if ( function_exists( 'wp_cache_flush' ) ) {
	wp_cache_flush();
}

echo "=======================================================\n";
echo " TOP GSC PAGES SUCCESSFULLY UPGRADED:\n";
foreach ( $results as $r ) {
	echo " ✅ {$r}\n";
}
echo "=======================================================\n";

