import React from "react";
import { Ticket } from "lucide-react";

const Header: React.FC = () => {
  return (
    <header className="bg-reen-200 py-4 px-6 flex justify-between items-center shadow-md">
      <h1 className="text-2xl font-bold flex items-center gap-2">
        <Ticket />
        DimaLeek
      </h1>
      <nav>
        <ul className="flex space-x-6">
          <li>
            <a href="#" className="text-reen-400 hover:text-reen-300 transition">
              Home
            </a>
          </li>
          <li>
            <a href="#" className="text-reen-400 hover:text-reen-300 transition">
              About
            </a>
          </li>
          <li>
            <a href="#" className="text-reen-400 hover:text-reen-300 transition">
              Contact
            </a>
          </li>
        </ul>
      </nav>
    </header>
  );
};

export default Header;
