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
            $table->json('scripture_references_vi')->nullable()->after('scripture_references');

            $table->renameColumn('scripture_references', 'scripture_references_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faith_statements', function (Blueprint $table) {
            $table->renameColumn('scripture_references_en', 'scripture_references');

            $table->dropColumn('scripture_references_vi');
        });
    }
};
