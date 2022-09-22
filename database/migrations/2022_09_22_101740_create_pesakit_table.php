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
        Schema::create('pesakit', function (Blueprint $table) {
            $table->id(); // big integer primary key
            $table->string('mrn')->unique();
            $table->string('nama_pesakit');
            $table->string('jenis_pengenalan');
            $table->string('id_pengenalan')->unique();
            $table->string('kewarganegaraan')->nullable();
            $table->string('jenis_appointment');
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesakit');
    }
};
