<?php
/**
 * Plugin Name: RBO SEO Extras, UAE Geo-Targeting, Live Maps & Universal Mobile Responsiveness Engine
 * Description: Master 301 redirects, UAE Geo-Targeting (en-AE, geo.region, hreflang), sitewide LocalBusiness schema, FAQ/Service JSON-LD, UAE coverage maps fast-loader, and universal mobile responsiveness for 100% of pages.
 * Version: 2.6.0
 * Author: RBO Accounting Services FZE
 */

defined( 'ABSPATH' ) || exit;

/**
 * 1. Force UAE HTML Language & Locale (en-AE)
 */
add_filter(
	'language_attributes',
	function ( $output ) {
		return 'lang="en-AE"';
	},
	99
);

/**
 * 2. UAE Geo-Targeting, OpenGraph & Search Console Verification Meta Tags
 */
add_action(
	'wp_head',
	function () {
		$current_url = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		?>
<!-- Google Search Console Verification -->
<meta name="google-site-verification" content="OO2yx1wSe7bvwRJz4DF8Ml1w5i2lOylQ_Tm1mX6W_9k" />

<!-- UAE Regional Geo-Targeting Tags -->
<meta name="geo.region" content="AE" />
<meta name="geo.placename" content="Ajman, Dubai, United Arab Emirates" />
<meta name="geo.position" content="25.405216;55.513643" />
<meta name="ICBM" content="25.405216, 55.513643" />
<meta name="target_country" content="AE" />

<!-- UAE Regional Hreflang -->
<link rel="alternate" href="<?php echo esc_url( $current_url ); ?>" hreflang="en-ae" />
<link rel="alternate" href="<?php echo esc_url( $current_url ); ?>" hreflang="x-default" />

<!-- UAE OpenGraph Locale -->
<meta property="og:locale" content="en_AE" />
<meta property="og:country_name" content="United Arab Emirates" />
		<?php
	},
	1
);

/**
 * 3. 301 Permanent Redirect Handler (Fixes GSC 28 'noindex' Exclusions & 404s)
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
 * 4. Sitewide LocalBusiness / AccountingService Schema (Head Only)
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
			'priceRange'      => 'AED',
			'currenciesAccepted' => 'AED',
			'paymentAccepted' => 'Cash, Credit Card, Bank Transfer',
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
				'latitude'  => 25.405216,
				'longitude' => 55.513643,
			),
			'areaServed'      => array(
				array( '@type' => 'Country', 'name' => 'United Arab Emirates' ),
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
	},
	10
);

/**
 * 5. FAQ & Service JSON-LD Schema (Rendered invisibly in Head for Googlebot Rich Snippets)
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
 * 6. Master Sitewide Universal Mobile Responsiveness Engine
 * Eliminates horizontal scroll, scales typography, optimizes headers, cards, tables & forms across all devices.
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		$css = '
/* =========================================================================
   1. GLOBAL VIEWPORT & OVERFLOW CONTROL (Zero Horizontal Scroll)
   ========================================================================= */
html, body {
  overflow-x: hidden !important;
  max-width: 100% !important;
  width: 100% !important;
  box-sizing: border-box !important;
  -webkit-text-size-adjust: 100%;
}
*, *:before, *:after {
  box-sizing: border-box !important;
}
img, video, iframe, svg, canvas {
  max-width: 100% !important;
  height: auto !important;
}

/* =========================================================================
   FOOTER LOGO & SERVICES ALIGNMENT (48px)
   ========================================================================= */
body:not(.elementor-editor-active) footer img[src*="download-1"],
body:not(.elementor-editor-active) footer .elementor-widget-theme-site-logo img,
body:not(.elementor-editor-active) .elementor-location-footer img[src*="download-1"],
body:not(.elementor-editor-active) .elementor-location-footer .elementor-widget-theme-site-logo img,
body:not(.elementor-editor-active) .elementor-element-24c19e2 img,
footer img[src*="download-1"],
footer .wp-image-1445,
.elementor-location-footer .elementor-element-24c19e2 img,
footer .attachment-full.size-full.wp-image-1445 {
  max-width: 48px !important;
  width: 48px !important;
  height: auto !important;
  object-fit: contain !important;
  display: block !important;
  margin-bottom: 12px !important;
}
.elementor-editor-active .elementor-element-24c19e2 img {
  max-width: 100%;
}
.elementor-location-footer .elementor-element-c0125b4 .elementor-icon-list-icon,
footer .elementor-element-c0125b4 .elementor-icon-list-icon {
  display: none !important;
}
.elementor-location-footer .elementor-element-c0125b4 .elementor-icon-list-item,
.elementor-location-footer .elementor-element-c0125b4 .elementor-icon-list-item a,
footer .elementor-element-c0125b4 .elementor-icon-list-item,
footer .elementor-element-c0125b4 .elementor-icon-list-item a {
  padding-left: 0 !important;
  margin-left: 0 !important;
  text-indent: 0 !important;
}

/* =========================================================================
   2. HEADER & NAVIGATION MOBILE OPTIMIZATIONS (< 768px)
   ========================================================================= */
@media (max-width: 767px) {
  /* ── HEADER WRAPPER: sticky white bar ── */
  header.elementor-5241,
  header.elementor-location-header,
  .elementor-location-header {
    position: sticky !important;
    top: 0 !important;
    z-index: 99999 !important;
    overflow: visible !important;
    width: 100% !important;
    background: #ffffff !important;
    box-shadow: 0 2px 8px rgba(9, 32, 59, 0.12) !important;
  }

  /* ── MAIN HEADER ROW (98a0aca): force horizontal, no wrap ── */
  .elementor-element-98a0aca,
  .elementor-element.elementor-element-98a0aca,
  .elementor-location-header .e-con-inner {
    display: flex !important;
    flex-direction: row !important;
    flex-wrap: nowrap !important;
    --flex-direction: row !important;
    --flex-wrap-mobile: nowrap !important;
    justify-content: space-between !important;
    align-items: center !important;
    padding: 8px 14px !important;
    width: 100% !important;
    max-width: 100% !important;
    min-height: 56px !important;
    box-sizing: border-box !important;
    gap: 8px !important;
    overflow: visible !important;
    position: relative !important;
  }

  /* ── LOGO CONTAINER (f22dfcf): left side ── */
  .elementor-element-98a0aca > .elementor-element-f22dfcf,
  .elementor-element.elementor-element-f22dfcf {
    display: flex !important;
    align-items: center !important;
    flex: 0 0 auto !important;
    width: auto !important;
    max-width: 48% !important;
    min-width: 0 !important;
    padding: 0 !important;
    margin: 0 !important;
    justify-content: flex-start !important;
    overflow: visible !important;
    --width: auto !important;
  }
  .elementor-element-1b09eee {
    width: auto !important;
    max-width: 100% !important;
    padding: 0 !important;
    margin: 0 !important;
  }
  .elementor-element-1b09eee img,
  .elementor-location-header .elementor-widget-theme-site-logo img {
    width: auto !important;
    max-height: 38px !important;
    max-width: 125px !important;
    height: auto !important;
    display: block !important;
    object-fit: contain !important;
  }

  /* ── CTA BUTTON (828eb16) ── */
  .elementor-element-98a0aca > .elementor-element-828eb16,
  .elementor-element.elementor-element-828eb16 {
    display: flex !important;
    align-items: center !important;
    flex: 0 0 auto !important;
    width: auto !important;
    margin-left: auto !important;
    margin-right: 4px !important;
    padding: 0 !important;
  }
  .elementor-element-154ac3e .elementor-button,
  .elementor-location-header .elementor-button {
    padding: 7px 11px !important;
    font-size: 11px !important;
    font-weight: 700 !important;
    line-height: 1.2 !important;
    white-space: nowrap !important;
    border-radius: 6px !important;
    background: #e8b84b !important;
    color: #09203b !important;
  }

  /* ── NAV / HAMBURGER CONTAINER (c7f9cbf) ── */
  .elementor-element-98a0aca > .elementor-element-c7f9cbf,
  .elementor-element.elementor-element-c7f9cbf {
    display: flex !important;
    align-items: center !important;
    justify-content: flex-end !important;
    flex: 0 0 auto !important;
    width: auto !important;
    min-width: 0 !important;
    padding: 0 !important;
    margin: 0 !important;
    overflow: visible !important;
    position: static !important;
    --width: auto !important;
  }

  .elementor-element.elementor-element-18681ca,
  .elementor-widget-nav-menu {
    position: static !important;
    overflow: visible !important;
    width: auto !important;
    flex-shrink: 0 !important;
  }

  /* Hamburger Button */
  .elementor-menu-toggle {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    width: 38px !important;
    height: 38px !important;
    padding: 6px !important;
    margin: 0 !important;
    border-radius: 6px !important;
    background: #09203b !important;
    border: none !important;
    cursor: pointer !important;
    color: #ffffff !important;
  }
  .elementor-menu-toggle i,
  .elementor-menu-toggle svg {
    width: 20px !important;
    height: 20px !important;
    fill: #ffffff !important;
    color: #ffffff !important;
  }
  .elementor-menu-toggle.elementor-active {
    background: #c9a227 !important;
  }

  /* Dropdown Menu Flyout Container */
  .elementor-nav-menu--dropdown.elementor-nav-menu__container,
  .elementor-location-header .elementor-nav-menu--dropdown.elementor-nav-menu__container {
    position: absolute !important;
    top: 100% !important;
    left: 0 !important;
    right: 0 !important;
    width: 100% !important;
    max-width: 100% !important;
    background: #0d1b2a !important;
    border-top: 3px solid #c9a227 !important;
    box-shadow: 0 16px 40px rgba(9, 32, 59, 0.4) !important;
    z-index: 999999 !important;
    padding: 8px 0 16px !important;
    box-sizing: border-box !important;
    border-radius: 0 0 12px 12px !important;
    max-height: calc(100vh - 56px) !important;
    overflow-y: auto !important;
  }

  .elementor-nav-menu--dropdown ul.elementor-nav-menu {
    display: flex !important;
    flex-direction: column !important;
    width: 100% !important;
    padding: 0 !important;
    margin: 0 !important;
    list-style: none !important;
    background: transparent !important;
  }

  .elementor-nav-menu--dropdown li.menu-item {
    width: 100% !important;
    display: block !important;
    border-bottom: 1px solid rgba(255,255,255,0.08) !important;
    margin: 0 !important;
    padding: 0 !important;
  }
  .elementor-nav-menu--dropdown li.menu-item:last-child {
    border-bottom: none !important;
  }

  .elementor-nav-menu--dropdown a.elementor-item,
  .elementor-nav-menu--dropdown a {
    display: flex !important;
    align-items: center !important;
    padding: 12px 18px !important;
    font-size: 15px !important;
    font-weight: 600 !important;
    color: #ffffff !important;
    text-decoration: none !important;
    width: 100% !important;
    box-sizing: border-box !important;
  }

  .elementor-nav-menu--dropdown a.elementor-item:hover,
  .elementor-nav-menu--dropdown a.elementor-item-active,
  .elementor-nav-menu--dropdown a.highlighted {
    color: #e8b84b !important;
    background: rgba(232, 184, 75, 0.1) !important;
  }

  .elementor-nav-menu--dropdown ul.sub-menu {
    background: #08131e !important;
    padding: 4px 0 4px 14px !important;
  }
  .elementor-nav-menu--dropdown ul.sub-menu a.elementor-sub-item {
    font-size: 13.5px !important;
    color: #cbd5e1 !important;
    padding: 9px 18px !important;
  }
  .elementor-nav-menu--dropdown ul.sub-menu a.elementor-sub-item:hover {
    color: #e8b84b !important;
  }
}

/* =========================================================================
   3. UNIVERSAL TYPOGRAPHY & HEADING SCALING (< 768px)
   ========================================================================= */
@media (max-width: 767px) {
  h1, .elementor-heading-title.elementor-size-xl, .elementor-heading-title.elementor-size-xxl {
    font-size: clamp(22px, 6vw, 28px) !important;
    line-height: 1.25 !important;
    word-break: break-word !important;
  }
  h2, .elementor-heading-title.elementor-size-large {
    font-size: clamp(19px, 5vw, 24px) !important;
    line-height: 1.3 !important;
    word-break: break-word !important;
  }
  h3, .elementor-heading-title.elementor-size-medium {
    font-size: clamp(16px, 4vw, 20px) !important;
    line-height: 1.35 !important;
    word-break: break-word !important;
  }
  h4, h5, h6 {
    font-size: 15px !important;
    line-height: 1.4 !important;
    word-break: break-word !important;
  }
  p, li, span {
    word-break: break-word !important;
    overflow-wrap: break-word !important;
  }
}

/* =========================================================================
   4. CONTAINERS, GRIDS & HOMEPAGE HERO (< 1024px & < 767px)
   ========================================================================= */
@media (max-width: 1024px) {
  .elementor-section.elementor-section-boxed > .elementor-container,
  .e-con.e-con-boxed > .e-con-inner {
    max-width: 100% !important;
    padding-left: 16px !important;
    padding-right: 16px !important;
  }
}

@media (max-width: 767px) {
  .e-con, .e-con-inner, .elementor-row, .elementor-container {
    width: 100% !important;
    max-width: 100% !important;
    padding-left: 12px !important;
    padding-right: 12px !important;
    box-sizing: border-box !important;
    overflow: visible !important;
  }
  .elementor-column, .elementor-col-100, .elementor-col-50, .elementor-col-33, .elementor-col-25 {
    width: 100% !important;
    flex: 0 0 100% !important;
    max-width: 100% !important;
  }

  /* Homepage Hero section (4ccdd10e) */
  .elementor-172 .elementor-element.elementor-element-4ccdd10e {
    flex-direction: column !important;
    padding-top: 45px !important;
    padding-bottom: 45px !important;
    padding-left: 14px !important;
    padding-right: 14px !important;
    min-height: auto !important;
  }
  .elementor-172 .elementor-element.elementor-element-4ccdd10e > .e-con-inner {
    flex-direction: column !important;
    width: 100% !important;
    max-width: 100% !important;
    padding: 0 !important;
    gap: 20px !important;
  }
  .elementor-172 .elementor-element.elementor-element-4ccdd10e > .e-con-inner > .e-con {
    width: 100% !important;
    max-width: 100% !important;
    flex: 0 0 100% !important;
  }
  .elementor-172 .elementor-element.elementor-element-4ccdd10e .elementor-widget-heading .elementor-heading-title {
    font-size: 26px !important;
    line-height: 1.25 !important;
  }
}

/* =========================================================================
   5. TABLES & COMPARISON MATRICES RESPONSIVENESS
   ========================================================================= */
table {
  width: 100% !important;
  border-collapse: collapse !important;
}
.rbo-table-wrap, .rbo-pricing-table-wrap {
  width: 100% !important;
  overflow-x: auto !important;
  -webkit-overflow-scrolling: touch !important;
  margin: 16px 0 !important;
}
@media (max-width: 767px) {
  table {
    display: block !important;
    width: 100% !important;
    overflow-x: auto !important;
    -webkit-overflow-scrolling: touch !important;
    margin: 16px 0 !important;
    font-size: 13px !important;
  }
  th, td {
    padding: 8px 10px !important;
    white-space: nowrap !important;
  }
}

/* =========================================================================
   6. BUSINESS SETUP & SERVICE TEMPLATES RESPONSIVENESS (< 768px)
   ========================================================================= */
@media (max-width: 767px) {
  .rbo-hero-section {
    width: 100% !important;
    max-width: 100% !important;
    left: 0 !important;
    right: 0 !important;
    margin: 0 !important;
    padding: 35px 14px 45px !important;
    box-sizing: border-box !important;
  }
  .rbo-hero-container {
    flex-direction: column !important;
    gap: 22px !important;
    width: 100% !important;
    max-width: 100% !important;
  }
  .rbo-hero-left, .rbo-hero-right {
    width: 100% !important;
    flex: 1 1 100% !important;
    max-width: 100% !important;
  }
  .rbo-hero-heading {
    font-size: 24px !important;
    line-height: 1.25 !important;
  }
  .rbo-consult-card {
    padding: 20px 14px !important;
    border-radius: 12px !important;
    width: 100% !important;
    box-sizing: border-box !important;
  }
  .rbo-body-container, .rbo-content-container {
    padding: 30px 12px 50px !important;
    width: 100% !important;
    max-width: 100% !important;
  }
  .rbo-trust-card {
    flex-direction: column !important;
    padding: 16px 14px !important;
    gap: 12px !important;
  }

  /* All Grids single column on mobile */
  .rbo-cards-grid-3,
  .rbo-cards-grid-2,
  .rbo-feature-grid,
  .rbo-scope-grid,
  .rbo-feature-checklist-grid,
  .rbo-pkg-grid,
  .rbo-process-grid,
  .rbo-steps-grid,
  .rbo-stats-grid,
  .rbo-pricing-cards {
    grid-template-columns: 1fr !important;
    width: 100% !important;
    max-width: 100% !important;
    gap: 16px !important;
  }

  /* Visual Showcases */
  .rbo-visual-showcase,
  .rbo-showcase-reverse {
    flex-direction: column !important;
    padding: 18px 14px !important;
    gap: 20px !important;
    border-radius: 14px !important;
  }
  .rbo-showcase-image-wrap,
  .rbo-showcase-content {
    flex: 1 1 100% !important;
    width: 100% !important;
    max-width: 100% !important;
  }

  .rbo-feature-box {
    padding: 22px 18px !important;
    border-radius: 12px !important;
  }

  .rbo-bottom-cta {
    padding: 28px 14px !important;
    margin: 28px 0 15px !important;
    border-radius: 14px !important;
  }
  .rbo-bottom-cta h2 {
    font-size: 22px !important;
  }
  .rbo-bottom-btn-group {
    flex-direction: column !important;
    gap: 10px !important;
  }
  .rbo-btn-gold-big,
  .rbo-btn-whatsapp-big,
  .rbo-btn-gold-full,
  .rbo-pkg-action-btn {
    width: 100% !important;
    text-align: center !important;
    padding: 12px 18px !important;
    box-sizing: border-box !important;
  }
}

/* =========================================================================
   7. BLOG ARCHIVE GRID & SINGLE POST RESPONSIVENESS (< 768px)
   ========================================================================= */
@media (max-width: 767px) {
  .elementor-posts-container {
    display: flex !important;
    flex-direction: column !important;
    gap: 22px !important;
    width: 100% !important;
    max-width: 100% !important;
  }
  .elementor-post {
    width: 100% !important;
    max-width: 100% !important;
    flex: 1 1 100% !important;
  }
  .elementor-post__thumbnail {
    aspect-ratio: 16/9 !important;
    height: auto !important;
    width: 100% !important;
    overflow: hidden !important;
    border-radius: 8px 8px 0 0 !important;
  }
  .elementor-post__thumbnail img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
  }
  .elementor-post__card {
    border-radius: 10px !important;
    overflow: hidden !important;
  }
}

/* Single Post Centered Article Card */
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
  padding: 24px 14px 44px !important;
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
  border-radius: 14px !important;
  box-shadow: 0 4px 24px rgba(9, 32, 59, 0.08) !important;
  padding: 10px !important;
  box-sizing: border-box !important;
}

.rbo-blog {
  max-width: 100% !important;
  padding: 24px 28px 36px !important;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
  color: #1e293b !important;
  line-height: 1.8 !important;
  font-size: 16px !important;
}
.rbo-blog h2 {
  font-family: "Playfair Display", Georgia, serif !important;
  font-size: 26px !important;
  color: #09203b !important;
  margin: 32px 0 14px !important;
  line-height: 1.3 !important;
  font-weight: 700 !important;
}
.rbo-blog h3 {
  font-size: 20px !important;
  color: #09203b !important;
  margin: 22px 0 10px !important;
  line-height: 1.4 !important;
  font-weight: 600 !important;
}
.rbo-blog p { margin: 0 0 18px !important; line-height: 1.8 !important; }
.rbo-blog ul, .rbo-blog ol { margin: 0 0 20px !important; padding-left: 22px !important; }
.rbo-blog li { margin-bottom: 8px !important; line-height: 1.7 !important; }
.rbo-blog a { color: #0b3a6e !important; font-weight: 600 !important; text-decoration: underline !important; }
.rbo-blog a:hover { color: #c9a227 !important; }

.rbo-blog .rbo-box {
  background: #fdfaf2 !important;
  border-left: 4px solid #c9a227 !important;
  border-radius: 0 8px 8px 0 !important;
  padding: 16px 20px !important;
  margin: 24px 0 !important;
  color: #334155 !important;
}
.rbo-blog .rbo-cta {
  background: #09203b !important;
  color: #ffffff !important;
  border-radius: 12px !important;
  padding: 22px 24px !important;
  margin: 28px 0 !important;
}
.rbo-blog .rbo-cta strong { font-size: 18px !important; color: #ffffff !important; display: block; margin-bottom: 8px; }
.rbo-blog .rbo-cta p { color: #cbd5e1 !important; margin-bottom: 16px !important; }
.rbo-blog .rbo-cta a {
  display: inline-block !important;
  background: #e8b84b !important;
  color: #09203b !important;
  font-weight: 700 !important;
  padding: 12px 22px !important;
  border-radius: 8px !important;
  text-decoration: none !important;
}

@media (max-width: 767px) {
  body.single-post .elementor-element-a920448 { padding: 16px 8px 30px !important; }
  .rbo-blog { padding: 14px 10px 22px !important; font-size: 15px !important; }
  .rbo-blog h2 { font-size: 20px !important; }
  .rbo-blog h3 { font-size: 17px !important; }
  .rbo-blog .rbo-cta a { width: 100% !important; text-align: center !important; }
}

/* =========================================================================
   8. UAE COVERAGE MAPS - 100% FULL-HEIGHT VIEWPORT & CONTAINER ALIGNMENT
   ========================================================================= */
.elementor-element-2a738b8 .e-n-tabs {
  align-items: stretch !important;
}
.elementor-element-2a738b8 .e-n-tabs-heading {
  flex: 0 0 240px !important;
  width: 240px !important;
  display: flex !important;
  flex-direction: column !important;
  gap: 8px !important;
}
.elementor-element-2a738b8 .e-n-tabs-content {
  flex: 1 1 auto !important;
  display: flex !important;
  flex-direction: column !important;
  min-height: 480px !important;
  height: 100% !important;
}
.elementor-element-2a738b8 .e-n-tabs-content > .e-con {
  flex: 1 1 100% !important;
  min-height: 480px !important;
  height: 100% !important;
  width: 100% !important;
}
.elementor-element-2a738b8 .e-n-tabs-content > .e-con.e-active {
  display: flex !important;
  flex-direction: column !important;
}
.elementor-element-2a738b8 .elementor-widget-google_maps,
.elementor-element-2a738b8 .elementor-widget-container,
.elementor-element-2a738b8 .elementor-custom-embed {
  flex: 1 1 100% !important;
  display: flex !important;
  flex-direction: column !important;
  min-height: 480px !important;
  height: 100% !important;
  width: 100% !important;
}
.elementor-element-2a738b8 iframe {
  width: 100% !important;
  min-height: 480px !important;
  height: 480px !important;
  border-radius: 8px !important;
  flex: 1 1 100% !important;
  display: block !important;
}
@media (max-width: 767px) {
  .elementor-element-2a738b8 .e-n-tabs-heading {
    width: 100% !important;
  }
  .elementor-element-2a738b8 .e-n-tabs-content,
  .elementor-element-2a738b8 .e-n-tabs-content > .e-con,
  .elementor-element-2a738b8 .elementor-widget-google_maps,
  .elementor-element-2a738b8 .elementor-widget-container,
  .elementor-element-2a738b8 .elementor-custom-embed,
  .elementor-element-2a738b8 iframe {
    min-height: 320px !important;
    height: 320px !important;
  }
}

/* Floating WhatsApp Fix */
.joinchat, .e-joinchat, [class*="whatsapp"], .chat-with-us {
  z-index: 99999 !important;
}
';
		wp_register_style( 'rbo-seo-extras', false, array(), '2.6.0' );
		wp_enqueue_style( 'rbo-seo-extras' );
		wp_add_inline_style( 'rbo-seo-extras', $css );
	},
	40
);

/**
 * 7. UAE Coverage Maps Speed & Full-Height Viewport Optimizer
 */
add_action(
	'wp_footer',
	function () {
		if ( ! is_front_page() ) {
			return;
		}
		?>
<script id="rbo-coverage-maps-fast-loader">
(function() {
	function setupCoverageMaps() {
		var tabWidget = document.querySelector('.elementor-element-2a738b8');
		if (!tabWidget) return;

		var tabs = tabWidget.querySelectorAll('.e-n-tabs-content > .e-con');
		var buttons = tabWidget.querySelectorAll('.e-n-tab-title');

		function ensureTabMap(idx) {
			var targetTab = tabs[idx - 1] || tabWidget.querySelector('#e-n-tab-content-44513464' + idx);
			if (!targetTab) return;
			var iframe = targetTab.querySelector('iframe');
			if (!iframe) return;

			if (iframe.getAttribute('data-lazy-map-src')) {
				iframe.src = iframe.getAttribute('data-lazy-map-src');
				iframe.removeAttribute('data-lazy-map-src');
			}
			iframe.style.height = '480px';
			iframe.style.minHeight = '480px';

			setTimeout(function() {
				window.dispatchEvent(new Event('resize'));
			}, 150);
		}

		buttons.forEach(function(btn) {
			var idx = parseInt(btn.getAttribute('data-tab-index'), 10);
			btn.addEventListener('click', function() {
				ensureTabMap(idx);
			});
			btn.addEventListener('mouseenter', function() {
				ensureTabMap(idx);
			});
		});

		// Trigger initial tab load
		ensureTabMap(1);
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', setupCoverageMaps);
	} else {
		setupCoverageMaps();
	}
})();
</script>
		<?php
	},
	99
);
