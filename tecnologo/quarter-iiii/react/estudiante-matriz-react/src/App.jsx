import React, { useEffect, useState } from "react";
import { data } from "./mocks/academico.json";

import { useFindAverage } from "./hooks/useFindAverage";

export default function App() {
    const [student, setStudent] = useState("");
    const [info, setInfo] = useState([]);
    const [error, setError] = useState(null);

    useEffect(() => {
        const result = data.filter((item) => item[0] === student);
        if (student === "") {
            setInfo([]);
            return;
        }

        if (result.length === 0) {
            setInfo([]);
            setError("No se encontró ningun alumno.");
            return;
        }
        setInfo(data.filter((item) => item[0] === student));
        setError(null);
    }, [student]);

    return (
        <div className="w-full max-w-[1200px] mx-auto py-10">
            <div className="space-y-10">
                <form className="space-y-4">
                    <div>
                        <h1 className="text-5xl font-extrabold">
                            Matriz estudiantes
                        </h1>
                        <p>
                            Ingrese el documento del alumno para obtener
                            información de sus notas y promedio.
                        </p>
                    </div>
                    <div className="form-control">
                        <label className="label">
                            <span className="label-text font-semibold after:content-['*'] after:text-red-500 after:ml-0.5">
                                Documento:
                            </span>
                        </label>
                        <input
                            type="text"
                            value={student}
                            onChange={(e) => setStudent(e.target.value)}
                            className="input input-bordered w-full"
                            placeholder="Ingresa el documento del alumno"
                        />
                        {error && (
                            <label className="label">
                                <span className="label-text text-red-500">
                                    {error}
                                </span>
                            </label>
                        )}
                    </div>
                </form>
                {info.length > 0 && (
                    <table className="table border">
                        <thead>
                            <tr>
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Carrera</th>
                                <th>Semestre</th>
                                <th>Notas</th>
                                <th>Promedio</th>
                            </tr>
                        </thead>
                        <tbody>
                            {info.map((item, index) => {
                                const [id, name, course, semester, ...grades] =
                                    item;
                                const average = useFindAverage(grades);
                                return (
                                    <tr key={index}>
                                        <td>{id}</td>
                                        <td>{name}</td>
                                        <td>{course}</td>
                                        <td>{semester}</td>
                                        <td>{grades.join(", ")}</td>
                                        <td>{average}</td>
                                    </tr>
                                );
                            })}
                        </tbody>
                    </table>
                )}
            </div>
        </div>
    );
}
