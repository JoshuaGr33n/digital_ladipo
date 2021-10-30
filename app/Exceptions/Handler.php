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
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        if($this->isHttpException($exception))
        {
            switch ($exception->getStatusCode()) 
                {
                // not found
                case 404:
                return redirect()->guest('404');
                break;

                // internal error
                case '500':
                return redirect()->guest('404');
                break;

                // not authorized
                 case '403':
                    return redirect()->guest('404');
                    break;
    

                // default:
                //     return $this->renderHttpException($exception);
                // break;
            }
        }
        else
        {
            // return parent::render($request, $exception);
        }
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }
}
