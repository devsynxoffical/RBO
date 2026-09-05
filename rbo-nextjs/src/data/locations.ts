export interface LocationDetail {
  slug: string;
  name: string;
  metaTitle: string;
  metaDescription: string;
  heroHeadline: string;
  heroSubheadline: string;
  intro: string[];
  keyZones: string[];
  servicesOffered: { title: string; desc: string; link: string }[];
  localSeoContent: string;
  faqs: { q: string; a: string }[];
}

export const locationsData: Record<string, LocationDetail> = {
  "dubai": {
    slug: "dubai",
    name: "Dubai",
    metaTitle: "Accounting & Tax Services in Dubai | FTA Tax Agents | RBO",
    metaDescription: "Accounting, bookkeeping, VAT, and corporate tax services in Dubai mainland & free zones (DMCC, DIFC, JAFZA, Meydan). FTA certified tax consultants.",
    heroHeadline: "Accounting, VAT & Corporate Tax Services in Dubai",
    heroSubheadline: "Supporting Dubai mainland (DED) and Free Zone enterprises with FTA-registered bookkeeping, VAT filing, and corporate tax compliance.",
    intro: [
      "Dubai is the global commercial hub of the Middle East, home to over 30 prominent Free Zones and hundreds of thousands of active mainland commercial licenses. Operating a business in Dubai requires strict adherence to FTA tax deadlines, proper accounting books, and timely corporate tax return filings.",
      "RBO Accounting Services FZE provides agile, professional accounting and tax services for Dubai startups, trading firms, service providers, and multi-national subsidiaries without the bloated overhead of big-4 accounting firms."
    ],
    keyZones: [
      "Dubai Mainland (DED Licensed)",
      "DMCC (Dubai Multi Commodities Centre)",
      "DIFC (Dubai International Financial Centre)",
      "JAFZA (Jebel Ali Free Zone)",
      "Meydan Free Zone & IFZA",
      "DAFZA & Dubai South (DWC)"
    ],
    servicesOffered: [
      {
        title: "VAT Registration & Filing in Dubai",
        desc: "End-to-end EmaraTax VAT returns, zero-rated export reviews, and input tax optimization.",
        link: "/our-services/vat-registration-filing-uae"
      },
      {
        title: "Corporate Tax Advisory & 0% Free Zone Planning",
        desc: "Qualifying Free Zone Person (QFZP) substance assessments and 9% tax returns.",
        link: "/our-services/corporate-tax-services-uae"
      },
      {
        title: "IFRS Monthly Bookkeeping & Auditing",
        desc: "Audit-ready monthly financial statements and management accounts for banks and investors.",
        link: "/our-services/bookkeeping-accounting-services-uae"
      }
    ],
    localSeoContent: "Whether you operate a consulting firm in Business Bay, a general trading company in Deira, or a tech venture in DIFC, RBO's dedicated tax consultants guarantee accurate VAT returns, audit-ready bookkeeping, and complete Corporate Tax filing in Dubai.",
    faqs: [
      {
        q: "Do Dubai Free Zone companies need to register for Corporate Tax?",
        a: "Yes. All Free Zone entities in Dubai (including DMCC, DIFC, and IFZA) must register for UAE Corporate Tax and file an annual tax return, even if they qualify for the 0% Qualifying Free Zone rate."
      },
      {
        q: "Can RBO manage accounting remotely for my Dubai business?",
        a: "Yes. We work seamlessly via secure cloud accounting software (QuickBooks, Xero, Zoho Books) with dedicated account managers available for on-site meetings across Dubai."
      }
    ]
  },
  "ajman": {
    slug: "ajman",
    name: "Ajman",
    metaTitle: "Accounting & Tax Services in Ajman | Head Office | RBO",
    metaDescription: "Direct accounting and tax services from our headquarters in Ajman Free Zone C1 Building. VAT filing, corporate tax registration, and bookkeeping in Ajman.",
    heroHeadline: "Accounting, VAT & Corporate Tax Services in Ajman",
    heroSubheadline: "Our headquarters location. Serving Ajman Free Zone (AFZ), Ajman Media City, and mainland companies with direct, dedicated tax representation.",
    intro: [
      "Headquartered in the prestigious C1 Building at Ajman Free Zone, RBO Accounting Services FZE is uniquely positioned to deliver immediate, personalized accounting and tax support to businesses across Ajman.",
      "From manufacturing facilities in Jurf Industrial Area to trading firms in AFZ, our on-site team offers direct drop-in consultations, FTA audit representation, and day-to-day bookkeeping."
    ],
    keyZones: [
      "Ajman Free Zone (AFZ C1 Building)",
      "Ajman Media City Free Zone (AMCFZ)",
      "Al Jurf Industrial Area 1, 2 & 3",
      "Ajman Mainland (DED Licensed)",
      "Al Nuaimiya & Rashidiya Commercial Hubs"
    ],
    servicesOffered: [
      {
        title: "On-Site & Cloud Bookkeeping in Ajman",
        desc: "Daily ledger maintenance, bank reconciliation, and monthly P&L reporting.",
        link: "/our-services/bookkeeping-accounting-services-uae"
      },
      {
        title: "Ajman Free Zone Tax Compliance",
        desc: "Qualifying 0% corporate tax filings and statutory audit reports for license renewal.",
        link: "/our-services/corporate-tax-services-uae"
      },
      {
        title: "Ajman VAT Filings & Audits",
        desc: "Quarterly and monthly VAT return preparation on the FTA EmaraTax portal.",
        link: "/our-services/vat-registration-filing-uae"
      }
    ],
    localSeoContent: "As an Ajman Free Zone registered enterprise, RBO Accounting Services FZE provides localized, cost-effective accounting solutions that ensure your business meets all FTA requirements and DED renewal guidelines.",
    faqs: [
      {
        q: "Where is the RBO office located in Ajman?",
        a: "We are located at the C1 Building, Liwara 1, Ajman Free Zone, Ajman, United Arab Emirates."
      },
      {
        q: "Are audit reports required for Ajman Free Zone license renewal?",
        a: "Yes, Ajman Free Zone authorities require companies to submit audited financial statements for annual trade license renewals."
      }
    ]
  },
  "abu-dhabi": {
    slug: "abu-dhabi",
    name: "Abu Dhabi",
    metaTitle: "Accounting & Tax Services in Abu Dhabi | ADGM & Mainland | RBO",
    metaDescription: "Expert accounting, VAT returns, corporate tax advisory, and audit services for Abu Dhabi mainland, ADGM, and KIZAD/KEZAD companies.",
    heroHeadline: "Accounting, VAT & Corporate Tax Services in Abu Dhabi",
    heroSubheadline: "FTA-compliant financial consulting, corporate tax structuring, and bookkeeping for government contractors, energy firms, and Abu Dhabi SMEs.",
    intro: [
      "As the federal capital of the UAE, Abu Dhabi hosts major industrial enterprises, financial giants in ADGM, and key government suppliers. Regulatory compliance in Abu Dhabi demands high standards of corporate governance, ICV certification alignment, and rigorous tax reporting.",
      "RBO delivers high-precision financial services tailored to Abu Dhabi's unique regulatory environment, helping businesses maintain pristine accounting records for statutory audits and FTA compliance."
    ],
    keyZones: [
      "Abu Dhabi Global Market (ADGM)",
      "KEZAD (Khalifa Economic Zones Abu Dhabi)",
      "Masdar City Free Zone",
      "twofour54 Media Zone",
      "Abu Dhabi Mainland (ADDED Licensed)",
      "Mussafah Industrial Area"
    ],
    servicesOffered: [
      {
        title: "Corporate Tax Structuring & QFZP Compliance",
        desc: "In-depth corporate tax assessments for ADGM and KEZAD entities.",
        link: "/our-services/corporate-tax-services-uae"
      },
      {
        title: "Statutory Financial Audits & ICV Support",
        desc: "Audit preparations and financial statement verification aligned with Abu Dhabi standards.",
        link: "/our-services/financial-auditing-services-uae"
      },
      {
        title: "VAT Consulting for Government Suppliers",
        desc: "Complex VAT treatment for government contracts, oil & gas sub-contractors, and public tenders.",
        link: "/our-services/vat-registration-filing-uae"
      }
    ],
    localSeoContent: "RBO supports Abu Dhabi entities with thorough IFRS-compliant accounting, minimizing tax risks and providing dependable financial clarity for management and board members.",
    faqs: [
      {
        q: "Do ADGM companies have different corporate tax rules?",
        a: "ADGM companies are subject to the UAE Federal Corporate Tax Law. However, qualifying financial and holding activities within ADGM may benefit from Qualifying Free Zone Person (0%) status if strict conditions are met."
      },
      {
        q: "Can you help our Abu Dhabi company prepare for an FTA Tax Audit?",
        a: "Yes, our certified tax advisors prepare complete tax audit files, general ledgers, and reconciled VAT returns to ensure a seamless FTA review."
      }
    ]
  },
  "sharjah": {
    slug: "sharjah",
    name: "Sharjah",
    metaTitle: "Accounting & Tax Services in Sharjah | SAIF Zone & HFZA | RBO",
    metaDescription: "Accounting, VAT, and corporate tax services in Sharjah. Serving SAIF Zone, Hamriyah Free Zone (HFZA), and Sharjah Industrial Areas.",
    heroHeadline: "Accounting, VAT & Corporate Tax Services in Sharjah",
    heroSubheadline: "Cost-effective accounting, VAT return filings, and corporate tax compliance for Sharjah manufacturers, traders, and logistics companies.",
    intro: [
      "Sharjah is the UAE's industrial and cultural powerhouse, featuring major free zones such as SAIF Zone and Hamriyah Free Zone (HFZA), alongside expansive industrial clusters.",
      "RBO Accounting Services FZE helps Sharjah enterprises modernize their bookkeeping, implement inventory cost accounting, and fulfill all FTA VAT and Corporate Tax deadlines without penalty."
    ],
    keyZones: [
      "SAIF Zone (Sharjah Airport International Free Zone)",
      "Hamriyah Free Zone (HFZA)",
      "Sharjah Media City (SHAMS)",
      "Sharjah Research Technology and Innovation Park (SRTIP)",
      "Sharjah Industrial Areas 1 through 18"
    ],
    servicesOffered: [
      {
        title: "Inventory & Manufacturing Accounting",
        desc: "Cost of Goods Sold (COGS) tracking and inventory valuation for Sharjah industrial firms.",
        link: "/our-services/bookkeeping-accounting-services-uae"
      },
      {
        title: "Free Zone Designated Tax Treatment",
        desc: "VAT and Corporate Tax guidance for goods stored and traded inside HFZA and SAIF Zone.",
        link: "/our-services/vat-registration-filing-uae"
      },
      {
        title: "Sharjah Corporate Tax Filing",
        desc: "Registration, Small Business Relief evaluation, and annual 9% tax filing.",
        link: "/our-services/corporate-tax-services-uae"
      }
    ],
    localSeoContent: "Sharjah businesses trust RBO for straightforward accounting and dependable tax filings. We ensure trading entities and factories stay 100% compliant with both local SEDD and federal FTA laws.",
    faqs: [
      {
        q: "Is Hamriyah Free Zone a Designated Zone for VAT?",
        a: "Yes, HFZA is a Designated Zone for VAT purposes under UAE law. Supplies of goods within or between Designated Zones may be VAT-free subject to specific customs control conditions."
      }
    ]
  },
  "ras-al-khaimah": {
    slug: "ras-al-khaimah",
    name: "Ras Al Khaimah",
    metaTitle: "Accounting & Tax Services in Ras Al Khaimah | RAKEZ | RBO",
    metaDescription: "Accounting, VAT, and corporate tax advisory for RAKEZ, RAK Maritime City, and RAK mainland businesses. FTA compliance and audited financials.",
    heroHeadline: "Accounting, VAT & Corporate Tax in Ras Al Khaimah",
    heroSubheadline: "Supporting RAKEZ manufacturers, trading companies, and hospitality businesses with expert tax and accounting services.",
    intro: [
      "Ras Al Khaimah Economic Zone (RAKEZ) is one of the UAE's largest commercial and industrial ecosystems, attracting international manufacturing, maritime, and consulting businesses.",
      "RBO Accounting Services FZE partners with RAK businesses to provide seamless FTA tax registrations, audit support, and ongoing monthly accounting."
    ],
    keyZones: [
      "RAKEZ (Ras Al Khaimah Economic Zone)",
      "RAK Maritime City Free Zone",
      "Al Hamra Commercial Hub",
      "Al Ghail Industrial Zone",
      "RAK Mainland (DED Licensed)"
    ],
    servicesOffered: [
      {
        title: "RAKEZ Monthly Accounting Packages",
        desc: "Complete accounting, cloud software setup, and management reporting.",
        link: "/our-services/bookkeeping-accounting-services-uae"
      },
      {
        title: "Corporate Tax & Small Business Relief for RAK",
        desc: "Determine eligibility for 0% tax under Small Business Relief (revenue under AED 3M).",
        link: "/our-services/corporate-tax-services-uae"
      }
    ],
    localSeoContent: "Whether you operate in RAKEZ or mainland Ras Al Khaimah, RBO offers dedicated tax accounting that removes regulatory friction and ensures full FTA compliance.",
    faqs: [
      {
        q: "Do RAKEZ companies need annual audited financial statements?",
        a: "Yes, RAKEZ requires active entities to maintain proper accounting records and submit annual audit reports upon renewal."
      }
    ]
  },
  "fujairah": {
    slug: "fujairah",
    name: "Fujairah",
    metaTitle: "Accounting & Tax Services in Fujairah | FFZA & FOIZ | RBO",
    metaDescription: "Bunkering, logistics, and trading accounting services in Fujairah. VAT filing and corporate tax compliance by FTA certified experts.",
    heroHeadline: "Accounting, VAT & Corporate Tax Services in Fujairah",
    heroSubheadline: "Tailored financial advisory for Fujairah Free Zone, maritime bunkering firms, logistics hubs, and mainland enterprises.",
    intro: [
      "Fujairah holds a strategic position on the UAE's eastern coastline outside the Strait of Hormuz, making it a critical global bunkering, logistics, and oil storage hub.",
      "RBO provides specialized accounting services for Fujairah maritime, logistics, and trading companies, managing complex cross-border VAT exemptions and corporate tax filings."
    ],
    keyZones: [
      "Fujairah Free Zone (FFZA)",
      "Fujairah Oil Industry Zone (FOIZ)",
      "Creative City Fujairah",
      "Fujairah Mainland"
    ],
    servicesOffered: [
      {
        title: "Maritime & Logistics VAT Compliance",
        desc: "Specialized zero-rated international transportation and export VAT advisory.",
        link: "/our-services/vat-registration-filing-uae"
      },
      {
        title: "Fujairah Corporate Tax Compliance",
        desc: "Corporate tax registration, de minimis calculation, and annual tax returns.",
        link: "/our-services/corporate-tax-services-uae"
      }
    ],
    localSeoContent: "RBO delivers reliable, FTA-compliant accounting solutions for Fujairah's energy, shipping, and creative businesses.",
    faqs: [
      {
        q: "Are international shipping services subject to UAE VAT in Fujairah?",
        a: "International transportation of goods and passengers, as well as related supply services, are generally zero-rated (0% VAT) under UAE VAT regulations when specific documentation is maintained."
      }
    ]
  },
  "umm-al-quwain": {
    slug: "umm-al-quwain",
    name: "Umm Al Quwain",
    metaTitle: "Accounting & Tax Services in Umm Al Quwain | UAQ FTZ | RBO",
    metaDescription: "Cost-effective accounting, VAT filing, and corporate tax registration for UAQ Free Trade Zone and mainland startups and SMEs.",
    heroHeadline: "Accounting & Tax Services in Umm Al Quwain",
    heroSubheadline: "Affordable, high-quality bookkeeping and tax filing packages for UAQ Free Trade Zone (UAQ FTZ) and mainland businesses.",
    intro: [
      "Umm Al Quwain Free Trade Zone (UAQ FTZ) is a popular, cost-effective hub for international trading and tech consultancies.",
      "RBO Accounting offers bundled bookkeeping and tax packages tailored to UAQ startups and growing companies."
    ],
    keyZones: [
      "UAQ Free Trade Zone (UAQ FTZ)",
      "Umm Al Quwain Industrial City",
      "UAQ Mainland"
    ],
    servicesOffered: [
      {
        title: "UAQ VAT & Corporate Tax",
        desc: "Complete registration and annual returns for UAQ FTZ and mainland entities.",
        link: "/our-services/vat-registration-filing-uae"
      },
      {
        title: "Monthly Bookkeeping Packages",
        desc: "Flat-rate monthly bookkeeping and bank reconciliation routines.",
        link: "/our-services/bookkeeping-accounting-services-uae"
      }
    ],
    localSeoContent: "UAQ SMEs and free-zone entities often outgrow spreadsheets once VAT or corporate tax kicks in. RBO sets up practical bookkeeping and filing routines that scale with your sales.",
    faqs: [
      {
        q: "What is the typical turnaround time for monthly accounts in UAQ?",
        a: "We deliver monthly financial statements within 5 to 7 business days following the end of each calendar month."
      }
    ]
  }
};

export const emiratesData = Object.values(locationsData).map((loc) => ({
  id: loc.slug,
  slug: loc.slug,
  name: loc.name,
  heroTagline: loc.heroSubheadline,
  description: loc.intro[0] || "",
  fullContent: loc.intro.join("\n\n") + "\n\n" + loc.localSeoContent,
  freeZones: loc.keyZones,
  isHeadquarters: loc.slug === "ajman",
  faqs: loc.faqs,
  servicesOffered: loc.servicesOffered,
}));
