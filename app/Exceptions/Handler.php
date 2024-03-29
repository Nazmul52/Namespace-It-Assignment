<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpFoundation\Response;
class Handler extends ExceptionHandler {
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
	public function report(Exception $exception) {
		parent::report($exception);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Exception  $exception
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $exception) {
		return parent::render($request, $exception);
	}

	/**
	 * Convert an authentication exception into a response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Illuminate\Auth\AuthenticationException  $exception
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	// protected function unauthenticated($request, AuthenticationException $exception){
	//     if($request->exceptsJson()){
	//         return response()->json(['error'->'Unauthenticated.'], 401);
	//     }
	//     $guard = array_get($exception->guards(), 0);

	//     switch ($guard) {
	//         case 'employeer':
	//              return redirect()->guest(route('employeer.login'));
	//             break;

	//         default:
	//            return redirect()->guest(route('login'));
	//             break;
	//     }

	// }
}
