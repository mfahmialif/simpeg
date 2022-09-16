<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Pegawai;
use App\Services\BulkData;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensis = Absensi::all();
        return view('admin/absensi/index', compact('absensis'));
    }

    public function tambah()
    {
        $bulkData = new BulkData();
        return view('admin//absensi/tambah', compact('bulkData'));
    }

    public function tambahProses(Request $request)
    {
        $dataValidated = $request->validate([
            'mata_kuliah' => 'required|max:255',
            'nip' => 'required|max:255'
        ]);

        try {
            $pegawai = Pegawai::where('nip', $dataValidated['nip'])->first();
            Absensi::create([
                'mata_kuliah' => $dataValidated['mata_kuliah'],
                'pegawai_id' => $pegawai->id
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('admin.absensi')->with('failed', "Gagal absensi data dengan NIP " . $dataValidated['nip'] . " di mata_kuliah ".$dataValidated['mata_kuliah']);
        }
        return redirect()->route('admin.absensi')->with('message', "Berhasil absensi dengan NIP " . $dataValidated['nip'] . " di mata_kuliah ".$dataValidated['mata_kuliah']);
    }
}
