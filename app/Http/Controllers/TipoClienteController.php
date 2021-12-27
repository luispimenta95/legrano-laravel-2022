<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoCliente;
use App\Util\MensagemPadrao;


class TipoClienteController extends Controller
{
    public function index(Request $request)
    {
        $mensagem = MensagemPadrao::retornaMensagens();

        $pesquisa = $request->query('pesquisa');
        if ($pesquisa) {
            $planos = TipoCliente::where('descricao', 'LIKE', '%' . $pesquisa . '%')->paginate()->withQueryString();
            $total = $planos->count();
            if ($total == 0) {
                $planos = TipoCliente::paginate(10);
                return view('planos.lista', ['planos' => $planos, 'pesquisa' => $pesquisa, 'mensagem' => $mensagem['semRegistro']]);
            }
        } else {

            $planos = TipoCliente::paginate(10);
        }
        return view('planos.lista', ['planos' => $planos, 'pesquisa' => $pesquisa]);
    }
}
