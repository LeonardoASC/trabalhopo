<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projeto Simplex</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kablammo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Moirai+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/part1.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body class="fundototales">
    <div class="">
        <div class="painelParte1">
            <div style="align-items: center; justify-content: center; " class="">

                <p class="centroP">
                    <span class="blackSIM">!SIM</span>
                    <span class="greenPEX">PEX</span>
                </p>
                <br>
                <form method="post" action="{{ route('parte2') }}" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label>Quantidade variáveis:</label>
                        <input type="number" class="form-control" name="variavel">
                        {{ $errors->has('variavel') ? $errors->first('variavel') : '' }}
                    </div>
                    <div class="form-group">
                        <label>Quantidade restrições:</label>
                        <input type="number" class="form-control" name="restricao">
                        {{ $errors->has('restricao') ? $errors->first('restricao') : '' }}
                    </div>

                    <br>

                    <button type="submit" class="btn btn-default col-auto">Algébrico</button>
                    <button style="margin-left: 50px" type="submit" class="btn btn-default col-auto">Grafico</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
