import { LibraryIcon, UserCog2Icon } from "lucide-react";
import React from "react";
import { Link, Outlet } from "react-router-dom";

export default function AppLayout() {
    return (
        <div className="app_root">
            <main className="app__main">
                <Outlet />
            </main>
            <footer className="app_footer">
                <nav>
                    <Link to="/">
                        <LibraryIcon />
                    </Link>
                    <Link to="/admin">
                        <UserCog2Icon />
                    </Link>
                </nav>
            </footer>
        </div>
    );
}
