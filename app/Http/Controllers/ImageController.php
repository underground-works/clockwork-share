<?php namespace ClockworkShare\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
	public function index($request)
	{
		return response()->file(Storage::drive('share')->path("images/{$request}.png"));
	}
}
