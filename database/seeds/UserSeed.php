<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(User::class, 10)->create();
        User::create([
            'name' => 'user',
            'email' => 'user@app.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
