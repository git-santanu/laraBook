<?php

namespace App\Traits;

use App\Models\friendship;
use Illuminate\Foundation\Auth\User;

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
    
}
