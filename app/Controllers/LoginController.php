<?php

namespace App\Controllers;

use App\Core\Controller;

class LoginController extends Controller
{
    /**
     * Muestra la vista de inicio de sesión.
     */
    public function index(): void
    {
        $this->view('login/index');
    }
}