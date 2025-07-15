@extends('template.layout')
@section('title','perpustakaan siswa')
@section('content')
        <div class="container-fluid px-4">
                        <h1 class="mt-4">Buku</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Halaman Daftar Buku</li>
                        </ol>
                        <div class="row gap-4">
                            <div class="row gap-4">
                                @foreach ($bukus as $buku)
                                    <div class="card col-12 col-md-4 col-lg-3">
                                        <div class="card-body">
                                            <img src={{$buku->buku_gmbr}} alt="Cover Buku" class="book-img mb-3" style="width: 100%; height: 200px; object-fit: cover;">
                                            <hr>
                                            <p class="text-center fw-bolder fs-5 my-0">{{ $buku->buku_judul }}</p>
                                            <p class="text-center mb-3">Ditulis oleh {{ $buku->penulis->penulis_nama }}</p>
                                            <a href="{{ route('create_peminjaman', ['buku_id' => $buku->buku_id, 'buku_nama' => $buku->buku_judul]) }}" class="btn btn-primary">Pinjam</a>
                                        </div>
                                    </div>
                                @endforeach
                             </div>
                        </div>
                    </div>
@endsection