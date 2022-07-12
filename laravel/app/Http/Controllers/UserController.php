<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function show_name(){
        $this->v['hoten'] = 'Bui Quynh Ninh';
        return view('test.show_name', $this->v);
    }
}
