<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title_az');
            $table->longText('content_az');
            $table->string('title_ru');
            $table->longText('content_ru');
            $table->string('title_en');
            $table->longText('content_en');
            $table->string("slug_az");
            $table->string("slug_en");
            $table->string("slug_ru");


            $table->string('image');
            $table->integer('deleted')->default(0);
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
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
        Schema::dropIfExists('events');
    }
}
