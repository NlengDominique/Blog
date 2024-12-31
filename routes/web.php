<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;



Route::get('/home', function () {
    return view('Pages.index');
});
Route::resource('/pages',PageController::class);
