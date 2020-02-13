<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'rg' => ('1122334455'),
            'phone' => ('53981115566'),
            'email' => 'admin@gmail.com',
            'password' => '123456',
            'company_id' =>'1',
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'rg' => ('1122334455'),
            'phone' => ('53981115566'),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'company_id' =>'1',
        ]);
    }
}
