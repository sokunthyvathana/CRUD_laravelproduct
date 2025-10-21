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
        Schema::create('categories', function (Blueprint $table) {
            $table->id('categoryID');
            $table->string('category_name')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });
        
        Schema::create('products', function (Blueprint $table) {
            $table->id('ProductID');
            $table->string('ProductName')->unique();
            $table->integer('qty')->default(0);
            $table->decimal('price', 10, 2);
            $table->decimal('amount', 10, 2)->storedAs('qty*price');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('categoryID');
            $table->foreign('categoryID')->references('categoryID')->on('categories')->onDelete('cascade');
        });
    }
  
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
    }
};
