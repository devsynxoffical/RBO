import { Metadata } from "next";
import Link from "next/link";
import { 
  ShieldCheck, 
  Award, 
  Users, 
  TrendingUp, 
  CheckCircle2, 
  Target, 
  Eye, 
  Briefcase, 
  FileCheck2, 
  BadgeCheck, 
  ArrowRight,
  PhoneCall
} from "lucide-react";
import HeroBanner from "@/components/ui/HeroBanner";
import ContactForm from "@/components/ui/ContactForm";

export const metadata: Metadata = {
  title: "About Us | RBO Accounting Services FZE - UAE Tax & Financial Advisors",
  description: "Learn about RBO Accounting Services FZE. FTA-compliant accounting, VAT, Corporate Tax, and financial consultancy in Ajman Free Zone & across the UAE.",
  alternates: {
    canonical: "https://www.rboaccounting.ae/about-us",
  },
};

export default function AboutUsPage() {
  const values = [
    {
      icon: ShieldCheck,
      title: "100% FTA Compliance",
      desc: "Every tax filing, bookkeeping ledger, and advisory report strictly follows Federal Tax Authority (FTA) laws, Cabinet Decisions, and IFRS regulations.",
    },
    {
      icon: Eye,
      title: "Absolute Transparency",
      desc: "Clear upfront pricing with no hidden charges. Comprehensive financial reporting that gives founders total clarity over their business performance.",
    },
    {
      icon: Award,
      title: "Certified Industry Experts",
      desc: "Qualified chartered accountants, tax agents, and corporate advisors with deep experience across mainland, free zones, and offshore jurisdictions.",
    },
    {
      icon: Target,
      title: "Strategic Tax Optimization",
      desc: "We ensure you legally maximize Small Business Relief, Qualifying Free Zone Person (0% rate) exemptions, and input tax recoveries.",
    },
  ];

  const milestones = [
    { number: "500+", label: "FTA Tax Registrations Completed" },
    { number: "99.8%", label: "First-Time FTA Approval Rate" },
    { number: "7", label: "Emirates Covered Nationwide" },
    { number: "AED 0", label: "FTA Penalty Guarantee on Managed Accounts" },
  ];

  const pillars = [
    {
      title: "Our Mission",
      content:
        "To empower businesses across Dubai, Ajman, Abu Dhabi, and the Northern Emirates with seamless, reliable, and technology-driven accounting, VAT, and Corporate Tax compliance — safeguarding enterprises against penalties and optimizing their long-term growth.",
    },
    {
      title: "Our Vision",
      content:
        "To be the most trusted and authoritative financial consultancy and tax advisory firm in the UAE, recognized for uncompromised integrity, client-first advisory, and regulatory mastery.",
    },
  ];

  return (
    <main className="min-h-screen">
      <HeroBanner
        badge="About RBO Accounting Services FZE"
        title="Your Trusted Financial & Tax Partners in the UAE"
        subtitle="Headquartered in Ajman Free Zone C1 Building and serving mainland & free zone enterprises across all 7 Emirates with FTA-accredited expertise."
        breadcrumbs={[
          { label: "Home", href: "/" },
          { label: "About Us" },
        ]}
      />

      {/* Intro Section */}
      <section className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
              <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[var(--gold-primary)]/10 text-[var(--gold-dark)] text-xs font-semibold tracking-wider uppercase mb-4">
                Who We Are
              </div>
              <h2 className="text-3xl sm:text-4xl font-serif font-bold text-[var(--navy-primary)] leading-tight mb-6">
                Pioneering FTA Tax Compliance & Financial Excellence in the UAE
              </h2>
              <div className="space-y-4 text-gray-700 leading-relaxed">
                <p>
                  <strong>RBO Accounting Services FZE</strong> is an established accounting, auditing, and tax advisory firm based in the UAE. We specialize in navigating the dynamic fiscal regulatory landscape introduced by the UAE Federal Tax Authority (FTA), including <strong>Federal Decree-Law No. 8 of 2017 (VAT)</strong> and <strong>Federal Decree-Law No. 47 of 2022 (Corporate Tax)</strong>.
                </p>
                <p>
                  From startups and SMEs in Ajman Free Zone and Dubai South to multinational corporations operating across Abu Dhabi and Sharjah, we provide end-to-end financial oversight. Our dedicated team of chartered accountants handles daily bookkeeping, payroll, monthly VAT return submissions, Corporate Tax registrations, audit preparation, and Virtual CFO advisory.
                </p>
                <p>
                  We believe that accounting is more than number crunching — it is the strategic backbone of sustainable commercial success and legal protection in the United Arab Emirates.
                </p>
              </div>

              <div className="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div className="flex items-start gap-3 p-4 rounded-xl bg-[var(--navy-light)] border border-gray-100">
                  <BadgeCheck className="w-6 h-6 text-[var(--gold-primary)] shrink-0 mt-0.5" />
                  <div>
                    <h4 className="font-bold text-[var(--navy-primary)] text-sm">FTA EmaraTax Experts</h4>
                    <p className="text-xs text-gray-600 mt-1">Full lifecycle management on the official EmaraTax portal.</p>
                  </div>
                </div>
                <div className="flex items-start gap-3 p-4 rounded-xl bg-[var(--navy-light)] border border-gray-100">
                  <FileCheck2 className="w-6 h-6 text-[var(--gold-primary)] shrink-0 mt-0.5" />
                  <div>
                    <h4 className="font-bold text-[var(--navy-primary)] text-sm">IFRS Standardized</h4>
                    <p className="text-xs text-gray-600 mt-1">Audit-ready balance sheets and financial statements.</p>
                  </div>
                </div>
              </div>
            </div>

            {/* Visual Box / Metrics Card */}
            <div className="relative">
              <div className="bg-gradient-to-br from-[var(--navy-primary)] to-[var(--navy-secondary)] text-white p-8 sm:p-10 rounded-3xl shadow-2xl relative overflow-hidden border border-[var(--gold-primary)]/20">
                <div className="absolute top-0 right-0 w-64 h-64 bg-[var(--gold-primary)]/10 rounded-full blur-3xl -z-0" />
                
                <h3 className="text-2xl font-serif font-bold text-white mb-6 relative z-10">
                  Proven Track Record Across the Emirates
                </h3>

                <div className="grid grid-cols-2 gap-6 relative z-10">
                  {milestones.map((m, idx) => (
                    <div key={idx} className="p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                      <div className="text-3xl sm:text-4xl font-extrabold text-[var(--gold-light)] font-serif">
                        {m.number}
                      </div>
                      <div className="text-xs sm:text-sm text-gray-300 mt-2 font-medium">
                        {m.label}
                      </div>
                    </div>
                  ))}
                </div>

                <div className="mt-8 pt-6 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4 relative z-10">
                  <div>
                    <p className="text-xs text-gray-400">Headquarters Location</p>
                    <p className="text-sm font-semibold text-white">Ajman Free Zone C1 Building, UAE</p>
                  </div>
                  <Link
                    href="https://wa.me/971508051857"
                    target="_blank"
                    rel="noopener noreferrer"
                    className="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-[var(--gold-primary)] text-[var(--navy-primary)] font-bold text-xs hover:bg-[var(--gold-light)] transition-all shadow-md"
                  >
                    <PhoneCall className="w-3.5 h-3.5" />
                    <span>Talk to an Advisor</span>
                  </Link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Mission & Vision Section */}
      <section className="py-16 bg-[var(--navy-light)] border-y border-gray-200/80">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
            {pillars.map((p, idx) => (
              <div
                key={idx}
                className="bg-white p-8 sm:p-10 rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden"
              >
                <div className="w-2 h-full bg-gradient-to-b from-[var(--gold-primary)] to-[var(--navy-primary)] absolute top-0 left-0" />
                <h3 className="text-2xl font-serif font-bold text-[var(--navy-primary)] mb-4 pl-2">
                  {p.title}
                </h3>
                <p className="text-gray-700 leading-relaxed pl-2">
                  {p.content}
                </p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Core Values */}
      <section className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center max-w-3xl mx-auto mb-16">
            <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[var(--gold-primary)]/10 text-[var(--gold-dark)] text-xs font-semibold tracking-wider uppercase mb-3">
              Why Partner With RBO
            </div>
            <h2 className="text-3xl sm:text-4xl font-serif font-bold text-[var(--navy-primary)]">
              Our Guiding Principles & Commitments
            </h2>
            <p className="mt-4 text-gray-600">
              We stand apart through deep UAE fiscal knowledge, uncompromising integrity, and proactive tax risk mitigation.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {values.map((v, idx) => {
              const Icon = v.icon;
              return (
                <div
                  key={idx}
                  className="p-6 rounded-2xl bg-white border border-gray-200 shadow-sm hover:border-[var(--gold-primary)] hover:shadow-xl transition-all duration-300 group"
                >
                  <div className="w-14 h-14 rounded-xl bg-[var(--navy-primary)] text-[var(--gold-primary)] flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-[var(--gold-primary)] group-hover:text-[var(--navy-primary)] transition-all">
                    <Icon className="w-7 h-7" />
                  </div>
                  <h3 className="text-lg font-bold text-[var(--navy-primary)] mb-2">
                    {v.title}
                  </h3>
                  <p className="text-sm text-gray-600 leading-relaxed">
                    {v.desc}
                  </p>
                </div>
              );
            })}
          </div>
        </div>
      </section>

      {/* Contact Form Section */}
      <section className="py-20 bg-[var(--navy-light)]">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-10">
            <h2 className="text-3xl font-serif font-bold text-[var(--navy-primary)]">
              Schedule a Direct Consultation
            </h2>
            <p className="text-gray-600 mt-2">
              Speak with a Senior UAE Tax Consultant today to review your business accounts and compliance status.
            </p>
          </div>
          <ContactForm />
        </div>
      </section>
    </main>
  );
}
