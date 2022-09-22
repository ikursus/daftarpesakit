<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('triages', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('pesakit_id')->unsigned();
            $table->unsignedBigInteger('pesakit_id');
            $table->foreign('pesakit_id')->references('id')->on('pesakit')->onDelete('cascade');
            $table->string('bilik_rawatan');
            $table->date('tarikh_rawatan')->nullable();
            $table->string('prosedur');
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
        Schema::dropIfExists('triages');
    }
};
