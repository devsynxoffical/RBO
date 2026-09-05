import { Metadata } from "next";
import Link from "next/link";
import { 
  MapPin, 
  Phone, 
  Mail, 
  Clock, 
  MessageCircle, 
  CheckCircle2, 
  Building2, 
  ShieldCheck 
} from "lucide-react";
import HeroBanner from "@/components/ui/HeroBanner";
import ContactForm from "@/components/ui/ContactForm";

export const metadata: Metadata = {
  title: "Contact Us | RBO Accounting Services FZE - UAE Tax Consultation",
  description: "Get in touch with RBO Accounting Services FZE. Visit our office at Ajman Free Zone C1 Building or call/WhatsApp +971 50 805 1857 for FTA VAT & Corporate Tax advice.",
  alternates: {
    canonical: "https://www.rboaccounting.ae/contact-us",
  },
};

export default function ContactUsPage() {
  const contactDetails = [
    {
      icon: MapPin,
      title: "Headquarters Office",
      lines: [
        "RBO Accounting Services FZE",
        "Ajman Free Zone C1 Building, Office Suite",
        "Ajman, United Arab Emirates",
      ],
      action: {
        label: "Get Directions",
        href: "https://maps.google.com/?q=Ajman+Free+Zone+C1+Building",
      },
    },
    {
      icon: Phone,
      title: "Direct Phone & Mobile",
      lines: [
        "+971 50 805 1857",
        "+971 52 387 1857",
      ],
      action: {
        label: "Call Now",
        href: "tel:+971508051857",
      },
    },
    {
      icon: Mail,
      title: "Email Inquiries",
      lines: [
        "info@rboaccounting.ae",
        "support@rboaccounting.ae",
      ],
      action: {
        label: "Send an Email",
        href: "mailto:info@rboaccounting.ae",
      },
    },
    {
      icon: Clock,
      title: "Working Hours",
      lines: [
        "Monday – Friday: 9:00 AM – 6:00 PM",
        "Saturday: 10:00 AM – 3:00 PM",
        "Sunday: Closed",
      ],
      action: {
        label: "WhatsApp 24/7 Support",
        href: "https://wa.me/971508051857",
      },
    },
  ];

  return (
    <main className="min-h-screen">
      <HeroBanner
        badge="Get in Touch"
        title="Contact Our UAE Tax & Accounting Team"
        subtitle="Schedule a free VAT compliance review or discuss your Corporate Tax filing with our certified chartered accountants."
        breadcrumbs={[
          { label: "Home", href: "/" },
          { label: "Contact Us" },
        ]}
      />

      {/* Contact Cards Grid */}
      <section className="py-16 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {contactDetails.map((item, idx) => {
              const Icon = item.icon;
              return (
                <div
                  key={idx}
                  className="bg-[var(--navy-light)] p-8 rounded-2xl border border-gray-200 flex flex-col justify-between hover:border-[var(--gold-primary)] hover:shadow-lg transition-all"
                >
                  <div>
                    <div className="w-12 h-12 rounded-xl bg-[var(--navy-primary)] text-[var(--gold-primary)] flex items-center justify-center mb-5">
                      <Icon className="w-6 h-6" />
                    </div>
                    <h3 className="font-serif font-bold text-lg text-[var(--navy-primary)] mb-3">
                      {item.title}
                    </h3>
                    <div className="space-y-1 text-sm text-gray-600 mb-6">
                      {item.lines.map((l, lIdx) => (
                        <p key={lIdx}>{l}</p>
                      ))}
                    </div>
                  </div>

                  <Link
                    href={item.action.href}
                    target={item.action.href.startsWith("http") ? "_blank" : undefined}
                    rel={item.action.href.startsWith("http") ? "noopener noreferrer" : undefined}
                    className="inline-flex items-center text-xs font-bold text-[var(--gold-dark)] hover:text-[var(--navy-primary)] transition-colors uppercase tracking-wider gap-1"
                  >
                    <span>{item.action.label}</span>
                    <span>&rarr;</span>
                  </Link>
                </div>
              );
            })}
          </div>
        </div>
      </section>

      {/* Main Form & Map Section */}
      <section className="py-16 bg-[var(--navy-light)] border-t border-gray-200">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-12">
            {/* Left Col - Consultation Details */}
            <div className="lg:col-span-5 space-y-6">
              <div>
                <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[var(--gold-primary)]/10 text-[var(--gold-dark)] text-xs font-semibold tracking-wider uppercase mb-3">
                  Direct Advisory
                </div>
                <h2 className="text-3xl font-serif font-bold text-[var(--navy-primary)] leading-tight">
                  Let’s Safeguard Your Business Against FTA Penalties
                </h2>
                <p className="mt-3 text-gray-700 text-sm leading-relaxed">
                  Whether you require an immediate FTA VAT audit check, Corporate Tax return review, backlogged bookkeeping cleanup, or company liquidation financial certificates, we respond promptly.
                </p>
              </div>

              {/* Trust Badges */}
              <div className="space-y-4 pt-4">
                <div className="flex items-start gap-3 p-4 rounded-xl bg-white border border-gray-200 shadow-sm">
                  <ShieldCheck className="w-6 h-6 text-[var(--gold-primary)] shrink-0 mt-0.5" />
                  <div>
                    <h4 className="font-bold text-[var(--navy-primary)] text-sm">Strict Confidentiality (NDA)</h4>
                    <p className="text-xs text-gray-600 mt-0.5">All corporate books, trade licenses, and tax records are strictly protected under UAE privacy laws.</p>
                  </div>
                </div>

                <div className="flex items-start gap-3 p-4 rounded-xl bg-white border border-gray-200 shadow-sm">
                  <Building2 className="w-6 h-6 text-[var(--gold-primary)] shrink-0 mt-0.5" />
                  <div>
                    <h4 className="font-bold text-[var(--navy-primary)] text-sm">Free Zone & Mainland Specialists</h4>
                    <p className="text-xs text-gray-600 mt-0.5">Qualified Free Zone Persons (0% tax) & Mainland LLC compliance handled seamlessly.</p>
                  </div>
                </div>

                <div className="flex items-start gap-3 p-4 rounded-xl bg-white border border-gray-200 shadow-sm">
                  <MessageCircle className="w-6 h-6 text-emerald-600 shrink-0 mt-0.5" />
                  <div>
                    <h4 className="font-bold text-[var(--navy-primary)] text-sm">Instant WhatsApp Consultation</h4>
                    <p className="text-xs text-gray-600 mt-0.5">Chat directly with an expert consultant at +971 50 805 1857.</p>
                  </div>
                </div>
              </div>

              {/* Direct WhatsApp Callout */}
              <div className="p-6 rounded-2xl bg-gradient-to-r from-emerald-600 to-teal-700 text-white shadow-lg">
                <h3 className="font-bold text-lg mb-1">Need Urgent FTA Tax Assistance?</h3>
                <p className="text-emerald-100 text-xs mb-4">
                  Avoid missing return deadlines or incurring late submission penalties.
                </p>
                <Link
                  href="https://wa.me/971508051857"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white text-emerald-800 font-bold text-xs hover:bg-emerald-50 transition-all shadow-md"
                >
                  <MessageCircle className="w-4 h-4 text-emerald-600" />
                  <span>Start WhatsApp Chat</span>
                </Link>
              </div>
            </div>

            {/* Right Col - Contact Form */}
            <div className="lg:col-span-7">
              <ContactForm />
            </div>
          </div>
        </div>
      </section>

      {/* Map Embed Section */}
      <section className="py-12 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="rounded-3xl overflow-hidden border border-gray-200 shadow-md">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115291.68832587522!2d55.421689255018694!3d25.41249767215328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ef5f7a08b5e2837%3A0xe56c07dc17bfa4ba!2sAjman%20Free%20Zone!5e0!3m2!1sen!2sae!4v1715000000000!5m2!1sen!2sae"
              width="100%"
              height="400"
              style={{ border: 0 }}
              allowFullScreen={false}
              loading="lazy"
              referrerPolicy="no-referrer-when-downgrade"
              title="RBO Accounting Services FZE Location Map"
              className="w-full"
            />
          </div>
        </div>
      </section>
    </main>
  );
}
