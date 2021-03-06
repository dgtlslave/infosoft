<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    //wallets
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/wallet', [App\Http\Controllers\WalletController::class, 'index']);
    //deposits
    Route::get('/deposits/{user}', [App\Http\Controllers\DepositController::class, 'index']);
    Route::get('/deposits-create/{user}', [App\Http\Controllers\DepositController::class, 'create']);
    Route::post('/deposits-store', [App\Http\Controllers\DepositController::class, 'store']);
    //replanishment
    Route::get('/deposits/{deposit}/replanishment', [App\Http\Controllers\ReplanishmentTransactionController::class, 'create']);
    Route::post('/deposits/{deposit}/replanishment-store', [App\Http\Controllers\ReplanishmentTransactionController::class, 'store']);
    //transactions
    Route::get('/deposits/{deposit}/transactions', [App\Http\Controllers\TransactionController::class, 'index']);
    //withdrawal
    // Route::get('/deposits/{deposit}/replanishment', [App\Http\Controllers\ReplanishmentTransactionController::class, 'create']);
    // Route::post('/deposits/{deposit}/replanishment-store', [App\Http\Controllers\ReplanishmentTransactionController::class, 'store']);
});
