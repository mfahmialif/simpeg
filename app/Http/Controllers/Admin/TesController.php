<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TesController extends Controller
{
    public function index()
    {
        return view('admin/tes');
    }

    public function tambah(Request $request)
    {
        dd($request->file('foto')->extension());
    }
}
