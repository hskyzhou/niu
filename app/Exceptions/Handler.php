<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Traits\ResultTrait;

class Handler extends ExceptionHandler
{
    use ResultTrait;
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
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {

        if (env('APP_DEBUG')) {
            // dd($exception);
        }
        $results = [];

        /*验证规则*/
        if( $exception instanceof \Illuminate\Validation\ValidationException ) {

            $message = '系统出错';
            if( $errors = $exception->errors() ) {
                foreach( $errors as $error ) {
                    $message = $error[0];
                    break;
                }
            }

            $results = array_merge($this->results, [
                'code' => '0',
                'message' => $message,
            ]);
        }

        if ($exception instanceof \Prettus\Validator\Exceptions\ValidatorException) {

            $message = '验证出错';
            if( $errors = $exception->getMessageBag()->all() ) {
                foreach( $errors as $error ) {
                    $message = $error;
                    break;
                }
            }

            $results = array_merge($this->results, [
                'code' => '0',
                'message' => $message,
            ]);
        }

        /*查不到数据*/
        if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {

            $results = array_merge($this->results, [
                'code' => '0',
                'message' => '查无数据',
            ]);
        }

        if($exception instanceof \Symfony\Component\Debug\Exception\FatalErrorException ) {
            return response()->view('errors.500', [], 500);
        }

        if( !$results ) {
            /*处理通用异常*/
            $results = array_merge($his->results, [
                'code' => '0',
                'message' => $exception->getMessage(),
            ]);
        }
        /*返回json*/
        if( request()->format() == 'json' ) {
            return response()->json($results);
        }

        

        return parent::render($request, $exception);
    }
}
