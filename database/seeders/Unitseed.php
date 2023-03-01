<?php

namespace Database\Seeders;

use App\Models\UnitModel;
use Illuminate\Database\Seeder;

class Unitseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit = [
            [
                'Nama_unit' => 'Pulvis (serbuk)'
            ],
            [
                'Nama_unit' => 'Pulveres'
            ],
            [
                'Nama_unit' => 'Tablet (compressi)'
            ],
            [
                'Nama_unit' => 'Pil (pilulae)'
            ],
            [
                'Nama_unit' => 'Kapsul (capsule)'
            ],
            [
                'Nama_unit' => 'Kaplet (kapsul tablet)'
            ],
            [
                'Nama_unit' => 'Larutan (solutiones)'
            ],
            [
                'Nama_unit' => 'Suspensi (suspensiones)'
            ],
            [
                'Nama_unit' => 'Emulsi (elmusiones)'
            ],
            [
                'Nama_unit' => 'Galenik'
            ],
            [
                'Nama_unit' => ' Ekstrak (extractum)'
            ],
            [
                'Nama_unit' => 'Infusa'
            ],
            [
                'Nama_unit' => 'Imunoserum (immunosera)'
            ],
            [
                'Nama_unit' => 'Salep (unguenta)'
            ],
            [
                'Nama_unit' => 'Suppositoria'
            ],
            [
                'Nama_unit' => 'Obat tetes (guttae)'
            ],
            [
                'Nama_unit' => 'Injeksi (injectiones)'
            ],

        ];

        foreach ($unit as $key => $v) {
            UnitModel::create($v);
        }
    }
}
