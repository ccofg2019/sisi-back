<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTableCoordinates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('coordinates');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::create('coordinates', function(Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('zone_id');
			$table->foreign('zone_id')->references('id')->on('zones');
			$table->decimal('latitude', 9, 6);
			$table->decimal('longitude', 9, 6);            
		});
    }
}
