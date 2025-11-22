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
        Schema::table('faith_statements', function (Blueprint $table) {
            $table->string('image')->nullable()->after('scripture_references');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faith_statements', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
