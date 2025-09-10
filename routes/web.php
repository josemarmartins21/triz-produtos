<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::get('/', [ProdutoController::class, 'index'])->name('produtos.index');

Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');

Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos');

Route::get('/produtos/{id}', [ProdutoController::class, 'show'])->name('produtos.show');

Route::get('/dashboard', [ProdutoController::class, 'dashboard'])->name('produtos.dashboard');

Route::delete("/produtos/{id}", [ProdutoController::class, 'destroy'])->name('photos.destroy');
 
