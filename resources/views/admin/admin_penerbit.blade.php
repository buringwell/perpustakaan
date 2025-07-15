@extends('template.layout')
@section('title','dasboard admin')
@section('content')
   
 <div class="container-fluid px-4">
                        <h1 class="mt-4">penerbit Buku</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Halaman penerbit Buku</li>
                        </ol>
                        <a  href="/tambah_penerbit" class="btn btn-primary mb-3">Tambah penerbit</a>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Berhasil!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @elseif (session('updated'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <strong>Berhasil!</strong> {{ session('updated') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @elseif (session('deleted'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <strong>Berhasil!</strong> {{ session('deleted') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="row">No</th>
                                        <th scope="row">Nama Penerbit</th>
                                        <th scope="row">Alamat Penerbit</th>
                                        <th scope="row">No Telp Penerbit</th>
                                        <th scope="row">Email Penerbit</th>
                                        <th scope="row">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penerbits as $penerbit)    
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $penerbit->penerbit_nama }}</td>
                                        <td>{{ $penerbit->penerbit_alamat }}</td>
                                        <td>{{ $penerbit->penerbit_notlp }}</td>
                                        <td>{{ $penerbit->penerbit_email }}</td>
                                        <td>
                                            <a href="{{ route('update_penerbit', ['penerbit_id' => $penerbit->penerbit_id]) }}">
                                                <button class="btn btn-warning"><i class="fas fa-pencil"></i></button>
                                            </a>
                                            </a>
                                            <form action="{{ route('penerbit.delete', ['penerbit_id' => $penerbit->penerbit_id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $penerbits->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
                    
@endsection

