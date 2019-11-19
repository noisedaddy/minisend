<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('added_by')->unsigned()->index();
            $table->string('category')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('nickname')->nullable();
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();
            $table->string('skype')->nullable();
//            $table->integer('kering_id')->unsigned()->nullable()->index();
            $table->softDeletes();
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
        Schema::table('candidates', function (Blueprint $table) {
            //
        });
    }
}
