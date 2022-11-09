<?php

use App\Http\Livewire\Salacontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', Salacontroller::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
