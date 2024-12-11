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
        Schema::create('products', function (Blueprint $table) {

            $table->id();

            $table->foreignId('brand_id')->references('id')->on('brands')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('category_id')->references('id')->on('categories')->constrained()->cascadeOnUpdate()->cascadeOnDelete();

            $table->string('name',100)->unique();
            $table->string('description');

            $table->decimal('price', 12, 2);
            $table->integer('stock');


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
