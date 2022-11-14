<?php

namespace App\Traits;

use App\Models\friendship;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait Friendable
{
    public function test()
    {
        return "hello traits is ok";
    }
    public function addFriend($id)
    {
        $friend = friendship::create(
            [
                'requester' => $this->id,
                'req_name' => $id
            ]
        );
        if ($friend) {
            // return $friend;
            return redirect('find');
        } else {
            return "failde to connect";
        }
    }
    public function myfriends()
    {
        $uuid=Auth::user()->id;
        $myFriends = DB::table('friendships')
        ->leftJoin('users','users.id','friendships.req_name' and 'users','users.id','friendships.requester')
        ->where('status',1)
        ->where('requester',$uuid and 'req_name',$uuid)
        ->get();
        
    }

    public function friends(int $uuid = null)
    {
        if (is_null($uuid)){
            $uuid = auth()->user()->id;
        }
        $u_friends = [];
        $friends = DB::table('friendships')->where(fn($query) => $query->where('requester', $uuid)->orWhere('req_name', $uuid))->where('status',1)->get();
        foreach($friends as $friend) {
            if (($friend->requester === $uuid || $friend->req_name === $uuid)) {
                if ($friend->requester === $uuid) {
                    $u_friends[] = $friend->req_name;
                } else {
                    $u_friends[] = $friend->requester;
                }
            }
        }

        $u_friends = array_unique($u_friends);
        return DB::table('users')->whereIn('id', $u_friends)->get();
    }
    // public function mutualFriends($id){
    //     $profile = User::where('id', $id)->first();
    //     $profileFriends = $profile->friends;
    //     $profileFriendsIds = [];
    //       foreach ($profileFriends as $entry){
    //         $profileFriendsIds[] = $entry->id;
    //        }
    //     $loggedUserFriends = Auth::user()->friends->whereIn('id', $profileFriendsIds);
       
    //     return $loggedUserFriends;
    //    }
}
