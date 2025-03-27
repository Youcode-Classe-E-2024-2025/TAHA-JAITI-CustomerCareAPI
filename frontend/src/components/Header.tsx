import React from "react";
import { Ticket } from "lucide-react";
import { Link } from "react-router";
import { selectUser } from "../redux/api/authApi";

const Header: React.FC = () => {
  const user = selectUser();

  console.log(user);

  return (
    <header className="bg-gradient-to-b from-amber-700/40 to-transparent py-4 px-6 flex justify-between items-center">
      <h1 className="text-2xl font-bold flex items-center gap-2">
        <Ticket className="text-amber-500" />
        DimaLeek
      </h1>
      <nav>
        <ul className="flex space-x-6">
          <li>
            <a href="#" className="hover:text-amber-500 transition">
              Home
            </a>
          </li>

        </ul>
      </nav>
      <div className="flex space-x-4">
        {user ? (
          <Link to="/profile" className="hover:underline">
            {user.name}
          </Link>
        ) : (
          <>
            <Link to="/login" className="bg-amber-500 py-2 px-4 rounded-sm  hover:bg-amber-600 cursor-pointer transition">
              Sign In
            </Link>
            <Link to="/signup" className="bg-amber-500 py-2 px-4 rounded-sm hover:bg-amber-600 cursor-pointer transition">
              Sign Up
            </Link>
          </>
        )}
      </div>
    </header>
  );
};

export default Header;
