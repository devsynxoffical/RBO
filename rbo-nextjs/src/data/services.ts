export interface SubService {
  slug: string;
  title: string;
  shortDesc: string;
  fullDesc: string;
  features: string[];
}

export interface ServiceDetail {
  slug: string;
  title: string;
  badge: string;
  metaTitle: string;
  metaDescription: string;
  heroHeadline: string;
  heroSubheadline: string;
  overview: string[];
  subServices: SubService[];
  faqs: { q: string; a: string }[];
  highlights: { title: string; desc: string; icon: string }[];
}

export const servicesData: Record<string, ServiceDetail> = {
  "vat-registration-filing": {
    slug: "vat-registration-filing",
    title: "VAT Registration & Filing",
    badge: "FTA Tax Compliance",
    metaTitle: "VAT Registration & Filing Services UAE | FTA Tax Agent | RBO",
    metaDescription: "Expert VAT registration, periodic return filing, refunds, FTA audits, and advisory in UAE. FTA-registered tax agents in Dubai, Ajman & across UAE.",
    heroHeadline: "UAE VAT Registration & Return Filing Services",
    heroSubheadline: "Accurate FTA VAT registration, quarterly return preparation, input tax optimization, and compliance advisory for mainland and free-zone companies.",
    overview: [
      "Value Added Tax (VAT) in the UAE is levied at a standard rate of 5% on most goods and services. Whether your business has crossed the mandatory AED 375,000 threshold, qualifies for voluntary registration at AED 187,500, or requires ongoing return filing, RBO Accounting provides end-to-end tax agent support on EmaraTax.",
      "Our team of FTA-certified accountants ensures your taxable supplies are classified correctly, eligible input tax is recovered, and returns are filed on time without triggering costly late-submission penalties."
    ],
    highlights: [
      {
        title: "FTA Registered Agents",
        desc: "Certified professionals handling direct communications and submissions with the Federal Tax Authority.",
        icon: "ShieldCheck"
      },
      {
        title: "Zero Penalty Record",
        desc: "Strict compliance workflows ensuring your returns and tax liability settlements meet every EmaraTax deadline.",
        icon: "ClockCheck"
      },
      {
        title: "Free Zone Expertise",
        desc: "Specialized handling for Designated Zones, qualifying free zone supplies, and cross-border transactions.",
        icon: "Building2"
      }
    ],
    subServices: [
      {
        slug: "registration",
        title: "VAT Registration Assistance",
        shortDesc: "Mandatory & voluntary EmaraTax registration for mainland and free zone entities.",
        fullDesc: "We review your rolling 12-month taxable supplies and expenses, assemble all necessary incorporation and financial documents, and submit your application to the FTA to obtain your Tax Registration Number (TRN) promptly.",
        features: [
          "Mandatory threshold review (AED 375,000)",
          "Voluntary threshold review (AED 187,500)",
          "Document verification & EmaraTax submission",
          "Follow-up with FTA till TRN issuance"
        ]
      },
      {
        slug: "return-filing",
        title: "Periodic VAT Return Filing",
        shortDesc: "Accurate quarterly and monthly VAT return preparation (Form VAT201).",
        fullDesc: "We reconcile your sales invoices, purchase bills, and customs declarations (Box 6 & Box 7 imports) to prepare compliant Form VAT201 returns, minimizing liability and maximizing eligible input tax recovery.",
        features: [
          "Output tax calculation & verification",
          "Input tax recovery optimization",
          "Customs import reconciliation",
          "Timely EmaraTax filing & payment guidance"
        ]
      },
      {
        slug: "refund",
        title: "VAT Refund Processing",
        shortDesc: "Claiming excess input tax credits from the Federal Tax Authority.",
        fullDesc: "If your input VAT exceeds output VAT, we prepare detailed audit-proof schedules and submit formal refund applications on EmaraTax, liaising with FTA officers until the refund is credited to your bank account.",
        features: [
          "Excess credit eligibility audit",
          "Documentation pack compilation",
          "EmaraTax refund application submission",
          "Direct FTA communication handling"
        ]
      },
      {
        slug: "advisory",
        title: "VAT Advisory & Health Check",
        shortDesc: "Transaction analysis, zero-rated vs exempt classification, and contract reviews.",
        fullDesc: "Comprehensive advisory on complex supply chains, designated zone rules, inter-company cross-charges, and health check reviews to identify compliance vulnerabilities before the FTA initiates an audit.",
        features: [
          "Designated zone goods & services treatment",
          "Export & international supply review",
          "Pre-audit VAT health check",
          "Accounting software VAT tax code mapping"
        ]
      },
      {
        slug: "fta-audit",
        title: "FTA Tax Audit Support",
        shortDesc: "Representation and audit file preparation for FTA inspection.",
        fullDesc: "Expert defense and documentation support if your business is selected for an FTA tax audit or information request, ensuring your General Ledger, tax invoices, and reconciliations satisfy tax auditors.",
        features: [
          "Audit file preparation (FAF format)",
          "Invoice & credit note compliance check",
          "Representation before FTA audit officers",
          "Resolution of audit queries"
        ]
      },
      {
        slug: "penalty-reconsideration",
        title: "Penalty Reconsideration & Waivers",
        shortDesc: "Drafting formal reconsideration requests for administrative penalties.",
        fullDesc: "If your business received an FTA penalty for late registration or reporting discrepancies, our tax experts draft strong, grounded legal submissions to request penalty waivers or reconsiderations.",
        features: [
          "Penalty root-cause assessment",
          "Legal argument & grounds formulation",
          "Submission to FTA Reconsideration Committee",
          "Penalty reduction follow-through"
        ]
      }
    ],
    faqs: [
      {
        q: "What is the VAT registration threshold in the UAE?",
        a: "Mandatory registration applies if your taxable supplies and imports exceed AED 375,000 in the previous 12 months or are expected to exceed it in the next 30 days. Voluntary registration is available starting at AED 187,500."
      },
      {
        q: "How often do UAE businesses file VAT returns?",
        a: "Most businesses file VAT returns quarterly on EmaraTax, due on the 28th day following the end of the assigned tax period. Some larger businesses may be assigned monthly filing cycles by the FTA."
      },
      {
        q: "Are free zone companies exempt from VAT?",
        a: "No. Free zone companies are subject to UAE VAT rules. While certain goods transactions inside Designated Free Zones qualify for special treatment, services, mainland sales, and standard transactions remain taxable at 5%."
      },
      {
        q: "What is the penalty for late VAT registration?",
        a: "The standard administrative penalty for failing to apply for mandatory VAT registration within the 30-day legal window is AED 10,000, plus potential penalties on unpaid output tax."
      }
    ]
  },

  "corporate-tax": {
    slug: "corporate-tax",
    title: "Corporate Tax Services",
    badge: "Corporate Tax 2026",
    metaTitle: "UAE Corporate Tax Registration & Return Filing | RBO Accounting",
    metaDescription: "UAE Corporate Tax registration, 0% & 9% return filing, Small Business Relief, and free zone tax planning. Professional tax consultants in UAE.",
    heroHeadline: "UAE Corporate Tax Compliance & Advisory",
    heroSubheadline: "Strategic corporate tax registration, financial statement adjustments, Small Business Relief elections, and EmaraTax return filing.",
    overview: [
      "The UAE Corporate Tax regime applies a standard 9% rate on taxable net profits exceeding AED 375,000, with a 0% rate on profits up to AED 375,000. All juridical entities (mainland LLCs, Free Zone companies, and foreign branches) must register on EmaraTax regardless of turnover.",
      "RBO Accounting guides you through registration, tax accounting adjustments, Qualifying Free Zone Person (QFZP) assessments, Small Business Relief elections, and annual tax return submissions."
    ],
    highlights: [
      {
        title: "0% vs 9% Optimization",
        desc: "Accurate profit calculations and deduction modeling under UAE Corporate Tax Law.",
        icon: "Percent"
      },
      {
        title: "Free Zone Qualifying Status",
        desc: "Substance and qualifying income audits to secure and maintain 0% tax status.",
        icon: "Building"
      },
      {
        title: "30 September Filing",
        desc: "Seamless annual return compilation for December year-end businesses.",
        icon: "Calendar"
      }
    ],
    subServices: [
      {
        slug: "registration",
        title: "Corporate Tax Registration",
        shortDesc: "Obtaining your Corporate Tax Registration Number (TRN) on EmaraTax.",
        fullDesc: "We manage corporate tax registration for mainland, free zone, and offshore entities, aligning your license activities and financial year to prevent late registration fines.",
        features: [
          "Mandatory EmaraTax account setup",
          "Shareholder & activity documentation",
          "Tax period & fiscal year alignment",
          "Issuance of Corporate Tax TRN"
        ]
      },
      {
        slug: "return-filing",
        title: "Annual Corporate Tax Return Filing",
        shortDesc: "Taxable profit computation and annual EmaraTax return submission.",
        fullDesc: "We take your IFRS financial statements, apply required tax adjustments (non-deductible expenses, depreciation, exempt income), and submit the official return with complete audit trails.",
        features: [
          "Accounting profit to taxable income reconciliation",
          "Expense deductibility analysis (interest, entertainment, etc.)",
          "EmaraTax return submission & tax liability payment",
          "Tax documentation archiving"
        ]
      },
      {
        slug: "planning",
        title: "Corporate Tax Planning & Advisory",
        shortDesc: "Group structuring, Small Business Relief election, and withholding tax advisory.",
        fullDesc: "Strategic guidance on utilizing Small Business Relief (revenue under AED 3M), structuring related-party transactions, and planning dividend or inter-group asset transfers efficiently.",
        features: [
          "Small Business Relief (SBR) eligibility & election",
          "Tax loss carry-forward management",
          "Corporate restructuring & group relief",
          "International tax & double tax treaty analysis"
        ]
      },
      {
        slug: "transfer-pricing",
        title: "Transfer Pricing Compliance",
        shortDesc: "Arm's length principle reviews, local file documentation, and disclosure forms.",
        fullDesc: "Ensuring all transactions with related parties and connected persons satisfy the arm's length standard, with documentation ready for FTA disclosure.",
        features: [
          "Related-party transaction benchmarking",
          "Local file and master file preparation",
          "Transfer pricing disclosure schedules",
          "Management fee & intercompany loan support"
        ]
      }
    ],
    faqs: [
      {
        q: "What is the UAE Corporate Tax rate in 2026?",
        a: "The standard rate is 0% on taxable profit up to AED 375,000, and 9% on taxable profit above AED 375,000. Qualifying Free Zone entities meeting substance conditions may also benefit from 0% on qualifying income."
      },
      {
        q: "When is the UAE Corporate Tax return due?",
        a: "The tax return and any tax liability payment are due within 9 months following the end of your financial year. For a financial year ending 31 December 2025, the deadline is 30 September 2026."
      },
      {
        q: "What is Small Business Relief (SBR)?",
        a: "Small Business Relief allows eligible UAE resident taxable persons with gross revenue under AED 3,000,000 in a tax period to elect to be treated as having no taxable income. This relief is available for periods ending on or before 31 December 2026."
      },
      {
        q: "Do Free Zone companies need to register for Corporate Tax?",
        a: "Yes. All Free Zone entities must register for UAE Corporate Tax and file an annual tax return, even if all their income qualifies for the 0% rate."
      }
    ]
  },

  "bookkeeping-and-accounting": {
    slug: "bookkeeping-and-accounting",
    title: "Bookkeeping & Accounting",
    badge: "Core Finance",
    metaTitle: "Bookkeeping & Accounting Services UAE | Monthly Accounts | RBO",
    metaDescription: "Professional monthly bookkeeping, bank reconciliation, financial reporting, and IFRS accounts in Dubai & Ajman. FTA-compliant accounting firm.",
    heroHeadline: "Accurate Bookkeeping & Monthly Accounting Services",
    heroSubheadline: "Real-time ledger maintenance, bank reconciliations, management accounts, and tax-ready financial statements for UAE businesses.",
    overview: [
      "Clean, updated books are the foundation of legal FTA compliance, corporate tax filings, and sound business decisions. RBO Accounting manages your day-to-day accounts using cloud platforms like QuickBooks, Zoho Books, and Xero.",
      "From daily invoice entry and vendor bill processing to monthly bank reconciliations and profit & loss reports, our dedicated accountants keep your numbers pristine."
    ],
    highlights: [
      {
        title: "Cloud Software Setup",
        desc: "Certified in Zoho Books, QuickBooks, Xero, and Tally for real-time reporting.",
        icon: "Laptop"
      },
      {
        title: "Tax-Ready Records",
        desc: "Every transaction mapped to appropriate VAT and Corporate Tax ledger codes.",
        icon: "FileCheck"
      },
      {
        title: "Management Reporting",
        desc: "Monthly balance sheets, P&L statements, and cash flow forecasts delivered on schedule.",
        icon: "BarChart3"
      }
    ],
    subServices: [
      {
        slug: "monthly-bookkeeping",
        title: "Monthly & Quarterly Bookkeeping",
        shortDesc: "Ongoing recording of sales, purchases, receipts, and payments.",
        fullDesc: "Dedicated accounting professionals record your financial transactions, maintain customer/supplier ledgers, and ensure proper double-entry accounting in accordance with IFRS standards.",
        features: [
          "Sales & purchase ledger maintenance",
          "Accounts payable & receivable management",
          "Expense categorisation & receipt reconciliation",
          "Monthly closing & journal entries"
        ]
      },
      {
        slug: "bank-reconciliation",
        title: "Bank & Payment Gateway Reconciliation",
        shortDesc: "Matching bank feeds, merchant processors (Stripe, Telr), and cash accounts.",
        fullDesc: "We reconcile multi-currency UAE bank accounts, Stripe/payment gateway fees, and company credit cards to identify discrepancies, unrecorded charges, and cash flow variances.",
        features: [
          "Multi-currency bank account reconciliation",
          "Payment gateway & fee matching",
          "Petty cash and credit card auditing",
          "Unreconciled items investigation"
        ]
      },
      {
        slug: "financial-reporting",
        title: "Financial Reporting & Management Accounts",
        shortDesc: "Monthly Profit & Loss, Balance Sheet, and Cash Flow Statements.",
        fullDesc: "Executive reporting packages designed for business owners, investors, and banks, detailing revenue growth, gross margins, operational expenses, and liquidity ratios.",
        features: [
          "P&L and Balance Sheet generation",
          "Cash flow statements & budget variance",
          "Key Performance Indicator (KPI) dashboards",
          "Year-end audit file preparation"
        ]
      }
    ],
    faqs: [
      {
        q: "Why do UAE businesses need professional bookkeeping?",
        a: "UAE Federal Law and FTA regulations require businesses to maintain commercial books and records for at least 5 years (15 years for real estate). Proper records are mandatory for filing VAT and Corporate Tax returns accurately."
      },
      {
        q: "Which accounting software does RBO support?",
        a: "We work with leading cloud accounting platforms including Zoho Books, QuickBooks Online, Xero, Tally Prime, and custom ERP systems."
      },
      {
        q: "Can you help clean up backlogged or messy accounts?",
        a: "Yes. We specialize in historical accounting cleanups, reconciling months or years of messy bank records to make your company audit-ready and tax-compliant."
      }
    ]
  },

  "audit-assurance": {
    slug: "audit-assurance",
    title: "Audit & Assurance",
    badge: "Independent Verification",
    metaTitle: "Audit & Assurance Services UAE | Free Zone & Statutory Audits | RBO",
    metaDescription: "Approved audit services for UAE Free Zones, statutory compliance, internal audit, and due diligence. Bank and authority-approved financial audits.",
    heroHeadline: "Independent Audit & Assurance Services",
    heroSubheadline: "Approved audit reports for Free Zone trade license renewals, statutory compliance, bank financing, and investor due diligence.",
    overview: [
      "Many UAE Free Zone authorities (including DMCC, JAFZA, DAFZA, Meydan, and Ajman Free Zone) require companies to submit audited financial statements for annual trade license renewals. Banks and corporate investors also require verified IFRS audit reports.",
      "RBO Accounting coordinates comprehensive audit and assurance engagements, delivering thorough, independent reviews that reinforce transparency and satisfy regulatory mandates."
    ],
    highlights: [
      {
        title: "Free Zone Approved",
        desc: "Audit reports accepted across major UAE Free Zone Authorities for license renewals.",
        icon: "Award"
      },
      {
        title: "IFRS Standard Compliance",
        desc: "Audits conducted under International Standards on Auditing (ISA) and IFRS.",
        icon: "FileCheck2"
      },
      {
        title: "Bank & Investor Ready",
        desc: "Credible financial statements for credit facilities, trade finance, and M&A.",
        icon: "Landmark"
      }
    ],
    subServices: [
      {
        slug: "free-zone-audit",
        title: "Free Zone License Renewal Audits",
        shortDesc: "Annual statutory audits mandatory for Free Zone authorities.",
        fullDesc: "We prepare and execute annual financial audits tailored to specific free zone regulations (DMCC, JAFZA, AFZ, IFZA, etc.), ensuring smooth license renewals without penalties.",
        features: [
          "Authority-specific audit checklist compliance",
          "Verification of share capital & reserves",
          "Review of related-party transactions",
          "Submission of final signed auditor's report"
        ]
      },
      {
        slug: "internal-audit",
        title: "Internal Audit & Risk Assessment",
        shortDesc: "Evaluating internal controls, governance, and fraud prevention.",
        fullDesc: "Independent evaluations of your operational processes, cash handling, procurement controls, and risk management systems to protect company assets and optimize efficiency.",
        features: [
          "Internal control testing & evaluation",
          "Fraud risk assessment",
          "Standard Operating Procedure (SOP) review",
          "Management recommendations report"
        ]
      },
      {
        slug: "due-diligence",
        title: "Financial Due Diligence",
        shortDesc: "M&A, business acquisition, and partnership financial evaluations.",
        fullDesc: "Deep financial analysis for prospective buyers, sellers, or investors, verifying earnings quality, asset valuations, unrecorded liabilities, and tax risks.",
        features: [
          "Quality of earnings (QoE) assessment",
          "Working capital & debt analysis",
          "Tax and legal risk identification",
          "Comprehensive due diligence report"
        ]
      }
    ],
    faqs: [
      {
        q: "Which UAE Free Zones require an annual audit?",
        a: "Authorities such as DMCC, JAFZA, DAFZA, Meydan, Ajman Free Zone, and DIFC mandate annual audited financial statements for company trade license renewals."
      },
      {
        q: "What documents are required for a company audit?",
        a: "Auditors require your Trial Balance, General Ledger, bank statements with confirmations, VAT returns, major customer/vendor invoices, payroll records, and incorporation documents."
      }
    ]
  },

  "payroll": {
    slug: "payroll",
    title: "Payroll & WPS Services",
    badge: "MOHRE & HR Compliance",
    metaTitle: "Payroll & WPS Compliance Services UAE | MOHRE Wage System | RBO",
    metaDescription: "UAE Wages Protection System (WPS) processing, monthly salary calculation, End of Service Gratuity (EOSB), and payroll compliance in UAE.",
    heroHeadline: "UAE Payroll & WPS Compliance Services",
    heroSubheadline: "Automated salary computations, SIF file generation for Wages Protection System (WPS), leave management, and End-of-Service gratuity calculations.",
    overview: [
      "Compliance with the UAE Ministry of Human Resources and Emiratisation (MOHRE) Wages Protection System (WPS) is mandatory for UAE businesses. Failure to process payroll through WPS on time results in company blockages, fines, and visa issuance freezes.",
      "RBO Accounting manages complete payroll cycles: calculating gross/net pay, deductions, overtime, leave tracking, and generating compliant Salary Information Files (SIF) for your bank."
    ],
    highlights: [
      {
        title: "100% WPS Compliance",
        desc: "Accurate SIF file generation preventing MOHRE labor fines and visa blockages.",
        icon: "CheckCircle2"
      },
      {
        title: "UAE Labor Law Expertise",
        desc: "Compliant End of Service Gratuity (EOSB) and leave salary calculations.",
        icon: "Scale"
      },
      {
        title: "Confidential Processing",
        desc: "Strict data security protocols protecting executive and employee salary data.",
        icon: "Lock"
      }
    ],
    subServices: [
      {
        slug: "wps-processing",
        title: "Wages Protection System (WPS) Execution",
        shortDesc: "Generating SIF files and routing payroll through central bank channels.",
        fullDesc: "We convert monthly employee attendance and adjustments into official SIF formats, verifying routing codes and submission timing to ensure full MOHRE compliance.",
        features: [
          "MOHRE compliant SIF file creation",
          "Bank & exchange house coordination",
          "Overtime, commission & allowance adjustments",
          "Salary slip generation for employees"
        ]
      },
      {
        slug: "gratuity-calculation",
        title: "End of Service Benefits (EOSB) Calculation",
        shortDesc: "Accurate gratuity settlement in compliance with UAE Federal Labor Law.",
        fullDesc: "Precise computation of severance pay, accrued leave, repatriation allowances, and notice period adjustments for departing employees under current UAE labor legislation.",
        features: [
          "Limited contract gratuity calculation",
          "Unused annual leave encashment",
          "Final settlement statement preparation",
          "MOHRE clearance documentation"
        ]
      }
    ],
    faqs: [
      {
        q: "What is WPS in the UAE?",
        a: "The Wages Protection System (WPS) is an electronic salary transfer system mandated by the UAE Central Bank and MOHRE to ensure workers receive agreed wages on time."
      },
      {
        q: "How is End of Service Gratuity calculated in UAE?",
        a: "Under current UAE Labor Law, gratuity is based on the employee's basic salary: 21 days' basic wage for each year of the first 5 years of service, and 30 days' basic wage for each additional year thereafter."
      }
    ]
  },

  "virtual-cfo": {
    slug: "virtual-cfo",
    title: "Virtual CFO Services",
    badge: "Strategic Advisory",
    metaTitle: "Virtual CFO Services UAE | Financial Planning & Advisory | RBO",
    metaDescription: "Part-time Virtual CFO and strategic financial advisory for UAE SMEs and scaleups. Budgeting, cash flow forecasting, and executive board reporting.",
    heroHeadline: "Virtual CFO & Strategic Financial Advisory",
    heroSubheadline: "High-level financial leadership, budgeting, cash flow forecasting, and investor reporting without the full-time executive overhead.",
    overview: [
      "Growing UAE businesses need seasoned financial leadership to navigate cash flow constraints, international expansion, bank negotiations, and investor relations. However, hiring a full-time CFO often costs over AED 500,000 annually.",
      "RBO's Virtual CFO service delivers elite financial controllership and strategic FP&A on a flexible, fractional basis — giving you boardroom-ready financial intelligence at a fraction of the cost."
    ],
    highlights: [
      {
        title: "Fractional Leadership",
        desc: "Executive financial strategy tailored to your budget and growth stage.",
        icon: "TrendingUp"
      },
      {
        title: "Cash Flow Mastery",
        desc: "13-week rolling cash flow models ensuring healthy working capital.",
        icon: "Coins"
      },
      {
        title: "Fundraising & Debt",
        desc: "Preparation of financial models and pitch decks for bank facilities and equity investors.",
        icon: "Briefcase"
      }
    ],
    subServices: [
      {
        slug: "cash-flow-budgeting",
        title: "Cash Flow Forecasting & Budgeting",
        shortDesc: "Predictive financial modeling and working capital management.",
        fullDesc: "We build rolling cash flow forecasts, operational budgets, and scenario analyses (best/worst case) to ensure your business maintains optimal liquidity for payroll, inventory, and expansion.",
        features: [
          "13-week rolling cash forecasts",
          "Annual budget compilation & department limits",
          "Working capital cycle optimization",
          "Burn rate and runway monitoring"
        ]
      },
      {
        slug: "management-reporting",
        title: "Executive & Board Reporting",
        shortDesc: "Visual KPI dashboards and board packs for leadership teams.",
        fullDesc: "Monthly executive summaries evaluating unit economics, customer acquisition cost (CAC), lifetime value (LTV), gross margins, and strategic recommendations.",
        features: [
          "Board-ready financial decks",
          "Unit economics and margin analysis",
          "Cost rationalization recommendations",
          "Attendance at monthly board meetings"
        ]
      }
    ],
    faqs: [
      {
        q: "What is a Virtual CFO?",
        a: "A Virtual CFO (Chief Financial Officer) provides high-level financial strategy, budgeting, forecasting, and oversight on a part-time or outsourced basis, eliminating the need for a full-time in-house executive salary."
      },
      {
        q: "When should a business hire a Virtual CFO?",
        a: "When your business is scaling rapidly, preparing for fundraising or bank loans, experiencing tight cash flows, or needing strategic direction beyond routine bookkeeping."
      }
    ]
  }
};

const serviceIconMap: Record<string, string> = {
  "vat-registration-filing": "Calculator",
  "corporate-tax": "Receipt",
  "bookkeeping-and-accounting": "FileSpreadsheet",
  "audit-assurance": "Search",
  "payroll": "Users2",
  "virtual-cfo": "LineChart",
};

export const servicesList = Object.values(servicesData).map((svc) => ({
  id: svc.slug,
  slug: svc.slug,
  title: svc.title,
  badge: svc.badge,
  metaTitle: svc.metaTitle,
  metaDescription: svc.metaDescription,
  heroHeadline: svc.heroHeadline,
  heroSubheadline: svc.heroSubheadline,
  shortDesc: svc.heroSubheadline,
  fullContent: svc.overview.join("\n\n"),
  icon: serviceIconMap[svc.slug] || "Calculator",
  subServices: svc.subServices,
  highlights: svc.highlights.map((h) => `${h.title}: ${h.desc}`),
  rawHighlights: svc.highlights,
  faqs: svc.faqs,
}));
