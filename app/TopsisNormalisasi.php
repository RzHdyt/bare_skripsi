<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TopsisNormalisasi extends Model
{
    protected $table = 'topsis_normalisasis';
    protected $fillable = [
        'topsis_bobot',

        // relation
        'inisial_id',
        'kriteria_id',
        'siswa_id',
    ];

    public function inisial(): BelongsTo
    {
        return $this->belongsTo(TopsisInisial::class, 'inisial_id');
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }
}
