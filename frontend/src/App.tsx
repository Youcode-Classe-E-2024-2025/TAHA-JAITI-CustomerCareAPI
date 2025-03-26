import React from "react";
import { Routes, Route } from "react-router";
import Index from "./pages/Index";
import Layout from "./layouts/Layout";
import Login from "./pages/Login";

const App: React.FC = () => {
  return (
    <Routes>
      <Route path="/" element={<Layout />}>
        <Route index element={<Index />} />
        <Route path="/login" element={<Login />} />
      </Route>
    </Routes>
  );
};

export default App;
