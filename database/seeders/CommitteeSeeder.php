<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Committee;
class CommitteeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $essa = Committee::create([
            'name' => 'EESA - VIT',
            'description' => 'EESA is Electronics Department Committee',
            'admin_id' => 2,
        ]);
    }
}
