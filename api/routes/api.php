<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\TipoAutomovelController;
use App\Http\Controllers\AutomovelController;
use App\Http\Controllers\CategoriaAutomovelController;
use App\Http\Controllers\ModeloAutomovelController;
use App\Http\Controllers\SiteController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:sanctum')->group(function () {

// Empresa
Route::get('/empresas', [EmpresaController::class, 'index']);
Route::get('/empresa/{id}', [EmpresaController::class, 'show']);
Route::post('/empresa/criar', [EmpresaController::class, 'store']);
Route::put('/empresa/editar/{id}', [EmpresaController::class, 'update']);
Route::delete('/empresa/deletar/{id}', [EmpresaController::class, 'destroy']);

Route::put('/usuario/editar/{id}', [UsuarioController::class, 'update']);
Route::put('/usuario/editar/senha/{id}', [UsuarioController::class, 'updatePassword']);
Route::delete('/usuario/deletar/{id}', [UsuarioController::class, 'destroy']);
Route::get('/usuarios/{id_empresa?}', [UsuarioController::class, 'index']);
Route::get('/usuario/{id}', [UsuarioController::class, 'show']);
Route::post('/usuario/criar', [UsuarioController::class, 'store']);


// Automoveis
Route::get('/automoveis/{id_empresa?}', [AutomovelController::class, 'index']);
Route::get('/automovel/{id}', [AutomovelController::class, 'show']);
Route::post('/automovel/criar', [AutomovelController::class, 'store']);
Route::put('/automovel/editar/{id}', [AutomovelController::class, 'update']);
Route::delete('/automovel/deletar/{id}', [AutomovelController::class, 'destroy']);
});



//usuario
Route::post('/login', [UsuarioController::class, 'Login']);

Route::get('/empresa/usuario/{id}', [UsuarioController::class, 'EmpresaUSer']);


// Marcas
Route::get('/marcas', [MarcaController::class, 'index']);

//modelos
Route::get('/modelos/{id_marca?}', [ModeloAutomovelController::class, 'index']);

// Tipo
Route::get('/tipos', [TipoAutomovelController::class, 'index']);

// categoria
Route::get('/categorias', [CategoriaAutomovelController::class, 'index']);

Route::get('/site/{id_empresa}/{search?}', [SiteController::class, 'index']);
