import React from "react";

import LoadingComponent from "../components/LoadingComponent";
import { useGetData } from "../hooks/useApi";

export default function Ranking() {
    const { data: ranking, loading: rankingLoading } =
        useGetData("/teams/ranking");

    if (rankingLoading) return <LoadingComponent />;

    console.log(ranking);

    return (
        <div className="w-full max-w-7xl m-auto flex flex-col gap-8">
            <h1 className="text-5xl font-bold" style={{ lineHeight: 1.1 }}>
                Ranking
            </h1>
            {/* Table with country, points, wins, draws, losses, goals for, goals against */}
            <div className="w-full border rounded-md" style={{ overflowX: "auto", minWidth: "100%" }}>
                <table className="w-full text-xs">
                    <thead style={{ backgroundColor: "#eee", color: "#000" }}>
                        <tr>
                            <th>Nombre</th>
                            <th>PTS</th>
                            <th>PJ</th>
                            <th>PG</th>
                            <th>PE</th>
                            <th>PP</th>
                            <th>GF</th>
                            <th>GC</th>
                        </tr>
                    </thead>
                    <tbody>
                        {ranking.map((team) => (
                            <tr key={team.team_id}>
                                <td>{team.team_name}</td>
                                <td>{team.team_points}</td>
                                <td>{team.team_played}</td>
                                <td>{team.team_wins}</td>
                                <td>{team.team_draws}</td>
                                <td>{team.team_losses}</td>
                                <td>{team.team_goals_for}</td>
                                <td>{team.team_goals_against}</td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </div>
    );
}
