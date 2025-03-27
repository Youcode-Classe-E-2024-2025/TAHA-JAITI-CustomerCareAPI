import React from "react";
import { RouterProvider } from "react-router";
import { router } from "./Routes";

const App: React.FC = () => {
  return <RouterProvider router={router} />;
};

export default App;
