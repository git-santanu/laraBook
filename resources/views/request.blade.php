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
            @if($frReq)
            <div class="card" style="width: 18rem;">
                @if(session()->has('msg'))
                <p class="alert alert-success">
                    {{ session()->get('msg')}}
                </p>
                @endif
                @foreach($frReq as $uList)
                <img class="card-img-top" src="{{url('/img/female.png/')}}" style="width: 80px; height: 80px; margin: 25px" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$uList->name}}</h5>
                    @if(session()->has('msg'))
                    <p>
                        {{ session()->get('msg')}}
                    </p>
                    @else
                    <a href="/accept/{{$uList->id}}" class="btn btn-info">Confirm</a>
                    @endif
                </div>
                @endforeach
            </div>
            @else
            <div class="card" style="width: 18rem;">
                <p class="alert alert-success">
                    {{ session()->get('msg')}}
                </p>
            </div>
            @endif
        </div>
        @endsection

</body>

</html>