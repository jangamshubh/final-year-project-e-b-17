<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventLocation;
class EventLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $audi = EventLocation::create([
            'name' => 'Auditorium',
            'description' => 'Auditorium is the biggest hall',
            'location' => 'M - Block',
            'seating_capacity' => 200,
            'file_url' => 'images/audi.jpeg'
        ]);
        $a_block_1 = EventLocation::create([
            'name' => 'Seminar Hall A1',
            'description' => '',
            'location' => 'A - Block',
            'seating_capacity' => 100,
            'file_url' => 'images/sh-1.jpeg',
        ]);
        $a_block_2 = EventLocation::create([
            'name' => 'Seminar Hall A2',
            'description' => '',
            'location' => 'A - Block',
            'seating_capacity' => 100,
            'file_url' => 'images/sh-2.jpeg',
        ]);
        $a_block_3 = EventLocation::create([
            'name' => 'Seminar Hall A3',
            'description' => '',
            'location' => 'A - Block',
            'seating_capacity' => 100,
            'file_url' => 'images/sh-1.jpeg',
        ]);
        $m_block_1 = EventLocation::create([
            'name' => 'Seminar Hall M1',
            'description' => '',
            'location' => 'M - Block',
            'seating_capacity' => 70,
            'file_url' => 'images/sh-2.jpeg',
        ]);
        $m_block_2 = EventLocation::create([
            'name' => 'Seminar Hall M2',
            'description' => '',
            'location' => 'M - Block',
            'seating_capacity' => 90,
            'file_url' => 'images/sh-1.jpeg',
        ]);
    }
}
