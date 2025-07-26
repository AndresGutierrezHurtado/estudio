import { SearchIcon } from "lucide-react";
import React, { useState } from "react";
import { useGetData } from "../../hooks/useApi";
import { Link, useParams } from "react-router-dom";

export default function Team() {
    const { id } = useParams();

    const { data: team, loading: teamLoading } = useGetData(`/teams/${id}`);

    if (teamLoading) return <h1>cargando...</h1>;

    const diffGoals = team.stats.goals_for - team.stats.goals_against;
    return (
        <section className="w-full flex flex-col gap-2">
            <figure
                className="border rounded m-auto"
                style={{
                    width: "40%",
                    aspectRatio: 1,
                    overflow: "hidden",
                    marginTop: "3rem",
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
            <h1 className="text-4xl font-bold text-center">
                {team.team_name} ({team.team_code})
            </h1>
            <h1 className="text-3xl font-bold text-center">Resumen</h1>
            <div
                className="text-xl font-semibold"
                style={{
                    padding: "0 2rem",
                }}
            >
                <div className="w-full flex items-center justify-between">
                    <p>Posicion</p>
                    <p>1</p>
                </div>
                <div className="w-full flex items-center justify-between">
                    <p>Partidos Jugados</p>
                    <p>{team.stats.win + team.stats.lost + team.stats.drawn}</p>
                </div>
                <div className="w-full flex items-center justify-between">
                    <p>Partidos Ganados</p>
                    <p>{team.stats.win}</p>
                </div>
                <div className="w-full flex items-center justify-between">
                    <p>Partidos Perdidos</p>
                    <p>{team.stats.lost}</p>
                </div>
                <div className="w-full flex items-center justify-between">
                    <p>Partidos Empatados</p>
                    <p>{team.stats.drawn}</p>
                </div>
                <div className="w-full flex items-center justify-between">
                    <p>Goles a favor</p>
                    <p>{team.stats.goals_for}</p>
                </div>
                <div className="w-full flex items-center justify-between">
                    <p>Goles en contra</p>
                    <p>{team.stats.goals_against}</p>
                </div>
                <div className="w-full flex items-center justify-between">
                    <p>Diferencia de goles</p>
                    <p>{diffGoals}</p>
                </div>
            </div>
        </section>
    );
}
