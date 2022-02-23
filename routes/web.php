<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\{
    Conta\ContaController,
    Usuario\UsuarioController
};

Route::middleware(['web'])->prefix('/')->group(function () {
    //
    ### Rotas não autenticadas
    Route::get('/login/', [UsuarioController::class, 'index'])->name('login.get');
    //
    Route::post('/login/', [UsuarioController::class, 'login'])->name('login.post');
    //
    //
    ### Rotas autenticadas
    Route::middleware(['session_cliente'])->prefix('/minha-conta/')->group(function () {
        //
        Route::get('/', [ContaController::class, 'viewListarSimulacoes'])->name('minha.conta.campeonato.listar.simulacoes.get');
        //
        //
        Route::prefix('/cadastrar/')->group(function () {
            //
            //
            Route::get('/time/', [ContaController::class, 'viewCadastrarTime'])->name('minha.conta.cadastrar.time.get');
            //
            Route::get('/campeonato/', [ContaController::class, 'viewCadastrarCampeonato'])->name('minha.conta.cadastrar.campeonato.get');
            //
            Route::get('/jogadores/', [ContaController::class, 'viewCadastrarJogador'])->name('minha.conta.cadastrar.jogadores.get');
            //
            Route::post('/time/', [ContaController::class, 'cadastrarTime'])->name('minha.conta.cadastrar.time.post');
            //
            Route::post('/campeonato/', [ContaController::class, 'cadastrarCampeonato'])->name('minha.conta.cadastrar.campeonato.post');
            //
            Route::post('/jogadores/', [ContaController::class, 'cadastrarJogador'])->name('minha.conta.cadastrar.jogador.post');
            //
            //
        });
        //
        //
    });
    //
    //
});
