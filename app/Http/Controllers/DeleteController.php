<?php namespace ClockworkShare\Http\Controllers;

use ClockworkShare\Share\Share;

class DeleteController extends Controller
{
	public function index($request)
	{
		(new Share($request))->delete();

		return [ 'deleted' => $request ];
	}
}
