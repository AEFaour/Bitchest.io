<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencyChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency_charges', function (Blueprint $table) {
            $table->bigIncrements('id'); //first key of agency_charges
            $table->unsignedBigInteger('users_id')->nullable(); // UNSIGNED INTEGER equivalent column for (users_id)
            $table->unsignedBigInteger('crypto_currency_id')->nullable(); // UNSIGNED INTEGER equivalent column for (crypto-currency_id)
            $table->foreign('crypto_currency_id')->references('id')->on('crypto_currencies'); //Call crypto-currency_id from crypto_currencies
            $table->unsignedBigInteger('spend_currency_id')->nullable(); // UNSIGNED INTEGER equivalent column for (crypto-currency_id)
            $table->foreign('spend_currency_id')->references('id')->on('spend_currencies'); //Call spend-currency_id from spend_urrencies
            $table->date('date');
            $table->boolean('active');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade'); // Call users_id from users and choose the option 'cascade for delete it.
            $table->decimal('charge', 10, 2);// Decimal equivalent column with a precison (total digits) and scale (decimal digits)
            $table->timestamps(); //Timestamps
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agency_charges');
       
    }
}
