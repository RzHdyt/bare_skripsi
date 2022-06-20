<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $fillable = [
        'photos',
        // 'nisn',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'agama',
        'kelas',
        'no_tlp_siswa',
        'nama_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'no_tlp_ortu',
        'nama_wali',
        'pekerjaan_wali',
        'no_tlp_wali',
    ];

    public function penilaian(): HasMany
    {
        return $this->hasMany('App\TopsisInisial');
    }

    public function penilaian_normalisasis(): HasMany
    {
        return $this->hasMany('App\TopsisNormalisasi');
    }

    public function penilaian_bobot(): HasMany
    {
        return $this->hasMany('App\TopsisBobot');
    }

    public function penilaian_jarak(): HasMany
    {
        return $this->hasMany('App\TopsisJarak');
    }

    public function penilaian_preferensi(): HasMany
    {
        return $this->hasMany('App\TopsisPreferensi');
    }
}
