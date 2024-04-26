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
        Schema::create('uses_profiles', function (Blueprint $table) {
            $table -> id();
            $table -> Integer('user_id');
            $table -> string('first_name');
            $table -> string('last_name');
            $table -> enum('sex', ['male', 'female']);
            $table -> string('phone');
            $table -> string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uses_profiles');
    }
};
