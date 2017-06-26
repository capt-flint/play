@extends('layouts.app')

@section('content')
    <div class="mainbody container-fluid">
        <div class="row">
        <div style="padding-top: 50px;">&nbsp;</div>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Groups</div>
                    <div class="btn-group pull-right">
                        <a href="{{route('groups-create')}}" class="btn btn-primary">
                            Создать группу
                        </a>
                    </div>
                    <div class="panel-body">
                        @foreach($groups as $group)
                            <div>
                                <a href="{{route('group', $group->id)}}">{{$group->name}}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
