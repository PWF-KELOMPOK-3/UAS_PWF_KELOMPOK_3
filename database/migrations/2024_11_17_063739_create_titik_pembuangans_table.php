<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitikPembuangansTable extends Migration
{
    public function up()
    {
        Schema::create('titik_pembuangans', function (Blueprint $table) {
            $table->id();
            $table->string('alamat');
            $table->text('url');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('titik_pembuangans');
    }
}
