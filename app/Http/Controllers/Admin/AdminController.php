<?php

namespace App\Http\Controllers\Admin;

use App\Models\Aspek;
use App\Models\Bobot;
use App\Models\Hasil;
use App\Models\Kriteria;
use App\Models\Pegawai;
use App\Models\Pertanyaan;
use App\Models\User;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $page = "Dasboard Admin";
        $dt1 = User::where('role_id', '2')->get()->count();
        return view('admin.dashboard', compact('user', 'page', 'dt1'));
    }

    //Aspek
    public function seluruhaspek()
    {
        $user = Auth::user();
        $page = "Aspek Penilaian";
        $aspek = Aspek::latest()->paginate(10);
        return view('admin.aspek.aspek', compact('user', 'aspek', 'page'));
    }

    public function createaspek()
    {
        $user = Auth::user();
        $page = "Tambah Aspek";
        $aspek = Aspek::latest()->paginate(10);
        return view('admin.aspek.create', compact('user', 'aspek', 'page'));
    }

    public function storeaspek(Request $request)
    {
        $dtUpload = new Aspek();
        $dtUpload->name = $request->name;
        $dtUpload->cf = $request->cf;
        $dtUpload->sf = $request->sf;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Aspek Baru Berhasil ditambahkan');
        return redirect()->route('seluruhaspek');
    }

    public function editaspek($id)
    {
        $user = Auth::user();
        $page = "Edit Aspek";
        $aspek = Aspek::findOrFail($id);
        return view('admin.aspek.edit', compact('user', 'aspek', 'page'));
    }

    public function updateaspek(Request $request, $id)
    {
        $dtUpload = Aspek::findOrFail($id);
        $dtUpload->name = $request->name;
        $dtUpload->cf = $request->cf;
        $dtUpload->sf = $request->sf;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Aspek Berhasil Diedit');
        return redirect()->route('seluruhaspek');
    }

    public function destroyaspek($id)
    {
        $aspek = Aspek::findOrFail($id);
        $aspek->delete();
        
        Alert::success('Informasi Pesan!', 'Aspek Berhasil dihapus!');
        return back();
    }


    //Pegawai
    public function seluruhpegawai()
    {
        $user = Auth::user();
        $page = "Seluruh Pegawai";
        $pegawai = User::latest()->paginate(10);
        return view('admin.pegawai.pegawai', compact('user', 'pegawai', 'page'));
    }

    
    //Kriteria
    public function kriteria()
    {
        $user = Auth::user();
        $page = "Sub Kriteria Penilaian";
        $kriteria = Kriteria::latest()->paginate(10);
        return view('admin.kriteria.kriteria', compact('user', 'page', 'kriteria'));
    }

    public function createkriteria()
    {
        $user = Auth::user();
        $page = "Tambah Kriteria";
        $aspek = Aspek::all();
        $kriteria = Kriteria::latest()->paginate(10);
        return view('admin.kriteria.create', compact('user', 'kriteria', 'page', 'aspek'));
    }


    public function storekriteria(Request $request)
    {
        $dtUpload = new Kriteria();
        $dtUpload->name = $request->name;
        $dtUpload->aspek_id = $request->aspek_id;
        $dtUpload->jenis = $request->jenis;
        $dtUpload->nilai = $request->nilai;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Kriteria Baru Berhasil ditambahkan');
        return redirect()->route('kriteria');
    }

    public function editkriteria($id)
    {
        $user = Auth::user();
        $page = "Edit Kriteria";
        $kriteria = Kriteria::findOrFail($id);
        $aspek = Aspek::all();
        return view('admin.kriteria.edit', compact('user', 'kriteria', 'page', 'aspek'));
    }

    public function updatekriteria(Request $request, $id)
    {
        $dtUpload = Kriteria::findOrFail($id);
        $dtUpload->name = $request->name;
        $dtUpload->aspek_id = $request->aspek_id;
        $dtUpload->jenis = $request->jenis;
        $dtUpload->nilai = $request->nilai;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Kriteria Berhasil Diedit');
        return redirect()->route('kriteria');
    }

    public function destroykriteria($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();
        
        Alert::success('Informasi Pesan!', 'Kriteria Berhasil dihapus!');
        return back();
    }

    //bobot selisih
    public function bobot()
    {
        $user = Auth::user();
        $page = "Bobot Selisih Penilaian";
        $bobot = Bobot::all();
        return view('admin.bobot.bobot', compact('user', 'page', 'bobot'));
    }

    //Get Kriteria
    public function getkriteria($id)
    {
        $kriteria = Kriteria::where("aspek_id",$id)->pluck('name','id');
        return json_encode($kriteria);
        // dd($kriteria);
    }

    //Get Pertanyaan
    public function getpertanyaan($id)
    {
        $pertanyaan = Kriteria::where("kriteria_id",$id)->pluck('name','id');
        return json_encode($pertanyaan);
        // dd($pertanyaan);
    }

    //Tambah Hasil Penilaian
    public function hasil(Request $request)
    {
        $user = Auth::user()->id;
        $hasil = Hasil::latest()->paginate(10);
        $grup = User::all()->where('role_id', '2');
        $page = "Tambah Evaluasi Penilaian";
        $bobot = Bobot::all();
        $aspek = Aspek::pluck('name','id');
        $kriteria = Kriteria::all()->where('aspek_id', $request->aspek_id);
        $pertanyaan = Pertanyaan::all()->where('kriteria_id', $request->kriteria_id);
        return view('admin.hasil.create', compact('user', 'page', 'bobot', 'grup', 'hasil', 'kriteria', 'pertanyaan', 'aspek'));
    }
}
