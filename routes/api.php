
<?php

// use Illuminate\Http\Request;
use App\Http\Controllers\Api\SantriApiController;
use Illuminate\Support\Facades\Route;

Route::get('/cek-api', function () {
    return response()->json(['message' => 'API terbaca']);
});

Route::apiResource('santris', SantriApiController::class);

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth.sanctum');

// Route::apiResource('santri', SantriApiController::class)->names([
//     'index' => 'api.santri.index',
//     'store' => 'api.santri.store',
//     'show' => 'api.santri.show',
//     'update' => 'api.santri.update',
//     'destroy' => 'api.santri.destroy',
// ]);
