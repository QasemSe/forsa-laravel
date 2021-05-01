<?php

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Skill::class, 10)->create();
    }
}
