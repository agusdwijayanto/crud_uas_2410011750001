<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('modul_pembelajarans', function (Blueprint $table) {
            $table->enum('status', ['active', 'archived'])->default('active')->after('file');
        });
    }

    public function down(): void
    {
        Schema::table('modul_pembelajarans', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};