<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_wallets', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable();; // first key of customerWallets
            $table->unsignedBigInteger('users_id')->nullable(); // UNSIGNED INTEGER equivalent column for (user_id)
            $table->unsignedBigInteger('crypto_currency_id')->nullable(); // UNSIGNED INTEGER equivalent column for (crypto_currency_id)
            $table->decimal('euro_balance', 10, 2); // Decimal equivalent column with a precison (total digits) and scale (decimal digits)
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
        Schema::dropIfExists('customer_wallets');
    }
}
