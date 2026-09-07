<?php

$pageTitle = 'Gastos';

?>

<div class="p-6">

    <h1 class="text-3xl font-bold text-white">
        Gastos
    </h1>

    <p class="mt-2 text-slate-400">
        Bienvenido a NOVA, <?= htmlspecialchars(
            $_SESSION['nombre'] ?? 'Usuario',
            ENT_QUOTES,
            'UTF-8'
        ) ?>.
    </p>

</div>