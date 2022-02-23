@extends('template.minha-conta')
@section('include-css')
@endsection
@section('menu-breadcrumb', 'Simulações')
@section('menu-campeonato-simulado', 'active bg-gradient-primary')@section('content')
<main>
    <div class="container-fluid py-4">
        @if (empty($campeonatos))
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Não há campeonatos simulados</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2 d-flex justify-content-center">
                        <h5>Nenhuma simulação encontrada</h5>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            @foreach ($campeonatos as $campeonato)
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">
                                {{ $campeonato['id'] ?? '' }} - {{ $campeonato['nome'] ?? 'Sem nome cadastrado' }}
                            </h6>
                        </div>
                    </div>
                    <div class="card-body p-5">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Time A</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Resultado</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Time B</th>

                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Campeão</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                            Tipo Jogo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (($campeonato['sorteios'] ?? []) as $jogos)
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $jogos['time_a']['nome'] ?? 'Nome não cadastrado' }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $jogos['gols_time_a'] }} X {{ $jogos['gols_time_b'] }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $jogos['time_b']['nome'] ?? 'Nome não cadastrado' }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ (($jogos['time_a']['id'] ?? null) == ($jogos['time_ganhador'] ?? false))? $jogos['time_a']['nome'] : $jogos['time_b']['nome']}}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            @switch($jogos['etapa'])
                                            @case(0)
                                            Terceiro Lugar
                                            @case(1)
                                            Final
                                            @break
                                            @case(2)
                                            Semi Final
                                            @break
                                            @case(3)
                                            Quartas de Final
                                            @break
                                            @endswitch
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</main>
@endsection
@section('include-js')
@endsection
