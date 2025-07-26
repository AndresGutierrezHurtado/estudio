import { ClockIcon, Globe2Icon } from "lucide-react";
import React from "react";
import { Link } from "react-router-dom";


export default function Admin() {
    return (
        <section className="w-full flex flex-col gap-5">
            <h1
                className="text-5xl font-bold text-center"
                style={{ marginTop: "5rem", lineHeight: 1.1 }}
            >
                Opciones de administrador
            </h1>
            <div className="flex flex-col gap-3">
                <Link
                    to="/admin/teams"
                    className="flex gap-5 items-center p-7 rounded-lg border"
                >
                    <Globe2Icon size={60} style={{ width: "30%" }} />
                    <span
                        className="text-3xl font-bold"
                        style={{ lineHeight: 1.1 }}
                    >
                        Registrar seleccion
                    </span>
                </Link>
                <Link
                    to="/admin/results"
                    className="flex gap-5 items-center p-7 rounded-lg border"
                >
                    <ClockIcon size={60} style={{ width: "30%" }} />
                    <span
                        className="text-3xl font-bold"
                        style={{ lineHeight: 1.1 }}
                    >
                        Registrar de partido
                    </span>
                </Link>
            </div>
        </section>
    );
}
