<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelDiampusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapel_diampus', function (Blueprint $table) {
            $table->id();
            $table->integer('nip_guru')->nullable();
            $table->string('mapel');
            $table->string('kelas');
            $table->enum('status',['aktif','non-aktif']);
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
        Schema::dropIfExists('mapel_diampus');
    }
}