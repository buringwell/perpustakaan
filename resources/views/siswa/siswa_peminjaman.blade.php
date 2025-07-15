@extends('template.layout')
@section('title','peminjaman siswa')
@section('content')
               <div class="container-fluid px-4">
                        <h1 class="mt-4">Peminjaman Buku</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Halaman Peminjaman Buku</li>
                        </ol>
                        <form action="{{ route('action.createpeminjaman') }}" class="row my-4 gap-3" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-4 form-group">
                                    {{-- @if ($users)
                                        <input type="hidden" value="{{$users->user_id}}" name="peminjaman_user_id">
                                    @endif --}}
                                    <label for="nama" class="form-label">Nama Peminjam *</label>
                                    <input type="text"  class="form-control" disabled>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="tgl_pinjam" class="form-label">Tanggal Pinjam *</label>
                                    <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control">
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-12 col-md-4 form-group">
                                    <label for="tgl_kembali" class="form-label">Tanggal Kembali *</label>
                                    <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control">
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="buku" class="form-label">Buku  *</label>
                                    <select class="form-control" name="buku" id="buku">
                                        <option selected>-Pilih Buku-</option>
                                        @foreach ($bukus as $buku)
                                            <option value="{{ $buku->buku_id }}">{{ $buku->buku_judul }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-12 col-md-4 form-group">
                                    <button class="btn btn-primary">Buat Peminjaman</button>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-12 col-md-4 form-group">
                                    <a href="./siswa/peminjaman" class="btn btn-primary">data yang kamu pinjam</a>
                                </div>
                            </div>
                        </form>
                    </div>
@endsection