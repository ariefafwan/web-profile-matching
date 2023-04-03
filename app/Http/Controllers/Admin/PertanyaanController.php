<?php

namespace App\Http\Controllers\Admin;

use App\Models\Aspek;
use App\Models\Kriteria;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $page = "Daftar Bobot Pertanyaan";
        $pertanyaan = Pertanyaan::latest()->paginate(10);
        return view('admin.pertanyaan.pertanyaan', compact('user', 'page', 'pertanyaan'));
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user()->id;
        $page = "Tambah Bobot Pertanyaan";
        $pertanyaan = Pertanyaan::latest()->paginate(10);
        $aspek = Aspek::pluck('name','id');   
        // dd($aspek);
        $kriteria = Kriteria::all()->where('aspek_id', $request->aspek_id);
        return view('admin.pertanyaan.create', compact('user', 'page', 'pertanyaan', 'aspek', 'kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dtUpload = new Pertanyaan();
        $dtUpload->aspek_id = $request->aspek_id;
        $dtUpload->kriteria_id = $request->kriteria_id;
        $dtUpload->nilai = $request->nilai;
        $dtUpload->ket = $request->ket;

        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Bobot Pertanyaan Berhasil Ditambahkan');
        return redirect()->route('pertanyaan.index');
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
    public function edit(Request $request, $id)
    {
        $user = Auth::user()->id;
        $page = "Tambah Bobot Pertanyaan";
        $pertanyaan = Pertanyaan::findOrFail($id);
        $aspek = Aspek::pluck('name','id');
        // dd($aspek);
        $kriteria = Kriteria::all()->where('aspek_id', $request->aspek_id);
        return view('admin.pertanyaan.edit', compact('user', 'page', 'pertanyaan', 'aspek', 'kriteria'));
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
        $dtUpload = Pertanyaan::findOrFail($id);
        $dtUpload->aspek_id = $request->aspek_id;
        $dtUpload->kriteria_id = $request->kriteria_id;
        $dtUpload->nilai = $request->nilai;
        $dtUpload->ket = $request->ket;

        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Bobot Pertanyaan Berhasil Diedit');
        return redirect()->route('pertanyaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->delete();
        
        Alert::success('Informasi Pesan!', 'Bobot Pertanyaan Berhasil dihapus!');
        return back();
    }
}
