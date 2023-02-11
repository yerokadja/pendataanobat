<?php

namespace Database\Seeders;

use App\Models\PemasokModel;
use Illuminate\Database\Seeder;

class PemasokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Pemasok = [
            [
                'nama_pemasok' => 'Yerokadja',
                'alamat'       => 'Jalan pahlawan no.19',
                'no_telpon'    => 'no_telpon',
            ],
        ];

        foreach ($Pemasok as $key => $value) {
            PemasokModel::create($value);
        }
    }
}
