<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCoordinatesTable.
 */
class CreateCoordinatesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coordinates', function(Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('zone_id');
			$table->foreign('zone_id')->references('id')->on('zones');
			$table->decimal('latitude', 9, 6);
			$table->decimal('longitude', 9, 6);            
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('coordinates');
	}
}
