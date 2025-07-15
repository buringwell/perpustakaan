@extends('template.layout')
@section('title','dasboard admin')
@section('content')
   
     <div class="container-fluid px-4">
                        <h1 class="mt-4">tambah kategori</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Halaman tambah kategori Buku</li>
                        </ol>
                        <div class="table-responsive">
                            <form action="{{ route('action.createkategori') }}" class="row my-4 gap-3" method="post">
                                @csrf
                                  <legend>tambah kategori</legend>
                                  <div class="mb-3">
                                    <input type="text" name="kategori_nama" id="disabledTextInput" class="form-control" placeholder="masukan kategori">
                                  </div>
                                  <button type="submit" class="btn btn-primary">kirim</button>
                            </form>
                        </div>
                    </div>
                    
@endsection

