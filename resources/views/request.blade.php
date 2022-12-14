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
                        {{ __('Friend Requests to here') }}
                    </div>
                </div>
            </div>
           
            <div class="card align-items-center justify-content-center" style="width: 18rem;">
                @if(session()->has('msg'))
                <p class="alert alert-success">
                    {{ session()->get('msg')}}
                </p>
                @endif
                @foreach($frReq as $uList)
                @if($uList->gender=='male')
                <img class="card-img-top" src="{{url('/img/male.png/')}}" style="width: 80px; height: 80px; margin: 25px" alt="Card image cap">
                @else
                <img class="card-img-top" src="{{url('/img/female.png/')}}" style="width: 80px; height: 80px; margin: 25px" alt="Card image cap">
                @endif
                <div class="card-body ">
                    <h5 class="card-title">
                    <a href="/friendProfile/{{$uList->slug}}">
                    {{$uList->name}}
                    </a>
                    </h5>
                    @if(session()->has('msg'))
                    <p>
                        {{ session()->get('msg')}}
                    </p>
                    @else
                    <a href="/accept/{{$uList->id}}" class="btn btn-info">Confirm</a>
                    <a href="/remove/{{$uList->id}}" class="btn btn-danger">Remove</a>
                    @endif
                </div>
                @endforeach
            </div>
            
           
        </div>
        @endsection
</body>

</html>