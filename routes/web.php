<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;



Route::get('/home', function () {
    return view('Pages.index');
});
Route::resource('/pages',PageController::class);
Route::get('/produits',[ProduitController::class,'index'])->name('index');
Route::get('/produits/{id}',[ProduitController::class,'show'])->name('show');
Route::get('/produits/create',[ProduitController::class,'create'])->name('create');
Route::post('/produits',[ProduitController::class,'store'])->name('store');
Route::get('/produits/{id}/edit',[ProduitController::class,'edit'])->name('edit');
Route::put('/produits/{id}',[ProduitController::class,'update'])->name('update');
Route::delete('/produits/{id}',[ProduitController::class,'destroy'])->name('destroy');
