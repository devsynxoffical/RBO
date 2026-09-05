import type { Metadata } from "next";
import { Inter, Playfair_Display } from "next/font/google";
import Navbar from "@/components/layout/Navbar";
import Footer from "@/components/layout/Footer";
import WhatsAppButton from "@/components/layout/WhatsAppButton";
import JsonLd, { generateOrganizationSchema } from "@/components/seo/JsonLd";
import "./globals.css";

const inter = Inter({
  subsets: ["latin"],
  variable: "--font-inter",
  display: "swap",
});

const playfair = Playfair_Display({
  subsets: ["latin"],
  variable: "--font-playfair",
  display: "swap",
});

export const metadata: Metadata = {
  metadataBase: new URL("https://www.rboaccounting.ae"),
  title: {
    default: "RBO Accounting Services FZE | VAT, Corporate Tax & Bookkeeping in UAE",
    template: "%s | RBO Accounting"
  },
  description: "FTA-registered tax agency in Ajman & Dubai. Specialist VAT registration, 0% & 9% Corporate Tax filing, monthly bookkeeping, and Free Zone audit services across UAE.",
  keywords: [
    "Accounting firm in UAE",
    "VAT registration UAE",
    "Corporate tax UAE",
    "Bookkeeping Dubai",
    "Ajman accounting firm",
    "FTA tax agent",
    "Free zone audit UAE"
  ],
  authors: [{ name: "RBO Accounting Services FZE" }],
  creator: "RBO Accounting Services FZE",
  publisher: "RBO Accounting Services FZE",
  formatDetection: {
    email: false,
    address: false,
    telephone: false,
  },
  openGraph: {
    type: "website",
    locale: "en_US",
    url: "https://www.rboaccounting.ae",
    siteName: "RBO Accounting Services FZE",
    title: "RBO Accounting Services FZE | UAE Tax & Accounting Specialists",
    description: "Expert VAT, Corporate Tax, Bookkeeping, and Audit services across all seven UAE Emirates.",
    images: [
      {
        url: "/images/vat-registration-uae-2026-hd.jpg",
        width: 1200,
        height: 630,
        alt: "RBO Accounting Services FZE UAE"
      }
    ]
  },
  twitter: {
    card: "summary_large_image",
    title: "RBO Accounting Services FZE",
    description: "UAE Tax, VAT, Corporate Tax & Bookkeeping Agency"
  },
  robots: {
    index: true,
    follow: true,
    googleBot: {
      index: true,
      follow: true,
      "max-video-preview": -1,
      "max-image-preview": "large",
      "max-snippet": -1,
    },
  },
  verification: {
    google: "OO2yx1wSe7bvwRJz4DF8Ml1w5i2lOylQ_Tm1mX6W_9k",
  },
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en" className={`${inter.variable} ${playfair.variable}`}>
      <body className="min-h-screen flex flex-col antialiased text-slate-900 bg-white selection:bg-amber-100 selection:text-amber-900">
        <JsonLd data={generateOrganizationSchema()} />
        <Navbar />
        <main className="flex-grow">{children}</main>
        <Footer />
        <WhatsAppButton />
      </body>
    </html>
  );
}
