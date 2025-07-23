import React from "react";
import LoadingComponent from "../components/LoadingComponent";
import { useGetData } from "../hooks/useApi";
import { PencilIcon, Trash2Icon } from "lucide-react";

export default function Ranking() {
    const {
        data: countries,
        loading: countriesLoading,
        reload: countriesReload,
    } = useGetData(`/countries?limit=10`);

    if (countriesLoading) return <LoadingComponent />;
    return (
        <section className="w-full px-5">
            <div className="w-full max-w- mx-auto py-10 space-y-8">
                <h1 className="text-4xl font-bold">Top paises con mas medallas</h1>
                <div className="w-full overflow-x-auto bg-base-200 border border-base-300 rounded">
                    <table className="table">
                        <thead>
                            <tr>
                                <th>Código pais</th>
                                <th>Nombre</th>
                                <th>Código</th>
                                <th>🥇 Medallas de oro</th>
                                <th>🥈 Medallas de plata</th>
                                <th>🥉 Medallas de bronze</th>
                                <th>Total</th>
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
                            {countries.map((country) => {
                                const medals = country.medals;
                                const goldMedals = medals.filter(m => m.medal_type === 'gold');
                                const silverMedals = medals.filter(m => m.medal_type === 'silver');
                                const bronzeMedals = medals.filter(m => m.medal_type === 'bronze');
                                return (
                                    <tr key={country.country_id}>
                                        <th>{country.country_id}</th>
                                        <td>{country.country_name}</td>
                                        <td>{country.country_code}</td>
                                        <td>{goldMedals.length}</td>
                                        <td>{silverMedals.length}</td>
                                        <td>{bronzeMedals.length}</td>
                                        <td>{medals.length}</td>
                                    </tr>
                                );
                            })}
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    );
}
