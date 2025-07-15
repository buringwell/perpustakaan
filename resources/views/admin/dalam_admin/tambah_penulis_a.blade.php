@extends('template.layout')
@section('title','dasboard admin')
@section('content')
   
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">penulis</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Create Data penulis</li>
                    </ol>
                    <form action="{{ route('action.createpenulis') }}" class="row my-4 gap-3" method="post">
                        @csrf
                        <div class="row gap-3">
                            <div class="col-12 col-md-4 form-group">
                                <label for="penulis_nama" class="form-label">Nama Penulis :</label>
                                <input type="text" name="penulis_nama" id="penulis_nama" class="form-control" placeholder="Masukkan Nama Penulis">
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="penulis_tmplahir" class="form-label">Tempat Lahir Penulis *</label>
                                <input type="text" name="penulis_tmplahir" id="penulis_tmplahir" class="form-control" placeholder="Masukkan Tempat lahir Penulis">
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="penulis_tgllahir" class="form-label">Tanggal Lahir *</label>
                                <input type="date" name="penulis_tgllahir" id="penulis_tgllahir" class="form-control" placeholder="Masukkan tanggal lahir">
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
   