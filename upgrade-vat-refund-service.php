<?php
/**
 * Upgrade Script: VAT Refund Service Page (ID 2488)
 * Optimizes metadata, Rank Math SEO, Service schema, and 10 Industry FAQ Schema
 */

require_once __DIR__ . '/wp-load.php';

$post_id = 2488;
$post = get_post($post_id);

if (!$post) {
    die("Error: Post ID $post_id not found.\n");
}

echo "Updating Post ID $post_id: " . $post->post_title . " (" . $post->post_name . ")\n";

// 1. Rank Math Meta Updates
$seo_title = 'VAT Refund Services UAE for Landlords, Consultants & Contractors | RBO';
$seo_desc  = 'Specialist FTA VAT refund claim services for commercial landlords, engineering consultancies & civil contractors in UAE. Fast-track Form VAT311, Capital Assets Scheme & audit-proof recovery.';
$focus_kw  = 'VAT refund for landlords, VAT refund contractors UAE, VAT refund claim UAE, VAT refund engineering consultants';

update_post_meta($post_id, 'rank_math_title', $seo_title);
update_post_meta($post_id, 'rank_math_description', $seo_desc);
update_post_meta($post_id, 'rank_math_focus_keyword', $focus_kw);

// 2. Service Schema Meta
$service_schema = array(
    'name'        => 'VAT Refund Claim Services for Landlords, Consultants & Contractors UAE',
    'serviceType' => 'VAT Refund & FTA Cash Recovery Services',
    'description' => 'End-to-end FTA Form VAT311 refund claim management for UAE commercial property owners, engineering consultancies, and construction contractors. Audit-ready reconciliation and swift cash disbursement.',
    'url'         => home_url('/our-services/vat-registration-filing/refund/'),
    'areaServed'  => 'United Arab Emirates',
    'provider'    => 'RBO Accounting Services FZE',
);
update_post_meta($post_id, '_rbo_service_schema', $service_schema);

// 3. 10 High-Intent Industry FAQs Schema
$faqs = array(
    array(
        'q' => 'Can commercial landlords in the UAE claim a 100% VAT refund on building construction and fit-out costs?',
        'a' => 'Yes. Commercial landlords leasing taxable premises (offices, shopping malls, retail plazas, industrial warehouses) are entitled to reclaim 100% of input VAT incurred on construction, architectural design, fit-outs, maintenance, and facility management under UAE VAT Law. In contrast, residential leasing is VAT-exempt after the initial 3-year construction period, precluding input tax recovery.'
    ),
    array(
        'q' => 'How does the Capital Assets Scheme (CAS) apply to commercial property owners under Article 57?',
        'a' => 'Under Article 57 of the UAE VAT Executive Regulation, real estate assets valued at AED 5,000,000 or more fall under the Capital Assets Scheme and require a mandatory 10-year monitoring and adjustment period. If a property\'s use changes (such as converting commercial space to residential exempt use), input tax reclaimed must be apportioned and adjusted annually across the remaining lifespan.'
    ),
    array(
        'q' => 'Why do engineering and architectural consultancies in the UAE consistently accumulate excess VAT credits?',
        'a' => 'Consultancies providing engineering design, structural calculations, BIM modeling, and architectural planning to foreign clients without a permanent establishment in the UAE qualify for 0% zero-rated VAT under Article 31. Because output VAT is zero, all 5% standard-rated input tax paid on office leases, software licenses, and local sub-consultants becomes refundable cash credit from the FTA.'
    ),
    array(
        'q' => 'What documents are mandatory for engineering consultants to claim zero-rating (0%) on cross-border services?',
        'a' => 'The FTA requires: (1) A formal cross-border contract proving the recipient has no permanent establishment or place of residence in the UAE; (2) Detailed deliverables confirming the benefit was consumed outside the UAE; (3) Official foreign currency bank remittance statements; and (4) Compliant tax invoices clearly noting the zero-rated supply rationale.'
    ),
    array(
        'q' => 'How should civil and MEP contractors handle VAT on retention money held by developers?',
        'a' => 'VAT liability on retention money (typically 5% to 10% withheld for 12 to 24 months during defect liability) depends strictly on the earlier of: invoice issuance date, payment certificate date, or actual receipt date. If no tax invoice is raised for the retention amount at completion, VAT can generally be accounted for upon issuance of the final certificate or receipt of cash, preventing premature tax financing.'
    ),
    array(
        'q' => 'How does the domestic Reverse Charge Mechanism (Cabinet Decision No. 91 of 2023) affect contractor VAT refunds?',
        'a' => 'Cabinet Decision No. 91 of 2023 allows main contractors and subcontractors in construction to apply the domestic Reverse Charge Mechanism (RCM) on construction supplies between VAT-registered entities. Subcontractors do not charge cash VAT to main contractors, eliminating cash flow lock-up and accelerating overall refund eligibility.'
    ),
    array(
        'q' => 'What is FTA Form VAT311 and how long does the VAT refund process take in the UAE?',
        'a' => 'Form VAT311 is the official electronic refund claim submitted via the EmaraTax portal to request direct cash repayment of excess credits reported in Box 14 of Form VAT201. Once submitted, the FTA typically reviews the application within 20 business days. Upon approval, funds are transferred directly into the corporate bank account via IBAN.'
    ),
    array(
        'q' => 'What happens if the FTA initiates a pre-refund audit for a landlord or contractor claim?',
        'a' => 'For high-value refund claims, the FTA frequently issues an Information Request or audit notice demanding sample tax invoices, supplier payment vouchers, bank statement audit trails, and customs declarations. RBO Accounting represents businesses directly during FTA audits, reconciling every dirham to secure fast approval without penalties.'
    ),
    array(
        'q' => 'Can input VAT on mixed-use commercial and residential developments be partially reclaimed?',
        'a' => 'Yes. Landlords of mixed-use buildings must apply the input tax apportionment method approved by the FTA. Direct input tax related 100% to commercial spaces is fully deductible, while common building overheads (such as HVAC, elevators, security, structural upkeep) are apportioned based on floor area or turnover ratios.'
    ),
    array(
        'q' => 'Why should commercial landlords, consultants, and contractors hire an FTA Registered Tax Agency like RBO Accounting?',
        'a' => 'Submitting an erroneous VAT refund claim risks rejection, extensive audits, and severe administrative penalties under Federal Decree-Law No. 28 of 2022. RBO Accounting\'s certified tax agents conduct thorough pre-submission reconciliations, verify TRN authenticity, validate reverse charge declarations, and guide your claim through EmaraTax to direct bank disbursement.'
    )
);

update_post_meta($post_id, '_rbo_faq_schema', $faqs);

echo "✅ Metadata & Schemas successfully updated on Post $post_id!\n";
echo "Rank Math Title: " . get_post_meta($post_id, 'rank_math_title', true) . "\n";
echo "Rank Math Desc: " . get_post_meta($post_id, 'rank_math_description', true) . "\n";
echo "Focus Keyword: " . get_post_meta($post_id, 'rank_math_focus_keyword', true) . "\n";
echo "FAQ Count: " . count(get_post_meta($post_id, '_rbo_faq_schema', true)) . "\n";
echo "Service Schema Name: " . get_post_meta($post_id, '_rbo_service_schema', true)['name'] . "\n";
