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
        Schema::create('mytable', function (Blueprint $table) {
            $table->id();
            $table->string('Title');
            $table->string('Latitude');
            $table->string('Longitude');
            $table->timestamp('Date_Created');
            $table->string('Alamat');
            $table->string('Gambar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mytable');
    }
};
