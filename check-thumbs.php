<?php
require_once __DIR__ . '/wp-load.php';

$p1 = get_page_by_path( 'uae-corporate-tax-small-business-relief-guide-2026', OBJECT, 'post' );
$p2 = get_page_by_path( 'ajman-free-zone-company-audit-vat-compliance-guide', OBJECT, 'post' );

if ( $p1 ) {
	$t1 = get_post_thumbnail_id( $p1->ID );
	echo 'P1 (ID ' . $p1->ID . ') thumb: ' . $t1 . ' -> ' . wp_get_attachment_url( $t1 ) . "\n";
}
if ( $p2 ) {
	$t2 = get_post_thumbnail_id( $p2->ID );
	echo 'P2 (ID ' . $p2->ID . ') thumb: ' . $t2 . ' -> ' . wp_get_attachment_url( $t2 ) . "\n";
}
