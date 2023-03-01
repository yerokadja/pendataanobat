<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class ApotekerModel extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;
    protected $guarded;
    protected $keyType = 'string';
    protected $primaryKey = 'id_apoteker';
    protected $table = 'apotekers';
    // protected $fillable = ['nama_apoteker', 'nim', 'alamat', 'username'];
    protected $hidden = [
        'password',
    ];
}
