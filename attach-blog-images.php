<?php
/**
 * Register Blog Images as WordPress Attachments and Set Featured Media + In-Article Visuals
 */
@ini_set( 'display_errors', 1 );
@ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

require_once __DIR__ . '/wp-load.php';
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

$upload_dir = wp_upload_dir();
$site_url = home_url();

// Image 1: Small Business Relief
$img1_rel = '2026/09/uae-corporate-tax-small-business-relief-guide-2026.jpg';
$img1_path = trailingslashit( $upload_dir['basedir'] ) . $img1_rel;
$img1_url = trailingslashit( $upload_dir['baseurl'] ) . $img1_rel;

$att1_id = 0;
if ( file_exists( $img1_path ) ) {
	$attachment1 = array(
		'guid'           => $img1_url,
		'post_mime_type' => 'image/jpeg',
		'post_title'     => 'UAE Corporate Tax Small Business Relief SBR 2026 Infographic',
		'post_content'   => '',
		'post_status'    => 'inherit',
	);
	$att1_id = wp_insert_attachment( $attachment1, $img1_path );
	if ( ! is_wp_error( $att1_id ) ) {
		$attach_data = wp_generate_attachment_metadata( $att1_id, $img1_path );
		wp_update_attachment_metadata( $att1_id, $attach_data );
		update_post_meta( $att1_id, '_wp_attachment_image_alt', 'UAE Corporate Tax Small Business Relief 0 percent tax 3 million AED revenue threshold 2026 guide' );
	}
}

// Image 2: Ajman Free Zone Audit
$img2_rel = '2026/09/ajman-free-zone-company-audit-vat-compliance-guide-2026.jpg';
$img2_path = trailingslashit( $upload_dir['basedir'] ) . $img2_rel;
$img2_url = trailingslashit( $upload_dir['baseurl'] ) . $img2_rel;

$att2_id = 0;
if ( file_exists( $img2_path ) ) {
	$attachment2 = array(
		'guid'           => $img2_url,
		'post_mime_type' => 'image/jpeg',
		'post_title'     => 'Ajman Free Zone Company Audit & VAT Compliance 2026 Guide',
		'post_content'   => '',
		'post_status'    => 'inherit',
	);
	$att2_id = wp_insert_attachment( $attachment2, $img2_path );
	if ( ! is_wp_error( $att2_id ) ) {
		$attach_data = wp_generate_attachment_metadata( $att2_id, $img2_path );
		wp_update_attachment_metadata( $att2_id, $attach_data );
		update_post_meta( $att2_id, '_wp_attachment_image_alt', 'Ajman Free Zone AFZA company annual audit and VAT compliance framework approved auditor 2026' );
	}
}

// Update Blog 1
$b1 = get_page_by_path( 'uae-corporate-tax-small-business-relief-guide-2026', OBJECT, 'post' );
if ( $b1 ) {
	if ( $att1_id > 0 ) {
		set_post_thumbnail( $b1->ID, $att1_id );
	}
	
	$b1_content = <<<HTML
<div class="rbo-blog">
  <div style="margin-bottom: 28px; text-align: center;">
    <img src="{$img1_url}" alt="UAE Corporate Tax Small Business Relief 2026 Guide: 0% Tax Threshold" style="width: 100%; max-width: 900px; height: auto; border-radius: 12px; box-shadow: 0 4px 20px rgba(9, 32, 59, 0.12); display: inline-block;" />
  </div>

  <p>As the UAE Corporate Tax regime enters full enforcement in 2026, small and medium-sized enterprises (SMEs) across the Emirates can legally minimize their tax liability using <strong>Small Business Relief (SBR)</strong> under <em>Ministerial Decision No. 73 of 2023</em>.</p>
  
  <p>Eligible taxable persons with gross revenue equal to or below <strong>AED 3,000,000</strong> in a relevant tax period are treated as having <strong>no taxable income (0% Corporate Tax)</strong> without complex tax computations.</p>

  <div class="rbo-box">
    <strong>💡 Key Requirement:</strong> Even with SBR, businesses must still register for Corporate Tax on EmaraTax, maintain IFRS financial records, and submit a simplified annual Corporate Tax return!
  </div>

  <h2>1. Small Business Relief Eligibility Conditions</h2>
  <p>To claim 0% tax under Small Business Relief in the UAE, a business must satisfy all of the following statutory criteria:</p>
  <ul>
    <li><strong>Revenue Threshold:</strong> Gross revenue must <strong>not exceed AED 3,000,000</strong> in the current or previous tax periods.</li>
    <li><strong>Residency Status:</strong> Must be a UAE Resident Person (individual sole establishment or corporate entity incorporated in the UAE).</li>
    <li><strong>Non-Qualifying Free Zone Person:</strong> Cannot be a Qualifying Free Zone Person (QFZP) benefiting from 0% Free Zone tax.</li>
    <li><strong>Non-MNE Member:</strong> Cannot be a member of a Multinational Enterprise (MNE) group with consolidated revenues exceeding AED 3.15 billion.</li>
  </ul>

  <h2>2. SBR vs. Standard UAE Corporate Tax Comparison</h2>
  <table>
    <thead>
      <tr>
        <th>Feature</th>
        <th>Small Business Relief (SBR)</th>
        <th>Standard Corporate Tax</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><strong>Revenue Cap</strong></td>
        <td>Up to AED 3,000,000</td>
        <td>No limit</td>
      </tr>
      <tr>
        <td><strong>Effective Tax Rate</strong></td>
        <td><strong>0% on all profits</strong></td>
        <td>0% up to AED 375k, 9% thereafter</td>
      </tr>
      <tr>
        <td><strong>Transfer Pricing Docs</strong></td>
        <td>Exempt from Master/Local file</td>
        <td>Mandatory for related parties</td>
      </tr>
      <tr>
        <td><strong>Tax Loss Carryforward</strong></td>
        <td>Cannot carry forward losses</td>
        <td>Carry forward up to 75%</td>
      </tr>
      <tr>
        <td><strong>Validity Period</strong></td>
        <td>Periods ending on/before 31 Dec 2026</td>
        <td>Permanent</td>
      </tr>
    </tbody>
  </table>

  <h2>3. How to Elect for SBR on EmaraTax (Form CT201)</h2>
  <p>Small Business Relief is not automatic — it must be formally elected during your annual Corporate Tax return filing:</p>
  <ol>
    <li>Log into your FTA <a href="{$site_url}/our-services/corporate-tax/registration/">EmaraTax account</a>.</li>
    <li>Navigate to Corporate Tax Filing (Form CT201).</li>
    <li>Under the Reliefs section, tick <strong>"Elect for Small Business Relief under Article 21"</strong>.</li>
    <li>Enter your audited or reconciled gross revenue (must be &le; AED 3M).</li>
    <li>Submit your return within <strong>9 months</strong> of your financial year-end.</li>
  </ol>

  <div class="rbo-cta">
    <strong>Need Help Claiming Small Business Relief in Dubai or Ajman?</strong>
    <p>Our FTA-certified tax agents will review your revenue thresholds and submit your return with zero penalty guarantee.</p>
    <a href="https://wa.me/971508051857?text=Hello%20RBO,%20I%20need%20help%20with%20UAE%20Small%20Business%20Relief%202026" target="_blank" rel="noopener">Schedule Free Review on WhatsApp</a>
  </div>

  <h2>4. Critical Compliance Trap: Revenue vs. Profit</h2>
  <p>A frequent error among UAE business owners is confusing <em>profit</em> with <em>revenue</em>. SBR applies strictly to <strong>Gross Turnover (Revenue)</strong>. If your sales revenue reaches AED 3,000,001, you immediately lose SBR eligibility, and your entire net profit above AED 375,000 will be taxed at <strong>9%</strong>.</p>
  <p>Maintaining accurate monthly <a href="{$site_url}/our-services/accounting/bookkeeping-and-accounting/">bookkeeping and financial records</a> is essential to ensure your revenue calculations withstand an FTA compliance audit.</p>

  <h2>Frequently Asked Questions</h2>
  <div class="rbo-box">
    <strong>Q: What happens if revenue exceeds AED 3,000,000 in a subsequent year?</strong><br>
    If revenue exceeds AED 3,000,000 in any tax period, Small Business Relief cannot be elected for that period. The business pays 0% up to AED 375k profit and 9% thereafter.
  </div>
  <div class="rbo-box">
    <strong>Q: When does Small Business Relief expire in the UAE?</strong><br>
    Small Business Relief applies to all tax periods ending on or before <strong>31 December 2026</strong>.
  </div>
</div>
HTML;

	wp_update_post( array(
		'ID'           => $b1->ID,
		'post_content' => $b1_content,
	) );
}

// Update Blog 2
$b2 = get_page_by_path( 'ajman-free-zone-company-audit-vat-compliance-guide', OBJECT, 'post' );
if ( $b2 ) {
	if ( $att2_id > 0 ) {
		set_post_thumbnail( $b2->ID, $att2_id );
	}
	
	$b2_content = <<<HTML
<div class="rbo-blog">
  <div style="margin-bottom: 28px; text-align: center;">
    <img src="{$img2_url}" alt="Ajman Free Zone Authority AFZA Company Audit & VAT Compliance Framework 2026" style="width: 100%; max-width: 900px; height: auto; border-radius: 12px; box-shadow: 0 4px 20px rgba(9, 32, 59, 0.12); display: inline-block;" />
  </div>

  <p>Companies operating within <strong>Ajman Free Zone (AFZA)</strong> and <strong>Ajman Media City Free Zone (AMCFZ)</strong> operate in one of the UAE's most cost-efficient trade hubs. However, under updated UAE Federal tax laws and authority regulations in 2026, compliance requirements have tightened significantly.</p>
  
  <p>Whether renewing your trade licence or maintaining <strong>0% Corporate Tax Qualifying Free Zone Person (QFZP)</strong> status, having an approved auditor is now mandatory.</p>

  <div class="rbo-box">
    <strong>📍 Local Presence:</strong> RBO Accounting Services FZE is headquartered in Block C1, Ajman Free Zone, providing on-the-ground approved audit and VAT services with direct liaison to AFZA leadership.
  </div>

  <h2>1. Is an Annual Audit Mandatory for Ajman Free Zone Companies?</h2>
  <p><strong>Yes.</strong> The Ajman Free Zone Authority requires all registered FZE and FZC entities to submit annual audited financial statements prepared by a registered, approved UAE auditor upon annual trade licence renewal.</p>
  <ul>
    <li><strong>Standard License Renewal:</strong> Submission of audited accounts along with lease agreements.</li>
    <li><strong>Corporate Tax Compliance:</strong> Required under Article 24 of UAE Corporate Tax Law to prove economic substance and substantiate qualifying income.</li>
    <li><strong>Bank Account Maintenance:</strong> UAE corporate banks require annual audited balance sheets to maintain active accounts.</li>
  </ul>

  <h2>2. Key Compliance Deadlines for Ajman Free Zone Entities</h2>
  <table>
    <thead>
      <tr>
        <th>Obligation</th>
        <th>Authority</th>
        <th>Deadline</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><strong>Annual Audit Report</strong></td>
        <td>AFZA / AMCFZ</td>
        <td>Upon Annual Trade License Renewal</td>
      </tr>
      <tr>
        <td><strong>Corporate Tax Registration</strong></td>
        <td>Federal Tax Authority</td>
        <td>Within 3 months of license issuance</td>
      </tr>
      <tr>
        <td><strong>Annual CT Return (Form CT201)</strong></td>
        <td>Federal Tax Authority</td>
        <td>Within 9 months of financial year end</td>
      </tr>
      <tr>
        <td><strong>Quarterly VAT Return (VAT201)</strong></td>
        <td>Federal Tax Authority</td>
        <td>28th of the month following quarter end</td>
      </tr>
      <tr>
        <td><strong>WPS Payroll Submission</strong></td>
        <td>MoHRE / AFZA</td>
        <td>Monthly (by 15th of each month)</td>
      </tr>
    </tbody>
  </table>

  <h2>3. How to Protect 0% Corporate Tax (QFZP) Status in Ajman</h2>
  <p>To enjoy the 0% UAE Corporate Tax rate on qualifying income, an Ajman Free Zone company must:</p>
  <ol>
    <li>Maintain adequate economic substance (office, local employees, operating expenditures in Ajman).</li>
    <li>Derive income from Qualifying Activities or transactions with other Free Zone persons.</li>
    <li>Comply with arm's-length transfer pricing rules.</li>
    <li><strong>Maintain audited financial statements prepared by an accredited UAE auditor.</strong></li>
  </ol>

  <div class="rbo-cta">
    <strong>Speak Directly with an Approved Auditor in Ajman Free Zone</strong>
    <p>Get fast-track audited financial statements and VAT health check from our AFZ headquarters.</p>
    <a href="https://wa.me/971508051857?text=Hello%20RBO,%20I%20need%20an%20Audit%20for%20my%20Ajman%20Free%20Zone%20Company" target="_blank" rel="noopener">Connect on WhatsApp Instantly</a>
  </div>

  <h2>4. Comprehensive Accounting Services for Ajman Businesses</h2>
  <p>RBO Accounting provides complete financial management for businesses across the Emirates:</p>
  <ul>
    <li><a href="{$site_url}/areas-we-serve/ajman/">Ajman Accounting &amp; Tax Hub</a></li>
    <li><a href="{$site_url}/our-services/audit-assurance/free-zone-audit/">Free Zone Statutory Audit Services</a></li>
    <li><a href="{$site_url}/our-services/vat-registration-filing/">VAT Return Filing &amp; TRN Registration</a></li>
    <li><a href="{$site_url}/our-services/corporate-tax/">Corporate Tax Planning &amp; EmaraTax Filing</a></li>
    <li><a href="{$site_url}/our-services/payroll/wps/">WPS Payroll &amp; Wage Protection Compliance</a></li>
  </ul>
</div>
HTML;

	wp_update_post( array(
		'ID'           => $b2->ID,
		'post_content' => $b2_content,
	) );
}

echo "SUCCESS: Images registered and attached (Att1: {$att1_id}, Att2: {$att2_id})";
