<?php
/**
 * Live Server Fix: Elementor Structure & CSS for Arabic VAT Refund Page (Post 5615)
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/wp-load.php';

$source_id = 2488; // English live
$target_id = 5615; // Arabic live

echo "=== FIXING ARABIC LIVE PAGE (ID $target_id) ===\n";

// 1. Copy & translate _elementor_data
$el_data = get_post_meta($source_id, '_elementor_data', true);
$el_template_type = get_post_meta($source_id, '_elementor_template_type', true);
$el_version = get_post_meta($source_id, '_elementor_version', true);
$el_settings = get_post_meta($source_id, '_elementor_page_settings', true);

$translations = array(
    'VAT Refund Services' => 'خدمات استرداد ضريبة القيمة المضافة',
    'VAT Refund' => 'استرداد ضريبة القيمة المضافة',
    'Claim Your Eligible VAT Refund with Expert Assistance' => 'استرد أموال ضريبة القيمة المضافة المستحقة لك بدقة واحترافية مع خبراء RBO المعتمدين',
    'Book a Free Consultation' => 'احجز استشارة ضريبية مجانية',
    'Schedule your 30-minute consultation' => 'حدد موعد استشارتك مع وكلائنا الضريبيين المعتمدين',
    'Full Name' => 'الاسم الكامل',
    'Your full name' => 'أدخل الاسم الكامل',
    'Email Address' => 'البريد الإلكتروني',
    'Your business email' => 'البريد الإلكتروني للعمل',
    'Phone Number' => 'رقم الهاتف / واتساب',
    'Service Required' => 'الخدمة المطلوبة',
    'Claim My VAT Refund' => 'تقديم طلب استرداد الضريبة',
    'Request Consultation' => 'إرسال طلب الاستشارة',
    'Commercial Landlords' => 'ملاك العقارات التجارية',
    'Civil Contractors' => 'مقاولات الهندسة المدنية',
    'Engineering Consultants' => 'المكاتب الاستشارية الهندسية',
);

$ar_el_data = $el_data;
foreach ($translations as $en => $ar) {
    $ar_el_data = str_replace($en, $ar, $ar_el_data);
}

update_post_meta($target_id, '_elementor_data', $ar_el_data);
update_post_meta($target_id, '_elementor_edit_mode', 'builder');
update_post_meta($target_id, '_elementor_template_type', $el_template_type ?: 'wp-page');
if ($el_version) update_post_meta($target_id, '_elementor_version', $el_version);
if ($el_settings) update_post_meta($target_id, '_elementor_page_settings', $el_settings);

// 2. Clone post-2488.css to post-5615.css
$upload_dir = wp_upload_dir();
$src_css = $upload_dir['basedir'] . "/elementor/css/post-{$source_id}.css";
$dest_css = $upload_dir['basedir'] . "/elementor/css/post-{$target_id}.css";

if (file_exists($src_css)) {
    $css_content = file_get_contents($src_css);
    $css_content = str_replace("elementor-{$source_id}", "elementor-{$target_id}", $css_content);
    file_put_contents($dest_css, $css_content);
    echo "✅ Cloned Elementor CSS: post-{$target_id}.css\n";
} else {
    echo "⚠️ Source CSS $src_css not found.\n";
}

// 3. Clear Elementor cache & flush rewrite rules
if (class_exists('\Elementor\Plugin')) {
    \Elementor\Plugin::$instance->files_manager->clear_cache();
    echo "✅ Cleared Elementor CSS cache.\n";
}

flush_rewrite_rules();
echo "=== ARABIC LIVE FIX COMPLETE ===\n";

