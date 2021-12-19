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
    public function editar($id)
    {
        $cidade = Cidade::findOrFail($id);
        return view('cidades.editar', ['cidade' => $cidade]);
    }
    public function update(Request $request, Cidade $cidade)
    {
        $cidade = Cidade::findOrFail($cidade->id);
        if ($cidade) {
            //redirect dengan pesan sukses
            return redirect()->route('cidades.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('cidades.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
}
