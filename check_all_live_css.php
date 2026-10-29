<?php
$service_ids = [
    787, 1692, 4423, 1670, 1547, 3341, 3358, 3351, 3034, 2567, 2897, 4421, 3413, 3125, 3098, 3320, 1706, 3402, 2508, 2522, 1722, 3392, 3368, 178, 4422, 2532, 3412, 3382, 3228, 2501, 2488, 2419, 4420, 2458, 4424, 2732
];

echo "Checking live post-CSS files for all 36 service pages:\n";
$missing = [];
$found = [];

foreach ($service_ids as $id) {
    $url = "https://www.rboaccounting.ae/wp-content/uploads/elementor/css/post-{$id}.css";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($code === 200) {
        $found[] = $id;
    } else {
        $missing[] = $id;
    }
}

echo "Found on live (" . count($found) . "):\n" . implode(', ', $found) . "\n\n";
echo "Missing on live (" . count($missing) . "):\n" . implode(', ', $missing) . "\n";
