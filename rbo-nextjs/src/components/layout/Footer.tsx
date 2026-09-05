import Link from "next/link";
import Image from "next/image";
import { 
  MapPin, 
  Phone, 
  Mail, 
  Clock, 
  ShieldCheck, 
  MessageCircle, 
  CheckCircle2, 
  ChevronRight,
  Building,
  Award
} from "lucide-react";

export default function Footer() {
  const currentYear = new Date().getFullYear();

  const services = [
    { title: "VAT Registration & Filing", href: "/our-services/vat-registration-filing" },
    { title: "Corporate Tax Advisory", href: "/our-services/corporate-tax" },
    { title: "Bookkeeping & Accounting", href: "/our-services/bookkeeping-and-accounting" },
    { title: "Financial Auditing Services", href: "/our-services/audit-assurance" },
    { title: "Payroll & WPS Compliance", href: "/our-services/payroll" },
    { title: "Virtual CFO Solutions", href: "/our-services/virtual-cfo" },
  ];

  const emirates = [
    { name: "Dubai Mainland & Free Zones", href: "/areas-we-serve/dubai" },
    { name: "Ajman Free Zone (HQ)", href: "/areas-we-serve/ajman" },
    { name: "Abu Dhabi & ADGM", href: "/areas-we-serve/abu-dhabi" },
    { name: "Sharjah & SAIF Zone", href: "/areas-we-serve/sharjah" },
    { name: "Ras Al Khaimah (RAKEZ)", href: "/areas-we-serve/ras-al-khaimah" },
    { name: "Fujairah Free Zone", href: "/areas-we-serve/fujairah" },
    { name: "Umm Al Quwain (UAQ FTZ)", href: "/areas-we-serve/umm-al-quwain" },
  ];

  const quickLinks = [
    { title: "Home", href: "/" },
    { title: "About Us", href: "/about-us" },
    { title: "Our Services", href: "/our-services" },
    { title: "Areas We Serve", href: "/areas-we-serve" },
    { title: "Blog & Tax Guides", href: "/blog" },
    { title: "Contact Us", href: "/contact-us" },
    { title: "Privacy Policy", href: "/privacy-policy" },
    { title: "Terms & Conditions", href: "/terms-and-conditions" },
  ];

  return (
    <footer className="bg-[#0D1B2A] text-[#A1A1A1] border-t border-[#E8B84B]/20">
      {/* Top Advisory Banner */}
      <div className="bg-gradient-to-r from-[#091522] via-[#0D1B2A] to-[#091522] py-8 border-b border-white/5">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-6">
          <div className="flex items-center gap-4 text-center md:text-left">
            <div className="w-12 h-12 rounded-2xl bg-[#E8B84B]/10 border border-[#E8B84B]/30 flex items-center justify-center text-[#E8B84B] shrink-0 mx-auto">
              <ShieldCheck className="w-6 h-6" />
            </div>
            <div>
              <h3 className="font-serif text-lg font-bold text-white">
                Looking for an FTA-Certified Tax Consultant in UAE?
              </h3>
              <p className="text-xs text-gray-400">
                Safeguard your business against AED 10,000+ fines with our zero-penalty guarantee.
              </p>
            </div>
          </div>
          <div className="flex items-center gap-3">
            <Link
              href="https://wa.me/971508051857"
              target="_blank"
              rel="noopener noreferrer"
              className="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs shadow-md transition-all"
            >
              <MessageCircle className="w-4 h-4" />
              <span>WhatsApp +971 50 805 1857</span>
            </Link>
            <Link
              href="/contact-us"
              className="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-[#E8B84B] hover:bg-[#d8a83b] text-[#0D1B2A] font-bold text-xs shadow-md transition-all"
            >
              <span>Book Direct Review</span>
            </Link>
          </div>
        </div>
      </div>

      {/* Main Footer Links */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10">
          
          {/* Col 1: Brand & NAP */}
          <div className="lg:col-span-4 space-y-6">
            <Link href="/" className="flex items-center gap-3 group">
              <div className="relative w-12 h-12 rounded-full overflow-hidden border-2 border-[#E8B84B] bg-white shadow-md">
                <Image
                  src="/images/rbo-logo.jpg"
                  alt="RBO Accounting Services FZE"
                  fill
                  className="object-cover"
                />
              </div>
              <div className="flex flex-col">
                <span className="font-serif text-lg font-bold text-white group-hover:text-[#E8B84B] transition-colors">
                  RBO ACCOUNTING
                </span>
                <span className="text-[10px] tracking-widest text-[#E8B84B] font-semibold uppercase">
                  Services FZE &bull; UAE
                </span>
              </div>
            </Link>

            <p className="text-xs leading-relaxed text-gray-300">
              RBO Accounting Services FZE is a premier accounting, audit, and tax consulting firm headquartered in Ajman Free Zone C1 Building, delivering FTA-compliant VAT filing, Corporate Tax optimization, and IFRS bookkeeping across all 7 UAE Emirates.
            </p>

            <div className="space-y-2.5 pt-2 text-xs">
              <div className="flex items-start gap-3 text-gray-300">
                <MapPin className="w-4 h-4 text-[#E8B84B] shrink-0 mt-0.5" />
                <span>C1 Building, Liwara 1, Ajman Free Zone, Ajman, UAE</span>
              </div>
              <div className="flex items-center gap-3 text-gray-300">
                <Phone className="w-4 h-4 text-[#E8B84B] shrink-0" />
                <a href="tel:+971508051857" className="hover:text-[#E8B84B] transition-colors">+971 50 805 1857</a>
              </div>
              <div className="flex items-center gap-3 text-gray-300">
                <Mail className="w-4 h-4 text-[#E8B84B] shrink-0" />
                <a href="mailto:info@rboaccounting.ae" className="hover:text-[#E8B84B] transition-colors">info@rboaccounting.ae</a>
              </div>
              <div className="flex items-center gap-3 text-gray-300">
                <Clock className="w-4 h-4 text-[#E8B84B] shrink-0" />
                <span>Mon – Fri: 9:00 AM – 6:00 PM</span>
              </div>
            </div>
          </div>

          {/* Col 2: Services */}
          <div className="lg:col-span-3 space-y-4">
            <h4 className="font-serif text-base font-bold text-white border-l-2 border-[#E8B84B] pl-3">
              Core Services
            </h4>
            <ul className="space-y-2 text-xs">
              {services.map((item, idx) => (
                <li key={idx}>
                  <Link
                    href={item.href}
                    className="flex items-center gap-1.5 text-gray-300 hover:text-[#E8B84B] transition-colors"
                  >
                    <ChevronRight className="w-3 h-3 text-[#E8B84B]" />
                    <span>{item.title}</span>
                  </Link>
                </li>
              ))}
            </ul>
          </div>

          {/* Col 3: Emirates */}
          <div className="lg:col-span-3 space-y-4">
            <h4 className="font-serif text-base font-bold text-white border-l-2 border-[#E8B84B] pl-3">
              Areas We Serve
            </h4>
            <ul className="space-y-2 text-xs">
              {emirates.map((e, idx) => (
                <li key={idx}>
                  <Link
                    href={e.href}
                    className="flex items-center gap-1.5 text-gray-300 hover:text-[#E8B84B] transition-colors"
                  >
                    <ChevronRight className="w-3 h-3 text-[#E8B84B]" />
                    <span>{e.name}</span>
                  </Link>
                </li>
              ))}
            </ul>
          </div>

          {/* Col 4: Quick Links */}
          <div className="lg:col-span-2 space-y-4">
            <h4 className="font-serif text-base font-bold text-white border-l-2 border-[#E8B84B] pl-3">
              Quick Links
            </h4>
            <ul className="space-y-2 text-xs">
              {quickLinks.map((ql, idx) => (
                <li key={idx}>
                  <Link
                    href={ql.href}
                    className="flex items-center gap-1.5 text-gray-300 hover:text-[#E8B84B] transition-colors"
                  >
                    <ChevronRight className="w-3 h-3 text-[#E8B84B]" />
                    <span>{ql.title}</span>
                  </Link>
                </li>
              ))}
            </ul>
          </div>

        </div>
      </div>

      {/* Bottom Bar */}
      <div className="bg-[#091522] py-6 border-t border-white/5 text-xs text-gray-400">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
          <p className="text-center sm:text-left font-serif text-gray-300">
            Copyright &copy; {currentYear} <span className="text-[#E8B84B] font-bold">RBO Accounting Services FZE</span>. All rights reserved.
          </p>
          <div className="flex items-center gap-6 text-[11px]">
            <Link href="/privacy-policy" className="hover:text-[#E8B84B] transition-colors">
              Privacy Policy
            </Link>
            <span>&bull;</span>
            <Link href="/terms-and-conditions" className="hover:text-[#E8B84B] transition-colors">
              Terms & Conditions
            </Link>
            <span>&bull;</span>
            <Link href="/sitemap.xml" className="hover:text-[#E8B84B] transition-colors">
              Sitemap
            </Link>
          </div>
        </div>
      </div>
    </footer>
  );
}
