<?php

namespace App\Http\Middleware;

use App\Constants\AuthConstants;
use App\Http\Controllers\Controller;
use App\Http\Traits\HttpResponses;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthenticate extends Controller
{
    use HttpResponses;

    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($account = auth('sanctum')->user()) {
            auth()->login($account);
            return $next($request);
        }

        return $this->error([], AuthConstants::UNAUTHORIZED);
    }
}