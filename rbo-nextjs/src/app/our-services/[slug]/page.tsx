import { Metadata } from "next";
import { notFound } from "next/navigation";
import Link from "next/link";
import { 
  Calculator, 
  Receipt, 
  FileSpreadsheet, 
  Search, 
  Users2, 
  LineChart, 
  CheckCircle2, 
  ShieldCheck, 
  Clock, 
  ArrowRight, 
  PhoneCall, 
  FileText,
  FileCheck2,
  Building
} from "lucide-react";
import HeroBanner from "@/components/ui/HeroBanner";
import FaqAccordion from "@/components/ui/FaqAccordion";
import ContactForm from "@/components/ui/ContactForm";
import { FaqJsonLd, ServiceJsonLd } from "@/components/seo/JsonLd";
import { servicesList } from "@/data/services";

interface Props {
  params: Promise<{
    slug: string;
  }>;
}

const iconMap: Record<string, any> = {
  Calculator,
  Receipt,
  FileSpreadsheet,
  Search,
  Users2,
  LineChart,
};

export async function generateStaticParams() {
  return servicesList.map((s) => ({
    slug: s.slug,
  }));
}

export async function generateMetadata({ params }: Props): Promise<Metadata> {
  const { slug } = await params;
  const service = servicesList.find((s) => s.slug === slug);

  if (!service) {
    return {
      title: "Service Not Found | RBO Accounting Services FZE",
    };
  }

  return {
    title: `${service.title} | RBO Accounting Services FZE`,
    description: service.shortDesc,
    alternates: {
      canonical: `https://www.rboaccounting.ae/our-services/${service.slug}`,
    },
    openGraph: {
      title: `${service.title} | RBO Accounting Services FZE UAE`,
      description: service.shortDesc,
      url: `https://www.rboaccounting.ae/our-services/${service.slug}`,
      type: "website",
    },
  };
}

export default async function ServiceDetailPage({ params }: Props) {
  const { slug } = await params;
  const service = servicesList.find((s) => s.slug === slug);

  if (!service) {
    notFound();
  }

  const Icon = iconMap[service.icon] || Calculator;

  return (
    <main className="min-h-screen bg-[#0D1B2A] text-white">
      <ServiceJsonLd
        name={service.title}
        description={service.shortDesc}
        url={`https://www.rboaccounting.ae/our-services/${service.slug}`}
      />
      {service.faqs && service.faqs.length > 0 && (
        <FaqJsonLd faqs={service.faqs} />
      )}

      <HeroBanner
        badge="UAE Financial & Tax Services"
        title={service.title}
        subtitle={service.shortDesc}
        breadcrumbs={[
          { label: "Home", href: "/" },
          { label: "Our Services", href: "/our-services" },
          { label: service.title },
        ]}
      />

      {/* Main Content & Sidebar */}
      <section className="py-20 bg-[#0D1B2A] border-b border-[#E8B84B]/15">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            {/* Left Column: Details & Subservices */}
            <div className="lg:col-span-8 space-y-12">
              
              {/* Comprehensive Overview */}
              <div>
                <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#E8B84B]/15 text-[#E8B84B] text-xs font-semibold tracking-wider uppercase mb-3 border border-[#E8B84B]/30">
                  Service Overview
                </div>
                <h2 className="text-2xl sm:text-3xl font-serif font-bold text-white mb-6">
                  Expert {service.title} for UAE Businesses
                </h2>
                <div className="prose prose-invert max-w-none text-gray-300 leading-relaxed text-sm space-y-4">
                  {service.fullContent.split("\n\n").map((para, pIdx) => (
                    <p key={pIdx}>{para}</p>
                  ))}
                </div>
              </div>

              {/* Sub-Services Grid */}
              <div>
                <h3 className="text-xl sm:text-2xl font-serif font-bold text-white mb-6">
                  What We Offer in {service.title}
                </h3>
                <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                  {service.subServices.map((sub, sIdx) => (
                    <div
                      key={sIdx}
                      className="p-6 rounded-2xl bg-[#091522] border border-[#E8B84B]/20 hover:border-[#E8B84B] hover:shadow-xl transition-all group"
                    >
                      <div className="w-10 h-10 rounded-xl bg-[#E8B84B]/10 text-[#E8B84B] flex items-center justify-center mb-4 group-hover:scale-105 transition-transform">
                        <CheckCircle2 className="w-5 h-5" />
                      </div>
                      <h4 className="font-bold text-white text-base mb-2 group-hover:text-[#E8B84B] transition-colors">
                        {sub.title}
                      </h4>
                      <p className="text-xs text-gray-400 leading-relaxed">
                        {sub.shortDesc || sub.fullDesc}
                      </p>
                    </div>
                  ))}
                </div>
              </div>

              {/* Regulatory Highlights / Features */}
              <div className="bg-[#112233] text-white p-8 rounded-3xl border border-[#E8B84B]/30 relative overflow-hidden">
                <div className="absolute top-0 right-0 w-48 h-48 bg-[#E8B84B]/10 rounded-full blur-3xl -z-0" />
                <h3 className="text-xl font-serif font-bold text-white mb-4 relative z-10">
                  Why Choose RBO for {service.title}?
                </h3>
                <div className="grid grid-cols-1 sm:grid-cols-2 gap-4 relative z-10">
                  {service.highlights.map((h, hIdx) => (
                    <div key={hIdx} className="flex items-start gap-3">
                      <ShieldCheck className="w-5 h-5 text-[#E8B84B] shrink-0 mt-0.5" />
                      <span className="text-xs text-gray-300 font-medium">{h}</span>
                    </div>
                  ))}
                </div>
              </div>

              {/* FAQs Accordion */}
              {service.faqs && service.faqs.length > 0 && (
                <div>
                  <h3 className="text-2xl font-serif font-bold text-white mb-6">
                    Frequently Asked Questions
                  </h3>
                  <FaqAccordion items={service.faqs} />
                </div>
              )}
            </div>

            {/* Right Column: Sidebar Navigation & CTA */}
            <div className="lg:col-span-4 space-y-8">
              
              {/* All Services Navigation */}
              <div className="bg-[#091522] p-6 rounded-3xl border border-[#E8B84B]/20 shadow-xl">
                <h4 className="font-serif font-bold text-lg text-white mb-4 border-l-2 border-[#E8B84B] pl-3">
                  Our Complete Services
                </h4>
                <div className="space-y-2">
                  {servicesList.map((s) => {
                    const isCurrent = s.slug === service.slug;
                    return (
                      <Link
                        key={s.id}
                        href={`/our-services/${s.slug}`}
                        className={`flex items-center justify-between p-3 rounded-xl text-xs font-semibold transition-all ${
                          isCurrent
                            ? "bg-[#E8B84B] text-[#0D1B2A] shadow-md font-bold"
                            : "bg-[#0D1B2A] text-gray-300 hover:bg-[#E8B84B]/10 hover:text-[#E8B84B] border border-white/5"
                        }`}
                      >
                        <span>{s.title}</span>
                        <ArrowRight className="w-3.5 h-3.5" />
                      </Link>
                    );
                  })}
                </div>
              </div>

              {/* Urgent Help Callout */}
              <div className="bg-gradient-to-br from-[#112233] to-[#091522] text-white p-6 rounded-3xl border border-[#E8B84B]/30 shadow-xl">
                <div className="w-12 h-12 rounded-2xl bg-[#E8B84B] text-[#0D1B2A] flex items-center justify-center mb-4">
                  <PhoneCall className="w-6 h-6" />
                </div>
                <h4 className="font-serif font-bold text-lg text-white mb-2">
                  Speak With an FTA Tax Agent
                </h4>
                <p className="text-xs text-gray-300 leading-relaxed mb-6">
                  Get personalized guidance regarding your trade license, VAT thresholds, or Corporate Tax filing status today.
                </p>
                <div className="space-y-3">
                  <Link
                    href="https://wa.me/971508051857"
                    target="_blank"
                    rel="noopener noreferrer"
                    className="w-full inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs transition-colors shadow-md"
                  >
                    <span>Chat on WhatsApp (+971 50 805 1857)</span>
                  </Link>
                  <Link
                    href="/contact-us"
                    className="w-full inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold text-xs border border-white/20 transition-colors"
                  >
                    <span>Request Callback</span>
                  </Link>
                </div>
              </div>

              {/* NAP Location Info Card */}
              <div className="p-6 rounded-3xl bg-[#091522] border border-white/10">
                <h4 className="font-bold text-xs text-white mb-3 flex items-center gap-2 uppercase tracking-wider">
                  <Building className="w-4 h-4 text-[#E8B84B]" />
                  <span>Headquarters Office</span>
                </h4>
                <p className="text-xs text-gray-400 leading-relaxed">
                  RBO Accounting Services FZE<br />
                  Ajman Free Zone C1 Building<br />
                  Ajman, United Arab Emirates
                </p>
                <p className="text-xs text-[#E8B84B] font-semibold mt-3">
                  Serving All 7 Emirates (Dubai, Abu Dhabi, Sharjah, Ajman, RAK, Fujairah, UAQ)
                </p>
              </div>

            </div>

          </div>
        </div>
      </section>

      {/* Booking Form */}
      <section className="py-20 bg-[#091522]">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-10">
            <h2 className="text-3xl font-serif font-bold text-white">
              Get Started with {service.title}
            </h2>
            <p className="text-gray-400 mt-2 text-xs sm:text-sm">
              Submit your details below and an RBO tax specialist will reach out with a tailored quotation and checklist.
            </p>
          </div>
          <ContactForm />
        </div>
      </section>
    </main>
  );
}
