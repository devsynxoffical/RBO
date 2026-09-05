"use client";

import { useState } from "react";
import { CheckCircle2, ChevronDown } from "lucide-react";

export default function HeroForm() {
  const [submitted, setSubmitted] = useState(false);
  const [loading, setLoading] = useState(false);
  const [formData, setFormData] = useState({
    name: "",
    phone: "",
    email: "",
    service: "---Select Service---",
    emirate: "---Your Emirate---",
  });

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    setLoading(true);
    setTimeout(() => {
      setLoading(false);
      setSubmitted(true);
    }, 600);
  };

  const handleChange = (
    e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>
  ) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    });
  };

  if (submitted) {
    return (
      <div className="bg-[#111E40]/90 p-8 rounded-2xl border border-white/10 text-center space-y-4 text-white">
        <div className="w-14 h-14 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center mx-auto">
          <CheckCircle2 className="w-7 h-7" />
        </div>
        <h4 className="font-serif text-xl font-bold">Request Received!</h4>
        <p className="text-xs text-gray-300">
          Thank you <strong>{formData.name}</strong>. An FTA tax consultant will reach out within 10 minutes.
        </p>
        <button
          onClick={() => setSubmitted(false)}
          className="px-5 py-2 rounded-lg bg-[#E8B84B] text-white font-bold text-xs"
        >
          Submit Another
        </button>
      </div>
    );
  }

  return (
    <form onSubmit={handleSubmit} className="space-y-3.5">
      <div>
        <input
          type="text"
          name="name"
          required
          value={formData.name}
          onChange={handleChange}
          placeholder="Your Full Name"
          className="w-full px-4 py-3 rounded-lg bg-[#18274A]/80 border border-white/15 text-white placeholder-gray-400 text-sm focus:outline-none focus:border-[#E8B84B] transition-colors"
        />
      </div>

      <div>
        <input
          type="tel"
          name="phone"
          required
          value={formData.phone}
          onChange={handleChange}
          placeholder="Phone / WhatsApp"
          className="w-full px-4 py-3 rounded-lg bg-[#18274A]/80 border border-white/15 text-white placeholder-gray-400 text-sm focus:outline-none focus:border-[#E8B84B] transition-colors"
        />
      </div>

      <div>
        <input
          type="email"
          name="email"
          required
          value={formData.email}
          onChange={handleChange}
          placeholder="Email Address"
          className="w-full px-4 py-3 rounded-lg bg-[#18274A]/80 border border-white/15 text-white placeholder-gray-400 text-sm focus:outline-none focus:border-[#E8B84B] transition-colors"
        />
      </div>

      <div className="relative">
        <select
          name="service"
          value={formData.service}
          onChange={handleChange}
          className="w-full px-4 py-3 rounded-lg bg-[#18274A]/80 border border-white/15 text-white text-sm focus:outline-none focus:border-[#E8B84B] appearance-none pr-10 transition-colors"
        >
          <option value="---Select Service---">---Select Service---</option>
          <option value="Bookkeeping & Accounting">Bookkeeping &amp; Accounting</option>
          <option value="VAT Registration / Filing">VAT Registration / Filing</option>
          <option value="Corporate Tax UAE">Corporate Tax UAE</option>
          <option value="Audit Services">Audit Services</option>
          <option value="Payroll Services">Payroll Services</option>
          <option value="Virtual CFO">Virtual CFO</option>
          <option value="AML Compliance">AML Compliance</option>
          <option value="Other">Other</option>
        </select>
        <ChevronDown className="w-4 h-4 text-gray-400 absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none" />
      </div>

      <div className="relative">
        <select
          name="emirate"
          value={formData.emirate}
          onChange={handleChange}
          className="w-full px-4 py-3 rounded-lg bg-[#18274A]/80 border border-white/15 text-white text-sm focus:outline-none focus:border-[#E8B84B] appearance-none pr-10 transition-colors"
        >
          <option value="---Your Emirate---">---Your Emirate---</option>
          <option value="Dubai">Dubai</option>
          <option value="Abu Dhabi">Abu Dhabi</option>
          <option value="Sharjah">Sharjah</option>
          <option value="Ajman">Ajman</option>
          <option value="Ras Al Khaimah">Ras Al Khaimah</option>
          <option value="Fujairah">Fujairah</option>
          <option value="Umm Al Quwain">Umm Al Quwain</option>
        </select>
        <ChevronDown className="w-4 h-4 text-gray-400 absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none" />
      </div>

      <button
        type="submit"
        disabled={loading}
        className="w-full py-3.5 px-6 rounded-lg bg-[#DEAB3D] hover:bg-[#c9952a] text-white font-bold text-sm tracking-wide transition-all shadow-lg hover:shadow-xl flex items-center justify-center gap-2 cursor-pointer disabled:opacity-50 mt-2"
      >
        {loading ? (
          <span>Sending Request...</span>
        ) : (
          <span>Request Free Consultation &rarr;</span>
        )}
      </button>

      <p className="text-center text-[11px] text-gray-300 pt-1">
        🔒 Your information is 100% secure and confidential
      </p>
    </form>
  );
}
