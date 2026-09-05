import type { NextConfig } from "next";

const nextConfig: NextConfig = {
  async rewrites() {
    return [
      {
        source: "/vat-registration-uae-2026-thresholds-documents-deadlines",
        destination: "/blog/vat-registration-uae-2026-thresholds-documents-deadlines",
      },
      {
        source: "/uae-corporate-tax-2026-registration-rates-filing-deadline",
        destination: "/blog/uae-corporate-tax-2026-registration-rates-filing-deadline",
      },
    ];
  },
};

export default nextConfig;
