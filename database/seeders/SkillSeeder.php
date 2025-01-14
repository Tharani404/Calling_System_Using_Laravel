<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $skills = ['Sinhala', 'English'];

        foreach ($skills as $skill) {
            Skill::create(['name' => $skill]);
        }
    
    }
}
