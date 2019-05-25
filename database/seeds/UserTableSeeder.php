<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create()->each(function ($user){
            $faker = Faker\Factory::create();
            [
                "name" => $faker->name,
                "email" => $faker->email,
                "password" => bcrypt('secret'),
            ];
        });
        DB::Table('users')->insert(array(
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('Admin1'),
                'role' => 'Admin'
            ],
            [
                'name' => 'Customer',
                'email' => 'customer@customer.com',
                'password' => Hash::make('Customer1'),
                'role' => 'Customer'
            ],
        ));
    }
}
