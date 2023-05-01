<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProgramingLanguageController;


Route::group([
    'prefix' => 'programmingLanguage',
], function ($router) {
    Route::post('/create', [ProgramingLanguageController::class, 'handleCreate']);
});


