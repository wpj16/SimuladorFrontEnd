<?php

namespace App\Support\Facades;

use Illuminate\Support\Facades\Facade;

class HttpResponse extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'HttpResponse';
    }
}
