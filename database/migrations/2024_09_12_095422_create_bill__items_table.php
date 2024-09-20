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
        Schema::create('bill__items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bill_id');  // Foreign key to the bills table
            $table->string('item_name');
            $table->float('item_price');
            $table->integer('item_quantity');
            $table->float('item_total');  // item_price * item_quantity
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill__items');
    }
};
