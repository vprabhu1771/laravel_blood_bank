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
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('requester_id');
            $table->unsignedBigInteger('donor_id')->nullable();

            $table->string('blood_group');
            $table->string('city')->nullable();
            $table->integer('units')->default(1);

            $table->string('status')->default('pending');

            $table->text('message')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_requests');
    }
};
