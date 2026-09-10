<?php

/**
 * =========================================================
 * VISTA: EDITAR USUARIO
 * =========================================================
 *
 * Permite modificar la información de un usuario existente.
 *
 * Variables esperadas:
 *
 * @var array $usuario
 * @var array $errores
 */

$usuario = $usuario ?? [];
$errores = $errores ?? [];

/*
|--------------------------------------------------------------------------
| Datos del usuario
|--------------------------------------------------------------------------
*/

$idUsuario = (int) ($usuario['id_usuario'] ?? 0);

$nombreCompleto = htmlspecialchars(
    $usuario['nombre_completo'] ?? '',
    ENT_QUOTES,
    'UTF-8'
);

$nombreUsuario = htmlspecialchars(
    $usuario['nombre_usuario'] ?? '',
    ENT_QUOTES,
    'UTF-8'
);

$email = htmlspecialchars(
    $usuario['email'] ?? '',
    ENT_QUOTES,
    'UTF-8'
);

$rol = $usuario['rol'] ?? '';

$estado = (int) ($usuario['estado'] ?? 0);

?>

<div class="min-h-screen bg-slate-50">

    <div class="mx-auto max-w-5xl px-4 py-6 sm:px-6 lg:px-8">

        <!-- =================================================
             ENCABEZADO
        ================================================== -->

        <div class="mb-6">

            <div class="mb-2 flex items-center gap-2 text-sm text-slate-500">

                <a
                    href="<?= BASE_URL ?>/usuarios"
                    class="transition hover:text-slate-900"
                >
                    Usuarios
                </a>

                <i class="fa-solid fa-chevron-right text-[10px]"></i>

                <a
                    href="<?= BASE_URL ?>/usuarios/ver/<?= $idUsuario ?>"
                    class="transition hover:text-slate-900"
                >
                    Ver usuario
                </a>

                <i class="fa-solid fa-chevron-right text-[10px]"></i>

                <span class="text-slate-700">
                    Editar
                </span>

            </div>


            <div
                class="
                    flex
                    flex-col
                    gap-4
                    sm:flex-row
                    sm:items-center
                    sm:justify-between
                "
            >

                <div>

                    <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                        Editar usuario
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        Actualiza la información y configuración del usuario.
                    </p>

                </div>


                <a
                    href="<?= BASE_URL ?>/usuarios/ver/<?= $idUsuario ?>"
                    class="
                        inline-flex
                        h-10
                        items-center
                        justify-center
                        gap-2
                        rounded-lg
                        border
                        border-slate-200
                        bg-white
                        px-4
                        text-sm
                        font-medium
                        text-slate-700
                        shadow-sm
                        transition
                        hover:bg-slate-50
                    "
                >
                    <i class="fa-solid fa-arrow-left"></i>

                    Volver
                </a>

            </div>

        </div>


        <!-- =================================================
             ERRORES
        ================================================== -->

        <?php if (!empty($errores)): ?>

            <div
                class="
                    mb-6
                    rounded-xl
                    border
                    border-red-200
                    bg-red-50
                    p-4
                "
            >

                <div class="flex gap-3">

                    <div
                        class="
                            flex
                            h-8
                            w-8
                            shrink-0
                            items-center
                            justify-center
                            rounded-lg
                            bg-red-100
                            text-red-600
                        "
                    >
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>

                    <div>

                        <h3 class="text-sm font-semibold text-red-800">
                            No se pudo actualizar el usuario
                        </h3>

                        <ul class="mt-2 space-y-1">

                            <?php foreach ($errores as $error): ?>

                                <li class="text-sm text-red-700">
                                    • <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
                                </li>

                            <?php endforeach; ?>

                        </ul>

                    </div>

                </div>

            </div>

        <?php endif; ?>


        <!-- =================================================
             FORMULARIO
        ================================================== -->

        <form
            action="<?= BASE_URL ?>/usuarios/actualizar"
            method="POST"
            autocomplete="off"
        >

            <!-- ID DEL USUARIO -->

            <input
                type="hidden"
                name="id_usuario"
                value="<?= $idUsuario ?>"
            >


            <!-- =================================================
                 INFORMACIÓN GENERAL
            ================================================== -->

            <div
                class="
                    mb-6
                    overflow-hidden
                    rounded-2xl
                    border
                    border-slate-200
                    bg-white
                    shadow-sm
                "
            >

                <div class="border-b border-slate-100 px-6 py-5">

                    <div class="flex items-center gap-3">

                        <div
                            class="
                                flex
                                h-10
                                w-10
                                items-center
                                justify-center
                                rounded-xl
                                bg-slate-100
                                text-slate-700
                            "
                        >
                            <i class="fa-solid fa-user"></i>
                        </div>

                        <div>

                            <h2 class="font-semibold text-slate-900">
                                Información general
                            </h2>

                            <p class="text-xs text-slate-500">
                                Datos básicos de la cuenta.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2">


                    <!-- NOMBRE COMPLETO -->

                    <div class="md:col-span-2">

                        <label
                            for="nombre_completo"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Nombre completo
                            <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">

                            <div
                                class="
                                    pointer-events-none
                                    absolute
                                    inset-y-0
                                    left-0
                                    flex
                                    items-center
                                    pl-3
                                    text-slate-400
                                "
                            >
                                <i class="fa-solid fa-user"></i>
                            </div>

                            <input
                                type="text"
                                id="nombre_completo"
                                name="nombre_completo"
                                value="<?= $nombreCompleto ?>"
                                maxlength="100"
                                required
                                class="
                                    block
                                    h-11
                                    w-full
                                    rounded-lg
                                    border
                                    border-slate-200
                                    bg-white
                                    pl-10
                                    pr-4
                                    text-sm
                                    text-slate-900
                                    outline-none
                                    transition
                                    placeholder:text-slate-400
                                    focus:border-slate-400
                                    focus:ring-2
                                    focus:ring-slate-100
                                "
                                placeholder="Ej. Juan Pérez"
                            >

                        </div>

                    </div>


                    <!-- NOMBRE DE USUARIO -->

                    <div>

                        <label
                            for="nombre_usuario"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Nombre de usuario
                            <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">

                            <div
                                class="
                                    pointer-events-none
                                    absolute
                                    inset-y-0
                                    left-0
                                    flex
                                    items-center
                                    pl-3
                                    text-slate-400
                                "
                            >
                                <i class="fa-solid fa-at"></i>
                            </div>

                            <input
                                type="text"
                                id="nombre_usuario"
                                name="nombre_usuario"
                                value="<?= $nombreUsuario ?>"
                                maxlength="50"
                                required
                                class="
                                    block
                                    h-11
                                    w-full
                                    rounded-lg
                                    border
                                    border-slate-200
                                    bg-white
                                    pl-10
                                    pr-4
                                    text-sm
                                    text-slate-900
                                    outline-none
                                    transition
                                    focus:border-slate-400
                                    focus:ring-2
                                    focus:ring-slate-100
                                "
                                placeholder="usuario"
                            >

                        </div>

                        <p class="mt-1 text-xs text-slate-400">
                            Letras, números, puntos, guiones y guiones bajos.
                        </p>

                    </div>


                    <!-- CORREO -->

                    <div>

                        <label
                            for="email"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Correo electrónico
                        </label>

                        <div class="relative">

                            <div
                                class="
                                    pointer-events-none
                                    absolute
                                    inset-y-0
                                    left-0
                                    flex
                                    items-center
                                    pl-3
                                    text-slate-400
                                "
                            >
                                <i class="fa-solid fa-envelope"></i>
                            </div>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="<?= $email ?>"
                                maxlength="255"
                                class="
                                    block
                                    h-11
                                    w-full
                                    rounded-lg
                                    border
                                    border-slate-200
                                    bg-white
                                    pl-10
                                    pr-4
                                    text-sm
                                    text-slate-900
                                    outline-none
                                    transition
                                    focus:border-slate-400
                                    focus:ring-2
                                    focus:ring-slate-100
                                "
                                placeholder="correo@ejemplo.com"
                            >

                        </div>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 ROL Y ESTADO
            ================================================== -->

            <div
                class="
                    mb-6
                    overflow-hidden
                    rounded-2xl
                    border
                    border-slate-200
                    bg-white
                    shadow-sm
                "
            >

                <div class="border-b border-slate-100 px-6 py-5">

                    <div class="flex items-center gap-3">

                        <div
                            class="
                                flex
                                h-10
                                w-10
                                items-center
                                justify-center
                                rounded-xl
                                bg-slate-100
                                text-slate-700
                            "
                        >
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>

                        <div>

                            <h2 class="font-semibold text-slate-900">
                                Permisos y estado
                            </h2>

                            <p class="text-xs text-slate-500">
                                Define el nivel de acceso del usuario.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2">


                    <!-- ROL -->

                    <div>

                        <label
                            for="rol"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Rol
                            <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">

                            <div
                                class="
                                    pointer-events-none
                                    absolute
                                    inset-y-0
                                    left-0
                                    flex
                                    items-center
                                    pl-3
                                    text-slate-400
                                "
                            >
                                <i class="fa-solid fa-user-shield"></i>
                            </div>

                            <select
                                id="rol"
                                name="rol"
                                required
                                class="
                                    block
                                    h-11
                                    w-full
                                    appearance-none
                                    rounded-lg
                                    border
                                    border-slate-200
                                    bg-white
                                    pl-10
                                    pr-10
                                    text-sm
                                    text-slate-900
                                    outline-none
                                    transition
                                    focus:border-slate-400
                                    focus:ring-2
                                    focus:ring-slate-100
                                "
                            >

                                <option
                                    value="admin"
                                    <?= $rol === 'admin' ? 'selected' : '' ?>
                                >
                                    Administrador
                                </option>

                                <option
                                    value="cobrador"
                                    <?= $rol === 'cobrador' ? 'selected' : '' ?>
                                >
                                    Cobrador
                                </option>

                            </select>

                            <div
                                class="
                                    pointer-events-none
                                    absolute
                                    inset-y-0
                                    right-0
                                    flex
                                    items-center
                                    pr-3
                                    text-slate-400
                                "
                            >
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </div>

                        </div>

                    </div>


                    <!-- ESTADO -->

                    <div>

                        <label class="mb-2 block text-sm font-medium text-slate-700">
                            Estado
                        </label>

                        <label
                            class="
                                flex
                                min-h-11
                                cursor-pointer
                                items-center
                                gap-3
                                rounded-lg
                                border
                                border-slate-200
                                px-4
                                transition
                                hover:bg-slate-50
                            "
                        >

                            <input
                                type="checkbox"
                                name="estado"
                                value="1"
                                <?= $estado === 1 ? 'checked' : '' ?>
                                class="
                                    h-4
                                    w-4
                                    rounded
                                    border-slate-300
                                    text-slate-900
                                    focus:ring-slate-400
                                "
                            >

                            <span>

                                <span class="block text-sm font-medium text-slate-900">
                                    Usuario activo
                                </span>

                                <span class="block text-xs text-slate-500">
                                    Puede acceder al sistema.
                                </span>

                            </span>

                        </label>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 CONTRASEÑA
            ================================================== -->

            <div
                class="
                    mb-6
                    overflow-hidden
                    rounded-2xl
                    border
                    border-slate-200
                    bg-white
                    shadow-sm
                "
            >

                <div class="border-b border-slate-100 px-6 py-5">

                    <div class="flex items-center gap-3">

                        <div
                            class="
                                flex
                                h-10
                                w-10
                                items-center
                                justify-center
                                rounded-xl
                                bg-slate-100
                                text-slate-700
                            "
                        >
                            <i class="fa-solid fa-lock"></i>
                        </div>

                        <div>

                            <h2 class="font-semibold text-slate-900">
                                Contraseña
                            </h2>

                            <p class="text-xs text-slate-500">
                                Déjala vacía si no deseas cambiarla.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2">


                    <!-- NUEVA CONTRASEÑA -->

                    <div>

                        <label
                            for="clave"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Nueva contraseña
                        </label>

                        <div class="relative">

                            <div
                                class="
                                    pointer-events-none
                                    absolute
                                    inset-y-0
                                    left-0
                                    flex
                                    items-center
                                    pl-3
                                    text-slate-400
                                "
                            >
                                <i class="fa-solid fa-lock"></i>
                            </div>

                            <input
                                type="password"
                                id="clave"
                                name="clave"
                                minlength="6"
                                class="
                                    block
                                    h-11
                                    w-full
                                    rounded-lg
                                    border
                                    border-slate-200
                                    bg-white
                                    pl-10
                                    pr-11
                                    text-sm
                                    text-slate-900
                                    outline-none
                                    transition
                                    focus:border-slate-400
                                    focus:ring-2
                                    focus:ring-slate-100
                                "
                                placeholder="••••••••"
                            >

                            <button
                                type="button"
                                onclick="mostrarClave('clave', this)"
                                class="
                                    absolute
                                    inset-y-0
                                    right-0
                                    flex
                                    w-10
                                    items-center
                                    justify-center
                                    text-slate-400
                                    transition
                                    hover:text-slate-700
                                "
                                title="Mostrar contraseña"
                            >
                                <i class="fa-solid fa-eye"></i>
                            </button>

                        </div>

                        <p class="mt-1 text-xs text-slate-400">
                            Mínimo 6 caracteres.
                        </p>

                    </div>


                    <!-- CONFIRMAR -->

                    <div>

                        <label
                            for="confirmar_clave"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Confirmar contraseña
                        </label>

                        <div class="relative">

                            <div
                                class="
                                    pointer-events-none
                                    absolute
                                    inset-y-0
                                    left-0
                                    flex
                                    items-center
                                    pl-3
                                    text-slate-400
                                "
                            >
                                <i class="fa-solid fa-lock"></i>
                            </div>

                            <input
                                type="password"
                                id="confirmar_clave"
                                name="confirmar_clave"
                                class="
                                    block
                                    h-11
                                    w-full
                                    rounded-lg
                                    border
                                    border-slate-200
                                    bg-white
                                    pl-10
                                    pr-11
                                    text-sm
                                    text-slate-900
                                    outline-none
                                    transition
                                    focus:border-slate-400
                                    focus:ring-2
                                    focus:ring-slate-100
                                "
                                placeholder="••••••••"
                            >

                            <button
                                type="button"
                                onclick="mostrarClave('confirmar_clave', this)"
                                class="
                                    absolute
                                    inset-y-0
                                    right-0
                                    flex
                                    w-10
                                    items-center
                                    justify-center
                                    text-slate-400
                                    transition
                                    hover:text-slate-700
                                "
                                title="Mostrar contraseña"
                            >
                                <i class="fa-solid fa-eye"></i>
                            </button>

                        </div>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 BOTONES
            ================================================== -->

            <div
                class="
                    flex
                    flex-col-reverse
                    gap-3
                    sm:flex-row
                    sm:justify-end
                "
            >

                <a
                    href="<?= BASE_URL ?>/usuarios/ver/<?= $idUsuario ?>"
                    class="
                        inline-flex
                        h-11
                        items-center
                        justify-center
                        gap-2
                        rounded-lg
                        border
                        border-slate-200
                        bg-white
                        px-5
                        text-sm
                        font-medium
                        text-slate-700
                        transition
                        hover:bg-slate-50
                    "
                >
                    Cancelar
                </a>


                <button
                    type="submit"
                    class="
                        inline-flex
                        h-11
                        items-center
                        justify-center
                        gap-2
                        rounded-lg
                        bg-slate-900
                        px-5
                        text-sm
                        font-semibold
                        text-white
                        shadow-sm
                        transition
                        hover:bg-slate-800
                    "
                >
                    <i class="fa-solid fa-floppy-disk"></i>

                    Guardar cambios
                </button>

            </div>

        </form>

    </div>

</div>


<script>

function mostrarClave(id, boton)
{
    const campo = document.getElementById(id);
    const icono = boton.querySelector('i');

    if (campo.type === 'password') {

        campo.type = 'text';

        icono.classList.remove('fa-eye');
        icono.classList.add('fa-eye-slash');

    } else {

        campo.type = 'password';

        icono.classList.remove('fa-eye-slash');
        icono.classList.add('fa-eye');
    }
}


/*
|--------------------------------------------------------------------------
| Validación de contraseñas
|--------------------------------------------------------------------------
*/

document.querySelector('form').addEventListener(
    'submit',
    function (evento) {

        const clave =
            document.getElementById('clave').value;

        const confirmar =
            document.getElementById('confirmar_clave').value;


        /*
         * Si no se escribió contraseña,
         * significa que se conservará la actual.
         */

        if (clave === '' && confirmar === '') {
            return;
        }


        if (clave !== confirmar) {

            evento.preventDefault();

            alert(
                'Las contraseñas no coinciden.'
            );

            return;
        }


        if (clave.length < 6) {

            evento.preventDefault();

            alert(
                'La nueva contraseña debe tener al menos 6 caracteres.'
            );
        }

    }
);

</script>