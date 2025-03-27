import React from 'react';
import { FaUsers, FaPlus, } from 'react-icons/fa';

const Index: React.FC = () => {
  return (
    <div className="min-h-screen bg-gray-100 p-6">
      {/* Header */}
      <header className="mb-8">
        <h1 className="text-3xl font-bold text-gray-800 flex items-center gap-2">
          <FaUsers className="text-amber-500" />
          Customer Care Dashboard
        </h1>
        <p className="text-gray-600 mt-1">
          Welcome back, Agent! Here’s your overview for today.
        </p>
      </header>

      {/* Main Content */}
      <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
        {/* Quick Actions */}
        <section className="bg-white rounded-lg shadow-md p-6">
          <h2 className="text-xl font-semibold text-gray-700 mb-4">Quick Actions</h2>
          <div className="space-y-4">
            <button className="w-full flex items-center gap-3 p-3 bg-amber-500 text-white rounded-md hover:bg-amber-600 transition-colors">
              <FaPlus />
              New Ticket
            </button>
          </div>
        </section>
      </div>
    </div>
  );
};

export default Index;