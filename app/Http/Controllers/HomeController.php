<?php namespace ClockworkShare\Http\Controllers;

class HomeController extends Controller
{
	public function index()
	{
		return response()->file(public_path('share/index.html'));
	}
}
