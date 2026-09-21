<?php
/**
 * Plugin Name: RBO Business Setup Services & Lead Gen Pages
 * Description: Automated provisioning, Schema.org JSON-LD, SEO metadata, rich image showcases, and luxury Elementor-matched layouts for UAE Business Setup service pages (Official Ajman Free Zone Channel Partner).
 * Version: 1.3.0
 * Author: RBO Accounting Services FZE
 */

defined( 'ABSPATH' ) || exit;

/**
 * 1. Define Business Setup Page Specifications & Content
 */
function rbo_get_business_setup_pages_spec() {
	return array(
		'business-setup' => array(
			'title'       => 'UAE Business Setup & Company Formation Services',
			'menu_title'  => 'UAE Business Setup',
			'slug'        => 'business-setup',
			'meta_desc'   => 'End-to-end UAE business setup & company formation. Official Ajman Free Zone (AFZA) Channel Partner & Mainland DED experts in Dubai & across UAE. 100% foreign ownership with day-one tax compliance.',
			'focus_kw'    => 'business setup UAE',
			'service_type'=> 'Company Formation & Business Setup',
			'faqs'        => array(
				array(
					'q' => 'What is the minimum cost to set up a business in the UAE?',
					'a' => 'Business setup costs vary based on jurisdiction (Free Zone vs. Mainland) and visa allocation. As an Official Ajman Free Zone Channel Partner, RBO provides all-inclusive AFZA packages starting from AED 5,555 for zero-visa setups, while Dubai Mainland trade licenses generally start from AED 15,000 to AED 22,000 including initial approvals and commercial tenancy registration.',
				),
				array(
					'q' => 'Can a foreign investor own 100% of a UAE company?',
					'a' => 'Yes. Under the amended UAE Commercial Companies Law, 100% foreign ownership is available across all 40+ UAE Free Zones and for over 1,000 commercial and industrial business activities on the UAE Mainland without requiring a local Emirati sponsor.',
				),
				array(
					'q' => 'How does RBO being an Official Ajman Free Zone Channel Partner benefit my setup?',
					'a' => 'As an authorized AFZA Channel Partner, RBO Accounting Services FZE provides direct on-the-ground liaison with authority leadership, VIP fast-tracked application processing (license delivery in 24-48 hours), priority document verification, exclusive authority discounts, and dedicated account manager assignment with zero middleman fees.',
				),
				array(
					'q' => 'Why is bundling business setup with accounting & tax services critical?',
					'a' => 'Under UAE Federal Decree-Law No. 47 of 2022 and FTA Decision No. 3 of 2024, every newly registered company must register for Corporate Tax within strict timelines (typically 3 months) or face an immediate AED 10,000 administrative penalty. Bundling setup with accounting ensures day-one tax registration, compliant chart of accounts, and audit-ready records.',
				),
				array(
					'q' => 'What documents are required to initiate UAE company formation?',
					'a' => 'For individual shareholders: color passport copies, UAE entry stamp/visit visa (or Emirates ID copy if resident), 3 proposed trade names, and a brief description of business activities. For corporate shareholders: Certificate of Incorporation, Memorandum of Association (MOA), and Board Resolution attested by the UAE Embassy.',
				),
			),
			'content'     => '
<div class="rbo-elementor-service-wrapper">
	<!-- Full-Width Luxury Hero Banner -->
	<section class="rbo-hero-section">
		<div class="rbo-hero-container">
			<div class="rbo-hero-left">
				<div class="rbo-partner-badge">
					<span class="rbo-star">★</span> Official Ajman Free Zone (AFZA) Registered Channel Partner
				</div>
				<h1 class="rbo-hero-heading">UAE Business Setup &amp; Company Formation in <span class="rbo-gold-text">Dubai &amp; UAE</span></h1>
				<p class="rbo-hero-lead">Launch your UAE venture with 100% foreign equity, 24–48h fast-track licensing, zero middleman fees, and integrated day-one Corporate Tax &amp; VAT compliance.</p>
				
				<div class="rbo-hero-points">
					<div class="rbo-hero-point">
						<span class="rbo-check-icon">✓</span>
						<span><strong>24–48 Hour Fast Track:</strong> Direct AFZA registrar submission</span>
					</div>
					<div class="rbo-hero-point">
						<span class="rbo-check-icon">✓</span>
						<span><strong>100% Foreign Ownership:</strong> Mainland &amp; Free Zone structuring</span>
					</div>
					<div class="rbo-hero-point">
						<span class="rbo-check-icon">✓</span>
						<span><strong>Day-One Tax Protection:</strong> Avoid the AED 10,000 FTA fine</span>
					</div>
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
						<a href="' . home_url( '/contact-us/' ) . '" class="rbo-btn-gold-hero">Request Call Back</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Main Body Content Section -->
	<div class="rbo-body-container">
		<!-- Channel Partner Trust Banner -->
		<div class="rbo-trust-card">
			<div class="rbo-trust-icon-wrap">🏛️</div>
			<div class="rbo-trust-text">
				<h3>Official Registered Channel Partner of Ajman Free Zone (AFZA)</h3>
				<p>RBO Accounting Services FZE operates directly from its corporate headquarters in Ajman Free Zone. As an accredited authority partner, we provide direct registrar access, preferential authority package rates starting from <strong>AED 5,555</strong>, priority document verification, and dedicated bank account opening assistance.</p>
			</div>
		</div>

		<!-- 3 Core Setup Streams -->
		<h2 class="rbo-section-title">Select Your UAE Setup Jurisdiction</h2>
		<p class="rbo-section-sub">Tailored incorporation strategies designed for your business model and target market:</p>
		
		<div class="rbo-cards-grid-3">
			<div class="rbo-feature-box">
				<div class="rbo-box-icon">🏢</div>
				<div class="rbo-box-tag">Domestic &amp; Retail</div>
				<h3>UAE Mainland (DED / DET)</h3>
				<p>Trade freely across all 7 emirates, open physical retail shops anywhere, and bid on government and semi-governmental procurement contracts with 100% foreign ownership.</p>
				<ul class="rbo-box-list">
					<li>Direct access to local UAE consumer market</li>
					<li>No restrictions on commercial office location</li>
					<li>Eligibility for lucrative government tenders</li>
				</ul>
				<a href="' . home_url( '/our-services/business-setup/mainland-vs-free-zone/' ) . '" class="rbo-card-link">Compare Mainland vs Free Zone →</a>
			</div>

			<div class="rbo-feature-box rbo-box-highlight">
				<div class="rbo-ribbon">Most Cost-Effective</div>
				<div class="rbo-box-icon">🌐</div>
				<div class="rbo-box-tag">Official Channel Partner</div>
				<h3>Ajman &amp; UAE Free Zones</h3>
				<p>Enjoy 100% foreign ownership, 0% customs duty on imports/exports, 0% Corporate Tax benefits on Qualifying Income, and flexible flexi-desk office packages.</p>
				<ul class="rbo-box-list">
					<li><strong>24–48 Hour license issuance</strong> via AFZA</li>
					<li>Zero-visa to multi-visa flexible allocations</li>
					<li>100% repatriation of capital and business profits</li>
				</ul>
				<a href="' . home_url( '/our-services/business-setup/ajman-free-zone/' ) . '" class="rbo-card-btn-gold">Explore Ajman Free Zone Setup →</a>
			</div>

			<div class="rbo-feature-box">
				<div class="rbo-box-icon">💼</div>
				<div class="rbo-box-tag">All-In-One Value</div>
				<h3>Setup + Tax Compliance Bundles</h3>
				<p>Avoid the costly AED 10,000 Corporate Tax late registration penalty by bundling your company incorporation with mandatory FTA tax registration and professional bookkeeping.</p>
				<ul class="rbo-box-list">
					<li>Trade License + Residence Visas</li>
					<li>FTA Corporate Tax &amp; VAT Registration</li>
					<li>3 to 6 Months Cloud Bookkeeping</li>
				</ul>
				<a href="' . home_url( '/our-services/business-setup/packages/' ) . '" class="rbo-card-link">View All-in-One Bundles →</a>
			</div>
		</div>

		<!-- Visual Feature Section 1: Executive Corporate Structuring -->
		<div class="rbo-visual-showcase">
			<div class="rbo-showcase-image-wrap">
				<img src="' . home_url( '/wp-content/uploads/2026/09/uae-business-setup-consulting.jpg' ) . '" alt="UAE Business Setup &amp; Company Formation Advisory in Dubai" class="rbo-showcase-img" />
				<div class="rbo-img-floating-tag">
					<span class="rbo-tag-num">100%</span>
					<span class="rbo-tag-txt">Foreign Equity Ownership</span>
				</div>
			</div>
			<div class="rbo-showcase-content">
				<div class="rbo-mini-pill">Strategic Corporate Formation</div>
				<h3>Accelerate Your UAE Market Entry with Certified Tax &amp; Licensing Partners</h3>
				<p>Forming a business in the UAE requires careful harmonization between licensing authority regulations, commercial banking compliance standards, and Federal Tax Authority (FTA) mandates. At RBO Accounting Services FZE, we provide an integrated launchpad ensuring your company operates profitably and lawfully from day one.</p>
				<div class="rbo-feature-checklist-grid">
					<div class="rbo-fc-item">
						<span class="rbo-fc-check">✓</span>
						<div><strong>Zero Personal Income Tax:</strong> 100% personal wealth retention and full profit repatriation.</div>
					</div>
					<div class="rbo-fc-item">
						<span class="rbo-fc-check">✓</span>
						<div><strong>Bank-Ready Compliance:</strong> Pre-screened dossiers ensuring swift corporate bank account approval.</div>
					</div>
					<div class="rbo-fc-item">
						<span class="rbo-fc-check">✓</span>
						<div><strong>FTA Certified Tax Agents:</strong> Day-one Corporate Tax &amp; VAT setup avoiding the AED 10,000 fine.</div>
					</div>
					<div class="rbo-fc-item">
						<span class="rbo-fc-check">✓</span>
						<div><strong>Investor &amp; Family Visas:</strong> Fast-track VIP medical testing and Emirates ID stamping.</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Visual Feature Section 2: Channel Partner Authority HQ -->
		<div class="rbo-visual-showcase rbo-showcase-reverse">
			<div class="rbo-showcase-content">
				<div class="rbo-mini-pill rbo-pill-gold">Direct Authority Channel Partnership</div>
				<h3>Ajman Free Zone (AFZA) On-The-Ground Authority Liaison</h3>
				<p>As an <strong>Official Registered Channel Partner</strong> physically based inside Ajman Free Zone, RBO eliminates the bureaucracy, hidden broker fees, and multi-week waiting times associated with generic agency intermediaries.</p>
				<ul class="rbo-box-list">
					<li><strong>24–48 Hour Trade License Turnaround:</strong> Direct submission into priority registrar review queues.</li>
					<li><strong>Preferential Authority Tariffs:</strong> Starter packages starting from <strong>AED 5,555</strong> with transparent installment payment plans.</li>
					<li><strong>On-Site Physical Representation:</strong> Dedicated account managers handling document notarization, amendments, and annual renewals directly inside the Free Zone.</li>
				</ul>
				<a href="' . home_url( '/our-services/business-setup/ajman-free-zone/' ) . '" class="rbo-card-btn-gold">Explore Ajman Channel Partner Benefits →</a>
			</div>
			<div class="rbo-showcase-image-wrap">
				<img src="' . home_url( '/wp-content/uploads/2026/09/afza-channel-partner-hq.jpg' ) . '" alt="Ajman Free Zone Official Channel Partner Headquarters" class="rbo-showcase-img" />
				<div class="rbo-img-floating-tag rbo-tag-gold">
					<span class="rbo-tag-num">24h</span>
					<span class="rbo-tag-txt">Fast-Track Trade Licensing</span>
				</div>
			</div>
		</div>

		<!-- End-to-End Scope Grid -->
		<h2 class="rbo-section-title">End-to-End Company Formation &amp; Licensing Services</h2>
		<p class="rbo-section-sub">From activity mapping to corporate bank account opening, RBO manages every milestone:</p>
		
		<div class="rbo-scope-grid">
			<div class="rbo-scope-card">
				<h4>1. Activity &amp; Legal Structure Advisory</h4>
				<p>Selecting the optimal legal form (LLC, FZE, Branch) matching 2,000+ approved commercial activities.</p>
			</div>
			<div class="rbo-scope-card">
				<h4>2. Trade Name Reservation &amp; Approvals</h4>
				<p>Fast-track name reservation and security clearances complying with UAE commercial naming protocols.</p>
			</div>
			<div class="rbo-scope-card">
				<h4>3. MOA &amp; Legal Documentation Drafting</h4>
				<p>Drafting bilingual Memorandum of Association and shareholder resolutions with electronic notary attestation.</p>
			</div>
			<div class="rbo-scope-card">
				<h4>4. Commercial Leasing &amp; Ejari</h4>
				<p>Facilitating registered flexi-desks, smart offices, warehouse leases, and tenancy registration (Ejari/Tawtheeq).</p>
			</div>
			<div class="rbo-scope-card">
				<h4>5. Investor Visas &amp; Emirates ID</h4>
				<p>VIP concierge handling for investor and employee residence visas: medical tests, biometrics, and Emirates ID.</p>
			</div>
			<div class="rbo-scope-card">
				<h4>6. Bank Account &amp; FTA Tax Setup</h4>
				<p>Bank-ready compliance dossiers for tier-1 UAE banks and EmaraTax registration for Corporate Tax and VAT.</p>
			</div>
		</div>

		<!-- Cost Breakdown Table -->
		<h2 class="rbo-section-title">Estimated Cost Breakdown for UAE Business Setup</h2>
		<div class="rbo-table-wrap">
			<table class="rbo-custom-table">
				<thead>
					<tr>
						<th>Jurisdiction</th>
						<th>Starting Fee (AED)</th>
						<th>Visa Quota</th>
						<th>Best Suited For</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><strong>Ajman Free Zone (AFZA)</strong> <span class="rbo-partner-mini">Channel Partner</span></td>
						<td>AED 5,555 – 11,500</td>
						<td>0 to 5 Visas</td>
						<td>Consulting, IT, E-commerce, Marketing, International Trading</td>
					</tr>
					<tr>
						<td><strong>Dubai Free Zones (IFZA / DMCC / Meydan)</strong></td>
						<td>AED 12,900 – 24,000</td>
						<td>1 to 6 Visas</td>
						<td>Tech startups, Commodities, Prestige Dubai Downtown addresses</td>
					</tr>
					<tr>
						<td><strong>Dubai Mainland (DET / DED)</strong></td>
						<td>AED 15,000 – 25,000</td>
						<td>Office dependent</td>
						<td>Retail stores, Restaurants, Construction, Local UAE contracting</td>
					</tr>
				</tbody>
			</table>
		</div>

		<!-- Big Bottom Consultation Banner -->
		<div class="rbo-bottom-cta">
			<span class="rbo-bottom-badge">Free 30-Minute Consultation</span>
			<h2>Ready to Launch Your UAE Business?</h2>
			<p>Speak directly with our official Ajman Free Zone Channel Partner specialists and certified tax advisors in Dubai &amp; Ajman. Get a transparent, itemized quote with zero hidden government charges.</p>
			<div class="rbo-bottom-btn-group">
				<a href="' . home_url( '/contact-us/' ) . '" class="rbo-btn-gold-big">Book Free Consultation</a>
				<a href="https://wa.me/971508051857" class="rbo-btn-whatsapp-big" target="_blank" rel="noopener">WhatsApp Us: +971 50 805 1857</a>
			</div>
		</div>
	</div>
</div>',
		),

		'mainland-vs-free-zone' => array(
			'title'       => 'Mainland vs Free Zone UAE: Complete Comparison Guide',
			'menu_title'  => 'Mainland vs Free Zone',
			'slug'        => 'mainland-vs-free-zone',
			'meta_desc'   => 'Compare UAE Mainland vs Free Zone company formation: foreign ownership, local market trading, corporate tax rates, office requirements, and visa costs.',
			'focus_kw'    => 'mainland vs free zone UAE',
			'service_type'=> 'Jurisdiction Comparison Advisory',
			'faqs'        => array(
				array(
					'q' => 'Can a Free Zone company do business in the UAE mainland?',
					'a' => 'Free zone companies can trade internationally, transact freely with other free zones, and provide B2B professional services to mainland entities. To sell physical goods directly into the mainland consumer retail market, a free zone company can appoint a mainland commercial distributor or open a mainland branch.',
				),
				array(
					'q' => 'Does a Free Zone company pay 0% UAE Corporate Tax?',
					'a' => 'A Qualifying Free Zone Person (QFZP) can benefit from a 0% Corporate Tax rate on "Qualifying Income" (such as transactions with other Free Zone persons, export of goods/services, and treasury/financing activities) provided they maintain adequate economic substance and prepare audited financial statements.',
				),
			),
			'content'     => '
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
						<a href="' . home_url( '/contact-us/' ) . '" class="rbo-btn-gold-hero">Get Free Assessment</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="rbo-body-container">
		<!-- Visual Image Showcase -->
		<div class="rbo-visual-showcase">
			<div class="rbo-showcase-image-wrap">
				<img src="' . home_url( '/wp-content/uploads/2026/09/uae-business-setup-consulting.jpg' ) . '" alt="Mainland vs Free Zone Company Setup Comparison" class="rbo-showcase-img" />
			</div>
			<div class="rbo-showcase-content">
				<div class="rbo-mini-pill">Decision Matrix</div>
				<h3>Aligning Corporate Scope with Tax Efficiency</h3>
				<p>Your choice of jurisdiction defines where you can invoice, how customs duties are assessed on imported inventory, and whether your profits qualify for the <strong>0% Corporate Tax regime for Qualifying Free Zone Persons</strong>.</p>
				<div class="rbo-fc-item">
					<span class="rbo-fc-check">✓</span>
					<div><strong>Mainland:</strong> Best for local commercial storefronts, construction, and government tenders.</div>
				</div>
				<div class="rbo-fc-item">
					<span class="rbo-fc-check">✓</span>
					<div><strong>Free Zone:</strong> Best for digital agencies, consulting, IT, and cross-border trade.</div>
				</div>
			</div>
		</div>

		<h2 class="rbo-section-title">Head-to-Head Comparison: Mainland vs Free Zone</h2>
		<p class="rbo-section-sub">Key legal, operational, and financial differences at a glance:</p>

		<div class="rbo-table-wrap">
			<table class="rbo-custom-table">
				<thead>
					<tr>
						<th>Key Feature</th>
						<th>UAE Mainland (DET / DED)</th>
						<th>UAE Free Zone (e.g. AFZA, IFZA)</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><strong>Foreign Ownership</strong></td>
						<td>100% on 1,000+ commercial/industrial activities</td>
						<td>100% on all permitted activities</td>
					</tr>
					<tr>
						<td><strong>Market Scope</strong></td>
						<td>Unrestricted local UAE market, retail &amp; government tenders</td>
						<td>Global markets, Free Zone-to-Free Zone, Mainland B2B</td>
					</tr>
					<tr>
						<td><strong>Corporate Tax Rate</strong></td>
						<td>Standard 9% on profits above AED 375,000</td>
						<td><strong>0% on Qualifying Income</strong> (for QFZP) or 9%</td>
					</tr>
					<tr>
						<td><strong>Office Requirement</strong></td>
						<td>Mandatory physical lease with Ejari registration</td>
						<td>Flexible flexi-desk, virtual office, or warehouse</td>
					</tr>
					<tr>
						<td><strong>Customs Duty</strong></td>
						<td>5% standard duty on imported goods</td>
						<td>0% customs duty within free zones &amp; re-exports</td>
					</tr>
					<tr>
						<td><strong>Setup Timeframe</strong></td>
						<td>3 to 7 working days</td>
						<td><strong>24 to 48 hours</strong> via our AFZA fast-track</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="rbo-cards-grid-2">
			<div class="rbo-feature-box">
				<h3>Choose Mainland If:</h3>
				<ul class="rbo-box-list">
					<li>You operate retail shops, restaurants, clinics, or physical salons.</li>
					<li>You plan to bid directly on UAE government &amp; municipal tenders.</li>
					<li>You provide on-site contracting or logistics across UAE cities.</li>
				</ul>
			</div>
			<div class="rbo-feature-box rbo-box-highlight">
				<h3>Choose Free Zone If:</h3>
				<ul class="rbo-box-list">
					<li>You run a consulting firm, digital marketing agency, or SaaS business.</li>
					<li>You want low initial overheads with flexi-desk facilities.</li>
					<li>You want to leverage <strong>0% Corporate Tax</strong> on Qualifying Income.</li>
				</ul>
			</div>
		</div>

		<div class="rbo-bottom-cta">
			<h2>Still Unsure Which Setup Fits Your Business?</h2>
			<p>Speak directly with our dual corporate structuring and FTA tax team for personalized advice.</p>
			<div class="rbo-bottom-btn-group">
				<a href="' . home_url( '/contact-us/' ) . '" class="rbo-btn-gold-big">Request Free Assessment</a>
				<a href="https://wa.me/971508051857" class="rbo-btn-whatsapp-big" target="_blank" rel="noopener">WhatsApp Consultation</a>
			</div>
		</div>
	</div>
</div>',
		),

		'dubai' => array(
			'title'       => 'Dubai Business Setup & Company Formation',
			'menu_title'  => 'Dubai Business Setup',
			'slug'        => 'dubai',
			'meta_desc'   => 'Complete Dubai company setup advisory across Dubai Mainland (DED/DET) and top Dubai Free Zones (DMCC, IFZA, DAFZA, Meydan). Fast trade license approvals.',
			'focus_kw'    => 'Dubai business setup',
			'service_type'=> 'Dubai Company Formation',
			'faqs'        => array(
				array(
					'q' => 'What are the main types of trade licenses in Dubai?',
					'a' => 'The three primary Dubai license categories are Commercial License (trading of goods & commodities), Professional License (services, consulting, IT & creative arts), and Industrial License (manufacturing and product assembly).',
				),
				array(
					'q' => 'Which are the most popular Free Zones in Dubai?',
					'a' => 'IFZA (Dubai Silicon Oasis) is popular for affordable consulting and trading packages; DMCC (Jumeirah Lakes Towers) is premier for global commodities, crypto, and financial services; Meydan Free Zone offers prestigious Downtown-adjacent setups; and DAFZA specializes in aviation, freight, and electronics.',
				),
			),
			'content'     => '
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
						<a href="' . home_url( '/contact-us/' ) . '" class="rbo-btn-gold-hero">Get Dubai Quote</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="rbo-body-container">
		<div class="rbo-visual-showcase">
			<div class="rbo-showcase-image-wrap">
				<img src="' . home_url( '/wp-content/uploads/2026/09/uae-business-setup-consulting.jpg' ) . '" alt="Dubai Business Setup &amp; Executive Formation" class="rbo-showcase-img" />
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
				<a href="' . home_url( '/contact-us/' ) . '" class="rbo-btn-gold-big">Book Free Consultation</a>
				<a href="https://wa.me/971508051857" class="rbo-btn-whatsapp-big" target="_blank" rel="noopener">WhatsApp Our Dubai Desk</a>
			</div>
		</div>
	</div>
</div>',
		),

		'ajman-free-zone' => array(
			'title'       => 'Ajman Free Zone Setup (AFZA) — Official Channel Partner',
			'menu_title'  => 'Ajman Free Zone Setup',
			'slug'        => 'ajman-free-zone',
			'meta_desc'   => 'Set up your company in Ajman Free Zone (AFZA) with an Official Registered Channel Partner. 24-48 hour trade licensing, low-cost packages, and on-the-ground support.',
			'focus_kw'    => 'Ajman free zone setup',
			'service_type'=> 'Ajman Free Zone Setup',
			'faqs'        => array(
				array(
					'q' => 'Why is RBO Accounting the best choice for Ajman Free Zone setup?',
					'a' => 'RBO Accounting Services FZE is an Official Registered Channel Partner of Ajman Free Zone with physical headquarters located right within the zone. We have direct daily access to authority registrars, enabling 24-48 hour license issuance, VIP handling, and direct issue resolution with zero middleman markups.',
				),
				array(
					'q' => 'What is the starting package price for an Ajman Free Zone license?',
					'a' => 'Through RBO\'s official channel partnership, zero-visa starter packages in Ajman Free Zone start from just AED 5,555, while packages including flexi-desk and 1-2 residence visas range between AED 9,500 and AED 14,000 with flexible installment options.',
				),
			),
			'content'     => '
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
		<!-- Channel Partner Visual Spotlight -->
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
				<img src="' . home_url( '/wp-content/uploads/2026/09/afza-channel-partner-hq.jpg' ) . '" alt="Ajman Free Zone Channel Partner Headquarters" class="rbo-showcase-img" />
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
				<a href="' . home_url( '/contact-us/' ) . '" class="rbo-btn-gold-big">Consult with Ajman Partner</a>
				<a href="https://wa.me/971508051857" class="rbo-btn-whatsapp-big" target="_blank" rel="noopener">WhatsApp Our Ajman Desk</a>
			</div>
		</div>
	</div>
</div>',
		),

		'trade-licence-process' => array(
			'title'       => 'UAE Trade Licence Process: 5-Step Step-by-Step Guide',
			'menu_title'  => 'Trade Licence Process',
			'slug'        => 'trade-licence-process',
			'meta_desc'   => 'Step-by-step roadmap to getting your UAE trade licence. Activity selection, name reservation, MOA notarization, Ejari lease, and corporate bank account.',
			'focus_kw'    => 'trade licence process UAE',
			'service_type'=> 'Trade Licensing Advisory',
			'faqs'        => array(
				array(
					'q' => 'What documents are required to obtain a UAE trade licence?',
					'a' => 'Individual shareholders require: passport copies, entry visa stamp (or Emirates ID copy if resident), 3 proposed company names, and contact details. Corporate entities require attested certificates of incorporation, MOA, and Board Resolutions.',
				),
				array(
					'q' => 'When must I register for Corporate Tax after getting my license?',
					'a' => 'Under FTA Decision No. 3 of 2024, all newly incorporated UAE legal entities must register for Corporate Tax within the statutory deadline (typically within 3 months of incorporation date) to prevent an automatic AED 10,000 penalty.',
				),
			),
			'content'     => '
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
						<a href="' . home_url( '/contact-us/' ) . '" class="rbo-btn-gold-hero">Start Activity Pre-Check</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="rbo-body-container">
		<h2 class="rbo-section-title">5-Step Incorporation Roadmap</h2>
		
		<div class="rbo-timeline-modern">
			<div class="rbo-t-item">
				<div class="rbo-t-badge">1</div>
				<div class="rbo-t-content">
					<h4>Step 1: Activity Classification &amp; Legal Structure</h4>
					<p>Choose from 2,000+ approved activities. Select the optimal legal structure (LLC, FZE, Branch) that protects shareholder liability.</p>
				</div>
			</div>
			<div class="rbo-t-item">
				<div class="rbo-t-badge">2</div>
				<div class="rbo-t-content">
					<h4>Step 2: Trade Name Reservation &amp; Initial Approvals</h4>
					<p>Reserve 3 trade names compliant with UAE naming standards and receive initial authority clearance.</p>
				</div>
			</div>
			<div class="rbo-t-item">
				<div class="rbo-t-badge">3</div>
				<div class="rbo-t-content">
					<h4>Step 3: MOA Drafting &amp; Legal Notarization</h4>
					<p>Draft the Memorandum of Association (MOA) and finalize electronic notarization for all shareholders.</p>
				</div>
			</div>
			<div class="rbo-t-item">
				<div class="rbo-t-badge">4</div>
				<div class="rbo-t-content">
					<h4>Step 4: Commercial Space &amp; License Issuance</h4>
					<p>Finalize flexi-desk or office lease (Ejari). Settle license vouchers to receive your official UAE Trade License.</p>
				</div>
			</div>
			<div class="rbo-t-item">
				<div class="rbo-t-badge">5</div>
				<div class="rbo-t-content">
					<h4>Step 5: Visas, Bank Account &amp; Tax Registration</h4>
					<p>Process residence visas, open corporate bank accounts, and register for Corporate Tax on EmaraTax.</p>
				</div>
			</div>
		</div>

		<div class="rbo-bottom-cta">
			<h2>Ready to Begin Step 1?</h2>
			<p>Our licensing specialists will conduct a free preliminary activity and name check for your business.</p>
			<div class="rbo-bottom-btn-group">
				<a href="' . home_url( '/contact-us/' ) . '" class="rbo-btn-gold-big">Start Free Activity Check</a>
			</div>
		</div>
	</div>
</div>',
		),

		'packages' => array(
			'title'       => 'UAE Business Setup Packages & Service Bundles',
			'menu_title'  => 'Business Setup Packages',
			'slug'        => 'packages',
			'meta_desc'   => 'All-in-one UAE business setup packages bundled with VAT registration, Corporate Tax compliance, and cloud bookkeeping. Save money & avoid FTA penalties.',
			'focus_kw'    => 'UAE business setup packages',
			'service_type'=> 'Company Formation Packages',
			'faqs'        => array(
				array(
					'q' => 'Why are bundled packages significantly more valuable than standalone setup?',
					'a' => 'Hiring separate licensing agents, accountants, and tax advisors leads to conflicting advice, duplicated service fees, and critical compliance oversights. Our bundled packages provide a unified team ensuring your trade license is structured in harmony with Corporate Tax rules and audit requirements.',
				),
				array(
					'q' => 'What is the AED 10,000 Corporate Tax penalty and how do your packages protect me?',
					'a' => 'Under FTA Decision No. 3 of 2024, every new UAE business must register for Corporate Tax within statutory deadlines or incur an automatic AED 10,000 fine. All RBO packages include mandatory FTA Corporate Tax registration handled by our certified tax agents.',
				),
			),
			'content'     => '
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
						<a href="' . home_url( '/contact-us/' ) . '" class="rbo-btn-gold-hero">Request Custom Quote</a>
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
				<a href="' . home_url( '/contact-us/' ) . '" class="rbo-pkg-action-btn">Choose Starter Launch</a>
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
				<a href="' . home_url( '/contact-us/' ) . '" class="rbo-pkg-action-btn rbo-btn-gold-full">Choose Growth Bundle</a>
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
				<a href="' . home_url( '/contact-us/' ) . '" class="rbo-pkg-action-btn">Choose Enterprise Scale</a>
			</div>
		</div>

		<div class="rbo-bottom-cta">
			<h2>Need a Bespoke Package for Your Industry?</h2>
			<p>We configure custom bundles matching your specific visa headcount, office requirements, and transaction volume.</p>
			<div class="rbo-bottom-btn-group">
				<a href="' . home_url( '/contact-us/' ) . '" class="rbo-btn-gold-big">Request Custom Bundle Quote</a>
			</div>
		</div>
	</div>
</div>',
		),
	);
}

/**
 * 2. Auto-Provision WordPress Pages (Creates / Updates on admin load or init)
 */
function rbo_provision_business_setup_pages() {
	if ( ! is_admin() && ! isset( $_GET['rbo_sync_setup_pages'] ) && get_option( 'rbo_setup_pages_v4_done' ) ) {
		return;
	}

	$specs = rbo_get_business_setup_pages_spec();

	// Find or create the parent "Our Services" page if it exists
	$our_services_page = get_page_by_path( 'our-services' );
	$our_services_id   = $our_services_page ? $our_services_page->ID : 0;

	// 1. Create or get the Main Hub page "Business Setup"
	$hub_spec = $specs['business-setup'];
	$hub_page = get_page_by_path( 'our-services/business-setup' );
	if ( ! $hub_page ) {
		$hub_page = get_page_by_path( 'business-setup' );
	}

	$hub_id = $hub_page ? $hub_page->ID : 0;
	if ( ! $hub_id ) {
		$hub_id = wp_insert_post(
			array(
				'post_title'   => $hub_spec['title'],
				'post_name'    => 'business-setup',
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_parent'  => $our_services_id,
				'post_content' => $hub_spec['content'],
			)
		);
	} else {
		wp_update_post(
			array(
				'ID'           => $hub_id,
				'post_title'   => $hub_spec['title'],
				'post_content' => $hub_spec['content'],
			)
		);
	}

	// Update Hub Meta
	if ( $hub_id && ! is_wp_error( $hub_id ) ) {
		update_post_meta( $hub_id, 'rank_math_title', $hub_spec['title'] . ' | RBO Accounting' );
		update_post_meta( $hub_id, 'rank_math_description', $hub_spec['meta_desc'] );
		update_post_meta( $hub_id, 'rank_math_focus_keyword', $hub_spec['focus_kw'] );
		update_post_meta( $hub_id, '_rbo_faq_schema', $hub_spec['faqs'] );
		update_post_meta( $hub_id, '_elementor_page_settings', array( 'hide_title' => 'yes' ) );
		update_post_meta(
			$hub_id,
			'_rbo_service_schema',
			array(
				'name'        => $hub_spec['title'],
				'description' => $hub_spec['meta_desc'],
				'serviceType' => $hub_spec['service_type'],
			)
		);
	}

	// 2. Create or update child pages under the Hub
	foreach ( $specs as $slug => $spec ) {
		if ( 'business-setup' === $slug ) {
			continue;
		}

		$child_page = get_page_by_path( 'our-services/business-setup/' . $slug );
		if ( ! $child_page ) {
			$child_page = get_page_by_path( 'business-setup/' . $slug );
		}
		if ( ! $child_page ) {
			$child_page = get_page_by_path( $slug );
		}

		$child_id = $child_page ? $child_page->ID : 0;
		if ( ! $child_id ) {
			$child_id = wp_insert_post(
				array(
					'post_title'   => $spec['title'],
					'post_name'    => $slug,
					'post_status'  => 'publish',
					'post_type'    => 'page',
					'post_parent'  => $hub_id,
					'post_content' => $spec['content'],
				)
			);
		} else {
			wp_update_post(
				array(
					'ID'           => $child_id,
					'post_title'   => $spec['title'],
					'post_content' => $spec['content'],
					'post_parent'  => $hub_id,
				)
			);
		}

		if ( $child_id && ! is_wp_error( $child_id ) ) {
			update_post_meta( $child_id, 'rank_math_title', $spec['title'] . ' | RBO Accounting' );
			update_post_meta( $child_id, 'rank_math_description', $spec['meta_desc'] );
			update_post_meta( $child_id, 'rank_math_focus_keyword', $spec['focus_kw'] );
			update_post_meta( $child_id, '_rbo_faq_schema', $spec['faqs'] );
			update_post_meta( $child_id, '_elementor_page_settings', array( 'hide_title' => 'yes' ) );
			update_post_meta(
				$child_id,
				'_rbo_service_schema',
				array(
					'name'        => $spec['title'],
					'description' => $spec['meta_desc'],
					'serviceType' => $spec['service_type'],
				)
			);
		}
	}
	update_option( 'rbo_setup_pages_v4_done', 1 );
}
add_action( 'init', 'rbo_provision_business_setup_pages' );

/**
 * 3. Enqueue Styling for Business Setup Pages matching Elementor Luxury Design
 */
add_action(
	'wp_head',
	function () {
		$css = '
/* Hide default Hello Elementor entry header on Business Setup pages */
.page-id-5439 .entry-title,
.page-id-5440 .entry-title,
.page-id-5441 .entry-title,
.page-id-5442 .entry-title,
.page-id-5443 .entry-title,
.page-id-5444 .entry-title,
.page-id-5461 .entry-title,
.page-id-5462 .entry-title,
.page-id-5463 .entry-title,
.page-id-5464 .entry-title,
.page-id-5465 .entry-title,
.page-id-5466 .entry-title,
.page-id-5467 .entry-title,
.page-id-5439 > .post-title,
.page-id-5440 > .post-title {
	display: none !important;
}

/* Base Wrapper */
.rbo-elementor-service-wrapper {
	width: 100%;
	margin: 0;
	padding: 0;
	font-family: "Poppins", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
	color: #334155;
	background-color: #f8fafc;
}

/* Full Width Hero Banner with Panoramic Background Image */
.rbo-hero-section {
	width: 100vw;
	position: relative;
	left: 50%;
	right: 50%;
	margin-left: -50vw;
	margin-right: -50vw;
	background: linear-gradient(135deg, rgba(9, 32, 59, 0.92) 0%, rgba(13, 43, 79, 0.85) 50%, rgba(9, 32, 59, 0.94) 100%), url(' . home_url( '/wp-content/uploads/2026/09/dubai-skyline-hero-bg.jpg' ) . ') center center / cover no-repeat;
	color: #ffffff;
	padding: 70px 20px 80px;
	box-sizing: border-box;
	border-bottom: 3px solid #c9a227;
}
.rbo-hero-container {
	max-width: 1200px;
	margin: 0 auto;
	display: flex;
	flex-wrap: wrap;
	align-items: center;
	justify-content: space-between;
	gap: 40px;
}
.rbo-hero-left {
	flex: 1 1 600px;
}
.rbo-partner-badge {
	display: inline-flex;
	align-items: center;
	gap: 8px;
	background: rgba(232, 184, 75, 0.15);
	color: #e8b84b;
	border: 1px solid rgba(232, 184, 75, 0.4);
	padding: 6px 16px;
	border-radius: 9999px;
	font-size: 13px;
	font-weight: 700;
	letter-spacing: 0.4px;
	margin-bottom: 20px;
}
.rbo-star {
	color: #e8b84b;
	font-size: 15px;
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
	font-size: 17px;
	color: #cbd5e1;
	line-height: 1.8;
	margin-bottom: 24px;
}
.rbo-hero-points {
	display: flex;
	flex-direction: column;
	gap: 10px;
}
.rbo-hero-point {
	display: flex;
	align-items: center;
	gap: 10px;
	font-size: 15px;
	color: #e2e8f0;
}
.rbo-check-icon {
	color: #e8b84b;
	font-weight: 900;
	font-size: 16px;
}
.rbo-hero-right {
	flex: 0 1 400px;
}
.rbo-consult-card {
	background: rgba(13, 27, 42, 0.85);
	border: 1px solid rgba(232, 184, 75, 0.35);
	backdrop-filter: blur(12px);
	border-radius: 16px;
	padding: 30px 26px;
	box-shadow: 0 12px 36px rgba(0, 0, 0, 0.3);
}
.rbo-consult-card h3 {
	font-family: "Playfair Display", Georgia, serif;
	color: #ffffff;
	font-size: 22px;
	margin: 0 0 6px;
	font-weight: 700;
}
.rbo-consult-subtitle {
	color: #94a3b8;
	font-size: 13.5px;
	margin-bottom: 20px;
	line-height: 1.5;
}
.rbo-consult-features {
	display: flex;
	flex-direction: column;
	gap: 10px;
	margin-bottom: 24px;
	padding-top: 14px;
	border-top: 1px solid rgba(255, 255, 255, 0.1);
}
.rbo-cf-item {
	font-size: 14px;
	color: #e2e8f0;
}
.rbo-consult-cta {
	display: flex;
	flex-direction: column;
	gap: 10px;
}
.rbo-btn-whatsapp-hero {
	display: block;
	text-align: center;
	background: #25D366;
	color: #ffffff !important;
	font-weight: 700;
	padding: 12px 18px;
	border-radius: 8px;
	text-decoration: none !important;
	font-size: 14px;
	transition: background 0.2s;
}
.rbo-btn-whatsapp-hero:hover {
	background: #20ba5a;
}
.rbo-btn-gold-hero {
	display: block;
	text-align: center;
	background: #e8b84b;
	color: #09203b !important;
	font-weight: 800;
	padding: 12px 18px;
	border-radius: 8px;
	text-decoration: none !important;
	font-size: 14px;
	transition: background 0.2s;
}
.rbo-btn-gold-hero:hover {
	background: #f4ca68;
}

/* Body Container */
.rbo-body-container {
	max-width: 1200px;
	margin: 0 auto;
	padding: 50px 20px 80px;
	box-sizing: border-box;
}
.rbo-trust-card {
	display: flex;
	gap: 20px;
	background: #ffffff;
	border-left: 5px solid #c9a227;
	border-radius: 12px;
	padding: 24px 28px;
	box-shadow: 0 4px 20px rgba(9, 32, 59, 0.06);
	margin-bottom: 44px;
}
.rbo-trust-icon-wrap {
	font-size: 38px;
	flex-shrink: 0;
}
.rbo-trust-text h3 {
	font-family: "Playfair Display", Georgia, serif;
	color: #09203b;
	font-size: 20px;
	margin: 0 0 8px;
	font-weight: 700;
}
.rbo-trust-text p {
	font-size: 15px;
	line-height: 1.7;
	color: #475569;
	margin: 0;
}
.rbo-section-title {
	font-family: "Playfair Display", Georgia, serif !important;
	font-size: 30px !important;
	color: #09203b !important;
	font-weight: 800 !important;
	margin: 40px 0 10px !important;
	text-align: center;
}
.rbo-section-sub {
	text-align: center;
	color: #64748b;
	font-size: 15.5px;
	margin-bottom: 36px;
}
.rbo-cards-grid-3 {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
	gap: 28px;
	margin-bottom: 50px;
}
.rbo-cards-grid-2 {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(360px, 1fr));
	gap: 28px;
	margin-bottom: 50px;
}
.rbo-feature-box {
	background: #ffffff;
	border: 1px solid #e2e8f0;
	border-radius: 16px;
	padding: 32px 26px;
	display: flex;
	flex-direction: column;
	position: relative;
	box-shadow: 0 4px 18px rgba(9, 32, 59, 0.05);
	transition: transform 0.2s, box-shadow 0.2s;
}
.rbo-feature-box:hover {
	transform: translateY(-4px);
	box-shadow: 0 12px 30px rgba(9, 32, 59, 0.1);
}
.rbo-box-highlight {
	border: 2px solid #c9a227;
	background: #fdfaf2;
}
.rbo-ribbon {
	position: absolute;
	top: -12px;
	right: 24px;
	background: #c9a227;
	color: #09203b;
	font-size: 11px;
	font-weight: 800;
	text-transform: uppercase;
	padding: 4px 14px;
	border-radius: 9999px;
	letter-spacing: 0.5px;
}
.rbo-box-icon {
	font-size: 34px;
	margin-bottom: 12px;
}
.rbo-box-tag {
	font-size: 12px;
	font-weight: 700;
	color: #9a7212;
	text-transform: uppercase;
	letter-spacing: 0.5px;
	margin-bottom: 8px;
}
.rbo-feature-box h3, .rbo-feature-box h4 {
	font-family: "Playfair Display", Georgia, serif;
	font-size: 22px;
	color: #09203b;
	margin: 0 0 12px;
	font-weight: 700;
}
.rbo-feature-box p {
	font-size: 14.5px;
	color: #475569;
	line-height: 1.65;
	margin-bottom: 18px;
}
.rbo-box-list {
	list-style: none;
	padding: 0;
	margin: 0 0 24px;
	flex: 1;
}
.rbo-box-list li {
	position: relative;
	padding-left: 22px;
	font-size: 13.5px;
	color: #334155;
	margin-bottom: 10px;
	line-height: 1.5;
}
.rbo-box-list li::before {
	content: "✓";
	position: absolute;
	left: 0;
	color: #c9a227;
	font-weight: 800;
}
.rbo-card-link {
	display: block;
	text-align: center;
	background: #ffffff;
	border: 1px solid #09203b;
	color: #09203b !important;
	font-weight: 700;
	padding: 12px 18px;
	border-radius: 8px;
	text-decoration: none !important;
	font-size: 14px;
	transition: background 0.2s;
}
.rbo-card-link:hover {
	background: #09203b;
	color: #ffffff !important;
}
.rbo-card-btn-gold {
	display: block;
	text-align: center;
	background: #e8b84b;
	color: #09203b !important;
	font-weight: 800;
	padding: 12px 18px;
	border-radius: 8px;
	text-decoration: none !important;
	font-size: 14px;
	transition: background 0.2s;
}
.rbo-card-btn-gold:hover {
	background: #f4ca68;
}

/* Visual Image Showcase Layout */
.rbo-visual-showcase {
	display: flex;
	flex-wrap: wrap;
	align-items: center;
	gap: 40px;
	margin: 50px 0;
	background: #ffffff;
	border: 1px solid #e2e8f0;
	border-radius: 20px;
	padding: 36px;
	box-shadow: 0 8px 30px rgba(9, 32, 59, 0.06);
}
.rbo-showcase-reverse {
	flex-direction: row-reverse;
	background: #fdfaf2;
	border-color: #e8b84b;
}
.rbo-showcase-image-wrap {
	flex: 1 1 440px;
	position: relative;
	border-radius: 16px;
	overflow: hidden;
	box-shadow: 0 10px 30px rgba(9, 32, 59, 0.12);
}
.rbo-showcase-img {
	width: 100%;
	height: auto;
	display: block;
	object-fit: cover;
	transition: transform 0.3s ease;
}
.rbo-showcase-img:hover {
	transform: scale(1.02);
}
.rbo-img-floating-tag {
	position: absolute;
	bottom: 20px;
	left: 20px;
	background: rgba(9, 32, 59, 0.9);
	color: #ffffff;
	border-left: 4px solid #e8b84b;
	padding: 10px 18px;
	border-radius: 8px;
	backdrop-filter: blur(8px);
	display: flex;
	align-items: center;
	gap: 12px;
}
.rbo-tag-gold {
	background: rgba(201, 162, 39, 0.95);
	color: #09203b;
	border-left-color: #09203b;
}
.rbo-tag-num {
	font-size: 22px;
	font-weight: 900;
	color: #e8b84b;
}
.rbo-tag-gold .rbo-tag-num {
	color: #09203b;
}
.rbo-tag-txt {
	font-size: 13px;
	font-weight: 700;
	line-height: 1.3;
}
.rbo-showcase-content {
	flex: 1 1 460px;
}
.rbo-mini-pill {
	display: inline-block;
	background: #e0f2fe;
	color: #0369a1;
	font-size: 12px;
	font-weight: 700;
	padding: 4px 12px;
	border-radius: 9999px;
	text-transform: uppercase;
	margin-bottom: 12px;
	letter-spacing: 0.4px;
}
.rbo-pill-gold {
	background: #fef3c7;
	color: #9a7212;
}
.rbo-showcase-content h3 {
	font-family: "Playfair Display", Georgia, serif;
	font-size: 26px;
	color: #09203b;
	margin: 0 0 16px;
	font-weight: 700;
	line-height: 1.35;
}
.rbo-showcase-content p {
	font-size: 15px;
	color: #475569;
	line-height: 1.75;
	margin-bottom: 20px;
}
.rbo-feature-checklist-grid {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
	gap: 16px;
	margin-top: 20px;
}
.rbo-fc-item {
	display: flex;
	gap: 10px;
	font-size: 13.5px;
	color: #334155;
	line-height: 1.5;
}
.rbo-fc-check {
	color: #c9a227;
	font-weight: 900;
	font-size: 16px;
	flex-shrink: 0;
}

/* Other Grids */
.rbo-scope-grid {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
	gap: 20px;
	margin-bottom: 48px;
}
.rbo-scope-card {
	background: #ffffff;
	border: 1px solid #e2e8f0;
	border-radius: 12px;
	padding: 22px 20px;
	box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
}
.rbo-scope-card h4 {
	font-size: 16px;
	color: #09203b;
	margin: 0 0 8px;
	font-weight: 700;
}
.rbo-scope-card p {
	font-size: 13.5px;
	color: #64748b;
	line-height: 1.6;
	margin: 0;
}
.rbo-table-wrap {
	overflow-x: auto;
	border-radius: 14px;
	box-shadow: 0 6px 24px rgba(9, 32, 59, 0.08);
	margin-bottom: 50px;
}
.rbo-custom-table {
	width: 100%;
	border-collapse: collapse;
	background: #ffffff;
}
.rbo-custom-table th {
	background: #09203b;
	color: #ffffff;
	padding: 18px 22px;
	font-size: 15px;
	text-align: left;
	font-weight: 700;
}
.rbo-custom-table td {
	padding: 16px 22px;
	border-bottom: 1px solid #e2e8f0;
	font-size: 14.5px;
	line-height: 1.6;
}
.rbo-custom-table tr:nth-child(even) td {
	background: #f8fafc;
}
.rbo-partner-mini {
	display: inline-block;
	background: #e8b84b;
	color: #09203b;
	font-size: 11px;
	font-weight: 800;
	padding: 2px 8px;
	border-radius: 4px;
	margin-left: 6px;
}
.rbo-timeline-modern {
	display: flex;
	flex-direction: column;
	gap: 20px;
	margin-bottom: 48px;
}
.rbo-t-item {
	display: flex;
	gap: 22px;
	background: #ffffff;
	border: 1px solid #e2e8f0;
	border-radius: 12px;
	padding: 22px 24px;
	box-shadow: 0 2px 10px rgba(0,0,0,0.03);
}
.rbo-t-badge {
	flex: 0 0 46px;
	height: 46px;
	background: #09203b;
	color: #e8b84b;
	border-radius: 50%;
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 18px;
	font-weight: 800;
	box-shadow: 0 4px 10px rgba(9, 32, 59, 0.15);
}
.rbo-t-content h4 {
	font-size: 17px;
	color: #09203b;
	margin: 0 0 6px;
	font-weight: 700;
}
.rbo-t-content p {
	font-size: 14px;
	color: #475569;
	margin: 0;
	line-height: 1.6;
}
.rbo-packages-grid-modern {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
	gap: 28px;
	margin-bottom: 50px;
}
.rbo-pkg-box {
	background: #ffffff;
	border: 1px solid #e2e8f0;
	border-radius: 16px;
	padding: 34px 26px;
	display: flex;
	flex-direction: column;
	position: relative;
	box-shadow: 0 4px 20px rgba(9, 32, 59, 0.05);
}
.rbo-pkg-popular {
	border: 2px solid #c9a227;
	box-shadow: 0 10px 34px rgba(201, 162, 39, 0.2);
	transform: scale(1.02);
	background: #fdfaf2;
}
.rbo-pkg-badge-tag {
	position: absolute;
	top: -13px;
	left: 50%;
	transform: translateX(-50%);
	background: #c9a227;
	color: #09203b;
	font-size: 12px;
	font-weight: 800;
	text-transform: uppercase;
	padding: 4px 16px;
	border-radius: 9999px;
	letter-spacing: 0.5px;
}
.rbo-pkg-top h3 {
	font-family: "Playfair Display", Georgia, serif;
	font-size: 24px;
	margin: 0 0 4px;
	color: #09203b;
}
.rbo-pkg-sub {
	font-size: 13.5px;
	color: #64748b;
	font-weight: 600;
	margin-bottom: 8px;
}
.rbo-pkg-pill {
	display: inline-block;
	font-size: 11.5px;
	font-weight: 700;
	color: #9a7212;
	background: #fef3c7;
	padding: 3px 10px;
	border-radius: 4px;
	margin-bottom: 22px;
}
.rbo-pill-gold {
	background: #fde68a;
}
.rbo-pkg-ul {
	list-style: none;
	padding: 0;
	margin: 0 0 28px;
	flex: 1;
}
.rbo-pkg-ul li {
	font-size: 14px;
	margin-bottom: 12px;
	color: #334155;
	line-height: 1.55;
}
.rbo-pkg-action-btn {
	display: block;
	text-align: center;
	background: #09203b;
	color: #ffffff !important;
	padding: 13px 20px;
	border-radius: 8px;
	font-weight: 700;
	text-decoration: none !important;
	transition: background 0.2s;
}
.rbo-pkg-action-btn:hover {
	background: #14375e;
}
.rbo-btn-gold-full {
	background: #e8b84b;
	color: #09203b !important;
	font-weight: 800;
}
.rbo-btn-gold-full:hover {
	background: #f4ca68;
}
.rbo-bottom-cta {
	background: linear-gradient(135deg, #09203b 0%, #112d4e 100%);
	color: #ffffff;
	border-radius: 18px;
	padding: 44px 32px;
	margin: 50px 0 20px;
	text-align: center;
	box-shadow: 0 12px 36px rgba(9, 32, 59, 0.18);
}
.rbo-bottom-badge {
	display: inline-block;
	background: rgba(232, 184, 75, 0.2);
	color: #e8b84b;
	border: 1px solid rgba(232, 184, 75, 0.4);
	padding: 4px 16px;
	border-radius: 9999px;
	font-size: 12px;
	font-weight: 700;
	text-transform: uppercase;
	margin-bottom: 14px;
}
.rbo-bottom-cta h2 {
	font-family: "Playfair Display", Georgia, serif !important;
	font-size: 32px !important;
	color: #ffffff !important;
	margin: 0 0 12px !important;
}
.rbo-bottom-cta p {
	font-size: 16px;
	color: #cbd5e1;
	max-width: 680px;
	margin: 0 auto 26px;
	line-height: 1.7;
}
.rbo-bottom-btn-group {
	display: flex;
	flex-wrap: wrap;
	gap: 14px;
	justify-content: center;
}
.rbo-btn-gold-big {
	display: inline-block;
	background: #e8b84b;
	color: #09203b !important;
	font-weight: 800;
	padding: 14px 30px;
	border-radius: 8px;
	text-decoration: none !important;
	font-size: 15px;
	transition: background 0.2s, transform 0.2s;
}
.rbo-btn-gold-big:hover {
	background: #f4ca68;
	transform: translateY(-2px);
}
.rbo-btn-whatsapp-big {
	display: inline-block;
	background: #25D366;
	color: #ffffff !important;
	font-weight: 700;
	padding: 14px 28px;
	border-radius: 8px;
	text-decoration: none !important;
	font-size: 15px;
	transition: background 0.2s, transform 0.2s;
}
.rbo-btn-whatsapp-big:hover {
	background: #20ba5a;
	transform: translateY(-2px);
}
@media (max-width: 767px) {
	.rbo-hero-section { width: 100%; left: 0; right: 0; margin: 0; padding: 40px 16px; }
	.rbo-hero-heading { font-size: 28px !important; }
	.rbo-hero-container { flex-direction: column; }
	.rbo-hero-right { width: 100%; flex: 1 1 100%; }
	.rbo-visual-showcase { flex-direction: column; padding: 20px; }
	.rbo-trust-card { flex-direction: column; gap: 10px; }
	.rbo-t-item { flex-direction: column; gap: 12px; }
	.rbo-pkg-popular { transform: none; }
	.rbo-bottom-btn-group { flex-direction: column; }
}
';
		echo '<style id="rbo-business-setup-custom-css">' . $css . '</style>';
	},
	99
);

/**
 * 4. Safety Dynamic Replacement & Output Buffer Filter
 * Guarantees that only +971 50 805 1857 is output across all pages.
 */
add_filter(
	'the_content',
	function ( $content ) {
		$replacements = array(
			'+971 56 994 7840' => '+971 50 805 1857',
			'+971 50 682 9017' => '+971 50 805 1857',
			'+971 52 387 1857' => '+971 50 805 1857',
			'971569947840'     => '971508051857',
			'971506829017'     => '971508051857',
			'971523871857'     => '971508051857',
		);
		return strtr( $content, $replacements );
	},
	999
);

add_action(
	'template_redirect',
	function () {
		ob_start(
			function ( $buffer ) {
				if ( ! is_string( $buffer ) ) {
					return $buffer;
				}
				$replacements = array(
					'+971 56 994 7840' => '+971 50 805 1857',
					'+971 50 682 9017' => '+971 50 805 1857',
					'+971 52 387 1857' => '+971 50 805 1857',
					'971569947840'     => '971508051857',
					'971506829017'     => '971508051857',
					'971523871857'     => '971508051857',
				);
				return strtr( $buffer, $replacements );
			}
		);
	},
	1
);
