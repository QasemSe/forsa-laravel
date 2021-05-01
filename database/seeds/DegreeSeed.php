<?php

use App\Models\Degree;
use Illuminate\Database\Seeder;

class DegreeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Degree::class, 10)->create();
    }
}
