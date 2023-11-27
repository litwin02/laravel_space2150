<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\CrewSkills;

class ModuleCrewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('module_crew')->insert([
            ['ship_module_id' => 1, 'nick' => 'Test', 'gender' => 'M', 'age' => 21],
            ['ship_module_id' => 2, 'nick' => 'Nickable', 'gender' => 'F', 'age' => 32],
            ['ship_module_id' => 3, 'nick' => 'Testable', 'gender' => 'F', 'age' => 45],
        ]);
    }
}
