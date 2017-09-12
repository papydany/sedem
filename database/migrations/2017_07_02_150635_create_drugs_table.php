<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id');
            $table->integer('store_type');
            $table->integer('user_id');
            $table->integer('code');
            $table->string('drug_name');
            $table->integer('drugfamily_id');
            $table->string('produced_by');
            $table->string('bought_from')->nullable();
            $table->integer('quantity');
            $table->integer('reorder_quantity');
           $table->decimal('price', 11, 2);
           $table->decimal('selling_price', 11, 2);
            $table->decimal('receive_discount')->nullable();
            $table->decimal('given_discount')->nullable();
            $table->decimal('purchase_vat')->nullable();
            $table->decimal('selling_vat')->nullable();
             $table->date('m_date');
           $table->date('es_date');
            $table->date('purchase_date');
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
        Schema::dropIfExists('drugs');
    }
}
