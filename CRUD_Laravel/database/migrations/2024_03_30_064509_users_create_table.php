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
        //tạo bản 
        Schema::create('tbl_users', function(Blueprint $table) {
            $table->id(11);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('img');
            $table->string('user_pass', 255);
            $table->datetime('updated_ad');
            $table->datetime('created_ad');
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('tbl_users');
    }
};
