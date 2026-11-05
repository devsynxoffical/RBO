<?php
/**
 * RBO Accounting — Master AFZ New Lighter Package (AED 11,000 1-Visa) Blog Publisher (2026)
 * 
 * Target Landing Pages to Rank:
 *   - https://www.rboaccounting.ae/business-setup/ajman-free-zone/ (Page ID: 5443)
 *   - https://www.rboaccounting.ae/business-setup/packages/ (Page ID: 5445)
 *   - https://www.rboaccounting.ae/areas-we-serve/ajman/ (Page ID: 2239)
 * 
 * Title:
 *   AFZ New Lighter Package 2026: AED 11,000 1-Visa Company Setup in Ajman Free Zone (Costs, Activities, Virtual Lease & Full Guide)
 * Slug:
 *   afz-new-lighter-package-2026-ajman-free-zone-setup
 * Date:
 *   2026-11-05 10:00:00
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

function rbo_register_afz_attachment( $image_filename, $post_id, $title, $alt_text ) {
	$site_url = home_url();
	$image_path = __DIR__ . '/wp-content/uploads/2026/09/' . $image_filename;
	if ( ! file_exists( $image_path ) ) {
		return 0;
	}

	$filetype = wp_check_filetype( basename( $image_path ), null );
	$attachment = array(
		'guid'           => $site_url . '/wp-content/uploads/2026/09/' . basename( $image_path ),
		'post_mime_type' => $filetype['type'],
		'post_title'     => preg_replace( '/\.[^.]+$/', '', $title ),
		'post_content'   => '',
		'post_status'    => 'inherit'
	);

	$attach_id = wp_insert_attachment( $attachment, $image_path, $post_id );
	if ( ! is_wp_error( $attach_id ) ) {
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		$attach_data = array(
			'width'  => 1200,
			'height' => 675,
			'file'   => '2026/09/' . basename( $image_path ),
			'sizes'  => array(
				'thumbnail' => array(
					'file'      => str_replace( '.jpg', '-150x150.jpg', basename( $image_path ) ),
					'width'     => 150,
					'height'    => 150,
					'mime-type' => 'image/jpeg'
				),
				'medium' => array(
					'file'      => str_replace( '.jpg', '-300x169.jpg', basename( $image_path ) ),
					'width'     => 300,
					'height'    => 169,
					'mime-type' => 'image/jpeg'
				),
				'medium_large' => array(
					'file'      => str_replace( '.jpg', '-768x432.jpg', basename( $image_path ) ),
					'width'     => 768,
					'height'    => 432,
					'mime-type' => 'image/jpeg'
				),
				'large' => array(
					'file'      => str_replace( '.jpg', '-1024x576.jpg', basename( $image_path ) ),
					'width'     => 1024,
					'height'    => 576,
					'mime-type' => 'image/jpeg'
				),
			)
		);
		wp_update_attachment_metadata( $attach_id, $attach_data );
		update_post_meta( $attach_id, '_wp_attachment_image_alt', $alt_text );
	}
	return $attach_id;
}

$title = 'AFZ New Lighter Package 2026: AED 11,000 1-Visa Company Setup in Ajman Free Zone (Costs, Activities, Virtual Lease & Full Guide)';
$slug  = 'afz-new-lighter-package-2026-ajman-free-zone-setup';

$content = <<<HTML
<p class="lead" style="font-size: 1.15rem; line-height: 1.8; color: #1e293b; font-weight: 500;">
<strong>Official Regulatory Briefing &bull; 2026 Company Formation Alert:</strong> Starting your business in the United Arab Emirates just became substantially more accessible. The Ajman Free Zone Authority (AFZA) has officially rolled out its flagship <strong>NEW AFZ Lighter Package</strong>—offering an all-inclusive <strong>1-Visa company setup at an unprecedented price of just AED 11,000</strong> with a guaranteed matching <strong>AED 11,000 annual renewal</strong>. As an <a href="{$site_url}/business-setup/ajman-free-zone/">official AFZA channel partner in Ajman Free Zone</a>, <a href="{$site_url}/">RBO Accounting Services FZE</a> delivers this definitive executive guide analyzing package entitlements, allowable activities, virtual lease allowances, UAE Corporate Tax implications, and the complete turnkey formation roadmap.
</p>

<div class="executive-summary-box" style="background: linear-gradient(135deg, #07192E 0%, #0c2d53 100%); color: #ffffff; padding: 28px 32px; border-radius: 12px; margin: 35px 0; box-shadow: 0 10px 25px rgba(0,0,0,0.12); border-left: 6px solid #E8B84B;">
    <h3 style="color: #E8B84B; margin-top: 0; font-size: 1.35rem; letter-spacing: -0.02em;">Key Takeaways: AFZ Lighter Package at a Glance</h3>
    <ul style="margin: 15px 0 0 0; padding-left: 20px; line-height: 1.8; font-size: 1.02rem;">
        <li><strong>Fixed Annual Pricing:</strong> Only <strong>AED 11,000</strong> upfront registration fee and guaranteed <strong>AED 11,000</strong> annual renewal with zero surprise escalation.</li>
        <li><strong>1 UAE Residence Visa Included:</strong> Covers company establishment card, visa allocation quota, and investor/partner or employment residency eligibility.</li>
        <li><strong>Flexible Multi-Activity Licensing:</strong> Combine up to <strong>3 business activities</strong> across consulting, services, digital commerce, and general business.</li>
        <li><strong>Co-Founding Freedom:</strong> Accommodates up to <strong>2 shareholders</strong> under one corporate trade license.</li>
        <li><strong>Virtual / Assumed Lease:</strong> Eliminates physical office overheads—fulfilling full legal trade licensing requirements via virtual tenancy.</li>
        <li><strong>Limited Validity Window:</strong> Official package rate remains valid until <strong>31 December 2026</strong>.</li>
    </ul>
</div>

<h2 style="font-size: 1.75rem; color: #07192E; margin-top: 45px; border-bottom: 2px solid #E8B84B; padding-bottom: 8px;">1. Breaking Down the AFZ Lighter Package: What Is Included?</h2>
<p>For entrepreneurs, independent consultants, digital nomads, and early-stage SME co-founders, navigating UAE free zone licensing packages frequently reveals hidden add-ons: unexpected establishment card fees, mandatory flexi-desk charges, or inflated renewal penalties. The <strong>AFZ Lighter Package</strong> completely disrupts this paradigm by bundling every legal foundation into one transparent, fixed-price vehicle.</p>

<p>Operating directly out of the C1 Building inside the Free Zone, our team at <a href="{$site_url}/areas-we-serve/ajman/">RBO Accounting in Ajman</a> has vetted the official fee structure. Here is the comprehensive entitlement matrix:</p>

<div class="table-responsive" style="overflow-x: auto; margin: 25px 0 35px 0;">
    <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.98rem; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-radius: 8px; overflow: hidden;">
        <thead>
            <tr style="background: #07192E; color: #ffffff;">
                <th style="padding: 16px 20px; border: 1px solid #1e3a5f;">Package Feature</th>
                <th style="padding: 16px 20px; border: 1px solid #1e3a5f;">Entitlement Details</th>
                <th style="padding: 16px 20px; border: 1px solid #1e3a5f;">Strategic Commercial Value</th>
            </tr>
        </thead>
        <tbody>
            <tr style="background: #ffffff;">
                <td style="padding: 14px 20px; border: 1px solid #e2e8f0; font-weight: 600;">Annual License Cost</td>
                <td style="padding: 14px 20px; border: 1px solid #e2e8f0; color: #047857; font-weight: 700;">AED 11,000</td>
                <td style="padding: 14px 20px; border: 1px solid #e2e8f0;">Unbeatable entry-level price point across all Northern Emirates &amp; Dubai.</td>
            </tr>
            <tr style="background: #f8fafc;">
                <td style="padding: 14px 20px; border: 1px solid #e2e8f0; font-weight: 600;">License Renewal Fee</td>
                <td style="padding: 14px 20px; border: 1px solid #e2e8f0; color: #047857; font-weight: 700;">AED 11,000 (Guaranteed Flat)</td>
                <td style="padding: 14px 20px; border: 1px solid #e2e8f0;">Zero hidden year-2 renewal escalation, ensuring predictable long-term operating cash flow.</td>
            </tr>
            <tr style="background: #ffffff;">
                <td style="padding: 14px 20px; border: 1px solid #e2e8f0; font-weight: 600;">Visa Allocation</td>
                <td style="padding: 14px 20px; border: 1px solid #e2e8f0;">1 Residence Visa Included</td>
                <td style="padding: 14px 20px; border: 1px solid #e2e8f0;">Full eligibility for 2-year Investor / Employment Visa and Emirates ID.</td>
            </tr>
            <tr style="background: #f8fafc;">
                <td style="padding: 14px 20px; border: 1px solid #e2e8f0; font-weight: 600;">Permitted Activities</td>
                <td style="padding: 14px 20px; border: 1px solid #e2e8f0;">Up to 3 Activities</td>
                <td style="padding: 14px 20px; border: 1px solid #e2e8f0;">Cross-vertical operations permitted (e.g. IT Consulting + Marketing + Management Advisory).</td>
            </tr>
            <tr style="background: #ffffff;">
                <td style="padding: 14px 20px; border: 1px solid #e2e8f0; font-weight: 600;">Shareholder Quota</td>
                <td style="padding: 14px 20px; border: 1px solid #e2e8f0;">Up to 2 Shareholders</td>
                <td style="padding: 14px 20px; border: 1px solid #e2e8f0;">Allows dual co-founders or individual solo-entrepreneurs to maintain 100% foreign equity.</td>
            </tr>
            <tr style="background: #f8fafc;">
                <td style="padding: 14px 20px; border: 1px solid #e2e8f0; font-weight: 600;">Office / Lease Agreement</td>
                <td style="padding: 14px 20px; border: 1px solid #e2e8f0;">Virtual / Assumed Lease</td>
                <td style="padding: 14px 20px; border: 1px solid #e2e8f0;">Zero physical rent liability while obtaining an official registered commercial address.</td>
            </tr>
            <tr style="background: #ffffff;">
                <td style="padding: 14px 20px; border: 1px solid #e2e8f0; font-weight: 600;">Offer Validity</td>
                <td style="padding: 14px 20px; border: 1px solid #e2e8f0; color: #b91c1c; font-weight: 600;">Until 31 December 2026</td>
                <td style="padding: 14px 20px; border: 1px solid #e2e8f0;">Immediate system availability for 2026 incorporation pipelines.</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="infographic-image-wrap" style="text-align: center; margin: 35px 0;">
    <img src="{$site_url}/wp-content/uploads/2026/09/afz-11000-package-infographic-breakdown-2026.jpg" alt="AFZ New Lighter Package 2026 AED 11000 1 Visa Infographic Breakdown" style="max-width: 100%; height: auto; border-radius: 10px; box-shadow: 0 8px 24px rgba(0,0,0,0.08); border: 1px solid #e2e8f0;" />
    <p style="font-size: 0.9rem; color: #64748b; margin-top: 8px;"><em>Figure 1: Official feature architectural matrix for the 2026 AFZ Lighter Package.</em></p>
</div>

<h2 style="font-size: 1.75rem; color: #07192E; margin-top: 45px; border-bottom: 2px solid #E8B84B; padding-bottom: 8px;">2. Comparative Market Analysis: AFZ vs Other UAE Free Zones</h2>
<p>When selecting a jurisdiction, founders frequently evaluate alternatives such as Sharjah Media City (SHAMS), International Free Zone Authority (IFZA), Ras Al Khaimah Economic Zone (RAKEZ), Meydan Free Zone, and Sharjah Publishing City (SPC). A critical financial analysis reveals why the <strong>AED 11,000 package</strong> creates unprecedented market leverage:</p>

<div class="table-responsive" style="overflow-x: auto; margin: 25px 0 35px 0;">
    <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.95rem; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-radius: 8px; overflow: hidden;">
        <thead>
            <tr style="background: #0f172a; color: #ffffff;">
                <th style="padding: 14px 18px; border: 1px solid #334155;">Jurisdiction &amp; Package</th>
                <th style="padding: 14px 18px; border: 1px solid #334155;">Initial 1-Visa Setup</th>
                <th style="padding: 14px 18px; border: 1px solid #334155;">Annual Renewal Cost</th>
                <th style="padding: 14px 18px; border: 1px solid #334155;">Lease Requirement</th>
                <th style="padding: 14px 18px; border: 1px solid #334155;">Activities Allowed</th>
            </tr>
        </thead>
        <tbody>
            <tr style="background: #ecfdf5; border-left: 4px solid #10b981;">
                <td style="padding: 14px 18px; border: 1px solid #cbd5e1; font-weight: 700; color: #065f46;">AFZ Lighter Package (2026)</td>
                <td style="padding: 14px 18px; border: 1px solid #cbd5e1; font-weight: 700; color: #047857;">AED 11,000</td>
                <td style="padding: 14px 18px; border: 1px solid #cbd5e1; font-weight: 700; color: #047857;">AED 11,000 (Locked)</td>
                <td style="padding: 14px 18px; border: 1px solid #cbd5e1;">Virtual / Assumed Lease</td>
                <td style="padding: 14px 18px; border: 1px solid #cbd5e1;">Up to 3 Activities</td>
            </tr>
            <tr style="background: #ffffff;">
                <td style="padding: 14px 18px; border: 1px solid #e2e8f0; font-weight: 600;">Dubai Free Zone Standard (e.g. IFZA / Meydan)</td>
                <td style="padding: 14px 18px; border: 1px solid #e2e8f0;">AED 14,500 &ndash; AED 17,900</td>
                <td style="padding: 14px 18px; border: 1px solid #e2e8f0;">AED 14,000 &ndash; AED 16,500</td>
                <td style="padding: 14px 18px; border: 1px solid #e2e8f0;">Dedicated Smart Desk / Flexi</td>
                <td style="padding: 14px 18px; border: 1px solid #e2e8f0;">1 &ndash; 3 Activities</td>
            </tr>
            <tr style="background: #f8fafc;">
                <td style="padding: 14px 18px; border: 1px solid #e2e8f0; font-weight: 600;">Sharjah Media City (SHAMS) 1-Visa</td>
                <td style="padding: 14px 18px; border: 1px solid #e2e8f0;">AED 13,200 &ndash; AED 14,800</td>
                <td style="padding: 14px 18px; border: 1px solid #e2e8f0;">AED 12,800 &ndash; AED 14,000</td>
                <td style="padding: 14px 18px; border: 1px solid #e2e8f0;">Shared Desk Facility</td>
                <td style="padding: 14px 18px; border: 1px solid #e2e8f0;">Up to 3 Activities</td>
            </tr>
            <tr style="background: #ffffff;">
                <td style="padding: 14px 18px; border: 1px solid #e2e8f0; font-weight: 600;">RAKEZ 1-Visa Professional Package</td>
                <td style="padding: 14px 18px; border: 1px solid #e2e8f0;">AED 12,500 &ndash; AED 14,200</td>
                <td style="padding: 14px 18px; border: 1px solid #e2e8f0;">AED 12,500 &ndash; AED 13,800</td>
                <td style="padding: 14px 18px; border: 1px solid #e2e8f0;">Flexi Facility / E-Hub</td>
                <td style="padding: 14px 18px; border: 1px solid #e2e8f0;">Up to 2 Activities</td>
            </tr>
        </tbody>
    </table>
</div>

<p>For founders comparing setup expenses across the country, our comprehensive directory of <a href="{$site_url}/business-setup/packages/">UAE business setup packages and costs</a> provides deep transparency on government licensing thresholds, medical VIP fast-tracks, and Emirates ID scheduling.</p>

<h2 style="font-size: 1.75rem; color: #07192E; margin-top: 45px; border-bottom: 2px solid #E8B84B; padding-bottom: 8px;">3. The Turnkey 5-Phase Incorporation Roadmap (Via Official Channel Partner)</h2>
<p>Working through an official channel partner guarantees that your application circumvents typical security rejection traps, name clearance disputes, or licensing delays. At RBO Accounting Services FZE, we execute the setup through a streamlined 5-stage timeline:</p>

<div class="timeline-container" style="margin: 30px 0;">
    <div style="background: #ffffff; border-left: 4px solid #E8B84B; padding: 20px 24px; margin-bottom: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.04); border-radius: 0 8px 8px 0;">
        <h4 style="color: #07192E; margin: 0 0 8px 0; font-size: 1.15rem;">Phase 1: Initial Security Approval &amp; Trade Name Reservation (Day 1 &ndash; 2)</h4>
        <p style="margin: 0; color: #475569; line-height: 1.6;">Submission of passport copies, national ID, passport-size photographs, and three preferred trade names. AFZA reviews activity selections against ministerial licensing classifications to ensure seamless approval.</p>
    </div>

    <div style="background: #ffffff; border-left: 4px solid #0c2d53; padding: 20px 24px; margin-bottom: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.04); border-radius: 0 8px 8px 0;">
        <h4 style="color: #07192E; margin: 0 0 8px 0; font-size: 1.15rem;">Phase 2: Digital Trade License &amp; Memorandum of Association (Day 2 &ndash; 3)</h4>
        <p style="margin: 0; color: #475569; line-height: 1.6;">Upon clearance, AFZA generates the official Digital Trade License, Memorandum of Association (MOA), Certificate of Incorporation, and the Virtual Tenancy / Assumed Lease contract under the AED 11,000 package.</p>
    </div>

    <div style="background: #ffffff; border-left: 4px solid #E8B84B; padding: 20px 24px; margin-bottom: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.04); border-radius: 0 8px 8px 0;">
        <h4 style="color: #07192E; margin: 0 0 8px 0; font-size: 1.15rem;">Phase 3: Establishment Card &amp; E-Channel Entry Permit (Day 3 &ndash; 5)</h4>
        <p style="margin: 0; color: #475569; line-height: 1.6;">Registration with the Federal Authority for Identity, Citizenship, Customs and Port Security (ICP). Issuance of the Company Establishment Card followed by the electronic 60-day residency Entry Permit.</p>
    </div>

    <div style="background: #ffffff; border-left: 4px solid #0c2d53; padding: 20px 24px; margin-bottom: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.04); border-radius: 0 8px 8px 0;">
        <h4 style="color: #07192E; margin: 0 0 8px 0; font-size: 1.15rem;">Phase 4: Medical Fitness VIP Testing &amp; Biometrics for Emirates ID (Day 5 &ndash; 8)</h4>
        <p style="margin: 0; color: #475569; line-height: 1.6;">Completion of preventive medical blood tests and chest X-rays at government health centers. Biometric capture for the official UAE Resident Emirates ID card followed by electronic residency stamping.</p>
    </div>

    <div style="background: #ffffff; border-left: 4px solid #10b981; padding: 20px 24px; margin-bottom: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.04); border-radius: 0 8px 8px 0;">
        <h4 style="color: #07192E; margin: 0 0 8px 0; font-size: 1.15rem;">Phase 5: Corporate Banking Onboarding &amp; Tax Compliance Kickoff (Day 8+)</h4>
        <p style="margin: 0; color: #475569; line-height: 1.6;">Application for corporate digital or conventional accounts (Wio Bank, Mashreq Neo Biz, Emirates NBD, ADCB) backed by structured business profiles, company invoices, and immediate Federal Tax Authority (FTA) tax profiling.</p>
    </div>
</div>

<h2 style="font-size: 1.75rem; color: #07192E; margin-top: 45px; border-bottom: 2px solid #E8B84B; padding-bottom: 8px;">4. Post-Incorporation Compliance: Corporate Tax, Bookkeeping &amp; VAT Mandates</h2>
<p>Forming an AFZ company under the Lighter Package provides a legal vehicle, but maintaining ongoing legal standing requires strict alignment with federal regulatory frameworks enacted by the UAE Ministry of Finance and the Federal Tax Authority (FTA):</p>

<h3 style="font-size: 1.25rem; color: #07192E; margin-top: 25px;">A. Federal Corporate Tax Law (Decree-Law No. 47 of 2022)</h3>
<p>Every newly incorporated AFZ entity is legally mandated to register for corporate tax with the FTA and secure a Corporate Tax Registration Number (TRN). Founders must navigate two critical statutory pathways:</p>
<ul style="line-height: 1.7; color: #334155;">
    <li><strong>Qualifying Free Zone Person (QFZP) at 0%:</strong> To maintain zero tax on qualifying income, the company must derive revenue from qualifying activities, maintain adequate economic substance in the UAE, and prepare audited financial statements under IFRS.</li>
    <li><strong>Small Business Relief (Article 21):</strong> If your business revenue does not exceed <strong>AED 3,000,000</strong> within a tax period (applicable through 31 December 2026), your company can elect for Small Business Relief, treating taxable income as zero and eliminating standard 9% tax liability.</li>
</ul>
<p>Our specialists guide your filing via <a href="{$site_url}/our-services/corporate-tax/">UAE corporate tax registration and return filing services</a> to ensure total penalty immunity.</p>

<h3 style="font-size: 1.25rem; color: #07192E; margin-top: 25px;">B. Statutory Record Keeping &amp; Bookkeeping (Article 56)</h3>
<p>Regardless of revenue volume or tax election, Article 56 of the Corporate Tax Law dictates that all UAE corporate entities must maintain complete financial ledgers, transactional invoices, bank statements, and accounting records for a mandatory minimum of <strong>7 years</strong>. Outsourcing your numbers to our dedicated <a href="{$site_url}/our-services/accounting/bookkeeping-and-accounting/">bookkeeping and accounting professionals in the UAE</a> guarantees audit-readiness at all times.</p>

<h3 style="font-size: 1.25rem; color: #07192E; margin-top: 25px;">C. Value Added Tax (VAT) Thresholds</h3>
<p>When taxable supplies exceed <strong>AED 375,000</strong> within the previous 12 months, VAT registration is legally mandatory under Federal Decree-Law No. (8) of 2017. Voluntary registration is accessible once revenue crosses <strong>AED 187,500</strong>. Explore our turnkey <a href="{$site_url}/our-services/vat-registration-filing/">UAE VAT registration and return filing assistance</a> for quarterly compliance.</p>

<div class="partner-cta-card" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #ffffff; padding: 32px 36px; border-radius: 12px; margin: 45px 0; text-align: center; border: 2px solid #E8B84B;">
    <h3 style="color: #E8B84B; font-size: 1.55rem; margin-top: 0;">Incorporate Under the AFZ Lighter Package with RBO Accounting</h3>
    <p style="font-size: 1.05rem; color: #cbd5e1; max-width: 780px; margin: 12px auto 25px auto; line-height: 1.7;">
        Do not navigate licensing bureaucracy, activity mapping, or bank account hurdles alone. As official AFZA Channel Partners operating on-site in Ajman Free Zone, RBO Accounting manages your entire formation process from name approval to residence visa issuance and corporate tax registration.
    </p>
    <div style="display: flex; justify-content: center; gap: 18px; flex-wrap: wrap;">
        <a href="https://wa.me/971508051857?text=Hi%20RBO%20Team,%20I%20want%20to%20register%20the%20AFZ%20New%20Lighter%20Package%20for%20AED%2011,000" target="_blank" rel="noopener" style="background: #25D366; color: #ffffff; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 1rem; display: inline-flex; align-items: center; gap: 8px;">
            WhatsApp Our AFZ Setup Desk &rarr;
        </a>
        <a href="{$site_url}/contact-us/" style="background: #E8B84B; color: #07192E; padding: 14px 28px; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 1rem;">
            Book Free Free Zone Consultation
        </a>
    </div>
</div>

<h2 style="font-size: 1.75rem; color: #07192E; margin-top: 45px; border-bottom: 2px solid #E8B84B; padding-bottom: 8px;">Frequently Asked Questions (FAQs)</h2>

<div class="faq-accordion" style="margin-top: 25px;">
    <div style="margin-bottom: 20px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px 24px;">
        <h4 style="color: #07192E; margin: 0 0 10px 0; font-size: 1.15rem;">What is the AFZ New Lighter Package?</h4>
        <p style="margin: 0; color: #475569; line-height: 1.6;">The AFZ New Lighter Package is a specialized, budget-optimized company formation offering introduced by the Ajman Free Zone Authority (AFZA). It packages an official trade license, virtual lease, up to 3 business activities, up to 2 shareholders, and 1 UAE residence visa for a total cost of AED 11,000 annually.</p>
    </div>

    <div style="margin-bottom: 20px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px 24px;">
        <h4 style="color: #07192E; margin: 0 0 10px 0; font-size: 1.15rem;">What is the total annual cost of the AFZ Lighter Package?</h4>
        <p style="margin: 0; color: #475569; line-height: 1.6;">The initial annual package cost is strictly AED 11,000. Additionally, the renewal fee is guaranteed flat at AED 11,000 per year, eliminating sudden rate surges in future operating years.</p>
    </div>

    <div style="margin-bottom: 20px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px 24px;">
        <h4 style="color: #07192E; margin: 0 0 10px 0; font-size: 1.15rem;">How many visas are included under this package?</h4>
        <p style="margin: 0; color: #475569; line-height: 1.6;">The package includes 1 UAE residence visa quota, enabling the founder to apply for a 2-year Investor/Partner Visa or an Employment Visa along with official Emirates ID and residency stamping.</p>
    </div>

    <div style="margin-bottom: 20px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px 24px;">
        <h4 style="color: #07192E; margin: 0 0 10px 0; font-size: 1.15rem;">What is the validity period of the AFZ Lighter Package?</h4>
        <p style="margin: 0; color: #475569; line-height: 1.6;">This promotional pricing structure is officially scheduled and valid until 31 December 2026. Companies incorporated before this deadline lock in the promotional baseline for future continuous renewals.</p>
    </div>

    <div style="margin-bottom: 20px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px 24px;">
        <h4 style="color: #07192E; margin: 0 0 10px 0; font-size: 1.15rem;">Does the package require leasing a physical office?</h4>
        <p style="margin: 0; color: #475569; line-height: 1.6;">No. The package includes a Virtual / Assumed Lease agreement. This provides the legally required business tenancy address for trade licensing without demanding expensive physical office rental commitments.</p>
    </div>

    <div style="margin-bottom: 20px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px 24px;">
        <h4 style="color: #07192E; margin: 0 0 10px 0; font-size: 1.15rem;">Can two partners co-found a company under this license?</h4>
        <p style="margin: 0; color: #475569; line-height: 1.6;">Yes. The package explicitly permits up to 2 individual shareholders to co-own the company with customized equity distribution recorded in the Memorandum of Association (MOA).</p>
    </div>

    <div style="margin-bottom: 20px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px 24px;">
        <h4 style="color: #07192E; margin: 0 0 10px 0; font-size: 1.15rem;">How many business activities can I combine under the trade license?</h4>
        <p style="margin: 0; color: #475569; line-height: 1.6;">Entrepreneurs can choose up to 3 business activities within compatible licensing segments (including commercial trading, professional advisory, digital media, and IT consultancy).</p>
    </div>

    <div style="margin-bottom: 20px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px 24px;">
        <h4 style="color: #07192E; margin: 0 0 10px 0; font-size: 1.15rem;">Why should I register through RBO Accounting Services FZE?</h4>
        <p style="margin: 0; color: #475569; line-height: 1.6;">RBO Accounting Services FZE is an official AFZA Channel Partner headquartered directly inside Ajman Free Zone (C1 Building). We streamline paperwork, eliminate security clearance delays, assist in digital bank account approvals, and provide continuous corporate tax and bookkeeping compliance.</p>
    </div>
</div>
HTML;

// Check existing post
$existing = get_page_by_path( $slug, OBJECT, 'post' );
$post_data = array(
	'post_title'    => $title,
	'post_name'     => $slug,
	'post_content'  => $content,
	'post_status'   => 'publish',
	'post_type'     => 'post',
	'post_author'   => $admin_user ? $admin_user->ID : 1,
	'post_date'     => '2026-11-05 10:00:00',
	'post_date_gmt' => '2026-11-05 06:00:00',
);

if ( $existing ) {
	$post_data['ID'] = $existing->ID;
	$post_id = wp_update_post( $post_data );
	echo "Updated existing post ID: $post_id\n";
} else {
	$post_id = wp_insert_post( $post_data );
	echo "Created new post ID: $post_id\n";
}

if ( is_wp_error( $post_id ) ) {
	die( 'Failed to save post: ' . $post_id->get_error_message() );
}

// Category & Tags
$cat_id = 0;
$cat_check = get_term_by( 'name', 'Business Setup & Free Zones', 'category' );
if ( ! $cat_check ) {
	$cat_check2 = get_term_by( 'name', 'Business Finance', 'category' );
	if ( $cat_check2 ) {
		$cat_id = $cat_check2->term_id;
	} else {
		$new_cat = wp_insert_term( 'Business Setup & Free Zones', 'category' );
		if ( ! is_wp_error( $new_cat ) ) {
			$cat_id = $new_cat['term_id'];
		}
	}
} else {
	$cat_id = $cat_check->term_id;
}

if ( $cat_id ) {
	wp_set_post_categories( $post_id, array( $cat_id ) );
}

wp_set_post_tags( $post_id, array(
	'AFZ New Lighter Package',
	'Ajman Free Zone AED 11000 Package',
	'AFZA 1 Visa Package 2026',
	'Cheapest Free Zone Visa UAE',
	'Ajman Free Zone Company Setup',
	'Business Setup Ajman',
	'Virtual Lease Free Zone UAE',
	'AFZ Renewal Cost 11000'
) );

// Register Featured Image
$hero_attach_id = rbo_register_afz_attachment(
	'afz-lighter-package-2026-hero-ajman-freezone.jpg',
	$post_id,
	'AFZ New Lighter Package 2026 Hero Ajman Freezone',
	'AFZ New Lighter Package 2026 AED 11000 1 Visa Setup in Ajman Free Zone'
);

if ( $hero_attach_id ) {
	set_post_thumbnail( $post_id, $hero_attach_id );
	echo "Set featured image thumbnail ID: $hero_attach_id\n";
}

// Rank Math Meta
update_post_meta( $post_id, 'rank_math_title', 'AFZ New Lighter Package 2026: AED 11,000 1-Visa Company Setup | RBO Accounting' );
update_post_meta( $post_id, 'rank_math_description', 'Official guide to the NEW AFZ Lighter Package 2026: AED 11,000 1-visa annual setup in Ajman Free Zone, locked AED 11,000 renewal, virtual lease, up to 3 activities & 2 shareholders.' );
update_post_meta( $post_id, 'rank_math_focus_keyword', 'AFZ New Lighter Package 2026' );
update_post_meta( $post_id, 'rank_math_robots', array( 'index', 'follow', 'max-snippet:-1', 'max-video-preview:-1', 'max-image-preview:large' ) );

// Schema.org FAQPage JSON-LD
$faq_schema = array(
	'@context' => 'https://schema.org',
	'@type'    => 'FAQPage',
	'mainEntity' => array(
		array(
			'@type' => 'Question',
			'name'  => 'What is the AFZ New Lighter Package?',
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => 'The AFZ New Lighter Package is a specialized, budget-optimized company formation offering introduced by the Ajman Free Zone Authority (AFZA). It packages an official trade license, virtual lease, up to 3 business activities, up to 2 shareholders, and 1 UAE residence visa for a total cost of AED 11,000 annually.'
			)
		),
		array(
			'@type' => 'Question',
			'name'  => 'What is the total annual cost of the AFZ Lighter Package?',
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => 'The initial annual package cost is strictly AED 11,000. Additionally, the renewal fee is guaranteed flat at AED 11,000 per year, eliminating sudden rate surges in future operating years.'
			)
		),
		array(
			'@type' => 'Question',
			'name'  => 'How many visas are included under this package?',
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => 'The package includes 1 UAE residence visa quota, enabling the founder to apply for a 2-year Investor/Partner Visa or an Employment Visa along with official Emirates ID and residency stamping.'
			)
		),
		array(
			'@type' => 'Question',
			'name'  => 'What is the validity period of the AFZ Lighter Package?',
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => 'This promotional pricing structure is officially scheduled and valid until 31 December 2026. Companies incorporated before this deadline lock in the promotional baseline for future continuous renewals.'
			)
		),
		array(
			'@type' => 'Question',
			'name'  => 'Does the package require leasing a physical office?',
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => 'No. The package includes a Virtual / Assumed Lease agreement. This provides the legally required business tenancy address for trade licensing without demanding expensive physical office rental commitments.'
			)
		),
		array(
			'@type' => 'Question',
			'name'  => 'Can two partners co-found a company under this license?',
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => 'Yes. The package explicitly permits up to 2 individual shareholders to co-own the company with customized equity distribution recorded in the Memorandum of Association (MOA).'
			)
		),
		array(
			'@type' => 'Question',
			'name'  => 'How many business activities can I combine under the trade license?',
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => 'Entrepreneurs can choose up to 3 business activities within compatible licensing segments (including commercial trading, professional advisory, digital media, and IT consultancy).'
			)
		),
		array(
			'@type' => 'Question',
			'name'  => 'Why should I register through RBO Accounting Services FZE?',
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => 'RBO Accounting Services FZE is an official AFZA Channel Partner headquartered directly inside Ajman Free Zone (C1 Building). We streamline paperwork, eliminate security clearance delays, assist in digital bank account approvals, and provide continuous corporate tax and bookkeeping compliance.'
			)
		),
	)
);

update_post_meta( $post_id, 'rank_math_schema_FAQPage', $faq_schema );
update_post_meta( $post_id, '_rbo_custom_faq_schema', json_encode( $faq_schema ) );

echo "SUCCESS: Blog published live at " . get_permalink( $post_id ) . "\n";

