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
        //
        Schema::create('tbl_orders' ,function(Blueprint $table) {
            $table->id(11);
            $table->integer('user_id');
            $table->datetime('updated_ad')->current();
            $table->datetime('created_ad')->current();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tbl_orders');
    }
};
