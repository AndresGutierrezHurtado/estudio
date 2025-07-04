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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('room_id');
            $table->string('room_name');
            $table->timestamps();
        });

        Schema::create('schedules', function (Blueprint $table) {
            $table->id('schedule_id');
            $table->foreignId('room_id');
            $table->integer('schedule_day');
            $table->time('schedule_start');
            $table->time('schedule_end');
        });

        Schema::create('books', function (Blueprint $table) {
            $table->id('book_id');
            $table->foreignId('room_id');
            $table->foreignId('schedule_id');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('schedules');
        Schema::dropIfExists('books');
    }
};
