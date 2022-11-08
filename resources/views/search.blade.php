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
                        {{ __('Search friends to here') }}
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="card align-items-center justify-content-center border-0" style="width: 18rem;">
                            @foreach($allUsers as $uList)
                            @if($uList->gender=='male')
                            <img class="card-img-top" src="{{url('/img/male.png/')}}" style="width: 80px; height: 80px; margin: 20px" alt="Card image cap">
                            @else
                            <img class="card-img-top" src="{{url('/img/female.png/')}}" style="width: 80px; height: 80px; margin: 20px" alt="Card image cap">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{$uList->name}}</h5>
                                <?php
                                $check = Illuminate\Support\Facades\DB::table('friendships')->where('req_name', '=', $uList->id)
                                    ->where('requester', '=', Illuminate\Support\Facades\Auth::user()->id)->first();
                                if ($check == '') {
                                ?>
                                    <a href="/addFriend/{{$uList->id}}" class="btn btn-info ">Add Friend</a>
                                <?php  } else { ?>
                                    <p>Request Sent</p>
                                <?php  }
                                ?>
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