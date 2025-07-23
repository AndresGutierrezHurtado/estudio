import { useEffect, useState } from "react";
import Swal from "sweetalert2";

const API_URL = import.meta.env.VITE_API_URL;

async function fetchData(method, endpoint, body = {}) {
    try {
        const options = {
            headers: {
                "Content-type": "application/json",
                Accept: "application/json",
            },
            method,
        };

        if (method !== "get" && method !== "delete") {
            options.body = JSON.stringify(body);
        }

        const response = await fetch(API_URL + "/api" + endpoint, options);

        const data = await response.json();

        return data;
    } catch (error) {
        console.error(error);
        return {
            success: false,
            message: "Hubo un error al hacer la petición: " + error.message,
        };
    }
}

export function useGetData(endpoint) {
    const [data, setData] = useState(null);
    const [loading, setLoading] = useState(true);
    const [trigger, setTrigger] = useState(false);

    useEffect(() => {
        (async () => {
            const response = await fetchData("get", endpoint);

            if (response) setLoading(false);
            if (!response.success) return;

            setData(response);
        })();
    }, [trigger, endpoint]);

    const reload = () => setTrigger((prev) => !prev);

    return {
        data: data?.data,
        total: data?.total,
        loading,
        reload,
    };
}

export async function useFetch(method, endpoint, data, showAlert = true) {
    const response = await fetchData(method, endpoint, data);

    if (showAlert) {
        if (response.success) {
            Swal.fire({
                icon: "success",
                title: "Acción realizada con éxito",
                text: response.message,
            });
        } else {
            Swal.fire({
                icon: "error",
                title: "Hubo un error al realizar esta acción",
                text: response.message,
            });
        }
    }

    return response;
}
