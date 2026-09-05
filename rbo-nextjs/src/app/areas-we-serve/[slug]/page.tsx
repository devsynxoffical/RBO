import { Metadata } from "next";
import { notFound } from "next/navigation";
import Link from "next/link";
import { 
  MapPin, 
  Building2, 
  CheckCircle2, 
  ShieldCheck, 
  ArrowRight, 
  PhoneCall, 
  Landmark, 
  FileCheck2,
  HelpCircle,
  Building
} from "lucide-react";
import HeroBanner from "@/components/ui/HeroBanner";
import FaqAccordion from "@/components/ui/FaqAccordion";
import ContactForm from "@/components/ui/ContactForm";
import { FaqJsonLd } from "@/components/seo/JsonLd";
import { emiratesData } from "@/data/locations";
import { servicesList } from "@/data/services";

interface Props {
  params: Promise<{
    slug: string;
  }>;
}

export async function generateStaticParams() {
  return emiratesData.map((e) => ({
    slug: e.slug,
  }));
}

export async function generateMetadata({ params }: Props): Promise<Metadata> {
  const { slug } = await params;
  const emirate = emiratesData.find((e) => e.slug === slug);

  if (!emirate) {
    return {
      title: "Emirate Not Found | RBO Accounting Services FZE",
    };
  }

  return {
    title: `Accounting, VAT & Corporate Tax Services in ${emirate.name} | RBO`,
    description: `Expert FTA-compliant accounting, VAT registration, Corporate Tax filing, and audit services for Free Zone and Mainland businesses in ${emirate.name}, UAE.`,
    alternates: {
      canonical: `https://www.rboaccounting.ae/areas-we-serve/${emirate.slug}`,
    },
    openGraph: {
      title: `Accounting & Tax Services in ${emirate.name} | RBO Accounting`,
      description: `FTA VAT & Corporate Tax consulting for businesses in ${emirate.name}, UAE.`,
      url: `https://www.rboaccounting.ae/areas-we-serve/${emirate.slug}`,
      type: "website",
    },
  };
}

export default async function EmirateDetailPage({ params }: Props) {
  const { slug } = await params;
  const emirate = emiratesData.find((e) => e.slug === slug);

  if (!emirate) {
    notFound();
  }

  return (
    <main className="min-h-screen">
      {emirate.faqs && emirate.faqs.length > 0 && (
        <FaqJsonLd faqs={emirate.faqs} />
      )}

      <HeroBanner
        badge={emirate.isHeadquarters ? "RBO Headquarters Location" : "UAE Regional Coverage"}
        title={`Accounting & Tax Services in ${emirate.name}`}
        subtitle={emirate.heroTagline}
        breadcrumbs={[
          { label: "Home", href: "/" },
          { label: "Areas We Serve", href: "/areas-we-serve" },
          { label: emirate.name },
        ]}
      />

      {/* Main Content & Sidebar */}
      <section className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            {/* Left Column: Localized Details */}
            <div className="lg:col-span-8 space-y-12">
              
              {/* Introduction */}
              <div>
                <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[var(--gold-primary)]/10 text-[var(--gold-dark)] text-xs font-semibold tracking-wider uppercase mb-3">
                  Local Tax Compliance
                </div>
                <h2 className="text-2xl sm:text-3xl font-serif font-bold text-[var(--navy-primary)] mb-6">
                  Trusted Financial Advisory for {emirate.name} Businesses
                </h2>
                <div className="prose max-w-none text-gray-700 leading-relaxed text-base space-y-4">
                  {emirate.fullContent.split("\n\n").map((para, pIdx) => (
                    <p key={pIdx}>{para}</p>
                  ))}
                </div>
              </div>

              {/* Free Zones Supported */}
              <div className="p-8 rounded-3xl bg-[var(--navy-light)] border border-gray-200">
                <h3 className="text-xl font-serif font-bold text-[var(--navy-primary)] mb-4 flex items-center gap-2">
                  <Building2 className="w-5 h-5 text-[var(--gold-primary)]" />
                  <span>Key Free Zones & Economic Hubs in {emirate.name}</span>
                </h3>
                <p className="text-sm text-gray-600 mb-6">
                  We support businesses across all major economic jurisdictions in {emirate.name}, ensuring seamless corporate compliance, qualifying 0% tax substantiation, and audited financials.
                </p>
                <div className="grid grid-cols-1 sm:grid-cols-2 gap-3">
                  {emirate.freeZones.map((zone, zIdx) => (
                    <div
                      key={zIdx}
                      className="flex items-center gap-2.5 p-3 rounded-xl bg-white border border-gray-200 text-xs font-semibold text-[var(--navy-primary)] shadow-sm"
                    >
                      <CheckCircle2 className="w-4 h-4 text-[var(--gold-primary)] shrink-0" />
                      <span>{zone}</span>
                    </div>
                  ))}
                </div>
              </div>

              {/* Key Services Offered in this Emirate */}
              <div>
                <h3 className="text-xl sm:text-2xl font-serif font-bold text-[var(--navy-primary)] mb-6">
                  Our Core Services in {emirate.name}
                </h3>
                <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                  {servicesList.map((s) => (
                    <Link
                      key={s.id}
                      href={`/our-services/${s.slug}`}
                      className="p-5 rounded-2xl bg-white border border-gray-200 hover:border-[var(--gold-primary)] hover:shadow-md transition-all group flex flex-col justify-between"
                    >
                      <div>
                        <h4 className="font-bold text-[var(--navy-primary)] text-sm mb-1 group-hover:text-[var(--gold-dark)] transition-colors">
                          {s.title}
                        </h4>
                        <p className="text-xs text-gray-600 line-clamp-2">
                          {s.shortDesc}
                        </p>
                      </div>
                      <div className="mt-3 flex items-center text-xs font-bold text-[var(--navy-primary)] group-hover:text-[var(--gold-dark)] gap-1">
                        <span>Read More</span>
                        <ArrowRight className="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" />
                      </div>
                    </Link>
                  ))}
                </div>
              </div>

              {/* FAQs Accordion */}
              {emirate.faqs && emirate.faqs.length > 0 && (
                <div>
                  <h3 className="text-2xl font-serif font-bold text-[var(--navy-primary)] mb-6">
                    Frequently Asked Questions for {emirate.name}
                  </h3>
                  <FaqAccordion items={emirate.faqs} />
                </div>
              )}
            </div>

            {/* Right Column: Sidebar Navigation & CTA */}
            <div className="lg:col-span-4 space-y-8">
              
              {/* All Emirates Navigation */}
              <div className="bg-[var(--navy-light)] p-6 rounded-3xl border border-gray-200 shadow-sm">
                <h4 className="font-serif font-bold text-lg text-[var(--navy-primary)] mb-4">
                  Areas We Serve
                </h4>
                <div className="space-y-2">
                  {emiratesData.map((e) => {
                    const isCurrent = e.slug === emirate.slug;
                    return (
                      <Link
                        key={e.id}
                        href={`/areas-we-serve/${e.slug}`}
                        className={`flex items-center justify-between p-3 rounded-xl text-sm font-medium transition-all ${
                          isCurrent
                            ? "bg-[var(--navy-primary)] text-[var(--gold-light)] shadow-md"
                            : "bg-white text-gray-700 hover:bg-[var(--gold-primary)]/10 hover:text-[var(--navy-primary)] border border-gray-100"
                        }`}
                      >
                        <div className="flex items-center gap-2">
                          <MapPin className="w-4 h-4 text-[var(--gold-primary)]" />
                          <span>{e.name}</span>
                        </div>
                        <ArrowRight className="w-4 h-4" />
                      </Link>
                    );
                  })}
                </div>
              </div>

              {/* Direct WhatsApp Callout */}
              <div className="bg-gradient-to-br from-[var(--navy-primary)] to-[var(--navy-secondary)] text-white p-6 rounded-3xl border border-[var(--gold-primary)]/20 shadow-xl">
                <div className="w-12 h-12 rounded-2xl bg-[var(--gold-primary)] text-[var(--navy-primary)] flex items-center justify-center mb-4">
                  <PhoneCall className="w-6 h-6" />
                </div>
                <h4 className="font-serif font-bold text-lg text-white mb-2">
                  {emirate.name} Tax Assistance
                </h4>
                <p className="text-xs text-gray-300 leading-relaxed mb-6">
                  Need an immediate tax health check or trade license audit certificate in {emirate.name}?
                </p>
                <div className="space-y-3">
                  <Link
                    href="https://wa.me/971508051857"
                    target="_blank"
                    rel="noopener noreferrer"
                    className="w-full inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs transition-colors shadow-md"
                  >
                    <span>WhatsApp (+971 50 805 1857)</span>
                  </Link>
                  <Link
                    href="/contact-us"
                    className="w-full inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold text-xs border border-white/20 transition-colors"
                  >
                    <span>Book Consultation</span>
                  </Link>
                </div>
              </div>

              {/* Headquarters Info */}
              <div className="p-6 rounded-3xl bg-white border border-gray-200">
                <h4 className="font-bold text-sm text-[var(--navy-primary)] mb-3 flex items-center gap-2">
                  <Building className="w-4 h-4 text-[var(--gold-primary)]" />
                  <span>Head Office Address</span>
                </h4>
                <p className="text-xs text-gray-600 leading-relaxed">
                  RBO Accounting Services FZE<br />
                  Ajman Free Zone C1 Building<br />
                  Ajman, United Arab Emirates
                </p>
                <p className="text-xs text-gray-500 mt-2">
                  Providing full digital and on-site accounting support for all {emirate.name} entities.
                </p>
              </div>

            </div>

          </div>
        </div>
      </section>

      {/* Booking Form */}
      <section className="py-20 bg-[var(--navy-light)] border-t border-gray-200">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-10">
            <h2 className="text-3xl font-serif font-bold text-[var(--navy-primary)]">
              Schedule Your {emirate.name} Consultation
            </h2>
            <p className="text-gray-600 mt-2 text-sm">
              Connect with our senior consultants for comprehensive accounting and tax solutions.
            </p>
          </div>
          <ContactForm />
        </div>
      </section>
    </main>
  );
}
