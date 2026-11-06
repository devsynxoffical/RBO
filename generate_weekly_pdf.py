from fpdf import FPDF
import shutil
import os

class SEOReportPDF(FPDF):
    def header(self):
        self.set_fill_color(14, 28, 54)
        self.rect(0, 0, 210, 28, 'F')
        self.set_fill_color(214, 163, 62)
        self.rect(0, 28, 210, 1.8, 'F')

        self.set_y(6)
        self.set_x(12)
        self.set_font('Helvetica', 'B', 13.5)
        self.set_text_color(255, 255, 255)
        self.cell(0, 7, 'RBO ACCOUNTING SERVICES FZE - 2-WEEK DAY-BY-DAY SEO & ARABIC REPORT', new_x="LMARGIN", new_y="NEXT")

        self.set_x(12)
        self.set_font('Helvetica', '', 8.5)
        self.set_text_color(214, 163, 62)
        self.cell(0, 5, 'Property: rboaccounting.ae (EN + AR)  |  Period: Oct 21 - Nov 6, 2026  |  Live Sitemap: 149 Indexable URLs (38 Posts + 111 Pages)', new_x="LMARGIN", new_y="NEXT")
        self.ln(8)

    def footer(self):
        self.set_y(-13)
        self.set_draw_color(214, 163, 62)
        self.line(12, self.get_y(), 198, self.get_y())
        self.ln(2)
        self.set_font('Helvetica', 'I', 8)
        self.set_text_color(100, 116, 139)
        self.cell(0, 6, f'RBO Accounting Services FZE - Executive 2-Week SEO, Arabic Localization & Indexing Report (Oct 21 - Nov 6, 2026)  |  Page {self.page_no()}/{{nb}}', align='C')

    def section_title(self, num, title):
        if self.get_y() > 245:
            self.add_page()
        self.ln(2)
        self.set_fill_color(241, 245, 249)
        self.set_draw_color(214, 163, 62)
        self.set_line_width(0.8)
        y = self.get_y()
        self.rect(12, y, 186, 8.5, 'F')
        self.line(12, y, 12, y + 8.5)
        self.set_xy(15, y + 1.5)
        self.set_font('Helvetica', 'B', 10.5)
        self.set_text_color(14, 28, 54)
        self.cell(0, 5.5, f'{num}. {title}', new_x="LMARGIN", new_y="NEXT")
        self.ln(3)

    def day_block(self, day_label, badge, bullets):
        if self.get_y() > 235:
            self.add_page()
        self.set_fill_color(14, 28, 54)
        self.set_text_color(255, 255, 255)
        self.set_font('Helvetica', 'B', 9.2)
        self.set_x(12)
        self.cell(142, 6.8, f'  {day_label}', fill=True)
        self.set_fill_color(214, 163, 62)
        self.set_text_color(14, 28, 54)
        self.set_font('Helvetica', 'B', 8)
        self.cell(44, 6.8, badge, fill=True, align='C', new_x="LMARGIN", new_y="NEXT")
        self.ln(1.5)

        self.set_font('Helvetica', '', 8.4)
        self.set_text_color(30, 41, 59)
        for b in bullets:
            if self.get_y() > 268:
                self.add_page()
            self.set_x(14)
            self.multi_cell(182, 4.4, f"- {b}", new_x="LMARGIN", new_y="NEXT")
            self.ln(0.8)
        self.ln(2)

    def table_row(self, cols, widths, is_header=False, shade=False):
        if self.get_y() > 262:
            self.add_page()
        line_h = 4.5
        max_lines = 1
        self.set_font('Helvetica', 'B' if is_header else '', 8 if is_header else 7.8)
        for text, w in zip(cols, widths):
            lines = self.multi_cell(w - 2, line_h, text, dry_run=True, output="LINES")
            if len(lines) > max_lines:
                max_lines = len(lines)
        row_h = max_lines * line_h + 2.5
        if self.get_y() + row_h > 272:
            self.add_page()

        x_start = 12
        y_start = self.get_y()
        for i, (text, w) in enumerate(zip(cols, widths)):
            self.set_xy(x_start, y_start)
            if is_header:
                self.set_fill_color(14, 28, 54)
                self.set_text_color(255, 255, 255)
                self.set_draw_color(14, 28, 54)
            else:
                if shade:
                    self.set_fill_color(248, 250, 252)
                else:
                    self.set_fill_color(255, 255, 255)
                self.set_text_color(30, 41, 59)
                self.set_draw_color(226, 232, 240)
            self.set_line_width(0.2)
            self.rect(x_start, y_start, w, row_h, 'FD')
            self.set_xy(x_start + 1.2, y_start + 1.2)
            self.multi_cell(w - 2.4, line_h, text, new_x="RIGHT", new_y="TOP")
            x_start += w
        self.set_y(y_start + row_h)


def build_pdf():
    pdf = SEOReportPDF()
    pdf.alias_nb_pages()
    pdf.set_auto_page_break(auto=True, margin=15)
    pdf.add_page()

    # Section 1: Executive Scorecard
    pdf.section_title("1", "EXECUTIVE SCORECARD (OCTOBER 21 - NOVEMBER 6, 2026)")
    w_kpi = [58, 38, 45, 45]
    pdf.table_row(["KPI / Deliverable Category", "Before (Oct 20)", "Live Status (Nov 6)", "Net Growth / Impact"], w_kpi, is_header=True)
    kpi_rows = [
        ("Total Indexable Sitemap URLs", "66 URLs (EN)", "149 URLs (75 EN + 74 AR)", "+83 New Live URLs (+125.7%)"),
        ("Published Pillar Blogs (post-sitemap.xml)", "10 EN Blogs", "38 Blogs (19 EN + 19 AR)", "+8 New EN Blogs & +19 Full AR Blogs"),
        ("Core, Service & Emirate Pages (page-sitemap)", "56 EN Pages", "111 Pages (56 EN + 55 AR)", "+55 Full 100% Arabic RTL Pages"),
        ("GSC High-Impression Pages Overhauled", "Baseline", "16 Core Money Pages", "2,650+ GSC Impressions Overhauled"),
        ("Arabic RTL Localization (Polylang + UI)", "0% (EN Only)", "100% Complete (EN | AR)", "Custom AR Header/Footer + RTL Menus"),
        ("Custom 16:9 SEO Infographics", "15 Diagrams", "38 Regulatory Diagrams", "+23 New Infographics (190+ files)"),
        ("Structured Data & Hreflang Tags", "Partial", "180+ Schema FAQs Live", "FAQPage + Service + en-ae/ar-ae"),
        ("Instant Indexing (IndexNow + GSC)", "Manual Only", "149 URLs Pushed (HTTP 202)", "Uncached Sitemaps + 12-Day Schedule"),
    ]
    for idx, r in enumerate(kpi_rows):
        pdf.table_row(list(r), w_kpi, shade=(idx % 2 == 1))
    pdf.ln(3)

    # Section 2: Day-by-Day Chronological Log
    pdf.section_title("2", "DAY-BY-DAY CHRONOLOGICAL WORK LOG (OCT 21 - NOV 6, 2026)")

    pdf.day_block(
        "Day 1 - Wed, Oct 21, 2026: Virtual CFO Pillar Blog & Regional/Accounting Overhauls",
        "Blog #11 + 4 Pages",
        [
            "Published Master Pillar Blog #11 (EN): 'Virtual CFO Services in Dubai & UAE: The Complete 2026 Guide to Fractional CFOs, Cost vs In-House & Financial Modeling' (/virtual-cfo-services-dubai-uae-fractional-cfo-guide-2026/) - 3,600+ words, 3 bespoke infographics, 8 Schema FAQs ranking /our-services/virtual-cfo/management-reporting/.",
            "Overhauled 4 Core Pages: Abu Dhabi Hub (/areas-we-serve/abu-dhabi/), Ajman Hub (/areas-we-serve/ajman/), Accounts Payable & Receivable, and FTA Records Amendment with 2026 EmaraTax statutory matrices and FAQPage JSON-LD."
        ]
    )

    pdf.day_block(
        "Day 2 - Fri, Oct 23, 2026: FTA Tax Audit Defense Pillar Blog & Service Authority Upgrade",
        "Blog #12 + Audit Page",
        [
            "Published Master Pillar Blog #12 (EN): 'FTA Tax Audit in UAE (2026 Guide): How to Prepare for Corporate Tax & VAT Audits, FAF File Checklist & Penalty Defense' (/fta-tax-audit-assistance-uae-corporate-tax-vat-guide-2026/) - 3,500+ words, 3 infographics, 8 Schema FAQs.",
            "Service Page Upgrade: Injected 2026 FTA Audit Defense Callout Card & FAQ schema onto /our-services/vat-registration-filing/fta-audit-assistance/."
        ]
    )

    pdf.day_block(
        "Day 3 - Mon, Oct 26, 2026: UAE Statutory Audit Pillar Blog & 4 High-Impression GSC Overhauls",
        "Blog #13 + 806 Imp.",
        [
            "Published Master Pillar Blog #13 (EN): 'UAE Statutory Audit Guide 2026: Mandatory Corporate Tax Audit Thresholds (MD 82 & 84), Free Zone Rules & Checklist' (/uae-statutory-audit-guide-2026-mandatory-corporate-tax-rules-checklist/) - 3,800+ words, 3 infographics, 8 Schema FAQs.",
            "Overhauled 4 High-Impression Zero-Click GSC Pages (806 Combined Impressions): Penalty Reconsideration (210 Imp., fixed 404 via 301 redirect + 10 FAQs), Free Zone Audit (206 Imp., DMCC/JAFZA/IFZA/AFZ/RAKEZ matrix + 10 FAQs), VAT Advisory (201 Imp., fixed 404 via 301 redirect + 10 FAQs), and Statutory Audit (189 Imp., MD 82/84 matrix + 10 FAQs)."
        ]
    )

    pdf.day_block(
        "Day 4 - Thu, Oct 29, 2026: UAE Accounting & Bookkeeping Blog, 36-Page Hero Fix & Clutch.co",
        "Blog #14 + 36 Pages UI",
        [
            "Published Master Pillar Blog #14 (EN): 'UAE Accounting & Bookkeeping Guide 2026: Mandatory Corporate Tax Rules, 7-Year FTA Record Keeping & IFRS Checklist' (/uae-accounting-bookkeeping-guide-2026-mandatory-corporate-tax-ifrs-rules/) - 3,500+ words, 3 infographics, 8 Schema FAQs.",
            "Universal Hero Banner & Responsive UI Fix: Repaired hero headline alignment and mobile spacing across all 36 service subpages.",
            "Off-Page Authority: Completed verified B2B vendor profile setup on Clutch.co."
        ]
    )

    pdf.day_block(
        "Day 5 - Fri, Oct 30, 2026: WPS Payroll Blog, Corporate Tax Overhauls & 8-Week SEO Roadmap",
        "Blog #15 + 50 Titles",
        [
            "Published Master Pillar Blog #15 (EN): 'UAE Payroll & WPS Compliance Guide 2026: MOHRE Rules, SIF File Format, 15th-Day Deadlines & Fines' (/uae-payroll-wps-compliance-guide-2026-mohre-sif-fines/) - 3,500+ words, 2 infographics, 8 Schema FAQs.",
            "Overhauled Corporate Tax Planning (194 Imp.) & Registration (191 Imp.): Added Cabinet Decision No. 105 AED 10,000 Late Penalty Waiver Banner, Small Business Relief (AED 3M) matrix, and 20 Schema FAQs.",
            "Executed 8-Week SEO Roadmap (Phase 1 & 2): 301 redirected /?utm_source=... to /, standardized 50 Rank Math SEO Titles, injected 4-Column 48-Link Service Directory on Homepage & /our-services/, expanded Ajman Hub to a 3,205-word Super-Page, and boosted 4 striking-distance queries (Pos 5 to Pos 24)."
        ]
    )

    pdf.day_block(
        "Day 6 - Mon, Nov 2, 2026: AP/AR Outsourcing Blog, Master Homepage (1,035+ Imp.), Sharjah & GBP",
        "Blog #16 + Homepage",
        [
            "Published Master Pillar Blog #16 (EN): 'UAE Accounts Payable & Receivable (AP/AR) Outsourcing Guide 2026: 3-Way Invoice Matching, DSO Optimization & E-Invoicing Readiness' (/uae-accounts-payable-receivable-outsourcing-guide-2026/) - 3,600+ words, 2 infographics, 8 Schema FAQs.",
            "Master Homepage Overhaul (1,035+ Combined GSC Impressions): Added 2026 UAE Executive Financial & Tax Governance Matrix + 10 Schema FAQs.",
            "Sharjah Regional Hub Overhaul (151 Imp.): Rebuilt /areas-we-serve/sharjah/ with RAK-matched luxury hero, HFZA/SAIF/SPC vs SEDD Mainland Matrix & 10 Schema FAQs.",
            "GBP & UAE Local Citation: Added 7 GBP services, published weekly GBP update post, and launched live citation on EnrollBusiness UAE (uae.enrollbusiness.com/BusinessProfile/8027551/RBO%20Accounting%20Services%20FZE)."
        ]
    )

    pdf.day_block(
        "Day 7 - Thu, Nov 5, 2026: VAT Refund Sector Overhaul, AFZ AED 11k Blog & Polylang RTL Engine",
        "Blog #17 + Polylang",
        [
            "VAT Refund B2B Sector Overhaul (/our-services/vat-registration-filing/refund/): Added 3-column Eligibility Framework for Commercial Landlords (Article 57 CAS), Engineering Consultants (Article 31 0% Export), and Civil/MEP Contractors (Cabinet Decision 91/2023 RCM) + 10 Schema FAQs.",
            "Published Master Pillar Blog #17 (EN): 'AFZ New Lighter Package 2026: Complete Guide to AED 11,000 1-Visa Company Setup in Ajman Free Zone' (/afz-new-lighter-package-2026-ajman-free-zone-setup/).",
            "Launched Bilingual Polylang + Elementor RTL Engine (EN | AR): Built custom Arabic Elementor header/footer templates (header-ar.json / footer-ar.json), runtime cache isolation, and floating language toggle pill."
        ]
    )

    pdf.day_block(
        "Day 8 - Fri, Nov 6, 2026 (Today): 100% Arabic Site (55 Pages + 19 Blogs), Transfer Pricing Blog & Indexing",
        "100% AR + 149 URLs",
        [
            "100% Arabic Localization & Luxury RTL Styling Across All 55 Pages: Deployed complete executive Arabic translations and fixed RTL flex layouts across Arabic Homepage (/ar/), About Us (/ar/about-us-2/), Contact Us (/ar/contact-us-2/), all 36 Our Services & Business Setup pages, and all 7 Emirates Regional Hubs (Dubai, Abu Dhabi, Sharjah, Ajman, Ras Al Khaimah, Fujairah, Umm Al Quwain).",
            "Arabic Header Spacing & SmartMenus Dropdown Fix: Added 28px gap before the Arabic CTA button, restored golden .sub-arrow indicators, and fixed SmartMenus RTL submenu positioning (rightToLeftSubMenus = false) so Our Services & Emirates dropdowns open smoothly.",
            "100% Arabic Blog Archive (/ar/blog-2/) & All 19 Full Arabic Blog Detail Pages: Created archive-ar.json & single-post-ar.json templates and deployed full-length executive Arabic translations for all 19 blog posts.",
            "Published New Trending Pillar Blog #18 (EN + AR) - UAE Transfer Pricing Guide 2026: Published /uae-transfer-pricing-guide-2026-local-master-file-arms-length-rules/ (EN) and /ar/uae-transfer-pricing-guide-2026-local-master-file-arms-length-rules-ar/ (AR) with 3 custom 16:9 infographics (15 files), 8 EN + 6 AR Schema FAQs, and upgraded /our-services/corporate-tax/transfer-pricing/ & /ar/transfer-pricing/.",
            "Full 149-URL Live Sitemaps, Hreflang, IndexNow API & 12-Day GSC Schedule: Flushed Rank Math caches so post-sitemap.xml serves 38 URLs (19 EN + 19 AR) and page-sitemap.xml serves 111 URLs (56 EN + 55 AR); deployed bidirectional en-ae/ar-ae hreflang tags; pushed all 149 URLs via IndexNow API (HTTP 202 Accepted); and created the 12-Day GSC Indexing Schedule (12 URLs/day)."
        ]
    )

    # Section 3: Bilingual Blog Inventory Table
    pdf.section_title("3", "BILINGUAL PILLAR BLOG INVENTORY (19 EN + 19 AR = 38 LIVE BLOG URLS)")
    w_blog = [22, 52, 56, 56]
    pdf.table_row(["Date", "Pillar Topic & Target Service", "English URL (en-AE)", "100% Arabic URL (ar-AE)"], w_blog, is_header=True)
    blogs = [
        ("Nov 6, 2026", "UAE Transfer Pricing Guide 2026 (Target: Transfer Pricing)", "/uae-transfer-pricing-guide-2026-local-master-file-arms-length-rules/", "/ar/uae-transfer-pricing-guide-2026-local-master-file-arms-length-rules-ar/"),
        ("Nov 5, 2026", "AFZ Lighter Package AED 11,000 (Target: Free Zone Setup)", "/afz-new-lighter-package-2026-ajman-free-zone-setup/", "/ar/afz-new-lighter-package-2026-ajman-free-zone-setup-ar/"),
        ("Nov 2, 2026", "UAE AP & AR Outsourcing 2026 (Target: AP/AR Management)", "/uae-accounts-payable-receivable-outsourcing-guide-2026/", "/ar/uae-accounts-payable-receivable-outsourcing-guide-2026-ar/"),
        ("Oct 30, 2026", "UAE Payroll & WPS Guide 2026 (Target: WPS Compliance)", "/uae-payroll-wps-compliance-guide-2026-mohre-sif-fines/", "/ar/uae-payroll-wps-compliance-guide-2026-mohre-sif-fines-ar/"),
        ("Oct 29, 2026", "UAE Accounting & Bookkeeping 2026 (Target: Bookkeeping)", "/uae-accounting-bookkeeping-guide-2026-mandatory-corporate-tax-ifrs-rules/", "/ar/uae-accounting-bookkeeping-guide-2026-mandatory-corporate-tax-ifrs-rules-ar/"),
        ("Oct 26, 2026", "UAE Statutory Audit Guide 2026 (Target: Statutory Audit)", "/uae-statutory-audit-guide-2026-mandatory-corporate-tax-rules-checklist/", "/ar/uae-statutory-audit-guide-2026-mandatory-corporate-tax-rules-checklist-ar/"),
        ("Oct 23, 2026", "FTA Tax Audit Assistance 2026 (Target: FTA Audit Defense)", "/fta-tax-audit-assistance-uae-corporate-tax-vat-guide-2026/", "/ar/fta-tax-audit-assistance-uae-corporate-tax-vat-guide-2026-ar/"),
        ("Oct 21, 2026", "Virtual CFO Services UAE 2026 (Target: Virtual CFO)", "/virtual-cfo-services-dubai-uae-fractional-cfo-guide-2026/", "/ar/virtual-cfo-services-dubai-uae-fractional-cfo-guide-2026-ar/"),
        ("Localized Nov 6", "+ 11 Earlier Tax, VAT, Audit & Setup Pillar Blogs", "All 11 Earlier EN Pillar Blogs Live in post-sitemap.xml", "All 11 Corresponding Full Arabic Blogs Live under /ar/...-ar/"),
    ]
    for idx, b in enumerate(blogs):
        pdf.table_row(list(b), w_blog, shade=(idx % 2 == 1))

    out_primary = r"d:\Rboo\RBO_Accounting_Two_Week_SEO_Work_Report_Nov_6_2026.pdf"
    pdf.output(out_primary)

    # Copy to all standard destinations
    targets = [
        r"d:\Rboo\RBO_Accounting_Weekly_SEO_Work_Report_Oct_2026.pdf",
        r"D:\RBO_Accounting_Two_Week_SEO_Work_Report_Nov_6_2026.pdf",
        r"C:\Users\RANA\Desktop\RBO_Accounting_Two_Week_SEO_Work_Report_Nov_6_2026.pdf",
    ]
    for t in targets:
        try:
            shutil.copyfile(out_primary, t)
        except Exception as e:
            print(f"Warning copying to {t}: {e}")

    shutil.copyfile(
        r"d:\Rboo\RBO_Accounting_Two_Week_SEO_Work_Report_Nov_6_2026.html",
        r"d:\Rboo\RBO_Accounting_Weekly_SEO_Work_Report_Oct_2026.html"
    )
    print("Successfully generated PDF and HTML reports.")

if __name__ == "__main__":
    build_pdf()
