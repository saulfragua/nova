<?php

$pageTitle = 'Usuarios';



/**
 * ============================================================
 * NOVA - GESTIÓN DE USUARIOS
 * ============================================================
 *
 * Variables esperadas desde UsuariosController:
 *
 * $usuarios
 * $totalUsuarios
 * $totalAdministradores
 * $totalCobradores
 * $usuariosConRutas
 * $rutas
 *
 * ============================================================
 */

$usuarios = $usuarios ?? [];
$rutas    = $rutas ?? [];

$totalUsuarios        = $totalUsuarios ?? count($usuarios);
$totalAdministradores = $totalAdministradores ?? 0;
$totalCobradores      = $totalCobradores ?? 0;
$usuariosConRutas     = $usuariosConRutas ?? 0;
?>

<div class="min-h-screen bg-slate-50">

    <!-- ======================================================
         CONTENIDO PRINCIPAL
    ======================================================= -->

    <main class="px-4 py-5 sm:px-6 lg:px-8">

        <!-- ==================================================
             ENCABEZADO
        =================================================== -->

        <section
            class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between"
        >

            <div class="flex items-start gap-4">

                <!-- ICONO -->

                <div
                    class="
                        flex
                        h-12
                        w-12
                        shrink-0
                        items-center
                        justify-center
                        rounded-2xl
                        bg-slate-900
                        text-white
                        shadow-sm
                    "
                >
                    <i class="fa-solid fa-users text-xl"></i>
                </div>

                <!-- TITULO -->

                <div>

                    <h1
                        class="
                            text-2xl
                            font-bold
                            tracking-tight
                            text-slate-900
                        "
                    >
                        Usuarios
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        Gestiona los usuarios del sistema y sus rutas asignadas.
                    </p>

                </div>

            </div>


            <!-- NUEVO USUARIO -->

            <a
                href="<?= BASE_URL ?>/usuarios/crear"
                class="
                    inline-flex
                    h-11
                    items-center
                    justify-center
                    gap-2
                    rounded-xl
                    bg-blue-600
                    px-5
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

                <i class="fa-solid fa-plus"></i>

                <span>
                    Nuevo Usuario
                </span>

            </a>

        </section>


        <!-- ==================================================
             TARJETAS RESUMEN
        =================================================== -->

        <section
            class="
                mb-5
                grid
                grid-cols-1
                gap-4
                sm:grid-cols-2
                xl:grid-cols-4
            "
        >

            <!-- TOTAL USUARIOS -->

            <div
                class="
                    rounded-2xl
                    border
                    border-slate-200
                    bg-white
                    p-4
                    shadow-sm
                "
            >

                <div class="flex items-center gap-4">

                    <div
                        class="
                            flex
                            h-12
                            w-12
                            items-center
                            justify-center
                            rounded-xl
                            bg-blue-100
                            text-blue-600
                        "
                    >
                        <i class="fa-solid fa-user text-xl"></i>
                    </div>

                    <div>

                        <p class="text-sm text-slate-500">
                            Total usuarios
                        </p>

                        <p
                            class="
                                mt-1
                                text-2xl
                                font-bold
                                text-slate-900
                            "
                        >
                            <?= $totalUsuarios ?>
                        </p>

                    </div>

                </div>

            </div>


            <!-- ADMINISTRADORES -->

            <div
                class="
                    rounded-2xl
                    border
                    border-slate-200
                    bg-white
                    p-4
                    shadow-sm
                "
            >

                <div class="flex items-center gap-4">

                    <div
                        class="
                            flex
                            h-12
                            w-12
                            items-center
                            justify-center
                            rounded-xl
                            bg-green-100
                            text-green-600
                        "
                    >
                        <i class="fa-solid fa-user-shield text-xl"></i>
                    </div>

                    <div>

                        <p class="text-sm text-slate-500">
                            Administradores
                        </p>

                        <p
                            class="
                                mt-1
                                text-2xl
                                font-bold
                                text-slate-900
                            "
                        >
                            <?= $totalAdministradores ?>
                        </p>

                    </div>

                </div>

            </div>


            <!-- COBRADORES -->

            <div
                class="
                    rounded-2xl
                    border
                    border-slate-200
                    bg-white
                    p-4
                    shadow-sm
                "
            >

                <div class="flex items-center gap-4">

                    <div
                        class="
                            flex
                            h-12
                            w-12
                            items-center
                            justify-center
                            rounded-xl
                            bg-amber-100
                            text-amber-500
                        "
                    >
                        <i class="fa-solid fa-person-walking-arrow-right text-xl"></i>
                    </div>

                    <div>

                        <p class="text-sm text-slate-500">
                            Cobradores
                        </p>

                        <p
                            class="
                                mt-1
                                text-2xl
                                font-bold
                                text-slate-900
                            "
                        >
                            <?= $totalCobradores ?>
                        </p>

                    </div>

                </div>

            </div>


            <!-- CON RUTAS -->

            <div
                class="
                    rounded-2xl
                    border
                    border-slate-200
                    bg-white
                    p-4
                    shadow-sm
                "
            >

                <div class="flex items-center gap-4">

                    <div
                        class="
                            flex
                            h-12
                            w-12
                            items-center
                            justify-center
                            rounded-xl
                            bg-purple-100
                            text-purple-600
                        "
                    >
                        <i class="fa-solid fa-route text-xl"></i>
                    </div>

                    <div>

                        <p class="text-sm text-slate-500">
                            Con rutas asignadas
                        </p>

                        <p
                            class="
                                mt-1
                                text-2xl
                                font-bold
                                text-slate-900
                            "
                        >
                            <?= $usuariosConRutas ?>
                        </p>

                    </div>

                </div>

            </div>

        </section>


        <!-- ==================================================
             TABLA DE USUARIOS
        =================================================== -->

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

            <!-- FILTROS -->

            <div
                class="
                    flex
                    flex-col
                    gap-3
                    border-b
                    border-slate-200
                    p-4
                    lg:flex-row
                    lg:items-center
                "
            >

                <!-- BUSCADOR -->

                <div class="relative flex-1">

                    <i
                        class="
                            fa-solid
                            fa-magnifying-glass
                            absolute
                            left-4
                            top-1/2
                            -translate-y-1/2
                            text-slate-400
                        "
                    ></i>

                    <input
                        type="text"
                        id="buscarUsuario"
                        placeholder="Buscar por nombre, usuario o email..."
                        class="
                            h-11
                            w-full
                            rounded-xl
                            border
                            border-slate-200
                            bg-white
                            pl-11
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


                <!-- ROL -->

                <select
                    id="filtroRol"
                    class="
                        h-11
                        rounded-xl
                        border
                        border-slate-200
                        bg-white
                        px-4
                        text-sm
                        text-slate-600
                        outline-none
                        focus:border-blue-500
                        focus:ring-2
                        focus:ring-blue-100
                    "
                >

                    <option value="">
                        Todos los roles
                    </option>

                    <option value="admin">
                        Administrador
                    </option>

                    <option value="cobrador">
                        Cobrador
                    </option>

                </select>


                <!-- ESTADO -->

                <select
                    id="filtroEstado"
                    class="
                        h-11
                        rounded-xl
                        border
                        border-slate-200
                        bg-white
                        px-4
                        text-sm
                        text-slate-600
                        outline-none
                        focus:border-blue-500
                        focus:ring-2
                        focus:ring-blue-100
                    "
                >

                    <option value="">
                        Todos los estados
                    </option>

                    <option value="1">
                        Activos
                    </option>

                    <option value="0">
                        Inactivos
                    </option>

                </select>


                <!-- BOTON -->

                <button
                    type="button"
                    id="btnBuscarUsuario"
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
                        transition
                        hover:bg-blue-700
                    "
                >

                    <i class="fa-solid fa-magnifying-glass"></i>

                    Buscar

                </button>

            </div>


            <!-- TABLA -->

            <div class="overflow-x-auto">

                <table class="w-full min-w-[950px]">

                    <thead>

                        <tr
                            class="
                                bg-slate-50
                                text-left
                                text-xs
                                font-semibold
                                uppercase
                                tracking-wide
                                text-slate-600
                            "
                        >

                            <th class="px-4 py-3">
                                #
                            </th>

                            <th class="px-4 py-3">
                                Nombre completo
                            </th>

                            <th class="px-4 py-3">
                                Usuario
                            </th>

                            <th class="px-4 py-3">
                                Rol
                            </th>

                            <th class="px-4 py-3">
                                Email
                            </th>

                            <th class="px-4 py-3">
                                Rutas asignadas
                            </th>

                            <th class="px-4 py-3">
                                Estado
                            </th>

                            <th class="px-4 py-3 text-center">
                                Acciones
                            </th>

                        </tr>

                    </thead>


                    <tbody
                        id="tablaUsuarios"
                        class="divide-y divide-slate-100"
                    >

                    <?php if (!empty($usuarios)): ?>

                        <?php foreach ($usuarios as $index => $usuario): ?>

                            <?php
                            $rol = $usuario['rol'] ?? '';

                            $estado = (int)($usuario['estado'] ?? 0);

                            $cantidadRutas =
                                (int)($usuario['cantidad_rutas'] ?? 0);
                            ?>

                            <tr
                                class="
                                    usuario-row
                                    transition
                                    hover:bg-slate-50
                                "
                                data-nombre="<?= htmlspecialchars(
                                    strtolower(
                                        ($usuario['nombre_completo'] ?? '') .
                                        ' ' .
                                        ($usuario['nombre_usuario'] ?? '') .
                                        ' ' .
                                        ($usuario['email'] ?? '')
                                    )
                                ) ?>"
                                data-rol="<?= htmlspecialchars($rol) ?>"
                                data-estado="<?= $estado ?>"
                            >

                                <!-- NUMERO -->

                                <td
                                    class="
                                        whitespace-nowrap
                                        px-4
                                        py-3
                                        text-sm
                                        text-slate-500
                                    "
                                >
                                    <?= $index + 1 ?>
                                </td>


                                <!-- NOMBRE -->

                                <td
                                    class="
                                        whitespace-nowrap
                                        px-4
                                        py-3
                                    "
                                >

                                    <div
                                        class="
                                            text-sm
                                            font-semibold
                                            text-slate-800
                                        "
                                    >
                                        <?= htmlspecialchars(
                                            $usuario['nombre_completo'] ?? ''
                                        ) ?>
                                    </div>

                                </td>


                                <!-- USUARIO -->

                                <td
                                    class="
                                        whitespace-nowrap
                                        px-4
                                        py-3
                                        text-sm
                                        text-slate-600
                                    "
                                >
                                    <?= htmlspecialchars(
                                        $usuario['nombre_usuario'] ?? ''
                                    ) ?>
                                </td>


                                <!-- ROL -->

                                <td class="px-4 py-3">

                                    <?php if ($rol === 'admin'): ?>

                                        <span
                                            class="
                                                inline-flex
                                                rounded-md
                                                bg-blue-100
                                                px-2.5
                                                py-1
                                                text-xs
                                                font-semibold
                                                text-blue-700
                                            "
                                        >
                                            admin
                                        </span>

                                    <?php else: ?>

                                        <span
                                            class="
                                                inline-flex
                                                rounded-md
                                                bg-green-100
                                                px-2.5
                                                py-1
                                                text-xs
                                                font-semibold
                                                text-green-700
                                            "
                                        >
                                            cobrador
                                        </span>

                                    <?php endif; ?>

                                </td>


                                <!-- EMAIL -->

                                <td
                                    class="
                                        whitespace-nowrap
                                        px-4
                                        py-3
                                        text-sm
                                        text-slate-600
                                    "
                                >
                                    <?= htmlspecialchars(
                                        $usuario['email'] ?? '—'
                                    ) ?>
                                </td>


                                <!-- RUTAS -->

                                <td class="px-4 py-3">

                                    <?php if ($cantidadRutas > 0): ?>

                                        <button
                                            type="button"
                                            onclick="mostrarRutas(
                                                <?= (int)$usuario['id_usuario'] ?>
                                            )"
                                            class="
                                                inline-flex
                                                rounded-md
                                                bg-blue-100
                                                px-2.5
                                                py-1
                                                text-xs
                                                font-semibold
                                                text-blue-700
                                                transition
                                                hover:bg-blue-200
                                            "
                                        >

                                            <?= $cantidadRutas ?>

                                            <?= $cantidadRutas === 1
                                                ? 'ruta'
                                                : 'rutas'
                                            ?>

                                        </button>

                                    <?php else: ?>

                                        <span
                                            class="
                                                inline-flex
                                                rounded-md
                                                bg-slate-100
                                                px-2.5
                                                py-1
                                                text-xs
                                                font-medium
                                                text-slate-500
                                            "
                                        >
                                            Sin rutas
                                        </span>

                                    <?php endif; ?>

                                </td>


                                <!-- ESTADO -->

                                <td class="px-4 py-3">

                                    <?php if ($estado === 1): ?>

                                        <span
                                            class="
                                                inline-flex
                                                items-center
                                                gap-1.5
                                                rounded-md
                                                bg-green-100
                                                px-2.5
                                                py-1
                                                text-xs
                                                font-semibold
                                                text-green-700
                                            "
                                        >

                                            <span
                                                class="
                                                    h-1.5
                                                    w-1.5
                                                    rounded-full
                                                    bg-green-500
                                                "
                                            ></span>

                                            Activo

                                        </span>

                                    <?php else: ?>

                                        <span
                                            class="
                                                inline-flex
                                                items-center
                                                gap-1.5
                                                rounded-md
                                                bg-red-100
                                                px-2.5
                                                py-1
                                                text-xs
                                                font-semibold
                                                text-red-600
                                            "
                                        >

                                            <span
                                                class="
                                                    h-1.5
                                                    w-1.5
                                                    rounded-full
                                                    bg-red-500
                                                "
                                            ></span>

                                            Inactivo

                                        </span>

                                    <?php endif; ?>

                                </td>


                                <!-- ACCIONES -->

                                <td class="px-4 py-3">

                                    <div
                                        class="
                                            flex
                                            items-center
                                            justify-center
                                            gap-2
                                        "
                                    >

                                        <!-- VER -->

                                        <a
                                            href="<?= BASE_URL ?>/usuarios/ver/<?= (int)$usuario['id_usuario'] ?>"
                                            title="Ver usuario"
                                            class="
                                                flex
                                                h-9
                                                w-9
                                                items-center
                                                justify-center
                                                rounded-lg
                                                bg-slate-100
                                                text-slate-500
                                                transition
                                                hover:bg-slate-200
                                                hover:text-slate-700
                                            "
                                        >
                                            <i class="fa-solid fa-eye"></i>
                                        </a>


                                        <!-- RUTAS -->

                                        <button
                                            type="button"
                                            title="Asignar rutas"
                                            onclick="abrirModalRutas(
                                                <?= (int)$usuario['id_usuario'] ?>,
                                                '<?= htmlspecialchars(
                                                    $usuario['nombre_completo'] ?? '',
                                                    ENT_QUOTES
                                                ) ?>'
                                            )"
                                            class="
                                                flex
                                                h-9
                                                w-9
                                                items-center
                                                justify-center
                                                rounded-lg
                                                bg-blue-100
                                                text-blue-600
                                                transition
                                                hover:bg-blue-200
                                            "
                                        >
                                            <i class="fa-solid fa-location-dot"></i>
                                        </button>


                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td
                                colspan="8"
                                class="px-4 py-12 text-center"
                            >

                                <div
                                    class="
                                        mx-auto
                                        flex
                                        h-14
                                        w-14
                                        items-center
                                        justify-center
                                        rounded-full
                                        bg-slate-100
                                        text-slate-400
                                    "
                                >
                                    <i class="fa-solid fa-users text-xl"></i>
                                </div>

                                <p
                                    class="
                                        mt-3
                                        text-sm
                                        font-semibold
                                        text-slate-700
                                    "
                                >
                                    No hay usuarios registrados
                                </p>

                                <p
                                    class="
                                        mt-1
                                        text-sm
                                        text-slate-500
                                    "
                                >
                                    Crea el primer usuario para comenzar.
                                </p>

                            </td>

                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>


            <!-- ==================================================
                 FOOTER TABLA
            =================================================== -->

            <div
                class="
                    flex
                    flex-col
                    gap-3
                    border-t
                    border-slate-200
                    px-4
                    py-4
                    sm:flex-row
                    sm:items-center
                    sm:justify-between
                "
            >

                <p
                    id="contadorUsuarios"
                    class="text-sm text-slate-500"
                >
                    Mostrando
                    <span class="font-semibold text-slate-700">
                        <?= count($usuarios) ?>
                    </span>
                    usuarios
                </p>


                <div class="flex items-center gap-2">

                    <button
                        type="button"
                        disabled
                        class="
                            rounded-lg
                            border
                            border-slate-200
                            px-4
                            py-2
                            text-sm
                            text-slate-400
                        "
                    >
                        Anterior
                    </button>

                    <button
                        type="button"
                        class="
                            h-9
                            min-w-9
                            rounded-lg
                            bg-blue-600
                            px-3
                            text-sm
                            font-semibold
                            text-white
                        "
                    >
                        1
                    </button>

                    <button
                        type="button"
                        disabled
                        class="
                            rounded-lg
                            border
                            border-slate-200
                            px-4
                            py-2
                            text-sm
                            text-slate-400
                        "
                    >
                        Siguiente
                    </button>

                </div>

            </div>

        </section>


        <!-- ==================================================
             PANEL RUTAS
        =================================================== -->

        <section
            id="panelRutas"
            class="
                mt-5
                hidden
                grid
                grid-cols-1
                gap-5
                xl:grid-cols-[1.1fr_0.9fr]
            "
        >

            <!-- RUTAS ASIGNADAS -->

            <div
                class="
                    overflow-hidden
                    rounded-2xl
                    border
                    border-slate-200
                    bg-white
                    shadow-sm
                "
            >

                <div
                    class="
                        flex
                        items-center
                        justify-between
                        border-b
                        border-slate-200
                        p-5
                    "
                >

                    <div>

                        <div class="flex items-center gap-3">

                            <div
                                class="
                                    flex
                                    h-10
                                    w-10
                                    items-center
                                    justify-center
                                    rounded-xl
                                    bg-blue-100
                                    text-blue-600
                                "
                            >
                                <i class="fa-solid fa-location-dot"></i>
                            </div>

                            <div>

                                <h2
                                    class="
                                        text-base
                                        font-bold
                                        text-slate-900
                                    "
                                >
                                    Rutas asignadas
                                </h2>

                                <p class="text-xs text-slate-500">
                                    Visualiza las rutas del usuario seleccionado.
                                </p>

                            </div>

                        </div>

                    </div>


                    <button
                        type="button"
                        onclick="abrirModalRutas()"
                        class="
                            inline-flex
                            items-center
                            gap-2
                            rounded-lg
                            bg-blue-600
                            px-4
                            py-2
                            text-sm
                            font-semibold
                            text-white
                            hover:bg-blue-700
                        "
                    >

                        <i class="fa-solid fa-plus"></i>

                        Asignar ruta

                    </button>

                </div>


                <div class="overflow-x-auto p-4">

                    <table class="w-full">

                        <thead>

                            <tr
                                class="
                                    bg-slate-50
                                    text-left
                                    text-xs
                                    font-semibold
                                    text-slate-600
                                "
                            >

                                <th class="rounded-l-lg px-4 py-3">
                                    #
                                </th>

                                <th class="px-4 py-3">
                                    Ruta
                                </th>

                                <th class="px-4 py-3">
                                    Fecha de asignación
                                </th>

                                <th class="rounded-r-lg px-4 py-3 text-center">
                                    Acciones
                                </th>

                            </tr>

                        </thead>

                        <tbody id="tablaRutas">

                            <tr>

                                <td
                                    colspan="4"
                                    class="
                                        px-4
                                        py-10
                                        text-center
                                        text-sm
                                        text-slate-400
                                    "
                                >
                                    Selecciona un usuario para visualizar
                                    sus rutas.
                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>


            <!-- ==================================================
                 ASIGNAR RUTAS
            =================================================== -->

            <div
                id="modalRutas"
                class="
                    rounded-2xl
                    border
                    border-slate-200
                    bg-white
                    p-5
                    shadow-sm
                "
            >

                <div
                    class="
                        mb-5
                        flex
                        items-center
                        justify-between
                    "
                >

                    <div class="flex items-center gap-3">

                        <div
                            class="
                                flex
                                h-10
                                w-10
                                items-center
                                justify-center
                                rounded-xl
                                bg-blue-100
                                text-blue-600
                            "
                        >
                            <i class="fa-solid fa-route"></i>
                        </div>

                        <h2
                            class="
                                text-base
                                font-bold
                                text-slate-900
                            "
                        >
                            Asignar rutas a usuario
                        </h2>

                    </div>

                </div>


                <!-- USUARIO -->

                <div class="mb-4">

                    <label
                        class="
                            mb-2
                            block
                            text-sm
                            font-semibold
                            text-slate-700
                        "
                    >
                        Usuario
                    </label>

                    <input
                        type="text"
                        id="usuarioSeleccionado"
                        readonly
                        placeholder="Selecciona un usuario"
                        class="
                            h-11
                            w-full
                            rounded-xl
                            border
                            border-slate-200
                            bg-slate-50
                            px-4
                            text-sm
                            text-slate-600
                            outline-none
                        "
                    >

                    <input
                        type="hidden"
                        id="idUsuarioRuta"
                    >

                </div>


                <!-- RUTAS -->

                <div class="mb-5">

                    <label
                        class="
                            mb-2
                            block
                            text-sm
                            font-semibold
                            text-slate-700
                        "
                    >
                        Seleccionar rutas
                    </label>

                    <select
                        id="selectRuta"
                        multiple
                        class="
                            min-h-[130px]
                            w-full
                            rounded-xl
                            border
                            border-slate-200
                            bg-white
                            px-3
                            py-2
                            text-sm
                            text-slate-600
                            outline-none
                            focus:border-blue-500
                            focus:ring-2
                            focus:ring-blue-100
                        "
                    >

                        <?php foreach ($rutas as $ruta): ?>

                            <option
                                value="<?= (int)$ruta['id_ruta'] ?>"
                            >
                                <?= htmlspecialchars(
                                    $ruta['nombre_ruta'] ?? ''
                                ) ?>
                            </option>

                        <?php endforeach; ?>

                    </select>

                    <p class="mt-2 text-xs text-slate-400">
                        Puedes seleccionar una o varias rutas.
                    </p>

                </div>


                <!-- BOTONES -->

                <div class="flex justify-end gap-3">

                    <button
                        type="button"
                        onclick="cerrarModalRutas()"
                        class="
                            rounded-xl
                            bg-slate-100
                            px-5
                            py-2.5
                            text-sm
                            font-semibold
                            text-slate-600
                            hover:bg-slate-200
                        "
                    >
                        Cancelar
                    </button>

                    <button
                        type="button"
                        onclick="asignarRutas()"
                        class="
                            rounded-xl
                            bg-blue-600
                            px-5
                            py-2.5
                            text-sm
                            font-semibold
                            text-white
                            hover:bg-blue-700
                        "
                    >
                        Asignar rutas
                    </button>

                </div>

            </div>

        </section>

    </main>

</div>


<!-- ============================================================
     JAVASCRIPT
============================================================= -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const buscador =
        document.getElementById('buscarUsuario');

    const filtroRol =
        document.getElementById('filtroRol');

    const filtroEstado =
        document.getElementById('filtroEstado');

    const filas =
        document.querySelectorAll('.usuario-row');

    const contador =
        document.getElementById('contadorUsuarios');


    function filtrarUsuarios() {

        const texto =
            buscador.value
                .toLowerCase()
                .trim();

        const rol =
            filtroRol.value;

        const estado =
            filtroEstado.value;

        let encontrados = 0;


        filas.forEach(function (fila) {

            const nombre =
                fila.dataset.nombre || '';

            const filaRol =
                fila.dataset.rol || '';

            const filaEstado =
                fila.dataset.estado || '';


            const coincideTexto =
                nombre.includes(texto);

            const coincideRol =
                !rol || filaRol === rol;

            const coincideEstado =
                estado === '' ||
                filaEstado === estado;


            if (
                coincideTexto &&
                coincideRol &&
                coincideEstado
            ) {

                fila.classList.remove('hidden');

                encontrados++;

            } else {

                fila.classList.add('hidden');

            }

        });


        contador.innerHTML =
            'Mostrando <span class="font-semibold text-slate-700">' +
            encontrados +
            '</span> usuarios';

    }


    buscador.addEventListener(
        'input',
        filtrarUsuarios
    );

    filtroRol.addEventListener(
        'change',
        filtrarUsuarios
    );

    filtroEstado.addEventListener(
        'change',
        filtrarUsuarios
    );


    document
        .getElementById('btnBuscarUsuario')
        .addEventListener(
            'click',
            filtrarUsuarios
        );

});


/* ============================================================
   ABRIR MODAL / PANEL DE RUTAS
============================================================ */

function abrirModalRutas(
    idUsuario = '',
    nombreUsuario = ''
) {

    const panel =
        document.getElementById('panelRutas');

    panel.classList.remove('hidden');

    if (idUsuario) {

        document.getElementById(
            'idUsuarioRuta'
        ).value = idUsuario;

        document.getElementById(
            'usuarioSeleccionado'
        ).value = nombreUsuario;

        mostrarRutas(idUsuario);

    }

    panel.scrollIntoView({
        behavior: 'smooth',
        block: 'nearest'
    });

}


/* ============================================================
   CERRAR PANEL
============================================================ */

function cerrarModalRutas() {

    document
        .getElementById('panelRutas')
        .classList.add('hidden');

}


/* ============================================================
   MOSTRAR RUTAS
============================================================ */

function mostrarRutas(idUsuario) {

    const panel =
        document.getElementById('panelRutas');

    panel.classList.remove('hidden');


    /*
     * Aquí posteriormente conectaremos:
     *
     * GET /usuarios/rutas/{id_usuario}
     *
     * usando fetch().
     *
     * Por ahora mostramos estado de carga.
     */

    document.getElementById(
        'tablaRutas'
    ).innerHTML = `

        <tr>

            <td
                colspan="4"
                class="
                    px-4
                    py-10
                    text-center
                    text-sm
                    text-slate-400
                "
            >

                <i class="
                    fa-solid
                    fa-spinner
                    fa-spin
                    mr-2
                "></i>

                Cargando rutas...

            </td>

        </tr>

    `;


    /*
     * Ejemplo de conexión futura:
     *
     * fetch(
     *     `${BASE_URL}/usuarios/rutas/${idUsuario}`
     * )
     * .then(response => response.json())
     * .then(data => {
     *     ...
     * });
     */

}


/* ============================================================
   ASIGNAR RUTAS
============================================================ */

function asignarRutas() {

    const idUsuario =
        document.getElementById(
            'idUsuarioRuta'
        ).value;

    const select =
        document.getElementById(
            'selectRuta'
        );

    const rutas =
        Array.from(
            select.selectedOptions
        ).map(
            option => option.value
        );


    if (!idUsuario) {

        alert(
            'Selecciona un usuario.'
        );

        return;

    }


    if (rutas.length === 0) {

        alert(
            'Selecciona al menos una ruta.'
        );

        return;

    }


    /*
     * Posteriormente:
     *
     * fetch(
     *     `${BASE_URL}/usuarios/asignar-rutas`,
     *     {
     *         method: 'POST',
     *         headers: {
     *             'Content-Type':
     *                 'application/json'
     *         },
     *         body: JSON.stringify({
     *             id_usuario: idUsuario,
     *             rutas: rutas
     *         })
     *     }
     * );
     */


    alert(
        'Rutas seleccionadas correctamente.'
    );

}


/* ============================================================
   ELIMINAR USUARIO
============================================================ */

function eliminarUsuario(idUsuario) {

    const confirmar =
        confirm(
            '¿Está seguro de eliminar este usuario?'
        );


    if (!confirmar) {
        return;
    }


    /*
     * Aquí conectaremos:
     *
     * POST /usuarios/delete/{id}
     *
     * respetando CSRF.
     */


    console.log(
        'Eliminar usuario:',
        idUsuario
    );

}

</script>
