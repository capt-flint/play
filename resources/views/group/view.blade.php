@extends('layouts.app')

@section('content')
    <div class="mainbody container-fluid">
        <div class="row">
            @include('include.left-profile')
            @include('include.main-block')
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Group</div>

                    <div class="panel-body">
                        <p>{{$group->name}}</p>
                        <p>{{$group->description}}</p>
                    </div>
                    @if($group->users->count())
                        <ul>
                            @foreach($group->users as $user)
                                <li>{{$user->name}}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form method="post" action="{{ route('groups-join') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" value="{{$group->id}}"/>
                        <button type="submit">Join group</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection