<?php
/**
 * Plugin Name: RBO SEO Extras, UAE Geo-Targeting, Live Maps & Universal Mobile Responsiveness Engine
 * Description: Master 301 redirects, UAE Geo-Targeting (en-AE, geo.region, hreflang), sitewide LocalBusiness schema, FAQ/Service JSON-LD, UAE coverage maps fast-loader, and universal mobile responsiveness for 100% of pages.
 * Version: 2.8.0
 * Author: RBO Accounting Services FZE
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'rbo_is_arabic_request' ) ) {
	function rbo_is_arabic_request() {
		$req_uri = isset( $_SERVER['REQUEST_URI'] ) ? (string) $_SERVER['REQUEST_URI'] : '';
		// 1. Strict Arabic URL check: exactly /ar, or contains /ar/, or starts with /ar?, /ar#
		if (
			$req_uri === '/ar' ||
			strpos( $req_uri, '/ar/' ) !== false ||
			strpos( $req_uri, '/ar?' ) === 0 ||
			strpos( $req_uri, '/ar#' ) === 0
		) {
			return true;
		}
		// 2. Polylang language check with safety guard against English URLs
		if ( function_exists( 'pll_current_language' ) && pll_current_language() === 'ar' ) {
			$en_prefixes = array( '/about-us', '/our-services', '/areas-we-serve', '/contact-us', '/blog', '/terms', '/privacy', '/refund' );
			foreach ( $en_prefixes as $p ) {
				if ( strpos( $req_uri, $p ) === 0 ) {
					return false;
				}
			}
			return true;
		}
		return false;
	}
}

/**
 * 1. Force UAE HTML Language & Locale (en-AE or ar)
 */
add_filter(
	'language_attributes',
	function ( $output ) {
		if ( rbo_is_arabic_request() ) {
			return 'lang="ar" dir="rtl"';
		}
		return 'lang="en-AE"';
	},
	99
);

/**
 * 1d. Serve Arabic Header & Arabic Footer for all Arabic URLs
 */
/**
 * 1d. Serve Dynamic Header & Footer per Language without Elementor Element Cache pollution
 */
// A. Bypass Elementor Element Cache for Header (5241) and Footer (432) so they always render per language
add_filter(
	'get_post_metadata',
	function ( $value, $object_id, $meta_key, $single ) {
		if ( $meta_key === '_elementor_element_cache' && ( (int) $object_id === 5241 || (int) $object_id === 432 ) ) {
			return false; // Force cache miss: never load static HTML cache for dynamic header/footer
		}

		if ( $meta_key === '_elementor_data' ) {
			if ( rbo_is_arabic_request() ) {
				if ( (int) $object_id === 5241 ) {
					$file = __DIR__ . '/header-ar.json';
					if ( file_exists( $file ) ) {
						return file_get_contents( $file );
					}
				} elseif ( (int) $object_id === 432 ) {
					$file = __DIR__ . '/footer-ar.json';
					if ( file_exists( $file ) ) {
						return file_get_contents( $file );
					}
				}
			}
		}
		return $value;
	},
	10,
	4
);

// B. Prevent Elementor from writing static HTML cache to DB for Header & Footer
add_filter(
	'update_post_metadata',
	function ( $check, $object_id, $meta_key ) {
		if ( $meta_key === '_elementor_element_cache' && ( (int) $object_id === 5241 || (int) $object_id === 432 ) ) {
			return true; // Short-circuit, never save static cache to DB for dynamic header/footer
		}
		return $check;
	},
	10,
	3
);

/**
 * 1b. Add rbo-services-subpage & rbo-services-page to body_class for all 36 service pages & sub-pages
 */
add_filter(
	'body_class',
	function ( $classes ) {
		if ( is_page() ) {
			$post_id         = (int) get_the_ID();
			$uri             = (string) get_page_uri( $post_id );
			$parent_id       = (int) wp_get_post_parent_id( $post_id );
			$all_service_ids = array( 178, 787, 1547, 1670, 1692, 1706, 1722, 2419, 2458, 2488, 2501, 2508, 2522, 2532, 2567, 2732, 2897, 3034, 3098, 3125, 3228, 3320, 3341, 3351, 3358, 3368, 3382, 3392, 3402, 3412, 3413, 4420, 4421, 4422, 4423, 4424, 5604, 5615 );
			// CRITICAL: NEVER apply service subpage classes to Homepage, Regional Hubs, or About Us pages
			$is_homepage = ( $post_id === 172 || $post_id === 5606 || $post_id === 5617 || strpos( $uri, 'home-ar' ) !== false );
			$is_hub      = ( strpos( $uri, 'areas-we-serve' ) !== false );
			$is_about    = ( $post_id === 175 || $post_id === 5626 || $post_id === 5760 || strpos( $uri, 'about-us' ) !== false );
			if ( ! $is_homepage && ! $is_hub && ! $is_about ) {
				if ( in_array( $post_id, $all_service_ids, true ) || ( $post_id >= 5627 && $post_id <= 5700 ) || strpos( $uri, 'our-services' ) !== false || strpos( $uri, 'refund' ) !== false || in_array( $parent_id, array( 178, 787, 4420, 4421, 4422, 4423, 4424 ), true ) ) {
					$classes[] = 'rbo-services-subpage';
					$classes[] = 'rbo-services-page';
				}
			}
		}
		return $classes;
	},
	99
);

/**
 * 1c. Universal Elementor Post-CSS Force-Enqueue for All 36 Service Pages
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		if ( is_page() ) {
			$post_id         = (int) get_the_ID();
			$uri             = (string) get_page_uri( $post_id );
			$all_service_ids = array( 178, 787, 1547, 1670, 1692, 1706, 1722, 2419, 2458, 2488, 2501, 2508, 2522, 2532, 2567, 2732, 2897, 3034, 3098, 3125, 3228, 3320, 3341, 3351, 3358, 3368, 3382, 3392, 3402, 3412, 3413, 4420, 4421, 4422, 4423, 4424, 5604, 5615 );
			if ( in_array( $post_id, $all_service_ids, true ) || ( $post_id >= 5600 && $post_id <= 5700 ) || strpos( $uri, 'our-services' ) !== false ) {
				$upload_dir = wp_upload_dir();
				$css_path   = $upload_dir['basedir'] . '/elementor/css/post-' . $post_id . '.css';
				$css_url    = $upload_dir['baseurl'] . '/elementor/css/post-' . $post_id . '.css';
				$ver        = file_exists( $css_path ) ? (string) filemtime( $css_path ) : '2.8.0';
				wp_enqueue_style( 'rbo-force-post-' . $post_id, $css_url, array(), $ver );
			}
		}
	},
	999
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

<!-- Sitewide LocalBusiness & AccountingService JSON-LD Schema -->
<script type="application/ld+json">
{
	"@context": "https://schema.org",
	"@type": ["AccountingService", "LocalBusiness"],
	"@id": "https://www.rboaccounting.ae/#localbusiness",
	"name": "RBO Accounting Services FZE",
	"legalName": "RBO Accounting Services FZE",
	"url": "https://www.rboaccounting.ae/",
	"description": "FTA-approved registered tax agents, chartered accountants, and AFZA-accredited statutory auditors providing UAE Corporate Tax, VAT return filing, penalty reconsideration, and Virtual CFO services.",
	"telephone": "+971508051857",
	"email": "info@rboaccounting.ae",
	"priceRange": "AED 1000 - AED 15000",
	"address": {
		"@type": "PostalAddress",
		"streetAddress": "C1 Building, Free Zone, Liwara 1",
		"addressLocality": "Ajman",
		"addressRegion": "Ajman",
		"addressCountry": "AE"
	},
	"geo": {
		"@type": "GeoCoordinates",
		"latitude": 25.405216,
		"longitude": 55.513643
	},
	"openingHoursSpecification": [
		{
			"@type": "OpeningHoursSpecification",
			"dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
			"opens": "08:30",
			"closes": "17:30"
		}
	],
	"areaServed": [
		{ "@type": "City", "name": "Ajman" },
		{ "@type": "City", "name": "Dubai" },
		{ "@type": "City", "name": "Abu Dhabi" },
		{ "@type": "City", "name": "Sharjah" },
		{ "@type": "Country", "name": "United Arab Emirates" }
	]
}
</script>

<!-- Sitewide CTA Contrast Enforcement (Forces white heading on dark CTA blocks) -->
<style id="rbo-cta-white-headings">
.rbo-cta h2, .rbo-cta h3, .rbo-cta h4,
.rbo-cta h2 *, .rbo-cta h3 *, .rbo-cta h4 *,
div[class*="rbo-cta"] h3,
div[class*="rbo-cta"] h3 *,
div[style*="linear-gradient"] h3:not([style*="e8b84b"]),
div[style*="linear-gradient"] h3:not([style*="e8b84b"]) * {
	color: #ffffff !important;
}
</style>

<!-- RBO Master Services Hero Critical CSS (Injected in Head for Zero-Latency First Paint) -->
<style id="rbo-services-critical-hero">
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-con:first-of-type,
body.rbo-services-subpage .site-main > .page-content > .elementor > .elementor-element:first-of-type,
body.rbo-services-subpage .site-main > .page-content > .elementor > .elementor-section:first-of-type,
body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type,
body.rbo-services-page .site-main > .page-content > .elementor > .e-con:first-of-type,
body.rbo-services-page .site-main > .page-content > .elementor > .elementor-element:first-of-type,
body.rbo-services-page .site-main > .page-content > .elementor > .elementor-section:first-of-type,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-con:first-of-type,
.elementor-element.elementor-element-418bd202,
.elementor-element.elementor-element-59af0b31 {
  background-color: #09203B !important;
  background: linear-gradient(135deg, #07192E 0%, #09203B 60%, #0c2d53 100%) !important;
  color: #ffffff !important;
  padding-top: 55px !important;
  padding-bottom: 55px !important;
  position: relative !important;
  box-sizing: border-box !important;
  width: 100% !important;
}

body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-con:first-of-type > .e-con-inner,
body.rbo-services-subpage .site-main > .page-content > .elementor > .elementor-element:first-of-type > .e-con-inner,
body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner,
body.rbo-services-page .site-main > .page-content > .elementor > .e-con:first-of-type > .e-con-inner,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner,
.elementor-element.elementor-element-418bd202 > .e-con-inner,
.elementor-element.elementor-element-59af0b31 > .e-con-inner {
  display: flex !important;
  flex-direction: row !important;
  align-items: center !important;
  justify-content: space-between !important;
  max-width: 1200px !important;
  margin-left: auto !important;
  margin-right: auto !important;
  padding-left: 20px !important;
  padding-right: 20px !important;
  width: 100% !important;
  box-sizing: border-box !important;
  gap: 36px !important;
  background: transparent !important;
  background-color: transparent !important;
}

body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > .e-child:first-child,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-con:first-of-type > .e-con-inner > .e-child:first-child,
body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > .e-child:first-child,
body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > .e-child:first-child,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child,
.elementor-element.elementor-element-2980c6b,
.elementor-element.elementor-element-2929b55e {
  flex: 1 1 58% !important;
  max-width: 58% !important;
  width: 58% !important;
  display: flex !important;
  flex-direction: column !important;
  justify-content: center !important;
  box-sizing: border-box !important;
  background: transparent !important;
  background-color: transparent !important;
}

body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > .e-child:first-child *,
body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > .e-child:first-child * {
  background-color: transparent !important;
}

body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child h1,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-heading-title,
body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child h1,
body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-heading-title,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child h1,
.elementor-element.elementor-element-7c28979c h1,
.elementor-element.elementor-element-6272ca2c h1 {
  color: #FFFFFF !important;
  font-family: "Playfair Display", Georgia, serif !important;
  font-weight: 700 !important;
  font-size: clamp(28px, 3.2vw, 42px) !important;
  line-height: 1.25 !important;
  margin: 0 0 16px 0 !important;
  word-break: break-word !important;
  background: transparent !important;
}

body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child h1 span,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child h1 strong,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child h1 i,
body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child h1 span,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child h1 span,
.elementor-element.elementor-element-7c28979c h1 span,
.elementor-element.elementor-element-6272ca2c h1 span {
  color: #E8B84B !important;
}

body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child p,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-widget-text-editor,
body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child p,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child p,
.elementor-element.elementor-element-76acde04,
.elementor-element.elementor-element-627f2eda {
  color: #C5D0DC !important;
  font-size: 15.5px !important;
  line-height: 1.7 !important;
  margin: 0 0 24px 0 !important;
  background: transparent !important;
}

body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child a[href^="tel:"],
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child a[href*="contact-us"],
body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child a[href^="tel:"],
body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child a[href*="contact-us"],
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child a[href*="contact-us"],
.elementor-element.elementor-element-6c5725b3 .elementor-button,
.elementor-element.elementor-element-6e0fa4bb .elementor-button {
  background: #E8B84B !important;
  background-color: #E8B84B !important;
  color: #09203B !important;
  box-shadow: 0 4px 14px rgba(232, 184, 75, 0.3) !important;
}

body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child a[href*="wa.me"],
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child a[href*="whatsapp"],
body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child a[href*="wa.me"],
body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child a[href*="whatsapp"],
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child a[href*="wa.me"],
.elementor-element.elementor-element-268e22d2 .elementor-button,
.elementor-element.elementor-element-7d20ce91 .elementor-button {
  background: #25D366 !important;
  background-color: #25D366 !important;
  color: #FFFFFF !important;
  border: none !important;
  box-shadow: 0 4px 14px rgba(37, 211, 102, 0.3) !important;
}

body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > .e-child:last-child,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:last-child,
body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > .e-child:last-child,
body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:last-child,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > .e-child:last-child,
.elementor-element.elementor-element-34bbbe42,
.elementor-element.elementor-element-2ad320ba {
  flex: 0 0 38% !important;
  max-width: 440px !important;
  width: 38% !important;
  background: #FFFFFF !important;
  background-color: #FFFFFF !important;
  border-radius: 16px !important;
  padding: 30px 24px !important;
  box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4) !important;
  border: 1px solid rgba(255, 255, 255, 0.25) !important;
  box-sizing: border-box !important;
  align-self: center !important;
}

body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:last-child h3,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:last-child .elementor-heading-title,
body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:last-child h3,
.elementor-element.elementor-element-3e315413 h3,
.elementor-element.elementor-element-3e315413 .elementor-heading-title {
  color: #09203B !important;
  font-family: "Playfair Display", Georgia, serif !important;
  font-size: 22px !important;
  font-weight: 700 !important;
  margin: 0 0 6px 0 !important;
}
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:last-child p,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:last-child .elementor-widget-text-editor,
body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:last-child p,
.elementor-element.elementor-element-38e67f1 p {
  color: #64748B !important;
  font-size: 13.5px !important;
  line-height: 1.4 !important;
  margin: 0 0 16px 0 !important;
}

body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form input.elementor-field,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form select.elementor-field,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form textarea.elementor-field,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form .elementor-select-wrapper select,
body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form input.elementor-field,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form input.elementor-field,
.elementor-element.elementor-element-53e74aaa input.elementor-field,
.elementor-element.elementor-element-53e74aaa select.elementor-field {
  background: #F8FAFC !important;
  background-color: #F8FAFC !important;
  border: 1.5px solid #CBD5E1 !important;
  border-radius: 8px !important;
  padding: 10px 14px !important;
  color: #1E293B !important;
  font-size: 14px !important;
  width: 100% !important;
  height: 44px !important;
  box-sizing: border-box !important;
  outline: none !important;
}

body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form button[type="submit"],
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form .elementor-button[type="submit"],
body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form button[type="submit"],
.elementor-element.elementor-element-53e74aaa button[type="submit"] {
  background: linear-gradient(135deg, #E8B84B 0%, #D4A017 100%) !important;
  color: #09203B !important;
  font-weight: 700 !important;
  font-size: 15px !important;
  border-radius: 8px !important;
  border: none !important;
  height: 48px !important;
  width: 100% !important;
  cursor: pointer !important;
  box-shadow: 0 4px 14px rgba(212, 160, 23, 0.3) !important;
  margin-top: 6px !important;
}

@media (max-width: 991px) {
  body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type,
  body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type,
  body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type,
  .elementor-element.elementor-element-418bd202 {
    padding: 40px 16px !important;
  }
  body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner,
  body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner,
  body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner,
  .elementor-element.elementor-element-418bd202 > .e-con-inner {
    flex-direction: column !important;
    gap: 32px !important;
    padding: 0 !important;
  }
  body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child,
  body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child,
  body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child,
  .elementor-element.elementor-element-2980c6b {
    flex: 1 1 100% !important;
    max-width: 100% !important;
    width: 100% !important;
  }
  body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:last-child,
  body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:last-child,
  body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:last-child,
  .elementor-element.elementor-element-34bbbe42 {
    flex: 1 1 100% !important;
    max-width: 480px !important;
    width: 100% !important;
    margin: 0 auto !important;
  }
  body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-widget-button,
  body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-widget-button {
    width: 100% !important;
    margin-right: 0 !important;
  }
  body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-button,
  body.rbo-services-page .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-button {
    width: 100% !important;
    justify-content: center !important;
  }
}
</style>
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
		// 301 Redirect UTM & Tracking Query Strings on Homepage to Clean Canonical URL
		if ( is_front_page() && ! empty( $_GET ) ) {
			foreach ( array_keys( $_GET ) as $qk ) {
				if ( 0 === stripos( (string) $qk, 'utm_' ) || in_array( strtolower( (string) $qk ), array( 'gclid', 'fbclid', 'ref' ), true ) ) {
					wp_safe_redirect( home_url( '/' ), 301 );
					exit;
				}
			}
		}

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
				'streetAddress'   => 'C1 Building, Free Zone, Liwara 1',
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

/* =========================================================================
   9. MASTER UNIVERSAL SERVICES & SUB-PAGES CSS ENGINE
   Guarantees 100% flawless luxury hero branding, 2-column flex alignment,
   white heading contrast, styled consultation card & inputs across all
   sub-pages under /our-services/
   ========================================================================= */

/* Hero Section Container (Deep Navy Background & Contrast) */
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type,
body.rbo-services-subpage .site-main > .page-content > .elementor > .elementor-section:first-of-type,
body[class*="parent-pageid-4420"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="parent-pageid-4421"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="parent-pageid-4422"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="parent-pageid-4423"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="parent-pageid-4424"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="parent-pageid-787"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-2532"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-2508"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-2522"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-2501"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-2488"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
  body[class*="page-id-5604"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
  body[class*="page-id-5615"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-2419"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-2458"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-2567"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-3034"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-2897"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-3228"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-3382"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-3402"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-3392"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-3413"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-3412"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-1547"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-1706"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-1670"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-1692"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-1722"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-2732"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-3098"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-3125"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-3320"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-3341"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-3351"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-3358"] .site-main > .page-content > .elementor > .e-parent:first-of-type,
body[class*="page-id-3368"] .site-main > .page-content > .elementor > .e-parent:first-of-type {
  background-color: #09203B !important;
  background: linear-gradient(135deg, #07192E 0%, #09203B 60%, #0c2d53 100%) !important;
  color: #ffffff !important;
  padding-top: 55px !important;
  padding-bottom: 55px !important;
  position: relative !important;
  box-sizing: border-box !important;
  width: 100% !important;
}

/* Hero Inner Container (Flex 2 Columns on Desktop) */
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner,
body.rbo-services-subpage .site-main > .page-content > .elementor > .elementor-section:first-of-type > .elementor-container,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner {
  display: flex !important;
  flex-direction: row !important;
  align-items: center !important;
  justify-content: space-between !important;
  max-width: 1200px !important;
  margin-left: auto !important;
  margin-right: auto !important;
  padding-left: 20px !important;
  padding-right: 20px !important;
  width: 100% !important;
  box-sizing: border-box !important;
  gap: 36px !important;
}

/* Hero Left Column (Title, Text, Buttons, Trust Badges) */
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > .e-child:first-child,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > .e-child:first-child {
  flex: 1 1 58% !important;
  max-width: 58% !important;
  width: 58% !important;
  display: flex !important;
  flex-direction: column !important;
  justify-content: center !important;
  box-sizing: border-box !important;
}

/* Hero H1 Heading */
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child h1,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-heading-title,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child h1 {
  color: #FFFFFF !important;
  font-family: "Playfair Display", Georgia, serif !important;
  font-weight: 700 !important;
  font-size: clamp(28px, 3.2vw, 42px) !important;
  line-height: 1.25 !important;
  margin: 0 0 16px 0 !important;
  word-break: break-word !important;
}

/* Gold highlighted text in H1 */
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child h1 span,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child h1 strong,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child h1 i,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child h1 span {
  color: #E8B84B !important;
}

/* Hero Lead Paragraph */
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child p,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-widget-text-editor,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child p {
  color: #C5D0DC !important;
  font-size: 15.5px !important;
  line-height: 1.7 !important;
  margin: 0 0 24px 0 !important;
}

/* CTA Buttons Row */
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-widget-button,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-widget-button {
  display: inline-block !important;
  margin-right: 12px !important;
  margin-bottom: 12px !important;
}
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-button,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-button {
  font-weight: 700 !important;
  border-radius: 8px !important;
  padding: 13px 24px !important;
  font-size: 14.5px !important;
  display: inline-flex !important;
  align-items: center !important;
  gap: 8px !important;
  text-decoration: none !important;
  transition: transform 0.2s, box-shadow 0.2s !important;
}
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child a[href*="contact-us"],
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child a[href*="contact-us"] {
  background: #E8B84B !important;
  color: #09203B !important;
  box-shadow: 0 4px 14px rgba(232, 184, 75, 0.3) !important;
}
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child a[href*="contact-us"]:hover,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child a[href*="contact-us"]:hover {
  background: #d4a017 !important;
  transform: translateY(-2px) !important;
  box-shadow: 0 6px 18px rgba(212, 160, 23, 0.45) !important;
}
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child a[href*="wa.me"],
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child a[href*="whatsapp"],
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child a[href*="wa.me"] {
  background: #25D366 !important;
  color: #FFFFFF !important;
  box-shadow: 0 4px 14px rgba(37, 211, 102, 0.3) !important;
}
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child a[href*="wa.me"]:hover,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child a[href*="wa.me"]:hover {
  background: #20ba5a !important;
  transform: translateY(-2px) !important;
  box-shadow: 0 6px 18px rgba(37, 211, 102, 0.45) !important;
}

/* Trust Badges (Icon List) */
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-widget-icon-list,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-widget-icon-list {
  margin-top: 18px !important;
}
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-icon-list-items,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-icon-list-items {
  display: flex !important;
  flex-wrap: wrap !important;
  gap: 16px !important;
  padding: 0 !important;
  margin: 0 !important;
  list-style: none !important;
}
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-icon-list-item,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-icon-list-item {
  color: #E2E8F0 !important;
  font-size: 13.5px !important;
  font-weight: 500 !important;
  display: inline-flex !important;
  align-items: center !important;
  gap: 8px !important;
}
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-icon-list-icon svg,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-icon-list-icon svg {
  fill: #E8B84B !important;
  color: #E8B84B !important;
  width: 14px !important;
  height: 14px !important;
}

/* Hero Right Column (Consultation Card) */
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > .e-child:last-child,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:last-child,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > .e-child:last-child {
  flex: 0 0 38% !important;
  max-width: 440px !important;
  width: 38% !important;
  background: #FFFFFF !important;
  border-radius: 16px !important;
  padding: 30px 24px !important;
  box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4) !important;
  border: 1px solid rgba(255, 255, 255, 0.25) !important;
  box-sizing: border-box !important;
  align-self: center !important;
}

/* Card Heading & Subtitle */
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:last-child h3,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:last-child .elementor-heading-title,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:last-child h3 {
  color: #09203B !important;
  font-family: "Playfair Display", Georgia, serif !important;
  font-size: 22px !important;
  font-weight: 700 !important;
  margin: 0 0 6px 0 !important;
}
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:last-child p,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:last-child .elementor-widget-text-editor,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:last-child p {
  color: #64748B !important;
  font-size: 13.5px !important;
  line-height: 1.4 !important;
  margin: 0 0 16px 0 !important;
}

/* Consultation Form Input Fields */
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form input.elementor-field,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form select.elementor-field,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form textarea.elementor-field,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form .elementor-select-wrapper select,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form input.elementor-field,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form select.elementor-field {
  background: #F8FAFC !important;
  border: 1.5px solid #CBD5E1 !important;
  border-radius: 8px !important;
  padding: 10px 14px !important;
  color: #1E293B !important;
  font-size: 14px !important;
  width: 100% !important;
  height: 44px !important;
  box-sizing: border-box !important;
  outline: none !important;
  transition: all 0.2s ease !important;
}
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form input.elementor-field:focus,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form select.elementor-field:focus,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form .elementor-select-wrapper select:focus,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form input.elementor-field:focus {
  border-color: #E8B84B !important;
  background: #FFFFFF !important;
  box-shadow: 0 0 0 3px rgba(232, 184, 75, 0.25) !important;
}

/* Submit Button */
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form button[type="submit"],
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form .elementor-button[type="submit"],
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form button[type="submit"] {
  background: linear-gradient(135deg, #E8B84B 0%, #D4A017 100%) !important;
  color: #09203B !important;
  font-weight: 700 !important;
  font-size: 15px !important;
  border-radius: 8px !important;
  border: none !important;
  height: 48px !important;
  width: 100% !important;
  cursor: pointer !important;
  box-shadow: 0 4px 14px rgba(212, 160, 23, 0.3) !important;
  transition: all 0.25s ease !important;
  margin-top: 6px !important;
}
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form button[type="submit"]:hover,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form .elementor-button[type="submit"]:hover,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type .elementor-widget-form button[type="submit"]:hover {
  background: #D4A017 !important;
  transform: translateY(-2px) !important;
  box-shadow: 0 6px 20px rgba(212, 160, 23, 0.45) !important;
}

/* Quick Answer Section (Section 2) */
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:nth-of-type(2),
body.rbo-services-subpage .site-main > .page-content > .elementor > .elementor-section:nth-of-type(2),
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:nth-of-type(2) {
  background-color: #F8F6F1 !important;
  padding: 48px 20px !important;
  box-sizing: border-box !important;
}
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:nth-of-type(2) h2,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:nth-of-type(2) h3,
body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:nth-of-type(2) .elementor-heading-title,
body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:nth-of-type(2) h2 {
  color: #09203B !important;
  font-family: "Playfair Display", Georgia, serif !important;
}

/* Mobile & Tablet (< 992px) Responsive Stacking */
@media (max-width: 991px) {
  body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type,
  body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type {
    padding: 40px 16px !important;
    min-height: auto !important;
  }
  body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner,
  body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner {
    flex-direction: column !important;
    gap: 32px !important;
    padding: 0 !important;
  }
  body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child,
  body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > .e-child:first-child,
  body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child {
    flex: 1 1 100% !important;
    max-width: 100% !important;
    width: 100% !important;
  }
  body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:last-child,
  body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > .e-child:last-child,
  body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:last-child {
    flex: 1 1 100% !important;
    max-width: 480px !important;
    width: 100% !important;
    margin: 0 auto !important;
  }
  body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-widget-button,
  body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-widget-button {
    width: 100% !important;
    margin-right: 0 !important;
  }
  body.rbo-services-subpage .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-button,
  body[class*="parent-pageid-"]:not(.parent-pageid-4408):not(.parent-pageid-4925):not(.parent-pageid-5618) .site-main > .page-content > .elementor > .e-parent:first-of-type > .e-con-inner > div:first-child .elementor-button {
    width: 100% !important;
    justify-content: center !important;
  }
}
';
		wp_register_style( 'rbo-seo-extras', false, array(), '2.7.0' );
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

/**
 * 8. Contextual Pillar Guide Interlink Mesh
 * Connects Parent Money Hubs to newly published October 2026 Authority Guides
 */
add_filter(
	'the_content',
	function ( $content ) {
		if ( ! is_singular( 'page' ) ) {
			return $content;
		}

		$post_id = get_the_ID();

		// 1. Corporate Tax Hub (ID 4421) -> Free Zone QFZP Guide
		if ( $post_id === 4421 ) {
			$qfzp_url = home_url( '/uae-free-zone-corporate-tax-qualifying-income-qfzp-guide-2026/' );
			$callout  = <<<HTML
<div class="rbo-guide-callout" style="max-width: 1140px; margin: 40px auto; padding: 26px 30px; background: linear-gradient(135deg, #f8fafd 0%, #ffffff 100%); border: 1px solid #e2e8f0; border-left: 5px solid #d4a017; border-radius: 10px; box-shadow: 0 4px 18px rgba(0,0,0,0.04);">
	<div style="display: flex; align-items: flex-start; gap: 18px;">
		<div style="font-size: 32px; line-height: 1;">🏛️</div>
		<div style="flex: 1;">
			<span style="display: inline-block; padding: 3px 10px; background: #eef4fc; color: #0b3a6e; font-size: 11px; font-weight: 700; text-transform: uppercase; border-radius: 4px; letter-spacing: 0.5px; margin-bottom: 8px;">2026 Free Zone Compliance</span>
			<h3 style="margin: 0 0 10px 0; color: #0b3a6e; font-size: 21px; font-weight: 700;">Operating in a UAE Free Zone? Read Our Complete 0% QFZP Guide</h3>
			<p style="margin: 0 0 16px 0; color: #475569; font-size: 15px; line-height: 1.65;">Understanding Qualifying Income, de minimis thresholds, and strict auditable record-keeping rules under Federal Decree-Law No. 47 is essential to securing and safeguarding your 0% Corporate Tax exemption.</p>
			<a href="{$qfzp_url}" style="display: inline-flex; align-items: center; gap: 8px; padding: 11px 22px; background: linear-gradient(135deg, #0b3a6e 0%, #1e5a96 100%); color: #ffffff; text-decoration: none; font-weight: 600; font-size: 14.5px; border-radius: 6px; box-shadow: 0 2px 8px rgba(11,58,110,0.25);">
				Read Full Free Zone Tax Guide ➔
			</a>
		</div>
	</div>
</div>
HTML;
			$content .= $callout;
		}

		// 2. VAT Refund Hub (ID 2488) -> Landlords, Engineering Consultants & Contractors VAT Refund Suite
		if ( $post_id === 2488 ) {
			$refund_guide_url = home_url( '/vat-refund-claim-landlords-consultants-contractors-uae/' );
			$afz_pkg_url     = home_url( '/afz-new-lighter-package-2026-ajman-free-zone-setup/' );
			$callout          = <<<HTML
<div class="rbo-vat-refund-suite" style="max-width: 1140px; margin: 45px auto; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #1e293b; line-height: 1.7;">

	<!-- Hero Authority Banner -->
	<div style="background: linear-gradient(135deg, #0D1B2A 0%, #1e3a5f 100%); border-radius: 12px; padding: 34px 38px; color: #ffffff; margin-bottom: 40px; box-shadow: 0 10px 25px rgba(13,27,42,0.15); border-left: 6px solid #d4a017;">
		<div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 24px;">
			<div style="flex: 1; min-width: 290px;">
				<span style="display: inline-block; padding: 4px 12px; background: rgba(212,160,23,0.2); color: #E8B84B; font-size: 12px; font-weight: 700; text-transform: uppercase; border-radius: 4px; letter-spacing: 0.8px; margin-bottom: 10px; border: 1px solid rgba(212,160,23,0.35);">
					FTA Executive Regulation Compliance
				</span>
				<h2 style="margin: 0 0 12px 0; color: #ffffff; font-size: 25px; font-weight: 700; line-height: 1.3;">
					Specialized VAT Refund Recovery: Landlords, Engineering Consultants & Contractors
				</h2>
				<p style="margin: 0; color: #cbd5e1; font-size: 15px; line-height: 1.65;">
					Are millions of dirhams in excess input tax locked in your EmaraTax portal? RBO Accounting provides full-cycle FTA Form VAT311 claim filings, technical audits under Article 57 (Capital Assets Scheme), zero-rated cross-border export validation, and retention money reconciliations to ensure direct bank disbursement.
				</p>
			</div>
			<div style="display: flex; flex-direction: column; gap: 12px; min-width: 220px;">
				<a href="{$refund_guide_url}" style="display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 13px 24px; background: #d4a017; color: #0D1B2A; text-decoration: none; font-weight: 700; font-size: 14.5px; border-radius: 8px; box-shadow: 0 4px 14px rgba(212,160,23,0.35); text-align: center;">
					<span>Read Full 5,000-Word Guide</span> ➔
				</a>
				<a href="https://wa.me/971508051857?text=Hello%20RBO,%20we%20need%20urgent%20assistance%20with%20our%20corporate%20VAT%20Refund%20claim" style="display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 11px 20px; background: rgba(255,255,255,0.12); color: #ffffff; text-decoration: none; font-weight: 600; font-size: 13.5px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.25); text-align: center;">
					💬 WhatsApp Tax Consultant
				</a>
			</div>
		</div>
	</div>

	<!-- 3 High-Impact Industry Cards -->
	<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 26px; margin-bottom: 45px;">
		
		<!-- Card 1: Commercial Landlords -->
		<div style="background: #ffffff; border: 1px solid #e2e8f0; border-top: 5px solid #0b3a6e; border-radius: 10px; padding: 28px; box-shadow: 0 4px 18px rgba(0,0,0,0.05); display: flex; flex-direction: column;">
			<div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
				<span style="font-size: 28px; background: #f0f7ff; width: 52px; height: 52px; display: inline-flex; align-items: center; justify-content: center; border-radius: 10px;">🏢</span>
				<div>
					<span style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: #0b3a6e; letter-spacing: 0.5px;">Pillar 01</span>
					<h3 style="margin: 0; font-size: 19px; color: #0D1B2A; font-weight: 700;">Commercial Landlords & Developers</h3>
				</div>
			</div>
			<p style="font-size: 14.5px; color: #475569; margin: 0 0 16px 0;">
				Commercial leasing generates 5% taxable supplies, allowing property developers and landlords to recover substantial input tax incurred on high-capex developments.
			</p>
			<ul style="margin: 0 0 20px 0; padding-left: 20px; font-size: 13.5px; color: #334155; line-height: 1.65; flex-grow: 1;">
				<li style="margin-bottom: 8px;"><strong>Capital Assets Scheme (Article 57):</strong> 10-year tracking for commercial properties costing ≥ AED 5,000,000.</li>
				<li style="margin-bottom: 8px;"><strong>100% Capex Input Recovery:</strong> Construction civil works, MEP installations, HVAC replacements, and elevators.</li>
				<li style="margin-bottom: 8px;"><strong>Mixed-Use Apportionment:</strong> Certified formulas to isolate exempt residential units from taxable commercial leases.</li>
				<li><strong>Ongoing Opex Reclaim:</strong> Property management, security, facilities maintenance, and leasing agent commissions.</li>
			</ul>
			<div style="background: #f8fafd; border-radius: 6px; padding: 12px 14px; font-size: 12.5px; color: #0b3a6e; border-left: 3px solid #0b3a6e;">
				<strong>FTA Compliance Key:</strong> Reconcile building completion certificates and Tenancy Contracts (Ejari) against Form VAT201 Box 14.
			</div>
		</div>

		<!-- Card 2: Engineering Consultants -->
		<div style="background: #ffffff; border: 1px solid #e2e8f0; border-top: 5px solid #d4a017; border-radius: 10px; padding: 28px; box-shadow: 0 4px 18px rgba(0,0,0,0.05); display: flex; flex-direction: column;">
			<div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
				<span style="font-size: 28px; background: #fffdf5; width: 52px; height: 52px; display: inline-flex; align-items: center; justify-content: center; border-radius: 10px;">📐</span>
				<div>
					<span style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: #d4a017; letter-spacing: 0.5px;">Pillar 02</span>
					<h3 style="margin: 0; font-size: 19px; color: #0D1B2A; font-weight: 700;">Engineering & Architectural Consultants</h3>
				</div>
			</div>
			<p style="font-size: 14.5px; color: #475569; margin: 0 0 16px 0;">
				Consultancies delivering structural, architectural, and project management services to international clients operate under zero-rated export rules, yielding continuous refundable tax balances.
			</p>
			<ul style="margin: 0 0 20px 0; padding-left: 20px; font-size: 13.5px; color: #334155; line-height: 1.65; flex-grow: 1;">
				<li style="margin-bottom: 8px;"><strong>0% Zero-Rating (Article 31):</strong> Export of engineering services to foreign principals with no UAE establishment.</li>
				<li style="margin-bottom: 8px;"><strong>SaaS & Tech Reclaims:</strong> Full input VAT recovery on BIM, AutoCAD, Revit, ETABS, and cloud server subscriptions.</li>
				<li style="margin-bottom: 8px;"><strong>Specialized Sub-Consultants:</strong> Reclaiming 5% paid to local soil testing, topographic survey, and acoustic engineers.</li>
				<li><strong>Overseas Remittance Proof:</strong> Aligning SWIFT wire advices and sign-off milestones with tax invoices.</li>
			</ul>
			<div style="background: #fffdf5; border-radius: 6px; padding: 12px 14px; font-size: 12.5px; color: #8B6326; border-left: 3px solid #d4a017;">
				<strong>FTA Compliance Key:</strong> Ensure contracts strictly prove foreign place of residence and consumption outside the UAE.
			</div>
		</div>

		<!-- Card 3: Civil & MEP Contractors -->
		<div style="background: #ffffff; border: 1px solid #e2e8f0; border-top: 5px solid #1e5a96; border-radius: 10px; padding: 28px; box-shadow: 0 4px 18px rgba(0,0,0,0.05); display: flex; flex-direction: column;">
			<div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
				<span style="font-size: 28px; background: #f0f7ff; width: 52px; height: 52px; display: inline-flex; align-items: center; justify-content: center; border-radius: 10px;">🏗️</span>
				<div>
					<span style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: #1e5a96; letter-spacing: 0.5px;">Pillar 03</span>
					<h3 style="margin: 0; font-size: 19px; color: #0D1B2A; font-weight: 700;">Civil, MEP & Fit-Out Contractors</h3>
				</div>
			</div>
			<p style="font-size: 14.5px; color: #475569; margin: 0 0 16px 0;">
				Construction contractors face heavy procurement cash outlays. Mastering retention money rules and the local reverse charge mechanism unlocks multi-million dirham liquidity.
			</p>
			<ul style="margin: 0 0 20px 0; padding-left: 20px; font-size: 13.5px; color: #334155; line-height: 1.65; flex-grow: 1;">
				<li style="margin-bottom: 8px;"><strong>Retention Money Tax Point:</strong> Deferring VAT liability until Payment Certificates or cash receipts, avoiding upfront outlays.</li>
				<li style="margin-bottom: 8px;"><strong>Domestic Reverse Charge (Cabinet Decision 91/2023):</strong> Applying zero cash VAT between contractors & subcontractors.</li>
				<li style="margin-bottom: 8px;"><strong>Heavy Materials & Plant Import:</strong> Immediate reconciliation of Box 6 customs declarations with commercial invoices.</li>
				<li><strong>Milestone Progress Claims:</strong> Structuring interim valuations to prevent discrepancy notices in FTA pre-refund audits.</li>
			</ul>
			<div style="background: #f8fafd; border-radius: 6px; padding: 12px 14px; font-size: 12.5px; color: #0b3a6e; border-left: 3px solid #1e5a96;">
				<strong>FTA Compliance Key:</strong> Maintain valid written declarations from both parties under Decision 91 to support RCM treatment.
			</div>
		</div>

	</div>

	<!-- Comparative Document & Audit Matrix Table -->
	<div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 30px; box-shadow: 0 4px 18px rgba(0,0,0,0.04); margin-bottom: 45px; overflow-x: auto;">
		<div style="margin-bottom: 20px;">
			<h3 style="margin: 0 0 6px 0; color: #0D1B2A; font-size: 21px; font-weight: 700;">FTA Form VAT311 Document & Audit Matrix by Sector</h3>
			<p style="margin: 0; color: #64748b; font-size: 14px;">The Federal Tax Authority reviews these mandatory verification records before releasing cash refunds:</p>
		</div>
		<table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 13.5px;">
			<thead>
				<tr style="background: #0D1B2A; color: #ffffff;">
					<th style="padding: 12px 16px; border-top-left-radius: 6px;">Sector / Entity</th>
					<th style="padding: 12px 16px;">Core VAT Mechanism</th>
					<th style="padding: 12px 16px;">Primary Refund Trigger</th>
					<th style="padding: 12px 16px;">Mandatory FTA Audit Evidence</th>
					<th style="padding: 12px 16px; border-top-right-radius: 6px;">RBO Fast-Track SLA</th>
				</tr>
			</thead>
			<tbody>
				<tr style="border-bottom: 1px solid #e2e8f0; background: #ffffff;">
					<td style="padding: 14px 16px; font-weight: 700; color: #0b3a6e;">Commercial Landlords</td>
					<td style="padding: 14px 16px;">Article 57 Capital Assets Scheme (10-Yr)</td>
					<td style="padding: 14px 16px;">Construction & renovation 5% capex exceeding rental output VAT</td>
					<td style="padding: 14px 16px;">Ejari commercial contracts, contractor tax invoices, building completion certificate, bank payment proofs</td>
					<td style="padding: 14px 16px; font-weight: 600; color: #059669;">15 - 20 Business Days</td>
				</tr>
				<tr style="border-bottom: 1px solid #e2e8f0; background: #f8fafd;">
					<td style="padding: 14px 16px; font-weight: 700; color: #d4a017;">Engineering Consultancies</td>
					<td style="padding: 14px 16px;">Article 31 Zero-Rated Export of Services (0%)</td>
					<td style="padding: 14px 16px;">Output VAT is 0% while input tax is incurred on local office, IT, and software</td>
					<td style="padding: 14px 16px;">Foreign client contract, confirmation of overseas consumption, SWIFT bank slips, technical deliverable logs</td>
					<td style="padding: 14px 16px; font-weight: 600; color: #059669;">15 - 20 Business Days</td>
				</tr>
				<tr style="border-bottom: 1px solid #e2e8f0; background: #ffffff;">
					<td style="padding: 14px 16px; font-weight: 700; color: #1e5a96;">Civil & MEP Contractors</td>
					<td style="padding: 14px 16px;">Cabinet Decision 91/2023 & Retention Accounting</td>
					<td style="padding: 14px 16px;">Heavy procurement & material inputs exceeding progress billings received</td>
					<td style="padding: 14px 16px;">Certified Payment Certificates, supplier VAT invoices with TRN, customs import declarations, RCM declarations</td>
					<td style="padding: 14px 16px; font-weight: 600; color: #059669;">20 - 25 Business Days</td>
				</tr>
			</tbody>
		</table>
	</div>

	<!-- 10 Comprehensive Industry FAQs in Pure Arabic -->
	<div dir="rtl" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 34px; box-shadow: 0 4px 18px rgba(0,0,0,0.04); margin-bottom: 45px; direction: rtl; text-align: right; font-family: 'Cairo', 'Tajawal', sans-serif;">
		<div style="text-align: center; max-width: 760px; margin: 0 auto 30px auto;">
			<span style="display: inline-block; padding: 3px 10px; background: #eef4fc; color: #0b3a6e; font-size: 11px; font-weight: 700; border-radius: 4px; letter-spacing: 0.5px; margin-bottom: 8px;">قاعدة المعرفة الضريبية المتخصصة</span>
			<h3 style="margin: 0 0 10px 0; color: #0D1B2A; font-size: 24px; font-weight: 700;">الأسئلة الأكثر شيوعاً: استرداد ضريبة القيمة المضافة في الإمارات</h3>
			<p style="margin: 0; color: #64748b; font-size: 14.5px;">إجابات عملية ومعتمدة من وكلائنا الضريبيين المسجلين لدى FTA لاسترداد أرصدتك الضريبية المتراكمة دون تأخير أو غرامات تدقيق.</p>
		</div>

		<div style="display: flex; flex-direction: column; gap: 14px;">
			
			<details style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px;" open>
				<summary style="font-weight: 700; color: #0b3a6e; font-size: 15.5px; cursor: pointer; display: flex; align-items: center; justify-content: space-between;">
					<span>1. Can commercial landlords in the UAE claim a 100% VAT refund on building construction and fit-out costs?</span>
				</summary>
				<div style="margin-top: 10px; font-size: 14px; color: #475569; line-height: 1.65; border-top: 1px solid #e2e8f0; padding-top: 10px;">
					Yes. Commercial landlords leasing taxable premises (offices, shopping malls, retail plazas, industrial warehouses) are entitled to reclaim 100% of input VAT incurred on construction, architectural design, fit-outs, maintenance, and facility management under UAE VAT Law. In contrast, residential leasing is VAT-exempt after the initial 3-year construction period, precluding input tax recovery.
				</div>
			</details>

			<details style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px;">
				<summary style="font-weight: 700; color: #0b3a6e; font-size: 15.5px; cursor: pointer; display: flex; align-items: center; justify-content: space-between;">
					<span>2. How does the Capital Assets Scheme (CAS) apply to commercial property owners under Article 57?</span>
				</summary>
				<div style="margin-top: 10px; font-size: 14px; color: #475569; line-height: 1.65; border-top: 1px solid #e2e8f0; padding-top: 10px;">
					Under Article 57 of the UAE VAT Executive Regulation, real estate assets valued at AED 5,000,000 or more fall under the Capital Assets Scheme and require a mandatory 10-year monitoring and adjustment period. If a property's use changes (such as converting commercial space to residential exempt use), input tax reclaimed must be apportioned and adjusted annually across the remaining lifespan.
				</div>
			</details>

			<details style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px;">
				<summary style="font-weight: 700; color: #0b3a6e; font-size: 15.5px; cursor: pointer; display: flex; align-items: center; justify-content: space-between;">
					<span>3. Why do engineering and architectural consultancies in the UAE consistently accumulate excess VAT credits?</span>
				</summary>
				<div style="margin-top: 10px; font-size: 14px; color: #475569; line-height: 1.65; border-top: 1px solid #e2e8f0; padding-top: 10px;">
					Consultancies providing engineering design, structural calculations, BIM modeling, and architectural planning to foreign clients without a permanent establishment in the UAE qualify for 0% zero-rated VAT under Article 31. Because output VAT is zero, all 5% standard-rated input tax paid on office leases, software licenses, and local sub-consultants becomes refundable cash credit from the FTA.
				</div>
			</details>

			<details style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px;">
				<summary style="font-weight: 700; color: #0b3a6e; font-size: 15.5px; cursor: pointer; display: flex; align-items: center; justify-content: space-between;">
					<span>4. What documents are mandatory for engineering consultants to claim zero-rating (0%) on cross-border services?</span>
				</summary>
				<div style="margin-top: 10px; font-size: 14px; color: #475569; line-height: 1.65; border-top: 1px solid #e2e8f0; padding-top: 10px;">
					The FTA requires: (1) A formal cross-border contract proving the recipient has no permanent establishment or place of residence in the UAE; (2) Detailed deliverables confirming the benefit was consumed outside the UAE; (3) Official foreign currency bank remittance statements; and (4) Compliant tax invoices clearly noting the zero-rated supply rationale.
				</div>
			</details>

			<details style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px;">
				<summary style="font-weight: 700; color: #0b3a6e; font-size: 15.5px; cursor: pointer; display: flex; align-items: center; justify-content: space-between;">
					<span>5. How should civil and MEP contractors handle VAT on retention money held by developers?</span>
				</summary>
				<div style="margin-top: 10px; font-size: 14px; color: #475569; line-height: 1.65; border-top: 1px solid #e2e8f0; padding-top: 10px;">
					VAT liability on retention money (typically 5% to 10% withheld for 12 to 24 months during defect liability) depends strictly on the earlier of: invoice issuance date, payment certificate date, or actual receipt date. If no tax invoice is raised for the retention amount at completion, VAT can generally be accounted for upon issuance of the final certificate or receipt of cash, preventing premature tax financing.
				</div>
			</details>

			<details style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px;">
				<summary style="font-weight: 700; color: #0b3a6e; font-size: 15.5px; cursor: pointer; display: flex; align-items: center; justify-content: space-between;">
					<span>6. How does the domestic Reverse Charge Mechanism (Cabinet Decision No. 91 of 2023) affect contractor VAT refunds?</span>
				</summary>
				<div style="margin-top: 10px; font-size: 14px; color: #475569; line-height: 1.65; border-top: 1px solid #e2e8f0; padding-top: 10px;">
					Cabinet Decision No. 91 of 2023 allows main contractors and subcontractors in construction to apply the domestic Reverse Charge Mechanism (RCM) on construction supplies between VAT-registered entities. Subcontractors do not charge cash VAT to main contractors, eliminating cash flow lock-up and accelerating overall refund eligibility.
				</div>
			</details>

			<details style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px;">
				<summary style="font-weight: 700; color: #0b3a6e; font-size: 15.5px; cursor: pointer; display: flex; align-items: center; justify-content: space-between;">
					<span>7. What is FTA Form VAT311 and how long does the VAT refund process take in the UAE?</span>
				</summary>
				<div style="margin-top: 10px; font-size: 14px; color: #475569; line-height: 1.65; border-top: 1px solid #e2e8f0; padding-top: 10px;">
					Form VAT311 is the official electronic refund claim submitted via the EmaraTax portal to request direct cash repayment of excess credits reported in Box 14 of Form VAT201. Once submitted, the FTA typically reviews the application within 20 business days. Upon approval, funds are transferred directly into the corporate bank account via IBAN.
				</div>
			</details>

			<details style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px;">
				<summary style="font-weight: 700; color: #0b3a6e; font-size: 15.5px; cursor: pointer; display: flex; align-items: center; justify-content: space-between;">
					<span>8. What happens if the FTA initiates a pre-refund audit for a landlord or contractor claim?</span>
				</summary>
				<div style="margin-top: 10px; font-size: 14px; color: #475569; line-height: 1.65; border-top: 1px solid #e2e8f0; padding-top: 10px;">
					For high-value refund claims, the FTA frequently issues an Information Request or audit notice demanding sample tax invoices, supplier payment vouchers, bank statement audit trails, and customs declarations. RBO Accounting represents businesses directly during FTA audits, reconciling every dirham to secure fast approval without penalties.
				</div>
			</details>

			<details style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px;">
				<summary style="font-weight: 700; color: #0b3a6e; font-size: 15.5px; cursor: pointer; display: flex; align-items: center; justify-content: space-between;">
					<span>9. Can input VAT on mixed-use commercial and residential developments be partially reclaimed?</span>
				</summary>
				<div style="margin-top: 10px; font-size: 14px; color: #475569; line-height: 1.65; border-top: 1px solid #e2e8f0; padding-top: 10px;">
					Yes. Landlords of mixed-use buildings must apply the input tax apportionment method approved by the FTA. Direct input tax related 100% to commercial spaces is fully deductible, while common building overheads (such as HVAC, elevators, security, structural upkeep) are apportioned based on floor area or turnover ratios.
				</div>
			</details>

			<details style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px;">
				<summary style="font-weight: 700; color: #0b3a6e; font-size: 15.5px; cursor: pointer; display: flex; align-items: center; justify-content: space-between;">
					<span>10. Why should commercial landlords, consultants, and contractors hire an FTA Registered Tax Agency like RBO Accounting?</span>
				</summary>
				<div style="margin-top: 10px; font-size: 14px; color: #475569; line-height: 1.65; border-top: 1px solid #e2e8f0; padding-top: 10px;">
					Submitting an erroneous VAT refund claim risks rejection, extensive audits, and severe administrative penalties under Federal Decree-Law No. 28 of 2022. RBO Accounting's certified tax agents conduct thorough pre-submission reconciliations, verify TRN authenticity, validate reverse charge declarations, and guide your claim through EmaraTax to direct bank disbursement.
				</div>
			</details>

		</div>
	</div>

	<!-- High Converting Conversion CTA Banner in Arabic -->
	<div dir="rtl" style="background: linear-gradient(135deg, #0b3a6e 0%, #1e5a96 100%); border-radius: 12px; padding: 32px 36px; text-align: center; color: #ffffff; box-shadow: 0 8px 24px rgba(11,58,110,0.25); direction: rtl; font-family: 'Cairo', 'Tajawal', sans-serif;">
		<h3 style="margin: 0 0 10px 0; font-size: 23px; font-weight: 700; color: #ffffff;">استرد أموال ضريبة القيمة المضافة المؤهلة عبر نموذج VAT311 الآن</h3>
		<p style="margin: 0 auto 22px auto; max-width: 680px; font-size: 15px; color: #e2e8f0; line-height: 1.6;">
			دع وكلاءنا الضريبيين المعتمدين يتولون تدقيق دفاتر الأستاذ العام، وتجهيز ملفات الإثبات، وتقديم طلب الاسترداد لضمان تحويل المبالغ مباشرة إلى حسابك المصرفي دون مخاطر تدقيق أو تأخير.
		</p>
		<div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 14px;">
			<a href="https://wa.me/971508051857?text=مرحباً%20RBO%20نرغب%20في%20بدء%20طلب%20استرداد%20ضريبة%20القيمة%20المضافة" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 28px; background: #25D366; color: #ffffff; text-decoration: none; font-weight: 700; font-size: 14.5px; border-radius: 8px; box-shadow: 0 4px 12px rgba(37,211,102,0.3);">
				<span>استفسار فوري عبر واتساب</span>
			</a>
			<a href="https://www.rboaccounting.ae/afz-new-lighter-package-2026-ajman-free-zone-setup/" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 22px; background: rgba(255,255,255,0.15); color: #ffffff; text-decoration: none; font-weight: 600; font-size: 14px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.3);">
				<span>باقة تأسيس منطقة عجمان الحرة 2026</span>
			</a>
		</div>
	</div>

</div>
HTML;
			$content .= $callout;
		}

		// 3. Penalty Reconsideration Hub (ID 2532) -> FTA Form 211 Guide
		if ( $post_id === 2532 ) {
			$form211_url = home_url( '/fta-voluntary-disclosure-form-211-uae-correct-tax-errors-guide/' );
			$callout     = <<<HTML
<div class="rbo-guide-callout" style="max-width: 1140px; margin: 40px auto; padding: 26px 30px; background: linear-gradient(135deg, #f8fafd 0%, #ffffff 100%); border: 1px solid #e2e8f0; border-left: 5px solid #d4a017; border-radius: 10px; box-shadow: 0 4px 18px rgba(0,0,0,0.04);">
	<div style="display: flex; align-items: flex-start; gap: 18px;">
		<div style="font-size: 32px; line-height: 1;">⚖️</div>
		<div style="flex: 1;">
			<span style="display: inline-block; padding: 3px 10px; background: #eef4fc; color: #0b3a6e; font-size: 11px; font-weight: 700; text-transform: uppercase; border-radius: 4px; letter-spacing: 0.5px; margin-bottom: 8px;">Urgent Penalty Mitigation</span>
			<h3 style="margin: 0 0 10px 0; color: #0b3a6e; font-size: 21px; font-weight: 700;">Filing an FTA Voluntary Disclosure (Form 211) Before an Audit</h3>
			<p style="margin: 0 0 16px 0; color: #475569; font-size: 15px; line-height: 1.65;">Discovered a tax calculation error or missed return deadline? Proactively submitting Form 211 slashes administrative penalties from 50% down to manageable percentages prior to receiving an FTA tax audit notice.</p>
			<a href="{$form211_url}" style="display: inline-flex; align-items: center; gap: 8px; padding: 11px 22px; background: linear-gradient(135deg, #0b3a6e 0%, #1e5a96 100%); color: #ffffff; text-decoration: none; font-weight: 600; font-size: 14.5px; border-radius: 6px; box-shadow: 0 2px 8px rgba(11,58,110,0.25);">
				Read Form 211 Penalty Waiver Guide ➔
			</a>
		</div>
	</div>
</div>
HTML;
			$content .= $callout;
		}


		// 4. Master Internal Linking Directory on Homepage (ID 172 / 5606 / 5617) and Services Hub
		$is_home_or_services = is_front_page() || $post_id === 172 || $post_id === 178 || $post_id === 5606 || $post_id === 5617 || ( is_page() && in_array( get_post_field( 'post_name', $post_id ), array( 'our-services', 'home-ar', 'services' ), true ) );
		if ( $is_home_or_services ) {
			$is_ar = ( function_exists( 'pll_current_language' ) && pll_current_language() === 'ar' ) || ( isset( $_SERVER['REQUEST_URI'] ) && strpos( $_SERVER['REQUEST_URI'], '/ar/' ) !== false ) || $post_id === 5606 || $post_id === 5617 || ( is_page() && strpos( get_page_uri( $post_id ), 'home-ar' ) !== false );

			if ( $is_ar ) {
				$directory = <<<HTML
<section id="rbo-internal-directory" dir="rtl" style="background: linear-gradient(180deg, #f8fafd 0%, #ffffff 100%); border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; padding: 60px 20px; margin-top: 50px; font-family: 'Cairo', 'Tajawal', sans-serif; direction: rtl; text-align: right; box-sizing: border-box; width: 100%;">
  <div style="max-width: 1200px; margin: 0 auto;">
    <div style="text-align: center; margin-bottom: 40px;">
      <span style="display: inline-block; padding: 5px 14px; background: rgba(212,160,23,0.12); color: #9c6c08; font-size: 12px; font-weight: 700; border-radius: 20px; letter-spacing: 0.5px; margin-bottom: 10px;">فروع الإمارات ودليل الخدمات التخصصية</span>
      <h2 style="font-size: 28px; font-weight: 800; color: #09203B; margin: 0 0 10px 0; line-height: 1.3;">خدمات المحاسبة والضرائب والتدقيق الشاملة في كافة إمارات الدولة الـ 7</h2>
      <p style="font-size: 15px; color: #556987; max-width: 780px; margin: 0 auto; line-height: 1.6;">وكلاء ضريبيون معتمدون من الهيئة الاتحادية للضرائب، ومدققون ماليون، ومحاسبون قانونيون لدعم شركات البر الرئيسي والمناطق الحرة والشركات الخارجية بامتثال مالي ومحاسبي كامل.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 28px;">
      <!-- Column 1: Emirates Regional Presence -->
      <div style="background: #ffffff; border-radius: 12px; padding: 24px; box-shadow: 0 4px 16px rgba(0,0,0,0.04); border: 1px solid #edf2f7; border-top: 4px solid #09203B; text-align: right;">
        <h3 style="font-size: 17px; font-weight: 700; color: #09203B; margin: 0 0 16px 0; display: flex; align-items: center; justify-content: flex-start; gap: 8px;">
          <span>📍</span> فروع وإمارات الدولة
        </h3>
        <ul style="list-style: none; padding: 0; margin: 0; font-size: 14px; line-height: 1.8; text-align: right;">
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/areas-we-serve-2/ajman/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 خدمات المحاسبة في عجمان</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/areas-we-serve-2/dubai/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 خدمات المحاسبة وتدقيق الحسابات في دبي</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/areas-we-serve-2/abu-dhabi/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 مكتب محاسبة معتمد في أبوظبي</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/areas-we-serve-2/sharjah/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 خدمات المحاسبة والتدقيق في الشارقة</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/areas-we-serve-2/ras-al-khaimah/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 شركة محاسبة معتمدة في رأس الخيمة</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/areas-we-serve-2/fujairah/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 خدمات المحاسبة والضرائب في الفجيرة</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/areas-we-serve-2/umm-al-quwain/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 تدقيق ومحاسبة قانونية في أم القيوين</a></li>
          <li style="margin-top: 10px; padding-top: 10px; border-top: 1px dashed #e2e8f0;"><a href="https://www.rboaccounting.ae/ar/areas-we-serve-2/" style="color: #d4a017; text-decoration: none; font-weight: 700;">استكشف تغطية كافة إمارات الدولة الـ 7 ←</a></li>
        </ul>
      </div>

      <!-- Column 2: Corporate Tax & VAT Compliance -->
      <div style="background: #ffffff; border-radius: 12px; padding: 24px; box-shadow: 0 4px 16px rgba(0,0,0,0.04); border: 1px solid #edf2f7; border-top: 4px solid #d4a017; text-align: right;">
        <h3 style="font-size: 17px; font-weight: 700; color: #09203B; margin: 0 0 16px 0; display: flex; align-items: center; justify-content: flex-start; gap: 8px;">
          <span>⚖️</span> ضريبة الشركات والقيمة المضافة
        </h3>
        <ul style="list-style: none; padding: 0; margin: 0; font-size: 14px; line-height: 1.8; text-align: right;">
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/corporate-tax-planning/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 مستشار ضريبة الشركات في الإمارات</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/corporate-tax-planning/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 التخطيط الضريبي القانوني للشركات</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/corporate-tax-registration/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 تسجيل ضريبة الشركات واستخراج TRN</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/corporate-tax-return-filing/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 تقديم إقرار ضريبة الشركات السنوي (9%)</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/vat-registration/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 تسجيل وإقرارات ضريبة القيمة المضافة</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/penalty-reconsideration/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 طلبات إعادة النظر في الغرامات وإلغائها</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/transfer-pricing/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 دراسات وملفات التسعير التحويلي</a></li>
        </ul>
      </div>

      <!-- Column 3: Audit, Assurance & Outsource -->
      <div style="background: #ffffff; border-radius: 12px; padding: 24px; box-shadow: 0 4px 16px rgba(0,0,0,0.04); border: 1px solid #edf2f7; border-top: 4px solid #1e5a96; text-align: right;">
        <h3 style="font-size: 17px; font-weight: 700; color: #09203B; margin: 0 0 16px 0; display: flex; align-items: center; justify-content: flex-start; gap: 8px;">
          <span>🔍</span> التدقيق المالي والمحاسبة
        </h3>
        <ul style="list-style: none; padding: 0; margin: 0; font-size: 14px; line-height: 1.8; text-align: right;">
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/audit-assurance/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 خدمات التدقيق والتأكيد المالي المعتمد</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/statutory-audit/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 التدقيق المالي القانوني المعتمد للشركات</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/free-zone-audit/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 تقارير تدقيق شركات المناطق الحرة لتجديد الرخص</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/accounts-payable-receivable/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 إدارة الذمم الدائنة والمدينة AP/AR</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/accounting/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 مسك الدفاتر المحاسبية والمطابقة اليومية</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/bank-reconciliation/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 التسوية البنكية والمطابقة الدورية</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/financial-reporting/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 إعداد التقارير المالية المتوافقة مع IFRS</a></li>
        </ul>
      </div>

      <!-- Column 4: Virtual CFO, Payroll & Setup -->
      <div style="background: #ffffff; border-radius: 12px; padding: 24px; box-shadow: 0 4px 16px rgba(0,0,0,0.04); border: 1px solid #edf2f7; border-top: 4px solid #07192E; text-align: right;">
        <h3 style="font-size: 17px; font-weight: 700; color: #09203B; margin: 0 0 16px 0; display: flex; align-items: center; justify-content: flex-start; gap: 8px;">
          <span>📈</span> المدير المالي والرواتب والتأسيس
        </h3>
        <ul style="list-style: none; padding: 0; margin: 0; font-size: 14px; line-height: 1.8; text-align: right;">
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/virtual-cfo/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 خدمات المدير المالي الافتراضي (CFO)</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/business-advisory/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 الاستشارات المالية والضريبية للأعمال</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/payroll-wps/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 إدارة الرواتب ونظام حماية الأجور WPS</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/eosb-calculation/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 احتساب مكافأة نهاية الخدمة (EOSB)</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/afz-new-lighter-package-2026-ajman-free-zone-setup/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 شريك معتمد لتأسيس شركات منطقة عجمان الحرة</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/ar/business-setup/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👈 تأسيس الأعمال والشركات في دبي</a></li>
          <li style="margin-top: 10px; padding-top: 10px; border-top: 1px dashed #e2e8f0;"><a href="https://www.rboaccounting.ae/ar/services/" style="color: #d4a017; text-decoration: none; font-weight: 700;">عرض كافة الخدمات التخصصية الـ 36 ←</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>
HTML;
				$content .= $directory;
			} else {
			$directory = <<<HTML
<section id="rbo-internal-directory" style="background: linear-gradient(180deg, #f8fafd 0%, #ffffff 100%); border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; padding: 60px 20px; margin-top: 50px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; box-sizing: border-box; width: 100%;">
  <div style="max-width: 1200px; margin: 0 auto;">
    <div style="text-align: center; margin-bottom: 40px;">
      <span style="display: inline-block; padding: 5px 14px; background: rgba(212,160,23,0.12); color: #9c6c08; font-size: 12px; font-weight: 700; text-transform: uppercase; border-radius: 20px; letter-spacing: 1px; margin-bottom: 10px;">UAE Regional Hubs &amp; Core Practice Index</span>
      <h2 style="font-size: 28px; font-weight: 800; color: #09203B; margin: 0 0 10px 0; line-height: 1.3;">Nationwide Accounting, Tax &amp; Audit Services Across All 7 Emirates</h2>
      <p style="font-size: 15px; color: #556987; max-width: 780px; margin: 0 auto; line-height: 1.6;">FTA-approved tax agents, chartered accountants, and AFZA-accredited statutory auditors supporting mainland LLCs, free zone entities, and offshore corporations with end-to-end financial compliance.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 28px;">
      <!-- Column 1: Emirates Regional Presence -->
      <div style="background: #ffffff; border-radius: 12px; padding: 24px; box-shadow: 0 4px 16px rgba(0,0,0,0.04); border: 1px solid #edf2f7; border-top: 4px solid #09203B;">
        <h3 style="font-size: 17px; font-weight: 700; color: #09203B; margin: 0 0 16px 0; display: flex; align-items: center; gap: 8px;">
          <span>📍</span> Emirates Regional Hubs
        </h3>
        <ul style="list-style: none; padding: 0; margin: 0; font-size: 14px; line-height: 1.8;">
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/areas-we-serve/ajman/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Bookkeeping services in Ajman</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/areas-we-serve/dubai/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Accounting services in Dubai</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/areas-we-serve/abu-dhabi/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Accounting firm in Abu Dhabi</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/areas-we-serve/sharjah/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Accounting services in Sharjah</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/areas-we-serve/ras-al-khaimah/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Accounting firm in Ras Al Khaimah</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/areas-we-serve/fujairah/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Accounting firm in Fujairah</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/areas-we-serve/umm-al-quwain/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Accounting firm in Umm Al Quwain</a></li>
          <li style="margin-top: 10px; padding-top: 10px; border-top: 1px dashed #e2e8f0;"><a href="https://www.rboaccounting.ae/areas-we-serve/" style="color: #d4a017; text-decoration: none; font-weight: 700;">Explore All 7 UAE Emirates Coverage ➔</a></li>
        </ul>
      </div>

      <!-- Column 2: Corporate Tax & VAT Compliance -->
      <div style="background: #ffffff; border-radius: 12px; padding: 24px; box-shadow: 0 4px 16px rgba(0,0,0,0.04); border: 1px solid #edf2f7; border-top: 4px solid #d4a017;">
        <h3 style="font-size: 17px; font-weight: 700; color: #09203B; margin: 0 0 16px 0; display: flex; align-items: center; gap: 8px;">
          <span>⚖️</span> Corporate Tax &amp; VAT
        </h3>
        <ul style="list-style: none; padding: 0; margin: 0; font-size: 14px; line-height: 1.8;">
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/our-services/corporate-tax/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Corporate tax consultant UAE</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/our-services/corporate-tax/corporate-tax-planning/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Corporate tax planning UAE</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/our-services/corporate-tax/registration/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Corporate tax registration UAE</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/our-services/corporate-tax/return-filing/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Corporate tax return filing UAE</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/our-services/vat-registration-filing/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 VAT registration &amp; return filing UAE</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/our-services/vat-registration-filing/penalty-reconsideration/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 FTA penalty reconsideration &amp; appeals</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/our-services/corporate-tax/transfer-pricing/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Transfer pricing documentation UAE</a></li>
        </ul>
      </div>

      <!-- Column 3: Audit, Assurance & Outsource -->
      <div style="background: #ffffff; border-radius: 12px; padding: 24px; box-shadow: 0 4px 16px rgba(0,0,0,0.04); border: 1px solid #edf2f7; border-top: 4px solid #1e5a96;">
        <h3 style="font-size: 17px; font-weight: 700; color: #09203B; margin: 0 0 16px 0; display: flex; align-items: center; gap: 8px;">
          <span>🔍</span> Audit &amp; Outsourcing
        </h3>
        <ul style="list-style: none; padding: 0; margin: 0; font-size: 14px; line-height: 1.8;">
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/our-services/audit-assurance/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Audit and assurance UAE</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/our-services/audit-assurance/statutory-audit/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Statutory audit services UAE</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/our-services/audit-assurance/free-zone-audit/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Free zone audit UAE</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/our-services/accounting/accounts-payable-and-receivable/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Accounts payable outsourcing UAE</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/our-services/accounting/bookkeeping-and-accounting/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Bookkeeping services UAE</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/our-services/accounting/bank-reconciliation/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Bank reconciliation services UAE</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/our-services/accounting/financial-reporting/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Financial reporting services UAE</a></li>
        </ul>
      </div>

      <!-- Column 4: Virtual CFO, Payroll & Setup -->
      <div style="background: #ffffff; border-radius: 12px; padding: 24px; box-shadow: 0 4px 16px rgba(0,0,0,0.04); border: 1px solid #edf2f7; border-top: 4px solid #07192E;">
        <h3 style="font-size: 17px; font-weight: 700; color: #09203B; margin: 0 0 16px 0; display: flex; align-items: center; gap: 8px;">
          <span>📈</span> CFO, Payroll &amp; Setup
        </h3>
        <ul style="list-style: none; padding: 0; margin: 0; font-size: 14px; line-height: 1.8;">
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/our-services/virtual-cfo/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Virtual CFO services UAE</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/our-services/virtual-cfo/business-advisory/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Business tax consulting services</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/our-services/payroll/wps/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 WPS payroll services UAE</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/our-services/payroll/end-of-service-benefits-calculation/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 End of service benefits (EOSB) UAE</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/business-setup/ajman-free-zone/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Ajman free zone channel partner</a></li>
          <li style="margin-bottom: 8px;"><a href="https://www.rboaccounting.ae/business-setup/dubai/" style="color: #0b3a6e; text-decoration: none; font-weight: 600;">👉 Business setup in Dubai</a></li>
          <li style="margin-top: 10px; padding-top: 10px; border-top: 1px dashed #e2e8f0;"><a href="https://www.rboaccounting.ae/our-services/" style="color: #d4a017; text-decoration: none; font-weight: 700;">View All 36 Specialized Services ➔</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>
HTML;
				$content .= $directory;
			}
		}

		return $content;
	},
	999
);





/**
 * Scoped styling fix for Sharjah Regional Hub (Page ID 2225)
 */
add_action( 'wp_head', function () {
	if ( ! is_page( 2225 ) ) {
		return;
	}
	?>
	<style id="rbo-sharjah-polished-styles">
	/* 1. Hero Container & Gradient (Exact Mirror to Ras Al Khaimah / Image 1) */
	.elementor-2225 .elementor-element.elementor-element-2578a63a {
		position: relative !important;
		background-color: transparent !important;
		background-image: linear-gradient(195deg, #E8B84B 0%, #0D1B2A 95%) !important;
		padding-top: 60px !important;
		padding-bottom: 120px !important;
		padding-left: 23px !important;
		padding-right: 20px !important;
		display: flex !important;
		flex-direction: column !important;
		align-items: center !important;
		justify-content: center !important;
		width: 100% !important;
		box-sizing: border-box !important;
		overflow: hidden !important;
	}
	.elementor-2225 .elementor-element.elementor-element-2578a63a::before {
		content: '' !important;
		position: absolute !important;
		top: 0 !important;
		left: 0 !important;
		width: 100% !important;
		height: 100% !important;
		background-image: linear-gradient(25deg, #0D1B2A 34%, #8B6326 100%) !important;
		opacity: 0.5 !important;
		pointer-events: none !important;
		z-index: 1 !important;
	}
	.elementor-2225 .elementor-element.elementor-element-2578a63a .e-con-inner {
		position: relative !important;
		z-index: 2 !important;
		max-width: 1140px !important;
		width: 100% !important;
		margin: 0 auto !important;
		display: flex !important;
		flex-direction: column !important;
		align-items: center !important;
		justify-content: center !important;
		text-align: center !important;
	}
	/* 2. Text Container & Headings */
	.elementor-2225 .elementor-element.elementor-element-44202be9 {
		width: 100% !important;
		max-width: 1140px !important;
		margin: 0 auto !important;
		background: transparent !important;
		box-shadow: none !important;
		border: none !important;
		padding: 0 !important;
		display: flex !important;
		flex-direction: column !important;
		align-items: center !important;
		text-align: center !important;
	}
	.elementor-2225 .elementor-element.elementor-element-166f0532 {
		padding: 0px 80px !important;
		margin-bottom: 16px !important;
		text-align: center !important;
		width: 100% !important;
		box-sizing: border-box !important;
	}
	.elementor-2225 .elementor-element.elementor-element-166f0532 .elementor-heading-title {
		font-family: "Playfair Display", Georgia, serif !important;
		font-size: 44px !important;
		font-weight: 700 !important;
		line-height: 52px !important;
		color: #FFFFFF !important;
		text-align: center !important;
		margin: 0 auto !important;
	}
	.elementor-2225 .elementor-element.elementor-element-166f0532 .elementor-heading-title span {
		color: #E8B84B !important;
	}
	/* 3. Text Editor Subtitle */
	.elementor-2225 .elementor-element.elementor-element-3901b1c1 {
		padding: 0% 10% !important;
		width: 100% !important;
		box-sizing: border-box !important;
		text-align: center !important;
	}
	.elementor-2225 .elementor-element.elementor-element-3901b1c1 p {
		font-size: 17px !important;
		color: #C5D0DC !important;
		line-height: 1.6 !important;
		text-align: center !important;
		margin-block-end: 8px !important;
	}
	.elementor-2225 .elementor-element.elementor-element-3901b1c1 p a {
		color: #E8B84B !important;
		text-decoration: underline !important;
	}
	.elementor-2225 .elementor-element.elementor-element-3901b1c1 strong {
		display: block !important;
		margin-top: 10px !important;
		color: #FFFFFF !important;
		font-size: 14.5px !important;
		letter-spacing: 0.3px !important;
		text-align: center !important;
	}
	/* 4. Form Container Overlap (Exact RAK -60px Margin) */
	.elementor-2225 .elementor-element.elementor-element-7f79b28 {
		margin-top: -60px !important;
		margin-bottom: 50px !important;
		position: relative !important;
		z-index: 10 !important;
		display: flex !important;
		justify-content: center !important;
		align-items: center !important;
		width: 100% !important;
	}
	.elementor-2225 .elementor-element.elementor-element-49163807 {
		max-width: 1140px !important;
		width: 100% !important;
		margin: 0 auto !important;
	}
	/* 4. Content Containers 2 & 3 (Side by Side 2-Column Row) */
	.elementor-2225 .elementor-element.elementor-element-7488cca6 > .e-con-inner,
	.elementor-2225 .elementor-element.elementor-element-65f4f848 > .e-con-inner {
		display: flex !important;
		flex-direction: row !important;
		align-items: center !important;
		justify-content: space-between !important;
		gap: 40px !important;
		max-width: 1140px !important;
		margin: 0 auto !important;
	}
	.elementor-2225 .elementor-element.elementor-element-35420176,
	.elementor-2225 .elementor-element.elementor-element-2645132a {
		flex: 1 1 52% !important;
		max-width: 52% !important;
	}
	.elementor-2225 .elementor-element.elementor-element-33d3ac44,
	.elementor-2225 .elementor-element.elementor-element-3f19cf5d {
		flex: 1 1 44% !important;
		max-width: 44% !important;
		min-height: 380px !important;
	}
	@media (max-width: 767px) {
		.elementor-2225 .elementor-element.elementor-element-166f0532 .elementor-heading-title {
			font-size: 28px !important;
		}
		.elementor-2225 .elementor-element.elementor-element-7488cca6 > .e-con-inner,
		.elementor-2225 .elementor-element.elementor-element-65f4f848 > .e-con-inner {
			flex-direction: column !important;
		}
		.elementor-2225 .elementor-element.elementor-element-35420176,
		.elementor-2225 .elementor-element.elementor-element-2645132a,
		.elementor-2225 .elementor-element.elementor-element-33d3ac44,
		.elementor-2225 .elementor-element.elementor-element-3f19cf5d {
			flex: 1 1 100% !important;
			max-width: 100% !important;
		}
	}
	</style>
	<?php
}, 999 );


/**
 * 10. RBO Multilingual Language Switcher (EN | العربية) & Arabic RTL Engine
 * Enables seamless one-tap switching between English & Arabic counterparts
 * with executive UAE branding, clean navbar formatting, and full RTL font support.
 */
add_action( 'wp_head', function() {
	$is_ar = rbo_is_arabic_request();

	?>
	<style id="rbo-global-header-fixes">
	/* 1. Hide unwanted theme entry-title headers globally on all pages */
	.page-header, .entry-header, h1.entry-title {
		display: none !important;
	}
	</style>
	<?php

	if ( $is_ar ) {
		?>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
		<style id="rbo-arabic-rtl-styles">
		/* =========================================================================
		   1. Universal RTL Layout & Container Protection
		   ========================================================================= */
		html[lang="ar"], body.rtl {
			direction: rtl !important;
			text-align: right;
			font-family: 'Cairo', 'Tajawal', -apple-system, BlinkMacSystemFont, 'Segoe UI', Tahoma, Arial, sans-serif !important;
		}
		html[lang="ar"] h1, html[lang="ar"] h2, html[lang="ar"] h3, html[lang="ar"] h4, html[lang="ar"] h5, html[lang="ar"] h6 {
			font-family: 'Cairo', 'Tajawal', sans-serif !important;
		}

		/* Ensure Elementor containers never collapse horizontally */
		html[lang="ar"] .elementor,
		body.rtl .elementor {
			width: 100% !important;
			max-width: 100% !important;
		}
		html[lang="ar"] .e-con,
		body.rtl .e-con {
			max-width: 100%;
			box-sizing: border-box;
		}
		html[lang="ar"] .e-con.e-parent,
		body.rtl .e-con.e-parent {
			width: 100% !important;
		}
		html[lang="ar"] .e-con-boxed > .e-con-inner,
		body.rtl .e-con-boxed > .e-con-inner {
			max-width: 1200px !important;
			width: 100% !important;
			margin-left: auto !important;
			margin-right: auto !important;
		}
		html[lang="ar"] .e-con-full,
		body.rtl .e-con-full {
			width: 100% !important;
			max-width: 100% !important;
		}

		/* Preserve Centered Headings */
		html[lang="ar"] .elementor-align-center .elementor-heading-title,
		html[lang="ar"] .elementor-widget-heading.elementor-align-center h1,
		html[lang="ar"] .elementor-widget-heading.elementor-align-center h2,
		html[lang="ar"] .elementor-widget-heading.elementor-align-center h3 {
			text-align: center !important;
		}
		html[lang="ar"] .elementor-align-left .elementor-heading-title,
		html[lang="ar"] .elementor-align-right .elementor-heading-title {
			text-align: right !important;
		}

		/* Keep Header & Navbar layout pristine */
		.site-header, 
		header[data-elementor-type="header"], 
		.elementor-location-header,
		.site-header .main-navigation ul, 
		.elementor-location-header .main-navigation ul,
		.elementor-nav-menu {
			direction: ltr !important;
			text-align: left !important;
		}

		/* Homepage Hero Card - English Luxury Dark Navy Translucent */
		.elementor-5606 .elementor-element-5a37033f,
		.elementor-5617 .elementor-element-5a37033f {
			background-color: transparent !important;
			background-image: linear-gradient(180deg, #111E4080 13%, #111E40 100%) !important;
			border: 1px solid rgba(255, 255, 255, 0.15) !important;
			border-radius: 16px !important;
			box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3) !important;
		}
		.elementor-5606 .elementor-element-5a37033f h3,
		.elementor-5617 .elementor-element-5a37033f h3,
		.elementor-5606 .elementor-element-5a37033f .elementor-heading-title,
		.elementor-5617 .elementor-element-5a37033f .elementor-heading-title,
		.elementor-5606 .elementor-element-5a37033f p,
		.elementor-5617 .elementor-element-5a37033f p,
		.elementor-5606 .elementor-element-5a37033f label,
		.elementor-5617 .elementor-element-5a37033f label,
		.elementor-5606 .elementor-element-5a37033f .elementor-field-label,
		.elementor-5617 .elementor-element-5a37033f .elementor-field-label {
			color: #ffffff !important;
		}

		/* RTL Icon Lists & Bullets (Proper Right-to-Left Alignment) */
		html[lang="ar"] .elementor-icon-list-items,
		body.rtl .elementor-icon-list-items {
			text-align: right !important;
		}
		html[lang="ar"] .elementor-icon-list-item,
		body.rtl .elementor-icon-list-item {
			justify-content: flex-start !important;
			text-align: right !important;
			flex-direction: row !important;
		}
		html[lang="ar"] .elementor-icon-list-icon,
		body.rtl .elementor-icon-list-icon {
			margin-left: 10px !important;
			margin-right: 0 !important;
			display: inline-flex !important;
			align-items: center !important;
		}
		html[lang="ar"] .elementor-icon-list-text,
		body.rtl .elementor-icon-list-text {
			text-align: right !important;
			unicode-bidi: isolate;
		}

		
		/* Internal Linking Directory RTL Support */
		html[lang="ar"] #rbo-internal-directory,
		body.rtl #rbo-internal-directory {
			direction: rtl !important;
			text-align: right !important;
			font-family: 'Cairo', 'Tajawal', sans-serif !important;
		}
		html[lang="ar"] #rbo-internal-directory h2,
		html[lang="ar"] #rbo-internal-directory h3,
		html[lang="ar"] #rbo-internal-directory p,
		html[lang="ar"] #rbo-internal-directory a,
		html[lang="ar"] #rbo-internal-directory li {
			text-align: right !important;
			font-family: 'Cairo', 'Tajawal', sans-serif !important;
		}
		html[lang="ar"] #rbo-internal-directory div[style*="text-align: center"] {
			text-align: center !important;
		}
		html[lang="ar"] #rbo-internal-directory div[style*="text-align: center"] h2,
		html[lang="ar"] #rbo-internal-directory div[style*="text-align: center"] p {
			text-align: center !important;
		}

		/* Arabic Footer RTL Styling */
		html[lang="ar"] footer.elementor-location-footer,
		body.rtl footer.elementor-location-footer {
			direction: rtl !important;
			text-align: right !important;
		}
		html[lang="ar"] footer .elementor-heading-title,
		body.rtl footer .elementor-heading-title {
			text-align: right !important;
		}
		html[lang="ar"] footer .elementor-widget-text-editor,
		body.rtl footer .elementor-widget-text-editor {
			text-align: right !important;
		}
		html[lang="ar"] footer .elementor-icon-list-items,
		body.rtl footer .elementor-icon-list-items {
			text-align: right !important;
		}
		html[lang="ar"] footer .elementor-element-ed1dd21,
		body.rtl footer .elementor-element-ed1dd21 {
			text-align: center !important;
		}
		html[lang="ar"] footer .elementor-element-d60ecab p,
		body.rtl footer .elementor-element-d60ecab p {
			text-align: center !important;
			direction: ltr !important;
			unicode-bidi: isolate;
		}
		</style>
		<?php
	}
}, 99 );

add_action( 'wp_footer', function() {
	$post_id = get_the_ID();
	$cur_lang = rbo_is_arabic_request() ? 'ar' : 'en';

	if ( $cur_lang === 'ar' ) {
		// Target is English
		$target_lang = 'en';
		$target_id = ( function_exists( 'pll_get_post' ) && $post_id ) ? pll_get_post( $post_id, 'en' ) : 0;
		$target_url = $target_id ? get_permalink( $target_id ) : home_url( '/' );
		$flag = '🌐';
		$label = 'English';
		$sub = 'Switch to English';
	} else {
		// Target is Arabic
		$target_lang = 'ar';
		$target_id = ( function_exists( 'pll_get_post' ) && $post_id ) ? pll_get_post( $post_id, 'ar' ) : 0;
		$target_url = $target_id ? get_permalink( $target_id ) : home_url( '/ar/' );
		$flag = '🇦🇪';
		$label = 'العربية';
		$sub = 'التحويل للغة العربية';
	}
	?>
	<div id="rbo-global-lang-toggle" class="rbo-lang-pill-wrapper">
		<a href="<?php echo esc_url( $target_url ); ?>" 
		   onclick="document.cookie='pll_language=<?php echo $target_lang; ?>;path=/;max-age=31536000'; window.location.href='<?php echo esc_url( $target_url ); ?>'; return false;"
		   class="rbo-lang-pill" 
		   title="<?php echo esc_attr( $sub ); ?>">
			<span class="rbo-lang-flag"><?php echo $flag; ?></span>
			<span class="rbo-lang-text"><?php echo esc_html( $label ); ?></span>
		</a>
	</div>
	<style>
	.rbo-lang-pill-wrapper {
		position: fixed;
		bottom: 24px;
		left: 24px;
		z-index: 999999;
	}
	.rbo-lang-pill {
		display: inline-flex;
		align-items: center;
		gap: 8px;
		padding: 10px 18px;
		background: linear-gradient(135deg, #0D1B2A 0%, #1e3a5f 100%);
		color: #ffffff !important;
		text-decoration: none !important;
		font-family: 'Cairo', 'Segoe UI', Arial, sans-serif;
		font-size: 14.5px;
		font-weight: 700;
		border-radius: 50px;
		border: 1.5px solid #d4a017;
		box-shadow: 0 6px 20px rgba(13,27,42,0.35);
		transition: all 0.25s ease;
		cursor: pointer;
	}
	.rbo-lang-pill:hover {
		background: #d4a017;
		color: #0D1B2A !important;
		border-color: #0D1B2A;
		box-shadow: 0 8px 25px rgba(212,160,23,0.45);
		transform: translateY(-2px);
	}
	.rbo-lang-flag {
		font-size: 16px;
		line-height: 1;
	}
	@media (max-width: 767px) {
		.rbo-lang-pill-wrapper {
			bottom: 84px; /* avoid overlapping Chaty whatsapp button */
			left: 16px;
		}
		.rbo-lang-pill {
			padding: 8px 14px;
			font-size: 13.5px;
		}
	}
	</style>
	<?php
}, 9999 );

add_action( 'wp_footer', function() {
	if ( ! rbo_is_arabic_request() ) return;
	?>
	<script id="rbo-arabic-header-footer-trans">
	(function() {
		var menuMap = {
			'Home': 'الرئيسية',
			'About Us': 'من نحن',
			'Our Services': 'خدماتنا',
			'Areas We Serve': 'إمارات الدولة',
			'Blog': 'المدونة',
			'Contact Us': 'اتصل بنا',
			'Free VAT Check': 'فحص الضريبة مجاناً',
			
			// Dropdown Sub-menus
			'Accounting Services': 'خدمات المحاسبة ومسك الدفاتر',
			'Bookkeeping and Accounting': 'مسك الدفاتر والمحاسبة',
			'Bank Reconciliation Services': 'التسوية البنكية والمطابقة',
			'Accounts Payable & Receivable': 'إدارة الذمم الدائنة والمدينة',
			'Accounts Payable &#038; Receivable': 'إدارة الذمم الدائنة والمدينة',
			'IFRS Compliance Services': 'الامتثال لمعايير IFRS الدولية',
			'Financial Reporting Service': 'إعداد التقارير المالية الدورية',
			'VAT Registration & Filing UAE': 'تسجيل وإقرارات ضريبة القيمة المضافة',
			'VAT Registration &amp; Filing UAE': 'تسجيل وإقرارات ضريبة القيمة المضافة',
			'VAT registration': 'تسجيل ضريبة القيمة المضافة',
			'VAT return filing': 'تقديم إقرارات ضريبة القيمة المضافة',
			'VAT refund services': 'خدمات استرداد ضريبة القيمة المضافة',
			'VAT advisory services': 'استشارات ضريبة القيمة المضافة',
			'FTA audit assistance': 'دعم التدقيق الضريبي FTA',
			'FTA records amendment': 'تعديل بيانات السجل الضريبي',
			'Penalty Reconsideration & Appeals': 'إعادة النظر في الغرامات والاعتراضات',
			'Corporate Tax UAE': 'ضريبة الشركات في الإمارات',
			'Corporate Tax Registration': 'تسجيل ضريبة الشركات',
			'Corporate Tax Return Filing UAE': 'تقديم إقرار ضريبة الشركات',
			'Corporate Tax Planning UAE': 'التخطيط لضريبة الشركات',
			'Transfer Pricing UAE': 'التسعير التحويلي في الإمارات',
			'Payroll Services Dubai & UAE': 'إدارة الرواتب ونظام WPS',
			'Payroll Services Dubai &amp; UAE': 'إدارة الرواتب ونظام WPS',
			'WPS payroll services': 'إدارة الرواتب عبر نظام WPS',
			'End of service benefits calculation': 'احتساب مكافأة نهاية الخدمة (EOSB)',
			'Payroll reporting services': 'تقارير الرواتب الشهرية',
			'Employee leave management': 'إدارة الإجازات السنوية',
			'Audit & Assurance Services UAE': 'خدمات التدقيق والتأكيد المالي',
			'Audit &amp; Assurance Services UAE': 'خدمات التدقيق والتأكيد المالي',
			'Free Zone Audit UAE': 'تدقيق شركات المناطق الحرة',
			'Statutory audit services UAE': 'التدقيق المالي القانوني المعتمد',
			'Internal Audit Services UAE': 'خدمات التدقيق الداخلي',
			'Due Diligence Services UAE': 'الفحص المالي النافي للجهالة',
			'Risk Assessment Services UAE': 'تقييم وإدارة المخاطر التشغيلية',
			'Virtual CFO Services': 'خدمات المدير المالي الافتراضي (CFO)',
			'Business advisory services UAE': 'استشارات تطوير الأعمال',
			'Financial planning and analysis services UAE': 'التخطيط والتحليل المالي الاستراتيجي',
			'Budgeting services for businesses UAE': 'إعداد الميزانيات والخطط المالية',
			'Management Reporting': 'التقارير الإدارية ومؤشرات الأداء',
			'Cash flow management services UAE': 'إدارة التدفقات النقدية والسيولة',
			'Business Setup & Company Formation': 'تأسيس الشركات والأعمال',
			'Business Setup &amp; Company Formation': 'تأسيس الشركات والأعمال',
			'Ajman Free Zone (AFZA)': 'المنطقة الحرة بعجمان (AFZA)',
			'Mainland vs Free Zone': 'مقارنة البر الرئيسي والمناطق الحرة',
			'Dubai Business Setup': 'تأسيس الشركات في دبي',
			'Trade Licence Process': 'خطوات إصدار الرخصة التجارية',
			'Setup Packages': 'باقات التأسيس المتكاملة',
			'Accounting Consulting Firm in Dubai': 'خدمات المحاسبة والتدقيق في دبي',
			'Abu Dhabi': 'أبوظبي',
			'Accounting Consulting Firm in Sharjah': 'خدمات المحاسبة والتدقيق في الشارقة',
			'Accounting Consulting Firm in Fujairah': 'خدمات المحاسبة والضرائب في الفجيرة',
			'Ajman': 'عجمان',
			'Accounting Consulting Firm in Umm Al Quwain': 'خدمات المحاسبة والتدقيق في أم القيوين',
			'Accounting Consulting Firm in Ras Al Khaimah': 'خدمات المحاسبة والتدقيق في رأس الخيمة'
		};

		document.querySelectorAll('.elementor-location-header a, .site-header a, .elementor-nav-menu a').forEach(function(a) {
			var txt = a.childNodes[0] && a.childNodes[0].nodeType === 3 ? a.childNodes[0].nodeValue.trim() : a.innerText.trim();
			for (var en in menuMap) {
				if (txt === en) {
					if (a.childNodes[0] && a.childNodes[0].nodeType === 3) {
						a.childNodes[0].nodeValue = menuMap[en] + ' ';
					} else {
						a.innerText = menuMap[en];
					}
				}
			}
		});

		var footerMap = {
			'Our Services': 'خدماتنا',
			'Locations': 'إمارات الدولة',
			'Company': 'عن RBO',
			'Follow Us': 'تابعنا',
			'Bookkeeping & Accounting': 'المحاسبة ومسك الدفاتر',
			'VAT Registration & Filing': 'تسجيل وإقرارات ضريبة القيمة المضافة',
			'Corporate Tax UAE': 'ضريبة الشركات في الإمارات',
			'UAE Business Setup & Formation': 'تأسيس الشركات في الإمارات',
			'Audit Services': 'خدمات التدقيق المالي المعتمد',
			'Payroll Services': 'إدارة الرواتب ونظام WPS',
			'Virtual CFO Services': 'المدير المالي الافتراضي (CFO)',
			'Ajman': 'عجمان',
			'Dubai': 'دبي',
			'Abu Dhabi': 'أبوظبي',
			'Sharjah': 'الشارقة',
			'Ras Al Khaimah': 'رأس الخيمة',
			'Fujairah': 'الفجيرة',
			'Umm Al Quwain': 'أم القيوين',
			'Privacy Policy': 'سياسة الخصوصية',
			'Terms & Conditions': 'الشروط والأحكام',
			'Blog & Resources': 'المدونة والموارد'
		};

		var footerEl = document.querySelector('footer.elementor-location-footer');
		if (footerEl) {
			footerEl.querySelectorAll('.elementor-heading-title').forEach(function(h) {
				var t = h.innerText.trim();
				if (footerMap[t]) h.innerText = footerMap[t];
			});

			footerEl.querySelectorAll('.elementor-icon-list-text').forEach(function(span) {
				var t = span.innerText.trim();
				if (footerMap[t]) span.innerText = footerMap[t];
			});

			var desc = footerEl.querySelector('.footer-desc');
			if (desc) {
				desc.innerText = 'خدمات المحاسبة وضريبة القيمة المضافة وضريبة الشركات والتدقيق والرواتب المعتمدة من الهيئة الاتحادية للضرائب للشركات في كافة إمارات الدولة الـ 7.';
			}

			var copy = footerEl.querySelector('.elementor-element-d60ecab p');
			if (copy) {
				copy.innerHTML = '<span dir="ltr">© 2026 RBO Accounting Services FZE. All Rights Reserved.</span>';
			}
		}
	})();
	</script>
	<?php
}, 999 );
