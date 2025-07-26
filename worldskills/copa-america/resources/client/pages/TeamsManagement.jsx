import React from "react";
import { useApi } from "../hooks/useApi";

export default function TeamsManagement() {
    const handleSubmit = async (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);

        const response = await useApi(
            "POST",
            "/teams",
            formData,
            true,
            "multipart/form-data"
        );

        if (!response.success) return;

        e.target.reset();
    };

    return (
        <section className="w-full max-w-6xl m-auto flex flex-col gap-8">
            <h1 className="text-4xl font-bold" style={{ lineHeight: 1.1 }}>
                Administrar selecciones
            </h1>
            <div>
                <form onSubmit={handleSubmit} className="flex flex-col gap-4">
                    <fieldset className="flex flex-col gap-2">
                        <label htmlFor="name">Nombre:</label>
                        <input
                            type="text"
                            id="name"
                            name="team_name"
                            placeholder="Nombre de la seleccion"
                            className="border rounded-lg p-2"
                        />
                    </fieldset>
                    <fieldset className="flex flex-col gap-2">
                        <label htmlFor="code">Codigo:</label>
                        <input
                            type="text"
                            id="code"
                            name="team_code"
                            placeholder="Codigo de la seleccion"
                            className="border rounded-lg p-2"
                            maxLength={3}
                            minLength={3}
                            pattern="[A-Z]{3}"
                            title="El codigo debe tener 3 letras mayusculas"
                        />
                    </fieldset>
                    <fieldset className="flex flex-col gap-2">
                        <label htmlFor="flag">Bandera:</label>
                        <input
                            type="file"
                            id="flag"
                            name="team_image"
                            className="border rounded-lg p-2"
                        />
                    </fieldset>
                    <button
                        type="submit"
                        className="border rounded-lg p-2"
                        style={{ marginTop: "1rem" }}
                    >
                        Agregar
                    </button>
                </form>
            </div>
        </section>
    );
}
