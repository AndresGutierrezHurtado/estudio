import { useEffect, useState } from "react";
import { useLocation } from "react-router-dom";

async function useFetch(method, endpoint, body = null) {
    try {
        const options = {
            headers: {
                "Content-type": "application/json",
                Accept: "application/json",
            },
            method,
        };

        if (body) options.body = body;

        const response = await fetch(endpoint, options);
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
    const pathname = useLocation().pathname;

    const [data, setData] = useState(null);
    const [loading, setLoading] = useState(true);
    const [trigger, setTrigger] = useState(true);

    const reload = () => setTrigger((prev) => !prev);

    useEffect(() => {
        (async () => {
            const response = await useFetch("get", endpoint);

            if (response) setLoading(false);

            setData(response);
        })();
    }, [endpoint, trigger, pathname]);

    return {
        data: data?.data,
        total: data?.total,
        loading,
        reload,
    };
}
