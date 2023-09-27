<?php

use App\Http\Controllers\AnuncieController;
use App\Http\Controllers\AutomovelController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/sobre-nos', [SobreController::class, 'index'])->name('sobre');

Route::get('/contato', [ContatoController::class, 'index'])->name('contato');

Route::get('/listar', [AutomovelController::class, 'index'])->name('listar');

Route::get('/detalhes/{id}', [AutomovelController::class, 'show'])->name('detalhes');

Route::post('/interrese', [AutomovelController::class, 'enviarInteresse'])->name('enviar_interesse');

Route::get('/favoritos', [AutomovelController::class, 'favoritos'])->name('favoritos');

Route::get('/anuncie', [AnuncieController::class, 'index'])->name('anuncie');

Route::get('/add-favoritos', [AutomovelController::class, 'AddFavoritos'])->name('add-favoritos');

Route::get('/remove-favoritos', [AutomovelController::class, 'removeFavoritos'])->name('remove-Favoritos');

Route::post('/enviar-contato', [ContatoController::class, 'enviarFormulario'])->name('enviar_contato');


Route::post('/enviar-comentario', [BlogController::class, 'enviarComentario'])->name('enviar_comentario');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');

Route::get('/blog/{id}', [BlogController::class, 'show'])->name('detalhes-blog');
