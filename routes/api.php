<?php


use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Support\Facades\Route;


//Route::apiResource('/users', 'UserController');
Route::get('students',[StudentController::class,'index']);
Route::post('students',[StudentController::class,'store']);
Route::get('students/{id}',[StudentController::class,'show']);
Route::put('students/{id}/edit',[StudentController::class,'update']);
Route::delete('students/{id}/delete',[StudentController::class,'destroy']);

Route::get('/pages/{slug}', [PageController::class, 'showBySlug']);

Route::get('/categories', [\App\Http\Controllers\Api\CategorieController::class, 'index']);

Route::get('/produits', [\App\Http\Controllers\Api\ProduitController::class, 'index']);

Route::get('/produits/{id}', [\App\Http\Controllers\Api\ProduitController::class, 'show']);
Route::post('/produits', [\App\Http\Controllers\Api\ProduitController::class, 'store']);
