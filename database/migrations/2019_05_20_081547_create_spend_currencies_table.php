<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpendCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spend_currencies', function (Blueprint $table) {
            $table->bigIncrements('id'); //first key of spendCurrencies
            $table->unsignedBigInteger('users_id')->nullable(); // UNSIGNED INTEGER equivalent column for (user_id)
            $table->unsignedBigInteger('crypto_currency_id')->nullable(); // UNSIGNED INTEGER equivalent column for (crypto_currency_id)
            $table->date('purchase_date'); // Date of purchase
            $table->decimal('quantity', 10, 2); //Quantitiy 
            $table->decimal('euro_valeur', 10, 2)->nullable();; // the valeur in euros
            $table->boolean('active');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade'); // Call user_id from users and choose the option 'cascade for delete it.
            $table->foreign('crypto_currency_id')->references('id')->on('crypto_currencies'); //  Call crypto_currency_id from crypto_currencies
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
        Schema::dropIfExists('spend_currencies');
       
    }
}
