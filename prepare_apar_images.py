import os
from PIL import Image

src_hero = r"C:\Users\RANA\.gemini\antigravity\brain\2140e0cb-0927-4aba-b5b9-0b2fd2314b69\uae_apar_hero_dubai_office_1793597006414.jpg"
src_wf   = r"C:\Users\RANA\.gemini\antigravity\brain\2140e0cb-0927-4aba-b5b9-0b2fd2314b69\uae_apar_workflow_infographic_1793597024745.jpg"

dest_dir = r"d:\Rboo\wp-content\uploads\2026\09"
os.makedirs(dest_dir, exist_ok=True)

targets = [
    (src_hero, "uae-apar-outsourcing-hero-2026"),
    (src_wf, "uae-procure-to-pay-3way-matching-workflow-2026")
]

sizes = [
    (1200, 675, ""),
    (1024, 576, "-1024x576"),
    (768, 432, "-768x432"),
    (300, 169, "-300x169"),
    (150, 150, "-150x150")
]

generated_files = []

for src, base_name in targets:
    img = Image.open(src)
    if img.mode != "RGB":
        img = img.convert("RGB")
    
    for w, h, suffix in sizes:
        resized = img.resize((w, h), Image.Resampling.LANCZOS)
        
        # Save JPG
        jpg_name = f"{base_name}{suffix}.jpg"
        jpg_path = os.path.join(dest_dir, jpg_name)
        resized.save(jpg_path, "JPEG", quality=88, optimize=True)
        generated_files.append(jpg_path)
        
        # Save WebP
        webp_name = f"{base_name}{suffix}.webp"
        webp_path = os.path.join(dest_dir, webp_name)
        resized.save(webp_path, "WEBP", quality=85)
        generated_files.append(webp_path)

print(f"Generated {len(generated_files)} optimized images in {dest_dir}:")
for f in generated_files[:6]:
    print(" ", os.path.basename(f), f"({os.path.getsize(f):,} bytes)")
