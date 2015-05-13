<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use League\Fractal\Resource\Collection;
use League\Fractal\Manager;

$transformer = function ($desk) {
	$latLong = new \ServiceDesk\ValueObject\LatLong($desk->lat, $desk->long);
	$phone = new \ServiceDesk\ValueObject\PhoneNumber($desk->phone);
	return [
		'id' => (int) $desk->id,
		'name' => $desk->name,
		'description' => $desk->description,
		'area' => $desk->area,
		'coverage' => $desk->coverage,
		'image' => url($desk->image),
		'phone' => $phone->humanReadable(),
		'lat' => $latLong->getLat(),
		'long' => $latLong->getLong(),
	];
};

$process = function() use ($app, $transformer) {
	$applications = $app['db']->table('desks')->get();
	$fractal = new Manager();
	$fractal->setSerializer(new \League\Fractal\Serializer\ArraySerializer());
	$resource = new Collection($applications, $transformer, 'desks');
	$data = $fractal->createData($resource)->toArray();
	return response()->json($data);
};

$app->get('/', $process);
$app->get('247desks', $process);
