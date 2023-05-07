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
        Schema::create('butterflies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_forms_id');
            $table->string('name');
            $table->integer('quantity');           
            $table->timestamps();

            $table->foreign('application_forms_id')->references('id')->on('application_forms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('butterflies');
    }
};
