@extends('layouts.app')

@section('content')

    <div class="mainbody container-fluid">
        <div class="row">
            <div style="padding-top:50px;"> </div>
            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="media">
                            <div align="center">
                                <img class="thumbnail img-responsive"
                                     src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" width="300px" height="300px">
                            </div>
                            <div class="media-body">
                                <hr>
                                <h3><strong>Bio</strong></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel gravida metus,
                                    non ultrices sapien. Morbi odio metus, dapibus non nibh id amet.</p>
                                <hr>
                                <h3><strong>Location</strong></h3>
                                <p>Earth</p>
                                <hr>
                                <h3><strong>Gender</strong></h3>
                                <p>Unknown</p>
                                <hr>
                                <h3><strong>Birthday</strong></h3>
                                <p>January 01 1901</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <span>
                        <h1 class="panel-title pull-left" style="font-size:30px;">{{$user->name}}</h1>
                        <div class="dropdown pull-right">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Friends
                                <span class="caret"></span>
                            </button>
                            <form method="post" action="{{ route('add-friend') }}">
                            {!! csrf_field() !!}
                                <input type="hidden" name="friend" value="{{$user->id}}"/>
                                <button type="submit">Add friend</button>
                            </form>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#">Familly</a></li>
                                <li><a href="#"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Friends</a></li>
                                <li><a href="#">Work</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> Add a new aspect</a></li>
                            </ul>
                        </div>
                    </span>
                        <br><br>
                        <i class="fa fa-tags" aria-hidden="true"></i> <a href="/tags/diaspora" class="tag">#diaspora</a>
                        <a href="/tags/hashtag" class="tag">#hashtag</a> <a href="/tags/caturday"
                                                                            class="tag">#caturday</a>
                        <br><br>
                        <hr>
                        <span class="pull-left">
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-files-o"
                                                                                          aria-hidden="true"></i> Posts</a>
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-picture-o"
                                                                                          aria-hidden="true"></i> Photos <span
                                    class="badge">42</span></a>
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-users"
                                                                                          aria-hidden="true"></i> Contacts <span
                                    class="badge">42</span></a>
                    </span>
                        <span class="pull-right">
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-lg fa-at"
                                                                                          aria-hidden="true"
                                                                                          data-toggle="tooltip"
                                                                                          data-placement="bottom"
                                                                                          title="Mention"></i></a>
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-lg fa-envelope-o"
                                                                                          aria-hidden="true"
                                                                                          data-toggle="tooltip"
                                                                                          data-placement="bottom"
                                                                                          title="Message"></i></a>
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-lg fa-ban"
                                                                                          aria-hidden="true"
                                                                                          data-toggle="tooltip"
                                                                                          data-placement="bottom"
                                                                                          title="Ignore"></i></a>
                    </span>
                    </div>
                </div>
                <hr>

            </div>
        </div>
    </div>

@endsection
