import React from "react";
import Link from "next/link";
import Image from "next/image";
import { MapPin, Phone, Mail, Clock, ShieldCheck } from "lucide-react";

export default function Footer() {
  return (
    <footer className="bg-slate-950 text-slate-300 pt-16 pb-12 border-t border-slate-800">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-slate-800">
          
          {/* Column 1: Company Profile */}
          <div className="lg:col-span-2 space-y-4">
            <div className="relative w-44 h-14 flex items-center bg-white/5 p-2 rounded-lg">
              <Image
                src="/images/logo.svg"
                alt="RBO Accounting Services FZE"
                width={170}
                height={50}
                className="object-contain filter brightness-0 invert"
              />
            </div>
            <p className="text-sm text-slate-400 leading-relaxed pr-4">
              RBO Accounting Services FZE is an FTA-registered tax agency and accounting firm based in Ajman Free Zone. We deliver precision bookkeeping, VAT filing, Corporate Tax management, and statutory audit support across all seven Emirates.
            </p>
            <div className="flex items-center gap-2 text-xs text-amber-400 pt-2 font-medium">
              <ShieldCheck className="w-4 h-4" />
              <span>FTA Certified Tax Agency • Ajman Free Zone Registered</span>
            </div>
          </div>

          {/* Column 2: Core Services */}
          <div>
            <h3 className="text-sm font-semibold uppercase tracking-wider text-white mb-4">
              Our Services
            </h3>
            <ul className="space-y-2.5 text-sm">
              <li>
                <Link href="/our-services/vat-registration-filing" className="hover:text-amber-400 transition-colors">
                  VAT Registration & Filing
                </Link>
              </li>
              <li>
                <Link href="/our-services/corporate-tax" className="hover:text-amber-400 transition-colors">
                  Corporate Tax (0% & 9%)
                </Link>
              </li>
              <li>
                <Link href="/our-services/bookkeeping-and-accounting" className="hover:text-amber-400 transition-colors">
                  Bookkeeping & Accounting
                </Link>
              </li>
              <li>
                <Link href="/our-services/audit-assurance" className="hover:text-amber-400 transition-colors">
                  Audit & Assurance
                </Link>
              </li>
              <li>
                <Link href="/our-services/payroll" className="hover:text-amber-400 transition-colors">
                  Payroll & WPS Compliance
                </Link>
              </li>
              <li>
                <Link href="/our-services/virtual-cfo" className="hover:text-amber-400 transition-colors">
                  Virtual CFO Advisory
                </Link>
              </li>
            </ul>
          </div>

          {/* Column 3: UAE Locations */}
          <div>
            <h3 className="text-sm font-semibold uppercase tracking-wider text-white mb-4">
              Areas We Serve
            </h3>
            <ul className="space-y-2.5 text-sm">
              <li>
                <Link href="/areas-we-serve/dubai" className="hover:text-amber-400 transition-colors">
                  Dubai (Mainland & Free Zones)
                </Link>
              </li>
              <li>
                <Link href="/areas-we-serve/ajman" className="hover:text-amber-400 transition-colors">
                  Ajman (Headquarters)
                </Link>
              </li>
              <li>
                <Link href="/areas-we-serve/abu-dhabi" className="hover:text-amber-400 transition-colors">
                  Abu Dhabi & ADGM
                </Link>
              </li>
              <li>
                <Link href="/areas-we-serve/sharjah" className="hover:text-amber-400 transition-colors">
                  Sharjah & SAIF Zone
                </Link>
              </li>
              <li>
                <Link href="/areas-we-serve/ras-al-khaimah" className="hover:text-amber-400 transition-colors">
                  Ras Al Khaimah & RAKEZ
                </Link>
              </li>
              <li>
                <Link href="/areas-we-serve/fujairah" className="hover:text-amber-400 transition-colors">
                  Fujairah
                </Link>
              </li>
              <li>
                <Link href="/areas-we-serve/umm-al-quwain" className="hover:text-amber-400 transition-colors">
                  Umm Al Quwain
                </Link>
              </li>
            </ul>
          </div>

          {/* Column 4: Contact & Office */}
          <div>
            <h3 className="text-sm font-semibold uppercase tracking-wider text-white mb-4">
              Get in Touch
            </h3>
            <ul className="space-y-3 text-sm text-slate-400">
              <li className="flex items-start gap-2.5">
                <MapPin className="w-4 h-4 text-amber-500 shrink-0 mt-0.5" />
                <span>C1 Building, Liwara 1, Ajman Free Zone, Ajman, UAE</span>
              </li>
              <li className="flex items-center gap-2.5">
                <Phone className="w-4 h-4 text-amber-500 shrink-0" />
                <a href="tel:+971508051857" className="hover:text-white transition-colors">
                  +971 50 805 1857
                </a>
              </li>
              <li className="flex items-center gap-2.5">
                <Mail className="w-4 h-4 text-amber-500 shrink-0" />
                <a href="mailto:info@rboaccounting.ae" className="hover:text-white transition-colors">
                  info@rboaccounting.ae
                </a>
              </li>
              <li className="flex items-center gap-2.5">
                <Clock className="w-4 h-4 text-amber-500 shrink-0" />
                <span>Mon - Sat: 9:00 AM - 6:00 PM</span>
              </li>
            </ul>
          </div>
        </div>

        {/* Bottom Bar */}
        <div className="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-4">
          <p>© {new Date().getFullYear()} RBO Accounting Services FZE. All Rights Reserved.</p>
          <div className="flex items-center space-x-6">
            <Link href="/privacy-policy" className="hover:text-slate-400 transition-colors">
              Privacy Policy
            </Link>
            <Link href="/terms-and-conditions" className="hover:text-slate-400 transition-colors">
              Terms of Service
            </Link>
            <Link href="/sitemap.xml" className="hover:text-slate-400 transition-colors">
              Sitemap
            </Link>
          </div>
        </div>
      </div>
    </footer>
  );
}
