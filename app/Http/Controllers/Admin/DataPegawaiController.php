<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\User;
use App\Services\BulkData;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class DataPegawaiController extends Controller
{
    public function index()
    {
        $users = Pegawai::all();
        return view('admin/data-pegawai/index', compact('users'));
    }

    public function tambah()
    {
        $bulkData = new BulkData();
        return view('admin/data-pegawai/tambah', compact('bulkData'));
    }

    public function tambahProses(Request $request)
    {
        $dataValidated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email',
            'nip' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'agama' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'golongan_darah' => 'required|max:255',
            'status_pernikahan' => 'required|max:255',
            'status_kepegawaian' => 'required|max:255',
            'alamat' => 'required',
            'nomer_telepon' => 'required|max:255',
            'unit_kerja' => 'required|max:255',
            'foto' => 'required|max:255',
        ]);

        $lokasi = 'foto_pegawai/';
        $foto = $request->file('foto');
        $extensi = $request->file('foto')->extension();
        $new_image_name = 'Foto' . date('YmdHis') . uniqid() . '.' . $extensi;

        $foto->move(public_path($lokasi), $new_image_name);

        $birth = $dataValidated['tempat_lahir'] . ", " . $dataValidated['tanggal_lahir'];
        try {
            User::create([
                'email' => $dataValidated['email'],
                'password' => Hash::make('dalwa123'),
                'foto' => $new_image_name,
                'role' => 'pegawai'
            ]);

            $id = User::latest()->first()->id;

            Pegawai::create([
                'user_id' => $id,
                'nip' => $dataValidated['nip'],
                'ttl' => $birth,
                'nama' => $dataValidated['name'],
                'agama' => $dataValidated['agama'],
                'jenis_kelamin' => $dataValidated['jenis_kelamin'],
                'golongan_darah' => $dataValidated['golongan_darah'],
                'status_pernikahan' => $dataValidated['status_pernikahan'],
                'status_kepegawaian' => $dataValidated['status_kepegawaian'],
                'alamat' => $dataValidated['alamat'],
                'telpon' => $dataValidated['nomer_telepon'],
                'unit_kerja' => $dataValidated['unit_kerja']
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('admin.dataPegawai')->with('failed', "Gagal menambahkan data dengan nama " . $dataValidated['name'] . $th);
        }
        return redirect()->route('admin.dataPegawai')->with('message', "Berhasil menambahkan data dengan nama " . $dataValidated['name']);
    }

    public function detail($id)
    {
        $pegawai = Pegawai::find($id);

        // hitung umur
        $tanggalLahir = explode(',', $pegawai->ttl)[1];
        $birthDate = new DateTime($tanggalLahir);
        $today = new DateTime("today");
        if ($birthDate > $today) {
            $umur = "0 tahun 0 bulan 0 hari";
        }
        $y = $today->diff($birthDate)->y;
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;

        $umur = $y . " tahun " . $m . " bulan " . $d . " hari";
        return view('admin/data-pegawai/detail', compact('pegawai', 'umur'));
    }

    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        if ($pegawai->ttl != null) {
            $pegawai->tempat_lahir = explode(',', $pegawai->ttl)[0];
            $pegawai->tanggal_lahir = explode(',', $pegawai->ttl)[1];
        }

        $bulkData = new BulkData();
        return view('admin/data-pegawai/edit', compact('pegawai', 'bulkData'));
    }

    public function editProses(Request $request, $id)
    {
        $dataValidated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email',
            'nip' => 'max:255',
            'tempat_lahir' => 'max:255',
            'tanggal_lahir' => 'max:255',
            'agama' => 'max:255',
            'jenis_kelamin' => 'max:255',
            'golongan_darah' => 'max:255',
            'status_pernikahan' => 'max:255',
            'status_kepegawaian' => 'max:255',
            'alamat' => '',
            'nomer_telepon' => 'max:255',
            'unit_kerja' => 'max:255',
        ]);

        $namaFoto = $request->input('foto_lama');

        if ($request->has('foto')) {
            $lokasi = 'foto_pegawai/';
            $foto = $request->file('foto');
            $extensi = $request->file('foto')->extension();
            $new_image_name = 'Foto' . date('YmdHis') . uniqid() . '.' . $extensi;
            $upload = $foto->move(public_path($lokasi), $new_image_name);
            $namaFoto = $new_image_name;
            if ($upload) {
                $getFoto = Pegawai::find($id)->user->foto;
                if ($getFoto != null) {
                    File::delete(public_path('foto_pegawai/' . $getFoto));
                }
            }
        }

        $birth = $dataValidated['tempat_lahir'] . ", " . $dataValidated['tanggal_lahir'];
        try {
            DB::beginTransaction();
            Pegawai::where('id', $id)
                ->update([
                    'nip' => $dataValidated['nip'],
                    'ttl' => $birth,
                    'nama' => $dataValidated['name'],
                    'agama' => $dataValidated['agama'],
                    'jenis_kelamin' => $dataValidated['jenis_kelamin'],
                    'golongan_darah' => $dataValidated['golongan_darah'],
                    'status_pernikahan' => $dataValidated['status_pernikahan'],
                    'status_kepegawaian' => $dataValidated['status_kepegawaian'],
                    'alamat' => $dataValidated['alamat'],
                    'telpon' => $dataValidated['nomer_telepon'],
                    'unit_kerja' => $dataValidated['unit_kerja'],
                ]);

            $userId = Pegawai::find($id)->user_id;
            User::where('id', $userId)
                ->update([
                    'email' => $dataValidated['email'],
                    'foto' => $namaFoto
                ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.dataPegawai')->with('failed', "Gagal mengupdate data dengan nama " . $dataValidated['name']);
        }
        return redirect()->route('admin.dataPegawai')->with('message', "Berhasil mengupdate data dengan nama " . $dataValidated['name']);
    }

    public function delete(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $userId = Pegawai::find($id)->user_id;
            Pegawai::destroy($id);
            User::destroy($userId);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.dataPegawai')->with('failed', "Gagal mengupdate data dengan nama " . $request->input('name') . " $th");
        }
        return redirect()->route('admin.dataPegawai')->with('message', "Berhasil mengupdate data dengan nama " . $request->input('name'));
    }
}
