"use client";

import React, { useState, useEffect } from "react";
import Link from "next/link";
import Image from "next/image";
import { ChevronDown, Menu, X, Phone, MessageSquare } from "lucide-react";

export default function Navbar() {
  const [isOpen, setIsOpen] = useState(false);
  const [servicesOpen, setServicesOpen] = useState(false);
  const [locationsOpen, setLocationsOpen] = useState(false);
  const [isScrolled, setIsScrolled] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 20);
    };
    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  return (
    <header className={`sticky top-0 z-50 transition-all duration-300 ${isScrolled ? "bg-white shadow-md py-2" : "bg-white/95 backdrop-blur-sm py-3 border-b border-slate-100"}`}>
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex items-center justify-between h-16">
          {/* Logo */}
          <Link href="/" className="flex items-center gap-3">
            <div className="relative w-40 h-12 flex items-center">
              <Image
                src="/images/logo.svg"
                alt="RBO Accounting Services FZE"
                width={160}
                height={48}
                priority
                className="object-contain"
              />
            </div>
          </Link>

          {/* Desktop Navigation */}
          <nav className="hidden lg:flex items-center space-x-7 text-sm font-medium text-slate-800">
            <Link href="/" className="hover:text-amber-600 transition-colors">
              Home
            </Link>
            <Link href="/about-us" className="hover:text-amber-600 transition-colors">
              About Us
            </Link>

            {/* Our Services Dropdown */}
            <div
              className="relative group py-2"
              onMouseEnter={() => setServicesOpen(true)}
              onMouseLeave={() => setServicesOpen(false)}
            >
              <Link
                href="/our-services"
                className="flex items-center gap-1 hover:text-amber-600 transition-colors"
              >
                Our Services
                <ChevronDown className="w-4 h-4 transition-transform group-hover:rotate-180 text-slate-500" />
              </Link>
              {servicesOpen && (
                <div className="absolute left-0 mt-1 w-72 bg-white rounded-xl shadow-xl border border-slate-100 py-3 z-50 animate-in fade-in duration-200">
                  <Link
                    href="/our-services/vat-registration-filing"
                    className="block px-4 py-2.5 text-sm hover:bg-amber-50/70 hover:text-amber-800 transition-colors"
                  >
                    <div className="font-semibold text-slate-900">VAT Registration & Filing</div>
                    <div className="text-xs text-slate-500">Thresholds, returns & FTA audits</div>
                  </Link>
                  <Link
                    href="/our-services/corporate-tax"
                    className="block px-4 py-2.5 text-sm hover:bg-amber-50/70 hover:text-amber-800 transition-colors"
                  >
                    <div className="font-semibold text-slate-900">Corporate Tax Services</div>
                    <div className="text-xs text-slate-500">0% / 9% returns & Small Business Relief</div>
                  </Link>
                  <Link
                    href="/our-services/bookkeeping-and-accounting"
                    className="block px-4 py-2.5 text-sm hover:bg-amber-50/70 hover:text-amber-800 transition-colors"
                  >
                    <div className="font-semibold text-slate-900">Bookkeeping & Accounting</div>
                    <div className="text-xs text-slate-500">Monthly accounts & reconciliations</div>
                  </Link>
                  <Link
                    href="/our-services/audit-assurance"
                    className="block px-4 py-2.5 text-sm hover:bg-amber-50/70 hover:text-amber-800 transition-colors"
                  >
                    <div className="font-semibold text-slate-900">Audit & Assurance</div>
                    <div className="text-xs text-slate-500">Free zone renewal & statutory audits</div>
                  </Link>
                  <Link
                    href="/our-services/payroll"
                    className="block px-4 py-2.5 text-sm hover:bg-amber-50/70 hover:text-amber-800 transition-colors"
                  >
                    <div className="font-semibold text-slate-900">Payroll & WPS Compliance</div>
                    <div className="text-xs text-slate-500">MOHRE SIF files & EOSB calculations</div>
                  </Link>
                  <Link
                    href="/our-services/virtual-cfo"
                    className="block px-4 py-2.5 text-sm hover:bg-amber-50/70 hover:text-amber-800 transition-colors"
                  >
                    <div className="font-semibold text-slate-900">Virtual CFO Advisory</div>
                    <div className="text-xs text-slate-500">Strategic budgeting & cash flow modeling</div>
                  </Link>
                </div>
              )}
            </div>

            {/* Areas We Serve Dropdown */}
            <div
              className="relative group py-2"
              onMouseEnter={() => setLocationsOpen(true)}
              onMouseLeave={() => setLocationsOpen(false)}
            >
              <Link
                href="/areas-we-serve"
                className="flex items-center gap-1 hover:text-amber-600 transition-colors"
              >
                Areas We Serve
                <ChevronDown className="w-4 h-4 transition-transform group-hover:rotate-180 text-slate-500" />
              </Link>
              {locationsOpen && (
                <div className="absolute left-0 mt-1 w-56 bg-white rounded-xl shadow-xl border border-slate-100 py-2 z-50 animate-in fade-in duration-200">
                  <Link href="/areas-we-serve/dubai" className="block px-4 py-2 text-sm text-slate-700 hover:bg-amber-50 hover:text-amber-800">
                    Dubai
                  </Link>
                  <Link href="/areas-we-serve/ajman" className="block px-4 py-2 text-sm text-slate-700 hover:bg-amber-50 hover:text-amber-800">
                    Ajman (HQ Base)
                  </Link>
                  <Link href="/areas-we-serve/abu-dhabi" className="block px-4 py-2 text-sm text-slate-700 hover:bg-amber-50 hover:text-amber-800">
                    Abu Dhabi
                  </Link>
                  <Link href="/areas-we-serve/sharjah" className="block px-4 py-2 text-sm text-slate-700 hover:bg-amber-50 hover:text-amber-800">
                    Sharjah
                  </Link>
                  <Link href="/areas-we-serve/ras-al-khaimah" className="block px-4 py-2 text-sm text-slate-700 hover:bg-amber-50 hover:text-amber-800">
                    Ras Al Khaimah
                  </Link>
                  <Link href="/areas-we-serve/fujairah" className="block px-4 py-2 text-sm text-slate-700 hover:bg-amber-50 hover:text-amber-800">
                    Fujairah
                  </Link>
                  <Link href="/areas-we-serve/umm-al-quwain" className="block px-4 py-2 text-sm text-slate-700 hover:bg-amber-50 hover:text-amber-800">
                    Umm Al Quwain
                  </Link>
                </div>
              )}
            </div>

            <Link href="/blog" className="hover:text-amber-600 transition-colors">
              Blog
            </Link>
            <Link href="/contact-us" className="hover:text-amber-600 transition-colors">
              Contact Us
            </Link>
          </nav>

          {/* Header Action Button */}
          <div className="hidden lg:flex items-center gap-3">
            <Link
              href="/contact-us"
              className="bg-amber-500 hover:bg-amber-400 text-slate-950 font-semibold px-5 py-2.5 rounded-lg shadow-sm hover:shadow transition-all text-sm flex items-center gap-1.5"
            >
              Free VAT Check
            </Link>
          </div>

          {/* Mobile Menu Button */}
          <div className="flex lg:hidden items-center gap-2">
            <Link
              href="/contact-us"
              className="bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold px-3 py-1.5 rounded-md text-xs whitespace-nowrap"
            >
              Free VAT Check
            </Link>
            <button
              onClick={() => setIsOpen(!isOpen)}
              className="p-2 rounded-md text-slate-700 hover:text-slate-950 hover:bg-slate-100 focus:outline-none"
              aria-label="Toggle Menu"
            >
              {isOpen ? <X className="w-6 h-6" /> : <Menu className="w-6 h-6" />}
            </button>
          </div>
        </div>
      </div>

      {/* Mobile Drawer Menu */}
      {isOpen && (
        <div className="lg:hidden bg-white border-b border-slate-200 px-4 pt-2 pb-6 space-y-3">
          <Link
            href="/"
            onClick={() => setIsOpen(false)}
            className="block py-2 text-base font-medium text-slate-800 hover:text-amber-600"
          >
            Home
          </Link>
          <Link
            href="/about-us"
            onClick={() => setIsOpen(false)}
            className="block py-2 text-base font-medium text-slate-800 hover:text-amber-600"
          >
            About Us
          </Link>
          <div className="py-2">
            <div className="text-base font-semibold text-slate-900 mb-1">Our Services</div>
            <div className="pl-3 space-y-1.5 text-sm text-slate-600">
              <Link href="/our-services/vat-registration-filing" onClick={() => setIsOpen(false)} className="block py-1">
                VAT Registration & Filing
              </Link>
              <Link href="/our-services/corporate-tax" onClick={() => setIsOpen(false)} className="block py-1">
                Corporate Tax Services
              </Link>
              <Link href="/our-services/bookkeeping-and-accounting" onClick={() => setIsOpen(false)} className="block py-1">
                Bookkeeping & Accounting
              </Link>
              <Link href="/our-services/audit-assurance" onClick={() => setIsOpen(false)} className="block py-1">
                Audit & Assurance
              </Link>
              <Link href="/our-services/payroll" onClick={() => setIsOpen(false)} className="block py-1">
                Payroll & WPS
              </Link>
              <Link href="/our-services/virtual-cfo" onClick={() => setIsOpen(false)} className="block py-1">
                Virtual CFO
              </Link>
            </div>
          </div>
          <div className="py-2">
            <div className="text-base font-semibold text-slate-900 mb-1">Areas We Serve</div>
            <div className="pl-3 grid grid-cols-2 gap-1.5 text-sm text-slate-600">
              <Link href="/areas-we-serve/dubai" onClick={() => setIsOpen(false)} className="block py-1">
                Dubai
              </Link>
              <Link href="/areas-we-serve/ajman" onClick={() => setIsOpen(false)} className="block py-1">
                Ajman
              </Link>
              <Link href="/areas-we-serve/abu-dhabi" onClick={() => setIsOpen(false)} className="block py-1">
                Abu Dhabi
              </Link>
              <Link href="/areas-we-serve/sharjah" onClick={() => setIsOpen(false)} className="block py-1">
                Sharjah
              </Link>
              <Link href="/areas-we-serve/ras-al-khaimah" onClick={() => setIsOpen(false)} className="block py-1">
                Ras Al Khaimah
              </Link>
              <Link href="/areas-we-serve/fujairah" onClick={() => setIsOpen(false)} className="block py-1">
                Fujairah
              </Link>
              <Link href="/areas-we-serve/umm-al-quwain" onClick={() => setIsOpen(false)} className="block py-1">
                Umm Al Quwain
              </Link>
            </div>
          </div>
          <Link
            href="/blog"
            onClick={() => setIsOpen(false)}
            className="block py-2 text-base font-medium text-slate-800 hover:text-amber-600"
          >
            Blog & Tax Insights
          </Link>
          <Link
            href="/contact-us"
            onClick={() => setIsOpen(false)}
            className="block py-2 text-base font-medium text-slate-800 hover:text-amber-600"
          >
            Contact Us
          </Link>
        </div>
      )}
    </header>
  );
}
