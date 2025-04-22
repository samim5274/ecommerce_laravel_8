<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->string('sku');
            $table->string('unit'); // kg, litre, piece
            $table->string('unitValue'); // e.g. 1kg, 3litres
            $table->decimal('sellingPrice');
            $table->decimal('purchasePrice');
            $table->decimal('discount')->nullable(); // percentage
            $table->decimal('tax')->nullable(); // percentage
            $table->string('image')->nullable(); // path to uploaded image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
