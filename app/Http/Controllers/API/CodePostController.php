<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CodePost;

class CodePostController extends Controller
{
    public function handleCreate(Request $request)
    {
        try {
            $codePostItem = CodePost::saveData($request);
            return response()->json([
                "isError" => false,
                "data" => $codePostItem,
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
    public function handleDelete($id)
    {
        try {
            CodePost::deleteData($id);
            return response()->json([
                "isError" => false,
                "data" => null ,
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
    public function handleGetDetail($id)
    {
        try {
            $data = CodePost::findDetailData($id);
            return response()->json([
                "isError" => false,
                "data" => $data,
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
    public function handleEditData(Request $request)
    {
        try {
            $data = CodePost::editData($request);
            return response()->json([
                "isError" => false,
                "data" => $data,
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
    public function handleGetList(Request $request){
        $keyword = $request->keyword;
        $programlangIds = $request->programLangIds;
        $pageSize = $request->pageSize;
        $pageIndex = $request->pageIndex;
        try {
            $result = [];
            $result = CodePost::getListCodePost($keyword, $programlangIds, $pageSize, $pageIndex);
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
