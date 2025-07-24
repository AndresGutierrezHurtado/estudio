import React from "react";
import { Link } from "react-router-dom";

export default function AppLayout() {
    return (
        <div className="app_root">
            <main className="app__main">

            </main>
            <footer className="app_footer">
                <nav>
                    <Link to="/" />
                    <Link to="/admin" />
                </nav>
            </footer>
        </div>
    );
}
