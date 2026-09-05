import { Metadata } from "next";
import { notFound } from "next/navigation";
import Image from "next/image";
import Link from "next/link";
import { 
  Calendar, 
  Clock, 
  User, 
  ArrowLeft, 
  Share2, 
  CheckCircle2, 
  ShieldCheck, 
  HelpCircle,
  PhoneCall,
  MessageCircle,
  Building
} from "lucide-react";
import HeroBanner from "@/components/ui/HeroBanner";
import FaqAccordion from "@/components/ui/FaqAccordion";
import ContactForm from "@/components/ui/ContactForm";
import { ArticleJsonLd, FaqJsonLd } from "@/components/seo/JsonLd";
import { blogPosts } from "@/data/posts";

interface Props {
  params: Promise<{
    slug: string;
  }>;
}

export async function generateStaticParams() {
  return blogPosts.map((post) => ({
    slug: post.slug,
  }));
}

export async function generateMetadata({ params }: Props): Promise<Metadata> {
  const { slug } = await params;
  const post = blogPosts.find((p) => p.slug === slug);

  if (!post) {
    return {
      title: "Article Not Found | RBO Accounting Services FZE",
    };
  }

  return {
    title: `${post.title} | RBO Accounting Services FZE`,
    description: post.excerpt,
    alternates: {
      canonical: `https://www.rboaccounting.ae/blog/${post.slug}`,
    },
    openGraph: {
      title: `${post.title} | RBO Accounting Services FZE`,
      description: post.excerpt,
      url: `https://www.rboaccounting.ae/blog/${post.slug}`,
      type: "article",
      images: [
        {
          url: `https://www.rboaccounting.ae${post.featuredImage}`,
          width: 1200,
          height: 675,
          alt: post.title,
        },
      ],
    },
    twitter: {
      card: "summary_large_image",
      title: post.title,
      description: post.excerpt,
      images: [`https://www.rboaccounting.ae${post.featuredImage}`],
    },
  };
}

export default async function BlogPostPage({ params }: Props) {
  const { slug } = await params;
  const post = blogPosts.find((p) => p.slug === slug);

  if (!post) {
    notFound();
  }

  return (
    <main className="min-h-screen bg-[#0D1B2A] text-white">
      <ArticleJsonLd
        headline={post.title}
        description={post.excerpt}
        image={`https://www.rboaccounting.ae${post.featuredImage}`}
        datePublished="2026-03-01T08:00:00+04:00"
        dateModified="2026-03-05T12:00:00+04:00"
        authorName={post.author}
      />
      {post.faqs && post.faqs.length > 0 && (
        <FaqJsonLd faqs={post.faqs} />
      )}

      {/* Article Header */}
      <section className="bg-gradient-to-b from-[#091522] via-[#0D1B2A] to-[#0D1B2A] text-white pt-16 pb-20 relative overflow-hidden border-b border-[#E8B84B]/20">
        <div className="absolute top-0 right-0 w-96 h-96 bg-[#E8B84B]/10 rounded-full blur-3xl -z-0" />
        
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
          <Link
            href="/blog"
            className="inline-flex items-center gap-2 text-xs font-semibold text-[#E8B84B] hover:text-white mb-6 transition-colors"
          >
            <ArrowLeft className="w-3.5 h-3.5" />
            <span>Back to All Guides</span>
          </Link>

          <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#E8B84B]/15 text-[#E8B84B] text-xs font-bold uppercase tracking-wider mb-4 border border-[#E8B84B]/30">
            {post.category}
          </div>

          <h1 className="text-3xl sm:text-4xl md:text-5xl font-serif font-bold text-white leading-tight mb-6">
            {post.title}
          </h1>

          <div className="flex flex-wrap items-center gap-4 sm:gap-6 text-xs sm:text-sm text-gray-300 border-t border-white/10 pt-4">
            <span className="flex items-center gap-1.5">
              <Calendar className="w-4 h-4 text-[#E8B84B]" />
              {post.date}
            </span>
            <span className="flex items-center gap-1.5">
              <Clock className="w-4 h-4 text-[#E8B84B]" />
              {post.readTime}
            </span>
            <span className="flex items-center gap-1.5">
              <User className="w-4 h-4 text-[#E8B84B]" />
              {post.author}
            </span>
          </div>
        </div>
      </section>

      {/* Main Content Body */}
      <section className="py-16 bg-[#0D1B2A] border-b border-[#E8B84B]/15">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            {/* Left Column: Article Content */}
            <div className="lg:col-span-8 space-y-10">
              
              {/* Featured Image */}
              <div className="relative aspect-[16/9] w-full rounded-3xl overflow-hidden shadow-2xl border border-[#E8B84B]/30 bg-slate-900">
                <Image
                  src={post.featuredImage}
                  alt={post.title}
                  fill
                  className="object-cover"
                  priority
                />
              </div>

              {/* In-Article Infographic Highlight */}
              {post.infographicImage && (
                <div className="my-8 rounded-3xl overflow-hidden border-2 border-[#E8B84B]/40 shadow-2xl bg-[#091522] p-3 sm:p-5">
                  <div className="p-3 bg-[#0D1B2A] text-center rounded-2xl mb-3 border border-white/5">
                    <p className="text-xs sm:text-sm font-bold text-[#E8B84B] uppercase tracking-wider">
                      Official 2026 Reference Infographic
                    </p>
                  </div>
                  <div className="relative aspect-[16/9] w-full rounded-xl overflow-hidden">
                    <Image
                      src={post.infographicImage}
                      alt={`${post.title} Official Infographic`}
                      fill
                      className="object-contain"
                    />
                  </div>
                </div>
              )}

              {/* Rich HTML Content */}
              <div 
                className="prose prose-invert max-w-none text-gray-300 leading-relaxed text-sm sm:text-base
                  prose-headings:font-serif prose-headings:text-white prose-headings:font-bold
                  prose-h2:text-2xl prose-h2:text-[#E8B84B] prose-h2:mt-10 prose-h2:mb-4 prose-h2:border-b prose-h2:border-white/10 prose-h2:pb-2
                  prose-h3:text-xl prose-h3:text-white prose-h3:mt-8 prose-h3:mb-3
                  prose-p:text-gray-300 prose-p:leading-relaxed prose-p:mb-4
                  prose-ul:list-disc prose-ul:pl-6 prose-ul:my-4 prose-li:my-1 prose-li:text-gray-300
                  prose-table:w-full prose-table:border-collapse prose-table:my-6 prose-table:rounded-xl prose-table:overflow-hidden prose-table:border prose-table:border-white/10
                  prose-th:bg-[#112233] prose-th:text-[#E8B84B] prose-th:p-3 prose-th:text-left prose-th:text-xs prose-th:font-semibold
                  prose-td:p-3 prose-td:border-b prose-td:border-white/5 prose-td:text-xs sm:prose-td:text-sm prose-td:text-gray-300
                  prose-strong:text-white prose-strong:font-bold
                  prose-a:text-[#E8B84B] prose-a:underline hover:prose-a:text-white"
                dangerouslySetInnerHTML={{ __html: post.contentHtml }}
              />

              {/* FAQ Accordion */}
              {post.faqs && post.faqs.length > 0 && (
                <div className="pt-8 border-t border-white/10">
                  <h3 className="text-2xl font-serif font-bold text-white mb-6 flex items-center gap-2">
                    <HelpCircle className="w-6 h-6 text-[#E8B84B]" />
                    <span>Frequently Asked Questions</span>
                  </h3>
                  <FaqAccordion items={post.faqs} />
                </div>
              )}

              {/* Author Bio Box */}
              <div className="p-8 rounded-3xl bg-[#091522] border border-[#E8B84B]/20 flex flex-col sm:flex-row items-start sm:items-center gap-6">
                <div className="w-16 h-16 rounded-full overflow-hidden border-2 border-[#E8B84B] relative shrink-0 bg-white">
                  <Image
                    src="/images/rbo-logo.jpg"
                    alt="RBO Accounting Services FZE"
                    fill
                    className="object-cover"
                  />
                </div>
                <div>
                  <h4 className="font-serif font-bold text-lg text-white">
                    Published by {post.author}
                  </h4>
                  <p className="text-xs text-gray-400 mt-1 leading-relaxed">
                    Senior Tax Advisors and Chartered Accountants at RBO Accounting Services FZE. Specializing in FTA VAT compliance, Corporate Tax structuring, and IFRS-certified financial auditing across the UAE.
                  </p>
                </div>
              </div>

            </div>

            {/* Right Column: Sticky Sidebar with Consultation Form & Highlights */}
            <div className="lg:col-span-4 space-y-8">
              
              {/* WhatsApp CTA */}
              <div className="bg-gradient-to-br from-[#112233] to-[#091522] text-white p-6 rounded-3xl border border-[#E8B84B]/30 shadow-xl">
                <div className="w-12 h-12 rounded-2xl bg-[#E8B84B] text-[#0D1B2A] flex items-center justify-center mb-4">
                  <MessageCircle className="w-6 h-6" />
                </div>
                <h4 className="font-serif font-bold text-lg text-white mb-2">
                  Have a Specific Tax Question?
                </h4>
                <p className="text-xs text-gray-300 leading-relaxed mb-6">
                  Chat directly with our registered tax consultants for instant clarifications on registration, exemptions, and deadlines.
                </p>
                <Link
                  href="https://wa.me/971508051857"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="w-full inline-flex items-center justify-center gap-2 py-3.5 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs transition-colors shadow-md"
                >
                  <span>Chat on WhatsApp (+971 50 805 1857)</span>
                </Link>
              </div>

              {/* Consultation Form Card */}
              <div className="bg-[#091522] p-6 rounded-3xl border border-[#E8B84B]/20 shadow-xl">
                <h4 className="font-serif font-bold text-lg text-white mb-1">
                  Book Free Tax Review
                </h4>
                <p className="text-xs text-gray-400 mb-4">
                  Get a personalized FTA compliance review for your business.
                </p>
                <ContactForm />
              </div>

              {/* Other Guides Links */}
              <div className="p-6 rounded-3xl bg-[#091522] border border-white/10">
                <h4 className="font-serif font-bold text-base text-white mb-4 border-l-2 border-[#E8B84B] pl-3">
                  More UAE Tax Guides
                </h4>
                <div className="space-y-4">
                  {blogPosts
                    .filter((p) => p.slug !== post.slug)
                    .map((otherPost) => (
                      <Link
                        key={otherPost.id}
                        href={`/blog/${otherPost.slug}`}
                        className="block group"
                      >
                        <h5 className="font-bold text-xs text-white group-hover:text-[#E8B84B] transition-colors line-clamp-2">
                          {otherPost.title}
                        </h5>
                        <p className="text-[11px] text-gray-400 mt-1">
                          {otherPost.readTime} &bull; {otherPost.date}
                        </p>
                      </Link>
                    ))}
                </div>
              </div>

            </div>

          </div>
        </div>
      </section>
    </main>
  );
}
