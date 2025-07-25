import React from "react";
import { useGetData } from "../hooks/useApi";

export default function Teams() {
    const { data: teams, loading: teamsLoading } = useGetData("/teams");

    console.log(teams);
    return (
        <section className="w-full">
            <div>fasdfas</div>
        </section>
    );
}
