<?php

namespace App\Http\Controllers\User;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $name = Auth::user()->name;
        $page = "Welcome $name";
        $check = Auth::user()->gender;
        if ($check == null) {
            return redirect()->route('profile.create');
        }
        return view('user.index', compact('user', 'page', 'check', ));
    }
}