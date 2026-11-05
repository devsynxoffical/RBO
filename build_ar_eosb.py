import json
import re

with open('eosb-5689-raw.json', 'r', encoding='utf-8') as f:
    data = json.load(f)

# Master translation map for EOSB page
eosb_trans = {
    # Hero Title & Headings
    "Does RBO Accounting Services FZE provides end of service benefits calculation UAE": "هل تقدم شركة RBO للمحاسبة خدمات احتساب مكافأة نهاية الخدمة في الإمارات؟",
    "Does RBO Accounting Services FZE provides end of service benefits calculation UAE?": "هل تقدم شركة RBO للمحاسبة خدمات احتساب مكافأة نهاية الخدمة في الإمارات؟",
    "مكافأة نهاية الخدمة للموظفين Calculation Services in the UAE": "خدمات احتساب مكافأة نهاية الخدمة للموظفين في الإمارات",
    "Why Gratuity Calculations Go Wrong So Often": "لماذا تتكرر الأخطاء في احتساب مكافأة نهاية الخدمة؟",
    "What Are مكافأة نهاية الخدمة للموظفين?": "ما هي مكافأة نهاية الخدمة للموظفين وفق قانون العمل الإماراتي؟",
    "Definition and Purpose": "المفهوم والأهمية القانونية لمكافأة نهاية الخدمة",
    "Who Needs مكافأة نهاية الخدمة للموظفين Calculation in the UAE?": "من يحتاج إلى خدمات احتساب مكافأة نهاية الخدمة في الإمارات؟",
    "Employers With Departing Employees": "أصحاب العمل عند استقالة أو مغادرة الموظفين",
    "HR Teams Managing Ongoing Provisioning": "أقسام الموارد البشرية لإدارة المخصصات الدورية",
    "Businesses Preparing Financial Statements": "الشركات التي تعد قوائم مالية مدققة",
    "Companies With Employees Across Multiple Contract Typess": "الشركات التي لديها أنواع عقود عمل متعددة",
    "Employees Seeking Clarity on Their Entitlement": "الموظفون الراغبون في التأكد من مستحقاتهم القانونية",
    "Who Needs ضريبة الشركات Return Filing in the UAE?": "من يحتاج إلى خدمات الامتثال المالي والعمالي في الإمارات؟",
    "What's Included": "ما تشمله خدماتنا",
    "Our مكافأة نهاية الخدمة للموظفين Calculation Services": "خدماتنا المتخصصة في احتساب وإدارة مكافأة نهاية الخدمة",
    "Individual Gratuity Calculation": "احتساب مكافأة نهاية الخدمة الفردية بدقة",
    "Final Settlement Preparation": "إعداد ملفات التسوية النهائية الشاملة",
    "Ongoing EOSB Provisioning": "إدارة مخصصات نهاية الخدمة الدورية للشركات",
    "Dispute Support Documentation": "توثيق المستندات وحماية المنشأة من النزاعات العمالية",
    "EOSB Liability Reporting": "تقارير الالتزامات المالية المتراكمة للموظفين",
    "Payroll Integration for Accurate Calculations": "الربط مع نظام الرواتب ونظام حماية الأجور WPS",
    "Contract Type Review": "مراجعة عقود العمل والامتثال للوائح الوزارة",
    "Why EOSB Provisioning Matters Throughout the Year": "أهمية احتساب مخصصات نهاية الخدمة على مدار العام",
    "How Gratuity Calculation Generally Works Under UAE Labour Law": "كيفية احتساب مكافأة نهاية الخدمة وفق قانون العمل الإماراتي",
    "What's Included in a Full Final Settlement": "ما تتضمنه التسوية النهائية الشاملة للموظف",
    "Gratuity Payment": "مبلغ مكافأة نهاية الخدمة المستحق",
    "Outstanding Salary": "الراتب المتبقي عن أيام العمل الأخيرة",
    "Accrued Leave Payout": "بدل الإجازات السنوية المستحقة غير المستعملة",
    "Other Contractual Entitlements": "المستحقات والبدلات التعاقدية الأخرى",
    "Deductions Where Applicable": "الخصومات والسلفيات المستحقة نظاماً",
    "Common Mistakes in مكافأة نهاية الخدمة للموظفين Calculation": "أخطاء شائعة في احتساب مكافأة نهاية الخدمة يجب تجنبها",
    "How EOSB Calculation Connects to Your Broader Financial Operations": "كيف ترتبط مكافأة نهاية الخدمة بإدارتك المالية العامة",
    "Why Choose Our مكافأة نهاية الخدمة للموظفين Calculation Services?": "لماذا تختار RBO لاحتساب وإدارة مكافأة نهاية الخدمة؟",
    "Industries We Serve": "القطاعات والأنشطة التي نخدمها",
    "Service Areas": "مناطق خدمتنا في كافة إمارات الدولة",
    "What Our Clients Say About RBO Accounting": "ماذا يقول عملاؤنا عن خدمات RBO للمحاسبة",
    "Frequently Asked Questions": "الأسئلة الأكثر شيوعاً حول مكافأة نهاية الخدمة",
    
    # Common Hero & Form
    "Get a Free Consultation": "احصل على استشارة مجانية",
    "Our expert will reply within 10 minutes": "سيقوم خبراؤنا المعتمدون بالرد عليك خلال 10 دقائق",
    "Your Full Name": "الاسم الكامل",
    "Your الاسم الكامل": "الاسم الكامل",
    "Phone / WhatsApp": "رقم الهاتف / واتساب",
    "Select Service": "اختر الخدمة",
    "Your Emirate": "الإمارة",
    "Request Free Consultation": "إرسال طلب الاستشارة ←",
    "Request Free Consultation →": "إرسال طلب الاستشارة ←",
    "Call Now": "اتصل بنا الآن",
    "WhatsApp Us": "تواصل عبر واتساب",

    # Industries
    "Trading companies": "شركات التجارة والاستيراد والتصدير",
    "Retail and E-Commerce": "التجارة الإلكترونية ومتاجر التجزئة",
    "Professional services": "الشركات المهنية والاستشارية",
    "Technology companies": "شركات التكنولوجيا والبرمجيات",
    "Logistics and Transportation": "شركات النقل والخدمات اللوجستية",
    "Real estate": "شركات التطوير العقاري والمقاولات",
    
    # FAQs
    "What are end of service benefits and who is entitled to them?": "ما هي مكافأة نهاية الخدمة ومن يستحقها قانوناً في الإمارات؟",
    "Is gratuity calculated on basic salary or gross salary?": "هل تُحتسب مكافأة نهاية الخدمة على الراتب الأساسي أم الراتب الإجمالي؟",
    "Does the calculation differ based on how the employment ended?": "هل يختلف الاحتساب بحسب طريقة انتهاء علاقة العمل (استقالة أم إنهاء خدمة)؟",
    "How often should we provision for EOSB liability?": "كم مرة يجب على الشركة احتساب مخصصات نهاية الخدمة (EOSB)؟",
    "What's included in a full final settlement besides gratuity?": "ما الذي تتضمنه التسوية النهائية الشاملة بالإضافة إلى مكافأة نهاية الخدمة؟",
    "Can gratuity calculations be disputed by employees?": "هل يمكن للموظف الاعتراض قانوناً على احتساب مكافأة نهاية الخدمة؟",
    "Do free zone employees follow the same gratuity rules as mainland employees?": "هل تنطبق نفس قواعد مكافأة نهاية الخدمة على موظفي المناطق الحرة كما في البر الرئيسي؟",
    "How does EOSB provisioning affect our financial statements?": "كيف تؤثر مخصصات مكافأة نهاية الخدمة على القوائم المالية المدققة للشركة؟",
    "Can you calculate gratuity for our entire workforce at once?": "هل يمكنكم مراجعة واحتساب مكافأة نهاية الخدمة لكافة موظفي شركتنا دفعة واحدة؟",
    "Do you help with the calculation only, or the full settlement process?": "هل تساعدون في احتساب المبالغ فقط أم في كامل إجراءات التسوية وإلغاء الإقامة؟"
}

# Substring paragraph replacements for EOSB
eosb_paras = [
    ("reply within 10 minutes",
     "<p>سيقوم خبراؤنا المعتمدون بالرد عليك خلال 10 دقائق</p>"),

    ("What's Included",
     "<p>ما تشمله خدماتنا</p>"),

    ("Client Reviews",
     "<p class=\"section-eyebrow\">آراء العملاء</p>"),

    ("COMMON QUESTIONS",
     "<p>الأسئلة الشائعة</p>"),

    ("Calculation Services in the UAE",
     "<p><b>خدمات احتساب مكافأة نهاية الخدمة للموظفين في الإمارات</b></p>"),

    ("What Are مكافأة نهاية الخدمة",
     "<p><b>ما هي مكافأة نهاية الخدمة ومستحقات الموظف في الإمارات؟</b></p>"),

    ("An incorrect end of service benefits calculation UAE",
     "<p>يعد الخطأ في احتساب مكافأة نهاية الخدمة من أكثر أسباب النزاعات العمالية شيوعاً بين أصحاب العمل والموظفين في الإمارات. تقدم شركة RBO حلول احتساب قانونية دقيقة لمكافأة نهاية الخدمة ومخصصات نهاية الخدمة (EOSB) وإعداد ملفات التسوية النهائية الشاملة المتوافقة 100% مع قانون العمل الإماراتي ولوائح وزارة الموارد البشرية والتوطين (MOHRE).</p>"),
    
    ("Your information is 100% secure",
     "<p style=\"margin: 0; color: #64748B; font-size: 13px; font-weight: 500;\">🔒 معلوماتك آمنة وسرية بنسبة 100%</p>"),

    ("RBO Accounting Services FZE provides end of service benefits",
     "<p>تقدم شركة RBO Accounting Services FZE خدمات احتساب مكافأة نهاية الخدمة ومستحقات الموظفين بدقة تامة وفق قانون تنظيم علاقات العمل الاتحادي، مع إعداد ملفات التسوية النهائية الشاملة وحماية شركتك من أي غرامات أو نزاعات عمالية.</p>"),

    ("Most errors in end of service benefits calculation UAE don't",
     "<p>لا تنتج معظم أخطاء احتساب مكافأة نهاية الخدمة عن سوء نية، بل عن التعقيدات القانونية: التمييز بين الراتب الأساسي والبدلات، واحتساب أيام الإجازات المستحقة، وتطبيق قواعد الاستقالة مقابل إنهاء الخدمة وفق المرسوم بقانون اتحادي رقم 33 لسنة 2021.</p>"),

    ("End of service benefits, commonly called gratuity",
     "<p>مكافأة نهاية الخدمة هي التزام مالي قانوني يفرضه قانون العمل الإماراتي لصالح الموظف عند انتهاء خدمته، بهدف توفير دعم مالي تقديراً لسنوات عمله في المنشأة. وتعد التزاماً مالياً مستحقاً على صاحب العمل يجب تسويته بالكامل عند انتهاء الخدمة.</p>"),

    ("Any employer with an employee resigning, being terminated",
     "<p>أي صاحب عمل لديه موظف يغادر المنشأة بالاستقالة أو إنهاء الخدمة يحتاج إلى احتساب قانوني دقيق وموثق لمكافأة نهاية الخدمة لتسوية ملفه وتفادي أي شكاوى لدى وزارة الموارد البشرية.</p>"),

    ("Businesses with growing headcounts need someone",
     "<p>تحتاج الشركات سريعة النمو إلى متابعة مستمرة لمخصصات نهاية الخدمة المتراكمة شهرياً لتفادي أي ضغوط غير متوقعة على السيولة النقدية.</p>"),

    ("Since EOSB provision affects reported liabilities",
     "<p>بما أن مخصصات مكافأة نهاية الخدمة تؤثر على الالتزامات طويلة الأجل في الميزانية العمومية، فإن احتسابها السليم ضروري لاعتماد القوائم المالية من قبل مدققي الحسابات والبنوك.</p>"),

    ("Businesses employing a mix of limited and unlimited",
     "<p>الشركات التي تملك موظفين بعقود متنوعة وتواريخ تعيين مختلفة تحتاج إلى تدقيق دقيق لحساب المستحقات وفق أحدث القرارات الوزارية.</p>"),

    ("While our primary work is with employers",
     "<p>نوفر مراجعات حسابية مستقلة ومعتمدة تمنح الطرفين وضوحاً كاملاً وثقة تامة في صحة المبالغ المستحقة بموجب القانون.</p>"),

    ("البر الرئيسي businesses",
     "<p><b>شركات البر الرئيسي والمناطق الحرة:</b> تلتزم كافة المنشآت بتسوية مستحقات موظفيها ومكافأة نهاية الخدمة وفق لوائح الوزارة ونظام حماية الأجور WPS.</p>"),

    ("We calculate gratuity for departing employees",
     "<p>نقوم باحتساب مكافأة نهاية الخدمة لكل موظف مغادر بناءً على مدة خدمته الدقيقة وراتبه الأساسي الأخير وطريقة انتهاء عقده بدقة تامة.</p>"),

    ("We prepare the complete final settlement",
     "<p>نعد ملف التسوية النهائية الشامل المتضمن الراتب المتبقي وبدل الإجازات غير المستعملة والمكافأة وأي خصومات نظامية مع نموذج إبراء ذمة رسمي.</p>"),

    ("Rather than treating gratuity as a surprise expense",
     "<p>بدلاً من التعامل مع مكافأة نهاية الخدمة كنفقة مفاجئة، نساعدك في احتساب المخصصات الدورية في دفاتر شركتك بشكل شهري ومنتظم.</p>"),

    ("Where a gratuity calculation is questioned",
     "<p>في حال وجود أي استفسار أو اعتراض، نقدم ملفاً توثيقياً شاملاً يوضح المواد القانونية والعمليات الحسابية المعتمدة لدعم موقف شركتك.</p>"),

    ("We provide clear reporting on your total accrued",
     "<p>نقدم تقارير مالية دورية توضح إجمالي التزامات نهاية الخدمة المتراكمة لكافة موظفي شركتك لتسهيل التخطيط المالي وإدارة السيولة.</p>"),

    ("Because gratuity depends on accurate basic salary",
     "<p>لأن احتساب المكافأة يعتمد على الراتب الأساسي وسجلات الرواتب السابقة، نربط حساباتنا بمسيرات الرواتب الشهرية المسجلة عبر نظام WPS لضمان التطابق التام.</p>"),

    ("We review whether an employee's specific contract",
     "<p>ندقق عقود العمل المسجلة لدى الوزارة للتأكد من بنود فترة الإنذار والبدلات وتاريخ بدء ونهاية العقد لضمان سلامة الاحتساب قانونياً.</p>"),

    ("The Problem With Reactive Calculation",
     "<p><b>مخاطر الاحتساب العشوائي عند مغادرة الموظف:</b> يؤدي تجاهل تكوين المخصصات المالية الدورية إلى عجز مفاجئ في السيولة النقدية عند مغادرة كبار الموظفين، في حين يضمن التخطيط المالي الدوري الاستقرار المالي التام لشركتك.</p>"),

    ("Gratuity calculation in the UAE follows specific statutory formulas",
     "<p>يستند احتساب مكافأة نهاية الخدمة في الإمارات إلى قواعد قانونية محددة: 21 يوماً من الراتب الأساسي عن كل سنة من السنوات الخمس الأولى، و30 يوماً عن كل سنة تالية، على ألا يتجاوز إجمالي المكافأة أجر سنتين.</p>"),

    ("The calculated end of service benefit based on basic salary",
     "<p>مبلغ مكافأة نهاية الخدمة المحتسب بدقة وفق مدة الخدمة والراتب الأساسي الأخير ونصوص قانون العمل.</p>"),

    ("Any unpaid salary for days worked in the final",
     "<p>الراتب المستحق عن أيام العمل الفعلية في الشهر الأخير حتى تاريخ انتهاء الخدمة.</p>"),

    ("Payment for unused annual leave accrued but not taken",
     "<p>بدل نقدي عن رصيد الإجازات السنوية المستحقة والمتبقية للموظف حتى تاريخ مغادرته.</p>"),

    ("Any additional amounts specified in the employment contract",
     "<p>أي مبالغ أو بدلات أو مكافآت أداء منصوص عليها تعاقدياً وتستحق عند انتهاء الخدمة.</p>"),

    ("Any legitimate deductions, such as outstanding loans or",
     "<p>خصم أي سلفيات أو قروض شخصية أو عهد مالية مستحقة للشركة ومثبتة نظامياً.</p>"),

    ("We regularly see employers making calculations using gross salary",
     "<p>من الأخطاء الشائعة: استخدام الراتب الإجمالي بدلاً من الأساسي، أو احتساب غير دقيق لكسور السنة، أو إغفال تسوية رصيد الإجازات السنوية، وهو ما نتولى تدقيقه وتصحيحه بالكامل.</p>"),

    ("Accurate gratuity calculations prevent disputes",
     "<p>الاحتساب الدقيق لمستحقات نهاية الخدمة يمنع النزاعات العمالية، ويحمي سمعة المنشأة، ويضمن الامتثال الكامل لقوانين العمل ولوائح الوزارة.</p>"),

    ("Trusted by businesses across all UAE Emirates",
     "<p>نحظى بثقة الشركات في كافة إمارات الدولة الـ 7. إليك ما يشاركه عملاؤنا حول تجربة العمل معنا.</p>"),

    ("Different industries have different employment models",
     "<p>تختلف هياكل التوظيف ونماذج الرواتب باختلاف الأنشطة والقطاعات، ونحن نقدم حلول تسوية متخصصة ومصممة لطبيعة أعمالك.</p>"),

    ("We provide end of service benefits calculation across all 7 Emirates",
     "<p>نقدم خدمات احتساب وإدارة مكافأة نهاية الخدمة ومستحقات الموظفين للشركات في كافة إمارات الدولة الـ 7 والمناطق الحرة.</p>"),

    # FAQ Answers
    ("They're a lump-sum gratuity payment UAE labour law generally requires",
     "<p>مكافأة نهاية الخدمة هي مبلغ مالي مقطوع يفرضه قانون العمل الاتحادي في دولة الإمارات للموظفين الذين أمضوا سنة واحدة على الأقل من الخدمة المستمرة لدى صاحب العمل، وتُحتسب بناءً على الراتب الأساسي الأخير ومدة الخدمة.</p>"),

    ("Generally on basic salary, excluding allowances",
     "<p>تُحتسب مكافأة نهاية الخدمة قانوناً على الراتب الأساسي الأخير فقط، مع استبعاد كافة البدلات (مثل بدل السكن، والنقل، والعلاوات الإضافية)، ما لم ينص عقد العمل على خلاف ذلك.</p>"),

    ("whether an employee resigned, was terminated",
     "<p>وفقاً للمرسوم بقانون اتحادي رقم 33 لسنة 2021 (قانون العمل الجديد)، أصبحت كافة العقود محددة المدة، ويستحق الموظف مكافأة نهاية الخدمة كاملة عند إتمام سنة أو أكثر سواء انتهى العقد بالاستقالة أو بإنهاء الخدمة من قبل صاحب العمل.</p>"),

    ("Ideally monthly or quarterly, so the liability",
     "<p>يُفضل محاسبياً احتساب المخصصات بشكل شهري أو ربع سنوي وتضمينها في ميزانية الشركة وقوائمها المالية، لضمان توافر السيولة الكافية وعدم مواجهة التزامات مفاجئة عند مغادرة أي موظف.</p>"),

    ("Typically outstanding salary, accrued leave",
     "<p>تشمل التسوية النهائية الشاملة: (1) مكافأة نهاية الخدمة المستحقة، (2) الراتب المتبقي عن أيام العمل الأخيرة، (3) بدل الإجازات السنوية المستحقة غير المستعملة، (4) تذكرة السفر وبدل فترة الإنذار إن انطبقت، بعد خصم أي سلفيات أو ذمم مستحقة.</p>"),

    ("Yes, which is why accurate, well-documented",
     "<p>نعم، وفي حال وجود أي خطأ في حساب مدة الخدمة أو الراتب الأساسي، يمكن للموظف فتح شكوى عمالية لدى وزارة الموارد البشرية (MOHRE). لذلك يضمن لك خبراؤنا إعداد ورقة تسوية قانونية دقيقة وموقعة تحميك من النزاعات.</p>"),

    ("Core gratuity principles are broadly similar",
     "<p>المبادئ الأساسية لمكافأة نهاية الخدمة وفق قانون العمل الاتحادي مطبقة في أغلب المناطق الحرة، مع وجود بعض الأنظمة التكميلية الاختيارية في مناطق معينة (مثل صندوق ادخار موظفي مركز دبي المالي العالمي DEWS).</p>"),

    ("Properly provisioned gratuity liability should",
     "<p>تُدرج مخصصات مكافأة نهاية الخدمة كالتزام طويل الأجل ضمن الخصوم في الميزانية العمومية وفق معايير المحاسبة الدولية (IAS 19 / IFRS)، ويطلب مدققو الحسابات مطابقتها واعتمادها سنوياً.</p>"),

    ("Yes, we can review and calculate EOSB liability",
     "<p>نعم، نقوم بإجراء تدقيق شامل لسجلات كافة موظفي الشركة، ومراجعة عقود العمل المسجلة لدى الوزارة، واحتساب إجمالي المخصصات المتراكمة وإعداد جداول شهرية منتظمة.</p>"),

    ("We handle both — individual gratuity calculation",
     "<p>نتولى العملية بالكامل: من التدقيق الحسابي للرواتب والإجازات وإعداد نموذج التسوية النهائية الرسمي، وحتى تقديم المشورة لامتثال ملف المنشأة لدى وزارة الموارد البشرية ونظام حماية الأجور WPS.</p>")
]

def translate_eosb_node(obj):
    if isinstance(obj, dict):
        # 1. H1 Hero Title special replace
        if 'title' in obj and isinstance(obj['title'], str):
            t = obj['title']
            if 'Calculation UAE' in t or 'Gratuity' in t:
                obj['title'] = 'احتساب مكافأة نهاية الخدمة ومستحقات الموظفين في الإمارات | <span style="color: #E8B84B">مكافأة نهاية الخدمة والتسوية النهائية</span>'

        # 2. Exact match
        for k in ['title', 'title_text', 'tab_title', 'text', 'button_text', 'placeholder']:
            if k in obj and isinstance(obj[k], str):
                v_clean = obj[k].strip()
                if v_clean in eosb_trans:
                    obj[k] = eosb_trans[v_clean]

        # 3. Form field labels and options
        if 'field_label' in obj and isinstance(obj['field_label'], str):
            fl = obj['field_label'].strip()
            if 'Name' in fl: obj['field_label'] = 'الاسم الكامل'
            elif 'Email' in fl: obj['field_label'] = 'البريد الإلكتروني للعمل'
            elif 'Phone' in fl: obj['field_label'] = 'رقم الهاتف / واتساب'
            elif 'Service' in fl: obj['field_label'] = 'الخدمة المطلوبة'
            elif 'Emirate' in fl: obj['field_label'] = 'الإمارة'

        if 'field_options' in obj and isinstance(obj['field_options'], str):
            if 'Bookkeeping' in obj['field_options']:
                obj['field_options'] = "---اختر الخدمة--- مسك الدفاتر والمحاسبة تسجيل / إقرارات ضريبة القيمة المضافة ضريبة الشركات في الإمارات تدقيق الحسابات إدارة الرواتب WPS المدير المالي الافتراضي تأسيس الشركات في الإمارات"
            elif 'Dubai' in obj['field_options']:
                obj['field_options'] = "---اختر الإمارة--- دبي أبوظبي الشارقة عجمان رأس الخيمة الفجيرة أم القيوين"

        # 4. Long text / editor / description_text / tab_content
        for k in ['editor', 'description_text', 'tab_content']:
            if k in obj and isinstance(obj[k], str):
                v = obj[k]
                v_clean = v.strip()
                if v_clean in eosb_trans:
                    obj[k] = eosb_trans[v_clean]
                else:
                    for en_frag, ar_text in eosb_paras:
                        if en_frag in v:
                            obj[k] = ar_text
                            break

        for k, v in obj.items():
            if isinstance(v, (dict, list)):
                translate_eosb_node(v)

    elif isinstance(obj, list):
        for item in obj:
            translate_eosb_node(item)

translate_eosb_node(data)

with open('eosb-5689-translated.json', 'w', encoding='utf-8') as f:
    json.dump(data, f, ensure_ascii=False)

print("Created 100% Arabic eosb-5689-translated.json successfully!")
