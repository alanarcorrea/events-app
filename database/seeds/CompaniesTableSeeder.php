<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'fantasy_name' => 'Atlas',
            'company_name' => 'Atlas Technologies',
            'cnpj' => '123456789122',
            'phone' => '539818187878',
            'address' => 'Tiradentes, 3021',
            'cep' => '96010541',
            'city' => 'Pelotas',
            'state' => 'RS',
        ]);
    }
}
