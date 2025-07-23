import React, { useState } from "react";
import { PencilIcon, PlusIcon, SearchIcon, Trash2Icon, UploadIcon, XIcon } from "lucide-react";

// Hooks
import { useFetch, useGetData } from "../hooks/useApi";

// Components
import LoadingComponent from "../components/LoadingComponent";
import Swal from "sweetalert2";

export default function CompetitorManagement() {
    const [search, setSearch] = useState("");
    const [page, setPage] = useState(1);

    const {
        data: competitors,
        loading: competitorsLoading,
        reload: competitorsReload,
    } = useGetData(`/competitors?search=${search}&page=${page}`);

    const { data: countries, loading: countriesLoading } = useGetData(`/countries?limit=100`);

    if (competitorsLoading || countriesLoading || !competitors) return <LoadingComponent />;

    const handleSubmit = async (e) => {
        e.preventDefault();

        const data = Object.fromEntries(new FormData(e.target));
        // validation

        // setLoading(true);
        const response = await useFetch("post", "/competitors", data);

        // if (response) setLoading(false);
        if (!response.success) return;

        competitorsReload();
        e.target.reset();
        const $modal = document.getElementById("create-modal");
        if ($modal) $modal.close();
    };

    const handleSubmitEdit = async (e, id) => {
        e.preventDefault();

        const data = Object.fromEntries(new FormData(e.target));
        // validation

        // setLoading(true);
        const response = await useFetch("put", `/competitors/${id}`, data);

        // if (response) setLoading(false);
        if (!response.success) return;

        competitorsReload();
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
        }).then(async (confirm) => {
            if (!confirm) return;

            const response = await useFetch("delete", `/competitors/${id}`);

            if (!response.success) return;

            competitorsReload();
        });
    };

    return (
        <>
            <section className="w-full max-w-[1200px] mx-auto py-10 space-y-10">
                <h1 className="text-5xl font-extrabold">Gestión de competidores</h1>
                {/* filtros */}
                <div className="flex items-center justify-between">
                    <div className="w-full max-w-sm">
                        <label className="input w-full">
                            <SearchIcon size={18} />
                            <input
                                type="text"
                                className="w-full"
                                placeholder="Buscar competidor por sus datos o país"
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
                            data-tip="Crear un nuevo competidor"
                            onClick={() => {
                                document.getElementById("create-modal").show();
                            }}
                        >
                            <PlusIcon />
                        </div>
                    </div>
                </div>
                <div className="w-full overflow-x-auto bg-base-200 border border-base-300 rounded-lg">
                    <table className="table">
                        <thead>
                            <tr>
                                <th>Identificador</th>
                                <th>Nombre</th>
                                <th>Pais</th>
                                <th>Número de medallas</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {competitors.length === 0 && (
                                <tr>
                                    <td
                                        colSpan={4}
                                        className="text-center text-lg text-base-content/80"
                                    >
                                        No se encontraron resultados..
                                    </td>
                                </tr>
                            )}
                            {competitors.map((competitor) => (
                                <tr key={competitor.competitor_id}>
                                    <th>{competitor.competitor_id}</th>
                                    <td>
                                        {competitor.competitor_name}{" "}
                                        {competitor.competitor_lastname}
                                    </td>
                                    <td>{competitor.country.country_name}</td>
                                    <td>{competitor.medals.length}</td>
                                    <td>
                                        <div className="flex flex-wrap gap-4">
                                            <button
                                                type="button"
                                                className="btn h-10 w-10 p-0 btn-primary tooltip tooltip-left"
                                                data-tip="Editar el país"
                                                onClick={() => {
                                                    document.getElementById(`update-modal-${competitor.competitor_id}`).show();
                                                }}
                                            >
                                                <PencilIcon size={18} />
                                            </button>
                                            <button
                                                className="btn h-10 w-10 p-0 btn-error tooltip tooltip-left"
                                                data-tip="Eliminar el país"
                                                onClick={() =>
                                                    handleDelete(competitor.competitor_id)
                                                }
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
            </section>

            {/* Create Competitor Modal */}
            <dialog className="modal" id="create-modal">
                <div className="modal-box">
                    <form method="dialog" className="w-full flex justify-between">
                        <h2 className="text-3xl font-bold">Crear competidor</h2>
                        <button className="btn btn-ghost btn-circle">
                            <XIcon />
                        </button>
                    </form>

                    {/* Content */}
                    <form onSubmit={handleSubmit}>
                        <fieldset className="fieldset">
                            <label htmlFor="" className="fieldset-label text-base">
                                Nombre:
                            </label>
                            <input
                                type="text"
                                className="input"
                                name="competitor_name"
                                placeholder="Ingresa el nombre del competidor"
                            />
                        </fieldset>
                        <fieldset className="fieldset">
                            <label htmlFor="" className="fieldset-label text-base">
                                Apellido:
                            </label>
                            <input
                                type="text"
                                className="input"
                                name="competitor_lastname"
                                placeholder="Ingresa el apellido del competidor"
                            />
                        </fieldset>
                        <fieldset className="fieldset">
                            <label
                                htmlFor="competitor_description"
                                className="fieldset-label text-base"
                            >
                                Descripcion:
                            </label>
                            <textarea
                                name="competitor_description"
                                id="competitor_description"
                                className="textarea"
                                placeholder="Ingresa la descripción del competidor"
                            ></textarea>
                        </fieldset>
                        <fieldset className="fieldset">
                            <label htmlFor="" className="fieldset-label text-base">
                                Fecha nacimiento:
                            </label>
                            <input
                                type="date"
                                className="input"
                                name="competitor_birthdate"
                                placeholder="Ingresa la fecha de nacimiento del competidor"
                            />
                        </fieldset>
                        <fieldset className="fieldset">
                            <label htmlFor="country_id" className="fieldset-label text-base">
                                Pais:
                            </label>
                            <select name="country_id" id="country_id" className="select">
                                <option value="">Selecciona tu pais</option>
                                {countries.map((country) => (
                                    <option value={country.country_id} className="capitalize">
                                        {country.country_name}
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

            {/* Create Competitor Modal */}
            {competitors.map((competitor) => (
                <dialog className="modal" id={`update-modal-${competitor.competitor_id}`}>
                    <div className="modal-box">
                        <form method="dialog" className="w-full flex justify-between">
                            <h2 className="text-3xl font-bold">Editar competidor</h2>
                            <button className="btn btn-ghost btn-circle">
                                <XIcon />
                            </button>
                        </form>

                        {/* Content */}
                        <form onSubmit={(e) => handleSubmitEdit(e, competitor.competitor_id)}>
                            <fieldset className="fieldset">
                                <label htmlFor="" className="fieldset-label text-base">
                                    Nombre:
                                </label>
                                <input
                                    type="text"
                                    className="input"
                                    name="competitor_name"
                                    defaultValue={competitor.competitor_name}
                                    placeholder="Ingresa el nombre del competidor"
                                />
                            </fieldset>
                            <fieldset className="fieldset">
                                <label htmlFor="" className="fieldset-label text-base">
                                    Apellido:
                                </label>
                                <input
                                    type="text"
                                    className="input"
                                    name="competitor_lastname"
                                    defaultValue={competitor.competitor_lastname}
                                    placeholder="Ingresa el apellido del competidor"
                                />
                            </fieldset>
                            <fieldset className="fieldset">
                                <label
                                    htmlFor="competitor_description"
                                    className="fieldset-label text-base"
                                >
                                    Descripcion:
                                </label>
                                <textarea
                                    name="competitor_description"
                                    id="competitor_description"
                                    className="textarea"
                                    defaultValue={competitor.competitor_description}
                                    placeholder="Ingresa la descripción del competidor"
                                ></textarea>
                            </fieldset>
                            <fieldset className="fieldset">
                                <label htmlFor="" className="fieldset-label text-base">
                                    Fecha nacimiento:
                                </label>
                                <input
                                    type="date"
                                    className="input"
                                    name="competitor_birthdate"
                                    defaultValue={competitor.competitor_birthdate}
                                    placeholder="Ingresa la fecha de nacimiento del competidor"
                                />
                            </fieldset>
                            <fieldset className="fieldset">
                                <label htmlFor="country_id" className="fieldset-label text-base">
                                    Pais:
                                </label>
                                <select name="country_id" id="country_id" defaultValue={competitor.country_id} className="select">
                                    <option value="">Selecciona tu pais</option>
                                    {countries.map((country) => (
                                        <option value={country.country_id} className="capitalize">
                                            {country.country_name}
                                        </option>
                                    ))}
                                </select>
                            </fieldset>
                            <fieldset className="pt-5 flex gap-4 justify-end">
                                <button
                                    type="button"
                                    className="btn"
                                    onClick={() => {
                                        document.querySelector(`#update-modal-${competitor.competitor_id}`).close();
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
