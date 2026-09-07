<?php

/*
|--------------------------------------------------------------------------
| NOVA - SIDEBAR
|--------------------------------------------------------------------------
*/

$currentPage = $currentPage ?? 'dashboard';

?>

<aside id="novaSidebar" class="
        fixed
        inset-y-0
        left-0
        z-50
        flex
        w-72
        flex-col
        border-r
        border-white/10
        bg-[#050A12]
        shadow-2xl
        shadow-black/30
        transition-all
        duration-300
        ease-in-out

        -translate-x-full
        lg:translate-x-0

        lg:w-72
    ">

    <!-- =====================================================
         HEADER SIDEBAR
    ====================================================== -->

    <div class="
            flex
            h-24
            shrink-0
            items-center
            justify-between
            px-5
        ">

        <!-- LOGO -->

        <a href="<?= BASE_URL ?>/dashboard" class="
                flex
                min-w-0
                items-center
                gap-3
            ">

            <img src="<?= ASSETS_URL ?>/img/logo.png" alt="<?= APP_NAME ?>" class="
                    h-10
                    w-10
                    shrink-0
                    object-contain
                ">

            <div class="
                    sidebar-brand
                    min-w-0
                    overflow-hidden
                    transition-all
                    duration-300
                ">

                <div class="
                        text-2xl
                        font-semibold
                        leading-none
                        tracking-tight
                        text-white
                    ">
                    <?= APP_NAME ?>
                </div>

                <div class="
                        mt-1
                        whitespace-nowrap
                        text-[11px]
                        font-medium
                        uppercase
                        tracking-wide
                        text-slate-400
                    ">
                    <?= APP_DESCRIPTION ?>
                </div>

            </div>

        </a>


        <!-- BOTÓN COLAPSAR -->

        <button type="button" id="sidebarCollapse" class="
                hidden
                h-9
                w-9
                shrink-0
                items-center
                justify-center
                rounded-full
                bg-slate-800/60
                text-slate-400
                transition
                hover:bg-slate-700/70
                hover:text-white
                lg:flex
            " aria-label="Colapsar menú">

            <i class="
                    fa-solid
                    fa-angles-left
                    text-sm
                "></i>

        </button>

    </div>


    <!-- =====================================================
         NAVEGACIÓN
    ====================================================== -->

    <nav class="
            flex-1
            overflow-y-auto
            overflow-x-hidden
            px-3
            pb-4
        ">

        <!-- =================================================
             GENERAL
        ================================================== -->

        <p class="
                sidebar-label
                mb-3
                px-3
                text-[11px]
                font-medium
                uppercase
                tracking-wide
                text-slate-400
            ">
            General
        </p>


        <!-- DASHBOARD -->

        <a href="<?= BASE_URL ?>/dashboard" class="
                group
                mb-2
                flex
                h-11
                items-center
                gap-3
                rounded-xl
                border
                px-3
                transition
                duration-200

                <?= $currentPage === 'dashboard'
                    ? 'border-blue-500/30 bg-gradient-to-r from-blue-600/20 to-violet-600/10 shadow-lg shadow-blue-600/5'
                    : 'border-transparent hover:border-white/5 hover:bg-white/5'
                    ?>
            ">

            <span class="
                    flex
                    h-10
                    w-10
                    shrink-0
                    items-center
                    justify-center
                    rounded-lg
                    <?= $currentPage === 'dashboard'
                        ? 'text-blue-400'
                        : 'text-slate-400 group-hover:text-blue-400'
                        ?>
                ">

                <i class="
                        fa-solid
                        fa-border-all
                        text-xl
                    "></i>

            </span>


            <span class="
                    sidebar-text
                    whitespace-nowrap
                    text-sm
                    font-medium
                    text-white
                    transition-all
                    duration-300
                ">
                Dashboard
            </span>

        </a>


        <!-- =================================================
             GESTIÓN
        ================================================== -->

        <p class="
                sidebar-label
                mb-3
                px-3
                text-[11px]
                font-medium
                uppercase
                tracking-wide
                text-slate-400
            ">
            Gestión
        </p>


        <!-- CLIENTES -->

        <a href="<?= BASE_URL ?>/clientes" class="
                group
                mb-2
                flex
                h-11
                items-center
                gap-3
                rounded-xl
                px-3
                transition
                hover:bg-white/5
            ">

            <span class="
                    flex
                    h-10
                    w-10
                    shrink-0
                    items-center
                    justify-center
                    rounded-lg
                    bg-cyan-500/10
                    text-cyan-400
                    transition
                    group-hover:bg-cyan-500/20
                ">

                <i class="
                        fa-regular
                        fa-user
                        text-lg
                    "></i>

            </span>


            <span class="
                    sidebar-text
                    flex-1
                    whitespace-nowrap
                    text-sm
                    font-medium
                    text-white
                ">
                Clientes
            </span>


            <i class="
                    sidebar-text
                    fa-solid
                    fa-chevron-right
                    text-xs
                    text-slate-500
                "></i>

        </a>


        <!-- CRÉDITOS -->

        <a href="<?= BASE_URL ?>/creditos" class="
                group
                mb-2
                flex
                h-11
                items-center
                gap-3
                rounded-xl
                px-3
                transition
                hover:bg-white/5
            ">

            <span class="
                    flex
                    h-10
                    w-10
                    shrink-0
                    items-center
                    justify-center
                    rounded-lg
                    bg-violet-500/10
                    text-violet-400
                    transition
                    group-hover:bg-violet-500/20
                ">

                <i class="
                        fa-regular
                        fa-credit-card
                        text-lg
                    "></i>

            </span>


            <span class="
                    sidebar-text
                    flex-1
                    whitespace-nowrap
                    text-sm
                    font-medium
                    text-white
                ">
                Créditos
            </span>


            <i class="
                    sidebar-text
                    fa-solid
                    fa-chevron-right
                    text-xs
                    text-slate-500
                "></i>

        </a>


        <!-- PAGOS -->

        <a href="<?= BASE_URL ?>/cobros" class="
                group
                mb-2
                flex
                h-11
                items-center
                gap-3
                rounded-xl
                px-3
                transition
                hover:bg-white/5
            ">

            <span class="
                    flex
                    h-10
                    w-10
                    shrink-0
                    items-center
                    justify-center
                    rounded-lg
                    bg-emerald-500/10
                    text-emerald-400
                    transition
                    group-hover:bg-emerald-500/20
                ">

                <i class="
                        fa-solid
                        fa-dollar-sign
                        text-lg
                    "></i>

            </span>


            <span class="
                    sidebar-text
                    flex-1
                    whitespace-nowrap
                    text-sm
                    font-medium
                    text-white
                ">
                Cobros
            </span>


            <i class="
                    sidebar-text
                    fa-solid
                    fa-chevron-right
                    text-xs
                    text-slate-500
                "></i>

        </a>



        <!-- =================================================
             OPERACIÓN
        ================================================== -->

        <p class="
                sidebar-label
                mb-3
                px-3
                text-[11px]
                font-medium
                uppercase
                tracking-wide
                text-slate-400
            ">
            Operación
        </p>


        <!-- CAJA -->

        <a href="<?= BASE_URL ?>/caja" class="
                group
                mb-2
                flex
                h-11
                items-center
                gap-3
                rounded-xl
                px-3
                transition
                hover:bg-white/5
            ">

            <span class="
                    flex
                    h-10
                    w-10
                    shrink-0
                    items-center
                    justify-center
                    rounded-lg
                    bg-blue-500/10
                    text-blue-400
                    transition
                    group-hover:bg-blue-500/20
                ">

                <i class="
                        fa-solid
                        fa-cash-register
                        text-lg
                    "></i>

            </span>


            <span class="
                    sidebar-text
                    flex-1
                    whitespace-nowrap
                    text-sm
                    font-medium
                    text-white
                ">
                Caja
            </span>


            <i class="
                    sidebar-text
                    fa-solid
                    fa-chevron-right
                    text-xs
                    text-slate-500
                "></i>

        </a>


        <!-- GASTOS -->

        <a href="<?= BASE_URL ?>/gastos" class="
                group
                mb-2   
                flex
                h-11
                items-center
                gap-3
                rounded-xl
                px-3
                transition
                hover:bg-white/5
            ">

            <span class="
                    flex
                    h-10
                    w-10
                    shrink-0
                    items-center
                    justify-center
                    rounded-lg
                    bg-amber-500/10
                    text-amber-400
                    transition
                    group-hover:bg-amber-500/20
                ">

                <i class="
                        fa-solid
                        fa-wallet
                        text-lg
                    "></i>

            </span>


            <span class="
                    sidebar-text
                    flex-1
                    whitespace-nowrap
                    text-sm
                    font-medium
                    text-white
                ">
                Gastos
            </span>


            <i class="
                    sidebar-text
                    fa-solid
                    fa-chevron-right
                    text-xs
                    text-slate-500
                "></i>

        </a>


        <!-- =================================================
             ANÁLISIS
        ================================================== -->

        <p class="
                sidebar-label
                mb-3
                px-3
                text-[11px]
                font-medium
                uppercase
                tracking-wide
                text-slate-400
            ">
            Análisis
        </p>


        <!-- REPORTES -->

        <a href="<?= BASE_URL ?>/reportes" class="
                group
                mb-2   
                flex
                h-11
                items-center
                gap-3
                rounded-xl
                px-3
                transition
                hover:bg-white/5
            ">

            <span class="
                    flex
                    h-10
                    w-10
                    shrink-0
                    items-center
                    justify-center
                    rounded-lg
                    bg-cyan-500/10
                    text-cyan-400
                    transition
                    group-hover:bg-cyan-500/20
                ">

                <i class="
                        fa-solid
                        fa-chart-column
                        text-lg
                    "></i>

            </span>


            <span class="
                    sidebar-text
                    flex-1
                    whitespace-nowrap
                    text-sm
                    font-medium
                    text-white
                ">
                Reportes
            </span>


            <i class="
                    sidebar-text
                    fa-solid
                    fa-chevron-right
                    text-xs
                    text-slate-500
                "></i>

        </a>


        <!-- =================================================
             SISTEMA
        ================================================== -->

        <p class="
                sidebar-label
                mb-3
                px-3
                text-[11px]
                font-medium
                uppercase
                tracking-wide
                text-slate-400
            ">
            Sistema
        </p>


        <!-- ADMINISTRACIÓN -->
        <div class="mb-2">

            <!-- Botón principal -->
            <button type="button" id="administracionToggle" class="
            group
            flex
            h-11
            w-full
            items-center
            gap-3
            rounded-xl
            px-3
            text-left
            transition
            hover:bg-white/5
        ">

                <!-- Icono -->
                <span class="
                flex
                h-10
                w-10
                shrink-0
                items-center
                justify-center
                rounded-lg
                bg-violet-500/10
                text-violet-400
                transition
                group-hover:bg-violet-500/20
            ">
                    <i class="fa-solid fa-user-gear text-lg"></i>
                </span>

                <!-- Texto -->
                <span class="
                sidebar-text
                flex-1
                whitespace-nowrap
                text-sm
                font-medium
                text-white
            ">
                    Administración
                </span>

                <!-- Flecha -->
                <i id="administracionArrow" class="
                sidebar-text
                fa-solid
                fa-chevron-right
                text-xs
                text-slate-500
                transition-transform
                duration-200
            "></i>

            </button>


            <!-- SUBMENÚ -->
            <div id="administracionMenu" class="
            hidden
            mt-1
            ml-3
            space-y-1
            border-l
            border-white/10
            pl-3
        ">

                <!-- USUARIO -->
                <a href="<?= BASE_URL ?>/usuarios" class="
                flex
                h-10
                items-center
                gap-3
                rounded-lg
                px-3
                text-sm
                text-slate-300
                transition
                hover:bg-white/5
                hover:text-white
            ">
                    <span class="w-5 text-center text-violet-400">
                        <i class="fa-solid fa-user"></i>
                    </span>

                    <span class="sidebar-text">
                        Usuario
                    </span>
                </a>


                <!-- RUTA -->
                <a href="<?= BASE_URL ?>/rutas" class="
                flex
                h-10
                items-center
                gap-3
                rounded-lg
                px-3
                text-sm
                text-slate-300
                transition
                hover:bg-white/5
                hover:text-white
            ">
                    <span class="w-5 text-center text-blue-400">
                        <i class="fa-solid fa-route"></i>
                    </span>

                    <span class="sidebar-text">
                        Ruta
                    </span>
                </a>


                <!-- WHATSAPP -->
                <a href="<?= BASE_URL ?>/whatsapp" class="
                flex
                h-10
                items-center
                gap-3
                rounded-lg
                px-3
                text-sm
                text-slate-300
                transition
                hover:bg-white/5
                hover:text-white
            ">
                    <span class="w-5 text-center text-green-400">
                        <i class="fa-brands fa-whatsapp"></i>
                    </span>

                    <span class="sidebar-text">
                        WhatsApp
                    </span>
                </a>

            </div>

        </div>



    </nav>



    <!-- =====================================================
     PERFIL
====================================================== -->

    <div class="
        relative
        shrink-0
        border-t
        border-white/10
        px-4
        py-5
    ">

        <!-- PERFIL HEADER -->

        <div class="
            flex
            items-center
            gap-3
        ">

            <!-- AVATAR -->

            <div class="
                relative
                flex
                h-12
                w-12
                shrink-0
                items-center
                justify-center
                rounded-full
                border
                border-violet-500/60
                bg-slate-800
                text-lg
                font-semibold
                text-white
                shadow-lg
                shadow-violet-500/10
            ">

                AD

                <span class="
                    absolute
                    bottom-0
                    right-0
                    h-3
                    w-3
                    rounded-full
                    border-2
                    border-[#050A12]
                    bg-emerald-500
                "></span>

            </div>


            <!-- INFORMACIÓN -->

            <div class="
                sidebar-profile
                min-w-0
                flex-1
                overflow-hidden
            ">

                <p class="
                    whitespace-nowrap
                    text-sm
                    font-medium
                    text-white
                ">
                    Administrador
                </p>

                <p class="
                    mt-1
                    truncate
                    text-xs
                    text-slate-400
                ">
                    admin@nova.com
                </p>

            </div>


            <!-- BOTÓN DROPDOWN -->

            <button id="profileMenuButton" type="button" class="
                sidebar-profile
                flex
                h-8
                w-8
                shrink-0
                items-center
                justify-center
                rounded-md
                text-slate-400
                transition
                duration-200
                hover:bg-white/5
                hover:text-white
            " aria-label="Opciones de usuario" aria-expanded="false">

                <i id="profileMenuIcon" class="
                    fa-solid
                    fa-chevron-down
                    text-xs
                    transition-transform
                    duration-200
                "></i>

            </button>

        </div>


        <!-- =================================================
         DROPDOWN
    ================================================== -->

        <div id="profileMenu" class="
            absolute
            bottom-[calc(100%+8px)]
            left-4
            right-4
            z-50
            hidden
            overflow-hidden
            rounded-xl
            border
            border-white/10
            bg-[#0B1220]
            shadow-2xl
            shadow-black/40
        ">

            <!-- HEADER -->

            <div class="
                border-b
                border-white/10
                px-4
                py-3
            ">

                <p class="
                    text-sm
                    font-medium
                    text-white
                ">
                    Administrador
                </p>

                <p class="
                    mt-0.5
                    text-xs
                    text-slate-500
                ">
                    admin@nova.com
                </p>

            </div>


            <!-- OPCIONES -->

            <div class="p-2">

                <!-- PERFIL -->

                <a href="<?= BASE_URL ?>/perfil" class="
                    flex
                    items-center
                    gap-3
                    rounded-lg
                    px-3
                    py-2.5
                    text-sm
                    text-slate-300
                    transition
                    hover:bg-white/5
                    hover:text-white
                ">

                    <span class="
                        flex
                        h-8
                        w-8
                        items-center
                        justify-center
                        rounded-lg
                        bg-violet-500/10
                        text-violet-400
                    ">

                        <i class="fa-solid fa-user text-xs"></i>

                    </span>

                    <span>
                        Mi perfil
                    </span>

                </a>


                <!-- CONFIGURACIÓN -->

                <a href="<?= BASE_URL ?>/configuracion" class="
                    flex
                    items-center
                    gap-3
                    rounded-lg
                    px-3
                    py-2.5
                    text-sm
                    text-slate-300
                    transition
                    hover:bg-white/5
                    hover:text-white
                ">

                    <span class="
                        flex
                        h-8
                        w-8
                        items-center
                        justify-center
                        rounded-lg
                        bg-slate-500/10
                        text-slate-400
                    ">

                        <i class="fa-solid fa-gear text-xs"></i>

                    </span>

                    <span>
                        Configuración
                    </span>

                </a>


                <!-- SEPARADOR -->

                <div class="
                    my-2
                    border-t
                    border-white/10
                "></div>


                <!-- CERRAR SESIÓN -->

                <a href="<?= BASE_URL ?>/logout" class="
                    flex
                    items-center
                    gap-3
                    rounded-lg
                    px-3
                    py-2.5
                    text-sm
                    text-red-400
                    transition
                    hover:bg-red-500/10
                    hover:text-red-300
                ">

                    <span class="
                        flex
                        h-8
                        w-8
                        items-center
                        justify-center
                        rounded-lg
                        bg-red-500/10
                    ">

                        <i class="fa-solid fa-right-from-bracket text-xs"></i>

                    </span>

                    <span>
                        Cerrar sesión
                    </span>

                </a>

            </div>

        </div>

    </div>



</aside>


<!-- =====================================================
     OVERLAY MÓVIL
====================================================== -->

<div id="sidebarOverlay" class="
        fixed
        inset-0
        z-40
        hidden
        bg-black/60
        backdrop-blur-sm
        lg:hidden
    "></div>


<!-- =====================================================
     JAVASCRIPT SIDEBAR
====================================================== -->

<script>

    document.addEventListener(
        'DOMContentLoaded',
        function () {

            /*
            |--------------------------------------------------------------------------
            | ELEMENTOS
            |--------------------------------------------------------------------------
            */

            const sidebar =
                document.getElementById('novaSidebar');

            const collapseButton =
                document.getElementById('sidebarCollapse');

            const overlay =
                document.getElementById('sidebarOverlay');

            const main =
                document.getElementById('novaMain');


            /*
            |--------------------------------------------------------------------------
            | COLAPSAR SIDEBAR PC / TABLET
            |--------------------------------------------------------------------------
            */

            if (collapseButton && sidebar) {

                collapseButton.addEventListener(
                    'click',
                    function () {

                        /*
                        |--------------------------------------------------------------------------
                        | SIDEBAR
                        |--------------------------------------------------------------------------
                        */

                        sidebar.classList.toggle('lg:w-72');
                        sidebar.classList.toggle('lg:w-20');


                        /*
                        |--------------------------------------------------------------------------
                        | CONTENIDO PRINCIPAL
                        |--------------------------------------------------------------------------
                        |
                        | Sidebar abierto:
                        |   288px = ml-72
                        |
                        | Sidebar colapsado:
                        |   80px = ml-20
                        |
                        */

                        if (main) {

                            main.classList.toggle('lg:ml-72');
                            main.classList.toggle('lg:ml-20');

                        }


                        /*
                        |--------------------------------------------------------------------------
                        | TEXTOS DEL SIDEBAR
                        |--------------------------------------------------------------------------
                        */

                        document
                            .querySelectorAll('.sidebar-text')
                            .forEach(function (element) {

                                element.classList.toggle(
                                    'lg:hidden'
                                );

                            });


                        /*
                        |--------------------------------------------------------------------------
                        | TÍTULOS DE SECCIÓN
                        |--------------------------------------------------------------------------
                        */

                        document
                            .querySelectorAll('.sidebar-label')
                            .forEach(function (element) {

                                element.classList.toggle(
                                    'lg:hidden'
                                );

                            });


                        /*
                        |--------------------------------------------------------------------------
                        | LOGO / MARCA NOVA
                        |--------------------------------------------------------------------------
                        */

                        document
                            .querySelectorAll('.sidebar-brand')
                            .forEach(function (element) {

                                element.classList.toggle(
                                    'lg:hidden'
                                );

                            });


                        /*
                        |--------------------------------------------------------------------------
                        | INFORMACIÓN DEL PERFIL
                        |--------------------------------------------------------------------------
                        */

                        document
                            .querySelectorAll('.sidebar-profile')
                            .forEach(function (element) {

                                element.classList.toggle(
                                    'lg:hidden'
                                );

                            });


                        /*
                        |--------------------------------------------------------------------------
                        | ICONO DEL BOTÓN
                        |--------------------------------------------------------------------------
                        */

                        const icon =
                            collapseButton.querySelector('i');

                        if (icon) {

                            icon.classList.toggle(
                                'fa-angles-left'
                            );

                            icon.classList.toggle(
                                'fa-angles-right'
                            );

                        }

                    }
                );

            }


            /*
            |--------------------------------------------------------------------------
            | CERRAR SIDEBAR MÓVIL
            |--------------------------------------------------------------------------
            */

            if (overlay && sidebar) {

                overlay.addEventListener(
                    'click',
                    function () {

                        sidebar.classList.add(
                            '-translate-x-full'
                        );

                        overlay.classList.add(
                            'hidden'
                        );

                    }
                );

            }

        }
    );

    document.addEventListener('DOMContentLoaded', function () {

        const toggle = document.getElementById('administracionToggle');
        const menu = document.getElementById('administracionMenu');
        const arrow = document.getElementById('administracionArrow');

        if (!toggle || !menu || !arrow) return;

        toggle.addEventListener('click', function () {

            menu.classList.toggle('hidden');

            arrow.classList.toggle('rotate-90');

        });

    });


    document.addEventListener('DOMContentLoaded', function () {

        const button = document.getElementById('profileMenuButton');
        const menu = document.getElementById('profileMenu');
        const icon = document.getElementById('profileMenuIcon');

        if (!button || !menu) return;


        /* =========================================
           ABRIR / CERRAR
        ========================================= */

        button.addEventListener('click', function (event) {

            event.stopPropagation();

            const isOpen = !menu.classList.contains('hidden');

            if (isOpen) {

                closeProfileMenu();

            } else {

                menu.classList.remove('hidden');

                button.setAttribute('aria-expanded', 'true');

                icon.classList.add('rotate-180');

            }

        });


        /* =========================================
           CERRAR AL HACER CLICK AFUERA
        ========================================= */

        document.addEventListener('click', function (event) {

            if (
                !menu.contains(event.target) &&
                !button.contains(event.target)
            ) {

                closeProfileMenu();

            }

        });


        /* =========================================
           CERRAR
        ========================================= */

        function closeProfileMenu() {

            menu.classList.add('hidden');

            button.setAttribute('aria-expanded', 'false');

            icon.classList.remove('rotate-180');

        }

    });



</script>