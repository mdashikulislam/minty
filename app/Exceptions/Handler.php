<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
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
        //
    }
   public function render($request, Throwable $e)
   {
       if ($this->isHttpException($e)) {
           switch ($e->getStatusCode()) {
               // not authorized
               case '403':
                   return self::errorResponse($e->getMessage(), 403);
                   break;
               // not found
               case '404':
                   return  self::errorResponse($e->getMessage(), 404);
                   break;
               // internal error
               case '500':
                   return  self::errorResponse($e->getMessage(), 500);
                   break;
               default:
                   return  self::errorResponse("Handler has returned an error", 502);
                   break;
           }
       }
       return parent::render($request, $e);
   }
    public function errorResponse($message, $code)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'code' => $code
        ]);
    }
}
