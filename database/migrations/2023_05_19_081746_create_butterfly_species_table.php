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
        Schema::create('butterfly_species', function (Blueprint $table) {
            $table->id();
            $table->string('species_type');
            $table->string('class_name');
            $table->string('family_name');
            $table->string('common_name');
            $table->string('scientific_name');
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('butterfly_species');
    }
};
