<?php

namespace App\Http\Controllers;

use App\Models\Test1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PHPUnit\Util\Test;

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
    

    public function add(Request $request){
        $_title = 'Them moi user';
        $this->v['_title'] = $_title;
        $method_route = 'route_BackEnd_Users_Add';
        if($request->isMethod('post')){
            $prams = [];
            $prams['cols'] = array_map(function ($item){
                if($item == ''){
                    $item = null;
                }
                if(is_string($item)){
                    $item = trim($item);
                }
                return $item;
            },$request->post());
            unset($prams['cols']['_token']);
            $model = new Test1();
            $res = $model->saveNew($prams);
            if($res == null){
                redirect()->route('route_BackEnd_Users_Add');
            }
            else if($res > 0){
                Session::flash('success','Them moi nguoi dung thanh cong');
            }else{
                Session::flash('error','Co loi xay ra.Vui long thu lai.');
                redirect()->route('route_BackEnd_Users_Add');
            }
        }
        return view('users.add',$this->v);
    }

    public function detail($id){
        $this->v['title'] = 'Chi tiết người dùng';
        $test = new Test1();
        $objItem = $test->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('users.detail', $this->v);
    }
    
    public function update($id, Request $request){
        $method_route = "router_BackEnd_Users_Detail";
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        $test = new Test1();
        $objItem = $test ->loadOne($id);
        $params['cols']['id'] = $id;
        if(!is_null($params['cols']['password'])){
            $params['cols']['password'] = Hash::make($params['cols']['password']);
        }
        $res= $test->saveUpdate($params);
        if($res == null){
            redirect()->route('route_BackEnd_Users_Add');
        }
        else if($res > 0){
            Session::flash('success','Cap nhat ban ghi'. $objItem->id .' thanh cong');
        }else{
            Session::flash('error','Lỗi cập nhật bản ghi '. $objItem->id);
            redirect()->route('route_BackEnd_Users_Add');
        }
    }

    
}
