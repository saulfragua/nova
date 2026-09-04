<?php

/*
|--------------------------------------------------------------------------
| CONFIGURACIÓN
|--------------------------------------------------------------------------
| Cargamos la configuración por seguridad.
| Si public/index.php ya la cargó, require_once no la vuelve a cargar.
|--------------------------------------------------------------------------
*/

require_once dirname(__DIR__, 3) . '/config/config.php';

?>
<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="<?= APP_NAME ?> - <?= APP_DESCRIPTION ?>"
    >

    <title>
        <?= APP_NAME ?> | Iniciar sesión
    </title>


    <!-- =====================================================
         TAILWIND CSS
    ====================================================== -->

    <script src="https://cdn.tailwindcss.com"></script>


    <!-- =====================================================
         FONT AWESOME
    ====================================================== -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >


    <!-- =====================================================
         CONFIGURACIÓN TAILWIND
    ====================================================== -->

    <script>

        tailwind.config = {

            theme: {

                extend: {

                    colors: {

                        nova: {

                            bg: '#080B12',

                            card: '#111722',

                            blue: '#3B82F6',

                            violet: '#8B5CF6',

                            purple: '#A78BFA',

                            green: '#22C55E',

                            amber: '#F59E0B',

                            red: '#EF4444',

                            text: '#F8FAFC',

                            muted: '#94A3B8'

                        }

                    }

                }

            }

        }

    </script>

</head>


<body
    class="
        min-h-screen
        bg-nova-bg
        text-nova-text
        antialiased
    "
>


    <!-- =====================================================
         CONTENEDOR PRINCIPAL
    ====================================================== -->

    <main
        class="
            relative
            flex
            min-h-screen
            items-center
            justify-center
            overflow-hidden
            p-4
            sm:p-6
            lg:p-8
        "
    >


        <!-- =================================================
             FONDO AZUL
        ================================================== -->

        <div
            class="
                pointer-events-none
                absolute
                -left-40
                -top-40
                h-96
                w-96
                rounded-full
                bg-blue-600/10
                blur-3xl
            "
        ></div>


        <!-- =================================================
             FONDO VIOLETA
        ================================================== -->

        <div
            class="
                pointer-events-none
                absolute
                -bottom-40
                -right-40
                h-96
                w-96
                rounded-full
                bg-violet-600/10
                blur-3xl
            "
        ></div>


        <!-- =================================================
             CONTENEDOR LOGIN
        ================================================== -->

        <div
            class="
                relative
                z-10
                flex
                min-h-[720px]
                w-full
                max-w-[1450px]
                overflow-hidden
                rounded-3xl
                border
                border-white/10
                bg-[#050912]
                shadow-2xl
                lg:min-h-[780px]
            "
        >


            <!-- =================================================
                 PANEL IZQUIERDO
            ================================================== -->

            <section
                class="
                    relative
                    hidden
                    w-1/2
                    flex-col
                    justify-center
                    overflow-hidden
                    bg-gradient-to-br
                    from-[#07101D]
                    via-[#080B12]
                    to-[#050810]
                    px-12
                    lg:flex
                    xl:px-20
                "
            >


                <!-- =================================================
                     LUZ AZUL
                ================================================== -->

                <div
                    class="
                        pointer-events-none
                        absolute
                        left-10
                        top-10
                        h-80
                        w-80
                        rounded-full
                        bg-blue-600/10
                        blur-3xl
                    "
                ></div>


                <!-- =================================================
                     LUZ VIOLETA
                ================================================== -->

                <div
                    class="
                        pointer-events-none
                        absolute
                        bottom-10
                        right-10
                        h-80
                        w-80
                        rounded-full
                        bg-violet-600/10
                        blur-3xl
                    "
                ></div>


                <!-- =================================================
                     CONTENIDO
                ================================================== -->

                <div
                    class="
                        relative
                        z-10
                        mx-auto
                        w-full
                        max-w-xl
                    "
                >


                    <!-- =================================================
                         LOGO DESKTOP
                    ================================================== -->

<div
    class="
        mb-12
        text-center
    "
>

    <img
        src="<?= ASSETS_URL ?>/img/logo.png"
        alt="<?= APP_NAME ?> - <?= APP_DESCRIPTION ?>"
        class="
            mx-auto
            h-auto
            w-56
            object-contain
            xl:w-64
        "
        onerror="this.style.display='none';"
    >

    <p
        class="
            mt-1
            text-3xl
            font-semibold
            leading-none
            tracking-tight
            text-white
        "
    >
        <?= APP_NAME ?>
    </p>

    <p
        class="
            mt-1
            text-xs
            font-medium
            uppercase
            leading-none
            tracking-[0.12em]
            text-slate-400
        "
    >
        <?= APP_DESCRIPTION ?>
    </p>

</div>



                    <!-- =================================================
                         MENSAJE
                    ================================================== -->

<div 
    class=" 
        mb-12
        text-center
    " 
> 

    <h1 
        class=" 
            text-3xl 
            font-bold 
            leading-tight 
            tracking-tight 
            xl:text-4xl 
        " 
    > 

        Gestión inteligente 

        <br> 

        para 

        <span 
            class=" 
                bg-gradient-to-r 
                from-nova-blue 
                to-nova-violet 
                bg-clip-text 
                text-transparent 
            " 
        > 

            crecer juntos 

        </span> 

    </h1> 


    <p 
        class=" 
            mt-5 
            max-w-lg 
            mx-auto
            text-base 
            leading-relaxed 
            text-nova-muted 
            xl:text-lg 
        " 
    > 

        Controla tus clientes, créditos, 
        pagos y cobranza desde un solo lugar. 

    </p> 

</div>


                    <!-- =================================================
                         CARACTERÍSTICAS
                    ================================================== -->

                    <div
                        class="
                            grid
                            grid-cols-3
                            gap-5
                        "
                    >


                        <!-- REPORTES -->

                        <div
                            class="
                                group
                                text-center
                            "
                        >

                            <div
                                class="
                                    mx-auto
                                    flex
                                    h-14
                                    w-14
                                    items-center
                                    justify-center
                                    rounded-xl
                                    border
                                    border-violet-500/30
                                    bg-violet-500/5
                                    transition
                                    group-hover:border-violet-500/60
                                    group-hover:bg-violet-500/10
                                "
                            >

                                <i
                                    class="
                                        fa-solid
                                        fa-chart-line
                                        text-xl
                                        text-violet-400
                                    "
                                ></i>

                            </div>


                            <p
                                class="
                                    mt-4
                                    text-sm
                                    font-medium
                                    text-white
                                "
                            >

                                Reportes en

                                <br>

                                tiempo real

                            </p>

                        </div>


                        <!-- SEGURIDAD -->

                        <div
                            class="
                                group
                                text-center
                            "
                        >

                            <div
                                class="
                                    mx-auto
                                    flex
                                    h-14
                                    w-14
                                    items-center
                                    justify-center
                                    rounded-xl
                                    border
                                    border-emerald-500/30
                                    bg-emerald-500/5
                                    transition
                                    group-hover:border-emerald-500/60
                                    group-hover:bg-emerald-500/10
                                "
                            >

                                <i
                                    class="
                                        fa-solid
                                        fa-shield-halved
                                        text-xl
                                        text-emerald-400
                                    "
                                ></i>

                            </div>


                            <p
                                class="
                                    mt-4
                                    text-sm
                                    font-medium
                                    text-white
                                "
                            >

                                Información

                                <br>

                                segura

                            </p>

                        </div>


                        <!-- EFICIENCIA -->

                        <div
                            class="
                                group
                                text-center
                            "
                        >

                            <div
                                class="
                                    mx-auto
                                    flex
                                    h-14
                                    w-14
                                    items-center
                                    justify-center
                                    rounded-xl
                                    border
                                    border-amber-500/30
                                    bg-amber-500/5
                                    transition
                                    group-hover:border-amber-500/60
                                    group-hover:bg-amber-500/10
                                "
                            >

                                <i
                                    class="
                                        fa-solid
                                        fa-bolt
                                        text-xl
                                        text-amber-400
                                    "
                                ></i>

                            </div>


                            <p
                                class="
                                    mt-4
                                    text-sm
                                    font-medium
                                    text-white
                                "
                            >

                                Procesos más

                                <br>

                                eficientes

                            </p>

                        </div>

                    </div>

                </div>


                <!-- =================================================
                     DECORACIÓN INFERIOR
                ================================================== -->

                <div
                    class="
                        pointer-events-none
                        absolute
                        bottom-0
                        left-0
                        right-0
                        h-40
                        overflow-hidden
                    "
                >

                    <div
                        class="
                            absolute
                            -bottom-20
                            -left-10
                            h-40
                            w-[120%]
                            rotate-[-4deg]
                            rounded-[50%]
                            border-t
                            border-blue-500/30
                        "
                    ></div>


                    <div
                        class="
                            absolute
                            -bottom-24
                            -left-10
                            h-40
                            w-[120%]
                            rotate-[4deg]
                            rounded-[50%]
                            border-t
                            border-violet-500/30
                        "
                    ></div>

                </div>

            </section>


            <!-- =================================================
                 PANEL DERECHO
            ================================================== -->

            <section
                class="
                    relative
                    flex
                    w-full
                    items-center
                    justify-center
                    bg-[#070C15]
                    p-5
                    sm:p-8
                    lg:w-1/2
                    lg:p-12
                "
            >


                <!-- =================================================
                     FONDO
                ================================================== -->

                <div
                    class="
                        pointer-events-none
                        absolute
                        inset-0
                        bg-gradient-to-br
                        from-[#0A111D]
                        via-[#080B12]
                        to-[#080B12]
                    "
                ></div>


                <!-- =================================================
                     LUZ
                ================================================== -->

                <div
                    class="
                        pointer-events-none
                        absolute
                        right-0
                        top-0
                        h-80
                        w-80
                        rounded-full
                        bg-violet-600/10
                        blur-3xl
                    "
                ></div>


                <!-- =================================================
                     CONTENIDO
                ================================================== -->

                <div
                    class="
                        relative
                        z-10
                        w-full
                        max-w-md
                    "
                >


                    <!-- =================================================
                         LOGO MOBILE
                    ================================================== -->

<div
    class="
        mb-8
        text-center
        lg:hidden
    "
>

    <img
        src="<?= ASSETS_URL ?>/img/logo.png"
        alt="<?= APP_NAME ?> - <?= APP_DESCRIPTION ?>"
        class="
            mx-auto
            h-auto
            w-44
            object-contain
            sm:w-52
        "
    >

    <p
        class="
            mt-1
            text-3xl
            font-semibold
            leading-none
            tracking-tight
            text-white
        "
    >
        <?= APP_NAME ?>
    </p>

    <p
        class="
            mt-1
            text-xs
            font-medium
            uppercase
            leading-none
            tracking-[0.12em]
            text-slate-400
        "
    >
        <?= APP_DESCRIPTION ?>
    </p>

</div>


                    <!-- =================================================
                         CARD LOGIN
                    ================================================== -->

                    <div
                        class="
                            rounded-2xl
                            border
                            border-white/10
                            bg-nova-card/95
                            p-6
                            shadow-2xl
                            shadow-black/40
                            backdrop-blur-xl
                            sm:p-8
                        "
                    >


                        <!-- =================================================
                             ENCABEZADO
                        ================================================== -->

                        <div
                            class="
                                mb-8
                            "
                        >

                            <h2
                                class="
                                    text-2xl
                                    font-bold
                                    tracking-tight
                                    sm:text-3xl
                                "
                            >

                                Iniciar sesión

                            </h2>


                            <p
                                class="
                                    mt-2
                                    text-sm
                                    text-nova-muted
                                "
                            >

                                Bienvenido de nuevo 👋

                            </p>

                        </div>


                        <!-- =================================================
                             FORMULARIO
                        ================================================== -->

<form
    id="loginForm"
    method="POST"
    action="<?= BASE_URL ?>/public/index.php?url=login"
    autocomplete="off"
>


                            <!-- =================================================
                                 USUARIO
                            ================================================== -->

                            <div
                                class="
                                    mb-5
                                "
                            >

                                <label
                                    for="usuario"
                                    class="
                                        mb-2
                                        block
                                        text-sm
                                        font-medium
                                    "
                                >

                                    Usuario

                                </label>


                                <div
                                    class="
                                        relative
                                    "
                                >

                                    <i
                                        class="
                                            fa-regular
                                            fa-user
                                            absolute
                                            left-4
                                            top-1/2
                                            -translate-y-1/2
                                            text-slate-400
                                        "
                                    ></i>


                                    <input
                                        type="text"
                                        id="usuario"
                                        name="usuario"
                                        placeholder="Ingresa tu usuario"
                                        autocomplete="username"
                                        required
                                        class="
                                            h-12
                                            w-full
                                            rounded-lg
                                            border
                                            border-slate-700
                                            bg-nova-bg
                                            pl-11
                                            pr-4
                                            text-sm
                                            text-nova-text
                                            placeholder-slate-600
                                            outline-none
                                            transition
                                            focus:border-nova-blue
                                            focus:ring-2
                                            focus:ring-nova-blue/20
                                        "
                                    >

                                </div>

                            </div>


                            <!-- =================================================
                                 CONTRASEÑA
                            ================================================== -->

                            <div
                                class="
                                    mb-5
                                "
                            >

                                <label
                                    for="password"
                                    class="
                                        mb-2
                                        block
                                        text-sm
                                        font-medium
                                    "
                                >

                                    Contraseña

                                </label>


                                <div
                                    class="
                                        relative
                                    "
                                >

                                    <i
                                        class="
                                            fa-solid
                                            fa-lock
                                            absolute
                                            left-4
                                            top-1/2
                                            -translate-y-1/2
                                            text-slate-400
                                        "
                                    ></i>


                                    <input
                                        type="password"
                                        id="password"
                                        name="password"
                                        placeholder="••••••••"
                                        autocomplete="current-password"
                                        required
                                        class="
                                            h-12
                                            w-full
                                            rounded-lg
                                            border
                                            border-slate-700
                                            bg-nova-bg
                                            pl-11
                                            pr-12
                                            text-sm
                                            text-nova-text
                                            placeholder-slate-600
                                            outline-none
                                            transition
                                            focus:border-nova-blue
                                            focus:ring-2
                                            focus:ring-nova-blue/20
                                        "
                                    >


                                    <!-- =================================================
                                         MOSTRAR CONTRASEÑA
                                    ================================================== -->

                                    <button
                                        type="button"
                                        id="togglePassword"
                                        class="
                                            absolute
                                            right-0
                                            top-0
                                            flex
                                            h-12
                                            w-12
                                            items-center
                                            justify-center
                                            text-slate-400
                                            transition
                                            hover:text-white
                                        "
                                        aria-label="Mostrar contraseña"
                                    >

                                        <i
                                            id="passwordIcon"
                                            class="
                                                fa-regular
                                                fa-eye
                                            "
                                        ></i>

                                    </button>

                                </div>

                            </div>


                            <!-- =================================================
                                 RECORDAR / RECUPERAR
                            ================================================== -->

                            <div
                                class="
                                    mb-7
                                    flex
                                    flex-col
                                    gap-3
                                    sm:flex-row
                                    sm:items-center
                                    sm:justify-between
                                "
                            >

                                <label
                                    class="
                                        flex
                                        cursor-pointer
                                        items-center
                                        gap-3
                                    "
                                >

                                    <input
                                        type="checkbox"
                                        name="recordarme"
                                        value="1"
                                        class="
                                            h-4
                                            w-4
                                            rounded
                                            border-slate-700
                                            bg-nova-bg
                                            text-nova-blue
                                            focus:ring-nova-blue
                                            focus:ring-offset-0
                                        "
                                    >


                                    <span
                                        class="
                                            text-sm
                                            text-slate-300
                                        "
                                    >

                                        Recordarme

                                    </span>

                                </label>


                                <a
                                    href="#"
                                    id="forgotPassword"
                                    class="
                                        text-sm
                                        text-nova-blue
                                        transition
                                        hover:text-nova-purple
                                    "
                                >

                                    ¿Olvidaste tu contraseña?

                                </a>

                            </div>


                            <!-- =================================================
                                 BOTÓN LOGIN
                            ================================================== -->

                            <button
                                type="submit"
                                id="btnLogin"
                                class="
                                    flex
                                    h-12
                                    w-full
                                    items-center
                                    justify-center
                                    gap-3
                                    rounded-lg
                                    bg-gradient-to-r
                                    from-blue-600
                                    via-nova-blue
                                    to-nova-violet
                                    text-sm
                                    font-semibold
                                    text-white
                                    shadow-lg
                                    shadow-blue-600/20
                                    transition
                                    hover:opacity-90
                                    hover:shadow-blue-600/30
                                    active:scale-[0.99]
                                "
                            >

                                <span>
                                    Iniciar sesión
                                </span>


                                <i
                                    class="
                                        fa-solid
                                        fa-arrow-right
                                    "
                                ></i>

                            </button>


                            <!-- =================================================
                                 CONTACTO
                            ================================================== -->

                            <p
                                class="
                                    mt-7
                                    text-center
                                    text-sm
                                    text-slate-400
                                "
                            >

                                ¿No tienes cuenta?

                                <a
                                    href="#"
                                    id="contactAdmin"
                                    class="
                                        ml-1
                                        text-nova-blue
                                        transition
                                        hover:text-nova-purple
                                    "
                                >

                                    Contacta al administrador

                                </a>

                            </p>

                        </form>

                    </div>


                    <!-- =================================================
                         FOOTER
                    ================================================== -->

                    <p
                        class="
                            mt-6
                            text-center
                            text-xs
                            text-slate-600
                        "
                    >

                        © <?= date('Y') ?>

                        <?= APP_NAME ?>

                        ·

                        <?= APP_DESCRIPTION ?>

                    </p>

                </div>


                <!-- =================================================
                     DECORACIÓN MOBILE
                ================================================== -->

                <div
                    class="
                        pointer-events-none
                        absolute
                        bottom-0
                        left-0
                        right-0
                        h-28
                        overflow-hidden
                        opacity-60
                        lg:hidden
                    "
                >

                    <div
                        class="
                            absolute
                            -bottom-20
                            -left-10
                            h-40
                            w-[120%]
                            rotate-[-4deg]
                            rounded-[50%]
                            border-t
                            border-blue-500/30
                        "
                    ></div>


                    <div
                        class="
                            absolute
                            -bottom-24
                            -left-10
                            h-40
                            w-[120%]
                            rotate-[4deg]
                            rounded-[50%]
                            border-t
                            border-violet-500/30
                        "
                    ></div>

                </div>

            </section>

        </div>

    </main>


    <!-- =====================================================
         JAVASCRIPT
    ====================================================== -->

    <script>

        document.addEventListener(
            'DOMContentLoaded',
            function () {


                /*
                |--------------------------------------------------------------------------
                | MOSTRAR / OCULTAR CONTRASEÑA
                |--------------------------------------------------------------------------
                */

                const password =
                    document.getElementById('password');

                const togglePassword =
                    document.getElementById('togglePassword');

                const passwordIcon =
                    document.getElementById('passwordIcon');


                if (
                    password &&
                    togglePassword &&
                    passwordIcon
                ) {

                    togglePassword.addEventListener(
                        'click',
                        function () {

                            const mostrar =
                                password.type === 'password';


                            password.type =
                                mostrar
                                    ? 'text'
                                    : 'password';


                            passwordIcon.classList.toggle(
                                'fa-eye',
                                !mostrar
                            );


                            passwordIcon.classList.toggle(
                                'fa-eye-slash',
                                mostrar
                            );


                            togglePassword.setAttribute(
                                'aria-label',
                                mostrar
                                    ? 'Ocultar contraseña'
                                    : 'Mostrar contraseña'
                            );

                        }
                    );

                }


                /*
                |--------------------------------------------------------------------------
                | FORMULARIO
                |--------------------------------------------------------------------------
                */

                const loginForm =
                    document.getElementById('loginForm');


                const btnLogin =
                    document.getElementById('btnLogin');


                if (loginForm) {

    loginForm.addEventListener(
        'submit',
        function (event) {

            const usuario =
                document
                    .getElementById('usuario')
                    .value
                    .trim();

            const passwordValue =
                document
                    .getElementById('password')
                    .value;


            if (!usuario) {

                event.preventDefault();

                alert(
                    'Por favor ingresa tu usuario.'
                );

                return;

            }


            if (!passwordValue) {

                event.preventDefault();

                alert(
                    'Por favor ingresa tu contraseña.'
                );

                return;

            }


            /*
            |--------------------------------------------------------------------------
            | PERMITIR ENVÍO AL CONTROLADOR
            |--------------------------------------------------------------------------
            */

            if (btnLogin) {

                btnLogin.disabled = true;

                btnLogin.querySelector('span').textContent =
                    'Ingresando...';

            }

        }
    );

}


                /*
                |--------------------------------------------------------------------------
                | OLVIDÉ MI CONTRASEÑA
                |--------------------------------------------------------------------------
                */

                const forgotPassword =
                    document.getElementById('forgotPassword');


                if (forgotPassword) {

                    forgotPassword.addEventListener(
                        'click',
                        function (event) {

                            event.preventDefault();

                            console.log(
                                'Recuperación de contraseña'
                            );

                        }
                    );

                }


                /*
                |--------------------------------------------------------------------------
                | CONTACTAR ADMINISTRADOR
                |--------------------------------------------------------------------------
                */

                const contactAdmin =
                    document.getElementById('contactAdmin');


                if (contactAdmin) {

                    contactAdmin.addEventListener(
                        'click',
                        function (event) {

                            event.preventDefault();

                            console.log(
                                'Contactar administrador'
                            );

                        }
                    );

                }

            }
        );

    </script>

</body>

</html>