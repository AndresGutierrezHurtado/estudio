import React from "react";
import { BrowserRouter, Route, Routes } from "react-router-dom";

// Layouts
import AppLayout from "./layouts/AppLayout";

// Pages
import Menu from "./pages/Menu";
import Admin from "./pages/Admin";
import Teams from "./pages/app/Teams";
import Team from "./pages/app/Team";
import Results from "./pages/app/Results";
import Ranking from "./pages/app/Ranking";
import TeamsManagement from "./pages/admin/Teams";
import ResultsManagement from "./pages/admin/Results";

export default function App() {
    return (
        <BrowserRouter>
            <Routes>
                <Route path="/" element={<AppLayout />}>
                    {/* Show routes */}
                    <Route index element={<Menu />} />
                    <Route path="/teams" element={<Teams />} />
                    <Route path="/teams/:id" element={<Team />} />
                    <Route path="/results" element={<Results />} />
                    <Route path="/ranking" element={<Ranking />} />
                    {/* Admin Routes */}
                    <Route path="/admin" element={<Admin />} />
                    <Route path="/admin/teams" element={<TeamsManagement />} />
                    <Route path="/admin/results" element={<ResultsManagement />} />
                </Route>
            </Routes>
        </BrowserRouter>
    );
}
