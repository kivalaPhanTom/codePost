<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CodePostController;


Route::group([
    'prefix' => 'codePost',
], function ($router) {
    Route::post('/create', [CodePostController::class, 'handleCreate']);
    Route::post('/delete/{id}', [CodePostController::class, 'handleDelete']);
    Route::get('/detail/{id}', [CodePostController::class, 'handleGetDetail']);
    Route::post('/edit', [CodePostController::class, 'handleEditData']);
});


