<?php

use App\Models\Specialize;
use Illuminate\Database\Seeder;

class SpecializeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Specialize::class, 10)->create();

    }
}
