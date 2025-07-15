@extends('template.layout')
@section('title', 'Dashboard Siswa')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Data Peminjaman Saya</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Halaman Data Peminjaman</li>
    </ol>
    <div class="container">
         @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($peminjamen as $peminjaman)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @foreach ( $peminjaman ->buku as $buku )
                        {{$buku->buku_judul }}
                    @endforeach
                    <td>{{ $peminjaman->peminjaman_tglpinjam }}</td>
                    <td>{{ $peminjaman->peminjaman_tglkembali }}</td>
                    <td>{{ $peminjaman->peminjaman_statuskembali == 1 ? 'sudah kembali' : 'belum kembali' }}</td>
                    <td>{{ $peminjaman->peminjaman_note }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">Belum ada data peminjaman.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
