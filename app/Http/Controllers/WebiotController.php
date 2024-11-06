<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Webiot;
use Illuminate\Http\Request;

class WebiotController extends Controller
{
    public function index(){
        return view("rfid.index");
    }

    public function updateTag($tag) {
        $rfid = Webiot::find(1);
        $rfid->rfid_tag = $tag;
        $rfid->save();
    }
    public function checkUser() {
        $lastTag = Webiot::find(1);
        $user = User::where('rfid', $lastTag->rfid_tag)->first();
        return response()->json(["user"=>$user]);

    }
}
