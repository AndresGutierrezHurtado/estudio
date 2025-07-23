import React, { useState } from "react";
import { useGetData } from "../hooks/useApi";
import LoadingComponent from "../components/LoadingComponent";
import { PencilIcon, SearchIcon, Trash2Icon } from "lucide-react";

export default function MedalManagement() {
    const [search, setSearch] = useState("");
    const [page, setPage] = useState(1);

    const {
        data: medals,
        loading: medalsLoading,
        reload: medalsReload,
    } = useGetData(`/medals?search=${search}&page=${page}`);

    if (medalsLoading || !medals) return <LoadingComponent />;

    return (
        <>
            <section className="w-full px-5">
                <div className="w-full max-w-[1200px] mx-auto py-10 space-y-8">
                    <h1 className="text-4xl font-bold">Gestión de medallas</h1>

                    {/* filtros */}
                    <div className="flex items-center justify-between">
                        <div className="w-full max-w-sm">
                            <label className="input w-full">
                                <SearchIcon size={18} />
                                <input
                                    type="text"
                                    className="w-full"
                                    placeholder="Buscar país por nombre o código"
                                    value={search}
                                    onChange={(e) => setSearch(e.target.value)}
                                />
                                <div className="flex items-center gap-1">
                                    <kbd className="kbd kbd-sm">Alt</kbd>
                                    <span>+</span>
                                    <kbd className="kbd kbd-sm">S</kbd>
                                </div>
                            </label>
                        </div>
                        <div></div>
                    </div>

                    {/* Tabla */}
                    <div className="w-full overflow-x-auto bg-base-200 border border-base-300 rounded">
                        <table className="table">
                            <thead>
                                <tr>
                                    <th>Código medalla</th>
                                    <th>País</th>
                                    <th>Tipo</th>
                                    <th>Competidores</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                {medals.length === 0 && (
                                    <tr>
                                        <th colSpan="5">No se encontraron resultados...</th>
                                    </tr>
                                )}
                                {medals.map((medal) => (
                                    <tr key={medal.medal_id}>
                                        <th>{medal.medal_id}</th>
                                        <th>
                                            {medal.country.country_name} - (
                                            {medal.country.country_name})
                                        </th>
                                        <th>{medal.medal_type}</th>
                                        <th>
                                            <ul>
                                                {medal.competitors.map((competitor) => (
                                                    <li>
                                                        {competitor.competitor_name}{" "}
                                                        {competitor.competitor_lastname}
                                                    </li>
                                                ))}
                                            </ul>
                                        </th>
                                        <th>
                                            <div className="flex flex-wrap gap-2">
                                                <button
                                                    className="btn btn-primary w-10 h-10 p-0 tooltip tooltip-left"
                                                    data-tip="Editar competidor"
                                                >
                                                    <PencilIcon size={18} />
                                                </button>
                                                <button
                                                    className="btn btn-error w-10 h-10 p-0 tooltip tooltip-left"
                                                    data-tip="Eliminar competidor"
                                                >
                                                    <Trash2Icon size={18} />
                                                </button>
                                            </div>
                                        </th>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </>
    );
}
