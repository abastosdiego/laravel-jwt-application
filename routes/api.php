<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\TipoProdutoController;
use App\Http\Controllers\UsuarioController;

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


/**
 * Rotas sem autenticação
 */
Route::middleware('api')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});

/**
 * Rotas que exigem autenticação
 */
Route::middleware('auth:api')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);
    Route::put('/updatePassword', [AuthController::class, 'updatePassword']);

    Route::controller(UsuarioController::class)->group(function () {
        Route::get('/usuarios', 'index');
        Route::get('/usuarios/{user}', 'show');
        Route::post('/usuarios', 'store');
        Route::put('/usuarios/{user}', 'update');
        Route::delete('/usuarios/{user}', 'destroy');
    });

    Route::controller(ProdutoController::class)->group(function () {
        Route::get('/produtos', 'index')->name('produtos.index');
        Route::get('/produtos/{id}', 'show')->name('produtos.show');
        Route::post('/produtos', 'store')->name('produtos.store');
        Route::put('/produtos/{produto}', 'update')->name('produtos.update');
        Route::delete('/produtos/{produto}', 'destroy')->name('produtos.destroy');
    });

    Route::controller(TipoProdutoController::class)->group(function () {
        Route::get('/tiposprodutos', 'index')->name('tiposprodutos.index');
        Route::get('/tiposprodutos/{tipoProduto}', 'show')->name('tiposprodutos.show');
        Route::post('/tiposprodutos', 'store')->name('tiposprodutos.store');
        Route::put('/tiposprodutos/{tipoProduto}', 'update')->name('tiposprodutos.update');
        Route::delete('/tiposprodutos/{tipoProduto}', 'destroy')->name('tiposprodutos.destroy');
    });

});


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
