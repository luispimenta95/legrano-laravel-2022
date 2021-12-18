<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;

class CidadesController extends Controller
{
    public function index(Request $request)

    {
        $pesquisa = $request->query('q');
        if ($pesquisa) {
            $cidades = Cidade::where('nome', 'LIKE', '%' . $pesquisa . '%')->paginate()->withQueryString();
        } else {

            $cidades = Cidade::paginate(10);
        }
        return view('cidades.lista', ['cidades' => $cidades]);
    }
}
