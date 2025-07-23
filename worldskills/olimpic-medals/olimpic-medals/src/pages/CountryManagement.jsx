import React, { useState } from "react";
import { PencilIcon, SearchIcon, Trash2Icon, XIcon } from "lucide-react";

// Hooks
import { useGetData } from "../hooks/useApi";

// Components
import LoadingComponent from "../components/LoadingComponent";

export default function CountryManagement() {
    const [search, setSearch] = useState("");
    const [page, setPage] = useState(1);

    const {
        data: countries,
        loading: countriesLoading,
        reload: countriesReload,
    } = useGetData(`/countries?search=${search}&page=${page}`);

    if (countriesLoading || !countries) return <LoadingComponent />;

    return (
        <section className="w-full max-w-[1200px] mx-auto py-10 space-y-10">
            <h1 className="text-5xl font-extrabold">Gestión de paises</h1>

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
            <div className="w-full overflow-x-auto bg-base-200 border border-base-300 rounded-lg">
                <table className="table">
                    <thead>
                        <tr>
                            <th>Identificador</th>
                            <th>Nombre</th>
                            <th>Código</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {countries.length === 0 && (
                            <tr>
                                <td
                                    colSpan={4}
                                    className="text-center text-lg text-base-content/80"
                                >
                                    No se encontraron resultados..
                                </td>
                            </tr>
                        )}
                        {countries.map((country) => (
                            <tr key={country.country_id}>
                                <th>{country.country_id}</th>
                                <td>{country.country_name}</td>
                                <td>{country.country_code}</td>
                                <td>
                                    <div className="flex flex-wrap gap-4">
                                        <button
                                            type="button"
                                            className="btn h-10 w-10 p-0 btn-primary tooltip tooltip-left"
                                            data-tip="Editar el país"
                                            onClick={() => {
                                                document.getElementById("create-modal").show();
                                            }}
                                        >
                                            <PencilIcon size={18} />
                                        </button>
                                        <button
                                            className="btn h-10 w-10 p-0 btn-error tooltip tooltip-left"
                                            data-tip="Eliminar el país"
                                        >
                                            <Trash2Icon size={18} />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>

            <dialog className="modal" id="create-modal">
                <div className="modal-box">
                    <form method="dialog" className="w-full flex justify-end">
                        <button className="btn btn-ghost btn-circle">
                            <XIcon />
                        </button>
                    </form>

                    {/* Content */}
                </div>
                <form method="dialog" className="modal-backdrop bg-black/20">
                    <button>Cerrar</button>
                </form>
            </dialog>
        </section>
    );
}
