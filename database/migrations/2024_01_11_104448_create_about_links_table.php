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
        Schema::create('about_links', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('text', 100);
            $table->unsignedBigInteger('about_category_id');
            $table->timestamps();
    
            $table->foreign('about_category_id')
                  ->references('id')
                  ->on('about_categories')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_links');
    }
};
