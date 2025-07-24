import React, { useState } from "react";
import { useGetData } from "../hooks/useApi";

export default function Results() {
    const [search, setSearch] = useState('');
    const { data: results, loading: resultsLoading } = useGetData(`/plays?search=${search}`);

    console.log(results);
    return <div>Results</div>;
}
