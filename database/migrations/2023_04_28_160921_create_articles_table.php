<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 512);
            $table->text('brief');
            $table->longtext('context');
            $table->string('slug', 512);
            $table->integer('killed');
            $table->integer('arrested');
            $table->string('press');
            $table->string ('link');
            $table->timestamp('date');
            $table->string('meta_title', 512);
            $table->text('meta_keywords');
            $table->text('meta_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
//Title	String
//Brief	Text
//Context	Longtext
//Slug	String
//Killed	Int
//Arrested	Int
//Press	String
//Link	String
//Date	Timestamp
//Meta_title	String
//Meta_keywords	String
//Meta_description	String
