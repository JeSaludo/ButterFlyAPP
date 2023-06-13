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
        Schema::table('application_forms', function (Blueprint $table) {
            $table->string('remarks')->nullable();
            $table->date('released_date')->nullable();
            $table->string('release_by')->nullable();
            $table->date('expiration_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('application_forms', function (Blueprint $table) {
            $table->dropColumn('remarks');
            $table->dropColumn('released_date')->nullable();
            $table->dropColumn('release_by');
            $table->dropColumn('expiration_date');
          
        });
    }
};
