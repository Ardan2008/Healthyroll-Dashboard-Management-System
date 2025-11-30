<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');           
            $table->string('phone_number');
            $table->text('address');
            $table->string('product');
            $table->integer('quantity');
            $table->text('notes')->nullable();
            $table->string('payment_method');
            $table->string('delivery_method');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}