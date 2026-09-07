<?php
$pageTitle = 'Clientes';
$clientes = $clientes ?? [];
$rutas    = $rutas ?? [];
?>

<div class="min-h-screen bg-slate-50">

```
<main class="mx-auto w-full max-w-[1800px] px-4 py-6 sm:px-6 lg:px-8">

    <!-- =================================================
         ENCABEZADO
    ================================================== -->

    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                Clientes
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Administra los clientes registrados en NOVA.
            </p>
        </div>

        <a
            href="<?= BASE_URL ?>/clientes/nuevo"
            class="
                inline-flex
                h-10
                items-center
                justify-center
                gap-2
                rounded-lg
                bg-indigo-600
                px-4
                text-sm
                font-semibold
                text-white
                shadow-sm
                transition
                hover:bg-indigo-700
                focus:outline-none
                focus:ring-2
                focus:ring-indigo-500
                focus:ring-offset-2
            "
        >
            <svg
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 4v16m8-8H4"
                />
            </svg>

            Nuevo cliente
        </a>

    </div>


    <!-- =================================================
         CONTENEDOR
    ================================================== -->

    <div
        class="
            overflow-hidden
            rounded-xl
            border
            border-slate-200
            bg-white
            shadow-sm
        "
    >

        <!-- =================================================
             BARRA DE HERRAMIENTAS
        ================================================== -->

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
                lg:justify-between
            "
        >

            <!-- BUSCADOR -->

            <div class="relative w-full lg:max-w-lg">

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
                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m21 21-4.35-4.35m1.35-5.65a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"
                        />
                    </svg>
                </div>

                <input
                    type="search"
                    id="buscarCliente"
                    placeholder="Buscar por nombre, alias, documento o teléfono..."
                    class="
                        h-10
                        w-full
                        rounded-lg
                        border
                        border-slate-300
                        bg-white
                        pl-10
                        pr-4
                        text-sm
                        text-slate-900
                        outline-none
                        transition
                        placeholder:text-slate-400
                        focus:border-indigo-500
                        focus:ring-2
                        focus:ring-indigo-500/20
                    "
                >

            </div>


            <!-- FILTROS -->

            <div class="flex flex-wrap gap-2">

                <select
                    id="filtroEstado"
                    class="
                        h-10
                        rounded-lg
                        border
                        border-slate-300
                        bg-white
                        px-3
                        text-sm
                        text-slate-700
                        outline-none
                        focus:border-indigo-500
                        focus:ring-2
                        focus:ring-indigo-500/20
                    "
                >
                    <option value="">Todos los estados</option>
                    <option value="1">Activos</option>
                    <option value="0">Inactivos</option>
                </select>


                <select
                    id="filtroRuta"
                    class="
                        h-10
                        max-w-[220px]
                        rounded-lg
                        border
                        border-slate-300
                        bg-white
                        px-3
                        text-sm
                        text-slate-700
                        outline-none
                        focus:border-indigo-500
                        focus:ring-2
                        focus:ring-indigo-500/20
                    "
                >

                    <option value="">
                        Todas las rutas
                    </option>

                    <?php foreach ($rutas as $ruta): ?>

                        <option value="<?= (int) $ruta['id_ruta'] ?>">
                            <?= htmlspecialchars($ruta['nombre_ruta'] ?? '') ?>
                        </option>

                    <?php endforeach; ?>

                </select>

            </div>

        </div>


        <!-- =================================================
             CONTADOR
        ================================================== -->

        <div
            class="
                flex
                items-center
                justify-between
                border-b
                border-slate-100
                px-4
                py-3
            "
        >

            <p class="text-sm text-slate-500">

                <span
                    id="contadorClientes"
                    class="font-semibold text-slate-700"
                >
                    <?= count($clientes) ?>
                </span>

                clientes

            </p>

        </div>


        <!-- =================================================
             TABLA DESKTOP
        ================================================== -->

        <div class="hidden overflow-x-auto md:block">

            <table class="w-full min-w-[1250px] text-left">

                <thead class="bg-slate-50">

                    <tr>

                        <th
                            class="
                                px-5
                                py-3
                                text-xs
                                font-semibold
                                uppercase
                                tracking-wider
                                text-slate-500
                            "
                        >
                            Cliente
                        </th>

                        <th
                            class="
                                px-4
                                py-3
                                text-xs
                                font-semibold
                                uppercase
                                tracking-wider
                                text-slate-500
                            "
                        >
                            Documento
                        </th>

                        <th
                            class="
                                px-4
                                py-3
                                text-xs
                                font-semibold
                                uppercase
                                tracking-wider
                                text-slate-500
                            "
                        >
                            Dirección
                        </th>

                        <th
                            class="
                                px-4
                                py-3
                                text-xs
                                font-semibold
                                uppercase
                                tracking-wider
                                text-slate-500
                            "
                        >
                            Teléfono
                        </th>

                        <th
                            class="
                                px-4
                                py-3
                                text-xs
                                font-semibold
                                uppercase
                                tracking-wider
                                text-slate-500
                            "
                        >
                            Teléfono 2
                        </th>

                        <th
                            class="
                                px-4
                                py-3
                                text-xs
                                font-semibold
                                uppercase
                                tracking-wider
                                text-slate-500
                            "
                        >
                            Rutas
                        </th>

                        <th
                            class="
                                px-4
                                py-3
                                text-xs
                                font-semibold
                                uppercase
                                tracking-wider
                                text-slate-500
                            "
                        >
                            Estado
                        </th>

                        <th
                            class="
                                w-16
                                px-4
                                py-3
                                text-center
                                text-xs
                                font-semibold
                                uppercase
                                tracking-wider
                                text-slate-500
                            "
                        >
                            Acciones
                        </th>

                    </tr>

                </thead>


                <tbody
                    id="tablaClientes"
                    class="divide-y divide-slate-100"
                >

                    <?php if (empty($clientes)): ?>

                        <tr>

                            <td
                                colspan="8"
                                class="px-6 py-12 text-center"
                            >

                                <div class="mx-auto max-w-sm">

                                    <div
                                        class="
                                            mx-auto
                                            mb-3
                                            flex
                                            h-12
                                            w-12
                                            items-center
                                            justify-center
                                            rounded-full
                                            bg-slate-100
                                            text-slate-400
                                        "
                                    >

                                        <svg
                                            class="h-6 w-6"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="1.8"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15 19a4 4 0 0 0-8 0m8 0h4m-4 0H7m8-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                            />
                                        </svg>

                                    </div>

                                    <h3
                                        class="
                                            text-sm
                                            font-semibold
                                            text-slate-900
                                        "
                                    >
                                        No hay clientes
                                    </h3>

                                    <p
                                        class="
                                            mt-1
                                            text-sm
                                            text-slate-500
                                        "
                                    >
                                        Todavía no tienes clientes registrados.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    <?php else: ?>


                        <?php foreach ($clientes as $cliente): ?>

                            <?php

                            $id = (int) ($cliente['id_cliente'] ?? 0);

                            $nombre = trim(
                                ($cliente['nombres'] ?? '') .
                                ' ' .
                                ($cliente['apellidos'] ?? '')
                            );

                            $alias = trim(
                                $cliente['alias'] ?? ''
                            );

                            $iniciales = '';

                            if (!empty($cliente['nombres'])) {
                                $iniciales .= mb_substr(
                                    $cliente['nombres'],
                                    0,
                                    1
                                );
                            }

                            if (!empty($cliente['apellidos'])) {
                                $iniciales .= mb_substr(
                                    $cliente['apellidos'],
                                    0,
                                    1
                                );
                            }

                            $activo = (int) ($cliente['activo'] ?? 0);

                            $idsRutas = [];

                            foreach ($cliente['rutas'] ?? [] as $rutaCliente) {
                                $idsRutas[] = (int) ($rutaCliente['id_ruta'] ?? 0);
                            }

                            ?>

                            <tr
                                class="
                                    cliente-row
                                    transition
                                    hover:bg-slate-50
                                "
                                data-nombre="<?= htmlspecialchars(strtolower($nombre)) ?>"
                                data-alias="<?= htmlspecialchars(strtolower($alias)) ?>"
                                data-documento="<?= htmlspecialchars(strtolower($cliente['documento'] ?? '')) ?>"
                                data-direccion="<?= htmlspecialchars(strtolower($cliente['direccion'] ?? '')) ?>"
                                data-telefono="<?= htmlspecialchars(strtolower($cliente['telefono'] ?? '')) ?>"
                                data-telefono2="<?= htmlspecialchars(strtolower($cliente['telefono2'] ?? '')) ?>"
                                data-activo="<?= $activo ?>"
                                data-rutas="<?= htmlspecialchars(implode(',', $idsRutas)) ?>"
                            >

                                <!-- =================================================
                                     CLIENTE
                                ================================================== -->

                                <td class="px-5 py-4">

                                    <div class="flex items-center gap-3">

                                        <?php if (!empty($cliente['foto_cliente'])): ?>

                                            <img
                                                src="<?= BASE_URL ?>/uploads/clientes/<?= htmlspecialchars($cliente['foto_cliente']) ?>"
                                                alt="<?= htmlspecialchars($nombre) ?>"
                                                class="
                                                    h-11
                                                    w-11
                                                    shrink-0
                                                    rounded-full
                                                    object-cover
                                                "
                                            >

                                        <?php else: ?>

                                            <div
                                                class="
                                                    flex
                                                    h-11
                                                    w-11
                                                    shrink-0
                                                    items-center
                                                    justify-center
                                                    rounded-full
                                                    bg-indigo-100
                                                    text-sm
                                                    font-bold
                                                    text-indigo-700
                                                "
                                            >
                                                <?= htmlspecialchars(strtoupper($iniciales)) ?>
                                            </div>

                                        <?php endif; ?>


                                        <div class="min-w-0">

                                            <a
                                                href="<?= BASE_URL ?>/clientes/ver/<?= $id ?>"
                                                class="
                                                    block
                                                    truncate
                                                    text-sm
                                                    font-semibold
                                                    text-slate-900
                                                    hover:text-indigo-600
                                                "
                                            >
                                                <?= htmlspecialchars($nombre) ?>
                                            </a>

                                            <?php if ($alias !== ''): ?>

                                                <p
                                                    class="
                                                        mt-0.5
                                                        truncate
                                                        text-xs
                                                        font-medium
                                                        text-indigo-600
                                                    "
                                                >
                                                    <?= htmlspecialchars($alias) ?>
                                                </p>

                                            <?php else: ?>

                                                <p
                                                    class="
                                                        mt-0.5
                                                        text-xs
                                                        text-slate-400
                                                    "
                                                >
                                                    Sin alias
                                                </p>

                                            <?php endif; ?>

                                        </div>

                                    </div>

                                </td>


                                <!-- DOCUMENTO -->

                                <td class="px-4 py-4">

                                    <span class="text-sm text-slate-700">
                                        <?= htmlspecialchars($cliente['documento'] ?? '') ?>
                                    </span>

                                </td>


                                <!-- DIRECCIÓN -->

                                <td class="max-w-[240px] px-4 py-4">

                                    <?php if (!empty($cliente['direccion'])): ?>

                                        <span
                                            class="
                                                block
                                                truncate
                                                text-sm
                                                text-slate-700
                                            "
                                            title="<?= htmlspecialchars($cliente['direccion']) ?>"
                                        >
                                            <?= htmlspecialchars($cliente['direccion']) ?>
                                        </span>

                                    <?php else: ?>

                                        <span class="text-sm text-slate-400">
                                            Sin dirección
                                        </span>

                                    <?php endif; ?>

                                </td>


                                <!-- TELÉFONO -->

                                <td class="px-4 py-4">

                                    <?php if (!empty($cliente['telefono'])): ?>

                                        <a
                                            href="tel:<?= htmlspecialchars($cliente['telefono']) ?>"
                                            class="
                                                text-sm
                                                text-slate-700
                                                hover:text-indigo-600
                                            "
                                        >
                                            <?= htmlspecialchars($cliente['telefono']) ?>
                                        </a>

                                    <?php else: ?>

                                        <span class="text-sm text-slate-400">
                                            Sin teléfono
                                        </span>

                                    <?php endif; ?>

                                </td>


                                <!-- TELÉFONO 2 -->

                                <td class="px-4 py-4">

                                    <?php if (!empty($cliente['telefono2'])): ?>

                                        <a
                                            href="tel:<?= htmlspecialchars($cliente['telefono2']) ?>"
                                            class="
                                                text-sm
                                                text-slate-700
                                                hover:text-indigo-600
                                            "
                                        >
                                            <?= htmlspecialchars($cliente['telefono2']) ?>
                                        </a>

                                    <?php else: ?>

                                        <span class="text-sm text-slate-400">
                                            —
                                        </span>

                                    <?php endif; ?>

                                </td>


                                <!-- RUTAS -->

                                <td class="px-4 py-4">

                                    <?php if (!empty($cliente['rutas'])): ?>

                                        <div class="flex max-w-[250px] flex-wrap gap-1">

                                            <?php foreach ($cliente['rutas'] as $rutaCliente): ?>

                                                <span
                                                    class="
                                                        inline-flex
                                                        rounded-md
                                                        bg-slate-100
                                                        px-2
                                                        py-1
                                                        text-xs
                                                        font-medium
                                                        text-slate-700
                                                    "
                                                >
                                                    <?= htmlspecialchars($rutaCliente['nombre_ruta'] ?? '') ?>
                                                </span>

                                            <?php endforeach; ?>

                                        </div>

                                    <?php else: ?>

                                        <span class="text-sm text-slate-400">
                                            Sin ruta
                                        </span>

                                    <?php endif; ?>

                                </td>


                                <!-- ESTADO -->

                                <td class="px-4 py-4">

                                    <?php if ($activo): ?>

                                        <span
                                            class="
                                                inline-flex
                                                items-center
                                                gap-1.5
                                                rounded-full
                                                bg-emerald-50
                                                px-2.5
                                                py-1
                                                text-xs
                                                font-semibold
                                                text-emerald-700
                                            "
                                        >

                                            <span
                                                class="
                                                    h-1.5
                                                    w-1.5
                                                    rounded-full
                                                    bg-emerald-500
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
                                                rounded-full
                                                bg-slate-100
                                                px-2.5
                                                py-1
                                                text-xs
                                                font-semibold
                                                text-slate-500
                                            "
                                        >

                                            <span
                                                class="
                                                    h-1.5
                                                    w-1.5
                                                    rounded-full
                                                    bg-slate-400
                                                "
                                            ></span>

                                            Inactivo

                                        </span>

                                    <?php endif; ?>

                                </td>


                                <!-- =================================================
                                     ACCIONES
                                ================================================== -->

                                <td class="relative px-4 py-4 text-center">

                                    <button
                                        type="button"
                                        class="
                                            cliente-menu-button
                                            inline-flex
                                            h-9
                                            w-9
                                            items-center
                                            justify-center
                                            rounded-lg
                                            text-slate-500
                                            transition
                                            hover:bg-slate-100
                                            hover:text-slate-700
                                        "
                                        data-menu-id="menu-<?= $id ?>"
                                        title="Más opciones"
                                    >

                                        <svg
                                            class="h-5 w-5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >
                                            <circle
                                                cx="5"
                                                cy="12"
                                                r="1.3"
                                                fill="currentColor"
                                            />
                                            <circle
                                                cx="12"
                                                cy="12"
                                                r="1.3"
                                                fill="currentColor"
                                            />
                                            <circle
                                                cx="19"
                                                cy="12"
                                                r="1.3"
                                                fill="currentColor"
                                            />
                                        </svg>

                                    </button>


                                    <!-- MENÚ -->

                                    <div
                                        id="menu-<?= $id ?>"
                                        class="
                                            cliente-menu
                                            absolute
                                            right-4
                                            z-50
                                            hidden
                                            w-48
                                            rounded-lg
                                            border
                                            border-slate-200
                                            bg-white
                                            py-1
                                            text-left
                                            shadow-lg
                                        "
                                    >

                                        <!-- VER -->

                                        <a
                                            href="<?= BASE_URL ?>/clientes/ver/<?= $id ?>"
                                            class="
                                                flex
                                                items-center
                                                gap-3
                                                px-3
                                                py-2
                                                text-sm
                                                text-slate-700
                                                hover:bg-slate-50
                                            "
                                        >

                                            <svg
                                                class="h-4 w-4 text-slate-500"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.8"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M2.25 12s3.5-6.75 9.75-6.75S21.75 12 21.75 12 18.25 18.75 12 18.75 2.25 12 2.25 12Z"
                                                />
                                                <circle
                                                    cx="12"
                                                    cy="12"
                                                    r="2.5"
                                                />
                                            </svg>

                                            Ver cliente

                                        </a>


                                        <!-- EDITAR -->

                                        <a
                                            href="<?= BASE_URL ?>/clientes/editar/<?= $id ?>"
                                            class="
                                                flex
                                                items-center
                                                gap-3
                                                px-3
                                                py-2
                                                text-sm
                                                text-slate-700
                                                hover:bg-slate-50
                                            "
                                        >

                                            <svg
                                                class="h-4 w-4 text-slate-500"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.8"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="m16.862 4.487 2.651 2.651M4 20l4.35-.483L19.513 8.35a1.875 1.875 0 0 0-2.652-2.652L5.698 16.862 4 20Z"
                                                />
                                            </svg>

                                            Editar

                                        </a>


                                        <div class="my-1 border-t border-slate-100"></div>


                                        <!-- INACTIVAR / ACTIVAR -->

                                        <?php if ($activo): ?>

                                            <button
                                                type="button"
                                                class="
                                                    flex
                                                    w-full
                                                    items-center
                                                    gap-3
                                                    px-3
                                                    py-2
                                                    text-left
                                                    text-sm
                                                    text-amber-700
                                                    hover:bg-amber-50
                                                "
                                                data-action="inactivar"
                                                data-id="<?= $id ?>"
                                            >

                                                <svg
                                                    class="h-4 w-4"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    stroke-width="1.8"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M6 6v12m12-12v12"
                                                    />
                                                </svg>

                                                Inactivar

                                            </button>

                                        <?php else: ?>

                                            <button
                                                type="button"
                                                class="
                                                    flex
                                                    w-full
                                                    items-center
                                                    gap-3
                                                    px-3
                                                    py-2
                                                    text-left
                                                    text-sm
                                                    text-emerald-700
                                                    hover:bg-emerald-50
                                                "
                                                data-action="activar"
                                                data-id="<?= $id ?>"
                                            >

                                                <svg
                                                    class="h-4 w-4"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    stroke-width="1.8"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M8 5v14l11-7L8 5Z"
                                                    />
                                                </svg>

                                                Activar

                                            </button>

                                        <?php endif; ?>


                                        <!-- ELIMINAR -->

                                        <button
                                            type="button"
                                            class="
                                                flex
                                                w-full
                                                items-center
                                                gap-3
                                                px-3
                                                py-2
                                                text-left
                                                text-sm
                                                text-red-600
                                                hover:bg-red-50
                                            "
                                            data-action="eliminar"
                                            data-id="<?= $id ?>"
                                        >

                                            <svg
                                                class="h-4 w-4"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.8"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M6 7h12m-9 0V4h6v3m-7 0 1 13h6l1-13M10 11v6m4-6v6"
                                                />
                                            </svg>

                                            Eliminar

                                        </button>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>


        <!-- =================================================
             MOBILE
        ================================================== -->

        <div
            id="clientesMobile"
            class="
                divide-y
                divide-slate-100
                md:hidden
            "
        >

            <?php if (empty($clientes)): ?>

                <div class="px-6 py-12 text-center">

                    <p class="text-sm font-semibold text-slate-900">
                        No hay clientes
                    </p>

                    <p class="mt-1 text-sm text-slate-500">
                        Todavía no tienes clientes registrados.
                    </p>

                </div>

            <?php else: ?>

                <?php foreach ($clientes as $cliente): ?>

                    <?php

                    $id = (int) ($cliente['id_cliente'] ?? 0);

                    $nombre = trim(
                        ($cliente['nombres'] ?? '') .
                        ' ' .
                        ($cliente['apellidos'] ?? '')
                    );

                    $alias = trim(
                        $cliente['alias'] ?? ''
                    );

                    $iniciales = '';

                    if (!empty($cliente['nombres'])) {
                        $iniciales .= mb_substr(
                            $cliente['nombres'],
                            0,
                            1
                        );
                    }

                    if (!empty($cliente['apellidos'])) {
                        $iniciales .= mb_substr(
                            $cliente['apellidos'],
                            0,
                            1
                        );
                    }

                    $activo = (int) ($cliente['activo'] ?? 0);

                    ?>

                    <div class="cliente-mobile p-4">

                        <div class="flex items-start gap-3">

                            <?php if (!empty($cliente['foto_cliente'])): ?>

                                <img
                                    src="<?= BASE_URL ?>/uploads/clientes/<?= htmlspecialchars($cliente['foto_cliente']) ?>"
                                    alt="<?= htmlspecialchars($nombre) ?>"
                                    class="
                                        h-12
                                        w-12
                                        shrink-0
                                        rounded-full
                                        object-cover
                                    "
                                >

                            <?php else: ?>

                                <div
                                    class="
                                        flex
                                        h-12
                                        w-12
                                        shrink-0
                                        items-center
                                        justify-center
                                        rounded-full
                                        bg-indigo-100
                                        text-sm
                                        font-bold
                                        text-indigo-700
                                    "
                                >
                                    <?= htmlspecialchars(strtoupper($iniciales)) ?>
                                </div>

                            <?php endif; ?>


                            <div class="min-w-0 flex-1">

                                <div class="flex items-start justify-between gap-3">

                                    <div class="min-w-0">

                                        <a
                                            href="<?= BASE_URL ?>/clientes/ver/<?= $id ?>"
                                            class="
                                                block
                                                truncate
                                                text-sm
                                                font-semibold
                                                text-slate-900
                                            "
                                        >
                                            <?= htmlspecialchars($nombre) ?>
                                        </a>

                                        <?php if ($alias !== ''): ?>

                                            <p class="mt-0.5 text-xs font-medium text-indigo-600">
                                                <?= htmlspecialchars($alias) ?>
                                            </p>

                                        <?php endif; ?>

                                        <p class="mt-0.5 text-xs text-slate-500">
                                            <?= htmlspecialchars($cliente['documento'] ?? '') ?>
                                        </p>

                                    </div>


                                    <!-- MENÚ MOBILE -->

                                    <div class="relative shrink-0">

                                        <button
                                            type="button"
                                            class="
                                                cliente-menu-button
                                                flex
                                                h-9
                                                w-9
                                                items-center
                                                justify-center
                                                rounded-lg
                                                text-slate-500
                                                hover:bg-slate-100
                                            "
                                            data-menu-id="mobile-menu-<?= $id ?>"
                                        >

                                            <svg
                                                class="h-5 w-5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2"
                                            >
                                                <circle
                                                    cx="5"
                                                    cy="12"
                                                    r="1.3"
                                                    fill="currentColor"
                                                />
                                                <circle
                                                    cx="12"
                                                    cy="12"
                                                    r="1.3"
                                                    fill="currentColor"
                                                />
                                                <circle
                                                    cx="19"
                                                    cy="12"
                                                    r="1.3"
                                                    fill="currentColor"
                                                />
                                            </svg>

                                        </button>


                                        <div
                                            id="mobile-menu-<?= $id ?>"
                                            class="
                                                cliente-menu
                                                absolute
                                                right-0
                                                z-50
                                                hidden
                                                w-44
                                                rounded-lg
                                                border
                                                border-slate-200
                                                bg-white
                                                py-1
                                                shadow-lg
                                            "
                                        >

                                            <a
                                                href="<?= BASE_URL ?>/clientes/ver/<?= $id ?>"
                                                class="
                                                    flex
                                                    items-center
                                                    gap-3
                                                    px-3
                                                    py-2
                                                    text-sm
                                                    text-slate-700
                                                    hover:bg-slate-50
                                                "
                                            >
                                                Ver cliente
                                            </a>

                                            <a
                                                href="<?= BASE_URL ?>/clientes/editar/<?= $id ?>"
                                                class="
                                                    flex
                                                    items-center
                                                    gap-3
                                                    px-3
                                                    py-2
                                                    text-sm
                                                    text-slate-700
                                                    hover:bg-slate-50
                                                "
                                            >
                                                Editar
                                            </a>

                                            <div class="my-1 border-t border-slate-100"></div>

                                            <?php if ($activo): ?>

                                                <button
                                                    type="button"
                                                    class="
                                                        flex
                                                        w-full
                                                        px-3
                                                        py-2
                                                        text-left
                                                        text-sm
                                                        text-amber-700
                                                        hover:bg-amber-50
                                                    "
                                                    data-action="inactivar"
                                                    data-id="<?= $id ?>"
                                                >
                                                    Inactivar
                                                </button>

                                            <?php else: ?>

                                                <button
                                                    type="button"
                                                    class="
                                                        flex
                                                        w-full
                                                        px-3
                                                        py-2
                                                        text-left
                                                        text-sm
                                                        text-emerald-700
                                                        hover:bg-emerald-50
                                                    "
                                                    data-action="activar"
                                                    data-id="<?= $id ?>"
                                                >
                                                    Activar
                                                </button>

                                            <?php endif; ?>

                                            <button
                                                type="button"
                                                class="
                                                    flex
                                                    w-full
                                                    px-3
                                                    py-2
                                                    text-left
                                                    text-sm
                                                    text-red-600
                                                    hover:bg-red-50
                                                "
                                                data-action="eliminar"
                                                data-id="<?= $id ?>"
                                            >
                                                Eliminar
                                            </button>

                                        </div>

                                    </div>

                                </div>


                                <!-- INFORMACIÓN -->

                                <div class="mt-4 space-y-2">

                                    <div>

                                        <p class="text-[11px] font-medium uppercase tracking-wide text-slate-400">
                                            Dirección
                                        </p>

                                        <p class="mt-0.5 text-sm text-slate-700">
                                            <?= htmlspecialchars($cliente['direccion'] ?? 'Sin dirección') ?>
                                        </p>

                                    </div>


                                    <div class="grid grid-cols-2 gap-3">

                                        <div>

                                            <p class="text-[11px] font-medium uppercase tracking-wide text-slate-400">
                                                Teléfono
                                            </p>

                                            <p class="mt-0.5 text-sm text-slate-700">
                                                <?= htmlspecialchars($cliente['telefono'] ?? 'Sin teléfono') ?>
                                            </p>

                                        </div>


                                        <div>

                                            <p class="text-[11px] font-medium uppercase tracking-wide text-slate-400">
                                                Teléfono 2
                                            </p>

                                            <p class="mt-0.5 text-sm text-slate-700">
                                                <?= htmlspecialchars($cliente['telefono2'] ?? '—') ?>
                                            </p>

                                        </div>

                                    </div>


                                    <div>

                                        <p class="text-[11px] font-medium uppercase tracking-wide text-slate-400">
                                            Rutas
                                        </p>

                                        <?php if (!empty($cliente['rutas'])): ?>

                                            <div class="mt-1 flex flex-wrap gap-1">

                                                <?php foreach ($cliente['rutas'] as $rutaCliente): ?>

                                                    <span
                                                        class="
                                                            rounded-md
                                                            bg-slate-100
                                                            px-2
                                                            py-1
                                                            text-xs
                                                            font-medium
                                                            text-slate-700
                                                        "
                                                    >
                                                        <?= htmlspecialchars($rutaCliente['nombre_ruta'] ?? '') ?>
                                                    </span>

                                                <?php endforeach; ?>

                                            </div>

                                        <?php else: ?>

                                            <p class="mt-0.5 text-sm text-slate-400">
                                                Sin ruta
                                            </p>

                                        <?php endif; ?>

                                    </div>


                                    <div class="pt-1">

                                        <?php if ($activo): ?>

                                            <span
                                                class="
                                                    inline-flex
                                                    items-center
                                                    gap-1.5
                                                    rounded-full
                                                    bg-emerald-50
                                                    px-2.5
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
                                                    items-center
                                                    gap-1.5
                                                    rounded-full
                                                    bg-slate-100
                                                    px-2.5
                                                    py-1
                                                    text-xs
                                                    font-semibold
                                                    text-slate-500
                                                "
                                            >

                                                <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>

                                                Inactivo

                                            </span>

                                        <?php endif; ?>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

    </div>

</main>
```

</div>

<!-- =====================================================
     JAVASCRIPT
====================================================== -->

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const buscador =
            document.getElementById('buscarCliente');

        const filtroEstado =
            document.getElementById('filtroEstado');

        const filtroRuta =
            document.getElementById('filtroRuta');

        const filas =
            document.querySelectorAll('.cliente-row');

        const contador =
            document.getElementById('contadorClientes');


        /* =================================================
           FILTRAR CLIENTES
        ================================================== */

        function filtrarClientes() {

            const texto =
                buscador.value
                    .toLowerCase()
                    .trim();

            const estado =
                filtroEstado.value;

            const ruta =
                filtroRuta.value;

            let visibles = 0;


            filas.forEach(
                function (fila) {

                    const nombre =
                        fila.dataset.nombre || '';

                    const alias =
                        fila.dataset.alias || '';

                    const documento =
                        fila.dataset.documento || '';

                    const direccion =
                        fila.dataset.direccion || '';

                    const telefono =
                        fila.dataset.telefono || '';

                    const telefono2 =
                        fila.dataset.telefono2 || '';

                    const activo =
                        fila.dataset.activo || '';

                    const rutas =
                        fila.dataset.rutas
                            ? fila.dataset.rutas.split(',')
                            : [];


                    const coincideTexto =
                        !texto ||
                        nombre.includes(texto) ||
                        alias.includes(texto) ||
                        documento.includes(texto) ||
                        direccion.includes(texto) ||
                        telefono.includes(texto) ||
                        telefono2.includes(texto);


                    const coincideEstado =
                        !estado ||
                        activo === estado;


                    const coincideRuta =
                        !ruta ||
                        rutas.includes(ruta);


                    const mostrar =
                        coincideTexto &&
                        coincideEstado &&
                        coincideRuta;


                    fila.classList.toggle(
                        'hidden',
                        !mostrar
                    );


                    if (mostrar) {
                        visibles++;
                    }

                }
            );


            contador.textContent = visibles;

        }


        buscador.addEventListener(
            'input',
            filtrarClientes
        );


        filtroEstado.addEventListener(
            'change',
            filtrarClientes
        );


        filtroRuta.addEventListener(
            'change',
            filtrarClientes
        );


        /* =================================================
           MENÚ TRES PUNTOS
        ================================================== */

        const botonesMenu =
            document.querySelectorAll('.cliente-menu-button');


        botonesMenu.forEach(
            function (boton) {

                boton.addEventListener(
                    'click',
                    function (evento) {

                        evento.stopPropagation();

                        const menuId =
                            boton.dataset.menuId;

                        const menu =
                            document.getElementById(menuId);


                        document
                            .querySelectorAll('.cliente-menu')
                            .forEach(
                                function (otroMenu) {

                                    if (otroMenu !== menu) {
                                        otroMenu.classList.add('hidden');
                                    }

                                }
                            );


                        menu.classList.toggle('hidden');

                    }
                );

            }
        );


        /* =================================================
           CERRAR MENÚ AL HACER CLICK FUERA
        ================================================== */

        document.addEventListener(
            'click',
            function () {

                document
                    .querySelectorAll('.cliente-menu')
                    .forEach(
                        function (menu) {
                            menu.classList.add('hidden');
                        }
                    );

            }
        );


        /* =================================================
           ACCIONES
        ================================================== */

        document
            .querySelectorAll('[data-action]')
            .forEach(
                function (boton) {

                    boton.addEventListener(
                        'click',
                        function () {

                            const accion =
                                boton.dataset.action;

                            const id =
                                boton.dataset.id;


                            if (accion === 'inactivar') {

                                if (
                                    confirm(
                                        '¿Deseas inactivar este cliente?'
                                    )
                                ) {

                                    window.location.href =
                                        '<?= BASE_URL ?>/clientes/inactivar/' + id;

                                }

                            }


                            if (accion === 'activar') {

                                if (
                                    confirm(
                                        '¿Deseas activar este cliente?'
                                    )
                                ) {

                                    window.location.href =
                                        '<?= BASE_URL ?>/clientes/activar/' + id;

                                }

                            }


                            if (accion === 'eliminar') {

                                if (
                                    confirm(
                                        '¿Estás seguro de eliminar este cliente? Esta acción no se puede deshacer.'
                                    )
                                ) {

                                    window.location.href =
                                        '<?= BASE_URL ?>/clientes/eliminar/' + id;

                                }

                            }

                        }
                    );

                }
            );

    }
);

</script>
