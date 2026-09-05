export interface BlogPost {
  slug: string;
  title: string;
  excerpt: string;
  category: string;
  publishDate: string;
  readingTime: string;
  featuredImage: string;
  infographicImage: string;
  infographicCaption: string;
  metaTitle: string;
  metaDescription: string;
  focusKeyword: string;
  author: string;
  faqs: { q: string; a: string }[];
  contentHtml: string;
}

export const blogPostsData: Record<string, BlogPost> = {
  "vat-registration-uae-2026-thresholds-documents-deadlines": {
    slug: "vat-registration-uae-2026-thresholds-documents-deadlines",
    title: "VAT Registration in UAE (2026): Thresholds, Documents, and Deadlines",
    excerpt: "UAE VAT registration in 2026: the AED 375,000 mandatory threshold, AED 187,500 voluntary threshold, documents for EmaraTax, and what to do after you get a TRN.",
    category: "VAT & Tax Planning",
    publishDate: "August 29, 2026",
    readingTime: "7 min read",
    featuredImage: "/images/vat-registration-uae-2026-hd.jpg",
    infographicImage: "/images/vat-thresholds-infographic-2026.jpg",
    infographicCaption: "Infographic: 2026 UAE VAT Registration Thresholds (AED 375,000 Mandatory vs AED 187,500 Voluntary) & FTA Compliance Workflow",
    metaTitle: "VAT Registration in UAE (2026): Thresholds & Documents | RBO",
    metaDescription: "UAE VAT registration rules in 2026: AED 375k mandatory threshold, AED 187.5k voluntary threshold, EmaraTax documents, and late penalties explained.",
    focusKeyword: "VAT registration UAE",
    author: "RBO Tax Advisory Team",
    faqs: [
      {
        q: "What is the VAT registration threshold in the UAE in 2026?",
        a: "Mandatory registration is AED 375,000 of taxable supplies and imports over the last 12 months (or expected in 30 days). Voluntary registration is available from AED 187,500."
      },
      {
        q: "How long does FTA VAT registration take?",
        a: "Complete applications typically process within 3 to 5 business days on EmaraTax, provided all corporate and financial verification documents are submitted accurately."
      },
      {
        q: "Can RBO register my company for VAT?",
        a: "Yes. RBO Accounting Services FZE is an FTA-registered tax agency handling threshold reviews, document preparation, EmaraTax submissions, and ongoing periodic return filings."
      },
      {
        q: "What is the fine for failing to register for VAT on time?",
        a: "The standard administrative fine for failing to submit a required VAT registration application within 30 days is AED 10,000."
      }
    ],
    contentHtml: `
<p class="lead">If your UAE business is growing, <strong>VAT registration</strong> is one of the first Federal Tax Authority (FTA) obligations you need to get right. Miss the threshold, wait too long, or file with incomplete records, and you can face an immediate late-registration penalty plus backdated output tax.</p>

<p>This comprehensive guide explains the 2026 VAT registration rules in plain language: the AED 375,000 and AED 187,500 thresholds, who must apply, what documents to prepare, and what happens after you receive a Tax Registration Number (TRN).</p>

<h2>What is VAT registration in the UAE?</h2>
<p>UAE Value Added Tax is a 5% consumption tax on most goods and services. Registration means the FTA issues a unique 15-digit TRN, allowing you to charge VAT on taxable supplies, recover eligible input VAT, and submit quarterly returns on EmaraTax.</p>

<p>Registration is separate from <a href="/our-services/corporate-tax" class="text-blue-700 underline font-semibold">Corporate Tax registration</a>. A company can be required to register for corporate tax even if it is still below the VAT threshold — and vice versa for trading companies.</p>

<h2>VAT registration thresholds in 2026</h2>
<p>The FTA uses two statutory thresholds measured on <strong>taxable supplies and imports</strong> (not accounting profit):</p>

<div class="overflow-x-auto my-6">
  <table class="w-full text-left border-collapse border border-slate-200">
    <thead>
      <tr class="bg-slate-900 text-white">
        <th class="p-3 border border-slate-700">Type</th>
        <th class="p-3 border border-slate-700">Threshold</th>
        <th class="p-3 border border-slate-700">When it applies</th>
      </tr>
    </thead>
    <tbody>
      <tr class="border-b border-slate-200">
        <td class="p-3 font-semibold">Mandatory registration</td>
        <td class="p-3 font-bold text-amber-700">AED 375,000</td>
        <td class="p-3">Taxable supplies & imports exceeded this in the last 12 months, or expected in next 30 days</td>
      </tr>
      <tr class="border-b border-slate-200 bg-slate-50">
        <td class="p-3 font-semibold">Voluntary registration</td>
        <td class="p-3 font-bold text-amber-700">AED 187,500</td>
        <td class="p-3">Taxable supplies/imports OR taxable expenses meet this test for the last 12 months</td>
      </tr>
    </tbody>
  </table>
</div>

<div class="bg-amber-50 border-l-4 border-amber-500 p-4 rounded-r-lg my-6 text-slate-800">
  <strong>Important Note:</strong> VAT uses a rolling 12-month test. The clock does not reset on 1 January. A quiet Q1 followed by a large contract in August can push you over the mandatory threshold mid-year.
</div>

<h2>When must you apply?</h2>
<p>Once you cross the mandatory threshold, the application must be submitted <strong>within 30 days</strong>. The FTA assigns an effective registration date. If your application is delayed, the effective date is backdated, meaning you may owe 5% VAT on past sales out of your own margin.</p>

<p>The administrative fine for late registration is <strong>AED 10,000</strong>.</p>

<h2>Documents you need for EmaraTax</h2>
<ul class="list-disc pl-6 space-y-2 my-4">
  <li>Trade license and certificate of incorporation</li>
  <li>Emirates ID and passport copies of authorized signatories / managers</li>
  <li>Memorandum of Association (MOA) / Articles of Association (AOA)</li>
  <li>Corporate bank account details (IBAN & bank statement)</li>
  <li>Proof of business address (Ejari or Free Zone lease agreement)</li>
  <li>Financial statements, sales invoices, or contracts proving the turnover threshold</li>
</ul>

<h2>What happens after you receive your TRN?</h2>
<ol class="list-decimal pl-6 space-y-2 my-4">
  <li>Issue official Tax Invoices displaying your TRN and the 5% VAT breakdown.</li>
  <li>Configure accounting software (Zoho Books, QuickBooks, Xero) with UAE tax codes.</li>
  <li>Retain purchase tax invoices from suppliers to claim input tax credits.</li>
  <li>File returns on EmaraTax (Form VAT201) before the 28th of the month following your tax period.</li>
</ol>
`
  },

  "uae-corporate-tax-2026-registration-rates-filing-deadline": {
    slug: "uae-corporate-tax-2026-registration-rates-filing-deadline",
    title: "UAE Corporate Tax 2026: Who Must Register, Rates, and the 30 September Deadline",
    excerpt: "UAE corporate tax in 2026: 0% and 9% rates, who must register with the FTA, Small Business Relief, and the 30 September 2026 filing deadline.",
    category: "Corporate Tax",
    publishDate: "September 5, 2026",
    readingTime: "8 min read",
    featuredImage: "/images/uae-corporate-tax-2026-hd.jpg",
    infographicImage: "/images/corporate-tax-rates-infographic-2026.jpg",
    infographicCaption: "Infographic: UAE Corporate Tax Profit Brackets (0% up to AED 375,000 & 9% above) and Small Business Relief Overview",
    metaTitle: "UAE Corporate Tax 2026: Rates, Small Business Relief & Deadlines | RBO",
    metaDescription: "UAE Corporate Tax 2026 guide: 0% & 9% rates, who must register, Small Business Relief up to AED 3M, and the 30 September 2026 filing deadline.",
    focusKeyword: "UAE corporate tax",
    author: "RBO Corporate Tax Division",
    faqs: [
      {
        q: "Does a small UAE company need to register for Corporate Tax?",
        a: "Yes. All UAE incorporated entities (mainland and free zone) must register for Corporate Tax on EmaraTax, even if profit is zero or eligible for Small Business Relief."
      },
      {
        q: "What is the UAE Corporate Tax rate in 2026?",
        a: "0% on taxable profit up to AED 375,000, and 9% on taxable profit exceeding AED 375,000. Qualifying Free Zone Persons can maintain 0% on qualifying income."
      },
      {
        q: "When is the Corporate Tax return due for December 2025 financial year?",
        a: "Returns are due within 9 months after the financial year ends. For a 31 December 2025 year-end, the filing and tax payment deadline is 30 September 2026."
      },
      {
        q: "What is the deadline for Small Business Relief (SBR)?",
        a: "Small Business Relief is available for tax periods ending on or before 31 December 2026 for resident businesses with gross revenue not exceeding AED 3,000,000."
      }
    ],
    contentHtml: `
<p class="lead">For most UAE companies with a 31 December year-end, <strong>30 September 2026</strong> is the statutory deadline to file and pay their corporate tax return. If you have not registered on EmaraTax, elected Small Business Relief, or prepared IFRS financial statements, this deadline requires immediate attention.</p>

<p>This guide explains who must register, the 0% and 9% tax brackets, how Small Business Relief functions, and the required filing steps on EmaraTax.</p>

<h2>What is UAE Corporate Tax?</h2>
<p>Corporate Tax is a federal direct tax on the taxable net profits of businesses. While VAT is a transaction tax (5%) based on gross billing, Corporate Tax evaluates your net accounting profit, making adjustments for disallowed expenses, tax exemptions, and transfer pricing.</p>

<p>Reliable corporate tax computations require clean, reconciled books. That is why professional <a href="/our-services/bookkeeping-and-accounting" class="text-blue-700 underline font-semibold">bookkeeping and accounting</a> is the cornerstone of seamless tax filing.</p>

<h2>UAE Corporate Tax Rates in 2026</h2>
<div class="overflow-x-auto my-6">
  <table class="w-full text-left border-collapse border border-slate-200">
    <thead>
      <tr class="bg-slate-900 text-white">
        <th class="p-3 border border-slate-700">Taxable Profit / Situation</th>
        <th class="p-3 border border-slate-700">Tax Rate</th>
      </tr>
    </thead>
    <tbody>
      <tr class="border-b border-slate-200">
        <td class="p-3 font-semibold">First AED 375,000 of taxable profit</td>
        <td class="p-3 font-bold text-emerald-600">0%</td>
      </tr>
      <tr class="border-b border-slate-200 bg-slate-50">
        <td class="p-3 font-semibold">Taxable profit exceeding AED 375,000</td>
        <td class="p-3 font-bold text-amber-700">9%</td>
      </tr>
      <tr class="border-b border-slate-200">
        <td class="p-3 font-semibold">Qualifying Free Zone Person (Qualifying Income)</td>
        <td class="p-3 font-bold text-emerald-600">0%</td>
      </tr>
      <tr class="border-b border-slate-200 bg-slate-50">
        <td class="p-3 font-semibold">Small Business Relief (Revenue ≤ AED 3M)</td>
        <td class="p-3 font-bold text-emerald-600">0% (Treated as nil taxable income)</td>
      </tr>
    </tbody>
  </table>
</div>

<h2>Who must register for Corporate Tax?</h2>
<p><strong>Almost every UAE juridical person must register</strong> with the FTA — mainland LLCs, Free Zone companies, and branch offices. Low turnover or zero profit does not excuse registration. The administrative penalty for late registration is <strong>AED 10,000</strong>.</p>

<h2>The 30 September 2026 Filing Deadline</h2>
<p>Returns and tax settlements must be completed within 9 months after your financial period ends:</p>
<ul class="list-disc pl-6 space-y-2 my-4">
  <li><strong>Year-End 31 Dec 2025:</strong> Due 30 September 2026</li>
  <li><strong>Year-End 31 Mar 2026:</strong> Due 31 December 2026</li>
  <li><strong>Year-End 30 Jun 2026:</strong> Due 31 March 2027</li>
</ul>

<div class="bg-amber-50 border-l-4 border-amber-500 p-4 rounded-r-lg my-6 text-slate-800">
  <strong>Action Required:</strong> If your financial year ended 31 December 2025, do not wait until late September. Reconciling trial balances and finalizing tax adjustments requires at least 2 weeks of preparation.
</div>

<h2>What you need before filing on EmaraTax</h2>
<ol class="list-decimal pl-6 space-y-2 my-4">
  <li>Active Corporate Tax Registration Number (TRN).</li>
  <li>Signed management accounts or audited financial statements.</li>
  <li>Fixed asset registers and depreciation schedules.</li>
  <li>Related-party transaction list (transfer pricing verification).</li>
`
  }
};

export const blogPosts = Object.values(blogPostsData).map((post) => ({
  id: post.slug,
  slug: post.slug,
  title: post.title,
  excerpt: post.excerpt,
  category: post.category,
  date: post.publishDate,
  readTime: post.readingTime,
  featuredImage: post.featuredImage,
  infographicImage: post.infographicImage,
  infographicCaption: post.infographicCaption,
  author: post.author,
  contentHtml: post.contentHtml,
  faqs: post.faqs,
}));
