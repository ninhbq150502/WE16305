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
    public function index(){
        // echo "hello world";
        // dd(Test1::all());
        $objTest = new Test1();
        $test = $objTest->loadList();

        // $test = DB::table('khach_hang')->get();
        $this->v['test'] = $test;
        return view('test.index',$this->v);

    }
    public function update(){
        echo "Bùi Quỳnh Ninh";
    }
    
}
