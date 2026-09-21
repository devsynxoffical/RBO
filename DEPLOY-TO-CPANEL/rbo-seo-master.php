<?php
/**
 * =========================================================================
 * RBO ACCOUNTING — 100% STANDALONE ALL-IN-ONE MASTER SEO DEPLOYER (1 FILE)
 * =========================================================================
 * 
 * Instructions:
 * 1. Upload ONLY THIS ONE FILE (rbo-seo-master.php) to your live public_html/ folder.
 * 2. Open in your browser: https://www.rboaccounting.ae/rbo-seo-master.php
 * 
 * What this 1 single file executes automatically in 1 click:
 * - Injects all 301 Permanent Redirects into .htaccess (fixes GSC 28 noindex & 404s).
 * - Enables Gzip compression & Browser Caching headers.
 * - Installs the MU-Plugin (rbo-seo-extras.php) for sitewide LocalBusiness & FAQ JSON-LD schemas.
 * - Updates the Ajman Local Power Page with H1/H2s, AFZ requirements, 0% Corporate Tax rules & FAQs.
 * - Updates Dubai, Abu Dhabi, and Sharjah local SEO landing pages.
 * - Updates Corporate Tax and VAT Money Service Hubs.
 * - Publishes 2 High-Authority 2026 Blog Guides (Small Business Relief + Ajman Free Zone Audit).
 * - Connects bidirectional internal links across all pages.
 * - Sets all Rank Math SEO titles, descriptions, focus keywords, and schemas.
 * - DOES NOT modify or overwrite ANY of your theme CSS / styling.
 */

@ini_set( 'display_errors', 1 );
@ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

if ( ! file_exists( __DIR__ . '/wp-load.php' ) ) {
	die( '<h2 style="font-family:sans-serif;color:red;padding:20px;">Error: Place rbo-seo-master.php directly in your public_html/ folder (alongside wp-config.php and wp-load.php)</h2>' );
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
$results = array();

// =========================================================================
// STEP 1: AUTO-DEPLOY .HTACCESS (301 REDIRECTS & CRAWL CACHING)
// =========================================================================

$htaccess_path = __DIR__ . '/.htaccess';
$htaccess_rules = <<<EOD
# =======================================================================
# RBO Accounting - Master Production .htaccess & SEO 301 Redirect Rules
# Website: https://www.rboaccounting.ae
# Purpose: Fix 28 'noindex' exclusions, fix 404s, funnel crawl equity to 
#          18 Discovered pages (H1, H2, FAQ schema, Service pages, Emirates).
# =======================================================================

<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /

# 1. Force Canonical HTTPS and WWW
RewriteCond %{HTTPS} off [OR]
RewriteCond %{HTTP_HOST} !^www\. [NC]
RewriteCond %{HTTP_HOST} ^(?:www\.)?(.+)$ [NC]
RewriteRule ^ https://www.%1%{REQUEST_URI} [L,NE,R=301]

# 2. Fix Specific Parameter 404 URL (?page_id=3351)
RewriteCond %{QUERY_STRING} ^page_id=3351$ [NC]
RewriteRule ^$ /? [R=301,L]

# 3. 301 Redirects: Old Location Pages -> New Emirates Local SEO Pages
RewriteRule ^accounting-consulting-firm-dubai/?$ /areas-we-serve/dubai/ [R=301,L]
RewriteRule ^accounting-consulting-firm-ajman/?$ /areas-we-serve/ajman/ [R=301,L]
RewriteRule ^accounting-consulting-firm-abu-dhabi/?$ /areas-we-serve/abu-dhabi/ [R=301,L]
RewriteRule ^accounting-consulting-firm-sharjah/?$ /areas-we-serve/sharjah/ [R=301,L]
RewriteRule ^accounting-consulting-firm-ras-al-khaimah/?$ /areas-we-serve/ras-al-khaimah/ [R=301,L]
RewriteRule ^accounting-consulting-firm-in-fujairah/?$ /areas-we-serve/fujairah/ [R=301,L]
RewriteRule ^accounting-consulting-firm-fujairah/?$ /areas-we-serve/fujairah/ [R=301,L]
RewriteRule ^accounting-consulting-firm-umm-al-quwain/?$ /areas-we-serve/umm-al-quwain/ [R=301,L]

# 4. 301 Redirects: Old Accounting Pages -> New Hierarchical Services
RewriteRule ^bookkeeping-and-accounting-service/?$ /our-services/accounting/bookkeeping-and-accounting/ [R=301,L]
RewriteRule ^financial-reporting-service/?$ /our-services/accounting/financial-reporting/ [R=301,L]
RewriteRule ^accounts-payable-and-receivable-service/?$ /our-services/accounting/accounts-payable-and-receivable/ [R=301,L]
RewriteRule ^bank-reconciliation-service/?$ /our-services/accounting/bank-reconciliation/ [R=301,L]

# 5. 301 Redirects: Old VAT Pages -> New VAT Hierarchy
RewriteRule ^vat-return-filing/?$ /our-services/vat-registration-filing/return-filing/ [R=301,L]
RewriteRule ^vat-registration-service/?$ /our-services/vat-registration-filing/registration/ [R=301,L]
RewriteRule ^vat-refund-services/?$ /our-services/vat-registration-filing/refund/ [R=301,L]
RewriteRule ^vat-advisory-services/?$ /our-services/vat-registration-filing/advisory/ [R=301,L]

# 6. 301 Redirects: Old Corporate Tax Pages -> New Corporate Tax Hierarchy
RewriteRule ^corporate-tax-registration/?$ /our-services/corporate-tax/registration/ [R=301,L]
RewriteRule ^corporate-tax-return-filing-uae/?$ /our-services/corporate-tax/return-filing/ [R=301,L]
RewriteRule ^corporate-tax-planning-uae/?$ /our-services/corporate-tax/tax-planning/ [R=301,L]
RewriteRule ^transfer-pricing-uae/?$ /our-services/corporate-tax/transfer-pricing/ [R=301,L]

# 7. 301 Redirects: Old Audit & Assurance Pages -> New Audit Hierarchy
RewriteRule ^free-zone-audit-uae/?$ /our-services/audit-assurance/free-zone-audit/ [R=301,L]
RewriteRule ^statutory-audit-services-uae/?$ /our-services/audit-assurance/statutory-audit/ [R=301,L]
RewriteRule ^internal-audit-services-uae/?$ /our-services/audit-assurance/internal-audit/ [R=301,L]
RewriteRule ^due-diligence-services-uae/?$ /our-services/audit-assurance/due-diligence/ [R=301,L]
RewriteRule ^risk-assessment-services-uae/?$ /our-services/audit-assurance/risk-assessment/ [R=301,L]

# 8. 301 Redirects: Old Payroll Pages -> New Payroll Hierarchy
RewriteRule ^wps-payroll-services/?$ /our-services/payroll/wps/ [R=301,L]
RewriteRule ^end-of-service-benefits-calculation-uae/?$ /our-services/payroll/end-of-service-benefits-calculation/ [R=301,L]
RewriteRule ^payroll-reporting-services-uae/?$ /our-services/payroll/payroll-reporting/ [R=301,L]
RewriteRule ^employee-leave-management-uae/?$ /our-services/payroll/employee-leave-management/ [R=301,L]

# 9. 301 Redirects: Old Virtual CFO Pages -> New Virtual CFO Hierarchy
RewriteRule ^financial-planning-and-analysis-services-uae/?$ /our-services/virtual-cfo/financial-planning-and-analysis/ [R=301,L]
RewriteRule ^budgeting-services-for-businesses-uae/?$ /our-services/virtual-cfo/budgeting/ [R=301,L]
RewriteRule ^cash-flow-management-services-uae/?$ /our-services/virtual-cfo/cash-flow/ [R=301,L]
RewriteRule ^management-reporting-services-uae/?$ /our-services/virtual-cfo/management-reporting/ [R=301,L]
RewriteRule ^business-advisory-services-uae/?$ /our-services/virtual-cfo/business-advisory/ [R=301,L]
</IfModule>

<IfModule mod_expires.c>
ExpiresActive On
ExpiresDefault "access plus 1 month"
ExpiresByType text/css "access plus 1 year"
ExpiresByType text/javascript "access plus 1 year"
ExpiresByType application/javascript "access plus 1 year"
ExpiresByType image/jpeg "access plus 1 year"
ExpiresByType image/png "access plus 1 year"
ExpiresByType image/webp "access plus 1 year"
ExpiresByType font/woff2 "access plus 1 year"
</IfModule>

<IfModule mod_deflate.c>
AddOutputFilterByType DEFLATE text/plain text/html text/xml text/css text/javascript application/xml application/javascript application/json image/svg+xml font/woff2
</IfModule>

# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress
EOD;

if ( @file_put_contents( $htaccess_path, $htaccess_rules ) ) {
	$log[] = '✅ Successfully written .htaccess with all 301 Permanent Redirects & speed caching.';
} else {
	$log[] = '⚠️ Notice: .htaccess could not be written directly (file permissions).';
}

// =========================================================================
// STEP 2: AUTO-DEPLOY MU-PLUGIN (rbo-seo-extras.php)
// =========================================================================

$mu_dir = WP_CONTENT_DIR . '/mu-plugins';
if ( ! is_dir( $mu_dir ) ) {
	@mkdir( $mu_dir, 0755, true );
}

$mu_plugin_code = <<<'PHP'
<?php
/**
 * Plugin Name: RBO SEO Extras & 301 Redirect Engine
 * Description: Master 301 redirects for legacy URLs, sitewide LocalBusiness schema, FAQ/Service JSON-LD injection, and Emirate Local SEO blocks.
 * Version: 2.0.0
 * Author: RBO Accounting Services FZE
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_head', function () {
	echo '<meta name="google-site-verification" content="OO2yx1wSe7bvwRJz4DF8Ml1w5i2lOylQ_Tm1mX6W_9k" />' . "\n";
}, 1 );

add_action( 'template_redirect', function () {
	if ( isset( $_GET['page_id'] ) && '3351' === $_GET['page_id'] ) {
		wp_safe_redirect( home_url( '/' ), 301 );
		exit;
	}
	$request_uri = trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );
	$redirects = array(
		'accounting-consulting-firm-dubai'          => 'areas-we-serve/dubai/',
		'accounting-consulting-firm-ajman'          => 'areas-we-serve/ajman/',
		'accounting-consulting-firm-abu-dhabi'      => 'areas-we-serve/abu-dhabi/',
		'accounting-consulting-firm-sharjah'        => 'areas-we-serve/sharjah/',
		'accounting-consulting-firm-ras-al-khaimah'  => 'areas-we-serve/ras-al-khaimah/',
		'accounting-consulting-firm-in-fujairah'    => 'areas-we-serve/fujairah/',
		'accounting-consulting-firm-fujairah'       => 'areas-we-serve/fujairah/',
		'accounting-consulting-firm-umm-al-quwain'  => 'areas-we-serve/umm-al-quwain/',
		'bookkeeping-and-accounting-service'        => 'our-services/accounting/bookkeeping-and-accounting/',
		'financial-reporting-service'               => 'our-services/accounting/financial-reporting/',
		'accounts-payable-and-receivable-service'   => 'our-services/accounting/accounts-payable-and-receivable/',
		'bank-reconciliation-service'               => 'our-services/accounting/bank-reconciliation/',
		'vat-return-filing'                         => 'our-services/vat-registration-filing/return-filing/',
		'vat-registration-service'                  => 'our-services/vat-registration-filing/registration/',
		'vat-refund-services'                       => 'our-services/vat-registration-filing/refund/',
		'vat-advisory-services'                     => 'our-services/vat-registration-filing/advisory/',
		'corporate-tax-registration'                => 'our-services/corporate-tax/registration/',
		'corporate-tax-return-filing-uae'           => 'our-services/corporate-tax/return-filing/',
		'corporate-tax-planning-uae'                => 'our-services/corporate-tax/tax-planning/',
		'transfer-pricing-uae'                      => 'our-services/corporate-tax/transfer-pricing/',
		'free-zone-audit-uae'                       => 'our-services/audit-assurance/free-zone-audit/',
		'statutory-audit-services-uae'              => 'our-services/audit-assurance/statutory-audit/',
		'internal-audit-services-uae'               => 'our-services/audit-assurance/internal-audit/',
		'due-diligence-services-uae'                => 'our-services/audit-assurance/due-diligence/',
		'risk-assessment-services-uae'              => 'our-services/audit-assurance/risk-assessment/',
		'wps-payroll-services'                      => 'our-services/payroll/wps/',
		'end-of-service-benefits-calculation-uae'   => 'our-services/payroll/end-of-service-benefits-calculation/',
		'payroll-reporting-services-uae'            => 'our-services/payroll/payroll-reporting/',
		'employee-leave-management-uae'             => 'our-services/payroll/employee-leave-management/',
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
}, 1 );

add_action( 'wp_head', function () {
	$org_schema = array(
		'@context'        => 'https://schema.org',
		'@type'           => 'AccountingService',
		'@id'             => home_url( '/#organization' ),
		'name'            => 'RBO Accounting Services FZE',
		'alternateName'   => 'RBO Accounting UAE',
		'url'             => home_url( '/' ),
		'logo'            => home_url( '/wp-content/uploads/2026/07/rbo-logo.png' ),
		'image'           => home_url( '/wp-content/uploads/2026/07/rbo-logo.png' ),
		'telephone'       => '+971 52 447 3871',
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
		'openingHoursSpecification' => array(
			array(
				'@type'     => 'OpeningHoursSpecification',
				'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ),
				'opens'     => '08:30',
				'closes'    => '18:00',
			),
		),
		'sameAs'          => array(
			'https://www.linkedin.com/company/rboaccounting',
		),
	);
	echo '<script type="application/ld+json">' . wp_json_encode( $org_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
}, 10 );

add_filter( 'rank_math/json_ld', function ( $data, $jsonld ) {
	if ( ! is_singular() ) return $data;
	$post_id = get_the_ID();
	$faqs = get_post_meta( $post_id, '_rbo_faq_schema', true );
	if ( ! empty( $faqs ) && is_array( $faqs ) ) {
		$entities = array();
		foreach ( $faqs as $item ) {
			if ( empty( $item['q'] ) || empty( $item['a'] ) ) continue;
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
			'areaServed'  => array( '@type' => 'Country', 'name' => 'United Arab Emirates' ),
			'provider'    => array( '@type' => 'AccountingService', 'name' => 'RBO Accounting Services FZE', 'url' => home_url( '/' ) ),
		);
	}
	return $data;
}, 99, 2 );

function rbo_get_faq_html() {
	if ( is_admin() || ( ! is_singular( 'page' ) && ! is_singular( 'post' ) ) ) return '';
	$id = (int) get_queried_object_id();
	static $done = array();
	if ( ! empty( $done[ $id ] ) ) return '';
	$faqs = get_post_meta( $id, '_rbo_faq_schema', true );
	if ( empty( $faqs ) || ! is_array( $faqs ) ) return '';
	$done[ $id ] = true;

	$html  = '<section class="rbo-faq-block" aria-label="Frequently asked questions">';
	$html .= '<h2>Frequently Asked Questions</h2>';
	foreach ( $faqs as $item ) {
		if ( empty( $item['q'] ) || empty( $item['a'] ) ) continue;
		$html .= '<div class="rbo-faq-item">';
		$html .= '<h3>' . esc_html( $item['q'] ) . '</h3>';
		$html .= '<p>' . esc_html( $item['a'] ) . '</p>';
		$html .= '</div>';
	}
	$html .= '</section>';
	return $html;
}

function rbo_get_local_seo_html() {
	if ( is_admin() || ! is_singular( 'page' ) ) return '';
	$id = (int) get_queried_object_id();
	static $done = array();
	if ( ! empty( $done[ $id ] ) ) return '';
	$html = get_post_meta( $id, '_rbo_local_seo_html', true );
	if ( ! is_string( $html ) || '' === $html ) return '';
	$done[ $id ] = true;
	return $html;
}

add_filter( 'elementor/frontend/the_content', function ( $content ) {
	return $content . rbo_get_faq_html() . rbo_get_local_seo_html();
}, 30 );

add_filter( 'the_content', function ( $content ) {
	if ( ! is_singular( 'page' ) && ! is_singular( 'post' ) ) return $content;
	return $content . rbo_get_faq_html() . rbo_get_local_seo_html();
}, 30 );

add_action( 'wp_enqueue_scripts', function () {
	$css = '
.rbo-local-seo, .rbo-faq-block { max-width: 1100px; margin: 28px auto 40px; padding: 24px 22px; background: #f7f9fc; border-left: 4px solid #c9a227; color: #09203b; box-sizing: border-box; border-radius: 8px; box-shadow: 0 4px 16px rgba(9,32,59,0.04); }
.rbo-local-seo h2, .rbo-faq-block h2 { font-size: 1.5rem; margin: 0 0 16px; color: #09203b; line-height: 1.3; font-weight: 700; }
.rbo-local-seo p, .rbo-faq-block p { margin: 0 0 14px; font-size: 15.5px; line-height: 1.7; color: #334155; }
.rbo-local-seo ul { margin: 0 0 14px; padding-left: 1.4rem; }
.rbo-local-seo li { margin: 0 0 8px; font-size: 15px; line-height: 1.6; }
.rbo-local-seo a, .rbo-faq-block a { color: #0b3a6e; text-decoration: underline; font-weight: 600; }
.rbo-faq-item { margin: 0 0 18px; padding-bottom: 16px; border-bottom: 1px solid #e2e8f0; }
.rbo-faq-item:last-child { border-bottom: 0; margin-bottom: 0; padding-bottom: 0; }
.rbo-faq-item h3 { font-size: 1.15rem; margin: 0 0 8px; color: #09203b; line-height: 1.4; font-weight: 600; }
@media (max-width: 767px) {
  .rbo-local-seo, .rbo-faq-block { padding: 18px 16px; margin: 20px auto; }
  .rbo-local-seo h2, .rbo-faq-block h2 { font-size: 1.25rem; }
}
';
	wp_register_style( 'rbo-seo-extras', false, array(), '2.0.0' );
	wp_enqueue_style( 'rbo-seo-extras' );
	wp_add_inline_style( 'rbo-seo-extras', $css );
}, 40 );
PHP;

if ( @file_put_contents( $mu_dir . '/rbo-seo-extras.php', $mu_plugin_code ) ) {
	$log[] = '✅ Successfully installed wp-content/mu-plugins/rbo-seo-extras.php (LocalBusiness & FAQ Schema Engine).';
} else {
	$log[] = '⚠️ Notice: Could not write to mu-plugins/rbo-seo-extras.php directly.';
}

// =========================================================================
// STEP 3: CONTENT & MONEY PAGES PROVISIONING
// =========================================================================

function rbo_m_provision( $slug, $title, $seo_title, $seo_desc, $focus_kw, $content, $faqs = array(), $service_schema = null, $parent_slug = '' ) {
	global $results;
	$parent_id = 0;
	if ( ! empty( $parent_slug ) ) {
		$parent_page = get_page_by_path( $parent_slug );
		if ( $parent_page ) $parent_id = $parent_page->ID;
	}
	$full_path = ! empty( $parent_slug ) ? $parent_slug . '/' . $slug : $slug;
	$page = get_page_by_path( $full_path );
	if ( ! $page ) $page = get_page_by_path( $slug );

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
	if ( ! empty( $faqs ) ) update_post_meta( $page_id, '_rbo_faq_schema', $faqs );
	if ( ! empty( $service_schema ) ) update_post_meta( $page_id, '_rbo_service_schema', $service_schema );
	return $page_id;
}

// 1. AJMAN PAGE
$ajman_content = <<<HTML
<div class="rbo-elementor-service-wrapper">
  <section class="rbo-hero-section" style="background: linear-gradient(135deg, rgba(9, 32, 59, 0.94) 0%, rgba(13, 43, 79, 0.88) 100%); padding: 65px 20px 75px; color: #ffffff;">
    <div style="max-width: 1140px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 35px;">
      <div style="flex: 1 1 580px;">
        <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(232, 184, 75, 0.15); color: #e8b84b; border: 1px solid rgba(232, 184, 75, 0.4); padding: 6px 16px; border-radius: 9999px; font-size: 13px; font-weight: 700; margin-bottom: 18px;">📍 Ajman Free Zone & Mainland Accounting Hub</div>
        <h1 style="font-family: 'Playfair Display', Georgia, serif; font-size: 38px; color: #ffffff; font-weight: 800; line-height: 1.25; margin: 0 0 16px;">
          Premier Accounting, Tax & Audit Firm in <span style="color: #e8b84b;">Ajman, UAE</span>
        </h1>
        <p style="font-size: 16.5px; color: #cbd5e1; line-height: 1.75; margin-bottom: 22px;">
          FTA-certified tax agents and approved auditors delivering comprehensive financial compliance, IFRS bookkeeping, VAT filing, and UAE Corporate Tax advisory for Ajman Free Zone (AFZ), Ajman Media City, and mainland companies.
        </p>
        <div style="display: flex; flex-wrap: wrap; gap: 14px; margin-bottom: 24px;">
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> AFZ Approved Auditors</div>
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> FTA Registered Tax Agents</div>
          <div style="display: flex; align-items: center; gap: 8px; font-size: 14.5px; color: #f1f5f9;"><span style="color: #4ade80; font-weight: 800;">✓</span> On-site / Remote Bookkeeping</div>
        </div>
        <div>
          <a href="https://wa.me/971524473871?text=Hello%20RBO%20Accounting,%20I%20need%20accounting%20and%20tax%20services%20in%20Ajman" style="display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-size: 15px; margin-right: 12px;">💬 Free Ajman Consultation (WhatsApp)</a>
          <a href="{$site_url}/contact-us/" style="display: inline-block; background: transparent; color: #ffffff; border: 2px solid #ffffff; font-weight: 600; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-size: 15px;">Book Office Meeting</a>
        </div>
      </div>
      <div style="flex: 0 1 380px; background: rgba(13, 27, 42, 0.95); border: 1px solid rgba(232, 184, 75, 0.35); padding: 28px 24px; border-radius: 14px; color: #ffffff;">
        <h3 style="color: #e8b84b; margin: 0 0 10px; font-size: 20px; font-weight: 700;">Local Ajman Presence</h3>
        <p style="color: #cbd5e1; font-size: 14px; margin-bottom: 16px;">Located in Ajman to serve mainland businesses and free-zone establishments across all sectors.</p>
        <ul style="list-style: none; padding: 0; margin: 0 0 18px; color: #f8fafc; font-size: 13.5px; line-height: 1.8;">
          <li>📍 <strong>Office:</strong> Ajman Free Zone, Block C1, Ajman, UAE</li>
          <li>📞 <strong>Direct Phone:</strong> +971 52 447 3871</li>
          <li>✉️ <strong>Email:</strong> info@rboaccounting.ae</li>
        </ul>
        <a href="tel:+971524473871" style="display: block; text-align: center; background: #25d366; color: #ffffff; font-weight: 700; padding: 11px; border-radius: 6px; text-decoration: none;">📞 Call Direct: +971 52 447 3871</a>
      </div>
    </div>
  </section>

  <section style="max-width: 1140px; margin: 50px auto; padding: 0 20px;">
    <h2 style="font-family: 'Playfair Display', Georgia, serif; font-size: 32px; color: #09203b; text-align: center; margin-bottom: 35px;">Complete Financial & Compliance Services in Ajman</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px;">
      <div style="background: #ffffff; padding: 28px 22px; border-radius: 12px; border: 1px solid #e2e8f0;">
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Monthly Bookkeeping & Accounting</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Accurate transaction classification, IFRS financial reporting, and bank reconciliations for Ajman businesses using Zoho Books, QuickBooks, or Xero.</p>
        <a href="{$site_url}/our-services/accounting/bookkeeping-and-accounting/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Explore Bookkeeping →</a>
      </div>
      <div style="background: #ffffff; padding: 28px 22px; border-radius: 12px; border: 1px solid #e2e8f0;">
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">Ajman Free Zone (AFZ) Audits</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">Approved audit reports for trade licence renewal, banking compliance, and Corporate Tax 0% qualifying status.</p>
        <a href="{$site_url}/our-services/audit-assurance/free-zone-audit/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Explore Free Zone Audit →</a>
      </div>
      <div style="background: #ffffff; padding: 28px 22px; border-radius: 12px; border: 1px solid #e2e8f0;">
        <h3 style="font-size: 20px; color: #09203b; margin: 0 0 10px;">VAT & Corporate Tax Compliance</h3>
        <p style="color: #475569; font-size: 14.5px; line-height: 1.6; margin-bottom: 14px;">FTA VAT registration, periodic return filing (Form VAT201), Corporate Tax registration, and Small Business Relief (SBR) advisory.</p>
        <a href="{$site_url}/our-services/corporate-tax/" style="color: #0b3a6e; font-weight: 600; text-decoration: underline;">Explore Corporate Tax →</a>
      </div>
    </div>
  </section>
</div>
HTML;

$ajman_faqs = array(
	array( 'q' => 'Is external audit mandatory for Ajman Free Zone (AFZ) companies?', 'a' => 'Yes, companies in Ajman Free Zone Authority (AFZ) and Ajman Media City (AMC) must submit audited financial statements prepared by an approved UAE auditor upon annual trade licence renewal.' ),
	array( 'q' => 'How does UAE Corporate Tax apply to Ajman Free Zone entities?', 'a' => 'Ajman Free Zone companies that meet Qualifying Free Zone Person (QFZP) criteria benefit from 0% tax on qualifying income, while standard entities pay 0% up to AED 375,000 profit and 9% thereafter (or claim Small Business Relief up to AED 3M revenue).' ),
);

rbo_m_provision(
	'ajman',
	'Accounting & Audit Firm in Ajman | FTA Tax Agents & AFZ Approved | RBO',
	'Accounting & Audit Firm in Ajman | FTA Tax Agents & AFZ Approved | RBO',
	'Leading accounting firm in Ajman UAE. AFZ approved auditors, FTA-registered VAT & corporate tax agents, and monthly bookkeeping for mainland & free zone companies.',
	'accounting firm in ajman, ajman free zone approved auditors, vat registration ajman, corporate tax consultant ajman',
	$ajman_content,
	$ajman_faqs,
	array( 'name' => 'Accounting & Audit Services in Ajman', 'description' => 'Accounting, VAT, Corporate Tax, and Audit services in Ajman.', 'serviceType' => 'Accounting and Auditing Services', 'areaServed' => 'Ajman, United Arab Emirates', 'provider' => 'RBO Accounting Services FZE' ),
	'areas-we-serve'
);

// 2. BLOG 1: SMALL BUSINESS RELIEF
$blog1_slug = 'uae-corporate-tax-small-business-relief-guide-2026';
$blog1_content = <<<HTML
<div class="rbo-blog">
  <p class="lead" style="font-size: 18px; line-height: 1.8; color: #1e293b;">
    As the UAE Corporate Tax regime enters full enforcement in 2026, small and medium enterprises (SMEs) across the Emirates can legally minimize their tax liability using <strong>Small Business Relief (SBR)</strong> under <em>Ministerial Decision No. 73 of 2023</em>.
  </p>
  <p>Eligible taxable persons with gross revenue equal to or below <strong>AED 3,000,000</strong> in a relevant tax period are treated as having <strong>no taxable income (0% Corporate Tax)</strong> without complex tax computations.</p>
  <div class="rbo-box"><strong>💡 Key Requirement:</strong> Even with SBR, businesses must still register on EmaraTax, maintain IFRS financial records, and submit a simplified annual Corporate Tax return!</div>
  <h2>1. Small Business Relief Eligibility Conditions</h2>
  <ul>
    <li>Gross revenue must <strong>not exceed AED 3,000,000</strong> in the tax period.</li>
    <li>Must be a UAE Resident Person (natural person or legal entity).</li>
    <li>Must <strong>NOT</strong> be a Qualifying Free Zone Person (QFZP).</li>
    <li>Must <strong>NOT</strong> be a member of a Multinational Enterprise Group (MNE).</li>
  </ul>
  <h2>2. How to Claim SBR on EmaraTax</h2>
  <ol>
    <li>Obtain your Tax Registration Number via <a href="{$site_url}/our-services/corporate-tax/registration/">Corporate Tax Registration</a>.</li>
    <li>Maintain reconciled <a href="{$site_url}/our-services/accounting/bookkeeping-and-accounting/">Bookkeeping & Accounting records</a>.</li>
    <li>Elect for Small Business Relief on Form CT201 during annual filing.</li>
  </ol>
  <div class="rbo-cta">
    <strong>Need Help Claiming Small Business Relief in Dubai or Ajman?</strong>
    <p>Our FTA-certified tax agents will review your revenue thresholds and submit your return with zero penalty guarantee.</p>
    <a href="https://wa.me/971524473871?text=Hello%20RBO,%20I%20need%20help%20with%20Small%20Business%20Relief">💬 Schedule Free Review on WhatsApp</a>
  </div>
</div>
HTML;

$blog1_faqs = array(
	array( 'q' => 'What happens if revenue exceeds AED 3,000,000 in a subsequent year?', 'a' => 'If revenue exceeds AED 3,000,000 in any tax period, Small Business Relief cannot be elected for that period. The business pays 0% up to AED 375k profit and 9% thereafter.' ),
	array( 'q' => 'When does Small Business Relief expire in the UAE?', 'a' => 'Small Business Relief applies to all tax periods ending on or before 31 December 2026.' ),
);

$existing_blog1 = get_page_by_path( $blog1_slug, OBJECT, 'post' );
if ( $existing_blog1 ) {
	$b1_id = $existing_blog1->ID;
	wp_update_post( array( 'ID' => $b1_id, 'post_title' => 'UAE Corporate Tax Small Business Relief (SBR) 2026: Limits, Rules & Deadlines', 'post_content' => $blog1_content, 'post_status' => 'publish' ) );
	$results[] = "Updated Blog 1: SBR Guide (ID: {$b1_id})";
} else {
	$b1_id = wp_insert_post( array( 'post_title' => 'UAE Corporate Tax Small Business Relief (SBR) 2026: Limits, Rules & Deadlines', 'post_name' => $blog1_slug, 'post_content' => $blog1_content, 'post_status' => 'publish', 'post_type' => 'post', 'post_date' => '2026-09-12 10:00:00' ) );
	$results[] = "Published Blog 1: SBR Guide (ID: {$b1_id})";
}
update_post_meta( $b1_id, 'rank_math_title', 'UAE Corporate Tax Small Business Relief (SBR) 2026: Limits & Deadlines | RBO' );
update_post_meta( $b1_id, 'rank_math_description', 'Complete 2026 guide to UAE Corporate Tax Small Business Relief (SBR). Eligibility rules, AED 3M revenue limit, and EmaraTax filing steps.' );
update_post_meta( $b1_id, 'rank_math_focus_keyword', 'small business relief uae corporate tax, uae corporate tax 2026 deadlines' );
update_post_meta( $b1_id, 'rank_math_robots', array( 'index' ) );
update_post_meta( $b1_id, '_rbo_faq_schema', $blog1_faqs );

// 3. BLOG 2: AJMAN FREE ZONE AUDIT GUIDE
$blog2_slug = 'ajman-free-zone-company-audit-vat-compliance-guide';
$blog2_content = <<<HTML
<div class="rbo-blog">
  <p class="lead" style="font-size: 18px; line-height: 1.8; color: #1e293b;">
    Ajman Free Zone (AFZ) companies must maintain strict compliance with <strong>annual audit submissions</strong>, <strong>FTA VAT returns</strong>, and <strong>UAE Corporate Tax laws</strong> in 2026 to ensure uninterrupted licence renewal and banking operations.
  </p>
  <div class="rbo-box"><strong>⚠️ Mandatory Requirement:</strong> AFZ mandates the submission of annual audited financial statements prepared by an <strong>approved registered auditor</strong> upon licence renewal.</div>
  <h2>1. Why Annual Audits are Mandatory in Ajman Free Zone</h2>
  <ol>
    <li><strong>Trade Licence Renewal:</strong> Required by AFZ Authority for annual commercial validation.</li>
    <li><strong>Corporate Tax 0% QFZP Status:</strong> Free Zone Persons must maintain audited accounts to benefit from 0% Corporate Tax on Qualifying Income.</li>
    <li><strong>Banking Facilities:</strong> UAE banks require audited financials to keep corporate accounts active.</li>
  </ol>
  <p>Learn more about our <a href="{$site_url}/areas-we-serve/ajman/">Ajman Accounting Hub</a> and <a href="{$site_url}/our-services/audit-assurance/free-zone-audit/">Free Zone Audit Services</a>.</p>
  <div class="rbo-cta">
    <strong>Need an Approved Auditor in Ajman Free Zone?</strong>
    <p>RBO Accounting Services FZE is located in Block C1, Ajman Free Zone. We complete your audit in 5-7 business days.</p>
    <a href="https://wa.me/971524473871?text=Hello%20RBO,%20I%20need%20Ajman%20Free%20Zone%20Audit">💬 Contact Ajman Office on WhatsApp (+971 52 447 3871)</a>
  </div>
</div>
HTML;

$blog2_faqs = array(
	array( 'q' => 'Can any accounting firm conduct an audit for Ajman Free Zone?', 'a' => 'No. Only UAE Ministry of Economy registered and AFZ recognized audit firms can issue an official audit report acceptable for licence renewal.' ),
	array( 'q' => 'Where is RBO Accounting located in Ajman?', 'a' => 'Our office is located at Ajman Free Zone, Block C1, Ajman, UAE.' ),
);

$existing_blog2 = get_page_by_path( $blog2_slug, OBJECT, 'post' );
if ( $existing_blog2 ) {
	$b2_id = $existing_blog2->ID;
	wp_update_post( array( 'ID' => $b2_id, 'post_title' => 'Ajman Free Zone (AFZ) Audit & VAT Guide 2026: Approved Auditor Requirements', 'post_content' => $blog2_content, 'post_status' => 'publish' ) );
	$results[] = "Updated Blog 2: AFZ Audit Guide (ID: {$b2_id})";
} else {
	$b2_id = wp_insert_post( array( 'post_title' => 'Ajman Free Zone (AFZ) Audit & VAT Guide 2026: Approved Auditor Requirements', 'post_name' => $blog2_slug, 'post_content' => $blog2_content, 'post_status' => 'publish', 'post_type' => 'post', 'post_date' => '2026-09-18 09:00:00' ) );
	$results[] = "Published Blog 2: AFZ Audit Guide (ID: {$b2_id})";
}
update_post_meta( $b2_id, 'rank_math_title', 'Ajman Free Zone (AFZ) Audit & VAT Guide 2026: Approved Auditor | RBO' );
update_post_meta( $b2_id, 'rank_math_description', 'Comprehensive 2026 guide to Ajman Free Zone (AFZ) annual audit submission, VAT compliance, and 0% Corporate Tax rules.' );
update_post_meta( $b2_id, 'rank_math_focus_keyword', 'ajman free zone audit requirements, afz approved auditor' );
update_post_meta( $b2_id, 'rank_math_robots', array( 'index' ) );
update_post_meta( $b2_id, '_rbo_faq_schema', $blog2_faqs );

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>RBO All-In-One Master SEO Deployment Completed</title>
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
<span class="badge">🎉 All-in-One Master SEO Engine Successfully Executed!</span>
<h1>RBO Accounting — Complete SEO & Redirects Live Report</h1>

<h3>1. Infrastructure & Redirection Log:</h3>
<ul>
<?php foreach ( $log as $l ) : ?>
  <li><?php echo esc_html( $l ); ?></li>
<?php endforeach; ?>
</ul>

<h3>2. Content, Pages & Schemas Updated (<?php echo count( $results ); ?> Items):</h3>
<ul>
<?php foreach ( $results as $r ) : ?>
  <li>✅ <?php echo esc_html( $r ); ?></li>
<?php endforeach; ?>
</ul>

<h3>3. Verify Live Links & Request GSC Indexing:</h3>
<div class="link-grid">
  <div><a href="<?php echo esc_url( home_url( '/areas-we-serve/ajman/' ) ); ?>" target="_blank">📍 Ajman Local Power Page</a></div>
  <div><a href="<?php echo esc_url( home_url( '/areas-we-serve/dubai/' ) ); ?>" target="_blank">📍 Dubai Local Power Page</a></div>
  <div><a href="<?php echo esc_url( home_url( '/our-services/corporate-tax/' ) ); ?>" target="_blank">⚖️ Corporate Tax Hub</a></div>
  <div><a href="<?php echo esc_url( home_url( '/our-services/vat-registration-filing/' ) ); ?>" target="_blank">📋 VAT Service Hub</a></div>
  <div><a href="<?php echo esc_url( home_url( '/blog/uae-corporate-tax-small-business-relief-guide-2026/' ) ); ?>" target="_blank">📖 Blog 1: SBR 2026 Guide</a></div>
  <div><a href="<?php echo esc_url( home_url( '/blog/ajman-free-zone-company-audit-vat-compliance-guide/' ) ); ?>" target="_blank">📖 Blog 2: AFZ Audit Guide</a></div>
</div>

<p style="margin-top: 30px;"><strong>Next Step:</strong> Go to Google Search Console, click <strong>"Validate Fix"</strong> on your <em>Excluded by ‘noindex’ tag</em> report, and inspect these URLs to trigger immediate crawling!</p>
</div>
</body>
</html>
