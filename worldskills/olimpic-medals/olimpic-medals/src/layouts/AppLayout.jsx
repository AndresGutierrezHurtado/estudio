import React from "react";
import { Link, Outlet, useLocation } from "react-router-dom";
import { ChartNoAxesColumnIcon, GlobeIcon, MedalIcon, MenuIcon, UserIcon } from "lucide-react";

export default function AppLayout() {
    const location = useLocation();
    const pathname = location.pathname;

    return (
        <div className="drawer lg:drawer-open">
            <input id="my-drawer-2" type="checkbox" className="drawer-toggle" />
            <div className="drawer-content flex flex-col px-5 py-1">
                {/* Page content here */}
                <label htmlFor="my-drawer-2" className="btn btn-primary drawer-button lg:hidden">
                    <MenuIcon />
                </label>
                <Outlet />
            </div>
            <div className="drawer-side">
                <label
                    htmlFor="my-drawer-2"
                    aria-label="close sidebar"
                    className="drawer-overlay"
                ></label>
                <ul className="menu bg-base-200 text-base-content min-h-full w-80 p-4 gap-10">
                    {/* Sidebar content here */}
                    <Link to="/">
                        <h1 className="text-3xl font-bold">Medallas Olímpicas</h1>
                    </Link>
                    <div className="lg:text-lg">
                        <li>
                            <Link to="/" className={pathname === "/" && "text-primary font-semibold"}>
                                <ChartNoAxesColumnIcon size={18} />
                                Top de paises
                            </Link>
                        </li>
                        <li>
                            <Link
                                to="/admin/countries"
                                className={pathname === "/admin/countries" && "text-primary font-semibold"}
                            >
                                <GlobeIcon size={18} />
                                Gestión de paises
                            </Link>
                        </li>
                        <li>
                            <Link
                                to="/admin/competitors"
                                className={pathname === "/admin/competitors" && "text-primary font-semibold"}
                            >
                                <UserIcon size={18} />
                                Gestión de competidores
                            </Link>
                        </li>
                        <li>
                            <Link
                                to="/admin/medals"
                                className={pathname === "/admin/medals" && "text-primary font-semibold"}
                            >
                                <MedalIcon size={18} />
                                Gestión de medallas
                            </Link>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    );
}
