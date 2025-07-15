<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutesControler;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\PenerbitController;
use App\Http\Controllers\Admin\PenulisController;
use App\Http\Controllers\Admin\kategoriController;
use App\Http\Controllers\Admin\bukucontroller;
use App\Http\Controllers\Admin\rakcontroller;
use App\Http\Controllers\Admin\peminjamancontroller;
use App\Http\Controllers\usercontroller;
use App\Http\Middleware\rolemiddleware;
use App\Http\Middleware\siswamiddleware;
use App\Http\Middleware\adminmiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return 'Hallo,akubelajar membuat website dengan laravel';
// });

//  Route::get('/dashboard',[RoutesControler::class,'Dashboard']);

//  Route :: match (['GET','post'],'/anggota',function (){
//     return 'halo,aku mebuat route anggota dengan beberapa mentod';
//  });

//  Route ::redirect('/buku','/dashboard');

//  Route :: get ('/',[RequestController::class,'store']);

// Route :: get ('/nama',function(){
//     $nama = session('nama');
//     return 'halaman nama dengan nama' . $nama;
// });

// Route:: get('/array',function(){
//     return[1,'perpustakaan',true];
// });

// Route :: get ('/hello',function(){
//     return response ($content = 'hallo laravel')
//     ->withHeaders([
//         'Content-Type'=>'text/html',   
//         'X-Hearder-one'=>'Header Value 1',
//         'X-Hearder-two'=>'Header Value 2'
//     ]);
// });

// Route :: get ('/tes',function(){
//     return redirect()-> action ([RoutesController:: class, 'Dashboard']);
// });

// Route::post('/login', [LoginController::class, 'postLogin']);
// Route::get('/login', [LoginController::class, 'login']);

// Route::get ('/buku',[bukucontroller::class, 'buku']);
// Route::post ('/buku',[bukucontroller::class, 'vabuku']);
// Route::get('/', function () {
//     return redirect('/loginb');
// });

// //login-regis~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
Route::middleware(['guest'])->group(function () {
    
    Route::get('/loginb', function () {
        return view('login_register.loginb');
    })->name('login');
    
    Route::post('/user/login', [usercontroller::class, 'login'])->name('user.login');
    
    Route::get('/register', function () {
        return view('login_register.register');
    })->name('register');
    
    Route::post('/user/register', [usercontroller::class, 'register'])->name('user.register');

});



// Route::get('/admin_data_buku', function () { 
//     return view('admin.admin_data_buku',['level' => 'admin']);
// })->name('buku');

// Route::get('/update_buku', function () { 
    //     return view('admin.dalam_admin.update_buku_a',['level' => 'admin']);
    // });
    
    // Route::get('/tambah_buku', function () { 
        //     return view('admin.dalam_admin.tambah_buku_a',['level' => 'admin']);
// });

// Route::get('/admin_kategori_buku ', function () { 
    //     return view('admin.admin_kategori',['level' => 'admin'])->name('kategori');
// });

// Route::get('/tambah_kategori_a ', function () { 
    //     return view('admin.dalam_admin.tambah_kategori_a',['level' => 'admin']);
    // });
    
    // Route::get('/update_kategori_a ', function () { 
        //     return view('admin.dalam_admin.update_kategori_a',['level' => 'admin']);
        // });
        
        // Route::get('/admin_penulis ', function () { 
            //     return view('admin.admin_penulis',['level' => 'admin'])->name('penulis');
// });

// Route::get('/tambah_penulis_a ', function () { 
//     return view('admin.dalam_admin.tambah_penulis_a',['level' => 'admin']);
// });

// Route::get('/update_penulis_a ', function () { 
    //     return view('admin.dalam_admin.update_penulis_a',['level' => 'admin']);
    // });
    
    
    // Route::get('/update_penerbit_a ', function () { 
    //     return view('admin.dalam_admin.update_penerbit_a',['level' => 'admin']);
    // })->name('update_penerbit');
    
    // Route::get('/admin_peminjaman ', function () { 
        //     return view('admin.admin_data_peminjaman',['level' => 'admin']);
        // });
        
        // Route::get('/update_peminjaman ', function () { 
            //     return view('admin.dalam_admin.update_peminjaman',['level' => 'admin']);
            // });
            //route siswaaa ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            
Route::middleware(['auth', siswamiddleware::class])->group(function () {
    
    Route::get('/home', function () {return view('siswa.siswa_dashboard',['level'=>'siswa']);})->name('siswaa');
    
    Route::get('/siswa_buku',  [PagesController::class, 'bukuSiswa'])->name('bukuSiswa');
    
    Route::get('/siswa_peminjaman', function () { 
        return view('siswa.siswa_peminjaman',['level' => 'siswa']);
    });
    
    
    Route::get('/tambah_peminjaman', [PagesController::class, 'create_peminjaman'])->name('create_peminjaman');
    
    Route::post('/create_peminjaman', [peminjamancontroller:: class,'create'])->name('action.createpeminjaman');
    
    Route::get('/siswa', [PagesController::class, 'dashboardSiswa'])->name('dashboardSiswa');
    
    Route::get('/siswa_pengaturan', [PagesController::class, 'pengaturan_siswa'])->name('pengaturan_siswa');
    
     Route::get('/siswa/peminjaman', [PeminjamanController::class, 'siswa_pnjam_data'])->name('siswa.peminjaman.index');
});


//modul 5
// Route::get('/login', [PagesController::class, 'loginPage'])->name('login');

// //route admmin ========================================================================

Route::middleware(['auth', adminmiddleware::class])->group(function () {
    
    Route::get('/admin_dashboardd', function () { 
        return view('admin.admin_dashboard',['level' => 'admin']);
    })->name('adminn');
    Route::get('/admin_penerbit', [PenerbitController::class, 'index'])->name('penerbit');
    
    Route::get('/tambah_penerbit_a ', function () { 
        return view('admin.dalam_admin.tambah_penerbit_a',['level' => 'admin']);
    });
    Route::get('/pengaturan_admin', function () { 
        return view('admin.admin_pengaturan', [
            'level' => 'admin', 
            'user' => Auth::user()
        ]);
    })->name('pengaturan_admin');
    
    
    
    Route::get('/admin', [PagesController::class, 'dashboardAdmin'])->name('dashboardAdmin');
    
    //menampilkn data
    Route::get('/admin_penerbit', [PagesController::class, 'penerbit'])->name('penerbit');
    
    //nampilkan from tambah
    Route::get('/tambah_penerbit', [PagesController::class, 'create_penerbit'])->name('create_penerbit');
    
    //nampilkan for udate
    Route::get('/update_penerbit/{penerbit_id}', [PagesController::class, 'update_penerbit'])->name('update_penerbit');
    
    //membuat data 
    Route::post('/create_penerbit', [PenerbitController:: class, 'create'])->name('action.createpenerbit');
    
    //update data
    Route::patch('/update_penerbit/{penerbit_id}', [PenerbitController::class, 'update'])->name('penerbit.update');
    // delete
    Route::delete('/penerbit/{penerbit_id}', [PenerbitController::class, 'delete'])->name('penerbit.delete');
    
    
    
    //menampilkn data
    Route::get('/admin_penulis', [PagesController::class, 'penulis'])->name('penulis');
    
    //nampilkan from tambah
    Route::get('/tambah_penulis', [PagesController::class, 'create_penulis'])->name('create_penulis');
    
    //nampilkan for udate
    Route::get('/update_penulis/{penulis_id}', [PagesController::class, 'update_penulis'])->name('update_penulis');
    
    //membuat data 
    Route::post('/create_penulis', [PenulisController:: class,'create'])->name('action.createpenulis');
    
    //update data
    Route::patch('/update_penulis/{penulis_id}', [PenulisController::class, 'update'])->name('penulis.update');
    // delete
    Route::delete('/penulis/{penulis_id}', [PenulisController::class, 'delete'])->name('penulis.delete');
    

    //menampilkn data
    Route::get('/admin_kategori', [PagesController::class, 'kategori'])->name('kategori');
    
    //nampilkan from tambah
    Route::get('/tambah_kategori', [PagesController::class, 'create_kategori'])->name('create_kategori');
    
    //nampilkan for udate
    Route::get('/update_kategori/{kategori_id}', [PagesController::class, 'update_kategori'])->name('update_kategori');
    
    //membuat data 
    Route::post('/create_kategori', [kategoriController:: class,'create'])->name('action.createkategori');
    
    //update data
    Route::patch('/update_kategori/{kategori_id}', [kategoriController::class, 'update'])->name('kategori.update');
    // delete
    Route::delete('/kategori/{kategori_id}', [kategoriController::class, 'delete'])->name('kategori.delete');

    
    //menampilkn data
    Route::get('/admin_rak', [PagesController::class, 'rak'])->name('rak');
    
    //nampilkan from tambah
    Route::get('/tambah_rak', [PagesController::class, 'create_rak'])->name('create_rak');
    
    //nampilkan for udate
    Route::get('/update_rak/{rak_id}', [PagesController::class, 'update_rak'])->name('update_rak');
    
    //membuat data 
    Route::post('/create_rak', [rakcontroller:: class,'create'])->name('action.createrak');
    
    //update data
    Route::patch('/update_rak/{rak_id}', [rakcontroller::class, 'update'])->name('rak.update');
    // delete
    Route::delete('/rak/{rak_id}', [rakcontroller::class, 'delete'])->name('rak.delete');
    
    //menampilkn data
    Route::get('/admin_data_buku', [PagesController::class, 'buku'])->name('buku');
    
    //nampilkan from tambah
    Route::get('/tambah_buku', [PagesController::class, 'create_buku'])->name('create_buku');
    
    //nampilkan for udate
    Route::get('/update_buku/{buku_id}', [PagesController::class, 'update_buku'])->name('update_buku');
    
    //membuat data 
    Route::post('/create_buku', [bukucontroller:: class,'create'])->name('action.createbuku');
    
    //update data
    Route::patch('/update_buku/{buku_id}', [bukucontroller::class, 'update'])->name('buku.update');
    // delete
    Route::delete('/buku/{buku_id}', [bukucontroller::class, 'delete'])->name('buku.delete');
    
    //menampilkn data
    Route::get('/admin_peminjaman', [PagesController::class, 'peminjaman'])->name('peminjaman');
    
    //nampilkan for udate
    Route::get('/update_peminjaman/{peminjaman_id}', [PagesController::class, 'update_peminjaman'])->name('update_peminjaman');
    //update data
    Route::patch('/update_peminjaman/{peminjaman_id}', [peminjamancontroller::class, 'update'])->name('peminjaman.update');
    // delete
    Route::delete('/peminjaman/{peminjaman_id}', [peminjamancontroller::class, 'delete'])->name('peminjaman.delete');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/logout',[usercontroller::class,'logout'])->name('logout');
});
