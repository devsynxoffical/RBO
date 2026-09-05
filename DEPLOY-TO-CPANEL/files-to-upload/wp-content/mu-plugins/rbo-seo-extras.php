<?php
/**
 * Plugin Name: RBO SEO extras
 * Description: FAQ + Service schema, local SEO blocks for emirates, related styles.
 */

defined( 'ABSPATH' ) || exit;

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
.rbo-local-seo,.rbo-faq-block{max-width:1100px;margin:28px auto 40px;padding:22px 20px;background:#f7f9fc;border-left:4px solid #c9a227;color:#09203b;box-sizing:border-box}
.rbo-local-seo h2,.rbo-faq-block h2{font-size:1.35rem;margin:0 0 12px;color:#09203b;line-height:1.3}
.rbo-local-seo p,.rbo-faq-block p{margin:0 0 12px;font-size:15px;line-height:1.65}
.rbo-local-seo ul{margin:0 0 12px;padding-left:1.2rem}
.rbo-local-seo li{margin:0 0 6px;font-size:15px;line-height:1.5}
.rbo-local-seo a,.rbo-faq-block a{color:#0b3a6e;text-decoration:underline}
.rbo-faq-item{margin:0 0 14px;padding-bottom:12px;border-bottom:1px solid #e3e8ef}
.rbo-faq-item:last-child{border-bottom:0;margin-bottom:0;padding-bottom:0}
.rbo-faq-item h3{font-size:1.05rem;margin:0 0 6px;color:#09203b;line-height:1.35}
.rbo-related{margin:18px 0;padding:14px 16px;background:#f7f9fc;border-radius:8px;font-size:15px;line-height:1.6}
@media(max-width:767px){.rbo-local-seo,.rbo-faq-block{margin:16px 12px 28px;padding:16px 14px}.rbo-local-seo h2,.rbo-faq-block h2{font-size:1.15rem}}
';
		wp_register_style( 'rbo-seo-extras', false, array(), '1.1.0' );
		wp_enqueue_style( 'rbo-seo-extras' );
		wp_add_inline_style( 'rbo-seo-extras', $css );
	},
	40
);
