<?php namespace ClockworkShare;

use Exception;
use Illuminate\Foundation\Exceptions\Handler;

class ExceptionHandler extends Handler
{
	protected $dontReport = [
		//
	];

	protected $dontFlash = [
		'password',
		'password_confirmation',
	];
}
