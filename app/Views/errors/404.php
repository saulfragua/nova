<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>404 - Página no encontrada | NOVA</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >
</head>

<body class="min-h-screen bg-slate-950">

    <main class="flex min-h-screen items-center justify-center px-6">

        <div class="w-full max-w-lg text-center">

            <!-- LOGO -->
            <div class="mb-8">

                <span class="text-5xl font-black tracking-tight">
                    <span class="text-blue-500">N</span><span class="text-white">OVA</span>
                </span>

            </div>


            <!-- ICONO -->
            <div
                class="
                    mx-auto
                    mb-8
                    flex
                    h-24
                    w-24
                    items-center
                    justify-center
                    rounded-3xl
                    bg-blue-500/10
                    text-blue-400
                "
            >

                <i class="fa-solid fa-compass text-4xl"></i>

            </div>


            <!-- ERROR -->
            <p
                class="
                    mb-2
                    text-7xl
                    font-black
                    tracking-tight
                    text-white
                "
            >
                404
            </p>


            <h1
                class="
                    mb-3
                    text-2xl
                    font-bold
                    text-white
                "
            >
                Página no encontrada
            </h1>


            <p
                class="
                    mx-auto
                    mb-8
                    max-w-md
                    text-sm
                    leading-6
                    text-slate-400
                "
            >
                La página que estás buscando no existe,
                fue movida o la dirección ingresada no es correcta.
            </p>


            <!-- BOTONES -->
            <div class="flex flex-col justify-center gap-3 sm:flex-row">

                <a
                    href="<?= BASE_URL ?>/dashboard"
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
                        hover:bg-blue-500
                    "
                >
                    <i class="fa-solid fa-house"></i>

                    Ir al inicio
                </a>


                <button
                    type="button"
                    onclick="history.back()"
                    class="
                        inline-flex
                        h-11
                        items-center
                        justify-center
                        gap-2
                        rounded-xl
                        border
                        border-white/10
                        bg-white/5
                        px-6
                        text-sm
                        font-semibold
                        text-slate-300
                        transition
                        hover:bg-white/10
                        hover:text-white
                    "
                >
                    <i class="fa-solid fa-arrow-left"></i>

                    Volver
                </button>

            </div>


            <!-- REFERENCIA -->
            <p class="mt-10 text-xs text-slate-600">
                NOVA · Sistema de gestión
            </p>

        </div>

    </main>

</body>

</html>