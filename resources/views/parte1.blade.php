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
        <div class="w-[55%] h-[30rem]">
            <form method="post" action="{{ route('parte2') }}" autocomplete="off" class="flex flex-col gap-5 border-2 p-5 border-[#E2E2E2] shadow-sm bg-[#f8f6f6] rounded-sm items-center h-full justify-center">
                @csrf
                <div class="inputcontainer">
                    <label class="text-semibold text-lg">Variáveis</label>
                    <input type="number" name="variavel" >
                </div>
                {{ $errors->has('variavel') ? $errors->first('variavel') : '' }}
                <div class="inputcontainer">
                    <label class="text-semibold text-lg">Restrições</label>
                    <input type="number" name="restricao" >
                </div>
                {{ $errors->has('restricao') ? $errors->first('restricao') : '' }}
                <div class="w-full flex justify-center mt-4">
                    <button type="submit" class="botao">ALGÉBRICO</button>
                    <button style="margin-left: 50px" type="submit" class="botao">GRÁFICO</button>
                </div>
            </form>
        </div>
    </div>

    @component('components.footer')
    @endcomponent
</body>

</html>
