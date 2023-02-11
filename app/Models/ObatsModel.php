<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatsModel extends Model
{
    use HasFactory;

    protected $guarded;
    protected $keyType = 'string';
    protected $primaryKey = 'id_obat';
    protected $table = 'obats';

    /**
     * Get the user that owns the ObatsModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pemasok()
    {
        return $this->belongsTo(PemasokModel::class);
    }
}
