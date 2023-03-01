<?php

namespace Database\Seeders;

use App\Models\DokterModel;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DokterModel::factory()->count(40)->create();
    }
}
