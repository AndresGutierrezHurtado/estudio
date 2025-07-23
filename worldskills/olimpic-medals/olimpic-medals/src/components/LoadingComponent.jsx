import React from "react";

export default function LoadingComponent() {
    return (
        <div className="w-fit mx-auto py-15 space-y-2 flex flex-col items-center">
            <div className="loading w-45 mx-auto"></div>
            <h1 className="text-5xl font-bold text-center">Cargando...</h1>
            <p className="text-center text-lg text-base-content/70">Espera pacientemente a que carguen tus datos.</p>
        </div>
    );
}
