import json
import re
import os

def load_data():
    with open(r"d:\Rboo\all_ar_posts_raw.json", "r", encoding="utf-8") as f:
        posts = json.load(f)
    with open(r"d:\Rboo\faq_translations_cache.json", "r", encoding="utf-8") as f:
        faq_cache = json.load(f)
    return posts, faq_cache

# Universal Arabic form replacements
FORM_OPTIONS_SERVICE = """مسك الدفاتر والمحاسبة
تسجيل وإقرارات ضريبة القيمة المضافة
ضريبة الشركات في الإمارات
خدمات التدقيق المالي
خدمات الرواتب وحماية الأجور WPS
المدير المالي الافتراضي (CFO)
مكافحة غسل الأموال (AML)"""

FORM_OPTIONS_EMIRATE = """دبي
أبوظبي
الشارقة
عجمان
رأس الخيمة
الفجيرة
أم القيوين
العين"""

def clean_arabic_text(text):
    if not isinstance(text, str):
        return text
    # Fix reversed question mark
    text = re.sub(r'^\?([^\?]+)', r'\1؟', text)
    text = text.replace('?', '؟')
    text = text.replace('؟?', '؟')
    return text

def process_element(el, faq_cache, post_slug):
    if isinstance(el, dict):
        widget_type = el.get('widgetType')
        settings = el.get('settings', {})
        
        # 1. ACCORDION / TOGGLE (FAQs)
        if widget_type in ['accordion', 'toggle']:
            tabs = settings.get('tabs', [])
            for tab in tabs:
                q = tab.get('tab_title', '').strip()
                if q in faq_cache:
                    tab['tab_title'] = clean_arabic_text(faq_cache[q]['q_ar'])
                    tab['tab_content'] = clean_arabic_text(faq_cache[q]['a_ar'])
                else:
                    tab['tab_title'] = clean_arabic_text(q)
                    tab['tab_content'] = clean_arabic_text(tab.get('tab_content', ''))

        # 2. FORM WIDGET
        elif widget_type == 'form':
            if 'form_name' in settings:
                settings['form_name'] = 'نموذج طلب الاستشارة المجانية'
            for field in settings.get('form_fields', []):
                label = field.get('field_label', '')
                placeholder = field.get('placeholder', '')
                
                if 'Name' in label or 'Name' in placeholder or 'الاسم' in placeholder:
                    field['field_label'] = 'الاسم الكامل'
                    field['placeholder'] = 'الاسم الكامل'
                elif 'Phone' in label or 'Phone' in placeholder:
                    field['field_label'] = 'رقم الهاتف / واتساب'
                    field['placeholder'] = 'رقم الهاتف / واتساب'
                elif 'Service' in label or 'Service' in placeholder:
                    field['field_label'] = 'نوع الخدمة المطلوبة'
                    field['placeholder'] = 'اختر نوع الخدمة'
                    field['select_options'] = FORM_OPTIONS_SERVICE
                elif 'Emirate' in label or 'Emirate' in placeholder:
                    field['field_label'] = 'الإمارة'
                    field['placeholder'] = 'اختر إمارتك'
                    field['select_options'] = FORM_OPTIONS_EMIRATE
            
            # Button
            if 'button_text' in settings:
                settings['button_text'] = 'طلب استشارة مجانية ←'
            # Messages
            settings['success_message'] = 'تم إرسال طلبك بنجاح! سيتواصل معك مستشارنا المالي خلال 10 دقائق.'
            settings['error_message'] = 'حدث خطأ أثناء الإرسال، يرجى المحاولة مرة أخرى أو مراسلتنا عبر واتساب.'
            settings['required_field_message'] = 'هذا الحقل مطلوب.'

        # 3. HEADING WIDGET
        elif widget_type == 'heading':
            title = settings.get('title', '')
            if 'Get a Free Consultation' in title:
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
            elif 'Calculation' in title and 'UAE' in title and 'نهاية الخدمة' in title:
                settings['title'] = 'احتساب مكافأة نهاية الخدمة ومستحقات الموظفين في الإمارات | <span style="color: #E8B84B">مكافأة نهاية الخدمة والتسوية النهائية</span>'
            else:
                settings['title'] = clean_arabic_text(title)

        # 4. TEXT EDITOR WIDGET
        elif widget_type == 'text-editor':
            ed = settings.get('editor', '')
            if 'Our expert will reply within 10 minutes' in ed:
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
            else:
                settings['editor'] = clean_arabic_text(ed)

        # 5. BUTTON WIDGET
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

        # 6. ICON LIST
        elif 'icon_list' in settings and isinstance(settings['icon_list'], list):
            for item in settings['icon_list']:
                it_text = item.get('text', '')
                item['text'] = clean_arabic_text(it_text)

        # Recurse
        for v in el.values():
            if isinstance(v, (dict, list)):
                process_element(v, faq_cache, post_slug)

    elif isinstance(el, list):
        for item in el:
            process_element(item, faq_cache, post_slug)

print("build_master_ar_pages module ready.")

