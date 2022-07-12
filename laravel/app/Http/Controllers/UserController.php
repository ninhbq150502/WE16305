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
    public function index(){
        $this->v['tieude'] = 'Tieu de';
        $this->v['tieude1'] = 'Tieu de 1';
        $this->v['tieude2'] = 'Tieu de 2';
        return view('test.index', $this->v);
    }
}
