@extends('template.layout')
@section('title','dasboard admin')
@section('content')
   
     <div class="container-fluid px-4">
                        <h1 class="mt-4">penulis Buku</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Halaman penulis Buku</li>
                        </ol>
                        <a  href="/tambah_penulis" class="btn btn-primary mb-3">Tambah penulis</a>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>nama penulis</th>
                                        <th>tempat lahir penulis</th>
                                        <th>taggal penulis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($penuliss as $penulis)    
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $penulis->penulis_nama }}</td>
                                            <td>{{ $penulis->penulis_tmplahir}}</td>
                                            <td>{{ $penulis->penulis_tgllahir }}</td>
                                           
                                            <td>
                                                <a href="{{ route('update_penulis', ['penulis_id' => $penulis->penulis_id]) }}">
                                                    <button class="btn btn-warning"><i class="fas fa-pencil"></i></button>
                                                </a>
                                                </a>
                                                <form action="{{ route('penulis.delete', ['penulis_id' => $penulis->penulis_id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                            {{ $penuliss->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                    
@endsection

