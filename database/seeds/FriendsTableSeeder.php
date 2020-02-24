<?php

use Illuminate\Database\Seeder;

class FriendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('friends')->insert([
            'name' => 'João Paulo',
            'rg' => 1122334455,
            'user_id' => 1,
        ]);

        DB::table('friends')->insert([
            'name' => 'Maria Cecilia',
            'rg' => 159874265892,
            'user_id' => 1,
        ]);
    }
}
