<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZamestnanciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zamestnanci', function (Blueprint $table) {
            $table->id();
            $table->string('meno');
            $table->string('priezvisko');
            $table->string('email');
            $table->string('telefon');
            $table->date('zamestnany_od');
            $table->date('zamestnany_do');
            $table->unsignedBigInteger('oddelenie_id');
            $table->foreign('oddelenie_id')->references('id')->on('oddelenies');
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
        Schema::dropIfExists('zamestnanci');
    }
}
