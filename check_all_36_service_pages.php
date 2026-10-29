<?php
require_once __DIR__ . '/wp-load.php';

// Fetch all pages under /our-services/
$args = [
    'post_type' => 'page',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC'
];

$all_pages = get_posts($args);
$service_pages = [];

foreach ($all_pages as $p) {
    $uri = get_page_uri($p->ID);
    $parent_id = wp_get_post_parent_id($p->ID);
    if (strpos($uri, 'our-services') !== false || in_array($parent_id, [178, 787, 4420, 4421, 4422, 4423, 4424])) {
        $service_pages[] = [
            'ID' => $p->ID,
            'title' => $p->post_title,
            'slug' => $p->post_name,
            'uri' => $uri,
            'url' => get_permalink($p->ID),
            'parent_id' => $parent_id
        ];
    }
}

echo "Total Service Pages Found: " . count($service_pages) . "\n\n";
foreach ($service_pages as $idx => $sp) {
    echo ($idx + 1) . ". [ID: {$sp['ID']}] {$sp['title']}\n";
    echo "   URI: /{$sp['uri']}/\n";
    echo "   URL: {$sp['url']}\n";
}
