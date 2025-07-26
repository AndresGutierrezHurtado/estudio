import React from "react";
import { BrowserRouter, Route, Routes } from "react-router-dom";

// Layouts
import AppLayout from "./layouts/AppLayout";

// Pages
import Menu from "./pages/Menu";
import Admin from "./pages/Admin";

export default function App() {
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<AppLayout />}>
                    <Route index element={<Menu />} />
                    {/*
                    <Route path="/teams" element={<Admin />} />
                    <Route path="/teams/:id" element={<Admin />} />
                    <Route path="/results" element={<Admin />} />
                    <Route path="/ranking" element={<Admin />} />
                    */}
                    <Route path="/admin" element={<Admin />} />
                    {/*
                    <Route path="/admin/teams" element={<Admin />} />
                    <Route path="/admin/results" element={<Admin />} />
                    */}
                </Route>
            </Routes>
        </BrowserRouter>
    );
}
