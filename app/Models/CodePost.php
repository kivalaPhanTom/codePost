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
    public static function saveData($data)
    {
        $result = new CodePost();
        $result->title = $data->title;
        $result->code = $data->code;
        $result->programLangId = $data->programLangId;
        $result->created_at =now();
        $result->save();
        return $result;
    }
    public static function deleteData($data)
    {
        self::destroy($data);
    }
    public static function findDetailData($data)
    {
        $result = self::find($data);
        return $result;
    }
    public static function editData($data)
    {
        $detail = self::find($data->id);
        $detail->title = $data->title;
        $detail->code = $data->code;
        $detail->programLangId = $detail->programLangId;
        $detail->updated_at = now();
        $detail->save();
        return $detail;
    }
    public static function getListCodePost($keyword, $programLangIds, $pageSize, $pageIndex)
    {  
        // Log::info('XXXXXYYY');
        // Log::info($programLangIds);
        $list = [];
        if(trim($keyword) == '' && count($programLangIds) === 0){
            $list = self::paginate(
                $pageSize, // per page (may be get it from request)
                ['*'], // columns to select from table (default *, means all fields)
                'page', // page name that holds the page number in the query string
                $pageIndex // current page, default 1
            );
        }else{
            $conditon = [];
            if(trim($keyword) != ''){
                array_push( $conditon, ['title', 'like', '%' .$keyword. '%']);
            }
            if(count($programLangIds) !== 0){
                array_push( $conditon, ['programLangId', 'in', $programLangIds]);
            }
            $programlangIdsLength = count($programLangIds);
            $list = self::where('title','like', '%' .$keyword. '%')
                        ->when(($programlangIdsLength > 0) ? true: false,  function ($query) use ($programLangIds) { //khi mà $programlangIdsLength lớn hơn 0, thì mới chạy vào hàm dc truyền
                                $query->whereIn('programLangId', $programLangIds); 
                            })
                        ->paginate(
                            $perPage = $pageSize, 
                            $columns = ['*'], 
                            $pageName = 'page', 
                            $currentPage = $pageIndex
                        );
        }
        return $list;
    }
   
}
