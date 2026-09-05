import { Metadata } from "next";
import Link from "next/link";
import { 
  Calculator, 
  Receipt, 
  FileSpreadsheet, 
  Search, 
  Users2, 
  LineChart, 
  ArrowRight, 
  CheckCircle2, 
  ShieldAlert, 
  FileCheck2,
  ShieldCheck 
} from "lucide-react";
import HeroBanner from "@/components/ui/HeroBanner";
import { servicesList } from "@/data/services";
import ContactForm from "@/components/ui/ContactForm";

export const metadata: Metadata = {
  title: "Our Services | VAT, Corporate Tax, Bookkeeping & Audit in UAE | RBO",
  description: "Explore FTA-compliant accounting, VAT filing, Corporate Tax registration, external auditing, payroll, and Virtual CFO services by RBO Accounting Services FZE.",
  alternates: {
    canonical: "https://www.rboaccounting.ae/our-services",
  },
};

const iconMap: Record<string, any> = {
  Calculator,
  Receipt,
  FileSpreadsheet,
  Search,
  Users2,
  LineChart,
};

export default function ServicesPage() {
  return (
    <main className="min-h-screen bg-[#0D1B2A] text-white">
      <HeroBanner
        badge="UAE Accounting & Tax Solutions"
        title="Comprehensive Financial & Tax Advisory Services"
        subtitle="FTA-compliant VAT filing, Corporate Tax optimization, IFRS accounting, and certified audits tailored for Mainland & Free Zone companies across the UAE."
        breadcrumbs={[
          { label: "Home", href: "/" },
          { label: "Our Services" },
        ]}
      />

      {/* Services Grid */}
      <section className="py-20 bg-[#0D1B2A] border-b border-[#E8B84B]/15">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center max-w-3xl mx-auto mb-16">
            <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#E8B84B]/15 text-[#E8B84B] text-xs font-semibold tracking-wider uppercase mb-3 border border-[#E8B84B]/30">
              Full Spectrum Solutions
            </div>
            <h2 className="text-3xl sm:text-4xl font-serif font-bold text-white">
              Tailored Accounting & Compliance for Every UAE Business
            </h2>
            <p className="mt-4 text-xs sm:text-sm text-gray-400">
              From sole proprietorships and e-commerce stores to multinational Free Zone conglomerates, we ensure zero penalty risk and optimal tax efficiency.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {servicesList.map((svc) => {
              const Icon = iconMap[svc.icon] || Calculator;
              return (
                <div
                  key={svc.id}
                  className="bg-[#091522] rounded-3xl p-8 border border-[#E8B84B]/20 hover:border-[#E8B84B] shadow-xl hover:shadow-2xl transition-all duration-300 flex flex-col justify-between group"
                >
                  <div>
                    <div className="w-14 h-14 rounded-2xl bg-[#E8B84B]/10 text-[#E8B84B] flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-[#E8B84B] group-hover:text-[#0D1B2A] transition-all">
                      <Icon className="w-7 h-7" />
                    </div>

                    <h3 className="text-xl font-serif font-bold text-white mb-3 group-hover:text-[#E8B84B] transition-colors">
                      {svc.title}
                    </h3>

                    <p className="text-xs text-gray-400 leading-relaxed mb-6">
                      {svc.shortDesc}
                    </p>

                    <div className="space-y-2 mb-6 border-t border-white/10 pt-4">
                      {svc.subServices.slice(0, 3).map((sub, sIdx) => (
                        <div key={sIdx} className="flex items-center gap-2 text-xs text-gray-300 font-medium">
                          <CheckCircle2 className="w-3.5 h-3.5 text-[#E8B84B] shrink-0" />
                          <span>{sub.title}</span>
                        </div>
                      ))}
                    </div>
                  </div>

                  <Link
                    href={`/our-services/${svc.slug}`}
                    className="inline-flex items-center justify-between w-full pt-4 border-t border-white/10 text-xs font-bold text-[#E8B84B] uppercase tracking-wider group-hover:text-white transition-colors"
                  >
                    <span>Learn More & View Details</span>
                    <ArrowRight className="w-4 h-4 group-hover:translate-x-1 transition-transform" />
                  </Link>
                </div>
              );
            })}
          </div>
        </div>
      </section>

      {/* Compliance Guarantee Section */}
      <section className="py-16 bg-[#091522] border-b border-[#E8B84B]/15">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="bg-[#112233] rounded-3xl p-8 sm:p-12 text-white shadow-2xl border border-[#E8B84B]/30 relative overflow-hidden">
            <div className="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
              <div className="lg:col-span-8">
                <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#E8B84B]/20 text-[#E8B84B] text-xs font-semibold uppercase mb-4">
                  FTA Penalty Protection
                </div>
                <h3 className="text-2xl sm:text-3xl font-serif font-bold text-white mb-3">
                  Did you know? UAE FTA fines start at AED 10,000 for late Corporate Tax filing.
                </h3>
                <p className="text-gray-300 text-xs sm:text-sm leading-relaxed max-w-2xl">
                  Let our certified tax agents audit your tax status, submit returns on time via the EmaraTax portal, and legally structure your business for minimum tax liabilities.
                </p>
              </div>
              <div className="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-4">
                <Link
                  href="/contact-us"
                  className="px-6 py-3.5 rounded-full bg-[#E8B84B] text-[#0D1B2A] font-bold text-xs uppercase tracking-wider text-center hover:bg-[#d8a83b] transition-all shadow-md"
                >
                  Book Free Compliance Audit
                </Link>
                <Link
                  href="https://wa.me/971508051857"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="px-6 py-3.5 rounded-full bg-white/10 text-white font-bold text-xs text-center border border-white/20 hover:bg-white/20 transition-all"
                >
                  WhatsApp Tax Agent (+971 50 805 1857)
                </Link>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Contact Section */}
      <section className="py-20 bg-[#0D1B2A]">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-10">
            <h2 className="text-3xl font-serif font-bold text-white">
              Speak With an RBO Tax Specialist
            </h2>
            <p className="text-gray-400 mt-2 text-xs sm:text-sm">
              Send us your inquiry and receive customized accounting proposals within 2 business hours.
            </p>
          </div>
          <ContactForm />
        </div>
      </section>
    </main>
  );
}
