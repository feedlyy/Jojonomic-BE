<?php

use Illuminate\Database\Seeder;

class CdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cds')->insert([
            'title' => 'One Piece',
            'rate' => 15000,
            'category' => 'cartoon',
            'quantity' => 10
        ]);
        DB::table('cds')->insert([
            'title' => 'Black Widow',
            'rate' => 20000,
            'category' => 'action',
            'quantity' => 1
        ]);
        DB::table('cds')->insert([
            'title' => 'Insidious',
            'rate' => 25000,
            'category' => 'horror',
            'quantity' => 5
        ]);
        DB::table('cds')->insert([
            'title' => 'Habibie Ainun',
            'rate' => 25000,
            'category' => 'romance',
            'quantity' => 10
        ]);
    }
}
