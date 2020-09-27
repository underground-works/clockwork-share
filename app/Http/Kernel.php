<?php namespace ClockworkShare\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
	protected $middleware = [
		\Fruitcake\Cors\HandleCors::class,
		\ClockworkShare\Http\Middleware\CheckForMaintenanceMode::class,
		\Illuminate\Foundation\Http\Middleware\ValidatePostSize::class
	];

	protected $middlewareGroups = [
		'web' => [
		]
	];
}
