<?php

namespace App\Exceptions;

use App\Response;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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

    public function render($request, Throwable $e)
    {
        if ($e instanceof ValidationException) {
            return $this->processValidation($e);
        }

        if ($e instanceof AuthorizationException) {
            return $this->processForbidden($e);
        }

        if ($e instanceof ModelNotFoundException || $e instanceof NotFoundHttpException) {
            return $this->processNotFound($e);
        }

        if ($e instanceof MethodNotAllowedHttpException) {
            return $this->processMethodNotAllowed($e);
        }

        dd($e);
        return parent::render($request, $e);
    }

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function processNotFound(Throwable $e)
    {
        return Response::fail(null, 'Not found', 404);
    }

    private function processForbidden(Throwable $e)
    {
        return Response::fail(null, 'You are not allowed to perform this action', 403);
    }

    private function processValidation(ValidationException $exception)
    {
        $data = array_merge(
            $exception->validator->errors()->messages(),
            [
                '_form' => 'Invalid Form'
            ]
        );

        return Response::fail($data, null, 400);
    }

    private function processMethodNotAllowed(MethodNotAllowedHttpException $e)
    {
        return Response::fail(null, 'Method not allowed', 405);
    }
}
