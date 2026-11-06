import json
import re

with open("all_ar_posts_translated.json", "r", encoding="utf-8") as f:
    posts = json.load(f)

with open("service_body_translations_cache.json", "r", encoding="utf-8") as f:
    cache = json.load(f)

# Sort cache keys by length descending
sorted_cache = sorted(cache.items(), key=lambda x: len(x[0]), reverse=True)

def translate_val(val):
    if not isinstance(val, str) or not val.strip():
        return val
    
    # If no English letters, return as is
    if not re.search(r'[a-zA-Z]{3,}', val):
        return val
    
    # If direct cache hit
    if val in cache:
        return cache[val]
    
    res = val
    for en, ar in sorted_cache:
        if len(en) < 3 or not ar or en == ar:
            continue
        if en in res:
            res = res.replace(en, ar)
            
    # Also fix standard CTA and navigation terms
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
    
    # Fix punctuation
    if res.endswith('?'):
        res = res[:-1] + '؟'
    res = res.replace(' ?', '؟')
    
    return res

def walk_and_translate(node):
    if isinstance(node, dict):
        new_dict = {}
        for k, v in node.items():
            if k in ['title', 'description', 'text', 'editor', 'heading_title', 'html', 'caption', 'sub_title', 'cta_title', 'tab_title', 'tab_content']:
                new_dict[k] = translate_val(v)
            elif isinstance(v, (dict, list)):
                new_dict[k] = walk_and_translate(v)
            else:
                new_dict[k] = v
        return new_dict
    elif isinstance(node, list):
        return [walk_and_translate(item) for item in node]
    return node

print("Applying full body Arabic translation across all 44 posts...")

updated_posts = {}
total_posts = len(posts)
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

print(f"Saved all_ar_posts_translated_full.json successfully! ({len(updated_posts)} posts)")

