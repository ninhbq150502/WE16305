<?php

namespace App\Http\Controllers;

use App\Models\Test1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function index(Request $request){
        // echo "hello world";
        // dd(Test1::all());
        $this->v['tieude'] = 'Nguoi dung';
        $objTest = new Test1();
        $this->v['extParams'] = $request->all();
        // $test = $objTest->loadList();
        $this->v['list'] = $objTest->loadListWithPager();

        // $test = DB::table('khach_hang')->get();
        // $this->v['test'] = $test;
        return view('users.index',$this->v);

    }
    public function update(){
        echo "Bùi Quỳnh Ninh";
    }
    
}
