<?php

use App\Http\Controllers\Api\ArchiveController;
use Illuminate\Support\Facades\Route;

// Rute publik tanpa keamanan
Route::get('/archive/{tableName}', [ArchiveController::class, 'getArchiveData']);