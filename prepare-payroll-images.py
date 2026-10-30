import os
from PIL import Image

source_dir = r"C:\Users\RANA\.gemini\antigravity\brain\2140e0cb-0927-4aba-b5b9-0b2fd2314b69"
dest_dir = r"d:\Rboo\wp-content\uploads\2026\09"

os.makedirs(dest_dir, exist_ok=True)

image_map = {
    "uae_payroll_wps_hero_2026_1793332157960.jpg": "uae-payroll-wps-compliance-guide-2026-mohre.jpg",
    "uae_wps_compliance_dashboard_2026_1793332182384.jpg": "uae-wps-compliance-dashboard-sif-workflow-2026.jpg",
}

sizes = [
    (1024, 576),
    (768, 432),
    (300, 169),
    (150, 150)
]

for src_name, dest_name in image_map.items():
    src_path = os.path.join(source_dir, src_name)
    dest_path = os.path.join(dest_dir, dest_name)
    
    if not os.path.exists(src_path):
        print(f"❌ Source file not found: {src_path}")
        continue
        
    img = Image.open(src_path)
    # Save main full-res image
    img.save(dest_path, "JPEG", quality=92)
    print(f"✅ Copied main: {dest_name} ({os.path.getsize(dest_path)} bytes)")
    
    base, ext = os.path.splitext(dest_name)
    for w, h in sizes:
        thumb_name = f"{base}-{w}x{h}{ext}"
        thumb_path = os.path.join(dest_dir, thumb_name)
        resized_img = img.resize((w, h), Image.Resampling.LANCZOS)
        resized_img.save(thumb_path, "JPEG", quality=88)
        print(f"  -> Generated thumb: {thumb_name} ({os.path.getsize(thumb_path)} bytes)")

print("\n🎉 All payroll & WPS images prepared successfully!")
