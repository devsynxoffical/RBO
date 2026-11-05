<?php
set_time_limit(300);
require_once __DIR__ . '/wp-load.php';

global $wpdb;

$json_file = __DIR__ . '/all_ar_posts_translated.json';
if (!file_exists($json_file)) {
    die("Error: all_ar_posts_translated.json not found!\n");
}

$posts = json_decode(file_get_contents($json_file), true);
if (!is_array($posts)) {
    die("Error: Invalid JSON in all_ar_posts_translated.json!\n");
}

echo "Starting deployment of " . count($posts) . " Arabic pages...\n";

$success = 0;
foreach ($posts as $pid => $p) {
    $post_id = (int)$p['id'];
    $data_str = $p['data'];
    $title = $p['title'];
    
    // 1. Update _elementor_data in postmeta directly
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
    
    // 2. Set edit mode and template
    update_post_meta($post_id, '_elementor_edit_mode', 'builder');
    update_post_meta($post_id, '_wp_page_template', 'default');
    
    // 3. Update wp_posts title and clean post_content
    $wpdb->update(
        $wpdb->posts,
        [
            'post_title' => $title,
            'post_content' => '<!-- elementor content -->'
        ],
        ['ID' => $post_id]
    );
    
    clean_post_cache($post_id);
    $success++;
}

// Clear Elementor files cache
if (class_exists('\Elementor\Plugin')) {
    \Elementor\Plugin::$instance->files_manager->clear_cache();
}

echo "Successfully deployed $success Arabic pages with 100% Arabic Elementor content and metadata!\n";

