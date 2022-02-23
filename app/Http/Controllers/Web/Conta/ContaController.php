<?php

namespace App\Http\Controllers\Web\Conta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContaController extends Controller
{

    public function __construct()
    {
        parent::http()
            ->before(function ($http) {
                $http
                    ->withToken(session('cliente.token'))
                    ->withHeaders([
                        'Client-Ip' =>  session('cliente.ip_address'),
                        'Client-Localization' => json_encode(session('cliente.geolocation') ?: ['latitude' => 0, 'longitude' => 0]),
                    ]);
            });
    }

    public function viewListarSimulacoes(Request $request)
    {
        parent::http()
            ->get('/minha-conta/meus-campeonatos/')
            ->error(function ($response) use ($request) {
                return parent::view('campeonatos-simulados', ['campeonatos' => []])
                    ->request($request)
                    ->code(303)
                    ->message($response->message(), true)
                    ->send();
            })->success(function ($response) {
                $data =  $response->data();
                return parent::view('campeonatos-simulados', ['campeonatos' => $data])->send();
            });
    }

    public function viewCadastrarTime(Request $request)
    {
        parent::http()
            ->get('/minha-conta/listar/times/')
            ->error(function ($response) use ($request) {
                return parent::view('cadastrar-times', ['times' => []])
                    ->request($request)
                    ->code(303)
                    ->message($response->message(), true)
                    ->send();
            })->success(function ($response) {
                $data =  $response->data();
                return parent::view('cadastrar-times', ['times' => $data])->send();
            });
    }

    public function viewCadastrarCampeonato(Request $request)
    {
        parent::http()
            ->get('/minha-conta/meus-campeonatos/')
            ->error(function ($response) use ($request) {
                return parent::view('cadastrar-campeonatos', ['campeonatos' => []])
                    ->code(303)
                    ->message($response->message(), true)
                    ->send();
            })->success(function ($response) {
                $data =  $response->data();
                return parent::view('cadastrar-campeonatos', ['campeonatos' => $data])->send();
            });
    }

    public function viewCadastrarJogador(Request $request)
    {
        parent::http()
            ->get('/minha-conta/listar/jogadores/')
            ->error(function ($response) use ($request) {
                return parent::view('cadastrar-jogadores', ['jogadores' => []])
                    ->request($request)
                    ->code(303)
                    ->message($response->message(), true)
                    ->send();
            })->success(function ($response) {
                $data =  $response->data();
                return parent::view('cadastrar-jogadores', ['jogadores' => $data])->send();
            });
    }

    public function cadastrarTime(Request $request)
    {
        parent::validate($request)
            ->rules([
                'time' => 'required|min:5',
            ])
            ->attributes([
                'time' => 'Time',
            ])
            ->error(function ($errors) use ($request) {
                return parent::return()
                    ->request($request)
                    ->code(303)
                    ->message($errors, true)
                    ->send();
            })
            ->success(function ($data) use ($request) {
                parent::http()
                    ->post('/minha-conta/cadastrar/time/', $data)
                    ->error(function ($response) use ($request) {
                        return parent::return()
                            ->request($request)
                            ->code(303)
                            ->message($response->message(), true)
                            ->send();
                    })->success(function ($response) {
                        return parent::return()
                            ->code(200)
                            ->message($response->message(), true)
                            ->send();
                    });
            })
            ->validate();
    }

    public function cadastrarCampeonato(Request $request)
    {
        parent::validate($request)
            ->rules([
                'campeonato' => 'required|min:5',
                'times' => 'required|array',
                'times.*' => 'numeric',
            ])
            ->attributes([
                'times' => 'Times',
                'campeonato' => 'Campeonato',
            ])
            ->error(function ($errors) use ($request) {
                return parent::return()
                    ->request($request)
                    ->code(303)
                    ->message($errors, true)
                    ->send();
            })
            ->success(function ($data) use ($request) {
                parent::http()
                    ->post('/minha-conta/cadastrar/campeonato/', $data)
                    ->error(function ($response) use ($request) {
                        return parent::return()
                            ->request($request)
                            ->code(303)
                            ->message($response->message(), true)
                            ->send();
                    })->success(function ($response) {
                        return parent::return()
                            ->code(200)
                            ->message($response->message(), true)
                            ->send();
                    });
            })
            ->validate();
    }

    public function cadastrarJogador(Request $request)
    {
        parent::validate($request)
            ->rules([
                'time' => 'required|numeric',
                'nome' => 'required|min:5',
                'email' => 'required|email',
                'documento' => 'required|brasil:cpf',
                'data_nascimento' => 'required|date_format:d/m/Y',
                'numero_camisa' => 'required|numeric'
            ])
            ->attributes([
                'time' => 'Time',
                'nome' => 'Nome',
                'email' => 'E-mail',
                'documento' => 'Cpf',
                'data_nascimento' => 'Data Nascimento',
                'numero_camisa' => 'N° Camisa'
            ])
            ->error(function ($errors) use ($request) {
                return parent::return()
                    ->request($request)
                    ->code(303)
                    ->message($errors, true)
                    ->send();
            })
            ->success(function ($data) use ($request) {

                parent::http()
                    ->post('/minha-conta/cadastrar/jogador/', $data)
                    ->error(function ($response) use ($request) {
                        return parent::return()
                            ->request($request)
                            ->code(303)
                            ->message($response->message(), true)
                            ->send();
                    })->success(function ($response) {
                        return parent::return()
                            ->code(200)
                            ->message($response->message(), true)
                            ->send();
                    });
            })
            ->validate();
    }
}
