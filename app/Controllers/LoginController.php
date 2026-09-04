<?php

namespace App\Controllers;

use App\Core\Controller;

class LoginController extends Controller
{
    /**
     * Muestra y procesa el inicio de sesión.
     */
    public function index(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario = trim($_POST['usuario'] ?? '');
            $password = $_POST['password'] ?? '';

            if (
                $usuario === 'admin' &&
                $password === 'admin123'
            ) {

                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['auth'] = true;
                $_SESSION['usuario'] = $usuario;
                $_SESSION['nombre'] = 'Administrador';
                $_SESSION['rol'] = 'Administrador';

header('Location: ' . BASE_URL . '/public/index.php?url=dashboard');
exit;
            }

            $error = 'Usuario o contraseña incorrectos.';

            $this->view(
                'login/index',
                [
                    'error' => $error
                ],
                null
            );

            return;
        }

        $this->view(
            'login/index',
            [],
            null
        );
    }
}