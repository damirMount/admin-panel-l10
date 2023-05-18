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
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string('name', 512);
            $table->string('slug', 512);
            $table->integer('budget');
            $table->integer('count_killed');
            $table->integer('count_arrested');
            $table->json('member');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
//Name	String
//Slug	String
//Budget	Int
//Count_killed	Int
//Count_arrested	Int
//Member	Json
