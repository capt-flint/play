@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Group</div>

                    <div class="panel-body">
                        <p>{{$group->name}}</p>
                        <p>{{$group->description}}</p>
                    </div>
                    <ul>
                        @foreach($group->users as $user)
                            <li>{{$user->name}}</li>
                        @endforeach
                    </ul>

                    <form method="post" action="{{ route('join-group') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" value="{{$group->id}}"/>
                        <button type="submit">Join group</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
