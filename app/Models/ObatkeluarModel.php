<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatkeluarModel extends Model
{
    use HasFactory;

    protected $guarded;
    protected $keyType      = 'string';
    protected $primaryKey   = 'id_obat_keluar';
    protected $table        = 'obat_keluars';
    protected $fillable     = ['obat_id', 'jumlah', 'alasan'];
}
