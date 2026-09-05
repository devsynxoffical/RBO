import React from "react";
import Link from "next/link";
import Image from "next/image";
import {
  ShieldCheck,
  Award,
  ClockCheck,
  CheckCircle2,
  ArrowRight,
  Calculator,
  Building2,
  FileSpreadsheet,
  Coins,
  FileCheck2,
  Users2,
  PhoneCall,
  MapPin
} from "lucide-react";
import ContactForm from "@/components/ui/ContactForm";
import FaqAccordion from "@/components/ui/FaqAccordion";
import { servicesData } from "@/data/services";
import { locationsData } from "@/data/locations";
import { blogPostsData } from "@/data/posts";

export default function HomePage() {
  const homeFaqs = [
    {
      q: "Why should UAE businesses choose RBO Accounting Services?",
      a: "RBO Accounting is an FTA-registered tax agency headquartered in Ajman Free Zone with full capability across all 7 Emirates. We provide direct access to senior accountants, transparent pricing, and a proven track record of zero late-filing penalties on EmaraTax."
    },
    {
      q: "Can you assist with both Free Zone and Mainland companies?",
      a: "Yes. We manage tax compliance and bookkeeping for Mainland (DED) licenses as well as all major Free Zones including DMCC, JAFZA, DIFC, Meydan, IFZA, AFZ, SAIF Zone, and RAKEZ."
    },
    {
      q: "What is included in the Free VAT Check?",
      a: "We review your previous 12 months of invoices, turnover numbers, and expense structures to tell you whether mandatory or voluntary VAT registration applies, and identify any compliance gaps."
    },
    {
      q: "How does onboarding work with RBO?",
      a: "Onboarding is fast and simple: we review your trade license, set up or connect your cloud accounting software (Zoho Books, QuickBooks, or Xero), and assign a dedicated accountant who communicates directly via WhatsApp and email."
    }
  ];

  return (
    <div className="space-y-16 sm:space-y-24">
      {/* 1. HERO SECTION */}
      <section className="relative bg-slate-950 text-white pt-16 pb-20 sm:pt-24 sm:pb-32 overflow-hidden border-b border-slate-800">
        <div className="absolute inset-0 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(201,162,39,0.15),rgba(255,255,255,0))]" />
        
        <div className="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div className="lg:col-span-7 space-y-6 text-center lg:text-left">
              <div className="inline-flex items-center gap-2 bg-amber-500/10 border border-amber-400/30 text-amber-300 font-semibold px-4 py-1.5 rounded-full text-xs sm:text-sm tracking-wide">
                <ShieldCheck className="w-4 h-4 text-amber-400" />
                <span>FTA Certified Tax Agency • Ajman Free Zone HQ</span>
              </div>

              <h1 className="text-3xl sm:text-5xl lg:text-6xl font-bold font-serif-heading text-white tracking-tight leading-tight">
                UAE Tax & Accounting <br className="hidden sm:inline" />
                <span className="text-amber-400">Done With Precision.</span>
              </h1>

              <p className="text-base sm:text-lg text-slate-300 max-w-2xl leading-relaxed mx-auto lg:mx-0">
                End-to-end VAT registration, 0% & 9% Corporate Tax filing, monthly bookkeeping, and Free Zone trade license audits across Dubai, Ajman, and all 7 Emirates.
              </p>

              <div className="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                <Link
                  href="/contact-us"
                  className="w-full sm:w-auto bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold px-8 py-3.5 rounded-xl shadow-lg hover:shadow-amber-500/20 transition-all flex items-center justify-center gap-2 text-base"
                >
                  <span>Free VAT Check</span>
                  <ArrowRight className="w-4 h-4" />
                </Link>
                <a
                  href="https://wa.me/971508051857"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="w-full sm:w-auto bg-slate-800 hover:bg-slate-700 text-white font-semibold px-7 py-3.5 rounded-xl border border-slate-700 transition-all flex items-center justify-center gap-2 text-base"
                >
                  <PhoneCall className="w-4 h-4 text-emerald-400" />
                  <span>WhatsApp Consultant</span>
                </a>
              </div>

              {/* Trust Indicators */}
              <div className="pt-6 grid grid-cols-3 gap-4 border-t border-slate-800/80 text-left">
                <div>
                  <div className="text-2xl sm:text-3xl font-extrabold text-amber-400 font-serif-heading">100%</div>
                  <div className="text-xs text-slate-400">On-Time FTA Filings</div>
                </div>
                <div>
                  <div className="text-2xl sm:text-3xl font-extrabold text-white font-serif-heading">7</div>
                  <div className="text-xs text-slate-400">Emirates Covered</div>
                </div>
                <div>
                  <div className="text-2xl sm:text-3xl font-extrabold text-amber-400 font-serif-heading">500+</div>
                  <div className="text-xs text-slate-400">Compliant Businesses</div>
                </div>
              </div>
            </div>

            {/* Hero Quick Form */}
            <div className="lg:col-span-5">
              <ContactForm />
            </div>

          </div>
        </div>
      </section>

      {/* 2. CORE SERVICES GRID */}
      <section className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center max-w-3xl mx-auto mb-14">
          <div className="text-xs font-bold uppercase tracking-widest text-amber-600 mb-2">
            Comprehensive Financial Solutions
          </div>
          <h2 className="text-3xl sm:text-4xl font-bold font-serif-heading text-slate-900 tracking-tight">
            Our Accounting & Tax Services
          </h2>
          <p className="mt-3 text-slate-600 text-sm sm:text-base">
            FTA-registered tax agents and chartered accountants managing every aspect of your UAE compliance lifecycle.
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          
          {/* VAT Service Card */}
          <div className="bg-white border border-slate-200 rounded-2xl p-7 shadow-sm hover:shadow-xl hover:border-amber-400 transition-all group flex flex-col justify-between">
            <div className="space-y-4">
              <div className="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center text-amber-600 group-hover:bg-amber-500 group-hover:text-slate-950 transition-colors">
                <Calculator className="w-6 h-6" />
              </div>
              <h3 className="text-xl font-bold text-slate-900 font-serif-heading">
                VAT Registration & Filing
              </h3>
              <p className="text-sm text-slate-600 leading-relaxed">
                Mandatory (AED 375k) and voluntary (AED 187.5k) EmaraTax registrations, quarterly returns, input tax recovery, and audit defense.
              </p>
              <ul className="space-y-2 text-xs text-slate-600 pt-2">
                <li className="flex items-center gap-2">
                  <CheckCircle2 className="w-3.5 h-3.5 text-amber-600" />
                  <span>EmaraTax TRN Registration</span>
                </li>
                <li className="flex items-center gap-2">
                  <CheckCircle2 className="w-3.5 h-3.5 text-amber-600" />
                  <span>Quarterly Form VAT201 Filing</span>
                </li>
                <li className="flex items-center gap-2">
                  <CheckCircle2 className="w-3.5 h-3.5 text-amber-600" />
                  <span>FTA Penalty Reconsideration</span>
                </li>
              </ul>
            </div>
            <div className="pt-6 mt-6 border-t border-slate-100">
              <Link
                href="/our-services/vat-registration-filing"
                className="text-sm font-semibold text-slate-900 hover:text-amber-600 flex items-center gap-1 group-hover:translate-x-1 transition-transform"
              >
                <span>Explore VAT Services</span>
                <ArrowRight className="w-4 h-4" />
              </Link>
            </div>
          </div>

          {/* Corporate Tax Card */}
          <div className="bg-white border border-slate-200 rounded-2xl p-7 shadow-sm hover:shadow-xl hover:border-amber-400 transition-all group flex flex-col justify-between">
            <div className="space-y-4">
              <div className="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center text-slate-800 group-hover:bg-slate-900 group-hover:text-amber-400 transition-colors">
                <Building2 className="w-6 h-6" />
              </div>
              <h3 className="text-xl font-bold text-slate-900 font-serif-heading">
                Corporate Tax Compliance
              </h3>
              <p className="text-sm text-slate-600 leading-relaxed">
                0% & 9% return calculations, Small Business Relief elections, Free Zone qualifying income audits, and 30 September filings.
              </p>
              <ul className="space-y-2 text-xs text-slate-600 pt-2">
                <li className="flex items-center gap-2">
                  <CheckCircle2 className="w-3.5 h-3.5 text-emerald-600" />
                  <span>Small Business Relief (≤ AED 3M)</span>
                </li>
                <li className="flex items-center gap-2">
                  <CheckCircle2 className="w-3.5 h-3.5 text-emerald-600" />
                  <span>Qualifying Free Zone 0% Status</span>
                </li>
                <li className="flex items-center gap-2">
                  <CheckCircle2 className="w-3.5 h-3.5 text-emerald-600" />
                  <span>Transfer Pricing Documentation</span>
                </li>
              </ul>
            </div>
            <div className="pt-6 mt-6 border-t border-slate-100">
              <Link
                href="/our-services/corporate-tax"
                className="text-sm font-semibold text-slate-900 hover:text-amber-600 flex items-center gap-1 group-hover:translate-x-1 transition-transform"
              >
                <span>Corporate Tax Details</span>
                <ArrowRight className="w-4 h-4" />
              </Link>
            </div>
          </div>

          {/* Bookkeeping Card */}
          <div className="bg-white border border-slate-200 rounded-2xl p-7 shadow-sm hover:shadow-xl hover:border-amber-400 transition-all group flex flex-col justify-between">
            <div className="space-y-4">
              <div className="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center text-amber-600 group-hover:bg-amber-500 group-hover:text-slate-950 transition-colors">
                <FileSpreadsheet className="w-6 h-6" />
              </div>
              <h3 className="text-xl font-bold text-slate-900 font-serif-heading">
                Bookkeeping & Accounting
              </h3>
              <p className="text-sm text-slate-600 leading-relaxed">
                Cloud ledger maintenance (Zoho, QuickBooks, Xero), bank reconciliations, and tax-ready monthly P&L financial reports.
              </p>
              <ul className="space-y-2 text-xs text-slate-600 pt-2">
                <li className="flex items-center gap-2">
                  <CheckCircle2 className="w-3.5 h-3.5 text-amber-600" />
                  <span>Monthly General Ledger Maintenance</span>
                </li>
                <li className="flex items-center gap-2">
                  <CheckCircle2 className="w-3.5 h-3.5 text-amber-600" />
                  <span>Bank & Gateway Reconciliations</span>
                </li>
                <li className="flex items-center gap-2">
                  <CheckCircle2 className="w-3.5 h-3.5 text-amber-600" />
                  <span>IFRS-compliant Financials</span>
                </li>
              </ul>
            </div>
            <div className="pt-6 mt-6 border-t border-slate-100">
              <Link
                href="/our-services/bookkeeping-and-accounting"
                className="text-sm font-semibold text-slate-900 hover:text-amber-600 flex items-center gap-1 group-hover:translate-x-1 transition-transform"
              >
                <span>Bookkeeping Packages</span>
                <ArrowRight className="w-4 h-4" />
              </Link>
            </div>
          </div>

          {/* Audit Card */}
          <div className="bg-white border border-slate-200 rounded-2xl p-7 shadow-sm hover:shadow-xl hover:border-amber-400 transition-all group flex flex-col justify-between">
            <div className="space-y-4">
              <div className="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center text-slate-800 group-hover:bg-slate-900 group-hover:text-amber-400 transition-colors">
                <FileCheck2 className="w-6 h-6" />
              </div>
              <h3 className="text-xl font-bold text-slate-900 font-serif-heading">
                Audit & Assurance
              </h3>
              <p className="text-sm text-slate-600 leading-relaxed">
                Free Zone trade license renewal audits (DMCC, JAFZA, AFZ), statutory financial audits, and investor due diligence.
              </p>
              <ul className="space-y-2 text-xs text-slate-600 pt-2">
                <li className="flex items-center gap-2">
                  <CheckCircle2 className="w-3.5 h-3.5 text-emerald-600" />
                  <span>Free Zone Authority Approved</span>
                </li>
                <li className="flex items-center gap-2">
                  <CheckCircle2 className="w-3.5 h-3.5 text-emerald-600" />
                  <span>Internal Controls & Risk Audit</span>
                </li>
              </ul>
            </div>
            <div className="pt-6 mt-6 border-t border-slate-100">
              <Link
                href="/our-services/audit-assurance"
                className="text-sm font-semibold text-slate-900 hover:text-amber-600 flex items-center gap-1 group-hover:translate-x-1 transition-transform"
              >
                <span>Audit Services</span>
                <ArrowRight className="w-4 h-4" />
              </Link>
            </div>
          </div>

          {/* Payroll & WPS Card */}
          <div className="bg-white border border-slate-200 rounded-2xl p-7 shadow-sm hover:shadow-xl hover:border-amber-400 transition-all group flex flex-col justify-between">
            <div className="space-y-4">
              <div className="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center text-amber-600 group-hover:bg-amber-500 group-hover:text-slate-950 transition-colors">
                <Coins className="w-6 h-6" />
              </div>
              <h3 className="text-xl font-bold text-slate-900 font-serif-heading">
                Payroll & WPS Compliance
              </h3>
              <p className="text-sm text-slate-600 leading-relaxed">
                MOHRE Wages Protection System (WPS) SIF file processing, monthly pay slips, and End of Service Gratuity (EOSB) settlement.
              </p>
              <ul className="space-y-2 text-xs text-slate-600 pt-2">
                <li className="flex items-center gap-2">
                  <CheckCircle2 className="w-3.5 h-3.5 text-amber-600" />
                  <span>100% MOHRE WPS Compliance</span>
                </li>
                <li className="flex items-center gap-2">
                  <CheckCircle2 className="w-3.5 h-3.5 text-amber-600" />
                  <span>UAE Labor Law Gratuity Rules</span>
                </li>
              </ul>
            </div>
            <div className="pt-6 mt-6 border-t border-slate-100">
              <Link
                href="/our-services/payroll"
                className="text-sm font-semibold text-slate-900 hover:text-amber-600 flex items-center gap-1 group-hover:translate-x-1 transition-transform"
              >
                <span>Payroll Solutions</span>
                <ArrowRight className="w-4 h-4" />
              </Link>
            </div>
          </div>

          {/* Virtual CFO Card */}
          <div className="bg-white border border-slate-200 rounded-2xl p-7 shadow-sm hover:shadow-xl hover:border-amber-400 transition-all group flex flex-col justify-between">
            <div className="space-y-4">
              <div className="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center text-slate-800 group-hover:bg-slate-900 group-hover:text-amber-400 transition-colors">
                <Users2 className="w-6 h-6" />
              </div>
              <h3 className="text-xl font-bold text-slate-900 font-serif-heading">
                Virtual CFO Advisory
              </h3>
              <p className="text-sm text-slate-600 leading-relaxed">
                Fractional executive financial leadership, 13-week cash flow modeling, budgeting, and board-level reporting.
              </p>
              <ul className="space-y-2 text-xs text-slate-600 pt-2">
                <li className="flex items-center gap-2">
                  <CheckCircle2 className="w-3.5 h-3.5 text-emerald-600" />
                  <span>Cash Flow & Working Capital</span>
                </li>
                <li className="flex items-center gap-2">
                  <CheckCircle2 className="w-3.5 h-3.5 text-emerald-600" />
                  <span>Executive Board Reporting</span>
                </li>
              </ul>
            </div>
            <div className="pt-6 mt-6 border-t border-slate-100">
              <Link
                href="/our-services/virtual-cfo"
                className="text-sm font-semibold text-slate-900 hover:text-amber-600 flex items-center gap-1 group-hover:translate-x-1 transition-transform"
              >
                <span>Virtual CFO Services</span>
                <ArrowRight className="w-4 h-4" />
              </Link>
            </div>
          </div>

        </div>
      </section>

      {/* 3. UAE EMIRATES COVERAGE */}
      <section className="bg-slate-900 text-white py-16 sm:py-20 border-y border-slate-800">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center max-w-3xl mx-auto mb-12">
            <div className="text-xs font-bold uppercase tracking-widest text-amber-400 mb-2">
              National Presence
            </div>
            <h2 className="text-3xl sm:text-4xl font-bold font-serif-heading text-white">
              Serving All Seven Emirates
            </h2>
            <p className="mt-2 text-slate-300 text-sm sm:text-base">
              From our Ajman Free Zone headquarters, we provide seamless on-site and cloud accounting across the UAE.
            </p>
          </div>

          <div className="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            {Object.values(locationsData).map((loc) => (
              <Link
                key={loc.slug}
                href={`/areas-we-serve/${loc.slug}`}
                className="bg-slate-800/80 hover:bg-slate-800 border border-slate-700/60 hover:border-amber-400/80 rounded-xl p-4 transition-all group"
              >
                <div className="flex items-center justify-between">
                  <div className="flex items-center gap-2 text-sm font-bold text-white group-hover:text-amber-300">
                    <MapPin className="w-4 h-4 text-amber-500" />
                    <span>{loc.name}</span>
                  </div>
                  <ArrowRight className="w-3.5 h-3.5 text-slate-500 group-hover:text-amber-300 group-hover:translate-x-1 transition-transform" />
                </div>
                <div className="text-xs text-slate-400 mt-2 line-clamp-1">
                  {loc.keyZones[0] || "Mainland & Free Zones"}
                </div>
              </Link>
            ))}
          </div>
        </div>
      </section>

      {/* 4. LATEST BLOG / TAX INSIGHTS */}
      <section className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex flex-col sm:flex-row items-start sm:items-end justify-between mb-10 gap-4">
          <div>
            <div className="text-xs font-bold uppercase tracking-widest text-amber-600 mb-1">
              Knowledge Hub
            </div>
            <h2 className="text-3xl font-bold font-serif-heading text-slate-900">
              Latest UAE Tax & Accounting Guides
            </h2>
          </div>
          <Link
            href="/blog"
            className="text-sm font-semibold text-amber-700 hover:text-amber-800 flex items-center gap-1"
          >
            <span>View all articles</span>
            <ArrowRight className="w-4 h-4" />
          </Link>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
          {Object.values(blogPostsData).map((post) => (
            <article
              key={post.slug}
              className="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all flex flex-col"
            >
              <Link href={`/${post.slug}`} className="relative h-60 w-full block bg-slate-950 overflow-hidden group">
                <Image
                  src={post.featuredImage}
                  alt={post.title}
                  fill
                  className="object-cover group-hover:scale-105 transition-transform duration-300"
                />
                <span className="absolute top-4 left-4 bg-slate-950/80 backdrop-blur-xs text-amber-300 text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wider">
                  {post.category}
                </span>
              </Link>
              <div className="p-6 flex-grow flex flex-col justify-between">
                <div>
                  <div className="text-xs text-slate-400 mb-2">
                    {post.publishDate} • {post.readingTime}
                  </div>
                  <h3 className="text-xl font-bold font-serif-heading text-slate-900 mb-3 hover:text-amber-700 transition-colors">
                    <Link href={`/${post.slug}`}>
                      {post.title}
                    </Link>
                  </h3>
                  <p className="text-sm text-slate-600 leading-relaxed line-clamp-3">
                    {post.excerpt}
                  </p>
                </div>
                <div className="pt-5 mt-5 border-t border-slate-100 flex items-center justify-between">
                  <span className="text-xs text-slate-500 font-medium">By {post.author}</span>
                  <Link
                    href={`/${post.slug}`}
                    className="text-xs font-bold text-amber-700 hover:text-amber-800 uppercase tracking-wider flex items-center gap-1"
                  >
                    Read Guide →
                  </Link>
                </div>
              </div>
            </article>
          ))}
        </div>
      </section>

      {/* 5. HOMEPAGE FAQ SECTION */}
      <section className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <FaqAccordion items={homeFaqs} />
      </section>
    </div>
  );
}
