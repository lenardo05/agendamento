<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEspecialidadeTableMedicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicos', function (Blueprint $table) {
            //
            $table->bigInteger('id_especialidade')->unsigned()->nullable()->after('celular');
            $table->foreign('id_especialidade')->references('id')->on('especialidades')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicos', function (Blueprint $table) {
            //
        });
    }
}
