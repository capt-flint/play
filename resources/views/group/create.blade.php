@extends('layouts.app')

@section('content')
    <div class="mainbody container-fluid">
        <div class="row">
        <div style="padding-top: 50px;">&nbsp;</div>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Groups</div>

                    <div class="panel-body">
                        <form method="post" action="{{ route('groups-store') }}" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" value="">

                            <label for="name">Description:</label>
                            <input type="text" name="description" id="description" value="">


                            <label for="name">Image:</label>
                            <input type="file" name="image" >

                            <button type="submit">Save</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
