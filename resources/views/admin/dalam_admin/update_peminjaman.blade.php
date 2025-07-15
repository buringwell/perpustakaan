@extends('template.layout')
@section('title','dasboard admin')
@section('content')

           <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Peminjam</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Halaman Update Peminjam Buku</li>
                        </ol>
                        <div class="container">
                            <h2>Data Peminjaman</h2>
                            <form action="{{ route('peminjaman.update', ['peminjaman_id' => $peminjamen->peminjaman_id]) }}" class="row my-4 gap-3" method="post">
                              @csrf
                              @method('PATCH')
                              <div class="row gap-3">
                                  <div class="col-12 col-md-4 form-group">
                                      <label for="judul_peminjaman" class="form-label" >Note *</label>
                                      <input type="text" name="peminjaman_note1" id="peminjaman_note1" class="form-control" placeholder="Masukkan judul peminjaman" value="{{$peminjamen ->peminjaman_note}}">
                                  </div>
                                  <div class="col-12 col-md-4 form-group">
                                      <label for="denda" class="form-label" >Denda *</label>
                                      <input type="text" name="peminjaman_denda" id="peminjaman_denda" class="form-control" placeholder="Masukkan judul peminjaman" value="{{$peminjamen ->pemnjaman_denda}}">
                                  </div>
                                  <div class="col-12 col-md-4 form-group">
                                      <label for="status" class="form-label" >status *</label>
                                      <input type="text" name="status_kembali" id="status_kembali" class="form-control" placeholder="Masukkan judul peminjaman" value="{{$peminjamen ->peminjaman_statuskembali}}">
                                  </div>
                                 
                              <div class="row my-3">
                                  <div class="col-12 col-md-4">
                                      <button class="btn btn-warning">Update</button>
                                  </div>
                              </div>
                          </form>
                        </div>
                    </div>

@endsection

