<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($request->is('api/*')) {
            if ($exception instanceof \Illuminate\Auth\AuthenticationException) {
                return response()->json([
                    'error' => 'Unauthorized',
                    'message' => 'Bạn cần phải đăng nhập để truy cập tài nguyên này.'
                ], 401);
            }
    
            if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
                return response()->json([
                    'error' => 'Not Found',
                    'message' => 'API endpoint không tồn tại.'
                ], 404);
            }
    
            if ($exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {
                return response()->json([
                    'error' => 'Method Not Allowed',
                    'message' => 'Phương thức này không được hỗ trợ cho yêu cầu của bạn.'
                ], 405);
            }
    
            if ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {
                return response()->json([
                    'error' => 'Internal Server Error',
                    'message' => 'Đã có lỗi xảy ra. Vui lòng thử lại sau.'
                ], 500);
            }
            
        }
    
        return parent::render($request, $exception);
    }
}
