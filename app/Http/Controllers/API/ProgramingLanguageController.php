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
        try {
            $ln = ProgramingLanguageModel::saveData($request);
            return response()->json($ln);
        } catch (\Throwable $th) {
        }
       
    }
    public function handleDelete($id)
    {
        try {
            ProgramingLanguageModel::deleteData($id);
            return response()->json("thành công");
        } catch (\Throwable $th) {
        }
    }
    public function handleGetDetail($id)
    {
        try {
            $data = ProgramingLanguageModel::findDetailData($id);
            return response()->json($data);
        } catch (\Throwable $th) {
        }
    }
    public function handleEditData(Request $request)
    {
        try {
            $data = ProgramingLanguageModel::editData($request);
            return response()->json($data);
        } catch (\Throwable $th) {
        }
    }
}
