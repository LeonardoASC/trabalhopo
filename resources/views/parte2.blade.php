<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="flex flex-col">
        <div class="flex justify-center itens-center ">
            <div class="justify-center itens-center">
                @include('components.navbar', ['variaveis' => $variaveis, 'restricoes' => $restricoes])
                <br>
                <form class="flex flex-col justify-center items-center" method="post" action="{{ route('simplex') }}"
                    autocomplete="off">
                    @csrf
                    <div style=" width:20%" class="">
                        <label>Objetivo:</label>
                        <select name="objetivo" class="form-control">
                            <option value="max">Maximizar</option>
                            <option value="min">Minimizar</option>
                        </select>
                    </div>
                    <input type="hidden" name="variavel" value="{{ $variaveis }}">
                    <input type="hidden" name="restricao" value="{{ $restricoes }}">
                    <label>Função</label>
                    <div class="form-inline" style="padding: 2px;">
                        @for ($i = 0; $i < $variaveis; $i++)
                            <div class="form-group">
                                <input name="funcao[]" type="number" step="any" class="form-control">
                                <label>X{{ $i + 1 }}</label>
                                @if ($i != $variaveis - 1)
                                    {{ '+' }}
                                @endif
                            </div>
                        @endfor
                    </div>
                    <br>
                    <label>Restrições</label>

                    @for ($j = 0; $j < $restricoes; $j++)
                        <div class="form-inline" style="padding: 10px;">

                            @for ($i = 0; $i < $variaveis; $i++)
                                <div class="form-group">
                                    <input type="number" step="any" name="restricao{{ $j }}[]"
                                        class="form-control">
                                    <label>X{{ $i + 1 }}</label>
                                    @if ($i != $variaveis - 1)
                                        {{ '+' }}
                                    @endif

                                </div>
                            @endfor

                            <select name="tipo{{ $j }}" class="form-control">
                                <option value="{{ 0 }}">=</option>
                                <option selected value="{{ 1 }}">
                                    <=
                                <option value="{{ 2 }}">>=</option>
                            </select>
                            <div class="form-group">
                                <input name="restricao{{ $j }}[]" type="number" step="any"
                                    class="form-control">

                            </div>

                        </div>
                    @endfor

                    <br>
                    <button type="submit" class="btn btn-default">Calcular</button>
                </form>
            </div>
        </div>
    </div>
    @component('components.footer')
    @endcomponent
</body>

</html>
