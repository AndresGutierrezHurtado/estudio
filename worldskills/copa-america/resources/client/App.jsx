import React from "react";
import { BrowserRouter, Route, Routes } from "react-router-dom";

// Layouts
import AppLayout from "./layouts/AppLayout";

// Pages
import Menu from "./pages/Menu";
import Admin from "./pages/Admin";

// Show Pages
import Teams from "./pages/Teams";
import Results from "./pages/Results";
import Ranking from "./pages/Ranking";
import Team from "./pages/Team";
import TeamsManagement from "./pages/TeamsManagement";
import MatchesManagement from "./pages/MatchesManagement";

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
                    <Route path="/teams/:id" element={<Team />} />
                    <Route path="/results" element={<Results />} />
                    <Route path="/ranking" element={<Ranking />} />
                </Route>

                {/* management routes */}
                <Route element={<AppLayout />}>
                    <Route path="/admin/teams" element={<TeamsManagement />} />
                    <Route path="/admin/matches" element={<MatchesManagement />} />
                </Route>

                <Route path="*" element={<h1>No se encontro</h1>} />
            </Routes>
        </BrowserRouter>
    );
}
