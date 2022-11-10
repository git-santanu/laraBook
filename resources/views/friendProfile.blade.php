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
                    @foreach($userInfo as $uInfo)

                    <div class="card-header">
                    <a href="/friendProfile/{{$uInfo->slug}}">    
                    {{ $uInfo->name }}
                    </a>
                    </div>

                    {{print_r ($uInfo)}}
                    @endforeach

                    <!-- @foreach($mutualFriends as $uFr)
                   <div class="card-header"> {{ $uFr->name }}</div>
                    @endforeach -->
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>