<?php
require_once __DIR__ . '/wp-load.php';

$json_file = __DIR__ . '/eosb-5689-translated.json';
if (!file_exists($json_file)) {
    die("Error: eosb-5689-translated.json not found!\n");
}

$data_str = file_get_contents($json_file);
$post_id = 5689;

// Use wp_slash or direct DB update to preserve JSON backslashes
global $wpdb;

// Check if postmeta exists
$meta_exists = $wpdb->get_var($wpdb->prepare(
    "SELECT meta_id FROM {$wpdb->postmeta} WHERE post_id = %d AND meta_key = '_elementor_data'",
    $post_id
));

if ($meta_exists) {
    $wpdb->update(
        $wpdb->postmeta,
        ['meta_value' => $data_str],
        ['post_id' => $post_id, 'meta_key' => '_elementor_data']
    );
} else {
    $wpdb->insert(
        $wpdb->postmeta,
        [
            'post_id' => $post_id,
            'meta_key' => '_elementor_data',
            'meta_value' => $data_str
        ]
    );
}

// Update edit mode and template
update_post_meta($post_id, '_elementor_edit_mode', 'builder');
update_post_meta($post_id, '_wp_page_template', 'default');

// Update post_title and post_content in wp_posts
$post = [
    'ID' => $post_id,
    'post_title' => 'احتساب مكافأة نهاية الخدمة ومستحقات الموظفين في الإمارات',
    'post_content' => '<!-- elementor content -->'
];
wp_update_post($post);

// Clean post cache and elementor cache
clean_post_cache($post_id);
if (class_exists('\Elementor\Plugin')) {
    \Elementor\Plugin::$instance->files_manager->clear_cache();
}

// Verify that Elementor document now reads all 18 elements
$doc = \Elementor\Plugin::$instance->documents->get($post_id);
$elements = $doc ? $doc->get_elements_data() : [];
echo "Elements count for 5689: " . count($elements) . "\n";

$frontend = \Elementor\Plugin::$instance->frontend;
$html = $frontend->get_builder_content($post_id);
echo "Builder content length: " . strlen($html) . "\n";
echo "Has Arabic Hero in builder: " . (strpos($html, 'احتساب مكافأة نهاية الخدمة') !== false ? "YES" : "NO") . "\n";

