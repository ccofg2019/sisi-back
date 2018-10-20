<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPoliceReportNumberToOccurrenceReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('occurence_reports', function (Blueprint $table) {

            $table->string('police_report_number');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('occurence_reports', function (Blueprint $table) {

            $table->dropIfExists('police_report_number');

        });
    }
}
