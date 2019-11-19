<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned()->nullable();
//            $table->integer('billing_id')->nullable();
            $table->string('company_name');
            $table->string('company_billing_name');
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('billing_address')->nullable();
            $table->tinyInteger('billing_type')->default(0); //0-postpaid (with invoices); 1 - prepaid (has to pay upfront)
            $table->tinyInteger('dashboard_logo_display')->default(0); //0 - normal display; 1 - good for 'vertical' logos
            $table->integer('prepaid_tests')->nullable(); //moved to company_test
            $table->string('email')->nullable();
            $table->tinyInteger('email_attachment_results')->default(0);
            $table->tinyInteger('email_test_takers')->default(0);
            $table->string('logo')->nullable();
            $table->string('languages_allowed')->nullable();
            //$table->float('price_per_test')->default(0); //moved to company_test
            $table->string('notes', 1000)->nullable();
            $table->string('currency')->default('eur');
            $table->tinyInteger('allow_client_grading')->default(1);
            $table->integer('free_tests')->default(0);
            $table->tinyInteger('create_invoice_per_each_test')->default(0);
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('google_plus')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->float('vat')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('companies');
    }
}
