import React from "react";
import { Outlet } from "react-router-dom";

export default function AppLayout() {
    return (
        <div className="w-12/12">
            <aside className="bg-base-200 p-5 w-50 h-full"></aside>
            <main className="w-full">
                <Outlet />
            </main>
        </div>
    );
}
