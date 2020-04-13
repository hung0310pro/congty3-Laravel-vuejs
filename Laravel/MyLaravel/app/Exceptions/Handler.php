<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        // test
        // Kiểm tra nếu exception là một instance của class ModelNotFoundException
        if ($exception instanceof ModelNotFoundException) {

            if ($request->ajax()) {
                // Nếu request ở dạng ajax trả về lỗi 404 với thông báo dạng Json
                return response()->json(['error' => 'Không tìm thấy user'], 404);
            } else {
                // Request thông thường trả về view 404
                return response()->view('errors.404_user_not_found', [], 404);
            }
        }
        // end test

        return parent::render($request, $exception);
    }
}
