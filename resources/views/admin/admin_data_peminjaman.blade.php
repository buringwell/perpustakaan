@extends('template.layout')
@section('title','dasboard admin')
@section('content')
   
<div class="container-fluid px-4">
                        <h1 class="mt-4">Data Peminjaman</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Halaman Data Peminjaman</li>
                        </ol>
                        <div class="container">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>no</th>
                                  <th>Nama Peminjam</th>
                                  <th>Judul Buku</th>
                                  <th>Tanggal Pinjam</th>
                                  <th>Tanggal Kembali</th>
                                  <th>Status</th>
                                  <th>Note</th>
                                  <th>Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($peminjamen as $peminjaman)    
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$peminjaman->user->user_nama}}
                                    </td>
                                    <td>
                                    @foreach ( $peminjaman -> buku as $buku )
                                        {{$buku->buku_judul }}
                                    @endforeach
                                    </td>
                                    <td>{{ $peminjaman->peminjaman_tglpinjam }}</td>
                                    <td>{{ $peminjaman->peminjaman_tglkembali }}</td>
                                    <td>{{ $peminjaman->peminjaman_statuskembali == 1 ? 'sudah kembali' : 'belum kembali' }}</td>
                                    <td>{{ $peminjaman->peminjaman_note }}</td>
                                    <td><button class="fa-solid fa-magnifying-glass"></button></td>
                                    <td>
                                        <a href="{{ route('update_peminjaman', ['peminjaman_id' => $peminjaman->peminjaman_id]) }}">
                                            <button class="btn btn-warning"><i class="fas fa-pencil"></i></button>
                                        </a>
                                        </a>
                                        <form action="{{ route('peminjaman.delete', ['peminjaman_id' => $peminjaman->peminjaman_id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $peminjamen->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>                       
@endsection

