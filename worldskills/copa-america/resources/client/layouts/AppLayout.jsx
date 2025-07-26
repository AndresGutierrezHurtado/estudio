import { LibraryIcon, UserCog2Icon } from "lucide-react";
import React from "react";
import { Link, Outlet } from "react-router-dom";

export default function AppLayout() {
    return (
        <div className="app__root">
            <main className="app__main">
                <Outlet />
            </main>
            <footer className="app__footer container max-w-6xl">
                <nav>
                    <Link to="/">
                        <LibraryIcon size={40} />
                    </Link>
                    <Link to="/admin">
                        <UserCog2Icon size={40} />
                    </Link>
                </nav>
            </footer>
        </div>
    );
}
