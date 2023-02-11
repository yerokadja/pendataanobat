<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class Userdata extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Yerobeam Afensius kadja',
                'email' => 'yerokadja123@gmail.com',
                'password' => bcrypt('123456'),
                'username' => 'admin',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
