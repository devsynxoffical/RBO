import { Metadata } from "next";
import Link from "next/link";
import Image from "next/image";
import { 
  Check, 
  ArrowRight, 
  MessageCircle, 
  ShieldCheck, 
  Clock, 
  Award, 
  TrendingUp, 
  Building2, 
  CheckCircle2, 
  MapPin, 
  Phone,
  Sparkles,
  BarChart3,
  Scale,
  Users
} from "lucide-react";
import FaqAccordion from "@/components/ui/FaqAccordion";
import HeroForm from "@/components/ui/HeroForm";
import { OrganizationJsonLd, FaqJsonLd } from "@/components/seo/JsonLd";
import { blogPosts } from "@/data/posts";

export const metadata: Metadata = {
  title: "Accounting Firm in UAE | FTA Registered | RBO Accounting",
  description: "FTA-registered accounting firm in the UAE for bookkeeping, VAT, corporate tax, audit and payroll. Clear advice for mainland and free-zone businesses.",
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
  {
    q: "Which accounting software do you work with?",
    a: "Our accountants are certified in all major cloud accounting software including Xero, Zoho Books, QuickBooks Online, Tally Prime, and Odoo.",
  }
];

export default function HomePage() {
  return (
    <main className="min-h-screen bg-white text-[#1e293b]">
      <OrganizationJsonLd />
      <FaqJsonLd faqs={homeFaqs} url="https://www.rboaccounting.ae" />

      {/* 1. HERO SECTION - 1:1 Match with Live Site */}
      <section className="relative min-h-[85vh] flex items-center justify-center overflow-hidden py-16 sm:py-20 bg-[#091522]">
        {/* Background Image with Dark Gradient Overlay */}
        <div className="absolute inset-0 z-0">
          <Image
            src="/images/contact1.jpg"
            alt="Accounting Firms in UAE - RBO Accounting Services FZE"
            fill
            className="object-cover object-center opacity-25"
            priority
          />
          <div className="absolute inset-0 bg-gradient-to-r from-[#091522]/95 via-[#0D1B2A]/90 to-[#091522]/95" />
        </div>

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-10 xl:gap-12 items-center">
            
            {/* Left Hero Column */}
            <div className="lg:col-span-7 space-y-6 text-white">
              {/* Badge */}
              <div className="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-md bg-white/10 border border-white/20 text-xs font-medium text-white shadow-sm backdrop-blur-sm">
                <Check className="w-3.5 h-3.5 text-[#E8B84B]" />
                <span>FTA-Approved Accounting Firm in UAE</span>
              </div>

              {/* Main Headline */}
              <h1 className="text-3xl sm:text-4xl lg:text-5xl font-serif font-bold text-white leading-tight">
                Accounting <span className="text-[#E8B84B]">Firms in UAE</span> <span className="text-[#E8B84B]">Your Business</span> – Can Actually Rely On
              </h1>

              {/* Paragraph Copy */}
              <p className="text-sm sm:text-base text-gray-300 leading-relaxed max-w-2xl font-normal">
                Running a business in the UAE means juggling VAT deadlines, corporate tax filings, payroll compliance, and day-to-day bookkeeping — often all at once. RBO Accounting Services FZE exists to take that weight off your shoulders. As one of the dependable accounting firms in UAE, we combine local regulatory knowledge with practical, hands-on support so you can focus on running your business instead of chasing paperwork.
              </p>

              {/* CTA Buttons */}
              <div className="flex flex-wrap items-center gap-4 pt-2">
                <Link
                  href="/contact-us#form"
                  className="inline-flex items-center justify-center px-7 py-3.5 rounded-md bg-[#DEAB3D] hover:bg-[#c9952a] text-white font-semibold text-sm transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5"
                >
                  Book a Free Consultation &rarr;
                </Link>
                <Link
                  href="https://wa.me/971508051857"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="inline-flex items-center justify-center px-7 py-3.5 rounded-md bg-white/10 hover:bg-white/20 border border-white/20 text-white font-semibold text-sm transition-all backdrop-blur-sm"
                >
                  WhatsApp Us
                </Link>
              </div>

              {/* 3 Checkmarks */}
              <div className="pt-4 space-y-2 text-sm text-gray-200">
                <div className="flex items-center gap-2.5">
                  <div className="w-4 h-4 rounded-full bg-[#DEAB3D]/20 text-[#DEAB3D] flex items-center justify-center">
                    <Check className="w-3 h-3 stroke-[3]" />
                  </div>
                  <span>Free Initial Consultation</span>
                </div>
                <div className="flex items-center gap-2.5">
                  <div className="w-4 h-4 rounded-full bg-[#DEAB3D]/20 text-[#DEAB3D] flex items-center justify-center">
                    <Check className="w-3 h-3 stroke-[3]" />
                  </div>
                  <span>7 Emirates Covered</span>
                </div>
                <div className="flex items-center gap-2.5">
                  <div className="w-4 h-4 rounded-full bg-[#DEAB3D]/20 text-[#DEAB3D] flex items-center justify-center">
                    <Check className="w-3 h-3 stroke-[3]" />
                  </div>
                  <span>100% FTA Compliant Solutions</span>
                </div>
              </div>
            </div>

            {/* Right Hero Column - Consultation Form Card */}
            <div className="lg:col-span-5">
              <div className="p-6 sm:p-8 rounded-2xl bg-[#111E40]/90 border border-white/10 shadow-2xl backdrop-blur-md">
                <div className="mb-5">
                  <h3 className="font-serif text-2xl font-bold text-white">
                    Get a Free Consultation
                  </h3>
                  <p className="text-xs text-gray-300 mt-1">
                    Our expert will reply within 10 minutes
                  </p>
                </div>
                <HeroForm />
              </div>
            </div>

          </div>
        </div>
      </section>

      {/* 2. MARQUEE TICKER STRIP */}
      <div className="w-full overflow-hidden bg-[#111E40] py-4 border-y border-white/10">
        <div className="flex gap-12 whitespace-nowrap animate-marquee items-center text-white font-bold tracking-widest text-sm sm:text-base uppercase">
          <span>FTA Registered Tax Agent</span>
          <span className="text-[#DEAB3D]">◆</span>
          <span>200+ UAE Businesses</span>
          <span className="text-[#DEAB3D]">◆</span>
          <span>All 7 Emirates Covered</span>
          <span className="text-[#DEAB3D]">◆</span>
          <span>10min Average Response Time</span>
          <span className="text-[#DEAB3D]">◆</span>
          <span>24/7 WhatsApp Support</span>
          <span className="text-[#DEAB3D]">◆</span>
          <span>FTA Registered Tax Agent</span>
          <span className="text-[#DEAB3D]">◆</span>
          <span>200+ UAE Businesses</span>
          <span className="text-[#DEAB3D]">◆</span>
          <span>All 7 Emirates Covered</span>
          <span className="text-[#DEAB3D]">◆</span>
          <span>10min Average Response Time</span>
          <span className="text-[#DEAB3D]">◆</span>
          <span>24/7 WhatsApp Support</span>
        </div>
      </div>

      {/* 3. WHO WE ARE SECTION */}
      <section className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            {/* Left Image / Visual */}
            <div className="lg:col-span-5 relative">
              <div className="relative h-[420px] rounded-2xl overflow-hidden shadow-2xl border border-gray-100">
                <Image
                  src="/images/about1.jpg"
                  alt="About RBO Accounting Services FZE"
                  fill
                  className="object-cover"
                />
              </div>
              <div className="absolute -bottom-6 -right-6 bg-[#09203B] text-white p-6 rounded-2xl shadow-xl border border-[#DEAB3D]/30 max-w-[240px]">
                <div className="text-3xl font-serif font-bold text-[#DEAB3D]">100%</div>
                <div className="text-xs text-gray-300 mt-1 font-medium">
                  FTA EmaraTax &amp; UAE Corporate Tax Compliance
                </div>
              </div>
            </div>

            {/* Right Text & 3 Feature Boxes */}
            <div className="lg:col-span-7 space-y-6">
              <div className="text-xs font-bold uppercase tracking-wider text-[#DEAB3D]">
                Who We Are
              </div>
              <h2 className="text-3xl sm:text-4xl font-serif font-bold text-[#09203B] leading-tight">
                Trusted Accounting &amp; Financial Experts for UAE Businesses
              </h2>
              <p className="text-gray-600 leading-relaxed text-sm sm:text-base">
                At <strong className="text-[#09203B]">RBO Accounting Services FZE</strong>, we believe accounting should do more than balance the books—it should help businesses make confident financial decisions. We provide reliable accounting, bookkeeping, VAT, payroll, and financial advisory services tailored for startups, SMEs, and established companies across the UAE.
              </p>

              <div className="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-4">
                <div className="p-4 rounded-xl bg-gray-50 border border-gray-100 space-y-2">
                  <div className="w-10 h-10 rounded-lg bg-[#DEAB3D]/10 text-[#DEAB3D] flex items-center justify-center">
                    <BarChart3 className="w-5 h-5" />
                  </div>
                  <h3 className="font-serif font-bold text-sm text-[#09203B]">
                    Proactive Guidance
                  </h3>
                  <p className="text-xs text-gray-500 leading-relaxed">
                    We monitor your finances and highlight potential tax &amp; cash flow issues early.
                  </p>
                </div>

                <div className="p-4 rounded-xl bg-gray-50 border border-gray-100 space-y-2">
                  <div className="w-10 h-10 rounded-lg bg-[#DEAB3D]/10 text-[#DEAB3D] flex items-center justify-center">
                    <Clock className="w-5 h-5" />
                  </div>
                  <h3 className="font-serif font-bold text-sm text-[#09203B]">
                    Reliable &amp; Timely
                  </h3>
                  <p className="text-xs text-gray-500 leading-relaxed">
                    Prompt assistance for urgent accounting, VAT, payroll, and compliance matters.
                  </p>
                </div>

                <div className="p-4 rounded-xl bg-gray-50 border border-gray-100 space-y-2">
                  <div className="w-10 h-10 rounded-lg bg-[#DEAB3D]/10 text-[#DEAB3D] flex items-center justify-center">
                    <Users className="w-5 h-5" />
                  </div>
                  <h3 className="font-serif font-bold text-sm text-[#09203B]">
                    Client-Focused
                  </h3>
                  <p className="text-xs text-gray-500 leading-relaxed">
                    Long-term partnerships built on trust, honesty, and crystal-clear communication.
                  </p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>

      {/* 4. WHAT WE OFFER - 6 DETAILED SERVICE CARDS */}
      <section className="py-20 bg-gray-50 border-t border-gray-200/60">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          
          <div className="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span className="text-xs font-bold uppercase tracking-wider text-[#DEAB3D]">
              WHAT WE OFFER
            </span>
            <h2 className="text-3xl sm:text-4xl font-serif font-bold text-[#09203B]">
              Everything Your Business Needs Under One Roof
            </h2>
            <p className="text-gray-600 text-sm sm:text-base leading-relaxed">
              Most accounting firms in UAE specialize in one or two areas and refer you elsewhere for the rest. We built our service range specifically so you don&apos;t have to manage three different vendors for accounting, tax, and compliance.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            {/* Card 1: Bookkeeping & Accounting */}
            <div className="bg-white rounded-2xl p-7 border border-gray-200/80 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between">
              <div className="space-y-4">
                <div className="text-3xl">📒</div>
                <h3 className="font-serif text-xl font-bold text-[#09203B]">
                  Bookkeeping &amp; Accounting Services
                </h3>
                <p className="text-xs text-gray-600 leading-relaxed">
                  Clean books are the foundation of everything else. Our monthly bookkeeping services cover daily transaction recording, paired with regular bank reconciliation. We handle accounts payable &amp; receivable management, deliver clear financial reporting, ensure IFRS compliance, and work directly inside Xero, Zoho &amp; QuickBooks.
                </p>
                <ul className="space-y-2 pt-2 text-xs text-gray-700">
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Daily bookkeeping</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Bank reconciliation</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Accounts Payable &amp; Receivable Management</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Financial reporting</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>IFRS compliance</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Xero, Zoho &amp; QuickBooks</span>
                  </li>
                </ul>
              </div>
              <div className="pt-6">
                <Link
                  href="/our-services/accounting/bookkeeping-and-accounting"
                  className="inline-flex items-center gap-1.5 text-xs font-bold text-[#DEAB3D] hover:text-[#09203B] transition-colors"
                >
                  <span>Learn More</span>
                  <ArrowRight className="w-3.5 h-3.5" />
                </Link>
              </div>
            </div>

            {/* Card 2: VAT Registration & Filing UAE */}
            <div className="bg-white rounded-2xl p-7 border border-gray-200/80 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between">
              <div className="space-y-4">
                <div className="text-3xl">🧾</div>
                <h3 className="font-serif text-xl font-bold text-[#09203B]">
                  VAT Registration &amp; Filing UAE
                </h3>
                <p className="text-xs text-gray-600 leading-relaxed">
                  We handle VAT registration from day one, manage ongoing VAT return filing, and pursue VAT refunds where you&apos;re owed money back. Our team also provides VAT advisory, steps in with FTA audit support, keeps your FTA records update current, and handles penalty reconsideration.
                </p>
                <ul className="space-y-2 pt-2 text-xs text-gray-700">
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>VAT registration</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>VAT return filing</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>VAT refunds</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>FTA audit support</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>FTA records update</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Penalty reconsideration</span>
                  </li>
                </ul>
              </div>
              <div className="pt-6">
                <Link
                  href="/our-services/vat-registration-filing"
                  className="inline-flex items-center gap-1.5 text-xs font-bold text-[#DEAB3D] hover:text-[#09203B] transition-colors"
                >
                  <span>Learn More</span>
                  <ArrowRight className="w-3.5 h-3.5" />
                </Link>
              </div>
            </div>

            {/* Card 3: Corporate Tax UAE */}
            <div className="bg-white rounded-2xl p-7 border border-gray-200/80 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between">
              <div className="space-y-4">
                <div className="text-3xl">🏛️</div>
                <h3 className="font-serif text-xl font-bold text-[#09203B]">
                  Corporate Tax UAE
                </h3>
                <p className="text-xs text-gray-600 leading-relaxed">
                  Since corporate tax became mandatory, every eligible business needs a firm that actually understands the practical side of compliance, not just the theory. We manage CT registration, handle your CT return filing on schedule, and work with you on tax planning that fits your actual business structure rather than a generic template.
                </p>
                <ul className="space-y-2 pt-2 text-xs text-gray-700">
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>CT registration</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>CT return filing</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Tax planning</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Transfer pricing</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Tax compliance</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>FTA support</span>
                  </li>
                </ul>
              </div>
              <div className="pt-6">
                <Link
                  href="/our-services/corporate-tax"
                  className="inline-flex items-center gap-1.5 text-xs font-bold text-[#DEAB3D] hover:text-[#09203B] transition-colors"
                >
                  <span>Learn More</span>
                  <ArrowRight className="w-3.5 h-3.5" />
                </Link>
              </div>
            </div>

            {/* Card 4: Audit & Assurance Services UAE */}
            <div className="bg-white rounded-2xl p-7 border border-gray-200/80 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between">
              <div className="space-y-4">
                <div className="text-3xl">🔍</div>
                <h3 className="font-serif text-xl font-bold text-[#09203B]">
                  Audit &amp; Assurance Services UAE
                </h3>
                <p className="text-xs text-gray-600 leading-relaxed">
                  Whether a bank, investor, or free zone authority requires it, we deliver audit work that stands up to scrutiny. This includes statutory audit for annual compliance, internal audit to strengthen your controls, and free zone audit for companies licensed under DMCC, IFZA, JAFZA, and similar authorities.
                </p>
                <ul className="space-y-2 pt-2 text-xs text-gray-700">
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Statutory audit</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Internal audit</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Free Zone audit</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Due diligence</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Compliance audit</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Risk assessment</span>
                  </li>
                </ul>
              </div>
              <div className="pt-6">
                <Link
                  href="/our-services/audit-assurance"
                  className="inline-flex items-center gap-1.5 text-xs font-bold text-[#DEAB3D] hover:text-[#09203B] transition-colors"
                >
                  <span>Learn More</span>
                  <ArrowRight className="w-3.5 h-3.5" />
                </Link>
              </div>
            </div>

            {/* Card 5: Payroll Services Dubai & UAE */}
            <div className="bg-white rounded-2xl p-7 border border-gray-200/80 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between">
              <div className="space-y-4">
                <div className="text-3xl">💳</div>
                <h3 className="font-serif text-xl font-bold text-[#09203B]">
                  Payroll Services Dubai &amp; UAE
                </h3>
                <p className="text-xs text-gray-600 leading-relaxed">
                  Payroll mistakes cost trust with employees fast, and UAE payroll has its own specific rules. We manage WPS payroll (salary processing) to keep you compliant with the Wage Protection System, calculate EOSB calculation accurately so end-of-service settlements are never a dispute, handle leave management tracking, and provide clear payroll reports every cycle.
                </p>
                <ul className="space-y-2 pt-2 text-xs text-gray-700">
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>WPS payroll</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Salary processing</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>EOSB calculation</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Leave management</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>MOHRE compliance</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Payroll reports</span>
                  </li>
                </ul>
              </div>
              <div className="pt-6">
                <Link
                  href="/our-services/payroll"
                  className="inline-flex items-center gap-1.5 text-xs font-bold text-[#DEAB3D] hover:text-[#09203B] transition-colors"
                >
                  <span>Learn More</span>
                  <ArrowRight className="w-3.5 h-3.5" />
                </Link>
              </div>
            </div>

            {/* Card 6: Virtual CFO Services UAE */}
            <div className="bg-white rounded-2xl p-7 border border-gray-200/80 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between">
              <div className="space-y-4">
                <div className="text-3xl">📊</div>
                <h3 className="font-serif text-xl font-bold text-[#09203B]">
                  Virtual CFO Services UAE
                </h3>
                <p className="text-xs text-gray-600 leading-relaxed">
                  Not every business is ready for a full-time CFO, but most growing businesses need that level of financial thinking. Our virtual CFO service delivers management reports that actually inform decisions, hands-on financial planning, realistic budgeting, close cash flow management so you&apos;re never caught short, and ongoing business advisory as your company grows and its needs change.
                </p>
                <ul className="space-y-2 pt-2 text-xs text-gray-700">
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Management reports</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Financial planning</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Budgeting</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Cash flow management</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>KPI reporting</span>
                  </li>
                  <li className="flex items-center gap-2">
                    <Check className="w-3.5 h-3.5 text-[#DEAB3D] shrink-0" />
                    <span>Business advisory</span>
                  </li>
                </ul>
              </div>
              <div className="pt-6">
                <Link
                  href="/our-services/virtual-cfo"
                  className="inline-flex items-center gap-1.5 text-xs font-bold text-[#DEAB3D] hover:text-[#09203B] transition-colors"
                >
                  <span>Learn More</span>
                  <ArrowRight className="w-3.5 h-3.5" />
                </Link>
              </div>
            </div>

          </div>
        </div>
      </section>

      {/* 5. WHY BUSINESSES CHOOSE RBO */}
      <section className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div className="lg:col-span-6 space-y-6">
              <span className="text-xs font-bold uppercase tracking-wider text-[#DEAB3D]">
                WHY WORK WITH US
              </span>
              <h2 className="text-3xl sm:text-4xl font-serif font-bold text-[#09203B] leading-tight">
                Why Businesses Choose RBO Over Other Accounting Firms in UAE
              </h2>
              <p className="text-gray-600 text-sm sm:text-base leading-relaxed">
                We combine deep technical expertise in UAE tax law with modern, cloud-first accounting practices. Our clients stay with us because we are proactive, responsive, and completely transparent with our work and pricing.
              </p>

              <div className="space-y-4 pt-2">
                <div className="flex items-start gap-3.5">
                  <div className="w-6 h-6 rounded-full bg-[#DEAB3D]/20 text-[#DEAB3D] flex items-center justify-center shrink-0 mt-0.5">
                    <Check className="w-4 h-4 stroke-[3]" />
                  </div>
                  <div>
                    <h4 className="font-bold text-sm text-[#09203B]">Fixed, Transparent Pricing</h4>
                    <p className="text-xs text-gray-500 mt-0.5">No surprise hourly fees. Clear monthly retainer packages tailored to your transaction volume.</p>
                  </div>
                </div>

                <div className="flex items-start gap-3.5">
                  <div className="w-6 h-6 rounded-full bg-[#DEAB3D]/20 text-[#DEAB3D] flex items-center justify-center shrink-0 mt-0.5">
                    <Check className="w-4 h-4 stroke-[3]" />
                  </div>
                  <div>
                    <h4 className="font-bold text-sm text-[#09203B]">Dedicated FTA Registered Tax Agent</h4>
                    <p className="text-xs text-gray-500 mt-0.5">You will work directly with certified accountants who know UAE tax codes inside out.</p>
                  </div>
                </div>

                <div className="flex items-start gap-3.5">
                  <div className="w-6 h-6 rounded-full bg-[#DEAB3D]/20 text-[#DEAB3D] flex items-center justify-center shrink-0 mt-0.5">
                    <Check className="w-4 h-4 stroke-[3]" />
                  </div>
                  <div>
                    <h4 className="font-bold text-sm text-[#09203B]">Fast Response Times</h4>
                    <p className="text-xs text-gray-500 mt-0.5">Average 10-minute response time on WhatsApp and immediate turnaround for urgent FTA requests.</p>
                  </div>
                </div>

                <div className="flex items-start gap-3.5">
                  <div className="w-6 h-6 rounded-full bg-[#DEAB3D]/20 text-[#DEAB3D] flex items-center justify-center shrink-0 mt-0.5">
                    <Check className="w-4 h-4 stroke-[3]" />
                  </div>
                  <div>
                    <h4 className="font-bold text-sm text-[#09203B]">All 7 Emirates Covered</h4>
                    <p className="text-xs text-gray-500 mt-0.5">Seamless compliance for Mainland DED licenses and all UAE Free Zone authorities.</p>
                  </div>
                </div>
              </div>
            </div>

            <div className="lg:col-span-6 relative">
              <div className="relative h-[440px] rounded-2xl overflow-hidden shadow-2xl border border-gray-100">
                <Image
                  src="/images/home2.png"
                  alt="UAE Accounting and Tax Compliance"
                  fill
                  className="object-cover"
                />
              </div>
            </div>

          </div>
        </div>
      </section>

      {/* 6. HOW WE WORK - 4 SIMPLE STEPS */}
      <section className="py-20 bg-gray-50 border-y border-gray-200/60">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          
          <div className="text-center max-w-2xl mx-auto mb-16 space-y-3">
            <span className="text-xs font-bold uppercase tracking-wider text-[#DEAB3D]">
              OUR SIMPLE PROCESS
            </span>
            <h2 className="text-3xl sm:text-4xl font-serif font-bold text-[#09203B]">
              How We Get Your Finances in Order — In 4 Simple Steps
            </h2>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div className="bg-white p-6 rounded-2xl border border-gray-200/80 shadow-sm relative space-y-3">
              <div className="text-3xl font-serif font-extrabold text-[#DEAB3D]/30">01</div>
              <h3 className="font-serif font-bold text-lg text-[#09203B]">Discovery &amp; Review</h3>
              <p className="text-xs text-gray-600 leading-relaxed">
                We review your current license structure, previous tax filings, and ledger health to identify compliance gaps.
              </p>
            </div>

            <div className="bg-white p-6 rounded-2xl border border-gray-200/80 shadow-sm relative space-y-3">
              <div className="text-3xl font-serif font-extrabold text-[#DEAB3D]/30">02</div>
              <h3 className="font-serif font-bold text-lg text-[#09203B]">Custom Action Plan</h3>
              <p className="text-xs text-gray-600 leading-relaxed">
                We provide a tailored roadmap covering VAT deadlines, Corporate Tax registration, and bookkeeping schedules.
              </p>
            </div>

            <div className="bg-white p-6 rounded-2xl border border-gray-200/80 shadow-sm relative space-y-3">
              <div className="text-3xl font-serif font-extrabold text-[#DEAB3D]/30">03</div>
              <h3 className="font-serif font-bold text-lg text-[#09203B]">Setup &amp; Clean-Up</h3>
              <p className="text-xs text-gray-600 leading-relaxed">
                Our accountants integrate your bank feeds, reconcile historical books, and configure cloud accounting software.
              </p>
            </div>

            <div className="bg-white p-6 rounded-2xl border border-gray-200/80 shadow-sm relative space-y-3">
              <div className="text-3xl font-serif font-extrabold text-[#DEAB3D]/30">04</div>
              <h3 className="font-serif font-bold text-lg text-[#09203B]">Ongoing Management</h3>
              <p className="text-xs text-gray-600 leading-relaxed">
                Enjoy hassle-free periodic return submissions, payroll runs, and monthly executive financial statements.
              </p>
            </div>

          </div>
        </div>
      </section>

      {/* 7. AREAS WE SERVE - 7 EMIRATES */}
      <section className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          
          <div className="text-center max-w-2xl mx-auto mb-16 space-y-3">
            <span className="text-xs font-bold uppercase tracking-wider text-[#DEAB3D]">
              WHERE WE WORK
            </span>
            <h2 className="text-3xl sm:text-4xl font-serif font-bold text-[#09203B]">
              Accounting Services Across All UAE Emirates
            </h2>
            <p className="text-gray-600 text-sm sm:text-base leading-relaxed">
              Licensed in Ajman Free Zone and serving Mainland LLCs, Free Zone companies, and offshore entities in all 7 Emirates.
            </p>
          </div>

          <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
            
            {[
              { name: "Dubai", link: "/areas-we-serve/dubai", desc: "DMCC, DIFC, JAFZA, Mainland" },
              { name: "Abu Dhabi", link: "/areas-we-serve/abu-dhabi", desc: "ADGM, KEZAD & Mainland" },
              { name: "Sharjah", link: "/areas-we-serve/sharjah", desc: "SAIF Zone, Hamriyah & Mainland" },
              { name: "Ajman (Headquarters)", link: "/areas-we-serve/ajman", desc: "AFZ C1 Building & Mainland" },
              { name: "Ras Al Khaimah", link: "/areas-we-serve/ras-al-khaimah", desc: "RAKEZ & Mainland" },
              { name: "Fujairah", link: "/areas-we-serve/fujairah", desc: "FFZA & Logistics Hub" },
              { name: "Umm Al Quwain", link: "/areas-we-serve/umm-al-quwain", desc: "UAQ FTZ & SMEs" },
            ].map((em, idx) => (
              <Link
                key={idx}
                href={em.link}
                className="p-5 rounded-xl bg-gray-50 border border-gray-200 hover:border-[#DEAB3D] hover:bg-white hover:shadow-lg transition-all group"
              >
                <div className="flex items-center justify-between mb-2">
                  <MapPin className="w-4 h-4 text-[#DEAB3D]" />
                  <ArrowRight className="w-3.5 h-3.5 text-gray-400 group-hover:text-[#DEAB3D] group-hover:translate-x-1 transition-all" />
                </div>
                <h3 className="font-serif font-bold text-base text-[#09203B] group-hover:text-[#DEAB3D] transition-colors">
                  {em.name}
                </h3>
                <p className="text-[11px] text-gray-500 mt-1">
                  {em.desc}
                </p>
              </Link>
            ))}

          </div>
        </div>
      </section>

      {/* 8. FAQ ACCORDION SECTION */}
      <section className="py-20 bg-gray-50 border-t border-gray-200/60">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          
          <div className="text-center mb-12 space-y-3">
            <span className="text-xs font-bold uppercase tracking-wider text-[#DEAB3D]">
              GOT QUESTIONS?
            </span>
            <h2 className="text-3xl sm:text-4xl font-serif font-bold text-[#09203B]">
              Frequently Asked Questions
            </h2>
          </div>

          <FaqAccordion items={homeFaqs} />
        </div>
      </section>

      {/* 9. READY TO STOP WORRYING - BOTTOM CTA */}
      <section className="py-20 bg-[#09203B] text-white text-center relative overflow-hidden">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 relative z-10">
          <h2 className="text-3xl sm:text-4xl font-serif font-bold text-white">
            Ready to Stop Worrying About Compliance?
          </h2>
          <p className="text-gray-300 text-sm sm:text-base max-w-2xl mx-auto">
            Book a confidential consultation today. Our FTA certified tax team will review your bookkeeping, VAT, and Corporate Tax status to keep your business 100% compliant.
          </p>
          <div className="flex flex-wrap justify-center items-center gap-4 pt-4">
            <Link
              href="/contact-us#form"
              className="inline-flex items-center justify-center px-8 py-4 rounded-md bg-[#DEAB3D] hover:bg-[#c9952a] text-white font-semibold text-sm transition-all shadow-xl hover:-translate-y-0.5"
            >
              Book a Free Consultation &rarr;
            </Link>
            <Link
              href="https://wa.me/971508051857"
              target="_blank"
              rel="noopener noreferrer"
              className="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-md bg-white/10 hover:bg-white/20 border border-white/20 text-white font-semibold text-sm transition-all backdrop-blur-sm"
            >
              <MessageCircle className="w-4 h-4 text-emerald-400" />
              <span>WhatsApp Us (+971 50 805 1857)</span>
            </Link>
          </div>
        </div>
      </section>

      {/* Floating WhatsApp Button on Bottom Right */}
      <div className="fixed bottom-6 right-6 z-50 flex items-center gap-2">
        <Link
          href="https://wa.me/971508051857"
          target="_blank"
          rel="noopener noreferrer"
          className="flex items-center gap-2 px-4 py-2.5 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white shadow-2xl transition-all hover:scale-105 font-medium text-xs sm:text-sm"
        >
          <span>Chat with Us</span>
          <div className="w-6 h-6 rounded-full bg-white text-emerald-600 flex items-center justify-center font-bold">
            <MessageCircle className="w-4 h-4 fill-emerald-600 text-white" />
          </div>
        </Link>
      </div>

    </main>
  );
}
