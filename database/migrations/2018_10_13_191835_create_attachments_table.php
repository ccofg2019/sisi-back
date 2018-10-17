<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAttachmentsTable.
 */
class CreateAttachmentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attachments', function(Blueprint $table) {

            $table->increments('id');
            $table->string('url')->unique();
            $table->string('attachable_type');

            $table->unsignedInteger('user_id')->inded();
            $table->unsignedInteger('attachable_id')->index();

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
		Schema::dropIfExists('attachments');
	}
}
