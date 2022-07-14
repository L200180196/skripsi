<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpiritualNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spiritual_nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nis');
            $table->string('kelas');
            $table->enum('taat_beribadah',['SB','PB']);
            $table->enum('syukur',['SB','PB']);
            $table->enum('berdoa',['SB','PB']);
            $table->enum('toleransi',['SB','PB']);
            $table->String('deskripsi');
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
        Schema::dropIfExists('spiritual_nilais');
    }
}