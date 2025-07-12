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
        Schema::create('calls', function (Blueprint $table) {
            $table->id('call_id');
            $table->string('call_name');
            $table->string('call_description');
            $table->decimal('call_money', 10, 0);
            $table->enum('call_type', ['mensual', 'trimestral', 'semestral', 'anual']);
            $table->integer('call_places');
            $table->date('call_start');
            $table->date('call_end');
            $table->timestamps();
        });

        Schema::create('postulations', function (Blueprint $table) {
            $table->id('postulation_id');
            $table->foreignId('student_id')->constrained('students', 'student_id');
            $table->foreignId('call_id')->constrained('calls', 'call_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calls');
        Schema::dropIfExists('postulations');
    }
};
