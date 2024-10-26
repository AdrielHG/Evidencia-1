<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->string('invoice_number')->unique();
            $table->boolean('deletedOrder')->default(false);
            $table->dateTime('order_date');
            $table->string('delivery_address');
            $table->text('notes')->nullable();
            $table->enum('status', ['Ordered', 'In Process', 'In Route', 'Delivered'])->default('Ordered');
            $table->string('route_photo')->nullable(); // Optional for route department
            $table->string('delivery_photo')->nullable(); // Optional for delivery proof
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
