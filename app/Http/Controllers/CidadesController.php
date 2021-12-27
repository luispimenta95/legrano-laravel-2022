<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Util\MensagemPadrao;

class CidadesController extends Controller
{
    public function index(Request $request)
    {
        $mensagem = MensagemPadrao::retornaMensagens();

        $pesquisa = $request->query('pesquisa');
        if ($pesquisa) {
            $cidades = Cidade::where('nome', 'LIKE', '%' . $pesquisa . '%')->paginate()->withQueryString();
            $total = $cidades->count();
            if ($total == 0) {
                $cidades = Cidade::paginate(10);
                return view('cidades.lista', ['cidades' => $cidades, 'pesquisa' => $pesquisa, 'mensagem' => $mensagem['semRegistro']]);
            }
        } else {

            $cidades = Cidade::paginate(10);
        }
        return view('cidades.lista', ['cidades' => $cidades, 'pesquisa' => $pesquisa]);
    }
    public function listar(Request $request)
    {
        $mensagem = MensagemPadrao::retornaMensagens();

        $pesquisa = $request->pesquisa;
        if ($pesquisa) {
            $cidades = Cidade::where('nome', 'LIKE', '%' . $pesquisa . '%')->paginate()->withQueryString();
            $total = $cidades->count();
            if ($total == 0) {
                $cidades = Cidade::paginate(10);
                return view('cidades.lista', ['cidades' => $cidades, 'pesquisa' => $pesquisa, 'mensagem' => $mensagem['semRegistro']]);
            }
        } else {

            $cidades = Cidade::paginate(10);
        }
        return view('cidades.lista', ['cidades' => $cidades, 'pesquisa' => $pesquisa]);
    }
    public function editar(Request $request)
    {
        $cidade = Cidade::findOrFail($request->id);
        return view('cidades.editar', ['cidade' => $cidade]);
    }
    public function excluir(Request $request)
    {
        $mensagem = MensagemPadrao::retornaMensagens();
        $cidades = Cidade::paginate(10);
        $res=Cidade::findOrFail($request->id)->delete();
        if ($res){
            return redirect('/cidades', ['mensagem' => 'Al']);

        }else{
            return redirect('/cidades',['mensagem' => $mensagem['erroExclusao'], 'pesquisa'=>'']);

}
}
}
