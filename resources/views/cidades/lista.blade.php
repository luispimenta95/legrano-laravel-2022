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
    <!-- <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">

                    </div>
            </div>
        </div>

            <tbody>

            </tbody>
        </table>

    </div> -->
    <div class="container">
        <div class="float-right">
            <form method=" get" action="#">
                <div class="input-group mb-3 mt-2">
                    <input type='text' class='form-form-control' placeholder="Digite o termo a ser pesquisado" name='pesquisa' value="{{$pesquisa}}" />
                    <div class='input-group-append'>
                        <button class="btn btn-primary" type='submit'>
                            Pesquisar
                        </button>
                        <a href="#" class="btn btn-danger"> Limpar</a>

                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Código do registro</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço do frete</th>
                        <th scope="col">Ações</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($cidades as $cidade)
                    <tr>
                        <td>{{$cidade->id}}</td>
                        <td>{{$cidade->nome}}</td>
                        <td>{{ 'R$ '.number_format($cidade->precoFrete, 2, ',', '.') }} </td>
                        <td>Editar/Excluir </td>

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
                {!! $cidades->links()!!}
            </div>
        </div>
    </div>
    <div class="container">
        <?php
        $ano = date('Y');
        $futuro = date('Y', strtotime('+5 years', strtotime('now')));
        ?>
        &copy; Luis Felipe A.Pimenta <?php echo ($ano . ' - ' . $futuro) ?>
    </div>
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
