<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopsisNormalisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topsis_normalisasis', function (Blueprint $table) {
            $table->id();
            $table->double('topsis_normalisasi')->nullable();


            $table->unsignedBigInteger('kriteria_id')->index()->nullable();
            $table->unsignedBigInteger('siswa_id')->index()->nullable();
            $table->unsignedBigInteger('inisial_id')->index()->nullable();

            $table->foreign('kriteria_id')
                ->references('id')
                ->on('kriterias')
                ->onDelete('cascade');

            $table->foreign('siswa_id')
                ->references('id')
                ->on('siswas')
                ->onDelete('cascade');

            $table->foreign('inisial_id')
                ->references('id')
                ->on('topsis_inisials')
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
        Schema::dropIfExists('topsis_normalisasis');
    }
}
