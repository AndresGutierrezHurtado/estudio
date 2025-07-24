import React from "react";
import { Link } from "react-router-dom";

export default function Menu() {
    return (
        <div>
            <Link to="/teams">Ver selecciones</Link>
            <Link to="/results">Ver resultados</Link>
            <Link to="/ranking">Ver posiciones</Link>
        </div>
    );
}
