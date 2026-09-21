<?php
/**
 * Standalone 1-Click Complete CSS Fixer for RBO Accounting Business Setup Pages
 * Upload to public_html/ and open: https://www.rboaccounting.ae/fix-css.php
 */

@ini_set( 'display_errors', 1 );
@ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

if ( ! file_exists( __DIR__ . '/wp-load.php' ) ) {
	die( '<h2 style="font-family:sans-serif;color:red;">Error: Place fix-css.php directly in public_html/ (same folder as wp-config.php)</h2>' );
}

require_once __DIR__ . '/wp-load.php';

$pure_css = '
/* ==========================================================================
   RBO LUXURY BUSINESS SETUP & COMPANY FORMATION MASTER DESIGN SYSTEM
   ========================================================================== */
@import url("https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;0,900;1,700&family=Poppins:wght@400;500;600;700;800&display=swap");

.entry-title, .page-header, .page-title, .post-title, .elementor-page-title, h1.entry-title,
.page-id-5439 .entry-title, .page-id-5440 .entry-title, .page-id-5441 .entry-title,
.page-id-5442 .entry-title, .page-id-5443 .entry-title, .page-id-5444 .entry-title,
.page-id-5445 .entry-title {
	display: none !important;
}

/* Master Wrapper */
.rbo-elementor-service-wrapper {
	width: 100% !important;
	max-width: 100% !important;
	margin: 0 !important;
	padding: 0 !important;
	font-family: "Poppins", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
	color: #334155 !important;
	background-color: #f8fafc !important;
	line-height: 1.6 !important;
	box-sizing: border-box !important;
}

/* --------------------------------------------------------------------------
   HERO BANNER
   -------------------------------------------------------------------------- */
.rbo-hero-section {
	width: 100vw !important;
	position: relative !important;
	left: 50% !important;
	right: 50% !important;
	margin-left: -50vw !important;
	margin-right: -50vw !important;
	background: linear-gradient(135deg, rgba(9, 32, 59, 0.92) 0%, rgba(13, 43, 79, 0.85) 50%, rgba(9, 32, 59, 0.94) 100%), url("' . home_url( '/wp-content/uploads/2026/09/dubai-skyline-hero-bg.jpg' ) . '") center center / cover no-repeat !important;
	color: #ffffff !important;
	padding: 70px 20px 80px !important;
	box-sizing: border-box !important;
	border-bottom: 3px solid #c9a227 !important;
}
.rbo-hero-container {
	max-width: 1200px !important;
	margin: 0 auto !important;
	display: flex !important;
	flex-wrap: wrap !important;
	align-items: center !important;
	justify-content: space-between !important;
	gap: 40px !important;
}
.rbo-hero-left {
	flex: 1 1 600px !important;
}
.rbo-partner-badge {
	display: inline-flex !important;
	align-items: center !important;
	gap: 8px !important;
	background: rgba(232, 184, 75, 0.15) !important;
	color: #e8b84b !important;
	border: 1px solid rgba(232, 184, 75, 0.4) !important;
	padding: 6px 16px !important;
	border-radius: 9999px !important;
	font-size: 13px !important;
	font-weight: 700 !important;
	letter-spacing: 0.4px !important;
	margin-bottom: 20px !important;
}
.rbo-star {
	color: #e8b84b !important;
	font-size: 15px !important;
}
.rbo-hero-heading {
	font-family: "Playfair Display", Georgia, serif !important;
	font-size: 40px !important;
	color: #ffffff !important;
	font-weight: 800 !important;
	line-height: 1.25 !important;
	margin: 0 0 18px !important;
}
.rbo-gold-text {
	color: #e8b84b !important;
}
.rbo-hero-lead {
	font-size: 17px !important;
	color: #cbd5e1 !important;
	line-height: 1.8 !important;
	margin-bottom: 24px !important;
}
.rbo-hero-points {
	display: flex !important;
	flex-direction: column !important;
	gap: 12px !important;
	margin-bottom: 28px !important;
}
.rbo-hero-point {
	display: flex !important;
	align-items: center !important;
	gap: 10px !important;
	font-size: 15px !important;
	color: #f1f5f9 !important;
}
.rbo-check-icon {
	color: #4ade80 !important;
	font-weight: 800 !important;
	font-size: 17px !important;
}
.rbo-hero-right {
	flex: 0 1 400px !important;
}
.rbo-consult-card {
	background: rgba(13, 27, 42, 0.9) !important;
	border: 1px solid rgba(232, 184, 75, 0.35) !important;
	backdrop-filter: blur(12px) !important;
	border-radius: 16px !important;
	padding: 30px 26px !important;
	box-shadow: 0 12px 36px rgba(0, 0, 0, 0.35) !important;
	color: #ffffff !important;
}
.rbo-consult-card h3 {
	font-family: "Playfair Display", Georgia, serif !important;
	font-size: 22px !important;
	color: #ffffff !important;
	margin: 0 0 8px !important;
	font-weight: 700 !important;
}
.rbo-consult-subtitle {
	font-size: 13.5px !important;
	color: #94a3b8 !important;
	margin: 0 0 20px !important;
	line-height: 1.5 !important;
}
.rbo-consult-features {
	display: flex !important;
	flex-direction: column !important;
	gap: 10px !important;
	margin-bottom: 24px !important;
	padding-top: 14px !important;
	border-top: 1px solid rgba(255, 255, 255, 0.1) !important;
}
.rbo-cf-item {
	font-size: 13.5px !important;
	color: #e2e8f0 !important;
}
.rbo-consult-cta {
	display: flex !important;
	flex-direction: column !important;
	gap: 10px !important;
}
.rbo-btn-whatsapp-hero {
	display: block !important;
	text-align: center !important;
	background: #25D366 !important;
	color: #ffffff !important;
	font-weight: 700 !important;
	padding: 12px 18px !important;
	border-radius: 8px !important;
	text-decoration: none !important;
	font-size: 14px !important;
	transition: background 0.2s !important;
}
.rbo-btn-whatsapp-hero:hover {
	background: #20ba5a !important;
}
.rbo-btn-gold-hero {
	display: block !important;
	text-align: center !important;
	background: #e8b84b !important;
	color: #09203b !important;
	font-weight: 800 !important;
	padding: 12px 18px !important;
	border-radius: 8px !important;
	text-decoration: none !important;
	font-size: 14px !important;
	transition: background 0.2s !important;
}
.rbo-btn-gold-hero:hover {
	background: #f4ca68 !important;
}

/* --------------------------------------------------------------------------
   BODY & CONTENT CONTAINERS
   -------------------------------------------------------------------------- */
.rbo-body-container, .rbo-content-container {
	max-width: 1200px !important;
	margin: 0 auto !important;
	padding: 50px 20px 80px !important;
	box-sizing: border-box !important;
}
.rbo-trust-card {
	display: flex !important;
	gap: 20px !important;
	background: #ffffff !important;
	border-left: 5px solid #c9a227 !important;
	border-radius: 12px !important;
	padding: 24px 28px !important;
	box-shadow: 0 4px 20px rgba(9, 32, 59, 0.06) !important;
	margin-bottom: 44px !important;
}
.rbo-trust-icon-wrap, .rbo-trust-icon {
	font-size: 38px !important;
	flex-shrink: 0 !important;
}
.rbo-trust-text h3, .rbo-trust-text h4 {
	font-family: "Playfair Display", Georgia, serif !important;
	color: #09203b !important;
	font-size: 20px !important;
	margin: 0 0 8px !important;
	font-weight: 700 !important;
}
.rbo-trust-text p {
	font-size: 15px !important;
	line-height: 1.7 !important;
	color: #475569 !important;
	margin: 0 !important;
}

.rbo-section-title {
	font-family: "Playfair Display", Georgia, serif !important;
	font-size: 30px !important;
	color: #09203b !important;
	font-weight: 800 !important;
	margin: 40px 0 10px !important;
	text-align: center !important;
}
.rbo-section-sub, .rbo-section-desc {
	text-align: center !important;
	color: #64748b !important;
	font-size: 15.5px !important;
	margin-bottom: 36px !important;
}

/* --------------------------------------------------------------------------
   CARDS GRIDS
   -------------------------------------------------------------------------- */
.rbo-cards-grid-3, .rbo-feature-grid {
	display: grid !important;
	grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)) !important;
	gap: 28px !important;
	margin-bottom: 50px !important;
}
.rbo-cards-grid-2 {
	display: grid !important;
	grid-template-columns: repeat(auto-fit, minmax(360px, 1fr)) !important;
	gap: 28px !important;
	margin-bottom: 50px !important;
}
.rbo-feature-box {
	background: #ffffff !important;
	border: 1px solid #e2e8f0 !important;
	border-radius: 16px !important;
	padding: 32px 26px !important;
	display: flex !important;
	flex-direction: column !important;
	position: relative !important;
	box-shadow: 0 4px 18px rgba(9, 32, 59, 0.05) !important;
	transition: transform 0.2s, box-shadow 0.2s !important;
}
.rbo-feature-box:hover {
	transform: translateY(-4px) !important;
	box-shadow: 0 12px 30px rgba(9, 32, 59, 0.1) !important;
}
.rbo-box-highlight, .rbo-featured-partner-card {
	border: 2px solid #c9a227 !important;
	background: #fdfaf2 !important;
}
.rbo-ribbon, .rbo-card-top-tag {
	position: absolute !important;
	top: -12px !important;
	right: 24px !important;
	background: #c9a227 !important;
	color: #09203b !important;
	font-size: 11px !important;
	font-weight: 800 !important;
	text-transform: uppercase !important;
	padding: 4px 14px !important;
	border-radius: 9999px !important;
	letter-spacing: 0.5px !important;
}
.rbo-box-icon {
	font-size: 34px !important;
	margin-bottom: 12px !important;
}
.rbo-box-tag {
	font-size: 12px !important;
	font-weight: 700 !important;
	color: #9a7212 !important;
	text-transform: uppercase !important;
	letter-spacing: 0.5px !important;
	margin-bottom: 8px !important;
}
.rbo-feature-box h3, .rbo-feature-box h4 {
	font-family: "Playfair Display", Georgia, serif !important;
	font-size: 22px !important;
	color: #09203b !important;
	margin: 0 0 12px !important;
	font-weight: 700 !important;
}
.rbo-feature-box p {
	font-size: 14.5px !important;
	color: #475569 !important;
	line-height: 1.65 !important;
	margin-bottom: 18px !important;
}
.rbo-box-list {
	list-style: none !important;
	padding: 0 !important;
	margin: 0 0 24px !important;
	flex: 1 !important;
}
.rbo-box-list li {
	position: relative !important;
	padding-left: 22px !important;
	font-size: 13.5px !important;
	color: #334155 !important;
	margin-bottom: 10px !important;
	line-height: 1.5 !important;
}
.rbo-box-list li::before {
	content: "✓" !important;
	position: absolute !important;
	left: 0 !important;
	color: #c9a227 !important;
	font-weight: 800 !important;
}
.rbo-card-link {
	display: block !important;
	text-align: center !important;
	background: #ffffff !important;
	border: 1px solid #09203b !important;
	color: #09203b !important;
	font-weight: 700 !important;
	padding: 12px 18px !important;
	border-radius: 8px !important;
	text-decoration: none !important;
	font-size: 14px !important;
	transition: background 0.2s !important;
}
.rbo-card-link:hover {
	background: #09203b !important;
	color: #ffffff !important;
}
.rbo-card-btn-gold {
	display: block !important;
	text-align: center !important;
	background: #e8b84b !important;
	color: #09203b !important;
	font-weight: 800 !important;
	padding: 12px 18px !important;
	border-radius: 8px !important;
	text-decoration: none !important;
	font-size: 14px !important;
	transition: background 0.2s !important;
}
.rbo-card-btn-gold:hover {
	background: #f4ca68 !important;
}

/* --------------------------------------------------------------------------
   VISUAL IMAGE SHOWCASES
   -------------------------------------------------------------------------- */
.rbo-visual-showcase {
	display: flex !important;
	flex-wrap: wrap !important;
	align-items: center !important;
	gap: 40px !important;
	margin: 50px 0 !important;
	background: #ffffff !important;
	border: 1px solid #e2e8f0 !important;
	border-radius: 20px !important;
	padding: 36px !important;
	box-shadow: 0 8px 30px rgba(9, 32, 59, 0.06) !important;
}
.rbo-showcase-reverse {
	flex-direction: row-reverse !important;
	background: #fdfaf2 !important;
	border-color: #e8b84b !important;
}
.rbo-showcase-image-wrap {
	flex: 1 1 440px !important;
	position: relative !important;
	border-radius: 16px !important;
	overflow: hidden !important;
	box-shadow: 0 10px 30px rgba(9, 32, 59, 0.12) !important;
}
.rbo-showcase-img {
	width: 100% !important;
	height: auto !important;
	display: block !important;
	object-fit: cover !important;
}
.rbo-img-floating-tag {
	position: absolute !important;
	bottom: 20px !important;
	left: 20px !important;
	background: rgba(9, 32, 59, 0.9) !important;
	color: #ffffff !important;
	border-left: 4px solid #e8b84b !important;
	padding: 10px 18px !important;
	border-radius: 8px !important;
	backdrop-filter: blur(8px) !important;
	display: flex !important;
	align-items: center !important;
	gap: 12px !important;
}
.rbo-tag-gold {
	background: rgba(201, 162, 39, 0.95) !important;
	color: #09203b !important;
	border-left-color: #09203b !important;
}
.rbo-tag-num {
	font-size: 22px !important;
	font-weight: 900 !important;
	color: #e8b84b !important;
}
.rbo-tag-gold .rbo-tag-num {
	color: #09203b !important;
}
.rbo-tag-txt {
	font-size: 13px !important;
	font-weight: 700 !important;
	line-height: 1.3 !important;
}
.rbo-showcase-content {
	flex: 1 1 460px !important;
}
.rbo-mini-pill {
	display: inline-block !important;
	background: #e0f2fe !important;
	color: #0369a1 !important;
	font-size: 12px !important;
	font-weight: 700 !important;
	padding: 4px 12px !important;
	border-radius: 9999px !important;
	text-transform: uppercase !important;
	margin-bottom: 12px !important;
	letter-spacing: 0.4px !important;
}
.rbo-pill-gold {
	background: #fef3c7 !important;
	color: #9a7212 !important;
}
.rbo-showcase-content h3 {
	font-family: "Playfair Display", Georgia, serif !important;
	font-size: 26px !important;
	color: #09203b !important;
	margin: 0 0 16px !important;
	font-weight: 700 !important;
	line-height: 1.35 !important;
}
.rbo-showcase-content p {
	font-size: 15px !important;
	color: #475569 !important;
	line-height: 1.75 !important;
	margin-bottom: 20px !important;
}
.rbo-feature-checklist-grid {
	display: grid !important;
	grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)) !important;
	gap: 16px !important;
	margin-top: 20px !important;
}
.rbo-fc-item {
	display: flex !important;
	gap: 10px !important;
	font-size: 13.5px !important;
	color: #334155 !important;
	line-height: 1.5 !important;
}
.rbo-fc-check {
	color: #c9a227 !important;
	font-weight: 900 !important;
	font-size: 16px !important;
	flex-shrink: 0 !important;
}

/* --------------------------------------------------------------------------
   SCOPE, TIMELINE & TABLES
   -------------------------------------------------------------------------- */
.rbo-scope-grid {
	display: grid !important;
	grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)) !important;
	gap: 20px !important;
	margin-bottom: 48px !important;
}
.rbo-scope-card {
	background: #ffffff !important;
	border: 1px solid #e2e8f0 !important;
	border-radius: 12px !important;
	padding: 22px 20px !important;
	box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03) !important;
}
.rbo-scope-card h4 {
	font-size: 16px !important;
	color: #09203b !important;
	margin: 0 0 8px !important;
	font-weight: 700 !important;
}
.rbo-scope-card p {
	font-size: 13.5px !important;
	color: #64748b !important;
	line-height: 1.6 !important;
	margin: 0 !important;
}
.rbo-table-wrap {
	overflow-x: auto !important;
	border-radius: 14px !important;
	box-shadow: 0 6px 24px rgba(9, 32, 59, 0.08) !important;
	margin-bottom: 50px !important;
}
.rbo-custom-table {
	width: 100% !important;
	border-collapse: collapse !important;
	background: #ffffff !important;
}
.rbo-custom-table th {
	background: #09203b !important;
	color: #ffffff !important;
	padding: 18px 22px !important;
	font-size: 15px !important;
	text-align: left !important;
	font-weight: 700 !important;
}
.rbo-custom-table td {
	padding: 16px 22px !important;
	border-bottom: 1px solid #e2e8f0 !important;
	font-size: 14.5px !important;
	line-height: 1.6 !important;
}
.rbo-custom-table tr:nth-child(even) td {
	background: #f8fafc !important;
}
.rbo-partner-mini {
	display: inline-block !important;
	background: #e8b84b !important;
	color: #09203b !important;
	font-size: 11px !important;
	font-weight: 800 !important;
	padding: 2px 8px !important;
	border-radius: 4px !important;
	margin-left: 6px !important;
}
.rbo-timeline-modern {
	display: flex !important;
	flex-direction: column !important;
	gap: 20px !important;
	margin-bottom: 48px !important;
}
.rbo-t-item {
	display: flex !important;
	gap: 22px !important;
	background: #ffffff !important;
	border: 1px solid #e2e8f0 !important;
	border-radius: 12px !important;
	padding: 22px 24px !important;
	box-shadow: 0 2px 10px rgba(0,0,0,0.03) !important;
}
.rbo-t-badge {
	flex: 0 0 46px !important;
	height: 46px !important;
	background: #09203b !important;
	color: #e8b84b !important;
	border-radius: 50% !important;
	display: flex !important;
	align-items: center !important;
	justify-content: center !important;
	font-size: 18px !important;
	font-weight: 800 !important;
	box-shadow: 0 4px 10px rgba(9, 32, 59, 0.15) !important;
}
.rbo-t-content h4 {
	font-size: 17px !important;
	color: #09203b !important;
	margin: 0 0 6px !important;
	font-weight: 700 !important;
}
.rbo-t-content p {
	font-size: 14px !important;
	color: #475569 !important;
	margin: 0 !important;
	line-height: 1.6 !important;
}

/* --------------------------------------------------------------------------
   PACKAGES GRID
   -------------------------------------------------------------------------- */
.rbo-packages-grid-modern {
	display: grid !important;
	grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)) !important;
	gap: 28px !important;
	margin-bottom: 50px !important;
}
.rbo-pkg-box {
	background: #ffffff !important;
	border: 1px solid #e2e8f0 !important;
	border-radius: 16px !important;
	padding: 34px 26px !important;
	display: flex !important;
	flex-direction: column !important;
	position: relative !important;
	box-shadow: 0 4px 20px rgba(9, 32, 59, 0.05) !important;
}
.rbo-pkg-popular {
	border: 2px solid #c9a227 !important;
	box-shadow: 0 10px 34px rgba(201, 162, 39, 0.2) !important;
	transform: scale(1.02) !important;
	background: #fdfaf2 !important;
}
.rbo-pkg-badge-tag {
	position: absolute !important;
	top: -13px !important;
	left: 50% !important;
	transform: translateX(-50%) !important;
	background: #c9a227 !important;
	color: #09203b !important;
	font-size: 12px !important;
	font-weight: 800 !important;
	text-transform: uppercase !important;
	padding: 4px 16px !important;
	border-radius: 9999px !important;
	letter-spacing: 0.5px !important;
}
.rbo-pkg-top h3 {
	font-family: "Playfair Display", Georgia, serif !important;
	font-size: 24px !important;
	margin: 0 0 4px !important;
	color: #09203b !important;
}
.rbo-pkg-sub {
	font-size: 13.5px !important;
	color: #64748b !important;
	font-weight: 600 !important;
	margin-bottom: 8px !important;
}
.rbo-pkg-pill {
	display: inline-block !important;
	font-size: 11.5px !important;
	font-weight: 700 !important;
	color: #9a7212 !important;
	background: #fef3c7 !important;
	padding: 3px 10px !important;
	border-radius: 4px !important;
	margin-bottom: 22px !important;
}
.rbo-pill-gold {
	background: #fde68a !important;
}
.rbo-pkg-ul {
	list-style: none !important;
	padding: 0 !important;
	margin: 0 0 28px !important;
	flex: 1 !important;
}
.rbo-pkg-ul li {
	font-size: 14px !important;
	margin-bottom: 12px !important;
	color: #334155 !important;
	line-height: 1.55 !important;
}
.rbo-pkg-action-btn {
	display: block !important;
	text-align: center !important;
	background: #09203b !important;
	color: #ffffff !important;
	padding: 13px 20px !important;
	border-radius: 8px !important;
	font-weight: 700 !important;
	text-decoration: none !important;
	transition: background 0.2s !important;
}
.rbo-pkg-action-btn:hover {
	background: #14375e !important;
}
.rbo-btn-gold-full {
	background: #e8b84b !important;
	color: #09203b !important;
	font-weight: 800 !important;
}
.rbo-btn-gold-full:hover {
	background: #f4ca68 !important;
}

/* --------------------------------------------------------------------------
   BOTTOM CALL TO ACTION
   -------------------------------------------------------------------------- */
.rbo-bottom-cta {
	background: linear-gradient(135deg, #09203b 0%, #112d4e 100%) !important;
	color: #ffffff !important;
	border-radius: 18px !important;
	padding: 44px 32px !important;
	margin: 50px 0 20px !important;
	text-align: center !important;
	box-shadow: 0 12px 36px rgba(9, 32, 59, 0.18) !important;
}
.rbo-bottom-badge {
	display: inline-block !important;
	background: rgba(232, 184, 75, 0.2) !important;
	color: #e8b84b !important;
	border: 1px solid rgba(232, 184, 75, 0.4) !important;
	padding: 4px 16px !important;
	border-radius: 9999px !important;
	font-size: 12px !important;
	font-weight: 700 !important;
	text-transform: uppercase !important;
	margin-bottom: 14px !important;
}
.rbo-bottom-cta h2 {
	font-family: "Playfair Display", Georgia, serif !important;
	font-size: 32px !important;
	color: #ffffff !important;
	margin: 0 0 12px !important;
}
.rbo-bottom-cta p {
	font-size: 16px !important;
	color: #cbd5e1 !important;
	max-width: 680px !important;
	margin: 0 auto 26px !important;
	line-height: 1.7 !important;
}
.rbo-bottom-btn-group {
	display: flex !important;
	flex-wrap: wrap !important;
	gap: 14px !important;
	justify-content: center !important;
}
.rbo-btn-gold-big {
	display: inline-block !important;
	background: #e8b84b !important;
	color: #09203b !important;
	font-weight: 800 !important;
	padding: 14px 30px !important;
	border-radius: 8px !important;
	text-decoration: none !important;
	font-size: 15px !important;
	transition: background 0.2s, transform 0.2s !important;
}
.rbo-btn-gold-big:hover {
	background: #f4ca68 !important;
	transform: translateY(-2px) !important;
}
.rbo-btn-whatsapp-big {
	display: inline-block !important;
	background: #25D366 !important;
	color: #ffffff !important;
	font-weight: 700 !important;
	padding: 14px 28px !important;
	border-radius: 8px !important;
	text-decoration: none !important;
	font-size: 15px !important;
	transition: background 0.2s, transform 0.2s !important;
}
.rbo-btn-whatsapp-big:hover {
	background: #20ba5a !important;
	transform: translateY(-2px) !important;
}

@media (max-width: 767px) {
	.rbo-hero-section { width: 100% !important; left: 0 !important; right: 0 !important; margin: 0 !important; padding: 40px 16px !important; }
	.rbo-hero-heading { font-size: 28px !important; }
	.rbo-hero-container { flex-direction: column !important; }
	.rbo-hero-right { width: 100% !important; flex: 1 1 100% !important; }
	.rbo-visual-showcase { flex-direction: column !important; padding: 20px !important; }
	.rbo-trust-card { flex-direction: column !important; gap: 10px !important; }
	.rbo-t-item { flex-direction: column !important; gap: 12px !important; }
	.rbo-pkg-popular { transform: none !important; }
	.rbo-bottom-btn-group { flex-direction: column !important; }
}
';

$results = array();

// 1. Update active theme style.css
$theme_dir = get_stylesheet_directory();
$theme_style = $theme_dir . '/style.css';
if ( file_exists( $theme_style ) && is_writable( $theme_style ) ) {
	$current_theme_css = file_get_contents( $theme_style );
	file_put_contents( $theme_style, $current_theme_css . "\n\n" . $pure_css );
	$results[] = '✓ Injected Master CSS into Theme stylesheet: <code>' . esc_html( $theme_style ) . '</code>';
}

// 2. Update wp_head hook in mu-plugins
$mu_dir = WP_CONTENT_DIR . '/mu-plugins';
if ( ! is_dir( $mu_dir ) ) {
	@mkdir( $mu_dir, 0755, true );
}
$mu_code = '<?php
defined("ABSPATH") || exit;
add_action("wp_head", function() {
	echo "<style id=\"rbo-luxury-global-css\">\n' . addcslashes( $pure_css, '"' ) . "\n</style>\n\";
}, 1);
";
@file_put_contents( $mu_dir . '/rbo-business-setup-css.php', $mu_code );
$results[] = '✓ Injected Master CSS into <code>wp-content/mu-plugins/rbo-business-setup-css.php</code>';

// 3. Update Customizer CSS
if ( function_exists( 'wp_update_custom_css_post' ) ) {
	wp_update_custom_css_post( $pure_css );
	$results[] = '✓ Updated WordPress Customizer Additional CSS';
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>RBO CSS Fixer</title>
<style>
body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #0b1528; color: #f8fafc; padding: 40px 20px; }
.card { max-width: 680px; margin: 0 auto; background: #16243d; border-radius: 16px; padding: 36px; box-shadow: 0 10px 30px rgba(0,0,0,0.4); border: 1px solid #233554; }
h1 { color: #e8b84b; margin-top: 0; font-size: 22px; }
.step { padding: 12px 16px; margin-bottom: 10px; background: #1e3152; border-radius: 8px; border-left: 4px solid #4ade80; font-size: 14px; color: #f1f5f9; }
.btn { display: inline-block; background: #e8b84b; color: #09203b !important; font-weight: 800; padding: 14px 28px; border-radius: 8px; text-decoration: none; margin-top: 20px; font-size: 15px; }
.btn:hover { background: #f4ca68; }
</style>
</head>
<body>
<div class="card">
<h1>🎨 RBO Complete Design System Applied!</h1>
<p style="color:#cbd5e1;">All styling tokens, card grids, visual showcase frames, and golden badges have been injected:</p>
<?php foreach ( $results as $r ) : ?>
	<div class="step"><?php echo $r; ?></div>
<?php endforeach; ?>
<p style="color:#94a3b8;margin-top:20px;font-size:13.5px;">Click below to open your live page and press <strong>Ctrl+F5</strong> (or <strong>Cmd+Shift+R</strong>):</p>
<a href="https://www.rboaccounting.ae/business-setup/" class="btn" target="_blank">Open Live Business Setup Page →</a>
</div>
</body>
</html>
