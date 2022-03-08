<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MarkaVakcine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                // Create table for marka vakcine
                Schema::create('marka_vakcine', function (Blueprint $table) {
                    $table->bigIncrements('id');
                    $table->string('marka')->unique();
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
        Schema::dropIfExists('marka_vakcine');
    }
}
