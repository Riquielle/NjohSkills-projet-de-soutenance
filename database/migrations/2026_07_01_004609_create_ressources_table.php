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
        Schema::create('ressources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lecon_id')
              ->constrained()
              ->onDelete('cascade');

            $table->enum('type',[
                'video',
                'pdf',
                'audio',
                'document',
                'image',
                'zip'
            ]);

            $table->string('nom');

            $table->string('fichier');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ressources');
    }
};
