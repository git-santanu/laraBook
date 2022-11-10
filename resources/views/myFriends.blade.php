<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ Auth::user()->name }}</div>
                    <div class="card-body">
                        {{ __('Your friends') }}
                        
                        <!-- $profileFriends = \App\Models\User::find(1);
                        foreach ($profileFriends->friends as $role) {
                            print_r($role->name);
                        }
                        $mutualFriends = \App\Models\User::find(2);
                        foreach ($mutualFriends->friendsOf as $role) {
                            print_r($role->name);
                        } -->
                       
                        <br /><br />

                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="card align-items-center justify-content-center border-0" style="width: 18rem;">

                            @foreach($myFriends as $uList)
                            @if($uList->gender=='male')
                            <img class="card-img-top" src="{{url('/img/male.png/')}}" style="width: 80px; height: 80px; margin: 25px" alt="Card image cap">
                            @else
                            <img class="card-img-top" src="{{url('/img/female.png/')}}" style="width: 80px; height: 80px; margin: 25px" alt="Card image cap">
                            @endif
                            <div class="card-body">
                                <a href="/friendProfile/{{$uList->slug}}"><h5 class="card-title">{{$uList->name}}</h5></a>
                                <p>Friend</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

</body>

</html>