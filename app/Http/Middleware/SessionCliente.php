<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Support\Traits\Http;

class SessionCliente
{
    use Http;

    public function handle(Request $request, Closure $next, ...$guards)
    {
        $responsejson = $request->wantsJson();
        $responsejson = $responsejson ?: $request->ajax();
        if (empty(session('cliente')) || empty(session('cliente.token'))) {
            if ($responsejson) {
                return $this->responseJson()
                    ->code(204)
                    ->message('Usuário não autenticado, autentique-se!')
                    ->send();
            }
            return $this->redirect('/login/')
                ->code(303)
                ->message('Usuário não autenticado, autentique-se!', true)
                ->send();
        }
        return $next($request);
    }
}
