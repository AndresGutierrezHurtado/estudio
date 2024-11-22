import React from "react";
import * as v from "valibot";

export const useValidateForm = (form, data, exra) => {
    let schema;

    switch (form) {
        case "hora":
            schema = v.object({
                hora: v.pipe(
                    v.nonEmpty("Ingresa la hora"),
                    v.string("Ingresa la hora"),
                    v.regex(/^\d+$/, "La hora debe ser un número"),
                    v.minValue(0, "La hora no puede ser negativa"),
                    v.maxValue(23, "La hora no puede ser mayor a 23"),
                    v.transform((value) => parseInt(value))
                ),
                minuto: v.pipe(
                    v.nonEmpty("Ingresa los minutos"),
                    v.string("Ingresa los minutos"),
                    v.regex(/^\d+$/, "Los minutos deben ser un número"),
                    v.minValue(0, "Los minutos no pueden ser negativos"),
                    v.maxValue(59, "Los minutos no pueden ser mayores a 59"),
                    v.transform((value) => parseInt(value))
                ),
                segundo: v.pipe(
                    v.nonEmpty("Ingresa los segundos"),
                    v.string("Ingresa los segundos"),
                    v.regex(/^\d+$/, "Los segundos deben ser un número"),
                    v.minValue(0, "Los segundos no pueden ser negativos"),
                    v.maxValue(59, "Los segundos no pueden ser mayores a 59"),
                    v.transform((value) => parseInt(value))
                ),
            });
    }

    try {
        document.querySelectorAll(".form-control").forEach((container) => {
            const $labelError = container.querySelector(".label-error");
            const $input = container.querySelector("input");
            const $labelsError = container.querySelectorAll(".label-error");

            if ($labelError) {
                $labelsError.forEach((label) => {
                    label.remove();
                });
            }
            if ($input) {
                $input.classList.remove("border-red-500");
            }
        });

        const result = v.parse(schema, data);

        return { success: true, message: "Formulario válido", data: result };
    } catch (error) {
        error.issues.forEach((issue) => {
            const $input = document.getElementsByName(issue.path[0].key)[0];

            if ($input) {
                $input.classList.add("border-red-500");
                const $error = document.createElement("label");
                $error.classList.add("label", "label-error");
                $error.innerHTML = `<span class="label-text-alt text-red-500">${issue.message}</span>`;
                $input.closest(".form-control").appendChild($error);
            }
        });

        return { success: false, message: error.message, data: error.issues };
    }
};
