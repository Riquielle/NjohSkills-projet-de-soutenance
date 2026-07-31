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
        Schema::create('ressource_progressions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
              ->constrained()
              ->cascadeOnDelete();

            $table->foreignId('ressource_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->boolean('terminee')->default(false);

            $table->timestamp('date_fin')->nullable();

            

            $table->unique(['user_id','ressource_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ressource_progressions');
    }
};
