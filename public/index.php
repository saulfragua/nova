<?php

declare(strict_types=1);
require_once dirname(__DIR__) . '/config/config.php';
/*
|--------------------------------------------------------------------------
| NOVA - Front Controller
|--------------------------------------------------------------------------
|
| Todas las solicitudes de la aplicación pasan por este archivo.
|
*/

/*
|--------------------------------------------------------------------------
| 1. Cargar Composer
|--------------------------------------------------------------------------
*/

require_once dirname(__DIR__) . '/vendor/autoload.php';


/*
|--------------------------------------------------------------------------
| 2. Cargar variables de entorno
|--------------------------------------------------------------------------
*/

use Dotenv\Dotenv;

$rootPath = dirname(__DIR__);

$dotenv = Dotenv::createImmutable($rootPath);

/*
 * Carga el archivo:
 *
 * NOVA/.env
 */
$dotenv->load();


/*
|--------------------------------------------------------------------------
| 3. Configuración de la aplicación
|--------------------------------------------------------------------------
*/

$appEnv = $_ENV['APP_ENV'] ?? 'production';

$appDebug = filter_var(
    $_ENV['APP_DEBUG'] ?? false,
    FILTER_VALIDATE_BOOLEAN
);


/*
|--------------------------------------------------------------------------
| 4. Configuración de errores
|--------------------------------------------------------------------------
*/

if ($appDebug) {

    error_reporting(E_ALL);

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');

} else {

    error_reporting(0);

    ini_set('display_errors', '0');
    ini_set('display_startup_errors', '0');
}


/*
|--------------------------------------------------------------------------
| 5. Constantes generales de NOVA
|--------------------------------------------------------------------------
|
| Estas sí son constantes PHP.
|
| IMPORTANTE:
| APP_DEBUG ya NO se utiliza como constante.
|
*/

if (!defined('APP_ENV')) {
    define('APP_ENV', $appEnv);
}

if (!defined('APP_ROOT')) {
    define('APP_ROOT', $rootPath);
}

if (!defined('APP_PUBLIC')) {
    define('APP_PUBLIC', __DIR__);
}


/*
|--------------------------------------------------------------------------
| 6. Iniciar sesión
|--------------------------------------------------------------------------
|
| Por ahora iniciamos la sesión aquí.
| Posteriormente podemos centralizarla en Session.php.
|
*/

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


/*
|--------------------------------------------------------------------------
| 7. Cargar Router
|--------------------------------------------------------------------------
*/

use App\Core\Router;


/*
|--------------------------------------------------------------------------
| 8. Ejecutar aplicación
|--------------------------------------------------------------------------
*/

try {

    $router = new Router();

    $router->dispatch();

} catch (\Throwable $e) {

    http_response_code(500);

    /*
     * En desarrollo mostramos el error.
     */
    if ($appDebug) {

        echo '<h1>500 - Error interno</h1>';

        echo '<pre>';

        echo htmlspecialchars(
            $e->getMessage(),
            ENT_QUOTES,
            'UTF-8'
        );

        echo "\n\n";

        echo htmlspecialchars(
            $e->getFile(),
            ENT_QUOTES,
            'UTF-8'
        );

        echo ':';

        echo $e->getLine();

        echo "\n\n";

        echo htmlspecialchars(
            $e->getTraceAsString(),
            ENT_QUOTES,
            'UTF-8'
        );

        echo '</pre>';

    } else {

        echo '<h1>500 - Error interno del servidor</h1>';
    }
}