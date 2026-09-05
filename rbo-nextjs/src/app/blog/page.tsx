import { Metadata } from "next";
import Link from "next/link";
import Image from "next/image";
import { 
  Calendar, 
  Clock, 
  User, 
  ArrowRight, 
  FileText, 
  Tag,
  ShieldCheck,
  TrendingUp
} from "lucide-react";
import HeroBanner from "@/components/ui/HeroBanner";
import { blogPosts } from "@/data/posts";

export const metadata: Metadata = {
  title: "UAE Tax & Accounting Insights & Guides (2026) | RBO Accounting",
  description: "Read in-depth guides on UAE VAT registration thresholds, Corporate Tax 2026 deadlines, Small Business Relief, and FTA compliance by RBO Accounting Services FZE.",
  alternates: {
    canonical: "https://www.rboaccounting.ae/blog",
  },
};

export default function BlogArchivePage() {
  return (
    <main className="min-h-screen bg-[#0D1B2A] text-white">
      <HeroBanner
        badge="UAE Fiscal Intelligence"
        title="Tax Guides, VAT Insights & Compliance News"
        subtitle="Authoritative, in-depth analysis on UAE Federal Tax Authority (FTA) regulations, Cabinet Decisions, Corporate Tax rates, and bookkeeping best practices for 2026."
        breadcrumbs={[
          { label: "Home", href: "/" },
          { label: "Blog & Guides" },
        ]}
      />

      {/* Blog Grid Section */}
      <section className="py-20 bg-[#0D1B2A] border-b border-[#E8B84B]/15">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          
          <div className="grid grid-cols-1 md:grid-cols-2 gap-10">
            {blogPosts.map((post) => (
              <article
                key={post.id}
                className="bg-[#091522] rounded-3xl border border-[#E8B84B]/20 overflow-hidden shadow-xl hover:border-[#E8B84B] hover:shadow-2xl transition-all duration-300 flex flex-col group"
              >
                {/* Image Container */}
                <div className="relative aspect-[16/9] w-full overflow-hidden bg-slate-900">
                  <Image
                    src={post.featuredImage}
                    alt={post.title}
                    fill
                    className="object-cover group-hover:scale-105 transition-transform duration-500"
                    priority
                  />
                  <div className="absolute top-4 left-4">
                    <span className="px-3.5 py-1.5 rounded-full bg-[#0D1B2A]/90 backdrop-blur-md text-[#E8B84B] text-xs font-bold uppercase tracking-wider border border-[#E8B84B]/30">
                      {post.category}
                    </span>
                  </div>
                </div>

                {/* Content Container */}
                <div className="p-8 flex flex-col flex-1 justify-between">
                  <div>
                    {/* Meta info */}
                    <div className="flex items-center gap-4 text-xs text-gray-400 mb-4 flex-wrap">
                      <span className="flex items-center gap-1.5 font-medium">
                        <Calendar className="w-3.5 h-3.5 text-[#E8B84B]" />
                        {post.date}
                      </span>
                      <span className="flex items-center gap-1.5 font-medium">
                        <Clock className="w-3.5 h-3.5 text-[#E8B84B]" />
                        {post.readTime}
                      </span>
                      <span className="flex items-center gap-1.5 font-medium">
                        <User className="w-3.5 h-3.5 text-[#E8B84B]" />
                        {post.author}
                      </span>
                    </div>

                    <h2 className="text-2xl font-serif font-bold text-white mb-4 group-hover:text-[#E8B84B] transition-colors leading-tight">
                      <Link href={`/blog/${post.slug}`}>
                        {post.title}
                      </Link>
                    </h2>

                    <p className="text-xs text-gray-300 leading-relaxed mb-6">
                      {post.excerpt}
                    </p>
                  </div>

                  {/* Read More Link */}
                  <div className="pt-6 border-t border-white/10 flex items-center justify-between">
                    <Link
                      href={`/blog/${post.slug}`}
                      className="inline-flex items-center gap-2 text-xs font-bold text-[#E8B84B] group-hover:text-white uppercase tracking-wider transition-colors"
                    >
                      <span>Read Complete Guide</span>
                      <ArrowRight className="w-4 h-4 group-hover:translate-x-1 transition-transform" />
                    </Link>

                    <span className="text-xs font-semibold text-emerald-400 bg-emerald-950/60 px-3 py-1 rounded-full border border-emerald-500/30">
                      Updated for 2026
                    </span>
                  </div>
                </div>
              </article>
            ))}
          </div>

        </div>
      </section>

      {/* Newsletter / Tax Advisory Banner */}
      <section className="py-16 bg-[#091522]">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <div className="w-12 h-12 rounded-2xl bg-[#E8B84B] text-[#0D1B2A] flex items-center justify-center mx-auto mb-4">
            <TrendingUp className="w-6 h-6" />
          </div>
          <h3 className="text-2xl font-serif font-bold text-white mb-2">
            Stay Ahead of UAE Tax Law Amendments
          </h3>
          <p className="text-gray-400 text-xs sm:text-sm max-w-xl mx-auto mb-6">
            Get actionable UAE tax updates, FTA decision summaries, and compliance alerts directly from RBO chartered accountants.
          </p>
          <Link
            href="https://wa.me/971508051857"
            target="_blank"
            rel="noopener noreferrer"
            className="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-[#E8B84B] text-[#0D1B2A] font-bold text-xs uppercase tracking-wider hover:bg-[#d8a83b] transition-all shadow-md"
          >
            <span>Subscribe via WhatsApp Updates</span>
          </Link>
        </div>
      </section>
    </main>
  );
}
