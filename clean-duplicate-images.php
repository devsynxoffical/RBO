<?php
require_once __DIR__ . '/wp-load.php';

$upload_dir = wp_upload_dir();
$img1_url = trailingslashit( $upload_dir['baseurl'] ) . '2026/09/uae-corporate-tax-small-business-relief-guide-2026.jpg';
$img2_url = trailingslashit( $upload_dir['baseurl'] ) . '2026/09/ajman-free-zone-company-audit-vat-compliance-guide-2026.jpg';

// Blog 1
$p1 = get_page_by_path( 'uae-corporate-tax-small-business-relief-guide-2026', OBJECT, 'post' );
if ( $p1 ) {
	// Remove top image container if present so it doesn't duplicate the hero header
	$content = preg_replace( '/<div style="margin-bottom:\s*28px;[^>]*>.*?<\/div>/s', '', $p1->post_content );
	wp_update_post( array(
		'ID'           => $p1->ID,
		'post_content' => trim( $content ),
	) );
}

// Blog 2
$p2 = get_page_by_path( 'ajman-free-zone-company-audit-vat-compliance-guide', OBJECT, 'post' );
if ( $p2 ) {
	$content = preg_replace( '/<div style="margin-bottom:\s*28px;[^>]*>.*?<\/div>/s', '', $p2->post_content );
	wp_update_post( array(
		'ID'           => $p2->ID,
		'post_content' => trim( $content ),
	) );
}

echo "SUCCESS: Duplicate top images cleaned up.";
