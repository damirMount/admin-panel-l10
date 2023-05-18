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
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->string('avatar');
            $table->string('background');
            $table->string('thumb');
            $table->string('full_name');
            $table->string('shortname');
            $table->timestamp('birthday');
            $table->timestamp('deathdate');
            $table->string('position');
            $table->string('vision');
            $table->text('brief');
            $table->json('items');   // Name,type,price,link,image
            $table->json('citizenship');   // Country,type
            $table->json('honors');   // Name,date
            $table->string('department_name');
            $table->string('family_name');
            $table->boolean('is_fill');
            $table->boolean('is_visible');
            $table->string('meta_title');
            $table->string('meta_keywords');
            $table->string('meta_desc');
            $table->integer('count_killed');
            $table->integer('count_arrested');
            $table->integer('count_budget');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
