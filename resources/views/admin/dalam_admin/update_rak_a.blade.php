@extends('template.layout')
@section('title','dasboard admin')
@section('content')

         <div class="container-fluid px-4">
                        <h1 class="mt-4">Update rak</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Halaman Update rak Buku</li>
                        </ol>
                        <div class="row g-3 table-responsive mb-3">
                            <form action="{{ route('rak.update', ['rak_id' => $rak->rak_id]) }}" class="row my-4 gap-3" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="row gap-3">
                                    <div class="col-12 col-md-4 form-group">
                                        <label for="rak_nama" class="form-label">Nama rak :</label>
                                        <input type="text" name="rak_nama" id="rak_nama" class="form-control" placeholder="Masukkan Nama rak">
                                    </div>
                                    <div class="col-12 col-md-4 form-group">
                                        <label for="rak_tmplahir" class="form-label">kapasitas rak *</label>
                                        <input type="text" name="rak_kapasitas" id="rak_tmplahir" class="form-control" placeholder="Masukkan Tempat lahir rak">
                                    </div>
                                    <div class="col-12 col-md-4 form-group">
                                        <label for="rak_tgllahir" class="form-label">lokasi rak *</label>
                                        <input type="text" name="rak_lokasi" id="rak_tgllahir" class="form-control" placeholder="Masukkan tanggal lahir">
                                    </div>
                                    <div class="row my-3">
                                    <div class="col-12 col-md-4">
                                        <button class="btn btn-warning">submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

@endsection

