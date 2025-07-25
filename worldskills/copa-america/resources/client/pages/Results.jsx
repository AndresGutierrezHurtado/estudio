import React, { useState } from "react";

import LoadingComponent from "../components/LoadingComponent";
import { useGetData } from "../hooks/useApi";
import { SearchIcon } from "lucide-react";

export default function Results() {
    const [search, setSearch] = useState("");
    const { data: results, loading: resultsLoading } = useGetData(
        `/plays?search=${search}`
    );

    if (resultsLoading) return <LoadingComponent />;

    return (
        <section className="w-full max-w-7xl m-auto flex flex-col gap-8">
            <h1 className="text-5xl font-bold" style={{ lineHeight: 1.1 }}>
                Resultados de los partidos
            </h1>
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
            <div>
                {results.map((result) => (
                    <div
                        key={result.play_id}
                        className="w-full border p-4 rounded-lg flex justify-between items-center gap-4"
                    >
                        <div className="flex gap-2">
                            <div className="flex flex-col gap-2 items-center">
                                <img
                                    src={result.teams[0].team_image}
                                    alt={result.teams[0].team_name}
                                    width={90}
                                    height={90}
                                    className="rounded-md"
                                />
                                <p>{result.teams[0].team_name}</p>
                            </div>
                        </div>
                        <div className="flex flex-col items-center gap-4">
                            <div className="flex flex-row gap-2 items-center text-2xl font-semibold">
                                <p>{result.teams[0].pivot.team_goals}</p>
                                <p>-</p>
                                <p>{result.teams[1].pivot.team_goals}</p>
                            </div>
                            <div className="flex flex-col items-center text-center text-xs">
                                <p>
                                    {new Date(
                                        result.play_date +
                                            " " +
                                            result.play_start
                                    ).toLocaleDateString()}
                                </p>
                                <p>
                                    {new Date(
                                        result.play_date +
                                            " " +
                                            result.play_start
                                    ).toLocaleTimeString()}
                                </p>
                            </div>
                        </div>
                        <div className="flex gap-2">
                            <div className="flex flex-col gap-2 items-center">
                                <img
                                    src={result.teams[1].team_image}
                                    alt={result.teams[1].team_name}
                                    width={90}
                                    height={90}
                                    className="rounded-md"
                                />
                                <p>{result.teams[1].team_name}</p>
                            </div>
                        </div>
                    </div>
                ))}
            </div>
        </section>
    );
}
