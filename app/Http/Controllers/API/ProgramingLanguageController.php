<?php
namespace App\Http\Controllers\API;
// namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramingLanguageModel;
use Illuminate\Support\Facades\Log;

class ProgramingLanguageController extends Controller
{
    public function handleCreate(Request $request)
    {
        $ln = ProgramingLanguageModel::saveData($request);
        return response()->json($ln);
    }
}
