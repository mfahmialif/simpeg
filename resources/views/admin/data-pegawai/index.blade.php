@extends('layouts.admin.template')
@section('title', 'Admin | Data Pegawai')
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
                            <li class="breadcrumb-item active">/ Data Pegawai
                            </li>
                        </ol>
                    </div>
                </div>
                <a href="{{ route('admin.dataPegawai.tambah') }}" class="btn btn-primary w-100">
                    <i class="fas fa-plus-circle mx-2"></i>Tambah Pegawai</a>
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
                                            <th>ID</th>
                                            <th>Foto</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Unit Kerja</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="align-middle">{{ $user->id }}</td>
                                                <td>
                                                    @if ($user->user->foto == null)
                                                        <img src="{{ 'https://picsum.photos/' . 100 }}"
                                                            class="profile-user-img img-fluid img-circle" alt="User Image">
                                                    @else
                                                        @php
                                                            $foto = $user->user->foto;
                                                        @endphp
                                                        <img src="{{ asset("/foto_pegawai/$foto") }}"
                                                            class="profile-user-img img-fluid img-circle" alt="User Image">
                                                    @endif
                                                </td>
                                                <td class="align-middle">{{ $user->nip }}</td>
                                                <td class="align-middle">{{ $user->nama }}</td>
                                                <td class="align-middle">{{ $user->unit_kerja }}</td>
                                                <td class="align-middle">
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            Klik
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.dataPegawai.detail', ['id' => $user->id]) }}">Detail</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.dataPegawai.edit', ['id' => $user->id]) }}">Edit</a>
                                                            <form
                                                                action="{{ route('admin.dataPegawai.edit', ['id' => $user->id]) }}"
                                                                class="form-hapus" method="POST"
                                                                onsubmit="deleteData(event)">
                                                                @method('delete')
                                                                @csrf
                                                                <input type="hidden" value="{{ $user->id }}"
                                                                    name="id">
                                                                <input type="hidden" value="{{ $user->nama }}"
                                                                    name="username">
                                                                <button class="dropdown-item" type="submit">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
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
