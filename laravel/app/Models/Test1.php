<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
    public function saveNew($params){
        $data = array_merge($params['cols']);

        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }
    public function loadOne($id, $param = null){
        $query = DB::table($this->table)
            ->where('id', '=' ,$id);
        $obj = $query->first();
        return $obj;
    }
    public function saveUpdate($params){
        if(empty($params['cols']['id'])){
            Session::flash('error', 'Không xác định bản ghi cập nhật');
            return null;
        }
        $dataUpdate = [];
        foreach($params['cols'] as $colName => $val){
            if($colName == 'id') continue;
            if(in_array($colName,$this->fillable)){
                $dataUpdate[$colName] = (strlen($val)==0) ? null:$val;
            }
        }
        $res = DB::table($this->table)
                ->where('id', $params['cols']['id'])
                ->update($dataUpdate);
        return $res;
    }
}
