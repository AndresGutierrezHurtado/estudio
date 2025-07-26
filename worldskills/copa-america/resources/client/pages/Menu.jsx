import React from "react";
import { Link } from "react-router-dom";
import { ChartColumn, GlobeIcon, ListIcon } from "lucide-react";

export default function Menu() {
    return (
        <section className="container container__menu">
            <h1 className="text-4xl font-bold" style={{ lineHeight: 1.1 }}>
                Copa américa femenina
            </h1>
            <div>
                <div className="card">
                    <GlobeIcon size={30} />
                    <Link to="/teams">Ver selecciones</Link>
                </div>
                <div className="card">
                    <ListIcon size={30} />
                    <Link to="/results">Ver resultados</Link>
                </div>
                <div className="card">
                    <ChartColumn size={30} />
                    <Link to="/ranking">Ver posiciones</Link>
                </div>
            </div>
        </section>
    );
}
