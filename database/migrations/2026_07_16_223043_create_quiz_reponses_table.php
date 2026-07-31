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
        Schema::create('quiz_reponses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_tentative_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('question_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('reponse_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->boolean('est_correcte');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_reponses');
    }
};
