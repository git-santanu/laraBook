<?php

namespace App\Traits;

use App\Models\friendship;

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
        if($friend)
        {
            return $friend;
        }else{
            return "failde to connect";
        }
    }
}
