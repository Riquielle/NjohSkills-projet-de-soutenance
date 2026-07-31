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
        Schema::table('users', function (Blueprint $table) {
             $table->string('photo')->nullable()->after('password');

            $table->date('date_naissance')->nullable();

            $table->enum('sexe',['Homme','Femme'])->nullable();

            $table->string('adresse')->nullable();

            $table->string('ville')->nullable();

            $table->string('pays')->nullable();

            $table->text('bio')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'photo',
                'date_naissance',
                'sexe',
                'adresse',
                'ville',
                'pays',
                'bio'
            ]);
        });
    }
};
