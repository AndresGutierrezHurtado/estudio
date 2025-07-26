import React from "react";
import { Link } from "react-router-dom";
import { ChartColumn, ClockIcon, Globe2Icon } from "lucide-react";

export default function Menu() {
    return (
        <section className="w-full flex flex-col gap-5">
            <h1
                className="text-5xl font-bold text-center"
                style={{ marginTop: "5rem" }}
            >
                Bienvenido
            </h1>
            <div className="flex flex-col gap-3">
                <Link
                    to="/teams"
                    className="flex gap-5 items-center p-7 rounded-lg border"
                >
                    <Globe2Icon size={60} style={{ width: "30%" }} />
                    <span
                        className="text-3xl font-bold"
                        style={{ lineHeight: 1.1 }}
                    >
                        Selecciones de fútbol
                    </span>
                </Link>
                <Link
                    to="/results"
                    className="flex gap-5 items-center p-7 rounded-lg border"
                >
                    <ClockIcon size={60} style={{ width: "30%" }} />
                    <span
                        className="text-3xl font-bold"
                        style={{ lineHeight: 1.1 }}
                    >
                        Resultados de partidos
                    </span>
                </Link>
                <Link
                    to="/ranking"
                    className="flex gap-5 items-center p-7 rounded-lg border"
                >
                    <ChartColumn size={60} style={{ width: "30%" }} />
                    <span
                        className="text-3xl font-bold"
                        style={{ lineHeight: 1.1 }}
                    >
                        Tabla de posiciones
                    </span>
                </Link>
            </div>
        </section>
    );
}
