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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 512);
            $table->string('type', 512);
            $table->string('slug', 512);
            $table->BigInteger('budget');
            $table->json('members'); // Name, position, image, link
            $table->text('brief');
            $table->timestamp('date_create');
            $table->timestamp('date_close');
            $table->string('meta_name', 512);
            $table->string('meta_keywords', 512);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
