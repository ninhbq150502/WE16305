<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    private $data;
    public function __construct()
    {
        $this->data = [];
    }
    public function index(){
        $objRoom = new Room();
        $room = $objRoom->loadList();
        $this->data['room'] = $room;
        return view('test.phong',$this->data);
    }
}
