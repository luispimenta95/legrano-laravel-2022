<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoCliente;

class TipoClienteController extends Controller
{
    public function index(Request $request)
    {
        $pesquisa = $request->query('pesquisa');
        if ($pesquisa) {
            $plano = TipoCliente::where('descricao', 'LIKE', '%' . $pesquisa . '%')->paginate()->withQueryString();

        }else{
        $plano = TipoCliente::paginate();
        }
        return view('planos.lista', ['planos' => $plano]);
    }
}
