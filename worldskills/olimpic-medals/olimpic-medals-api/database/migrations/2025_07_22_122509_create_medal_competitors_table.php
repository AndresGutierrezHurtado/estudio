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
        Schema::create('medal_competitors', function (Blueprint $table) {
            $table->foreignId('competitor_id')->constrained('competitors', 'competitor_id');
            $table->foreignId('medal_id')->constrained('medals', 'medal_id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medal_competitors');
    }
};
