<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            // Tambahkan kolom quantity, level, dan total_price
            $table->integer('quantity');
            $table->decimal('total_price', 10, 3); // Definisi kolom total_price tanpa after
             // Tambahkan kolom untuk data pembeli
             $table->string('fullname');
             $table->text('address');
             $table->string('phone');
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
        Schema::dropIfExists('orders'); // Menjatuhkan tabel orders
    }
}
