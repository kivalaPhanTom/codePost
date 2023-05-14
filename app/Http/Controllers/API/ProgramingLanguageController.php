<?php
namespace App\Http\Controllers\API;
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
            return response()->json([
                "isError" => false,
                "data" => $ln ,
                "reason" => $th
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "isError" => true,
                "data" => null,
                "reason" => $th
            ]);
        }
    }

    public function handleDelete($id)
    {
        try {
            ProgramingLanguageModel::deleteData($id);
            return response()->json([
                "isError" => false,
                "data" => null ,
                "reason" => $th
            ]);
        } catch (\Throwable $th) {
        }
    }

    public function handleGetDetail($id)
    {
        try {
            $data = ProgramingLanguageModel::findDetailData($id);
            return response()->json([
                "isError" => false,
                "data" => $data,
                "reason" => $th
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "isError" => true,
                "data" => null,
                "reason" => $th
            ]);
        }
    }
    public function handleEditData(Request $request)
    {
        try {
            $data = ProgramingLanguageModel::editData($request);
            return response()->json([
                "isError" => false,
                "data" => $data,
                "reason" => $th
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "isError" => true,
                "data" => null,
                "reason" => $th
            ]);
        }
    }
    public function handleGetList(Request $request){
        $keyword = $request->keyword;
        $pageSize = $request->pageSize;
        $pageIndex = $request->pageIndex;
        try {
            $result = null;
            if(trim($keyword) === ''){
                $result = ProgramingLanguageModel::getListWithoutKeySearch($pageSize, $pageIndex);
            }else{
                $result = ProgramingLanguageModel::getListWithKeySearch($keyword, $pageSize, $pageIndex);
            }
            return response()->json([
                "isError" => false,
                "data" => $result,
                "reason" => $th
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "isError" => true,
                "data" => [],
                "reason" => $th
            ]);
        }
        
    }
    
}
