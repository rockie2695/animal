<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
            //return $this->handleException($request, $e);
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($request->expectsJson()) {
            if ($exception instanceof ModelNotFoundException) {
                return response()->json(
                    [
                        'error' => '找不到資源'
                    ],
                    Response::HTTP_NOT_FOUND
                );
            }/* else {
                return response()->json(
                    [
                        'error' => $exception->getMessage() . $exception->getCode() . $exception->getLine() . $exception->__toString()
                    ],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }*/
        }
        return parent::render($request, $exception);
    }
}
