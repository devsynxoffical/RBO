"use client";

import React, { useState } from "react";
import { Send, CheckCircle2, Shield } from "lucide-react";

export default function ContactForm() {
  const [submitted, setSubmitted] = useState(false);
  const [formData, setFormData] = useState({
    name: "",
    email: "",
    phone: "",
    service: "VAT Registration & Filing",
    emirate: "Dubai",
    message: ""
  });

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    // Simulate submission / dispatch to WhatsApp or endpoint
    setSubmitted(true);
  };

  if (submitted) {
    return (
      <div className="bg-emerald-50 border border-emerald-200 rounded-2xl p-8 text-center animate-in fade-in">
        <CheckCircle2 className="w-12 h-12 text-emerald-600 mx-auto mb-3" />
        <h3 className="text-xl font-bold text-slate-900 mb-2">Inquiry Received!</h3>
        <p className="text-sm text-slate-600 max-w-md mx-auto mb-6">
          Thank you for contacting RBO Accounting Services FZE. Our tax consultant will contact you within 15 minutes.
        </p>
        <button
          onClick={() => setSubmitted(false)}
          className="text-xs font-semibold text-emerald-700 hover:text-emerald-800 underline"
        >
          Send another message
        </button>
      </div>
    );
  }

  return (
    <form onSubmit={handleSubmit} className="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
      <div className="border-b border-slate-100 pb-4 mb-2">
        <h3 className="text-xl font-bold text-slate-900 font-serif-heading">
          Book a Free Tax Consultation
        </h3>
        <p className="text-xs text-slate-500 mt-1">
          Speak with an FTA-registered tax agent in the UAE.
        </p>
      </div>

      <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label className="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">
            Full Name *
          </label>
          <input
            type="text"
            required
            value={formData.name}
            onChange={(e) => setFormData({ ...formData, name: e.target.value })}
            placeholder="e.g. John Doe"
            className="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
          />
        </div>
        <div>
          <label className="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">
            WhatsApp / Phone *
          </label>
          <input
            type="tel"
            required
            value={formData.phone}
            onChange={(e) => setFormData({ ...formData, phone: e.target.value })}
            placeholder="+971 50 123 4567"
            className="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
          />
        </div>
      </div>

      <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label className="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">
            Email Address *
          </label>
          <input
            type="email"
            required
            value={formData.email}
            onChange={(e) => setFormData({ ...formData, email: e.target.value })}
            placeholder="john@company.ae"
            className="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
          />
        </div>
        <div>
          <label className="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">
            Emirate / Location
          </label>
          <select
            value={formData.emirate}
            onChange={(e) => setFormData({ ...formData, emirate: e.target.value })}
            className="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-white"
          >
            <option value="Dubai">Dubai</option>
            <option value="Ajman">Ajman</option>
            <option value="Abu Dhabi">Abu Dhabi</option>
            <option value="Sharjah">Sharjah</option>
            <option value="Ras Al Khaimah">Ras Al Khaimah</option>
            <option value="Fujairah">Fujairah</option>
            <option value="Umm Al Quwain">Umm Al Quwain</option>
          </select>
        </div>
      </div>

      <div>
        <label className="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">
          Service Required
        </label>
        <select
          value={formData.service}
          onChange={(e) => setFormData({ ...formData, service: e.target.value })}
          className="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-white"
        >
          <option value="VAT Registration & Filing">VAT Registration & Filing</option>
          <option value="Corporate Tax Services">Corporate Tax Services (0% & 9%)</option>
          <option value="Monthly Bookkeeping & Accounting">Monthly Bookkeeping & Accounting</option>
          <option value="Audit & Assurance">Free Zone & Statutory Audit</option>
          <option value="Payroll & WPS">Payroll & WPS Compliance</option>
          <option value="Virtual CFO">Virtual CFO & Financial Advisory</option>
        </select>
      </div>

      <div>
        <label className="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">
          How can we help you?
        </label>
        <textarea
          rows={3}
          value={formData.message}
          onChange={(e) => setFormData({ ...formData, message: e.target.value })}
          placeholder="Briefly describe your company or tax question..."
          className="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
        />
      </div>

      <button
        type="submit"
        className="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold py-3 px-6 rounded-lg shadow transition-colors flex items-center justify-center gap-2 text-sm"
      >
        <Send className="w-4 h-4 text-amber-400" />
        <span>Request Free Consultation</span>
      </button>

      <div className="flex items-center justify-center gap-1.5 text-[11px] text-slate-400 pt-1">
        <Shield className="w-3.5 h-3.5 text-emerald-500" />
        <span>Your data is confidential & protected under UAE privacy laws.</span>
      </div>
    </form>
  );
}
