
/**
 * ============================================================
 * NOVA
 * Sistema centralizado de alertas - SweetAlert2
 * ============================================================
 *
 * Requiere:
 * SweetAlert2 v11
 *
 * <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 * <script src="<?= BASE_URL ?>/js/nova-alerts.js"></script>
 *
 * ============================================================
 */

const NovaAlert = {

    /* ========================================================
       ÉXITO
    ======================================================== */

    success: function (
        message = 'La operación se realizó correctamente.',
        title = '¡Éxito!'
    ) {

        return Swal.fire({
            icon: 'success',
            title: title,
            text: message,
            confirmButtonText: 'Aceptar'
        });

    },


    /* ========================================================
       ERROR
    ======================================================== */

    error: function (
        message = 'Ocurrió un error.',
        title = 'Error'
    ) {

        return Swal.fire({
            icon: 'error',
            title: title,
            text: message,
            confirmButtonText: 'Aceptar'
        });

    },


    /* ========================================================
       ADVERTENCIA
    ======================================================== */

    warning: function (
        message = 'Ten cuidado con esta acción.',
        title = 'Advertencia'
    ) {

        return Swal.fire({
            icon: 'warning',
            title: title,
            text: message,
            confirmButtonText: 'Aceptar'
        });

    },


    /* ========================================================
       INFORMACIÓN
    ======================================================== */

    info: function (
        message = '',
        title = 'Información'
    ) {

        return Swal.fire({
            icon: 'info',
            title: title,
            text: message,
            confirmButtonText: 'Aceptar'
        });

    },


    /* ========================================================
       PREGUNTA
    ======================================================== */

    question: function (
        message = '',
        title = '¿Está seguro?'
    ) {

        return Swal.fire({
            icon: 'question',
            title: title,
            text: message,
            confirmButtonText: 'Aceptar',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            reverseButtons: true
        });

    },


    /* ========================================================
       CONFIRMAR
    ======================================================== */

    confirm: function (
        message = 'Esta acción no se puede deshacer.',
        title = '¿Está seguro?',
        confirmText = 'Sí, continuar',
        cancelText = 'Cancelar'
    ) {

        return Swal.fire({

            icon: 'warning',

            title: title,

            text: message,

            showCancelButton: true,

            confirmButtonText: confirmText,

            cancelButtonText: cancelText,

            reverseButtons: true

        });

    },


    /* ========================================================
       CONFIRMAR ELIMINACIÓN
    ======================================================== */

    delete: function (
        message = 'Esta acción no se puede deshacer.',
        title = '¿Eliminar registro?'
    ) {

        return Swal.fire({

            icon: 'warning',

            title: title,

            text: message,

            showCancelButton: true,

            confirmButtonText: 'Sí, eliminar',

            cancelButtonText: 'Cancelar',

            reverseButtons: true

        });

    },


    /* ========================================================
       TOAST
    ======================================================== */

    toast: function (
        message = 'Operación realizada correctamente.',
        icon = 'success'
    ) {

        return Swal.fire({

            toast: true,

            position: 'top-end',

            icon: icon,

            title: message,

            showConfirmButton: false,

            timer: 3000,

            timerProgressBar: true

        });

    },


    /* ========================================================
       TOAST ÉXITO
    ======================================================== */

    toastSuccess: function (
        message = 'Guardado correctamente.'
    ) {

        return this.toast(message, 'success');

    },


    /* ========================================================
       TOAST ERROR
    ======================================================== */

    toastError: function (
        message = 'Ocurrió un error.'
    ) {

        return this.toast(message, 'error');

    },


    /* ========================================================
       TOAST ADVERTENCIA
    ======================================================== */

    toastWarning: function (
        message = 'Advertencia.'
    ) {

        return this.toast(message, 'warning');

    },


    /* ========================================================
       TOAST INFORMACIÓN
    ======================================================== */

    toastInfo: function (
        message = 'Información.'
    ) {

        return this.toast(message, 'info');

    },


    /* ========================================================
       CARGANDO
    ======================================================== */

    loading: function (
        message = 'Procesando...'
    ) {

        return Swal.fire({

            title: message,

            allowOutsideClick: false,

            allowEscapeKey: false,

            didOpen: () => {

                Swal.showLoading();

            }

        });

    },


    /* ========================================================
       CERRAR
    ======================================================== */

    close: function () {

        Swal.close();

    },


    /* ========================================================
       INPUT
    ======================================================== */

    input: function (
        message = '',
        title = 'Ingrese un valor',
        inputType = 'text'
    ) {

        return Swal.fire({

            title: title,

            text: message,

            input: inputType,

            inputPlaceholder: 'Ingrese aquí...',

            showCancelButton: true,

            confirmButtonText: 'Aceptar',

            cancelButtonText: 'Cancelar',

            reverseButtons: true

        });

    },


    /* ========================================================
       TEXTAREA
    ======================================================== */

    textarea: function (
        title = 'Ingrese la información',
        placeholder = ''
    ) {

        return Swal.fire({

            title: title,

            input: 'textarea',

            inputPlaceholder: placeholder,

            inputAttributes: {

                'aria-label': placeholder

            },

            showCancelButton: true,

            confirmButtonText: 'Aceptar',

            cancelButtonText: 'Cancelar',

            reverseButtons: true

        });

    },


    /* ========================================================
       SELECT
    ======================================================== */

    select: function (
        title = 'Seleccione una opción',
        options = {}
    ) {

        return Swal.fire({

            title: title,

            input: 'select',

            inputOptions: options,

            inputPlaceholder: 'Seleccione...',

            showCancelButton: true,

            confirmButtonText: 'Aceptar',

            cancelButtonText: 'Cancelar',

            reverseButtons: true

        });

    },


    /* ========================================================
       RADIO
    ======================================================== */

    radio: function (
        title = 'Seleccione una opción',
        options = {}
    ) {

        return Swal.fire({

            title: title,

            input: 'radio',

            inputOptions: options,

            showCancelButton: true,

            confirmButtonText: 'Aceptar',

            cancelButtonText: 'Cancelar',

            reverseButtons: true

        });

    },


    /* ========================================================
       CHECKBOX
    ======================================================== */

    checkbox: function (
        title = 'Seleccione',
        label = 'Acepto'
    ) {

        return Swal.fire({

            title: title,

            input: 'checkbox',

            inputValue: 0,

            inputPlaceholder: label,

            showCancelButton: true,

            confirmButtonText: 'Aceptar',

            cancelButtonText: 'Cancelar',

            reverseButtons: true

        });

    },


    /* ========================================================
       ALERTA HTML
    ======================================================== */

    html: function (
        htmlContent = '',
        title = ''
    ) {

        return Swal.fire({

            title: title,

            html: htmlContent,

            confirmButtonText: 'Aceptar'

        });

    },


    /* ========================================================
       TIMER
    ======================================================== */

    timer: function (
        message = 'Operación realizada.',
        seconds = 3
    ) {

        return Swal.fire({

            icon: 'success',

            title: message,

            timer: seconds * 1000,

            timerProgressBar: true,

            showConfirmButton: false

        });

    },


    /* ========================================================
       ÉXITO CON REDIRECCIÓN
    ======================================================== */

    successRedirect: function (
        message,
        url,
        title = '¡Éxito!'
    ) {

        return Swal.fire({

            icon: 'success',

            title: title,

            text: message,

            confirmButtonText: 'Aceptar'

        }).then(() => {

            window.location.href = url;

        });

    },


    /* ========================================================
       ERROR DE VALIDACIÓN
    ======================================================== */

    validation: function (
        message = 'Verifique los datos ingresados.'
    ) {

        return Swal.fire({

            icon: 'warning',

            title: 'Datos incorrectos',

            text: message,

            confirmButtonText: 'Revisar'

        });

    },


    /* ========================================================
       SESIÓN EXPIRADA
    ======================================================== */

    sessionExpired: function () {

        return Swal.fire({

            icon: 'warning',

            title: 'Sesión expirada',

            text: 'Su sesión ha expirado. Debe iniciar sesión nuevamente.',

            confirmButtonText: 'Iniciar sesión',

            allowOutsideClick: false,

            allowEscapeKey: false

        }).then(() => {

            window.location.href = '/login';

        });

    },


    /* ========================================================
       SIN RESULTADOS
    ======================================================== */

    empty: function (
        message = 'No se encontraron registros.'
    ) {

        return Swal.fire({

            icon: 'info',

            title: 'Sin resultados',

            text: message,

            confirmButtonText: 'Aceptar'

        });

    },


    /* ========================================================
       CONFIRMACIÓN PERSONALIZADA
    ======================================================== */

    customConfirm: function ({

        title = '¿Está seguro?',

        message = '',

        icon = 'question',

        confirmText = 'Sí, continuar',

        cancelText = 'Cancelar'

    } = {}) {

        return Swal.fire({

            icon: icon,

            title: title,

            text: message,

            showCancelButton: true,

            confirmButtonText: confirmText,

            cancelButtonText: cancelText,

            reverseButtons: true

        });

    }

};


/* ============================================================
   ALIAS GLOBAL
============================================================ */

window.NovaAlert = NovaAlert;

