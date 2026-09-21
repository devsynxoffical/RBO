<?php
require_once __DIR__ . '/wp-load.php';

$upload_dir = wp_upload_dir();
$img2_url = trailingslashit( $upload_dir['baseurl'] ) . '2026/09/ajman-free-zone-company-audit-vat-compliance-guide-2026.jpg';

// Find Blog 2 by search
$posts = get_posts( array(
	'post_type'   => 'post',
	'numberposts' => -1,
	's'           => 'Ajman Free Zone Company Audit',
) );

foreach ( $posts as $p ) {
	echo 'Found: ' . $p->ID . ' | ' . $p->post_name . "<br>\n";
	
	// Set image in post_content if missing
	if ( strpos( $p->post_content, 'ajman-free-zone-company-audit-vat-compliance-guide-2026.jpg' ) === false ) {
		$new_content = '<div class="rbo-blog"><div style="margin-bottom: 28px; text-align: center;"><img src="' . $img2_url . '" alt="Ajman Free Zone Authority AFZA Company Audit &amp; VAT Compliance 2026" style="width: 100%; max-width: 900px; height: auto; border-radius: 12px; box-shadow: 0 4px 20px rgba(9, 32, 59, 0.12); display: inline-block;" /></div>' . substr( $p->post_content, strlen( '<div class="rbo-blog">' ) );
		wp_update_post( array(
			'ID'           => $p->ID,
			'post_content' => $new_content,
		) );
		echo 'Updated post_content for ID ' . $p->ID . "<br>\n";
	}
	
	// Find attachment ID 5491 or search attachment
	$att = get_posts( array(
		'post_type'   => 'attachment',
		'numberposts' => 1,
		's'           => 'ajman-free-zone-company-audit-vat-compliance-guide',
	) );
	if ( $att ) {
		set_post_thumbnail( $p->ID, $att[0]->ID );
		echo 'Set thumbnail ' . $att[0]->ID . ' for ID ' . $p->ID . "<br>\n";
	} elseif ( get_post( 5491 ) ) {
		set_post_thumbnail( $p->ID, 5491 );
		echo 'Set thumbnail 5491 for ID ' . $p->ID . "<br>\n";
	}
}
