<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('store_id');
             $table->integer('storetype_id');
            $table->integer('user_id');
            $table->string('payment_type');
            $table->string('card_number')->nullable();
            $table->integer('status');
            $table->decimal('total',15,2);
            $table->decimal('subtotal',15,2);
            $table->decimal('discountamount',12,2);
             $table->decimal('vat',12,2);
            $table->date('order_date');
            $table->date('return_date')->nullable();
            
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
