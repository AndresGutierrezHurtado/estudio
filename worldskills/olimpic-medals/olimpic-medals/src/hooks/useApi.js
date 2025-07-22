const API_URL = import.meta.env.VITE_API_URL;

async function fetchData(method, endpoint, body = {}) {
    try {
        const response = await fetch(API_URL + endpoint, {
            headers: {
                "Content-type": "application/json",
                Accept: "application/json",
            },
            method: "get",
            method,
            body: JSON.stringify(body),
        });

        const data = await response.json();

        return data;
    } catch (error) {
        return {
            success: false,
            message: "Hubo un error al hacer la petición: " + error.message,
        };
    }
}
