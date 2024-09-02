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
        Schema::create('patments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entrollment_id');
            $table->date('paid_date');
            $table->double('amount');
            $table->foreign('entrollment_id')->references('id')->on('entrollments')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patments');
    }
};
