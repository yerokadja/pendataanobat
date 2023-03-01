<?php

namespace Database\Seeders;

use App\Models\KategorisModel;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nama_kategori' => 'Analgesik'
            ],
            [
                'nama_kategori' => 'Antibiotik'
            ],
            [
                'nama_kategori' => 'Antidepresan'
            ],
            [
                'nama_kategori' => 'Anti-inflamas'
            ],
            [
                'nama_kategori' => 'Anti-koagulan'
            ],
            [
                'nama_kategori' => 'Bronkodilator'
            ],
            [
                'nama_kategori' => 'Hipnotik'
            ],
            [
                'nama_kategori' => 'Immunosupresan'
            ],
            [
                'nama_kategori' => 'Vasodilator'
            ],
        ];

        foreach ($data as $key => $value) {
            KategorisModel::created($value);
        }
    }
}
