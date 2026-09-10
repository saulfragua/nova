<?php

/*
|--------------------------------------------------------------------------
| NOVA - SISTEMA CENTRAL DE ALERTAS
|--------------------------------------------------------------------------
|
| Este archivo recibe las alertas enviadas desde los controladores
| mediante:
|
| $_SESSION['mensaje']
| $_SESSION['tipo_mensaje']
|
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| VERIFICAR SI EXISTE UNA ALERTA
|--------------------------------------------------------------------------
*/

if (
    isset($_SESSION['mensaje']) &&
    isset($_SESSION['tipo_mensaje'])
) {

    $mensaje =
        $_SESSION['mensaje'];

    $tipo =
        $_SESSION['tipo_mensaje'];


    /*
    |--------------------------------------------------------------------------
    | LIMPIAR LA ALERTA
    |--------------------------------------------------------------------------
    |
    | Evita que la misma alerta aparezca nuevamente al recargar.
    |
    */

    unset($_SESSION['mensaje']);

    unset($_SESSION['tipo_mensaje']);


    /*
    |--------------------------------------------------------------------------
    | TIPOS PERMITIDOS
    |--------------------------------------------------------------------------
    */

    $tiposPermitidos = [
        'success',
        'error',
        'warning',
        'info',
        'question'
    ];


    /*
    |--------------------------------------------------------------------------
    | VALIDAR TIPO
    |--------------------------------------------------------------------------
    */

    if (
        !in_array(
            $tipo,
            $tiposPermitidos,
            true
        )
    ) {

        $tipo = 'info';
    }


    /*
    |--------------------------------------------------------------------------
    | CONVERTIR MENSAJE A JSON
    |--------------------------------------------------------------------------
    |
    | json_encode protege caracteres especiales:
    | tildes, ñ, comillas, saltos de línea, etc.
    |
    */

    $mensajeJS =
        json_encode(
            $mensaje,
            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES
        );

?>

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        /*
        |--------------------------------------------------------------------------
        | VERIFICAR NOVA ALERT
        |--------------------------------------------------------------------------
        */

        if (
            typeof NovaAlert !== 'undefined'
        ) {

            NovaAlert.<?= $tipo ?>(
                <?= $mensajeJS ?>
            );

        }

    }
);

</script>

<?php

}

?>

