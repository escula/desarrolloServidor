<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
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

    //--------------//cosas que no se si funcionan------------

    //Agregamos esta para poder personalizar los mensajes de errores
    // protected function invalidJson($request, ValidationException $exception)
    // {
    //     return response()->json([
    //         'message' => __('Los datos proporcionados no son validos'),
    //         'errors' => $exception->errors(),
        
    //     ], $exception->status);
    // }
}