import React, { useState } from "react";
import { SearchIcon } from "lucide-react";

import { useGetData } from "../hooks/useApi";
import LoadingComponent from "../components/LoadingComponent";
import { Link } from "react-router-dom";

export default function Teams() {
    const [search, setSearch] = useState("");
    const { data: teams, loading: teamsLoading } = useGetData(`/teams?search=${search}`);

    if (teamsLoading) return <LoadingComponent />;
    return (
        <section className="w-full max-w-6xl m-auto flex flex-col gap-6">
            <h1 className="text-5xl font-bold">Listado de selecciones</h1>
            <div className="flex gap-5">
                <label className="input w-full max-w-md border flex gap-2 items-center p-2 rounded">
                    <SearchIcon size={20} />
                    <input
                        type="text"
                        name="search"
                        id="search-input"
                        placeholder="Buscar selección"
                        className="w-full"
                        value={search}
                        onChange={(e) => {
                            setSearch(e.target.value);
                        }}
                    />
                </label>
            </div>
            <div className="flex flex-col gap-4">
                {teams.map((team) => (
                    <Link
                        to={`/teams/${team.team_id}`}
                        key={team.team_id}
                        className="w-full border rounded-xl p-5 flex gap-8 items-center"
                    >
                        <img
                            src={team.team_image}
                            alt={`Imagen del equipo ${team.team_image}`}
                            className="w-full border"
                            style={{
                                maxWidth: 200,
                                aspectRatio: 1/1,
                            }}
                        />
                        <h1 className="text-3xl font-semibold">
                            {team.team_name} ({team.team_code})
                        </h1>
                    </Link>
                ))}
            </div>
        </section>
    );
}
