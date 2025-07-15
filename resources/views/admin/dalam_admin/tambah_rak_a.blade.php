@extends('template.layout')
@section('title','dasboard admin')
@section('content')
   
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">rak</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Create Data rak</li>
                    </ol>
                    <form action="{{ route('action.createrak') }}" class="row my-4 gap-3" method="post">
                        @csrf
                        <div class="row gap-3">
                            <div class="col-12 col-md-4 form-group">
                                <label for="rak_nama" class="form-label">Nama rak :</label>
                                <input type="text" name="rak_nama" id="rak_nama" class="form-control" placeholder="Masukkan Nama rak">
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="rak_tmplahir" class="form-label">lokasi rak *</label>
                                <input type="text" name="rak_lokasi" id="rak_lokasi" class="form-control" placeholder="Masukkan Tempat lahir rak">
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="rak_tgllahir" class="form-label">kapasitas *</label>
                                <input type="text" name="rak_kapasitas" id="rak_kapasitas" class="form-control" placeholder="Masukkan tanggal lahir">
                            </div>
                            <div class="row my-3">
                            <div class="col-12 col-md-4">
                                <button class="btn btn-warning">submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
            
@endsection
   