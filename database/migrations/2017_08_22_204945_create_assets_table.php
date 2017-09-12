<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
             $table->string('user_id');
              $table->string('asset_name');
           $table->string('duration');
           $table->string('asset_type');
          $table->decimal('cost_of_item',20, 2);
             $table->decimal('depreciation_value',20, 2);
            $table->date('salvage_date');
             $table->date('manufactured_date');
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
        Schema::dropIfExists('assets');
    }
}
