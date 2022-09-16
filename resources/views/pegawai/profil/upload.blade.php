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

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle image-previewer"
                                style="width: 200px!important;" src='{{ asset("/foto_pegawai/$foto") }}'
                                alt="User profile picture">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Upload Foto</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="foto" id="foto">
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                                {{-- <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div> --}}
                            </div>
                            <small class="text-secondary">*Upload foto JPG | PNG | JPEG</small>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </div>
                </div>
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
        $('#foto').ijaboCropTool({
            preview: '.image-previewer',
            setRatio: 1,
            allowedExtensions: ['jpg', 'jpeg', 'png'],
            buttonsText: ['CROP', 'QUIT'],
            buttonsColor: ['#30bf7d', '#ee5155', -15],
            processUrl: '{{ route('crop-foto') }}',
            withCSRF: ['_token', '{{ csrf_token() }}'],
            onSuccess: function(message, element, status) {
                alert(message);
            },
            onError: function(message, element, status) {
                alert(message);
            }
        });
    </script>
@endpush
