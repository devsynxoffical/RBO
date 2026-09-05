"use client";

import { useState, useEffect } from "react";
import Link from "next/link";
import Image from "next/image";
import { usePathname } from "next/navigation";
import { 
  ChevronDown, 
  Phone, 
  Mail, 
  MapPin, 
  Menu, 
  X, 
  MessageCircle, 
  Calculator, 
  Receipt, 
  FileSpreadsheet, 
  Search, 
  Users2, 
  LineChart 
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

  const serviceLinks = [
    { title: "VAT Registration & Filing", href: "/our-services/vat-registration-filing", icon: Calculator, desc: "Mandatory/Voluntary VAT, quarterly returns & FTA audits" },
    { title: "UAE Corporate Tax", href: "/our-services/corporate-tax", icon: Receipt, desc: "9% Corporate Tax returns, 0% Free Zone QFZP & Small Business Relief" },
    { title: "Bookkeeping & Accounting", href: "/our-services/bookkeeping-and-accounting", icon: FileSpreadsheet, desc: "IFRS ledger maintenance, reconciliation & monthly reports" },
    { title: "Financial Auditing & Assurance", href: "/our-services/audit-assurance", icon: Search, desc: "Statutory Free Zone renewals & internal compliance audits" },
    { title: "Payroll & WPS Compliance", href: "/our-services/payroll", icon: Users2, desc: "MOHRE WPS processing, payroll slips & gratuity calculation" },
    { title: "Virtual CFO Services", href: "/our-services/virtual-cfo", icon: LineChart, desc: "Cash flow modeling, executive budgets & strategic advisory" },
  ];

  const emirateLinks = [
    { name: "Dubai", href: "/areas-we-serve/dubai", note: "DMCC, DIFC, JAFZA, Mainland" },
    { name: "Ajman (Headquarters)", href: "/areas-we-serve/ajman", note: "AFZ C1 Building & Mainland" },
    { name: "Abu Dhabi", href: "/areas-we-serve/abu-dhabi", note: "ADGM, KEZAD & Mainland" },
    { name: "Sharjah", href: "/areas-we-serve/sharjah", note: "SAIF Zone & Hamriyah" },
    { name: "Ras Al Khaimah", href: "/areas-we-serve/ras-al-khaimah", note: "RAKEZ & Mainland" },
    { name: "Fujairah", href: "/areas-we-serve/fujairah", note: "FFZA & Logistics Hub" },
    { name: "Umm Al Quwain", href: "/areas-we-serve/umm-al-quwain", note: "UAQ FTZ & SMEs" },
  ];

  return (
    <header className="sticky top-0 z-50 w-full transition-all duration-300">
      {/* Top Bar */}
      <div className="bg-[#091522] text-[#A1A1A1] text-xs py-2 px-4 sm:px-6 lg:px-8 border-b border-[#E8B84B]/15">
        <div className="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-3">
          <div className="flex flex-wrap items-center gap-4 sm:gap-6">
            <span className="flex items-center gap-1.5 text-gray-300">
              <MapPin className="w-3.5 h-3.5 text-[#E8B84B]" />
              <span>Ajman Free Zone C1 Building, UAE</span>
            </span>
            <Link
              href="tel:+971508051857"
              className="flex items-center gap-1.5 text-gray-300 hover:text-[#E8B84B] transition-colors"
            >
              <Phone className="w-3.5 h-3.5 text-[#E8B84B]" />
              <span>+971 50 805 1857</span>
            </Link>
            <Link
              href="mailto:info@rboaccounting.ae"
              className="hidden md:flex items-center gap-1.5 text-gray-300 hover:text-[#E8B84B] transition-colors"
            >
              <Mail className="w-3.5 h-3.5 text-[#E8B84B]" />
              <span>info@rboaccounting.ae</span>
            </Link>
          </div>

          <div className="flex items-center gap-4">
            <span className="hidden sm:inline text-xs text-[#E8B84B] font-semibold bg-[#E8B84B]/10 px-2.5 py-0.5 rounded-full border border-[#E8B84B]/20">
              FTA Certified Tax Agency
            </span>
            <Link
              href="https://wa.me/971508051857"
              target="_blank"
              rel="noopener noreferrer"
              className="inline-flex items-center gap-1 text-emerald-400 hover:text-emerald-300 transition-colors font-medium"
            >
              <MessageCircle className="w-3.5 h-3.5" />
              <span>WhatsApp Us</span>
            </Link>
          </div>
        </div>
      </div>

      {/* Main Navigation Bar */}
      <nav
        className={`bg-[#0D1B2A] transition-all duration-300 border-b border-[#E8B84B]/20 ${
          isScrolled ? "shadow-2xl py-2" : "py-3"
        }`}
      >
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex items-center justify-between">
            {/* Logo */}
            <Link href="/" className="flex items-center gap-3 group shrink-0">
              <div className="relative w-12 h-12 rounded-full overflow-hidden border-2 border-[#E8B84B] shadow-md bg-white">
                <Image
                  src="/images/rbo-logo.jpg"
                  alt="RBO Accounting Services FZE Logo"
                  fill
                  className="object-cover"
                  priority
                />
              </div>
              <div className="flex flex-col">
                <span className="font-serif text-lg sm:text-xl font-bold tracking-wide text-white group-hover:text-[#E8B84B] transition-colors">
                  RBO ACCOUNTING
                </span>
                <span className="text-[10px] tracking-widest text-[#E8B84B] font-semibold uppercase">
                  Services FZE &bull; UAE
                </span>
              </div>
            </Link>

            {/* Desktop Navigation Links */}
            <div className="hidden lg:flex items-center space-x-1 xl:space-x-2">
              <Link
                href="/"
                className={`px-3 py-2 text-sm font-medium rounded-lg transition-colors ${
                  pathname === "/"
                    ? "text-[#E8B84B] font-bold"
                    : "text-gray-200 hover:text-[#E8B84B] hover:bg-white/5"
                }`}
              >
                Home
              </Link>

              <Link
                href="/about-us"
                className={`px-3 py-2 text-sm font-medium rounded-lg transition-colors ${
                  pathname === "/about-us"
                    ? "text-[#E8B84B] font-bold"
                    : "text-gray-200 hover:text-[#E8B84B] hover:bg-white/5"
                }`}
              >
                About Us
              </Link>

              {/* Services Dropdown */}
              <div className="relative group">
                <Link
                  href="/our-services"
                  className={`inline-flex items-center gap-1 px-3 py-2 text-sm font-medium rounded-lg transition-colors ${
                    pathname.startsWith("/our-services")
                      ? "text-[#E8B84B] font-bold"
                      : "text-gray-200 hover:text-[#E8B84B] hover:bg-white/5"
                  }`}
                >
                  <span>Our Services</span>
                  <ChevronDown className="w-4 h-4 group-hover:rotate-180 transition-transform duration-200" />
                </Link>

                <div className="absolute left-0 mt-1 w-96 rounded-2xl bg-[#0D1B2A] border border-[#E8B84B]/30 shadow-2xl p-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                  <div className="space-y-1">
                    {serviceLinks.map((item, idx) => {
                      const Icon = item.icon;
                      return (
                        <Link
                          key={idx}
                          href={item.href}
                          className="flex items-start gap-3 p-2.5 rounded-xl hover:bg-[#E8B84B]/10 transition-colors group/item"
                        >
                          <div className="w-8 h-8 rounded-lg bg-[#E8B84B]/20 text-[#E8B84B] flex items-center justify-center shrink-0 mt-0.5 group-hover/item:bg-[#E8B84B] group-hover/item:text-[#0D1B2A] transition-colors">
                            <Icon className="w-4 h-4" />
                          </div>
                          <div>
                            <div className="text-xs font-bold text-white group-hover/item:text-[#E8B84B] transition-colors">
                              {item.title}
                            </div>
                            <div className="text-[11px] text-gray-400 line-clamp-1">
                              {item.desc}
                            </div>
                          </div>
                        </Link>
                      );
                    })}
                  </div>
                  <div className="mt-2 pt-2 border-t border-white/10 text-center">
                    <Link
                      href="/our-services"
                      className="text-xs font-bold text-[#E8B84B] hover:underline"
                    >
                      View All Services &rarr;
                    </Link>
                  </div>
                </div>
              </div>

              {/* Areas We Serve Dropdown */}
              <div className="relative group">
                <Link
                  href="/areas-we-serve"
                  className={`inline-flex items-center gap-1 px-3 py-2 text-sm font-medium rounded-lg transition-colors ${
                    pathname.startsWith("/areas-we-serve")
                      ? "text-[#E8B84B] font-bold"
                      : "text-gray-200 hover:text-[#E8B84B] hover:bg-white/5"
                  }`}
                >
                  <span>Areas We Serve</span>
                  <ChevronDown className="w-4 h-4 group-hover:rotate-180 transition-transform duration-200" />
                </Link>

                <div className="absolute left-0 mt-1 w-72 rounded-2xl bg-[#0D1B2A] border border-[#E8B84B]/30 shadow-2xl p-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                  <div className="space-y-1">
                    {emirateLinks.map((e, idx) => (
                      <Link
                        key={idx}
                        href={e.href}
                        className="flex flex-col p-2 rounded-xl hover:bg-[#E8B84B]/10 transition-colors"
                      >
                        <span className="text-xs font-bold text-white hover:text-[#E8B84B]">
                          {e.name}
                        </span>
                        <span className="text-[10px] text-gray-400">
                          {e.note}
                        </span>
                      </Link>
                    ))}
                  </div>
                </div>
              </div>

              <Link
                href="/blog"
                className={`px-3 py-2 text-sm font-medium rounded-lg transition-colors ${
                  pathname.startsWith("/blog")
                    ? "text-[#E8B84B] font-bold"
                    : "text-gray-200 hover:text-[#E8B84B] hover:bg-white/5"
                }`}
              >
                Blog
              </Link>

              <Link
                href="/contact-us"
                className={`px-3 py-2 text-sm font-medium rounded-lg transition-colors ${
                  pathname === "/contact-us"
                    ? "text-[#E8B84B] font-bold"
                    : "text-gray-200 hover:text-[#E8B84B] hover:bg-white/5"
                }`}
              >
                Contact Us
              </Link>
            </div>

            {/* Header Right Action Button */}
            <div className="hidden lg:flex items-center gap-3">
              <Link
                href="/contact-us"
                className="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-[#E8B84B] hover:bg-[#d8a83b] text-[#0D1B2A] font-bold text-xs uppercase tracking-wider transition-all shadow-lg hover:shadow-xl hover:scale-105"
              >
                <span>Free Consultation</span>
              </Link>
            </div>

            {/* Mobile Menu Toggle */}
            <button
              onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
              className="lg:hidden p-2 rounded-xl text-gray-300 hover:text-white hover:bg-white/10"
              aria-label="Toggle navigation menu"
            >
              {mobileMenuOpen ? <X className="w-6 h-6" /> : <Menu className="w-6 h-6" />}
            </button>
          </div>
        </div>

        {/* Mobile Slide-down Menu */}
        {mobileMenuOpen && (
          <div className="lg:hidden bg-[#0D1B2A] border-t border-[#E8B84B]/20 px-4 py-6 space-y-4 max-h-[85vh] overflow-y-auto">
            <Link
              href="/"
              className="block text-base font-semibold text-white hover:text-[#E8B84B] py-2 border-b border-white/5"
            >
              Home
            </Link>
            <Link
              href="/about-us"
              className="block text-base font-semibold text-white hover:text-[#E8B84B] py-2 border-b border-white/5"
            >
              About Us
            </Link>

            {/* Mobile Services Accordion */}
            <div>
              <button
                onClick={() => setServicesOpen(!servicesOpen)}
                className="w-full flex items-center justify-between text-base font-semibold text-white hover:text-[#E8B84B] py-2 border-b border-white/5"
              >
                <span>Our Services</span>
                <ChevronDown className={`w-4 h-4 transition-transform ${servicesOpen ? "rotate-180" : ""}`} />
              </button>
              {servicesOpen && (
                <div className="pl-4 py-2 space-y-2">
                  {serviceLinks.map((s, idx) => (
                    <Link
                      key={idx}
                      href={s.href}
                      className="block text-sm text-gray-300 hover:text-[#E8B84B] py-1.5"
                    >
                      {s.title}
                    </Link>
                  ))}
                </div>
              )}
            </div>

            {/* Mobile Areas Accordion */}
            <div>
              <button
                onClick={() => setAreasOpen(!areasOpen)}
                className="w-full flex items-center justify-between text-base font-semibold text-white hover:text-[#E8B84B] py-2 border-b border-white/5"
              >
                <span>Areas We Serve</span>
                <ChevronDown className={`w-4 h-4 transition-transform ${areasOpen ? "rotate-180" : ""}`} />
              </button>
              {areasOpen && (
                <div className="pl-4 py-2 space-y-2">
                  {emirateLinks.map((e, idx) => (
                    <Link
                      key={idx}
                      href={e.href}
                      className="block text-sm text-gray-300 hover:text-[#E8B84B] py-1.5"
                    >
                      {e.name}
                    </Link>
                  ))}
                </div>
              )}
            </div>

            <Link
              href="/blog"
              className="block text-base font-semibold text-white hover:text-[#E8B84B] py-2 border-b border-white/5"
            >
              Blog & Tax Guides
            </Link>

            <Link
              href="/contact-us"
              className="block text-base font-semibold text-white hover:text-[#E8B84B] py-2 border-b border-white/5"
            >
              Contact Us
            </Link>

            <div className="pt-4 space-y-3">
              <Link
                href="/contact-us"
                className="w-full inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-[#E8B84B] text-[#0D1B2A] font-bold text-sm text-center"
              >
                Book Free Consultation
              </Link>
              <Link
                href="https://wa.me/971508051857"
                target="_blank"
                rel="noopener noreferrer"
                className="w-full inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-emerald-600 text-white font-bold text-sm text-center"
              >
                <MessageCircle className="w-4 h-4" />
                <span>WhatsApp (+971 50 805 1857)</span>
              </Link>
            </div>
          </div>
        )}
      </nav>
    </header>
  );
}
