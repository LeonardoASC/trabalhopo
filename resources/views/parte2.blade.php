<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    @include('components.navbar', ['variaveis' => $variaveis, 'restricoes' => $restricoes])
    <div class="flex flex-col">
        <form class="flex flex-col w-full justify-center items-center" method="post" action="{{ route('simplex') }}"
            autocomplete="off">
            @csrf

            <div class="flex w-full justify-center items-center">
                <label>Objetivo:</label>
                <select name="objetivo" class="form-control">
                    <option value="max">Maximizar</option>
                    <option value="min">Minimizar</option>
                </select>
            </div>

            <input type="hidden" name="variavel" value="{{ $variaveis }}">
            <input type="hidden" name="restricao" value="{{ $restricoes }}">

            <br>
            <label class="flex w-full justify-center items-center">Função</label>
            <br>
            <div class="flex">
                @for ($i = 0; $i < $variaveis; $i++)
                    <div class="flex justify-center items-center">
                        <input style="margin: 0px 15px 0px 15px" name="funcao[]" type="number" step="any" class="m-4">
                        <label style="margin: 0px 10px 0px 10px" class="mx-11">X{{ $i + 1 }}</label>
                        @if ($i != $variaveis - 1)
                            {{ '+' }}
                        @endif
                    </div>
                @endfor
            </div>



            <label>Restrições</label>

            @for ($j = 0; $j < $restricoes; $j++)
                <div class="flex justify-center items-center" style="padding: 10px;">

                    @for ($i = 0; $i < $variaveis; $i++)
                        <div class="flex justify-center items-center" style="margin-left: 10px">
                            <input type="number" step="any" name="restricao{{ $j }}[]" class="">
                            <label>X{{ $i + 1 }}</label>
                            @if ($i != $variaveis - 1)
                                {{ '+' }}
                            @endif

                        </div>
                    @endfor

                    <select name="tipo{{ $j }}" class="">
                        <option value="{{ 0 }}">=</option>
                        <option selected value="{{ 1 }}">
                            <= <option value="{{ 2 }}">>=
                        </option>
                    </select>
                    <div class="">
                        <input name="restricao{{ $j }}[]" type="number" step="any" class="">

                    </div>

                </div>
            @endfor

            <br>
            <button type="submit" class="btn btn-default">Calcular</button>
        </form>

    </div>
    @component('components.footer')
    @endcomponent
</body>

</html>
