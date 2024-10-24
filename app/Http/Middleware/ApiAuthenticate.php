<?php
namespace App\Http\Middleware;

use App\Http\Traits\Access;
use App\Http\Traits\HttpResponses;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class ApiAuthenticate extends Middleware
{
    use HttpResponses,
    Access;
  
    public function handle($request, Closure $next, ...$guards)
    {
        if($jwt = $request->cookie('jwt_auth')) {
            $request->headers->set('Authorization', "Bearer $jwt");
        } else {
            return $this->error($request, 'Bạn không có quyền', 401);
        }
        $this->authenticate($request, ['api']);
        return $next($request);
    }

    
}
