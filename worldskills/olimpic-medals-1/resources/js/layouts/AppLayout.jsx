import { HomeIcon, UserRoundCogIcon } from "lucide-react";
import React from "react";
import { Link, Outlet } from "react-router-dom";

export default function AppLayout() {
    return (
        <div
            className="w-full max-w-6xl m-auto flex flex-col"
            style={{
                height: "100dvh",
                padding: "1rem 1rem",
            }}
        >
            <main className="grow">
                <Outlet />
            </main>
            <footer
                style={{
                    backgroundColor: "#ddd",
                    padding: "1rem",
                    borderRadius: "10px",
                    position: "fixed",
                    bottom: "1rem",
                    left: "1rem",
                    right: "1rem",
                }}
            >
                <nav
                    className="flex items-center justify-center"
                    style={{ gap: "4rem" }}
                >
                    <Link to="/">
                        <HomeIcon size={40} />
                    </Link>
                    <Link to="/admin">
                        <UserRoundCogIcon size={40} />
                    </Link>
                </nav>
            </footer>
        </div>
    );
}
