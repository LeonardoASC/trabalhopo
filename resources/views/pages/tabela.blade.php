<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>!SIMPLEX</title>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    @component('components.navbar')
    @endcomponent
    <diV class="containerpage">
        <div class="w-[45%] h-full flex flex-col gap-5 border-2 p-5 border-[#E2E2E2] shadow-sm bg-[#f8f6f6] rounded-sm items-center justify-center">
            <h1 class="text-4xl text-[#8DE0CC] uppercase">Interação {{ $simplex['interacao'] }}</h1>
            <div class="w-full my-2 h-px bg-black opacity-10"></div>
            <table class="w-full h-full flex flex-col px-5">
                <thead>
                    <tr class="flex w-full justify-between items-center">
                        <th>Z</th>
                        @for ($i = 0; $i < $simplex['variavel'] + $simplex['restricao']; $i++)
                            <th class="uppercase">x{{ $i + 1 }}</th>
                        @endfor
                        <th>B</th>
                    </tr>
                </thead>
                <tbody>

                    @for ($i = 0; $i < $simplex['restricao']; $i++)
                        <tr class="flex w-full justify-between items-center">
                            <td>0</td>
                            @foreach ($simplex['restricao' . ($i + 1)] as $key => $item)
                                @if ($simplex['restricao' . ($i + 1)] == $simplex[$linha_pivo])
                                    @if ($key == $var)
                                        <td class="p-2 bg-green-400 rounded-full">{{ round($item, 4) }}</td>
                                    @else
                                        <td>{{ round($item, 4) }}</td>
                                    @endif
                                @else
                                    <td>{{ round($item, 4) }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endfor

                    <tr class="flex w-full justify-between items-center">
                        <td>1</td>
                        @foreach ($simplex['funcao'] as $key => $item)
                            @if (isset($simplex['z']) && $key == 'rz')
                                <td class="p-2 bg-red-400 rounded-full">{{ round($item, 4) }}</td>
                            @else
                                <td>{{ round($item, 4) }}</td>
                            @endif
                        @endforeach
                    </tr>

                    @if (!empty($simplex['w']) && $simplex['w']['rw'] != 0)
                        <tr class="flex w-full justify-between">
                            <td>1</td>
                            @foreach ($simplex['w'] as $key => $item)
                                @if (isset($simplex['z']) && $key == 'rz')
                                    <td class="p-2 bg-red-400 rounded-full">{{ round($item, 4) }}</td>
                                @else
                                    <td>{{ round($item, 4) }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endif
                </tbody>
            </table>

            <div class="w-full my-2 h-px bg-black opacity-10"></div>

            @if (isset($simplex['z']))
                <p class="my-4">A solução ótima é Z =

                    @if ($simplex['objetivo'] == 'max')
                        {{ round($simplex['z'], 4) }}
                    @else
                        {{-- {{round($simplex['z'] * -1,4)}} --}}
                        {{ round($simplex['z'], 4) }}
                    @endif
                </p>
                <a href="{{ route('inicio') }}" class="botao">Novo Problema</a>
            @else
                <p>Pivo = {{ $simplex[$linha_pivo][$var] }}</p>
                <a href="{{ route('pages.tabela') }}" class="botao">Continuar</a>
            @endif
            {{--
                <p>Menor valor de Z = {{$min}}</p>
                <p>Coluna = {{$var}}</p>
                <p>Pivo = {{$simplex[$linha_pivo][$var]}}</p>
                --}}
        </div>
    </div>
    @component('components.footer')
    @endcomponent
</body>

</html>
