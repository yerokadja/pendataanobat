<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienModel extends Model
{
    use HasFactory;

    protected $guarded;
    protected $keyType = 'string';
    protected $primaryKey = 'id_pasiens';
    protected $table = 'pasiens';
    protected $fillable     = ['nama_pasien', 'alamat', 'umur', 'pekerjaan'];
}
