<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanAndCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_and_credits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('staff_id');
            $table->decimal('loan')->nullable();
            $table->decimal('amount_to_deduct')->nullable();
            $table->decimal('credit')->nullable();
             $table->decimal('balance')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
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
        Schema::dropIfExists('loan_and_credits');
    }
}
