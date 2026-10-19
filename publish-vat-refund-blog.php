<?php
/**
 * RBO Accounting — Master Publisher for High-Converting Trending Blog Post:
 * Topic: UAE VAT Refund Claim Service for Landlords, Engineering Consultants & Contractors: Complete 2026 Guide
 * 
 * Focus Keywords:
 * vat refund claim service for landlords, vat refund for engineering consultants, vat refund for contractors uae,
 * construction vat refund emaratax, commercial property vat recovery, form vat311 emaratax refund,
 * commercial landlord vat recovery, retention money vat uae
 * 
 * Usage:
 * - Local CLI: php publish-vat-refund-blog.php
 * - Live cPanel: Upload to public_html/ and visit https://www.rboaccounting.ae/publish-vat-refund-blog.php
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

$blog_slug  = 'vat-refund-claim-landlords-consultants-contractors-uae';
$blog_title = 'UAE VAT Refund Claim Service for Landlords, Engineering Consultants & Contractors: Complete 2026 Guide';
$seo_title  = 'UAE VAT Refund for Landlords, Consultants & Contractors | RBO';
$seo_desc   = 'Complete 2026 guide to claiming UAE VAT refunds for commercial landlords, engineering consultants, and contractors on EmaraTax (Form VAT311). Maximize cash flow & avoid FTA audits.';
$focus_kw   = 'vat refund claim service for landlords, vat refund for engineering consultants, vat refund for contractors uae, construction vat refund emaratax, commercial property vat recovery, form vat311 emaratax refund';

$blog_content = <<<HTML
<div class="rbo-blog">
  <p class="lead" style="font-size: 18.5px; line-height: 1.85; color: #09203b; font-weight: 500;">
    Across Dubai, Abu Dhabi, and the Northern Emirates, hundreds of millions of Dirhams in legitimate tax credits remain needlessly trapped on the Federal Tax Authority (FTA) EmaraTax portal. For <strong>commercial landlords</strong> undertaking multi-million capital improvements, <strong>engineering consultants</strong> executing zero-rated cross-border projects, and <strong>general construction contractors</strong> weathering extended 60-to-120-day billing milestones, reclaiming excess input VAT is not merely an accounting exercise—it is essential working capital that directly safeguards operational solvency.
  </p>

  <div class="rbo-box" style="background: #f0fdf4; border-left: 4px solid #16a34a; padding: 20px; border-radius: 8px; margin: 25px 0;">
    <strong style="color: #166534; font-size: 16px;">💡 Statutory Right to Cash Refunds:</strong> Under <em>Federal Decree-Law No. 8 of 2017 on Value Added Tax</em> and <em>Cabinet Decision No. 52 of 2017 (Executive Regulations)</em>, any taxable person whose recoverable input tax exceeds their output tax liability in a tax period has the explicit legal right to request a direct cash refund from the FTA via <strong>Form VAT311</strong>, rather than indefinitely rolling forward unutilized credits.
  </div>

  <h2>1. Commercial Real Estate &amp; Landlords: VAT Recovery Rules &amp; Strategies</h2>
  <p>
    Real estate tax law in the UAE establishes a strict legal dividing line between <strong>commercial property</strong> and <strong>residential property</strong>. Misunderstanding this distinction is the single largest reason property investors either forfeit valid refunds or trigger severe FTA audit penalties.
  </p>

  <h3>A. Commercial Property Leasing &amp; Development (5% Standard Rated)</h3>
  <p>
    The lease, sale, or sub-lease of commercial buildings—including corporate offices in DIFC, Downtown Dubai, and ADGM, retail showrooms, shopping complexes, industrial warehouses in Al Quoz and KIZAD, and labor accommodations—is standard-rated at 5%. Consequently, registered commercial landlords are entitled to <strong>100% input tax recovery</strong> on all ordinary business expenses directly related to these assets:
  </p>
  <ul>
    <li><strong>Design, Structural &amp; Civil Construction:</strong> 5% VAT incurred on main contractor progress billings, structural engineering, and piling contracts.</li>
    <li><strong>MEP &amp; Tenant Fit-Out Works:</strong> Mechanical, electrical, and plumbing infrastructure, HVAC installations, interior partitioning, and architectural fit-outs.</li>
    <li><strong>Facility Management &amp; Security:</strong> Routine maintenance, chiller plant services, janitorial contracts, security personnel, and landscaping.</li>
    <li><strong>Professional Brokerage &amp; Legal:</strong> Real estate broker leasing commissions, legal representation, and property management fees.</li>
  </ul>

  <h3>B. The 3-Year Zero-Rated Construction Rule for Residential Developers</h3>
  <p>
    While subsequent leasing of residential property is exempt from VAT (meaning landlords cannot recover operational input tax), <strong>Article 37 of the Executive Regulations</strong> provides a critical incentive for property developers: the <em>first supply of a newly constructed residential building within 3 years of completion</em> is <strong>Zero-Rated (0%)</strong>.
  </p>
  <div class="rbo-box" style="background: #eff6ff; border-left: 4px solid #2563eb; padding: 18px; border-radius: 6px; margin: 20px 0;">
    <strong>🏢 Multi-Million Developer Refund Opportunity:</strong> Because the first supply (sale or long lease) is zero-rated, developers charge 0% VAT to buyers but can legally recover <strong>100% of the 5% input VAT paid on contractor construction costs, building materials, and architectural consultancy</strong>. This creates enormous net refundable balances on Form VAT201 that can be reclaimed in cash via Form VAT311.
  </div>

  <h3>C. Capital Assets Scheme (CAS) for Properties Exceeding AED 5,000,000</h3>
  <p>
    Under Article 57 of the UAE VAT Executive Regulations, single real estate assets with a total expenditure of <strong>AED 5,000,000 or more</strong> fall under the mandatory <strong>Capital Assets Scheme (CAS)</strong>. CAS requires landlords to monitor and adjust their initial input tax recovery over a <strong>10-year period</strong>. If a commercial building is subsequently converted to residential exempt leasing, or if a mixed-use building's taxable-to-exempt ratio fluctuates, annual input tax adjustments must be reported in Box 13 of your <a href="{$site_url}/our-services/vat-registration-filing/return-filing/">VAT Return (Form VAT201)</a>.
  </p>

  <h2>2. Engineering Consultants &amp; Architects: Unlocking Trapped Export Credits</h2>
  <p>
    Engineering consultancies, architectural design firms, project management offices (PMOs), and quantity surveying practices operating from Dubai, Abu Dhabi, and Sharjah frequently find themselves in chronic net refund positions. Here is why:
  </p>

  <h3>A. Zero-Rated Export of Services (Article 31)</h3>
  <p>
    Leading UAE architectural and engineering firms routinely service international property developers and infrastructure projects across Saudi Arabia (KSA), Qatar, Oman, and Europe. Under <strong>Article 31 of the Executive Regulations</strong>, services supplied to a recipient who is a non-resident and outside the State at the time the services are performed qualify as <strong>0% Zero-Rated Exports</strong>.
  </p>
  <p>
    Because output supplies are billed at 0%, while high-value local overheads (Grade-A office rent, advanced BIM and AutoCAD software licensing, local server infrastructure, and specialized soil/structural testing) incur 5% VAT, engineering firms accumulate substantial continuous VAT credits that should be liquidated through routine EmaraTax refund filings.
  </p>

  <h3>B. Reverse Charge Mechanism (RCM) for Foreign Sub-Consultants</h3>
  <p>
    When a UAE engineering practice engages specialized foreign facade engineers, geotechnical analysts, or acoustic consultants who do not have a physical establishment or TRN in the UAE, the service must be accounted for under the <strong>Reverse Charge Mechanism (RCM)</strong>. The local consultancy declares 5% output VAT in Box 3 and simultaneously claims 5% input VAT in Box 10 of Form VAT201. Ensuring perfect documentary alignment between cross-border contracts, foreign invoices, and RCM declarations is essential to prevent FTA audit disallowances.
  </p>

  <h3>C. Client Reimbursements vs. Non-Taxable Disbursements</h3>
  <p>
    Engineering consultants frequently pay municipal planning fees, Dubai Municipality approvals, Civil Defence permits, and laboratory testing charges on behalf of project owners. Under <strong>FTA Public Clarification VATP013</strong>:
  </p>
  <ul>
    <li><strong>Disbursements (Out of Scope):</strong> If the official government permit invoice is issued in the client's name and the consultant acts solely as an paying agent, re-invoicing the exact fee without markup is not subject to VAT.</li>
    <li><strong>Reimbursements (Taxable at 5%):</strong> If travel, printing, or third-party reports are incurred by the consultant to deliver their service, re-billing them to the client is considered part of the overall consideration and must carry 5% VAT.</li>
  </ul>

  <h2>3. General Contractors &amp; Fit-Out Subcontractors: Solving the Cash Flow Squeeze</h2>
  <p>
    Construction contractors operate in one of the tightest cash flow environments in the UAE economy. Upfront cash outlays for ready-mix concrete, reinforcing steel, MEP equipment, formwork rentals, and labor accommodation carry an immediate 5% VAT cash charge, whereas project owners and developers frequently delay progress certification for 60, 90, or 120 days.
  </p>

  <h3>A. The Retention Money Pitfall (10% Guarantee Withholding)</h3>
  <p>
    Almost every standard FIDIC contract in the UAE stipulates that the employer will withhold <strong>5% to 10% Retention Money</strong> from each Interim Payment Certificate (IPC), releasing 50% upon Practical Completion and the final 50% upon expiry of the Defects Liability Period (typically 12 to 24 months later).
  </p>
  <div class="rbo-box" style="background: #fff7ed; border-left: 4px solid #ea580c; padding: 18px; border-radius: 6px; margin: 20px 0;">
    <strong>⚠️ Critical Retention Tax Point Rule:</strong> Under Article 25 of Federal Decree-Law No. 8 of 2017, for continuous supplies of goods and services, the date of supply is the earlier of the issuance of a tax invoice or the date payment is due/received. Contractors who prematurely issue a full tax invoice for the gross amount including retention money become legally liable to pay the 5% VAT on the retained cash immediately to the FTA—even though they may not receive the retention funds for two years! RBO structures milestone invoicing to ensure VAT is only triggered when retention claims become legally due.
  </div>

  <h3>B. Subcontractor Invoice Compliance &amp; 3-Way Matching</h3>
  <p>
    General contractors rely heavily on trade subcontractors (plastering, glazing, HVAC, painting). During an FTA refund audit, tax inspectors rigorously scrutinize subcontractor invoices. If a subcontractor has an expired trade licence, an unverified TRN, or issues an invoice lacking mandatory Article 59 criteria, the FTA will disallow the input tax claim and issue a <strong>20% to 50% tax assessment penalty</strong>. Engaging our dedicated <a href="{$site_url}/our-services/accounting/accounts-payable-and-receivable/">accounts payable verification and TRN validation services</a> eliminates this risk completely.
  </p>

  <h2>4. The 5-Step EmaraTax VAT Refund Process (Form VAT311)</h2>
  <p>
    Securing an approved cash disbursement into your UAE corporate bank account requires following a strict 5-stage regulatory workflow. Below is the end-to-end roadmap executed by our licensed FTA Tax Agents:
  </p>

  <div style="text-align: center; margin: 30px 0;">
    <img src="{$site_url}/wp-content/uploads/2026/09/vat-refund-process-flowchart-uae-2026.jpg" alt="UAE VAT Refund Process Flowchart on FTA EmaraTax Portal" style="max-width: 100%; height: auto; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border: 1px solid #e2e8f0;" />
    <p style="font-size: 14px; color: #64748b; margin-top: 8px;"><em>Figure 1: Official 5-Step UAE VAT Refund Roadmap from Input Tax Audit to Bank Settlement (Form VAT311).</em></p>
  </div>

  <div class="rbo-table-wrap">
    <table style="width: 100%; border-collapse: collapse; margin: 20px 0; font-size: 15px; border: 1px solid #e2e8f0;">
      <thead>
        <tr style="background: #09203b; color: #ffffff;">
          <th style="padding: 14px 16px; text-align: left; border: 1px solid #1e3a8a;">Stage</th>
          <th style="padding: 14px 16px; text-align: left; border: 1px solid #1e3a8a;">Action Required</th>
          <th style="padding: 14px 16px; text-align: left; border: 1px solid #1e3a8a;">Key Verification Deliverable</th>
        </tr>
      </thead>
      <tbody>
        <tr style="background: #ffffff;">
          <td style="padding: 12px 16px; font-weight: 700; border: 1px solid #e2e8f0;">1. Input Tax Audit</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Complete pre-filing audit of all vendor tax invoices, credit notes, and payment vouchers.</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Article 59 Invoice Compliance Checklist &amp; TRN Portal Validation.</td>
        </tr>
        <tr style="background: #f8fafc;">
          <td style="padding: 12px 16px; font-weight: 700; border: 1px solid #e2e8f0;">2. Form VAT201 Filing</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Submit quarterly VAT return establishing net excess recoverable tax in Box 14.</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">EmaraTax Form VAT201 Acknowledgement Receipt.</td>
        </tr>
        <tr style="background: #ffffff;">
          <td style="padding: 12px 16px; font-weight: 700; border: 1px solid #e2e8f0;">3. Form VAT311 Submission</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Lodge formal cash refund application on EmaraTax electing bank transfer disbursement.</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Application Reference Number &amp; Stamped Bank IBAN Letter.</td>
        </tr>
        <tr style="background: #f8fafc;">
          <td style="padding: 12px 16px; font-weight: 700; border: 1px solid #e2e8f0;">4. FTA Pre-Refund Audit</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Respond to FTA Request for Information (RFI) questionnaire within 20 business days.</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Full Audit Dossier: Top 20 Invoices, Bank Statements, BOQ &amp; IPCs.</td>
        </tr>
        <tr style="background: #ffffff;">
          <td style="padding: 12px 16px; font-weight: 700; border: 1px solid #e2e8f0;">5. Direct Cash Payout</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">FTA approval and automated electronic funds transfer into client corporate account.</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Official FTA Refund Approval Notice &amp; Bank Credit Advice.</td>
        </tr>
      </tbody>
    </table>
  </div>

  <h2>5. Sector Comparison: Landlords vs. Consultants vs. Contractors</h2>
  <div class="rbo-table-wrap">
    <table style="width: 100%; border-collapse: collapse; margin: 20px 0; font-size: 15px; border: 1px solid #e2e8f0;">
      <thead>
        <tr style="background: #09203b; color: #ffffff;">
          <th style="padding: 14px 16px; text-align: left; border: 1px solid #1e3a8a;">Industry Sector</th>
          <th style="padding: 14px 16px; text-align: left; border: 1px solid #1e3a8a;">Primary Output VAT Rate</th>
          <th style="padding: 14px 16px; text-align: left; border: 1px solid #1e3a8a;">Top Recoverable Input Expenses</th>
          <th style="padding: 14px 16px; text-align: left; border: 1px solid #1e3a8a;">Biggest VAT Risk Factor</th>
          <th style="padding: 14px 16px; text-align: left; border: 1px solid #1e3a8a;">EmaraTax Refund Strategy</th>
        </tr>
      </thead>
      <tbody>
        <tr style="background: #ffffff;">
          <td style="padding: 12px 16px; font-weight: 700; border: 1px solid #e2e8f0;">Commercial Landlords</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">5% (Standard Commercial Leases)</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Construction progress billings, HVAC/MEP, building maintenance, broker fees.</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Capital Assets Scheme (10-yr adjustment) &amp; mixed-use apportionment.</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Claim cash refunds during development &amp; vacancy phases.</td>
        </tr>
        <tr style="background: #f8fafc;">
          <td style="padding: 12px 16px; font-weight: 700; border: 1px solid #e2e8f0;">Engineering Consultants</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">0% (Foreign Projects) / 5% (Local)</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">BIM/CAD software licenses, Grade-A office leases, specialist lab testing.</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Misclassifying disbursements vs reimbursements; foreign RCM gaps.</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Routine quarterly Form VAT311 filings to monetize zero-rated export credits.</td>
        </tr>
        <tr style="background: #ffffff;">
          <td style="padding: 12px 16px; font-weight: 700; border: 1px solid #e2e8f0;">General Contractors</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">5% (Construction Milestone Billings)</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Ready-mix concrete, structural steel, heavy machinery rentals, trade subcontractors.</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Premature VAT on retention money; non-compliant subcontractor invoices.</td>
          <td style="padding: 12px 16px; border: 1px solid #e2e8f0;">Align input tax recovery directly with certified Interim Payment Certificates.</td>
        </tr>
      </tbody>
    </table>
  </div>

  <h2>6. Mandatory FTA Pre-Refund Audit Checklist</h2>
  <p>
    When you submit Form VAT311 for a refund exceeding AED 50,000, the FTA routinely issues an automated <strong>pre-refund audit notification</strong> requiring electronic submission of verification records within <strong>20 business days</strong>. Missing this window causes immediate rejection and forfeits the claim. Our tax team prepares this complete dossier in advance:
  </p>
  <ul>
    <li><strong>Top 20 Purchase Tax Invoices:</strong> Must display the word "Tax Invoice" prominently, supplier legal name, address, supplier TRN, recipient legal name, recipient TRN, sequential invoice number, date of issue, description of supply, unit price, quantity, 5% VAT rate, VAT amount in AED, and gross total in AED (Article 59).</li>
    <li><strong>Unbroken Proof of Payment Trail:</strong> Stamped corporate bank statements, telegraphic transfer (SWIFT) advices, or clearing vouchers proving that every claimed invoice has been settled in full.</li>
    <li><strong>Commercial Contracts &amp; Subcontracts:</strong> Fully executed contracts, FIDIC agreements, client purchase orders, and Letters of Award.</li>
    <li><strong>Interim Payment Certificates (IPCs):</strong> Engineer-certified IPCs and progress measurement sheets supporting every progress billing.</li>
    <li><strong>Reconciliation Trial Balance &amp; General Ledger:</strong> Extracted directly from cloud accounting software like Zoho Books, QuickBooks, or Xero, reconciled with the company's <a href="{$site_url}/uae-corporate-tax-returns-ct-registration-guide-2026/">Corporate Tax Returns (Form CT201)</a>.</li>
  </ul>

  <h2>7. What to Do If the FTA Rejects Your VAT Refund Claim</h2>
  <p>
    If the FTA partially disallows your input tax or rejects your Form VAT311 refund application due to alleged documentation discrepancies, do not panic. Under <em>Federal Decree-Law No. 28 of 2022 on Tax Procedures</em>, you have the statutory right to challenge the decision:
  </p>
  <ol>
    <li><strong>Request for Reconsideration:</strong> Submit a formal appeal through EmaraTax within <strong>40 business days</strong> of the decision, presenting supplemental proof of payment, corrected tax invoices, or legal clarifications under Cabinet Decision No. 105. Learn more in our <a href="{$site_url}/corporate-tax-reconsideration-penalty-waiver-uae/">guide to FTA penalty reconsiderations and waivers</a>.</li>
    <li><strong>Tax Disputes Resolution Committee (TDRC):</strong> If reconsideration is rejected, escalate the matter before the Ministry of Justice TDRC.</li>
  </ol>

  <div class="rbo-cta" style="background: linear-gradient(135deg, #09203b 0%, #1e3a8a 100%); color: #ffffff; padding: 35px 25px; border-radius: 12px; margin: 35px 0; text-align: center;">
    <h3 style="color: #ffffff; margin-top: 0; font-size: 24px;">Need an FTA Tax Agent to Unlock Your Trapped VAT Refund?</h3>
    <p style="font-size: 16px; max-width: 750px; margin: 15px auto 25px; color: #e2e8f0;">
      RBO Accounting Services FZE represents commercial landlords, top-tier engineering consultancies, and construction contractors across Dubai, Abu Dhabi, and Ajman. We conduct thorough pre-refund health checks, prepare flawless audit dossiers, file Form VAT311, and liaise directly with FTA auditors until cash is deposited in your bank account.
    </p>
    <a href="https://wa.me/971524473871?text=Hello%20RBO,%20I%20need%20expert%20assistance%20with%20a%20VAT%20Refund%20Claim%20for%20Landlords,%20Consultants,%20or%20Contractors" style="background: #22c55e; color: #ffffff; font-weight: 700; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-size: 16px; display: inline-block; box-shadow: 0 4px 12px rgba(34, 197, 94, 0.4);">💬 Claim Your VAT Refund via WhatsApp (+971 52 447 3871)</a>
  </div>
</div>
HTML;

$blog_faqs = array(
	array(
		'q' => 'Can a commercial landlord claim a VAT refund on construction and fit-out costs in UAE?',
		'a' => 'Yes. Commercial property leasing and sales are standard-rated at 5% under UAE VAT Law. Therefore, VAT-registered commercial landlords are entitled to recover 100% of the input VAT incurred on architectural design, civil construction, HVAC, interior fit-outs, and maintenance. When input VAT exceeds output tax, a cash refund can be claimed on EmaraTax via Form VAT311.',
	),
	array(
		'q' => 'How can engineering consultants recover VAT when billing overseas clients at 0%?',
		'a' => 'Under Article 31 of Cabinet Decision No. 52 of 2017, engineering and architectural services supplied to foreign clients who are outside the UAE at the time of performance qualify as Zero-Rated (0%) exports. Consultants charge 0% VAT but continue to recover 100% of the 5% input VAT paid on office leases, software licenses, and local sub-consultants, creating regular refundable tax credits.',
	),
	array(
		'q' => 'When is VAT triggered on retention money held in construction contracts?',
		'a' => 'Under Article 25 of the UAE VAT Law, VAT on continuous construction supplies is triggered upon the earlier of the date a tax invoice is issued or the date payment is due/received. If a contractor issues a tax invoice that excludes the 5-10% retention money until the defects liability period expires, VAT on the retention is deferred until that retention invoice is formally raised.',
	),
	array(
		'q' => 'What is Form VAT311 on the UAE EmaraTax portal?',
		'a' => 'Form VAT311 is the official electronic application form used to claim a cash refund of excess recoverable VAT from the Federal Tax Authority (FTA). It can only be submitted after filing Form VAT201 when Box 14 shows a net recoverable position.',
	),
	array(
		'q' => 'How long does the FTA take to approve and disburse a VAT refund?',
		'a' => 'Standard FTA processing takes between 20 and 40 business days. If the claim triggers a pre-refund audit, the applicant is granted 20 business days to upload verified tax invoices, bank statements, and contracts. Once approved, funds are transferred directly into the company\'s validated UAE corporate bank account.',
	),
	array(
		'q' => 'What happens if a subcontractor\'s invoice is rejected during an FTA VAT audit?',
		'a' => 'If a subcontractor invoice fails to comply with Article 59 (e.g., missing TRN, invalid date, or lack of proof of payment), the FTA disallows the input tax claim, recalculates the tax balance, and issues administrative penalties of up to 50% on the disallowed amount. Engaging an FTA Tax Agent ensures all invoices are pre-audited and 100% compliant before submission.',
	),
);

// Check if post already exists or insert
$existing_post = get_page_by_path( $blog_slug, OBJECT, 'post' );
$cat_id = 0;
$vat_cat = get_term_by( 'name', 'VAT Registration', 'category' );
if ( ! $vat_cat ) {
	$vat_cat = get_term_by( 'name', 'Tax Advisory', 'category' );
}
if ( ! $vat_cat ) {
	$vat_cat = get_term_by( 'name', 'Corporate Tax', 'category' );
}
if ( $vat_cat ) {
	$cat_id = $vat_cat->term_id;
}

// Set publication date to current local time to ensure immediate publish status
$now_local = current_time( 'mysql' );
$now_gmt   = current_time( 'mysql', 1 );

if ( $existing_post ) {
	$post_id = $existing_post->ID;
	wp_update_post( array(
		'ID'            => $post_id,
		'post_title'    => $blog_title,
		'post_content'  => $blog_content,
		'post_status'   => 'publish',
		'post_date'     => $now_local,
		'post_date_gmt' => $now_gmt,
		'post_category' => $cat_id ? array( $cat_id ) : array(),
	) );
	$action = 'Updated Existing Blog';
} else {
	$post_id = wp_insert_post( array(
		'post_title'    => $blog_title,
		'post_name'     => $blog_slug,
		'post_content'  => $blog_content,
		'post_status'   => 'publish',
		'post_type'     => 'post',
		'post_date'     => $now_local,
		'post_date_gmt' => $now_gmt,
		'post_category' => $cat_id ? array( $cat_id ) : array(),
	) );
	$action = 'Published New Blog';
}


// Attach featured image
$image_path = __DIR__ . '/wp-content/uploads/2026/09/vat-refund-claim-landlords-consultants-contractors-uae.jpg';
if ( file_exists( $image_path ) ) {
	$existing_att = get_posts( array(
		'post_type'      => 'attachment',
		'name'           => 'vat-refund-claim-landlords-consultants-contractors-uae',
		'posts_per_page' => 1,
	) );

	if ( ! empty( $existing_att ) ) {
		$attach_id = $existing_att[0]->ID;
	} else {
		$filetype = wp_check_filetype( basename( $image_path ), null );
		$attachment = array(
			'guid'           => $site_url . '/wp-content/uploads/2026/09/' . basename( $image_path ),
			'post_mime_type' => $filetype['type'],
			'post_title'     => 'UAE VAT Refund Claim Service for Landlords Consultants Contractors 2026',
			'post_content'   => '',
			'post_status'    => 'inherit',
		);
		$attach_id = wp_insert_attachment( $attachment, $image_path, $post_id );
		require_once ABSPATH . 'wp-admin/includes/image.php';
		$attach_data = wp_generate_attachment_metadata( $attach_id, $image_path );
		wp_update_attachment_metadata( $attach_id, $attach_data );
	}

	if ( $attach_id ) {
		set_post_thumbnail( $post_id, $attach_id );
	}
}

// Update Rank Math SEO Metadata
update_post_meta( $post_id, 'rank_math_title', $seo_title );
update_post_meta( $post_id, 'rank_math_description', $seo_desc );
update_post_meta( $post_id, 'rank_math_focus_keyword', $focus_kw );
update_post_meta( $post_id, 'rank_math_robots', array( 'index' ) );
update_post_meta( $post_id, '_rbo_faq_schema', $blog_faqs );

// Add tags
wp_set_post_tags( $post_id, array(
	'VAT Refund UAE',
	'Commercial Landlords VAT',
	'Engineering Consultants VAT',
	'Contractors VAT Refund',
	'Form VAT311',
	'EmaraTax Refund',
	'Retention Money VAT',
	'Capital Assets Scheme'
), true );

flush_rewrite_rules( false );
$permalink = get_permalink( $post_id );
$results[] = "{$action}: {$blog_title} (ID: {$post_id})";

echo "\n=======================================================\n";
echo " BLOG PUBLISHING SUMMARY:\n";
foreach ( $results as $r ) {
	echo " ✅ {$r}\n";
}
echo " Local URL: {$permalink}\n";
echo "=======================================================\n\n";

if ( php_sapi_name() !== 'cli' ) :
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Blog Published: <?php echo esc_html( $blog_title ); ?></title>
<style>
body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #09203b; color: #f8fafc; padding: 40px 20px; line-height: 1.6; }
.card { max-width: 700px; margin: 0 auto; background: #0f2d52; border-radius: 12px; padding: 30px; border: 1px solid #1e4976; box-shadow: 0 10px 30px rgba(0,0,0,0.3); }
h1 { color: #38bdf8; margin-top: 0; font-size: 24px; }
.btn { display: inline-block; background: #22c55e; color: #fff; padding: 12px 24px; text-decoration: none; border-radius: 6px; font-weight: 700; margin-top: 20px; }
.meta { background: #07192e; padding: 15px; border-radius: 6px; margin: 20px 0; font-family: monospace; font-size: 14px; }
</style>
</head>
<body>
<div class="card">
  <h1>🚀 Blog Successfully Published on Live Site!</h1>
  <p><strong>Post Title:</strong> <?php echo esc_html( $blog_title ); ?></p>
  <div class="meta">
    <div><strong>Post ID:</strong> <?php echo esc_html( $post_id ); ?></div>
    <div><strong>Slug:</strong> <?php echo esc_html( $blog_slug ); ?></div>
    <div><strong>Focus Keywords:</strong> <?php echo esc_html( $focus_kw ); ?></div>
    <div><strong>Status:</strong> Published (Indexed with FAQ Schema)</div>
  </div>
  <a href="<?php echo esc_url( $permalink ); ?>" target="_blank" class="btn">View Live Blog Post &rarr;</a>
</div>
</body>
</html>
<?php endif;
