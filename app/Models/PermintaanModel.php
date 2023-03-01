<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanModel extends Model
{
    use HasFactory;
    protected $guarded;
    protected $keyType      = 'string';
    protected $primaryKey   = 'id_permintaan';
    protected $table        = '_permintaan';
    protected $fillable     = ['pasien_id', 'dokter_id', 'obat_id', 'jumlah', 'Keterangan'];
}
