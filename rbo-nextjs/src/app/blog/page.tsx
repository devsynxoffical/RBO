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
    <main className="min-h-screen">
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
      <section className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          
          <div className="grid grid-cols-1 md:grid-cols-2 gap-10">
            {blogPosts.map((post) => (
              <article
                key={post.id}
                className="bg-white rounded-3xl border border-gray-200 overflow-hidden shadow-sm hover:border-[var(--gold-primary)] hover:shadow-2xl transition-all duration-300 flex flex-col group"
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
                    <span className="px-3.5 py-1.5 rounded-full bg-[var(--navy-primary)]/90 backdrop-blur-md text-[var(--gold-light)] text-xs font-bold uppercase tracking-wider border border-[var(--gold-primary)]/30">
                      {post.category}
                    </span>
                  </div>
                </div>

                {/* Content Container */}
                <div className="p-8 flex flex-col flex-1 justify-between">
                  <div>
                    {/* Meta info */}
                    <div className="flex items-center gap-4 text-xs text-gray-500 mb-4 flex-wrap">
                      <span className="flex items-center gap-1.5 font-medium">
                        <Calendar className="w-3.5 h-3.5 text-[var(--gold-dark)]" />
                        {post.date}
                      </span>
                      <span className="flex items-center gap-1.5 font-medium">
                        <Clock className="w-3.5 h-3.5 text-[var(--gold-dark)]" />
                        {post.readTime}
                      </span>
                      <span className="flex items-center gap-1.5 font-medium">
                        <User className="w-3.5 h-3.5 text-[var(--gold-dark)]" />
                        {post.author}
                      </span>
                    </div>

                    <h2 className="text-2xl font-serif font-bold text-[var(--navy-primary)] mb-4 group-hover:text-[var(--gold-dark)] transition-colors leading-tight">
                      <Link href={`/blog/${post.slug}`}>
                        {post.title}
                      </Link>
                    </h2>

                    <p className="text-sm text-gray-600 leading-relaxed mb-6">
                      {post.excerpt}
                    </p>
                  </div>

                  {/* Read More Link */}
                  <div className="pt-6 border-t border-gray-100 flex items-center justify-between">
                    <Link
                      href={`/blog/${post.slug}`}
                      className="inline-flex items-center gap-2 text-xs font-bold text-[var(--navy-primary)] group-hover:text-[var(--gold-dark)] uppercase tracking-wider transition-colors"
                    >
                      <span>Read Complete Guide</span>
                      <ArrowRight className="w-4 h-4 group-hover:translate-x-1 transition-transform" />
                    </Link>

                    <span className="text-xs font-semibold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">
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
      <section className="py-16 bg-[var(--navy-light)] border-t border-gray-200">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <div className="w-12 h-12 rounded-2xl bg-[var(--gold-primary)] text-[var(--navy-primary)] flex items-center justify-center mx-auto mb-4">
            <TrendingUp className="w-6 h-6" />
          </div>
          <h3 className="text-2xl font-serif font-bold text-[var(--navy-primary)] mb-2">
            Stay Ahead of UAE Tax Law Amendments
          </h3>
          <p className="text-gray-600 text-sm max-w-xl mx-auto mb-6">
            Get actionable UAE tax updates, FTA decision summaries, and compliance alerts directly from RBO chartered accountants.
          </p>
          <Link
            href="https://wa.me/971508051857"
            target="_blank"
            rel="noopener noreferrer"
            className="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-[var(--navy-primary)] text-[var(--gold-light)] font-bold text-xs hover:bg-[var(--navy-secondary)] transition-all shadow-md"
          >
            <span>Subscribe via WhatsApp Updates</span>
          </Link>
        </div>
      </section>
    </main>
  );
}
