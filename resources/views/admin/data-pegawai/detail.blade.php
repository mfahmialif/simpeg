@extends('layouts.admin.template')
@section('title', 'Admin | Detail Pegawai')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex flex-row">
                        <h1>Data Pegawai</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"> <a href="{{ route('admin.dataPegawai') }}">Data Pegawai</a>
                            </li>
                            <li class="breadcrumb-item active">Detail ({{ $pegawai->nama }})
                            </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ 'https://picsum.photos/' . 100 }}" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ $pegawai->nama }}</h3>

                                <p class="text-muted text-center mb-0">{{ $pegawai->nip }}</p>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer bg-primary text-center">
                                {{ $pegawai->unit_kerja }}
                            </div>
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Detail</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                        <i class="fas fa-expand"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong>Jenis Kelamin</strong>
                                <p class="text-muted">{{ $pegawai->jenis_kelamin }}</p>
                                <hr>
                                <strong>Tempat, Tanggal Lahir</strong>
                                <p class="text-muted">{{ $pegawai->ttl }}</p>
                                <hr>
                                <strong>Umur</strong>
                                <p class="text-muted">{{ $umur }}</p>
                                <hr>
                                <strong>Golongan Darah</strong>
                                <p class="text-muted">{{ $pegawai->golongan_darah }}</p>
                                <hr>
                                <strong>Agama</strong>
                                <p class="text-muted">{{ $pegawai->agama }}</p>
                                <hr>
                                <strong>Status Pernikahan</strong>
                                <p class="text-muted">{{ $pegawai->status_pernikahan }}</p>
                                <hr>
                                <strong>Nomer Telepon</strong>
                                <p class="text-muted">{{ $pegawai->telpon }}</p>
                                <hr>
                                <strong>Email</strong>
                                <p class="text-muted">{{ $pegawai->user->email }}</p>
                                <hr>
                                <strong>Alamat</strong>
                                <p class="text-muted">{{ $pegawai->alamat }}</p>
                                <hr>
                                <strong>Status Kepegawaian</strong>
                                <p class="text-muted">{{ $pegawai->status_kepegawaian }}</p>
                                <hr>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <div class="card-tools m-1">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                        <i class="fas fa-expand"></i>
                                    </button>
                                </div>
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#suami_istri"
                                            data-toggle="tab">Suami Istri</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#anak" data-toggle="tab">Anak</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#orang_tua" data-toggle="tab">Orang
                                            tua</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#pendidikan"
                                            data-toggle="tab">Pendidikan</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#bahasa" data-toggle="tab">Bahasa</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#SKP" data-toggle="tab">SKP</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#KGB" data-toggle="tab">KGB</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="suami_istri">
                                        <table id="table1" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>TTL</th>
                                                    <th>Pendidikan</th>
                                                    <th>Pekerjaan</th>
                                                    <th>Hubungan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>NIK</td>
                                                    <td>Nama</td>
                                                    <td>TTL</td>
                                                    <td>Pendidikan</td>
                                                    <td>Pekerjaan</td>
                                                    <td>Hubungan</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                                id="dropdownMenuButton" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                Klik
                                                            </button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="">Edit</a>
                                                                <a class="dropdown-item" href="">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="anak">
                                        <table id="table2" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>TTL</th>
                                                    <th>Pendidikan</th>
                                                    <th>Pekerjaan</th>
                                                    <th>Hubungan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>NIK</td>
                                                    <td>Nama</td>
                                                    <td>TTL</td>
                                                    <td>Pendidikan</td>
                                                    <td>Pekerjaan</td>
                                                    <td>Hubungan</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle"
                                                                type="button" id="dropdownMenuButton"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                Klik
                                                            </button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="">Edit</a>
                                                                <a class="dropdown-item" href="">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="orang_tua">
                                        <table id="table3" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>TTL</th>
                                                    <th>Pendidikan</th>
                                                    <th>Pekerjaan</th>
                                                    <th>Hubungan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>NIK</td>
                                                    <td>Nama</td>
                                                    <td>TTL</td>
                                                    <td>Pendidikan</td>
                                                    <td>Pekerjaan</td>
                                                    <td>Hubungan</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle"
                                                                type="button" id="dropdownMenuButton"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                Klik
                                                            </button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="">Edit</a>
                                                                <a class="dropdown-item" href="">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="pendidikan">
                                        <table id="table4" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="align-top">Tingkat</th>
                                                    <th class="align-top">Nama Sekolah</th>
                                                    <th class="align-top">Lokasi</th>
                                                    <th class="align-top">Jurusan</th>
                                                    <th class="align-top">
                                                        <p class="m-0">No.Ijazah</p>
                                                        <p class="m-0">Tgl.Ijazah</p>
                                                    </th>
                                                    <th class="align-top">Kepala / Rektor</th>
                                                    <th class="align-top">Status Pend.</th>
                                                    <th class="align-top">Set Akhir</th>
                                                    <th class="align-top">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tingkat</td>
                                                    <td>Nama Sekolah</td>
                                                    <td>Lokasi</td>
                                                    <td>Jurusan</td>
                                                    <td>
                                                        <p class="m-0">No.Ijazah</p>
                                                        <p class="m-0">Tgl.Ijazah</p>
                                                    </td>
                                                    <td>Kepala / Rektor</td>
                                                    <td>Status Pend.</td>
                                                    <td>Set Akhir</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle"
                                                                type="button" id="dropdownMenuButton"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                Klik
                                                            </button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="">Edit</a>
                                                                <a class="dropdown-item" href="">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="bahasa">
                                        <table id="table5" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Jenis Bahasa</th>
                                                    <th>Bahasa</th>
                                                    <th>Kemampuan Bicara</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Jenis Bahasa</td>
                                                    <td>Bahasa</td>
                                                    <td>Kemampuan Bicara</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle"
                                                                type="button" id="dropdownMenuButton"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                Klik
                                                            </button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="">Edit</a>
                                                                <a class="dropdown-item" href="">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="SKP">
                                        <table id="table6" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="align-middle" rowspan="2">No</th>
                                                    <th class="align-middle" colspan="2" scope="colgroup">Periode
                                                        Penilaian</th>
                                                    <th class="align-middle" colspan="2" scope="colgroup">Penilai</th>
                                                    <th class="align-middle" rowspan="2">N Total</th>
                                                    <th class="align-middle" rowspan="2">Rata<sup>2</sup></th>
                                                    <th class="align-middle" rowspan="2">Mutu</th>
                                                    <th class="align-middle" rowspan="2">Aksi</th>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Awal</th>
                                                    <th scope="col">Akhir</th>
                                                    <th scope="col">Pejabat</th>
                                                    <th scope="col">Atas Pejabat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>NIK</td>
                                                    <td>Nama</td>
                                                    <td>TTL</td>
                                                    <td>Pendidikan</td>
                                                    <td>Pekerjaan</td>
                                                    <td>Hubungan</td>
                                                    <td>Pekerjaan</td>
                                                    <td>Hubungan</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle"
                                                                type="button" id="dropdownMenuButton"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                Klik
                                                            </button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="">Edit</a>
                                                                <a class="dropdown-item" href="">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="KGB">
                                        <table id="table7" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nomor KGB</th>
                                                    <th>Tanggal</th>
                                                    <th>Gaji Lama</th>
                                                    <th>Gaji Baru</th>
                                                    <th>Gol Baru</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>No</td>
                                                    <td>Nomor KGB</td>
                                                    <td>Tanggal</td>
                                                    <td>Gaji Lama</td>
                                                    <td>Gaji Baru</td>
                                                    <td>Gol Baru</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle"
                                                                type="button" id="dropdownMenuButton"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                Klik
                                                            </button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="">Edit</a>
                                                                <a class="dropdown-item" href="">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            for (let i = 1; i <= 7; i++) {
                $("#table" + i).DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["excel", "pdf", "print"]
                }).buttons().container().appendTo('#table' + i + '_wrapper .col-md-6:eq(0)');

            }
        });
    </script>
    <script>
        function deleteData(event) {
            event.preventDefault();
            var id = event.target.querySelector('input[name="id"]').value;
            var username = event.target.querySelector('input[name="username"]').value;
            swalDelete(id, username, event.target);

        }
    </script>
@endsection
