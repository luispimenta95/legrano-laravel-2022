<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoCliente;

class TipoClienteController extends Controller
{
    public function index()
    {
        $plano = TipoCliente::paginate();
        return view('planos.lista', ['planos' => $plano]);
    }
}
