<?php
/**
 * Standalone Master Business Setup Pages Provisioner & CSS Injector for RBO Accounting
 * Upload to public_html/ and open: https://www.rboaccounting.ae/setup-pages.php
 */

@ini_set( 'display_errors', 1 );
@ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

if ( ! file_exists( __DIR__ . '/wp-load.php' ) ) {
	die( '<h2 style="font-family:sans-serif;color:red;">Error: Place setup-pages.php directly in public_html/ (alongside wp-config.php and wp-load.php)</h2>' );
}

require_once __DIR__ . '/wp-load.php';

// Elevate permissions to Administrator so all styles and rich HTML elements are strictly preserved
$admin_user = get_user_by( 'role', 'administrator' );
if ( $admin_user ) {
	wp_set_current_user( $admin_user->ID );
} else {
	wp_set_current_user( 1 );
}
if ( function_exists( 'kses_remove_filters' ) ) {
	kses_remove_filters();
}

$site_url = home_url();

$master_css = '
@import url("https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;0,900;1,700&family=Poppins:wght@400;500;600;700;800&display=swap");

.entry-title, .page-header, .page-title, .post-title, .elementor-page-title, h1.entry-title,
.page-id-5439 .entry-title, .page-id-5440 .entry-title, .page-id-5441 .entry-title,
.page-id-5442 .entry-title, .page-id-5443 .entry-title, .page-id-5444 .entry-title,
.page-id-5445 .entry-title {
	display: none !important;
}

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

/* Full Width Hero Banner */
.rbo-hero-section {
	width: 100vw !important;
	position: relative !important;
	left: 50% !important;
	right: 50% !important;
	margin-left: -50vw !important;
	margin-right: -50vw !important;
	background: linear-gradient(135deg, rgba(9, 32, 59, 0.92) 0%, rgba(13, 43, 79, 0.85) 50%, rgba(9, 32, 59, 0.94) 100%), url("' . $site_url . '/wp-content/uploads/2026/09/dubai-skyline-hero-bg.jpg") center center / cover no-repeat !important;
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

/* Body & Containers */
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

/* Card Grids */
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

/* Visual Image Showcase Layout */
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

/* Timeline & Scope */
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

/* Packages */
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

/* Bottom CTA */
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

$style_block = '<style id="rbo-luxury-setup-css">' . $master_css . '</style>';

// Define all 6 pages content
$pages = array(
	'business-setup' => array(
		'title'       => 'UAE Business Setup & Company Formation Services',
		'focus_kw'    => 'business setup UAE',
		'meta_desc'   => 'End-to-end UAE business setup & company formation. Official Ajman Free Zone (AFZA) Channel Partner & Mainland DED experts in Dubai & across UAE. 100% foreign ownership with day-one tax compliance.',
		'service_type'=> 'Company Formation & Business Setup',
		'parent'      => 0,
		'faqs'        => array(
			array( 'q' => 'What is the minimum cost to set up a business in the UAE?', 'a' => 'Business setup costs vary based on jurisdiction (Free Zone vs. Mainland) and visa allocation. As an Official Ajman Free Zone Channel Partner, RBO provides all-inclusive AFZA packages starting from AED 5,555 for zero-visa setups, while Dubai Mainland trade licenses generally start from AED 15,000 to AED 22,000 including initial approvals and commercial tenancy registration.' ),
			array( 'q' => 'Can a foreign investor own 100% of a UAE company?', 'a' => 'Yes. Under the amended UAE Commercial Companies Law, 100% foreign ownership is available across all 40+ UAE Free Zones and for over 1,000 commercial and industrial business activities on the UAE Mainland without requiring a local Emirati sponsor.' ),
			array( 'q' => 'How does RBO being an Official Ajman Free Zone Channel Partner benefit my setup?', 'a' => 'As an authorized AFZA Channel Partner, RBO Accounting Services FZE provides direct on-the-ground liaison with authority leadership, VIP fast-tracked application processing (license delivery in 24-48 hours), priority document verification, exclusive authority discounts, and dedicated account manager assignment with zero middleman fees.' ),
			array( 'q' => 'Why is bundling business setup with accounting & tax services critical?', 'a' => 'Under UAE Federal Decree-Law No. 47 of 2022 and FTA Decision No. 3 of 2024, every newly registered company must register for Corporate Tax within strict timelines (typically 3 months) or face an immediate AED 10,000 administrative penalty. Bundling setup with accounting ensures day-one tax registration, compliant chart of accounts, and audit-ready records.' ),
			array( 'q' => 'What documents are required to initiate UAE company formation?', 'a' => 'For individual shareholders: color passport copies, UAE entry stamp/visit visa (or Emirates ID copy if resident), 3 proposed trade names, and a brief description of business activities. For corporate shareholders: Certificate of Incorporation, Memorandum of Association (MOA), and Board Resolution attested by the UAE Embassy.' )
		),
		'content'     => $style_block . '
<div class="rbo-elementor-service-wrapper">
	<section class="rbo-hero-section">
		<div class="rbo-hero-container">
			<div class="rbo-hero-left">
				<div class="rbo-partner-badge"><span class="rbo-star">★</span> Official Ajman Free Zone (AFZA) Registered Channel Partner</div>
				<h1 class="rbo-hero-heading">UAE Business Setup &amp; Company Formation in <span class="rbo-gold-text">Dubai &amp; UAE</span></h1>
				<p class="rbo-hero-lead">Launch your UAE venture with 100% foreign equity, 24–48h fast-track licensing, zero middleman fees, and integrated day-one Corporate Tax &amp; VAT compliance.</p>
				<div class="rbo-hero-points">
					<div class="rbo-hero-point"><span class="rbo-check-icon">✓</span> <span><strong>24–48 Hour Fast Track:</strong> Direct AFZA registrar submission</span></div>
					<div class="rbo-hero-point"><span class="rbo-check-icon">✓</span> <span><strong>100% Foreign Ownership:</strong> Mainland &amp; Free Zone structuring</span></div>
					<div class="rbo-hero-point"><span class="rbo-check-icon">✓</span> <span><strong>Day-One Tax Protection:</strong> Avoid the AED 10,000 FTA fine</span></div>
				</div>
			</div>
			<div class="rbo-hero-right">
				<div class="rbo-consult-card">
					<h3>Get a Free Consultation</h3>
					<p class="rbo-consult-subtitle">Speak directly with our official AFZA channel partner and certified tax advisors.</p>
					<div class="rbo-consult-features">
						<div class="rbo-cf-item">📞 <strong>Direct Call:</strong> +971 50 805 1857</div>
						<div class="rbo-cf-item">💬 <strong>WhatsApp:</strong> +971 50 805 1857</div>
						<div class="rbo-cf-item">📍 <strong>HQ Office:</strong> Ajman Free Zone, UAE</div>
					</div>
					<div class="rbo-consult-cta">
						<a href="https://wa.me/971508051857" class="rbo-btn-whatsapp-hero" target="_blank" rel="noopener">Chat on WhatsApp Instantly</a>
						<a href="' . $site_url . '/contact-us/" class="rbo-btn-gold-hero">Request Call Back</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="rbo-body-container">
		<div class="rbo-trust-card">
			<div class="rbo-trust-icon-wrap">🏛️</div>
			<div class="rbo-trust-text">
				<h3>Official Registered Channel Partner of Ajman Free Zone (AFZA)</h3>
				<p>RBO Accounting Services FZE operates directly from its corporate headquarters in Ajman Free Zone. As an accredited authority partner, we provide direct registrar access, preferential authority package rates starting from <strong>AED 5,555</strong>, priority document verification, and dedicated bank account opening assistance.</p>
			</div>
		</div>
		<h2 class="rbo-section-title">Select Your UAE Setup Jurisdiction</h2>
		<p class="rbo-section-sub">Tailored incorporation strategies designed for your business model and target market:</p>
		<div class="rbo-cards-grid-3">
			<div class="rbo-feature-box">
				<div class="rbo-box-icon">🏢</div>
				<div class="rbo-box-tag">Domestic &amp; Retail</div>
				<h3>UAE Mainland (DED / DET)</h3>
				<p>Trade freely across all 7 emirates, open physical retail shops anywhere, and bid on government tenders with 100% foreign ownership.</p>
				<ul class="rbo-box-list"><li>Direct access to local UAE market</li><li>No office location restrictions</li><li>Government tender eligibility</li></ul>
				<a href="' . $site_url . '/business-setup/mainland-vs-free-zone/" class="rbo-card-link">Compare Mainland vs Free Zone →</a>
			</div>
			<div class="rbo-feature-box rbo-box-highlight">
				<div class="rbo-ribbon">Most Cost-Effective</div>
				<div class="rbo-box-icon">🌐</div>
				<div class="rbo-box-tag">Official Channel Partner</div>
				<h3>Ajman &amp; UAE Free Zones</h3>
				<p>Enjoy 100% foreign ownership, 0% customs duty, 0% Corporate Tax benefits on Qualifying Income, and flexible flexi-desk packages.</p>
				<ul class="rbo-box-list"><li><strong>24–48 Hour license issuance</strong></li><li>Zero-visa to multi-visa packages</li><li>100% profit repatriation</li></ul>
				<a href="' . $site_url . '/business-setup/ajman-free-zone/" class="rbo-card-btn-gold">Explore Ajman Free Zone Setup →</a>
			</div>
			<div class="rbo-feature-box">
				<div class="rbo-box-icon">💼</div>
				<div class="rbo-box-tag">All-In-One Value</div>
				<h3>Setup + Tax Compliance Bundles</h3>
				<p>Avoid the costly AED 10,000 Corporate Tax fine by bundling company formation with mandatory FTA registration and cloud bookkeeping.</p>
				<ul class="rbo-box-list"><li>Trade License + Visas</li><li>FTA Tax Registration</li><li>3-6 Months Bookkeeping</li></ul>
				<a href="' . $site_url . '/business-setup/packages/" class="rbo-card-link">View All-in-One Bundles →</a>
			</div>
		</div>
		<div class="rbo-visual-showcase">
			<div class="rbo-showcase-image-wrap">
				<img src="' . $site_url . '/wp-content/uploads/2026/09/uae-business-setup-consulting.jpg" alt="UAE Business Setup Advisory in Dubai" class="rbo-showcase-img" />
				<div class="rbo-img-floating-tag"><span class="rbo-tag-num">100%</span><span class="rbo-tag-txt">Foreign Equity Ownership</span></div>
			</div>
			<div class="rbo-showcase-content">
				<div class="rbo-mini-pill">Strategic Corporate Formation</div>
				<h3>Accelerate Your UAE Market Entry with Certified Tax &amp; Licensing Partners</h3>
				<p>Forming a business in the UAE requires careful harmonization between licensing authority regulations, banking compliance standards, and Federal Tax Authority (FTA) mandates. RBO ensures your company operates lawfully and profitably from day one.</p>
				<div class="rbo-feature-checklist-grid">
					<div class="rbo-fc-item"><span class="rbo-fc-check">✓</span><div><strong>Zero Personal Income Tax:</strong> Full profit repatriation.</div></div>
					<div class="rbo-fc-item"><span class="rbo-fc-check">✓</span><div><strong>Bank-Ready Compliance:</strong> Swift bank account approvals.</div></div>
					<div class="rbo-fc-item"><span class="rbo-fc-check">✓</span><div><strong>FTA Certified Agents:</strong> Avoid the AED 10,000 penalty.</div></div>
					<div class="rbo-fc-item"><span class="rbo-fc-check">✓</span><div><strong>Investor &amp; Family Visas:</strong> Fast VIP medical &amp; ID stamping.</div></div>
				</div>
			</div>
		</div>
		<div class="rbo-visual-showcase rbo-showcase-reverse">
			<div class="rbo-showcase-content">
				<div class="rbo-mini-pill rbo-pill-gold">Direct Authority Channel Partnership</div>
				<h3>Ajman Free Zone (AFZA) On-The-Ground Authority Liaison</h3>
				<p>As an <strong>Official Registered Channel Partner</strong> physically based inside Ajman Free Zone, RBO eliminates intermediary fees and long waiting periods.</p>
				<ul class="rbo-box-list">
					<li><strong>24–48h Turnaround:</strong> Priority review queue.</li>
					<li><strong>Preferential Tariffs:</strong> Starting from <strong>AED 5,555</strong>.</li>
					<li><strong>Physical Office Presence:</strong> Direct liaison inside AFZA.</li>
				</ul>
				<a href="' . $site_url . '/business-setup/ajman-free-zone/" class="rbo-card-btn-gold">Explore Ajman Channel Partner Benefits →</a>
			</div>
			<div class="rbo-showcase-image-wrap">
				<img src="' . $site_url . '/wp-content/uploads/2026/09/afza-channel-partner-hq.jpg" alt="Ajman Free Zone Official Channel Partner HQ" class="rbo-showcase-img" />
				<div class="rbo-img-floating-tag rbo-tag-gold"><span class="rbo-tag-num">24h</span><span class="rbo-tag-txt">Fast-Track Licensing</span></div>
			</div>
		</div>
		<h2 class="rbo-section-title">End-to-End Company Formation &amp; Licensing Services</h2>
		<p class="rbo-section-sub">From activity mapping to corporate bank account opening, RBO manages every milestone:</p>
		<div class="rbo-scope-grid">
			<div class="rbo-scope-card"><h4>1. Activity Advisory</h4><p>Selecting optimal legal structure (LLC, FZE) matching 2,000+ approved activities.</p></div>
			<div class="rbo-scope-card"><h4>2. Trade Name Approvals</h4><p>Fast-track name reservation complying with UAE naming protocols.</p></div>
			<div class="rbo-scope-card"><h4>3. MOA &amp; Documentation</h4><p>Bilingual Memorandum of Association with electronic notary attestation.</p></div>
			<div class="rbo-scope-card"><h4>4. Office Leasing (Ejari)</h4><p>Flexi-desks, smart offices, and tenancy registration (Ejari/Tawtheeq).</p></div>
			<div class="rbo-scope-card"><h4>5. Residence Visas</h4><p>VIP medical testing, biometric capture, and Emirates ID stamping.</p></div>
			<div class="rbo-scope-card"><h4>6. Bank &amp; Tax Setup</h4><p>Tier-1 corporate bank account opening and Corporate Tax / VAT registration.</p></div>
		</div>
		<h2 class="rbo-section-title">Estimated Cost Breakdown for UAE Business Setup</h2>
		<div class="rbo-table-wrap">
			<table class="rbo-custom-table">
				<thead><tr><th>Jurisdiction</th><th>Starting Fee (AED)</th><th>Visa Quota</th><th>Best Suited For</th></tr></thead>
				<tbody>
					<tr><td><strong>Ajman Free Zone (AFZA)</strong> <span class="rbo-partner-mini">Channel Partner</span></td><td>AED 5,555 – 11,500</td><td>0 to 5 Visas</td><td>Consulting, IT, E-commerce, Marketing, International Trading</td></tr>
					<tr><td><strong>Dubai Free Zones (IFZA / DMCC / Meydan)</strong></td><td>AED 12,900 – 24,000</td><td>1 to 6 Visas</td><td>Tech startups, Commodities, Prestige Dubai addresses</td></tr>
					<tr><td><strong>Dubai Mainland (DET / DED)</strong></td><td>AED 15,000 – 25,000</td><td>Office dependent</td><td>Retail stores, Restaurants, Local UAE contracting</td></tr>
				</tbody>
			</table>
		</div>
		<div class="rbo-bottom-cta">
			<span class="rbo-bottom-badge">Free 30-Minute Consultation</span>
			<h2>Ready to Launch Your UAE Business?</h2>
			<p>Speak directly with our official Ajman Free Zone Channel Partner specialists and certified tax advisors in Dubai &amp; Ajman. Get a transparent, itemized quote with zero hidden charges.</p>
			<div class="rbo-bottom-btn-group">
				<a href="' . $site_url . '/contact-us/" class="rbo-btn-gold-big">Book Free Consultation</a>
				<a href="https://wa.me/971508051857" class="rbo-btn-whatsapp-big" target="_blank" rel="noopener">WhatsApp Us: +971 50 805 1857</a>
			</div>
		</div>
	</div>
</div>'
	),

	'mainland-vs-free-zone' => array(
		'title'       => 'Mainland vs Free Zone UAE: Complete Comparison Guide',
		'focus_kw'    => 'mainland vs free zone UAE',
		'meta_desc'   => 'Compare UAE Mainland vs Free Zone company formation: foreign ownership, local market trading, corporate tax rates, office requirements, and visa costs.',
		'service_type'=> 'Jurisdiction Comparison Advisory',
		'parent'      => 'business-setup',
		'faqs'        => array(
			array( 'q' => 'Can a Free Zone company do business in the UAE mainland?', 'a' => 'Free zone companies can trade internationally, transact freely with other free zones, and provide B2B professional services to mainland entities. To sell physical goods directly into the mainland consumer retail market, a free zone company can appoint a mainland commercial distributor or open a mainland branch.' ),
			array( 'q' => 'Does a Free Zone company pay 0% UAE Corporate Tax?', 'a' => 'A Qualifying Free Zone Person (QFZP) can benefit from a 0% Corporate Tax rate on "Qualifying Income" (such as transactions with other Free Zone persons, export of goods/services, and treasury/financing activities) provided they maintain adequate economic substance and prepare audited financial statements.' )
		),
		'content'     => $style_block . '
<div class="rbo-elementor-service-wrapper">
	<section class="rbo-hero-section">
		<div class="rbo-hero-container">
			<div class="rbo-hero-left">
				<div class="rbo-partner-badge">Strategic Structuring Advisory</div>
				<h1 class="rbo-hero-heading">Mainland vs Free Zone: Choosing Your <span class="rbo-gold-text">UAE Foundation</span></h1>
				<p class="rbo-hero-lead">A comprehensive comparison to help entrepreneurs evaluate market reach, 0% Corporate Tax qualifying status, office leasing (Ejari), and visa allocations.</p>
				<div class="rbo-hero-points">
					<div class="rbo-hero-point"><span class="rbo-check-icon">✓</span> <span><strong>Mainland:</strong> 100% freedom to trade across the entire local UAE market</span></div>
					<div class="rbo-hero-point"><span class="rbo-check-icon">✓</span> <span><strong>Free Zone:</strong> 0% Corporate Tax on Qualifying Income &amp; flexi-desks</span></div>
				</div>
			</div>
			<div class="rbo-hero-right">
				<div class="rbo-consult-card">
					<h3>Jurisdiction Assessment</h3>
					<p class="rbo-consult-subtitle">Let our corporate structuring advisors assess your business activities for free.</p>
					<div class="rbo-consult-features">
						<div class="rbo-cf-item">📞 <strong>Direct Call:</strong> +971 50 805 1857</div>
						<div class="rbo-cf-item">💬 <strong>WhatsApp:</strong> +971 50 805 1857</div>
					</div>
					<div class="rbo-consult-cta">
						<a href="' . $site_url . '/contact-us/" class="rbo-btn-gold-hero">Get Free Assessment</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="rbo-body-container">
		<div class="rbo-visual-showcase">
			<div class="rbo-showcase-image-wrap">
				<img src="' . $site_url . '/wp-content/uploads/2026/09/uae-business-setup-consulting.jpg" alt="Mainland vs Free Zone Setup Comparison" class="rbo-showcase-img" />
			</div>
			<div class="rbo-showcase-content">
				<div class="rbo-mini-pill">Decision Matrix</div>
				<h3>Aligning Corporate Scope with Tax Efficiency</h3>
				<p>Your choice of jurisdiction defines where you can invoice, how customs duties are assessed on imported inventory, and whether your profits qualify for the <strong>0% Corporate Tax regime for Qualifying Free Zone Persons</strong>.</p>
				<div class="rbo-fc-item"><span class="rbo-fc-check">✓</span><div><strong>Mainland:</strong> Best for local commercial storefronts, construction, and government tenders.</div></div>
				<div class="rbo-fc-item"><span class="rbo-fc-check">✓</span><div><strong>Free Zone:</strong> Best for digital agencies, consulting, IT, and cross-border trade.</div></div>
			</div>
		</div>
		<h2 class="rbo-section-title">Head-to-Head Comparison: Mainland vs Free Zone</h2>
		<p class="rbo-section-sub">Key legal, operational, and financial differences at a glance:</p>
		<div class="rbo-table-wrap">
			<table class="rbo-custom-table">
				<thead><tr><th>Key Feature</th><th>UAE Mainland (DET / DED)</th><th>UAE Free Zone (e.g. AFZA, IFZA)</th></tr></thead>
				<tbody>
					<tr><td><strong>Foreign Ownership</strong></td><td>100% on 1,000+ commercial activities</td><td>100% on all permitted activities</td></tr>
					<tr><td><strong>Market Scope</strong></td><td>Unrestricted local UAE market &amp; tenders</td><td>Global markets &amp; Free Zone B2B</td></tr>
					<tr><td><strong>Corporate Tax Rate</strong></td><td>Standard 9% above AED 375k</td><td><strong>0% on Qualifying Income</strong> (QFZP)</td></tr>
					<tr><td><strong>Office Requirement</strong></td><td>Physical lease with Ejari</td><td>Flexible flexi-desk or virtual office</td></tr>
					<tr><td><strong>Customs Duty</strong></td><td>5% standard duty</td><td>0% customs duty within free zones</td></tr>
					<tr><td><strong>Setup Timeframe</strong></td><td>3 to 7 working days</td><td><strong>24 to 48 hours</strong> via AFZA</td></tr>
				</tbody>
			</table>
		</div>
		<div class="rbo-cards-grid-2">
			<div class="rbo-feature-box">
				<h3>Choose Mainland If:</h3>
				<ul class="rbo-box-list">
					<li>You operate retail shops, restaurants, or clinics.</li>
					<li>You plan to bid directly on UAE government tenders.</li>
					<li>You provide on-site contracting across UAE cities.</li>
				</ul>
			</div>
			<div class="rbo-feature-box rbo-box-highlight">
				<h3>Choose Free Zone If:</h3>
				<ul class="rbo-box-list">
					<li>You run a consulting firm, digital agency, or SaaS business.</li>
					<li>You want low initial overheads with flexi-desks.</li>
					<li>You want to leverage <strong>0% Corporate Tax</strong> on Qualifying Income.</li>
				</ul>
			</div>
		</div>
		<div class="rbo-bottom-cta">
			<h2>Still Unsure Which Setup Fits Your Business?</h2>
			<p>Speak directly with our dual corporate structuring and FTA tax team for personalized advice.</p>
			<div class="rbo-bottom-btn-group">
				<a href="' . $site_url . '/contact-us/" class="rbo-btn-gold-big">Request Free Assessment</a>
				<a href="https://wa.me/971508051857" class="rbo-btn-whatsapp-big" target="_blank" rel="noopener">WhatsApp Consultation</a>
			</div>
		</div>
	</div>
</div>'
	),

	'dubai' => array(
		'title'       => 'Dubai Business Setup & Company Formation',
		'focus_kw'    => 'Dubai business setup',
		'meta_desc'   => 'Complete Dubai company setup advisory across Dubai Mainland (DED/DET) and top Dubai Free Zones (DMCC, IFZA, DAFZA, Meydan). Fast trade license approvals.',
		'service_type'=> 'Dubai Company Formation',
		'parent'      => 'business-setup',
		'faqs'        => array(
			array( 'q' => 'What are the main types of trade licenses in Dubai?', 'a' => 'The three primary Dubai license categories are Commercial License (trading of goods & commodities), Professional License (services, consulting, IT & creative arts), and Industrial License (manufacturing and product assembly).' ),
			array( 'q' => 'Which are the most popular Free Zones in Dubai?', 'a' => 'IFZA (Dubai Silicon Oasis) is popular for affordable consulting and trading packages; DMCC (Jumeirah Lakes Towers) is premier for global commodities, crypto, and financial services; Meydan Free Zone offers prestigious Downtown-adjacent setups; and DAFZA specializes in aviation, freight, and electronics.' )
		),
		'content'     => $style_block . '
<div class="rbo-elementor-service-wrapper">
	<section class="rbo-hero-section">
		<div class="rbo-hero-container">
			<div class="rbo-hero-left">
				<div class="rbo-partner-badge">Dubai Commercial Hub</div>
				<h1 class="rbo-hero-heading">Dubai Business Setup &amp; <span class="rbo-gold-text">Company Formation</span></h1>
				<p class="rbo-hero-lead">Establish your company in the Middle East\'s commercial capital across Dubai Mainland (DET / DED) and premier Dubai Free Zones.</p>
				<div class="rbo-hero-points">
					<div class="rbo-hero-point"><span class="rbo-check-icon">✓</span> <span><strong>Instant DED Licenses:</strong> Fast commercial &amp; professional licensing</span></div>
					<div class="rbo-hero-point"><span class="rbo-check-icon">✓</span> <span><strong>Top Dubai Free Zones:</strong> IFZA, DMCC, Meydan, DAFZA</span></div>
				</div>
			</div>
			<div class="rbo-hero-right">
				<div class="rbo-consult-card">
					<h3>Get Dubai Setup Quote</h3>
					<p class="rbo-consult-subtitle">Transparent pricing with zero hidden authority charges.</p>
					<div class="rbo-consult-features">
						<div class="rbo-cf-item">📞 <strong>Direct Call:</strong> +971 50 805 1857</div>
						<div class="rbo-cf-item">💬 <strong>WhatsApp:</strong> +971 50 805 1857</div>
					</div>
					<div class="rbo-consult-cta">
						<a href="' . $site_url . '/contact-us/" class="rbo-btn-gold-hero">Get Dubai Quote</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="rbo-body-container">
		<div class="rbo-visual-showcase">
			<div class="rbo-showcase-image-wrap">
				<img src="' . $site_url . '/wp-content/uploads/2026/09/uae-business-setup-consulting.jpg" alt="Dubai Business Setup &amp; Formation" class="rbo-showcase-img" />
			</div>
			<div class="rbo-showcase-content">
				<div class="rbo-mini-pill">Global Commercial Gateway</div>
				<h3>Incorporate in Dubai with Turnkey Support</h3>
				<p>Dubai provides unparalleled access to high-net-worth investors, sovereign trade networks, and multinational corporate headquarters. RBO manages your initial name approvals, tenancy contracts, and Chamber of Commerce registration.</p>
				<ul class="rbo-box-list">
					<li><strong>Instant Digital Issuance:</strong> Available for eligible commercial activities.</li>
					<li><strong>Prime Downtown &amp; Marina Presence:</strong> Flexi-desk and commercial office solutions.</li>
				</ul>
			</div>
		</div>
		<h2 class="rbo-section-title">Dubai Setup Jurisdictions</h2>
		<div class="rbo-cards-grid-2">
			<div class="rbo-feature-box">
				<h3>Dubai Mainland (DET / DED)</h3>
				<p>Direct licensing issued by the Dubai Department of Economy and Tourism. Ideal for corporations wanting physical retail stores, warehouse operations, or direct government supply contracts.</p>
				<ul class="rbo-box-list">
					<li>Instant License options available</li>
					<li>Complete access to prime Dubai commercial real estate</li>
					<li>Unrestricted trading with UAE mainland corporations</li>
				</ul>
			</div>
			<div class="rbo-feature-box rbo-box-highlight">
				<h3>Premier Dubai Free Zones</h3>
				<p>Specialized economic zones tailored for international trade, tech, and financial consulting:</p>
				<ul class="rbo-box-list">
					<li><strong>IFZA:</strong> Highly competitive packages for tech &amp; consulting</li>
					<li><strong>DMCC:</strong> World\'s leading free zone for commodities &amp; fintech</li>
					<li><strong>Meydan:</strong> Prestigious location with 100% digital onboarding</li>
				</ul>
			</div>
		</div>
		<div class="rbo-bottom-cta">
			<h2>Start Your Dubai Business Setup Today</h2>
			<p>Get a detailed cost proposal tailored to your business model with integrated tax advisory.</p>
			<div class="rbo-bottom-btn-group">
				<a href="' . $site_url . '/contact-us/" class="rbo-btn-gold-big">Book Free Consultation</a>
				<a href="https://wa.me/971508051857" class="rbo-btn-whatsapp-big" target="_blank" rel="noopener">WhatsApp Our Dubai Desk</a>
			</div>
		</div>
	</div>
</div>'
	),

	'ajman-free-zone' => array(
		'title'       => 'Ajman Free Zone Setup (AFZA) — Official Channel Partner',
		'focus_kw'    => 'Ajman free zone setup',
		'meta_desc'   => 'Set up your company in Ajman Free Zone (AFZA) with an Official Registered Channel Partner. 24-48 hour trade licensing, low-cost packages, and on-the-ground support.',
		'service_type'=> 'Ajman Free Zone Setup',
		'parent'      => 'business-setup',
		'faqs'        => array(
			array( 'q' => 'Why is RBO Accounting the best choice for Ajman Free Zone setup?', 'a' => 'RBO Accounting Services FZE is an Official Registered Channel Partner of Ajman Free Zone with physical headquarters located right within the zone. We have direct daily access to authority registrars, enabling 24-48 hour license issuance, VIP handling, and direct issue resolution with zero middleman markups.' ),
			array( 'q' => 'What is the starting package price for an Ajman Free Zone license?', 'a' => 'Through RBO\'s official channel partnership, zero-visa starter packages in Ajman Free Zone start from just AED 5,555, while packages including flexi-desk and 1-2 residence visas range between AED 9,500 and AED 14,000 with flexible installment options.' )
		),
		'content'     => $style_block . '
<div class="rbo-elementor-service-wrapper">
	<section class="rbo-hero-section">
		<div class="rbo-hero-container">
			<div class="rbo-hero-left">
				<div class="rbo-partner-badge">★ Official Ajman Free Zone (AFZA) Registered Channel Partner</div>
				<h1 class="rbo-hero-heading">Ajman Free Zone Setup: Fast, Affordable &amp; <span class="rbo-gold-text">Direct Authority Support</span></h1>
				<p class="rbo-hero-lead">Incorporate in 24–48 hours with RBO Accounting Services FZE—your accredited, on-the-ground channel partner headquartered inside Ajman Free Zone.</p>
				<div class="rbo-hero-points">
					<div class="rbo-hero-point"><span class="rbo-check-icon">✓</span> <span><strong>24–48 Hour Licensing:</strong> Direct registrar VIP fast-track</span></div>
					<div class="rbo-hero-point"><span class="rbo-check-icon">✓</span> <span><strong>Budget Friendly:</strong> Official packages starting from AED 5,555</span></div>
					<div class="rbo-hero-point"><span class="rbo-check-icon">✓</span> <span><strong>Zero Middleman Markups:</strong> Transparent official tariffs</span></div>
				</div>
			</div>
			<div class="rbo-hero-right">
				<div class="rbo-consult-card">
					<h3>Official AFZA Desk</h3>
					<p class="rbo-consult-subtitle">Direct VIP registrar onboarding with our on-site team.</p>
					<div class="rbo-consult-features">
						<div class="rbo-cf-item">📞 <strong>Direct Call:</strong> +971 50 805 1857</div>
						<div class="rbo-cf-item">💬 <strong>WhatsApp:</strong> +971 50 805 1857</div>
						<div class="rbo-cf-item">📍 <strong>HQ:</strong> Ajman Free Zone, UAE</div>
					</div>
					<div class="rbo-consult-cta">
						<a href="https://wa.me/971508051857" class="rbo-btn-whatsapp-hero" target="_blank" rel="noopener">WhatsApp Ajman Desk</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="rbo-body-container">
		<div class="rbo-visual-showcase rbo-showcase-reverse">
			<div class="rbo-showcase-content">
				<div class="rbo-mini-pill rbo-pill-gold">On-The-Ground Authority Presence</div>
				<h3>Why Setup with RBO as Your Official AFZA Channel Partner?</h3>
				<p>As an <strong>Official Registered Channel Partner</strong> with physical headquarters inside Ajman Free Zone, RBO provides expedited 24–48h processing, zero intermediary surcharges, on-site document handling, and day-one Corporate Tax compliance on EmaraTax.</p>
				<ul class="rbo-box-list">
					<li><strong>Direct Registrar Submission:</strong> VIP processing without agent layers.</li>
					<li><strong>Official AFZA Rates:</strong> Transparent packages starting from AED 5,555.</li>
					<li><strong>Dedicated Account Manager:</strong> On-the-ground support from start to finish.</li>
				</ul>
			</div>
			<div class="rbo-showcase-image-wrap">
				<img src="' . $site_url . '/wp-content/uploads/2026/09/afza-channel-partner-hq.jpg" alt="Ajman Free Zone Channel Partner Headquarters" class="rbo-showcase-img" />
			</div>
		</div>
		<h2 class="rbo-section-title">AFZA License Categories</h2>
		<div class="rbo-cards-grid-3">
			<div class="rbo-feature-box">
				<h4>Commercial &amp; Trading</h4>
				<p>Import, export, storage, and distribution of physical goods across global supply chains.</p>
			</div>
			<div class="rbo-feature-box rbo-box-highlight">
				<h4>Service &amp; Consultancy</h4>
				<p>Management consultancy, IT architecture, digital marketing, and professional advisory.</p>
			</div>
			<div class="rbo-feature-box">
				<h4>E-Commerce License</h4>
				<p>Online retail, digital marketplace operations, SaaS platforms, and electronic payment processing.</p>
			</div>
		</div>
		<div class="rbo-bottom-cta">
			<h2>Get Your Ajman Free Zone License in 24 Hours</h2>
			<p>Speak directly with RBO\'s on-the-ground Ajman Free Zone team for preferential pricing and expedited trade license delivery.</p>
			<div class="rbo-bottom-btn-group">
				<a href="' . $site_url . '/contact-us/" class="rbo-btn-gold-big">Consult with Ajman Partner</a>
				<a href="https://wa.me/971508051857" class="rbo-btn-whatsapp-big" target="_blank" rel="noopener">WhatsApp Our Ajman Desk</a>
			</div>
		</div>
	</div>
</div>'
	),

	'trade-licence-process' => array(
		'title'       => 'UAE Trade Licence Process: 5-Step Step-by-Step Guide',
		'focus_kw'    => 'trade licence process UAE',
		'meta_desc'   => 'Step-by-step roadmap to getting your UAE trade licence. Activity selection, name reservation, MOA notarization, Ejari lease, and corporate bank account.',
		'service_type'=> 'Trade Licensing Advisory',
		'parent'      => 'business-setup',
		'faqs'        => array(
			array( 'q' => 'What documents are required to obtain a UAE trade licence?', 'a' => 'Individual shareholders require: passport copies, entry visa stamp (or Emirates ID copy if resident), 3 proposed company names, and contact details. Corporate entities require attested certificates of incorporation, MOA, and Board Resolutions.' ),
			array( 'q' => 'When must I register for Corporate Tax after getting my license?', 'a' => 'Under FTA Decision No. 3 of 2024, all newly incorporated UAE legal entities must register for Corporate Tax within the statutory deadline (typically within 3 months of incorporation date) to prevent an automatic AED 10,000 penalty.' )
		),
		'content'     => $style_block . '
<div class="rbo-elementor-service-wrapper">
	<section class="rbo-hero-section">
		<div class="rbo-hero-container">
			<div class="rbo-hero-left">
				<div class="rbo-partner-badge">Step-by-Step Licensing Roadmap</div>
				<h1 class="rbo-hero-heading">The UAE Trade Licence Process: From Vision to <span class="rbo-gold-text">Operating Business</span></h1>
				<p class="rbo-hero-lead">A seamless 5-step roadmap managed by RBO Accounting to secure your commercial trade license without delays or administrative hurdles.</p>
			</div>
			<div class="rbo-hero-right">
				<div class="rbo-consult-card">
					<h3>Free Activity Pre-Check</h3>
					<p class="rbo-consult-subtitle">We will check your trade activity and name availability in 2 hours.</p>
					<div class="rbo-consult-cta">
						<a href="' . $site_url . '/contact-us/" class="rbo-btn-gold-hero">Start Activity Pre-Check</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="rbo-body-container">
		<h2 class="rbo-section-title">5-Step Incorporation Roadmap</h2>
		<div class="rbo-timeline-modern">
			<div class="rbo-t-item"><div class="rbo-t-badge">1</div><div class="rbo-t-content"><h4>Step 1: Activity Classification &amp; Legal Structure</h4><p>Choose from 2,000+ approved activities. Select optimal legal structure (LLC, FZE) protecting shareholder liability.</p></div></div>
			<div class="rbo-t-item"><div class="rbo-t-badge">2</div><div class="rbo-t-content"><h4>Step 2: Trade Name Reservation &amp; Initial Approvals</h4><p>Reserve 3 trade names compliant with UAE naming standards and receive initial authority clearance.</p></div></div>
			<div class="rbo-t-item"><div class="rbo-t-badge">3</div><div class="rbo-t-content"><h4>Step 3: MOA Drafting &amp; Legal Notarization</h4><p>Draft Memorandum of Association (MOA) and finalize electronic notarization for all shareholders.</p></div></div>
			<div class="rbo-t-item"><div class="rbo-t-badge">4</div><div class="rbo-t-content"><h4>Step 4: Commercial Space &amp; License Issuance</h4><p>Finalize flexi-desk or office lease (Ejari). Settle license vouchers to receive your official UAE Trade License.</p></div></div>
			<div class="rbo-t-item"><div class="rbo-t-badge">5</div><div class="rbo-t-content"><h4>Step 5: Visas, Bank Account &amp; Tax Registration</h4><p>Process residence visas, open corporate bank accounts, and register for Corporate Tax on EmaraTax.</p></div></div>
		</div>
		<div class="rbo-bottom-cta">
			<h2>Ready to Begin Step 1?</h2>
			<p>Our licensing specialists will conduct a free preliminary activity and name check for your business.</p>
			<div class="rbo-bottom-btn-group">
				<a href="' . $site_url . '/contact-us/" class="rbo-btn-gold-big">Start Free Activity Check</a>
			</div>
		</div>
	</div>
</div>'
	),

	'packages' => array(
		'title'       => 'UAE Business Setup Packages & Service Bundles',
		'focus_kw'    => 'UAE business setup packages',
		'meta_desc'   => 'All-in-one UAE business setup packages bundled with VAT registration, Corporate Tax compliance, and cloud bookkeeping. Save money & avoid FTA penalties.',
		'service_type'=> 'Company Formation Packages',
		'parent'      => 'business-setup',
		'faqs'        => array(
			array( 'q' => 'Why are bundled packages significantly more valuable than standalone setup?', 'a' => 'Hiring separate licensing agents, accountants, and tax advisors leads to conflicting advice, duplicated service fees, and critical compliance oversights. Our bundled packages provide a unified team ensuring your trade license is structured in harmony with Corporate Tax rules and audit requirements.' ),
			array( 'q' => 'What is the AED 10,000 Corporate Tax penalty and how do your packages protect me?', 'a' => 'Under FTA Decision No. 3 of 2024, every new UAE business must register for Corporate Tax within statutory deadlines or incur an automatic AED 10,000 fine. All RBO packages include mandatory FTA Corporate Tax registration handled by our certified tax agents.' )
		),
		'content'     => $style_block . '
<div class="rbo-elementor-service-wrapper">
	<section class="rbo-hero-section">
		<div class="rbo-hero-container">
			<div class="rbo-hero-left">
				<div class="rbo-partner-badge">★ Official Ajman Free Zone (AFZA) Channel Partner</div>
				<h1 class="rbo-hero-heading">All-In-One UAE Setup, Tax &amp; <span class="rbo-gold-text">Bookkeeping Bundles</span></h1>
				<p class="rbo-hero-lead">Combine company incorporation with mandatory FTA Corporate Tax registration, VAT compliance, and cloud bookkeeping to operate penalty-free from day one.</p>
			</div>
			<div class="rbo-hero-right">
				<div class="rbo-consult-card">
					<h3>Custom Package Quote</h3>
					<p class="rbo-consult-subtitle">Tailored for your specific headcount and visa needs.</p>
					<div class="rbo-consult-cta">
						<a href="' . $site_url . '/contact-us/" class="rbo-btn-gold-hero">Request Custom Quote</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="rbo-body-container">
		<h2 class="rbo-section-title">Integrated Business Formation Packages</h2>
		<p class="rbo-section-sub">Transparent bundles with no hidden government surcharges:</p>
		<div class="rbo-packages-grid-modern">
			<div class="rbo-pkg-box">
				<div class="rbo-pkg-top">
					<h3>Starter Launch</h3>
					<p class="rbo-pkg-sub">Setup + Corporate Tax</p>
					<div class="rbo-pkg-pill">AFZA Channel Partner Option</div>
				</div>
				<ul class="rbo-pkg-ul">
					<li>✓ Trade License (Mainland or Free Zone)</li>
					<li>✓ MOA &amp; Notarized Legal Documents</li>
					<li>✓ Establishment Card &amp; Immigration File</li>
					<li>✓ 1 Investor Residence Visa Processing</li>
					<li>✓ <strong>Corporate Tax Registration with FTA</strong> (Avoid AED 10k penalty)</li>
					<li>✓ Bank Account Introduction &amp; Dossier</li>
				</ul>
				<a href="' . $site_url . '/contact-us/" class="rbo-pkg-action-btn">Choose Starter Launch</a>
			</div>
			<div class="rbo-pkg-box rbo-pkg-popular">
				<div class="rbo-pkg-badge-tag">Most Popular</div>
				<div class="rbo-pkg-top">
					<h3>Growth Bundle</h3>
					<p class="rbo-pkg-sub">Setup + Tax + VAT + 3 Mo Accounting</p>
					<div class="rbo-pkg-pill rbo-pill-gold">Scaling Businesses</div>
				</div>
				<ul class="rbo-pkg-ul">
					<li>✓ Trade License (Mainland or Free Zone)</li>
					<li>✓ 2 Residence Visas Processing (VIP Medical + ID)</li>
					<li>✓ <strong>Corporate Tax Registration &amp; Advisory</strong></li>
					<li>✓ <strong>VAT Assessment &amp; EmaraTax Registration</strong></li>
					<li>✓ <strong>3 Months Cloud Bookkeeping</strong> (QuickBooks/Xero)</li>
					<li>✓ Monthly Management Profit &amp; Loss Reports</li>
					<li>✓ Priority Bank Account Opening Concierge</li>
					<li>✓ Dedicated FTA Registered Tax Agent</li>
				</ul>
				<a href="' . $site_url . '/contact-us/" class="rbo-pkg-action-btn rbo-btn-gold-full">Choose Growth Bundle</a>
			</div>
			<div class="rbo-pkg-box">
				<div class="rbo-pkg-top">
					<h3>Enterprise Scale</h3>
					<p class="rbo-pkg-sub">Full Formation + Virtual CFO</p>
					<div class="rbo-pkg-pill">Multi-Shareholder Entities</div>
				</div>
				<ul class="rbo-pkg-ul">
					<li>✓ Multi-Shareholder LLC / Free Zone License</li>
					<li>✓ Bespoke Shareholder Agreements &amp; POAs</li>
					<li>✓ Up to 4 Residence Visas Included</li>
					<li>✓ Full Corporate Tax + VAT Filing Support</li>
					<li>✓ <strong>6 Months Complete Bookkeeping &amp; Payroll</strong></li>
					<li>✓ <strong>Quarterly Virtual CFO Review</strong></li>
					<li>✓ VIP Tier-1 Bank Account Concierge</li>
				</ul>
				<a href="' . $site_url . '/contact-us/" class="rbo-pkg-action-btn">Choose Enterprise Scale</a>
			</div>
		</div>
		<div class="rbo-bottom-cta">
			<h2>Need a Bespoke Package for Your Industry?</h2>
			<p>We configure custom bundles matching your specific visa headcount, office requirements, and transaction volume.</p>
			<div class="rbo-bottom-btn-group">
				<a href="' . $site_url . '/contact-us/" class="rbo-btn-gold-big">Request Custom Bundle Quote</a>
			</div>
		</div>
	</div>
</div>'
	)
);

$created_ids = array();

// 1. Process Main Hub Page
$hub_item = $pages['business-setup'];
$existing_hub = get_page_by_path( 'business-setup' );
$hub_post_arr = array(
	'post_title'   => $hub_item['title'],
	'post_name'    => 'business-setup',
	'post_status'  => 'publish',
	'post_type'    => 'page',
	'post_parent'  => 0,
	'post_content' => $hub_item['content'],
);

if ( $existing_hub ) {
	$hub_post_arr['ID'] = $existing_hub->ID;
	$hub_id = wp_update_post( $hub_post_arr );
} else {
	$hub_id = wp_insert_post( $hub_post_arr );
}
$created_ids['business-setup'] = $hub_id;
update_post_meta( $hub_id, 'rank_math_title', $hub_item['title'] . ' | RBO Accounting' );
update_post_meta( $hub_id, 'rank_math_description', $hub_item['meta_desc'] );
update_post_meta( $hub_id, 'rank_math_focus_keyword', $hub_item['focus_kw'] );
update_post_meta( $hub_id, '_rbo_faq_schema', $hub_item['faqs'] );
update_post_meta( $hub_id, '_elementor_page_settings', array( 'hide_title' => 'yes' ) );
update_post_meta( $hub_id, '_rbo_service_schema', array( 'name' => $hub_item['title'], 'description' => $hub_item['meta_desc'], 'serviceType' => $hub_item['service_type'] ) );

// 2. Process Child Pages
foreach ( $pages as $slug => $item ) {
	if ( 'business-setup' === $slug ) {
		continue;
	}

	$existing_child = get_page_by_path( 'business-setup/' . $slug );
	if ( ! $existing_child ) {
		$existing_child = get_page_by_path( $slug );
	}

	$child_arr = array(
		'post_title'   => $item['title'],
		'post_name'    => $slug,
		'post_status'  => 'publish',
		'post_type'    => 'page',
		'post_parent'  => $hub_id,
		'post_content' => $item['content'],
	);

	if ( $existing_child ) {
		$child_arr['ID'] = $existing_child->ID;
		$child_id = wp_update_post( $child_arr );
	} else {
		$child_id = wp_insert_post( $child_arr );
	}

	$created_ids[ $slug ] = $child_id;
	update_post_meta( $child_id, 'rank_math_title', $item['title'] . ' | RBO Accounting' );
	update_post_meta( $child_id, 'rank_math_description', $item['meta_desc'] );
	update_post_meta( $child_id, 'rank_math_focus_keyword', $item['focus_kw'] );
	update_post_meta( $child_id, '_rbo_faq_schema', $item['faqs'] );
	update_post_meta( $child_id, '_elementor_page_settings', array( 'hide_title' => 'yes' ) );
	update_post_meta( $child_id, '_rbo_service_schema', array( 'name' => $item['title'], 'description' => $item['meta_desc'], 'serviceType' => $item['service_type'] ) );
}

// 3. Inject Master CSS directly into Theme style.css
$theme_dir = get_stylesheet_directory();
$theme_style = $theme_dir . '/style.css';
if ( file_exists( $theme_style ) && is_writable( $theme_style ) ) {
	$current_theme_css = file_get_contents( $theme_style );
	file_put_contents( $theme_style, $current_theme_css . "\n\n" . $master_css );
}

// 4. Update mu-plugins file
$mu_dir = WP_CONTENT_DIR . '/mu-plugins';
if ( ! is_dir( $mu_dir ) ) {
	@mkdir( $mu_dir, 0755, true );
}
$mu_code = '<?php
defined("ABSPATH") || exit;
add_action("wp_head", function() {
	echo "<style id=\"rbo-luxury-global-css\">\n' . addcslashes( $master_css, '"' ) . "\n</style>\n\";
}, 1);
";
@file_put_contents( $mu_dir . '/rbo-business-setup-css.php', $mu_code );

// 5. Update Customizer CSS
if ( function_exists( 'wp_update_custom_css_post' ) ) {
	wp_update_custom_css_post( $master_css );
}

// 6. Update WordPress Navigation Menus (Insert under "Our Services")
$nav_menus = wp_get_nav_menus();
if ( empty( $nav_menus ) ) {
	$nav_menus = get_terms( array( 'taxonomy' => 'nav_menu', 'hide_empty' => false ) );
}
$menu_results = array();

if ( ! empty( $nav_menus ) && ! is_wp_error( $nav_menus ) ) {
	foreach ( $nav_menus as $menu ) {
		$menu_id = is_object( $menu ) && isset( $menu->term_id ) ? $menu->term_id : (int) $menu;
		$menu_obj = is_object( $menu ) ? $menu : get_term( $menu_id, 'nav_menu' );
		$menu_name = $menu_obj && ! is_wp_error( $menu_obj ) ? $menu_obj->name : 'Menu #' . $menu_id;

		$menu_items = wp_get_nav_menu_items( $menu_id );
		if ( false === $menu_items ) {
			$menu_items = array();
		}

		// 1. Find "Our Services" parent item ID
		$services_item_id = 0;
		foreach ( $menu_items as $m_item ) {
			if ( stripos( $m_item->title, 'Services' ) !== false || stripos( $m_item->url, 'our-services' ) !== false ) {
				$services_item_id = $m_item->ID;
				break;
			}
		}

		// 2. Check if Business Setup is already in this menu
		$biz_setup_item_id = 0;
		foreach ( $menu_items as $m_item ) {
			if ( (int) $m_item->object_id === (int) $hub_id || stripos( $m_item->title, 'Business Setup' ) !== false ) {
				$biz_setup_item_id = $m_item->ID;
				break;
			}
		}

		// Add "Business Setup & Company Formation" if not present
		if ( ! $biz_setup_item_id ) {
			$biz_setup_item_id = wp_update_nav_menu_item( $menu_id, 0, array(
				'menu-item-title'     => 'Business Setup & Company Formation',
				'menu-item-object-id' => $hub_id,
				'menu-item-object'    => 'page',
				'menu-item-type'      => 'post_type',
				'menu-item-status'    => 'publish',
				'menu-item-parent-id' => $services_item_id,
			) );
			$menu_results[] = '✓ Added <strong>Business Setup & Company Formation</strong> to Navigation Menu: <em>' . esc_html( $menu_name ) . '</em> (under parent ID: ' . $services_item_id . ')';
		} else {
			$menu_results[] = '✓ Business Setup already present in Navigation Menu: <em>' . esc_html( $menu_name ) . '</em>';
		}

		// 3. Add sub-items under "Business Setup"
		$sub_items = array(
			'ajman-free-zone'       => 'Ajman Free Zone (AFZA)',
			'mainland-vs-free-zone' => 'Mainland vs Free Zone',
			'dubai'                 => 'Dubai Business Setup',
			'trade-licence-process' => 'Trade Licence Process',
			'packages'              => 'Setup Packages',
		);

		// Refresh menu items list
		$menu_items = wp_get_nav_menu_items( $menu_id );
		foreach ( $sub_items as $s_slug => $s_title ) {
			$s_id = isset( $created_ids[ $s_slug ] ) ? $created_ids[ $s_slug ] : 0;
			if ( ! $s_id ) {
				continue;
			}

			$sub_exists = false;
			foreach ( $menu_items as $m_item ) {
				if ( (int) $m_item->object_id === (int) $s_id || stripos( $m_item->title, $s_title ) !== false ) {
					$sub_exists = true;
					break;
				}
			}

			if ( ! $sub_exists && $biz_setup_item_id ) {
				wp_update_nav_menu_item( $menu_id, 0, array(
					'menu-item-title'     => $s_title,
					'menu-item-object-id' => $s_id,
					'menu-item-object'    => 'page',
					'menu-item-type'      => 'post_type',
					'menu-item-status'    => 'publish',
					'menu-item-parent-id' => $biz_setup_item_id,
				) );
				$menu_results[] = '✓ Added submenu <strong>' . esc_html( $s_title ) . '</strong> in <em>' . esc_html( $menu_name ) . '</em>';
			}
		}
	}
} else {
	$menu_results[] = '⚠️ No registered navigation menus found in database.';
}

// 7. Flush rewrite rules
flush_rewrite_rules( false );

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>RBO All Pages Fixed Successfully</title>
<style>
body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #0b1528; color: #f8fafc; padding: 40px 20px; }
.card { max-width: 720px; margin: 0 auto; background: #16243d; border-radius: 16px; padding: 36px; box-shadow: 0 10px 30px rgba(0,0,0,0.4); border: 1px solid #233554; }
h1 { color: #e8b84b; margin-top: 0; font-size: 24px; }
.step { padding: 12px 16px; margin-bottom: 10px; background: #1e3152; border-radius: 8px; border-left: 4px solid #4ade80; font-size: 14px; color: #f1f5f9; }
.btn { display: inline-block; background: #e8b84b; color: #09203b !important; font-weight: 800; padding: 14px 28px; border-radius: 8px; text-decoration: none; margin-top: 24px; font-size: 15px; }
.btn:hover { background: #f4ca68; }
.link-list { margin-top: 20px; padding: 15px; background: #0f1c30; border-radius: 8px; }
.link-list a { color: #60a5fa; text-decoration: underline; display: block; margin: 8px 0; }
</style>
</head>
<body>
<div class="card">
<h1>🎉 All 6 Business Setup Pages Fixed &amp; Synchronized!</h1>
<div class="step">✓ Master Luxury Design &amp; CSS embedded directly into all pages</div>
<div class="step">✓ Injected styles into Theme stylesheet &amp; mu-plugins</div>
<div class="step">✓ Updated Rank Math SEO metadata, FAQs &amp; Schema.org tags</div>
<?php foreach ( $menu_results as $m_res ) : ?>
	<div class="step"><?php echo $m_res; ?></div>
<?php endforeach; ?>
<div class="link-list">
<?php
foreach ( $created_ids as $slug => $id ) {
	$url = get_permalink( $id );
	echo '<a href="' . esc_url( $url ) . '" target="_blank">🔗 ' . esc_html( get_the_title( $id ) ) . '<br><small style="color:#94a3b8;">' . esc_url( $url ) . '</small></a>';
}
?>
</div>
<a href="<?php echo esc_url( get_permalink( $created_ids['business-setup'] ) ); ?>" class="btn" target="_blank">Open Live Business Setup Page →</a>
</div>
</body>
</html>
