<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInnerEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inner_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->references('id')->on('events')->cascadeOnDelete();
            $table->string("title_az");
            $table->string("title_en");
            $table->string("title_ru");
            $table->longText("content_az");
            $table->longText("content_en");
            $table->longText("content_ru");
            $table->string("slug_az");
            $table->string("slug_en");
            $table->string("slug_ru");

            $table->string('photo');
            $table->integer('deleted')->default(0);
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('inner_events');
    }
}
