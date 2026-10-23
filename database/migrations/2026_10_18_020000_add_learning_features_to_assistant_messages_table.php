<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('assistant_messages', function (Blueprint $table) {
            $table->string('mode')->default('assistant')->after('role');
            $table->string('language', 5)->default('fr')->after('mode');
            $table->unsignedSmallInteger('exam_duration')->nullable()->after('language');
            $table->string('attachment_path')->nullable()->after('content');
        });
    }

    public function down(): void
    {
        Schema::table('assistant_messages', function (Blueprint $table) {
            $table->dropColumn(['mode', 'language', 'exam_duration', 'attachment_path']);
        });
    }
};
