import React, { Profiler } from "react";
import { createRoot } from "react-dom/client";
import { HashRouter, Link, Route, Routes } from "react-router-dom";
import Cart from "./Profile/Cart";
import Order from "./Profile/Order";
import Address from "./Profile/Address";
import ChangePassword from "./Profile/ChangePassword";
const App = () => (
    <>
        <HashRouter>
            <Link to={"/"} className="btn btn-dark">
                Cart
            </Link>
            <Link to={"/order"} className="btn btn-dark">
                Order
            </Link>
            <Link to={"/address"} className="btn btn-dark">
                Address Setting
            </Link>
            <Link to={"/password"} className="btn btn-dark">
                Change Password
            </Link>
            <Routes>
                <Route path="/" element={<Cart />} />
                <Route path="/order" element={<Order />} />
                <Route path="/address" element={<Address />} />
                <Route path="/password" element={<ChangePassword />} />
            </Routes>
        </HashRouter>
    </>
);

createRoot(document.querySelector("#root")).render(<App />);
