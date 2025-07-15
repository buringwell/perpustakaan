@extends('template.layout')
@section('title','pengaturan siswa')
@section('content')
<div id="layoutSidenav">

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Pengaturan</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Pengaturan Akun</li>
                </ol>
                    <p>Nama:{{$user->user_nama}}</p>
                    <p>Alamat:{{$user->user_alamat}}</p>
                    <p>Username:{{$user->user_username}}</p>
                    <p>E-mail:{{$user->user_email}}</p>
                    <p>No Telepon:{{$user->user_notlp}}</p>
            </div>
        </main>
    </div>
</div>
@endsection