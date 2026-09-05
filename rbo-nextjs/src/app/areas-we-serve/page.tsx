import { Metadata } from "next";
import Link from "next/link";
import { 
  MapPin, 
  Building2, 
  ArrowRight, 
  CheckCircle2, 
  ShieldCheck, 
  Landmark, 
  Globe2, 
  FileCheck2 
} from "lucide-react";
import HeroBanner from "@/components/ui/HeroBanner";
import { emiratesData } from "@/data/locations";
import ContactForm from "@/components/ui/ContactForm";

export const metadata: Metadata = {
  title: "Areas We Serve | Accounting & VAT Services Across 7 UAE Emirates | RBO",
  description: "RBO Accounting Services FZE provides FTA VAT and Corporate Tax compliance across Dubai, Ajman Free Zone, Abu Dhabi, Sharjah, RAK, Fujairah, and Umm Al Quwain.",
  alternates: {
    canonical: "https://www.rboaccounting.ae/areas-we-serve",
  },
};

export default function AreasWeServePage() {
  return (
    <main className="min-h-screen">
      <HeroBanner
        badge="UAE Nationwide Reach"
        title="Accounting & Tax Services Across All 7 Emirates"
        subtitle="Headquartered in Ajman Free Zone C1 Building with seamless on-site and remote tax compliance coverage for Free Zone & Mainland businesses throughout the UAE."
        breadcrumbs={[
          { label: "Home", href: "/" },
          { label: "Areas We Serve" },
        ]}
      />

      {/* Emirates Grid */}
      <section className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center max-w-3xl mx-auto mb-16">
            <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[var(--gold-primary)]/10 text-[var(--gold-dark)] text-xs font-semibold tracking-wider uppercase mb-3">
              Nationwide Compliance
            </div>
            <h2 className="text-3xl sm:text-4xl font-serif font-bold text-[var(--navy-primary)]">
              Local Expertise in Mainland & Free Zone Jurisdictions
            </h2>
            <p className="mt-4 text-gray-600">
              Each Emirate possesses unique economic zones, department of economic development (DED) regulations, and designated free zone rules. Our team ensures flawless tax and accounting compliance tailored to your jurisdiction.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {emiratesData.map((emirate) => (
              <div
                key={emirate.id}
                className="bg-white rounded-3xl p-8 border border-gray-200 shadow-sm hover:border-[var(--gold-primary)] hover:shadow-xl transition-all duration-300 flex flex-col justify-between group"
              >
                <div>
                  <div className="flex items-center justify-between mb-4">
                    <div className="w-12 h-12 rounded-2xl bg-[var(--navy-light)] text-[var(--gold-dark)] flex items-center justify-center group-hover:bg-[var(--gold-primary)] group-hover:text-[var(--navy-primary)] transition-all">
                      <MapPin className="w-6 h-6" />
                    </div>
                    {emirate.isHeadquarters && (
                      <span className="px-3 py-1 rounded-full bg-[var(--gold-primary)]/20 text-[var(--navy-primary)] text-xs font-bold uppercase tracking-wider">
                        Headquarters
                      </span>
                    )}
                  </div>

                  <h3 className="text-2xl font-serif font-bold text-[var(--navy-primary)] mb-2 group-hover:text-[var(--gold-dark)] transition-colors">
                    {emirate.name}
                  </h3>

                  <p className="text-xs font-semibold text-[var(--gold-dark)] mb-4">
                    {emirate.heroTagline}
                  </p>

                  <p className="text-sm text-gray-600 leading-relaxed mb-6 line-clamp-3">
                    {emirate.description}
                  </p>

                  {/* Key Free Zones Chips */}
                  <div className="border-t border-gray-100 pt-4 mb-6">
                    <p className="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">
                      Key Free Zones & Hubs:
                    </p>
                    <div className="flex flex-wrap gap-1.5">
                      {emirate.freeZones.slice(0, 4).map((zone, zIdx) => (
                        <span
                          key={zIdx}
                          className="px-2.5 py-1 rounded-md bg-[var(--navy-light)] text-[var(--navy-primary)] text-xs font-medium"
                        >
                          {zone}
                        </span>
                      ))}
                    </div>
                  </div>
                </div>

                <Link
                  href={`/areas-we-serve/${emirate.slug}`}
                  className="inline-flex items-center justify-between w-full pt-4 border-t border-gray-100 text-xs font-bold text-[var(--navy-primary)] group-hover:text-[var(--gold-dark)] uppercase tracking-wider transition-colors"
                >
                  <span>Explore {emirate.name} Services</span>
                  <ArrowRight className="w-4 h-4 group-hover:translate-x-1 transition-transform" />
                </Link>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Unified UAE Tax Standards */}
      <section className="py-16 bg-[var(--navy-light)] border-y border-gray-200">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div className="p-6 rounded-2xl bg-white border border-gray-200 shadow-sm">
              <Landmark className="w-8 h-8 text-[var(--gold-primary)] mb-4" />
              <h3 className="font-serif font-bold text-lg text-[var(--navy-primary)] mb-2">
                Unified FTA Compliance
              </h3>
              <p className="text-xs text-gray-600 leading-relaxed">
                Whether registered in Abu Dhabi Global Market or Ajman Free Zone, all UAE entities are governed by Federal Tax Authority laws on EmaraTax.
              </p>
            </div>

            <div className="p-6 rounded-2xl bg-white border border-gray-200 shadow-sm">
              <Globe2 className="w-8 h-8 text-[var(--gold-primary)] mb-4" />
              <h3 className="font-serif font-bold text-lg text-[var(--navy-primary)] mb-2">
                Free Zone 0% Tax Optimization
              </h3>
              <p className="text-xs text-gray-600 leading-relaxed">
                We assist Qualifying Free Zone Persons (QFZP) across all 7 Emirates in meeting the strict de minimis and adequate substance requirements to secure 0% Corporate Tax.
              </p>
            </div>

            <div className="p-6 rounded-2xl bg-white border border-gray-200 shadow-sm">
              <FileCheck2 className="w-8 h-8 text-[var(--gold-primary)] mb-4" />
              <h3 className="font-serif font-bold text-lg text-[var(--navy-primary)] mb-2">
                DED License Renewals & Audits
              </h3>
              <p className="text-xs text-gray-600 leading-relaxed">
                Provide licensed audit reports for economic departments across all Emirates to guarantee smooth annual trade license renewals.
              </p>
            </div>
          </div>
        </div>
      </section>

      {/* Contact Section */}
      <section className="py-20 bg-white">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-10">
            <h2 className="text-3xl font-serif font-bold text-[var(--navy-primary)]">
              Connect With Your Local Tax Consultant
            </h2>
            <p className="text-gray-600 mt-2 text-sm">
              Tell us your company jurisdiction (Mainland DED or Free Zone) for personalized advice.
            </p>
          </div>
          <ContactForm />
        </div>
      </section>
    </main>
  );
}
