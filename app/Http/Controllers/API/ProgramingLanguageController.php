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
                "reason" => ''
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "isError" => true,
                "data" => null,
                "reason" => $e
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
                "reason" => ''
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "isError" => true,
                "data" => null,
                "reason" => $e
            ]);
        }

    }

    public function handleGetDetail($id)
    {
        try {
            $data = ProgramingLanguageModel::findDetailData($id);
            return response()->json([
                "isError" => false,
                "data" => $data,
                "reason" => ''
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "isError" => true,
                "data" => null,
                "reason" => $e
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
                "reason" => ''
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "isError" => true,
                "data" => null,
                "reason" => $e
            ]);
        }
    }
    public function handleGetList(Request $request){
        $keyword = $request->keyword;
        $pageSize = $request->pageSize;
        $pageIndex = $request->pageIndex;
        try {
            $result = [];
            if(trim($keyword) == ''){
                $result = ProgramingLanguageModel::getListWithoutKeySearch($pageSize, $pageIndex);
            }else{
                $result = ProgramingLanguageModel::getListWithKeySearch($keyword, $pageSize, $pageIndex);
            }
            return response()->json([
                "isError" => false,
                "data" => $result,
                "reason" => ''
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "isError" => true,
                "data" => [],
                "reason" => $e
            ]);
        }
    }
    public function handleGetAllList(Request $request){
        try {
            $result = [];
            $result = ProgramingLanguageModel::getAllData();
            return response()->json([
                "isError" => false,
                "data" => $result,
                "reason" => ''
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "isError" => true,
                "data" => [],
                "reason" => $e
            ]);
        }
    }
    
}
