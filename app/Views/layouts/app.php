<?php
$pageTitle = $pageTitle ?? APP_NAME;
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= htmlspecialchars(
            $pageTitle,
            ENT_QUOTES,
            'UTF-8'
        ) ?>
        - <?= APP_NAME ?>
    </title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

</head>

<body class="bg-slate-950 text-white">

    <div class="min-h-screen">

        <?php require __DIR__ . '/sidebar.php'; ?>

<main
    id="novaMain"
    class="
        min-h-screen
        ml-0
        lg:ml-72
        transition-all
        duration-300
        ease-in-out
    "
>

    <?php require __DIR__ . '/navbar.php'; ?>

    <?= $content ?>

</main> 

    </div>

</body>

</html>