<?php
require_once __DIR__ . '/wp-load.php';

// Check if main-menu-ar already exists
$menu_obj = wp_get_nav_menu_object('main-menu-ar');
if ($menu_obj) {
    echo "main-menu-ar already exists (ID: {$menu_obj->term_id}), deleting old items to rebuild...\n";
    $items = wp_get_nav_menu_items($menu_obj->term_id);
    if ($items) {
        foreach ($items as $it) {
            wp_delete_post($it->ID, true);
        }
    }
    $menu_id = $menu_obj->term_id;
} else {
    $menu_id = wp_create_nav_menu('main-menu-ar');
    echo "Created main-menu-ar (ID: $menu_id)\n";
}

// Map of items: [ 'title_ar', 'url', 'parent_key', 'key' ]
$menu_structure = [
    // Top Level 1: Home
    [
        'key' => 'home',
        'title' => 'الرئيسية',
        'url' => 'https://www.rboaccounting.ae/ar/home-ar/',
        'parent' => ''
    ],
    // Top Level 2: About Us
    [
        'key' => 'about',
        'title' => 'من نحن',
        'url' => 'https://www.rboaccounting.ae/ar/about-us/',
        'parent' => ''
    ],
    // Top Level 3: Our Services
    [
        'key' => 'services',
        'title' => 'خدماتنا',
        'url' => 'https://www.rboaccounting.ae/ar/our-services-2/',
        'parent' => ''
    ],
    // Level 2 under Our Services: Accounting Services
    [
        'key' => 'accounting',
        'title' => 'خدمات المحاسبة',
        'url' => 'https://www.rboaccounting.ae/ar/accounting/',
        'parent' => 'services'
    ],
    [
        'key' => 'bookkeeping',
        'title' => 'مسك الدفاتر والمحاسبة',
        'url' => 'https://www.rboaccounting.ae/ar/bookkeeping-and-accounting/',
        'parent' => 'accounting'
    ],
    [
        'key' => 'bank-rec',
        'title' => 'التسوية البنكية',
        'url' => 'https://www.rboaccounting.ae/ar/bank-reconciliation/',
        'parent' => 'accounting'
    ],
    [
        'key' => 'ap-ar',
        'title' => 'إدارة الذمم الدائنة والمدينة',
        'url' => 'https://www.rboaccounting.ae/ar/accounts-payable-and-receivable/',
        'parent' => 'accounting'
    ],
    [
        'key' => 'ifrs',
        'title' => 'الامتثال لمعايير IFRS',
        'url' => 'https://www.rboaccounting.ae/ar/ifrs-compliance/',
        'parent' => 'accounting'
    ],
    [
        'key' => 'fin-rep',
        'title' => 'إعداد التقارير المالية',
        'url' => 'https://www.rboaccounting.ae/ar/financial-reporting/',
        'parent' => 'accounting'
    ],

    // Level 2 under Our Services: VAT Services
    [
        'key' => 'vat',
        'title' => 'ضريبة القيمة المضافة في الإمارات',
        'url' => 'https://www.rboaccounting.ae/ar/vat-registration-filing/',
        'parent' => 'services'
    ],
    [
        'key' => 'vat-reg',
        'title' => 'تسجيل ضريبة القيمة المضافة',
        'url' => 'https://www.rboaccounting.ae/ar/vat-registration/',
        'parent' => 'vat'
    ],
    [
        'key' => 'vat-filing',
        'title' => 'تقديم الإقرارات الضريبية',
        'url' => 'https://www.rboaccounting.ae/ar/vat-return-filing/',
        'parent' => 'vat'
    ],
    [
        'key' => 'vat-refund',
        'title' => 'استرداد ضريبة القيمة المضافة',
        'url' => 'https://www.rboaccounting.ae/ar/refund/',
        'parent' => 'vat'
    ],
    [
        'key' => 'vat-advisory',
        'title' => 'الاستشارات الضريبية',
        'url' => 'https://www.rboaccounting.ae/ar/vat-advisory/',
        'parent' => 'vat'
    ],
    [
        'key' => 'fta-audit',
        'title' => 'المساعدة في تدقيق الهيئة الاتحادية للضرائب',
        'url' => 'https://www.rboaccounting.ae/ar/fta-audit-assistance/',
        'parent' => 'vat'
    ],
    [
        'key' => 'fta-amend',
        'title' => 'تعديل السجلات لدى FTA',
        'url' => 'https://www.rboaccounting.ae/ar/fta-records-amendment/',
        'parent' => 'vat'
    ],
    [
        'key' => 'penalty-rec',
        'title' => 'إعادة النظر في الغرامات والطعون',
        'url' => 'https://www.rboaccounting.ae/ar/penalty-reconsideration/',
        'parent' => 'vat'
    ],

    // Level 2 under Our Services: Corporate Tax
    [
        'key' => 'ct',
        'title' => 'ضريبة الشركات في الإمارات',
        'url' => 'https://www.rboaccounting.ae/ar/corporate-tax/',
        'parent' => 'services'
    ],
    [
        'key' => 'ct-reg',
        'title' => 'تسجيل ضريبة الشركات',
        'url' => 'https://www.rboaccounting.ae/ar/corporate-tax-registration/',
        'parent' => 'ct'
    ],
    [
        'key' => 'ct-filing',
        'title' => 'إقرار ضريبة الشركات',
        'url' => 'https://www.rboaccounting.ae/ar/corporate-tax-return-filing/',
        'parent' => 'ct'
    ],
    [
        'key' => 'ct-plan',
        'title' => 'التخطيط لضريبة الشركات',
        'url' => 'https://www.rboaccounting.ae/ar/corporate-tax-planning/',
        'parent' => 'ct'
    ],
    [
        'key' => 'transfer-pricing',
        'title' => 'تسعير المعاملات (Transfer Pricing)',
        'url' => 'https://www.rboaccounting.ae/ar/transfer-pricing/',
        'parent' => 'ct'
    ],

    // Level 2 under Our Services: Payroll Services
    [
        'key' => 'payroll',
        'title' => 'خدمات الرواتب والأجور',
        'url' => 'https://www.rboaccounting.ae/ar/payroll/',
        'parent' => 'services'
    ],
    [
        'key' => 'wps',
        'title' => 'نظام حماية الأجور (WPS)',
        'url' => 'https://www.rboaccounting.ae/ar/wps-payroll/',
        'parent' => 'payroll'
    ],
    [
        'key' => 'eosb',
        'title' => 'حساب مكافأة نهاية الخدمة',
        'url' => 'https://www.rboaccounting.ae/ar/end-of-service-benefits/',
        'parent' => 'payroll'
    ],
    [
        'key' => 'payroll-rep',
        'title' => 'تقارير الرواتب الشهرية',
        'url' => 'https://www.rboaccounting.ae/ar/payroll-reporting/',
        'parent' => 'payroll'
    ],
    [
        'key' => 'leave-mgmt',
        'title' => 'إدارة إجازات ومستحقات الموظفين',
        'url' => 'https://www.rboaccounting.ae/ar/employee-leave-management/',
        'parent' => 'payroll'
    ],

    // Level 2 under Our Services: Audit & Assurance
    [
        'key' => 'audit',
        'title' => 'خدمات التدقيق والتأكيد',
        'url' => 'https://www.rboaccounting.ae/ar/audit-assurance/',
        'parent' => 'services'
    ],
    [
        'key' => 'fz-audit',
        'title' => 'تدقيق شركات المناطق الحرة',
        'url' => 'https://www.rboaccounting.ae/ar/free-zone-audit/',
        'parent' => 'audit'
    ],
    [
        'key' => 'stat-audit',
        'title' => 'التدقيق المالي القانوني المعتمد',
        'url' => 'https://www.rboaccounting.ae/ar/statutory-audit/',
        'parent' => 'audit'
    ],
    [
        'key' => 'internal-audit',
        'title' => 'التدقيق الداخلي للشركات',
        'url' => 'https://www.rboaccounting.ae/ar/internal-audit/',
        'parent' => 'audit'
    ],
    [
        'key' => 'due-diligence',
        'title' => 'الفحص النافي للجهالة',
        'url' => 'https://www.rboaccounting.ae/ar/due-diligence/',
        'parent' => 'audit'
    ],
    [
        'key' => 'risk-assess',
        'title' => 'تقييم المخاطر المالية والرقابة',
        'url' => 'https://www.rboaccounting.ae/ar/risk-assessment/',
        'parent' => 'audit'
    ],

    // Level 2 under Our Services: Virtual CFO
    [
        'key' => 'cfo',
        'title' => 'خدمات المدير المالي الافتراضي (CFO)',
        'url' => 'https://www.rboaccounting.ae/ar/virtual-cfo/',
        'parent' => 'services'
    ],
    [
        'key' => 'biz-advisory',
        'title' => 'الاستشارات المالية للأعمال',
        'url' => 'https://www.rboaccounting.ae/ar/business-advisory/',
        'parent' => 'cfo'
    ],
    [
        'key' => 'fpa',
        'title' => 'التخطيط والتحليل المالي',
        'url' => 'https://www.rboaccounting.ae/ar/financial-planning-and-analysis/',
        'parent' => 'cfo'
    ],
    [
        'key' => 'budgeting',
        'title' => 'إعداد الميزانيات التقديرية',
        'url' => 'https://www.rboaccounting.ae/ar/budgeting/',
        'parent' => 'cfo'
    ],
    [
        'key' => 'mgmt-rep',
        'title' => 'التقارير الإدارية والمالية للمدراء',
        'url' => 'https://www.rboaccounting.ae/ar/management-reporting/',
        'parent' => 'cfo'
    ],
    [
        'key' => 'cash-flow',
        'title' => 'إدارة السيولة والتدفق النقدي',
        'url' => 'https://www.rboaccounting.ae/ar/cash-flow-management/',
        'parent' => 'cfo'
    ],

    // Level 2 under Our Services: Business Setup
    [
        'key' => 'setup',
        'title' => 'تأسيس الأعمال والشركات في الإمارات',
        'url' => 'https://www.rboaccounting.ae/afz-new-lighter-package-2026-ajman-free-zone-setup/',
        'parent' => 'services'
    ],
    [
        'key' => 'afz',
        'title' => 'المنطقة الحرة بعجمان (AFZA)',
        'url' => 'https://www.rboaccounting.ae/afz-new-lighter-package-2026-ajman-free-zone-setup/',
        'parent' => 'setup'
    ],
    [
        'key' => 'mainland-fz',
        'title' => 'مقارنة البر الرئيسي والمناطق الحرة',
        'url' => 'https://www.rboaccounting.ae/afz-new-lighter-package-2026-ajman-free-zone-setup/',
        'parent' => 'setup'
    ],
    [
        'key' => 'dubai-setup',
        'title' => 'تأسيس الأعمال في دبي',
        'url' => 'https://www.rboaccounting.ae/ar/areas-we-serve-2/dubai/',
        'parent' => 'setup'
    ],

    // Top Level 4: Areas We Serve
    [
        'key' => 'areas',
        'title' => 'فروعنا في الإمارات',
        'url' => 'https://www.rboaccounting.ae/ar/areas-we-serve-2/',
        'parent' => ''
    ],
    [
        'key' => 'dubai',
        'title' => 'دبي',
        'url' => 'https://www.rboaccounting.ae/ar/areas-we-serve-2/dubai/',
        'parent' => 'areas'
    ],
    [
        'key' => 'abu-dhabi',
        'title' => 'أبوظبي',
        'url' => 'https://www.rboaccounting.ae/ar/areas-we-serve-2/abu-dhabi/',
        'parent' => 'areas'
    ],
    [
        'key' => 'sharjah',
        'title' => 'الشارقة',
        'url' => 'https://www.rboaccounting.ae/ar/areas-we-serve-2/sharjah/',
        'parent' => 'areas'
    ],
    [
        'key' => 'ajman',
        'title' => 'عجمان',
        'url' => 'https://www.rboaccounting.ae/ar/areas-we-serve-2/ajman/',
        'parent' => 'areas'
    ],
    [
        'key' => 'rak',
        'title' => 'رأس الخيمة',
        'url' => 'https://www.rboaccounting.ae/ar/areas-we-serve-2/ras-al-khaimah/',
        'parent' => 'areas'
    ],
    [
        'key' => 'fujairah',
        'title' => 'الفجيرة',
        'url' => 'https://www.rboaccounting.ae/ar/areas-we-serve-2/fujairah/',
        'parent' => 'areas'
    ],
    [
        'key' => 'uaq',
        'title' => 'أم القيوين',
        'url' => 'https://www.rboaccounting.ae/ar/areas-we-serve-2/umm-al-quwain/',
        'parent' => 'areas'
    ],

    // Top Level 5: Blog
    [
        'key' => 'blog',
        'title' => 'المدونة',
        'url' => 'https://www.rboaccounting.ae/ar/blog/',
        'parent' => ''
    ],
    // Top Level 6: Contact Us
    [
        'key' => 'contact',
        'title' => 'اتصل بنا',
        'url' => 'https://www.rboaccounting.ae/ar/contact-us/',
        'parent' => ''
    ]
];

$id_map = [];
$count = 0;
foreach ($menu_structure as $item) {
    $parent_id = 0;
    if (!empty($item['parent']) && isset($id_map[$item['parent']])) {
        $parent_id = $id_map[$item['parent']];
    }
    
    $item_id = wp_update_nav_menu_item($menu_id, 0, [
        'menu-item-title'   => $item['title'],
        'menu-item-url'     => $item['url'],
        'menu-item-status'  => 'publish',
        'menu-item-type'    => 'custom',
        'menu-item-parent-id' => $parent_id,
    ]);
    
    if (is_wp_error($item_id)) {
        echo "Error creating {$item['key']}: " . $item_id->get_error_message() . "\n";
    } else {
        $id_map[$item['key']] = $item_id;
        $count++;
    }
}

echo "Successfully built main-menu-ar with $count items!\n";

