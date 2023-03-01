<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitModel extends Model
{
    use HasFactory;
    protected $guarded;
    protected $keyType      = 'string';
    protected $primaryKey   = 'id_unit';
    protected $table        = 'units';
    protected $fillable     = ['Nama_Unit'];
}
