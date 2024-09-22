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
        Schema::create('order_status_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->enum('status', ['Ordered', 'In Process', 'In Route', 'Delivered']);
            $table->timestamp('status_changed_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_status_history');
    }
};
