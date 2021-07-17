<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ManagerSeed::class);
        $this->call(DegreeSeed::class);
        $this->call(SkillSeed::class);
        $this->call(UniversitySeed::class);
        $this->call(SpecializeSeed::class);
        $this->call(CompanySeed::class);
        $this->call(PostSeed::class);
        $this->call(UserSeed::class);
        $this->call(ApplicantSeeder::class);
    }
}
