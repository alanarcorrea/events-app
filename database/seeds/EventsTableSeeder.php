<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'title' => 'Jogatina de CS',
            'description' => 'Vamos todos jogar CS!',
            'date' => '2020-03-05',
            'hour' => '20:00:00',
            'place' => 'Empresa',
            'address' =>'Tiradentes, 3021',
            'confirmation_deadline' => '2020-03-02',
            'minimum_people' => 6,
            'status' => 'open',
        ]);

        DB::table('events')->insert([
            'title' => 'Sushilão',
            'description' => 'Lets sushi!',
            'date' => '2020-03-15',
            'hour' => '19:30:00',
            'place' => 'Sushi M',
            'address' =>'Deodoro, 300',
            'confirmation_deadline' => '2020-03-10',
            'minimum_people' => 10,
            'status' =>'open',
        ]);
    }
}
