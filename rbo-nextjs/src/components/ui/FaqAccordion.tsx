"use client";

import { useState } from "react";
import { ChevronDown } from "lucide-react";

interface FaqItem {
  q: string;
  a: string;
}

interface FaqAccordionProps {
  items: FaqItem[];
}

export default function FaqAccordion({ items }: FaqAccordionProps) {
  const [openIndex, setOpenIndex] = useState<number | null>(0);

  const toggle = (idx: number) => {
    setOpenIndex(openIndex === idx ? null : idx);
  };

  return (
    <div className="space-y-4">
      {items.map((item, idx) => {
        const isOpen = openIndex === idx;
        return (
          <div
            key={idx}
            className={`rounded-2xl border transition-all duration-200 overflow-hidden ${
              isOpen
                ? "bg-[#112233] border-[#E8B84B]/40 shadow-lg"
                : "bg-[#0D1B2A] border-white/10 hover:border-[#E8B84B]/30"
            }`}
          >
            <button
              onClick={() => toggle(idx)}
              className="w-full py-5 px-6 text-left flex items-center justify-between gap-4 focus:outline-none"
              aria-expanded={isOpen}
            >
              <span className={`text-sm sm:text-base font-serif font-bold transition-colors ${
                isOpen ? "text-[#E8B84B]" : "text-white"
              }`}>
                {item.q}
              </span>
              <div className={`w-8 h-8 rounded-full flex items-center justify-center shrink-0 transition-transform duration-300 ${
                isOpen
                  ? "bg-[#E8B84B] text-[#0D1B2A] rotate-180"
                  : "bg-white/5 text-gray-400"
              }`}>
                <ChevronDown className="w-4 h-4" />
              </div>
            </button>

            {isOpen && (
              <div className="px-6 pb-6 pt-1 text-xs sm:text-sm text-gray-300 leading-relaxed border-t border-white/5">
                {item.a}
              </div>
            )}
          </div>
        );
      })}
    </div>
  );
}
