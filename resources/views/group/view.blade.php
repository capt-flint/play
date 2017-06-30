@extends('layouts.app')

@section('content')
    <div class="mainbody container-fluid">
        <div class="row">
            @include('include.left-profile')
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Group - {{$group->name}}</div>

                    <div class="panel-body">
                        <img  src="{{Storage::url('groups/'.$group->image)}}" alt="{{$group->name}}">
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
                        <button type="submit">Вступить в группу</button>
                    </form>
                </div>
                <hr>
                <div class="container-post">
                    <form method="post" action="{{ route('post-create') }}">
                        {!! csrf_field() !!}
                       <textarea rows="10" cols="45" name="text"></textarea>
                        <input type="hidden" name="group_id" value="{{$group->id}}"/>
                        <button type="submit">Опубликовать</button>
                    </form>

                    <div class="posts">
                        @foreach($group->posts as $post)
                            <div class="post"><p>{{$post->text}}</p></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection