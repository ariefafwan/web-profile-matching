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
        $pertanyaan = Pertanyaan::where("kriteria_id",$id)->pluck('ket', 'nilai', 'id');
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
        $aspek = Aspek::pluck('name','id');
        $kriteria = Kriteria::all()->where('aspek_id', $request->aspek_id);
        $pertanyaan = Pertanyaan::all()->where('kriteria_id', $request->kriteria_id);
        return view('admin.hasil.create', compact('user', 'page', 'grup', 'hasil', 'kriteria', 'pertanyaan', 'aspek'));
    }

    public function storehasil(Request $request)
    {
        $dtUpload = new Hasil();
        $dtUpload->user_id = $request->user_id;
        $dtUpload->aspek_id = $request->aspek_id;
        $dtUpload->kriteria_id = $request->kriteria_id;
        $dtUpload->nilai = $request->nilai;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Hasil Baru Berhasil Ditambahkan');
        return redirect()->route('tambahhasil');
    }

    public function evaluasihasil()
    {
        $user = Auth::user()->id;
        $page = "Hasil Evaluasi User";
        $hasil = Hasil::orderBy('user_id', 'asc')->orderBy('aspek_id', 'asc')->paginate(10);
        return view('admin.hasil.hasil', compact('user', 'page', 'hasil'));
    }

    public function edithasil(Request $request, $id)
    {
        $user = Auth::user()->id;
        $page = "Edit Evaluasi User";
        $hasil = Hasil::findOrFail($id);
        $grup = User::all()->where('role_id', '2');
        $aspek = Aspek::pluck('name','id');
        $kriteria = Kriteria::all()->where('aspek_id', $request->aspek_id);
        $pertanyaan = Pertanyaan::all()->where('kriteria_id', $request->kriteria_id);
        return view('admin.hasil.edit', compact('user', 'page', 'grup', 'hasil', 'kriteria', 'pertanyaan', 'aspek'));
    }

    public function updatehasil(Request $request, $id)
    {
        $dtUpload = Hasil::findOrFail($id);
        $dtUpload->user_id = $request->user_id;
        $dtUpload->aspek_id = $request->aspek_id;
        $dtUpload->kriteria_id = $request->kriteria_id;
        $dtUpload->nilai = $request->nilai;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Hasil Berhasil Diedit');
        return redirect()->route('hasil');
    }

    public function destroyhasil($id)
    {
        $hasil = Hasil::findOrFail($id);
        $hasil->delete();
        
        Alert::success('Informasi Pesan!', 'Hasil Berhasil dihapus!');
        return back();
    }

    //Hasil Perhitungan
    public function perhitungan()
    {
        $user = Auth::user()->id;
        $username = Hasil::select('user_id')->distinct()->get();
        $perhitungan = Hasil::orderBy('user_id', 'asc')->orderBy('aspek_id', 'asc')->orderBy('kriteria_id', 'asc')->get();
        foreach ($perhitungan as $hitung) {
            $nilai = $hitung->nilai;
            $nilasistandart = Kriteria::where('id', $hitung->kriteria_id)->sum('nilai');
            $selisih = ($nilasistandart - $nilai);
            $bobot = Bobot::all()->where('selisih', $selisih);
        }
        $page = "Perhitungan";
        $aspek = Aspek::orderBy('id', 'asc')->get();
        $dt1 = Aspek::get()->count();
        $kriteria = Kriteria::orderBy('id', 'asc')->get();
        return view('admin.hasil.perhitungan', 
            compact('user', 'page', 'perhitungan', 'aspek', 'kriteria', 'username', 'dt1', 'bobot'));
        // $username = Hasil::select('user_id')->distinct()->get();
        // dd($username);
    }

    public function test()
    {
        $perhitungan = Hasil::orderBy('user_id', 'asc')->orderBy('aspek_id', 'asc')->orderBy('kriteria_id', 'asc')->get();
        foreach ($perhitungan as $hitung) {
            $nilai = $hitung->nilai;
            $nilasistandart = Kriteria::where('id', $hitung->kriteria_id)->sum('nilai');
            $selisih = ($nilasistandart - $nilai);
            $bobot = Bobot::where('selisih', $selisih)->get();
            dd($bobot);
        }
    }
}
