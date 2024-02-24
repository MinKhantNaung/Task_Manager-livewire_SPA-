<?php

use App\Livewire\Tasks\TaskIndex;
use App\Livewire\Tasks\TasksList;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', TasksList::class)->name('tasks.index');
    Route::get('/tasks/create', TaskIndex::class)->name('tasks.create');
});

require __DIR__.'/auth.php';
