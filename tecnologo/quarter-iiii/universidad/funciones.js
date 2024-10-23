const constraints = {
    usuario_documento: {
        presence: {
            allowEmpty: false,
            message: "Ingrese un documento",
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
};

function validateForm() {
    const validation = validate(
        Object.fromEntries(new FormData(document.querySelector("form"))),
        constraints
    );
    if (validation) {
        for (const error in validation) {
            showError(validation[error], error);
        }
    } else {
        return true;
    }

    return false;
}

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
