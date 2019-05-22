<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AlterColumnStatusEmergenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::statement("ALTER TABLE emergencies MODIFY COLUMN status enum('ALERTA', 'PERIGO', 'FINALIZADO', 'ATENDENDO') NOT NULL DEFAULT 'ALERTA'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::statement("ALTER TABLE emergencies MODIFY COLUMN status enum('ALERTA', 'PERIGO', 'FINALIZADO') NOT NULL DEFAULT 'ALERTA'");
    }
}
