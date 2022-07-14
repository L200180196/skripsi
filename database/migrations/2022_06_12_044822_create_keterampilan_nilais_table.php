<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeterampilanNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keterampilan_nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nis');
            $table->string('kelas');
            $table->string('mapel');
            $table->integer('kd1_1')->nullable();
            $table->integer('kd1_2')->nullable();
            $table->integer('kd1_3')->nullable();
            $table->integer('kd1_4')->nullable();
            $table->integer('kd1_5')->nullable();
            $table->integer('kd1_6')->nullable();
            $table->integer('kd1_7')->nullable();
            $table->integer('kd1_8')->nullable();
            $table->integer('kd1_9')->nullable();
            $table->integer('kd2_1')->nullable();
            $table->integer('kd2_2')->nullable();
            $table->integer('kd2_3')->nullable();
            $table->integer('kd2_4')->nullable();
            $table->integer('kd3_1')->nullable();
            $table->integer('kd3_2')->nullable();
            $table->integer('kd3_3')->nullable();
            $table->integer('kd3_4')->nullable();
            $table->integer('kkm')->nullable();
            $table->string('deskripsi');
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
        Schema::dropIfExists('keterampilan_nilais');
    }
}