<?php

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Company::class, 10)->create();
        Company::create([
            'name' => 'Company',
            'email' => 'company@app.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
