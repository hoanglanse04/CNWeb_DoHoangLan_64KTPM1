<?php

use App\Http\Controllers\IssueController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [IssueController::class, 'index'])->name('home');

Route::get('/create', [IssueController::class, 'create'])->name('create');

Route::post('/issue', [IssueController::class, 'store'])->name('store');

Route::get('/edit/{id}', [IssueController::class, 'edit'])->name('edit');

Route::put('/issue{id}', [IssueController::class, 'update'])->name('update');

Route::delete('/delete/{id}', [IssueController::class, 'destroy'])->name('destroy');

