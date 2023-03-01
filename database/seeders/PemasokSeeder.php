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
                'nama_pemasok' => 'Fismi',
                'alamat'       => 'Jalan pahlawan no.19',
                'no_telpon'    => '0821578923404',
            ],
            [
                'nama_pemasok' => 'jems',
                'alamat'       => 'Jalan pahlawan no.19',
                'no_telpon'    => '0821578923404',
            ],
            [
                'nama_pemasok' => 'rocy',
                'alamat'       => 'Jalan pahlawan no.19',
                'no_telpon'    => '0821578923404',
            ],
            [
                'nama_pemasok' => 'alcatra',
                'alamat'       => 'Jalan pahlawan no.19',
                'no_telpon'    => '0821578923404',
            ],


        ];

        foreach ($Pemasok as $key => $value) {
            PemasokModel::create($value);
        }
    }
}
