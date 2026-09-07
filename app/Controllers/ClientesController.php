<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Cliente;

class ClientesController extends Controller
{
    private Cliente $clienteModel;

    public function __construct()
    {
        $this->clienteModel = new Cliente();
    }

    /**
     * Listado de clientes.
     */
public function index(): void
{
    $clientes = $this->clienteModel->obtenerTodos();

    $rutas = $this->clienteModel->obtenerRutasDisponibles();

    $this->view(
        'clientes/index',
        [
            'clientes' => $clientes,
            'rutas'    => $rutas,
        ]
    );
}
}