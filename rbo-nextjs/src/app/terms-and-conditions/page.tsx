import { Metadata } from "next";
import HeroBanner from "@/components/ui/HeroBanner";

export const metadata: Metadata = {
  title: "Terms & Conditions | RBO Accounting Services FZE",
  description: "Terms of service and engagement governing professional accounting, VAT, Corporate Tax, and advisory services provided by RBO Accounting Services FZE.",
  alternates: {
    canonical: "https://www.rboaccounting.ae/terms-and-conditions",
  },
};

export default function TermsAndConditionsPage() {
  return (
    <main className="min-h-screen">
      <HeroBanner
        badge="Legal Agreement"
        title="Terms & Conditions"
        subtitle="Standard terms and conditions governing professional client engagements, advisory scopes, and fee arrangements."
        breadcrumbs={[
          { label: "Home", href: "/" },
          { label: "Terms & Conditions" },
        ]}
      />

      <section className="py-20 bg-white">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="prose prose-lg max-w-none text-gray-700 leading-relaxed space-y-8">
            <div>
              <h2 className="text-2xl font-serif font-bold text-[var(--navy-primary)] mb-3">
                1. Engagement & Scope of Services
              </h2>
              <p>
                These Terms and Conditions govern all accounting, VAT consultancy, Corporate Tax filing, auditing, payroll management, and corporate advisory services delivered by <strong>RBO Accounting Services FZE</strong> (&quot;RBO&quot;) to our clients. Specific deliverables, deadlines, and fees are defined in individual Engagement Letters signed by both parties.
              </p>
            </div>

            <div>
              <h2 className="text-2xl font-serif font-bold text-[var(--navy-primary)] mb-3">
                2. Client Responsibilities
              </h2>
              <p>
                To enable accurate and timely tax filings under UAE Federal Tax Authority (FTA) regulations, the client agrees to:
              </p>
              <ul className="list-disc pl-6 space-y-2 mt-2">
                <li>Provide complete, accurate, and authentic financial documents, bank statements, sales receipts, and expense invoices within agreed schedules.</li>
                <li>Notify RBO immediately of any changes in corporate structure, trade license activities, shareholder identity, or bank operations.</li>
                <li>Approve draft tax returns and financial statements in a timely manner prior to official submission deadlines.</li>
              </ul>
            </div>

            <div>
              <h2 className="text-2xl font-serif font-bold text-[var(--navy-primary)] mb-3">
                3. Professional Standards & Regulatory Compliance
              </h2>
              <p>
                All services are executed in accordance with International Financial Reporting Standards (IFRS) and UAE Federal Decrees, including Federal Decree-Law No. 8 of 2017 (VAT) and Federal Decree-Law No. 47 of 2022 (Corporate Tax). While RBO exercises all professional diligence to ensure zero tax exposure, ultimate legal liability for the truthfulness of declared accounting records rests with the taxable person / license holder as defined under UAE tax procedures.
              </p>
            </div>

            <div>
              <h2 className="text-2xl font-serif font-bold text-[var(--navy-primary)] mb-3">
                4. Fees & Payment Terms
              </h2>
              <p>
                Professional fees are quoted in UAE Dirhams (AED) and are subject to 5% UAE VAT where applicable. Invoices are payable upon receipt or according to the payment schedule specified in the Engagement Letter. Government administrative fees (such as FTA registration or penalty payments) are payable directly by the client or funded in advance.
              </p>
            </div>

            <div>
              <h2 className="text-2xl font-serif font-bold text-[var(--navy-primary)] mb-3">
                5. Confidentiality & Intellectual Property
              </h2>
              <p>
                Both parties undertake to maintain strict confidentiality regarding all proprietary, trade, and financial data exchanged during the engagement. RBO retains copyright over proprietary tax modeling templates, workflow methodologies, and advisory frameworks.
              </p>
            </div>

            <div>
              <h2 className="text-2xl font-serif font-bold text-[var(--navy-primary)] mb-3">
                6. Governing Law & Jurisdiction
              </h2>
              <p>
                These terms shall be governed by and construed in accordance with the federal laws of the United Arab Emirates and the local laws of the Emirate of Ajman. Any disputes arising out of or in connection with this agreement shall be subject to the exclusive jurisdiction of the competent courts of Ajman, UAE.
              </p>
            </div>

            <div>
              <h2 className="text-2xl font-serif font-bold text-[var(--navy-primary)] mb-3">
                7. Contact Information
              </h2>
              <p>
                For legal inquiries regarding client terms of service, please reach out to:
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
