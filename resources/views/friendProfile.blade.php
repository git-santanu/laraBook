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
                <!-- {{print_r($mutualFriends)}}; -->
                @foreach($mutualFriends as $cFriend)
                {{ $cFriend->name }}
                @endforeach
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>