<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewculumnToCeoAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ceo_accounts', function (Blueprint $table) {
          $table->integer('store_id')->after('user_id')->nullable();
          $table->integer('investment_type')->after('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ceo_accounts', function (Blueprint $table) {
            //
        });
    }
}
