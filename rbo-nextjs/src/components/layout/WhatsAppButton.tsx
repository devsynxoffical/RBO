"use client";

import React from "react";
import { MessageCircle } from "lucide-react";

export default function WhatsAppButton() {
  const phoneNumber = "971508051857";
  const defaultMessage = encodeURIComponent("Hello RBO Accounting, I would like to inquire about your tax and accounting services.");

  return (
    <a
      href={`https://wa.me/${phoneNumber}?text=${defaultMessage}`}
      target="_blank"
      rel="noopener noreferrer"
      className="fixed bottom-6 right-6 z-50 flex items-center gap-2.5 bg-emerald-500 hover:bg-emerald-600 text-white font-semibold py-3 px-4 rounded-full shadow-2xl transition-all duration-300 transform hover:scale-105 group"
      aria-label="Chat with RBO Accounting on WhatsApp"
    >
      <span className="hidden sm:inline-block text-xs font-medium pl-1 text-white">
        Chat with Us
      </span>
      <div className="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
        <MessageCircle className="w-5 h-5 fill-current" />
      </div>
    </a>
  );
}
