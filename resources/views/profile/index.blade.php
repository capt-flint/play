@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile</div>

                    <div class="panel-body">
                        <p>{{$user->name}}</p>
                        <p>{{$user->email}}</p>
                        <p>{{$user->profile->nickname}}</p>
                        <p>{{$user->profile->age}}</p>
                        <div class="friends">
                            <h4>Friends</h4>
                            <ul>
                                @foreach ($user->getFriends() as $friend)
                                    <li><a href="{{route('user-profile',$friend->id)}}">{{$friend->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
