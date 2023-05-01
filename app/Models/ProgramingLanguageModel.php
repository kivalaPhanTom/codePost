<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


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
}
