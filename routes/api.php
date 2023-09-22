<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdutoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

*/

/**
 * Grupo de rotas sem autenticação
 */
Route::middleware('api')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});


/**
 * Grupo de rotas que exige autenticação
 */
Route::middleware('auth:api')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);


    Route::controller(ProdutoController::class)->group(function () {
        Route::get('/produtos', 'index')->name('produtos.index');
        Route::get('/produtos/{id}', 'show')->name('produtos.show');
        Route::post('/produtos', 'store')->name('produtos.store');
        Route::put('/produtos/{produto}', 'update')->name('produtos.update');
        Route::delete('/produtos/{produto}', 'destroy')->name('produtos.destroy');
    });

});


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
