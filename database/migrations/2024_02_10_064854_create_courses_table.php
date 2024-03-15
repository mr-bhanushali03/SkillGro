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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('level');
            $table->decimal('actualPrice', 8, 2);
            $table->decimal('sellingPrice', 8, 2);
            $table->string('category');
            $table->text('description');
            $table->string('banner');
            $table->string('curriculumTitle');
            $table->text('curriculumDescription');
            $table->json('tutorials');
            $table->string('user_id');
            $table->string('student')->default(0);
            $table->integer('rating')->default(0);
            $table->boolean('trending')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
