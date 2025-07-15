@extends('template.layout')
@section('title', 'Dashboard Admin')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Buku</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Halaman Data Buku</li>
    </ol>
    <a href="./tambah_buku" class="btn btn-primary mb-3">Tambah Buku</a>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Penulis Buku</th>
                    <th>Penerbit Buku</th>
                    <th>Tahun Terbit</th>
                    <th>Kategori Buku</th>
                    <th>Rak Buku</th>
                    <th>ISBN</th>
                    <th>Detail & aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bukus as $buku)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $buku->buku_judul }}</td>
                    <td>{{ $buku->penulis->penulis_nama }}</td>
                    <td>{{ $buku->penerbit->penerbit_nama }}</td>
                    <td>{{ $buku->buku_thnpenerbit }}</td>
                    <td>{{ $buku->kategori->kategori_nama }}</td>
                    <td>{{ $buku->rak->rak_nama }}</td>
                    <td>{{ $buku->buku_isbn }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{ $buku->buku_id }}">
                            Detail
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modal{{ $buku->buku_id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $buku->buku_id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{ $buku->buku_id }}">Detail Buku</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-flex">
                                        <img src="{{ $buku->buku_gmbr }}" alt="" class="me-3" style="width: 150px; height: auto;">
                                        <div>
                                            <p>Judul: {{ $buku->buku_judul }}</p>
                                            <p>Penulis: {{ $buku->penulis->penulis_nama }}</p>
                                            <p>Penerbit: {{ $buku->penerbit->penerbit_nama }}</p>
                                            <p>Kategori: {{ $buku->kategori->kategori_nama }}</p>
                                            <p>Rak: {{ $buku->rak->rak_nama }}</p>
                                        </div>
                                    </div>
                                    
                                    <a href="{{ route('update_buku', ['buku_id' => $buku->buku_id]) }}" class="btn btn-warning" style="width: 50px">
                                        <i class="fas fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('buku.delete', ['buku_id' => $buku->buku_id]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $bukus->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
@endsection
