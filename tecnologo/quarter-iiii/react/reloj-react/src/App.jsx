import { useState } from "react";

// Components
import Clock from "./components/analogClock.jsx";

// Hooks
import { useValidateForm } from "./hooks/useValidateForm.js";
import { useGetDegree } from "./hooks/useGetDegree.js";

function App() {
    const [time, setTime] = useState({ hora: 12, minuto: 0, segundo: 0 });
    const [degrees, setDegrees] = useState(null);
    const [way, setWay] = useState({ start: "hora", end: "minuto" });

    const handleFormSubmit = (e) => {
        e.preventDefault();

        const data = Object.fromEntries(new FormData(e.target));

        const validation = useValidateForm("hora", data);

        if (validation.success) {
            const degrees = useGetDegree(validation.data, way.start, way.end);
            setTime({ ...validation.data });
            setDegrees(degrees);
        }
    };

    return (
        <section className="w-full px-30">
            <div className="w-full max-w-[1200px] mx-auto py-10">
                <div className="w-full h-full flex gap-10 justify-center">
                    <article className="space-y-10">
                        <h2 className="text-5xl font-extrabold tracking-tight">
                            Reloj
                        </h2>
                        <Clock
                            {...time}
                            key={`${time.hora}-${time.minuto}-${time.segundo}`}
                        />
                        {degrees && (
                            <p className="text-xl font-semibold">
                                {degrees} grados
                            </p>
                        )}
                    </article>
                    <form
                        onSubmit={handleFormSubmit}
                        className="space-y-2 w-full max-w-xl"
                    >
                        <h2 className="text-2xl font-bold tracking-tight">
                            Ingresa la hora:
                        </h2>
                        <div className="form-control">
                            <label className="label">
                                <span className="label-text font-semibold after:content-['*'] after:text-red-500 after:ml-0.5">
                                    Hora:
                                </span>
                            </label>
                            <input
                                name="hora"
                                placeholder="Ingrese la hora"
                                className="input input-bordered input-sm w-full"
                            />
                        </div>
                        <div className="form-control">
                            <label className="label">
                                <span className="label-text font-semibold after:content-['*'] after:text-red-500 after:ml-0.5">
                                    Minuto:
                                </span>
                            </label>
                            <input
                                name="minuto"
                                placeholder="Ingrese el minuto"
                                className="input input-bordered input-sm w-full"
                            />
                        </div>
                        <div className="form-control">
                            <label className="label">
                                <span className="label-text font-semibold after:content-['*'] after:text-red-500 after:ml-0.5">
                                    Segundo:
                                </span>
                            </label>
                            <input
                                name="segundo"
                                placeholder="Ingrese el segundo"
                                className="input input-bordered input-sm w-full"
                            />
                        </div>
                        <div className="form-control">
                            <label className="label">
                                <span className="label-text font-semibold after:content-['*'] after:text-red-500 after:ml-0.5">
                                    Dirección:
                                </span>
                            </label>
                            <label className="form-group space-x-2">
                                <input
                                    type="radio"
                                    onClick={() =>
                                        setWay({ start: "hora", end: "minuto" })
                                    }
                                    name="way"
                                    defaultChecked
                                />
                                <span className="label-text">Horas a minutos</span>
                            </label>
                            <label className="form-group space-x-2">
                                <input
                                    type="radio"
                                    onClick={() =>
                                        setWay({ start: "minuto", end: "hora" })
                                    }
                                    name="way"
                                />
                                <span className="label-text">Minutos a horas</span>
                            </label>
                            {/* horas segundos, segundos horas, minutos segundos, segundos minutos */}
                            <label className="form-group space-x-2">
                                <input
                                    type="radio"
                                    onClick={() =>
                                        setWay({ start: "hora", end: "segundo" })
                                    }
                                    name="way"
                                />
                                <span className="label-text">Horas a segundos</span>
                            </label>
                            <label className="form-group space-x-2">
                                <input
                                    type="radio"
                                    onClick={() =>
                                        setWay({ start: "segundo", end: "hora" })
                                    }
                                    name="way"
                                />
                                <span className="label-text">Segundos a horas</span>
                            </label>
                            <label className="form-group space-x-2">
                                <input
                                    type="radio"
                                    onClick={() =>
                                        setWay({ start: "minuto", end: "segundo" })
                                    }
                                    name="way"
                                />
                                <span className="label-text">Minutos a segundos</span>
                            </label>
                            <label className="form-group space-x-2">
                                <input
                                    type="radio"
                                    onClick={() =>
                                        setWay({ start: "segundo", end: "minuto" })
                                    }
                                    name="way"
                                />
                                <span className="label-text">Segundos a minutos</span>
                            </label>
                        </div>
                        <div className="form-control pt-4">
                            <button
                                type="submit"
                                className="btn btn-sm btn-primary w-full"
                            >
                                Subir
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    );
}

export default App;
