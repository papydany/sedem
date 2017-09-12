<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('staff_name');
            $table->string('jobTitle');
            $table->string('jobType');
            $table->integer('storetype_id');
            $table->integer('store_id');
            $table->string('gender');
            $table->string('qualification');
            $table->string('phone');
            $table->string('address');
            $table->decimal('salary');
             $table->integer('state_id');
            $table->integer('lga_id');
            $table->integer('status');
            $table->string('image');
            $table->date('bod');
            $table->date('appoinment_date')->nullable();
             $table->string('parent_name');
            $table->string('parent_phone');
            $table->string('parent_address');
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
        Schema::dropIfExists('staff');
    }
}
