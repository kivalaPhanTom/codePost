<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class CodePost extends Model
{
    use HasFactory;
    protected $table = 'codepost';
    public $timestamps = false;
    public function saveData($data)
    {
        $result = new CodePost();
        $result->title = $data->title;
        $result->code = $data->code;
        $result->programLangId = $data->programLangId;
        $result->created_at =now();
        $result->save();
        return $result;
    }
    public function deleteData($data)
    {
        self::destroy($data);
    }
    public function findDetailData($data)
    {
        $result = self::find($data);
        return $result;
    }
    public function editData($data)
    {
        $detail = self::find($data->id);
        $detail->title = $data->title;
        $detail->code = $data->code;
        $detail->programLangId = $detail->programLangId;
        $detail->updated_at = now();
        $detail->save();
        return $detail;
    }
}
