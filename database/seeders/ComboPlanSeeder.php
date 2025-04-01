<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ComboPlan;

class ComboPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $batch = 1000;
        $total = 15000;

        for ($i = 0; $i < ($total / $batch); $i++) {
            ComboPlan::factory()->count($batch)->create();
        }
    }
}
