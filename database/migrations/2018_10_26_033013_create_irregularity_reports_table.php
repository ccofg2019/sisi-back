<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateIrregularityReportsTable.
 */
class CreateIrregularityReportsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('irregularity_reports', function(Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('story');
            $table->string('coordinates');
            $table->date('irregularity_date');
            $table->time('irregularity_time');

            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('agent_id')->index()->nullable();
            $table->foreign('agent_id')->references('id')->on('users');

            $table->unsignedInteger('irregularity_type_id')->index();
            $table->foreign('irregularity_type_id')->references('id')->on('irregularity_type');

            $table->unsignedSmallInteger('zone_id')->index();
            $table->foreign('zone_id')->references('id')->on('zones');

            $table->unsignedInteger('logs_id')->index();
            $table->foreign('logs_id')->references('id')->on('logs');

            $table->unsignedInteger('attachments_id')->index();
            $table->foreign('attachments_id')->references('id')->on('attachments');


            $table->timestamps();
            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('irregularity_reports');
	}
}
