<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'email' => 'fadli@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('testing123'),
            'name' => 'fadli',
            'role' => 'owner',
            'balance' => 0
        ]);
        DB::table('users')->insert([
            'email' => 'user@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('testing123'),
            'name' => 'user',
            'role' => 'costumer',
            'balance' => 100000
        ]);
    }
}
