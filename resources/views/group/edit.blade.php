@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Groups</div>

                    <div class="panel-body">
                        <form method="post" action="{{ route('group-update') }}">
                            {!! csrf_field() !!}
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" value="{{$group->name}}">

                            <label for="name">Description:</label>
                            <input type="text" name="description" id="description" value="{{$group->description}}">

                            <input type="hidden" name="id" value="{{$group->id}}">

                            <button type="submit">Save</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
