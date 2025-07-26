import React, { useState, useEffect } from "react";
import { useApi, useGetData } from "../hooks/useApi";
import LoadingComponent from "../components/LoadingComponent";

export default function MatchesManagement() {
    const { data: teams, loading: teamsLoading } = useGetData(`/teams`);

    if (teamsLoading) return <LoadingComponent />;

    const handleSubmit = async (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);

        // Convert form data to JSON for the API
        const matchData = {
            local_id: parseInt(formData.get("local_id")),
            local_goals: parseInt(formData.get("local_goals")),
            team_id: parseInt(formData.get("team_id")),
            team_goals: parseInt(formData.get("team_goals")),
            play_date: formData.get("play_date"),
            play_start: formData.get("play_start"),
        };

        const response = await useApi(
            "POST",
            "/plays",
            matchData,
            true,
            "application/json"
        );

        if (!response.success) return;

        e.target.reset();
    };

    return (
        <section className="w-full max-w-6xl m-auto flex flex-col gap-8">
            <h1 className="text-4xl font-bold" style={{ lineHeight: 1.1 }}>
                Administrar partidos
            </h1>
            <div>
                <form onSubmit={handleSubmit} className="flex flex-col gap-4">
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {/* Local Team */}
                        <fieldset className="flex flex-col gap-2">
                            <label htmlFor="local_id">Equipo Local:</label>
                            <select
                                id="local_id"
                                name="local_id"
                                className="border rounded-lg p-2"
                                required
                            >
                                <option value="">
                                    Seleccionar equipo local
                                </option>
                                {teams.map((team) => (
                                    <option
                                        key={team.team_id}
                                        value={team.team_id}
                                    >
                                        {team.team_name} ({team.team_code})
                                    </option>
                                ))}
                            </select>
                        </fieldset>

                        {/* Local Goals */}
                        <fieldset className="flex flex-col gap-2">
                            <label htmlFor="local_goals">Goles Local:</label>
                            <input
                                type="number"
                                id="local_goals"
                                name="local_goals"
                                placeholder="0"
                                className="border rounded-lg p-2"
                                min="0"
                                required
                            />
                        </fieldset>

                        {/* Away Team */}
                        <fieldset className="flex flex-col gap-2">
                            <label htmlFor="team_id">Equipo Visitante:</label>
                            <select
                                id="team_id"
                                name="team_id"
                                className="border rounded-lg p-2"
                                required
                            >
                                <option value="">
                                    Seleccionar equipo visitante
                                </option>
                                {teams.map((team) => (
                                    <option
                                        key={team.team_id}
                                        value={team.team_id}
                                    >
                                        {team.team_name} ({team.team_code})
                                    </option>
                                ))}
                            </select>
                        </fieldset>

                        {/* Away Goals */}
                        <fieldset className="flex flex-col gap-2">
                            <label htmlFor="team_goals">Goles Visitante:</label>
                            <input
                                type="number"
                                id="team_goals"
                                name="team_goals"
                                placeholder="0"
                                className="border rounded-lg p-2"
                                min="0"
                                required
                            />
                        </fieldset>
                    </div>

                    <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {/* Match Date */}
                        <fieldset className="flex flex-col gap-2">
                            <label htmlFor="play_date">
                                Fecha del partido:
                            </label>
                            <input
                                type="date"
                                id="play_date"
                                name="play_date"
                                className="border rounded-lg p-2"
                                required
                            />
                        </fieldset>

                        {/* Match Time */}
                        <fieldset className="flex flex-col gap-2">
                            <label htmlFor="play_start">
                                Hora del partido:
                            </label>
                            <input
                                type="time"
                                id="play_start"
                                name="play_start"
                                className="border rounded-lg p-2"
                                required
                            />
                        </fieldset>
                    </div>

                    <button
                        type="submit"
                        className="border rounded-lg p-2"
                        style={{ marginTop: "1rem" }}
                    >
                        Agregar partido
                    </button>
                </form>
            </div>
        </section>
    );
}
