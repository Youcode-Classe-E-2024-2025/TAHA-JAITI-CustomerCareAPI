import React, { useState } from 'react';
import { FaTicketAlt, FaUser, FaSignOutAlt } from 'react-icons/fa';
import { Link, useNavigate } from 'react-router';
import { selectUser, useLogoutMutation } from '../redux/api/authApi';

const Header: React.FC = () => {
  const [isUserMenuOpen, setIsUserMenuOpen] = useState(false);
  const navigate = useNavigate();

  const user = selectUser();
  const [logout] = useLogoutMutation();

  const handleLogout = async () => {
    try {
      await logout().unwrap();
      navigate('/login');
    } catch (err) {
      console.error('Logout failed:', err);
    }
  };

  return (
    <header className="bg-gradient-to-r from-amber-600 to-amber-400 shadow-lg py-4 px-6 sticky top-0 z-50">
      {/* Container */}
      <div className="max-w-7xl mx-auto flex justify-between items-center">
        {/* Logo */}
        <Link to="/" className="flex items-center gap-2 group">
          <FaTicketAlt className="text-white text-2xl group-hover:rotate-12 transition-transform duration-300" />
          <h1 className="text-2xl font-bold text-white tracking-tight group-hover:text-amber-100 transition-colors">
            DimaLeek
          </h1>
        </Link>

        {/* Desktop Navigation */}
        <nav className="hidden md:flex items-center space-x-8">
          <ul className="flex space-x-6 text-white font-medium">
            <li>
              <Link
                to="/"
                className="hover:text-amber-100 border-b-2 border-transparent hover:border-amber-100 transition-all duration-200"
              >
                Home
              </Link>
            </li>
            <li>
              <Link
                to="/tickets"
                className="hover:text-amber-100 border-b-2 border-transparent hover:border-amber-100 transition-all duration-200"
              >
                Tickets
              </Link>
            </li>
            <li>
              <Link
                to="/reports"
                className="hover:text-amber-100 border-b-2 border-transparent hover:border-amber-100 transition-all duration-200"
              >
                Reports
              </Link>
            </li>
          </ul>
        </nav>

        {/* Right Section */}
        <div className="flex items-center gap-4">
          {/* User Section */}
          {user ? (
            <div className="relative">
              <button
                onClick={() => setIsUserMenuOpen(!isUserMenuOpen)}
                className="flex items-center gap-2 text-white hover:text-amber-100 transition-colors"
                aria-label="User menu"
              >
                <FaUser className="text-xl" />
                <span className="hidden md:inline font-medium">{user.name}</span>
              </button>
              {isUserMenuOpen && (
                <div className="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-2 z-50 animate-fade-in">
                  <button
                    onClick={handleLogout}
                    className="w-full text-left cursor-pointer px-4 py-2 text-gray-700 hover:bg-amber-50 hover:text-amber-600 transition-colors flex items-center gap-2"
                  >
                    <FaSignOutAlt />
                    Logout
                  </button>
                </div>
              )}
            </div>
          ) : (
            <div className="hidden md:flex gap-4">
              <Link
                to="/login"
                className="bg-white text-amber-600 px-4 py-2 rounded-md font-medium hover:bg-amber-50 transition-colors shadow-sm"
              >
                Sign In
              </Link>
              <Link
                to="/signup"
                className="bg-amber-700 text-white px-4 py-2 rounded-md font-medium hover:bg-amber-800 transition-colors shadow-sm"
              >
                Sign Up
              </Link>
            </div>
          )}
        </div>
      </div>
    </header>
  );
};

export default Header;