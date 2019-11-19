<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function ($table) {

            $table->bigIncrements('id');
            $table->integer('company_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable(); //for single invoices
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('description')->nullable();
            $table->integer('qty')->unsigned()->default(0);
            $table->float('cost')->default(0.00);
            $table->tinyInteger('is_paid')->default(0);
            $table->date('start_month');
            $table->date('end_month');
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
        Schema::table('accounts', function (Blueprint $table) {
            //
        });
    }
}
