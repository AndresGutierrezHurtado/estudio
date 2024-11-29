import React from "react";
import { useGetData } from "../hook/useFetchApi";
import { Link } from "react-router";

export default function Home() {
    const { data: products, loading: loadingProducts } = useGetData("/products");

    if (loadingProducts) return <h2> Cargando... </h2>;
    return (
        <main className="w-full px-3">
            <section className="w-full max-w-[1200px] mx-auto">
                <div className="space-y-5">
                    {products.map(product => (
                        <Link to={`/product/${product.product_id}`} key={product.product_id}>
                            <h2>{product.product_name}</h2>
                        </Link>
                    ))}
                </div>
            </section>
        </main>
    );
}
