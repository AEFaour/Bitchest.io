<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id'); //first key of users
            $table->string('name' ,150); //Create Name string (150)
            $table->string('email' ,150)->unique(); //Create email string(150)
            $table->string('password' ,150); //Create pasword string(150)
            $table->enum('role',['Admin', 'Customer']);//Users as Amin or Customer for define their roles
            $table->rememberToken(); // for auth
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
        Schema::dropIfExists('users');
    }
}
