<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    @include('components.navbar', ['variaveis' => $variaveis, 'restricoes' => $restricoes])
    <div class="containerpage">
        <div class="">
            <form
                class="flex flex-col gap-2 border-2 p-5 border-[#E2E2E2] shadow-sm bg-[#f8f6f6] rounded-sm items-center h-full justify-center text-base"
                method="post" action="{{ route('simplex') }}" autocomplete="off">
                @csrf

                <div class="flex w-full items-center gap-3 ">
                    <label>Objetivo:</label>
                    <select name="objetivo" class="selects">
                        <option value="max">Maximizar</option>
                        <option value="min">Minimizar</option>
                    </select>
                </div>

                <input type="hidden" name="variavel" value="{{ $variaveis }}">
                <input type="hidden" name="restricao" value="{{ $restricoes }}">

                <div class="w-full bg-black my-1 h-px opacity-10"></div>
                <label class="flex w-full justify-center items-center uppercase">Função</label>
                <div class="flex">
                    @for ($i = 0; $i < $variaveis; $i++)
                        <div class="flex justify-center items-center">
                            <input name="funcao[]" type="number" step="any" class="inputsec">
                            <label class="mr-1">X{{ $i + 1 }}</label>
                            @if ($i != $variaveis - 1)
                                <p class="mx-2">{{ '+' }}</p>
                            @endif
                        </div>
                    @endfor
                </div>
                <div class="w-full bg-black my-1 h-px opacity-10"></div>

                <label class="uppercase">Restrições</label>

                @for ($j = 0; $j < $restricoes; $j++)
                    <div class="flex justify-center items-center" style="padding: 10px;">
                        @for ($i = 0; $i < $variaveis; $i++)
                            <div class="flex justify-center items-center">
                                <input type="number" step="any" name="restricao{{ $j }}[]"
                                    class="inputsec">
                                <label class="mr-1">X{{ $i + 1 }}</label>
                                @if ($i != $variaveis - 1)
                                    <p class="mx-2">{{ '+' }}</p>
                                @endif

                            </div>
                        @endfor
                        <select name="tipo{{ $j }}" class="selects mx-2">
                            <option value="{{ 0 }}">=</option>
                            <option selected value="{{ 1 }}">
                                <= <option value="{{ 2 }}">>=
                            </option>
                        </select>
                        <div class="">
                            <input name="restricao{{ $j }}[]" type="number" step="any"
                                class="inputsec">
                        </div>
                    </div>
                @endfor
                <button type="submit" class="botao">Calcular</button>
            </form>
        </div>
    </div>
    @component('components.footer')
    @endcomponent
</body>

</html>
