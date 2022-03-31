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
        ]);
    }
}
