<?php

/**
 * ============================================================
 * NOVA - CREAR USUARIO
 * ============================================================
 */

$errores = $errores ?? [];
$old     = $old ?? [];

$nombreCompleto = $old['nombre_completo'] ?? '';
$nombreUsuario  = $old['nombre_usuario'] ?? '';
$email          = $old['email'] ?? '';
$rol            = $old['rol'] ?? '';
$estado         = isset($old['estado'])
    ? (int) $old['estado']
    : 1;

?>

<div class="min-h-screen bg-slate-50">

    <main class="px-4 py-5 sm:px-6 lg:px-8">

        <!-- ====================================================
             ENCABEZADO
        ===================================================== -->

        <div
            class="
                mb-6
                flex
                flex-col
                gap-3
                sm:flex-row
                sm:items-start
                sm:justify-between
            "
        >

            <div class="flex items-start gap-3">

                <!-- VOLVER -->

                <a
                    href="<?= BASE_URL ?>/usuarios"
                    title="Volver a usuarios"
                    class="
                        mt-1
                        flex
                        h-9
                        w-9
                        shrink-0
                        items-center
                        justify-center
                        rounded-lg
                        text-slate-500
                        transition
                        hover:bg-white
                        hover:text-slate-900
                    "
                >
                    <i class="fa-solid fa-arrow-left"></i>
                </a>


                <div>

                    <h1
                        class="
                            text-2xl
                            font-bold
                            tracking-tight
                            text-slate-900
                        "
                    >
                        Crear Usuario
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        Registra un nuevo usuario en el sistema.
                    </p>

                </div>

            </div>


            <!-- BREADCRUMB -->

            <div
                class="
                    flex
                    items-center
                    gap-2
                    text-xs
                    text-slate-400
                "
            >

                <a
                    href="<?= BASE_URL ?>/usuarios"
                    class="hover:text-blue-600"
                >
                    Usuarios
                </a>

                <i class="fa-solid fa-chevron-right text-[9px]"></i>

                <span class="text-slate-600">
                    Crear usuario
                </span>

            </div>

        </div>


        <!-- ====================================================
             GRID PRINCIPAL
        ===================================================== -->

        <div
            class="
                grid
                grid-cols-1
                gap-5
                xl:grid-cols-[minmax(0,1.45fr)_minmax(320px,0.75fr)]
            "
        >

            <!-- =================================================
                 FORMULARIO
            ================================================== -->

            <section
                class="
                    overflow-hidden
                    rounded-2xl
                    border
                    border-slate-200
                    bg-white
                    shadow-sm
                "
            >

                <!-- CABECERA -->

                <div
                    class="
                        flex
                        items-center
                        gap-3
                        border-b
                        border-slate-100
                        p-5
                    "
                >

                    <div
                        class="
                            flex
                            h-11
                            w-11
                            shrink-0
                            items-center
                            justify-center
                            rounded-xl
                            bg-blue-100
                            text-blue-600
                        "
                    >
                        <i class="fa-solid fa-users text-lg"></i>
                    </div>


                    <div>

                        <h2
                            class="
                                text-base
                                font-bold
                                text-slate-900
                            "
                        >
                            Información del usuario
                        </h2>

                        <p class="mt-0.5 text-xs text-slate-500">
                            Completa los datos para crear un nuevo usuario.
                        </p>

                    </div>

                </div>


                <!-- ERRORES -->

                <?php if (!empty($errores)): ?>

                    <div class="px-5 pt-5">

                        <div
                            class="
                                rounded-xl
                                border
                                border-red-200
                                bg-red-50
                                p-4
                                text-sm
                                text-red-700
                            "
                        >

                            <div
                                class="
                                    mb-2
                                    flex
                                    items-center
                                    gap-2
                                    font-semibold
                                "
                            >

                                <i class="fa-solid fa-circle-exclamation"></i>

                                No se pudo crear el usuario

                            </div>

                            <ul class="list-disc space-y-1 pl-5">

                                <?php foreach ($errores as $error): ?>

                                    <li>
                                        <?= htmlspecialchars($error) ?>
                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        </div>

                    </div>

                <?php endif; ?>


                <!-- FORM -->

                <form
                    id="formCrearUsuario"
                    action="<?= BASE_URL ?>/usuarios/guardar"
                    method="POST"
                    autocomplete="off"
                    novalidate
                >

                    <!-- =================================================
                         CAMPOS
                    ================================================== -->

                    <div class="p-5">

                        <div
                            class="
                                grid
                                grid-cols-1
                                gap-x-6
                                gap-y-5
                                md:grid-cols-2
                            "
                        >

                            <!-- ==========================================
                                 NOMBRE COMPLETO
                            =========================================== -->

                            <div>

                                <label
                                    for="nombre_completo"
                                    class="
                                        mb-2
                                        block
                                        text-sm
                                        font-semibold
                                        text-slate-800
                                    "
                                >
                                    Nombre completo
                                    <span class="text-red-500">*</span>
                                </label>


                                <div class="relative">

                                    <span
                                        class="
                                            absolute
                                            inset-y-0
                                            left-0
                                            flex
                                            w-11
                                            items-center
                                            justify-center
                                            rounded-l-xl
                                            bg-slate-50
                                            text-slate-500
                                        "
                                    >
                                        <i class="fa-regular fa-user"></i>
                                    </span>


                                    <input
                                        type="text"
                                        id="nombre_completo"
                                        name="nombre_completo"
                                        value="<?= htmlspecialchars($nombreCompleto) ?>"
                                        maxlength="100"
                                        required
                                        placeholder="Ej. Carlos Mendoza"
                                        class="
                                            h-11
                                            w-full
                                            rounded-xl
                                            border
                                            border-slate-200
                                            bg-white
                                            pl-14
                                            pr-4
                                            text-sm
                                            text-slate-700
                                            outline-none
                                            transition
                                            placeholder:text-slate-400
                                            focus:border-blue-500
                                            focus:ring-2
                                            focus:ring-blue-100
                                        "
                                    >

                                </div>

                            </div>


                            <!-- ==========================================
                                 NOMBRE USUARIO
                            =========================================== -->

                            <div>

                                <label
                                    for="nombre_usuario"
                                    class="
                                        mb-2
                                        block
                                        text-sm
                                        font-semibold
                                        text-slate-800
                                    "
                                >
                                    Nombre de usuario
                                    <span class="text-red-500">*</span>
                                </label>


                                <div class="relative">

                                    <span
                                        class="
                                            absolute
                                            inset-y-0
                                            left-0
                                            flex
                                            w-11
                                            items-center
                                            justify-center
                                            rounded-l-xl
                                            bg-slate-50
                                            text-slate-500
                                        "
                                    >
                                        <i class="fa-solid fa-at"></i>
                                    </span>


                                    <input
                                        type="text"
                                        id="nombre_usuario"
                                        name="nombre_usuario"
                                        value="<?= htmlspecialchars($nombreUsuario) ?>"
                                        maxlength="50"
                                        required
                                        placeholder="Ej. c.mendoza"
                                        class="
                                            h-11
                                            w-full
                                            rounded-xl
                                            border
                                            border-slate-200
                                            bg-white
                                            pl-14
                                            pr-4
                                            text-sm
                                            text-slate-700
                                            outline-none
                                            transition
                                            placeholder:text-slate-400
                                            focus:border-blue-500
                                            focus:ring-2
                                            focus:ring-blue-100
                                        "
                                    >

                                </div>

                                <p class="mt-1.5 text-xs text-slate-400">
                                    Será el nombre con el que ingresará al sistema.
                                </p>

                            </div>


                            <!-- ==========================================
                                 EMAIL
                            =========================================== -->

                            <div>

                                <label
                                    for="email"
                                    class="
                                        mb-2
                                        block
                                        text-sm
                                        font-semibold
                                        text-slate-800
                                    "
                                >
                                    Email
                                </label>


                                <div class="relative">

                                    <span
                                        class="
                                            absolute
                                            inset-y-0
                                            left-0
                                            flex
                                            w-11
                                            items-center
                                            justify-center
                                            rounded-l-xl
                                            bg-slate-50
                                            text-slate-500
                                        "
                                    >
                                        <i class="fa-regular fa-envelope"></i>
                                    </span>


                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        value="<?= htmlspecialchars($email) ?>"
                                        maxlength="255"
                                        placeholder="Ej. carlos@nova.com"
                                        class="
                                            h-11
                                            w-full
                                            rounded-xl
                                            border
                                            border-slate-200
                                            bg-white
                                            pl-14
                                            pr-4
                                            text-sm
                                            text-slate-700
                                            outline-none
                                            transition
                                            placeholder:text-slate-400
                                            focus:border-blue-500
                                            focus:ring-2
                                            focus:ring-blue-100
                                        "
                                    >

                                </div>

                            </div>


                            <!-- ==========================================
                                 ROL
                            =========================================== -->

                            <div>

                                <label
                                    for="rol"
                                    class="
                                        mb-2
                                        block
                                        text-sm
                                        font-semibold
                                        text-slate-800
                                    "
                                >
                                    Rol
                                    <span class="text-red-500">*</span>
                                </label>


                                <div class="relative">

                                    <span
                                        class="
                                            absolute
                                            inset-y-0
                                            left-0
                                            z-10
                                            flex
                                            w-11
                                            items-center
                                            justify-center
                                            rounded-l-xl
                                            bg-slate-50
                                            text-slate-500
                                        "
                                    >
                                        <i class="fa-solid fa-user-shield"></i>
                                    </span>


                                    <select
                                        id="rol"
                                        name="rol"
                                        required
                                        class="
                                            h-11
                                            w-full
                                            appearance-none
                                            rounded-xl
                                            border
                                            border-slate-200
                                            bg-white
                                            pl-14
                                            pr-10
                                            text-sm
                                            text-slate-700
                                            outline-none
                                            transition
                                            focus:border-blue-500
                                            focus:ring-2
                                            focus:ring-blue-100
                                        "
                                    >

                                        <option value="">
                                            Selecciona un rol
                                        </option>

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


                                    <i
                                        class="
                                            fa-solid
                                            fa-chevron-down
                                            pointer-events-none
                                            absolute
                                            right-4
                                            top-1/2
                                            -translate-y-1/2
                                            text-xs
                                            text-slate-400
                                        "
                                    ></i>

                                </div>

                            </div>


                            <!-- ==========================================
                                 CONTRASEÑA
                            =========================================== -->

                            <div>

                                <label
                                    for="clave"
                                    class="
                                        mb-2
                                        block
                                        text-sm
                                        font-semibold
                                        text-slate-800
                                    "
                                >
                                    Contraseña
                                    <span class="text-red-500">*</span>
                                </label>


                                <div class="relative">

                                    <span
                                        class="
                                            absolute
                                            inset-y-0
                                            left-0
                                            z-10
                                            flex
                                            w-11
                                            items-center
                                            justify-center
                                            rounded-l-xl
                                            bg-slate-50
                                            text-slate-500
                                        "
                                    >
                                        <i class="fa-solid fa-lock"></i>
                                    </span>


                                    <input
                                        type="password"
                                        id="clave"
                                        name="clave"
                                        minlength="6"
                                        required
                                        placeholder="Ingresa una contraseña"
                                        class="
                                            h-11
                                            w-full
                                            rounded-xl
                                            border
                                            border-slate-200
                                            bg-white
                                            pl-14
                                            pr-12
                                            text-sm
                                            text-slate-700
                                            outline-none
                                            transition
                                            placeholder:text-slate-400
                                            focus:border-blue-500
                                            focus:ring-2
                                            focus:ring-blue-100
                                        "
                                    >


                                    <button
                                        type="button"
                                        data-toggle-password="clave"
                                        class="
                                            absolute
                                            right-3
                                            top-1/2
                                            flex
                                            h-8
                                            w-8
                                            -translate-y-1/2
                                            items-center
                                            justify-center
                                            rounded-lg
                                            text-slate-400
                                            hover:bg-slate-100
                                            hover:text-slate-600
                                        "
                                        title="Mostrar contraseña"
                                    >
                                        <i class="fa-regular fa-eye"></i>
                                    </button>

                                </div>


                                <p class="mt-1.5 text-xs text-slate-400">
                                    Debe tener al menos 6 caracteres.
                                </p>

                            </div>


                            <!-- ==========================================
                                 CONFIRMAR CONTRASEÑA
                            =========================================== -->

                            <div>

                                <label
                                    for="confirmar_clave"
                                    class="
                                        mb-2
                                        block
                                        text-sm
                                        font-semibold
                                        text-slate-800
                                    "
                                >
                                    Confirmar contraseña
                                    <span class="text-red-500">*</span>
                                </label>


                                <div class="relative">

                                    <span
                                        class="
                                            absolute
                                            inset-y-0
                                            left-0
                                            z-10
                                            flex
                                            w-11
                                            items-center
                                            justify-center
                                            rounded-l-xl
                                            bg-slate-50
                                            text-slate-500
                                        "
                                    >
                                        <i class="fa-solid fa-lock"></i>
                                    </span>


                                    <input
                                        type="password"
                                        id="confirmar_clave"
                                        name="confirmar_clave"
                                        minlength="6"
                                        required
                                        placeholder="Confirma la contraseña"
                                        class="
                                            h-11
                                            w-full
                                            rounded-xl
                                            border
                                            border-slate-200
                                            bg-white
                                            pl-14
                                            pr-12
                                            text-sm
                                            text-slate-700
                                            outline-none
                                            transition
                                            placeholder:text-slate-400
                                            focus:border-blue-500
                                            focus:ring-2
                                            focus:ring-blue-100
                                        "
                                    >


                                    <button
                                        type="button"
                                        data-toggle-password="confirmar_clave"
                                        class="
                                            absolute
                                            right-3
                                            top-1/2
                                            flex
                                            h-8
                                            w-8
                                            -translate-y-1/2
                                            items-center
                                            justify-center
                                            rounded-lg
                                            text-slate-400
                                            hover:bg-slate-100
                                            hover:text-slate-600
                                        "
                                        title="Mostrar contraseña"
                                    >
                                        <i class="fa-regular fa-eye"></i>
                                    </button>

                                </div>

                            </div>


                            <!-- ==========================================
                                 ESTADO
                            =========================================== -->

                            <div class="md:col-span-2">

                                <label
                                    class="
                                        mb-2
                                        block
                                        text-sm
                                        font-semibold
                                        text-slate-800
                                    "
                                >
                                    Estado
                                    <span class="text-red-500">*</span>
                                </label>


                                <label
                                    class="
                                        inline-flex
                                        cursor-pointer
                                        items-center
                                        gap-3
                                    "
                                >

                                    <input
                                        type="checkbox"
                                        id="estado"
                                        name="estado"
                                        value="1"
                                        class="peer sr-only"
                                        <?= $estado === 1 ? 'checked' : '' ?>
                                    >


                                    <span
                                        class="
                                            relative
                                            h-6
                                            w-11
                                            rounded-full
                                            bg-slate-300
                                            transition
                                            after:absolute
                                            after:left-1
                                            after:top-1
                                            after:h-4
                                            after:w-4
                                            after:rounded-full
                                            after:bg-white
                                            after:shadow-sm
                                            after:transition
                                            peer-checked:bg-green-500
                                            peer-checked:after:translate-x-5
                                        "
                                    ></span>


                                    <span
                                        class="
                                            text-sm
                                            font-medium
                                            text-slate-700
                                        "
                                    >
                                        Usuario activo
                                    </span>

                                </label>


                                <p class="mt-1 text-xs text-slate-400">
                                    Los usuarios inactivos no podrán ingresar al sistema.
                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- =================================================
                         FOOTER FORMULARIO
                    ================================================== -->

                    <div
                        class="
                            flex
                            flex-col-reverse
                            gap-3
                            border-t
                            border-slate-100
                            p-5
                            sm:flex-row
                            sm:justify-end
                        "
                    >

                        <a
                            href="<?= BASE_URL ?>/usuarios"
                            class="
                                inline-flex
                                h-11
                                items-center
                                justify-center
                                rounded-xl
                                bg-slate-100
                                px-6
                                text-sm
                                font-semibold
                                text-slate-600
                                transition
                                hover:bg-slate-200
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
                                rounded-xl
                                bg-blue-600
                                px-6
                                text-sm
                                font-semibold
                                text-white
                                shadow-sm
                                transition
                                hover:bg-blue-700
                                focus:outline-none
                                focus:ring-2
                                focus:ring-blue-500
                                focus:ring-offset-2
                            "
                        >

                            <i class="fa-regular fa-floppy-disk"></i>

                            Guardar usuario

                        </button>

                    </div>

                </form>

            </section>


            <!-- =================================================
                 COLUMNA DERECHA
            ================================================== -->

            <aside class="space-y-5">


                <!-- =================================================
                     INFORMACIÓN DE ROLES
                ================================================== -->

                <section
                    class="
                        rounded-2xl
                        border
                        border-slate-200
                        bg-white
                        p-5
                        shadow-sm
                    "
                >

                    <div class="mb-4 flex items-start gap-3">

                        <div
                            class="
                                flex
                                h-10
                                w-10
                                shrink-0
                                items-center
                                justify-center
                                rounded-xl
                                bg-blue-100
                                text-blue-600
                            "
                        >
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>


                        <div>

                            <h2
                                class="
                                    text-base
                                    font-bold
                                    text-slate-900
                                "
                            >
                                Información de roles
                            </h2>

                            <p class="mt-0.5 text-xs text-slate-500">
                                Conoce las funciones de cada rol en el sistema.
                            </p>

                        </div>

                    </div>


                    <!-- ADMIN -->

                    <div
                        class="
                            mb-3
                            rounded-xl
                            bg-blue-50
                            p-4
                        "
                    >

                        <div class="flex gap-3">

                            <div
                                class="
                                    flex
                                    h-10
                                    w-10
                                    shrink-0
                                    items-center
                                    justify-center
                                    rounded-lg
                                    bg-blue-100
                                    text-blue-600
                                "
                            >
                                <i class="fa-solid fa-users"></i>
                            </div>


                            <div>

                                <h3
                                    class="
                                        text-sm
                                        font-bold
                                        text-slate-800
                                    "
                                >
                                    Administrador
                                </h3>

                                <p
                                    class="
                                        mt-1
                                        text-xs
                                        leading-5
                                        text-slate-600
                                    "
                                >
                                    Acceso total al sistema. Puede gestionar
                                    usuarios, clientes, rutas, cobranzas y
                                    configuraciones.
                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- COBRADOR -->

                    <div
                        class="
                            rounded-xl
                            bg-green-50
                            p-4
                        "
                    >

                        <div class="flex gap-3">

                            <div
                                class="
                                    flex
                                    h-10
                                    w-10
                                    shrink-0
                                    items-center
                                    justify-center
                                    rounded-lg
                                    bg-green-100
                                    text-green-600
                                "
                            >
                                <i class="fa-solid fa-user"></i>
                            </div>


                            <div>

                                <h3
                                    class="
                                        text-sm
                                        font-bold
                                        text-slate-800
                                    "
                                >
                                    Cobrador
                                </h3>

                                <p
                                    class="
                                        mt-1
                                        text-xs
                                        leading-5
                                        text-slate-600
                                    "
                                >
                                    Puede ver sus rutas asignadas, gestionar
                                    cobranzas y consultar clientes.
                                </p>

                            </div>

                        </div>

                    </div>

                </section>


                <!-- =================================================
                     RECOMENDACIONES
                ================================================== -->

                <section
                    class="
                        rounded-2xl
                        border
                        border-slate-200
                        bg-white
                        p-5
                        shadow-sm
                    "
                >

                    <div class="mb-4 flex items-start gap-3">

                        <div
                            class="
                                flex
                                h-10
                                w-10
                                shrink-0
                                items-center
                                justify-center
                                rounded-xl
                                bg-blue-100
                                text-blue-600
                            "
                        >
                            <i class="fa-solid fa-circle-info"></i>
                        </div>


                        <div>

                            <h2
                                class="
                                    text-base
                                    font-bold
                                    text-slate-900
                                "
                            >
                                Recomendaciones
                            </h2>

                            <p class="mt-0.5 text-xs text-slate-500">
                                Ten en cuenta lo siguiente:
                            </p>

                        </div>

                    </div>


                    <ul class="space-y-3">

                        <li
                            class="
                                flex
                                items-start
                                gap-3
                                text-sm
                                text-slate-600
                            "
                        >

                            <span
                                class="
                                    mt-0.5
                                    flex
                                    h-5
                                    w-5
                                    shrink-0
                                    items-center
                                    justify-center
                                    rounded-full
                                    bg-slate-100
                                    text-xs
                                    text-slate-600
                                "
                            >
                                <i class="fa-solid fa-check"></i>
                            </span>

                            <span>
                                Utiliza un nombre de usuario único.
                            </span>

                        </li>


                        <li
                            class="
                                flex
                                items-start
                                gap-3
                                text-sm
                                text-slate-600
                            "
                        >

                            <span
                                class="
                                    mt-0.5
                                    flex
                                    h-5
                                    w-5
                                    shrink-0
                                    items-center
                                    justify-center
                                    rounded-full
                                    bg-slate-100
                                    text-xs
                                    text-slate-600
                                "
                            >
                                <i class="fa-solid fa-check"></i>
                            </span>

                            <span>
                                La contraseña debe ser segura.
                            </span>

                        </li>


                        <li
                            class="
                                flex
                                items-start
                                gap-3
                                text-sm
                                text-slate-600
                            "
                        >

                            <span
                                class="
                                    mt-0.5
                                    flex
                                    h-5
                                    w-5
                                    shrink-0
                                    items-center
                                    justify-center
                                    rounded-full
                                    bg-slate-100
                                    text-xs
                                    text-slate-600
                                "
                            >
                                <i class="fa-solid fa-check"></i>
                            </span>

                            <span>
                                Asigna el rol adecuado según sus funciones.
                            </span>

                        </li>


                        <li
                            class="
                                flex
                                items-start
                                gap-3
                                text-sm
                                text-slate-600
                            "
                        >

                            <span
                                class="
                                    mt-0.5
                                    flex
                                    h-5
                                    w-5
                                    shrink-0
                                    items-center
                                    justify-center
                                    rounded-full
                                    bg-slate-100
                                    text-xs
                                    text-slate-600
                                "
                            >
                                <i class="fa-solid fa-check"></i>
                            </span>

                            <span>
                                Mantén el usuario activo solo si va a utilizar
                                el sistema.
                            </span>

                        </li>

                    </ul>

                </section>

            </aside>

        </div>

    </main>

</div>


<!-- ============================================================
     JAVASCRIPT
============================================================= -->

<script>

document.addEventListener('DOMContentLoaded', function () {


    /*
     * =========================================================
     * MOSTRAR / OCULTAR CONTRASEÑA
     * =========================================================
     */

    document
        .querySelectorAll('[data-toggle-password]')
        .forEach(function (button) {

            button.addEventListener(
                'click',
                function () {

                    const inputId =
                        button.dataset.togglePassword;

                    const input =
                        document.getElementById(inputId);

                    const icon =
                        button.querySelector('i');


                    if (!input) {
                        return;
                    }


                    if (input.type === 'password') {

                        input.type = 'text';

                        icon.classList.remove(
                            'fa-eye'
                        );

                        icon.classList.add(
                            'fa-eye-slash'
                        );

                        button.title =
                            'Ocultar contraseña';

                    } else {

                        input.type = 'password';

                        icon.classList.remove(
                            'fa-eye-slash'
                        );

                        icon.classList.add(
                            'fa-eye'
                        );

                        button.title =
                            'Mostrar contraseña';

                    }

                }
            );

        });


    /*
     * =========================================================
     * VALIDACIÓN DE CONTRASEÑAS
     * =========================================================
     */

    const form =
        document.getElementById(
            'formCrearUsuario'
        );

    const clave =
        document.getElementById(
            'clave'
        );

    const confirmarClave =
        document.getElementById(
            'confirmar_clave'
        );


    if (form) {

        form.addEventListener(
            'submit',
            function (event) {

                if (
                    clave.value !==
                    confirmarClave.value
                ) {

                    event.preventDefault();

                    confirmarClave.focus();

                    alert(
                        'Las contraseñas no coinciden.'
                    );

                    return;
                }


                if (clave.value.length < 6) {

                    event.preventDefault();

                    clave.focus();

                    alert(
                        'La contraseña debe tener al menos 6 caracteres.'
                    );

                    return;
                }

            }
        );

    }


    /*
     * =========================================================
     * NOMBRE DE USUARIO
     * =========================================================
     *
     * Permitimos:
     * letras
     * números
     * punto
     * guion
     * guion bajo
     *
     */

    const nombreUsuario =
        document.getElementById(
            'nombre_usuario'
        );


    if (nombreUsuario) {

        nombreUsuario.addEventListener(
            'input',
            function () {

                this.value =
                    this.value
                        .toLowerCase()
                        .replace(
                            /[^a-z0-9._-]/g,
                            ''
                        );

            }
        );

    }

});

</script>