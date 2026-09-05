"use client";

import { useState } from "react";
import { Send, CheckCircle2, ShieldCheck } from "lucide-react";

export default function ContactForm() {
  const [submitted, setSubmitted] = useState(false);
  const [loading, setLoading] = useState(false);
  const [formData, setFormData] = useState({
    name: "",
    company: "",
    email: "",
    phone: "",
    service: "VAT Registration & Return Filing",
    emirate: "Ajman",
    message: "",
  });

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    setLoading(true);
    // Simulate submission
    setTimeout(() => {
      setLoading(false);
      setSubmitted(true);
    }, 800);
  };

  const handleChange = (
    e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement | HTMLTextAreaElement>
  ) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    });
  };

  if (submitted) {
    return (
      <div className="bg-[#112233] p-8 sm:p-10 rounded-3xl border border-[#E8B84B]/40 text-center space-y-4 shadow-xl">
        <div className="w-16 h-16 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center mx-auto">
          <CheckCircle2 className="w-8 h-8" />
        </div>
        <h3 className="font-serif text-2xl font-bold text-white">
          Consultation Request Received!
        </h3>
        <p className="text-sm text-gray-300 max-w-md mx-auto">
          Thank you, <strong>{formData.name}</strong>. An FTA certified tax consultant from RBO Accounting Services FZE will review your details and contact you within 2 business hours.
        </p>
        <button
          onClick={() => setSubmitted(false)}
          className="mt-4 px-6 py-2 rounded-full bg-[#E8B84B] text-[#0D1B2A] font-bold text-xs uppercase tracking-wider hover:bg-[#d8a83b] transition-all"
        >
          Submit Another Request
        </button>
      </div>
    );
  }

  return (
    <form
      onSubmit={handleSubmit}
      className="bg-[#091522] p-6 sm:p-8 rounded-3xl border border-[#E8B84B]/20 shadow-2xl space-y-4"
    >
      <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
        {/* Full Name */}
        <div>
          <label className="block text-xs font-semibold text-gray-300 mb-1.5 uppercase tracking-wider">
            Full Name *
          </label>
          <input
            type="text"
            name="name"
            required
            value={formData.name}
            onChange={handleChange}
            placeholder="e.g. Tariq Mansoor"
            className="w-full px-4 py-3 rounded-xl bg-[#0D1B2A] border border-white/10 text-white placeholder-gray-500 text-sm focus:outline-none focus:border-[#E8B84B] transition-colors"
          />
        </div>

        {/* Company Name */}
        <div>
          <label className="block text-xs font-semibold text-gray-300 mb-1.5 uppercase tracking-wider">
            Company Name
          </label>
          <input
            type="text"
            name="company"
            value={formData.company}
            onChange={handleChange}
            placeholder="e.g. Al Mansoor Trading LLC"
            className="w-full px-4 py-3 rounded-xl bg-[#0D1B2A] border border-white/10 text-white placeholder-gray-500 text-sm focus:outline-none focus:border-[#E8B84B] transition-colors"
          />
        </div>
      </div>

      <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
        {/* Email */}
        <div>
          <label className="block text-xs font-semibold text-gray-300 mb-1.5 uppercase tracking-wider">
            Email Address *
          </label>
          <input
            type="email"
            name="email"
            required
            value={formData.email}
            onChange={handleChange}
            placeholder="tariq@company.ae"
            className="w-full px-4 py-3 rounded-xl bg-[#0D1B2A] border border-white/10 text-white placeholder-gray-500 text-sm focus:outline-none focus:border-[#E8B84B] transition-colors"
          />
        </div>

        {/* UAE Phone Number */}
        <div>
          <label className="block text-xs font-semibold text-gray-300 mb-1.5 uppercase tracking-wider">
            Mobile / WhatsApp *
          </label>
          <input
            type="tel"
            name="phone"
            required
            value={formData.phone}
            onChange={handleChange}
            placeholder="+971 50 123 4567"
            className="w-full px-4 py-3 rounded-xl bg-[#0D1B2A] border border-white/10 text-white placeholder-gray-500 text-sm focus:outline-none focus:border-[#E8B84B] transition-colors"
          />
        </div>
      </div>

      <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
        {/* Service */}
        <div>
          <label className="block text-xs font-semibold text-gray-300 mb-1.5 uppercase tracking-wider">
            Service Required *
          </label>
          <select
            name="service"
            value={formData.service}
            onChange={handleChange}
            className="w-full px-4 py-3 rounded-xl bg-[#0D1B2A] border border-white/10 text-white text-sm focus:outline-none focus:border-[#E8B84B] transition-colors"
          >
            <option value="VAT Registration & Return Filing">VAT Registration & Return Filing</option>
            <option value="UAE Corporate Tax 2026">UAE Corporate Tax (2026 Filing)</option>
            <option value="Bookkeeping & Monthly Accounting">Bookkeeping & Monthly Accounting</option>
            <option value="Financial Auditing & Free Zone Audit">Financial Auditing & Free Zone Audit</option>
            <option value="Payroll & WPS Compliance">Payroll & WPS Compliance</option>
            <option value="Virtual CFO Strategic Services">Virtual CFO Strategic Services</option>
          </select>
        </div>

        {/* Emirate */}
        <div>
          <label className="block text-xs font-semibold text-gray-300 mb-1.5 uppercase tracking-wider">
            Emirate Jurisdiction *
          </label>
          <select
            name="emirate"
            value={formData.emirate}
            onChange={handleChange}
            className="w-full px-4 py-3 rounded-xl bg-[#0D1B2A] border border-white/10 text-white text-sm focus:outline-none focus:border-[#E8B84B] transition-colors"
          >
            <option value="Ajman">Ajman (AFZ C1 HQ / Mainland)</option>
            <option value="Dubai">Dubai (DMCC, DIFC, JAFZA, DED)</option>
            <option value="Abu Dhabi">Abu Dhabi (ADGM, KEZAD)</option>
            <option value="Sharjah">Sharjah (SAIF Zone, HFZA)</option>
            <option value="Ras Al Khaimah">Ras Al Khaimah (RAKEZ)</option>
            <option value="Fujairah">Fujairah (FFZA)</option>
            <option value="Umm Al Quwain">Umm Al Quwain (UAQ FTZ)</option>
          </select>
        </div>
      </div>

      {/* Message */}
      <div>
        <label className="block text-xs font-semibold text-gray-300 mb-1.5 uppercase tracking-wider">
          Inquiry / Specific Requirements
        </label>
        <textarea
          name="message"
          rows={3}
          value={formData.message}
          onChange={handleChange}
          placeholder="Briefly describe your company activity, current VAT status, or specific question..."
          className="w-full px-4 py-3 rounded-xl bg-[#0D1B2A] border border-white/10 text-white placeholder-gray-500 text-sm focus:outline-none focus:border-[#E8B84B] transition-colors"
        />
      </div>

      {/* Submit CTA */}
      <button
        type="submit"
        disabled={loading}
        className="w-full py-3.5 px-6 rounded-xl bg-[#E8B84B] hover:bg-[#d8a83b] text-[#0D1B2A] font-bold text-sm uppercase tracking-wider transition-all shadow-lg hover:shadow-xl flex items-center justify-center gap-2 cursor-pointer disabled:opacity-50"
      >
        {loading ? (
          <span>Submitting Request...</span>
        ) : (
          <>
            <Send className="w-4 h-4" />
            <span>Submit Consultation Request</span>
          </>
        )}
      </button>

      <div className="flex items-center justify-center gap-2 text-[11px] text-gray-400 pt-1">
        <ShieldCheck className="w-3.5 h-3.5 text-[#E8B84B]" />
        <span>100% Confidential &bull; Non-Disclosure Protected</span>
      </div>
    </form>
  );
}
