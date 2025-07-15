@extends('template.layout')
@section('title','dasboard admin')
@section('content')
   
      <div class="container-fluid px-4">
                        <h1 class="mt-4">Tambah Buku</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Halaman Tambah Data Buku</li>
                        </ol>
                        <form action="{{ route('action.createbuku') }}" enctype="multipart/form-data" class="row my-4 gap-3" method="post">
                            @csrf
                            <div class="row gap-3">
                                <div class="col-12 col-md-4 form-group">
                                    <label for="judul_buku" class="form-label">Judul Buku *</label>
                                    <input type="text" name="judul_buku" id="judul_buku" class="form-control" placeholder="Masukkan judul buku">
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="penulis_buku" class="form-label">Penulis Buku *</label>
                                    <select name="penulis_buku" id="penulis_buku" class="form-control">
                                        <option selected>-Pilih Penulis Buku-</option>
                                        @foreach ($penuliss as $penulis)
                                            <option value="{{ $penulis->penulis_id }}">{{ $penulis->penulis_nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="penerbit_buku" class="form-label">Penerbit Buku *</label>
                                    <select name="penerbit_buku" id="penerbit_buku" class="form-control">
                                        <option selected>-Pilih Penerbit Buku-</option>
                                        @foreach ($penerbits as $penerbit)
                                            <option value="{{ $penerbit->penerbit_id }}">{{ $penerbit->penerbit_nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="tahun_terbit" class="form-label">Tahun Terbit *</label>
                                    <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control" placeholder="Masukkan tahun terbit">
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="kategori_buku" class="form-label">Kategori Buku *</label>
                                    <select name="kategori_buku" id="kategori_buku" class="form-control">
                                        <option selected>-Pilih Kategori Buku-</option>
                                        @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->kategori_id }}">{{ $kategori->kategori_nama }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="rak_buku" class="form-label">Rak Buku *</label>
                                    <select name="rak_buku" id="rak_buku" class="form-control">
                                        <option selected>-Pilih Rak Buku-</option>
                                        @foreach ($raks as $rak)
                                            <option value="{{ $rak->rak_id }}">{{ $rak->rak_nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="isbn" class="form-label">Nomor ISBN *</label>
                                    <input type="text" name="isbn" id="isbn" class="form-control" placeholder="Masukkan nomor ISBN">
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="isbn" class="form-label"> gambar buku*</label>
                                    <input type="file" name="buku_gmbr" id="isbn" class="form-control">
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-12 col-md-4">
                                    <button class="btn btn-primary">Tambahkan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
@endsection

