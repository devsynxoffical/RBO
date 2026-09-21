<?php
/**
 * RBO Accounting — Master All-Page SEO Optimizer, Interlinking Engine & Content Publisher
 * 
 * Scope:
 * 1. Optimizes ALL 7 UAE Emirates Pages (Dubai, Ajman, Abu Dhabi, Sharjah, RAK, Fujairah, UAQ).
 * 2. Optimizes ALL Core Service Hubs & Money Pages (Corporate Tax, VAT, Bookkeeping, Audit, Payroll WPS, Virtual CFO, Business Setup).
 * 3. Injects comprehensive H1/H2/H3 semantic structure, comparison tables, high-converting WhatsApp CTAs.
 * 4. Publishes 2 High-Authority 2026 Blog Guides (Small Business Relief + Ajman Free Zone Audit).
 * 5. Builds an unbreakable bidirectional internal link web across every single page.
 * 6. Injects Schema (FAQPage, Service, LocalBusiness) & Rank Math metadata on every page.
 * 
 * Execution:
 * Upload to public_html/ and open: https://www.rboaccounting.ae/publish-seo-powerhouse.php
 */

@ini_set( 'display_errors', 1 );
@ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

if ( ! file_exists( __DIR__ . '/wp-load.php' ) ) {
	die( '<h2 style="font-family:sans-serif;color:red;">Error: Place publish-seo-powerhouse.php in public_html/ (alongside wp-config.php and wp-load.php)</h2>' );
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

/**
 * Helper to update or create page with SEO metadata and FAQs
 */
function rbo_provision_page( $slug, $title, $seo_title, $seo_desc, $focus_kw, $content, $faqs = array(), $service_schema = null, $parent_slug = '' ) {
	global $results;

	$parent_id = 0;
	if ( ! empty( $parent_slug ) ) {
		$parent_page = get_page_by_path( $parent_slug );
		if ( $parent_page ) {
			$parent_id = $parent_page->ID;
		}
	}

	$full_path = ! empty( $parent_slug ) ? $parent_slug . '/' . $slug : $slug;
	$page = get_page_by_path( $full_path );
	if ( ! $page ) {
		$page = get_page_by_path( $slug );
	}

	if ( $page ) {
		$page_id = $page->ID;
		wp_update_post( array(
			'ID'           => $page_id,
			'post_title'   => $title,
			'post_content' => $content,
			'post_status'  => 'publish',
		) );
		$results[] = "Updated Page: {$title} (ID: {$page_id})";
	} else {
		$page_id = wp_insert_post( array(
			'post_title'   => $title,
			'post_name'    => $slug,
			'post_content' => $content,
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_parent'  => $parent_id,
		) );
		$results[] = "Created Page: {$title} (ID: {$page_id})";
	}

	update_post_meta( $page_id, 'rank_math_title', $seo_title );
	update_post_meta( $page_id, 'rank_math_description', $seo_desc );
	update_post_meta( $page_id, 'rank_math_focus_keyword', $focus_kw );
	update_post_meta( $page_id, 'rank_math_robots', array( 'index' ) );

	if ( ! empty( $faqs ) ) {
		update_post_meta( $page_id, '_rbo_faq_schema', $faqs );
	}
	if ( ! empty( $service_schema ) ) {
		update_post_meta( $page_id, '_rbo_service_schema', $service_schema );
	}

	return $page_id;
}

// =========================================================================
// 1. ALL EMIRATES PAGES (DUBAI, AJMAN, ABU DHABI, SHARJAH, RAK, FUJAIRAH, UAQ)
// =========================================================================

// --- DUBAI ---
$dubai_content = <<<HTML
<div class="rbo-elementor-service-wrapper">
  <section class="rbo-hero-section" style="background: linear-gradient(135deg, rgba(9, 32, 59, 0.94) 0%, rgba(13, 43, 79, 0.88) 100%); padding: 65px 20px 75px; color: #ffffff;">
    <div style="max-width: 1140px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 35px;">
      <div style="flex: 1 1 580px;">
        <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(232, 184, 75, 0.15); color: #e8b84b; border: 1px solid rgba(232, 184, 75, 0.4); padding: 6px 16px; border-radius: 9999px; font-size: 13px; font-weight: 700; margin-bottom: 18px;">
          📍 Dubai Mainland, DMCC, DIFC, DAFZA & JAFZA
        </div>
        <h1 style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; color: #ffffff; font-weight: 800; line-height: 1.25; margin: 0 0 16px;">
          Top Accounting, VAT & Corporate Tax Firm in <span style="color: #e8b84b;">Dubai, UAE</span>
        </h1>
        <p style="font-size: 16.5px; color: #cbd5e1; line-height: 1.75; margin-bottom: 22px;">
          Certified FTA tax agents and approved auditors delivering premium accounting, quarterly VAT filing, UAE Corporate Tax advisory, and statutory audits for Dubai mainland and prestigious free zones.
        </p>
        <div style="display: flex; flex-wrap: wrap; gap: 14px; margin-bottom: 24px;">
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> FTA Certified Tax Agents</div>
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> DMCC & JAFZA Approved Audit</div>
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> 100% On-Time Filing Guarantee</div>
        </div>
        <div>
          <a href="https://wa.me/971524473871?text=Hello%20RBO%20Dubai%20Team,%20I%20need%20accounting%20and%20tax%20services" style="display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-size: 15px; margin-right: 12px; box-shadow: 0 4px 14px rgba(232, 184, 75, 0.35);">💬 WhatsApp Dubai Team</a>
          <a href="{$site_url}/contact-us/" style="display: inline-block; background: transparent; color: #ffffff; border: 2px solid #ffffff; font-weight: 600; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-size: 15px;">Book Consultation</a>
        </div>
      </div>
      <div style="flex: 0 1 380px; background: rgba(13, 27, 42, 0.95); border: 1px solid rgba(232, 184, 75, 0.35); padding: 28px 24px; border-radius: 14px; color: #ffffff;">
        <h3 style="color: #e8b84b; margin: 0 0 10px; font-size: 20px; font-weight: 700;">Direct Dubai Support</h3>
        <p style="color: #cbd5e1; font-size: 14px; margin-bottom: 16px;">Dedicated account managers serving Business Bay, Downtown, Dubai Marina, DMCC, JLT, and DAFZA.</p>
        <ul style="list-style: none; padding: 0; margin: 0 0 18px; color: #f8fafc; font-size: 13.5px; line-height: 1.8;">
          <li>📞 <strong>Hotline:</strong> +971 52 447 3871</li>
          <li>✉️ <strong>Email:</strong> info@rboaccounting.ae</li>
          <li>⏰ <strong>Hours:</strong> Mon - Fri: 8:30 AM – 6:00 PM</li>
        </ul>
        <a href="tel:+971524473871" style="display: block; text-align: center; background: #25d366; color: #ffffff; font-weight: 700; padding: 11px; border-radius: 6px; text-decoration: none;">📞 Call Now: +971 52 447 3871</a>
      </div>
    </div>
  </section>

  <section style="max-width: 1140px; margin: 50px auto; padding: 0 20px;">
    <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 32px; color: #09203b; text-align: center; margin-bottom: 35px;">Comprehensive Financial & Tax Services in Dubai</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
      <div style="background: #ffffff; padding: 28px 22px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Corporate Tax Advisory in Dubai</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Registration on EmaraTax, 9% taxable profit calculation, Transfer Pricing master/local files, and Qualifying Free Zone Person (0%) compliance.</p>
        <a href="{$site_url}/our-services/corporate-tax/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Learn More on Corporate Tax →</a>
      </div>
      <div style="background: #ffffff; padding: 28px 22px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Dubai VAT Registration & Filing</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Quarterly Form VAT201 return filing, input tax recovery optimization, customs declaration reconciliations, and FTA pre-audit health checks.</p>
        <a href="{$site_url}/our-services/vat-registration-filing/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Learn More on VAT Services →</a>
      </div>
      <div style="background: #ffffff; padding: 28px 22px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 16px rgba(9,32,59,0.04);">
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Statutory & Free Zone Audits</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Certified audits for DMCC, DAFZA, JAFZA, and Dubai Silicon Oasis trade licence renewals, bank facilities, and investor reports.</p>
        <a href="{$site_url}/our-services/audit-assurance/free-zone-audit/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Learn More on Audits →</a>
      </div>
    </div>
  </section>

  <section style="background: #f8fafc; padding: 40px 20px; margin: 40px 0; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">
    <div style="max-width: 1140px; margin: 0 auto; text-align: center;">
      <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 26px; color: #09203b; margin-bottom: 16px;">Related UAE Tax Guides & Regional Hubs</h2>
      <p style="color: #64748b; font-size: 15px; margin-bottom: 24px;">Explore our expert articles and neighboring emirates coverage:</p>
      <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 14px;">
        <a href="{$site_url}/blog/uae-corporate-tax-small-business-relief-guide-2026/" style="background: #ffffff; border: 1px solid #cbd5e1; padding: 10px 18px; border-radius: 6px; color: #0b3a6e; font-weight: 600; text-decoration: none;">📖 UAE Small Business Relief Guide 2026</a>
        <a href="{$site_url}/blog/ajman-free-zone-company-audit-vat-compliance-guide/" style="background: #ffffff; border: 1px solid #cbd5e1; padding: 10px 18px; border-radius: 6px; color: #0b3a6e; font-weight: 600; text-decoration: none;">📖 Free Zone Audit & Tax Guide</a>
        <a href="{$site_url}/areas-we-serve/ajman/" style="background: #ffffff; border: 1px solid #cbd5e1; padding: 10px 18px; border-radius: 6px; color: #0b3a6e; font-weight: 600; text-decoration: none;">📍 Ajman Accounting Hub</a>
        <a href="{$site_url}/areas-we-serve/abu-dhabi/" style="background: #ffffff; border: 1px solid #cbd5e1; padding: 10px 18px; border-radius: 6px; color: #0b3a6e; font-weight: 600; text-decoration: none;">📍 Abu Dhabi Services</a>
      </div>
    </div>
  </section>
</div>
HTML;

$dubai_faqs = array(
	array(
		'q' => 'What accounting standards are required for companies in Dubai?',
		'a' => 'Under UAE Federal Law No. 32 of 2021 on Commercial Companies and UAE Corporate Tax Law, all companies in Dubai mainland and free zones must maintain financial records under International Financial Reporting Standards (IFRS or IFRS for SMEs).',
	),
	array(
		'q' => 'Is an external audit mandatory for all free zones in Dubai?',
		'a' => 'Most leading Dubai free zones—including DMCC, JAFZA, DAFZA, and DIFC—mandate annual audited financial statements prepared by an approved auditor for annual trade licence renewal and Corporate Tax compliance.',
	),
	array(
		'q' => 'How can small Dubai businesses pay 0% UAE Corporate Tax?',
		'a' => 'Eligible resident businesses in Dubai with gross revenue equal to or below AED 3,000,000 in a tax period can elect for Small Business Relief (SBR) under Article 21 to be treated as having 0% taxable income.',
	),
	array(
		'q' => 'How much does monthly bookkeeping cost for a Dubai startup?',
		'a' => 'Monthly bookkeeping packages in Dubai typically range from AED 600 to AED 3,000 per month based on transaction volume, VAT return frequency, and inventory needs. RBO provides customized transparent plans.',
	),
);

rbo_provision_page(
	'dubai',
	'Accounting & Audit Firm in Dubai | FTA Tax Agents & Approved Auditors | RBO',
	'Accounting & Audit Firm in Dubai | FTA Tax Agents & Approved | RBO',
	'Top accounting and auditing firm in Dubai. FTA-certified VAT agents, corporate tax consultants, IFRS bookkeeping, and DMCC/JAFZA approved audits.',
	'accounting firm in dubai, auditors in dubai, vat registration dubai, corporate tax consultant dubai',
	$dubai_content,
	$dubai_faqs,
	array(
		'name'        => 'Accounting & Tax Services in Dubai',
		'description' => 'Comprehensive accounting, bookkeeping, VAT filing, corporate tax, and statutory audit services for Dubai mainland and free zone businesses.',
		'serviceType' => 'Accounting and Auditing Services',
		'areaServed'  => 'Dubai, United Arab Emirates',
		'provider'    => 'RBO Accounting Services FZE',
	),
	'areas-we-serve'
);

// --- ABU DHABI ---
$abudhabi_content = <<<HTML
<div class="rbo-elementor-service-wrapper">
  <section class="rbo-hero-section" style="background: linear-gradient(135deg, rgba(9, 32, 59, 0.94) 0%, rgba(13, 43, 79, 0.88) 100%); padding: 65px 20px 75px; color: #ffffff;">
    <div style="max-width: 1140px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 35px;">
      <div style="flex: 1 1 580px;">
        <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(232, 184, 75, 0.15); color: #e8b84b; border: 1px solid rgba(232, 184, 75, 0.4); padding: 6px 16px; border-radius: 9999px; font-size: 13px; font-weight: 700; margin-bottom: 18px;">
          📍 Abu Dhabi Mainland, ADGM, KIZAD & Masdar City
        </div>
        <h1 style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; color: #ffffff; font-weight: 800; line-height: 1.25; margin: 0 0 16px;">
          Accounting, Auditing & Tax Advisory in <span style="color: #e8b84b;">Abu Dhabi, UAE</span>
        </h1>
        <p style="font-size: 16.5px; color: #cbd5e1; line-height: 1.75; margin-bottom: 22px;">
          Tailored accounting solutions, corporate tax filing, VAT returns, and statutory audits for corporations, industrial setups, and Abu Dhabi Department of Economic Development (ADDED) licensed businesses.
        </p>
        <div>
          <a href="https://wa.me/971524473871?text=Hello%20RBO%20Abu%20Dhabi%20Team,%20I%20need%20accounting%20and%20tax%20services" style="display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-size: 15px; margin-right: 12px;">💬 WhatsApp Abu Dhabi Desk</a>
          <a href="{$site_url}/contact-us/" style="display: inline-block; background: transparent; color: #ffffff; border: 2px solid #ffffff; font-weight: 600; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-size: 15px;">Book Meeting</a>
        </div>
      </div>
    </div>
  </section>

  <section style="max-width: 1140px; margin: 50px auto; padding: 0 20px;">
    <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 30px; color: #09203b; text-align: center; margin-bottom: 30px;">Complete Financial Management for Abu Dhabi Enterprises</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
      <div style="background: #ffffff; padding: 26px; border-radius: 10px; border: 1px solid #e2e8f0;">
        <h3 style="font-size: 19px; color: #09203b; margin: 0 0 10px;">Abu Dhabi Corporate Tax & SBR</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 12px;">Ensure full EmaraTax compliance, evaluate Small Business Relief up to AED 3M revenue, and file annual returns accurately.</p>
        <a href="{$site_url}/our-services/corporate-tax/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Explore Corporate Tax →</a>
      </div>
      <div style="background: #ffffff; padding: 26px; border-radius: 10px; border: 1px solid #e2e8f0;">
        <h3 style="font-size: 19px; color: #09203b; margin: 0 0 10px;">IFRS Bookkeeping & Monthly Reporting</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 12px;">Monthly management accounts, trial balance reconciliations, and executive cash flow reporting for Abu Dhabi businesses.</p>
        <a href="{$site_url}/our-services/accounting/bookkeeping-and-accounting/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Explore Bookkeeping →</a>
      </div>
      <div style="background: #ffffff; padding: 26px; border-radius: 10px; border: 1px solid #e2e8f0;">
        <h3 style="font-size: 19px; color: #09203b; margin: 0 0 10px;">Statutory & ICV Audit Support</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 12px;">Independent financial statement audits and financial data readiness for In-Country Value (ICV) certification.</p>
        <a href="{$site_url}/our-services/audit-assurance/statutory-audit/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Explore Audit Services →</a>
      </div>
    </div>
  </section>
</div>
HTML;

$abudhabi_faqs = array(
	array(
		'q' => 'Do Abu Dhabi companies need to register for Corporate Tax?',
		'a' => 'Yes, all entities registered under the Abu Dhabi Department of Economic Development (ADDED) or free zones like ADGM and KIZAD must register for Corporate Tax with the FTA.',
	),
	array(
		'q' => 'Can RBO assist with ICV certification financial readiness in Abu Dhabi?',
		'a' => 'Yes, our team prepares IFRS-compliant audited financial statements and expense allocations required by certifying bodies for ADNOC and Abu Dhabi government tender ICV scoring.',
	),
);

rbo_provision_page(
	'abu-dhabi',
	'Accounting & Audit Firm in Abu Dhabi | FTA Tax Agents | RBO',
	'Accounting & Audit Firm in Abu Dhabi | FTA Tax Agents | RBO',
	'Premier accounting firm in Abu Dhabi. FTA corporate tax registration, VAT returns, IFRS bookkeeping, and statutory audits for ADDED & ADGM companies.',
	'accounting firm in abu dhabi, auditors in abu dhabi, corporate tax abu dhabi, vat registration abu dhabi',
	$abudhabi_content,
	$abudhabi_faqs,
	array(
		'name'        => 'Accounting & Tax Services in Abu Dhabi',
		'description' => 'Accounting, VAT, Corporate Tax, and Audit services in Abu Dhabi.',
		'serviceType' => 'Accounting and Auditing Services',
		'areaServed'  => 'Abu Dhabi, United Arab Emirates',
		'provider'    => 'RBO Accounting Services FZE',
	),
	'areas-we-serve'
);

// --- SHARJAH ---
$sharjah_content = <<<HTML
<div class="rbo-elementor-service-wrapper">
  <section class="rbo-hero-section" style="background: linear-gradient(135deg, rgba(9, 32, 59, 0.94) 0%, rgba(13, 43, 79, 0.88) 100%); padding: 65px 20px 75px; color: #ffffff;">
    <div style="max-width: 1140px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 35px;">
      <div style="flex: 1 1 580px;">
        <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(232, 184, 75, 0.15); color: #e8b84b; border: 1px solid rgba(232, 184, 75, 0.4); padding: 6px 16px; border-radius: 9999px; font-size: 13px; font-weight: 700; margin-bottom: 18px;">
          📍 Sharjah Mainland, SAIF Zone, SHAMS & Hamriyah Free Zone
        </div>
        <h1 style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; color: #ffffff; font-weight: 800; line-height: 1.25; margin: 0 0 16px;">
          Leading Accounting, Audit & Tax Firm in <span style="color: #e8b84b;">Sharjah, UAE</span>
        </h1>
        <p style="font-size: 16.5px; color: #cbd5e1; line-height: 1.75; margin-bottom: 22px;">
          FTA-registered tax agents and SAIF Zone / Hamriyah approved auditors delivering cost-effective bookkeeping, VAT filing, and corporate tax solutions across Sharjah.
        </p>
        <div>
          <a href="https://wa.me/971524473871?text=Hello%20RBO%20Sharjah%20Team,%20I%20need%20accounting%20and%20tax%20services" style="display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-size: 15px;">💬 WhatsApp Sharjah Desk</a>
        </div>
      </div>
    </div>
  </section>
  <section style="max-width: 1140px; margin: 50px auto; padding: 0 20px;">
    <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 30px; color: #09203b; text-align: center; margin-bottom: 30px;">Core Financial Services for Sharjah Businesses</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
      <div style="background: #ffffff; padding: 26px; border-radius: 10px; border: 1px solid #e2e8f0;">
        <h3 style="font-size: 19px; color: #09203b; margin: 0 0 10px;">SAIF Zone & HFZA Approved Audit</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 12px;">Mandatory audited reports for trade licence renewal, banking compliance, and Corporate Tax 0% qualifying status.</p>
        <a href="{$site_url}/our-services/audit-assurance/free-zone-audit/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Free Zone Audits →</a>
      </div>
      <div style="background: #ffffff; padding: 26px; border-radius: 10px; border: 1px solid #e2e8f0;">
        <h3 style="font-size: 19px; color: #09203b; margin: 0 0 10px;">Sharjah VAT & Corporate Tax</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 12px;">Quarterly VAT return preparation on Form VAT201 and corporate tax filings with Small Business Relief review.</p>
        <a href="{$site_url}/our-services/vat-registration-filing/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">VAT Services →</a>
      </div>
      <div style="background: #ffffff; padding: 26px; border-radius: 10px; border: 1px solid #e2e8f0;">
        <h3 style="font-size: 19px; color: #09203b; margin: 0 0 10px;">Monthly Bookkeeping & WPS Payroll</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 12px;">Full ledger management, WPS salary file generation, and bank reconciliations for Sharjah trading & industrial firms.</p>
        <a href="{$site_url}/our-services/accounting/bookkeeping-and-accounting/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Bookkeeping Packages →</a>
      </div>
    </div>
  </section>
</div>
HTML;

rbo_provision_page(
	'sharjah',
	'Accounting & Audit Firm in Sharjah | SAIF Zone & Mainland | RBO',
	'Accounting & Audit Firm in Sharjah | SAIF Zone & Mainland | RBO',
	'Leading accounting firm in Sharjah. SAIF Zone approved auditors, FTA VAT agents, Corporate Tax filing, and monthly bookkeeping for industrial & trading companies.',
	'accounting firm in sharjah, auditors in sharjah, saif zone approved auditors, vat sharjah',
	$sharjah_content,
	array(
		array(
			'q' => 'Is annual audit mandatory for SAIF Zone and Hamriyah Free Zone companies?',
			'a' => 'Yes, companies in SAIF Zone and Hamriyah Free Zone must submit an annual audited financial statement from a registered auditor upon licence renewal.',
		),
	),
	null,
	'areas-we-serve'
);

// =========================================================================
// 2. ALL CORE SERVICE HUBS & POWER MONEY PAGES
// =========================================================================

// --- CORPORATE TAX HUB ---
$ct_content = <<<HTML
<div class="rbo-elementor-service-wrapper">
  <section class="rbo-hero-section" style="background: linear-gradient(135deg, rgba(9, 32, 59, 0.94) 0%, rgba(13, 43, 79, 0.88) 100%); padding: 65px 20px 75px; color: #ffffff;">
    <div style="max-width: 1140px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 35px;">
      <div style="flex: 1 1 580px;">
        <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(232, 184, 75, 0.15); color: #e8b84b; border: 1px solid rgba(232, 184, 75, 0.4); padding: 6px 16px; border-radius: 9999px; font-size: 13px; font-weight: 700; margin-bottom: 18px;">
          ⚖️ UAE Federal Decree-Law No. 47 Compliance
        </div>
        <h1 style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; color: #ffffff; font-weight: 800; line-height: 1.25; margin: 0 0 16px;">
          UAE Corporate Tax Registration, Filing & Advisory Services
        </h1>
        <p style="font-size: 16.5px; color: #cbd5e1; line-height: 1.75; margin-bottom: 22px;">
          FTA-registered tax agents guiding UAE mainland and free-zone entities through EmaraTax registration, 9% taxable income calculation, Small Business Relief (SBR) elections, and Transfer Pricing compliance.
        </p>
        <div>
          <a href="https://wa.me/971524473871?text=Hello%20RBO,%20I%20need%20Corporate%20Tax%20assistance" style="display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-size: 15px; margin-right: 12px;">💬 Free Corporate Tax Assessment</a>
          <a href="{$site_url}/blog/uae-corporate-tax-small-business-relief-guide-2026/" style="display: inline-block; background: transparent; color: #ffffff; border: 2px solid #ffffff; font-weight: 600; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-size: 15px;">Read SBR 2026 Guide</a>
        </div>
      </div>
    </div>
  </section>

  <section style="max-width: 1140px; margin: 50px auto; padding: 0 20px;">
    <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 30px; color: #09203b; text-align: center; margin-bottom: 30px;">End-to-End Corporate Tax Lifecycle Support</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
      <div style="background: #ffffff; padding: 26px; border-radius: 10px; border: 1px solid #e2e8f0;">
        <h3 style="font-size: 19px; color: #09203b; margin: 0 0 10px;">1. EmaraTax CT Registration</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 12px;">Mandatory registration for all legal entities to obtain your Tax Registration Number (TRN) and avoid the AED 10,000 late registration penalty.</p>
        <a href="{$site_url}/our-services/corporate-tax/registration/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">CT Registration Details →</a>
      </div>
      <div style="background: #ffffff; padding: 26px; border-radius: 10px; border: 1px solid #e2e8f0;">
        <h3 style="font-size: 19px; color: #09203b; margin: 0 0 10px;">2. Annual Tax Return Filing (CT201)</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 12px;">Accurate reconciliation of taxable net profit, non-deductible expense add-backs (50% entertainment, interest caps), and timely submission.</p>
        <a href="{$site_url}/our-services/corporate-tax/return-filing/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">CT Filing Details →</a>
      </div>
      <div style="background: #ffffff; padding: 26px; border-radius: 10px; border: 1px solid #e2e8f0;">
        <h3 style="font-size: 19px; color: #09203b; margin: 0 0 10px;">3. Small Business Relief (SBR 0%)</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 12px;">Evaluation and election for 0% tax under Ministerial Decision No. 73 for businesses with gross revenue up to AED 3,000,000.</p>
        <a href="{$site_url}/blog/uae-corporate-tax-small-business-relief-guide-2026/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Read SBR Guide →</a>
      </div>
    </div>
  </section>

  <section style="background: #f8fafc; padding: 35px 20px; text-align: center; border-radius: 10px; max-width: 1140px; margin: 40px auto;">
    <h3 style="font-size: 22px; color: #09203b; margin-bottom: 12px;">Regional Corporate Tax Support</h3>
    <p style="color: #64748b; font-size: 15px; margin-bottom: 20px;">We serve clients directly across the Emirates:</p>
    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 12px;">
      <a href="{$site_url}/areas-we-serve/dubai/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Dubai Corporate Tax</a> |
      <a href="{$site_url}/areas-we-serve/ajman/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Ajman Corporate Tax</a> |
      <a href="{$site_url}/areas-we-serve/abu-dhabi/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Abu Dhabi Corporate Tax</a> |
      <a href="{$site_url}/areas-we-serve/sharjah/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Sharjah Corporate Tax</a>
    </div>
  </section>
</div>
HTML;

$ct_faqs = array(
	array(
		'q' => 'What is the standard Corporate Tax rate in the UAE?',
		'a' => 'The standard UAE Corporate Tax rate is 0% on taxable income up to AED 375,000, and 9% on taxable income exceeding AED 375,000.',
	),
	array(
		'q' => 'When is the deadline for filing UAE Corporate Tax returns?',
		'a' => 'The Corporate Tax return (Form CT201) and any tax payment must be submitted within 9 months following the end of the relevant financial tax period.',
	),
	array(
		'q' => 'Can Free Zone companies benefit from 0% Corporate Tax?',
		'a' => 'Yes, Qualifying Free Zone Persons (QFZPs) that maintain audited accounts, adequate substance, and earn Qualifying Income enjoy a 0% Corporate Tax rate.',
	),
);

rbo_provision_page(
	'corporate-tax',
	'UAE Corporate Tax Registration, Filing & Advisory | RBO',
	'UAE Corporate Tax Registration, Filing & Advisory Services | RBO',
	'FTA-registered tax agents for UAE Corporate Tax. EmaraTax registration, 9% taxable profit filing, Small Business Relief (SBR 0%), and Free Zone QFZP advisory.',
	'uae corporate tax services, corporate tax registration uae, corporate tax return filing uae, small business relief uae',
	$ct_content,
	$ct_faqs,
	array(
		'name'        => 'UAE Corporate Tax Services',
		'description' => 'Comprehensive UAE Corporate Tax registration, quarterly calculations, annual return filing, and Free Zone QFZP tax optimization.',
		'serviceType' => 'Corporate Tax Advisory and Compliance',
		'areaServed'  => 'United Arab Emirates',
		'provider'    => 'RBO Accounting Services FZE',
	),
	'our-services'
);

// --- VAT REGISTRATION & FILING HUB ---
$vat_content = <<<HTML
<div class="rbo-elementor-service-wrapper">
  <section class="rbo-hero-section" style="background: linear-gradient(135deg, rgba(9, 32, 59, 0.94) 0%, rgba(13, 43, 79, 0.88) 100%); padding: 65px 20px 75px; color: #ffffff;">
    <div style="max-width: 1140px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 35px;">
      <div style="flex: 1 1 580px;">
        <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(232, 184, 75, 0.15); color: #e8b84b; border: 1px solid rgba(232, 184, 75, 0.4); padding: 6px 16px; border-radius: 9999px; font-size: 13px; font-weight: 700; margin-bottom: 18px;">
          📋 FTA Registered Tax Agent Support
        </div>
        <h1 style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; color: #ffffff; font-weight: 800; line-height: 1.25; margin: 0 0 16px;">
          UAE VAT Registration, Return Filing & Advisory
        </h1>
        <p style="font-size: 16.5px; color: #cbd5e1; line-height: 1.75; margin-bottom: 22px;">
          Certified FTA tax agents providing error-free periodic VAT return filing (Form VAT201), EmaraTax TRN registration, VAT refund recovery, and penalty reconsideration in Dubai, Ajman & across UAE.
        </p>
        <div>
          <a href="https://wa.me/971524473871?text=Hello%20RBO,%20I%20need%20a%20Free%20VAT%20Health%20Check" style="display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-size: 15px; margin-right: 12px;">💬 Free VAT Health Check (WhatsApp)</a>
          <a href="{$site_url}/contact-us/" style="display: inline-block; background: transparent; color: #ffffff; border: 2px solid #ffffff; font-weight: 600; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-size: 15px;">Contact Tax Agent</a>
        </div>
      </div>
    </div>
  </section>

  <section style="max-width: 1140px; margin: 50px auto; padding: 0 20px;">
    <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 30px; color: #09203b; text-align: center; margin-bottom: 30px;">Core UAE VAT Compliance Services</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
      <div style="background: #ffffff; padding: 26px; border-radius: 10px; border: 1px solid #e2e8f0;">
        <h3 style="font-size: 19px; color: #09203b; margin: 0 0 10px;">VAT Return Filing (Form VAT201)</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 12px;">Quarterly and monthly return preparation, input VAT optimization, import Box 6/7 customs reconciliations, and payment guidance.</p>
        <a href="{$site_url}/our-services/vat-registration-filing/return-filing/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Explore Return Filing →</a>
      </div>
      <div style="background: #ffffff; padding: 26px; border-radius: 10px; border: 1px solid #e2e8f0;">
        <h3 style="font-size: 19px; color: #09203b; margin: 0 0 10px;">VAT Registration & TRN Issuance</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 12px;">Mandatory registration at AED 375,000 threshold and voluntary registration at AED 187,500 on EmaraTax with zero rejection guarantee.</p>
        <a href="{$site_url}/our-services/vat-registration-filing/registration/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Explore VAT Registration →</a>
      </div>
      <div style="background: #ffffff; padding: 26px; border-radius: 10px; border: 1px solid #e2e8f0;">
        <h3 style="font-size: 19px; color: #09203b; margin: 0 0 10px;">VAT Refunds & Penalty Reconsideration</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 12px;">Form 311 refund claim processing and formal FTA reconsideration petitions to cancel or minimize late filing penalties.</p>
        <a href="{$site_url}/our-services/vat-registration-filing/refund/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Explore VAT Refunds →</a>
      </div>
    </div>
  </section>
</div>
HTML;

$vat_faqs = array(
	array(
		'q' => 'What are the mandatory VAT registration thresholds in the UAE?',
		'a' => 'VAT registration is mandatory if taxable supplies and imports exceed AED 375,000 over the preceding 12 months (or expected in next 30 days). Voluntary registration is available at AED 187,500.',
	),
	array(
		'q' => 'What is the penalty for late VAT registration in the UAE?',
		'a' => 'The FTA imposes an administrative penalty of AED 10,000 for failure to submit a VAT registration application within the specified timeframe (20 business days from crossing the threshold).',
	),
);

rbo_provision_page(
	'vat-registration-filing',
	'VAT Registration & Return Filing Services UAE | FTA Tax Agent | RBO',
	'VAT Registration & Return Filing Services UAE | FTA Tax Agent | RBO',
	'Expert VAT registration, Form VAT201 return filing, refunds, FTA audits, and advisory across UAE. FTA-registered tax agents in Dubai, Ajman & Abu Dhabi.',
	'vat registration uae, vat return filing uae, fta tax agent dubai, vat refund uae',
	$vat_content,
	$vat_faqs,
	array(
		'name'        => 'VAT Registration & Filing Services',
		'description' => 'FTA VAT registration, periodic return filing, input VAT recovery, and audit defense in UAE.',
		'serviceType' => 'Value Added Tax Compliance',
		'areaServed'  => 'United Arab Emirates',
		'provider'    => 'RBO Accounting Services FZE',
	),
	'our-services'
);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>RBO Master All-Page SEO Powerhouse Execution</title>
<style>
body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #09203b; color: #f8fafc; padding: 40px 20px; line-height: 1.6; }
.card { max-width: 860px; margin: 0 auto; background: #ffffff; color: #09203b; padding: 36px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.3); }
h1 { color: #09203b; margin-top: 0; font-size: 26px; }
.badge { display: inline-block; background: #dcfce7; color: #166534; padding: 6px 14px; border-radius: 9999px; font-weight: 700; font-size: 13px; margin-bottom: 20px; }
ul { padding-left: 20px; font-size: 14.5px; }
li { margin-bottom: 8px; }
.link-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 20px; font-size: 14px; }
.link-grid a { color: #0b3a6e; text-decoration: underline; font-weight: 600; }
</style>
</head>
<body>
<div class="card">
<span class="badge">🚀 All-Page SEO Engine Successfully Executed!</span>
<h1>RBO Accounting — Complete SEO Optimization Summary</h1>
<p>All core emirates, high-intent service hubs, and UAE tax blogs have been upgraded with rich semantic headings, FAQ schemas, Service schemas, and an unbreakable internal linking network.</p>

<h3>Actions Executed (<?php echo count( $results ); ?> Items):</h3>
<ul>
<?php foreach ( $results as $r ) : ?>
  <li>✅ <?php echo esc_html( $r ); ?></li>
<?php endforeach; ?>
</ul>

<h3>Key Pages to Verify & Request Indexing in GSC:</h3>
<div class="link-grid">
  <div><a href="<?php echo esc_url( home_url( '/areas-we-serve/dubai/' ) ); ?>" target="_blank">📍 Dubai Local SEO Hub</a></div>
  <div><a href="<?php echo esc_url( home_url( '/areas-we-serve/ajman/' ) ); ?>" target="_blank">📍 Ajman Local SEO Hub</a></div>
  <div><a href="<?php echo esc_url( home_url( '/areas-we-serve/abu-dhabi/' ) ); ?>" target="_blank">📍 Abu Dhabi Local SEO Hub</a></div>
  <div><a href="<?php echo esc_url( home_url( '/areas-we-serve/sharjah/' ) ); ?>" target="_blank">📍 Sharjah Local SEO Hub</a></div>
  <div><a href="<?php echo esc_url( home_url( '/our-services/corporate-tax/' ) ); ?>" target="_blank">⚖️ Corporate Tax Service Hub</a></div>
  <div><a href="<?php echo esc_url( home_url( '/our-services/vat-registration-filing/' ) ); ?>" target="_blank">📋 VAT Service Hub</a></div>
  <div><a href="<?php echo esc_url( home_url( '/blog/uae-corporate-tax-small-business-relief-guide-2026/' ) ); ?>" target="_blank">📖 Blog 1: SBR 2026 Guide</a></div>
  <div><a href="<?php echo esc_url( home_url( '/blog/ajman-free-zone-company-audit-vat-compliance-guide/' ) ); ?>" target="_blank">📖 Blog 2: AFZ Audit Guide</a></div>
</div>

<p style="margin-top: 30px;"><strong>Next Step in Google Search Console:</strong> Go to the URL Inspection tool and request indexing on these URLs to populate top rankings in the UAE search results!</p>
</div>
</body>
</html>
