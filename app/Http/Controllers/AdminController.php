<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $page = "Dasboard Admin";
        $dt1 = User::where('role_id', '2')->get()->count();
        return view('admin.dashboard', compact('user', 'page', 'dt1'));
    }
}
