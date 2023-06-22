<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>!SIMPEX</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-[#F5F5F5] px-16 py-5">

    <x-Navbar />

    <div class="painelParte1">
        <div style="align-items: center; justify-content: center; " class="">
            <form method="post" action="{{ route('parte2') }}" autocomplete="off">
                @csrf
                <div class="input">
                    <label>Quantidade variáveis:</label>
                    <input type="number" class="form-control" name="variavel">
                    {{ $errors->has('variavel') ? $errors->first('variavel') : '' }}
                </div>
                <div class="input">
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

    <x-Footer />
</body>

</html>
