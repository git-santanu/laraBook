<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class profileControl extends Controller
{
    public function index()
    {
        return view('profile');
    }
    public function profileFrnd($slug)
    {
        $userInfo = DB::table('users')->where('slug',$slug)
        ->get();

        $uuid=Auth::user()->id;


        $frRequester =DB::table('friendships')
        ->leftJoin('users','users.id','friendships.req_name')
        ->where('status',1)
        ->where('requester','!=', $uuid)
        ->get();

        $frReqby = DB::table('friendships')
        ->leftJoin('users','users.id','friendships.requester')
        ->where('status',1)
        ->where('req_name','!=', $uuid)
        ->get();

        $mutualFriends = array_merge($frRequester->toArray(),$frReqby->toArray());

        return view('friendProfile',compact('userInfo','mutualFriends'))->with('data',Auth::user()->friendProfile);
    }
}
// $frReqby = DB::table('friendships')
//         ->leftJoin('users','users.id','friendships.requester')
//         ->where('status',1)
//         ->where('req_name',$uuid)
//         ->get();