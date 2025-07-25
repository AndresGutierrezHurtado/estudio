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
            $table->foreignId('medal_id')->constrained('medals', 'medal_id');
            $table->foreignId('competitor_id')->constrained('competitors', 'competitor_id');
            $table->primary(['medal_id', 'competitor_id']);
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
