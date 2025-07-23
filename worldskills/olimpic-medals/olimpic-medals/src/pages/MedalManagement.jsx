import React, { useEffect, useState } from "react";
import { useFetch, useGetData } from "../hooks/useApi";
import LoadingComponent from "../components/LoadingComponent";
import { PencilIcon, PlusIcon, SearchIcon, Trash2Icon, UploadIcon, XIcon } from "lucide-react";
import Swal from "sweetalert2";

export default function MedalManagement() {
    const [search, setSearch] = useState("");
    const [page, setPage] = useState(1);

    const {
        data: medals,
        loading: medalsLoading,
        reload: medalsReload,
    } = useGetData(`/medals?search=${search}&page=${page}`);

    const {
        data: countries,
        loading: countriesLoading,
        reload: countriesReload,
    } = useGetData(`/countries?search=${search}&page=${page}`);

    const {
        data: competitors,
        loading: competitorsLoading,
        reload: competitorsReload,
    } = useGetData(`/competitors?search=${search}&page=${page}`);

    useEffect(() => {
        const handleKeyDown = (e) => {
            console.log(e);
            if (e.altKey && e.key === "s") {
                const $input = document.querySelector("#search-input");
                if ($input) $input.focus();
            }
        };

        document.addEventListener("keydown", handleKeyDown);
        return () => document.removeEventListener("keydown", handleKeyDown);
    }, []);

    if (medalsLoading || competitorsLoading || countriesLoading || !medals) {
        return <LoadingComponent />;
    }

    const handleSubmit = async (e) => {
        e.preventDefault();

        const data = Object.fromEntries(new FormData(e.target));
        // validation

        // setLoading(true);
        const response = await useFetch("post", "/medals", data);

        // if (response) setLoading(false);
        if (!response.success) return;

        medalsReload();
        e.target.reset();
        const $modal = document.getElementById("create-modal");
        if ($modal) $modal.close();
    };

    const handleSubmitEdit = async (e, id) => {
        e.preventDefault();

        const data = Object.fromEntries(new FormData(e.target));
        // validation

        // setLoading(true);
        const response = await useFetch("put", `/medals/${id}`, data);

        // if (response) setLoading(false);
        if (!response.success) return;

        medalsReload();
        e.target.reset();
        const $modal = document.getElementById(`update-modal-${id}`);
        if ($modal) $modal.close();
    };

    const handleDelete = (id) => {
        Swal.fire({
            icon: "warning",
            title: "Ten cuidado",
            text: "Esta acción es irreversible, ¿deseas continuar?",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            showConfirmButton: true,
            confirmButtonText: "Continuar",
        }).then(async ({ isConfirmed }) => {
            if (!isConfirmed) return;

            const response = await useFetch("delete", `/medals/${id}`);

            if (!response.success) return;

            medalsReload();
        });
    };

    return (
        <>
            <section className="w-full px-5">
                <div className="w-full max-w-[1200px] mx-auto py-10 space-y-8">
                    <h1 className="text-4xl font-bold">Gestión de medallas</h1>

                    {/* filtros */}
                    <div className="flex items-center justify-between gap-4">
                        <div className="w-full max-w-sm">
                            <label className="input w-full">
                                <SearchIcon size={18} />
                                <input
                                    type="text"
                                    id="search-input"
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
                        <div>
                            <div
                                className="btn btn-primary h-10 w-10 p-0 tooltip tooltip-left"
                                data-tip="Agregar una medalla nueva"
                                onClick={() => {
                                    document.getElementById("create-modal").show();
                                }}
                            >
                                <PlusIcon />
                            </div>
                        </div>
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
                                                    data-tip="Editar la medalla"
                                                    onClick={() => {
                                                        document
                                                            .getElementById(
                                                                `update-modal-${medal.medal_id}`
                                                            )
                                                            .show();
                                                    }}
                                                >
                                                    <PencilIcon size={18} />
                                                </button>
                                                <button
                                                    className="btn btn-error w-10 h-10 p-0 tooltip tooltip-left"
                                                    data-tip="Eliminar la medalla"
                                                    onClick={() => handleDelete(medal.medal_id)}
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

            {/* Create Medal Modal */}
            <dialog className="modal" id="create-modal">
                <div className="modal-box">
                    <form method="dialog" className="w-full flex justify-between">
                        <h2 className="text-3xl font-bold">Agregar medalla</h2>
                        <button className="btn btn-ghost btn-circle">
                            <XIcon />
                        </button>
                    </form>

                    {/* Content */}
                    <form onSubmit={handleSubmit}>
                        <fieldset className="fieldset">
                            <label
                                htmlFor="medal_type"
                                className="fieldset-label text-base after:content-['*'] after:text-error"
                            >
                                Tipo:
                            </label>
                            <select name="medal_type" id="medal_type" className="select">
                                <option value="">Seleccionar el tipo de medalla</option>
                                <option value="gold">🥇 Oro</option>
                                <option value="silver">🥈 Plata</option>
                                <option value="Bronze">🥉 Bronce</option>
                            </select>
                        </fieldset>
                        <fieldset className="fieldset">
                            <label
                                htmlFor="medal_sport"
                                className="fieldset-label text-base after:content-['*'] after:text-error"
                            >
                                Deporte:
                            </label>
                            <input
                                type="text"
                                className="input"
                                id="medal_sport"
                                name="medal_sport"
                                placeholder="Ingresa el deporte o categoria de esta medalla"
                            />
                        </fieldset>
                        <fieldset className="fieldset">
                            <label
                                htmlFor="medal_year"
                                className="fieldset-label text-base after:content-['*'] after:text-error"
                            >
                                Año:
                            </label>
                            <input
                                type="number"
                                className="input"
                                id="medal_year"
                                name="medal_year"
                                placeholder="Ingresa el año en el que se ganó la medalla"
                            />
                        </fieldset>
                        <fieldset className="fieldset">
                            <label
                                htmlFor="country_id"
                                className="fieldset-label text-base after:content-['*'] after:text-error"
                            >
                                Pais:
                            </label>
                            <select name="country_id" id="country_id" className="select">
                                <option value="">Seleccionar el tipo de medalla</option>
                                {countries.map((country) => (
                                    <option
                                        value={country.country_id}
                                        key={country.country_id}
                                        className="capitalize"
                                    >
                                        {country.country_name} - ({country.country_code})
                                    </option>
                                ))}
                            </select>
                        </fieldset>
                        <fieldset className="fieldset">
                            <label
                                htmlFor="competitors"
                                className="fieldset-label text-base after:content-['*'] after:text-error"
                            >
                                Competidores:
                            </label>
                            <select
                                name="competitors"
                                id="competitors"
                                className="input h-15"
                                multiple
                            >
                                {competitors.map((competitor) => (
                                    <option
                                        value={competitor.competitor_id}
                                        key={competitor.competitor_id}
                                        className="capitalize"
                                    >
                                        {competitor.competitor_name}
                                    </option>
                                ))}
                            </select>
                        </fieldset>
                        <fieldset className="pt-5 flex gap-4 justify-end">
                            <button
                                type="button"
                                className="btn"
                                onClick={() => {
                                    document.querySelector("#create-modal form").reset();
                                    document.querySelector("#create-modal").close();
                                }}
                            >
                                <XIcon size={17} />
                                Cancelar
                            </button>
                            <button type="submit" className="btn btn-primary px-8">
                                <UploadIcon size={17} />
                                Crear
                            </button>
                        </fieldset>
                    </form>
                </div>
                <form method="dialog" className="modal-backdrop bg-black/20">
                    <button>Cerrar</button>
                </form>
            </dialog>

            {/* Create Medal Modal */}
            {medals.map((medal) => (
                <dialog className="modal" id={`update-modal-${medal.medal_id}`}>
                    <div className="modal-box">
                        <form method="dialog" className="w-full flex justify-between">
                            <h2 className="text-3xl font-bold">Editar competidor</h2>
                            <button className="btn btn-ghost btn-circle">
                                <XIcon />
                            </button>
                        </form>

                        {/* Content */}
                        <form onSubmit={(e) => handleSubmitEdit(e, medal.medal_id)}>
                            <fieldset className="fieldset">
                                <label
                                    htmlFor="medal_type"
                                    className="fieldset-label text-base after:content-['*'] after:text-error"
                                >
                                    Tipo:
                                </label>
                                <select
                                    name="medal_type"
                                    id="medal_type"
                                    defaultValue={medal.medal_type}
                                    className="select"
                                >
                                    <option value="">Seleccionar el tipo de medalla</option>
                                    <option value="gold">🥇 Oro</option>
                                    <option value="silver">🥈 Plata</option>
                                    <option value="Bronze">🥉 Bronce</option>
                                </select>
                            </fieldset>
                            <fieldset className="fieldset">
                                <label
                                    htmlFor="medal_sport"
                                    className="fieldset-label text-base after:content-['*'] after:text-error"
                                >
                                    Deporte:
                                </label>
                                <input
                                    type="text"
                                    className="input"
                                    id="medal_sport"
                                    name="medal_sport"
                                    defaultValue={medal.medal_sport}
                                    placeholder="Ingresa el deporte o categoria de esta medalla"
                                />
                            </fieldset>
                            <fieldset className="fieldset">
                                <label
                                    htmlFor="medal_year"
                                    className="fieldset-label text-base after:content-['*'] after:text-error"
                                >
                                    Año:
                                </label>
                                <input
                                    type="number"
                                    className="input"
                                    id="medal_year"
                                    name="medal_year"
                                    defaultValue={medal.medal_year}
                                    placeholder="Ingresa el año en el que se ganó la medalla"
                                />
                            </fieldset>
                            <fieldset className="fieldset">
                                <label
                                    htmlFor="country_id"
                                    className="fieldset-label text-base after:content-['*'] after:text-error"
                                >
                                    Pais:
                                </label>
                                <select
                                    name="country_id"
                                    id="country_id"
                                    defaultValue={medal.country_Id}
                                    className="select"
                                >
                                    <option value="">Seleccionar el tipo de medalla</option>
                                    {countries.map((country) => (
                                        <option
                                            value={country.country_id}
                                            key={country.country_id}
                                            className="capitalize"
                                        >
                                            {country.country_name} - ({country.country_code})
                                        </option>
                                    ))}
                                </select>
                            </fieldset>
                            <fieldset className="fieldset">
                                <label
                                    htmlFor="competitors"
                                    className="fieldset-label text-base after:content-['*'] after:text-error"
                                >
                                    Competidores:
                                </label>
                                <select
                                    name="competitors"
                                    id="competitors"
                                    className="input h-15"
                                    multiple
                                >
                                    {competitors.map((competitor) => (
                                        <option
                                            value={competitor.competitor_id}
                                            key={competitor.competitor_id}
                                            className="capitalize"
                                            selected={medal.competitors
                                                .map((c) => c.competitor_id)
                                                .includes(competitor.competitor_id)}
                                        >
                                            {competitor.competitor_name}
                                        </option>
                                    ))}
                                </select>
                            </fieldset>
                            <fieldset className="pt-5 flex gap-4 justify-end">
                                <button
                                    type="button"
                                    className="btn"
                                    onClick={() => {
                                        document
                                            .querySelector(`#update-modal-${medal.medal_id}`)
                                            .close();
                                    }}
                                >
                                    <XIcon size={17} />
                                    Cancelar
                                </button>
                                <button type="submit" className="btn btn-primary px-8">
                                    <UploadIcon size={17} />
                                    Actualizar
                                </button>
                            </fieldset>
                        </form>
                    </div>
                    <form method="dialog" className="modal-backdrop bg-black/20">
                        <button>Cerrar</button>
                    </form>
                </dialog>
            ))}
        </>
    );
}
