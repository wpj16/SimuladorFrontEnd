@extends('template.minha-conta')
@section('include-css')
@endsection
@section('menu-breadcrumb', 'Cadastrar Jogador')
@section('menu-cadastrar-jogador', 'active bg-gradient-primary')
@section('content')
<main>
    <main>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Cadastrar Jogadores</h6>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <form class="row" action="{{ route('minha.conta.cadastrar.jogador.post') }}" method="POST">
                                @csrf
                                <div class="col-xs-12 col-sm-12 col-md-6 col-xl-6 p-2">
                                    <label for="staticEmail2" class="visually-hidden">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome"
                                        value="{{ old('nome') }}" placeholder="Nome Jogador">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-xl-6 p-2">
                                    <label for="staticEmail2" class="visually-hidden">E-mail</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ old('email') }}" placeholder="Campenato">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-xl-6 p-2">
                                    <label for="staticEmail2" class="visually-hidden">Documento</label>
                                    <input type="text" class="form-control" id="documento" name="documento"
                                        value="{{ old('documento') }}" placeholder="Documento">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-xl-6 p-2">
                                    <label for="staticEmail2" class="visually-hidden">Data nascimento</label>
                                    <input type="text" class="form-control" id="data_nascimento" name="data_nascimento"
                                        value="{{ old('data_nascimento') }}" placeholder="Campenato">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-xl-6 p-2">
                                    <label for="staticEmail2" class="visually-hidden">N° Camisa</label>
                                    <input type="text" class="form-control" id="numero_camisa" name="numero_camisa"
                                        value="{{ old('numero_camisa') }}" placeholder="N° Camisa">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-xl-6 p-2">
                                    <label for="staticEmail2" class="visually-hidden">Time</label>
                                    <select class="form-control" name="time" id="time" value="{{ old('time') }}">
                                        <option>Selecione</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 p-2 d-flex justify-content-center">
                                    <button type="submit" class="btn bg-gradient-primary  mb-3">Cadastrar
                                        Jogdor</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if (empty($jogadores))
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Jogadores Cadastrados</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2 d-flex justify-content-center">
                            <h5>Nenhuma jogador cadastrado</h5>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">
                                    <h6 class="text-white text-capitalize ps-3">Jogadores Cadastrados</h6>
                                </h6>
                            </div>
                        </div>
                        <div class="card-body p-5">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Jogador</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Camisa</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Data Cadastro</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jogadores as $jogador)
                                        <tr>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ $jogador['id'] ?? 'ID não cadastrado' }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ $jogador['nome'] ?? 'Nome não cadastrado' }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ $jogador['numero'] ?? 'Numero da camisa não cadastrado' }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ $jogador['data_criacao'] ?? 'Data criação não cadastrada' }}
                                                </p>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </main>
</main>
@endsection
@section('include-js')
@endsection
