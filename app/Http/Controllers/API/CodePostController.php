<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CodePost;

class CodePostController extends Controller
{
    public function handleCreate(Request $request)
    {
        try {
            $codePostItem = CodePost::saveData($request);
            return response()->json($codePostItem);
        } catch (\Throwable $th) {
        }
    }
    public function handleDelete($id)
    {
        try {
            CodePost::deleteData($id);
            return response()->json("thành công");
        } catch (\Throwable $th) {
        }
    }
    public function handleGetDetail($id)
    {
        try {
            $data = CodePost::findDetailData($id);
            return response()->json($data);
        } catch (\Throwable $th) {
        }
    }
    public function handleEditData(Request $request)
    {
        try {
            $data = CodePost::editData($request);
            return response()->json($data);
        } catch (\Throwable $th) {
        }
    }
}
