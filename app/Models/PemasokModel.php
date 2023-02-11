<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemasokModel extends Model
{
    use HasFactory;

    // protected $guarded;
    protected $keyType = 'string';
    protected $primaryKey = 'id_pemasok';
    protected $table = 'pemasoks';
    protected $fillable = ['nama_pemasok'];

    /**
     * Get all of the comments for the PemasokModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function obats()
    {
        return $this->hasMany(ObatsModel::class);
    }
}
