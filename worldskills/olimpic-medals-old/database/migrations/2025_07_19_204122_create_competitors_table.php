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
        Schema::create('competitors', function (Blueprint $table) {
            $table->id('competitor_id');
            $table->string('competitor_name');
            $table->string('competitor_lastname');
            $table->text('competitor_description');
            $table->date('competitor_birthdate');
            $table->foreignId('country_id')->constrained('countries', 'country_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitors');
    }
};
