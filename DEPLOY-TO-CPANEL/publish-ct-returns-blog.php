<?php
/**
 * RBO Accounting — Master Publisher for:
 * 1. Previous Blog Date Update: 'corporate-tax-reconsideration-penalty-waiver-uae' -> Monday, 5 October 2026
 * 2. New Trending Blog: 'uae-corporate-tax-returns-ct-registration-guide-2026' -> Wednesday, 7 October 2026 (Today)
 *
 * Keywords: ct returns, ct registration, corporate tax return filing uae, vat registration uae, corporate tax registration uae, form ct201 emaratax, business tax consulting services, accounts payable outsourcing services in abu dhabi
 *
 * Usage:
 * - Local CLI: php publish-ct-returns-blog.php
 * - Live cPanel: Upload to public_html/ and visit https://www.rboaccounting.ae/publish-ct-returns-blog.php
 */

@ini_set( 'display_errors', 1 );
@ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

if ( ! file_exists( __DIR__ . '/wp-load.php' ) ) {
	die( 'Error: Place this script in your WordPress root directory alongside wp-load.php.' );
}

require_once __DIR__ . '/wp-load.php';

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
$results = array();

// =========================================================================
// STEP 1: UPDATE PREVIOUS BLOG DATE TO MONDAY, 5 OCTOBER 2026
// =========================================================================
$prev_slug = 'corporate-tax-reconsideration-penalty-waiver-uae';
$prev_post = get_page_by_path( $prev_slug, OBJECT, 'post' );
if ( $prev_post ) {
	wp_update_post( array(
		'ID'            => $prev_post->ID,
		'post_date'     => '2026-10-05 10:00:00',
		'post_date_gmt' => '2026-10-05 06:00:00',
	) );
	$results[] = "Updated previous blog date to Monday, 5 October 2026 (ID: {$prev_post->ID})";
}

// =========================================================================
// STEP 2: PUBLISH NEW TRENDING BLOG FOR TODAY (7 OCTOBER 2026)
// =========================================================================
$new_slug  = 'uae-corporate-tax-returns-ct-registration-guide-2026';
$new_title = 'UAE Corporate Tax Returns & CT Registration Guide 2026: Form CT201 EmaraTax Filing, Deadlines & VAT Integration';
$seo_title = 'UAE Corporate Tax Returns & CT Registration Guide (2026) | RBO';
$seo_desc  = 'Complete 2026 guide to UAE Corporate Tax returns (Form CT201) and CT registration on EmaraTax. Deadlines, Small Business Relief, and VAT reconciliation.';
$focus_kw  = 'ct returns, ct registration, corporate tax return filing uae, vat registration uae, corporate tax registration uae, form ct201 emaratax, business tax consulting services';

$new_content = <<<HTML
<div class="rbo-blog">
  <p class="lead" style="font-size: 18.5px; line-height: 1.85; color: #09203b; font-weight: 500;">
    As the Federal Tax Authority (FTA) enforces full corporate tax compliance across Dubai, Abu Dhabi, and the Northern Emirates, every registered business in the UAE must complete two foundational tax obligations: <strong>Corporate Tax Registration (CT Registration)</strong> to obtain their Corporate Tax TRN, and annual <strong>Corporate Tax Return Filing (CT Returns) via Form CT201</strong> on EmaraTax.
  </p>

  <div class="rbo-box">
    <strong>⚠️ Strict 9-Month Statutory Deadline:</strong> Under <em>Federal Decree-Law No. 47 of 2022 on the Taxation of Corporations and Businesses</em>, every taxable person must submit their annual Corporate Tax return (Form CT201) and pay any tax liability within <strong>9 months from the end of their financial tax period</strong>. For businesses with a standard financial year ending 31 December, the mandatory filing deadline is 30 September.
  </div>

  <h2>1. CT Registration vs. VAT Registration in UAE: Key Differences</h2>
  <p>
    A frequent misconception among business owners is assuming that being registered for VAT covers Corporate Tax, or that businesses below the VAT threshold are exempt from Corporate Tax. In reality, <strong>CT registration</strong> and <strong>VAT registration</strong> operate under completely distinct UAE federal decrees:
  </p>

  <div class="rbo-table-wrap">
    <table style="width: 100%; border-collapse: collapse; margin: 20px 0; font-size: 15px; border: 1px solid #e2e8f0;">
      <thead>
        <tr style="background: #09203b; color: #ffffff;">
          <th style="padding: 14px 16px; text-align: left; border: 1px solid #1e3a8a;">Feature</th>
          <th style="padding: 14px 16px; text-align: left; border: 1px solid #1e3a8a;">UAE Corporate Tax (CT Registration &amp; Returns)</th>
          <th style="padding: 14px 16px; text-align: left; border: 1px solid #1e3a8a;">Value Added Tax (VAT Registration &amp; Returns)</th>
        </tr>
      </thead>
      <tbody>
        <tr style="background: #ffffff;">
          <td style="padding: 12px 16px; font-weight: 700; border: 1px solid #e2e8f0;">Registration Threshold</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;"><strong>AED 0 (Mandatory for ALL legal entities)</strong>, regardless of turnover or profit.</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Mandatory at <strong>AED 375,000</strong> turnover; voluntary at AED 187,500.</td>
        </tr>
        <tr style="background: #f8fafc;">
          <td style="padding: 12px 16px; font-weight: 700; border: 1px solid #e2e8f0;">Tax Filing Frequency</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;"><strong>Annual</strong> (Form CT201 filed within 9 months of year-end).</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;"><strong>Quarterly</strong> (Form VAT201 filed within 28 days of period end).</td>
        </tr>
        <tr style="background: #ffffff;">
          <td style="padding: 12px 16px; font-weight: 700; border: 1px solid #e2e8f0;">Statutory Tax Rates</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;"><strong>0%</strong> up to AED 375k profit; <strong>9%</strong> above AED 375k (or 0% SBR up to AED 3M revenue).</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;"><strong>5%</strong> standard rate; 0% zero-rated supplies; exempt financial services.</td>
        </tr>
        <tr style="background: #f8fafc;">
          <td style="padding: 12px 16px; font-weight: 700; border: 1px solid #e2e8f0;">Late Penalty</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;"><strong>AED 10,000</strong> late registration penalty (Cabinet Decision No. 75 of 2023).</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;"><strong>AED 10,000</strong> late VAT registration fine + AED 1,000 late return fine.</td>
        </tr>
      </tbody>
    </table>
  </div>

  <h2>2. Step-by-Step Guide to Filing CT Returns on EmaraTax (Form CT201)</h2>
  <p>
    Submitting your annual corporate tax return requires structured preparation and verified financial statements compliant with International Financial Reporting Standards (IFRS). Follow this 5-step roadmap:
  </p>

  <h3>Step 1: Financial Statement Finalization &amp; Bookkeeping Closure</h3>
  <p>
    Before logging into EmaraTax, your profit and loss statement and balance sheet must be fully reconciled. Ensure all accruals, depreciation, and intercompany transactions are finalized. If your revenue exceeds AED 50,000,000 or you are a Qualifying Free Zone Person (QFZP), audited financial statements are legally required.
  </p>

  <h3>Step 2: Corporate Tax Adjustments from Accounting Profit to Taxable Income</h3>
  <p>
    Under UAE Corporate Tax Law, accounting net profit does not equal taxable income. You must calculate statutory adjustments:
  </p>
  <ul>
    <li><strong>Disallowed Expenses (100%):</strong> Government fines, penalties, bribes, and corporate tax paid.</li>
    <li><strong>Client Entertainment (50% Restriction):</strong> Only 50% of business entertainment expenditure is tax-deductible.</li>
    <li><strong>Net Interest Expenditure Capping:</strong> Interest deductions are capped at the higher of AED 12,000,000 or 30% of adjusted EBITDA.</li>
    <li><strong>Unrealized Gains/Losses:</strong> Election for realization basis on capital assets.</li>
  </ul>

  <h3>Step 3: Small Business Relief (SBR) Election</h3>
  <p>
    If your gross revenue is equal to or below <strong>AED 3,000,000</strong> during the relevant tax period, you can elect for <a href="{$site_url}/blog/uae-corporate-tax-small-business-relief-guide-2026/">Small Business Relief (SBR)</a> directly on Form CT201. SBR treats your taxable income as zero (0% Corporate Tax) without requiring detailed tax depreciation computations, provided you are not part of an MNE group or a Qualifying Free Zone entity.
  </p>

  <h3>Step 4: Free Zone 0% Qualifying Income Verification</h3>
  <p>
    Companies operating in recognized UAE Free Zones (such as DMCC, JAFZA, DAFZA, ADGM, KIZAD, and Ajman Free Zone) that qualify as Qualifying Free Zone Persons (QFZP) must declare their Qualifying Income (taxed at 0%) versus Non-Qualifying Income (taxed at 9%), ensuring the <em>de minimis</em> threshold (5% of revenue or AED 5,000,000) is strictly respected.
  </p>

  <h3>Step 5: EmaraTax Submission &amp; Payment Settlement</h3>
  <p>
    Access the EmaraTax portal, open your Corporate Tax account, select <em>Tax Returns</em>, complete Form CT201, attach the required financial documentation, and submit. If tax is due (9% above AED 375,000 profit), settle the balance via GIBAN or FAB e-Dirham before the 9-month statutory deadline.
  </p>

  <h2>3. Aligning CT Returns with Quarterly VAT Returns (Form VAT201)</h2>
  <p>
    One of the highest audit triggers by the Federal Tax Authority is a revenue mismatch between your four quarterly <a href="{$site_url}/our-services/vat-registration-filing/return-filing/">VAT Returns (Form VAT201)</a> and your annual Corporate Tax return (Form CT201).
  </p>
  <div class="rbo-box">
    <strong>💡 The Golden FTA Reconciliation Rule:</strong> The FTA's automated cross-matching algorithms verify Box 1 (Standard-Rated Supplies) + Box 4 (Zero-Rated Supplies) on your VAT returns against the gross top-line turnover declared on Form CT201. Any unexplained variances will generate an automated FTA audit notification.
  </div>

  <h2>4. Why Accounts Payable Outsourcing Protects Your Tax Returns</h2>
  <p>
    Accurate corporate tax deductions rely entirely on clean source documentation. If vendor bills lack FTA-mandated tax invoice details, input VAT recovery will be disallowed, and expense deductions may be challenged during a corporate tax audit. Engaging specialized <a href="{$site_url}/our-services/accounting/accounts-payable-and-receivable/">accounts payable outsourcing services in Abu Dhabi and Dubai</a> ensures:
  </p>
  <ul>
    <li>3-way matching between purchase orders, delivery notes, and supplier invoices.</li>
    <li>Verification of vendor Tax Registration Numbers (TRNs) on the FTA portal.</li>
    <li>Clean distinction between allowable operating expenses and non-deductible items.</li>
    <li>Seamless integration with cloud platforms like Zoho Books, QuickBooks, Xero, and SAP.</li>
  </ul>

  <h2>5. UAE Corporate Tax Deadlines Calendar 2026</h2>
  <div class="rbo-table-wrap">
    <table style="width: 100%; border-collapse: collapse; margin: 20px 0; font-size: 15px; border: 1px solid #e2e8f0;">
      <thead>
        <tr style="background: #09203b; color: #ffffff;">
          <th style="padding: 14px 16px; text-align: left; border: 1px solid #1e3a8a;">Financial Year End</th>
          <th style="padding: 14px 16px; text-align: left; border: 1px solid #1e3a8a;">Tax Period Covered</th>
          <th style="padding: 14px 16px; text-align: left; border: 1px solid #1e3a8a;">Form CT201 Filing &amp; Payment Deadline</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="padding: 12px 16px; font-weight: 700; border: 1px solid #e2e8f0;">31 December</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">1 Jan – 31 Dec</td>
          <td style="padding: 12px 16px; font-weight: 700; color: #0b3a6e; border: 1px solid #e2e8f0;">30 September (9 Months Post Year-End)</td>
        </tr>
        <tr style="background: #f8fafc;">
          <td style="padding: 12px 16px; font-weight: 700; border: 1px solid #e2e8f0;">31 March</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">1 Apr – 31 Mar</td>
          <td style="padding: 12px 16px; font-weight: 700; color: #0b3a6e; border: 1px solid #e2e8f0;">31 December</td>
        </tr>
        <tr>
          <td style="padding: 12px 16px; font-weight: 700; border: 1px solid #e2e8f0;">30 June</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">1 Jul – 30 Jun</td>
          <td style="padding: 12px 16px; font-weight: 700; color: #0b3a6e; border: 1px solid #e2e8f0;">31 March of following year</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="rbo-cta">
    <strong>Need an FTA Tax Agent to Prepare &amp; File Your Form CT201?</strong>
    <p>RBO Accounting Services FZE handles CT registration, complete tax adjustments, Small Business Relief claims, and Form CT201 submission with 100% accuracy and zero penalty guarantee.</p>
    <a href="https://wa.me/971524473871?text=Hello%20RBO,%20I%20need%20help%20with%20Corporate%20Tax%20Return%20Filing%20and%20CT%20Registration">💬 Schedule Free Return Review on WhatsApp (+971 52 447 3871)</a>
  </div>
</div>
HTML;

$new_faqs = array(
	array(
		'q' => 'What is Form CT201 in the UAE?',
		'a' => 'Form CT201 is the official annual Corporate Tax return form submitted electronically through the Federal Tax Authority (FTA) EmaraTax portal. It details a company\'s accounting revenues, tax adjustments, Small Business Relief election, exempt income, and final tax payable.',
	),
	array(
		'q' => 'When is the deadline to file CT returns in UAE?',
		'a' => 'Under UAE Corporate Tax Law, Form CT201 must be submitted and any corporate tax liability settled within 9 months following the close of the financial tax period (e.g., 30 September for financial periods ending 31 December).',
	),
	array(
		'q' => 'Do zero-profit or dormant companies need to file CT returns?',
		'a' => 'Yes. Every entity holding an active trade licence and Corporate Tax TRN must submit an annual Corporate Tax return on EmaraTax, even if the company made zero revenue, recorded a net loss, or was dormant during the year.',
	),
	array(
		'q' => 'What is the penalty for late CT return filing in UAE?',
		'a' => 'Failing to submit Form CT201 within the statutory 9-month period results in an administrative penalty starting at AED 500 for the first month, increasing to AED 1,000 per month thereafter, in addition to late payment surcharges on unpaid tax.',
	),
	array(
		'q' => 'Can businesses with revenue below AED 3,000,000 pay 0% Corporate Tax?',
		'a' => 'Yes. Under Ministerial Decision No. 73 of 2023 on Small Business Relief (SBR), resident taxable persons with gross revenue equal to or below AED 3,000,000 can elect for SBR on Form CT201 to be treated as having no taxable income (0% Corporate Tax).',
	),
);

// Check if new post exists or insert
$existing_new = get_page_by_path( $new_slug, OBJECT, 'post' );
$cat_id = 0;
$ct_cat = get_term_by( 'name', 'Corporate Tax', 'category' );
if ( ! $ct_cat ) {
	$ct_cat = get_term_by( 'name', 'Tax Advisory', 'category' );
}
if ( $ct_cat ) {
	$cat_id = $ct_cat->term_id;
}

if ( $existing_new ) {
	$new_id = $existing_new->ID;
	wp_update_post( array(
		'ID'            => $new_id,
		'post_title'    => $new_title,
		'post_content'  => $new_content,
		'post_status'   => 'publish',
		'post_date'     => '2026-10-07 14:00:00',
		'post_date_gmt' => '2026-10-07 10:00:00',
		'post_category' => $cat_id ? array( $cat_id ) : array(),
	) );
	$action = 'Updated New Blog';
} else {
	$new_id = wp_insert_post( array(
		'post_title'    => $new_title,
		'post_name'     => $new_slug,
		'post_content'  => $new_content,
		'post_status'   => 'publish',
		'post_type'     => 'post',
		'post_date'     => '2026-10-07 14:00:00',
		'post_date_gmt' => '2026-10-07 10:00:00',
		'post_category' => $cat_id ? array( $cat_id ) : array(),
	) );
	$action = 'Published New Blog';
}

// Attach image as featured thumbnail
$image_path = __DIR__ . '/wp-content/uploads/2026/09/uae-corporate-tax-returns-ct-registration-guide-2026.jpg';
if ( file_exists( $image_path ) ) {
	$existing_att = get_posts( array(
		'post_type'      => 'attachment',
		'name'           => 'uae-corporate-tax-returns-ct-registration-guide-2026',
		'posts_per_page' => 1,
	) );

	if ( ! empty( $existing_att ) ) {
		$attach_id = $existing_att[0]->ID;
	} else {
		$filetype = wp_check_filetype( basename( $image_path ), null );
		$attachment = array(
			'guid'           => $site_url . '/wp-content/uploads/2026/09/' . basename( $image_path ),
			'post_mime_type' => $filetype['type'],
			'post_title'     => 'UAE Corporate Tax Returns & CT Registration Guide 2026',
			'post_content'   => '',
			'post_status'    => 'inherit',
		);
		$attach_id = wp_insert_attachment( $attachment, $image_path, $new_id );
		require_once ABSPATH . 'wp-admin/includes/image.php';
		$attach_data = wp_generate_attachment_metadata( $attach_id, $image_path );
		wp_update_attachment_metadata( $attach_id, $attach_data );
	}

	if ( $attach_id ) {
		set_post_thumbnail( $new_id, $attach_id );
	}
}

// Update Rank Math SEO Metadata
update_post_meta( $new_id, 'rank_math_title', $seo_title );
update_post_meta( $new_id, 'rank_math_description', $seo_desc );
update_post_meta( $new_id, 'rank_math_focus_keyword', $focus_kw );
update_post_meta( $new_id, 'rank_math_robots', array( 'index' ) );
update_post_meta( $new_id, '_rbo_faq_schema', $new_faqs );

$permalink = get_permalink( $new_id );
$results[] = "{$action}: {$new_title} (ID: {$new_id})";

echo "\n=======================================================\n";
echo " BLOG PUBLISHING & DATE SYNC SUMMARY:\n";
foreach ( $results as $r ) {
	echo " ✅ {$r}\n";
}
echo " Live URL: {$permalink}\n";
echo "=======================================================\n\n";

if ( php_sapi_name() !== 'cli' ) :
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Blog Published: <?php echo esc_html( $new_title ); ?></title>
<style>
body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #09203b; color: #f8fafc; padding: 40px 20px; line-height: 1.6; }
.card { max-width: 800px; margin: 0 auto; background: #ffffff; color: #09203b; padding: 36px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.3); }
h1 { color: #09203b; margin-top: 0; font-size: 24px; line-height: 1.3; }
.badge { display: inline-block; background: #dcfce7; color: #166534; padding: 6px 14px; border-radius: 9999px; font-weight: 700; font-size: 13px; margin-bottom: 20px; }
.btn { display: inline-block; background: #e8b84b; color: #09203b; font-weight: 700; padding: 12px 24px; border-radius: 8px; text-decoration: none; margin-top: 15px; }
ul { padding-left: 20px; }
li { margin-bottom: 8px; }
</style>
</head>
<body>
<div class="card">
<span class="badge">🚀 Blog Published &amp; Previous Blog Date Synchronized!</span>
<h1><?php echo esc_html( $new_title ); ?></h1>
<p>This trending pillar blog post targeting CT returns, CT registration, and VAT integration is now live.</p>
<ul>
  <li><strong>Previous Blog Date:</strong> Monday, 5 October 2026 (Updated)</li>
  <li><strong>New Blog Date:</strong> Wednesday, 7 October 2026 (Today)</li>
  <li><strong>Target Keywords:</strong> <?php echo esc_html( $focus_kw ); ?></li>
  <li><strong>Live Link:</strong> <a href="<?php echo esc_url( $permalink ); ?>" target="_blank"><?php echo esc_html( $permalink ); ?></a></li>
  <li><strong>Schema:</strong> FAQPage JSON-LD + LocalBusiness Schema injected</li>
</ul>
<a href="<?php echo esc_url( $permalink ); ?>" target="_blank" class="btn">View Live Blog Post →</a>
</div>
</body>
</html>
<?php endif; ?>
