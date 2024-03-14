<?php

use App\Livewire\Images\ImageIndex;
use App\Livewire\Tasks\TaskIndex;
use App\Livewire\Tasks\Tasks;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', Tasks::class)->name('tasks.index');
    Route::get('/tasks/create', TaskIndex::class)->name('tasks.create');
    Route::get('/images', ImageIndex::class)->name('images.index');
});

require __DIR__.'/auth.php';
