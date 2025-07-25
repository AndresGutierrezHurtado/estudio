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
        Schema::create('medals', function (Blueprint $table) {
            $table->id('medal_id');
            $table->enum('medal_type', ['gold', 'silver', 'bronze']);
            $table->string('medal_sport');
            $table->bigInteger('medal_year');
            $table->foreignId('country_id')->constrained('countries', 'country_id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medals');
    }
};
