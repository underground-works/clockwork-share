<?php namespace ClockworkShare\Http\Controllers;

use ClockworkShare\Share\Share;
use ClockworkShare\Share\Exceptions\MetadataTooLarge;

class IngestionController extends Controller
{
	public function index()
	{
		try {
			$share = Share::ingest(request('data'));
		} catch (MetadataTooLarge $e) {
			return response()->json([ 'error' => 'metadata-too-large' ], 400);
		}

		return response()->json([
			'shareId'       => $share->id,
			'shareUrl'      => route('share', $share->id),
			'shareImageUrl' => route('image', $share->id)
		]);
	}
}
