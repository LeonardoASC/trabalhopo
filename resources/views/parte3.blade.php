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
        <div class="w-1/2 h-1/2 flex justify-center flex-col items-center">
            <div class="w-full text-center uppercase text-xl text-[#8DE0CC]">
                @if ($simplex['objetivo'] == 'min')
                    <p>Minimizar</p>
                @else
                    <p>Maximizar</p>
                @endif
            </div>

            <div class="w-full h-px bg-black my-2"></div>

            <div class="w-full text-center">
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

            <div class="mt-4 text-center">
                <p class="text-[#8DE0CC] text-xl">RESTRIÇÕES</p>

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

            <div class="w-full h-px bg-black my-4"></div>

            <a href="{{ route('tabela') }}" class="botao">Continuar</a>
        </div>
    </div>
    @component('components.footer')
    @endcomponent
</body>

</html>
