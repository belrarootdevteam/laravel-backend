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
        Schema::create('purchase_order_products', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->decimal('price');
            $table->decimal('total_price');
            $table->timestamps();

            $table->foreignIdFor(\App\Models\Product::class);

            $table->foreignIdFor(\App\Models\Quotation::class);

            $table->foreignIdFor(\App\Models\Supplier::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_products');
    }
};
