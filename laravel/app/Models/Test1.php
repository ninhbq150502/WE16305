<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Test1 extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = ['id','name','email'];// Lấy gì thì cho vào đây

    public function loadList($params = []){
        $query = DB::table($this->table)
        ->select($this->fillable);
        $list = $query->get();
        return $list;
    }
    public function loadListWithPager($params= []){
        $query  = DB::table($this->table)
        ->select($this->fillable);
        $list =$query->paginate(13);
        return $list;
    }
}
