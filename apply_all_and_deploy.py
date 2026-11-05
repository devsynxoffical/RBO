import json
import re

with open(r"d:\Rboo\all_ar_posts_raw.json", "r", encoding="utf-8") as f:
    posts = json.load(f)

with open(r"d:\Rboo\faq_translations_cache.json", "r", encoding="utf-8") as f:
    faq_cache = json.load(f)

with open(r"d:\Rboo\html_phrases_cache.json", "r", encoding="utf-8") as f:
    html_cache = json.load(f)

with open(r"d:\Rboo\hub_translations_cache.json", "r", encoding="utf-8") as f:
    hub_cache = json.load(f)

print(f"Loaded: {len(posts)} posts | {len(faq_cache)} FAQs | {len(html_cache)} HTML phrases | {len(hub_cache)} Hub phrases")

html_phrases_sorted = sorted(html_cache.items(), key=lambda x: len(x[0]), reverse=True)
hub_phrases_sorted = sorted(hub_cache.items(), key=lambda x: len(x[0]), reverse=True)

FORM_OPTIONS_SERVICE = "مسك الدفاتر والمحاسبة\\nتسجيل وإقرارات ضريبة القيمة المضافة\\nضريبة الشركات في الإمارات\\nخدمات التدقيق المالي\\nخدمات الرواتب وحماية الأجور WPS\\nالمدير المالي الافتراضي (CFO)\\nمكافحة غسل الأموال (AML)"
FORM_OPTIONS_EMIRATE = "دبي\\nأبوظبي\\nالشارقة\\nعجمان\\nرأس الخيمة\\nالفجيرة\\nأم القيوين\\nالعين"

HERO_TRANSLATIONS = {
    "areas-we-serve-2": {
        "title": "فروعنا ودليل الخدمات المحاسبية والضريبية في كافة إمارات الدولة",
        "lead": "نقدم خدمات المحاسبة، وتدقيق الحسابات، وتسجيل وإقرارات ضريبة القيمة المضافة وضريبة الشركات للشركات المسجلة في البر الرئيسي وكافة المناطق الحرة في الإمارات السبع."
    },
    "dubai": {
        "title": "شركة محاسبة واستشارات مالية وضريبية معتمدة في دبي",
        "lead": "نساعد الشركات والمؤسسات في دبي على الامتثال التام لمتطلبات ضريبة الشركات، وضريبة القيمة المضافة، والتدقيق المالي، مع خدمات تأسيس الشركات في بر دبي والمناطق الحرة."
    },
    "abu-dhabi": {
        "title": "شركة محاسبة وتدقيق معتمدة في أبوظبي",
        "lead": "حلول محاسبية واستشارات ضريبية متخصصة للشركات والمنشآت في أبوظبي، متوافقة مع لوائح الهيئة الاتحادية للضرائب ومعايير التقارير المالية الدولية IFRS."
    },
    "sharjah": {
        "title": "خدمات المحاسبة والتدقيق والضرائب في الشارقة",
        "lead": "شريكك المالي الموثوق لمسك الدفاتر، وتدقيق الحسابات، وتقديم الإقرارات الضريبية للمصانع والشركات التجارية في إمارة الشارقة والمناطق الحرة."
    },
    "ajman": {
        "title": "شركة محاسبة رائدة وشريك معتمد في عجمان",
        "lead": "مقرنا الرئيسي في منطقة عجمان الحرة (AFZA). نقدم باقات تأسيس أعمال شاملة، ومسك الدفاتر، واستشارات ضريبة الشركات، والتدقيق القانوني المعتمد."
    },
    "ras-al-khaimah": {
        "title": "خدمات المحاسبة وتدقيق الحسابات في رأس الخيمة",
        "lead": "دعم مالي وضريبي شامل لشركات منطقة راكز (RAKEZ) وبر رأس الخيمة الرئيسي، لضمان الامتثال التام وتجنب أي غرامات أو تأخير."
    },
    "fujairah": {
        "title": "شركة محاسبة واستشارات ضريبية معتمدة في الفجيرة",
        "lead": "حلول مهنية لمسك الدفاتر، وإقرارات ضريبة الشركات، والتدقيق المالي للشركات العاملة في الفجيرة ومينائها والمناطق الحرة."
    },
    "umm-al-quwain": {
        "title": "خدمات المحاسبة والامتثال الضريبي في أم القيوين",
        "lead": "خدمات محاسبية وضريبية متكاملة بأسعار تنافسية للشركات والمصانع والمؤسسات في إمارة أم القيوين ومنطقتها الحرة (UAQ FTZ)."
    },
    "corporate-tax-registration": {
        "title": "خدمات تسجيل ضريبة الشركات في الإمارات | وكيل ضريبي معتمد لدى FTA",
        "lead": "تسجيل قانوني معتمد لضريبة الشركات عبر بوابة إمارات تاكس (EmaraTax)، واستخراج الرقم الضريبي (TRN)، والتأكد من تطبيق تسهيلات الأعمال الصغيرة بنسبة 0% وتجنب غرامة التأخير (10,000 درهم)."
    },
    "corporate-tax-return-filing": {
        "title": "تقديم إقرارات ضريبة الشركات (Form CT201) في الإمارات",
        "lead": "إعداد وتدقيق الإقرار الضريبي السنوي لضريبة الشركات، وحساب الدخل الخاضع للضريبة، وتطبيق الخصومات القانونية، وتقديم الإقرار قبل الموعد النهائي دون أخطاء."
    },
    "corporate-tax-planning": {
        "title": "التخطيط الاستراتيجي لضريبة الشركات وهيكلة الأعمال في الإمارات",
        "lead": "استشارات ضريبية وقانونية متقدمة لهيكلة الشركات والمجموعات الضريبية، والاستفادة القصوى من الإعفاءات وتسهيلات الشركات الصغيرة وقواعد المناطق الحرة المؤهلة."
    },
    "transfer-pricing": {
        "title": "خدمات تسعير المعاملات (Transfer Pricing) وملفات التوثيق في الإمارات",
        "lead": "إعداد الملف الرئيسي (Master File) والملف المحلي (Local File) وفقاً للمادة 55 ومتطلبات مبدأ السعر المحايد (Arm's Length Principle) لضمان الامتثال التام أمام FTA."
    },
    "corporate-tax": {
        "title": "دليل وخدمات ضريبة الشركات الشاملة في الإمارات لعام 2026",
        "lead": "تغطية شاملة لكافة متطلبات المرسوم بقانون اتحادي رقم 47 لسنة 2022: من التسجيل والتخطيط الضريبي وحتى تقديم الإقرارات والتمثيل أمام الهيئة."
    },
    "vat-registration": {
        "title": "خدمات تسجيل ضريبة القيمة المضافة (VAT) في الإمارات",
        "lead": "استخراج شهادة التسجيل الضريبي والرقم الضريبي (TRN) خلال 5 أيام عمل، مع تدقيق أهليتك للتسجيل الإلزامي (375 ألف درهم) أو الاختياري (187.5 ألف درهم)."
    },
    "vat-return-filing": {
        "title": "تقديم إقرارات ضريبة القيمة المضافة (Form VAT201) في الإمارات",
        "lead": "إعداد وتدقيق إقرارات ضريبة القيمة المضافة الربع سنوية والشهرية، ومطابقة ضريبة المدخلات والمخرجات، وضمان تقديمها في مواعيدها دون غرامات."
    },
    "refund": {
        "title": "خدمات استرداد ضريبة القيمة المضافة في الإمارات (نموذج VAT311)",
        "lead": "استرداد نقدي مباشر لأرصدتك الضريبية المتراكمة من الهيئة الاتحادية للضرائب لملاك العقارات التجارية، والمطورين، والمكاتب الاستشارية، وشركات المقاولات."
    },
    "vat-advisory": {
        "title": "استشارات ضريبة القيمة المضافة وتصنيف المعاملات في الإمارات",
        "lead": "تحديد المعاملات الخاضعة لنسبة 5%، والنسبة الصفرية 0%، والمعاملات المعفاة وخارج النطاق، لضمان الفوترة القانونية وتفادي أخطاء التدقيق."
    },
    "fta-audit-assistance": {
        "title": "المساعدة في تدقيق الهيئة الاتحادية للضرائب والدفاع الضريبي",
        "lead": "تمثيل شركتك رسمياً أمام مفتشي ومدققي الهيئة الاتحادية للضرائب، وتجهيز ملفات التدقيق والبيانات المالية المطلوبة وحماية مصالحك."
    },
    "fta-records-amendment": {
        "title": "تعديل وتحديث السجلات الضريبية لدى الهيئة الاتحادية للضرائب",
        "lead": "تحديث بيانات الرخص التجارية، وتغيير الشركاء، والأنشطة الاقتصادية، وعناوين الفروع في نظام EmaraTax لتفادي غرامات عدم الإخطار."
    },
    "penalty-reconsideration": {
        "title": "طلبات إعادة النظر في الغرامات الضريبية والطعون في الإمارات",
        "lead": "صياغة وتقديم طلبات إعادة النظر والاعتراض على الغرامات الإدارية الضريبية بموجب قرار مجلس الوزراء رقم 105، مع سجل نجاح في تخفيض وإلغاء الغرامات."
    },
    "vat-registration-filing": {
        "title": "خدمات ضريبة القيمة المضافة المتكاملة في الإمارات",
        "lead": "حلول متكاملة للتسجيل، وتقديم الإقرارات، والاسترداد النقدي، والاستشارات لضمان امتثال شركتك الضريبي بنسبة 100%."
    },
    "bookkeeping-and-accounting": {
        "title": "خدمات مسك الدفاتر والمحاسبة الشهرية للشركات في الإمارات",
        "lead": "إدارة كاملة لحساباتك اليومية والشهرية، والتسويات البنكية، والذمم الدائنة والمدينة، والتقارير المالية عبر برامج السحاب Zoho Books و QuickBooks و Xero."
    },
    "bank-reconciliation": {
        "title": "خدمات التسوية البنكية ومطابقة الحسابات المصرفية في الإمارات",
        "lead": "مطابقة دقيقة لكافة كشوف الحسابات المصرفية مع دفاتر الأستاذ العام، واكتشاف الفروقات والرسوم غير المسجلة لضمان أرصدة نقدية دقيقة وموثوقة."
    },
    "accounts-payable-and-receivable": {
        "title": "إدارة الذمم المدينة والدائنة ومتابعة التدفقات النقدية",
        "lead": "تنظيم فواتير الموردين، وإصدار مطالبات العملاء، ومتابعة التحصيلات المتأخرة، وتفادي الفواتير المزدوجة لتحسين السيولة النقدية لشركتك."
    },
    "ifrs-compliance": {
        "title": "خدمات الامتثال لمعايير التقارير المالية الدولية (IFRS)",
        "lead": "إعداد القوائم المالية وفقاً لمعايير IFRS ومعايير المنشآت الصغيرة والمتوسطة (IFRS for SMEs)، كمتطلب أساسي لتجديد الرخص والقروض البنكية وضريبة الشركات."
    },
    "financial-reporting": {
        "title": "إعداد القوائم والتقارير المالية الدورية للمدراء والمستثمرين",
        "lead": "قوائم الدخل، والميزانية العمومية، وقوائم التدفق النقدي، وتقارير الأداء المالي الشهرية والربع سنوية لمساعدتك في اتخاذ قرارات تجارية واثقة."
    },
    "accounting": {
        "title": "خدمات المحاسبة والحلول المالية المتكاملة في الإمارات",
        "lead": "نوفر لشركتك قسماً مالياً متكاملاً يتولى مسك الدفاتر، وإدارة الفواتير، والتقارير الإدارية بمهنية عالية وتكلفة أقل بكثير من تعيين فريق داخلي."
    },
    "statutory-audit": {
        "title": "خدمات التدقيق المالي القانوني المعتمد في دبي والإمارات",
        "lead": "تقارير تدقيق مالي قانونية معتمدة من مدققي حسابات مرخصين، مقبولة لدى البنوك، والمناطق الحرة، والدوائر الاقتصادية لجميع الإمارات السبع."
    },
    "free-zone-audit": {
        "title": "تدقيق الحسابات لشركات المناطق الحرة في الإمارات (AFZA, DAFZA, DMCC, وغيرها)",
        "lead": "إصدار تقارير التدقيق السنوية الإلزامية لتجديد الرخص التجارية في كافة المناطق الحرة، والتحقق من استيفاء شروط الاستفادة من نسبة ضريبة 0%."
    },
    "internal-audit": {
        "title": "خدمات التدقيق الداخلي وتقييم أنظمة الرقابة المالية",
        "lead": "فحص مستقل للعمليات التشغيلية والمالية، واكتشاف الثغرات الرقابية، وحماية أصول الشركة من الاحتيال وسوء الإدارة."
    },
    "due-diligence": {
        "title": "الفحص المالي النافي للجهالة (Due Diligence) لصفقات الاستحواذ والاندماج",
        "lead": "تحليل شامل لدفاتر الشركة المستهدفة، والتزاماتها الضريبية والقانونية غير المسجلة، وجودة أرباحها لحماية استثمارك وتحديد السعر العادل للصفقة."
    },
    "risk-assessment": {
        "title": "تقييم المخاطر المالية والامتثال والحوكمة المؤسسية",
        "lead": "تحديد المخاطر التشغيلية، والائتمانية، والسيولة، والامتثال للوائح غسل الأموال (AML) ووضع خطط وإجراءات للحد منها."
    },
    "audit-assurance": {
        "title": "خدمات التدقيق والتأكيد المالي الشاملة في الإمارات",
        "lead": "نوفر تدقيقاً مستقلاً وشفافاً يعزز ثقة البنوك والجهات التنظيمية والمستثمرين في بياناتك المالية."
    },
    "wps-payroll": {
        "title": "خدمات الرواتب ونظام حماية الأجور (WPS) في الإمارات",
        "lead": "إصدار ملفات SIF المتوافقة مع نظام حماية الأجور (WPS)، وتحويل الرواتب في مواعيدها القانونية لتجنب تجميد الرخص وتوقيع غرامات وزارة العمل."
    },
    "end-of-service-benefits": {
        "title": "احتساب مكافأة نهاية الخدمة ومستحقات الموظفين في الإمارات",
        "lead": "احتساب دقيق لمكافأة نهاية الخدمة (EOSB) وبدل الإجازات والتسوية النهائية وفقاً لقانون العمل الإماراتي ولوائح وزارة الموارد البشرية."
    },
    "employee-leave-management": {
        "title": "إدارة إجازات الموظفين ومستحقات العطلات وتذاكر السفر",
        "lead": "تتبع دقيق للإجازات السنوية، والمرضية، وبدلات العطلات الرسمية، وتحديث مخصصات الإجازات في الدفاتر المحاسبية دورياً."
    },
    "payroll": {
        "title": "خدمات إدارة الرواتب وشؤون الموظفين المتكاملة في الإمارات",
        "lead": "إعداد جداول الرواتب الشهرية، وإصدار قسائم الرواتب، وإدارة مستحقات الموظفين والتسويات النهائية بكفاءة وسرية تامة."
    },
    "virtual-cfo": {
        "title": "خدمات المدير المالي الافتراضي (Virtual CFO) للشركات في الإمارات",
        "lead": "احصل على قيادة استراتيجية لمدير مالي تنفيذي خبير لتوجيه أعمالك، وتنمية أرباحك، وإدارة السيولة بجزء بسيط من تكلفة المدير المالي المتفرغ."
    },
    "business-advisory": {
        "title": "الاستشارات المالية للأعمال والتوسع التجاري في الإمارات",
        "lead": "دراسات جدوى، وتحليل نماذج الأعمال، وتسعير المنتجات، واستشارات الهيكلة المالية لتحقيق النمو المستدام لأعمالك."
    },
    "financial-planning-and-analysis": {
        "title": "التخطيط والتحليل المالي (FP&A) ونمذجة السيناريوهات",
        "lead": "توقعات مالية مستقبلية، وتحليل الانحرافات بين المخطط والفعلي، وقياس مؤشرات الأداء الرئيسية (KPIs) لتعظيم الربحية."
    },
    "budgeting": {
        "title": "إعداد الميزانيات التقديرية وضبط النفقات للشركات",
        "lead": "تصميم ميزانيات تشغيلية ورأسمالية سنوية، ومراقبة النفقات الفعلية مقارنة بالميزانية، وضمان عدم تجاوز حدود الإنفاق المعتمدة."
    },
    "cash-flow-management": {
        "title": "إدارة التدفقات النقدية وتأمين السيولة المالية في الإمارات",
        "lead": "توقعات التدفق النقدي الأسبوعية والشهرية، وإدارة دورة رأس المال العامل، لتفادي أي أزمات سيولة وضمان سداد الالتزامات في وقتها."
    },
    "management-reporting": {
        "title": "إعداد التقارير الإدارية التنفيذية ولوحات التحكم للمدراء",
        "lead": "لوحات تحكم مالية مبسطة ورسوم بيانية وتقارير شهرية تمنح الإدارة العليا رؤية واضحة لحجم المبيعات وهوامش الربح والسيولة."
    },
    "our-services-2": {
        "title": "دليل خدماتنا المالية والمحاسبية والضريبية الشاملة في الإمارات",
        "lead": "نقدم باقة متكاملة من الخدمات المعتمدة تغطي المحاسبة، وضريبة الشركات، وضريبة القيمة المضافة، والتدقيق، والرواتب، وتأسيس الشركات لكافة الإمارات السبع."
    }
}

def clean_arabic_text(text):
    if not isinstance(text, str):
        return text
    text = re.sub(r'^\?([^\?]+)', r'\1؟', text)
    text = text.replace('?', '؟')
    text = text.replace('؟?', '؟')
    return text

def process_element(el, faq_cache, post_slug):
    if isinstance(el, dict):
        widget_type = el.get('widgetType')
        settings = el.get('settings', {})
        
        # 1. HTML WIDGETS
        if widget_type == 'html':
            h = settings.get('html', '')
            if h:
                if 'dir="rtl"' not in h:
                    h = h.replace('<div class="rbo-seo-upgrade-container"', '<div class="rbo-seo-upgrade-container" dir="rtl"')
                    h = h.replace('<div class="rbo-seo-upgrade-block"', '<div class="rbo-seo-upgrade-block" dir="rtl"')
                    h = h.replace('<div class="rbo-guide-callout"', '<div class="rbo-guide-callout" dir="rtl"')
                
                for en_phrase, ar_phrase in html_phrases_sorted:
                    if en_phrase in h:
                        h = h.replace(en_phrase, ar_phrase)
                
                h = h.replace('Frequently Asked Questions: UAE التدقيق المالي القانونيs', 'الأسئلة الشائعة: التدقيق المالي القانوني المعتمد في الإمارات')
                h = h.replace('Frequently Asked Questions', 'الأسئلة الشائعة')
                h = h.replace('COMMON QUESTIONS', 'الأسئلة الشائعة')
                h = h.replace('AP/AR Operational FAQs', 'الأسئلة الشائعة لإدارة الذمم')
                h = h.replace('Visual FAQs', 'الأسئلة الشائعة')
                h = clean_arabic_text(h)
                settings['html'] = h

        # 2. ACCORDION / TOGGLE FAQs
        elif widget_type in ['accordion', 'toggle']:
            tabs = settings.get('tabs', [])
            for tab in tabs:
                q = tab.get('tab_title', '').strip()
                if q in faq_cache:
                    tab['tab_title'] = clean_arabic_text(faq_cache[q]['q_ar'])
                    tab['tab_content'] = clean_arabic_text(faq_cache[q]['a_ar'])
                else:
                    tab['tab_title'] = clean_arabic_text(q)
                    tab['tab_content'] = clean_arabic_text(tab.get('tab_content', ''))

        # 3. FORM WIDGET
        elif widget_type == 'form':
            settings['form_name'] = 'نموذج طلب الاستشارة المجانية'
            for field in settings.get('form_fields', []):
                label = field.get('field_label', '')
                placeholder = field.get('placeholder', '')
                
                if any(w in label or w in placeholder for w in ['Name', 'الاسم']):
                    field['field_label'] = 'الاسم الكامل'
                    field['placeholder'] = 'الاسم الكامل'
                elif any(w in label or w in placeholder for w in ['Phone', 'واتساب']):
                    field['field_label'] = 'رقم الهاتف / واتساب'
                    field['placeholder'] = 'رقم الهاتف / واتساب'
                elif any(w in label or w in placeholder for w in ['Service', 'الخدمة']):
                    field['field_label'] = 'نوع الخدمة المطلوبة'
                    field['placeholder'] = 'اختر نوع الخدمة'
                    field['select_options'] = FORM_OPTIONS_SERVICE
                elif any(w in label or w in placeholder for w in ['Emirate', 'الإمارة']):
                    field['field_label'] = 'الإمارة'
                    field['placeholder'] = 'اختر إمارتك'
                    field['select_options'] = FORM_OPTIONS_EMIRATE
            
            settings['button_text'] = 'طلب استشارة مجانية ←'
            settings['success_message'] = 'تم إرسال طلبك بنجاح! سيتواصل معك مستشارنا المالي خلال 10 دقائق.'
            settings['error_message'] = 'حدث خطأ أثناء الإرسال، يرجى المحاولة مرة أخرى أو مراسلتنا عبر واتساب.'
            settings['required_field_message'] = 'هذا الحقل مطلوب.'

        # 4. HEADING WIDGET
        elif widget_type == 'heading':
            title = settings.get('title', '')
            if title in hub_cache:
                settings['title'] = clean_arabic_text(hub_cache[title])
            elif 'Get a Free Consultation' in title:
                settings['title'] = 'احصل على استشارة مجانية'
            elif 'What Our Clients Say' in title:
                settings['title'] = 'ماذا يقول عملاؤنا عن خدمات RBO للمحاسبة'
            elif 'Client Reviews' in title:
                settings['title'] = 'تقييمات عملائنا'
            elif 'Frequently Asked Questions' in title:
                settings['title'] = 'أسئلة يتكرر طرحها'
            elif 'COMMON QUESTIONS' in title:
                settings['title'] = 'الأسئلة الشائعة'
            elif 'How It Works' in title:
                settings['title'] = 'كيف نعمل معك'
            elif 'OUR PROCESS' in title:
                settings['title'] = 'خطوات تقديم الخدمة'
            elif settings.get('header_size') == 'h1' and post_slug in HERO_TRANSLATIONS:
                settings['title'] = HERO_TRANSLATIONS[post_slug]['title']
            else:
                for en_h, ar_h in hub_phrases_sorted:
                    if en_h in title:
                        title = title.replace(en_h, ar_h)
                settings['title'] = clean_arabic_text(title)

        # 5. TEXT EDITOR WIDGET
        elif widget_type == 'text-editor':
            ed = settings.get('editor', '')
            if ed in hub_cache:
                settings['editor'] = clean_arabic_text(hub_cache[ed])
            elif 'Frequently Asked Questions' in ed or 'COMMON QUESTIONS' in ed:
                ed = ed.replace('Frequently Asked Questions', 'الأسئلة الشائعة').replace('COMMON QUESTIONS', 'الأسئلة الشائعة')
                settings['editor'] = clean_arabic_text(ed)
            elif 'Our expert will reply within 10 minutes' in ed:
                settings['editor'] = '<p>سيقوم خبراؤنا بالرد عليك خلال 10 دقائق</p>'
            elif 'Your information is 100% secure' in ed:
                settings['editor'] = '<p>بياناتك آمنة وسرية بنسبة 100% 🔒</p>'
            elif 'Trusted by businesses across all UAE Emirates' in ed:
                settings['editor'] = '<p>تحظى بثقة مئات الشركات في كافة أنحاء الإمارات. إليك ما يشاركه عملاؤنا حول تجربتهم معنا</p>'
            elif 'Super fast, highly responsive' in ed:
                settings['editor'] = '<p>فريق عمل سريع الاستجابة ومحترف للغاية، إجابات واضحة ودقيقة على كافة الاستفسارات، وخدماتهم تتسم بالكفاءة والمهنية العالية.</p>'
            elif 'Excellent service from RBO' in ed:
                settings['editor'] = '<p>خدمة ممتازة واحترافية من شركة RBO، تولوا إدارة ملف استرداد ضريبة القيمة المضافة والامتثال الضريبي لدى FTA بكل دقة واقتدار.</p>'
            elif 'Thanks RBO Team for helping me in vat returns' in ed:
                settings['editor'] = '<p>شكراً جزيلاً لفريق RBO على دعمهم المتميز في تقديم الإقرارات الضريبية وإدارة السجلات بدقة متناهية.</p>'
            elif ('An incorrect' in ed or 'FTA-approved' in ed or 'Running a business' in ed or 'Since corporate tax' in ed or 'business landscape looks' in ed) and post_slug in HERO_TRANSLATIONS:
                settings['editor'] = f"<p>{HERO_TRANSLATIONS[post_slug]['lead']}</p>"
            else:
                for en_h, ar_h in hub_phrases_sorted:
                    if en_h in ed:
                        ed = ed.replace(en_h, ar_h)
                settings['editor'] = clean_arabic_text(ed)

        # 6. BUTTON WIDGET
        elif widget_type == 'button':
            txt = settings.get('text', '')
            if 'WhatsApp' in txt:
                settings['text'] = 'تواصل عبر واتساب'
            elif 'Call Now' in txt or 'Call' in txt:
                settings['text'] = 'اتصل بنا الآن'
            elif 'Free Consultation' in txt or 'Consultation' in txt:
                settings['text'] = 'طلب استشارة مجانية ←'
            elif 'Learn More' in txt:
                settings['text'] = 'اكتشف المزيد ←'
            elif 'View All' in txt:
                settings['text'] = 'عرض كافة الخدمات ←'

        # 7. ICON LIST WIDGET
        elif 'icon_list' in settings and isinstance(settings['icon_list'], list):
            for item in settings['icon_list']:
                it_text = item.get('text', '')
                if it_text in hub_cache:
                    item['text'] = clean_arabic_text(hub_cache[it_text])
                else:
                    item['text'] = clean_arabic_text(it_text)

        # Recurse
        for v in el.values():
            if isinstance(v, (dict, list)):
                process_element(v, faq_cache, post_slug)

    elif isinstance(el, list):
        for item in el:
            process_element(item, faq_cache, post_slug)

translated_posts = {}
updated_count = 0

for pid, p in posts.items():
    post_slug = p.get('slug', '')
    raw_meta = p.get('raw_meta', '')
    if not raw_meta:
        continue
    try:
        data = json.loads(raw_meta)
    except:
        continue
        
    process_element(data, faq_cache, post_slug)
    
    title_ar = HERO_TRANSLATIONS.get(post_slug, {}).get('title', p.get('title', ''))
    
    translated_posts[pid] = {
        'id': pid,
        'slug': post_slug,
        'title': title_ar,
        'data': json.dumps(data, ensure_ascii=False)
    }
    updated_count += 1

with open(r"d:\Rboo\all_ar_posts_translated.json", "w", encoding="utf-8") as f:
    json.dump(translated_posts, f, ensure_ascii=False)

print(f"Master Build Done! {updated_count} pages updated and saved.")

