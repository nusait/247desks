<?php

use Illuminate\Database\Seeder;

class DeskTableSeeder extends Seeder {

	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('desks')->truncate();

		$data = [
			[
				'name' => 'Allison Hall',
				'phone' => '8474675800',
				'image' => 'media/desks/allison.jpg',
				'description' => 'Res Hall Neighborhood Desks have 24/7 staffing available as well as Campus Safety Officers on staff. Please contact Allison Hall if you are nearby one of the res halls and need some support.',
				'area' => 'South',
				'coverage' => '1835 Hinman|Allison|Chapin|East Fairchild|Jones|Public Affairs (PARC)|Shepard|West Fairchild|Willard',
				'lat' => 42.050482,
				'long' => -87.678197,
			],[
				'name' => 'Foster-Walker Hall',
				'phone' => '8474675801',
				'image' => 'media/desks/fosterwalker.jpg',
				'description' => 'Res Hall Neighborhood Desks have 24/7 staffing available as well as Campus Safety Officers on staff. Please contact Foster Walker if you are nearby one of the res halls and need some support.',
				'area' => 'Mid',
				'coverage' => '626 Emerson|630 Emerson (Hobart House)|720 Emerson (SAI)|1856 Orrington|Foster-Walker|North Mid-Quads|Rogers House|Seabury|South Mid-Quads',
				'lat' => 42.053103,
				'long' => -87.678643,
			],[
				'name' => 'Kemper Hall',
				'phone' => '8474675802',
				'image' => 'media/desks/kemper.jpg',
				'description' => 'Res Hall Neighborhood Desks have 24/7 staffing available as well as Campus Safety Officers on staff. Please contact Kemper Hall if you are nearby one of the res halls and need some support.',
				'area' => 'North',
				'coverage' => '2303 Sheridan (CCS & GREEN House)|Ayers|Bobb|Elder|Goodrich|Kemper|Lindgren|McCulloch|Sargent|Slivka',
				'lat' => 42.060892,
				'long' => -87.674889,
			]
		];

		foreach($data as $desk) {
			DB::table('desks')->insert($desk);
		}
	}

}