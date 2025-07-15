@extends('template.layout')
@section('title','dasboard admin')
@section('content')
   
     <div class="container-fluid px-4">
                        <h1 class="mt-4">rak Buku</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Halaman rak Buku</li>
                        </ol>
                        <a  href="/tambah_rak" class="btn btn-primary mb-3">Tambah rak</a>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>nama rak </th>
                                        <th>lokasi rak</th>
                                        <th>kapasitas rak</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($raks as $rak)    
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $rak->rak_nama }}</td>
                                            <td>{{ $rak->rak_lokasi}}</td>
                                            <td>{{ $rak->rak_kapasitas }}</td>
                                           
                                            <td>
                                                <a href="{{ route('update_rak', ['rak_id' => $rak->rak_id]) }}">
                                                    <button class="btn btn-warning"><i class="fas fa-pencil"></i></button>
                                                </a>
                                                </a>
                                                <form action="{{ route('rak.delete', ['rak_id' => $rak->rak_id]) }}" method="POST">
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
                            {{ $raks->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                    
@endsection

