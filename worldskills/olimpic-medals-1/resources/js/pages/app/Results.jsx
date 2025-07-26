import { SearchIcon } from "lucide-react";
import React, { useState } from "react";
import { useGetData } from "../../hooks/useApi";
import { Link } from "react-router-dom";

export default function Results() {
    const [search, setSearch] = useState("");

    const { data: plays, loading: playsLoading } = useGetData(
        `/plays?search=${search}`
    );

    if (playsLoading) return <h1>cargando...</h1>;

    return (
        <section className="w-full flex flex-col gap-5">
            {/* Title */}
            <h1
                className="text-5xl font-bold text-center"
                style={{ marginTop: "5rem", lineHeight: 1.1 }}
            >
                Resultados de partidos
            </h1>

            {/* Search filter */}
            <div>
                <label className="w-full max-w-xl m-auto border rounded-lg flex items-center gap-2 p-2">
                    <SearchIcon />
                    <input
                        type="text"
                        className="grow"
                        placeholder="Buscar resultados por pais o fecha..."
                        value={search}
                        onChange={(e) => {
                            setSearch(e.target.value);
                        }}
                    />
                </label>
            </div>

            {/* Plays list */}
            <div className="flex flex-col gap-4">
                {plays.map((play) => {
                    const local = play.teams.find(
                        (value) => value.pivot.team_local == 1
                    );
                    const other = play.teams.find(
                        (value) => value.pivot.team_local == 0
                    );
                    return (
                        <div
                            key={play.play_id}
                            className="w-full flex items-center gap-3 p-3 rounded-xl border rounded-xl"
                        >
                            <div className="flex flex-col items-center">
                                <Link
                                    to={`/teams/${local.team_id}`}
                                    className="rounded"
                                    style={{
                                        width: "80%",
                                        aspectRatio: 1,
                                        overflow: "hidden",
                                    }}
                                >
                                    <img
                                        src={local.team_image}
                                        alt={`Imagen del equipo ${local.team_name}`}
                                        style={{
                                            width: "100%",
                                            height: "100%",
                                            objectFit: "cover",
                                        }}
                                    />
                                </Link>
                                <h3 className="font-bold " style={{marginTop: '0.5rem'}}>
                                    {local.team_name} ({local.team_code})
                                </h3>
                            </div>
                            <div className="grow flex flex-col items-center gap-2">
                                <div className="flex items-center gap-1 text-xl font-bold">
                                    <span>{local.pivot.team_goals}</span>
                                    <span>-</span>
                                    <span>{other.pivot.team_goals}</span>
                                </div>
                                <div className="text-center">
                                    <p>{new Date(play.play_date + " " +play.play_start).toLocaleDateString()}</p>
                                    <p className="text-xs">{new Date(play.play_date + " " +play.play_start).toLocaleTimeString()}</p>
                                </div>
                            </div>
                            <div className="flex flex-col items-center">
                                <Link
                                    to={`/teams/${other.team_id}`}
                                    className="rounded"
                                    style={{
                                        width: "80%",
                                        aspectRatio: 1,
                                        overflow: "hidden",
                                    }}
                                >
                                    <img
                                        src={other.team_image}
                                        alt={`Imagen del equipo ${other.team_name}`}
                                        style={{
                                            width: "100%",
                                            height: "100%",
                                            objectFit: "cover",
                                        }}
                                    />
                                </Link>
                                <h3 className="font-bold " style={{marginTop: '0.5rem'}}>
                                    {other.team_name} ({other.team_code})
                                </h3>
                            </div>
                        </div>
                    );
                })}
            </div>
        </section>
    );
}
