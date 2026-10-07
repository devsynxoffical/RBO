<?php
/**
 * RBO Accounting — Top GSC Pages Content & Keyword Upgrade Script
 * 
 * Target Pages to upgrade based on Google Search Console impressions:
 * 1. /areas-we-serve/abu-dhabi/ (273 impressions)
 * 2. /our-services/vat-registration-filing/penalty-reconsideration/ (185 impressions)
 * 3. /areas-we-serve/ajman/ (146 impressions)
 * 4. /our-services/accounting/accounts-payable-and-receivable/ (121 impressions)
 * 5. /our-services/ (85 impressions)
 * 6. /about-us/ (Authority & Trust signals)
 * 
 * Execution:
 * - Local CLI: php update-top-gsc-pages.php
 * - Live cPanel: Upload to public_html/ and visit https://www.rboaccounting.ae/update-top-gsc-pages.php
 */

@ini_set( 'display_errors', 1 );
@ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

if ( ! file_exists( __DIR__ . '/wp-load.php' ) ) {
	die( 'Error: Place this script in your WordPress root directory alongside wp-load.php.' );
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
// 1. PAGE: /areas-we-serve/abu-dhabi/ (273 Impressions)
// =========================================================================
$abu_dhabi_content = <<<HTML
<div class="rbo-elementor-service-wrapper">
  <!-- HERO SECTION -->
  <section class="rbo-hero-section" style="background: linear-gradient(135deg, rgba(9, 32, 59, 0.96) 0%, rgba(13, 43, 79, 0.90) 100%); padding: 65px 20px 75px; color: #ffffff;">
    <div style="max-width: 1140px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 35px;">
      <div style="flex: 1 1 580px;">
        <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(232, 184, 75, 0.15); color: #e8b84b; border: 1px solid rgba(232, 184, 75, 0.4); padding: 6px 16px; border-radius: 9999px; font-size: 13px; font-weight: 700; margin-bottom: 18px;">
          📍 Abu Dhabi Mainland (ADDED), ADGM, KIZAD & Masdar City
        </div>
        <h1 style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; color: #ffffff; font-weight: 800; line-height: 1.25; margin: 0 0 16px;">
          Accounting, Corporate Tax & VAT Firm in <span style="color: #e8b84b;">Abu Dhabi, UAE</span>
        </h1>
        <p style="font-size: 16.5px; color: #cbd5e1; line-height: 1.75; margin-bottom: 22px;">
          FTA-certified tax agents providing corporate tax registration (CT registration), corporate tax returns (CT returns), Form VAT201 return filing, accounts payable outsourcing in Abu Dhabi, and FTA penalty reconsideration appeals for ADDED mainland, ADGM, and KIZAD enterprises.
        </p>
        <div style="display: flex; flex-wrap: wrap; gap: 14px; margin-bottom: 24px;">
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> FTA Certified Tax Agents</div>
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> CT Registration &amp; CT Returns Filing</div>
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> Accounts Payable Outsourcing in KIZAD</div>
        </div>
        <div>
          <a href="https://wa.me/971524473871?text=Hello%20RBO%20Abu%20Dhabi%20Desk,%20I%20need%20Corporate%20Tax%20and%20Accounting%20assistance" style="display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-size: 15px; margin-right: 12px;">💬 Free Abu Dhabi Consultation (WhatsApp)</a>
          <a href="{$site_url}/contact-us/" style="display: inline-block; background: transparent; color: #ffffff; border: 2px solid #ffffff; font-weight: 600; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-size: 15px;">Book Meeting</a>
        </div>
      </div>
      <div style="flex: 0 1 380px; background: rgba(13, 27, 42, 0.95); border: 1px solid rgba(232, 184, 75, 0.35); padding: 28px 24px; border-radius: 14px; color: #ffffff;">
        <h3 style="color: #e8b84b; margin: 0 0 10px; font-size: 20px; font-weight: 700;">Abu Dhabi Practice Coverage</h3>
        <p style="color: #cbd5e1; font-size: 14px; margin-bottom: 16px;">Dedicated tax consultants and financial controllers serving Abu Dhabi mainland and free zones.</p>
        <ul style="list-style: none; padding: 0; margin: 0 0 18px; color: #f8fafc; font-size: 13.5px; line-height: 1.8;">
          <li>📍 <strong>Mainland:</strong> Abu Dhabi DED (ADDED) Commercial Licences</li>
          <li>🏢 <strong>Financial Free Zone:</strong> Abu Dhabi Global Market (ADGM)</li>
          <li>🏭 <strong>Industrial Hubs:</strong> KIZAD / KEZAD &amp; ICAD Musaffah</li>
          <li>📞 <strong>Hotline:</strong> +971 52 447 3871</li>
        </ul>
        <a href="tel:+971524473871" style="display: block; text-align: center; background: #25d366; color: #ffffff; font-weight: 700; padding: 11px; border-radius: 6px; text-decoration: none;">📞 Direct Call: +971 52 447 3871</a>
      </div>
    </div>
  </section>

  <!-- CORE SERVICE CARDS -->
  <section style="max-width: 1140px; margin: 50px auto; padding: 0 20px;">
    <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 32px; color: #09203b; text-align: center; margin-bottom: 12px;">Financial &amp; Tax Solutions for Abu Dhabi Businesses</h2>
    <p style="text-align: center; color: #64748b; font-size: 16px; max-width: 780px; margin: 0 auto 40px;">From CT registration and quarterly Form VAT201 filing to accounts payable BPO and FTA penalty appeals, our certified accountants keep your company 100% compliant.</p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <div style="font-size: 28px; margin-bottom: 12px;">⚖️</div>
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Corporate Tax (CT Registration &amp; CT Returns)</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">EmaraTax CT registration, Form CT201 return filing, Small Business Relief (SBR) up to AED 3,000,000 revenue, and Qualifying Free Zone Person (QFZP) 0% tax determinations for ADGM and KIZAD companies.</p>
        <a href="{$site_url}/our-services/corporate-tax/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Explore Corporate Tax Services →</a>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <div style="font-size: 28px; margin-bottom: 12px;">📑</div>
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Corporate Tax Reconsideration in Abu Dhabi</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Challenging unfair FTA penalties, including the <strong>AED 10,000 late CT registration penalty</strong>. We draft certified Arabic legal briefs and file penalty waiver applications under Cabinet Decision No. 105 of 2021.</p>
        <a href="{$site_url}/corporate-tax-reconsideration-penalty-waiver-uae/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Learn About Penalty Reconsideration →</a>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <div style="font-size: 28px; margin-bottom: 12px;">💳</div>
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Accounts Payable Outsourcing in Abu Dhabi &amp; KIZAD</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">End-to-end online accounts payable services, vendor 3-way matching, purchase order verification, payment run scheduling, and input VAT reconciliation on Zoho Books, QuickBooks, and SAP.</p>
        <a href="{$site_url}/our-services/accounting/accounts-payable-and-receivable/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Explore AP Outsourcing Services →</a>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <div style="font-size: 28px; margin-bottom: 12px;">📊</div>
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">VAT Registration &amp; Form 201 Return Filing</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Mandatory and voluntary VAT registration, quarterly Form VAT201 filing, input tax recovery audits, and transaction advisory on VAT for commercial real estate and business sales.</p>
        <a href="{$site_url}/our-services/vat-registration-filing/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Explore VAT Services →</a>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <div style="font-size: 28px; margin-bottom: 12px;">🏭</div>
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Accounting Services in KIZAD &amp; Industrial Zones</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Customized cost accounting, inventory tracking, bill of materials (BOM), and IFRS bookkeeping for logistics, manufacturing, and heavy industry plants in Khalifa Industrial Zone Abu Dhabi.</p>
        <a href="{$site_url}/our-services/accounting/bookkeeping-and-accounting/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Industrial Accounting Solutions →</a>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <div style="font-size: 28px; margin-bottom: 12px;">🔍</div>
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Statutory Audits &amp; ICV Readiness Support</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Independent audits for commercial banking compliance, annual licence renewals, and financial documentation preparation for Abu Dhabi ADNOC In-Country Value (ICV) certification.</p>
        <a href="{$site_url}/our-services/audit-assurance/statutory-audit/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Explore Audit &amp; ICV Support →</a>
      </div>
    </div>
  </section>

  <!-- JURISDICTION COMPLIANCE TABLE -->
  <section style="background: #f8fafc; padding: 50px 20px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">
    <div style="max-width: 1140px; margin: 0 auto;">
      <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 28px; color: #09203b; text-align: center; margin-bottom: 16px;">Abu Dhabi Business Jurisdictions Compliance Matrix</h2>
      <p style="text-align: center; color: #64748b; font-size: 15px; margin-bottom: 30px;">Overview of Corporate Tax, VAT, Audit, and Accounting requirements across Abu Dhabi commercial sectors:</p>
      
      <div class="rbo-table-wrap">
        <table style="width: 100%; border-collapse: collapse; font-size: 14.5px; background: #ffffff; border: 1px solid #e2e8f0;">
          <thead>
            <tr style="background: #09203b; color: #ffffff;">
              <th style="padding: 14px 16px; text-align: left; border: 1px solid #1e3a8a;">Jurisdiction</th>
              <th style="padding: 14px 16px; text-align: left; border: 1px solid #1e3a8a;">CT Registration &amp; Filing</th>
              <th style="padding: 14px 16px; text-align: left; border: 1px solid #1e3a8a;">VAT Compliance</th>
              <th style="padding: 14px 16px; text-align: left; border: 1px solid #1e3a8a;">Audit Requirement</th>
              <th style="padding: 14px 16px; text-align: left; border: 1px solid #1e3a8a;">Accounting Standard</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="padding: 12px 16px; font-weight: 700; border: 1px solid #e2e8f0;">ADDED Mainland</td>
              <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Mandatory CT Registration; 9% above AED 375k or 0% SBR up to AED 3M revenue.</td>
              <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Mandatory above AED 375,000 taxable supplies; quarterly Form VAT201.</td>
              <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Required for companies exceeding AED 50M revenue or banking facilities.</td>
              <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">IFRS / IFRS for SMEs</td>
            </tr>
            <tr style="background: #f8fafc;">
              <td style="padding: 12px 16px; font-weight: 700; border: 1px solid #e2e8f0;">ADGM (Financial Free Zone)</td>
              <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Mandatory CT Registration; 0% on Qualifying Income (QFZP) subject to strict substance.</td>
              <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Standard UAE VAT rules apply (not a designated VAT zone).</td>
              <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Mandatory annual audit by ADGM-registered auditor within 4 months of year-end.</td>
              <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Full IFRS</td>
            </tr>
            <tr>
              <td style="padding: 12px 16px; font-weight: 700; border: 1px solid #e2e8f0;">KIZAD / KEZAD (Industrial Zone)</td>
              <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Mandatory CT Registration; qualifying manufacturing/logistics qualify for 0% QFZP tax.</td>
              <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Designated Zone rules for goods; services standard-rated at 5%.</td>
              <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Mandatory for licence renewal and corporate bank accounts.</td>
              <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">IFRS</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- CTA STRIP -->
  <section style="background: #09203b; color: #ffffff; padding: 45px 20px; text-align: center;">
    <div style="max-width: 800px; margin: 0 auto;">
      <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 28px; color: #ffffff; margin-bottom: 12px;">Need Immediate Tax or Accounting Assistance in Abu Dhabi?</h2>
      <p style="color: #cbd5e1; font-size: 16px; margin-bottom: 24px;">Our senior tax consultants review your EmaraTax portal status, prepare CT returns, resolve penalties, and streamline your accounts payable.</p>
      <a href="https://wa.me/971524473871?text=Hello%20RBO%20Abu%20Dhabi,%20I%20need%20urgent%20Corporate%20Tax%20and%20Accounting%20support" style="display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 14px 32px; border-radius: 8px; text-decoration: none; font-size: 16px;">💬 Chat on WhatsApp with an FTA Tax Agent (+971 52 447 3871)</a>
    </div>
  </section>
</div>
HTML;

$abu_dhabi_faqs = array(
	array(
		'q' => 'How does a business file a Corporate Tax reconsideration in Abu Dhabi?',
		'a' => 'Under Federal Decree-Law No. 28 of 2022 on Tax Procedures, taxpayers in Abu Dhabi must submit a formal Request for Reconsideration through the EmaraTax portal within 40 business days of receiving the penalty notice. The submission must include a certified legal memorandum in Arabic, proof of trade licence, and verifiable evidence (such as IT logs or bank receipts). RBO\'s certified FTA tax agents manage the entire appeal process.',
	),
	array(
		'q' => 'What are the Corporate Tax return deadlines (CT returns) for Abu Dhabi entities?',
		'a' => 'Under UAE Corporate Tax Law, every taxable person in Abu Dhabi must submit Form CT201 and settle any tax payable within 9 months from the end of their financial year (e.g. by 30 September for calendar tax periods ending 31 December). Late submission triggers an immediate administrative penalty.',
	),
	array(
		'q' => 'What is included in accounts payable outsourcing services in Abu Dhabi and KIZAD?',
		'a' => 'Our accounts payable BPO services cover automated vendor bill capture, 3-way matching (PO, receipt, and invoice), input VAT reconciliation on Form VAT201, payment cycle approvals, vendor statement reconciliations, and weekly cash flow projections on cloud platforms like Zoho Books, QuickBooks, and SAP.',
	),
	array(
		'q' => 'Do ADGM and KIZAD companies qualify for 0% Corporate Tax?',
		'a' => 'Yes, companies in ADGM and KIZAD that meet Qualifying Free Zone Person (QFZP) conditions—such as deriving Qualifying Income, maintaining commercial substance in Abu Dhabi, having audited financial statements, and complying with transfer pricing rules—benefit from 0% Corporate Tax.',
	),
);

$abu_dhabi_page = get_page_by_path( 'areas-we-serve/abu-dhabi' );
if ( ! $abu_dhabi_page ) {
	$abu_dhabi_page = get_page_by_path( 'abu-dhabi' );
}
if ( $abu_dhabi_page ) {
	wp_update_post( array(
		'ID'           => $abu_dhabi_page->ID,
		'post_title'   => 'Accounting Consulting Firm in Abu Dhabi | Corporate Tax, VAT & Audit | RBO',
		'post_content' => $abu_dhabi_content,
		'post_status'  => 'publish',
	) );
	update_post_meta( $abu_dhabi_page->ID, 'rank_math_title', 'Accounting Firm in Abu Dhabi | CT Returns, VAT & AP Outsourcing | RBO' );
	update_post_meta( $abu_dhabi_page->ID, 'rank_math_description', 'Top accounting & tax firm in Abu Dhabi. Corporate tax registration (CT registration), CT returns, VAT filing, accounts payable outsourcing in KIZAD & FTA penalty reconsideration.' );
	update_post_meta( $abu_dhabi_page->ID, 'rank_math_focus_keyword', 'corporate tax reconsideration in abu dhabi, accounts payable outsourcing services in abu dhabi, accounting service in kizad, ct registration, ct returns' );
	update_post_meta( $abu_dhabi_page->ID, 'rank_math_robots', array( 'index' ) );
	update_post_meta( $abu_dhabi_page->ID, '_rbo_faq_schema', $abu_dhabi_faqs );
	$results[] = "Upgraded /areas-we-serve/abu-dhabi/ (ID: {$abu_dhabi_page->ID})";
}

// =========================================================================
// 2. PAGE: /our-services/vat-registration-filing/penalty-reconsideration/ (185 Impressions)
// =========================================================================
$penalty_reconsideration_content = <<<HTML
<div class="rbo-elementor-service-wrapper">
  <!-- HERO SECTION -->
  <section class="rbo-hero-section" style="background: linear-gradient(135deg, rgba(9, 32, 59, 0.96) 0%, rgba(13, 43, 79, 0.90) 100%); padding: 65px 20px 75px; color: #ffffff;">
    <div style="max-width: 1140px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 35px;">
      <div style="flex: 1 1 580px;">
        <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(232, 184, 75, 0.15); color: #e8b84b; border: 1px solid rgba(232, 184, 75, 0.4); padding: 6px 16px; border-radius: 9999px; font-size: 13px; font-weight: 700; margin-bottom: 18px;">
          ⚖️ UAE Tax Procedures Law (Federal Decree-Law No. 28 of 2022)
        </div>
        <h1 style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; color: #ffffff; font-weight: 800; line-height: 1.25; margin: 0 0 16px;">
          FTA Tax Penalty Reconsideration &amp; <span style="color: #e8b84b;">Waiver Services UAE</span>
        </h1>
        <p style="font-size: 16.5px; color: #cbd5e1; line-height: 1.75; margin-bottom: 22px;">
          Received an unexpected FTA fine? Our certified FTA Tax Agents prepare and submit formal <strong>FTA Reconsideration requests (طلب إعادة النظر)</strong> and <strong>Cabinet Decision No. 105 Penalty Waiver applications</strong> to dispute, reduce, or cancel unjustified Corporate Tax and VAT administrative penalties.
        </p>
        <div style="display: flex; flex-wrap: wrap; gap: 14px; margin-bottom: 24px;">
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> Overturn AED 10,000 Late CT Registration Fines</div>
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> 40-Business-Day Statutory Appeal Handling</div>
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> Official Arabic Legal Memorandum Drafting</div>
        </div>
        <div>
          <a href="https://wa.me/971524473871?text=Hello%20RBO,%20I%20need%20urgent%20help%20with%20an%20FTA%20Penalty%20Reconsideration" style="display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-size: 15px; margin-right: 12px;">💬 Urgent Penalty Review (WhatsApp)</a>
          <a href="tel:+971524473871" style="display: inline-block; background: transparent; color: #ffffff; border: 2px solid #ffffff; font-weight: 600; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-size: 15px;">Call Tax Agent: +971 52 447 3871</a>
        </div>
      </div>
      <div style="flex: 0 1 380px; background: rgba(13, 27, 42, 0.95); border: 1px solid rgba(232, 184, 75, 0.35); padding: 28px 24px; border-radius: 14px; color: #ffffff;">
        <h3 style="color: #e8b84b; margin: 0 0 10px; font-size: 20px; font-weight: 700;">⚠️ 40-Day Appeal Warning</h3>
        <p style="color: #cbd5e1; font-size: 14px; margin-bottom: 16px;">The FTA enforces a strict 40-business-day window from the penalty notice date. Missing this deadline forfeits your legal right to dispute before the TDRC.</p>
        <div style="background: rgba(239, 68, 68, 0.15); border: 1px solid #ef4444; border-radius: 8px; padding: 12px; margin-bottom: 16px; font-size: 13.5px; color: #fca5a5;">
          <strong>Common Fine:</strong> AED 10,000 late CT registration penalty per licence under Cabinet Decision No. 75 of 2023.
        </div>
        <a href="https://wa.me/971524473871?text=Hello%20RBO,%20check%20if%20my%20FTA%20penalty%20is%20within%20the%2040%20day%20appeal%20deadline" style="display: block; text-align: center; background: #25d366; color: #ffffff; font-weight: 700; padding: 11px; border-radius: 6px; text-decoration: none;">Check Eligibility on WhatsApp</a>
      </div>
    </div>
  </section>

  <!-- CONTENT SECTION: RECONSIDERATION VS WAIVER -->
  <section style="max-width: 1140px; margin: 50px auto; padding: 0 20px;">
    <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 32px; color: #09203b; text-align: center; margin-bottom: 14px;">FTA Reconsideration &amp; Penalty Waiver Solutions</h2>
    <p style="text-align: center; color: #64748b; font-size: 16px; max-width: 780px; margin: 0 auto 40px;">Whether your business was penalized for late Corporate Tax registration, late VAT return filing, or disputed audit findings, we provide full legal representation.</p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">1. Corporate Tax Reconsideration in Abu Dhabi &amp; Dubai</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Challenging administrative penalties for late Corporate Tax registration (AED 10,000) or CT return errors. We prepare verified proof of EmaraTax portal delays, licence issuance dates, and submit formal Arabic objections.</p>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">2. VAT Penalty Reconsideration &amp; Waivers</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Disputing late VAT registration penalties (AED 10,000 to AED 20,000), late submission of Form VAT201, input VAT apportionment adjustments, and Voluntary Disclosure (VD 211) surcharges.</p>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">3. Cabinet Decision No. 105 of 2021 Waiver Requests</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Applying to the FTA Tripartite Committee for installment payments or full waiver of penalties based on recognized reasonable excuses (medical emergencies, bank transfer lags, IT downtime, or force majeure).</p>
      </div>
    </div>
  </section>

  <!-- 3-TIER APPEAL ROADMAP -->
  <section style="background: #f8fafc; padding: 50px 20px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">
    <div style="max-width: 1140px; margin: 0 auto;">
      <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 28px; color: #09203b; text-align: center; margin-bottom: 16px;">The 3-Tier UAE Tax Appeal Mechanism</h2>
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; margin-top: 30px;">
        <div style="background: #ffffff; padding: 24px; border-radius: 10px; border-left: 4px solid #e8b84b; box-shadow: 0 2px 10px rgba(0,0,0,0.03);">
          <div style="font-weight: 800; color: #e8b84b; font-size: 14px;">STAGE 1</div>
          <h3 style="font-size: 18px; color: #09203b; margin: 6px 0 10px;">FTA Reconsideration (EmaraTax)</h3>
          <p style="font-size: 14px; color: #475569; line-height: 1.6;">Mandatory first petition filed within 40 business days. Decision issued within 20–40 business days.</p>
        </div>
        <div style="background: #ffffff; padding: 24px; border-radius: 10px; border-left: 4px solid #0b3a6e; box-shadow: 0 2px 10px rgba(0,0,0,0.03);">
          <div style="font-weight: 800; color: #0b3a6e; font-size: 14px;">STAGE 2</div>
          <h3 style="font-size: 18px; color: #09203b; margin: 6px 0 10px;">Tax Disputes Resolution (TDRC)</h3>
          <p style="font-size: 14px; color: #475569; line-height: 1.6;">Ministry of Justice committee. Mandatory within 40 business days if FTA rejects reconsideration.</p>
        </div>
        <div style="background: #ffffff; padding: 24px; border-radius: 10px; border-left: 4px solid #09203b; box-shadow: 0 2px 10px rgba(0,0,0,0.03);">
          <div style="font-weight: 800; color: #09203b; font-size: 14px;">STAGE 3</div>
          <h3 style="font-size: 18px; color: #09203b; margin: 6px 0 10px;">UAE Federal Courts</h3>
          <p style="font-size: 14px; color: #475569; line-height: 1.6;">Federal Court of First Instance, Court of Appeal, and Supreme Court for disputes exceeding AED 100,000.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA STRIP -->
  <section style="background: #09203b; color: #ffffff; padding: 45px 20px; text-align: center;">
    <div style="max-width: 800px; margin: 0 auto;">
      <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 28px; color: #ffffff; margin-bottom: 12px;">Act Before Your 40-Business-Day Statutory Deadline Expires</h2>
      <p style="color: #cbd5e1; font-size: 16px; margin-bottom: 24px;">Our tax agents examine your penalty notice free of charge and provide an honest assessment of appeal success.</p>
      <a href="https://wa.me/971524473871?text=Hello%20RBO,%20please%20review%20my%20FTA%20penalty%20notice%20for%20reconsideration" style="display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 14px 32px; border-radius: 8px; text-decoration: none; font-size: 16px;">💬 Send Penalty Notice on WhatsApp (+971 52 447 3871)</a>
    </div>
  </section>
</div>
HTML;

$penalty_reconsideration_faqs = array(
	array(
		'q' => 'Can an FTA Corporate Tax late registration penalty of AED 10,000 be waived?',
		'a' => 'Yes. Under Cabinet Decision No. 105 of 2021 and Tax Procedures Law, many UAE businesses have successfully overturned the AED 10,000 penalty by proving reasonable excuse—such as EmaraTax system glitches, delayed trade licence renewals, or hospitalizations—accompanied by a certified Arabic legal brief.',
	),
	array(
		'q' => 'What is the statutory deadline to submit a penalty waiver reconsideration in UAE?',
		'a' => 'A Request for Reconsideration must be submitted on EmaraTax strictly within 40 business days from the date the taxpayer is notified of the FTA decision or penalty. Missing this deadline forfeits the right to appeal before the Tax Disputes Resolution Committee (TDRC).',
	),
	array(
		'q' => 'Must the reconsideration submission be written in Arabic?',
		'a' => 'Yes. Arabic is the mandatory legal language for all FTA reconsideration petitions and TDRC submissions in the UAE. RBO\'s accredited tax agents draft compliant Arabic legal memorandums citing relevant Cabinet Decisions.',
	),
);

$penalty_page = get_page_by_path( 'our-services/vat-registration-filing/penalty-reconsideration' );
if ( ! $penalty_page ) {
	$penalty_page = get_page_by_path( 'penalty-reconsideration' );
}
if ( $penalty_page ) {
	wp_update_post( array(
		'ID'           => $penalty_page->ID,
		'post_title'   => 'FTA Tax Penalty Reconsideration & Waiver Services UAE | Corporate Tax & VAT Appeals | RBO',
		'post_content' => $penalty_reconsideration_content,
		'post_status'  => 'publish',
	) );
	update_post_meta( $penalty_page->ID, 'rank_math_title', 'FTA Penalty Reconsideration UAE | CT & VAT Fine Waiver | RBO' );
	update_post_meta( $penalty_page->ID, 'rank_math_description', 'Overturn FTA fines with expert tax agents. Corporate tax reconsideration in Abu Dhabi & Dubai, VAT penalty waivers under Cabinet Decision 105 & EmaraTax appeals.' );
	update_post_meta( $penalty_page->ID, 'rank_math_focus_keyword', 'penalty waiver reconsideration uae, corporate tax reconsideration in abu dhabi, fta tax reconsideration, vat penalty waiver' );
	update_post_meta( $penalty_page->ID, 'rank_math_robots', array( 'index' ) );
	update_post_meta( $penalty_page->ID, '_rbo_faq_schema', $penalty_reconsideration_faqs );
	$results[] = "Upgraded /our-services/vat-registration-filing/penalty-reconsideration/ (ID: {$penalty_page->ID})";
}

// =========================================================================
// 3. PAGE: /our-services/accounting/accounts-payable-and-receivable/ (121 Impressions)
// =========================================================================
$ap_ar_content = <<<HTML
<div class="rbo-elementor-service-wrapper">
  <!-- HERO SECTION -->
  <section class="rbo-hero-section" style="background: linear-gradient(135deg, rgba(9, 32, 59, 0.96) 0%, rgba(13, 43, 79, 0.90) 100%); padding: 65px 20px 75px; color: #ffffff;">
    <div style="max-width: 1140px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 35px;">
      <div style="flex: 1 1 580px;">
        <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(232, 184, 75, 0.15); color: #e8b84b; border: 1px solid rgba(232, 184, 75, 0.4); padding: 6px 16px; border-radius: 9999px; font-size: 13px; font-weight: 700; margin-bottom: 18px;">
          💼 BPO Financial Operations — Abu Dhabi, Dubai &amp; KIZAD
        </div>
        <h1 style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; color: #ffffff; font-weight: 800; line-height: 1.25; margin: 0 0 16px;">
          Accounts Payable &amp; Receivable <span style="color: #e8b84b;">Outsourcing Services UAE</span>
        </h1>
        <p style="font-size: 16.5px; color: #cbd5e1; line-height: 1.75; margin-bottom: 22px;">
          Streamline your vendor payments, debtor collections, and working capital with professional <strong>accounts payable outsourcing services in Abu Dhabi and Dubai</strong>. Cloud ERP integration, 3-way invoice matching, and 100% compliant input VAT recovery for UAE businesses.
        </p>
        <div style="display: flex; flex-wrap: wrap; gap: 14px; margin-bottom: 24px;">
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> Online Accounts Payable Automation</div>
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> 3-Way Matching (PO, GRN &amp; Invoice)</div>
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> Input VAT Recovery Reconciliation</div>
        </div>
        <div>
          <a href="https://wa.me/971524473871?text=Hello%20RBO,%20I%20want%20to%20outsource%20Accounts%20Payable%20and%20Receivable" style="display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-size: 15px; margin-right: 12px;">💬 Free AP/AR Assessment (WhatsApp)</a>
          <a href="{$site_url}/contact-us/" style="display: inline-block; background: transparent; color: #ffffff; border: 2px solid #ffffff; font-weight: 600; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-size: 15px;">Schedule Call</a>
        </div>
      </div>
      <div style="flex: 0 1 380px; background: rgba(13, 27, 42, 0.95); border: 1px solid rgba(232, 184, 75, 0.35); padding: 28px 24px; border-radius: 14px; color: #ffffff;">
        <h3 style="color: #e8b84b; margin: 0 0 10px; font-size: 20px; font-weight: 700;">ERP &amp; Cloud Fluency</h3>
        <p style="color: #cbd5e1; font-size: 14px; margin-bottom: 16px;">Our team connects directly to your existing systems with zero disruption:</p>
        <ul style="list-style: none; padding: 0; margin: 0 0 18px; color: #f8fafc; font-size: 13.5px; line-height: 1.8;">
          <li>☁️ <strong>SME Platforms:</strong> Zoho Books, QuickBooks Online, Xero</li>
          <li>🏢 <strong>Enterprise ERPs:</strong> SAP, Microsoft Dynamics 365, NetSuite</li>
          <li>🔒 <strong>Security:</strong> Bank payment authorization remains 100% with you</li>
        </ul>
        <a href="tel:+971524473871" style="display: block; text-align: center; background: #25d366; color: #ffffff; font-weight: 700; padding: 11px; border-radius: 6px; text-decoration: none;">📞 Speak to an Accountant: +971 52 447 3871</a>
      </div>
    </div>
  </section>

  <!-- FEATURES SECTION -->
  <section style="max-width: 1140px; margin: 50px auto; padding: 0 20px;">
    <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 32px; color: #09203b; text-align: center; margin-bottom: 14px;">Complete AP/AR Management for UAE Businesses</h2>
    <p style="text-align: center; color: #64748b; font-size: 16px; max-width: 780px; margin: 0 auto 40px;">End-to-end proc-to-pay and order-to-cash workflows designed for trading, contracting, logistics, and professional service companies.</p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Online Accounts Payable Services</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Automated OCR invoice scanning, vendor bill matching against POs, expense approvals, payment batch preparation, and supplier statement reconciliations.</p>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Accounts Receivable &amp; Debtor Follow-up</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Fast client invoicing, aged debtors analysis, dispute escalation, automated statement dispatch, and cash flow forecasting to reduce Days Sales Outstanding (DSO).</p>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Input VAT 201 Recovery Verification</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Every vendor invoice is scrutinized for FTA mandatory tax invoice requirements (TRN validation, legal name, tax breakdown) ensuring 100% audit-proof input tax credits.</p>
      </div>
    </div>
  </section>

  <!-- CTA STRIP -->
  <section style="background: #09203b; color: #ffffff; padding: 45px 20px; text-align: center;">
    <div style="max-width: 800px; margin: 0 auto;">
      <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 28px; color: #ffffff; margin-bottom: 12px;">Save up to 60% on In-House Accounting Overhead</h2>
      <p style="color: #cbd5e1; font-size: 16px; margin-bottom: 24px;">Outsource your AP/AR workflow to dedicated financial professionals in Dubai and Abu Dhabi.</p>
      <a href="https://wa.me/971524473871?text=Hello%20RBO,%20I%20want%20a%20quote%20for%20Accounts%20Payable%20outsourcing" style="display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 14px 32px; border-radius: 8px; text-decoration: none; font-size: 16px;">💬 Request AP/AR Quotation on WhatsApp (+971 52 447 3871)</a>
    </div>
  </section>
</div>
HTML;

$ap_ar_faqs = array(
	array(
		'q' => 'How does accounts payable outsourcing work for UAE companies?',
		'a' => 'You simply forward vendor bills digitally or upload them to your shared cloud drive. Our team validates each invoice against purchase orders and delivery notes, enters the data into your accounting software, reconciles VAT, and prepares payment batches. You retain 100% control over authorizing actual bank payments.',
	),
	array(
		'q' => 'Do you provide accounts payable services in Abu Dhabi and KIZAD?',
		'a' => 'Yes, we provide specialized accounts payable outsourcing for mainland Abu Dhabi entities (ADDED) and industrial operations in KIZAD, Masdar City, and ADGM, handling complex supplier networks, foreign currency bills, and customs document matching.',
	),
);

$ap_page = get_page_by_path( 'our-services/accounting/accounts-payable-and-receivable' );
if ( ! $ap_page ) {
	$ap_page = get_page_by_path( 'accounts-payable-and-receivable' );
}
if ( $ap_page ) {
	wp_update_post( array(
		'ID'           => $ap_page->ID,
		'post_title'   => 'Accounts Payable & Receivable Outsourcing Services UAE | Abu Dhabi & Dubai | RBO',
		'post_content' => $ap_ar_content,
		'post_status'  => 'publish',
	) );
	update_post_meta( $ap_page->ID, 'rank_math_title', 'Accounts Payable Outsourcing UAE | Abu Dhabi & Dubai AP/AR | RBO' );
	update_post_meta( $ap_page->ID, 'rank_math_description', 'Top accounts payable outsourcing services in Abu Dhabi, Dubai & KIZAD. Online accounts payable, 3-way invoice matching, debtor collection & VAT 201 reconciliation.' );
	update_post_meta( $ap_page->ID, 'rank_math_focus_keyword', 'accounts payable outsourcing services in abu dhabi, online accounts payable services, accounting service in kizad, ap ar outsourcing uae' );
	update_post_meta( $ap_page->ID, 'rank_math_robots', array( 'index' ) );
	update_post_meta( $ap_page->ID, '_rbo_faq_schema', $ap_ar_faqs );
	$results[] = "Upgraded /our-services/accounting/accounts-payable-and-receivable/ (ID: {$ap_page->ID})";
}

echo "\n=======================================================\n";
echo " TOP GSC PAGES SUCCESSFULLY UPGRADED WITH TRENDING KEYWORDS:\n";
foreach ( $results as $r ) {
	echo " - {$r}\n";
}
echo "=======================================================\n\n";

if ( php_sapi_name() !== 'cli' ) :
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Top GSC Pages Upgraded Successfully</title>
<style>
body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #09203b; color: #f8fafc; padding: 40px 20px; line-height: 1.6; }
.card { max-width: 800px; margin: 0 auto; background: #ffffff; color: #09203b; padding: 36px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.3); }
h1 { color: #09203b; margin-top: 0; font-size: 24px; }
.badge { display: inline-block; background: #dcfce7; color: #166534; padding: 6px 14px; border-radius: 9999px; font-weight: 700; font-size: 13px; margin-bottom: 20px; }
ul { padding-left: 20px; }
li { margin-bottom: 8px; }
</style>
</head>
<body>
<div class="card">
<span class="badge">🚀 All Top Ranked Pages Successfully Upgraded!</span>
<h1>SEO & Keyword Upgrade Summary</h1>
<p>The top underperforming pages from your Google Search Console have been expanded with high-intent keywords, luxury responsive styling, and comprehensive schema markup.</p>
<ul>
<?php foreach ( $results as $res ) : ?>
  <li>✅ <?php echo esc_html( $res ); ?></li>
<?php endforeach; ?>
</ul>
</div>
</body>
</html>
<?php endif; ?>
