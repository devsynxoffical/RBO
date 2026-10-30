# Mapping of Page ID -> New Title conforming to "[Service] in [Emirate/UAE] | RBO Accounting"
TITLE_MAPPINGS = {
    # === AREA PAGES ===
    2239: "Accounting & Bookkeeping Services in Ajman | RBO Accounting",
    1756: "Accounting & Bookkeeping Services in Dubai | RBO Accounting",
    2212: "Accounting & Corporate Tax in Abu Dhabi | RBO Accounting",
    2225: "Accounting & Bookkeeping Services in Sharjah | RBO Accounting",
    2249: "Accounting & Bookkeeping in Ras Al Khaimah | RBO Accounting",
    2263: "Accounting & Bookkeeping Services in Fujairah | RBO Accounting",
    2277: "Accounting & Bookkeeping in Umm Al Quwain | RBO Accounting",
    4408: "Areas We Serve in UAE | Accounting Across 7 Emirates | RBO Accounting",

    # === MAIN SERVICES HUB ===
    178: "Accounting & Corporate Tax Services in UAE | RBO Accounting",

    # === ACCOUNTING & BOOKKEEPING ===
    787: "Accounting & Bookkeeping Services in UAE | RBO Accounting",
    1547: "Bookkeeping Services in UAE | RBO Accounting",
    1692: "Accounts Payable Outsourcing UAE | AP/AR Services | RBO Accounting",
    1670: "Bank Reconciliation Services in UAE | RBO Accounting",
    1706: "Financial Reporting Services in UAE | RBO Accounting",
    1722: "IFRS Accounting Compliance in UAE | RBO Accounting",

    # === CORPORATE TAX ===
    4421: "Corporate Tax Consultant in UAE | RBO Accounting",
    2567: "Corporate Tax Registration in UAE | RBO Accounting",
    2897: "Corporate Tax Return Filing in UAE | RBO Accounting",
    3034: "Corporate Tax Planning in UAE | RBO Accounting",
    3228: "Transfer Pricing Services in UAE | RBO Accounting",

    # === VAT REGISTRATION & FILING ===
    4420: "VAT Consulting & Filing in UAE | RBO Accounting",
    2419: "VAT Registration in UAE | RBO Accounting",
    2458: "VAT Return Filing in UAE | RBO Accounting",
    2488: "VAT Refund Services in UAE | RBO Accounting",
    2501: "VAT Advisory Services in UAE | RBO Accounting",
    2508: "FTA Audit Assistance in UAE | RBO Accounting",
    2522: "FTA Records Amendment in UAE | RBO Accounting",
    2532: "FTA Penalty Reconsideration in UAE | RBO Accounting",

    # === AUDIT & ASSURANCE ===
    4423: "Audit and Assurance Services in UAE | RBO Accounting",
    3382: "Statutory Audit Services in UAE | RBO Accounting",
    3402: "Free Zone Audit Services in UAE | RBO Accounting",
    3392: "Internal Audit Services in UAE | RBO Accounting",
    3413: "Financial Due Diligence in UAE | RBO Accounting",
    3412: "Financial Risk Assessment in UAE | RBO Accounting",

    # === PAYROLL ===
    4422: "Payroll & WPS Services in UAE | RBO Accounting",
    2732: "WPS Payroll Processing in UAE | RBO Accounting",
    3098: "End of Service Benefits (EOSB) in UAE | RBO Accounting",
    3125: "Employee Leave Management in UAE | RBO Accounting",

    # === VIRTUAL CFO ===
    4424: "Virtual CFO Services in UAE | RBO Accounting",
    3320: "FP&A Forecasting Services in UAE | RBO Accounting",
    3341: "Business Budgeting Services in UAE | RBO Accounting",
    3351: "Cash Flow Management in UAE | RBO Accounting",
    3358: "Business Tax & Advisory Services in UAE | RBO Accounting",
    3368: "Management Reporting Services in UAE | RBO Accounting",

    # === BUSINESS SETUP ===
    5439: "Business Setup & Company Formation in UAE | RBO Accounting",
    5443: "Ajman Free Zone Company Setup (AFZA) | RBO Accounting",
    5442: "Business Setup in Dubai | RBO Accounting",
    5441: "Mainland vs Free Zone Setup in UAE | RBO Accounting",
    5444: "UAE Trade Licence Process Guide | RBO Accounting",
    5445: "UAE Business Setup Packages | RBO Accounting",
}

if __name__ == "__main__":
    import pymysql

    conn = pymysql.connect(
        host="127.0.0.1",
        user="root",
        password="",
        database="rboaccou_wp629",
        port=3306,
        charset="utf8mb4"
    )
    cursor = conn.cursor()

    updated_count = 0
    for post_id, new_title in TITLE_MAPPINGS.items():
        # Check if rank_math_title exists
        cursor.execute("SELECT meta_id FROM wpsd_postmeta WHERE post_id = %s AND meta_key = 'rank_math_title'", (post_id,))
        row = cursor.fetchone()
        if row:
            cursor.execute("UPDATE wpsd_postmeta SET meta_value = %s WHERE post_id = %s AND meta_key = 'rank_math_title'", (new_title, post_id))
        else:
            cursor.execute("INSERT INTO wpsd_postmeta (post_id, meta_key, meta_value) VALUES (%s, 'rank_math_title', %s)", (post_id, new_title))
        updated_count += 1
        print(f"Updated Post {post_id} -> {new_title}")

    conn.commit()
    conn.close()
    print(f"\n✅ Total {updated_count} titles updated in local MySQL database.")
