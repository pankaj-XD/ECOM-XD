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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('order_number')->unique();
            $table->enum('status',['pending','processing','completed','decline']);
            $table->integer('item_count');
            $table->boolean('isPaid')->default(false);
            $table->enum('payment_method',['paypal','stripe','card','cash-on-delivery'])->default('cash-on-delivery');

            $table->string('shipping_full_name');
            $table->string('shipping_address');
            $table->string('shipping_zipcode');
            $table->string('shipping_phone');
            $table->string('shipping_state');
            $table->string('shipping_city');
            $table->text('note')->nullable();

            $table->string('billing_full_name')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_zipcode')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_city')->nullable();

            $table->decimal('grand_total');
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
        Schema::dropIfExists('orders');
    }
}