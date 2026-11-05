<?php
require_once __DIR__ . '/wp-load.php';

global $wpdb;

$posts = $wpdb->get_results("
    SELECT p.ID, p.post_name, p.post_title
    FROM {$wpdb->posts} p
    WHERE p.post_type = 'page' AND p.post_status = 'publish' AND p.ID >= 5615 AND p.ID <= 5703
    ORDER BY p.ID ASC
");

echo "Checking " . count($posts) . " Arabic pages...\n";

foreach ($posts as $p) {
    $meta = get_post_meta($p->ID, '_elementor_data', true);
    $json = json_decode($meta, true);
    $valid_json = (is_array($json) && count($json) > 0);
    
    // Check if hero title is in English or Arabic
    $has_en_title = false;
    $has_ar_title = false;
    if ($valid_json) {
        $meta_str = json_encode($json, JSON_UNESCAPED_UNICODE);
        $has_en_faq = (strpos($meta_str, 'Frequently Asked Questions') !== false || strpos($meta_str, 'COMMON QUESTIONS') !== false);
        $has_en_form = (strpos($meta_str, 'Get a Free Consultation') !== false);
        $has_en_reviews = (strpos($meta_str, 'What Our Clients Say') !== false);
    } else {
        $has_en_faq = $has_en_form = $has_en_reviews = false;
    }
    
    echo sprintf(
        "ID: %d | Slug: %-30s | Valid JSON: %s | Elements: %d | EN FAQ: %s | EN Form: %s | EN Reviews: %s\n",
        $p->ID,
        $p->post_name,
        $valid_json ? 'YES' : 'NO ',
        $valid_json ? count($json) : 0,
        $has_en_faq ? 'YES' : 'NO ',
        $has_en_form ? 'YES' : 'NO ',
        $has_en_reviews ? 'YES' : 'NO '
    );
}

