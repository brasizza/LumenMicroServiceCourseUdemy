<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function render($request, Exception $exception)
    {

        if($exception instanceof HttpException){
            $code = $exception->getStatusCode();
            $message = Response::$statusTexts[$code];

            return $this->errorResponse($message,$code);
        }

        if($exception instanceof ModelNotFoundException){

            $model = strtolower(class_basename($exception->getModel()));

            return $this->errorResponse("Nenhum registro com este ID encontrado em [{$model}]",Response::HTTP_NOT_FOUND);
        }

        if($exception instanceof AuthorizationException){
            return $this->errorResponse($exception->getMessage(),RESPONSE::HTTP_FORBIDDEN);
        }


        if($exception instanceof AuthenticationException){
            return $this->errorResponse($exception->getMessage(),RESPONSE::HTTP_FORBIDDEN);
        }

        if($exception instanceof ValidationException){

            $erros = $exception->validator->errors()->getMessages();
            return $this->errorResponse($erros,RESPONSE::HTTP_UNPROCESSABLE_ENTITY);
        }
        if(env('APP_DEBUG') == false){
        return $this->errorResponse("ERRO!, TENTE NOVAMENTE MAIS TARDE",RESPONSE::HTTP_INTERNAL_SERVER_ERROR);
        }
        return parent::render($request, $exception);
    }
}
