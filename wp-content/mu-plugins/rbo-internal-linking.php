<?php
/**
 * Plugin Name: RBO Contextual Internal Linking Power Engine
 * Description: Renders high-authority contextual cross-linking blocks for Business Setup on Core Service & Location pages.
 */
defined( 'ABSPATH' ) || exit;

add_filter( 'the_content', function( $content ) {
	if ( ! is_singular( 'page' ) ) {
		return $content;
	}

	$post_id = get_the_ID();
	$site_url = home_url();

	// Avoid duplicate injection
	if ( strpos( $content, 'rbo-internal-link-box' ) !== false ) {
		return $content;
	}

	// 1. Corporate Tax Hub (4421)
	if ( 4421 === $post_id ) {
		$block = <<<HTML
<div class="rbo-internal-link-box" style="background: #fdfaf2; border: 1px solid #e8b84b; border-left: 5px solid #c9a227; border-radius: 12px; padding: 28px 30px; margin: 45px 0 25px; box-shadow: 0 6px 20px rgba(9, 32, 59, 0.06);">
  <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
    <span style="font-size: 22px;">🏢</span>
    <h3 style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; color: #09203b; margin: 0; font-weight: 700;">
      Forming a New UAE Entity? Secure Day-One Corporate Tax Compliance
    </h3>
  </div>
  <p style="font-size: 15px; color: #334155; line-height: 1.75; margin: 0 0 16px;">
    Under <em>FTA Decision No. 3 of 2024</em>, newly incorporated companies must complete Corporate Tax registration within strict timelines (typically 3 months from trade licence issuance) or face an immediate <strong>AED 10,000 penalty</strong>. When you establish your enterprise through RBO, company formation is seamlessly bundled with day-one tax compliance, compliant opening balance sheets, and <a href="https://www.rboaccounting.ae/uae-corporate-tax-small-business-relief-guide-2026/" style="color: #0b3a6e; font-weight: 700; text-decoration: underline;">Small Business Relief (0% Tax) Structuring</a>.
  </p>
  <div style="display: flex; flex-wrap: wrap; gap: 12px;">
    <a href="https://www.rboaccounting.ae/business-setup/" style="display: inline-block; background: #09203b; color: #ffffff; padding: 10px 18px; border-radius: 6px; font-size: 14px; font-weight: 700; text-decoration: none;">🚀 Explore Business Setup Hub →</a>
    <a href="https://www.rboaccounting.ae/business-setup/packages/" style="display: inline-block; background: #ffffff; border: 1px solid #09203b; color: #09203b; padding: 10px 18px; border-radius: 6px; font-size: 14px; font-weight: 700; text-decoration: none;">📦 All-Inclusive Setup Packages</a>
    <a href="https://www.rboaccounting.ae/business-setup/mainland-vs-free-zone/" style="display: inline-block; background: #ffffff; border: 1px solid #09203b; color: #09203b; padding: 10px 18px; border-radius: 6px; font-size: 14px; font-weight: 700; text-decoration: none;">⚖️ Mainland vs Free Zone Guide</a>
  </div>
</div>
HTML;
		return $content . $block;
	}

	// 2. VAT Registration Hub (4420)
	if ( 4420 === $post_id ) {
		$block = <<<HTML
<div class="rbo-internal-link-box" style="background: #fdfaf2; border: 1px solid #e8b84b; border-left: 5px solid #c9a227; border-radius: 12px; padding: 28px 30px; margin: 45px 0 25px; box-shadow: 0 6px 20px rgba(9, 32, 59, 0.06);">
  <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
    <span style="font-size: 22px;">📜</span>
    <h3 style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; color: #09203b; margin: 0; font-weight: 700;">
      Starting a New Business? Align Trade Licensing with VAT Strategy
    </h3>
  </div>
  <p style="font-size: 15px; color: #334155; line-height: 1.75; margin: 0 0 16px;">
    Choosing the right legal jurisdiction and activity codes directly impacts your VAT obligations—including Designated Zone exemptions, import/export customs codes, and voluntary vs mandatory registration thresholds (AED 187,500 / AED 375,000). Review our end-to-end formation roadmap before issuing your first taxable invoice.
  </p>
  <div style="display: flex; flex-wrap: wrap; gap: 12px;">
    <a href="https://www.rboaccounting.ae/business-setup/trade-licence-process/" style="display: inline-block; background: #09203b; color: #ffffff; padding: 10px 18px; border-radius: 6px; font-size: 14px; font-weight: 700; text-decoration: none;">📋 5-Step Trade Licence Guide →</a>
    <a href="https://www.rboaccounting.ae/business-setup/packages/" style="display: inline-block; background: #ffffff; border: 1px solid #09203b; color: #09203b; padding: 10px 18px; border-radius: 6px; font-size: 14px; font-weight: 700; text-decoration: none;">📦 Setup &amp; VAT Bundles</a>
    <a href="https://www.rboaccounting.ae/business-setup/ajman-free-zone/" style="display: inline-block; background: #ffffff; border: 1px solid #09203b; color: #09203b; padding: 10px 18px; border-radius: 6px; font-size: 14px; font-weight: 700; text-decoration: none;">🏢 Ajman Free Zone Setup (AFZA)</a>
  </div>
</div>
HTML;
		return $content . $block;
	}

	// 3. Bookkeeping Hub (1547)
	if ( 1547 === $post_id ) {
		$block = <<<HTML
<div class="rbo-internal-link-box" style="background: #fdfaf2; border: 1px solid #e8b84b; border-left: 5px solid #c9a227; border-radius: 12px; padding: 28px 30px; margin: 45px 0 25px; box-shadow: 0 6px 20px rgba(9, 32, 59, 0.06);">
  <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
    <span style="font-size: 22px;">📊</span>
    <h3 style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; color: #09203b; margin: 0; font-weight: 700;">
      Setting Up a New UAE Company? Build Audit-Ready Books from Day One
    </h3>
  </div>
  <p style="font-size: 15px; color: #334155; line-height: 1.75; margin: 0 0 16px;">
    The easiest way to avoid costly year-end accounting cleanups is setting up your cloud chart of accounts (Zoho Books / QuickBooks) simultaneously with commercial licensing. Learn how our <a href="https://www.rboaccounting.ae/business-setup/packages/" style="color: #0b3a6e; font-weight: 700; text-decoration: underline;">Company Formation &amp; Bookkeeping Packages</a> provide turnkey corporate licensing with complete financial peace of mind.
  </p>
  <div style="display: flex; flex-wrap: wrap; gap: 12px;">
    <a href="https://www.rboaccounting.ae/business-setup/" style="display: inline-block; background: #09203b; color: #ffffff; padding: 10px 18px; border-radius: 6px; font-size: 14px; font-weight: 700; text-decoration: none;">🚀 UAE Business Setup Services →</a>
    <a href="https://www.rboaccounting.ae/business-setup/mainland-vs-free-zone/" style="display: inline-block; background: #ffffff; border: 1px solid #09203b; color: #09203b; padding: 10px 18px; border-radius: 6px; font-size: 14px; font-weight: 700; text-decoration: none;">⚖️ Mainland vs Free Zone Comparison</a>
  </div>
</div>
HTML;
		return $content . $block;
	}

	// 4. Dubai Local Page (1756)
	if ( 1756 === $post_id ) {
		$block = <<<HTML
<div class="rbo-internal-link-box" style="background: #fdfaf2; border: 1px solid #e8b84b; border-left: 5px solid #c9a227; border-radius: 12px; padding: 28px 30px; margin: 45px 0 25px; box-shadow: 0 6px 20px rgba(9, 32, 59, 0.06);">
  <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
    <span style="font-size: 22px;">🏙️</span>
    <h3 style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; color: #09203b; margin: 0; font-weight: 700;">
      Looking to Set Up a Business in Dubai?
    </h3>
  </div>
  <p style="font-size: 15px; color: #334155; line-height: 1.75; margin: 0 0 16px;">
    Whether incorporating a Dubai Mainland LLC through the Department of Economy and Tourism (DET) or establishing in premier trade hubs (DMCC, DIFC, DAFZA, JAFZA), RBO provides end-to-end company formation, residency visa processing, corporate banking assistance, and dedicated local tax accounting.
  </p>
  <div style="display: flex; flex-wrap: wrap; gap: 12px;">
    <a href="https://www.rboaccounting.ae/business-setup/dubai/" style="display: inline-block; background: #09203b; color: #ffffff; padding: 10px 18px; border-radius: 6px; font-size: 14px; font-weight: 700; text-decoration: none;">🌆 Dubai Business Setup Guide →</a>
    <a href="https://www.rboaccounting.ae/business-setup/mainland-vs-free-zone/" style="display: inline-block; background: #ffffff; border: 1px solid #09203b; color: #09203b; padding: 10px 18px; border-radius: 6px; font-size: 14px; font-weight: 700; text-decoration: none;">⚖️ Mainland vs Free Zone Guide</a>
    <a href="https://www.rboaccounting.ae/business-setup/packages/" style="display: inline-block; background: #ffffff; border: 1px solid #09203b; color: #09203b; padding: 10px 18px; border-radius: 6px; font-size: 14px; font-weight: 700; text-decoration: none;">📦 Dubai Formation Packages</a>
  </div>
</div>
HTML;
		return $content . $block;
	}

	// 5. Ajman Local Page (2239)
	if ( 2239 === $post_id ) {
		$block = <<<HTML
<div class="rbo-internal-link-box" style="background: #fdfaf2; border: 1px solid #e8b84b; border-left: 5px solid #c9a227; border-radius: 12px; padding: 28px 30px; margin: 45px 0 25px; box-shadow: 0 6px 20px rgba(9, 32, 59, 0.06);">
  <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px;">
    <span style="font-size: 22px;">⭐</span>
    <h3 style="font-family: 'Playfair Display', Georgia, serif; font-size: 22px; color: #09203b; margin: 0; font-weight: 700;">
      Official Ajman Free Zone (AFZA) Channel Partner &amp; Setup Specialist
    </h3>
  </div>
  <p style="font-size: 15px; color: #334155; line-height: 1.75; margin: 0 0 16px;">
    Headquartered in Block C1, Ajman Free Zone, RBO Accounting Services FZE is an authorized registered AFZA Channel Partner. We provide VIP expedited license issuance (24–48 hours), priority document verification, exclusive package discounts, and approved annual audit compliance under one roof.
  </p>
  <div style="display: flex; flex-wrap: wrap; gap: 12px;">
    <a href="https://www.rboaccounting.ae/business-setup/ajman-free-zone/" style="display: inline-block; background: #09203b; color: #ffffff; padding: 10px 18px; border-radius: 6px; font-size: 14px; font-weight: 700; text-decoration: none;">🏢 Ajman Free Zone Setup (AFZA) →</a>
    <a href="https://www.rboaccounting.ae/ajman-free-zone-company-audit-vat-compliance-guide/" style="display: inline-block; background: #ffffff; border: 1px solid #09203b; color: #09203b; padding: 10px 18px; border-radius: 6px; font-size: 14px; font-weight: 700; text-decoration: none;">📖 AFZA Audit &amp; VAT Guide 2026</a>
    <a href="https://www.rboaccounting.ae/business-setup/packages/" style="display: inline-block; background: #ffffff; border: 1px solid #09203b; color: #09203b; padding: 10px 18px; border-radius: 6px; font-size: 14px; font-weight: 700; text-decoration: none;">📦 AFZA Setup Bundles</a>
  </div>
</div>
HTML;
		return $content . $block;
	}

	return $content;
}, 99 );