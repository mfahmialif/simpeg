@extends('layouts.admin.template')
@section('title', 'Admin | Tambah Pegawai')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Pegawai</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dataPegawai') }}">Data Pegawai</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
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
                        <h3 class="card-title">Tambah Pegawai</h3>
                        <div class="card-tools">
                            <!-- Maximize Button -->
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                    class="fas fa-expand"></i></button>
                        </div>
                    </div>
                    <!-- form start -->
                    <form id="quickForm" action="{{ route('admin.dataPegawai.tambah') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="input" name="nip" class="form-control" id="nip"
                                    placeholder="Masukkan NIP">
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="input" name="tempat_lahir" class="form-control" id="tempat_lahir"
                                            placeholder="Masukkan tempat lahir">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal-lahir">Tanggal Lahir</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
                                                data-target="#reservationdate" name="tanggal_lahir" id="tanggal_lahir"
                                                placeholder="Pilih tanggal lahir" />
                                            <div class="input-group-append" data-target="#reservationdate"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="input" name="name" class="form-control" id="name"
                                    placeholder="Masukkan nama">
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select class="form-control select2bs4 w-100" name="agama" id="agama">
                                    <option value="">Pilih..</option>
                                    @foreach ($bulkData->agama as $ag)
                                        <option>{{ $ag }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control select2bs4 w-100" name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="">Pilih..</option>
                                    @foreach ($bulkData->jenisKelamin as $jk)
                                        <option>{{ $jk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="golongan_darah">Golongan Darah</label>
                                <select class="form-control select2bs4 w-100" name="golongan_darah" id="golongan_darah">
                                    <option value="">Pilih..</option>
                                    @foreach ($bulkData->golonganDarah as $gd)
                                        <option>{{ $gd }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status_pernikahan">Status Pernikahan</label>
                                <select class="form-control select2bs4 w-100" name="status_pernikahan"
                                    id="status_pernikahan">
                                    <option value="">Pilih..</option>
                                    @foreach ($bulkData->statusPernikahan as $sp)
                                        <option>{{ $sp }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status_kepegawaian">Status Kepegawaian</label>
                                <select class="form-control select2bs4 w-100" name="status_kepegawaian"
                                    id="status_kepegawaian">
                                    <option value="">Pilih..</option>
                                    @foreach ($bulkData->statusKepegawaian as $sk)
                                        <option>{{ $sk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alat">Alamat</label>
                                <textarea class="form-control" rows="3" placeholder="Masukkan alamat" name="alamat" id="alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nomer_telepon">Nomer Telepon</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control"
                                        data-inputmask='"mask": "(999) 999-999-999"' data-mask placeholder="081xxxxxxxx"
                                        name="nomer_telepon" id="nomer_telepon">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="unit_kerja">Unit Kerja</label>
                                <select class="form-control select2bs4 w-100" name="unit_kerja" id="unit_kerja">
                                    <option value="">Pilih..</option>
                                    @foreach ($bulkData->unitKerja as $uk)
                                        <option>{{ $uk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto" name="foto">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
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

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        //phone mask
        $('[data-mask]').inputmask()

        //add name to fileinput
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
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
                    email: {
                        required: true,
                        email: true,
                    },
                    name: {
                        required: true,
                    }
                },
                messages: {
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a valid email address"
                    },
                    name: {
                        required: "Please provide a name"
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
