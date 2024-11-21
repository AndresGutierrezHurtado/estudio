import { useState } from "react";

// Components
import Clock from "./components/analogClock";

function App() {
    return (
        <section className="w-full px-30">
            <div className="w-full max-w-[1200px] mx-auto py-10">
                <div className="w-full h-full flex gap-10">
                    <article className="space-y-10">
                        <h2 className="text-5xl font-extrabold tracking-tight">Reloj</h2>
                        <Clock hora={12} segundo={0} minuto={0} />
                    </article>
                    <form className="space-y-2">
                        <h2 className="text-2xl font-bold tracking-tight">Ingresa la hora:</h2>
                        <div className="form-control">
                            <label className="label">
                                <span className="label-text font-semibold after:content-['*'] after:text-red-500 after:ml-0.5">Hora:</span>
                            </label>
                            <input className="input input-sm w-full " />
                        </div>
                    </form>
                </div>
            </div>
        </section>
    );
}

export default App;
