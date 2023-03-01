<?php

namespace Database\Factories;

use App\Models\DokterModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class DokterFactory extends Factory
{
    protected $model = DokterModel::class;

    public function definition()
    {
        $faker = \Faker\Factory::create('id_ID');

        return [
            'id_pasien' => $faker->unique()->numerify('##'),
            'nama'      => $faker->name,
            'nip'       => $faker->unique()->numerify('##############'),
            'alamat'   => $faker->address,
        ];
    }
}
