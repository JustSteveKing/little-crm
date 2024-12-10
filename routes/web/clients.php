<?php

declare(strict_types=1);

use App\Http\Controllers\Clients;
use Illuminate\Support\Facades\Route;

Route::get('/', Clients\IndexController::class)->name('index');
Route::get('create', fn() => 'Create Client')->name('create');
Route::post('/', fn() => 'Store Client')->name('store');
Route::get('{client}', fn() => 'Show Client')->name('show');
Route::get('{client}/edit', fn() => 'Edit Client')->name('edit');
Route::put('{client}', fn() => 'Update Client')->name('update');
Route::delete('{client}', fn() => 'Destroy Client')->name('delete');

