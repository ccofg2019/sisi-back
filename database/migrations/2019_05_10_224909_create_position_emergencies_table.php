<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePositionEmergenciesTable.
 */
class CreatePositionEmergenciesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('position_emergencies', function(Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('emergency_id');
            $table->foreign('emergency_id')->references('id')->on('emergencies');

            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);

            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('position_emergencies');
	}
}
