import React from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom";

// Layout
import AppLayout from "./layouts/AppLayout";

// Pages
import CountryManagement from "./pages/CountryManagement";
import CompetitorManagement from "./pages/CompetitorManagement";
import MedalManagement from "./pages/MedalManagement";
import CompetitorProfile from "./pages/CompetitorProfile";
import Ranking from "./pages/Ranking";

export default function App() {
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<AppLayout />}>
                    <Route index element={<Ranking />} />
                    <Route path="/admin/countries" element={<CountryManagement />} />
                    <Route path="/admin/competitors" element={<CompetitorManagement />} />
                    <Route path="/admin/medals" element={<MedalManagement />} />
                    <Route path="/competitor/:id" element={<CompetitorProfile />} />
                </Route>
            </Routes>
        </BrowserRouter>
    );
}
