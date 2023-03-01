<?php

namespace Database\Seeders;

use App\Models\ObatsModel;
use App\Models\PemasokModel;
use App\Models\UnitModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = 123456;
        $seedId = random_int(1, 6);

        $obat = [

            [
                'id_pemasok' => $seedId,
                'nama_obat'  => 'Aspirin',
                'stock'      => $seedId,
                'kategori'   => $seedId,
                'penyimpanan' => 'Gudang',
                'kadaluarsa' => '2023-02-10',
                'unit'       => $seedId,
                'deskripsi'  => 'qwerty',

            ],
            [
                'id_pemasok' => $seedId,
                'nama_obat'  => 'Aspirin',
                'stock'      => $seedId,
                'kategori'   => $seedId,
                'penyimpanan' => 'Gudang',
                'kadaluarsa' => '2023-02-10',
                'unit'       => $seedId,
                'deskripsi'  => 'qwerty',

            ],
            [
                'id_pemasok' => $seedId,
                'nama_obat'  => 'Aspirin',
                'stock'      => $seedId,
                'kategori'   => $seedId,
                'penyimpanan' => 'Gudang',
                'kadaluarsa' => '2023-02-10',
                'unit'       => $seedId,
                'deskripsi'  => 'qwerty',

            ],
            [
                'id_pemasok' => $seedId,
                'nama_obat'  => 'Aspirin',
                'stock'      => $seedId,
                'kategori'   => $seedId,
                'penyimpanan' => 'Gudang',
                'kadaluarsa' => '2023-02-10',
                'unit'       => $seedId,
                'deskripsi'  => 'qwerty',

            ],
            [
                'id_pemasok' => '3',
                'nama_obat'  => 'Aspirin',
                'stock'      => $seedId,
                'kategori'   => '5',
                'penyimpanan' => 'Gudang',
                'kadaluarsa' => '2023-02-10',
                'unit'       => $seedId,
                'deskripsi'  => 'qwerty',

            ],
            [
                'id_pemasok' => '3',
                'nama_obat'  => 'Aspirin',
                'stock'      => $seedId,
                'kategori'   => '5',
                'penyimpanan' => 'Gudang',
                'kadaluarsa' => '2023-02-10',
                'unit'       => $seedId,
                'deskripsi'  => 'qwerty',

            ],
            [
                'id_pemasok' => '3',
                'nama_obat'  => 'Aspirin',
                'stock'      => $seedId,
                'kategori'   => '5',
                'penyimpanan' => 'Gudang',
                'kadaluarsa' => '2023-02-10',
                'unit'       => $seedId,
                'deskripsi'  => 'qwerty',

            ],
            [
                'id_pemasok' => '3',
                'nama_obat'  => 'Aspirin',
                'stock'      => $seedId,
                'kategori'   => '5',
                'penyimpanan' => 'Gudang',
                'kadaluarsa' => '2023-02-10',
                'unit'       => $seedId,
                'deskripsi'  => 'qwerty',

            ],
            [
                'id_pemasok' => '3',
                'nama_obat'  => 'Aspirin',
                'stock'      => $seedId,
                'kategori'   => '5',
                'penyimpanan' => 'Gudang',
                'kadaluarsa' => '2023-02-10',
                'unit'       => $seedId,
                'deskripsi'  => 'qwerty',

            ],
            [
                'id_pemasok' => '3',
                'nama_obat'  => 'Aspirin',
                'stock'      => $seedId,
                'kategori'   => '5',
                'penyimpanan' => 'Gudang',
                'kadaluarsa' => '2023-02-10',
                'unit'       => $seedId,
                'deskripsi'  => 'qwerty',

            ],
            [
                'id_pemasok' => '3',
                'nama_obat'  => 'Aspirin',
                'stock'      => $seedId,
                'kategori'   => '5',
                'penyimpanan' => 'Gudang',
                'kadaluarsa' => '2023-02-10',
                'unit'       => $seedId,
                'deskripsi'  => 'qwerty',

            ],
            [
                'id_pemasok' => '3',
                'nama_obat'  => 'Aspirin',
                'stock'      => $seedId,
                'kategori'   => '5',
                'penyimpanan' => 'Gudang',
                'kadaluarsa' => '2023-02-10',
                'unit'       => $seedId,
                'deskripsi'  => 'qwerty',

            ],
            [
                'id_pemasok' => '3',
                'nama_obat'  => 'Aspirin',
                'stock'      => $seedId,
                'kategori'   => '5',
                'penyimpanan' => 'Gudang',
                'kadaluarsa' => '2023-02-10',
                'unit'       => $seedId,
                'deskripsi'  => 'qwerty',

            ],


        ];

        foreach ($obat as $key => $p) {
            ObatsModel::create($p);
        }
    }
}
