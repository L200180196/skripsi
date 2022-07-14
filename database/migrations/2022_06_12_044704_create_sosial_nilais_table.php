<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSosialNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sosial_nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nis');
            $table->string('kelas');
            $table->enum('jujur',['SB','PB']);
            $table->enum('disiplin',['SB','PB']);
            $table->enum('tanggung_jawab',['SB','PB']);
            $table->enum('santun',['SB','PB']);
            $table->enum('peduli',['SB','PB']);
            $table->enum('percaya_diri',['SB','PB']);
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
        Schema::dropIfExists('sosial_nilais');
    }
}