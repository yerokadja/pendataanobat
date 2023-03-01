<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategorisModel extends Model
{
    use HasFactory;

    protected $guarded;
    protected $keyType      = 'string';
    protected $primaryKey   = 'id_kategori';
    protected $table        = 'kategoris';
    protected $fillable     = ['nama_kategori'];
}
