<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Listagem de cidades</title>
</head>

<body>

    @include('partial.header')

    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-12 p-lg-12 mx-auto my-12">
            <?php
            dd($mensagem);
            if (isset($mensagem)) {
                echo $mensagem;
                unset($mensagem);
            }
            ?>
            <form class="col-md-4 float-right" action="/cidades/listar/" method="POST">
            @csrf
                <input class="form-group" type="text" placeholder="Termo a ser pesquisado" name='pesquisa' value="{{$pesquisa}}">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                <a class="btn btn-outline-success" href="/cidades">Limpar</a>
            </form>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Código do registro</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço do frete</th>
                        <th scope="col">Disponível para entrega</th>
                        <th scope="col">Ações</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($cidades as $cidade)
                    <tr>
                        <td>{{$cidade->id}}</td>
                        <td>{{$cidade->nome}}</td>
                        <td>{{ 'R$ '.number_format($cidade->precoFrete, 2, ',', '.') }} </td>
                        <td>{{ $cidade->entrega==0 ? 'Não' : 'Sim' }}</td>
                        <td>
                        <form class="col-md-4 float-right" action="/cidades/excluir" method="POST">
            @csrf
        
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id" value="{{$cidade->id}}">
                <button class="btn btn-outline-danger" type="submit">Excluir</button>
            </form>
                        <form class="col-md-4 float-right" action="/cidades/editar" method="POST">
            @csrf
        
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id" value="{{$cidade->id}}">
                <button class="btn btn-outline-primary" type="submit">Editar</button>
            </form>
           
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-right">
                {!! $cidades->links()!!}
            </div>
        </div>

</body>

</html>
