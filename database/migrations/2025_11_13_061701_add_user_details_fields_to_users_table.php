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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('gender')->nullable(); // or enum
            $table->string('contact_no')->unique();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->boolean('is_donor')->default(false);
            $table->string('blood_group')->nullable();
            $table->string('firebase_uid')->nullable()->unique();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('gender');
            $table->dropColumn('contact_no');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('is_donor');
            $table->dropColumn('blood_group');
            $table->dropColumn('firebase_uid');
        });
    }
};
