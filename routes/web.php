<?php

use Illuminate\Support\Facades\Route;

Route::get   ('share/{request}.png', 'ImageController@index' )->name('image');
Route::get   ('share/{request}',     'HomeController@index'  )->name('share');
Route::delete('share/{request}',     'DeleteController@index')->name('delete');

Route::post('ingest', 'IngestionController@index')->name('ingest');
