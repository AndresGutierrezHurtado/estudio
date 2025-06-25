// SweetAlert Utility Functions
const SweetAlertUtils = {
    success: function(title, message = '', timer = 3000) {
        return Swal.fire({
            icon: 'success',
            title: title,
            text: message,
            timer: timer,
            timerProgressBar: true,
            showConfirmButton: false,
            toast: true,
            position: 'top-end'
        });
    },

    error: function(title, message = '', timer = 4000) {
        return Swal.fire({
            icon: 'error',
            title: title,
            text: message,
            timer: timer,
            timerProgressBar: true,
            showConfirmButton: false,
            toast: true,
            position: 'top-end'
        });
    },

    warning: function(title, message = '', timer = 4000) {
        return Swal.fire({
            icon: 'warning',
            title: title,
            text: message,
            timer: timer,
            timerProgressBar: true,
            showConfirmButton: false,
            toast: true,
            position: 'top-end'
        });
    },

    info: function(title, message = '', timer = 3000) {
        return Swal.fire({
            icon: 'info',
            title: title,
            text: message,
            timer: timer,
            timerProgressBar: true,
            showConfirmButton: false,
            toast: true,
            position: 'top-end'
        });
    },

    confirm: function(title, message = '', confirmText = 'Sí', cancelText = 'No') {
        return Swal.fire({
            icon: 'question',
            title: title,
            text: message,
            showCancelButton: true,
            confirmButtonText: confirmText,
            cancelButtonText: cancelText,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33'
        });
    },

    handleUrlErrors: function() {
        const urlParams = new URLSearchParams(window.location.search);
        const error = urlParams.get('error');
        const success = urlParams.get('success');

        if (error) {
            this.showErrorByCode(error);
        }

        if (success) {
            this.showSuccessByCode(success);
        }

        window.history.replaceState({}, '', window.location.pathname);
    },

    showErrorByCode: function(errorCode) {
        const errorMessages = {
            'invalidCredentials': {
                title: 'Error de autenticación',
                message: 'El correo electrónico o la contraseña son incorrectos'
            },
            'existentUser': {
                title: 'Usuario existente',
                message: 'El correo electrónico o nombre de usuario ya está registrado'
            },
            'errorRegister': {
                title: 'Error de registro',
                message: 'Ocurrió un error al registrar el usuario. Inténtalo de nuevo.'
            },
            'sessionExpired': {
                title: 'Sesión expirada',
                message: 'Tu sesión ha expirado. Por favor, inicia sesión nuevamente.'
            },
            'unauthorized': {
                title: 'Acceso denegado',
                message: 'No tienes permisos para acceder a esta página.'
            }
        };

        const error = errorMessages[errorCode];
        if (error) {
            this.error(error.title, error.message);
        } else {
            this.error('Error', 'Ha ocurrido un error inesperado');
        }
    },

    showSuccessByCode: function(successCode) {
        const successMessages = {
            'registered': {
                title: 'Registro exitoso',
                message: 'Tu cuenta ha sido creada correctamente'
            },
            'loggedOut': {
                title: 'Sesión cerrada',
                message: 'Has cerrado sesión correctamente'
            },
            'profileUpdated': {
                title: 'Perfil actualizado',
                message: 'Tu perfil ha sido actualizado correctamente'
            }
        };

        const success = successMessages[successCode];
        if (success) {
            this.success(success.title, success.message);
        } else {
            this.success('Éxito', 'Operación completada correctamente');
        }
    }
};

// Auto-initialize error handling when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    SweetAlertUtils.handleUrlErrors();
}); 