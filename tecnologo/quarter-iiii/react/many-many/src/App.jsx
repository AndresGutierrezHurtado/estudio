import React from "react";
import { BrowserRouter, Route, Routes } from "react-router";

import Home from "./pages/home.jsx";
import Product from "./pages/product.jsx";

export default function App() {
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<Home />} />
                <Route path="/product/:id" element={<Product />} />
            </Routes>
        </BrowserRouter>
    );
}
