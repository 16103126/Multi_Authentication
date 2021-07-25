<?php

namespace App\Exceptions;

use Illuminate\Support\Arr;
use Illuminate\Auth\AuthenticationException;
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
        });
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if($request->expectsJson()){
            return response()->json(['error' => 'unauthenticated.'], 401);
        }

        //$guard = array_get($exception->guards(), 0);
        $guard = Arr::get($exception->guards(), 0);
        switch ($guard){
            case 'customer':
                $login = 'customer.login';
                break;

            case 'employee':
                $login = 'employee.login';
                break;

            case 'manger':
                $login = 'manger.login';
                break;

                default:
                $login = 'customer.login';
                break;
        }

        return redirect()->guest(route($login));
    }
}