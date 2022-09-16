@extends('layouts.pegawai.template')
@section('title', 'Pegawai | Upload Fot Profil')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Upload Profil</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('pegawai.profil') }}">Profil</a></li>
                            <li class="breadcrumb-item active">Upload</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.tes.tambah') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto" name="foto">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </div>
                    </div>
                </form>
                {{-- </form> --}}
            </div>
        </section>
    </div>
@endsection
@push('script')
    {{-- Script Css Crop --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('/admin/ijaboCropTool/ijaboCropTool.min.js') }}"></script>
    <script>
        //add name to fileinput
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        // $('#foto').ijaboCropTool({
        //     preview: '.image-preview',
        //     processUrl: "{{ route('admin.tes.tambah') }}",
        //     withCSRF: ['_token', '{{ csrf_token() }}'],
        //     onSuccess: function(message, element, status) {
        //         alert(message);
        //     },
        //     onError: function(message, element, status) {
        //         alert(message);
        //     }
        // });
    </script>
@endpush
