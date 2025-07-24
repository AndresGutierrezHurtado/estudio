import React from "react";
import { Outlet } from "react-router-dom";

export default function EmptyLayout() {
    return (
        <div className="empty__root">
            <main className="empty__main">
                <Outlet />
            </main>
        </div>
    );
}
