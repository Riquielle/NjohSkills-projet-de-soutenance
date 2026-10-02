<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            // L'apprenant concerné par la conversation
            $table->foreignId('apprenant_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Le formateur concerné
            $table->foreignId('formateur_id')
                ->constrained('formateurs')
                ->cascadeOnDelete();

            // L'utilisateur qui a envoyé le message
            $table->foreignId('expediteur_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->text('message');

            $table->boolean('lu')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};