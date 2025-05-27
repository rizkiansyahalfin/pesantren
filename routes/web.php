<?php

use App\Http\Controllers\SantriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('santri');
});

Route::resource('santri', SantriController::class);
