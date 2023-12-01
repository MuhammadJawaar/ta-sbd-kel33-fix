<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('id_transaksi'); // Primary key
            $table->unsignedBigInteger('id_product'); // Foreign key referencing products table
            $table->unsignedBigInteger('id_user'); // Foreign key referencing users table
            $table->date('tanggal');
            $table->integer('jumlah');
            $table->decimal('total_harga', 10, 2);
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('isDeleted')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
