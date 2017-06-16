@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile</div>

                    <div class="panel-body">
                        <p>{{$user->name}}</p>

                        <form method="post" action="{{ route('add-friend') }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="friend" value="{{$user->id}}" />
                            <button type="submit">Add friend</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
