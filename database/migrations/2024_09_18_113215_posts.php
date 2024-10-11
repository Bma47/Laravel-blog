<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('title');
            $table->longText('description');
            $table->string('image_path');
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Add this line for category_id

            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });


    }


    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained(); // Add the column back on rollback
        });
    }
};
