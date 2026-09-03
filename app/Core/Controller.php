<?php

namespace App\Core;

/**
 * Clase base de todos los Controllers de NOVA.
 */
abstract class Controller
{
    /**
     * Carga una vista.
     *
     * Ejemplo:
     * $this->view('usuarios/index', [
     *     'usuarios' => $usuarios
     * ]);
     */
    protected function view(string $view, array $data = []): void
    {
        $viewPath = __DIR__ . '/../Views/' . $view . '.php';

        if (!file_exists($viewPath)) {
            throw new \RuntimeException(
                "La vista no existe: {$viewPath}"
            );
        }

        /*
         * Convierte:
         *
         * ['usuarios' => $usuarios]
         *
         * en:
         *
         * $usuarios
         */
        extract($data, EXTR_SKIP);

        require $viewPath;
    }

    /**
     * Redirecciona a una URL.
     */
    protected function redirect(string $url): never
    {
        header('Location: ' . $url);
        exit;
    }

    /**
     * Devuelve una respuesta JSON.
     *
     * Ideal para AJAX / Fetch.
     */
    protected function json(
        mixed $data,
        int $status = 200
    ): never {
        http_response_code($status);

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode(
            $data,
            JSON_UNESCAPED_UNICODE |
            JSON_UNESCAPED_SLASHES
        );

        exit;
    }

    /**
     * Obtiene un parámetro POST.
     */
    protected function post(
        string $key,
        mixed $default = null
    ): mixed {
        return $_POST[$key] ?? $default;
    }

    /**
     * Obtiene un parámetro GET.
     */
    protected function get(
        string $key,
        mixed $default = null
    ): mixed {
        return $_GET[$key] ?? $default;
    }

    /**
     * Obtiene el método HTTP actual.
     */
    protected function requestMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }

    /**
     * Comprueba si la petición es AJAX.
     */
    protected function isAjax(): bool
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH'])
            && strtolower(
                $_SERVER['HTTP_X_REQUESTED_WITH']
            ) === 'xmlhttprequest';
    }
}