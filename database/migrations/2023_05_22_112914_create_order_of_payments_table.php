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
        Schema::create('order_of_payments', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->unsignedBigInteger('application_form_id');
            $table->decimal('payment_amount', 8, 2);
            $table->date('payment_due_date')->nullable();
            $table->string('or_number')->nullable()->unique(); // Add OR Number field
            $table->string('status')->default("unpaid");
            $table->timestamps();
            
            $table->foreign('application_form_id')->references('id')->on('application_forms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_of_payments');
    }
};
