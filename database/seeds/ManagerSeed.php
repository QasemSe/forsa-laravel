<?php

use App\Models\Manager;
use Illuminate\Database\Seeder;

class ManagerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Manager::create([
            'name' => 'super_admin',
            'email' => 'super_admin@app.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
