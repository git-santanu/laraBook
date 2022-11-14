<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Traits\Friendable;

class profileControl extends Controller
{   
    use Friendable;
    public function index()
    {
        return view('profile');
    }
    public function profileFrnd($id)
    {
        // $userInfo = DB::table('users')->where('slug',$slug)
        // ->get();

        // $uuid=Auth::user()->id;
        // $u_friends = [];
        $id = Auth::user()->id;
        logger($id);
        $myFriends = $this->friends(Auth::user()->id)->pluck('id')->toArray();
        logger($myFriends);
        $friendsOf = $this->friends(intval($id))->pluck('id')->toArray();
        logger($friendsOf);
        $mutualFriends = array_intersect($friendsOf,$myFriends);
        $mutualFriends = User::find($mutualFriends);

        // logger($mutualFriends);
       

       
        // $frRequester =DB::table('friendships')
        // ->leftJoin('users','users.id','friendships.req_name')
        // ->where('status',1)
        // ->where('requester','!=', $uuid)
        // ->get();

        // $frReqby = DB::table('friendships')
        // ->leftJoin('users','users.id','friendships.requester')
        // ->where('status',1)
        // ->where('req_name','!=', $uuid)
        // ->get();


        // $mutualFriends = array_intersect($myFriends->toArray(),$friendsOf->toArray());

        return view('friendProfile',compact('mutualFriends'))->with('data',Auth::user()->friendProfile);
    }
}
