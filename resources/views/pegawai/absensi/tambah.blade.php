@extends('layouts.pegawai.template')
@section('title', 'Pegawai | Tambah Absensi')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Absensi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"> <a href="{{ route('pegawai.absensi') }}">Absensi</a>
                            </li>
                            <li class="breadcrumb-item active">Tambah
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Absensi</h3>
                        <div class="card-tools">
                            <!-- Maximize Button -->
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                    class="fas fa-expand"></i></button>
                        </div>
                    </div>
                    <!-- form start -->
                    <form id="quickForm" action="{{ route('pegawai.absensi.tambah') }}" method="POST">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="mata_kuliah">Mata Kuliah</label>
                                <select class="form-control select2bs4 w-100" name="mata_kuliah" id="mata_kuliah">
                                    <option value="">Pilih..</option>
                                    @foreach ($bulkData->mataKuliah as $mk)
                                        <option>{{ $mk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="input" name="nip" class="form-control" id="nip"
                                    placeholder="Masukkan NIP">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <!-- jquery-validation -->
    <script src="{{ asset('/admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/jquery-validation/additional-methods.min.js') }}"></script>

    <script>
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>
    <script>
        $(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    submit();
                }
            });
            $('#quickForm').validate({
                rules: {
                    mata_kuliah: {
                        required: true,
                    },
                    nip: {
                        required: true,
                    }
                },
                messages: {
                    mata_kuliah: {
                        required: 'Masukkan mata kuliah',
                    },
                    nip: {
                        required: "Masukkan NIP"
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
