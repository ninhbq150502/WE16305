<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
    public function saveNew($prams){
        $data = array_merge($prams['cols'],[
            'password' => Hash::make($prams['cols']['password'])
        ]);

        $res = DB::table($this->table)->insertGetId($data);

        return $res;
    }
}
