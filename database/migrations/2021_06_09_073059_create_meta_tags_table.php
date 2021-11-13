<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetaTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_tags_title_description', function (Blueprint $table) {
            $table->id();
            $table->longText('meta_tag');
            $table->string('title');
            $table->longText('description');
            $table->string('page_az');
            $table->string('page_ru');
            $table->string('page_en');
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
        Schema::dropIfExists('meta_tags_title_description');
    }
}
