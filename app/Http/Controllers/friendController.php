<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\friendship;
use App\Models\notifcations;
use App\Traits\Friendable;
class friendController extends Controller
{
    
    public function findFriend()
    {
        $uuid = Auth::user()->id;
        $userData = DB::table('users')->where('id', '!=', $uuid)->get();
        return view('friend', compact('userData'));
    }
    use Friendable;
    public function friendReq($id)
    {  
        return Auth::user()->addFriend($id);
        return back();
    }
    public function requestIn()
    {
        $uuid = Auth::user()->id;
        $frReq=DB::table('friendships')->rightJoin('users','users.id','=','friendships.requester')
        ->where('status','=',Null)
        ->where('friendships.req_name','=',$uuid)->get()->toArray();
        return view('request',compact('frReq'));
    }
    public function acceptFriend($id)
    {
        $uuid = Auth::user()->id;
        $getReq= DB::table('friendships')->where('requester',$id)
        ->where('req_name',$uuid)->first();
        if($getReq)
        {
          $updateFriend= DB::table('friendships')
           ->where('req_name',$uuid)
           ->where('requester',$id)
           ->update(['status'=>1]);
           if($updateFriend){
            return back()->with('msg','you arer now friend');
           }
        }
        else{
            echo "can not update";
        }
    }
}