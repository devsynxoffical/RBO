<?php
/**
 * Plugin Name: RBO SEO extras
 * Description: FAQ + Service schema, local SEO blocks for emirates, related styles.
 */

defined( 'ABSPATH' ) || exit;

/**
 * Output Google Search Console verification meta tag.
 */
add_action(
	'wp_head',
	function () {
		echo '<meta name="google-site-verification" content="OO2yx1wSe7bvwRJz4DF8Ml1w5i2lOylQ_Tm1mX6W_9k" />' . "\n";
	},
	1
);

/**
 * Inject FAQPage + Service JSON-LD from post meta (works with Rank Math).
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
 * Visible FAQ section on service pages that have _rbo_faq_schema.
 */
function rbo_get_faq_html() {
	if ( is_admin() || ! is_singular( 'page' ) ) {
		return '';
	}
	$id = (int) get_queried_object_id();
	if ( ! in_array( $id, array( 4420, 4421, 1547 ), true ) ) {
		return '';
	}
	static $done = array();
	if ( ! empty( $done[ $id ] ) ) {
		return '';
	}
	$faqs = get_post_meta( $id, '_rbo_faq_schema', true );
	if ( empty( $faqs ) || ! is_array( $faqs ) ) {
		return '';
	}
	$done[ $id ] = true;

	$html  = '<section class="rbo-faq-block" aria-label="Frequently asked questions">';
	$html .= '<h2>Frequently asked questions</h2>';
	foreach ( $faqs as $item ) {
		if ( empty( $item['q'] ) || empty( $item['a'] ) ) {
			continue;
		}
		$html .= '<div class="rbo-faq-item">';
		$html .= '<h3>' . esc_html( $item['q'] ) . '</h3>';
		$html .= '<p>' . esc_html( $item['a'] ) . '</p>';
		$html .= '</div>';
	}
	$html .= '</section>';
	return $html;
}

/**
 * Unique local SEO HTML for emirate pages.
 */
function rbo_get_local_seo_html() {
	if ( is_admin() || ! is_singular( 'page' ) ) {
		return '';
	}
	$id = (int) get_queried_object_id();
	$emirate_ids = array( 1756, 2239, 2212, 2225, 2249, 2263, 2277 );
	if ( ! in_array( $id, $emirate_ids, true ) ) {
		return '';
	}
	static $done = array();
	if ( ! empty( $done[ $id ] ) ) {
		return '';
	}
	$html = get_post_meta( $id, '_rbo_local_seo_html', true );
	if ( ! is_string( $html ) || '' === $html ) {
		return '';
	}
	$done[ $id ] = true;
	return $html;
}

add_filter(
	'elementor/frontend/the_content',
	function ( $content ) {
		return $content . rbo_get_faq_html() . rbo_get_local_seo_html();
	},
	30
);

add_action(
	'wp_enqueue_scripts',
	function () {
		$css = '
/* RBO Base & Local SEO */
.rbo-local-seo, .rbo-faq-block { max-width: 1100px; margin: 28px auto 40px; padding: 22px 20px; background: #f7f9fc; border-left: 4px solid #c9a227; color: #09203b; box-sizing: border-box; border-radius: 6px; }
.rbo-local-seo h2, .rbo-faq-block h2 { font-size: 1.35rem; margin: 0 0 12px; color: #09203b; line-height: 1.3; }
.rbo-local-seo p, .rbo-faq-block p { margin: 0 0 12px; font-size: 15px; line-height: 1.65; }
.rbo-local-seo ul { margin: 0 0 12px; padding-left: 1.2rem; }
.rbo-local-seo li { margin: 0 0 6px; font-size: 15px; line-height: 1.5; }
.rbo-local-seo a, .rbo-faq-block a { color: #0b3a6e; text-decoration: underline; }
.rbo-faq-item { margin: 0 0 14px; padding-bottom: 12px; border-bottom: 1px solid #e3e8ef; }
.rbo-faq-item:last-child { border-bottom: 0; margin-bottom: 0; padding-bottom: 0; }
.rbo-faq-item h3 { font-size: 1.05rem; margin: 0 0 6px; color: #09203b; line-height: 1.35; }
.rbo-related { margin: 18px 0; padding: 14px 16px; background: #f7f9fc; border-radius: 8px; font-size: 15px; line-height: 1.6; }

/* Single Post Centering & Full Layout Fix */
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

/* In-Article Styling */
.rbo-blog {
  max-width: 100% !important;
  padding: 30px 36px 44px !important;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
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
.rbo-blog p {
  margin: 0 0 18px !important;
  line-height: 1.8 !important;
}
.rbo-blog ul, .rbo-blog ol {
  margin: 0 0 20px !important;
  padding-left: 24px !important;
}
.rbo-blog li {
  margin-bottom: 8px !important;
  line-height: 1.7 !important;
}
.rbo-blog a {
  color: #0b3a6e !important;
  font-weight: 600 !important;
  text-decoration: underline !important;
}
.rbo-blog a:hover {
  color: #c9a227 !important;
}

/* Callouts & CTA Box */
.rbo-blog .rbo-box {
  background: #fdfaf2 !important;
  border-left: 4px solid #c9a227 !important;
  border-radius: 0 8px 8px 0 !important;
  padding: 18px 22px !important;
  margin: 28px 0 !important;
  color: #334155 !important;
}
.rbo-blog .rbo-cta {
  background: #09203b !important;
  color: #ffffff !important;
  border-radius: 12px !important;
  padding: 28px 30px !important;
  margin: 36px 0 !important;
}
.rbo-blog .rbo-cta strong {
  font-size: 20px !important;
  color: #ffffff !important;
}
.rbo-blog .rbo-cta a {
  display: inline-block !important;
  background: #e8b84b !important;
  color: #09203b !important;
  font-weight: 700 !important;
  padding: 12px 22px !important;
  border-radius: 8px !important;
  text-decoration: none !important;
  margin-top: 10px !important;
  transition: background 0.2s ease !important;
}
.rbo-blog .rbo-cta a:hover {
  background: #f4ca68 !important;
  color: #09203b !important;
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
  padding: 14px 16px !important;
  text-align: left !important;
}
.rbo-blog td {
  padding: 12px 16px !important;
  border-bottom: 1px solid #e2e8f0 !important;
  background: #ffffff !important;
}
.rbo-blog tr:nth-child(even) td {
  background: #f8fafc !important;
}

/* Infographics */
.rbo-infographic-box {
  margin: 32px 0 !important;
  background: #ffffff !important;
  border: 1px solid #e2e8f0 !important;
  border-radius: 12px !important;
  padding: 14px !important;
  box-shadow: 0 6px 24px rgba(9, 32, 59, 0.07) !important;
  text-align: center !important;
}
.rbo-infographic-box img {
  width: 100% !important;
  height: auto !important;
  border-radius: 8px !important;
  display: block !important;
}
.rbo-img-caption {
  font-size: 13px !important;
  color: #64748b !important;
  margin: 10px 0 2px !important;
  font-style: italic !important;
  text-align: center !important;
}

/* Mobile Adjustments */
@media (max-width: 767px) {
  .rbo-blog {
    padding: 18px 16px 26px !important;
  }
  .rbo-blog h2 {
    font-size: 22px !important;
  }
  .rbo-blog table {
    display: block !important;
    overflow-x: auto !important;
    -webkit-overflow-scrolling: touch !important;
  }
  .rbo-blog th, .rbo-blog td {
    padding: 10px 12px !important;
    white-space: nowrap !important;
  }
  .rbo-blog .rbo-cta {
    padding: 20px 18px !important;
  }
}
';
		wp_register_style( 'rbo-seo-extras', false, array(), '1.2.0' );
		wp_enqueue_style( 'rbo-seo-extras' );
		wp_add_inline_style( 'rbo-seo-extras', $css );
	},
	40
);
