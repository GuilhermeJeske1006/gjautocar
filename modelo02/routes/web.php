<?php

use App\Livewire\Automoveis\Lista;
use App\Livewire\Automoveis\Detalhes;

use App\Livewire\Home\Index;
use App\Livewire\Sobre\Index as SobreIndex;
use App\Livewire\Contato\Index as ContatoIndex;

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

Route::get('/', Index::class);
Route::get('/sobre', SobreIndex::class);
Route::get('/automoveis', Lista::class)->name('listar');
Route::get('/automovel/{id}', Detalhes::class)->name('detalhes');
Route::get('/contato', ContatoIndex::class)->name('contato');
