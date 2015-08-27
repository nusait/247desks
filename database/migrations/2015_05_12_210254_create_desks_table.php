<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDesksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('desks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->decimal('lat', 10, 7);
			$table->decimal('long', 10, 7);
			$table->string('name');
			$table->string('phone');
			$table->text('description')->nullable();
			$table->string('area');
			$table->text('coverage');
			$table->string('email');
			$table->string('image')->nullable();
			$table->date('open_date')->nullable();
			$table->date('close_date')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('desks');
	}

}