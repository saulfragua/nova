<?php

/**
 * =========================================================
 * VISTA: VER USUARIO
 * =========================================================
 *
 * Esta vista muestra el detalle de un usuario:
 *
 * - Información personal
 * - Información de acceso
 * - Rol
 * - Estado
 * - Rutas asignadas
 * - Acciones disponibles
 *
 * Variables esperadas desde el controlador:
 *
 * @var array $usuario
 * @var array $rutas
 */

$usuario = $usuario ?? [];
$rutas   = $rutas ?? [];

/*
|--------------------------------------------------------------------------
| Valores seguros para mostrar
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

$cantidadRutas = count($rutas);

/*
|--------------------------------------------------------------------------
| Configuración visual del rol
|--------------------------------------------------------------------------
*/

$rolTexto = match ($rol) {
    'admin' => 'Administrador',
    'cobrador' => 'Cobrador',
    default => 'Sin definir'
};

$rolIcono = match ($rol) {
    'admin' => 'fa-user-shield',
    'cobrador' => 'fa-user-tie',
    default => 'fa-user'
};

/*
|--------------------------------------------------------------------------
| Iniciales del usuario
|--------------------------------------------------------------------------
*/

$iniciales = '';

$partesNombre = preg_split(
    '/\s+/',
    trim($usuario['nombre_completo'] ?? '')
);

if (!empty($partesNombre)) {

    $iniciales .= mb_substr($partesNombre[0], 0, 1);

    if (count($partesNombre) > 1) {
        $iniciales .= mb_substr(
            $partesNombre[count($partesNombre) - 1],
            0,
            1
        );
    }
}

$iniciales = mb_strtoupper($iniciales);

?>

<div class="min-h-screen bg-slate-50">

    <!-- =====================================================
         CONTENEDOR
    ====================================================== -->

    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">


        <!-- =================================================
             ENCABEZADO
        ================================================== -->

        <div class="mb-6">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <div class="mb-2 flex items-center gap-2 text-sm text-slate-500">

                        <a
                            href="<?= BASE_URL ?>/usuarios"
                            class="transition hover:text-slate-900"
                        >
                            Usuarios
                        </a>

                        <i class="fa-solid fa-chevron-right text-[10px]"></i>

                        <span class="text-slate-700">
                            Ver usuario
                        </span>

                    </div>

                    <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                        Detalle del usuario
                    </h1>

                    <p class="mt-1 text-sm text-slate-500">
                        Consulta la información y configuración de este usuario.
                    </p>

                </div>


                <!-- ACCIONES PRINCIPALES -->

                <div class="flex flex-wrap gap-2">

                    <a
                        href="<?= BASE_URL ?>/usuarios"
                        class="
                            inline-flex
                            h-10
                            items-center
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


                    <a
                        href="<?= BASE_URL ?>/usuarios/editar/<?= $idUsuario ?>"
                        class="
                            inline-flex
                            h-10
                            items-center
                            gap-2
                            rounded-lg
                            bg-slate-900
                            px-4
                            text-sm
                            font-medium
                            text-white
                            shadow-sm
                            transition
                            hover:bg-slate-800
                        "
                    >
                        <i class="fa-solid fa-pen"></i>

                        Editar
                    </a>

                </div>

            </div>

        </div>


        <!-- =================================================
             PERFIL DEL USUARIO
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

            <div class="p-6">

                <div class="flex flex-col gap-6 sm:flex-row sm:items-center">


                    <!-- AVATAR -->

                    <div
                        class="
                            flex
                            h-20
                            w-20
                            shrink-0
                            items-center
                            justify-center
                            rounded-2xl
                            bg-slate-900
                            text-2xl
                            font-bold
                            text-white
                        "
                    >
                        <?= $iniciales ?>
                    </div>


                    <!-- INFORMACIÓN PRINCIPAL -->

                    <div class="min-w-0 flex-1">

                        <div class="flex flex-col gap-2 sm:flex-row sm:items-center">

                            <h2 class="text-xl font-bold text-slate-900">
                                <?= $nombreCompleto ?>
                            </h2>


                            <?php if ($estado === 1): ?>

                                <span
                                    class="
                                        inline-flex
                                        w-fit
                                        items-center
                                        gap-1.5
                                        rounded-full
                                        bg-emerald-50
                                        px-3
                                        py-1
                                        text-xs
                                        font-semibold
                                        text-emerald-700
                                    "
                                >
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                    Activo
                                </span>

                            <?php else: ?>

                                <span
                                    class="
                                        inline-flex
                                        w-fit
                                        items-center
                                        gap-1.5
                                        rounded-full
                                        bg-slate-100
                                        px-3
                                        py-1
                                        text-xs
                                        font-semibold
                                        text-slate-600
                                    "
                                >
                                    <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>

                                    Inactivo
                                </span>

                            <?php endif; ?>

                        </div>


                        <p class="mt-1 text-sm text-slate-500">
                            @<?= $nombreUsuario ?>
                        </p>


                        <div class="mt-4 flex flex-wrap gap-2">

                            <span
                                class="
                                    inline-flex
                                    items-center
                                    gap-2
                                    rounded-lg
                                    bg-slate-100
                                    px-3
                                    py-2
                                    text-xs
                                    font-medium
                                    text-slate-700
                                "
                            >
                                <i class="fa-solid <?= $rolIcono ?>"></i>

                                <?= $rolTexto ?>
                            </span>


                            <span
                                class="
                                    inline-flex
                                    items-center
                                    gap-2
                                    rounded-lg
                                    bg-slate-100
                                    px-3
                                    py-2
                                    text-xs
                                    font-medium
                                    text-slate-700
                                "
                            >
                                <i class="fa-solid fa-route"></i>

                                <?= $cantidadRutas ?>
                                <?= $cantidadRutas === 1 ? 'ruta asignada' : 'rutas asignadas' ?>
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- =================================================
             GRID PRINCIPAL
        ================================================== -->

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">


            <!-- =================================================
                 INFORMACIÓN DEL USUARIO
            ================================================== -->

            <div
                class="
                    lg:col-span-2
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

                            <h3 class="font-semibold text-slate-900">
                                Información del usuario
                            </h3>

                            <p class="text-xs text-slate-500">
                                Datos registrados en NOVA.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2">


                    <!-- NOMBRE -->

                    <div>

                        <p class="mb-1 text-xs font-medium uppercase tracking-wide text-slate-400">
                            Nombre completo
                        </p>

                        <p class="text-sm font-medium text-slate-900">
                            <?= $nombreCompleto ?>
                        </p>

                    </div>


                    <!-- USUARIO -->

                    <div>

                        <p class="mb-1 text-xs font-medium uppercase tracking-wide text-slate-400">
                            Nombre de usuario
                        </p>

                        <p class="text-sm font-medium text-slate-900">
                            @<?= $nombreUsuario ?>
                        </p>

                    </div>


                    <!-- EMAIL -->

                    <div>

                        <p class="mb-1 text-xs font-medium uppercase tracking-wide text-slate-400">
                            Correo electrónico
                        </p>

                        <?php if ($email !== ''): ?>

                            <p class="break-all text-sm font-medium text-slate-900">
                                <?= $email ?>
                            </p>

                        <?php else: ?>

                            <p class="text-sm text-slate-400">
                                No registrado
                            </p>

                        <?php endif; ?>

                    </div>


                    <!-- ROL -->

                    <div>

                        <p class="mb-1 text-xs font-medium uppercase tracking-wide text-slate-400">
                            Rol
                        </p>

                        <p class="flex items-center gap-2 text-sm font-medium text-slate-900">

                            <i class="fa-solid <?= $rolIcono ?> text-slate-500"></i>

                            <?= $rolTexto ?>

                        </p>

                    </div>


                    <!-- ESTADO -->

                    <div>

                        <p class="mb-1 text-xs font-medium uppercase tracking-wide text-slate-400">
                            Estado
                        </p>

                        <p class="text-sm font-medium text-slate-900">

                            <?= $estado === 1 ? 'Usuario activo' : 'Usuario inactivo' ?>

                        </p>

                    </div>


                    <!-- ID -->

                    <div>

                        <p class="mb-1 text-xs font-medium uppercase tracking-wide text-slate-400">
                            Identificador
                        </p>

                        <p class="font-mono text-sm font-medium text-slate-700">
                            #<?= $idUsuario ?>
                        </p>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 ACCIONES
            ================================================== -->

            <div
                class="
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
                            <i class="fa-solid fa-bolt"></i>
                        </div>

                        <div>

                            <h3 class="font-semibold text-slate-900">
                                Acciones
                            </h3>

                            <p class="text-xs text-slate-500">
                                Gestión del usuario.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="space-y-2 p-4">


                    <!-- EDITAR -->

                    <a
                        href="<?= BASE_URL ?>/usuarios/editar/<?= $idUsuario ?>"
                        class="
                            flex
                            items-center
                            gap-3
                            rounded-xl
                            p-3
                            text-sm
                            text-slate-700
                            transition
                            hover:bg-slate-50
                        "
                    >

                        <span
                            class="
                                flex
                                h-9
                                w-9
                                items-center
                                justify-center
                                rounded-lg
                                bg-slate-100
                                text-slate-600
                            "
                        >
                            <i class="fa-solid fa-pen"></i>
                        </span>

                        <span>
                            <span class="block font-medium text-slate-900">
                                Editar usuario
                            </span>

                            <span class="block text-xs text-slate-500">
                                Modificar información
                            </span>
                        </span>

                    </a>


                    <!-- RUTAS -->

                    <a
                        href="<?= BASE_URL ?>/usuarios/rutas/<?= $idUsuario ?>"
                        class="
                            flex
                            items-center
                            gap-3
                            rounded-xl
                            p-3
                            text-sm
                            text-slate-700
                            transition
                            hover:bg-slate-50
                        "
                    >

                        <span
                            class="
                                flex
                                h-9
                                w-9
                                items-center
                                justify-center
                                rounded-lg
                                bg-slate-100
                                text-slate-600
                            "
                        >
                            <i class="fa-solid fa-route"></i>
                        </span>

                        <span>
                            <span class="block font-medium text-slate-900">
                                Gestionar rutas
                            </span>

                            <span class="block text-xs text-slate-500">
                                Asignar o quitar rutas
                            </span>
                        </span>

                    </a>


                    <!-- CAMBIAR ESTADO -->

                    <button
                        type="button"
                        onclick="cambiarEstadoUsuario(<?= $idUsuario ?>)"
                        class="
                            flex
                            w-full
                            items-center
                            gap-3
                            rounded-xl
                            p-3
                            text-left
                            text-sm
                            text-slate-700
                            transition
                            hover:bg-slate-50
                        "
                    >

                        <span
                            class="
                                flex
                                h-9
                                w-9
                                items-center
                                justify-center
                                rounded-lg
                                bg-slate-100
                                text-slate-600
                            "
                        >
                            <i class="fa-solid fa-power-off"></i>
                        </span>

                        <span>

                            <span class="block font-medium text-slate-900">
                                <?= $estado === 1 ? 'Desactivar usuario' : 'Activar usuario' ?>
                            </span>

                            <span class="block text-xs text-slate-500">
                                Cambiar estado de acceso
                            </span>

                        </span>

                    </button>


                    <!-- SEPARADOR -->

                    <div class="my-3 border-t border-slate-100"></div>


                    <!-- ELIMINAR -->

                    <button
                        type="button"
                        onclick="eliminarUsuario(<?= $idUsuario ?>)"
                        class="
                            flex
                            w-full
                            items-center
                            gap-3
                            rounded-xl
                            p-3
                            text-left
                            text-sm
                            text-red-600
                            transition
                            hover:bg-red-50
                        "
                    >

                        <span
                            class="
                                flex
                                h-9
                                w-9
                                items-center
                                justify-center
                                rounded-lg
                                bg-red-50
                                text-red-600
                            "
                        >
                            <i class="fa-solid fa-trash"></i>
                        </span>

                        <span>

                            <span class="block font-medium">
                                Eliminar usuario
                            </span>

                            <span class="block text-xs text-red-400">
                                Esta acción requiere confirmación
                            </span>

                        </span>

                    </button>

                </div>

            </div>

        </div>


        <!-- =================================================
             RUTAS ASIGNADAS
        ================================================== -->

        <div
            class="
                mt-6
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
                    flex-col
                    gap-3
                    border-b
                    border-slate-100
                    px-6
                    py-5
                    sm:flex-row
                    sm:items-center
                    sm:justify-between
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
                            bg-slate-100
                            text-slate-700
                        "
                    >
                        <i class="fa-solid fa-route"></i>
                    </div>

                    <div>

                        <h3 class="font-semibold text-slate-900">
                            Rutas asignadas
                        </h3>

                        <p class="text-xs text-slate-500">
                            Rutas disponibles para este usuario.
                        </p>

                    </div>

                </div>


                <a
                    href="<?= BASE_URL ?>/usuarios/rutas/<?= $idUsuario ?>"
                    class="
                        inline-flex
                        h-9
                        items-center
                        justify-center
                        gap-2
                        rounded-lg
                        bg-slate-900
                        px-3
                        text-xs
                        font-medium
                        text-white
                        transition
                        hover:bg-slate-800
                    "
                >
                    <i class="fa-solid fa-plus"></i>

                    Gestionar rutas
                </a>

            </div>


            <?php if (!empty($rutas)): ?>

                <div class="divide-y divide-slate-100">

                    <?php foreach ($rutas as $ruta): ?>

                        <?php
                        $idRuta = (int) ($ruta['id_ruta'] ?? 0);

                        $nombreRuta = htmlspecialchars(
                            $ruta['nombre_ruta'] ?? 'Ruta sin nombre',
                            ENT_QUOTES,
                            'UTF-8'
                        );
                        ?>

                        <div
                            class="
                                flex
                                items-center
                                justify-between
                                gap-4
                                px-6
                                py-4
                                transition
                                hover:bg-slate-50
                            "
                        >

                            <div class="flex min-w-0 items-center gap-3">

                                <div
                                    class="
                                        flex
                                        h-10
                                        w-10
                                        shrink-0
                                        items-center
                                        justify-center
                                        rounded-lg
                                        bg-slate-100
                                        text-slate-600
                                    "
                                >
                                    <i class="fa-solid fa-route"></i>
                                </div>

                                <div class="min-w-0">

                                    <p class="truncate text-sm font-semibold text-slate-900">
                                        <?= $nombreRuta ?>
                                    </p>

                                    <p class="text-xs text-slate-500">
                                        Ruta #<?= $idRuta ?>
                                    </p>

                                </div>

                            </div>


                            <span
                                class="
                                    shrink-0
                                    rounded-full
                                    bg-emerald-50
                                    px-3
                                    py-1
                                    text-xs
                                    font-medium
                                    text-emerald-700
                                "
                            >
                                Asignada
                            </span>

                        </div>

                    <?php endforeach; ?>

                </div>

            <?php else: ?>

                <div class="px-6 py-12 text-center">

                    <div
                        class="
                            mx-auto
                            mb-4
                            flex
                            h-14
                            w-14
                            items-center
                            justify-center
                            rounded-2xl
                            bg-slate-100
                            text-slate-400
                        "
                    >
                        <i class="fa-solid fa-route text-xl"></i>
                    </div>

                    <h4 class="font-semibold text-slate-900">
                        Sin rutas asignadas
                    </h4>

                    <p class="mx-auto mt-1 max-w-md text-sm text-slate-500">
                        Este usuario todavía no tiene rutas asignadas.
                    </p>

                    <a
                        href="<?= BASE_URL ?>/usuarios/rutas/<?= $idUsuario ?>"
                        class="
                            mt-5
                            inline-flex
                            h-10
                            items-center
                            gap-2
                            rounded-lg
                            bg-slate-900
                            px-4
                            text-sm
                            font-medium
                            text-white
                            transition
                            hover:bg-slate-800
                        "
                    >
                        <i class="fa-solid fa-plus"></i>

                        Asignar primera ruta
                    </a>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>


<!-- =========================================================
     JAVASCRIPT
========================================================== -->

<script>

function cambiarEstadoUsuario(idUsuario)
{
    const confirmar = confirm(
        '¿Deseas cambiar el estado de este usuario?'
    );

    if (!confirmar) {
        return;
    }

    window.location.href =
        '<?= BASE_URL ?>/usuarios/cambiarEstado/' +
        idUsuario;
}


function eliminarUsuario(idUsuario)
{
    const confirmar = confirm(
        '¿Estás seguro de eliminar este usuario? Esta acción no se puede deshacer.'
    );

    if (!confirmar) {
        return;
    }

    window.location.href =
        '<?= BASE_URL ?>/usuarios/eliminar/' +
        idUsuario;
}

</script>