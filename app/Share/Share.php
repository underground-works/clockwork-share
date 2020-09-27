<?php namespace ClockworkShare\Share;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Spatie\Browsershot\Browsershot;

class Share
{
	public $id;

	protected static $ingestSizeLimit = 8 * 1024 * 1024;

	public function __construct($id)
	{
		$this->id = $id;
	}

	public function delete()
	{
		Storage::disk('share')->delete("{$this->id}.json");
		Storage::disk('share')->delete("images/{$this->id}.png");
	}

	public static function ingest($data)
	{
		if (strlen($data) > static::$ingestSizeLimit) throw new Exceptions\MetadataTooLarge;

		$id = static::assignId($data);

		Storage::disk('share')->put("{$id}.json", $data);

		Browsershot::url(route('share', [ $id, 'screenshot' => true ]))
			->fullPage()
			->deviceScaleFactor(2)
			->optimize()
			->save(Storage::disk('share')->path("images/{$id}.png"));

		return new static($id);
	}

	public static function assignId()
	{
		while (1) {
			$id = Str::lower(Str::random(8));

			if (! Storage::disk('share')->has("{$id}.json")) return $id;
		}
	}
}