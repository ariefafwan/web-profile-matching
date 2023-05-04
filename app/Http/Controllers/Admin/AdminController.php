<?php

namespace App\Http\Controllers\Admin;

use App\Models\Aspek;
use App\Models\Bobot;
use App\Models\Hasil;
use App\Models\Kriteria;
use Illuminate\Support\Facades\DB;
use App\Models\Pertanyaan;
use App\Models\Ranking;
use App\Models\User;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use PHPUnit\Framework\Constraint\Count;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $page = "Dasboard Admin";
        $dt1 = User::where('role_id', '2')->get()->count();
        $dt2 = Ranking::select('user_id')->distinct()->get()->count();
        return view('admin.dashboard', compact('user', 'page', 'dt1', 'dt2'));
    }

    //daftar user/pegawai
    public function pegawai()
    {
        $user = Auth::user();
        $page = "Daftar Pegawai";
        $grup = User::where('role_id', '2')->paginate(10);
        return view('admin.pegawai', compact('user', 'page', 'grup'));
    }

    public function destroypegawai($id)
    {
        $pegawai = User::findOrFail($id);
        $pegawai->delete();
        
        Alert::success('Informasi Pesan!', 'Pegawai Berhasil dihapus!');
        return back();
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
        $dtUpload->bobot = $request->bobot;
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
        $dtUpload->bobot = $request->bobot;
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
        $kriteria = Kriteria::orderBy('aspek_id','asc')->orderBy('jenis', 'asc')->paginate(10);
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

        return view('admin.hasil.create',
            compact('user', 'page', 'grup', 'hasil', 'kriteria', 'pertanyaan', 'aspek'));
    }

    public function storehasil(Request $request)
    {
        $jenis = Kriteria::where('id', $request->kriteria_id)->get();
        $nilaistandart = Kriteria::where('id', $request->kriteria_id)->sum('nilai');
        foreach ($jenis as $jj) {
            $k = $jj->jenis;
            $nilai = $request->nilai;
            $selisih = ($nilai - $nilaistandart);
        }

        $bobot = Bobot::where('selisih', $selisih)->get();
        foreach ($bobot as $bb) {
            $idbobot = $bb->id;
            $n_bobot = $bb->bobot;
        }
        
        $dtUpload = new Hasil();
        $dtUpload->user_id = $request->user_id;
        $dtUpload->aspek_id = $request->aspek_id;
        $dtUpload->kriteria_id = $request->kriteria_id;
        $dtUpload->nilai = $request->nilai;
        $dtUpload->jenis = $k;
        $dtUpload->n_bobot = $n_bobot;
        $dtUpload->bobot_id = $idbobot;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Hasil Baru Berhasil Ditambahkan');
        return redirect()->route('tambahhasil');
    }

    //Cacah Evaluasi
    public function evaluasihasil()
    {
        $user = Auth::user()->id;
        $page = "Cacah Evaluasi User";
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
        
        return view('admin.hasil.edit', 
            compact('user', 'page', 'grup', 'hasil', 'kriteria', 'pertanyaan', 'aspek'));
    }

    public function updatehasil(Request $request, $id)
    {
        $jenis = Kriteria::where('id', $request->kriteria_id)->get();
        $nilaistandart = Kriteria::where('id', $request->kriteria_id)->sum('nilai');
        foreach ($jenis as $jj) {
            $k = $jj->jenis;
            $nilai = $request->nilai;
            $selisih = ($nilai - $nilaistandart);
        }

        $bobot = Bobot::where('selisih', $selisih)->get();
        foreach ($bobot as $bb) {
            $idbobot = $bb->id;
            $n_bobot = $bb->bobot;
        }
        
        $dtUpload = Hasil::findOrFail($id);
        $dtUpload->user_id = $request->user_id;
        $dtUpload->aspek_id = $request->aspek_id;
        $dtUpload->kriteria_id = $request->kriteria_id;
        $dtUpload->nilai = $request->nilai;
        $dtUpload->jenis = $k;
        $dtUpload->n_bobot = $n_bobot;
        $dtUpload->bobot_id = $idbobot;
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

    //Tabel Cacah Evaluasi
    public function tabelcacah()
    {
        $user = Auth::user()->id;
        $page = "Tabel Cacah Evaluasi";
        $username = Hasil::select('user_id')->distinct()->get();
        $hasil = Hasil::orderBy('user_id', 'asc')->orderBy('aspek_id', 'asc')->orderBy('kriteria_id', 'asc')->get();
        $aspek = Aspek::orderBy('id', 'asc')->get();
        $kriteria = Kriteria::orderBy('id', 'asc')->get();
        // $colspan = $aspek->kriteria()->count();
        return view('admin.hasil.tabel', compact('user', 'page', 'hasil', 'aspek', 'username', 'kriteria'));
    }

    //Hasil Perhitungan
    public function perhitungan()
    {   
        //view
        $user = Auth::user()->id;
        $page = "Perhitungan Nilai Factor Setiap Aspek";
        $username = Hasil::select('user_id')->distinct()->get();
        $aspek = Aspek::all();
        $hasil = Hasil::select('user_id', 'aspek_id', 'jenis')
            ->selectRaw("SUM(n_bobot) / count(n_bobot) as nilai")
            ->groupBy('user_id')
            ->groupBy('aspek_id')
            ->groupBy('jenis')
            ->orderBy('user_id', 'asc')
            ->orderBy('aspek_id', 'asc')
            ->get();

        
        //modal
        $userid = User::all()->where('role_id', '2');
                        
        return view('admin.hasil.perhitungan', 
            compact('user', 'page', 'hasil', 'aspek', 'username', 'userid'));
    }

    //store nilai total
    public function storetotal(Request $request)
    {
        $aspekid = Aspek::where('id', $request->aspek_id)->get();
        foreach ($aspekid as $as) {
            $bobot = $as->bobot;
            $cf = $as->cf;
            $sf = $as->sf;
            $nilaicf = $request->ncf;
            $nilaisf = $request->nsf;
            $total = (($cf / 100) * $nilaicf) + (($sf / 100) * $nilaisf);
        }
        
        $dtUpload = new Ranking();
        $dtUpload->user_id = $request->user_id;
        $dtUpload->aspek_id = $request->aspek_id;
        $dtUpload->nt = $total;
        $dtUpload->b_aspek = $bobot;
        $dtUpload->save();

        Alert::success('Informasi Pesan!', 'Hasil Baru Berhasil Ditambahkan');
        return redirect()->route('perhitungan');
    }

    public function ranking()
    {   
        $user = Auth::user()->id;
        $page = "Nilai Total & Rangking";
        //Ranking
        $username = Ranking::select('user_id')->distinct()->get();
        $ranking = Ranking::select('user_id')
            ->selectRaw("SUM(nt * b_aspek / 100) as hr")
            ->groupBy('user_id')
            ->orderBy('hr', 'desc')
            ->get();

        //NT
        $counta = Aspek::all()->count();
        $aspek = Aspek::all();
        $nt = Ranking::orderBy('user_id', 'asc')->get();
                        
        return view('admin.hasil.ranking',
            compact('user', 'page', 'ranking', 'username', 'nt', 'aspek', 'counta'));
    }

    public function test()
    {
        // $ncf = Hasil::where('jenis', 'cf')
        //                 ->select('user_id', 'aspek_id')
        //                 ->selectRaw("SUM(n_bobot) / count(n_bobot) as ncf")
        //                 ->groupBy('user_id')
        //                 ->groupBy('aspek_id')
        //                 ->orderBy('user_id', 'asc')
        //                 ->orderBy('aspek_id', 'asc')
        //                 ->get();

        // $nsf = Hasil::where('jenis', 'sf')
        //                 ->select('user_id', 'aspek_id')
        //                 ->selectRaw("SUM(n_bobot) / count(n_bobot) as nsf")
        //                 ->groupBy('user_id')
        //                 ->groupBy('aspek_id')
        //                 ->orderBy('user_id', 'asc')
        //                 ->orderBy('aspek_id', 'asc')
        //                 ->get();
        // $n = Hasil::select('user_id', 'aspek_id', 'jenis')
        //                 ->selectRaw("SUM(n_bobot) / count(n_bobot) as nilai")
        //                 ->groupBy('user_id')
        //                 ->groupBy('aspek_id')
        //                 ->groupBy('jenis')
        //                 ->orderBy('user_id', 'asc')
        //                 ->orderBy('aspek_id', 'asc')
        //                 ->get()
        //                 ->toArray();

        // $nilaisf = $n->where('jenis', 'sf');
        // $nilaicf = $n->where('jenis', 'cf');

        // foreach ($n as $o) {
            
        // }
        
        // foreach ($nilaisf as $n_sf) {
        //     $sfaspek = $n_sf->aspek->sf;
        // }

        // foreach ($nilaicf as $n_cf) {
        //     $cfaspek = $n_cf->aspek->cf;
        // }

        // $ns = (($n_sf->aspek->sf / 100) * $n_sf->nilai) + (($n_cf->aspek->cf / 100) * $n_cf->nilai);
        // $ranking = Ranking::select('user_id')
        //     ->selectRaw("SUM(nt * b_aspek / 100) as hr")
        //     ->groupBy('user_id')
        //     ->orderBy('hr', 'desc')
        //     ->get();

        // dd($ranking);
    }
}
