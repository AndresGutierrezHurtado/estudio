import React, { useState } from "react";
import { useGetData } from "../hooks/useApi";
import LoadingComponent from "../components/LoadingComponent";

export default function CountryManagement() {
    const [page, setPage] = useState(1);

    const {
        data: countries,
        loading: countriesLoading,
        reload: countriesReload,
    } = useGetData(`/countries?page=${page}`);
    
    console.log(countries);
    if (countriesLoading || !countries) return <LoadingComponent />;

    return (
        <>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    {countries.map((country) => {
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>;
                    })}
                </tbody>
            </table>
        </>
    );
}
