<?php

use App\Livewire\PaginaDoEsudante;
use App\Livewire\Users\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/estudantes', App\Livewire\Estudantes\Index::class)->name("estudantes");

Route::get("/users", Index::class)->name("users");

Route::get("/pagina-do-estudante", PaginaDoEsudante::class)->name('pagina-estudante');