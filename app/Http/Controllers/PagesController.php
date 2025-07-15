<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Penerbit;
USE App\Models\Admin\Buku;
use App\Models\Admin\Penulis; 
use App\Models\Admin\Kategori;
use App\Models\Admin\Rak;
use App\Models\Admin\peminjaman;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function loginPage () {
        return view('public.login');
  }
  public function dashboardAdmin () {
    return view('admin.admin_dashboard', ['level' => 'admin']);
  }
    public function dashboardSiswa () {
      return view('siswa.siswa_dashboard', ['level' => 'siswa']);
  }

  public function register(){
    $data = register ::readregister();
    return view('login_register.register',['level'=>'siswa']);
  }
  public function login(){
    $data = login ::readlogin();
    return view('login_register.loginb',['level'=>'siswa']);
  }
  
  
  public function penerbit() {
    $data = Penerbit::readPenerbit();

    return view('admin.admin_penerbit', ['level' => 'admin'])->with('penerbits', $data);
  }
  public function create_penerbit() {
    return view('admin.dalam_admin.tambah_penerbit_a',['level' => 'admin']);
  }
  public function update_penerbit($penerbit_id){
    $penerbit = Penerbit::readPenerbitById($penerbit_id);

    return view('admin.dalam_admin.update_penerbit_a', [
      'level' => 'admin',
      'penerbit' => $penerbit
    ]);
  }
  
  public function penulis() {
    $data = Penulis::readpenulis();
    
    return view('admin.admin_penulis', ['level' => 'admin'])->with('penuliss', $data);
  }
  public function create_penulis() {
    return view('admin.dalam_admin.tambah_penulis_a',['level' => 'admin']);
  }
  public function update_penulis($penulis_id){
    $penulis = Penulis::readPenulisById($penulis_id);
    
    return view('admin.dalam_admin.update_penulis_a', [
      'level' => 'admin',
      'penulis' => $penulis
    ]);
  }
  
  public function kategori() {
    $data = kategori::readkategori();
    
    return view('admin.admin_kategori', ['level' => 'admin'])->with('kategoris', $data);
  }
  public function create_kategori() {
    return view('admin.dalam_admin.tambah_kategori_a',['level' => 'admin']);
  }
  public function update_kategori($kategori_id){
    $kategori = Kategori::readkategoriById($kategori_id);
    
    return view('admin.dalam_admin.update_kategori_a', [
      'level' => 'admin',
      'kategori' => $kategori
    ]);
  }



  public function rak() {
    $data = rak::readrak();
    
    return view('admin.admin_rak', ['level' => 'admin'])-> with('raks',$data);
  }
  public function create_rak() {
    return view('admin.dalam_admin.tambah_rak_a',['level' => 'admin']);
  }
  public function update_rak($rak_id){
    $rak = rak::readrakById($rak_id);
    
    return view('admin.dalam_admin.update_rak_a', [
      'level' => 'admin',
      'rak' => $rak
    ]);
  }
  
  
  public function buku() {
    $data = buku::readbuku();
    
    return view('admin.admin_data_buku', ['level' => 'admin'])-> with('bukus',$data);
  }

  public function create_buku(){
    $penuliss = penulis::readPenulis();
    $penerbits = penerbit::readPenerbit();
    $kategoris = kategori::readkategori();
    $raks = rak::readrak();
    
    return view('admin.dalam_admin.tambah_buku_a', [
      'level' => 'admin',
      'penuliss' => $penuliss,
      'penerbits' => $penerbits,
      'kategoris' => $kategoris,
      'raks' => $raks
    ]);
  }
  public function update_buku($buku_id){
    $buku = buku::readbukuById($buku_id);
    $penuliss = penulis::readPenulis();
    $penerbits = penerbit::readPenerbit();
    $kategoris = kategori::readkategori();
    $raks = rak::readrak();
    
    return view('admin.dalam_admin.update_buku_a', [
      'level' => 'admin',
      'bukus' => $buku,
      'penuliss' => $penuliss,
      'penerbits' => $penerbits,
      'kategoris' => $kategoris,
      'raks' => $raks
    ]);
  }
  

  public function peminjaman() {
    $data = peminjaman::readpeminjaman();
    return view('admin.admin_data_peminjaman', ['level' => 'admin'])-> with('peminjamen',$data);
  }

  public function create_peminjaman(){
    $bukus = buku::readbuku();
    $peminjamen = peminjaman::readpeminjaman();
    $penerbits = penerbit::readPenerbit();
    $kategoris = kategori::readkategori();
    $raks = rak::readrak();
    
    return view('siswa.siswa_peminjaman', [
      'level' => 'siswa',
      'bukus' => $bukus,
    ]);
  }
  public function update_peminjaman($peminjaman_id){
    $peminjaman = peminjaman::readpeminjamanById($peminjaman_id);
    $peminjamen = peminjaman::readpeminjaman();
    $penerbits = penerbit::readPenerbit();
    $kategoris = kategori::readkategori();
    $raks = rak::readrak();
    
    return view('admin.dalam_admin.update_peminjaman', [
      'level' => 'admin',
      'peminjamen' => $peminjaman,
      'peminjamen' => $peminjaman,
      'penerbits' => $penerbits,
      'kategoris' => $kategoris,
      'raks' => $raks
    ]);
  }
  public function bukuSiswa()
  {
    $bukus = buku::all();
    return view('siswa.siswa_buku', ['level' => 'siswa',"bukus" => $bukus]);
  }

public function pengaturan_siswa()
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
    }

    return view('siswa.siswa_pengaturan', ['level' => 'siswa', 'user' => $user]);
}


}


?>