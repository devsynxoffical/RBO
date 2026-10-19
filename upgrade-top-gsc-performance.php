<?php
/**
 * RBO Accounting — Master Upgrade Script for Top GSC Impression & Traffic Pages
 * 
 * Target Pages to Upgrade:
 * 1. Homepage (ID: 172, / & /?utm_source=google&utm_medium=organic&utm_campaign=gbp) -> 824 Total Impressions
 * 2. Management Reporting & Virtual CFO (ID: 3368, /our-services/virtual-cfo/management-reporting/) -> 95 Impressions
 * 3. About Us (ID: 175, /about-us/) -> 264 Impressions
 * 4. Our Services Master Hub (ID: 178, /our-services/) -> 163 Impressions
 * 5. FTA Records Amendment (ID: 2522, /our-services/vat-registration-filing/fta-records-amendment/) -> High Intent
 * 
 * Execution:
 * - Local CLI: php upgrade-top-gsc-performance.php
 * - Live cPanel: Upload to public_html/ and visit https://www.rboaccounting.ae/upgrade-top-gsc-performance.php
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
// 1. PAGE: MANAGEMENT REPORTING & VIRTUAL CFO (/our-services/virtual-cfo/management-reporting/)
// =========================================================================
$mr_content = <<<HTML
<div class="rbo-elementor-service-wrapper">
  <!-- HERO SECTION -->
  <section class="rbo-hero-section" style="background: linear-gradient(135deg, rgba(9, 32, 59, 0.98) 0%, rgba(13, 43, 79, 0.92) 100%); padding: 65px 20px 75px; color: #ffffff;">
    <div style="max-width: 1140px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 35px;">
      <div style="flex: 1 1 580px;">
        <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(232, 184, 75, 0.15); color: #e8b84b; border: 1px solid rgba(232, 184, 75, 0.4); padding: 6px 16px; border-radius: 9999px; font-size: 13px; font-weight: 700; margin-bottom: 18px;">
          📊 Strategic Financial Intelligence &amp; Executive KPI Dashboards
        </div>
        <h1 style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; color: #ffffff; font-weight: 800; line-height: 1.25; margin: 0 0 16px;">
          Management Reporting Services in <span style="color: #e8b84b;">Dubai &amp; UAE</span> | Virtual CFO &amp; MIS Analytics
        </h1>
        <p style="font-size: 16.5px; color: #cbd5e1; line-height: 1.75; margin-bottom: 22px;">
          Empower your executive leadership with actionable monthly management accounts, 13-week rolling cash flow forecasts, financial variance analysis, and customized board reporting packs. We bridge the gap between basic bookkeeping and high-level CFO strategy across Dubai, Abu Dhabi, and the GCC.
        </p>
        <div style="display: flex; flex-wrap: wrap; gap: 14px; margin-bottom: 24px;">
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> Monthly Board Packs &amp; P&amp;L Analysis</div>
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> 13-Week Cash Flow Projections</div>
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> Cloud BI Dashboards (Zoho, Xero, PowerBI)</div>
        </div>
        <div>
          <a href="https://wa.me/971524473871?text=Hello%20RBO,%20I%20am%20interested%20in%20Management%20Reporting%20and%20Virtual%20CFO%20Services" style="display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-size: 15px; margin-right: 12px;">💬 Free Financial Consultation (WhatsApp)</a>
          <a href="{$site_url}/contact-us/" style="display: inline-block; background: transparent; color: #ffffff; border: 2px solid #ffffff; font-weight: 600; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-size: 15px;">Book CFO Review</a>
        </div>
      </div>
      <div style="flex: 0 1 380px; background: rgba(13, 27, 42, 0.95); border: 1px solid rgba(232, 184, 75, 0.35); padding: 28px 24px; border-radius: 14px; color: #ffffff;">
        <h3 style="color: #e8b84b; margin: 0 0 10px; font-size: 20px; font-weight: 700;">Executive Deliverables</h3>
        <p style="color: #cbd5e1; font-size: 14px; margin-bottom: 16px;">Delivered every month by certified Chartered Accountants &amp; Virtual CFOs.</p>
        <ul style="list-style: none; padding: 0; margin: 0 0 18px; color: #f8fafc; font-size: 13.5px; line-height: 1.8;">
          <li>📈 <strong>Monthly MIS Pack:</strong> P&amp;L, Balance Sheet &amp; Cash Flow</li>
          <li>🎯 <strong>Budget vs. Actual:</strong> Line-by-line Variance Breakdown</li>
          <li>⏳ <strong>Working Capital:</strong> DSO, DPO &amp; Inventory Turns</li>
          <li>⚖️ <strong>Tax Reconciliation:</strong> Form CT201 &amp; VAT201 Alignment</li>
          <li>📞 <strong>Hotline:</strong> +971 52 447 3871</li>
        </ul>
        <a href="tel:+971524473871" style="display: block; text-align: center; background: #25d366; color: #ffffff; font-weight: 700; padding: 11px; border-radius: 6px; text-decoration: none;">📞 Direct Call: +971 52 447 3871</a>
      </div>
    </div>
  </section>

  <!-- VALUE PILLARS SECTION -->
  <section style="max-width: 1140px; margin: 55px auto; padding: 0 20px;">
    <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 32px; color: #09203b; text-align: center; margin-bottom: 12px;">The 5 Pillars of RBO Management Reporting</h2>
    <p style="text-align: center; color: #64748b; font-size: 16px; max-width: 800px; margin: 0 auto 40px;">Standard bookkeeping looks backward; our Virtual CFO management reporting looks forward, giving business owners the clarity to scale profitably and avoid cash crunches.</p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <div style="font-size: 28px; margin-bottom: 12px;">📋</div>
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Executive Board Packs &amp; Monthly Accounts</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Detailed accrual-based profit and loss statement, comparative balance sheet, statement of changes in equity, and segment profitability by product, branch, or division.</p>
        <a href="{$site_url}/our-services/accounting/bookkeeping-and-accounting/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Explore Bookkeeping Integration →</a>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <div style="font-size: 28px; margin-bottom: 12px;">🌊</div>
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">13-Week Rolling Cash Flow Forecasting</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Real-time liquidity forecasting preventing unexpected cash shortfalls. We model debtor collections, supplier payments, VAT settlements, and payroll WPS outlays with precision.</p>
        <a href="{$site_url}/our-services/accounting/accounts-payable-and-receivable/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">View AP/AR Cash Flow Services →</a>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <div style="font-size: 28px; margin-bottom: 12px;">🎯</div>
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Budget vs. Actual Variance Analysis</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Identify cost overruns before they erode your net margin. Line-by-line operational expense auditing and revenue trend benchmarking against quarterly forecasts.</p>
        <a href="{$site_url}/our-services/virtual-cfo/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Learn About Virtual CFO Advisory →</a>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <div style="font-size: 28px; margin-bottom: 12px;">🖥️</div>
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Cloud ERP &amp; Interactive KPI Dashboards</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Connect your Zoho Books, Xero, QuickBooks, or SAP into automated visual dashboards showing gross margins, customer acquisition cost (CAC), LTV, and EBITDA in real time.</p>
        <a href="{$site_url}/contact-us/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Request Custom Dashboard Demo →</a>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <div style="font-size: 28px; margin-bottom: 12px;">⚖️</div>
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Corporate Tax &amp; VAT Return Alignment</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Avoid FTA audit discrepancies. We reconcile monthly accounting profits with annual Form CT201 taxable income and quarterly Form VAT201 turnover figures automatically.</p>
        <a href="{$site_url}/uae-corporate-tax-returns-ct-registration-guide-2026/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Read Corporate Tax Return Guide →</a>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <div style="font-size: 28px; margin-bottom: 12px;">🏛️</div>
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Banking &amp; Investor Due Diligence Packs</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Pre-formatted financial disclosures, debt service coverage ratio (DSCR) calculations, and audited trial balances ready for UAE corporate bank credit lines and venture investors.</p>
        <a href="{$site_url}/contact-us/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Speak to Our Advisory Desk →</a>
      </div>
    </div>
  </section>

  <!-- COMPARISON TABLE SECTION -->
  <section style="background: #f8fafc; padding: 50px 20px; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">
    <div style="max-width: 1140px; margin: 0 auto;">
      <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 30px; color: #09203b; text-align: center; margin-bottom: 12px;">Comparing Financial Intelligence Models</h2>
      <p style="text-align: center; color: #64748b; font-size: 15.5px; max-width: 750px; margin: 0 auto 35px;">Why leading UAE enterprises choose RBO Virtual CFO &amp; Management Reporting over full-time hiring.</p>

      <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; background: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 16px rgba(0,0,0,0.03);">
          <thead>
            <tr style="background: #09203b; color: #ffffff;">
              <th style="padding: 16px; text-align: left; font-size: 15px;">Criteria</th>
              <th style="padding: 16px; text-align: left; font-size: 15px;">Basic In-House Bookkeeper</th>
              <th style="padding: 16px; text-align: left; font-size: 15px;">Full-Time UAE In-House CFO</th>
              <th style="padding: 16px; text-align: left; font-size: 15px; background: #0b3a6e; color: #e8b84b;">RBO Virtual CFO &amp; MIS Service</th>
            </tr>
          </thead>
          <tbody>
            <tr style="border-bottom: 1px solid #e2e8f0;">
              <td style="padding: 14px 16px; font-weight: 700; color: #09203b;">Annual Cost</td>
              <td style="padding: 14px 16px; color: #475569;">AED 60,000 – 100,000 + Visa/WPS</td>
              <td style="padding: 14px 16px; color: #475569;">AED 350,000 – 600,000 + Benefits</td>
              <td style="padding: 14px 16px; font-weight: 700; color: #166534; background: #f0fdf4;">Fraction of full-time cost (Fixed Monthly)</td>
            </tr>
            <tr style="border-bottom: 1px solid #e2e8f0;">
              <td style="padding: 14px 16px; font-weight: 700; color: #09203b;">Strategic Depth</td>
              <td style="padding: 14px 16px; color: #475569;">Historical data entry only</td>
              <td style="padding: 14px 16px; color: #475569;">Strategic, but single-person bottleneck</td>
              <td style="padding: 14px 16px; font-weight: 700; color: #0b3a6e; background: #f0fdf4;">Multidisciplinary team (CFO, CPA, Tax Agent)</td>
            </tr>
            <tr style="border-bottom: 1px solid #e2e8f0;">
              <td style="padding: 14px 16px; font-weight: 700; color: #09203b;">Tax &amp; Audit Integration</td>
              <td style="padding: 14px 16px; color: #475569;">Requires outside tax consultant</td>
              <td style="padding: 14px 16px; color: #475569;">Dependent on outside auditor</td>
              <td style="padding: 14px 16px; font-weight: 700; color: #166534; background: #f0fdf4;">Direct FTA Tax Agent alignment &amp; audit sign-off</td>
            </tr>
            <tr>
              <td style="padding: 14px 16px; font-weight: 700; color: #09203b;">Software &amp; Dashboards</td>
              <td style="padding: 14px 16px; color: #475569;">Basic spreadsheets</td>
              <td style="padding: 14px 16px; color: #475569;">Requires custom BI licensing</td>
              <td style="padding: 14px 16px; font-weight: 700; color: #0b3a6e; background: #f0fdf4;">Fully configured cloud BI dashboards included</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- CTA STRIP -->
  <section style="background: linear-gradient(135deg, #09203b 0%, #1e3a8a 100%); color: #ffffff; padding: 45px 20px; text-align: center;">
    <div style="max-width: 850px; margin: 0 auto;">
      <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 30px; color: #ffffff; margin-bottom: 14px;">Gain Complete Financial Visibility Today</h2>
      <p style="color: #cbd5e1; font-size: 16px; margin-bottom: 24px;">Schedule a confidential diagnostic session with our senior Virtual CFOs. We will review your current chart of accounts, P&amp;L trends, and cash flow bottlenecks free of charge.</p>
      <a href="https://wa.me/971524473871?text=Hello%20RBO,%20I%20would%20like%20to%20schedule%20a%20Management%20Reporting%20Diagnostic" style="display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 14px 32px; border-radius: 8px; text-decoration: none; font-size: 16px;">💬 Request Free CFO Diagnostic on WhatsApp (+971 52 447 3871)</a>
    </div>
  </section>
</div>
HTML;

$mr_faqs = array(
	array(
		'q' => 'What is included in monthly management reporting services in UAE?',
		'a' => 'Our monthly management reporting package includes accrual-based profit and loss statements, comparative balance sheets, 13-week rolling cash flow forecasts, budget vs. actual variance analysis, key operational KPI ratios, and tax reconciliations aligned with UAE Corporate Tax (Form CT201) and VAT (Form VAT201).',
	),
	array(
		'q' => 'How does management reporting differ from standard bookkeeping?',
		'a' => 'Standard bookkeeping records historical invoices and receipts for compliance. Management reporting analyzes these figures to identify profit drivers, cost leaks, customer acquisition economics, and cash burn rates, providing business owners with predictive data to make strategic growth decisions.',
	),
	array(
		'q' => 'Can you connect with our existing software like Zoho Books, Xero, or QuickBooks?',
		'a' => 'Yes. RBO connects seamlessly with leading cloud accounting platforms including Zoho Books, Xero, QuickBooks Online, SAP Business One, and Tally, building automated real-time KPI dashboards without requiring you to switch accounting software.',
	),
	array(
		'q' => 'How frequently are management reporting packs delivered?',
		'a' => 'Management reports are typically compiled and delivered within 5 to 10 business days following the close of each calendar month, followed by a dedicated strategy review call with your assigned Virtual CFO.',
	),
	array(
		'q' => 'Are management accounts accepted by UAE banks for commercial loans and credit lines?',
		'a' => 'Yes. UAE commercial banks, trade finance institutions, and venture capital investors require professionally formatted monthly management accounts and cash flow forecasts to assess creditworthiness and monitor ongoing loan covenants.',
	),
);

// Execute Update for Management Reporting
$mr_page = get_page_by_path( 'our-services/virtual-cfo/management-reporting' );
if ( ! $mr_page ) {
	$mr_page = get_page_by_path( 'management-reporting' );
}
if ( $mr_page ) {
	wp_update_post( array(
		'ID'           => $mr_page->ID,
		'post_title'   => 'Management Reporting Services UAE | MIS Reports & Virtual CFO KPI Dashboards | RBO',
		'post_content' => $mr_content,
		'post_status'  => 'publish',
	) );
	update_post_meta( $mr_page->ID, 'rank_math_title', 'Management Reporting Services UAE | Virtual CFO & MIS Reports | RBO' );
	update_post_meta( $mr_page->ID, 'rank_math_description', 'Top management reporting services in Dubai & UAE. Executive board packs, 13-week cash flow forecasts, budget variance analysis & cloud KPI dashboards by certified CFOs.' );
	update_post_meta( $mr_page->ID, 'rank_math_focus_keyword', 'management reporting services in dubai uae, virtual cfo management reporting uae, mis reporting services dubai, financial management reports uae, cash flow forecasting dubai' );
	update_post_meta( $mr_page->ID, 'rank_math_robots', array( 'index' ) );
	update_post_meta( $mr_page->ID, '_rbo_faq_schema', $mr_faqs );
	$results[] = "Upgraded /our-services/virtual-cfo/management-reporting/ (ID: {$mr_page->ID})";
}


// =========================================================================
// 2. PAGE: ABOUT US (/about-us/)
// =========================================================================
$about_content = <<<HTML
<div class="rbo-elementor-service-wrapper">
  <!-- HERO SECTION -->
  <section class="rbo-hero-section" style="background: linear-gradient(135deg, rgba(9, 32, 59, 0.98) 0%, rgba(13, 43, 79, 0.92) 100%); padding: 65px 20px 75px; color: #ffffff;">
    <div style="max-width: 1140px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 35px;">
      <div style="flex: 1 1 580px;">
        <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(232, 184, 75, 0.15); color: #e8b84b; border: 1px solid rgba(232, 184, 75, 0.4); padding: 6px 16px; border-radius: 9999px; font-size: 13px; font-weight: 700; margin-bottom: 18px;">
          🏛️ Federal Tax Authority (FTA) Certified Tax Agents &amp; Chartered Accountants
        </div>
        <h1 style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; color: #ffffff; font-weight: 800; line-height: 1.25; margin: 0 0 16px;">
          About RBO Accounting Services FZE | <span style="color: #e8b84b;">UAE's Trusted Tax &amp; Advisory Firm</span>
        </h1>
        <p style="font-size: 16.5px; color: #cbd5e1; line-height: 1.75; margin-bottom: 22px;">
          RBO Accounting Services FZE is a premier UAE accounting, corporate tax, VAT, and CFO advisory firm serving over 500 businesses across Dubai, Abu Dhabi, Sharjah, Ajman, and all seven emirates. Combining rigorous IFRS audit standards with proactive GCC tax strategy, we deliver 100% compliant financial operations with zero-penalty guarantees.
        </p>
        <div style="display: flex; flex-wrap: wrap; gap: 14px; margin-bottom: 24px;">
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> FTA-Registered Tax Agency</div>
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> 15+ Years UAE Market Leadership</div>
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> Certified ACCA, CA &amp; CPA Specialists</div>
        </div>
        <div>
          <a href="https://wa.me/971524473871?text=Hello%20RBO,%20I%20would%20like%20to%20learn%20more%20about%20your%20services" style="display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-size: 15px; margin-right: 12px;">💬 Meet Our Partners (WhatsApp)</a>
          <a href="{$site_url}/contact-us/" style="display: inline-block; background: transparent; color: #ffffff; border: 2px solid #ffffff; font-weight: 600; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-size: 15px;">Schedule Office Meeting</a>
        </div>
      </div>
      <div style="flex: 0 1 380px; background: rgba(13, 27, 42, 0.95); border: 1px solid rgba(232, 184, 75, 0.35); padding: 28px 24px; border-radius: 14px; color: #ffffff;">
        <h3 style="color: #e8b84b; margin: 0 0 10px; font-size: 20px; font-weight: 700;">Practice Credentials</h3>
        <p style="color: #cbd5e1; font-size: 14px; margin-bottom: 16px;">Registered, regulated, and verified across UAE federal jurisdictions.</p>
        <ul style="list-style: none; padding: 0; margin: 0 0 18px; color: #f8fafc; font-size: 13.5px; line-height: 1.8;">
          <li>⚖️ <strong>Regulatory Status:</strong> FTA-Approved Tax Agency</li>
          <li>🌐 <strong>Geographic Reach:</strong> All 7 Emirates &amp; 45+ Free Zones</li>
          <li>📊 <strong>Specializations:</strong> CT, VAT, Bookkeeping, CFO Advisory</li>
          <li>👥 <strong>Languages:</strong> English, Arabic, Urdu, Hindi</li>
          <li>📞 <strong>Direct Line:</strong> +971 52 447 3871</li>
        </ul>
        <a href="tel:+971524473871" style="display: block; text-align: center; background: #25d366; color: #ffffff; font-weight: 700; padding: 11px; border-radius: 6px; text-decoration: none;">📞 Direct Call: +971 52 447 3871</a>
      </div>
    </div>
  </section>

  <!-- CORE VALUES & E-E-A-T SECTION -->
  <section style="max-width: 1140px; margin: 55px auto; padding: 0 20px;">
    <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 32px; color: #09203b; text-align: center; margin-bottom: 12px;">Why Leading UAE Businesses Choose RBO</h2>
    <p style="text-align: center; color: #64748b; font-size: 16px; max-width: 800px; margin: 0 auto 40px;">Our four foundational commitments have made us one of the fastest-growing professional financial advisory firms in the United Arab Emirates.</p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 24px;">
      <div style="background: #ffffff; padding: 26px 20px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04); text-align: center;">
        <div style="font-size: 32px; margin-bottom: 12px;">🛡️</div>
        <h3 style="font-size: 19px; color: #09203b; margin: 0 0 10px;">Zero-Penalty Guarantee</h3>
        <p style="color: #475569; font-size: 14px; line-height: 1.6;">We safeguard your company against costly FTA late filing and non-compliance fines through automated tracking of every tax deadline.</p>
      </div>

      <div style="background: #ffffff; padding: 26px 20px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04); text-align: center;">
        <div style="font-size: 32px; margin-bottom: 12px;">📜</div>
        <h3 style="font-size: 19px; color: #09203b; margin: 0 0 10px;">FTA-Certified Tax Agents</h3>
        <p style="color: #475569; font-size: 14px; line-height: 1.6;">Direct statutory representation before the Federal Tax Authority for tax registrations, return filings, refund audits, and formal reconsiderations.</p>
      </div>

      <div style="background: #ffffff; padding: 26px 20px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04); text-align: center;">
        <div style="font-size: 32px; margin-bottom: 12px;">⚡</div>
        <h3 style="font-size: 19px; color: #09203b; margin: 0 0 10px;">Cloud ERP Technology</h3>
        <p style="color: #475569; font-size: 14px; line-height: 1.6;">Certified implementers of Zoho Books, Xero, QuickBooks Online, and SAP, giving you 24/7 mobile access to your financial health.</p>
      </div>

      <div style="background: #ffffff; padding: 26px 20px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04); text-align: center;">
        <div style="font-size: 32px; margin-bottom: 12px;">💎</div>
        <h3 style="font-size: 19px; color: #09203b; margin: 0 0 10px;">Transparent Fixed Fees</h3>
        <p style="color: #475569; font-size: 14px; line-height: 1.6;">No surprise billable hours. All monthly bookkeeping, tax filing, and advisory packages are fixed, predictable, and tailored to your transaction volume.</p>
      </div>
    </div>
  </section>

  <!-- CTA STRIP -->
  <section style="background: #09203b; color: #ffffff; padding: 45px 20px; text-align: center;">
    <div style="max-width: 800px; margin: 0 auto;">
      <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 28px; color: #ffffff; margin-bottom: 12px;">Partner with an FTA-Approved Firm You Can Trust</h2>
      <p style="color: #cbd5e1; font-size: 16px; margin-bottom: 24px;">Let our certified chartered accountants take the stress out of UAE Corporate Tax, VAT, and bookkeeping.</p>
      <a href="https://wa.me/971524473871?text=Hello%20RBO,%20I%20want%20to%20discuss%20partnering%20with%20your%20firm" style="display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 14px 32px; border-radius: 8px; text-decoration: none; font-size: 16px;">💬 Chat with Our Senior Partners (+971 52 447 3871)</a>
    </div>
  </section>
</div>
HTML;

$about_faqs = array(
	array(
		'q' => 'Is RBO Accounting an FTA-approved tax agency in UAE?',
		'a' => 'Yes. RBO Accounting Services FZE is an official Federal Tax Authority (FTA) registered tax agency staffed by licensed tax agents and chartered accountants (ACCA, CPA, CA), fully authorized to represent clients in all EmaraTax proceedings.',
	),
	array(
		'q' => 'Which emirates and free zones does RBO Accounting cover?',
		'a' => 'We serve businesses across all seven emirates (Dubai, Abu Dhabi, Sharjah, Ajman, Ras Al Khaimah, Fujairah, and Umm Al Quwain), as well as major free zones including DMCC, JAFZA, DAFZA, AFZA, IFZA, ADGM, and KIZAD.',
	),
	array(
		'q' => 'What industries does RBO Accounting specialize in?',
		'a' => 'We have extensive industry specializations in commercial real estate and property development, general contracting and engineering consultancies, general trading, logistics, healthcare, hospitality, professional services, and high-growth e-commerce ventures.',
	),
);

// Execute Update for About Us
$about_page = get_page_by_path( 'about-us' );
if ( $about_page ) {
	wp_update_post( array(
		'ID'           => $about_page->ID,
		'post_title'   => 'About RBO Accounting Services FZE | FTA-Approved Tax Agents & Chartered Accountants in UAE',
		'post_content' => $about_content,
		'post_status'  => 'publish',
	) );
	update_post_meta( $about_page->ID, 'rank_math_title', 'About RBO Accounting Services | FTA Approved Tax Firm UAE' );
	update_post_meta( $about_page->ID, 'rank_math_description', 'About RBO Accounting Services FZE: Premier FTA-approved tax agency, chartered accountants, and CFO advisors serving 500+ businesses across Dubai, Abu Dhabi & UAE.' );
	update_post_meta( $about_page->ID, 'rank_math_focus_keyword', 'accounting firm in dubai about rbo, fta approved tax agents in uae, chartered accountants uae, rbo accounting services fze' );
	update_post_meta( $about_page->ID, 'rank_math_robots', array( 'index' ) );
	update_post_meta( $about_page->ID, '_rbo_faq_schema', $about_faqs );
	$results[] = "Upgraded /about-us/ (ID: {$about_page->ID})";
}


// =========================================================================
// 3. PAGE: OUR SERVICES MASTER HUB (/our-services/)
// =========================================================================
$services_content = <<<HTML
<div class="rbo-elementor-service-wrapper">
  <!-- HERO SECTION -->
  <section class="rbo-hero-section" style="background: linear-gradient(135deg, rgba(9, 32, 59, 0.98) 0%, rgba(13, 43, 79, 0.92) 100%); padding: 65px 20px 75px; color: #ffffff;">
    <div style="max-width: 1140px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 35px;">
      <div style="flex: 1 1 580px;">
        <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(232, 184, 75, 0.15); color: #e8b84b; border: 1px solid rgba(232, 184, 75, 0.4); padding: 6px 16px; border-radius: 9999px; font-size: 13px; font-weight: 700; margin-bottom: 18px;">
          💼 Complete Corporate Tax, VAT, Accounting &amp; CFO Solutions
        </div>
        <h1 style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; color: #ffffff; font-weight: 800; line-height: 1.25; margin: 0 0 16px;">
          Accounting, Tax &amp; Financial Advisory Services in <span style="color: #e8b84b;">UAE</span>
        </h1>
        <p style="font-size: 16.5px; color: #cbd5e1; line-height: 1.75; margin-bottom: 22px;">
          From mandatory Corporate Tax return filing (Form CT201) and EmaraTax VAT refunds to outsourced accounts payable and Virtual CFO management reporting, RBO delivers comprehensive, audit-proof financial support for mainland and free zone enterprises.
        </p>
        <div style="display: flex; flex-wrap: wrap; gap: 14px; margin-bottom: 24px;">
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> 100% FTA Compliance Guarantee</div>
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> Fixed Monthly Retainers</div>
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> Dedicated Senior Financial Controllers</div>
        </div>
        <div>
          <a href="https://wa.me/971524473871?text=Hello%20RBO,%20I%20would%20like%20a%20tailored%20service%20proposal" style="display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-size: 15px; margin-right: 12px;">💬 Get Tailored Service Proposal</a>
          <a href="{$site_url}/contact-us/" style="display: inline-block; background: transparent; color: #ffffff; border: 2px solid #ffffff; font-weight: 600; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-size: 15px;">Book Consultation</a>
        </div>
      </div>
      <div style="flex: 0 1 380px; background: rgba(13, 27, 42, 0.95); border: 1px solid rgba(232, 184, 75, 0.35); padding: 28px 24px; border-radius: 14px; color: #ffffff;">
        <h3 style="color: #e8b84b; margin: 0 0 10px; font-size: 20px; font-weight: 700;">Practice Pillars</h3>
        <p style="color: #cbd5e1; font-size: 14px; margin-bottom: 16px;">Comprehensive financial &amp; tax solutions under one unified roof.</p>
        <ul style="list-style: none; padding: 0; margin: 0 0 18px; color: #f8fafc; font-size: 13.5px; line-height: 1.8;">
          <li>⚖️ <strong>Corporate Tax:</strong> Form CT201, CT Registration &amp; SBR</li>
          <li>📑 <strong>VAT Services:</strong> VAT201 Returns, Refunds &amp; Appeals</li>
          <li>📚 <strong>Bookkeeping:</strong> AP/AR BPO, Payroll WPS &amp; Bank Recs</li>
          <li>📊 <strong>Virtual CFO:</strong> MIS Reporting &amp; Board Packs</li>
          <li>🏢 <strong>Business Setup:</strong> Mainland DED/ADDED &amp; Free Zones</li>
        </ul>
        <a href="tel:+971524473871" style="display: block; text-align: center; background: #25d366; color: #ffffff; font-weight: 700; padding: 11px; border-radius: 6px; text-decoration: none;">📞 Direct Call: +971 52 447 3871</a>
      </div>
    </div>
  </section>

  <!-- 6 CORE PILLARS GRID -->
  <section style="max-width: 1140px; margin: 55px auto; padding: 0 20px;">
    <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 32px; color: #09203b; text-align: center; margin-bottom: 12px;">Our Core Service Divisions</h2>
    <p style="text-align: center; color: #64748b; font-size: 16px; max-width: 800px; margin: 0 auto 40px;">Explore our dedicated financial and regulatory practice areas tailored for SMEs and multinational corporations across the UAE.</p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <div style="font-size: 28px; margin-bottom: 12px;">⚖️</div>
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Corporate Tax Services</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Mandatory Corporate Tax registration, annual Form CT201 filing, Small Business Relief (SBR) election for turnover up to AED 3M, and Qualifying Free Zone Person (0% QFZP) structuring.</p>
        <a href="{$site_url}/uae-corporate-tax-returns-ct-registration-guide-2026/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Learn About Corporate Tax →</a>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <div style="font-size: 28px; margin-bottom: 12px;">📑</div>
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">VAT Registration, Filing &amp; Refunds</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Mandatory and voluntary VAT registration, quarterly Form VAT201 return submissions, cash VAT refund claims on Form VAT311 for commercial landlords &amp; contractors, and penalty reconsiderations.</p>
        <a href="{$site_url}/our-services/vat-registration-filing/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Explore VAT Services →</a>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <div style="font-size: 28px; margin-bottom: 12px;">📚</div>
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Bookkeeping &amp; AP/AR Outsourcing</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Daily ledger maintenance on Zoho Books, Xero, or QuickBooks, 3-way vendor bill matching, accounts receivable collections follow-up, and automated bank reconciliations.</p>
        <a href="{$site_url}/our-services/accounting/bookkeeping-and-accounting/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Explore Bookkeeping Solutions →</a>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <div style="font-size: 28px; margin-bottom: 12px;">📊</div>
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Virtual CFO &amp; Management Reporting</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Executive monthly MIS packs, 13-week rolling cash flow forecasts, financial variance analysis, and strategic board advisory without the overhead of an executive hire.</p>
        <a href="{$site_url}/our-services/virtual-cfo/management-reporting/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Explore Virtual CFO Services →</a>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <div style="font-size: 28px; margin-bottom: 12px;">🔄</div>
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">FTA Records Amendment &amp; Compliance</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Updating company trade licences, partner changes, registered addresses, and corporate bank IBAN details on EmaraTax within the mandatory 20 business day window to avoid AED 5,000+ fines.</p>
        <a href="{$site_url}/our-services/vat-registration-filing/fta-records-amendment/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">View Records Amendment Guide →</a>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <div style="font-size: 28px; margin-bottom: 12px;">🏢</div>
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Business Setup &amp; Licensing Services</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">End-to-end company incorporation for mainland Dubai (DET) &amp; Abu Dhabi (ADDED), as well as AFZA, IFZA, DMCC, and RAKEZ free zones with corporate banking assistance.</p>
        <a href="{$site_url}/contact-us/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Inquire About Company Formation →</a>
      </div>
    </div>
  </section>

  <!-- CTA STRIP -->
  <section style="background: #09203b; color: #ffffff; padding: 45px 20px; text-align: center;">
    <div style="max-width: 800px; margin: 0 auto;">
      <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 28px; color: #ffffff; margin-bottom: 12px;">Ready to Optimize Your UAE Financial Architecture?</h2>
      <p style="color: #cbd5e1; font-size: 16px; margin-bottom: 24px;">Connect with an FTA-approved tax agent and senior financial controller today.</p>
      <a href="https://wa.me/971524473871?text=Hello%20RBO,%20I%20need%20a%20comprehensive%20financial%20services%20quotation" style="display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 14px 32px; border-radius: 8px; text-decoration: none; font-size: 16px;">💬 Request Free Services Quotation (+971 52 447 3871)</a>
    </div>
  </section>
</div>
HTML;

$services_faqs = array(
	array(
		'q' => 'Can RBO Accounting handle both Corporate Tax and VAT for my business?',
		'a' => 'Yes. As an FTA-registered tax agency, we manage your complete tax lifecycle, ensuring seamless reconciliation between your quarterly VAT Returns (Form VAT201) and your annual Corporate Tax Returns (Form CT201) to eliminate cross-matching audit penalties.',
	),
	array(
		'q' => 'What is the pricing model for your accounting and tax packages?',
		'a' => 'We offer transparent, fixed monthly retainers based on your transaction volume, legal entity structure (Mainland vs Free Zone), and reporting requirements. There are no hidden fees or surprise billings.',
	),
	array(
		'q' => 'Do you provide audit representation if the FTA initiates a tax audit?',
		'a' => 'Yes. Our licensed tax agents prepare your audit dossier, reconcile general ledgers with tax invoices, draft formal legal responses, and liaise directly with FTA tax inspectors to defend your tax positions.',
	),
);

// Execute Update for Our Services Hub
$services_page = get_page_by_path( 'our-services' );
if ( $services_page ) {
	wp_update_post( array(
		'ID'           => $services_page->ID,
		'post_title'   => 'Accounting, Tax & Financial Advisory Services UAE | Corporate Tax & VAT | RBO',
		'post_content' => $services_content,
		'post_status'  => 'publish',
	) );
	update_post_meta( $services_page->ID, 'rank_math_title', 'Accounting, Tax & Audit Services UAE | RBO Accounting' );
	update_post_meta( $services_page->ID, 'rank_math_description', 'Full-suite accounting, Corporate Tax (Form CT201), VAT return filing, bookkeeping, AP/AR outsourcing & Virtual CFO services for UAE businesses by FTA tax agents.' );
	update_post_meta( $services_page->ID, 'rank_math_focus_keyword', 'accounting services uae, corporate tax services dubai, vat consultant uae, bookkeeping outsourcing dubai, cfo services uae' );
	update_post_meta( $services_page->ID, 'rank_math_robots', array( 'index' ) );
	update_post_meta( $services_page->ID, '_rbo_faq_schema', $services_faqs );
	$results[] = "Upgraded /our-services/ (ID: {$services_page->ID})";
}


// =========================================================================
// 4. PAGE: FTA RECORDS AMENDMENT (/our-services/vat-registration-filing/fta-records-amendment/)
// =========================================================================
$fta_amend_content = <<<HTML
<div class="rbo-elementor-service-wrapper">
  <!-- HERO SECTION -->
  <section class="rbo-hero-section" style="background: linear-gradient(135deg, rgba(9, 32, 59, 0.98) 0%, rgba(13, 43, 79, 0.92) 100%); padding: 65px 20px 75px; color: #ffffff;">
    <div style="max-width: 1140px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 35px;">
      <div style="flex: 1 1 580px;">
        <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(239, 68, 68, 0.15); color: #fca5a5; border: 1px solid rgba(239, 68, 68, 0.4); padding: 6px 16px; border-radius: 9999px; font-size: 13px; font-weight: 700; margin-bottom: 18px;">
          ⚠️ Strict 20 Business Day Statutory Deadline
        </div>
        <h1 style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; color: #ffffff; font-weight: 800; line-height: 1.25; margin: 0 0 16px;">
          FTA Records Amendment UAE | <span style="color: #e8b84b;">Update EmaraTax Licence &amp; Bank Details</span>
        </h1>
        <p style="font-size: 16.5px; color: #cbd5e1; line-height: 1.75; margin-bottom: 22px;">
          Renewed your trade licence? Changed authorized signatories, company address, or corporate bank accounts? Under UAE Tax Procedures Law, failure to notify the Federal Tax Authority within <strong>20 business days</strong> triggers mandatory administrative penalties of up to <strong>AED 5,000 to AED 15,000</strong>. RBO handles fast, accurate EmaraTax amendments with guaranteed approval.
        </p>
        <div style="display: flex; flex-wrap: wrap; gap: 14px; margin-bottom: 24px;">
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> Same-Day EmaraTax Submission</div>
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> Trade Licence, Bank &amp; Address Updates</div>
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> Complete Penalty Protection</div>
        </div>
        <div>
          <a href="https://wa.me/971524473871?text=Hello%20RBO,%20I%20need%20urgent%20assistance%20with%20an%20FTA%20Records%20Amendment" style="display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-size: 15px; margin-right: 12px;">💬 Fast-Track Amendment on WhatsApp</a>
          <a href="{$site_url}/contact-us/" style="display: inline-block; background: transparent; color: #ffffff; border: 2px solid #ffffff; font-weight: 600; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-size: 15px;">Book Consultation</a>
        </div>
      </div>
      <div style="flex: 0 1 380px; background: rgba(13, 27, 42, 0.95); border: 1px solid rgba(232, 184, 75, 0.35); padding: 28px 24px; border-radius: 14px; color: #ffffff;">
        <h3 style="color: #e8b84b; margin: 0 0 10px; font-size: 20px; font-weight: 700;">Statutory Penalties</h3>
        <p style="color: #cbd5e1; font-size: 14px; margin-bottom: 16px;">Cabinet Decision No. 75 of 2023 on Tax Violations:</p>
        <ul style="list-style: none; padding: 0; margin: 0 0 18px; color: #f8fafc; font-size: 13.5px; line-height: 1.8;">
          <li>🚨 <strong>First Occurrence:</strong> AED 1,000 late notice fine</li>
          <li>🚨 <strong>Repeat Violation:</strong> AED 5,000 administrative fine</li>
          <li>🚨 <strong>Bank Account Changes:</strong> Delays VAT refund payouts</li>
          <li>⏱️ <strong>Strict Window:</strong> 20 business days from change</li>
          <li>📞 <strong>Hotline:</strong> +971 52 447 3871</li>
        </ul>
        <a href="tel:+971524473871" style="display: block; text-align: center; background: #25d366; color: #ffffff; font-weight: 700; padding: 11px; border-radius: 6px; text-decoration: none;">📞 Direct Call: +971 52 447 3871</a>
      </div>
    </div>
  </section>

  <!-- AMENDMENT CATEGORIES -->
  <section style="max-width: 1140px; margin: 55px auto; padding: 0 20px;">
    <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 32px; color: #09203b; text-align: center; margin-bottom: 12px;">Mandatory Changes That Require FTA Notification</h2>
    <p style="text-align: center; color: #64748b; font-size: 16px; max-width: 800px; margin: 0 auto 40px;">Any modification recorded with your licensing authority (DED, ADDED, DMCC, JAFZA, etc.) must be reflected on the EmaraTax portal within 20 business days.</p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">1. Trade Licence Renewal &amp; Details</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6;">Updating your renewed trade licence expiry date, added commercial activities, capital changes, or business name modifications to keep your TRN in active standing.</p>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">2. Authorized Signatory &amp; Partners</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6;">Changes in General Manager, managing partners, passport renewals, or Emirates ID updates for authorized signatories holding EmaraTax communication rights.</p>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">3. Registered Address &amp; Ejari</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6;">Relocating your physical office, switching warehouse facilities, updating your Ejari tenancy contract, or changing free zone lease agreements.</p>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">4. Corporate Bank Account Details (IBAN)</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6;">Opening a new corporate bank account or switching banking partners. Up-to-date stamped IBAN letters are required to receive cash VAT refunds without rejections.</p>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">5. Legal Form Restructuring</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6;">Converting a Sole Establishment to an LLC, corporate mergers, acquisitions, or restructuring into a Qualifying Free Zone entity for 0% Corporate Tax.</p>
      </div>

      <div style="background: #ffffff; padding: 28px 24px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">6. Tax Group Additions &amp; De-registrations</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6;">Adding a new subsidiary into an existing VAT Tax Group or de-registering dormant entities from the group to maintain consolidated compliance.</p>
      </div>
    </div>
  </section>

  <!-- CTA STRIP -->
  <section style="background: #09203b; color: #ffffff; padding: 45px 20px; text-align: center;">
    <div style="max-width: 800px; margin: 0 auto;">
      <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 28px; color: #ffffff; margin-bottom: 12px;">Don't Risk an AED 5,000 FTA Non-Notification Penalty</h2>
      <p style="color: #cbd5e1; font-size: 16px; margin-bottom: 24px;">Our licensed tax agents submit your EmaraTax amendment with correct documentation within 24 hours.</p>
      <a href="https://wa.me/971524473871?text=Hello%20RBO,%20I%20need%20to%20amend%20my%20FTA%20records%20immediately" style="display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 14px 32px; border-radius: 8px; text-decoration: none; font-size: 16px;">💬 Submit Amendment on WhatsApp (+971 52 447 3871)</a>
    </div>
  </section>
</div>
HTML;

$fta_amend_faqs = array(
	array(
		'q' => 'What is the statutory deadline to update records with the FTA in UAE?',
		'a' => 'Under Federal Decree-Law No. 28 of 2022 on Tax Procedures, taxable persons must inform the Federal Tax Authority of any changes to their registration details within 20 business days of the change taking place.',
	),
	array(
		'q' => 'What is the penalty for failing to inform the FTA of changes within 20 business days?',
		'a' => 'Under Cabinet Decision No. 75 of 2023, failure to notify the FTA of amendments results in an administrative penalty of AED 1,000 for the first violation, and AED 5,000 for each repeat violation.',
	),
	array(
		'q' => 'What documents are required to amend an EmaraTax profile?',
		'a' => 'Required documents depend on the change: renewed trade licence, updated memorandum of association (MOA), lease agreement or Ejari, passport/Emirates ID copies of new signatories, and a stamped corporate bank account verification letter.',
	),
	array(
		'q' => 'How long does the FTA take to approve an amendment application?',
		'a' => 'Once submitted through EmaraTax by an authorized tax agent, standard amendments are typically reviewed and approved within 3 to 7 business days, provided all supporting legal documents are clear and attested.',
	),
);

// Execute Update for FTA Records Amendment
$fta_page = get_page_by_path( 'our-services/vat-registration-filing/fta-records-amendment' );
if ( ! $fta_page ) {
	$fta_page = get_page_by_path( 'fta-records-amendment' );
}
if ( $fta_page ) {
	wp_update_post( array(
		'ID'           => $fta_page->ID,
		'post_title'   => 'FTA Records Amendment UAE | Update Trade Licence, Bank & Address on EmaraTax | RBO',
		'post_content' => $fta_amend_content,
		'post_status'  => 'publish',
	) );
	update_post_meta( $fta_page->ID, 'rank_math_title', 'FTA Records Amendment UAE | Update EmaraTax Licence & Bank | RBO' );
	update_post_meta( $fta_page->ID, 'rank_math_description', 'Update your UAE trade licence, corporate bank IBAN, partners, or business address on EmaraTax within 20 days. Avoid AED 5,000+ fines with FTA tax agents.' );
	update_post_meta( $fta_page->ID, 'rank_math_focus_keyword', 'fta records amendment uae, update trade licence emaratax, amend tax registration fta, update trn bank details, fta 20 business days penalty' );
	update_post_meta( $fta_page->ID, 'rank_math_robots', array( 'index' ) );
	update_post_meta( $fta_page->ID, '_rbo_faq_schema', $fta_amend_faqs );
	$results[] = "Upgraded /our-services/vat-registration-filing/fta-records-amendment/ (ID: {$fta_page->ID})";
}


// =========================================================================
// 5. PAGE: HOMEPAGE (ID: 172, /)
// =========================================================================
$home_page_id = get_option( 'page_on_front' );
if ( ! $home_page_id ) {
	$home_page_id = 172;
}

$home_faqs = array(
	array(
		'q' => 'Why should my UAE business work with an FTA-approved tax agent?',
		'a' => 'Working with an FTA-registered tax agency ensures that your Corporate Tax returns (Form CT201) and quarterly VAT returns (Form VAT201) are legally compliant, audit-proof, and filed on time. Licensed tax agents have direct representation rights before the FTA, protecting your business against severe late filing and misdeclaration penalties.',
	),
	array(
		'q' => 'What is the mandatory Corporate Tax deadline in UAE for 2026?',
		'a' => 'Under UAE Corporate Tax Law, companies must file Form CT201 and settle any tax liability within 9 months of the end of their financial year. For businesses with a financial year ending 31 December, the mandatory annual filing deadline is 30 September.',
	),
	array(
		'q' => 'Can SMEs in the UAE benefit from 0% Corporate Tax?',
		'a' => 'Yes. Under Ministerial Decision No. 73 of 2023 on Small Business Relief (SBR), resident taxable persons with gross revenue equal to or below AED 3,000,000 can elect for SBR to be treated as having zero taxable income (0% Corporate Tax).',
	),
	array(
		'q' => 'How can commercial landlords and contractors claim VAT refunds in UAE?',
		'a' => 'Commercial landlords and construction contractors whose input VAT on construction, fit-outs, and building materials exceeds their output tax can claim a direct cash refund from the FTA via Form VAT311 on the EmaraTax portal.',
	),
	array(
		'q' => 'What accounting software do you support for bookkeeping and CFO reporting?',
		'a' => 'We are certified partners for Zoho Books, Xero, QuickBooks Online, SAP Business One, and Tally, providing daily cloud bookkeeping, automated 3-way invoice matching, and real-time executive KPI dashboards.',
	),
);

// Update Homepage Rank Math Metadata & FAQs
update_post_meta( $home_page_id, 'rank_math_title', 'Accounting Firm in UAE & Dubai | FTA Tax Agents & Corporate Tax | RBO' );
update_post_meta( $home_page_id, 'rank_math_description', 'RBO Accounting Services FZE: Premier FTA-approved accounting firm in Dubai & UAE. Expert Corporate Tax (Form CT201), VAT return filing, bookkeeping & Virtual CFO services.' );
update_post_meta( $home_page_id, 'rank_math_focus_keyword', 'accounting firm in uae, accounting firm in dubai, corporate tax registration uae, vat consultant dubai, bookkeeping services uae, fta approved tax agents' );
update_post_meta( $home_page_id, 'rank_math_robots', array( 'index' ) );
update_post_meta( $home_page_id, '_rbo_faq_schema', $home_faqs );
$results[] = "Upgraded Homepage SEO Meta & FAQ Schema (ID: {$home_page_id})";

echo "\n=======================================================\n";
echo " TOP GSC PAGES SUCCESSFULLY UPGRADED WITH TRENDING KEYWORDS & FAQS:\n";
foreach ( $results as $r ) {
	echo " ✅ {$r}\n";
}
echo "=======================================================\n\n";

if ( php_sapi_name() !== 'cli' ) :
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Top GSC Performance Pages Upgraded Successfully</title>
<style>
body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #09203b; color: #f8fafc; padding: 40px 20px; line-height: 1.6; }
.card { max-width: 800px; margin: 0 auto; background: #ffffff; color: #09203b; padding: 36px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.3); }
h1 { color: #09203b; margin-top: 0; font-size: 24px; }
.badge { display: inline-block; background: #dcfce7; color: #166534; padding: 6px 14px; border-radius: 9999px; font-weight: 700; font-size: 13px; margin-bottom: 20px; }
ul { padding-left: 20px; }
li { margin-bottom: 10px; font-size: 15px; }
</style>
</head>
<body>
<div class="card">
<span class="badge">🚀 All Top GSC Pages Successfully Upgraded!</span>
<h1>SEO, Content &amp; FAQ Upgrade Complete</h1>
<p>The top performing pages from your Google Search Console impressions have been overhauled with trending high-intent keywords, luxury responsive styling, structured comparison tables, and full FAQPage JSON-LD schema.</p>
<ul>
<?php foreach ( $results as $res ) : ?>
  <li>✅ <?php echo esc_html( $res ); ?></li>
<?php endforeach; ?>
</ul>
</div>
</body>
</html>
<?php endif;
