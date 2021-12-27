<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Listagem de planos</title>
</head>

<body>

    @include('partial.header')

    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-12 p-lg-12 mx-auto my-12">
            <?php
            if (isset($mensagem)) {
                echo $mensagem;
                unset($mensagem);
            }
            ?>
            <form class="col-md-4 float-right" action="#" method="get">
                <input class="form-group" type="text" placeholder="Termo a ser pesquisado" name='pesquisa' value="{{$pesquisa}}">
                <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                <a class="btn btn-outline-success" href="/planos">Limpar</a>
            </form>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Código do registro</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ações</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($planos as $plano)
                    <tr>
                        <td>{{$plano->id}}</td>
                        <td>{{$plano->descricao}}</td>
                        <td>
                            <a href="/planos/editar/{{$plano->id}}">
                                Editar
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-left">
                <button class="btn btn-success" type='submit'>
                    Adicionar
                </button>
            </div>
            <div class="float-right">
                {!! $planos->links()!!}
            </div>
        </div>

</body>

</html>
