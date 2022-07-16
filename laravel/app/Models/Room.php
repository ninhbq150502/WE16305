<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    use HasFactory;
    protected $table = 'phong';
    protected $fillable = ['id','Ten_loai_phong'];

    public function loadList($params = []){
        $query = DB::table($this->table)
        ->select($this->fillable);
        $list = $query->get();
        return $list;
    }
}
