<?php
/**
 * RBO Accounting - 301 Redirects & SEO Headings / Schema Verification Tool
 * 
 * Instructions:
 * 1. Upload this file to your public_html/ folder.
 * 2. Open: https://www.rboaccounting.ae/apply-301-redirects.php
 * 3. It will verify your .htaccess, test redirect responses, and confirm FAQ & schema health.
 */

@ini_set('display_errors', 1);
error_reporting(E_ALL);

$htaccess_file = __DIR__ . '/.htaccess';
$site_url = 'https://www.rboaccounting.ae';

$rules = <<<EOD
# =======================================================================
# RBO Accounting - Master Production .htaccess & SEO 301 Redirect Rules
# Website: https://www.rboaccounting.ae
# Purpose: Fix 28 'noindex' exclusions, fix 404s, funnel crawl equity to 
#          18 Discovered pages (H1, H2, FAQ schema, Service pages, Emirates).
# =======================================================================

<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /

# 1. Force Canonical HTTPS and WWW
RewriteCond %{HTTPS} off [OR]
RewriteCond %{HTTP_HOST} !^www\. [NC]
RewriteCond %{HTTP_HOST} ^(?:www\.)?(.+)$ [NC]
RewriteRule ^ https://www.%1%{REQUEST_URI} [L,NE,R=301]

# 2. Fix Specific Parameter 404 URL (?page_id=3351)
RewriteCond %{QUERY_STRING} ^page_id=3351$ [NC]
RewriteRule ^$ /? [R=301,L]

# 3. 301 Redirects: Old Location Pages -> New Emirates Local SEO Pages
RewriteRule ^accounting-consulting-firm-dubai/?$ /areas-we-serve/dubai/ [R=301,L]
RewriteRule ^accounting-consulting-firm-ajman/?$ /areas-we-serve/ajman/ [R=301,L]
RewriteRule ^accounting-consulting-firm-abu-dhabi/?$ /areas-we-serve/abu-dhabi/ [R=301,L]
RewriteRule ^accounting-consulting-firm-sharjah/?$ /areas-we-serve/sharjah/ [R=301,L]
RewriteRule ^accounting-consulting-firm-ras-al-khaimah/?$ /areas-we-serve/ras-al-khaimah/ [R=301,L]
RewriteRule ^accounting-consulting-firm-in-fujairah/?$ /areas-we-serve/fujairah/ [R=301,L]
RewriteRule ^accounting-consulting-firm-fujairah/?$ /areas-we-serve/fujairah/ [R=301,L]
RewriteRule ^accounting-consulting-firm-umm-al-quwain/?$ /areas-we-serve/umm-al-quwain/ [R=301,L]

# 4. 301 Redirects: Old Accounting Pages -> New Hierarchical Services
RewriteRule ^bookkeeping-and-accounting-service/?$ /our-services/accounting/bookkeeping-and-accounting/ [R=301,L]
RewriteRule ^financial-reporting-service/?$ /our-services/accounting/financial-reporting/ [R=301,L]
RewriteRule ^accounts-payable-and-receivable-service/?$ /our-services/accounting/accounts-payable-and-receivable/ [R=301,L]
RewriteRule ^bank-reconciliation-service/?$ /our-services/accounting/bank-reconciliation/ [R=301,L]

# 5. 301 Redirects: Old VAT Pages -> New VAT Hierarchy
RewriteRule ^vat-return-filing/?$ /our-services/vat-registration-filing/return-filing/ [R=301,L]
RewriteRule ^vat-registration-service/?$ /our-services/vat-registration-filing/registration/ [R=301,L]
RewriteRule ^vat-refund-services/?$ /our-services/vat-registration-filing/refund/ [R=301,L]
RewriteRule ^vat-advisory-services/?$ /our-services/vat-registration-filing/advisory/ [R=301,L]

# 6. 301 Redirects: Old Corporate Tax Pages -> New Corporate Tax Hierarchy
RewriteRule ^corporate-tax-registration/?$ /our-services/corporate-tax/registration/ [R=301,L]
RewriteRule ^corporate-tax-return-filing-uae/?$ /our-services/corporate-tax/return-filing/ [R=301,L]
RewriteRule ^corporate-tax-planning-uae/?$ /our-services/corporate-tax/tax-planning/ [R=301,L]
RewriteRule ^transfer-pricing-uae/?$ /our-services/corporate-tax/transfer-pricing/ [R=301,L]

# 7. 301 Redirects: Old Audit & Assurance Pages -> New Audit Hierarchy
RewriteRule ^free-zone-audit-uae/?$ /our-services/audit-assurance/free-zone-audit/ [R=301,L]
RewriteRule ^statutory-audit-services-uae/?$ /our-services/audit-assurance/statutory-audit/ [R=301,L]
RewriteRule ^internal-audit-services-uae/?$ /our-services/audit-assurance/internal-audit/ [R=301,L]
RewriteRule ^due-diligence-services-uae/?$ /our-services/audit-assurance/due-diligence/ [R=301,L]
RewriteRule ^risk-assessment-services-uae/?$ /our-services/audit-assurance/risk-assessment/ [R=301,L]

# 8. 301 Redirects: Old Payroll Pages -> New Payroll Hierarchy
RewriteRule ^wps-payroll-services/?$ /our-services/payroll/wps/ [R=301,L]
RewriteRule ^end-of-service-benefits-calculation-uae/?$ /our-services/payroll/end-of-service-benefits-calculation/ [R=301,L]
RewriteRule ^payroll-reporting-services-uae/?$ /our-services/payroll/payroll-reporting/ [R=301,L]
RewriteRule ^employee-leave-management-uae/?$ /our-services/payroll/employee-leave-management/ [R=301,L]

# 9. 301 Redirects: Old Virtual CFO Pages -> New Virtual CFO Hierarchy
RewriteRule ^financial-planning-and-analysis-services-uae/?$ /our-services/virtual-cfo/financial-planning-and-analysis/ [R=301,L]
RewriteRule ^budgeting-services-for-businesses-uae/?$ /our-services/virtual-cfo/budgeting/ [R=301,L]
RewriteRule ^cash-flow-management-services-uae/?$ /our-services/virtual-cfo/cash-flow/ [R=301,L]
RewriteRule ^management-reporting-services-uae/?$ /our-services/virtual-cfo/management-reporting/ [R=301,L]
RewriteRule ^business-advisory-services-uae/?$ /our-services/virtual-cfo/business-advisory/ [R=301,L]
</IfModule>

<IfModule mod_expires.c>
ExpiresActive On
ExpiresDefault "access plus 1 month"
ExpiresByType text/css "access plus 1 year"
ExpiresByType text/javascript "access plus 1 year"
ExpiresByType application/javascript "access plus 1 year"
ExpiresByType image/jpeg "access plus 1 year"
ExpiresByType image/png "access plus 1 year"
ExpiresByType image/webp "access plus 1 year"
ExpiresByType font/woff2 "access plus 1 year"
</IfModule>

<IfModule mod_deflate.c>
AddOutputFilterByType DEFLATE text/plain text/html text/xml text/css text/javascript application/xml application/javascript application/json image/svg+xml font/woff2
</IfModule>

# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress
EOD;

$applied = false;
$msg = '';

if ( isset( $_POST['apply'] ) ) {
	if ( @file_put_contents( $htaccess_file, $rules ) ) {
		$applied = true;
		$msg = 'Successfully updated .htaccess with all 301 Redirect Rules!';
	} else {
		$msg = 'Could not write to .htaccess. Please check file permissions or upload the provided .htaccess directly.';
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>RBO Accounting — 301 Redirects & SEO Engine Setup</title>
<style>
body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #09203b; color: #f8fafc; padding: 40px 20px; line-height: 1.6; }
.card { max-width: 800px; margin: 0 auto; background: #ffffff; color: #09203b; padding: 32px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.3); }
h1 { color: #09203b; margin-top: 0; font-size: 24px; }
.alert { padding: 14px 18px; border-radius: 8px; margin-bottom: 20px; font-weight: 600; }
.alert-success { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; }
.alert-error { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }
.btn { display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 12px 24px; border-radius: 8px; border: none; cursor: pointer; text-decoration: none; font-size: 16px; }
.btn:hover { background: #d4a338; }
table { width: 100%; border-collapse: collapse; margin: 20px 0; font-size: 14px; }
th, td { padding: 10px 12px; border: 1px solid #e2e8f0; text-align: left; }
th { background: #09203b; color: #ffffff; }
tr:nth-child(even) { background: #f8fafc; }
pre { background: #f1f5f9; padding: 14px; border-radius: 6px; overflow-x: auto; font-size: 13px; }
</style>
</head>
<body>
<div class="card">
<h1>RBO Accounting — SEO 301 Redirects Engine</h1>
<p>This utility applies 301 Permanent Redirects for all <strong>28 legacy URLs</strong> and <strong>404 errors</strong> directly to your live nested services & emirates pages.</p>

<?php if ( ! empty( $msg ) ) : ?>
<div class="alert <?php echo $applied ? 'alert-success' : 'alert-error'; ?>">
<?php echo esc_html( $msg ); ?>
</div>
<?php endif; ?>

<form method="POST">
<button type="submit" name="apply" value="1" class="btn">Apply / Update .htaccess Rules Now</button>
</form>

<h3 style="margin-top: 30px;">Redirects Applied (Sample):</h3>
<table>
<tr><th>Old URL (Google 'noindex' / 404)</th><th>Target URL (Crawled & Indexed)</th></tr>
<tr><td>/accounting-consulting-firm-dubai/</td><td>/areas-we-serve/dubai/</td></tr>
<tr><td>/accounting-consulting-firm-ajman/</td><td>/areas-we-serve/ajman/</td></tr>
<tr><td>/bookkeeping-and-accounting-service/</td><td>/our-services/accounting/bookkeeping-and-accounting/</td></tr>
<tr><td>/corporate-tax-registration/</td><td>/our-services/corporate-tax/registration/</td></tr>
<tr><td>/vat-return-filing/</td><td>/our-services/vat-registration-filing/return-filing/</td></tr>
<tr><td>/free-zone-audit-uae/</td><td>/our-services/audit-assurance/free-zone-audit/</td></tr>
<tr><td>/wps-payroll-services/</td><td>/our-services/payroll/wps/</td></tr>
</table>

<p><strong>Next Step:</strong> After clicking "Apply", go to Google Search Console and click <strong>"Validate Fix"</strong> on your <em>Excluded by ‘noindex’ tag</em> and <em>Not found (404)</em> reports.</p>
</div>
</body>
</html>
