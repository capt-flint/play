<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="app">
    <div class="navbar-wrapper">
        <div class="container-fluid">
            <div class="navbar navbar-default navbar-static-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                                    class="icon-bar"></span><span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="./ORqmj" style="margin-right:-8px; margin-top:-5px;">
                            <img alt="Brand" src="https://lut.im/7trApsDX08/GeilMRp1FIm4f2p7.png" width="30px"
                                 height="30px">
                        </a>
                        <a class="navbar-brand" href="{{ url('/') }}">Project PS-Club</a>
                    </div>
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="./ORqmj">Stream</a></li>
                                <li><a href="#">My Activity</a></li>
                                <li><span class="badge badge-important">2</span><a href="#"><i
                                                class="fa fa-bell-o fa-lg"
                                                aria-hidden="true"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i></a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                                        <img src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png"
                                             class="img-responsive img-circle" title="John Doe" alt="John Doe"
                                             width="30px" height="30px">
                                    </span>
                                        <span class="user-name">
                                        {{ Auth::user()->name }}
                                    </span>
                                        <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="navbar-content">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <img src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png"
                                                             alt="Alternate Text" class="img-responsive" width="120px"
                                                             height="120px"/>
                                                        <p class="text-center small">
                                                            <a href="./3X6zm">Change Photo</a></p>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <span> {{ Auth::user()->name }}</span>
                                                        <p class="text-muted small">
                                                            example@pods.tld</p>
                                                        <div class="divider">
                                                        </div>
                                                        <a href="{{route('my-profile')}}" class="btn btn-default btn-xs"><i
                                                                    class="fa fa-user-o" aria-hidden="true"></i> Profile</a>
                                                        <a href="#" class="btn btn-default btn-xs"><i
                                                                    class="fa fa-address-card-o" aria-hidden="true"></i>
                                                            Contacts</a>
                                                        <a href="#" class="btn btn-default btn-xs"><i class="fa fa-cogs"
                                                                                                      aria-hidden="true"></i>
                                                            Settings</a>
                                                        <a href="#" class="btn btn-default btn-xs"><i
                                                                    class="fa fa-question-circle-o"
                                                                    aria-hidden="true"></i>
                                                            Help!</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="navbar-footer">
                                                <div class="navbar-footer-content">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <a href="#" class="btn btn-default btn-sm"><i
                                                                        class="fa fa-unlock-alt" aria-hidden="true"></i>
                                                                Change Passowrd</a>
                                                        </div>
                                                        <div class="col-md-6">

                                                            <a href="{{ route('logout') }}"
                                                               class="btn btn-default btn-sm pull-right"><i
                                                                        class="fa fa-power-off" aria-hidden="true"
                                                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"></i>
                                                                Sign
                                                                Out</a>
                                                            <form id="logout-form" action="{{ route('logout') }}"
                                                                  method="POST" style="display: none;">
                                                                {{ csrf_field() }}
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>
<script>
    var socket = io.connect('http://localhost:3000');
    socket.on('message', function (data) {
        data = jQuery.parseJSON(data);
        console.log(data.user);
        $( "#messages" ).append( "<strong>"+data.user+":</strong><p>"+data.message+"</p>" );
    });
    $(".send-msg").click(function(e){
        e.preventDefault();
        var token = $("input[name='_token']").val();
        var user = $("input[name='user']").val();
        var msg = $(".msg").val();
        if(msg != ''){
            $.ajax({
                type: "POST",
                url: '{!! URL::to("sendmessage") !!}',
                dataType: "json",
                data: {'_token':token,'message':msg,'user':user},
                success:function(data){
                    console.log(data);
                    $(".msg").val('');
                }
            });
        }else{
            alert("Please Add Message.");
        }
    })
</script>
</body>
</html>
