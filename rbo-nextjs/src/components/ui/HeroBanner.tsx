import Link from "next/link";
import { ChevronRight } from "lucide-react";

interface Breadcrumb {
  label: string;
  href?: string;
}

interface HeroBannerProps {
  badge?: string;
  title: string;
  subtitle: string;
  breadcrumbs?: Breadcrumb[];
}

export default function HeroBanner({
  badge,
  title,
  subtitle,
  breadcrumbs,
}: HeroBannerProps) {
  return (
    <section className="relative bg-gradient-to-b from-[#091522] via-[#0D1B2A] to-[#0D1B2A] text-white py-16 sm:py-20 border-b border-[#E8B84B]/20 overflow-hidden">
      {/* Background glow */}
      <div className="absolute top-0 right-1/4 w-96 h-96 bg-[#E8B84B]/10 rounded-full blur-3xl pointer-events-none" />
      <div className="absolute -bottom-10 left-10 w-80 h-80 bg-[#091522]/50 rounded-full blur-2xl pointer-events-none" />

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        {/* Breadcrumbs */}
        {breadcrumbs && breadcrumbs.length > 0 && (
          <nav className="inline-flex items-center justify-center gap-2 text-xs text-gray-400 mb-6 bg-white/5 px-4 py-1.5 rounded-full border border-white/10">
            {breadcrumbs.map((b, idx) => {
              const isLast = idx === breadcrumbs.length - 1;
              return (
                <div key={idx} className="inline-flex items-center gap-2">
                  {b.href && !isLast ? (
                    <Link
                      href={b.href}
                      className="hover:text-[#E8B84B] transition-colors"
                    >
                      {b.label}
                    </Link>
                  ) : (
                    <span className={isLast ? "text-[#E8B84B] font-semibold" : ""}>
                      {b.label}
                    </span>
                  )}
                  {!isLast && <ChevronRight className="w-3 h-3 text-gray-500" />}
                </div>
              );
            })}
          </nav>
        )}

        {/* Badge */}
        {badge && (
          <div className="mb-4">
            <span className="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-[#E8B84B]/15 border border-[#E8B84B]/30 text-[#E8B84B] text-xs font-bold uppercase tracking-wider">
              {badge}
            </span>
          </div>
        )}

        {/* Title */}
        <h1 className="text-3xl sm:text-4xl md:text-5xl font-serif font-bold text-white max-w-4xl mx-auto leading-tight mb-4">
          {title}
        </h1>

        {/* Subtitle */}
        <p className="text-sm sm:text-base text-gray-300 max-w-2xl mx-auto leading-relaxed">
          {subtitle}
        </p>
      </div>
    </section>
  );
}
