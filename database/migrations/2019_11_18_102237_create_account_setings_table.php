<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountSetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('account_settings', function(Blueprint $table) {
//            $table->bigIncrements('id');
//            $table->foreign('account_id')->references('account_id')->on('accounts');
//            $table->string('type')->nullable();
//            $table->string('label')->nullable();
//            $table->text('name')->nullable();
//            $table->text('value')->nullable();
//            $table->unsignedInteger('account_id');
//
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_settings', function (Blueprint $table) {
            Schema::drop('account_settings');
        });
    }
}
