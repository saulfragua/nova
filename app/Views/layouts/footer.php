
<!-- =========================================================
     NOVA - FOOTER
========================================================= -->

<footer class="mt-auto">

    <!-- Contenido del footer -->

</footer>


<!-- =========================================================
     SWEETALERT2
========================================================= -->

<script
    src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
</script>


<!-- =========================================================
     NOVA - SISTEMA CENTRAL DE ALERTAS
========================================================= -->

<script
     src="<?= BASE_URL ?>/assets/js/nova-alerts.js">
</script>


<!-- =========================================================
     NOVA - PROCESADOR DE ALERTAS
========================================================= -->

<?php

$alertsFile =
    __DIR__ . '/alerts.php';

if (file_exists($alertsFile)) {

    require_once $alertsFile;

}

?>


</body>

</html>

