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

// Map of items: [ 'title', 'url', 'parent', 'key' ]
$menu_structure = [
    // Top Level 1: Home
    [
        'key' => 'home',
        'title' => 'الرئيسية',
        'url' => '/ar/home-ar/',
        'parent' => ''
    ],
    // Top Level 2: About Us
    [
        'key' => 'about',
        'title' => 'من نحن',
        'url' => '/ar/about-us-2/',
        'parent' => ''
    ],
    // Top Level 3: Our Services
    [
        'key' => 'services',
        'title' => 'خدماتنا',
        'url' => '/ar/our-services-2/',
        'parent' => ''
    ],
    // Level 2 under Our Services: Accounting Services
    [
        'key' => 'accounting',
        'title' => 'خدمات المحاسبة ومسك الدفاتر',
        'url' => '/ar/accounting/',
        'parent' => 'services'
    ],
    [
        'key' => 'bookkeeping',
        'title' => 'مسك الدفاتر والمحاسبة',
        'url' => '/ar/bookkeeping-and-accounting/',
        'parent' => 'accounting'
    ],
    [
        'key' => 'bank-rec',
        'title' => 'التسوية البنكية والمطابقة',
        'url' => '/ar/bank-reconciliation/',
        'parent' => 'accounting'
    ],
    [
        'key' => 'ap-ar',
        'title' => 'إدارة الذمم الدائنة والمدينة',
        'url' => '/ar/accounts-payable-and-receivable/',
        'parent' => 'accounting'
    ],
    [
        'key' => 'ifrs',
        'title' => 'الامتثال لمعايير IFRS الدولية',
        'url' => '/ar/ifrs-compliance/',
        'parent' => 'accounting'
    ],
    [
        'key' => 'fin-rep',
        'title' => 'إعداد التقارير المالية الدورية',
        'url' => '/ar/financial-reporting/',
        'parent' => 'accounting'
    ],

    // Level 2 under Our Services: VAT Services
    [
        'key' => 'vat',
        'title' => 'تسجيل وإقرارات ضريبة القيمة المضافة',
        'url' => '/ar/vat-registration-filing/',
        'parent' => 'services'
    ],
    [
        'key' => 'vat-reg',
        'title' => 'تسجيل ضريبة القيمة المضافة',
        'url' => '/ar/vat-registration/',
        'parent' => 'vat'
    ],
    [
        'key' => 'vat-filing',
        'title' => 'تقديم إقرارات ضريبة القيمة المضافة',
        'url' => '/ar/vat-return-filing/',
        'parent' => 'vat'
    ],
    [
        'key' => 'vat-refund',
        'title' => 'استرداد ضريبة القيمة المضافة',
        'url' => '/ar/refund/',
        'parent' => 'vat'
    ],
    [
        'key' => 'vat-advisory',
        'title' => 'استشارات ضريبة القيمة المضافة',
        'url' => '/ar/vat-advisory/',
        'parent' => 'vat'
    ],
    [
        'key' => 'fta-audit',
        'title' => 'دعم التدقيق الضريبي FTA',
        'url' => '/ar/fta-audit-assistance/',
        'parent' => 'vat'
    ],
    [
        'key' => 'fta-amend',
        'title' => 'تعديل بيانات السجل الضريبي',
        'url' => '/ar/fta-records-amendment/',
        'parent' => 'vat'
    ],
    [
        'key' => 'penalty-rec',
        'title' => 'إعادة النظر في الغرامات والطعون',
        'url' => '/ar/penalty-reconsideration/',
        'parent' => 'vat'
    ],

    // Level 2 under Our Services: Corporate Tax
    [
        'key' => 'ct',
        'title' => 'ضريبة الشركات في الإمارات',
        'url' => '/ar/corporate-tax/',
        'parent' => 'services'
    ],
    [
        'key' => 'ct-reg',
        'title' => 'تسجيل ضريبة الشركات',
        'url' => '/ar/corporate-tax-registration/',
        'parent' => 'ct'
    ],
    [
        'key' => 'ct-filing',
        'title' => 'تقديم إقرار ضريبة الشركات',
        'url' => '/ar/corporate-tax-return-filing/',
        'parent' => 'ct'
    ],
    [
        'key' => 'ct-plan',
        'title' => 'التخطيط لضريبة الشركات',
        'url' => '/ar/corporate-tax-planning/',
        'parent' => 'ct'
    ],
    [
        'key' => 'transfer-pricing',
        'title' => 'التسعير التحويلي (Transfer Pricing)',
        'url' => '/ar/transfer-pricing/',
        'parent' => 'ct'
    ],

    // Level 2 under Our Services: Payroll Services
    [
        'key' => 'payroll',
        'title' => 'إدارة الرواتب ونظام WPS',
        'url' => '/ar/payroll/',
        'parent' => 'services'
    ],
    [
        'key' => 'wps',
        'title' => 'نظام حماية الأجور (WPS)',
        'url' => '/ar/wps-payroll/',
        'parent' => 'payroll'
    ],
    [
        'key' => 'eosb',
        'title' => 'احتساب مكافأة نهاية الخدمة (EOSB)',
        'url' => '/ar/end-of-service-benefits/',
        'parent' => 'payroll'
    ],
    [
        'key' => 'payroll-rep',
        'title' => 'تقارير الرواتب الشهرية',
        'url' => '/ar/payroll-reporting-2/',
        'parent' => 'payroll'
    ],
    [
        'key' => 'leave-mgmt',
        'title' => 'إدارة إجازات ومستحقات الموظفين',
        'url' => '/ar/employee-leave-management/',
        'parent' => 'payroll'
    ],

    // Level 2 under Our Services: Audit & Assurance
    [
        'key' => 'audit',
        'title' => 'خدمات التدقيق والتأكيد المالي',
        'url' => '/ar/audit-assurance/',
        'parent' => 'services'
    ],
    [
        'key' => 'fz-audit',
        'title' => 'تدقيق شركات المناطق الحرة',
        'url' => '/ar/free-zone-audit/',
        'parent' => 'audit'
    ],
    [
        'key' => 'stat-audit',
        'title' => 'التدقيق المالي القانوني المعتمد',
        'url' => '/ar/statutory-audit/',
        'parent' => 'audit'
    ],
    [
        'key' => 'internal-audit',
        'title' => 'خدمات التدقيق الداخلي',
        'url' => '/ar/internal-audit/',
        'parent' => 'audit'
    ],
    [
        'key' => 'due-diligence',
        'title' => 'الفحص المالي النافي للجهالة',
        'url' => '/ar/due-diligence/',
        'parent' => 'audit'
    ],
    [
        'key' => 'risk-assess',
        'title' => 'تقييم وإدارة المخاطر التشغيلية',
        'url' => '/ar/risk-assessment/',
        'parent' => 'audit'
    ],

    // Level 2 under Our Services: Virtual CFO
    [
        'key' => 'cfo',
        'title' => 'خدمات المدير المالي الافتراضي (CFO)',
        'url' => '/ar/virtual-cfo/',
        'parent' => 'services'
    ],
    [
        'key' => 'biz-advisory',
        'title' => 'استشارات تطوير الأعمال',
        'url' => '/ar/business-advisory/',
        'parent' => 'cfo'
    ],
    [
        'key' => 'fpa',
        'title' => 'التخطيط والتحليل المالي الاستراتيجي',
        'url' => '/ar/financial-planning-and-analysis/',
        'parent' => 'cfo'
    ],
    [
        'key' => 'budgeting',
        'title' => 'إعداد الميزانيات التقديرية',
        'url' => '/ar/budgeting/',
        'parent' => 'cfo'
    ],
    [
        'key' => 'mgmt-rep',
        'title' => 'التقارير الإدارية ومؤشرات الأداء',
        'url' => '/ar/management-reporting/',
        'parent' => 'cfo'
    ],
    [
        'key' => 'cash-flow',
        'title' => 'إدارة السيولة والتدفقات النقدية',
        'url' => '/ar/cash-flow-management/',
        'parent' => 'cfo'
    ],

    // Level 2 under Our Services: Business Setup
    [
        'key' => 'setup',
        'title' => 'تأسيس الشركات والأعمال',
        'url' => '/ar/business-setup-ar/',
        'parent' => 'services'
    ],
    [
        'key' => 'afz',
        'title' => 'المنطقة الحرة بعجمان (AFZA)',
        'url' => '/ar/ajman-free-zone-ar/',
        'parent' => 'setup'
    ],
    [
        'key' => 'mainland-fz',
        'title' => 'مقارنة البر الرئيسي والمناطق الحرة',
        'url' => '/ar/mainland-vs-free-zone-ar/',
        'parent' => 'setup'
    ],
    [
        'key' => 'dubai-setup',
        'title' => 'تأسيس الشركات في دبي',
        'url' => '/ar/dubai-business-setup-ar/',
        'parent' => 'setup'
    ],
    [
        'key' => 'trade-licence',
        'title' => 'خطوات إصدار الرخصة التجارية',
        'url' => '/ar/trade-licence-process-ar/',
        'parent' => 'setup'
    ],
    [
        'key' => 'setup-packages',
        'title' => 'باقات التأسيس المتكاملة',
        'url' => '/ar/setup-packages-ar/',
        'parent' => 'setup'
    ],

    // Top Level 4: Areas We Serve
    [
        'key' => 'areas',
        'title' => 'فروعنا في الإمارات',
        'url' => '/ar/areas-we-serve-2/',
        'parent' => ''
    ],
    [
        'key' => 'dubai',
        'title' => 'دبي',
        'url' => '/ar/areas-we-serve-2/dubai/',
        'parent' => 'areas'
    ],
    [
        'key' => 'abu-dhabi',
        'title' => 'أبوظبي',
        'url' => '/ar/areas-we-serve-2/abu-dhabi/',
        'parent' => 'areas'
    ],
    [
        'key' => 'sharjah',
        'title' => 'الشارقة',
        'url' => '/ar/areas-we-serve-2/sharjah/',
        'parent' => 'areas'
    ],
    [
        'key' => 'ajman',
        'title' => 'عجمان',
        'url' => '/ar/areas-we-serve-2/ajman/',
        'parent' => 'areas'
    ],
    [
        'key' => 'rak',
        'title' => 'رأس الخيمة',
        'url' => '/ar/areas-we-serve-2/ras-al-khaimah/',
        'parent' => 'areas'
    ],
    [
        'key' => 'fujairah',
        'title' => 'الفجيرة',
        'url' => '/ar/areas-we-serve-2/fujairah/',
        'parent' => 'areas'
    ],
    [
        'key' => 'uaq',
        'title' => 'أم القيوين',
        'url' => '/ar/areas-we-serve-2/umm-al-quwain/',
        'parent' => 'areas'
    ],

    // Top Level 5: Blog
    [
        'key' => 'blog',
        'title' => 'المدونة',
        'url' => '/ar/blog/',
        'parent' => ''
    ],
    // Top Level 6: Contact Us
    [
        'key' => 'contact',
        'title' => 'اتصل بنا',
        'url' => '/ar/contact-us-2/',
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
        'menu-item-title'     => $item['title'],
        'menu-item-url'       => $item['url'],
        'menu-item-status'    => 'publish',
        'menu-item-type'      => 'custom',
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
