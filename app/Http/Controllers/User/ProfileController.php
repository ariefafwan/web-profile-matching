<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $page = "Profile Anda";
        $check = Auth::user()->gender;
        if ($check == null) {
            return redirect()->route('profile.create');
        }
        return view('user.profile.index', compact('user', 'page', 'check'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $page = "Tambah Profile Anda";
        return view('user.profile.create', compact('user', 'page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = Auth::user();
        $page = "Edit Profile Anda";
        return view('user.profile.edit', compact('user', 'page'));
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
        $nm = $request->profile_img;
        $namaFile = $nm->getClientOriginalName();

        $UserProfile = User::findOrFail($id);
        $UserProfile->name = $request->name;
        $UserProfile->profile_img = $namaFile;
        $UserProfile->gender = $request->gender;
        $UserProfile->alamat = $request->alamat;
        $UserProfile->nmrhp = $request->nmrhp;

        $nm->move(public_path() . '/storage/profil', $namaFile);
        $UserProfile->save();

        Alert::success('Informasi Pesan!', 'Profile Berhasil Ditambahkan');
        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}