<?php

namespace App\Http\Controllers\Application\Web;

use App\Http\Controllers\Controller;
use App\Siswa;
use App\Kriteria;
use App\TopsisBobot;
use App\TopsisInisial;
use App\TopsisJarak;
use App\TopsisNormalisasi;
use App\TopsisPreferensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopsisController extends Controller
{
    /*
    * ******************************************************  ****************************************************** *
    * *********************************  This Function For Get Penilaian Karyawan ********************************* *
    * ******************************************************  ****************************************************** *
    */
    public function penilaianAwal()
    {
        $siswas = Siswa::get();
        $kriterias = Kriteria::get();
        return view('application.web.topsis.nilai-awal.index', [
            'siswas' => $siswas,
            'kriterias' => $kriterias,
        ]);
    }

    public function storePenilaianAwal1(Request $request)
    {
        $this->validate($request, [
            'nilai_awal',
            'inisialisasi',

            'kriteria_id',
            'siswa_id',
        ]);

        $isexist = TopsisInisial::where('inisialisasi', $request->siswa_id)->first();
        if (empty($isexist)) {
            $topsesInisial = new TopsisInisial;
            // Kriteria Kehadiran
            if ($request->kriteria_id == 1) {
                if ($request->nilai_awal >= 81 && $request->nilai_awal <= 100) {
                    $inisialisasi = 5;
                } elseif ($request->nilai_awal >= 61 && $request->nilai_awal <= 80) {
                    $inisialisasi = 4;
                } elseif ($request->nilai_awal >= 41 && $request->nilai_awal <= 60) {
                    $inisialisasi = 3;
                } elseif ($request->nilai_awal >= 21 && $request->nilai_awal <= 40) {
                    $inisialisasi = 2;
                } elseif ($request->nilai_awal >= 1 && $request->nilai_awal <= 20) {
                    $inisialisasi = 1;
                }
                // Kriteria Tanggungan Orang Tua
            } elseif ($request->kriteria_id == 2) {
                if ($request->nilai_awal >= 5) {
                    $inisialisasi = 5;
                } elseif ($request->nilai_awal >= 4) {
                    $inisialisasi = 4;
                } elseif ($request->nilai_awal >= 3) {
                    $inisialisasi = 3;
                } elseif ($request->nilai_awal >= 2) {
                    $inisialisasi = 2;
                } elseif ($request->nilai_awal >= 1) {
                    $inisialisasi = 1;
                }
                // Kriteria Hafalan Al-Quran
                // } elseif ($request->kriteria_id == 3) {
                //     if ($request->nilai == 1) {
                //         $inisialisasi = 5;
                //     } elseif ($request->nilai == 2) {
                //         $inisialisasi = 4;
                //     } elseif ($request->nilai == 28) {
                //         $inisialisasi = 3;
                //     } elseif ($request->nilai == 29) {
                //         $inisialisasi = 2;
                //     } elseif ($request->nilai == 30) {
                //         $inisialisasi = 1;
                //     }
                //     // Kriteria Prestasi
                // } elseif ($request->kriteria_id == 4) {
                //     if ($request->nilai == 5) {
                //         $inisialisasi = 5;
                //     } elseif ($request->nilai == 4) {
                //         $inisialisasi = 4;
                //     } elseif ($request->nilai == 1) {
                //         $inisialisasi = 3;
                //     } elseif ($request->nilai == 2) {
                //         $inisialisasi = 2;
                //     } elseif ($request->nilai == 3) {
                //         $inisialisasi = 1;
                //     }
            }
            $topsesInisial->inisialisasi = $inisialisasi;
            $topsesInisial->nilai_awal = $request->nilai_awal;
            $topsesInisial->siswa_id = $request->siswa_id;
            $topsesInisial->kriteria_id = $request->kriteria_id;

            DB::transaction(function () use ($topsesInisial) {
                $topsesInisial->save();
            }, 5);

            return redirect()
                ->route('admin.penilaianAwal')
                ->with('success_message', 'data berahasil disimpan');
        }
        return redirect()
            ->back()
            ->with('error_message', 'data sudah ada!');
    }

    public function storePenilaianAwal(Request $request)
    {
        $this->validate($request, [
            'nilai_awal' => 'required',
            'siswa_id' => 'required',
            'inisialisasi',
            'kriteria_id' => 'required',
        ]);

        $isexist = TopsisInisial::where('siswa_id', $request->siswa_id)
            ->where('kriteria_id', $request->kriteria_id)->first();
        // dd($isexist);
        if (empty($isexist)) {

            DB::transaction(function () use ($request) {
                $penilaians = new TopsisInisial;

                $penilaians->nilai_awal = $request->nilai_awal;
                $penilaians->siswa_id = $request->siswa_id;
                $penilaians->kriteria_id = $request->kriteria_id;

                // kriteria 1 = Penghasilan Orang Tua
                if ($request->kriteria_id == 1) {
                    if ($request->nilai_awal >= 81 && $request->nilai_awal <= 100) {
                        $inisialisasi = 5;
                    } elseif ($request->nilai_awal >= 61 && $request->nilai_awal <= 80) {
                        $inisialisasi = 4;
                    } elseif ($request->nilai_awal >= 41 && $request->nilai_awal <= 60) {
                        $inisialisasi = 3;
                    } elseif ($request->nilai_awal >= 21 && $request->nilai_awal <= 40) {
                        $inisialisasi = 2;
                    } elseif ($request->nilai_awal >= 1 && $request->nilai_awal <= 20) {
                        $inisialisasi = 1;
                    }
                    // kriteria 2 = Tanggungan Orang Tua
                } else if ($request->kriteria_id == 2) {
                    if ($request->nilai_awal >= 5) {
                        $inisialisasi = 5;
                    } elseif ($request->nilai_awal >= 4) {
                        $inisialisasi = 4;
                    } elseif ($request->nilai_awal >= 3) {
                        $inisialisasi = 3;
                    } elseif ($request->nilai_awal >= 2) {
                        $inisialisasi = 2;
                    } elseif ($request->nilai_awal >= 1) {
                        $inisialisasi = 1;
                    }
                    // kriteria 3 = Kepemilikan Kendaraan
                } else if ($request->kriteria_id == 3) {
                    if ($request->nilai_awal == 'Juz 2') {
                        $inisialisasi = 5;
                    } elseif ($request->nilai_awal == 'Juz 1') {
                        $inisialisasi = 4;
                    } elseif ($request->nilai_awal == 'Juz 28') {
                        $inisialisasi = 3;
                    } elseif ($request->nilai_awal == 'Juz 29') {
                        $inisialisasi = 2;
                    } elseif ($request->nilai_awal == 'Juz 30') {
                        $inisialisasi = 1;
                    }
                    // kriteria 4 = Kehadiran
                } else if ($request->kriteria_id == 4) {
                    if ($request->nilai_awal == 'ponas') {
                        $inisialisasi = 5;
                    } elseif ($request->nilai_awal == 'porda') {
                        $inisialisasi = 4;
                    } elseif ($request->nilai_awal == 'rank 1') {
                        $inisialisasi = 3;
                    } elseif ($request->nilai_awal == 'rank 2') {
                        $inisialisasi = 2;
                    } elseif ($request->nilai_awal == 'rank 3') {
                        $inisialisasi = 1;
                    }
                }
                $penilaians->inisialisasi = $inisialisasi;

                $penilaians->save();
                // dd($penilaians);
            }, 5);

            return redirect()
                ->route('admin.penilaianAwal')
                ->with('success_message', 'data berahasil disimpan');
        } else {
            return redirect()
                ->back()
                ->with('error_message', 'data sudah ada!');
        }
    }

    public function editPenilaianAwal($id)
    {
        $karyawans = Siswa::get();
        $kriterias = Kriteria::get();

        $penilaians = TopsisInisial::where('id', $id)->first();
        return view('application.web.topsis.nilai-awal.edit', [
            'penilaians' => $penilaians,
            'karyawans' => $karyawans,
            'kriterias' => $kriterias
        ]);
    }

    public function updatePenilaianAwal(Request $request, $id)
    {
        $checkExist = TopsisInisial::where('siswa_id', $request->siswa_id)
            ->where('criteria_id', $request->criteria_id)->first();


        if (!empty($checkExist)) {
            $topsesInisial = TopsisInisial::where('id', $id)->first();

            if ($request->kriteria_id == 1 || $request->kriteria_id == 4) {
                if ($request->nilai_awal >= 1 && $request->nilai_awal <= 6) {
                    $inisialisasi = 1;
                } elseif ($request->nilai_awal >= 7 && $request->nilai_awal <= 13) {
                    $inisialisasi = 2;
                } elseif ($request->nilai_awal >= 14 && $request->nilai_awal <= 20) {
                    $inisialisasi = 3;
                }
            } elseif ($request->kriteria_id == 2 || $request->kriteria_id == 3) {
                if ($request->nilai_awal >= 1 && $request->nilai_awal <= 10) {
                    $inisialisasi = 1;
                } elseif ($request->nilai_awal >= 11 && $request->nilai_awal <= 20) {
                    $inisialisasi = 2;
                } elseif ($request->nilai_awal >= 21 && $request->nilai_awal <= 30) {
                    $inisialisasi = 3;
                }
            }

            $topsesInisial->nilai_awal = $request->nilai_awal;
            $topsesInisial->inisialisasi = $inisialisasi;
            $topsesInisial->siswa_id = $request->siswa_id;
            $topsesInisial->kriteria_id = $request->kriteria_id;

            DB::transaction(function () use ($topsesInisial) {
                $topsesInisial->save();
            }, 5);

            return redirect()
                ->route('admin.penilaianAwal')
                ->with('success_message', 'data berahasil diubah');
        }
        return redirect()
            ->back()
            ->with('error_message', 'data sudah ada!');
    }

    public function destroyPenilaianAwal($id)
    {
        $penilaians = TopsisInisial::where('id', $id)
            ->first();

        DB::transaction(function () use ($penilaians) {
            $penilaians->delete();
        }, 5);

        return redirect()
            ->back()
            ->with('success_message', 'data berahasil diubah');
    }
    /*
    * ******************************************************  ****************************************************** *
    * ********************************* End - This Function For Penilaian Karyawan ********************************* *
    * ******************************************************  ****************************************************** *
    */

    /*
    * ******************************************************  ****************************************************** *
    * ************************************************* Get Topsis ************************************************* *
    * ******************************************************  ****************************************************** *
    */

    public function hasilNoramlasiasi()
    {
        $karyawans = Siswa::get();
        $kriterias = Kriteria::get();
        $normalisasis = TopsisNormalisasi::get();

        return view('application.web.topsis.perhitungan-topsis.1-normalisasi', [
            'kriterias' => $kriterias,
            'karyawans' => $karyawans,
            'normalisasis' => $normalisasis,
        ]);
    }

    public function hasilPembobotan()
    {
        $karyawans = Siswa::get();
        $kriterias = Kriteria::get();
        $pembobotans = TopsisBobot::get();
        return view('application.web.topsis.perhitungan-topsis.2-bobot', [
            'kriterias' => $kriterias,
            'karyawans' => $karyawans,
            'pembobotans' => $pembobotans
        ]);
    }

    public function hasilJarak()
    {
        $karyawans = Siswa::get();
        $kriterias = Kriteria::get();
        $jaraks = TopsisJarak::get();

        return view('application.web.topsis.perhitungan-topsis.4-jarak', [
            'kriterias' => $kriterias,
            'karyawans' => $karyawans,
            'jaraks' => $jaraks
        ]);
    }

    public function hasilPreferensi()
    {
        $karyawans = Siswa::get();
        $kriterias = Kriteria::get();
        $preferensis = TopsisPreferensi::get();

        return view('application.web.topsis.perhitungan-topsis.5-prefrensi', [
            'kriterias' => $kriterias,
            'karyawans' => $karyawans,
            'preferensis' => $preferensis,
        ]);
    }

    /*
    * ******************************************************  ****************************************************** *
    * ********************************************** End - Get Topsis ********************************************** *
    * ******************************************************  ****************************************************** *
    */

    /*
    * ******************************************************  ****************************************************** *
    * *********************************************** Proses Topsis ************************************************ *
    * ******************************************************  ****************************************************** *
    */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storeNormalisasi(Request $request)
    {
        $checkExist = TopsisNormalisasi::where('topsis_normalisasi', '!=', null)->first();

        if (empty($checkExist)) {

            $criterias = Kriteria::all();
            foreach ($criterias as $criteria) {
                $initialValue = 0;

                $assessments = TopsisInisial::where('kriteria_id', '=', $criteria->id)->get();
                foreach ($assessments as $assessment) {
                    $pembagaian = pow($assessment->inisialisasi, 2);
                    $initialValue = $initialValue + $pembagaian;
                }

                $akar = sqrt($initialValue);

                foreach ($assessments as $assessment) {
                    $matrixNormalisasi = $assessment->inisialisasi / $akar;

                    $request->request->add(['topsis_normalisasi' => $matrixNormalisasi]);

                    $request->request->add(['inisial_id' => $assessment->id]);
                    $request->request->add(['kriteria_id' => $assessment->kriteria_id]);
                    $request->request->add(['siswa_id' => $assessment->siswa_id]);

                    DB::table('topsis_normalisasis')->insert($request->except('_token'));
                    // dd($matrixNormalisasi);
                }
            }
            return redirect()
                ->route('admin.normalisasi')
                ->with('success_message', "Berhasil Proses Matrix Normalisasi");
        }
        return redirect()
            ->back()
            ->with('error_message', 'data sudah ada!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBobot(Request $request)
    {
        $checkExist = TopsisBobot::where('topsis_bobot', '!=', null)->first();

        if (empty($checkExist)) {
            //bobot
            $karyawans = Siswa::all();
            foreach ($karyawans as $karyawan) {
                $matrixNormalisasi = DB::table('topsis_normalisasis')
                    ->join('kriterias', 'topsis_normalisasis.kriteria_id', '=', 'kriterias.id')
                    ->where('siswa_id', '=', $karyawan->id)
                    ->get();
                foreach ($matrixNormalisasi as $normalisasi) {
                    $bobot = $normalisasi->weight / 100;
                    $hasil = $normalisasi->topsis_normalisasi * $bobot;

                    $request->request->add(['topsis_bobot' => $hasil]);

                    $request->request->add(['normalisasi_id' => $normalisasi->id]);
                    $request->request->add(['kriteria_id' => $normalisasi->kriteria_id]);
                    $request->request->add(['siswa_id' => $normalisasi->siswa_id]);

                    DB::table('topsis_bobots')->insert($request->except('_token'));
                }
            }
            return redirect()
                ->route('admin.bobot')
                ->with('success_message', "Berhasil Proses Matrix Pembobotan");
        }
        return redirect()
            ->back()
            ->with('error_message', 'data sudah ada!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeJarak(Request $request)
    {
        $checkExist = TopsisJarak::where('topsis_solusi_max', '!=', null)
            ->where('topsis_solusi_max', '!=', null)->first();

        if (empty($checkExist)) {

            $karyawans = Siswa::all();
            foreach ($karyawans as $karyawan) {
                $idealMax = 0;
                $idealMin = 0;
                $matrixBobot = DB::table('topsis_bobots')
                    ->where('siswa_id', '=', $karyawan->id)
                    ->get();

                foreach ($matrixBobot as $bobot) {
                    $nilmax = DB::table('topsis_bobots')
                        ->where('kriteria_id', '=', $bobot->kriteria_id)
                        ->orderBy('topsis_bobot', 'desc')
                        ->first();
                    $hasilmax = $nilmax->topsis_bobot - $bobot->topsis_bobot;
                    $powhasilmax = pow($hasilmax, 2);
                    $idealMax = $idealMax + $powhasilmax;
                }
                $akarhasilmax = sqrt($idealMax);

                foreach ($matrixBobot as $bobot) {
                    $nilmin = DB::table('topsis_bobots')
                        ->where('kriteria_id', '=', $bobot->kriteria_id)
                        ->orderBy('topsis_bobot', 'asc')
                        ->first();
                    $hasilmin = $nilmin->topsis_bobot - $bobot->topsis_bobot;
                    $powhasilmin = pow($hasilmin, 2);
                    $idealMin = $idealMin + $powhasilmin;
                }
                $akarhasilmin = sqrt($idealMin);

                $request->request->add(['topsis_solusi_max' => $akarhasilmax]);
                $request->request->add(['topsis_solusi_min' => $akarhasilmin]);

                $request->request->add(['kriteria_id' => $bobot->kriteria_id]);
                $request->request->add(['siswa_id' => $bobot->siswa_id]);

                DB::table('topsis_jaraks')->insert($request->except('_token'));
            }

            return redirect()
                ->route('admin.jarak')
                ->with('success_message', "Berhasil Proses Matrix Jarak Ideal Min dan Max");
        }
        return redirect()
            ->back()
            ->with('error_message', 'data sudah ada!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePreferensi(Request $request)
    {
        $checkExist = TopsisPreferensi::where('topsis_preferensi', '!=', null)->first();

        if (empty($checkExist)) {
            $karyawans = Siswa::get();
            foreach ($karyawans as $karyawan) {
                $matrixJarak = DB::table('topsis_jaraks')
                    ->where('siswa_id', '=', $karyawan->id)
                    ->get();

                foreach ($matrixJarak as $jarak) {
                    $hasilPref = $jarak->topsis_solusi_min / ($jarak->topsis_solusi_max + $jarak->topsis_solusi_min);
                }

                $request->request->add(['topsis_preferensi' => $hasilPref]);

                $request->request->add(['jarak_id' => $jarak->id]);
                $request->request->add(['kriteria_id' => $jarak->kriteria_id]);
                $request->request->add(['siswa_id' => $jarak->siswa_id]);
                DB::table('topsis_preferensis')->insert($request->except('_token'));
            }
            return redirect()
                ->route('admin.preferensi')
                ->with('success_message', "Berhasil Proses Matrix Jarak Ideal Min dan Max");
        }
        return redirect()
            ->back()
            ->with('error_message', 'data sudah ada!');
    }
}
