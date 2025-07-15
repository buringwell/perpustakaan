@extends('template.layout')
@section('title','dasboard admin')
@section('content')
   
<div class="container-fluid px-4">
                        <h1 class="mt-4">kategori Buku</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Halaman kategori Buku</li>
                        </ol>
                        <a  href="./tambah_kategori" class="btn btn-primary mb-3">Tambah kategori</a>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>nama kategori</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoris as $kategori)    
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kategori->kategori_nama }}</td>
                                        <td>
                                            <a href="{{ route('update_kategori', ['kategori_id' => $kategori->kategori_id]) }}">
                                                <button class="btn btn-warning"><i class="fas fa-pencil"></i></button>
                                            </a>
                                            </a>
                                            <form action="{{ route('kategori.delete', ['kategori_id' => $kategori->kategori_id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>         
@endsection

