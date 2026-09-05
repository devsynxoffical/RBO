"use client";

import { useState, useEffect } from "react";
import Link from "next/link";
import Image from "next/image";
import { usePathname } from "next/navigation";
import { 
  ChevronDown, 
  Menu, 
  X, 
  Calculator, 
  Receipt, 
  FileSpreadsheet, 
  Search, 
  Users2, 
  LineChart,
  MessageCircle
} from "lucide-react";

export default function Navbar() {
  const [isScrolled, setIsScrolled] = useState(false);
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);
  const [servicesOpen, setServicesOpen] = useState(false);
  const [areasOpen, setAreasOpen] = useState(false);
  const pathname = usePathname();

  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 20);
    };
    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  // Close mobile menu on route change
  useEffect(() => {
    setMobileMenuOpen(false);
    setServicesOpen(false);
    setAreasOpen(false);
  }, [pathname]);

  const serviceCategories = [
    {
      title: "Accounting Services",
      href: "/our-services/accounting",
      subItems: [
        { title: "Bookkeeping and Accounting", href: "/our-services/accounting/bookkeeping-and-accounting" },
        { title: "Bank Reconciliation Services", href: "/our-services/accounting/bank-reconciliation" },
        { title: "Accounts Payable and Receivable", href: "/our-services/accounting/accounts-payable-and-receivable" },
        { title: "IFRS Compliance Services", href: "/our-services/accounting/ifrs-compliance" },
        { title: "Financial Reporting Service", href: "/our-services/accounting/financial-reporting" },
      ]
    },
    {
      title: "VAT Registration & Filing UAE",
      href: "/our-services/vat-registration-filing",
      subItems: [
        { title: "VAT Registration", href: "/our-services/vat-registration-filing/registration" },
        { title: "VAT Return Filing", href: "/our-services/vat-registration-filing" },
        { title: "VAT Refund Services", href: "/our-services/vat-registration-filing" },
        { title: "VAT Advisory Services", href: "/our-services/vat-registration-filing" },
        { title: "FTA Audit Assistance", href: "/our-services/vat-registration-filing" },
        { title: "FTA Records Amendment", href: "/our-services/vat-registration-filing" },
        { title: "VAT Penalty Reconsideration", href: "/our-services/vat-registration-filing/penalty-reconsideration" },
      ]
    },
    {
      title: "Corporate Tax UAE",
      href: "/our-services/corporate-tax",
      subItems: [
        { title: "Corporate Tax Registration", href: "/our-services/corporate-tax/registration" },
        { title: "Corporate Tax Return Filing", href: "/our-services/corporate-tax/return-filing" },
        { title: "Corporate Tax Planning", href: "/our-services/corporate-tax/corporate-tax-planning" },
        { title: "Transfer Pricing UAE", href: "/our-services/corporate-tax/transfer-pricing" },
      ]
    },
    {
      title: "Payroll Services Dubai & UAE",
      href: "/our-services/payroll",
      subItems: [
        { title: "WPS Payroll Services", href: "/our-services/payroll/wps" },
        { title: "End of Service Benefits Calculation", href: "/our-services/payroll/end-of-service-benefits-calculation" },
        { title: "Payroll Reporting Services", href: "/our-services/payroll" },
        { title: "Employee Leave Management", href: "/our-services/payroll/employee-leave-management" },
      ]
    },
    {
      title: "Audit & Assurance Services UAE",
      href: "/our-services/audit-assurance",
      subItems: [
        { title: "Free Zone Audit UAE", href: "/our-services/audit-assurance/free-zone-audit" },
        { title: "Statutory Audit Services UAE", href: "/our-services/audit-assurance/statutory-audit" },
        { title: "Internal Audit Services UAE", href: "/our-services/audit-assurance/internal-audit" },
        { title: "Due Diligence Services UAE", href: "/our-services/audit-assurance/due-diligence" },
        { title: "Risk Assessment Services UAE", href: "/our-services/audit-assurance/risk-assessment" },
      ]
    },
    {
      title: "Virtual CFO Services",
      href: "/our-services/virtual-cfo",
      subItems: [
        { title: "Business Advisory Services UAE", href: "/our-services/virtual-cfo/business-advisory" },
        { title: "Financial Planning & Analysis", href: "/our-services/virtual-cfo/financial-planning-and-analysis" },
        { title: "Budgeting Services for Businesses", href: "/our-services/virtual-cfo/budgeting" },
        { title: "Management Reporting Services", href: "/our-services/virtual-cfo/management-reporting" },
        { title: "Cash Flow Management Services", href: "/our-services/virtual-cfo/cash-flow-management" },
      ]
    }
  ];

  const emirates = [
    { name: "Accounting Consulting Firm in Dubai", href: "/areas-we-serve/dubai" },
    { name: "Accounting Consulting Firm in Abu Dhabi", href: "/areas-we-serve/abu-dhabi" },
    { name: "Accounting Consulting Firm in Sharjah", href: "/areas-we-serve/sharjah" },
    { name: "Accounting Consulting Firm in Fujairah", href: "/areas-we-serve/fujairah" },
    { name: "Accounting Consulting Firm in Ajman", href: "/areas-we-serve/ajman" },
    { name: "Accounting Consulting Firm in Umm Al Quwain", href: "/areas-we-serve/umm-al-quwain" },
    { name: "Accounting Consulting Firm in Ras Al Khaimah", href: "/areas-we-serve/ras-al-khaimah" },
  ];

  return (
    <header className="sticky top-0 z-50 w-full bg-white shadow-sm transition-all duration-300">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex items-center justify-between h-20 sm:h-24">
          
          {/* Logo - Standalone Gold Monogram matching download-1.png */}
          <Link href="/" className="flex items-center shrink-0">
            <div className="relative w-28 sm:w-36 h-16 sm:h-20">
              <Image
                src="/images/download-1.png"
                alt="RBO Accounting Services FZE"
                fill
                className="object-contain object-left"
                priority
              />
            </div>
          </Link>

          {/* Desktop Navigation Links */}
          <nav className="hidden lg:flex items-center space-x-6 xl:space-x-8">
            <Link
              href="/"
              className={`text-[15px] font-semibold transition-colors ${
                pathname === "/"
                  ? "text-[#E8B84B]"
                  : "text-[#09203B] hover:text-[#E8B84B]"
              }`}
            >
              Home
            </Link>

            <Link
              href="/about-us"
              className={`text-[15px] font-semibold transition-colors ${
                pathname === "/about-us"
                  ? "text-[#E8B84B]"
                  : "text-[#09203B] hover:text-[#E8B84B]"
              }`}
            >
              About Us
            </Link>

            {/* Services Dropdown */}
            <div className="relative group">
              <Link
                href="/our-services"
                className={`inline-flex items-center gap-1.5 text-[15px] font-semibold transition-colors py-6 ${
                  pathname.startsWith("/our-services")
                    ? "text-[#E8B84B]"
                    : "text-[#09203B] hover:text-[#E8B84B]"
                }`}
              >
                <span>Our Services</span>
                <ChevronDown className="w-4 h-4 transition-transform duration-200 group-hover:rotate-180" />
              </Link>

              {/* Mega Dropdown Menu */}
              <div className="absolute left-1/2 -translate-x-1/2 top-full w-[780px] bg-[#09203B] text-white rounded-xl shadow-2xl p-6 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 border border-white/10">
                <div className="grid grid-cols-3 gap-6">
                  {serviceCategories.map((cat, idx) => (
                    <div key={idx} className="space-y-2">
                      <Link
                        href={cat.href}
                        className="block text-xs font-bold uppercase tracking-wider text-[#E8B84B] hover:underline"
                      >
                        {cat.title}
                      </Link>
                      <ul className="space-y-1">
                        {cat.subItems.map((sub, sIdx) => (
                          <li key={sIdx}>
                            <Link
                              href={sub.href}
                              className="block text-[13px] text-gray-300 hover:text-[#E8B84B] hover:translate-x-1 transition-all py-0.5"
                            >
                              {sub.title}
                            </Link>
                          </li>
                        ))}
                      </ul>
                    </div>
                  ))}
                </div>
                <div className="mt-4 pt-4 border-t border-white/10 flex justify-between items-center text-xs">
                  <span className="text-gray-400">FTA Certified Tax Agency &amp; Accounting Services</span>
                  <Link href="/our-services" className="font-bold text-[#E8B84B] hover:underline">
                    View All Services &rarr;
                  </Link>
                </div>
              </div>
            </div>

            {/* Areas We Serve Dropdown */}
            <div className="relative group">
              <Link
                href="/areas-we-serve"
                className={`inline-flex items-center gap-1.5 text-[15px] font-semibold transition-colors py-6 ${
                  pathname.startsWith("/areas-we-serve")
                    ? "text-[#E8B84B]"
                    : "text-[#09203B] hover:text-[#E8B84B]"
                }`}
              >
                <span>Areas We Serve</span>
                <ChevronDown className="w-4 h-4 transition-transform duration-200 group-hover:rotate-180" />
              </Link>

              <div className="absolute left-0 top-full w-72 bg-[#09203B] text-white rounded-xl shadow-2xl p-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 border border-white/10">
                <div className="space-y-1">
                  {emirates.map((em, idx) => (
                    <Link
                      key={idx}
                      href={em.href}
                      className="block px-3 py-2 text-[13px] text-gray-200 hover:bg-[#E8B84B] hover:text-[#09203B] rounded-lg transition-colors font-medium"
                    >
                      {em.name}
                    </Link>
                  ))}
                </div>
              </div>
            </div>

            <Link
              href="/blog"
              className={`text-[15px] font-semibold transition-colors ${
                pathname.startsWith("/blog")
                  ? "text-[#E8B84B]"
                  : "text-[#09203B] hover:text-[#E8B84B]"
              }`}
            >
              Blog
            </Link>

            <Link
              href="/contact-us"
              className={`text-[15px] font-semibold transition-colors ${
                pathname === "/contact-us"
                  ? "text-[#E8B84B]"
                  : "text-[#09203B] hover:text-[#E8B84B]"
              }`}
            >
              Contact Us
            </Link>
          </nav>

          {/* Right Action Button - Free VAT Check */}
          <div className="hidden lg:flex items-center">
            <Link
              href="/contact-us#form"
              className="inline-flex items-center justify-center px-6 py-3 rounded-lg bg-[#E8B84B] hover:bg-[#09203B] text-white font-semibold text-sm transition-all duration-200 shadow-md hover:-translate-y-0.5"
            >
              Free VAT Check
            </Link>
          </div>

          {/* Mobile Menu Button */}
          <div className="flex lg:hidden items-center gap-3">
            <Link
              href="/contact-us#form"
              className="px-3 py-1.5 rounded-lg bg-[#E8B84B] text-white text-xs font-semibold"
            >
              Free VAT Check
            </Link>
            <button
              onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
              className="p-2 text-[#09203B] hover:text-[#E8B84B] rounded-lg focus:outline-none"
              aria-label="Toggle navigation menu"
            >
              {mobileMenuOpen ? <X className="w-7 h-7" /> : <Menu className="w-7 h-7" />}
            </button>
          </div>
        </div>
      </div>

      {/* Mobile Drawer Menu */}
      {mobileMenuOpen && (
        <div className="lg:hidden bg-white border-t border-gray-100 px-6 py-6 space-y-4 shadow-xl max-h-[85vh] overflow-y-auto">
          <Link
            href="/"
            className="block text-base font-semibold text-[#09203B] hover:text-[#E8B84B] py-2 border-b border-gray-100"
          >
            Home
          </Link>
          <Link
            href="/about-us"
            className="block text-base font-semibold text-[#09203B] hover:text-[#E8B84B] py-2 border-b border-gray-100"
          >
            About Us
          </Link>

          {/* Mobile Services Accordion */}
          <div>
            <button
              onClick={() => setServicesOpen(!servicesOpen)}
              className="w-full flex items-center justify-between text-base font-semibold text-[#09203B] hover:text-[#E8B84B] py-2 border-b border-gray-100"
            >
              <span>Our Services</span>
              <ChevronDown className={`w-4 h-4 transition-transform ${servicesOpen ? "rotate-180" : ""}`} />
            </button>
            {servicesOpen && (
              <div className="pl-4 py-2 space-y-3">
                {serviceCategories.map((cat, idx) => (
                  <div key={idx} className="space-y-1">
                    <Link
                      href={cat.href}
                      className="block text-sm font-bold text-[#E8B84B]"
                    >
                      {cat.title}
                    </Link>
                    <div className="pl-2 space-y-1">
                      {cat.subItems.map((sub, sIdx) => (
                        <Link
                          key={sIdx}
                          href={sub.href}
                          className="block text-xs text-gray-600 hover:text-[#09203B] py-0.5"
                        >
                          {sub.title}
                        </Link>
                      ))}
                    </div>
                  </div>
                ))}
              </div>
            )}
          </div>

          {/* Mobile Areas Accordion */}
          <div>
            <button
              onClick={() => setAreasOpen(!areasOpen)}
              className="w-full flex items-center justify-between text-base font-semibold text-[#09203B] hover:text-[#E8B84B] py-2 border-b border-gray-100"
            >
              <span>Areas We Serve</span>
              <ChevronDown className={`w-4 h-4 transition-transform ${areasOpen ? "rotate-180" : ""}`} />
            </button>
            {areasOpen && (
              <div className="pl-4 py-2 space-y-2">
                {emirates.map((em, idx) => (
                  <Link
                    key={idx}
                    href={em.href}
                    className="block text-xs text-gray-600 hover:text-[#09203B] py-1"
                  >
                    {em.name}
                  </Link>
                ))}
              </div>
            )}
          </div>

          <Link
            href="/blog"
            className="block text-base font-semibold text-[#09203B] hover:text-[#E8B84B] py-2 border-b border-gray-100"
          >
            Blog
          </Link>

          <Link
            href="/contact-us"
            className="block text-base font-semibold text-[#09203B] hover:text-[#E8B84B] py-2 border-b border-gray-100"
          >
            Contact Us
          </Link>

          <div className="pt-4 space-y-3">
            <Link
              href="/contact-us#form"
              className="w-full inline-flex items-center justify-center py-3 px-4 rounded-lg bg-[#E8B84B] text-white font-bold text-sm text-center shadow"
            >
              Free VAT Check
            </Link>
            <Link
              href="https://wa.me/971508051857"
              target="_blank"
              rel="noopener noreferrer"
              className="w-full inline-flex items-center justify-center gap-2 py-3 px-4 rounded-lg bg-emerald-600 text-white font-bold text-sm text-center shadow"
            >
              <MessageCircle className="w-4 h-4" />
              <span>WhatsApp (+971 50 805 1857)</span>
            </Link>
          </div>
        </div>
      )}
    </header>
  );
}

