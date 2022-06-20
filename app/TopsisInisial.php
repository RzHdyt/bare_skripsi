<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TopsisInisial extends Model
{
    protected $table = 'topsis_inisials';
    protected $fillable = [
        'nilai_awal',
        'inisialisasi',

        // relation
        'siswa_id',
        'kriteria_id',
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }
}
