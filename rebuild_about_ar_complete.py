import json
import re

with open("d:/Rboo/about_us_175_raw.json", "r", encoding="utf-8") as f:
    data = json.load(f)

with open("d:/Rboo/service_body_translations_cache.json", "r", encoding="utf-8") as f:
    cache = json.load(f)

sorted_cache = sorted(cache.items(), key=lambda x: len(x[0]), reverse=True)

# Direct dictionary of exact About Us strings -> High-quality professional Arabic
about_map = {
    "🏢  About RBO Accounting": "🏢 نبذة عن شركة RBO للمحاسبة",
    "About RBO Accounting": "نبذة عن شركة RBO للمحاسبة",
    "UAE's Trusted\xa0<span style = \"color: #E8B84B\" #> \xa0FTA-Approved</span> </i> Accounting Firm — Serving All 7 Emirates ": "شركة محاسبة موثوقة ومعتمدة من <span style=\"color: #E8B84B\">الهيئة الاتحادية للضرائب (FTA)</span> في الإمارات — نخدم جميع الإمارات السبع",
    "RBO Accounting Services FZE is a premier accounting and tax firm based in the UAE. We deliver expert bookkeeping, VAT, Corporate Tax, audit, and payroll services with complete transparency, IFRS compliance, and a genuine commitment to your business growth.": "شركة آر بي أو لخدمات المحاسبة (RBO Accounting Services FZE) هي شركة رائدة في مجال المحاسبة والضرائب مقرها دولة الإمارات العربية المتحدة. نقدم خدمات احترافية في مسك الدفاتر، وضريبة القيمة المضافة، وضريبة الشركات، والتدقيق، وإدارة الرواتب بشفافية تامة وامتثال لمعايير IFRS والتزام حقيقي بنمو أعمالك.",
    "Our Mission &amp; Vision": "مهمتنا ورؤيتنا",
    "Our Mission & Vision": "مهمتنا ورؤيتنا",
    "Accounting Excellence for Every UAE Business — From Startup to Enterprise": "التميز المحاسبي لكل شركة في دولة الإمارات — من الشركات الناشئة إلى المؤسسات الكبرى",
    "Our mission is simple: to make world-class accounting, VAT, and Corporate Tax services accessible to every UAE business — with no hidden fees, no jargon, and no surprises. Just clear, compliant, and expert financial management.": "مهمتنا بسيطة: جعل خدمات المحاسبة وضريبة القيمة المضافة وضريبة الشركات ذات المستوى العالمي متاحة لكل شركة في الإمارات — بدون رسوم خفية، وبدون تعقيدات، وبدون مفاجآت. مجرد إدارة مالية واضحة ومتوافقة واحترافية.",
    
    # Icon boxes (title_text & description_text)
    "Accuracy First": "الدقة أولاً",
    "Every number we report is verified, reconciled, and IFRS-compliant. We do not cut corners — ever.": "يتم التحقق من كل رقم نبلغ عنه ومطابقته وبما يتوافق مع المعايير الدولية لإعداد التقارير المالية (IFRS). لا نتساهل في الجودة أبداً.",
    "100% Confidential": "سرية تامة 100%",
    "Your financial data is handled with military-grade confidentiality. We have never had a data breach.": "يتم التعامل مع بياناتك المالية بأقصى درجات السرية والأمان. سجلنا خالٍ تماماً من أي اختراق للبيانات.",
    "Proactive Advisory": "استشارات استباقية",
    "We don't just record — we advise. We alert you to VAT deadlines, tax savings, and compliance risks.": "نحن لا نسجل الحسابات فحسب — بل نقدم المشورة. ننبهك بمواعيد إقرارات ضريبة القيمة المضافة، وفرص التوفير الضريبي، ومخاطر الامتثال.",
    "Long-Term Partnership": "شراكة طويلة الأمد",
    "We measure success by how much your business grows — not just how many forms we file.": "نقيس نجاحنا بمدى نمو أعمالك — وليس فقط بعدد الإقرارات التي نقدمها.",
    "What We Stand For — The RBO Promise": "المبادئ التي نلتزم بها — وعد RBO",
    "Transparent, Fixed Pricing": "أسعار ثابتة وشفافة",
    "You agree your monthly fee upfront. No hourly billing, no unexpected invoices — ever.": "يتم الاتفاق على الرسوم الشهرية مسبقاً. لا فواتير بالساعة، ولا رسوم غير متوقعة — على الإطلاق.",
    "Dedicated Accountant for Every Client": "محاسب مخصص لكل عميل",
    "You get one assigned expert who knows your business inside out — not a call centre.": "تحصل على خبير محاسبي مخصص يعرف تفاصيل عملك بالكامل — وليس مركز اتصال عام.",
    "Zero FTA Penalty Guarantee": "ضمان عدم التعرض لغرامات الضرائب (FTA)",
    "We handle every VAT return and Corporate Tax filing on time. No missed deadlines, no FTA fines.": "نتولى تقديم كل إقرار لضريبة القيمة المضافة وضريبة الشركات في الوقت المحدد. لا مواعيد فائتة، ولا غرامات من الهيئة الاتحادية للضرائب.",
    "Real-Time Cloud Access": "وصول سحابي فوري",
    "Your P&L, cash flow, and balance sheet available 24/7 on Xero or Zoho Books — from any device.": "قائمة الأرباح والخسائر، والتدفقات النقدية، والميزانية العمومية متاحة على مدار الساعة عبر Xero أو Zoho Books — من أي جهاز.",
    "Your P&amp;L, cash flow, and balance sheet available 24/7 on Xero or Zoho Books — from any device.": "قائمة الأرباح والخسائر، والتدفقات النقدية، والميزانية العمومية متاحة على مدار الساعة عبر Xero أو Zoho Books — من أي جهاز.",
    "RBO Accounting Services FZE — proudly serving UAE businesses since <span style = \"color: #E8B84B\" #> 2020</span> </i>": "شركة آر بي أو لخدمات المحاسبة — نفخر بخدمة الشركات في دولة الإمارات منذ عام <span style=\"color: #E8B84B\">2020</span>",
    "RBO Accounting Services FZE — proudly serving UAE businesses since": "شركة آر بي أو لخدمات المحاسبة — نفخر بخدمة الشركات في دولة الإمارات منذ عام",
    
    # Why Choose RBO
    "Why Choose RBO": "لماذا تختار RBO",
    "What Makes RBO Different from Other Accounting Firms in UAE": "ما الذي يميز RBO عن شركات المحاسبة الأخرى في الإمارات؟",
    "There are hundreds of accounting firms in UAE. Here is why 200+ businesses chose RBO — and why they stay.": "هناك المئات من شركات المحاسبة في الإمارات. إليك السبب وراء اختيار أكثر من 200 شركة لـ RBO — ولماذا يستمرون معنا.",
    "FTA-Approved & Legally Authorized": "معتمدون من الهيئة الاتحادية للضرائب ومرخصون قانونياً",
    "Unlike many bookkeeping providers, RBO is a registered FTA tax agent — legally authorized to handle VAT, Corporate Tax, and represent you before the Federal Tax Authority. Not all accounting firms in UAE hold this critical license.": "على عكس العديد من مقدمي خدمات مسك الدفاتر، فإن RBO هي وكيل ضريبي مسجل ومعتمد من الهيئة الاتحادية للضرائب (FTA) — ومخولة قانونياً للتعامل مع ضريبة القيمة المضافة وضريبة الشركات وتمثيلك أمام الهيئة.",
    "Dedicated Accountant — Not a Call Centre": "محاسب مخصص — وليس مركز اتصال",
    "Every RBO client has one dedicated, named accountant who knows their business inside out. You can WhatsApp your accountant directly — not navigate through a ticketing system or speak to a different person every time.": "لكل عميل في RBO محاسب مخصص يعرف أدق تفاصيل عمله. يمكنك التواصل مع محاسبك مباشرة عبر واتساب — دون الحاجة للمرور بنظام تذاكر معقد أو التحدث مع شخص مختلف في كل مرة.",
    "Fixed Monthly Pricing — Zero Surprises": "أسعار شهرية ثابتة — بدون أي مفاجآت",
    "We quote your fixed monthly fee before we begin. No hourly billing, no surprise invoices, no upselling. You know exactly what you pay — from the first conversation to the last annual report.": "نحدد رسومك الشهرية الثابتة قبل البدء. لا حساب بالساعة، ولا فواتير مفاجئة. تعرف تماماً ما تدفعه منذ المحادثة الأولى وحتى التقرير السنوي.",
    "Real-Time Cloud Accounting Technology": "تقنيات المحاسبة السحابية الفورية",
    "We run your books on Xero or Zoho Books — giving you 24/7 access to your financial data. See your P&amp;L, cash position, and VAT liability in real time, from your phone. No waiting for month-end reports.": "ندير دفاترك المحاسبية عبر Xero أو Zoho Books — مما يمنحك وصولاً على مدار الساعة لبياناتك المالية. اطلع على الأرباح والخسائر والسيولة النقدية والتزامات الضريبة في الوقت الفعلي من هاتفك.",
    "UAE-Specific Expertise — All 7 Emirates": "خبرة متخصصة في قوانين الإمارات — نخدم الإمارات السبع",
    "We understand the nuances of doing business in every UAE emirate — from DMCC free zone audits in Dubai to RAK ICC requirements and Sharjah mainland regulations. UAE-specific knowledge that generic global firms simply don't have.": "نفهم التفاصيل الدقيقة لممارسة الأعمال في كل إمارة — من تدقيق المنطقة الحرة DMCC في دبي إلى متطلبات رأس الخيمة ولوائح البر الرئيسي في الشارقة.",
    "Multilingual Team — English, Arabic, Urdu": "فريق متعدد اللغات — العربية، الإنجليزية، والأوردو",
    "Our team communicates in English, Arabic, Urdu, and Hindi — reflecting the diverse fabric of UAE business. You explain your situation in your preferred language, and we handle it with complete clarity.": "يتحدث فريقنا اللغات العربية والإنجليزية والأوردو والهندية — مما يعكس التنوع في بيئة الأعمال بالإمارات. اشرح متطلباتك بلغتك المفضلة وسنتولى الأمر بوضوح تام.",
    
    # Founder
    "Our founder": "مؤسس الشركة",
    "At RBO Accounting, we believe every UAE business deserves financial clarity, not confusion. That's why my team and I focus on making audit, VAT, and corporate tax simple, accurate, and stress-free — so our clients can focus on what they do best: growing their business.": "في RBO للمحاسبة، نؤمن بأن كل شركة في الإمارات تستحق الوضوح المالي بعيداً عن التعقيد. لهذا نركز أنا وفريقي على جعل التدقيق وضريبة القيمة المضافة وضريبة الشركات إجراءات بسيطة ودقيقة وخالية من التوتر — ليتفرغ عملاؤنا لتنمية أعمالهم.",
    "Muhammad Usman Malik": "محمد عثمان مالك",
    "Founder and managing director": "المؤسس والمدير العام",
    
    # Why Choose Us
    "Why Choose Us": "لماذا تختارنا",
    "Why 200+ UAE Businesses Trust RBO Accounting Services": "لماذا تثق أكثر من 200 شركة إماراتية في خدمات RBO للمحاسبة؟",
    "We are not just accountants — we are financial partners. Every client relationship is built on trust, transparency, and a shared commitment to your business success.": "نحن لسنا مجرد محاسبين — بل شركاء ماليون. تُبنى علاقتنا مع كل عميل على الثقة والشفافية والالتزام المشترك بنجاح أعمالك.",
    "10-Minute Response Guarantee": "ضمان الرد خلال 10 دقائق",
    "During business hours, we respond to every client query within 10 minutes via WhatsApp or phone — because your business cannot wait.": "خلال ساعات العمل، نرد على كل استفسار من عملائنا في غضون 10 دقائق عبر واتساب أو الهاتف — لأن أعمالك لا تحتمل الانتظار.",
    "Never Miss a Deadline": "لا تفوّت أي موعد نهائي",
    "VAT returns, Corporate Tax filings, payroll — every deadline is tracked and met. No client has ever received an FTA penalty while managed by RBO.": "إقرارات ضريبة القيمة المضافة، وضريبة الشركات، والرواتب — نتتبع كل موعد نهائي ونلتزم به. لم يتعرض أي عميل لغرامة ضريبية أثناء إدارتنا لحساباته.",
    "Monthly Reports You Can Actually Understand": "تقارير شهرية واضحة وسهلة الفهم",
    "No 80-page reports full of jargon. We deliver clear, concise monthly management accounts with plain-English commentary and action points.": "لا تقارير معقدة مليئة بالمصطلحات الغامضة. نقدم حسابات إدارية شهرية واضحة وموجزة مع شرح مبسط وتوصيات عملية.",
    "Seamless Onboarding in 3-5 Days": "انتقال سلس وبدء العمل خلال 3-5 أيام",
    "We migrate your data, set up cloud accounting, and take over your books within 3-5 business days — with zero disruption to your operations.": "نقوم بنقل بياناتك، وإعداد نظام المحاسبة السحابية، واستلام دفاترك خلال 3 إلى 5 أيام عمل — دون أي تعطيل لعملياتك.",
    
    # Reviews & FAQs
    "Client Reviews": "آراء العملاء",
    "What UAE Businesses Say About Working with RBO": "ماذا تقول الشركات في الإمارات عن العمل مع RBO؟",
    "Common Questions": "الأسئلة الشائعة",
    "About RBO Accounting — Frequently Asked Questions": "نبذة عن RBO للمحاسبة — الأسئلة الشائعة",
    "Common questions UAE businesses ask before choosing RBO Accounting Services FZE.": "الأسئلة الشائعة التي تطرحها الشركات في الإمارات قبل اختيار شركة RBO لخدمات المحاسبة.",
    "Is RBO Accounting Services FZE FTA-approved?": "هل شركة RBO لخدمات المحاسبة معتمدة من الهيئة الاتحادية للضرائب (FTA)؟",
    "Yes. RBO Accounting Services FZE is a registered and FTA-approved tax agent in the UAE, authorized to handle VAT registration, VAT return filing, Corporate Tax registration and filing, and to represent clients before the Federal Tax Authority in all tax matters.": "نعم. شركة RBO لخدمات المحاسبة هي وكيل ضريبي مسجل ومعتمد لدى الهيئة الاتحادية للضرائب (FTA) في دولة الإمارات، ومخولة بالتسجيل وتقديم الإقرارات لضريبة القيمة المضافة وضريبة الشركات وتمثيل العملاء أمام الهيئة.",
    "Which UAE Emirates does RBO serve?": "ما هي إمارات الدولة التي تخدمها شركة RBO؟",
    "RBO Accounting Services FZE provides accounting, VAT, Corporate Tax, audit, and payroll services across all 7 UAE Emirates: Dubai, Abu Dhabi, Sharjah, Ajman, Ras Al Khaimah (RAK), Fujairah, and Umm Al Quwain — for both mainland and free zone companies.": "تقدم شركة RBO خدمات المحاسبة وضريبة القيمة المضافة وضريبة الشركات والتدقيق والرواتب في جميع إمارات الدولة السبع: دبي، أبوظبي، الشارقة، عجمان، رأس الخيمة، الفجيرة، وأم القيوين — لشركات البر الرئيسي والمناطق الحرة.",
    "What qualifications does the RBO team hold?": "ما هي المؤهلات والاعتمادات التي يحملها فريق RBO؟",
    "The RBO team includes ACCA-qualified accountants, FTA-registered tax agents, Xero certified professionals, and Zoho Books certified partners — with combined experience of 30+ years in UAE accounting, audit, VAT, and Corporate Tax.": "يضم فريق RBO محاسبين قانونيين معتمدين (ACCA)، ووكلاء ضرائب مسجلين لدى الهيئة الاتحادية للضرائب (FTA)، وخبراء معتمدين في أنظمة Xero و Zoho Books — بخبرة مجمعة تزيد عن 30 عاماً في الإمارات.",
    "How does RBO's pricing work?": "كيف يعمل نظام التسعير في RBO؟",
    "RBO charges a fixed monthly fee agreed upfront before we begin. There is no hourly billing and no surprise invoices. Monthly packages start from AED 499, with customised pricing based on your business size, transaction volume, and the services required. Contact us for a free custom quote.": "تعتمد RBO رسوماً شهرية ثابتة يتم الاتفاق عليها مسبقاً قبل البدء. لا توجد فواتير بالساعة أو رسوم مفاجئة. تبدأ الباقات الشهرية من 499 درهماً إماراتياً، مع تسعير مخصص حسب حجم أعمالك وعدد المعاملات. تواصل معنا للحصول على عرض سعر مجاني.",
    "How quickly can RBO start managing my accounting?": "ما مدى السرعة التي يمكن لشركة RBO البدء بها في إدارة حساباتي؟",
    "Once you approve our proposal, RBO can onboard your business and begin managing your accounting within 3-5 business days. We handle the full setup — Xero or Zoho Books configuration, data migration, and FTA registrations — with zero disruption to your operations.": "بمجرد الموافقة على عرضنا، يمكن لـ RBO استلام أعمالك والبدء في إدارة حساباتك خلال 3 إلى 5 أيام عمل. نتولى الإعداد الكامل لبرامج Xero أو Zoho Books ونقل البيانات والتسجيلات الضريبية دون أي تعطيل لأعمالك.",
    "Does RBO work with free zone companies in UAE?": "هل تتعامل RBO مع شركات المناطق الحرة في الإمارات؟",
    "Yes. RBO serves both mainland and free zone companies across all UAE free zones including DMCC, JAFZA, DAFZA, RAKICC, RAKEZ, SHAMS, SRTIP, and others. We handle IFRS-compliant financial statements, free zone audits, VAT, and Corporate Tax for free zone entities.": "نعم. تخدم RBO شركات البر الرئيسي والمناطق الحرة في كافة المناطق الحرة بالإمارات بما في ذلك DMCC و JAFZA و DAFZA و RAKEZ و SHAMS و AFZA وغيرها. نعد القوائم المالية المتوافقة مع IFRS وتدقيق المناطق الحرة والضرائب.",
    
    # Bottom CTA
    "Ready to Work with RBO?": "هل أنت مستعد للعمل مع RBO؟",
    "Get a free consultation today — no commitment, no hidden charges. One of our UAE accounting experts will contact you within 10 minutes.": "احصل على استشارة مجانية اليوم — بدون التزام وبدون رسوم خفية. سيتواصل معك أحد خبراء المحاسبة لدينا خلال 10 دقائق.",
    "Free 30-minute consultation": "استشارة مجانية لمدة 30 دقيقة",
    "Custom quote within 24 hours": "عرض سعر مخصص خلال 24 ساعة",
    "Onboarding in 3-5 business days": "بدء الخدمة خلال 3-5 أيام عمل",
    "Dedicated accountant assigned": "تعيين محاسب مخصص لشركتك",
    "English, Arabic, Urdu support": "دعم باللغات العربية والإنجليزية والأوردو",
    "Book Free Consultation →": "احجز استشارة مجانية ←",
    "Ready to Partner with UAE's Trusted Accounting Firm?": "هل أنت مستعد للشراكة مع شركة المحاسبة الموثوقة في الإمارات؟",
    "Join 200+ UAE businesses who trust RBO Accounting for their bookkeeping, VAT, Corporate Tax, and financial reporting. Your first consultation is always free.": "انضم إلى أكثر من 200 شركة في الإمارات تثق في RBO للمحاسبة لإدارة دفاترها وضريبة القيمة المضافة وضريبة الشركات والتقارير المالية. استشارتك الأولى مجانية دائماً.",
    "Get Free Consultation →": "احصل على استشارة مجانية ←",
    "WhatsApp Us Now ": "تواصل معنا عبر واتساب الآن",
    "WhatsApp Us Now": "تواصل معنا عبر واتساب الآن",
}

def translate_val(val):
    if not isinstance(val, str) or not val.strip():
        return val
    
    val_stripped = val.strip()
    if val_stripped in about_map:
        return about_map[val_stripped]
    if val in about_map:
        return about_map[val]
    
    res = val
    # Apply about_map substrings (longest first)
    for en, ar in sorted(about_map.items(), key=lambda x: len(x[0]), reverse=True):
        if len(en) > 3 and en in res:
            res = res.replace(en, ar)
            
    # Apply general cache if still has English
    if re.search(r'[a-zA-Z]{4,}', res):
        for en, ar in sorted_cache:
            if len(en) > 4 and ar and en != ar and en in res:
                res = res.replace(en, ar)
                
    # Clean up bad machine translation terms if any crept in
    res = res.replace('اتفاقية التجارة الحرة', 'الهيئة الاتحادية للضرائب (FTA)')
    res = res.replace('https://www.rboaccounting.ae/contact-us/', 'https://www.rboaccounting.ae/ar/refund/')
    res = res.replace('https://www.rboaccounting.ae/our-services/', 'https://www.rboaccounting.ae/ar/our-services-2/')
    res = res.replace('/our-services/', '/ar/our-services-2/')
    return res

TEXT_KEYS = {
    'title', 'title_text', 'description', 'description_text',
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

translated = walk_and_translate(data)
out_str = json.dumps(translated, ensure_ascii=False)

with open("d:/Rboo/about_us_ar_translated.json", "w", encoding="utf-8") as f:
    f.write(out_str)

print("Saved complete Arabic About Us JSON!")

