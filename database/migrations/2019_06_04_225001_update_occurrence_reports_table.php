<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateOccurrenceReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE occurrence_reports MODIFY COLUMN status enum('AGUARDANDO VALIDACAO', 'NOVO', 'EM INVESTIGACAO', 'CONCLUIDO', 'ARQUIVADA') NOT NULL DEFAULT 'AGUARDANDO VALIDACAO'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE occurrence_reports MODIFY COLUMN status enum('NOVO', 'EM INVESTIGACAO', 'CONCLUIDO', 'ARQUIVADA') NOT NULL DEFAULT 'NOVO'");
    }
}
