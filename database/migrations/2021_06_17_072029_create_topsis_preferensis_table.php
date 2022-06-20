<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopsisPreferensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topsis_preferensis', function (Blueprint $table) {
            $table->id();

            $table->double('topsis_preferensi')->nullable();

            $table->unsignedBigInteger('kriteria_id')->index()->nullable();
            $table->unsignedBigInteger('siswa_id')->index()->nullable();
            $table->unsignedBigInteger('jarak_id')->index()->nullable();

            $table->foreign('kriteria_id')
                ->references('id')
                ->on('kriterias')
                ->onDelete('cascade');

            $table->foreign('siswa_id')
                ->references('id')
                ->on('siswas')
                ->onDelete('cascade');

            $table->foreign('jarak_id')
                ->references('id')
                ->on('topsis_jaraks')
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
        Schema::dropIfExists('topsis_preferensis');
    }
}
