<?php

namespace App\Core;

/**
 * Router automático para NOVA.
 *
 * Ejemplos:
 *
 * /usuarios
 * /usuarios/crear
 * /usuarios/editar/15
 *
 * Se convierten en:
 *
 * UsuariosController::index()
 * UsuariosController::crear()
 * UsuariosController::editar(15)
 */
class Router
{
    /**
     * URL solicitada.
     */
    private string $url;

    /**
     * Método HTTP.
     */
    private string $method;

    /**
     * Controlador por defecto.
     */
    private string $defaultController = 'LoginController';

    /**
     * Método por defecto.
     */
    private string $defaultMethod = 'index';

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        $this->url = $this->getUrl();
    }

    /**
     * Obtiene y limpia la URL.
     */
    private function getUrl(): string
    {
        $url = $_GET['url'] ?? '';

        $url = trim($url, '/');

        $url = filter_var(
            $url,
            FILTER_SANITIZE_URL
        );

        return $url;
    }

    /**
     * Ejecuta la ruta solicitada.
     */
    public function dispatch(): void
    {
        try {

            $segments = $this->getSegments();

            /*
             * /
             *
             * DashboardController::index()
             */
            if (empty($segments)) {

                $controller = $this->defaultController;

                $action = $this->defaultMethod;

                $params = [];

            } else {

                /*
                 * /usuarios
                 *
                 * UsuariosController
                 */
                $controller = $this->formatControllerName(
                    $segments[0]
                );

                /*
                 * /usuarios/crear
                 *
                 * crear()
                 */
                $action = $segments[1]
                    ?? $this->defaultMethod;

                /*
                 * /usuarios/editar/15
                 *
                 * [15]
                 */
                $params = array_slice(
                    $segments,
                    2
                );
            }

            /*
             * Nombre completo de la clase.
             */
            $controllerClass =
                'App\\Controllers\\' . $controller;

            /*
             * Verificar controlador.
             */
            if (!class_exists($controllerClass)) {

                $this->notFound(
                    "No existe el controlador: {$controllerClass}"
                );

                return;
            }

            /*
             * Crear controlador.
             */
            $controllerInstance =
                new $controllerClass();

            /*
             * Verificar método.
             */
            if (
                !method_exists(
                    $controllerInstance,
                    $action
                )
            ) {

                $this->notFound(
                    "No existe el método: {$controller}::{$action}()"
                );

                return;
            }

            /*
             * Ejecutar controlador.
             */
            call_user_func_array(
                [
                    $controllerInstance,
                    $action
                ],
                $params
            );

        } catch (\Throwable $e) {

            $this->serverError($e);
        }
    }

    /**
     * Divide la URL en segmentos.
     */
    private function getSegments(): array
    {
        if (empty($this->url)) {
            return [];
        }

        return array_values(
            array_filter(
                explode('/', $this->url),
                fn ($segment) => $segment !== ''
            )
        );
    }

    /**
     * Convierte:
     *
     * usuarios
     *
     * en:
     *
     * UsuariosController
     */
    private function formatControllerName(
        string $name
    ): string {

        $name = str_replace(
            ['-', '_'],
            ' ',
            strtolower($name)
        );

        $name = ucwords($name);

        $name = str_replace(
            ' ',
            '',
            $name
        );

        return $name . 'Controller';
    }

    /**
     * Respuesta 404.
     */
    private function notFound(
        string $message = 'Página no encontrada'
    ): void {

        http_response_code(404);

        $view =
            __DIR__ .
            '/../Views/errors/404.php';

        if (file_exists($view)) {

            require $view;

            return;
        }

        echo '<h1>404 - Página no encontrada</h1>';

        echo '<p>';

        echo htmlspecialchars(
            $message,
            ENT_QUOTES,
            'UTF-8'
        );

        echo '</p>';
    }

    /**
     * Respuesta 500.
     */
    private function serverError(
        \Throwable $e
    ): void {

        http_response_code(500);

        /*
         * IMPORTANTE:
         *
         * APP_DEBUG viene del .env.
         *
         * NO usamos:
         *
         * APP_DEBUG
         *
         * como constante.
         */
        $debug = filter_var(
            $_ENV['APP_DEBUG'] ?? false,
            FILTER_VALIDATE_BOOLEAN
        );

        /*
         * Modo desarrollo.
         */
        if ($debug) {

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

            return;
        }

        /*
         * Modo producción.
         */
        $view =
            __DIR__ .
            '/../Views/errores/500.php';

        if (file_exists($view)) {

            require $view;

            return;
        }

        echo '<h1>500 - Error interno del servidor</h1>';
    }
}