<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_posts', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('user_id');
              $table->integer('store_id');
           $table->integer('status');
           $table->string('customer_detail');
          $table->decimal('credit',20, 2)->nullable();
             $table->decimal('debit',20, 2)->nullable();
            $table->string('trans_detail');
             $table->string('teller_number')->nullable();
            $table->date('posted_date');
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
        Schema::dropIfExists('bank_posts');
    }
}
