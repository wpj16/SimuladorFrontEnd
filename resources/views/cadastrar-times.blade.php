@extends('template.minha-conta')
@section('include-css')
@endsection
@section('menu-breadcrumb', 'Cadastrar Time')
@section('menu-cadastrar-time', 'active bg-gradient-primary')
@section('content')
<main>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Cadastrar Times</h6>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <form class="row" action="{{ route('minha.conta.cadastrar.time.post') }}" method="POST">
                            @csrf
                            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 p-2">
                                <label for="staticEmail2" class="visually-hidden">Nome Time</label>
                                <input type="text" class="form-control" id="time" name="time" placeholder="Time">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 p-2 d-flex justify-content-center">
                                <button type="submit" class="btn bg-gradient-primary  mb-3">Cadastrar Time</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if (empty($times))
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Times Cadastrados</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2 d-flex justify-content-center">
                        <h5>Nenhum time cadastrado.</h5>
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
                                Times Cadastrados
                            </h6>
                        </div>
                    </div>
                    <div class="card-body p-5">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Time</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Data Cadastro</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (($times ?: []) as $time)
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $time['nome'] ?? 'Nome não cadastrado' }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $time['data_criacao'] ?? 'Nome não cadastrado' }}
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
@endsection
@section('include-js')
@endsection
