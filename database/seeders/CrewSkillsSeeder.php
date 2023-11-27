<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\CrewSkills;

class CrewSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('crew_skills')->insert([
            ['module_crew_id' => 1, 'name' => "Test"],
            ['module_crew_id' => 2, 'name' => "Fred"],
            ['module_crew_id' => 3, 'name' => "Again"],
        ]);
    }
}
