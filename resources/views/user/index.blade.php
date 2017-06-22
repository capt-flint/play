@extends('layouts.app')

@section('content')

    <div class="mainbody container-fluid">
        <div class="row">
            @include('include.left-profile')
            @include('include.main-block')
        </div>
    </div>

@endsection
