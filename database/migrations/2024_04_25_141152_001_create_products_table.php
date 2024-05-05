<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_th', 255);
            $table->string('name_en', 255);
            $table->decimal('price');
            $table->string('unit', 255);
            $table->decimal('product_size');
            $table->string('product_img', 255);
            $table->boolean('status')->default(1);
            $table->softDeletes();
            $table->timestamps();

            $table->foreignIdFor(\App\Models\Category::class);
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
};
