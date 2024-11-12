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
            $table->id();  // Kolom primary key auto increment
            $table->string('name');  // Kolom nama produk
            $table->string('image'); // Kolom gambar produk, nullable karena tidak wajib
            $table->foreignId('category_id')->constrained('category');
            $table->text('description');  // Kolom deskripsi produk, nullable artinya boleh kosong
            $table->bigInteger('price');  // Kolom harga produk
            $table->string('product_link', 500)->nullable();
            $table->timestamps();  // Kolom created_at dan updated_at otomatis
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
