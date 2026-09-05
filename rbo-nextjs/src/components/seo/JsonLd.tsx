import React from "react";

interface JsonLdProps {
  data: Record<string, any>;
}

export default function JsonLd({ data }: JsonLdProps) {
  return (
    <script
      type="application/ld+json"
      dangerouslySetInnerHTML={{ __html: JSON.stringify(data) }}
    />
  );
}

export function generateOrganizationSchema() {
  return {
    "@context": "https://schema.org",
    "@type": "AccountingService",
    "@id": "https://www.rboaccounting.ae/#organization",
    "name": "RBO Accounting Services FZE",
    "url": "https://www.rboaccounting.ae",
    "logo": "https://www.rboaccounting.ae/images/logo.svg",
    "description": "FTA-registered tax agency providing VAT registration, corporate tax compliance, bookkeeping, and audit services across the UAE.",
    "telephone": "+971 50 805 1857",
    "email": "info@rboaccounting.ae",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "C1 Building, Liwara 1, Ajman Free Zone",
      "addressLocality": "Ajman",
      "addressCountry": "AE"
    },
    "areaServed": [
      { "@type": "AdministrativeArea", "name": "Dubai" },
      { "@type": "AdministrativeArea", "name": "Ajman" },
      { "@type": "AdministrativeArea", "name": "Abu Dhabi" },
      { "@type": "AdministrativeArea", "name": "Sharjah" },
      { "@type": "AdministrativeArea", "name": "Ras Al Khaimah" },
      { "@type": "AdministrativeArea", "name": "Fujairah" },
      { "@type": "AdministrativeArea", "name": "Umm Al Quwain" }
    ],
    "priceRange": "$$"
  };
}

export function OrganizationJsonLd() {
  return <JsonLd data={generateOrganizationSchema()} />;
}

export function generateFaqSchema(faqs: { q: string; a: string }[], url?: string) {
  return {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    ...(url ? { "@id": `${url}#faq` } : {}),
    "mainEntity": faqs.map((faq) => ({
      "@type": "Question",
      "name": faq.q,
      "acceptedAnswer": {
        "@type": "Answer",
        "text": faq.a
      }
    }))
  };
}

export function FaqJsonLd({ faqs, url }: { faqs: { q: string; a: string }[]; url?: string }) {
  return <JsonLd data={generateFaqSchema(faqs, url)} />;
}

export function generateServiceSchema(title: string, description: string, url: string) {
  return {
    "@context": "https://schema.org",
    "@type": "Service",
    "@id": `${url}#service`,
    "name": title,
    "description": description,
    "url": url,
    "serviceType": title,
    "provider": {
      "@type": "AccountingService",
      "name": "RBO Accounting Services FZE",
      "url": "https://www.rboaccounting.ae"
    },
    "areaServed": {
      "@type": "Country",
      "name": "United Arab Emirates"
    }
  };
}

export function ServiceJsonLd({ name, description, url }: { name: string; description: string; url: string }) {
  return <JsonLd data={generateServiceSchema(name, description, url)} />;
}

export function generateArticleSchema({
  headline,
  description,
  image,
  datePublished,
  dateModified,
  authorName,
}: {
  headline: string;
  description: string;
  image: string;
  datePublished: string;
  dateModified: string;
  authorName: string;
}) {
  return {
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "headline": headline,
    "description": description,
    "image": [image],
    "datePublished": datePublished,
    "dateModified": dateModified,
    "author": {
      "@type": "Organization",
      "name": authorName || "RBO Accounting Services FZE",
      "url": "https://www.rboaccounting.ae"
    },
    "publisher": {
      "@type": "Organization",
      "name": "RBO Accounting Services FZE",
      "logo": {
        "@type": "ImageObject",
        "url": "https://www.rboaccounting.ae/images/logo.svg"
      }
    }
  };
}

export function ArticleJsonLd(props: {
  headline: string;
  description: string;
  image: string;
  datePublished: string;
  dateModified: string;
  authorName: string;
}) {
  return <JsonLd data={generateArticleSchema(props)} />;
}
