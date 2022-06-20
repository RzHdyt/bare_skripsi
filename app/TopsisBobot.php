<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TopsisBobot extends Model
{
    protected $table = 'topsis_bobots';
    protected $fillable = [
        'topsis_bobot',

        // relation
        'normalisasi_id',
        'kriteria_id',
        'siswa_id',
    ];

    public function normalisasi(): BelongsTo
    {
        return $this->belongsTo(TopsisNormalisasi::class, 'normalisasi_id');
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
