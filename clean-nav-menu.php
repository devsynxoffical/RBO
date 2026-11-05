<?php
require_once __DIR__ . '/wp-load.php';

// 1. Disable auto_add in nav_menu_options
$nav_menu_options = get_option('nav_menu_options', array());
if (isset($nav_menu_options['auto_add'])) {
    $nav_menu_options['auto_add'] = array();
    update_option('nav_menu_options', $nav_menu_options);
    echo "Disabled auto_add in nav_menu_options.\n";
}

// 2. Remove all Arabic auto-added items or unwanted items from all menus
$menus = wp_get_nav_menus();
foreach ($menus as $m) {
    $items = wp_get_nav_menu_items($m->term_id);
    if ($items) {
        foreach ($items as $it) {
            // Check if title has Arabic characters or matches our new Arabic pages
            if (preg_match('/[\x{0600}-\x{06FF}]/u', $it->title) || $it->object_id >= 5600) {
                wp_delete_post($it->ID, true);
                echo "Deleted auto-added menu item #{$it->ID} ('{$it->title}') from menu '{$m->name}'.\n";
            }
        }
    }
}

echo "Nav menus cleaned successfully!\n";

