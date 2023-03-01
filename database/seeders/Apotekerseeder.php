<?php

namespace Database\Seeders;

use App\Models\ApotekerModel;
use Illuminate\Database\Seeder;

class Apotekerseeder extends Seeder
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
                'id_pasien'         => '2',
                'nama_apoteker'     => 'ALOYSIA MUDA KEDANG',
                'nim'               => '809808759437594754',
                'alamat'            => 'Naikolan',
                'username'          => 'Lian',
                'password'          => bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            ApotekerModel::create($value);
        }
    }
}
