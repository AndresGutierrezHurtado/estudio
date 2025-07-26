import React from "react";
import { Link } from "react-router-dom";
import { ChartColumn, GlobeIcon, ListIcon } from "lucide-react";

export default function Admin() {
    return (
        <section className="container container__menu">
            <h1 className="text-4xl font-bold" style={{ lineHeight: 1.1 }}>
                Administrar copa américa
            </h1>
            <div>
                <div className="card">
                    <GlobeIcon size={30} />
                    <Link to="/admin/teams">Agregar selecciones</Link>
                </div>
                <div className="card">
                    <ListIcon size={30} />
                    <Link to="/admin/matches">Agregar partidos</Link>
                </div>
            </div>
        </section>
    );
}
