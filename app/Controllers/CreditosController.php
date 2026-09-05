<?php

namespace App\Controllers;

use App\Core\Controller;

class CreditosController extends Controller
{
    public function index(): void
    {
        $this->view('creditos/index');

        
    }
}
