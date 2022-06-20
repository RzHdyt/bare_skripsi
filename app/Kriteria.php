<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kriteria extends Model
{
    protected $table = 'kriterias';
    protected $fillable = [
        'name',
        'weight'
    ];

    public function topses_inisial(): HasMany
    {
        return $this->hasMany('App\TopsisInisial');
    }

    public function topses_normalisasi(): HasMany
    {
        return $this->hasMany('App\TopsisNormalisasi');
    }

    public function topses_bobot(): HasMany
    {
        return $this->hasMany('App\TopsisBobot');
    }

    public function topses_jarak(): HasMany
    {
        return $this->hasMany('App\TopsisJarak');
    }

    public function topses_preferensi(): HasMany
    {
        return $this->hasMany('App\TopsisPreferensi');
    }
}
