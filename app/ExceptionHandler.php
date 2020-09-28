<?php namespace ClockworkShare;

use Exception;
use Illuminate\Foundation\Exceptions\Handler;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ExceptionHandler extends Handler
{
	protected $dontReport = [
		//
	];

	protected $dontFlash = [
		'password',
		'password_confirmation',
	];

	protected function renderHttpException(HttpExceptionInterface $e)
	{
		// we don't want to render http exceptions at all, just return the correct http status code
		return response()->make('', $e->getStatusCode(), $e->getHeaders());
	}
}
