<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clears', function (Blueprint $table) {
            //$table->bigIncrements('c_id');
            $table->bigIncrements('id');
            $table->bigInteger('u_id');
            $table->bigInteger('m_id');
            $table->integer('info');
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
        Schema::dropIfExists('clears');
    }
}
