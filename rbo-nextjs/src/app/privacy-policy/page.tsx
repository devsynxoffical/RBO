import { Metadata } from "next";
import HeroBanner from "@/components/ui/HeroBanner";

export const metadata: Metadata = {
  title: "Privacy Policy | RBO Accounting Services FZE",
  description: "Privacy policy and data protection commitments of RBO Accounting Services FZE under UAE Federal Decree-Law No. 45 of 2021 on Personal Data Protection.",
  alternates: {
    canonical: "https://www.rboaccounting.ae/privacy-policy",
  },
};

export default function PrivacyPolicyPage() {
  return (
    <main className="min-h-screen">
      <HeroBanner
        badge="Legal & Compliance"
        title="Privacy Policy"
        subtitle="How RBO Accounting Services FZE collects, safeguards, and processes corporate and personal information in accordance with UAE Data Protection Regulations."
        breadcrumbs={[
          { label: "Home", href: "/" },
          { label: "Privacy Policy" },
        ]}
      />

      <section className="py-20 bg-white">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="prose prose-lg max-w-none text-gray-700 leading-relaxed space-y-8">
            <div>
              <h2 className="text-2xl font-serif font-bold text-[var(--navy-primary)] mb-3">
                1. Introduction
              </h2>
              <p>
                RBO Accounting Services FZE (&quot;RBO&quot;, &quot;we&quot;, &quot;us&quot;, or &quot;our&quot;), registered in Ajman Free Zone, United Arab Emirates, is dedicated to upholding the highest standards of data security, confidentiality, and professional ethics. This Privacy Policy sets out the basis on which any personal or corporate information we collect from you, or that you provide to us, will be processed and safeguarded.
              </p>
            </div>

            <div>
              <h2 className="text-2xl font-serif font-bold text-[var(--navy-primary)] mb-3">
                2. UAE Regulatory Compliance
              </h2>
              <p>
                Our data handling procedures strictly comply with <strong>UAE Federal Decree-Law No. 45 of 2021 on Personal Data Protection (PDPL)</strong>, as well as relevant professional guidelines issued by the UAE Federal Tax Authority (FTA) and international accounting standards.
              </p>
            </div>

            <div>
              <h2 className="text-2xl font-serif font-bold text-[var(--navy-primary)] mb-3">
                3. Information We Collect
              </h2>
              <p>
                To provide comprehensive accounting, VAT registration, Corporate Tax filing, auditing, and corporate advisory services, we may collect:
              </p>
              <ul className="list-disc pl-6 space-y-2 mt-2">
                <li><strong>Corporate Details:</strong> Trade license copies, Memorandum of Association (MOA), Certificate of Incorporation, shareholding structures, and business bank account statements.</li>
                <li><strong>Tax Identifiers:</strong> Tax Registration Numbers (TRN), EmaraTax login identifiers, customs registration codes, and previous FTA tax return filings.</li>
                <li><strong>Contact Information:</strong> Names, official email addresses, UAE mobile phone numbers, and physical office addresses of authorized signatories.</li>
                <li><strong>Accounting Records:</strong> Sales and purchase ledgers, invoices, payroll registers, balance sheets, and asset schedules.</li>
              </ul>
            </div>

            <div>
              <h2 className="text-2xl font-serif font-bold text-[var(--navy-primary)] mb-3">
                4. How We Use Your Information
              </h2>
              <p>
                We process your data solely for lawful and agreed professional purposes:
              </p>
              <ul className="list-disc pl-6 space-y-2 mt-2">
                <li>Preparing and submitting official VAT and Corporate Tax returns via the FTA EmaraTax portal.</li>
                <li>Performing monthly IFRS-compliant bookkeeping, account reconciliations, and payroll processing.</li>
                <li>Conducting statutory and internal audit examinations for licensing and banking authorities.</li>
                <li>Communicating critical tax deadlines, FTA audit notices, and regulatory updates.</li>
              </ul>
            </div>

            <div>
              <h2 className="text-2xl font-serif font-bold text-[var(--navy-primary)] mb-3">
                5. Confidentiality & Non-Disclosure
              </h2>
              <p>
                We enforce strict Non-Disclosure Agreements (NDA) across our organization. We do not sell, rent, or trade your corporate information to any third parties. Data is only shared with official government regulators (such as the Federal Tax Authority or licensing authorities) upon your explicit authorization or as mandated by UAE federal legislation.
              </p>
            </div>

            <div>
              <h2 className="text-2xl font-serif font-bold text-[var(--navy-primary)] mb-3">
                6. Data Retention
              </h2>
              <p>
                In compliance with UAE Tax Procedures Law (Federal Decree-Law No. 28 of 2022), all accounting documents, tax invoices, and returns must be retained for a statutory period of at least <strong>5 years</strong> (or <strong>15 years</strong> for real estate transactions). We maintain secure encrypted archives throughout this statutory duration.
              </p>
            </div>

            <div>
              <h2 className="text-2xl font-serif font-bold text-[var(--navy-primary)] mb-3">
                7. Contact Our Privacy Officer
              </h2>
              <p>
                For questions regarding this policy or to request data access or modification, please contact us at:
              </p>
              <div className="p-4 rounded-xl bg-[var(--navy-light)] border border-gray-200 mt-2 text-sm">
                <p><strong>RBO Accounting Services FZE</strong></p>
                <p>Ajman Free Zone C1 Building, Ajman, UAE</p>
                <p>Email: <a href="mailto:info@rboaccounting.ae" className="text-[var(--gold-dark)] underline">info@rboaccounting.ae</a></p>
                <p>Phone: +971 50 805 1857</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  );
}
