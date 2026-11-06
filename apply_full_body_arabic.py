import json
import re

with open("all_ar_posts_translated.json", "r", encoding="utf-8") as f:
    posts = json.load(f)

with open("service_body_translations_cache.json", "r", encoding="utf-8") as f:
    raw_cache = json.load(f)

# Keep ONLY valid translations (where key != val and val contains Arabic characters)
good_cache = {k: v for k, v in raw_cache.items() if k and v and k != v and re.search(r'[\u0600-\u06FF]', v)}

# Add explicit hybrid phrase cleanups
extra_cleanups = {
    "Accounts Payable & Receivable Management": "إدارة الذمم الدائنة والمدينة",
    "Accounts Payable &amp; Receivable Management": "إدارة الذمم الدائنة والمدينة",
    "الذمم الدائنة والموردين & Receivable": "إدارة الذمم الدائنة والمدينة",
    "الذمم الدائنة والموردين &amp; Receivable": "إدارة الذمم الدائنة والمدينة",
    "مسك الدفاتر المحاسبية & Accounting": "مسك الدفاتر والمحاسبة",
    "مسك الدفاتر المحاسبية &amp; Accounting": "مسك الدفاتر والمحاسبة",
    "VAT Registration / Filing": "تسجيل وإقرارات ضريبة القيمة المضافة",
    "Clear التقارير المالية الدورية": "تقارير مالية دورية واضحة",
    "المنطقة الحرة audit": "تدقيق شركات المناطق الحرة",
    "Monthly مسك الدفاتر المحاسبية": "مسك الدفاتر المحاسبية الشهري",
    "Ongoing مسك الدفاتر المحاسبية": "مسك الدفاتر المحاسبية المستمر",
    "AP & AR Management": "إدارة الذمم الدائنة والمدينة (AP/AR)",
    "AP &amp; AR Management": "إدارة الذمم الدائنة والمدينة (AP/AR)",
    "التسوية البنكية والمطابقة Services": "خدمات التسوية والمطابقة البنكية",
    "الامتثال لمعايير التقارير المالية الدولية IFRS Services": "خدمات الامتثال لمعايير التقارير المالية الدولية (IFRS)",
    "Explore خدمات ضريبة القيمة المضافة": "استكشف خدمات ضريبة القيمة المضافة",
    "Explore Our خدمات ضريبة القيمة المضافة": "استكشف خدماتنا في ضريبة القيمة المضافة",
    "Explore الاستشارات الضريبية لضريبة القيمة المضافة Services": "استكشف خدمات الاستشارات الضريبية لضريبة القيمة المضافة",
    "Explore Management Reporting Services": "استكشف خدمات التقارير الإدارية",
    "What Is a التدقيق المالي القانوني؟": "ما هو التدقيق المالي القانوني؟",
    "What Is التدقيق الداخلي للشركات؟": "ما هو التدقيق الداخلي للشركات؟",
    "What Is a تدقيق شركات المناطق الحرة؟": "ما هو تدقيق شركات المناطق الحرة؟",
    "What Is تقييم المخاطر المالية؟": "ما هو تقييم المخاطر المالية؟",
    "What is a خدمات المدير المالي الافتراضي؟": "ما هي خدمة المدير المالي الافتراضي (CFO)؟",
    "Buy Side الفحص النافي للجهالة": "الفحص النافي للجهالة لجانب المشتري",
    "Sell Side الفحص النافي للجهالة": "الفحص النافي للجهالة لجانب البائع",
    "Cash Flow إعداد الميزانيات التقديرية": "إعداد الميزانيات التقديرية للتدفق النقدي",
    "وظائف شركات Return Filing in UAE": "تقديم إقرارات ضريبة الشركات في الإمارات",
    "وظائف شركات Return Filing in": "تقديم إقرارات ضريبة الشركات في",
    "استكشف الشركات الشركات Return Filing": "استكشف خدمات تقديم إقرارات ضريبة الشركات",
    "ما هو تسجيل الشركات Return Filing؟": "ما هو تقديم إقرار ضريبة الشركات؟",
    "Small Business Relief": "تسهيلات الأعمال الصغيرة (Small Business Relief)",
    "Internal audit": "التدقيق الداخلي",
    "Statutory audit": "التدقيق القانوني المعتمد",
    "Due diligence": "الفحص النافي للجهالة",
    "Risk assessment": "تقييم المخاطر المالية",
    "Master 2026 UAE Accounting &amp; ضريبة الشركات Rules: إلزامي 7-Year Records &amp; IFRS Standards": "الدليل الشامل لقواعد المحاسبة وضريبة الشركات في الإمارات 2026: الالتزام بحفظ السجلات لمدة 7 سنوات ومعايير IFRS",
    "Master 2026 UAE Accounting & ضريبة الشركات Rules: إلزامي 7-Year Records & IFRS Standards": "الدليل الشامل لقواعد المحاسبة وضريبة الشركات في الإمارات 2026: الالتزام بحفظ السجلات لمدة 7 سنوات ومعايير IFRS",
    "Explore our comprehensive 2,800+ word practitioner guide detailing Article 56 7-year document retention laws, IFRS vs IFRS for SMEs thresholds, accrual accounting mandates, and official FTA penalty schedules.": "استكشف دليلنا الشامل الذي يوضح بالتفصيل قوانين الاحتفاظ بالمستندات لمدة 7 سنوات بموجب المادة 56، ومعايير التقارير المالية الدولية (IFRS)، ومتطلبات محاسبة الاستحقاق، وجداول غرامات الهيئة الاتحادية للضرائب (FTA).",
    "Read 2026 Accounting &amp; مسك الدفاتر المحاسبية Guide &rarr;": "اقرأ دليل المحاسبة ومسك الدفاتر لعام 2026 ←",
    "Read 2026 Accounting & مسك الدفاتر المحاسبية Guide →": "اقرأ دليل المحاسبة ومسك الدفاتر لعام 2026 ←",
    "Your Emirate": "اختر الإمارة",
    "Select Service": "اختر الخدمة المطلوبة",
    "Bookkeeping & Accounting": "مسك الدفاتر والمحاسبة",
    "Corporate Tax UAE": "ضريبة الشركات في الإمارات",
    "Audit Services": "خدمات التدقيق المالي",
    "Payroll Services": "خدمات الرواتب والأجور",
    "Business Setup / Formation": "تأسيس الشركات والأعمال",
    "اتفاقية التجارة الحرة": "الهيئة الاتحادية للضرائب (FTA)",
}

good_cache.update(extra_cleanups)

def normalize(s):
    s = re.sub(r'<[^>]+>', ' ', s)
    s = s.replace('&amp;', '&').replace('&#8217;', "'").replace('&#8220;', '"').replace('&#8221;', '"').replace('&nbsp;', ' ').replace('\xa0', ' ')
    s = re.sub(r'\s+', ' ', s).strip()
    return s

norm_cache = {}
for en, ar in good_cache.items():
    norm_cache[normalize(en)] = ar
    norm_cache[en.strip()] = ar

sorted_cache = sorted(good_cache.items(), key=lambda x: len(x[0]), reverse=True)

def translate_val(val):
    if not isinstance(val, str) or not val.strip():
        return val
    
    if not re.search(r'[a-zA-Z]{3,}', val):
        return val.replace('اتفاقية التجارة الحرة', 'الهيئة الاتحادية للضرائب (FTA)')
    
    if val in good_cache:
        return good_cache[val]
    
    norm_full = normalize(val)
    if norm_full in norm_cache and not ('<table' in val or '<section' in val):
        if val.strip().startswith('<p'):
            return f"<p>{norm_cache[norm_full]}</p>"
        return norm_cache[norm_full]
    
    res = val
    for en, ar in sorted_cache:
        if len(en) < 4 or not ar or en == ar:
            continue
        if en in res:
            res = res.replace(en, ar)
            
    # Normalized HTML inner block replacement (<p>, <li>, <h1>-<h6>, <b>, <strong>, <span>, <div>)
    if re.search(r'[a-zA-Z]{4,}', res):
        def repl_block(m):
            open_tag, inner, close_tag = m.group(1), m.group(2), m.group(3)
            if not re.search(r'[a-zA-Z]{3,}', inner):
                return m.group(0)
            n_inner = normalize(inner)
            if n_inner in norm_cache:
                return f"{open_tag}{norm_cache[n_inner]}{close_tag}"
            return m.group(0)

        res = re.sub(r'(<(?:p|li|h[1-6]|b|strong|span|div)[^>]*>)(.*?)(</(?:p|li|h[1-6]|b|strong|span|div)>)', repl_block, res, flags=re.DOTALL)
        # Run a second pass for nested tags (e.g. <p><span>...</span></p>)
        if re.search(r'[a-zA-Z]{4,}', res):
            res = re.sub(r'(<(?:p|li|h[1-6]|div)[^>]*>)(.*?)(</(?:p|li|h[1-6]|div)>)', repl_block, res, flags=re.DOTALL)

    # Standard CTA and navigation terms
    res = res.replace('Book Free Consultation →', 'احجز استشارة مجانية ←')
    res = res.replace('Get Free Consultation →', 'احصل على استشارة مجانية ←')
    res = res.replace('Request Free Consultation', 'طلب استشارة مجانية')
    res = res.replace('WhatsApp Us Now', 'تواصل عبر واتساب الآن')
    res = res.replace('Call Now', 'اتصل بنا الآن')
    res = res.replace('Free Initial Consultation', 'استشارة أولية مجانية')
    res = res.replace('10min Average Response Time', 'متوسط وقت الاستجابة 10 دقائق')
    res = res.replace('UAE Businesses', 'شركة في الإمارات')
    res = res.replace('FTA Compliant Solutions', 'حلول متوافقة 100% مع FTA')
    res = res.replace('All 7 Emirates Covered', 'تغطية شاملة لكافة الإمارات السبع')
    res = res.replace('Frequently Asked Questions', 'الأسئلة الشائعة')
    res = res.replace('What Our Clients Say', 'آراء عملائنا الكرام')
    res = res.replace('Client Reviews', 'تقييمات وآراء العملاء')
    res = res.replace('Common Questions', 'الأسئلة الأكثر شيوعاً')
    res = res.replace('Our Services', 'خدماتنا')
    res = res.replace('View All 36 Specialized Services', 'عرض كافة الخدمات التخصصية الـ 36')
    res = res.replace('Explore All 7 UAE Emirates', 'استكشف كافة إمارات الدولة السبع')
    res = res.replace('اتفاقية التجارة الحرة', 'الهيئة الاتحادية للضرائب (FTA)')
    
    if res.endswith('?'):
        res = res[:-1] + '؟'
    res = res.replace(' ?', '؟')
    
    return res

TEXT_KEYS = {
    'title', 'title_text', 'description', 'description_text',
    'item_title', 'placeholder', 'field_label', 'button_text',
    'select_options', 'field_options',
    'text', 'editor', 'heading_title', 'html', 'caption',
    'sub_title', 'cta_title', 'tab_title', 'tab_content'
}

def walk_and_translate(node):
    if isinstance(node, dict):
        new_dict = {}
        for k, v in node.items():
            if k in TEXT_KEYS and isinstance(v, str):
                new_dict[k] = translate_val(v)
            elif isinstance(v, (dict, list)):
                new_dict[k] = walk_and_translate(v)
            else:
                new_dict[k] = v
        return new_dict
    elif isinstance(node, list):
        return [walk_and_translate(item) for item in node]
    return node

print(f"Applying full body Arabic translation across all 44 posts using {len(good_cache)} verified translations...")

updated_posts = {}
for idx, (pid, pdata) in enumerate(posts.items()):
    try:
        raw_json = json.loads(pdata['data'])
        translated_json = walk_and_translate(raw_json)
        new_data_str = json.dumps(translated_json, ensure_ascii=False)
        updated_posts[pid] = {
            'id': pdata['id'],
            'title': pdata['title'],
            'data': new_data_str
        }
    except Exception as e:
        print(f"Error on post {pid}: {e}")
        updated_posts[pid] = pdata

with open("all_ar_posts_translated_full.json", "w", encoding="utf-8") as f:
    json.dump(updated_posts, f, indent=2, ensure_ascii=False)

# Also clean up service_body_translations_cache.json so bad entries (key == val) are removed!
with open("service_body_translations_cache.json", "w", encoding="utf-8") as f:
    json.dump(good_cache, f, indent=2, ensure_ascii=False)

print(f"Saved all_ar_posts_translated_full.json successfully! ({len(updated_posts)} posts)")
