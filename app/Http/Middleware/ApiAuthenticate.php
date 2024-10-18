<?php
namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
    public function handle($request, Closure $next, ...$guards)
    {
        if($jwt = $request->cookie('jwt_auth')) {
            $request->headers->set('Authorization', "Bearer $jwt");
        }
        $this->authenticate($request, ['api']);
        return $next($request);
    }
}
