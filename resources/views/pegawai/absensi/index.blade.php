@extends('layouts.pegawai.template')
@section('title', 'Pegawai | Absensi')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex flex-row">
                        <h1>Absensi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">/ Absensi
                            </li>
                        </ol>
                    </div>
                </div>
                <a href="{{ route('pegawai.absensi.tambah') }}" class="btn btn-primary w-100">
                    <i class="fas fa-plus-circle mx-2"></i>Tambah Data Absensi</a>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if (Session::has('message'))
                                <div class="card card-success m-2">
                                    <div class="card-header">
                                        <h3 class="card-title">Success</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                                    class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        {!! Session::get('message') !!}
                                    </div>
                                </div>
                            @endif
                            @if (Session::has('failed'))
                                <div class="card card-danger m-2">
                                    <div class="card-header">
                                        <h3 class="card-title">Failed</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                                    class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        {!! Session::get('failed') !!}
                                    </div>
                                </div>
                            @endif
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="table1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Mata Kuliah</th>
                                            <th>Waktu Absensi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($absensis as $absensi)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $absensi->pegawai->nip }}</td>
                                                <td>{{ $absensi->pegawai->nama }}</td>
                                                <td>{{ $absensi->mata_kuliah }}</td>
                                                <td>{{ $absensi->updated_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $("#table1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#table1_wrapper .col-md-6:eq(0)');
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
