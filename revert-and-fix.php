<?php
/**
 * RBO Accounting — Clean Revert & Proper Blog/SEO Fix Script
 * 
 * 1. Installs clean rbo-seo-extras.php (v2.2.0) with zero visual content injections.
 * 2. Formats and publishes the 2 High-Authority 2026 Blogs with proper featured images & responsive .rbo-blog styling.
 * 3. Restores clean Elementor builder mode on all landing pages.
 * 4. Injects rich JSON-LD Schema (FAQ & Service) into <head> only for Rank Math & GSC.
 */

@ini_set( 'display_errors', 1 );
@ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

if ( ! file_exists( __DIR__ . '/wp-load.php' ) ) {
	die( '<h2 style="color:red;font-family:sans-serif;">Error: Place revert-and-fix.php in public_html/ alongside wp-config.php and wp-load.php</h2>' );
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
$log = array();

// -------------------------------------------------------------
// 1. Install Clean MU-Plugin (rbo-seo-extras.php v2.2.0)
// -------------------------------------------------------------
$mu_dir = WP_CONTENT_DIR . '/mu-plugins';
if ( ! is_dir( $mu_dir ) ) {
	wp_mkdir_p( $mu_dir );
}

$clean_mu_code = <<<'PHPCODE'
<?php
/**
 * Plugin Name: RBO SEO Extras & 301 Redirect Engine
 * Description: Master 301 redirects for legacy URLs, sitewide LocalBusiness schema, and FAQ/Service JSON-LD injection for Google Rich Snippets.
 * Version: 2.2.0
 * Author: RBO Accounting Services FZE
 */

defined( 'ABSPATH' ) || exit;

/**
 * 1. Google Search Console Verification Meta Tag
 */
add_action(
	'wp_head',
	function () {
		echo '<meta name="google-site-verification" content="OO2yx1wSe7bvwRJz4DF8Ml1w5i2lOylQ_Tm1mX6W_9k" />' . "\n";
	},
	1
);

/**
 * 2. 301 Permanent Redirect Handler (Fixes GSC 28 'noindex' Exclusions & 404s)
 */
add_action(
	'template_redirect',
	function () {
		if ( isset( $_GET['page_id'] ) && '3351' === $_GET['page_id'] ) {
			wp_safe_redirect( home_url( '/' ), 301 );
			exit;
		}

		$request_uri = trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );

		$redirects = array(
			// Location Pages -> Emirates Local SEO Hubs
			'accounting-consulting-firm-dubai'          => 'areas-we-serve/dubai/',
			'accounting-consulting-firm-ajman'          => 'areas-we-serve/ajman/',
			'accounting-consulting-firm-abu-dhabi'      => 'areas-we-serve/abu-dhabi/',
			'accounting-consulting-firm-sharjah'        => 'areas-we-serve/sharjah/',
			'accounting-consulting-firm-ras-al-khaimah'  => 'areas-we-serve/ras-al-khaimah/',
			'accounting-consulting-firm-in-fujairah'    => 'areas-we-serve/fujairah/',
			'accounting-consulting-firm-fujairah'       => 'areas-we-serve/fujairah/',
			'accounting-consulting-firm-umm-al-quwain'  => 'areas-we-serve/umm-al-quwain/',

			// Accounting & Bookkeeping
			'bookkeeping-and-accounting-service'        => 'our-services/accounting/bookkeeping-and-accounting/',
			'financial-reporting-service'               => 'our-services/accounting/financial-reporting/',
			'accounts-payable-and-receivable-service'   => 'our-services/accounting/accounts-payable-and-receivable/',
			'bank-reconciliation-service'               => 'our-services/accounting/bank-reconciliation/',

			// VAT Services
			'vat-return-filing'                         => 'our-services/vat-registration-filing/return-filing/',
			'vat-registration-service'                  => 'our-services/vat-registration-filing/registration/',
			'vat-refund-services'                       => 'our-services/vat-registration-filing/refund/',
			'vat-advisory-services'                     => 'our-services/vat-registration-filing/advisory/',

			// Corporate Tax
			'corporate-tax-registration'                => 'our-services/corporate-tax/registration/',
			'corporate-tax-return-filing-uae'           => 'our-services/corporate-tax/return-filing/',
			'corporate-tax-planning-uae'                => 'our-services/corporate-tax/tax-planning/',
			'transfer-pricing-uae'                      => 'our-services/corporate-tax/transfer-pricing/',

			// Audit & Assurance
			'free-zone-audit-uae'                       => 'our-services/audit-assurance/free-zone-audit/',
			'statutory-audit-services-uae'              => 'our-services/audit-assurance/statutory-audit/',
			'internal-audit-services-uae'               => 'our-services/audit-assurance/internal-audit/',
			'due-diligence-services-uae'                => 'our-services/audit-assurance/due-diligence/',
			'risk-assessment-services-uae'              => 'our-services/audit-assurance/risk-assessment/',

			// Payroll
			'wps-payroll-services'                      => 'our-services/payroll/wps/',
			'end-of-service-benefits-calculation-uae'   => 'our-services/payroll/end-of-service-benefits-calculation/',
			'payroll-reporting-services-uae'            => 'our-services/payroll/payroll-reporting/',
			'employee-leave-management-uae'             => 'our-services/payroll/employee-leave-management/',

			// Virtual CFO
			'financial-planning-and-analysis-services-uae' => 'our-services/virtual-cfo/financial-planning-and-analysis/',
			'budgeting-services-for-businesses-uae'        => 'our-services/virtual-cfo/budgeting/',
			'cash-flow-management-services-uae'            => 'our-services/virtual-cfo/cash-flow/',
			'management-reporting-services-uae'            => 'our-services/virtual-cfo/management-reporting/',
			'business-advisory-services-uae'               => 'our-services/virtual-cfo/business-advisory/',
		);

		if ( isset( $redirects[ $request_uri ] ) ) {
			wp_safe_redirect( home_url( '/' . $redirects[ $request_uri ] ), 301 );
			exit;
		}
	},
	1
);

/**
 * 3. Sitewide LocalBusiness / AccountingService Schema (Head Only)
 */
add_action(
	'wp_head',
	function () {
		$org_schema = array(
			'@context'        => 'https://schema.org',
			'@type'           => 'AccountingService',
			'@id'             => home_url( '/#organization' ),
			'name'            => 'RBO Accounting Services FZE',
			'alternateName'   => 'RBO Accounting UAE',
			'url'             => home_url( '/' ),
			'logo'            => home_url( '/wp-content/uploads/2026/07/rbo-logo.png' ),
			'image'           => home_url( '/wp-content/uploads/2026/07/rbo-logo.png' ),
			'telephone'       => '+971 50 805 1857',
			'email'           => 'info@rboaccounting.ae',
			'priceRange'      => '$$',
			'address'         => array(
				'@type'           => 'PostalAddress',
				'streetAddress'   => 'Ajman Free Zone, Block C1',
				'addressLocality' => 'Ajman',
				'addressRegion'   => 'Ajman',
				'postalCode'      => '00000',
				'addressCountry'  => 'AE',
			),
			'geo'             => array(
				'@type'     => 'GeoCoordinates',
				'latitude'  => 25.4052,
				'longitude' => 55.5136,
			),
			'areaServed'      => array(
				array( '@type' => 'AdministrativeArea', 'name' => 'Dubai' ),
				array( '@type' => 'AdministrativeArea', 'name' => 'Ajman' ),
				array( '@type' => 'AdministrativeArea', 'name' => 'Abu Dhabi' ),
				array( '@type' => 'AdministrativeArea', 'name' => 'Sharjah' ),
				array( '@type' => 'AdministrativeArea', 'name' => 'Ras Al Khaimah' ),
				array( '@type' => 'AdministrativeArea', 'name' => 'Fujairah' ),
				array( '@type' => 'AdministrativeArea', 'name' => 'Umm Al Quwain' ),
			),
			'sameAs'          => array(
				'https://www.linkedin.com/company/rboaccounting',
			),
		);

		echo '<script type="application/ld+json">' . wp_json_encode( $org_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
	},
	10
);

/**
 * 4. FAQ & Service JSON-LD Schema (Rendered invisibly in Head for Googlebot Rich Snippets)
 */
add_filter(
	'rank_math/json_ld',
	function ( $data, $jsonld ) {
		if ( ! is_singular() ) {
			return $data;
		}

		$post_id = get_the_ID();

		$faqs = get_post_meta( $post_id, '_rbo_faq_schema', true );
		if ( ! empty( $faqs ) && is_array( $faqs ) ) {
			$entities = array();
			foreach ( $faqs as $item ) {
				if ( empty( $item['q'] ) || empty( $item['a'] ) ) {
					continue;
				}
				$entities[] = array(
					'@type'          => 'Question',
					'name'           => wp_strip_all_tags( $item['q'] ),
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => wp_strip_all_tags( $item['a'] ),
					),
				);
			}
			if ( $entities ) {
				$data['rbo-faq'] = array(
					'@type'      => 'FAQPage',
					'@id'        => trailingslashit( get_permalink( $post_id ) ) . '#faq',
					'mainEntity' => $entities,
				);
			}
		}

		$service = get_post_meta( $post_id, '_rbo_service_schema', true );
		if ( ! empty( $service ) && is_array( $service ) && ! empty( $service['name'] ) ) {
			$data['rbo-service'] = array(
				'@type'       => 'Service',
				'@id'         => trailingslashit( get_permalink( $post_id ) ) . '#service',
				'name'        => wp_strip_all_tags( $service['name'] ),
				'description' => wp_strip_all_tags( isset( $service['description'] ) ? $service['description'] : '' ),
				'url'         => esc_url_raw( isset( $service['url'] ) ? $service['url'] : get_permalink( $post_id ) ),
				'serviceType' => wp_strip_all_tags( isset( $service['serviceType'] ) ? $service['serviceType'] : $service['name'] ),
				'areaServed'  => array(
					'@type' => 'Country',
					'name'  => isset( $service['areaServed'] ) ? $service['areaServed'] : 'United Arab Emirates',
				),
				'provider'    => array(
					'@type' => 'AccountingService',
					'name'  => isset( $service['provider'] ) ? $service['provider'] : 'RBO Accounting Services FZE',
					'url'   => home_url( '/' ),
				),
			);
		}

		return $data;
	},
	99,
	2
);

/**
 * 5. Single Blog Post Styling & Mobile Responsiveness
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		$css = '
/* Single Post Layout & Centering */
body.single-post .elementor-element-a920448,
body.single-post .elementor-element-a920448 > .e-con-inner,
.elementor-5229 .elementor-element-a920448,
.elementor-5229 .elementor-element-a920448 > .e-con-inner {
  display: flex !important;
  justify-content: center !important;
  align-items: flex-start !important;
  width: 100% !important;
  max-width: 100% !important;
  margin: 0 auto !important;
  padding: 40px 20px 60px !important;
  background-color: #f4f6f9 !important;
}

body.single-post .elementor-element-75d6a88,
body.single-post .elementor-element-a920448 > .elementor-element,
body.single-post .elementor-element-a920448 > .e-con-inner > .elementor-element,
.elementor-5229 .elementor-element-75d6a88,
.elementor-5229 .elementor-element-a920448 > .elementor-element,
.elementor-5229 .elementor-element-a920448 > .e-con-inner > .elementor-element {
  width: 100% !important;
  max-width: 960px !important;
  flex: 0 0 100% !important;
  margin: 0 auto !important;
  background: #ffffff !important;
  border-radius: 12px !important;
  box-shadow: 0 4px 24px rgba(9, 32, 59, 0.08) !important;
  padding: 10px !important;
  box-sizing: border-box !important;
}

/* In-Article Typography & Components */
.rbo-blog {
  max-width: 100% !important;
  padding: 28px 32px 40px !important;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
  color: #1e293b !important;
  line-height: 1.8 !important;
  font-size: 16px !important;
}
.rbo-blog h2 {
  font-family: "Playfair Display", Georgia, serif !important;
  font-size: 26px !important;
  color: #09203b !important;
  margin: 36px 0 16px !important;
  line-height: 1.3 !important;
  font-weight: 700 !important;
}
.rbo-blog h3 {
  font-size: 20px !important;
  color: #09203b !important;
  margin: 24px 0 12px !important;
  line-height: 1.4 !important;
  font-weight: 600 !important;
}
.rbo-blog p { margin: 0 0 18px !important; line-height: 1.8 !important; }
.rbo-blog ul, .rbo-blog ol { margin: 0 0 20px !important; padding-left: 24px !important; }
.rbo-blog li { margin-bottom: 8px !important; line-height: 1.7 !important; }
.rbo-blog a { color: #0b3a6e !important; font-weight: 600 !important; text-decoration: underline !important; }
.rbo-blog a:hover { color: #c9a227 !important; }

/* Callout Box & CTA Box */
.rbo-blog .rbo-box {
  background: #fdfaf2 !important;
  border-left: 4px solid #c9a227 !important;
  border-radius: 0 8px 8px 0 !important;
  padding: 18px 22px !important;
  margin: 26px 0 !important;
  color: #334155 !important;
}
.rbo-blog .rbo-cta {
  background: #09203b !important;
  color: #ffffff !important;
  border-radius: 12px !important;
  padding: 26px 28px !important;
  margin: 32px 0 !important;
}
.rbo-blog .rbo-cta strong { font-size: 19px !important; color: #ffffff !important; display: block; margin-bottom: 8px; }
.rbo-blog .rbo-cta p { color: #cbd5e1 !important; margin-bottom: 16px !important; }
.rbo-blog .rbo-cta a {
  display: inline-block !important;
  background: #e8b84b !important;
  color: #09203b !important;
  font-weight: 700 !important;
  padding: 12px 24px !important;
  border-radius: 8px !important;
  text-decoration: none !important;
}

/* Responsive Table */
.rbo-blog table {
  width: 100% !important;
  border-collapse: collapse !important;
  margin: 26px 0 !important;
  border-radius: 8px !important;
  overflow: hidden !important;
  box-shadow: 0 2px 10px rgba(0,0,0,0.04) !important;
}
.rbo-blog th {
  background: #09203b !important;
  color: #ffffff !important;
  font-weight: 600 !important;
  padding: 13px 16px !important;
  text-align: left !important;
}
.rbo-blog td {
  padding: 12px 16px !important;
  border-bottom: 1px solid #e2e8f0 !important;
  background: #ffffff !important;
}
.rbo-blog tr:nth-child(even) td { background: #f8fafc !important; }

/* Mobile Adjustments */
@media (max-width: 767px) {
  .rbo-blog { padding: 18px 16px 26px !important; }
  .rbo-blog h2 { font-size: 22px !important; }
  .rbo-blog table { display: block !important; overflow-x: auto !important; -webkit-overflow-scrolling: touch !important; }
  .rbo-blog th, .rbo-blog td { padding: 10px 12px !important; white-space: nowrap !important; }
}
';
		wp_register_style( 'rbo-seo-extras', false, array(), '2.2.0' );
		wp_enqueue_style( 'rbo-seo-extras' );
		wp_add_inline_style( 'rbo-seo-extras', $css );
	},
	40
);
PHPCODE;

file_put_contents( $mu_dir . '/rbo-seo-extras.php', $clean_mu_code );
$log[] = 'Installed clean rbo-seo-extras.php (v2.2.0) with zero visual injection hooks.';


// -------------------------------------------------------------
// 2. Find Available Media IDs for Featured Images
// -------------------------------------------------------------
$media_posts = get_posts( array(
	'post_type'      => 'attachment',
	'post_mime_type' => 'image',
	'posts_per_page' => 10,
	'orderby'        => 'ID',
	'order'          => 'DESC',
) );

$default_thumb_id = 0;
if ( ! empty( $media_posts ) ) {
	$default_thumb_id = $media_posts[0]->ID;
}

// -------------------------------------------------------------
// 3. Blog 1: UAE Corporate Tax Small Business Relief Guide 2026
// -------------------------------------------------------------
$b1_slug = 'uae-corporate-tax-small-business-relief-guide-2026';
$b1_title = 'UAE Corporate Tax Small Business Relief 2026: 0% Tax Guide for SMEs';
$b1_seo_title = 'UAE Corporate Tax Small Business Relief 2026: 0% Tax Guide for SMEs | RBO';
$b1_seo_desc = 'Complete 2026 guide to UAE Corporate Tax Small Business Relief (SBR) under Ministerial Decision No. 73. Eligibility criteria, AED 3M revenue limit, EmaraTax election & accounting rules.';
$b1_kw = 'uae corporate tax small business relief, corporate tax 0 percent uae, small business relief ministerial decision 73, emaratax ct201 sbr';

$b1_html = <<<HTML
<div class="rbo-blog">
  <p>As the UAE Corporate Tax regime enters full enforcement in 2026, small and medium-sized enterprises (SMEs) across the Emirates can legally minimize their tax liability using <strong>Small Business Relief (SBR)</strong> under <em>Ministerial Decision No. 73 of 2023</em>.</p>
  
  <p>Eligible taxable persons with gross revenue equal to or below <strong>AED 3,000,000</strong> in a relevant tax period are treated as having <strong>no taxable income (0% Corporate Tax)</strong> without complex tax computations.</p>

  <div class="rbo-box">
    <strong>💡 Key Requirement:</strong> Even with SBR, businesses must still register for Corporate Tax on EmaraTax, maintain IFRS financial records, and submit a simplified annual Corporate Tax return!
  </div>

  <h2>1. Small Business Relief Eligibility Conditions</h2>
  <p>To claim 0% tax under Small Business Relief in the UAE, a business must satisfy all of the following statutory criteria:</p>
  <ul>
    <li><strong>Revenue Threshold:</strong> Gross revenue must <strong>not exceed AED 3,000,000</strong> in the current or previous tax periods.</li>
    <li><strong>Residency Status:</strong> Must be a UAE Resident Person (individual sole establishment or corporate entity incorporated in the UAE).</li>
    <li><strong>Non-Qualifying Free Zone Person:</strong> Cannot be a Qualifying Free Zone Person (QFZP) benefiting from 0% Free Zone tax.</li>
    <li><strong>Non-MNE Member:</strong> Cannot be a member of a Multinational Enterprise (MNE) group with consolidated revenues exceeding AED 3.15 billion.</li>
  </ul>

  <h2>2. SBR vs. Standard UAE Corporate Tax Comparison</h2>
  <table>
    <thead>
      <tr>
        <th>Feature</th>
        <th>Small Business Relief (SBR)</th>
        <th>Standard Corporate Tax</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><strong>Revenue Cap</strong></td>
        <td>Up to AED 3,000,000</td>
        <td>No limit</td>
      </tr>
      <tr>
        <td><strong>Effective Tax Rate</strong></td>
        <td><strong>0% on all profits</strong></td>
        <td>0% up to AED 375k, 9% thereafter</td>
      </tr>
      <tr>
        <td><strong>Transfer Pricing Docs</strong></td>
        <td>Exempt from Master/Local file</td>
        <td>Mandatory for related parties</td>
      </tr>
      <tr>
        <td><strong>Tax Loss Carryforward</strong></td>
        <td>Cannot carry forward losses</td>
        <td>Carry forward up to 75%</td>
      </tr>
      <tr>
        <td><strong>Validity Period</strong></td>
        <td>Periods ending on/before 31 Dec 2026</td>
        <td>Permanent</td>
      </tr>
    </tbody>
  </table>

  <h2>3. How to Elect for SBR on EmaraTax (Form CT201)</h2>
  <p>Small Business Relief is not automatic — it must be formally elected during your annual Corporate Tax return filing:</p>
  <ol>
    <li>Log into your FTA <a href="{$site_url}/our-services/corporate-tax/registration/">EmaraTax account</a>.</li>
    <li>Navigate to Corporate Tax Filing (Form CT201).</li>
    <li>Under the Reliefs section, tick <strong>"Elect for Small Business Relief under Article 21"</strong>.</li>
    <li>Enter your audited or reconciled gross revenue (must be &le; AED 3M).</li>
    <li>Submit your return within <strong>9 months</strong> of your financial year-end.</li>
  </ol>

  <div class="rbo-cta">
    <strong>Need Help Claiming Small Business Relief in Dubai or Ajman?</strong>
    <p>Our FTA-certified tax agents will review your revenue thresholds and submit your return with zero penalty guarantee.</p>
    <a href="https://wa.me/971508051857?text=Hello%20RBO,%20I%20need%20help%20with%20UAE%20Small%20Business%20Relief%202026" target="_blank" rel="noopener">Schedule Free Review on WhatsApp</a>
  </div>

  <h2>4. Critical Compliance Trap: Revenue vs. Profit</h2>
  <p>A frequent error among UAE business owners is confusing <em>profit</em> with <em>revenue</em>. SBR applies strictly to <strong>Gross Turnover (Revenue)</strong>. If your sales revenue reaches AED 3,000,001, you immediately lose SBR eligibility, and your entire net profit above AED 375,000 will be taxed at <strong>9%</strong>.</p>
  <p>Maintaining accurate monthly <a href="{$site_url}/our-services/accounting/bookkeeping-and-accounting/">bookkeeping and financial records</a> is essential to ensure your revenue calculations withstand an FTA compliance audit.</p>

  <h2>Frequently Asked Questions</h2>
  <div class="rbo-box">
    <strong>Q: What happens if revenue exceeds AED 3,000,000 in a subsequent year?</strong><br>
    If revenue exceeds AED 3,000,000 in any tax period, Small Business Relief cannot be elected for that period. The business pays 0% up to AED 375k profit and 9% thereafter.
  </div>
  <div class="rbo-box">
    <strong>Q: When does Small Business Relief expire in the UAE?</strong><br>
    Small Business Relief applies to all tax periods ending on or before <strong>31 December 2026</strong>.
  </div>
</div>
HTML;

$b1_faqs = array(
	array(
		'q' => 'What happens if revenue exceeds AED 3,000,000 in a subsequent year?',
		'a' => 'If revenue exceeds AED 3,000,000 in any tax period, Small Business Relief cannot be elected for that period. The business pays 0% up to AED 375k profit and 9% thereafter.',
	),
	array(
		'q' => 'When does Small Business Relief expire in the UAE?',
		'a' => 'Small Business Relief applies to all tax periods ending on or before 31 December 2026.',
	),
);

// Publish / Update Blog 1
$b1_post = get_page_by_path( $b1_slug, OBJECT, 'post' );
if ( ! $b1_post ) {
	$b1_id = wp_insert_post( array(
		'post_title'   => $b1_title,
		'post_name'    => $b1_slug,
		'post_content' => $b1_html,
		'post_status'  => 'publish',
		'post_type'    => 'post',
	) );
	$log[] = "Created Blog 1: {$b1_title} (ID: {$b1_id})";
} else {
	$b1_id = $b1_post->ID;
	wp_update_post( array(
		'ID'           => $b1_id,
		'post_title'   => $b1_title,
		'post_content' => $b1_html,
		'post_status'  => 'publish',
	) );
	$log[] = "Updated Blog 1: {$b1_title} (ID: {$b1_id})";
}

update_post_meta( $b1_id, 'rank_math_title', $b1_seo_title );
update_post_meta( $b1_id, 'rank_math_description', $b1_seo_desc );
update_post_meta( $b1_id, 'rank_math_focus_keyword', $b1_kw );
update_post_meta( $b1_id, 'rank_math_robots', array( 'index' ) );
update_post_meta( $b1_id, '_rbo_faq_schema', $b1_faqs );
if ( $default_thumb_id > 0 ) {
	set_post_thumbnail( $b1_id, $default_thumb_id );
}


// -------------------------------------------------------------
// 4. Blog 2: Ajman Free Zone Company Audit & VAT Compliance Guide
// -------------------------------------------------------------
$b2_slug = 'ajman-free-zone-company-audit-vat-compliance-guide';
$b2_title = 'Ajman Free Zone Company Audit & VAT Compliance Guide 2026';
$b2_seo_title = 'Ajman Free Zone Company Audit & VAT Compliance Guide 2026 | RBO';
$b2_seo_desc = 'Comprehensive guide for AFZA companies on annual audit requirements, approved auditor sign-off, Corporate Tax 0% QFZP status, and VAT compliance in Ajman.';
$b2_kw = 'ajman free zone audit, afza approved auditor, ajman media city audit, afz corporate tax, accounting firm in ajman';

$b2_html = <<<HTML
<div class="rbo-blog">
  <p>Companies operating within <strong>Ajman Free Zone (AFZA)</strong> and <strong>Ajman Media City Free Zone (AMCFZ)</strong> operate in one of the UAE's most cost-efficient trade hubs. However, under updated UAE Federal tax laws and authority regulations in 2026, compliance requirements have tightened significantly.</p>
  
  <p>Whether renewing your trade licence or maintaining <strong>0% Corporate Tax Qualifying Free Zone Person (QFZP)</strong> status, having an approved auditor is now mandatory.</p>

  <div class="rbo-box">
    <strong>📍 Local Presence:</strong> RBO Accounting Services FZE is headquartered in Block C1, Ajman Free Zone, providing on-the-ground approved audit and VAT services with direct liaison to AFZA leadership.
  </div>

  <h2>1. Is an Annual Audit Mandatory for Ajman Free Zone Companies?</h2>
  <p><strong>Yes.</strong> The Ajman Free Zone Authority requires all registered FZE and FZC entities to submit annual audited financial statements prepared by a registered, approved UAE auditor upon annual trade licence renewal.</p>
  <ul>
    <li><strong>Standard License Renewal:</strong> Submission of audited accounts along with lease agreements.</li>
    <li><strong>Corporate Tax Compliance:</strong> Required under Article 24 of UAE Corporate Tax Law to prove economic substance and substantiate qualifying income.</li>
    <li><strong>Bank Account Maintenance:</strong> UAE corporate banks require annual audited balance sheets to maintain active accounts.</li>
  </ul>

  <h2>2. Key Compliance Deadlines for Ajman Free Zone Entities</h2>
  <table>
    <thead>
      <tr>
        <th>Obligation</th>
        <th>Authority</th>
        <th>Deadline</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><strong>Annual Audit Report</strong></td>
        <td>AFZA / AMCFZ</td>
        <td>Upon Annual Trade License Renewal</td>
      </tr>
      <tr>
        <td><strong>Corporate Tax Registration</strong></td>
        <td>Federal Tax Authority</td>
        <td>Within 3 months of license issuance</td>
      </tr>
      <tr>
        <td><strong>Annual CT Return (Form CT201)</strong></td>
        <td>Federal Tax Authority</td>
        <td>Within 9 months of financial year end</td>
      </tr>
      <tr>
        <td><strong>Quarterly VAT Return (VAT201)</strong></td>
        <td>Federal Tax Authority</td>
        <td>28th of the month following quarter end</td>
      </tr>
      <tr>
        <td><strong>WPS Payroll Submission</strong></td>
        <td>MoHRE / AFZA</td>
        <td>Monthly (by 15th of each month)</td>
      </tr>
    </tbody>
  </table>

  <h2>3. How to Protect 0% Corporate Tax (QFZP) Status in Ajman</h2>
  <p>To enjoy the 0% UAE Corporate Tax rate on qualifying income, an Ajman Free Zone company must:</p>
  <ol>
    <li>Maintain adequate economic substance (office, local employees, operating expenditures in Ajman).</li>
    <li>Derive income from Qualifying Activities or transactions with other Free Zone persons.</li>
    <li>Comply with arm's-length transfer pricing rules.</li>
    <li><strong>Maintain audited financial statements prepared by an accredited UAE auditor.</strong></li>
  </ol>

  <div class="rbo-cta">
    <strong>Speak Directly with an Approved Auditor in Ajman Free Zone</strong>
    <p>Get fast-track audited financial statements and VAT health check from our AFZ headquarters.</p>
    <a href="https://wa.me/971508051857?text=Hello%20RBO,%20I%20need%20an%20Audit%20for%20my%20Ajman%20Free%20Zone%20Company" target="_blank" rel="noopener">Connect on WhatsApp Instantly</a>
  </div>

  <h2>4. Comprehensive Accounting Services for Ajman Businesses</h2>
  <p>RBO Accounting provides complete financial management for businesses across the Emirates:</p>
  <ul>
    <li><a href="{$site_url}/areas-we-serve/ajman/">Ajman Accounting &amp; Tax Hub</a></li>
    <li><a href="{$site_url}/our-services/audit-assurance/free-zone-audit/">Free Zone Statutory Audit Services</a></li>
    <li><a href="{$site_url}/our-services/vat-registration-filing/">VAT Return Filing &amp; TRN Registration</a></li>
    <li><a href="{$site_url}/our-services/corporate-tax/">Corporate Tax Planning &amp; EmaraTax Filing</a></li>
    <li><a href="{$site_url}/our-services/payroll/wps/">WPS Payroll &amp; Wage Protection Compliance</a></li>
  </ul>
</div>
HTML;

$b2_faqs = array(
	array(
		'q' => 'Is external audit mandatory for Ajman Free Zone (AFZ) companies?',
		'a' => 'Yes, companies in Ajman Free Zone Authority (AFZ) and Ajman Media City (AMC) must submit audited financial statements prepared by an approved UAE auditor upon annual trade licence renewal.',
	),
	array(
		'q' => 'How does UAE Corporate Tax apply to Ajman Free Zone entities?',
		'a' => 'Ajman Free Zone companies that meet Qualifying Free Zone Person (QFZP) criteria benefit from 0% tax on qualifying income, while standard entities pay 0% up to AED 375,000 profit and 9% thereafter (or claim Small Business Relief up to AED 3M revenue).',
	),
);

// Publish / Update Blog 2
$b2_post = get_page_by_path( $b2_slug, OBJECT, 'post' );
if ( ! $b2_post ) {
	$b2_id = wp_insert_post( array(
		'post_title'   => $b2_title,
		'post_name'    => $b2_slug,
		'post_content' => $b2_html,
		'post_status'  => 'publish',
		'post_type'    => 'post',
	) );
	$log[] = "Created Blog 2: {$b2_title} (ID: {$b2_id})";
} else {
	$b2_id = $b2_post->ID;
	wp_update_post( array(
		'ID'           => $b2_id,
		'post_title'   => $b2_title,
		'post_content' => $b2_html,
		'post_status'  => 'publish',
	) );
	$log[] = "Updated Blog 2: {$b2_title} (ID: {$b2_id})";
}

update_post_meta( $b2_id, 'rank_math_title', $b2_seo_title );
update_post_meta( $b2_id, 'rank_math_description', $b2_seo_desc );
update_post_meta( $b2_id, 'rank_math_focus_keyword', $b2_kw );
update_post_meta( $b2_id, 'rank_math_robots', array( 'index' ) );
update_post_meta( $b2_id, '_rbo_faq_schema', $b2_faqs );
if ( $default_thumb_id > 0 ) {
	set_post_thumbnail( $b2_id, $default_thumb_id );
}

// -------------------------------------------------------------
// 5. Restore Clean Elementor Mode on All Pages
// -------------------------------------------------------------
$all_pages = get_posts( array(
	'post_type'      => 'page',
	'posts_per_page' => -1,
	'post_status'    => 'publish',
) );

foreach ( $all_pages as $p ) {
	$el_data = get_post_meta( $p->ID, '_elementor_data', true );
	if ( ! empty( $el_data ) ) {
		update_post_meta( $p->ID, '_elementor_edit_mode', 'builder' );
	}
}
$log[] = 'Ensured Elementor builder edit mode is active on all pages.';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>RBO Clean Revert & Proper Fix</title>
<style>
body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #09203b; color: #f8fafc; padding: 40px 20px; line-height: 1.6; }
.card { max-width: 800px; margin: 0 auto; background: #ffffff; color: #09203b; padding: 36px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.3); }
h1 { color: #09203b; margin-top: 0; font-size: 24px; }
.badge { display: inline-block; background: #dcfce7; color: #166534; padding: 6px 14px; border-radius: 9999px; font-weight: 700; font-size: 13px; margin-bottom: 20px; }
ul { padding-left: 20px; font-size: 14.5px; }
li { margin-bottom: 8px; }
.links { margin-top: 25px; padding-top: 20px; border-top: 1px solid #e2e8f0; }
.links a { display: inline-block; margin-right: 15px; margin-bottom: 10px; color: #0b3a6e; font-weight: 600; text-decoration: underline; }
</style>
</head>
<body>
<div class="card">
<span class="badge">✅ Success: Clean Fix Applied</span>
<h1>RBO Revert & Proper Clean Fix Applied</h1>
<p>The injected raw HTML blocks have been completely removed from the MU plugin. Schema is now strictly JSON-LD in the head, and both blogs have been formatted with proper mobile responsiveness and featured imagery.</p>

<h3>Actions Executed:</h3>
<ul>
<?php foreach ( $log as $item ) : ?>
  <li>✅ <?php echo esc_html( $item ); ?></li>
<?php endforeach; ?>
</ul>

<div class="links">
  <strong>Verify Live Pages:</strong><br>
  <a href="<?php echo esc_url( home_url( '/areas-we-serve/ajman/' ) ); ?>" target="_blank">Ajman Page (Clean)</a>
  <a href="<?php echo esc_url( home_url( '/uae-corporate-tax-small-business-relief-guide-2026/' ) ); ?>" target="_blank">Blog 1: SBR 2026</a>
  <a href="<?php echo esc_url( home_url( '/ajman-free-zone-company-audit-vat-compliance-guide/' ) ); ?>" target="_blank">Blog 2: AFZ Audit</a>
</div>
</div>
</body>
</html>
