<?php

namespace App\Http\Controllers\Application\Web;

use App\Http\Controllers\Controller;
use App\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $kriterias = Kriteria::get();
        return view('application.web.kriteria.index', [
            'no' => $no,
            'kriterias' => $kriterias,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
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
            'name' => 'required',
            'weight' => 'required',
        ]);

        $kriterias = new Kriteria;
        $kriterias->name = $request->name;
        $kriterias->weight = $request->weight;
        DB::transaction(function () use ($kriterias) {
            $kriterias->save();
        }, 5);

        return redirect()
            ->route('admin.kriteria.index')
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
        $kriterias = Kriteria::where('id', $id)->first();
        return view('application.web.kriteria.show', [
            'kriterias' => $kriterias
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
        $kriterias = Kriteria::where('id', $id)->first();
        $kriterias->name = $request->name;
        $kriterias->weight = $request->weight;
        DB::transaction(function () use ($kriterias) {
            $kriterias->save();
        }, 5);

        return redirect()
            ->route('admin.kriteria.index')
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
        $kriterias = Kriteria::where('id', $id)->first();

        DB::transaction(function () use ($kriterias) {
            $kriterias->delete();
        });
        return redirect()
            ->route('admin.kriteria.index')
            ->with('success_message', 'data berahasil dihapus');
    }
}
