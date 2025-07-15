@extends('template.layout')
@section('title','dasboard admin')
@section('content')

    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update kategori</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Halaman Update kategori Buku</li>
                        </ol>
                        <div class="row g-3 table-responsive mb-3">
                            <form action="{{ route('kategori.update', ['kategori_id' => $kategori->kategori_id]) }}" class="row my-4 gap-3" method="post">
                                @csrf
                                @method('PATCH')
                                  <legend>Update kategori</legend>
                                  <div class="mb-3">
                                    <input type="text" name="kategori_nama" id="disabledTextInput" class="form-control" placeholder="masukan kategori">
                                  </div>
                                  <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                    
@endsection

