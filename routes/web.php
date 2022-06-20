<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Listele;
use App\Http\Controllers\listeleController;
use App\Http\Controllers\Controller;



//Route::get('/', 'Controller@ogrenci');

Route::get('/', [Controller::class , 'ogrenci'])->name('index');
Route::post('ogrenci/ekle', [Controller::class, 'ogrenciekle'])->name('ogrenciekle');
Route::get('ogrenci/sil/{sid}',[Controller::class,'ogrencisil'])->name('ogrencisil');
Route::get('ogrenci/guncelle/{sid}', [Controller::class,'ogrenciguncelle'])->name('ogrenciguncelle');
Route::post('ogrenci/kaydet/{sid}', [Controller::class,'ogrencikaydet'])->name('ogrencikaydet');
Route::get('ogrenci/ara', [Controller::class,'ogrenciara'])->name('ogrenciara');

Route::get('ogrenci/guncelle2/{sid}', [Controller::class,'ogrenciguncelle2'])->name('ogrenciguncelle2');
Route::get('ogrenci/ekle', [Controller::class, 'ogrenciekle2'])->name('ogrenciekle2');
