import { SearchIcon } from "lucide-react";
import React, { useState } from "react";
import { useGetData } from "../../hooks/useApi";
import { Link } from "react-router-dom";

export default function Teams() {
    const [search, setSearch] = useState("");

    const { data: teams, loading: teamsLoading } = useGetData(
        `/teams?search=${search}`
    );

    if (teamsLoading) return <h1>cargando...</h1>;

    return (
        <section className="w-full flex flex-col gap-5">
            {/* Title */}
            <h1
                className="text-5xl font-bold text-center"
                style={{ marginTop: "5rem", lineHeight: 1.1 }}
            >
                Selecciones de fútbol
            </h1>

            {/* Search filter */}
            <div>
                <label className="w-full max-w-xl m-auto border rounded-lg flex items-center gap-2 p-2">
                    <SearchIcon />
                    <input
                        type="text"
                        className="grow"
                        placeholder="Buscar selecciones..."
                        value={search}
                        onChange={(e) => {
                            setSearch(e.target.value);
                        }}
                    />
                </label>
            </div>

            {/* Teams list */}
            <div className="flex flex-col gap-4">
                {teams.map((team) => (
                    <Link
                        to={`/teams/${team.team_id}`}
                        key={team.team_id}
                        className="w-full flex items-center gap-3 p-3 rounded-xl border"
                    >
                        <figure
                            className="border rounded"
                            style={{
                                width: "30%",
                                aspectRatio: 1,
                                overflow: "hidden",
                            }}
                        >
                            <img
                                src={team.team_image}
                                alt={`Imagen del equipo ${team.team_name}`}
                                style={{
                                    width: "100%",
                                    height: "100%",
                                    objectFit: "cover",
                                }}
                            />
                        </figure>
                        <div>
                            <h1 className="text-3xl font-bold">
                                {team.team_name} ({team.team_code})
                            </h1>
                        </div>
                    </Link>
                ))}
            </div>
        </section>
    );
}
