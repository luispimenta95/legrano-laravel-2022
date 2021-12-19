<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Blog - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Editar dados</h4>
                <form action="/cidades/atualizar/{{$cidade->id}}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="cidade">Cidade</label>

                        <input id="cidade" name="cidade" type="text" class="form-control" value="{{$cidade->nome}}" readonly>
                        <input id="idCidade" name="idCidade" type="hidden" class="form-control" value="{{$cidade->id}}">
                    </div>

                    <div class="mb-3">
                        <label for="preco">Preço do frete
                            <input id="preco" name="preco" type="text" class="form-control" value="{{ 'R$ '.number_format($cidade->precoFrete, 2, ',', '.') }}" required>

                    </div>


                    <hr class="mb-4">

                    <h4 class="mb-3">Disponibilidade de entrega</h4>

                    <div class="d-block my-3">
                        <?php

                        if ($cidade->entrega == 1) { ?>
                            <div class="custom-control custom-radio">
                                <input id="credit" name="entrega" type="radio" class="custom-control-input" checked="" value="1" required>
                                <label class="custom-control-label" for="credit">Disponível para entrega</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="debit" name="entrega" type="radio" class="custom-control-input" value="0" required>
                                <label class="custom-control-label" for="debit">Indisponível para entrega</label>
                            </div>
                        <?php
                        } else { ?>
                            <div class="custom-control custom-radio">
                                <input id="credit" name="entrega" type="radio" class="custom-control-input" value="1" required>
                                <label class="custom-control-label" for="credit">Disponível para entrega</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="debit" name="entrega" type="radio" class="custom-control-input" checked="" value="0" required>
                                <label class="custom-control-label" for="debit">Indisponível para entrega</label>
                            </div>

                        <?php } ?>



                    </div>
                    <hr class="mb-4">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a class="btn btn-primary" href="/cidades" role="button">Voltar</a>
                </form>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('content');
        </script>
</body>

</html>