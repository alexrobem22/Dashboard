<?php

use App\Http\Controllers\CurriculoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

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

// Route::get('/', function () {
//     return view('welcome');
// });
//index curriculo
 Route::get('/{erro?}', [LoginController::class, 'index'])->name('login');
 Route::post('/', [LoginController::class, 'autenticar'])->name('login');


//dashboard

Route::middleware('autenticacao')->prefix('/app')->group(function(){

    Route::get('/sair', [LoginController::class, 'sair'])->name('logout.destroy');

    Route::resource('usuario', UsuarioController::class);
    

});

