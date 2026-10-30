import os
import sys
from reportlab.lib.pagesizes import A4
from reportlab.lib import colors
from reportlab.platypus import (
    SimpleDocTemplate, Paragraph, Spacer, Table, TableStyle, PageBreak, KeepTogether, HRFlowable
)
from reportlab.lib.styles import getSampleStyleSheet, ParagraphStyle
from reportlab.lib.enums import TA_CENTER, TA_LEFT, TA_RIGHT, TA_JUSTIFY
from reportlab.pdfgen import canvas

pdf_path = r"d:\Rboo\RBO_Accounting_Weekly_SEO_Work_Report_Oct_2026.pdf"

class NumberedCanvas(canvas.Canvas):
    def __init__(self, *args, **kwargs):
        super(NumberedCanvas, self).__init__(*args, **kwargs)
        self._saved_page_states = []

    def showPage(self):
        self._saved_page_states.append(dict(self.__dict__))
        self._startPage()

    def save(self):
        num_pages = len(self._saved_page_states)
        for state in self._saved_page_states:
            self.__dict__.update(state)
            self.draw_page_decorations(num_pages)
            super(NumberedCanvas, self).showPage()
        super(NumberedCanvas, self).save()

    def draw_page_decorations(self, page_count):
        self.saveState()
        self.setFont("Helvetica", 8)
        self.setFillColor(colors.HexColor("#64748b"))
        
        # Header (pages > 1)
        if self._pageNumber > 1:
            self.drawString(40, 810, "RBO Accounting Services FZE — Master Weekly Engineering & SEO Report")
            self.drawRightString(555, 810, "October 2026")
            self.setStrokeColor(colors.HexColor("#e2e8f0"))
            self.setLineWidth(0.5)
            self.line(40, 804, 555, 804)
            
        # Footer (all pages)
        self.setStrokeColor(colors.HexColor("#e2e8f0"))
        self.setLineWidth(0.5)
        self.line(40, 42, 555, 42)
        
        self.drawString(40, 30, "Confidential — Prepared for Executive Management | www.rboaccounting.ae")
        self.drawRightString(555, 30, f"Page {self._pageNumber} of {page_count}")
        self.restoreState()

def build_pdf():
    doc = SimpleDocTemplate(
        pdf_path,
        pagesize=A4,
        leftMargin=36,
        rightMargin=36,
        topMargin=46,
        bottomMargin=48
    )

    styles = getSampleStyleSheet()

    # Custom Color Palette
    c_primary = colors.HexColor("#09203b")    # Deep Luxury Navy
    c_secondary = colors.HexColor("#c59b27")  # Deep Gold Accent
    c_dark = colors.HexColor("#1e293b")       # Slate 800
    c_muted = colors.HexColor("#64748b")      # Slate 500
    c_light = colors.HexColor("#f8fafc")      # Slate 50
    c_green = colors.HexColor("#166534")      # Emerald 800
    c_border = colors.HexColor("#e2e8f0")

    # Typography Styles
    title_style = ParagraphStyle(
        'DocTitle',
        parent=styles['Normal'],
        fontName='Helvetica-Bold',
        fontSize=20,
        leading=24,
        textColor=c_primary,
        spaceAfter=4
    )

    subtitle_style = ParagraphStyle(
        'DocSubtitle',
        parent=styles['Normal'],
        fontName='Helvetica',
        fontSize=10,
        leading=14,
        textColor=c_muted,
        spaceAfter=12
    )

    h1_style = ParagraphStyle(
        'Heading1_Custom',
        parent=styles['Normal'],
        fontName='Helvetica-Bold',
        fontSize=12.5,
        leading=16,
        textColor=c_primary,
        spaceBefore=12,
        spaceAfter=6,
        keepWithNext=True
    )

    h2_style = ParagraphStyle(
        'Heading2_Custom',
        parent=styles['Normal'],
        fontName='Helvetica-Bold',
        fontSize=10,
        leading=13,
        textColor=c_secondary,
        spaceBefore=8,
        spaceAfter=4,
        keepWithNext=True
    )

    body_style = ParagraphStyle(
        'Body_Custom',
        parent=styles['Normal'],
        fontName='Helvetica',
        fontSize=8.5,
        leading=11.5,
        textColor=c_dark,
        spaceAfter=4
    )

    bullet_style = ParagraphStyle(
        'Bullet_Custom',
        parent=styles['Normal'],
        fontName='Helvetica',
        fontSize=8.3,
        leading=11.2,
        textColor=c_dark,
        leftIndent=12,
        firstLineIndent=-8,
        spaceAfter=3
    )

    subbullet_style = ParagraphStyle(
        'SubBullet_Custom',
        parent=styles['Normal'],
        fontName='Helvetica',
        fontSize=8,
        leading=10.5,
        textColor=colors.HexColor("#334155"),
        leftIndent=24,
        firstLineIndent=-8,
        spaceAfter=2
    )

    badge_style = ParagraphStyle(
        'Badge',
        parent=styles['Normal'],
        fontName='Helvetica-Bold',
        fontSize=7.5,
        leading=9,
        textColor=c_green,
        alignment=TA_CENTER
    )

    table_header_style = ParagraphStyle(
        'TH',
        parent=styles['Normal'],
        fontName='Helvetica-Bold',
        fontSize=8,
        leading=10,
        textColor=colors.white,
        alignment=TA_LEFT
    )

    table_body_style = ParagraphStyle(
        'TB',
        parent=styles['Normal'],
        fontName='Helvetica',
        fontSize=7.8,
        leading=10,
        textColor=c_dark
    )

    story = []

    # 1. Title Banner
    story.append(Paragraph("RBO ACCOUNTING SERVICES FZE", ParagraphStyle('TopSub', fontName='Helvetica-Bold', fontSize=8.5, textColor=c_secondary, leading=11, spaceAfter=2)))
    story.append(Paragraph("Master Weekly SEO, Technical Engineering & Growth Report", title_style))
    story.append(Paragraph("<b>Reporting Period:</b> October 23, 2026 – October 30, 2026 &nbsp;|&nbsp; <b>Website:</b> https://www.rboaccounting.ae &nbsp;|&nbsp; <b>Status:</b> 100% Live & Verified", subtitle_style))
    story.append(HRFlowable(width="100%", thickness=1.5, color=c_primary, spaceBefore=0, spaceAfter=10))

    # 2. Executive Scorecard Table
    scorecard_data = [
        [
            Paragraph("<b>4 Master Pillar Blogs</b><br/><font color='#64748b'>14,500+ Words Technical Law</font>", body_style),
            Paragraph("<b>6 GSC Hubs Overhauled</b><br/><font color='#64748b'>800+ Impressions Targeted</font>", body_style),
            Paragraph("<b>36 Service Heroes Fixed</b><br/><font color='#64748b'>0 CSS Regressions / 100% Mobile</font>", body_style),
            Paragraph("<b>56+ Rich FAQs Added</b><br/><font color='#64748b'>Validated JSON-LD Schema</font>", body_style),
            Paragraph("<b>Clutch Profile Verified</b><br/><font color='#64748b'>vendor.clutch.co Active</font>", body_style),
        ]
    ]
    t_scorecard = Table(scorecard_data, colWidths=[105, 105, 105, 105, 95])
    t_scorecard.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,-1), colors.HexColor("#f1f5f9")),
        ('BOX', (0,0), (-1,-1), 0.5, c_border),
        ('INNERGRID', (0,0), (-1,-1), 0.5, c_border),
        ('TOPPADDING', (0,0), (-1,-1), 6),
        ('BOTTOMPADDING', (0,0), (-1,-1), 6),
        ('LEFTPADDING', (0,0), (-1,-1), 6),
        ('RIGHTPADDING', (0,0), (-1,-1), 6),
    ]))
    story.append(t_scorecard)
    story.append(Spacer(1, 10))

    # 3. Today's Deliverables (Friday, October 30, 2026)
    story.append(Paragraph("1. Deliverables Executed Today (Friday, October 30, 2026)", h1_style))
    story.append(Paragraph("• <b>Published Master Pillar Blog #4 (UAE Payroll & WPS Compliance 2026):</b>", bullet_style))
    story.append(Paragraph("– <b>Live URL:</b> <font color='#09203b'>https://www.rboaccounting.ae/uae-payroll-wps-compliance-guide-2026-mohre-sif-fines/</font>", subbullet_style))
    story.append(Paragraph("– <b>Key Legal Framework:</b> Ministerial Resolution No. 340 of 2026; complete abolition of the historical 15-day grace period; mandatory salary clearing by the 1st of every Gregorian month.", subbullet_style))
    story.append(Paragraph("– <b>Technical Compliance:</b> Automated 85% salary threshold, graduated MOHRE enforcement timeline (Day 1 flagging to Day 22+ judicial asset freezes), and 4 SIF (Salary Information File) data structures.", subbullet_style))
    story.append(Paragraph("– <b>Corporate Tax Linkage:</b> Article 28 salary deduction substantiation to prevent disallowed expenses and retroactive 9% penalties.", subbullet_style))
    story.append(Paragraph("– <b>Media & Schema:</b> Deployed 2 bespoke 16:9 graphics (Dubai executive office hero + WPS 2026 compliance dashboard) and 8 Schema.org FAQPage questions.", subbullet_style))
    
    story.append(Spacer(1, 4))
    story.append(Paragraph("• <b>Overhauled Top GSC Page #1 — Corporate Tax Planning UAE (Page ID: 3034):</b>", bullet_style))
    story.append(Paragraph("– <b>Live URL:</b> <font color='#09203b'>https://www.rboaccounting.ae/our-services/corporate-tax/corporate-tax-planning/</font> (Targeting 194 impressions).", subbullet_style))
    story.append(Paragraph("– <b>SEO Title:</b> <i>Corporate Tax Planning UAE 2026: 0% Free Zone, SBR & Tax Groups | RBO</i>", subbullet_style))
    story.append(Paragraph("– <b>Content Upgrades:</b> 6 Core Pillars grid (Free Zone 0% QFZP, Small Business Relief AED 3M cap, Tax Groups Article 40, Transfer Pricing Articles 34/35, 30% EBITDA Interest Cap, Indefinite Tax Loss Offset Article 37).", subbullet_style))
    story.append(Paragraph("– <b>Comparison Table & Rich FAQs:</b> Integrated Proactive vs. Reactive comparison table and 10 detailed FAQs backed by JSON-LD FAQPage schema.", subbullet_style))

    story.append(Spacer(1, 4))
    story.append(Paragraph("• <b>Overhauled Top GSC Page #2 — Corporate Tax Registration UAE (Page ID: 2567):</b>", bullet_style))
    story.append(Paragraph("– <b>Live URL:</b> <font color='#09203b'>https://www.rboaccounting.ae/our-services/corporate-tax/registration/</font> (Targeting 191 impressions).", subbullet_style))
    story.append(Paragraph("– <b>SEO Title:</b> <i>Corporate Tax Registration UAE 2026: EmaraTax TRN, Deadlines & Penalty Guide | RBO</i>", subbullet_style))
    story.append(Paragraph("– <b>Penalty Amnesty Callout:</b> Added Cabinet Decision No. 105 of 2021 statutory guidance on how penalized businesses can appeal the AED 10,000 late fine within 40 business days.", subbullet_style))
    story.append(Paragraph("– <b>Internal Interlinking:</b> Direct bridge to Penalty Reconsideration hub and Bookkeeping guides.", subbullet_style))

    story.append(Spacer(1, 4))
    story.append(Paragraph("• <b>Search Console URL Inspection & Quota Guidance:</b> Verified canonical paths, monitored daily quota thresholds, and validated automatic XML sitemap crawling.", bullet_style))
    story.append(Paragraph("• <b>Zero CSS Regressions:</b> Checked and confirmed that all service page styles remained 100% accurate and visually intact.", bullet_style))

    story.append(Spacer(1, 8))

    # 4. Weekly Achievements (Oct 23 - Oct 29, 2026)
    story.append(Paragraph("2. Full Weekly Achievements & Milestones (October 23 – October 29, 2026)", h1_style))
    
    story.append(Paragraph("• <b>Pillar Blog #3: UAE Accounting & Bookkeeping Guide 2026 (Oct 29):</b>", bullet_style))
    story.append(Paragraph("– <b>Live URL:</b> <font color='#09203b'>https://www.rboaccounting.ae/uae-accounting-bookkeeping-guide-2026-mandatory-corporate-tax-ifrs-rules/</font>", subbullet_style))
    story.append(Paragraph("– <b>Regulatory Scope:</b> Article 56 7-year document retention checklist, IFRS for SMEs threshold (AED 50M), cash vs accrual accounting limits (AED 3M), and 8 Schema.org FAQs.", subbullet_style))

    story.append(Spacer(1, 3))
    story.append(Paragraph("• <b>Universal Hero Banner & CSS Alignment Across All 36 Service Subpages (Oct 29):</b>", bullet_style))
    story.append(Paragraph("– <b>Hero Layout Fixes:</b> Eliminated awkward whitespace below headers, unified padding across all desktop and mobile viewports, and ensured background images render with high contrast.", subbullet_style))
    story.append(Paragraph("– <b>Browser Cache Busting:</b> Added server-side directives in .htaccess (<font face='Courier'>Cache-Control: no-cache, must-revalidate</font>) to guarantee instant updates for returning users.", subbullet_style))

    story.append(Spacer(1, 3))
    story.append(Paragraph("• <b>Off-Page Citation & Directory Profile Optimization (Oct 29):</b>", bullet_style))
    story.append(Paragraph("– <b>Clutch.co Verified Profile:</b> Unlocked and populated verified vendor profile for RBO Accounting Services FZE (vendor.clutch.co) with service line allocations (Accounting 60%, Financial Consulting 25%, Advising 15%), hourly rates ($50–$99), and official AFZA licensing credentials.", subbullet_style))
    story.append(Paragraph("– <b>Trustpilot & Citation Research:</b> Evaluated citation backlink mechanics and mapped AEO (Answer Engine Optimization) presence across Gemini and ChatGPT.", subbullet_style))

    story.append(Spacer(1, 3))
    story.append(Paragraph("• <b>Google Business Profile (Google Maps) Review Audit & Diagnostics (Oct 29):</b>", bullet_style))
    story.append(Paragraph("– <b>Database vs Public Audit:</b> Investigated why reviews appeared in internal Google workflow tool (<font face='Courier'>support.google.com/business/workflow</font>) but were quarantined publicly.", subbullet_style))
    story.append(Paragraph("– <b>Spam Velocity Spike Identified:</b> Identified that 6 reviews posted within 48 hours (Oct 25-26) triggered Google's automated rate-limiter, coupled with Pakistani non-local IP addresses reviewing an Ajman local listing.", subbullet_style))
    story.append(Paragraph("– <b>Action Protocol Established:</b> Implemented a 7-day cool-down window and established guidelines for natural, UAE-located client reviews.", subbullet_style))

    story.append(Spacer(1, 3))
    story.append(Paragraph("• <b>Pillar Blog #2: UAE Statutory Audit Guide 2026 (Oct 26):</b>", bullet_style))
    story.append(Paragraph("– <b>Live URL:</b> <font color='#09203b'>https://www.rboaccounting.ae/uae-statutory-audit-guide-2026-mandatory-corporate-tax-rules-checklist/</font>", subbullet_style))
    story.append(Paragraph("– <b>Key Focus:</b> Ministerial Decision No. 82 & 84, AED 50M revenue threshold, QFZP 0% audit mandates, and AFZA/DMCC/JAFZA licence renewal requirements.", subbullet_style))

    story.append(Spacer(1, 3))
    story.append(Paragraph("• <b>Pillar Blog #1: FTA Tax Audit Assistance Guide (Oct 23):</b>", bullet_style))
    story.append(Paragraph("– <b>Live URL:</b> <font color='#09203b'>https://www.rboaccounting.ae/fta-tax-audit-assistance-uae-corporate-tax-vat-guide-2026/</font>", subbullet_style))
    story.append(Paragraph("– <b>Key Focus:</b> 5-stage official FTA audit workflow, EmaraTax notice response protocols within 5 business days, pre-audit health checks, and penalty defense.", subbullet_style))

    story.append(Spacer(1, 8))

    # 5. Master GSC Impact Table
    story.append(Paragraph("3. High-Impression Search Console Overhaul Matrix", h1_style))
    
    gsc_headers = [
        Paragraph("<b>Target Landing Page URL</b>", table_header_style),
        Paragraph("<b>GSC Impressions</b>", table_header_style),
        Paragraph("<b>Diagnosed Problem</b>", table_header_style),
        Paragraph("<b>Technical Solution & Current Status</b>", table_header_style)
    ]
    gsc_rows = [
        gsc_headers,
        [
            Paragraph("<b>Corporate Tax Planning</b><br/>/corporate-tax-planning/", table_body_style),
            Paragraph("194", table_body_style),
            Paragraph("Empty meta description, 0 structured pillars, basic 1-line FAQs.", table_body_style),
            Paragraph("<b>Overhauled:</b> Injected 6 Core Pillars, comparison table, 10 rich FAQs & Schema. <font color='#166534'><b>[200 OK]</b></font>", table_body_style),
        ],
        [
            Paragraph("<b>Corporate Tax Registration</b><br/>/registration/", table_body_style),
            Paragraph("191", table_body_style),
            Paragraph("Missing penalty appeal guidance, localhost URL references.", table_body_style),
            Paragraph("<b>Overhauled:</b> Added AED 10k fine appeal callout under Cabinet Decision 105, canonical paths. <font color='#166534'><b>[200 OK]</b></font>", table_body_style),
        ],
        [
            Paragraph("<b>Penalty Reconsideration</b><br/>/penalty-reconsideration/", table_body_style),
            Paragraph("210", table_body_style),
            Paragraph("Fatal 404 error on old URL (/vat-penalty-reconsideration/).", table_body_style),
            Paragraph("<b>Resolved:</b> Added 301 permanent redirect, injected 8 Schema FAQs & 3-Tier Appeal Matrix. <font color='#166534'><b>[200 OK]</b></font>", table_body_style),
        ],
        [
            Paragraph("<b>Free Zone Audit UAE</b><br/>/free-zone-audit/", table_body_style),
            Paragraph("206", table_body_style),
            Paragraph("Empty meta description (\"\"), no Free Zone authority matrix.", table_body_style),
            Paragraph("<b>Upgraded:</b> High-CTR metadata, DMCC/AFZA/JAFZA matrix & 8 Schema FAQs. <font color='#166534'><b>[200 OK]</b></font>", table_body_style),
        ],
        [
            Paragraph("<b>VAT Advisory Services</b><br/>/advisory/", table_body_style),
            Paragraph("201", table_body_style),
            Paragraph("Broken old URL (/vat-advisory-services/), 0 FAQs.", table_body_style),
            Paragraph("<b>Resolved:</b> Added 301 redirect, 6 Core VAT Practice Pillars, 8 Schema FAQs. <font color='#166534'><b>[200 OK]</b></font>", table_body_style),
        ],
        [
            Paragraph("<b>Statutory Audit Services</b><br/>/statutory-audit/", table_body_style),
            Paragraph("189", table_body_style),
            Paragraph("Generic copy, no IFRS audit lifecycle, 0 Schema FAQs.", table_body_style),
            Paragraph("<b>Upgraded:</b> 5-Phase IFRS audit framework, AED 50M threshold rules & 8 Schema FAQs. <font color='#166534'><b>[200 OK]</b></font>", table_body_style),
        ],
    ]
    t_gsc = Table(gsc_rows, colWidths=[120, 55, 145, 195])
    t_gsc.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,0), c_primary),
        ('BOX', (0,0), (-1,-1), 0.5, c_border),
        ('INNERGRID', (0,0), (-1,-1), 0.5, c_border),
        ('TOPPADDING', (0,0), (-1,-1), 4),
        ('BOTTOMPADDING', (0,0), (-1,-1), 4),
        ('LEFTPADDING', (0,0), (-1,-1), 5),
        ('RIGHTPADDING', (0,0), (-1,-1), 5),
        ('ROWBACKGROUNDS', (0,1), (-1,-1), [colors.white, colors.HexColor("#f8fafc")]),
    ]))
    story.append(t_gsc)

    story.append(Spacer(1, 8))

    # 6. Technical Infrastructure & DevOps Status
    story.append(Paragraph("4. Technical Infrastructure, Deployment & Git Integrity", h1_style))
    story.append(Paragraph("• <b>Live Production Server (cPanel FTP 185.243.77.60):</b> 100% of updated publisher scripts, Elementor containers, high-res web media, and responsive CSS were uploaded and verified. All live endpoints return <font color='#166534'><b>HTTP 200 OK</b></font>.", bullet_style))
    story.append(Paragraph("• <b>Zero Styling Regressions:</b> All styling additions for new blogs and upgraded landing pages use strictly scoped inline styles, protecting 100% of existing service pages and global theme CSS.", bullet_style))
    story.append(Paragraph("• <b>Git Version Control:</b> Master branch is 100% synchronized with GitHub repository (<font face='Courier'>devsynxoffical/RBO</font>). Commits <font face='Courier'>660041a</font> and <font face='Courier'>e008500</font> successfully pushed to <font face='Courier'>origin/main</font>.", bullet_style))
    story.append(Paragraph("• <b>XML Sitemaps:</b> Freshly regenerated and validated across <font face='Courier'>sitemap_index.xml</font>, <font face='Courier'>post-sitemap.xml</font>, and <font face='Courier'>page-sitemap.xml</font>.", bullet_style))

    story.append(Spacer(1, 8))

    # 7. Next Week Strategic Focus
    story.append(Paragraph("5. Recommended Action Items for Next Week", h1_style))
    story.append(Paragraph("• <b>Morning Indexing Queue:</b> Resubmit the remaining 3 URLs (Blog, Corporate Tax Planning, Registration) in Google Search Console once today's 24-hour quota resets.", bullet_style))
    story.append(Paragraph("• <b>Google Business Profile Cool-Down:</b> Maintain the review pause until mid-next week; then collect 1 genuine client review from a verified UAE mobile IP.", bullet_style))
    story.append(Paragraph("• <b>New Pillar Blog Candidate:</b> Target <i>Transfer Pricing Documentation UAE</i> or <i>Corporate Tax De-Registration</i> to expand topical authority.", bullet_style))
    story.append(Paragraph("• <b>Conversion Tracking Audit:</b> Monitor WhatsApp and Contact Form lead conversion rates originating from the newly optimized Corporate Tax hubs.", bullet_style))

    doc.build(story, canvasmaker=NumberedCanvas)
    print(f"✅ Master PDF successfully generated at: {pdf_path}")
    print(f"   Size: {os.path.getsize(pdf_path):,} bytes")

if __name__ == "__main__":
    build_pdf()
