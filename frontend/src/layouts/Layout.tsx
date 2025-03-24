import React from "react";
import { Outlet } from "react-router";

const Layout = () => {
    return (
        <>
            <header>header</header>
            <Outlet />
            <footer>footer</footer>
        </>
    );
};

export default Layout;
