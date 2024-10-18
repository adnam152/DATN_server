<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cookie;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    // protected $timeExpired = 60 * 24;
    // protected function createCookie($name, $value, $minutes = null, $path = null, $domain = null, $secure = false, $httpOnly = true, $sameSite = 'none')
    // {
    //     $timeEx = $minutes === null ? $this->timeExpired : $minutes;
    //     return Cookie::make($name, $value, $timeEx, $path, $domain, $secure, $httpOnly, false, $sameSite);
    // }
}
