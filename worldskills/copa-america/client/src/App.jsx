import React from "react";
import { BrowserRouter, Route, Routes } from "react-router-dom";

// Layouts
import AppLayout from "./layouts/AppLayout";
import EmptyLayout from "./layouts/EmptyLayout";

// Pages
import Menu from "./pages/Menu";
import Admin from "./pages/Admin";

// Show Pages
import Teams from "./pages/Teams";
import Results from "./pages/Results";
import Ranking from "./pages/Ranking";

// Management Pages

export default function App() {
    return (
        <BrowserRouter>
            <Routes>
                {/* Info routes */}
                <Route path="/" element={<AppLayout />}>
                    <Route index element={<Menu />} />
                    <Route path="/admin" element={<Admin />} />
                    <Route path="/teams" element={<Teams />} />
                    <Route path="/teams/:id" element={<Menu />} />
                    <Route path="/results" element={<Results />} />
                    <Route path="/ranking" element={<Ranking />} />
                </Route>

                {/* management routes */}
                <Route element={<EmptyLayout />}>
                    <Route path="/admin/teams" element={<Menu />} />
                    <Route path="/admin/matches" element={<Menu />} />
                    {/*  */}
                </Route>

                <Route path="*" element={<h1>No se encontro</h1>} />
            </Routes>
        </BrowserRouter>
    );
}
