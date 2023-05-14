<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProgramingLanguageController;


Route::group([
    'prefix' => 'programmingLanguage',
], function ($router) {
    Route::post('/create', [ProgramingLanguageController::class, 'handleCreate']);
    Route::post('/delete/{id}', [ProgramingLanguageController::class, 'handleDelete']);
    Route::get('/detail/{id}', [ProgramingLanguageController::class, 'handleGetDetail']);
    Route::post('/edit', [ProgramingLanguageController::class, 'handleEditData']);
    Route::post('/getList', [ProgramingLanguageController::class, 'handleGetList']);
});


