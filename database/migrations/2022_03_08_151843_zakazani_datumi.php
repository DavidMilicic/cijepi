<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ZakazaniDatumi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                // Create table for zakazani datumi
                Schema::create('zakazani_datumi', function (Blueprint $table) {
                    $table->bigIncrements('id');
                    $table->date('datum')->unique();
                    $table->integer('broj');
                    $table->string('marka');
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
        Schema::dropIfExists('zakazani_datumi');
    }
}