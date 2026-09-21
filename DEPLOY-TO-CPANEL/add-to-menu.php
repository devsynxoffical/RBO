<?php
/**
 * Standalone 1-Click Menu Attacher for RBO Business Setup Pages
 * Upload to public_html/ and open: https://www.rboaccounting.ae/add-to-menu.php
 */

@ini_set( 'display_errors', 1 );
@ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

if ( ! file_exists( __DIR__ . '/wp-load.php' ) ) {
	die( '<h2 style="font-family:sans-serif;color:red;">Error: Place add-to-menu.php directly in public_html/</h2>' );
}

require_once __DIR__ . '/wp-load.php';

$admin_user = get_user_by( 'role', 'administrator' );
if ( $admin_user ) {
	wp_set_current_user( $admin_user->ID );
} else {
	wp_set_current_user( 1 );
}

$hub_page = get_page_by_path( 'business-setup' );
if ( ! $hub_page ) {
	$hub_page = get_page_by_path( 'our-services/business-setup' );
}
$hub_id = $hub_page ? $hub_page->ID : 0;

$sub_pages = array(
	'ajman-free-zone'       => 'Ajman Free Zone (AFZA)',
	'mainland-vs-free-zone' => 'Mainland vs Free Zone',
	'dubai'                 => 'Dubai Business Setup',
	'trade-licence-process' => 'Trade Licence Process',
	'packages'              => 'Setup Packages',
);

$nav_menus = wp_get_nav_menus();
if ( empty( $nav_menus ) ) {
	$nav_menus = get_terms( array( 'taxonomy' => 'nav_menu', 'hide_empty' => false ) );
}

$results = array();

if ( ! empty( $nav_menus ) && ! is_wp_error( $nav_menus ) ) {
	foreach ( $nav_menus as $menu ) {
		$menu_id = is_object( $menu ) && isset( $menu->term_id ) ? $menu->term_id : (int) $menu;
		$menu_obj = is_object( $menu ) ? $menu : get_term( $menu_id, 'nav_menu' );
		$menu_name = $menu_obj && ! is_wp_error( $menu_obj ) ? $menu_obj->name : 'Menu #' . $menu_id;

		$menu_items = wp_get_nav_menu_items( $menu_id );
		if ( false === $menu_items ) {
			$menu_items = array();
		}

		// 1. Find "Our Services" parent item ID
		$services_item_id = 0;
		foreach ( $menu_items as $m_item ) {
			if ( stripos( $m_item->title, 'Services' ) !== false || stripos( $m_item->url, 'our-services' ) !== false ) {
				$services_item_id = $m_item->ID;
				break;
			}
		}

		// 2. Check if Business Setup is in this menu
		$biz_setup_item_id = 0;
		foreach ( $menu_items as $m_item ) {
			if ( ( $hub_id && (int) $m_item->object_id === (int) $hub_id ) || stripos( $m_item->title, 'Business Setup' ) !== false ) {
				$biz_setup_item_id = $m_item->ID;
				break;
			}
		}

		if ( ! $biz_setup_item_id && $hub_id ) {
			$biz_setup_item_id = wp_update_nav_menu_item( $menu_id, 0, array(
				'menu-item-title'     => 'Business Setup & Company Formation',
				'menu-item-object-id' => $hub_id,
				'menu-item-object'    => 'page',
				'menu-item-type'      => 'post_type',
				'menu-item-status'    => 'publish',
				'menu-item-parent-id' => $services_item_id,
			) );
			$results[] = '✓ Added <strong>Business Setup & Company Formation</strong> under parent (ID: ' . $services_item_id . ') in <em>' . esc_html( $menu_name ) . '</em>';
		} else {
			$results[] = '✓ Business Setup already in menu: <em>' . esc_html( $menu_name ) . '</em>';
		}

		// 3. Add sub-items
		$menu_items = wp_get_nav_menu_items( $menu_id );
		foreach ( $sub_pages as $s_slug => $s_title ) {
			$child = get_page_by_path( 'business-setup/' . $s_slug );
			if ( ! $child ) {
				$child = get_page_by_path( $s_slug );
			}
			if ( ! $child ) {
				continue;
			}

			$sub_exists = false;
			foreach ( $menu_items as $m_item ) {
				if ( (int) $m_item->object_id === (int) $child->ID || stripos( $m_item->title, $s_title ) !== false ) {
					$sub_exists = true;
					break;
				}
			}

			if ( ! $sub_exists && $biz_setup_item_id ) {
				wp_update_nav_menu_item( $menu_id, 0, array(
					'menu-item-title'     => $s_title,
					'menu-item-object-id' => $child->ID,
					'menu-item-object'    => 'page',
					'menu-item-type'      => 'post_type',
					'menu-item-status'    => 'publish',
					'menu-item-parent-id' => $biz_setup_item_id,
				) );
				$results[] = '✓ Added submenu <strong>' . esc_html( $s_title ) . '</strong> in <em>' . esc_html( $menu_name ) . '</em>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>RBO Menu Synced</title>
<style>
body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #0b1528; color: #f8fafc; padding: 40px 20px; }
.card { max-width: 680px; margin: 0 auto; background: #16243d; border-radius: 16px; padding: 36px; box-shadow: 0 10px 30px rgba(0,0,0,0.4); border: 1px solid #233554; }
h1 { color: #e8b84b; margin-top: 0; font-size: 22px; }
.step { padding: 12px 16px; margin-bottom: 10px; background: #1e3152; border-radius: 8px; border-left: 4px solid #4ade80; font-size: 14px; color: #f1f5f9; }
.btn { display: inline-block; background: #e8b84b; color: #09203b !important; font-weight: 800; padding: 14px 28px; border-radius: 8px; text-decoration: none; margin-top: 20px; font-size: 15px; }
.btn:hover { background: #f4ca68; }
</style>
</head>
<body>
<div class="card">
<h1>📌 Navigation Menu Updated!</h1>
<p style="color:#cbd5e1;">Business Setup and all 5 child pages have been attached directly under "Our Services":</p>
<?php foreach ( $results as $r ) : ?>
	<div class="step"><?php echo $r; ?></div>
<?php endforeach; ?>
<a href="https://www.rboaccounting.ae/" class="btn" target="_blank">Open Live Homepage & Check Menu →</a>
</div>
</body>
</html>
