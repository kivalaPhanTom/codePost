<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ProgramingLanguageModel extends Model
{
    use HasFactory;
    protected $table = 'programing_language';
    
    protected $fillable = [
        'id',
        'name',
        'img',
    ];
    public $timestamps = false;

    public function saveData($data)
    {
        $result = new ProgramingLanguageModel();
        $result->name = $data->name;
        $result->img = $data->img;
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
        $detail->name = $data->name;
        $detail->img = $data->img;
        $detail->updated_at = now();
        $detail->save();
        return $detail;
    }
    public function getListWithoutKeySearch($pageSize, $pageIndex)
    {  
        $list = self::paginate(
            $pageSize, // per page (may be get it from request)
            ['*'], // columns to select from table (default *, means all fields)
            'page', // page name that holds the page number in the query string
            $pageIndex // current page, default 1
        );
        return $list;
    }
    public function getListWithKeySearch($keyword, $pageSize, $pageIndex)
    {  
        $list = self::where('name','like', '%' .$keyword. '%')->paginate(
            $perPage = $pageSize, 
            $columns = ['*'], 
            $pageName = 'page', 
            $currentPage = $pageIndex
        );
        return $list;
    }
}
