<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TopsisPreferensi extends Model
{
    protected $table = 'topsis_preferensis';
    protected $fillable = [
        'topsis_preferensi',

        // relation
        'jarak_id',
        'kriteria_id',
        'karyawan_id',
    ];

    public function jarak(): BelongsTo
    {
        return $this->belongsTo(TopsisBobot::class, 'jarak_id');
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'karyawan_id');
    }

    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }
}
