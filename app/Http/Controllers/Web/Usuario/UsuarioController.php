<?php

namespace App\Http\Controllers\Web\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
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

    public function index(Request $request)
    {
        $request->session()->forget('cliente');
        return parent::view('login')->send();
    }

    public function login(Request $request)
    {
        parent::validate($request)
            ->rules([
                'email' => 'required|email',
                'password' => 'required|min:3',
            ])
            ->attributes([
                'email' => 'E-mail',
                'password' => 'Senha',
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
                    ->post('/login', [
                        'grant_type' => 'password',
                        'client_id' => getenv('API_WEBSERVICE_CLIENT_ID'),
                        'client_secret' => getenv('API_WEBSERVICE_CLIENT_SECRET'),
                        'username' => $data['email'],
                        'password' => $data['password'],
                        'scope' => ''
                    ])
                    ->error(function ($response) use ($request) {
                        return parent::return()
                            ->request($request)
                            ->code(303)
                            ->message($response->message(), true)
                            ->send();
                    })->success(function ($response) use ($request) {
                        $data =  $response->data();
                        session([
                            'cliente.token' => $data['access_token'],
                            'cliente.refresh_token' => $data['refresh_token'],
                            'cliente.ip_address' => parent::http()->ip()
                        ]);
                        return $this->adicionarUsuarioSessao($request);
                    });
            })
            ->validate();
    }

    private function adicionarUsuarioSessao(Request $request)
    {
        parent::http()
            ->get('/minha-conta/meus-dados/')
            ->error(function ($response) use ($request) {
                return parent::return()
                    ->request($request)
                    ->code(303)
                    ->message($response->message(), true)
                    ->send();
            })
            ->success(function ($response) {
                $usuario = $response->data();
                //add usuário na sessão
                session(['cliente.usuario' => $usuario]);
                return parent::redirect(route('minha.conta.campeonato.listar.simulacoes.get'))
                    ->code(200)
                    ->message('Usuário autenticado com sucesso')
                    ->send();
            });
    }
}
