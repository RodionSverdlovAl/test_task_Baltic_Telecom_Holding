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
            $table->id(); // Auto-increment, unsigned integer (uint) ID
            $table->string('article')->unique(); // VARCHAR(255), unique index
            $table->string('name'); // VARCHAR(255)
            $table->string('status'); // VARCHAR(255)
            $table->jsonb('attributes')->nullable(); // JSONB
            $table->timestamps();
            $table->softDeletes(); // Soft deletes column
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
