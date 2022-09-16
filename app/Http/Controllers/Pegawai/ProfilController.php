<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\User;
use App\Services\BulkData;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;


class ProfilController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::where('user_id', auth()->user()->id)->first();

        // hitung umur
        $tanggalLahir = explode(',', $pegawai->ttl)[1];
        $birthDate = new DateTime($tanggalLahir);
        $today = new DateTime("today");
        if ($birthDate > $today) {
            exit("0 tahun 0 bulan 0 hari");
        }
        $y = $today->diff($birthDate)->y;
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;

        $umur = $y . " tahun " . $m . " bulan " . $d . " hari";
        $foto = auth()->user()->foto;
        return view('pegawai/profil/index', compact('pegawai', 'umur', 'foto'));
    }

    public function edit()
    {
        $pegawai = Pegawai::find(auth()->user()->id);
        if ($pegawai->ttl != null) {
            $pegawai->tempat_lahir = explode(',', $pegawai->ttl)[0];
            $pegawai->tanggal_lahir = explode(',', $pegawai->ttl)[1];
        }

        $bulkData = new BulkData();
        return view('pegawai/profil/edit', compact('pegawai', 'bulkData'));
    }

    public function editProses(Request $request)
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
        ]);

        if ($request->has('password')) {
            $passValidated = $request->validate([
                'password' => 'required|max:255',
                'konfirmasi_password' => 'required|same:password'
            ]);
            $dataValidated['password'] = $passValidated['password'];
            $dataValidated['konfirmasi_password'] = $passValidated['konfirmasi_password'];
        }

        $birth = $dataValidated['tempat_lahir'] . ", " . $dataValidated['tanggal_lahir'];
        $id = auth()->user()->id;
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
                    'unit_kerja' => $dataValidated['unit_kerja']
                ]);

            $userId = Pegawai::find($id)->user_id;

            if ($request->has('password')) {
                User::where('id', $userId)
                    ->update([
                        'email' => $dataValidated['email'],
                        'password' => Hash::make($dataValidated['password'])
                    ]);
            } else {
                User::where('id', $userId)
                    ->update([
                        'email' => $dataValidated['email']
                    ]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('pegawai.profil')->with('failed', "Gagal mengupdate data dengan nama " . $dataValidated['name'] . $th);
        }
        return redirect()->route('pegawai.profil')->with('message', "Berhasil mengupdate data dengan nama " . $dataValidated['name']);
    }

    public function upload()
    {
        $pegawai = Pegawai::find(auth()->user()->id);
        $foto = auth()->user()->foto;
        return view('pegawai/profil/upload', compact('pegawai', 'foto'));
    }

    function crop(Request $request)
    {
        $lokasi = 'foto_pegawai/';
        $foto = $request->file('foto');
        $extensi = $request->file('foto')->extension();
        $new_image_name = 'Foto' . date('YmdHis') . uniqid() . '.' . $extensi;

        $upload = $foto->move(public_path($lokasi), $new_image_name);
        if ($upload) {
            $foto = auth()->user()->foto;
            if ($foto != null) {
                File::delete(public_path('foto_pegawai/' . $foto));
            }
            // update new foto
            User::where('id', auth()->user()->id)->update(['foto' => $new_image_name]);

            return response()->json([
                'status' => 1, 'msg' => 'Your profile picture has been updated successfully',
                'name' => $new_image_name
            ]);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Gagal Upload']);
        }
    }
}
