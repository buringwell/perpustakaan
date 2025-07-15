<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Belajar Validation di Laravel dengan form login sederhana</h1>
    <form action="/buku" method="post">
        @csrf
        <div>
            <label for="kd_buku">Kode Buku</label>
            <input type="text" id="kd_buku" name="kd_buku" value="{{ old('kd_buku') }}" placeholder="Masukan Kode buku">
            @error('kd_buku')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="nama_buku">Nama Buku</label>
            <input type="text" id="nama_buku" name="nama_buku" placeholder="Masukan Nama Buku">
            @error('nama_buku')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="penerbit">Penerbit</label>
            <input type="text" id="penerbit" name="penerbit" value="{{ old('penerbit') }}" placeholder="Masukkan Nama Penerbit">
            @error('penerbit')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="penulis">Penulis</label>
            <input type="text" id="penulis" name="penulis" value="{{ old('penulis') }}" placeholder="Masukkan Nama Penuls">
            @error('penulis')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="thn_terbit">Tahun Terbit</label>
            <input type="number" id="thn_terbit" name="thn_terbit" value="{{ old('thn_terbit') }}" placeholder="masukkan Tahun Terbit">
            @error('thn_terbit')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <input type="submit" value="Create">
        </div>
    </form>
</body>
</html>