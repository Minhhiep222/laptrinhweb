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
        Schema::create('tbl_products' ,function(Blueprint $table) {
            $table->id(11);
            $table->string('product_name', 255);
            $table->double('price', 55);
            $table->string('description', 255);
            $table->datetime('updated_ad');
            $table->datetime('created_ad');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tbl_products');
    }
};
