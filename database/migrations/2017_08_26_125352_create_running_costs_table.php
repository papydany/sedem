<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRunningCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('running_costs', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('user_id');
               $table->integer('store_id');
               $table->string('code');
          $table->decimal('amount',20, 2);
          $table->date('date');
          $table->string('qty');
          $table->string('remark')->nullable();
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
        Schema::dropIfExists('running_costs');
    }
}
