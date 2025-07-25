import React, { useState } from "react";
import { Link, useParams, useSearchParams } from "react-router-dom";
import { SearchIcon } from "lucide-react";

import { useGetData } from "../hooks/useApi";
import LoadingComponent from "../components/LoadingComponent";

export default function Team() {
    const { id } = useParams();

    const { data: team, loading: teamLoading } = useGetData(`/teams/${id}`);

    if (teamLoading) return <LoadingComponent />;

    const plays = team.plays;
    const winnedPlays = plays.filter(play => {
        
    });
    return (
        <section className="w-full max-w-6xl m-auto flex flex-col gap-5">
            <div className="flex flex-col gap-2 items-center mx-auto">
                <img
                    src={team.team_image}
                    alt={`Imagen del equipo ${team.team_image}`}
                    className="w-full border"
                    style={{
                        maxWidth: 200,
                        aspectRatio: 1 / 1,
                    }}
                />
                <h1 className="text-3xl font-semibold">
                    {team.team_name} ({team.team_code})
                </h1>
            </div>
            <hr style={{ borderColor: "#00000050" }} />
            <div className="flex flex-col gap-2 items-center mx-auto text-lg">
                <div className="flex items-center gap-1">
                    <p className="font-bold">Partidos jugados:</p>
                    <p>{plays.length}</p>
                </div>
            </div>
        </section>
    );
}
