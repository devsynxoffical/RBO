<?php
/**
 * Create Arabic Versions of:
 * 1. AFZ New Lighter Package Blog (Post ID 5601)
 * 2. VAT Refund Service Landing Page (Post ID 2488)
 */

require_once __DIR__ . '/wp-load.php';

echo "=== Creating Arabic Pages Locally ===\n";

define('PLL_SETTINGS', true);
define('PLL_ADMIN', true);

$options = get_option('polylang');
$model = new PLL_Admin_Model($options);
$en_lang = $model->get_language('en');
$ar_lang = $model->get_language('ar');

if (!$ar_lang || !$en_lang) {
    die("Error: Languages not initialized.\n");
}

// -------------------------------------------------------------
// 1. AFZ New Lighter Package Blog (Arabic)
// -------------------------------------------------------------
$en_afz_post = get_page_by_path('afz-new-lighter-package-2026-ajman-free-zone-setup', OBJECT, 'post');
if (!$en_afz_post) {
    // try by ID 5601
    $en_afz_post = get_post(5601);
}

if ($en_afz_post) {
    $en_afz_id = $en_afz_post->ID;
    $model->post->set_language($en_afz_id, $en_lang);

    $ar_afz_title = 'باقة منطقة عجمان الحرة الجديدة 2026 — باقة الـ 11,000 درهم | تأسيس الشركات في الإمارات | RBO';
    $ar_afz_content = <<<HTML
<div class="rbo-arabic-blog-container" dir="rtl" style="font-family: 'Tajawal', 'Cairo', 'Segoe UI', Tahoma, sans-serif; text-align: right; line-height: 1.8; color: #1e293b;">

<div style="background: linear-gradient(135deg, #0D1B2A 0%, #1e3a5f 100%); color: #ffffff; padding: 36px; border-radius: 12px; margin-bottom: 35px; border-right: 6px solid #d4a017; box-shadow: 0 10px 25px rgba(13,27,42,0.15);">
    <span style="display: inline-block; padding: 4px 12px; background: rgba(212,160,23,0.2); color: #E8B84B; font-size: 13px; font-weight: 700; border-radius: 4px; margin-bottom: 12px; border: 1px solid rgba(212,160,23,0.35);">
        عرض رسمي ساري حتى 31 ديسمبر 2026
    </span>
    <h1 style="margin: 0 0 15px 0; font-size: 28px; line-height: 1.4; color: #ffffff; font-weight: 800;">
        إطلاق باقة منطقة عجمان الحرة الجديدة (AFZ Lighter Package) — 11,000 درهم فقط شاملة الإقامة
    </h1>
    <p style="margin: 0; font-size: 16px; color: #cbd5e1; line-height: 1.7;">
        أعلنت سلطة منطقة عجمان الحرة رسمياً عن إطلاق "باقة التأسيس المخففة" (AFZ Lighter Package) بقيمة 11,000 درهم إماراتي فقط. صُممت هذه الباقة خصيصاً لرواد الأعمال، والشركات الناشئة، والمهنيين المستقلين الراغبين في دخول سوق دولة الإمارات العربية المتحدة بأقل تكلفة تشغيلية ممكنة وأسرع إجراءات تسجيل.
    </p>
</div>

<h2 style="color: #0b3a6e; font-size: 22px; font-weight: 700; border-bottom: 2px solid #e2e8f0; padding-bottom: 8px; margin-top: 30px;">
    أبرز مميزات باقة الـ 11,000 درهم في منطقة عجمان الحرة
</h2>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; margin: 25px 0;">
    <div style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 10px; padding: 22px; border-top: 4px solid #0b3a6e;">
        <div style="font-size: 24px; margin-bottom: 8px;">💰</div>
        <h3 style="margin: 0 0 8px 0; color: #0D1B2A; font-size: 17px; font-weight: 700;">رسوم سنوية وتجديد ثابت</h3>
        <p style="margin: 0; font-size: 14.5px; color: #475569;">11,000 درهم إماراتي سنوياً للتأسيس، مع ضمان سعر التجديد السنوي بقيمة 11,000 درهم دون رسوم خفية.</p>
    </div>
    <div style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 10px; padding: 22px; border-top: 4px solid #d4a017;">
        <div style="font-size: 24px; margin-bottom: 8px;">🛂</div>
        <h3 style="margin: 0 0 8px 0; color: #0D1B2A; font-size: 17px; font-weight: 700;">تأشيرة إقامة مستثمر متضمنة</h3>
        <p style="margin: 0; font-size: 14.5px; color: #475569;">تتضمن الباقة حصة تأشيرة إقامة واحدة (1 Visa) للمستثمر أو المدير التنفيذي سارية لمدة سنتين.</p>
    </div>
    <div style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 10px; padding: 22px; border-top: 4px solid #1e5a96;">
        <div style="font-size: 24px; margin-bottom: 8px;">📋</div>
        <h3 style="margin: 0 0 8px 0; color: #0D1B2A; font-size: 17px; font-weight: 700;">حتى 3 أنشطة تجارية و2 مساهمين</h3>
        <p style="margin: 0; font-size: 14.5px; color: #475569;">إمكانية جمع حتى 3 أنشطة تجارية أو استشارية ضمن الرخصة، وبحد أقصى مساهمين اثنين (2 Shareholders).</p>
    </div>
    <div style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 10px; padding: 22px; border-top: 4px solid #059669;">
        <div style="font-size: 24px; margin-bottom: 8px;">🏢</div>
        <h3 style="margin: 0 0 8px 0; color: #0D1B2A; font-size: 17px; font-weight: 700;">عقد إيجار ومكتب افتراضي</h3>
        <p style="margin: 0; font-size: 14.5px; color: #475569;">يشمل عقد إيجار افتراضي معتمد (Virtual / Assumed Lease) مؤهل لفتح الحساب المصرفي التجاري في بنوك الإمارات.</p>
    </div>
</div>

<h2 style="color: #0b3a6e; font-size: 22px; font-weight: 700; border-bottom: 2px solid #e2e8f0; padding-bottom: 8px; margin-top: 35px;">
    مقارنة التكاليف: منطقة عجمان الحرة مقابل المناطق الحرة الأخرى في الإمارات
</h2>

<div style="overflow-x: auto; margin: 25px 0;">
    <table style="width: 100%; border-collapse: collapse; text-align: right; font-size: 14px;">
        <thead>
            <tr style="background: #0D1B2A; color: #ffffff;">
                <th style="padding: 12px 16px;">المنطقة الحرة</th>
                <th style="padding: 12px 16px;">تكلفة الباقة (درهم)</th>
                <th style="padding: 12px 16px;">التأشيرات المتضمنة</th>
                <th style="padding: 12px 16px;">سعر التجديد</th>
                <th style="padding: 12px 16px;">الجدوى الاقتصادية</th>
            </tr>
        </thead>
        <tbody>
            <tr style="border-bottom: 1px solid #e2e8f0; background: #fffdf5;">
                <td style="padding: 14px 16px; font-weight: 700; color: #d4a017;">منطقة عجمان الحرة (AFZ)</td>
                <td style="padding: 14px 16px; font-weight: 700; color: #059669;">11,000 درهم</td>
                <td style="padding: 14px 16px;">1 تأشيرة متضمنة</td>
                <td style="padding: 14px 16px;">11,000 درهم ثابت</td>
                <td style="padding: 14px 16px; font-weight: 600; color: #059669;">الأفضل والأوفر في الإمارات ★★★★★</td>
            </tr>
            <tr style="border-bottom: 1px solid #e2e8f0; background: #ffffff;">
                <td style="padding: 14px 16px; font-weight: 600;">منطقة الشارقة للإعلام (شمس - SHAMS)</td>
                <td style="padding: 14px 16px;">14,500 - 16,000 درهم</td>
                <td style="padding: 14px 16px;">1 تأشيرة</td>
                <td style="padding: 14px 16px;">13,500+ درهم</td>
                <td style="padding: 14px 16px;">تكلفة متوسطة</td>
            </tr>
            <tr style="border-bottom: 1px solid #e2e8f0; background: #f8fafd;">
                <td style="padding: 14px 16px; font-weight: 600;">سلطة واحة دبي للسيليكون (IFZA)</td>
                <td style="padding: 14px 16px;">15,900 - 18,500 درهم</td>
                <td style="padding: 14px 16px;">1 تأشيرة</td>
                <td style="padding: 14px 16px;">16,000+ درهم</td>
                <td style="padding: 14px 16px;">أعلى تكلفة للمبتدئين</td>
            </tr>
            <tr style="border-bottom: 1px solid #e2e8f0; background: #ffffff;">
                <td style="padding: 14px 16px; font-weight: 600;">منطقة رأس الخيمة الاقتصادية (RAKEZ)</td>
                <td style="padding: 14px 16px;">13,500 - 15,000 درهم</td>
                <td style="padding: 14px 16px;">1 تأشيرة</td>
                <td style="padding: 14px 16px;">13,000+ درهم</td>
                <td style="padding: 14px 16px;">جيدة للقطاعات الصناعية</td>
            </tr>
        </tbody>
    </table>
</div>

<h2 style="color: #0b3a6e; font-size: 22px; font-weight: 700; border-bottom: 2px solid #e2e8f0; padding-bottom: 8px; margin-top: 35px;">
    الامتثال الضريبي وضريبة الشركات للشركات الجديدة في عجمان
</h2>

<p style="font-size: 15px; color: #334155;">
وفقاً للمرسوم بقانون اتحادي رقم 47 لسنة 2022 بشأن الضريبة على الشركات والأعمال في دولة الإمارات العربية المتحدة:
</p>

<ul style="font-size: 15px; color: #334155; padding-right: 20px;">
    <li><strong>الإعفاء بنسبة 0% للشخص القائم في المنطقة الحرة المؤهل (QFZP):</strong> تستفيد الشركات المؤهلة التي تمارس أنشطة مؤهلة وتلتزم بالوجود الواقعي داخل المنطقة الحرة من معدل ضريبة 0% على دخلها المؤهل.</li>
    <li><strong>تسهيلات الأعمال الصغيرة (المادة 21):</strong> الشركات التي لا يتجاوز دخلها الإجمالي 3,000,000 درهم إماراتي في أي فترة ضريبية مؤهلة لمعاملتها كغير محققة لأي دخل خاضع للضريبة حتى نهاية عام 2026.</li>
    <li><strong>التسجيل الإلزامي لضريبة الشركات:</strong> يتعين على جميع الشركات المؤسسة في عجمان التسجيل لدى الهيئة الاتحادية للضرائب (FTA) والحصول على رقم التسجيل الضريبي (TRN) لتجنب الغرامة الإدارية وقدرها 10,000 درهم.</li>
    <li><strong>مسك السجلات المحاسبية (المادة 56):</strong> إلزامية حفظ السجلات والبيانات المالية المدققة لمدة 7 سنوات.</li>
</ul>

<div style="background: linear-gradient(135deg, #0b3a6e 0%, #1e5a96 100%); border-radius: 12px; padding: 30px; text-align: center; color: #ffffff; margin-top: 40px; box-shadow: 0 8px 24px rgba(11,58,110,0.25);">
    <h3 style="margin: 0 0 10px 0; font-size: 22px; font-weight: 700; color: #ffffff;">احجز باقة الـ 11,000 درهم في عجمان اليوم مع خبراء RBO</h3>
    <p style="margin: 0 auto 20px auto; max-width: 650px; font-size: 15px; color: #e2e8f0;">
        يقوم وكلاؤنا المعتمدون بإنهاء كافة إجراءات التأسيس، إصدار الرخصة التجارية، تجهيز الإقامة، وفتح الحساب البنكي التجاري خلال أيام عمل معدودة.
    </p>
    <a href="https://wa.me/971508051857?text=مرحباً%20RBO،%20أرغب%20في%20الاستفسار%20عن%20باقة%20منطقة%20عجمان%20الحرة%2011000%20درهم" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 30px; background: #25D366; color: #ffffff; text-decoration: none; font-weight: 700; font-size: 15px; border-radius: 8px; box-shadow: 0 4px 12px rgba(37,211,102,0.3);">
        <span>تواصل عبر واتساب مباشرة</span> 💬
    </a>
</div>

</div>
HTML;

    // Check if Arabic post already exists
    $ar_afz_existing = $model->post->get_translation($en_afz_id, 'ar');
    if ($ar_afz_existing) {
        $ar_afz_id = $ar_afz_existing;
        wp_update_post(array(
            'ID'           => $ar_afz_id,
            'post_title'   => $ar_afz_title,
            'post_content' => $ar_afz_content,
            'post_status'  => 'publish',
        ));
        echo "✅ Updated existing Arabic AFZ Post ID: $ar_afz_id\n";
    } else {
        $ar_afz_id = wp_insert_post(array(
            'post_title'   => $ar_afz_title,
            'post_name'    => 'afz-new-lighter-package-2026-ajman-free-zone-setup',
            'post_content' => $ar_afz_content,
            'post_status'  => 'publish',
            'post_type'    => 'post',
            'post_author'  => $en_afz_post->post_author,
        ));
        $model->post->set_language($ar_afz_id, $ar_lang);
        $model->post->save_translations($en_afz_id, array('en' => $en_afz_id, 'ar' => $ar_afz_id));
        echo "✅ Created new Arabic AFZ Post ID: $ar_afz_id\n";
    }

    // Set Featured Image
    $feat_img = get_post_thumbnail_id($en_afz_id);
    if ($feat_img) {
        set_post_thumbnail($ar_afz_id, $feat_img);
    }

    // Set Rank Math Meta
    update_post_meta($ar_afz_id, 'rank_math_title', $ar_afz_title);
    update_post_meta($ar_afz_id, 'rank_math_description', 'الدليل الشامل لتأسيس شركة في منطقة عجمان الحرة (AFZ) عبر باقة 11,000 درهم شاملة الإقامة و3 أنشطة ومكتب افتراضي. الاستفادة من نسبة 0% ضريبة شركات وتسهيلات الأعمال الصغيرة.');
    update_post_meta($ar_afz_id, 'rank_math_focus_keyword', 'باقة منطقة عجمان الحرة, تأسيس شركة عجمان, باقة 11000 درهم عجمان, منطقة عجمان الحرة AFZ');
}


// -------------------------------------------------------------
// 2. VAT Refund Service Page (Arabic)
// -------------------------------------------------------------
$en_vat_id = 2488;
$en_vat_post = get_post($en_vat_id);

if ($en_vat_post) {
    $model->post->set_language($en_vat_id, $en_lang);

    $ar_vat_title = 'خدمات استرداد ضريبة القيمة المضافة في الإمارات للملاك والاستشاريين والمقاولين | RBO';
    $ar_vat_content = <<<HTML
<div class="rbo-arabic-service-container" dir="rtl" style="font-family: 'Tajawal', 'Cairo', 'Segoe UI', Tahoma, sans-serif; text-align: right; line-height: 1.8; color: #1e293b; max-width: 1140px; margin: 0 auto; padding: 20px 0;">

<!-- Hero Authority Banner -->
<div style="background: linear-gradient(135deg, #0D1B2A 0%, #1e3a5f 100%); border-radius: 12px; padding: 34px 38px; color: #ffffff; margin-bottom: 40px; box-shadow: 0 10px 25px rgba(13,27,42,0.15); border-right: 6px solid #d4a017;">
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 24px;">
        <div style="flex: 1; min-width: 290px;">
            <span style="display: inline-block; padding: 4px 12px; background: rgba(212,160,23,0.2); color: #E8B84B; font-size: 13px; font-weight: 700; border-radius: 4px; margin-bottom: 10px; border: 1px solid rgba(212,160,23,0.35);">
                امتثال اللائحة التنفيذية للهيئة الاتحادية للضرائب
            </span>
            <h1 style="margin: 0 0 12px 0; color: #ffffff; font-size: 26px; font-weight: 700; line-height: 1.3;">
                خدمات استرداد ضريبة القيمة المضافة: ملاك العقارات، المكاتب الهندسية، وشركات المقاولات
            </h1>
            <p style="margin: 0; color: #cbd5e1; font-size: 15.5px; line-height: 1.7;">
                هل لديك أرصدة ضريبية دائنة متراكمة في بوابة إمارات تاكس (EmaraTax)؟ تقدم شركة RBO للمحاسبة والاستشارات الضريبية إدارة شاملة لطلبات الاسترداد النقدي عبر نموذج VAT311، مع التدقيق الفني الشامل وتجهيز ملفات الإثبات لضمان تحويل الأموال مباشرة إلى حسابك المصرفي دون تأخير أو غرامات تدقيق.
            </p>
        </div>
        <div style="display: flex; flex-direction: column; gap: 12px; min-width: 220px;">
            <a href="https://wa.me/971508051857?text=مرحباً%20RBO،%20نحتاج%20إلى%20مساعدة%20في%20استرداد%20ضريبة%20القيمة%20المضافة" style="display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 13px 24px; background: #d4a017; color: #0D1B2A; text-decoration: none; font-weight: 700; font-size: 15px; border-radius: 8px; box-shadow: 0 4px 14px rgba(212,160,23,0.35); text-align: center;">
                <span>طلب استشارة استرداد الضريبة</span> ➔
            </a>
        </div>
    </div>
</div>

<!-- 3 Industry Cards -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 26px; margin-bottom: 45px;">

    <!-- Card 1: Landlords -->
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-top: 5px solid #0b3a6e; border-radius: 10px; padding: 28px; box-shadow: 0 4px 18px rgba(0,0,0,0.05); display: flex; flex-direction: column;">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
            <span style="font-size: 28px; background: #f0f7ff; width: 52px; height: 52px; display: inline-flex; align-items: center; justify-content: center; border-radius: 10px;">🏢</span>
            <div>
                <span style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: #0b3a6e; letter-spacing: 0.5px;">الركيزة الأولى</span>
                <h2 style="margin: 0; font-size: 19px; color: #0D1B2A; font-weight: 700;">ملاك العقارات التجارية والمطورون</h2>
            </div>
        </div>
        <p style="font-size: 14.5px; color: #475569; margin: 0 0 16px 0;">
            تخضع عقود الإيجار التجارية لضريبة القيمة المضافة بنسبة 5%، مما يمنح المطورين والملاك الحق الكامل في استرداد ضريبة المدخلات المدفوعة على نفقات البناء والتشغيل الضخمة.
        </p>
        <ul style="margin: 0 0 20px 0; padding-right: 20px; font-size: 13.5px; color: #334155; line-height: 1.65; flex-grow: 1;">
            <li style="margin-bottom: 8px;"><strong>خطة الأصول الرأسمالية (المادة 57):</strong> متابعة وتعديل الضريبة لمدة 10 سنوات للعقارات التجارية بقيمة ≥ 5,000,000 درهم.</li>
            <li style="margin-bottom: 8px;"><strong>استرداد ضريبة البناء 100%:</strong> الأعمال المدنية، أنظمة التكييف المركزي، المصاعد، وأعمال التشطيبات والديكور.</li>
            <li style="margin-bottom: 8px;"><strong>احتساب العقارات متعددة الاستخدام:</strong> فصل ضريبة المدخلات للمباني المشتركة (سكني معفى / تجاري خاضع للضريبة).</li>
            <li><strong>استرداد النفقات التشغيلية:</strong> إدارة العقارات، الصيانة، الحراسة، وعمولات وسطاء التأجير.</li>
        </ul>
    </div>

    <!-- Card 2: Engineering Consultants -->
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-top: 5px solid #d4a017; border-radius: 10px; padding: 28px; box-shadow: 0 4px 18px rgba(0,0,0,0.05); display: flex; flex-direction: column;">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
            <span style="font-size: 28px; background: #fffdf5; width: 52px; height: 52px; display: inline-flex; align-items: center; justify-content: center; border-radius: 10px;">📐</span>
            <div>
                <span style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: #d4a017; letter-spacing: 0.5px;">الركيزة الثانية</span>
                <h2 style="margin: 0; font-size: 19px; color: #0D1B2A; font-weight: 700;">المكاتب الاستشارية الهندسية والمعمارية</h2>
            </div>
        </div>
        <p style="font-size: 14.5px; color: #475569; margin: 0 0 16px 0;">
            تخضع خدمات التصميم وإدارة المشاريع المقدمة لعملاء خارج الدولة لنسبة الصفر (0%)، مما يؤدي إلى تراكم أرصدة استرداد ضريبية مستمرة من الهيئة الاتحادية للضرائب.
        </p>
        <ul style="margin: 0 0 20px 0; padding-right: 20px; font-size: 13.5px; color: #334155; line-height: 1.65; flex-grow: 1;">
            <li style="margin-bottom: 8px;"><strong>تصدير الخدمات بنسبة 0% (المادة 31):</strong> للمستفيدين المقيمين خارج الدولة دون منشأة دائمة في الإمارات.</li>
            <li style="margin-bottom: 8px;"><strong>استرداد ضريبة البرمجيات الهندسية:</strong> تراخيص برامج BIM، وAutoCAD، وRevit، والاشتراكات السحابية.</li>
            <li style="margin-bottom: 8px;"><strong>استشاريو الباطن:</strong> استرداد 5% مدفوعة لفحوصات التربة، والمسح الطبوغرافي، والدراسات البيئية.</li>
            <li><strong>مطابقة الحوالات البنكية الخارجية:</strong> ربط كشوفات SWIFT مع الفواتير الضريبية ومحاضر التسليم.</li>
        </ul>
    </div>

    <!-- Card 3: Contractors -->
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-top: 5px solid #1e5a96; border-radius: 10px; padding: 28px; box-shadow: 0 4px 18px rgba(0,0,0,0.05); display: flex; flex-direction: column;">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
            <span style="font-size: 28px; background: #f0f7ff; width: 52px; height: 52px; display: inline-flex; align-items: center; justify-content: center; border-radius: 10px;">🏗️</span>
            <div>
                <span style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: #1e5a96; letter-spacing: 0.5px;">الركيزة الثالثة</span>
                <h2 style="margin: 0; font-size: 19px; color: #0D1B2A; font-weight: 700;">مقاولات الهندسة المدنية والكهروميكانيكية</h2>
            </div>
        </div>
        <p style="font-size: 14.5px; color: #475569; margin: 0 0 16px 0;">
            تواجه شركات المقاولات أعباء تمويلية ضخمة عند شراء مواد البناء. التحكم في توقيت ضريبة أموال الاستقطاع وتطبيق الاحتساب العكسي يوفر سيولة مالية بملايين الدراهم.
        </p>
        <ul style="margin: 0 0 20px 0; padding-right: 20px; font-size: 13.5px; color: #334155; line-height: 1.65; flex-grow: 1;">
            <li style="margin-bottom: 8px;"><strong>توقيت ضريبة أموال الاستقطاع (Retention):</strong> تأجيل استحقاق الضريبة لحين صدور شهادة الدفع أو الاستلام الفعلي للنقد.</li>
            <li style="margin-bottom: 8px;"><strong>الاحتساب العكسي المحلي (قرار مجلس الوزراء 91 لسنة 2023):</strong> عدم دفع ضريبة نقدية بين المقاولين ومقاولي الباطن.</li>
            <li style="margin-bottom: 8px;"><strong>استيراد المعدات ومواد البناء:</strong> مطابقة فورية لبيانات الجمارك في الصندوق رقم 6 مع الإقرارات الضريبية.</li>
            <li><strong>الدفعات المرحلية للمشروع:</strong> تسوية شهادات الإنجاز المعتمدة لمنع استفسارات التدقيق من الهيئة.</li>
        </ul>
    </div>

</div>

<!-- 10 Comprehensive FAQs in Arabic -->
<div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 34px; box-shadow: 0 4px 18px rgba(0,0,0,0.04); margin-bottom: 40px;">
    <div style="text-align: center; max-width: 760px; margin: 0 auto 30px auto;">
        <span style="display: inline-block; padding: 3px 10px; background: #eef4fc; color: #0b3a6e; font-size: 12px; font-weight: 700; border-radius: 4px; margin-bottom: 8px;">الأسئلة الشائعة</span>
        <h2 style="margin: 0 0 10px 0; color: #0D1B2A; font-size: 24px; font-weight: 700;">الأسئلة الأكثر شيوعاً حول استرداد ضريبة القيمة المضافة في الإمارات</h2>
        <p style="margin: 0; color: #64748b; font-size: 15px;">إجابات قانونية وفنية من وكلائنا الضريبيين المعتمدين لضمان استرداد أموالك بسرعة وأمان.</p>
    </div>

    <div style="display: flex; flex-direction: column; gap: 14px;">
        <details style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px;" open>
            <summary style="font-weight: 700; color: #0b3a6e; font-size: 15.5px; cursor: pointer;">1. هل يحق لملاك العقارات التجارية في الإمارات استرداد 100% من ضريبة بناء وتشطيب العقار؟</summary>
            <div style="margin-top: 10px; font-size: 14px; color: #475569; line-height: 1.7; border-top: 1px solid #e2e8f0; padding-top: 10px;">
                نعم، يحق لملاك العقارات التجارية المؤجرة (مكاتب، مراكز تسوق، مستودعات صناعية) استرداد كامل ضريبة المدخلات المدفوعة على أعمال البناء، والتصاميم، والتشطيبات، والصيانة، لأن عقود الإيجار التجارية تخضع للضريبة بنسبة 5%. بينما العقارات السكنية معفاة من الضريبة بعد الـ 3 سنوات الأولى وبالتالي لا يجوز استرداد ضريبتها.
            </div>
        </details>
        <details style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px;">
            <summary style="font-weight: 700; color: #0b3a6e; font-size: 15.5px; cursor: pointer;">2. كيف تنطبق خطة الأصول الرأسمالية (Capital Assets Scheme) على العقارات وفق المادة 57؟</summary>
            <div style="margin-top: 10px; font-size: 14px; color: #475569; line-height: 1.7; border-top: 1px solid #e2e8f0; padding-top: 10px;">
                بموجب المادة 57 من اللائحة التنفيذية، تخضع الأصول العقارية التي تبلغ قيمتها 5,000,000 درهم أو أكثر لفترة مراقبة وتعديل ضريبي مدتها 10 سنوات. إذا تغير استخدام العقار لاحقاً (مثلاً تحويل جزء تجاري إلى سكني معفى)، يجب تسوية الضريبة المستردة سنوياً على مدار الفترة المتبقية.
            </div>
        </details>
        <details style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px;">
            <summary style="font-weight: 700; color: #0b3a6e; font-size: 15.5px; cursor: pointer;">3. لماذا تتراكم أرصدة استرداد ضريبية باستمرار لدى المكاتب الاستشارية الهندسية؟</summary>
            <div style="margin-top: 10px; font-size: 14px; color: #475569; line-height: 1.7; border-top: 1px solid #e2e8f0; padding-top: 10px;">
                المكاتب التي تقدم خدمات هندسية ومعمارية لعملاء خارج الدولة تخضع مخرجاتها لنسبة الصفر (0% بموجب المادة 31). وبما أن ضريبة المخرجات صفر، بينما تدفع الشركة 5% على إيجارات المكاتب والتراخيص الهندسية، فإن كامل ضريبة المدخلات تصبح رصيداً قابلاً للاسترداد النقدي المباشر.
            </div>
        </details>
        <details style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px;">
            <summary style="font-weight: 700; color: #0b3a6e; font-size: 15.5px; cursor: pointer;">4. ما هي الوثائق المطلوبة لإثبات نسبة الصفر لتصدير الخدمات الهندسية؟</summary>
            <div style="margin-top: 10px; font-size: 14px; color: #475569; line-height: 1.7; border-top: 1px solid #e2e8f0; padding-top: 10px;">
                تطلب الهيئة الاتحادية للضرائب: (1) عقد خدمات يثبت عدم وجود منشأة دائمة للعميل في الإمارات، (2) ما يثبت استهلاك الخدمة خارج الدولة، (3) إشعارات التحويل البنكي بالعملة الأجنبية (SWIFT)، و(4) فواتير ضريبية توضح سبب تطبيق نسبة الصفر.
            </div>
        </details>
        <details style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px;">
            <summary style="font-weight: 700; color: #0b3a6e; font-size: 15.5px; cursor: pointer;">5. كيف يتعامل المقاولون مع ضريبة أموال الاستقطاع (Retention Money) المحتجزة لدى المطورين؟</summary>
            <div style="margin-top: 10px; font-size: 14px; color: #475569; line-height: 1.7; border-top: 1px solid #e2e8f0; padding-top: 10px;">
                تستحق الضريبة عند الأسبق من: تاريخ الفاتورة، تاريخ شهادة الدفع، أو تاريخ استلام النقد. إذا لم تصدر فاتورة بالمبلغ المحتجز، يجوز احتساب الضريبة عند استحقاق الإفراج النهائي أو استلام المبلغ، مما يجنب المقاول تمويل الضريبة من سيولته الخاصة.
            </div>
        </details>
        <details style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px;">
            <summary style="font-weight: 700; color: #0b3a6e; font-size: 15.5px; cursor: pointer;">6. ما هو تأثير آلية الاحتساب العكسي المحلي (قرار 91 لسنة 2023) على المقاولين؟</summary>
            <div style="margin-top: 10px; font-size: 14px; color: #475569; line-height: 1.7; border-top: 1px solid #e2e8f0; padding-top: 10px;">
                يسمح القرار لمقاولي الباطن بعدم تحصيل 5% ضريبة نقدية من المقاول الرئيسي، بل يقر المقاول الرئيسي بالضريبة ذاتياً عبر الإقرار، مما يمنع تجميد مبالغ نقدية هائلة ويختصر إجراءات الاسترداد.
            </div>
        </details>
        <details style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px;">
            <summary style="font-weight: 700; color: #0b3a6e; font-size: 15.5px; cursor: pointer;">7. ما هو نموذج VAT311 وكم تستغرق معالجة طلب الاسترداد؟</summary>
            <div style="margin-top: 10px; font-size: 14px; color: #475569; line-height: 1.7; border-top: 1px solid #e2e8f0; padding-top: 10px;">
                نموذج VAT311 هو الطلب الإلكتروني الرسمي في منصة EmaraTax لاسترداد رصيد الصندوق 14 نقداً. تراجع الهيئة الطلب خلال 20 يوم عمل في العادة، وعند الموافقة يُحول المبلغ لحساب الشركة المصرفي مباشرة عبر الآيبان (IBAN).
            </div>
        </details>
        <details style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px;">
            <summary style="font-weight: 700; color: #0b3a6e; font-size: 15.5px; cursor: pointer;">8. ماذا يحدث إذا قررت الهيئة إجراء تدقيق ضريبي قبل صرف الاسترداد؟</summary>
            <div style="margin-top: 10px; font-size: 14px; color: #475569; line-height: 1.7; border-top: 1px solid #e2e8f0; padding-top: 10px;">
                تقوم الهيئة بطلب عينات من الفواتير الضريبية، وإيصالات الدفع، وكشوف الحسابات البنكية، والبيانات الجمركية. تتولى RBO تمثيل عملائها رسمياً أمام الهيئة، وتقديم الردود الفنية الموثقة لإنهاء التدقيق دون استقطاعات أو مخالفات.
            </div>
        </details>
        <details style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px;">
            <summary style="font-weight: 700; color: #0b3a6e; font-size: 15.5px; cursor: pointer;">9. هل يمكن استرداد الضريبة للمباني متعددة الاستخدام (سكني وتجاري)؟</summary>
            <div style="margin-top: 10px; font-size: 14px; color: #475569; line-height: 1.7; border-top: 1px solid #e2e8f0; padding-top: 10px;">
                نعم، من خلال تطبيق معادلة تقسيم ضريبة المدخلات المعتمدة من الهيئة، حيث تُسترد الضريبة الخاصة بالجزء التجاري بالكامل، بينما توزع المصاريف المشتركة (المصاعد، التكييف، الأمن) بنسبة المساحة أو الإيرادات.
            </div>
        </details>
        <details style="background: #f8fafd; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px;">
            <summary style="font-weight: 700; color: #0b3a6e; font-size: 15.5px; cursor: pointer;">10. لماذا يُنصح بتعيين وكيل ضريبي معتمد مثل RBO لتقديم طلب الاسترداد؟</summary>
            <div style="margin-top: 10px; font-size: 14px; color: #475569; line-height: 1.7; border-top: 1px solid #e2e8f0; padding-top: 10px;">
                أي خطأ في طلب الاسترداد قد يؤدي لرفضه أو فرض غرامات إدارية جسيمة بموجب القانون الاتحادي رقم 28 لسنة 2022. يقوم خبراؤنا بالتدقيق المسبق لكافة المستندات والأرقام الضريبية وضمان مطابقتها 100% لمعايير الهيئة.
            </div>
        </details>
    </div>
</div>

<!-- Conversion CTA in Arabic -->
<div style="background: linear-gradient(135deg, #0b3a6e 0%, #1e5a96 100%); border-radius: 12px; padding: 32px 36px; text-align: center; color: #ffffff; box-shadow: 0 8px 24px rgba(11,58,110,0.25);">
    <h3 style="margin: 0 0 10px 0; font-size: 23px; font-weight: 700; color: #ffffff;">ابدأ إجراءات استرداد ضريبتك النقدية اليوم مع خبراء RBO</h3>
    <p style="margin: 0 auto 22px auto; max-width: 680px; font-size: 15.5px; color: #e2e8f0; line-height: 1.7;">
        فريقنا من المحاسبين القانونيين والوكلاء الضريبيين المعتمدين جاهز لمراجعة حساباتك وتأمين استرداد مستحقاتك من الهيئة الاتحادية للضرائب بأعلى كفاءة.
    </p>
    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 14px;">
        <a href="https://wa.me/971508051857?text=مرحباً%20RBO،%20نود%20البدء%20في%20استرداد%20ضريبة%20القيمة%20المضافة" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 28px; background: #25D366; color: #ffffff; text-decoration: none; font-weight: 700; font-size: 15px; border-radius: 8px; box-shadow: 0 4px 12px rgba(37,211,102,0.3);">
            <span>محادثة واتساب فورية</span> 💬
        </a>
    </div>
</div>

</div>
HTML;

    $ar_vat_existing = $model->post->get_translation($en_vat_id, 'ar');
    if ($ar_vat_existing) {
        $ar_vat_id = $ar_vat_existing;
        wp_update_post(array(
            'ID'           => $ar_vat_id,
            'post_title'   => $ar_vat_title,
            'post_content' => $ar_vat_content,
            'post_status'  => 'publish',
        ));
        echo "✅ Updated existing Arabic VAT Refund Page ID: $ar_vat_id\n";
    } else {
        $ar_vat_id = wp_insert_post(array(
            'post_title'   => $ar_vat_title,
            'post_name'    => 'refund',
            'post_content' => $ar_vat_content,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_author'  => $en_vat_post->post_author,
        ));
        $model->post->set_language($ar_vat_id, $ar_lang);
        $model->post->save_translations($en_vat_id, array('en' => $en_vat_id, 'ar' => $ar_vat_id));
        echo "✅ Created new Arabic VAT Refund Page ID: $ar_vat_id\n";
    }

    // Rank Math Arabic Meta
    update_post_meta($ar_vat_id, 'rank_math_title', $ar_vat_title);
    update_post_meta($ar_vat_id, 'rank_math_description', 'خدمات متخصصة لاسترداد ضريبة القيمة المضافة من الهيئة الاتحادية للضرائب عبر نموذج VAT311 لملاك العقارات التجارية والاستشارات الهندسية والمقاولين. حماية من التدقيق واسترداد نقدي سريع.');
    update_post_meta($ar_vat_id, 'rank_math_focus_keyword', 'استرداد ضريبة القيمة المضافة الإمارات, استرداد الضريبة للمقاولين, استرداد الضريبة للعقارات, نموذج VAT311 الإمارات');

    // 10 Arabic FAQs Schema
    $ar_faqs = array(
        array(
            'q' => 'هل يحق لملاك العقارات التجارية في الإمارات استرداد 100% من ضريبة بناء وتشطيب العقار؟',
            'a' => 'نعم، يحق لملاك العقارات التجارية المؤجرة استرداد كامل ضريبة المدخلات المدفوعة على أعمال البناء، والتصاميم، والتشطيبات، والصيانة، لأن عقود الإيجار التجارية تخضع للضريبة بنسبة 5%.'
        ),
        array(
            'q' => 'كيف تنطبق خطة الأصول الرأسمالية (Capital Assets Scheme) على العقارات وفق المادة 57؟',
            'a' => 'بموجب المادة 57 من اللائحة التنفيذية، تخضع الأصول العقارية التي تبلغ قيمتها 5,000,000 درهم أو أكثر لفترة مراقبة وتعديل ضريبي مدتها 10 سنوات.'
        ),
        array(
            'q' => 'لماذا تتراكم أرصدة استرداد ضريبية باستمرار لدى المكاتب الاستشارية الهندسية؟',
            'a' => 'المكاتب التي تقدم خدمات هندسية ومعمارية لعملاء خارج الدولة تخضع مخرجاتها لنسبة الصفر (0% بموجب المادة 31). وبما أن ضريبة المخرجات صفر، بينما تدفع الشركة 5% على إيجارات المكاتب والتراخيص الهندسية، فإن كامل ضريبة المدخلات تصبح رصيداً قابلاً للاسترداد النقدي المباشر.'
        ),
        array(
            'q' => 'ما هي الوثائق المطلوبة لإثبات نسبة الصفر لتصدير الخدمات الهندسية؟',
            'a' => 'تطلب الهيئة الاتحادية للضرائب: (1) عقد خدمات يثبت عدم وجود منشأة دائمة للعميل في الإمارات، (2) ما يثبت استهلاك الخدمة خارج الدولة، (3) إشعارات التحويل البنكي بالعملة الأجنبية (SWIFT)، و(4) فواتير ضريبية توضح سبب تطبيق نسبة الصفر.'
        ),
        array(
            'q' => 'كيف يتعامل المقاولون مع ضريبة أموال الاستقطاع (Retention Money) المحتجزة لدى المطورين؟',
            'a' => 'تستحق الضريبة عند الأسبق من: تاريخ الفاتورة، تاريخ شهادة الدفع، أو تاريخ استلام النقد. إذا لم تصدر فاتورة بالمبلغ المحتجز، يجوز احتساب الضريبة عند استحقاق الإفراج النهائي أو استلام المبلغ، مما يجنب المقاول تمويل الضريبة من سيولته الخاصة.'
        ),
        array(
            'q' => 'ما هو تأثير آلية الاحتساب العكسي المحلي (قرار 91 لسنة 2023) على المقاولين؟',
            'a' => 'يسمح القرار لمقاولي الباطن بعدم تحصيل 5% ضريبة نقدية من المقاول الرئيسي، بل يقر المقاول الرئيسي بالضريبة ذاتياً عبر الإقرار، مما يمنع تجميد مبالغ نقدية هائلة ويختصر إجراءات الاسترداد.'
        ),
        array(
            'q' => 'ما هو نموذج VAT311 وكم تستغرق معالجة طلب الاسترداد؟',
            'a' => 'نموذج VAT311 هو الطلب الإلكتروني الرسمي في منصة EmaraTax لاسترداد رصيد الصندوق 14 نقداً. تراجع الهيئة الطلب خلال 20 يوم عمل في العادة، وعند الموافقة يُحول المبلغ لحساب الشركة المصرفي مباشرة عبر الآيبان (IBAN).'
        ),
        array(
            'q' => 'ماذا يحدث إذا قررت الهيئة إجراء تدقيق ضريبي قبل صرف الاسترداد؟',
            'a' => 'تقوم الهيئة بطلب عينات من الفواتير الضريبية، وإيصالات الدفع، وكشوف الحسابات البنكية، والبيانات الجمركية. تتولى RBO تمثيل عملائها رسمياً أمام الهيئة، وتقديم الردود الفنية الموثقة لإنهاء التدقيق دون استقطاعات أو مخالفات.'
        ),
        array(
            'q' => 'هل يمكن استرداد الضريبة للمباني متعددة الاستخدام (سكني وتجاري)؟',
            'a' => 'نعم، من خلال تطبيق معادلة تقسيم ضريبة المدخلات المعتمدة من الهيئة، حيث تُسترد الضريبة الخاصة بالجزء التجاري بالكامل، بينما توزع المصاريف المشتركة (المصاعد، التكييف، الأمن) بنسبة المساحة أو الإيرادات.'
        ),
        array(
            'q' => 'لماذا يُنصح بتعيين وكيل ضريبي معتمد مثل RBO لتقديم طلب الاسترداد؟',
            'a' => 'أي خطأ في طلب الاسترداد قد يؤدي لرفضه أو فرض غرامات إدارية جسيمة بموجب القانون الاتحادي رقم 28 لسنة 2022. يقوم خبراؤنا بالتدقيق المسبق لكافة المستندات والأرقام الضريبية وضمان مطابقتها 100% لمعايير الهيئة.'
        )
    );
    update_post_meta($ar_vat_id, '_rbo_faq_schema', $ar_faqs);
}

flush_rewrite_rules();
echo "✅ Arabic pages created, linked to English originals, and rewrite rules flushed!\n";

