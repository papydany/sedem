<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCeoAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ceo_accounts', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('user_id');
           $table->integer('status');
          $table->decimal('credit',20, 2)->nullable();
             $table->decimal('debit',20, 2)->nullable();
            $table->string('detail')->nullable();
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
        Schema::dropIfExists('ceo_accounts');
    }
}
