<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>!SIMPEX</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    @component('components.navbar')

    @endcomponent


    <div class="containerpage">
        <div class="w-1/2 h-1/2">
            <form method="post" action="{{ route('parte2') }}" autocomplete="off" class="flex flex-col gap-5">
                @csrf
                <div class="input">
                    <label class="text-semibold text-xl">VARIÁVEIS</label>
                    <input type="number" name="variavel" class="campo">
                </div>
                {{ $errors->has('variavel') ? $errors->first('variavel') : '' }}
                <div class="input">
                    <label class="text-semibold text-xl">RESTRIÇÕES</label>
                    <input type="number" name="restricao" class="campo">
                </div>
                {{ $errors->has('restricao') ? $errors->first('restricao') : '' }}
                <div class="w-full flex justify-center">
                    <button type="submit" class="botao">ALGÉBRICO</button>
                    <button style="margin-left: 50px" type="submit" class="botao">GRÁFICO</button>
                </div>
            </form>
        </div>
    </div>

    <x-Footer />
</body>

</html>
