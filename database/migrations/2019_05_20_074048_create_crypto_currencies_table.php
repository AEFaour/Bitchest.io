<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCryptoCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crypto_currencies', function (Blueprint $table) {
            $table->bigIncrements('id'); // first key of crypto_currencies
            $table->string('name', 150); // name of crypto_currencies string(150)
            $table->decimal('valeur', 10, 2); // Decimal equivalent column with a precison (total digits) and scale (decimal digits)
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
        Schema::dropIfExists('crypto_currencies');
    }
}
