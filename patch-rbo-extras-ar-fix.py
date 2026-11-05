import re

target_files = [
    r"d:\Rboo\wp-content\mu-plugins\rbo-seo-extras.php",
    r"d:\Rboo\wp-content\rbo-seo-extras.php",
    r"d:\Rboo\wp-content\wp-content\mu-plugins\rbo-seo-extras.php",
]

for fpath in target_files:
    with open(fpath, "r", encoding="utf-8") as f:
        content = f.read()

    # 1. Update all_service_ids to include 5604 and 5615
    content = content.replace(
        "4424 );",
        "4424, 5604, 5615 );"
    )

    # 2. Add page-id-5604 and page-id-5615 to CSS selectors where 2488 appears
    content = content.replace(
        'body[class*="page-id-2488"] .site-main > .page-content > .elementor > .e-parent:first-of-type,',
        'body[class*="page-id-2488"] .site-main > .page-content > .elementor > .e-parent:first-of-type,\n  body[class*="page-id-5604"] .site-main > .page-content > .elementor > .e-parent:first-of-type,\n  body[class*="page-id-5615"] .site-main > .page-content > .elementor > .e-parent:first-of-type,'
    )

    # 3. Replace Section 10 with enhanced RTL, Navbar Cleanliness, and Reliable Switcher
    old_section_10_pattern = re.compile(
        r"/\*\*\s*\* 10\. RBO Multilingual Language Switcher[\s\S]*?}, 9999 \);",
        re.MULTILINE
    )

    new_section_10 = """/**
 * 10. RBO Multilingual Language Switcher (EN | العربية) & Arabic RTL Engine
 * Enables seamless one-tap switching between English & Arabic counterparts
 * with executive UAE branding, clean navbar formatting, and full RTL font support.
 */
add_action( 'wp_head', function() {
	$is_ar = false;
	if ( function_exists( 'pll_current_language' ) ) {
		$is_ar = ( pll_current_language() === 'ar' );
	} elseif ( isset( $_SERVER['REQUEST_URI'] ) && strpos( $_SERVER['REQUEST_URI'], '/ar/' ) !== false ) {
		$is_ar = true;
	}

	?>
	<style id="rbo-global-header-fixes">
	/* 1. Hide unwanted theme entry-title headers globally on all pages */
	.page-header, .entry-header, h1.entry-title {
		display: none !important;
	}
	</style>
	<?php

	if ( $is_ar ) {
		?>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
		<style id="rbo-arabic-rtl-styles">
		/* Arabic Typography and RTL Flow */
		html[lang="ar"], body.rtl {
			direction: rtl !important;
			text-align: right !important;
			font-family: 'Cairo', 'Tajawal', -apple-system, BlinkMacSystemFont, 'Segoe UI', Tahoma, Arial, sans-serif !important;
		}
		html[lang="ar"] h1, html[lang="ar"] h2, html[lang="ar"] h3, html[lang="ar"] h4, html[lang="ar"] h5, html[lang="ar"] h6 {
			font-family: 'Cairo', 'Tajawal', sans-serif !important;
		}
		html[lang="ar"] .elementor-widget-text-editor,
		html[lang="ar"] .elementor-heading-title,
		html[lang="ar"] p {
			text-align: right !important;
		}

		/* Keep Header & Navbar layout intact and pristine */
		.site-header, 
		header[data-elementor-type="header"], 
		.elementor-location-header,
		.site-header .main-navigation ul, 
		.elementor-location-header .main-navigation ul,
		.elementor-nav-menu {
			direction: ltr !important;
			text-align: left !important;
		}
		</style>
		<?php
	}
}, 99 );

add_action( 'wp_footer', function() {
	$post_id = get_the_ID();
	$cur_lang = 'en';
	if ( function_exists( 'pll_current_language' ) ) {
		$cur_lang = pll_current_language();
	} elseif ( isset( $_SERVER['REQUEST_URI'] ) && strpos( $_SERVER['REQUEST_URI'], '/ar/' ) !== false ) {
		$cur_lang = 'ar';
	}

	if ( $cur_lang === 'ar' ) {
		// Target is English
		$target_lang = 'en';
		$target_id = ( function_exists( 'pll_get_post' ) && $post_id ) ? pll_get_post( $post_id, 'en' ) : 0;
		$target_url = $target_id ? get_permalink( $target_id ) : home_url( '/' );
		$flag = '🌐';
		$label = 'English';
		$sub = 'Switch to English';
	} else {
		// Target is Arabic
		$target_lang = 'ar';
		$target_id = ( function_exists( 'pll_get_post' ) && $post_id ) ? pll_get_post( $post_id, 'ar' ) : 0;
		$target_url = $target_id ? get_permalink( $target_id ) : home_url( '/ar/' );
		$flag = '🇦🇪';
		$label = 'العربية';
		$sub = 'التحويل للغة العربية';
	}
	?>
	<div id="rbo-global-lang-toggle" class="rbo-lang-pill-wrapper">
		<a href="<?php echo esc_url( $target_url ); ?>" 
		   onclick="document.cookie='pll_language=<?php echo $target_lang; ?>;path=/;max-age=31536000'; window.location.href='<?php echo esc_url( $target_url ); ?>'; return false;"
		   class="rbo-lang-pill" 
		   title="<?php echo esc_attr( $sub ); ?>">
			<span class="rbo-lang-flag"><?php echo $flag; ?></span>
			<span class="rbo-lang-text"><?php echo esc_html( $label ); ?></span>
		</a>
	</div>
	<style>
	.rbo-lang-pill-wrapper {
		position: fixed;
		bottom: 24px;
		left: 24px;
		z-index: 999999;
	}
	.rbo-lang-pill {
		display: inline-flex;
		align-items: center;
		gap: 8px;
		padding: 10px 18px;
		background: linear-gradient(135deg, #0D1B2A 0%, #1e3a5f 100%);
		color: #ffffff !important;
		text-decoration: none !important;
		font-family: 'Cairo', 'Segoe UI', Arial, sans-serif;
		font-size: 14.5px;
		font-weight: 700;
		border-radius: 50px;
		border: 1.5px solid #d4a017;
		box-shadow: 0 6px 20px rgba(13,27,42,0.35);
		transition: all 0.25s ease;
		cursor: pointer;
	}
	.rbo-lang-pill:hover {
		background: #d4a017;
		color: #0D1B2A !important;
		border-color: #0D1B2A;
		box-shadow: 0 8px 25px rgba(212,160,23,0.45);
		transform: translateY(-2px);
	}
	.rbo-lang-flag {
		font-size: 16px;
		line-height: 1;
	}
	@media (max-width: 767px) {
		.rbo-lang-pill-wrapper {
			bottom: 84px; /* avoid overlapping Chaty whatsapp button */
			left: 16px;
		}
		.rbo-lang-pill {
			padding: 8px 14px;
			font-size: 13.5px;
		}
	}
	</style>
	<?php
}, 9999 );"""

    if old_section_10_pattern.search(content):
        content = old_section_10_pattern.sub(new_section_10, content)
        with open(fpath, "w", encoding="utf-8") as f:
            f.write(content)
        print(f"✅ Updated {fpath}")
    else:
        print(f"⚠️ Pattern not found in {fpath}")
