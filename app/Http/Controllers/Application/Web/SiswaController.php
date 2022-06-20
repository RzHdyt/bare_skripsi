<?php

namespace App\Http\Controllers\Application\Web;

use App\Http\Controllers\Controller;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{

    public function __construct()
    {
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $siswas = Siswa::get();
        return view('application.web.siswa.index', [
            'no' => $no,
            'siswas' => $siswas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('application.web.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'photos',
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
        ]);

        $siswas = new Siswa;
        $siswas->nama = $request->nama;
        $siswas->jenis_kelamin = $request->jenis_kelamin;
        $siswas->tempat_lahir = $request->tempat_lahir;
        $siswas->tanggal_lahir = $request->tanggal_lahir;
        $siswas->alamat = $request->alamat;
        $siswas->agama = $request->agama;
        $siswas->kelas = $request->kelas;
        $siswas->no_tlp_siswa = $request->no_tlp_siswa;
        $siswas->nama_ayah = $request->nama_ayah;
        $siswas->pekerjaan_ayah = $request->pekerjaan_ayah;
        $siswas->nama_ibu = $request->nama_ibu;
        $siswas->pekerjaan_ibu = $request->pekerjaan_ibu;
        $siswas->no_tlp_ortu = $request->no_tlp_ortu;
        $siswas->nama_wali = $request->nama_wali;
        $siswas->pekerjaan_wali = $request->pekerjaan_wali;
        $siswas->no_tlp_wali = $request->no_tlp_wali;

        if ($filePath = $request->file('photos')) {
            $namePath = date('YmdHis') . "." . $filePath->getClientOriginalName();
            $distanationPath = 'images';
            $filePath->move($distanationPath, $namePath);
            // $photo = Photos::create(['file' => "/" . $namePath]);
            $siswas->photos =  '/' . $namePath;
        }

        DB::transaction(function () use ($siswas) {
            $siswas->save();
        }, 5);

        return redirect()
            ->route('admin.siswa.index')
            ->with('success_message', 'data berahasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswas = Siswa::where('id', $id)->first();
        return view('application.web.siswa.show', [
            'siswas' => $siswas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'photos',
            'nisn',
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
        ]);

        $siswas = Siswa::where('id', $id)->first();
        $siswas->nama = $request->nama;
        $siswas->jenis_kelamin = $request->jenis_kelamin;
        $siswas->tempat_lahir = $request->tempat_lahir;
        $siswas->tanggal_lahir = $request->tanggal_lahir;
        $siswas->alamat = $request->alamat;
        $siswas->agama = $request->agama;
        $siswas->no_tlp_siswa = $request->no_tlp_siswa;
        $siswas->nama_ayah = $request->nama_ayah;
        $siswas->pekerjaan_ayah = $request->pekerjaan_ayah;
        $siswas->nama_ibu = $request->nama_ibu;
        $siswas->pekerjaan_ibu = $request->pekerjaan_ibu;
        $siswas->no_tlp_ortu = $request->no_tlp_ortu;
        $siswas->nama_wali = $request->nama_wali;
        $siswas->pekerjaan_wali = $request->pekerjaan_wali;
        $siswas->no_tlp_wali = $request->no_tlp_wali;

        if ($filePath = $request->file('photos')) {
            $namePath = date('YmdHis') . "." . $filePath->getClientOriginalName();
            $distanationPath = 'images';
            $filePath->move($distanationPath, $namePath);
            // $photo = Photos::create(['file' => "/" . $namePath]);
            $siswas->photos =  '/' . $namePath;
        }

        DB::transaction(function () use ($siswas) {
            $siswas->save();
        }, 5);

        return redirect()
            ->route("admin.siswa.edit", [$siswas->id])
            ->with('success_message', 'data berahasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswas = Siswa::where('id', $id)->first();
        unlink(public_path('images/') . $siswas->photos);

        DB::transaction(function () use ($siswas) {
            $siswas->delete();
        }, 5);

        return redirect()
            ->route("admin.siswa.index")
            ->with('error_message', 'data berahasil dihapus!!');
    }
}
