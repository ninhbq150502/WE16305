<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Test1 extends Model
{
    use HasFactory;
    protected $table = 'khach_hang';
    protected $fillable = ['id','TenKH'];// Lấy gì thì cho vào đây

    public function loadList($params = []){
        $query = DB::table($this->table)
        ->select($this->fillable);
        $list = $query->get();
        return $list;
    }
}
