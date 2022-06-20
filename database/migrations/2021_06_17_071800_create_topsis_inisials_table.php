<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopsisInisialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topsis_inisials', function (Blueprint $table) {
            $table->id();
            $table->string('nilai_awal')->nullable();
            $table->double('inisialisasi')->nullable();

            $table->unsignedBigInteger('kriteria_id')->index()->nullable();
            $table->unsignedBigInteger('siswa_id')->index()->nullable();

            $table->foreign('kriteria_id')
                ->references('id')
                ->on('kriterias')
                ->onDelete('cascade');

            $table->foreign('siswa_id')
                ->references('id')
                ->on('siswas')
                ->onDelete('cascade');

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
        Schema::dropIfExists('topsis_inisials');
    }
}
