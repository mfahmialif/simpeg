<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Services\BulkData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (auth()->user()->role == "admin") {
                return redirect()->route('admin.dashboard');
            }
            if (auth()->user()->role == "pegawai") {
                return redirect()->route('pegawai.dashboard');
            }
        }
        return view('index');
    }
}
