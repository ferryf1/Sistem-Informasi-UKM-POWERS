<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewRangersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newrangers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namalengkap');
            $table->string('nim');
            $table->string('jurusan');
            $table->string('prodi');
            $table->string('email');
            $table->string('nohandphone');
            $table->string('semester');
            $table->longText('alasan');
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
        Schema::dropIfExists('newrangers');
    }
}
