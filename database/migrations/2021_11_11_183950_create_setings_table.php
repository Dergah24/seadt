<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setings', function (Blueprint $table) {
            $table->id();
            $table->string('adress')->default('Unvan')->nullable();
            $table->string('phone')->default("00-00-000-000")->nullable();
            $table->string('telefon')->default("+12000000")->nullable();
            $table->string('email')->default("info@seadet.az")->nullable();
            $table->string('facebook')->default('facebook')->nullable();
            $table->string('instagram')->default('instagram')->nullable();
            $table->string('twitter')->default('twitter')->nullable();
            $table->string('youtube')->default('youtube')->nullable();
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
        Schema::dropIfExists('setings');
    }
}
