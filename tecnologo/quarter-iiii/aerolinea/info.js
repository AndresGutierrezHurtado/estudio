const constraints = {
    usuario_identificacion: {
        presence: {
            allowEmpty: false,
            message: "Ingrese una identificación",
        },
        length: {
            minimum: 8,
            maximum: 12,
            message: "debe tener entre 8 y 12 caracteres",
        },
        format: {
            pattern: "^[0-9]+$",
            message: "debe ser solo números",
        },
    },
    usuario_primer_nombre: {
        presence: {
            allowEmpty: false,
            message: "Ingrese un primer nombre",
        },
        length: {
            minimum: 3,
            maximum: 25,
            message: "debe tener entre 3 y 25 caracteres",
        },
        format: {
            pattern: "^[A-Za-z]+$",
            message: "debe ser solo letras",
        },
    },
    usuario_segundo_nombre: {
        presence: false,
        length: {
            maximum: 25,
            message: "debe tener maximo 25 caracteres",
        },
        format: {
            pattern: "^(|[A-Za-z]+)$",
            message: "debe ser solo letras o estar vacio",
        },
    },
    usuario_primer_apellido: {
        presence: {
            allowEmpty: false,
            message: "Ingrese un primer apellido",
        },
        length: {
            minimum: 3,
            maximum: 25,
            message: "debe tener entre 3 y 25 caracteres",
        },
        format: {
            pattern: "^[A-Za-z]+$",
            message: "debe ser solo letras",
        },
    },
    usuario_segundo_apellido: {
        presence: false,
        length: {
            maximum: 25,
            message: "debe tener maximo 25 caracteres",
        },
        format: {
            pattern: "^(|[A-Za-z]+)$",
            message: "debe ser solo letras o estar vacio",
        },
    },
    usuario_genero: {
        presence: {
            allowEmpty: false,
            message: "debe ser seleccionado",
        },
        inclusion: {
            within: ["masculino", "femenino", "otro"],
            message:
                "El genero debe ser uno de los siguientes: masculino, femenino u otro",
        },
    },
    usuario_telefono: {
        presence: {
            allowEmpty: false,
            message: "Ingrese un telefono",
        },
        length: {
            maximum: 12,
            message: "debe tener entre 8 y 12 caracteres",
        },
        format: {
            pattern: "^(|[0-9]+)$",
            message: "debe ser solo números",
        },
    },
};

function resetForm() {
    document.querySelectorAll(".form-control").forEach((formControl) => {
        if (formControl.querySelector("input"))
            formControl
                .querySelector("input")
                .classList.remove("border-red-500");
        formControl.querySelectorAll(".error-message").forEach((error) => {
            error.remove();
        });
    });
}

function showError(errors, field) {
    const element = document.getElementsByName(field)[0];
    element.classList.add("border-red-500");
    errors.forEach((error) => {
        const $error = document.createElement("p");
        $error.textContent = error;
        $error.classList.add("text-red-500");
        $error.classList.add("error-message");
        element.closest(".form-control").appendChild($error);
    });
}
