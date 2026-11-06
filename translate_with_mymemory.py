import json
import time
import re
from deep_translator import MyMemoryTranslator
from concurrent.futures import ThreadPoolExecutor, as_completed

CACHE_FILE = r"d:\Rboo\service_body_translations_cache.json"

with open(CACHE_FILE, "r", encoding="utf-8") as f:
    cache = json.load(f)

with open(r"d:\Rboo\untranslated_paragraphs.json", "r", encoding="utf-8") as f:
    paragraphs = json.load(f)

needed = [p for p in paragraphs if p not in cache]
print(f"Total needed: {len(needed)} | Already cached: {len(paragraphs) - len(needed)}")

translator = MyMemoryTranslator(source='english', target='arabic')

def translate_item(text):
    clean = text.strip()
    prefix = ""
    if clean.startswith(','):
        prefix = "، "
        clean = clean[1:].strip()
    
    for attempt in range(3):
        try:
            res = translator.translate(clean)
            if res:
                if res.endswith('?'):
                    res = res[:-1] + '؟'
                return text, prefix + res
        except Exception as e:
            time.sleep(1 + attempt)
    return text, text

completed = 0
with ThreadPoolExecutor(max_workers=5) as executor:
    futures = {executor.submit(translate_item, p): p for p in needed}
    for future in as_completed(futures):
        orig, trans = future.result()
        cache[orig] = trans
        completed += 1
        if completed % 25 == 0 or completed == len(needed):
            print(f"Progress: {completed}/{len(needed)} (Total cached: {len(cache)})")
            with open(CACHE_FILE, "w", encoding="utf-8") as f:
                json.dump(cache, f, indent=2, ensure_ascii=False)

with open(CACHE_FILE, "w", encoding="utf-8") as f:
    json.dump(cache, f, indent=2, ensure_ascii=False)

print(f"MyMemory translation completed! Total in cache: {len(cache)}")

