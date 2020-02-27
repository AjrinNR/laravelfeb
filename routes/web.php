<?php

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

Route::get('/', function () {
    return view('welcome');
});

use App\Mahasiswa;
use App\Dosen;
use App\Hobi;

Route::get('relasi-1', function(){
    $mhs = Mahasiswa::where('nim','=','10231')->first();

    return $mhs->wali->nama;
});
Route::get('relasi-2', function(){
    $mhs = Mahasiswa::where('nim','=','10231')->first();

    return $mhs->dosen->nama    ;
});
Route::get('relasi-3', function(){
    $dosen = Dosen::where('nama','=','Abdul Kodir')->first();

    foreach($dosen->mahasiswa as $temp)
    echo '<li> Nama : ' .$temp->nama.
        '<strong> '. $temp->nim .'</strong>
        </li>';
});
Route::get('relasi-4', function(){
    $jamal = Mahasiswa::where('nama','=','Jamal Abdullah')->first();

    foreach($jamal->hobi as $temp)
    echo '<li>'. $temp->hobi .'</li>';

});
Route::get('relasi-5', function(){
    $data = Hobi::where('hobi','=','Mancing Keributan')->first();

    foreach($data->mahasiswa as $temp)
    echo '<li> Nama : ' .$temp->nama.
        '<strong> '. $temp->nim .'</strong>
        </li>';
});
Route::get('beranda', function(){
    return view('beranda');
});Route::get('tentang', function(){
    return view('tentang');
});Route::get('kontak', function(){
    return view('kontak');
});
Route::get('eloquent', function(){
    return view('eloquent');
});Route::get('lateloquent', function(){
    return view('lateloquent');
});
Route::get('relasijoin', function(){
    //join laravel
    // $sql = Mahasiswa::with('wali)->get();

    $sql = DB::table('mahasiswas')->
    select('mahasiswas.nama','mahasiswas.nim','walis.nama as nama_wali')
    ->join('walis','walis.id_mahasiswa','=','mahasiswas.id')->get();
    dd($sql);
});
Route::get('eloquent', function(){
    $mhs = Mahasiswa::with('wali','dosen','hobi')->get();
    return view('eloquent', compact('mhs'));
});

Route::get('lateloquent', function(){
    // $latihan = Mahasiswa::select('walis.nama as nama_wali','dosens.nama as nama_dosen','hobis.hobi')
    // ->join('walis','walis.id','=','mahasiswas.id')
    // ->join('dosens','dosens.id','=','mahasiswas.id')
    // ->join('hobis','hobis.id_hobi','=','mahasiswas.id')->get();
    $latihan = Mahasiswa::with('wali','dosen','hobi')->get()->take(1);
    return view('lateloquent', compact('latihan'));
});

Route::resource('dosen','DosenController');
Route::resource('hobi','HobiController');
Route::resource('mahasiswa','MahasiswaController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

