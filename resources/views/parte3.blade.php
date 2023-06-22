<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>!SIMPEX</title>
</head>

<body>
    @component('components.navbar')
    @endcomponent
    <div class="containerpage">
        <div class="w-1/2 h-1/2 flex justify-center flex-col items-center" >
            <div>
                @if ($simplex['objetivo'] == 'min')
                    <p>Minimizar</p>
                @else
                    <p>Maximizar</p>
                @endif
            </div>

            <div class="funcao">
                <p>Função:</p>
                Z
                @foreach ($simplex['funcao'] as $key => $item)
                    @if ($item != 0)
                        @if ($item >= 0)
                            +
                        @endif
                        {{ $item }}{{ $key }}
                    @endif
                @endforeach
                = 0
            </div>
            <br>

            <div class="restricao">
                <p>Restrições:</p>

                @for ($i = 0; $i < $simplex['restricao']; $i++)
                    @foreach ($simplex['restricao' . ($i + 1)] as $key => $item)
                        @if ($key != 'r' . ($i + 1))
                            @if ($item >= 0)
                                +
                            @endif
                            {{ $item }}{{ $key }}
                        @else
                            = {{ $item }}
                        @endif
                    @endforeach
                    <br>
                @endfor
            </div>
            <a href="{{ route('tabela') }}" class="botao">Continuar</a>
        </div>
    </div>
    @component('components.footer')
    @endcomponent
</body>

</html>
