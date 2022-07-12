<?php

namespace App\Http\Controllers;

use App\Models\Test1;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        // echo "hello world";
        // dd(Test1::all());
        return view('test.index');
    }
    public function update(){
        echo "Bùi Quỳnh Ninh";
    }
    
}
