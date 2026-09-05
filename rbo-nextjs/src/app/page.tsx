import { Metadata } from "next";
import Link from "next/link";
import Image from "next/image";
import { 
  Calculator, 
  Receipt, 
  FileSpreadsheet, 
  Search, 
  Users2, 
  LineChart, 
  ShieldCheck, 
  Award, 
  Clock, 
  CheckCircle2, 
  ArrowRight, 
  PhoneCall, 
  MessageCircle, 
  MapPin, 
  Building2, 
  FileCheck2,
  TrendingUp,
  Landmark,
  ShieldAlert,
  Sparkles
} from "lucide-react";
import FaqAccordion from "@/components/ui/FaqAccordion";
import ContactForm from "@/components/ui/ContactForm";
import { OrganizationJsonLd, FaqJsonLd } from "@/components/seo/JsonLd";
import { servicesList } from "@/data/services";
import { emiratesData } from "@/data/locations";
import { blogPosts } from "@/data/posts";

export const metadata: Metadata = {
  title: "RBO Accounting Services FZE | VAT, Corporate Tax & Audit in UAE",
  description: "FTA-compliant accounting, VAT registration, Corporate Tax filing (2026), and audit services in Ajman Free Zone & across all 7 UAE Emirates.",
  alternates: {
    canonical: "https://www.rboaccounting.ae",
  },
};

const homeFaqs = [
  {
    q: "Who is required to register for UAE Corporate Tax in 2026?",
    a: "All juridical entities incorporated in the UAE (including Mainland LLCs and Free Zone companies) as well as foreign legal entities having a permanent establishment in the UAE must register with the Federal Tax Authority (FTA) on EmaraTax, regardless of whether their turnover is below or above AED 375,000.",
  },
  {
    q: "What is the mandatory threshold for VAT registration in the UAE?",
    a: "Businesses with taxable supplies and imports exceeding AED 375,000 in the previous 12 months (or expected to exceed within the next 30 days) are legally obligated to register for VAT. Voluntary registration is available for companies with turnover over AED 187,500.",
  },
  {
    q: "Can Free Zone companies qualify for 0% Corporate Tax?",
    a: "Yes. A Qualifying Free Zone Person (QFZP) that maintains adequate substance, derives qualifying income, complies with transfer pricing rules, and satisfies the 5% / AED 5M de minimis requirement is eligible for a 0% tax rate on qualifying income.",
  },
  {
    q: "Where is the RBO Accounting Services FZE office located?",
    a: "Our headquarters is located at C1 Building, Liwara 1, Ajman Free Zone, Ajman, UAE. We provide on-site and cloud-managed accounting services across all 7 Emirates including Dubai, Abu Dhabi, Sharjah, and RAK.",
  },
  {
    q: "What are the penalties for late Corporate Tax or VAT filing?",
    a: "Late registration for Corporate Tax carries a mandatory administrative penalty of AED 10,000. Late VAT registration or late return submission incurs fines starting from AED 1,000 up to AED 20,000 plus percentage penalties.",
  },
];

const serviceIcons: Record<string, any> = {
  Calculator,
  Receipt,
  FileSpreadsheet,
  Search,
  Users2,
  LineChart,
};

export default function HomePage() {
  return (
    <main className="min-h-screen bg-[#0D1B2A] text-white">
      <OrganizationJsonLd />
      <FaqJsonLd faqs={homeFaqs} url="https://www.rboaccounting.ae" />

      {/* Hero Section */}
      <section className="relative min-h-[90vh] flex items-center justify-center overflow-hidden border-b border-[#E8B84B]/20 py-20">
        {/* Background Image with Dark Navy Overlay */}
        <div className="absolute inset-0 z-0">
          <Image
            src="/images/home-header1.jpg"
            alt="RBO Accounting Services FZE Hero"
            fill
            className="object-cover object-center opacity-30"
            priority
          />
          <div className="absolute inset-0 bg-gradient-to-r from-[#0D1B2A] via-[#0D1B2A]/90 to-[#091522]/80" />
        </div>

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            {/* Left Content */}
            <div className="lg:col-span-7 space-y-6">
              {/* Badge */}
              <div className="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#E8B84B]/15 border border-[#E8B84B]/30 text-[#E8B84B] text-xs font-bold uppercase tracking-wider">
                <Sparkles className="w-3.5 h-3.5" />
                <span>FTA Accredited UAE Tax Agency</span>
              </div>

              {/* Main Headline */}
              <h1 className="text-4xl sm:text-5xl lg:text-6xl font-serif font-bold text-white leading-tight">
                Take Control of Your Finances with <span className="text-[#E8B84B]">Smart Insights</span> & Tax Compliance
              </h1>

              {/* Subheadline */}
              <p className="text-base sm:text-lg text-gray-300 leading-relaxed max-w-2xl">
                Comprehensive VAT filing, Corporate Tax 2026 registration, IFRS bookkeeping, and certified auditing tailored for Mainland & Free Zone enterprises across all 7 Emirates.
              </p>

              {/* CTA Buttons */}
              <div className="flex flex-wrap items-center gap-4 pt-4">
                <Link
                  href="/contact-us"
                  className="px-8 py-4 rounded-full bg-[#E8B84B] hover:bg-[#d8a83b] text-[#0D1B2A] font-bold text-sm uppercase tracking-wider transition-all shadow-xl hover:shadow-[#E8B84B]/30 hover:scale-105"
                >
                  Book Free Consultation
                </Link>
                <Link
                  href="https://wa.me/971508051857"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="inline-flex items-center gap-2.5 px-8 py-4 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-sm transition-all shadow-lg hover:scale-105"
                >
                  <MessageCircle className="w-5 h-5" />
                  <span>WhatsApp (+971 50 805 1857)</span>
                </Link>
              </div>

              {/* Key Trust Highlights */}
              <div className="pt-6 grid grid-cols-3 gap-4 border-t border-white/10">
                <div>
                  <div className="text-2xl font-serif font-bold text-[#E8B84B]">AED 0</div>
                  <div className="text-xs text-gray-400">FTA Penalty Guarantee</div>
                </div>
                <div>
                  <div className="text-2xl font-serif font-bold text-[#E8B84B]">500+</div>
                  <div className="text-xs text-gray-400">UAE Corporate Clients</div>
                </div>
                <div>
                  <div className="text-2xl font-serif font-bold text-[#E8B84B]">100%</div>
                  <div className="text-xs text-gray-400">FTA EmaraTax Compliant</div>
                </div>
              </div>
            </div>

            {/* Right Consultation Card */}
            <div className="lg:col-span-5">
              <div className="p-8 rounded-3xl bg-[#112233]/90 border border-[#E8B84B]/30 shadow-2xl backdrop-blur-md">
                <div className="text-center mb-6">
                  <h3 className="font-serif text-2xl font-bold text-white">
                    Request Free Tax Review
                  </h3>
                  <p className="text-xs text-gray-300 mt-1">
                    Get an instant compliance health check for VAT & Corporate Tax.
                  </p>
                </div>
                <ContactForm />
              </div>
            </div>

          </div>
        </div>
      </section>

      {/* Feature Pillar Strip (01 On-Time Services, 02 Professional Team, 03 Business Analysis) */}
      <section className="py-16 bg-[#091522] border-b border-[#E8B84B]/15">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            {/* 01 */}
            <div className="p-8 rounded-2xl bg-[#0D1B2A] border border-[#E8B84B]/20 hover:border-[#E8B84B] transition-all relative overflow-hidden group">
              <div className="flex items-center justify-between mb-4">
                <div className="w-12 h-12 rounded-xl bg-[#E8B84B]/10 text-[#E8B84B] flex items-center justify-center">
                  <Clock className="w-6 h-6" />
                </div>
                <span className="text-4xl font-serif font-extrabold text-[#E8B84B]/20 group-hover:text-[#E8B84B]/40 transition-colors">
                  01
                </span>
              </div>
              <h3 className="text-xl font-serif font-bold text-white mb-2 group-hover:text-[#E8B84B] transition-colors">
                On-Time Services
              </h3>
              <p className="text-xs text-gray-400 leading-relaxed mb-4">
                We deliver periodic VAT return filings, payroll WPS routines, and corporate tax submissions strictly ahead of statutory FTA deadlines.
              </p>
              <Link href="/about-us" className="inline-flex items-center text-xs font-bold text-[#E8B84B] gap-1 group-hover:translate-x-1 transition-transform">
                <span>Learn More</span>
                <ArrowRight className="w-3.5 h-3.5" />
              </Link>
            </div>

            {/* 02 */}
            <div className="p-8 rounded-2xl bg-[#0D1B2A] border border-[#E8B84B]/20 hover:border-[#E8B84B] transition-all relative overflow-hidden group">
              <div className="flex items-center justify-between mb-4">
                <div className="w-12 h-12 rounded-xl bg-[#E8B84B]/10 text-[#E8B84B] flex items-center justify-center">
                  <Award className="w-6 h-6" />
                </div>
                <span className="text-4xl font-serif font-extrabold text-[#E8B84B]/20 group-hover:text-[#E8B84B]/40 transition-colors">
                  02
                </span>
              </div>
              <h3 className="text-xl font-serif font-bold text-white mb-2 group-hover:text-[#E8B84B] transition-colors">
                Professional Team
              </h3>
              <p className="text-xs text-gray-400 leading-relaxed mb-4">
                Chartered Accountants and certified FTA tax agents with extensive UAE mainland and free zone regulatory experience.
              </p>
              <Link href="/about-us" className="inline-flex items-center text-xs font-bold text-[#E8B84B] gap-1 group-hover:translate-x-1 transition-transform">
                <span>Meet Our Team</span>
                <ArrowRight className="w-3.5 h-3.5" />
              </Link>
            </div>

            {/* 03 */}
            <div className="p-8 rounded-2xl bg-[#0D1B2A] border border-[#E8B84B]/20 hover:border-[#E8B84B] transition-all relative overflow-hidden group">
              <div className="flex items-center justify-between mb-4">
                <div className="w-12 h-12 rounded-xl bg-[#E8B84B]/10 text-[#E8B84B] flex items-center justify-center">
                  <TrendingUp className="w-6 h-6" />
                </div>
                <span className="text-4xl font-serif font-extrabold text-[#E8B84B]/20 group-hover:text-[#E8B84B]/40 transition-colors">
                  03
                </span>
              </div>
              <h3 className="text-xl font-serif font-bold text-white mb-2 group-hover:text-[#E8B84B] transition-colors">
                Business Analysis
              </h3>
              <p className="text-xs text-gray-400 leading-relaxed mb-4">
                In-depth financial modeling, unit economics evaluation, cash flow forecasts, and executive board reporting.
              </p>
              <Link href="/our-services/virtual-cfo" className="inline-flex items-center text-xs font-bold text-[#E8B84B] gap-1 group-hover:translate-x-1 transition-transform">
                <span>Explore CFO Services</span>
                <ArrowRight className="w-3.5 h-3.5" />
              </Link>
            </div>

          </div>
        </div>
      </section>

      {/* About Section with home6.jpg and 80% Satisfaction Card */}
      <section className="py-20 bg-[#0D1B2A]">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            {/* Left Image & Stats Card */}
            <div className="lg:col-span-6 relative">
              <div className="relative aspect-[4/3] rounded-3xl overflow-hidden border border-[#E8B84B]/30 shadow-2xl">
                <Image
                  src="/images/home6.jpg"
                  alt="RBO Accounting Services Team"
                  fill
                  className="object-cover"
                />
              </div>

              {/* Floating Satisfaction Badge */}
              <div className="absolute -bottom-6 -right-4 sm:right-6 bg-[#091522] border-2 border-[#E8B84B] p-6 rounded-2xl shadow-2xl flex items-center gap-4">
                <div className="w-12 h-12 rounded-xl bg-[#E8B84B] text-[#0D1B2A] flex items-center justify-center font-bold text-lg">
                  80%
                </div>
                <div>
                  <h4 className="font-bold text-white text-sm">Client Satisfaction</h4>
                  <p className="text-[11px] text-gray-400">Delivering 100% FTA Compliance</p>
                </div>
              </div>
            </div>

            {/* Right Details */}
            <div className="lg:col-span-6 space-y-6">
              <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#E8B84B]/10 text-[#E8B84B] text-xs font-semibold uppercase tracking-wider">
                About Our Firm
              </div>
              <h2 className="text-3xl sm:text-4xl font-serif font-bold text-white leading-tight">
                Empowering Financial Growth with <span className="text-[#E8B84B]">Expertise & Innovation</span>
              </h2>
              <p className="text-sm text-gray-300 leading-relaxed">
                At <strong>RBO Accounting Services FZE</strong>, we are committed to helping businesses and entrepreneurs across the UAE achieve financial success through precise tax strategies and IFRS accounting standards. Headquartered in Ajman Free Zone C1 Building, our certified accountants provide strategic clarity and complete protection against regulatory penalties.
              </p>

              <div className="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                {[
                  "FTA EmaraTax Return Filing",
                  "Qualifying Free Zone Person (0% Tax)",
                  "Small Business Relief Guidance",
                  "Statutory Audit Reports for License Renewal",
                  "MOHRE Wage Protection System (WPS)",
                  "Customized Virtual CFO Roadmaps"
                ].map((item, idx) => (
                  <div key={idx} className="flex items-center gap-2.5 text-xs text-gray-200">
                    <CheckCircle2 className="w-4 h-4 text-[#E8B84B] shrink-0" />
                    <span>{item}</span>
                  </div>
                ))}
              </div>

              <div className="pt-4 flex items-center gap-4">
                <Link
                  href="/about-us"
                  className="px-6 py-3 rounded-full bg-[#E8B84B] hover:bg-[#d8a83b] text-[#0D1B2A] font-bold text-xs uppercase tracking-wider transition-all shadow-md"
                >
                  More About Us
                </Link>
                <Link
                  href="/our-services"
                  className="px-6 py-3 rounded-full bg-white/5 hover:bg-white/10 text-white font-bold text-xs border border-white/20 transition-all"
                >
                  View Services
                </Link>
              </div>
            </div>

          </div>
        </div>
      </section>

      {/* Services Section */}
      <section className="py-20 bg-[#091522] border-y border-[#E8B84B]/15">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center max-w-3xl mx-auto mb-16">
            <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#E8B84B]/10 text-[#E8B84B] text-xs font-semibold uppercase tracking-wider mb-3">
              Full Spectrum Solutions
            </div>
            <h2 className="text-3xl sm:text-4xl font-serif font-bold text-white">
              Tailored Accounting & Tax Services in UAE
            </h2>
            <p className="mt-4 text-xs sm:text-sm text-gray-400">
              From sole proprietorships and e-commerce stores to multinational Free Zone conglomerates, we ensure zero penalty risk and optimal tax efficiency.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {servicesList.map((svc) => {
              const Icon = serviceIcons[svc.icon] || Calculator;
              return (
                <div
                  key={svc.id}
                  className="bg-[#0D1B2A] rounded-3xl p-8 border border-[#E8B84B]/20 hover:border-[#E8B84B] shadow-xl hover:shadow-2xl transition-all duration-300 flex flex-col justify-between group"
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
                    <span>View Service Details</span>
                    <ArrowRight className="w-4 h-4 group-hover:translate-x-1 transition-transform" />
                  </Link>
                </div>
              );
            })}
          </div>
        </div>
      </section>

      {/* 2026 UAE Corporate Tax & VAT Regulatory Breakdown */}
      <section className="py-20 bg-[#0D1B2A]">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div className="lg:col-span-7 space-y-6">
              <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/10 text-[#E8B84B] text-xs font-semibold uppercase tracking-wider">
                2026 Fiscal Regulations
              </div>
              <h2 className="text-3xl sm:text-4xl font-serif font-bold text-white leading-tight">
                UAE Corporate Tax & VAT Compliance Rules for 2026
              </h2>
              <p className="text-sm text-gray-300 leading-relaxed">
                Under UAE Federal Decree-Law No. 47 of 2022 and Federal Decree-Law No. 8 of 2017, all entities must maintain proper accounting books and submit required returns on EmaraTax.
              </p>

              {/* Comparison Table */}
              <div className="rounded-2xl overflow-hidden border border-white/10 bg-[#091522]">
                <table className="w-full text-xs text-left">
                  <thead className="bg-[#112233] text-[#E8B84B] uppercase text-[11px] font-bold">
                    <tr>
                      <th className="p-3">Tax Category</th>
                      <th className="p-3">Threshold / Condition</th>
                      <th className="p-3">Applicable Rate</th>
                    </tr>
                  </thead>
                  <tbody className="divide-y divide-white/5 text-gray-300">
                    <tr>
                      <td className="p-3 font-semibold text-white">VAT Mandatory</td>
                      <td className="p-3">Taxable supplies &gt; AED 375,000 / 12 mo</td>
                      <td className="p-3 font-bold text-emerald-400">5% Standard Rate</td>
                    </tr>
                    <tr>
                      <td className="p-3 font-semibold text-white">VAT Voluntary</td>
                      <td className="p-3">Taxable supplies &gt; AED 187,500 / 12 mo</td>
                      <td className="p-3 font-bold text-blue-400">Optional Registration</td>
                    </tr>
                    <tr>
                      <td className="p-3 font-semibold text-white">Corporate Tax Standard</td>
                      <td className="p-3">Net taxable profit &gt; AED 375,000</td>
                      <td className="p-3 font-bold text-[#E8B84B]">9% Tax Rate</td>
                    </tr>
                    <tr>
                      <td className="p-3 font-semibold text-white">Small Business Relief</td>
                      <td className="p-3">Annual revenue &le; AED 3,000,000</td>
                      <td className="p-3 font-bold text-emerald-400">0% (Nil Taxable Profit)</td>
                    </tr>
                    <tr>
                      <td className="p-3 font-semibold text-white">Qualifying Free Zone (QFZP)</td>
                      <td className="p-3">Substance + Qualifying Income</td>
                      <td className="p-3 font-bold text-emerald-400">0% Tax Rate</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            {/* Right Urgent Callout */}
            <div className="lg:col-span-5">
              <div className="p-8 rounded-3xl bg-gradient-to-br from-amber-600/20 via-[#112233] to-[#0D1B2A] border-2 border-[#E8B84B]/40 shadow-2xl space-y-5">
                <div className="w-12 h-12 rounded-2xl bg-[#E8B84B] text-[#0D1B2A] flex items-center justify-center">
                  <ShieldAlert className="w-6 h-6" />
                </div>
                <h3 className="font-serif text-2xl font-bold text-white">
                  30 September 2026 Filing Deadline
                </h3>
                <p className="text-xs text-gray-300 leading-relaxed">
                  Companies with a financial year ending 31 December must file and settle their Corporate Tax return within 9 months. Failure to submit incurs a mandatory AED 10,000 penalty.
                </p>
                <div className="pt-2">
                  <Link
                    href="https://wa.me/971508051857"
                    target="_blank"
                    rel="noopener noreferrer"
                    className="w-full inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs transition-colors shadow-md"
                  >
                    <span>Check Your Filing Deadline (+971 50 805 1857)</span>
                  </Link>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>

      {/* Areas We Serve (7 Emirates Grid) */}
      <section className="py-20 bg-[#091522] border-t border-[#E8B84B]/15">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center max-w-3xl mx-auto mb-16">
            <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#E8B84B]/10 text-[#E8B84B] text-xs font-semibold uppercase tracking-wider mb-3">
              Nationwide Reach
            </div>
            <h2 className="text-3xl sm:text-4xl font-serif font-bold text-white">
              Serving All 7 Emirates Across the UAE
            </h2>
            <p className="mt-4 text-xs sm:text-sm text-gray-400">
              Tailored tax agent services and on-site consultations across every major economic zone and mainland jurisdiction.
            </p>
          </div>

          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            {emiratesData.map((e) => (
              <Link
                key={e.id}
                href={`/areas-we-serve/${e.slug}`}
                className="p-6 rounded-2xl bg-[#0D1B2A] border border-[#E8B84B]/20 hover:border-[#E8B84B] hover:shadow-xl transition-all group flex flex-col justify-between"
              >
                <div>
                  <div className="flex items-center justify-between mb-3">
                    <MapPin className="w-5 h-5 text-[#E8B84B]" />
                    {e.isHeadquarters && (
                      <span className="text-[10px] font-bold uppercase bg-[#E8B84B]/20 text-[#E8B84B] px-2 py-0.5 rounded">
                        Headquarters
                      </span>
                    )}
                  </div>
                  <h3 className="text-lg font-serif font-bold text-white group-hover:text-[#E8B84B] transition-colors mb-1">
                    {e.name}
                  </h3>
                  <p className="text-xs text-gray-400 line-clamp-2 mb-4">
                    {e.heroTagline}
                  </p>
                </div>
                <div className="flex items-center text-xs font-bold text-[#E8B84B] gap-1 group-hover:translate-x-1 transition-transform">
                  <span>Explore Services</span>
                  <ArrowRight className="w-3.5 h-3.5" />
                </div>
              </Link>
            ))}
          </div>
        </div>
      </section>

      {/* Tax Guides & Blog Section */}
      <section className="py-20 bg-[#0D1B2A]">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex flex-col sm:flex-row items-center justify-between gap-4 mb-12">
            <div>
              <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#E8B84B]/10 text-[#E8B84B] text-xs font-semibold uppercase tracking-wider mb-2">
                Expert Analysis
              </div>
              <h2 className="text-3xl font-serif font-bold text-white">
                Latest UAE Tax & VAT Guides
              </h2>
            </div>
            <Link
              href="/blog"
              className="inline-flex items-center gap-2 text-xs font-bold text-[#E8B84B] hover:underline uppercase tracking-wider"
            >
              <span>View All Articles</span>
              <ArrowRight className="w-4 h-4" />
            </Link>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
            {blogPosts.map((post) => (
              <article
                key={post.id}
                className="bg-[#091522] rounded-3xl border border-[#E8B84B]/20 overflow-hidden hover:border-[#E8B84B] transition-all group"
              >
                <div className="relative aspect-[16/9] w-full">
                  <Image
                    src={post.featuredImage}
                    alt={post.title}
                    fill
                    className="object-cover group-hover:scale-105 transition-transform duration-500"
                  />
                  <div className="absolute top-4 left-4">
                    <span className="px-3 py-1 rounded-full bg-[#0D1B2A]/90 text-[#E8B84B] text-[11px] font-bold uppercase">
                      {post.category}
                    </span>
                  </div>
                </div>

                <div className="p-6 space-y-3">
                  <div className="flex items-center gap-4 text-xs text-gray-400">
                    <span>{post.date}</span>
                    <span>&bull;</span>
                    <span>{post.readTime}</span>
                  </div>
                  <h3 className="font-serif text-xl font-bold text-white group-hover:text-[#E8B84B] transition-colors">
                    <Link href={`/blog/${post.slug}`}>
                      {post.title}
                    </Link>
                  </h3>
                  <p className="text-xs text-gray-300 line-clamp-2">
                    {post.excerpt}
                  </p>
                  <div className="pt-2">
                    <Link
                      href={`/blog/${post.slug}`}
                      className="inline-flex items-center text-xs font-bold text-[#E8B84B] gap-1 group-hover:translate-x-1 transition-transform"
                    >
                      <span>Read Guide</span>
                      <ArrowRight className="w-3.5 h-3.5" />
                    </Link>
                  </div>
                </div>
              </article>
            ))}
          </div>
        </div>
      </section>

      {/* FAQ Section */}
      <section className="py-20 bg-[#091522] border-t border-[#E8B84B]/15">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-12">
            <h2 className="text-3xl font-serif font-bold text-white">
              Frequently Asked Questions
            </h2>
            <p className="text-xs sm:text-sm text-gray-400 mt-2">
              Common questions about UAE VAT registration, Corporate Tax filing, and accounting compliance.
            </p>
          </div>
          <FaqAccordion items={homeFaqs} />
        </div>
      </section>
    </main>
  );
}
