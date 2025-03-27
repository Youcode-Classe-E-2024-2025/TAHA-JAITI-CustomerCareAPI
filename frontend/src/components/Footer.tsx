import React from 'react';
import { FaTicketAlt } from 'react-icons/fa';
import { Link } from 'react-router';

const Footer: React.FC = () => {
  const currentYear = new Date().getFullYear();

  return (
    <footer className="bg-gradient-to-t from-amber-700 to-amber-500 text-white py-8">
      <div className="max-w-7xl mx-auto px-6 flex items-center justify-center">
        {/* Brand Section */}
        <div className="flex flex-col items-center md:items-start">
          <Link to="/" className="flex items-center mx-auto gap-2 group mb-4">
            <FaTicketAlt className="text-amber-200 text-2xl group-hover:rotate-12 transition-transform duration-300" />
            <span className="text-2xl font-bold tracking-tight group-hover:text-amber-100 transition-colors">
              DimaLeek
            </span>
          </Link>
          <p className="text-sm text-amber-100 text-center md:text-center">
            Exceptional customer care, every step of the way.
          </p>
        </div>
      </div>

      {/* Bottom Bar */}
      <div className="mt-8 border-t border-amber-400/30 pt-4 text-center">
        <p className="text-sm text-amber-200">
          © {currentYear} DimaLeek. All rights reserved.
        </p>
      </div>
    </footer>
  );
};

export default Footer;